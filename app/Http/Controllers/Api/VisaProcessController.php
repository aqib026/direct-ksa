<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserVisaApplications;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDO;

class VisaProcessController extends Controller
{
    //
    public function storeVisaRequest(Request $request)
    {
        try {
            $data=json_decode($request->getContent(), true);
            if (isset($data)) {
                $validator =Validator::make($data, [
                    'user_id'=>'required|exists:users,id',
                    'country_id'=>'required|exists:countries,id']);
                if ($validator->fails()) {
                    $response=[
                        'success'=> false,
                        'message'=>$validator->errors()
                    ];
                    return response()->json($response, 400);
                }
                if (isset($data['personal_information']['adult']) && count($data['personal_information']['adult'])>0) {
                    foreach ($data['personal_information']['adult'] as $key=>$adult_record) {
                        if (isset($adult_record['adult_passport'])) {
                            $filename=$this->uploadPhoto($adult_record['adult_passport'], 'passportpic');
                            $data['personal_information']['adult'][$key]['adult_passport_filename']= $filename;
                            $data['personal_information']['adult'][$key]['adult_passport']=null;
                        }
                        if (isset($adult_record['adult_personal_photo'])) {
                            $filename=$this->uploadPhoto($adult_record['adult_personal_photo'], 'personalpic');
                            $data['personal_information']['adult'][$key]['adult_avatar_filename']= $filename;
                            $data['personal_information']['adult'][$key]['adult_personal_photo']=null;
                        }
                    }
                }
                if (isset($data['personal_information']['child']) && count($data['personal_information']['child'])>0) {
                    foreach ($data['personal_information']['child'] as $key=>$child_record) {
                        if (isset($child_record['child_passport'])) {
                            $filename=$this->uploadPhoto($child_record['child_passport'], 'passportpic');
                            $data['personal_information']['child'][$key]['child_passport_filename']= $filename;
                            $data['personal_information']['child'][$key]['child_passport']=null;
                        }
                        if (isset($child_record['child_personal_photo'])) {
                            $filename=$this->uploadPhoto($child_record['child_personal_photo'], 'personalpic');
                            $data['personal_information']['child'][$key]['child_avatar_filename']= $filename;
                            $data['personal_information']['child'][$key]['child_personal_photo']=null;
                        }
                    }
                }
                if ($data['sponsors_of_expenses']['bank_statement_image']) {
                    $filename=$this->uploadPhoto($data['sponsors_of_expenses']['bank_statement_image'], 'sponser-documents');
                    $data['sponsors_of_expenses']['sponsors_bank_img_filename']= $filename;
                    $data['sponsors_of_expenses']['bank_statement_image']=null;
                }
                if ($data['sponsors_of_expenses']['job_letter_image']) {
                    $filename=$this->uploadPhoto($data['sponsors_of_expenses']['job_letter_image'], 'sponser-documents');
                    $data['sponsors_of_expenses']['sponsors_job_img_filename']= $filename;
                    $data['sponsors_of_expenses']['job_letter_image']=null;
                }

                $user_id=$data["user_id"];
                $user_record=User::find($user_id);
                if (isset($data["payment_method"])) {
                    $payment_data=$data["payment_method"];
                    $tracking_number=uniqid();
                    $visa_records=UserVisaApplications::where('tracking_number', $tracking_number)->get();
                    if (count($visa_records)>0) {
                        $tracking_number=uniqid();
                    }
                    if ($payment_data["payment_method"]=="online_payment" && $payment_data['response']["IsSuccess"]==true && $payment_data['response']['Data']["InvoiceStatus"]=='Paid') {
                        //save  user  data into transaction record
                        $transaction_entry = new Transaction();
                        $transaction_entry->user_id=$user_record->id;
                        $transaction_entry->total_amount=$data['total_cost'];
                        $transaction_entry->adult_count=$data['adult_count'];
                        $transaction_entry->child_count=$data['child_count'];
                        $transaction_entry->user_name=$user_record->name;
                        $transaction_entry->user_email=$user_record->email;
                        $transaction_entry->status=$payment_data["response"]['Data']["InvoiceStatus"];
                        $transaction_entry->invoice_id=$payment_data["response"]['Data']["InvoiceId"];
                        $transaction_entry->transaction_id=$payment_data["response"]['Data']["InvoiceTransactions"][0]["TransactionId"];
                        $transaction_entry->payment_id=$payment_data["response"]['Data']["InvoiceTransactions"][0]["PaymentId"];
                        $transaction_entry->transaction_date=$payment_data["response"]['Data']["InvoiceTransactions"][0]["TransactionDate"];
                        $transaction_entry->service_charges=$payment_data["response"]['Data']["InvoiceTransactions"][0]["TotalServiceCharge"];
                        $transaction_entry->customer_service_charges=$payment_data["response"]['Data']["InvoiceTransactions"][0]["CustomerServiceCharge"];
                        $transaction_entry->vat_amount=$payment_data["response"]['Data']["InvoiceTransactions"][0]["VatAmount"];
                        $transaction_entry->invoice_value=$payment_data["response"]['Data']["InvoiceValue"];
                        $transaction_entry->message="Invoice is paid.";
                        $transaction_entry->card_type=$payment_data["response"]['Data']["InvoiceTransactions"][0]["PaymentGateway"];
                        $transaction_entry->is_mobile="1";
                        $transaction_entry->save();
                        //save data in  user_visa_applications table
                        $VisaRequest = new UserVisaApplications();
                        $VisaRequest->user_id = $user_record->id;
                        $VisaRequest->content = serialize($data);
                        $VisaRequest->payment_id = $payment_data["response"]['Data']["InvoiceTransactions"][0]["PaymentId"];
                        $VisaRequest->tracking_number = $tracking_number;
                        $VisaRequest->save();
                        $response = [
                            'success' => true,
                            'message' => 'Data is successfully stored in visa request and transaction records',
                            'tracking_id'=>$VisaRequest->tracking_number
                         ];
                        return response()->json($response, 201);
                    } else {
                        //save data in  user_visa_applications table
                        $VisaRequest = new UserVisaApplications();
                        $VisaRequest->user_id = $user_record->id;
                        $VisaRequest->content = serialize($data);
                        $VisaRequest->tracking_number =  $tracking_number;
                        $VisaRequest->save();
                
                        $response = [
                            'success' => true,
                            'message' => 'Data is successfully stored in visa request record',
                            'tracking_id'=>$VisaRequest->tracking_number
                         ];
                        return response()->json($response, 201);
                    }
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'There is an issue with the payload.Missing payment information'
                     ];
                    return response()->json($response, 400);
                }
            } else {
                $errorCode = json_last_error_msg();
                $response = [
                    'success' => false,
                    'message' => 'There is an issue with the payload.Error message: '.$errorCode
                 ];
                return response()->json($response, 400);
            }
        } catch(Exception $e) {
            $response=[
                'success'=> false,
                'message'=>$e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    public function storeAdditionalImages(Request $request)
    {
        try {
            $input=$request->input();
            $validator =Validator::make($input, [
                'user_id'=>'required|exists:users,id',]);
            if ($validator->fails()) {
                $response=[
                    'success'=> false,
                    'message'=>$validator->errors()
                ];
                return response()->json($response, 400);
            }
            $user_id=$input['user_id'];
            $tracking_id=$input['tracking_id'];
            $user=UserVisaApplications::where('user_id', $user_id)->where('tracking_number', $tracking_id)->first();
            if (isset($user)) {
                $content = unserialize($user->content);
                $user_content=$content;

                if (isset($input['additional_documents'])) {
                    if(isset($content['sponsors_of_expenses']['sponsors_additional_img_filename'])){
                        @unlink($content['sponsors_of_expenses']['sponsors_additional_img_filename']);
                    }
                    $filename=$this->uploadPhoto($input['additional_documents'], 'sponser-documents');
                    $user_content['sponsors_of_expenses']['sponsors_additional_img_filename']= $filename;
                    $input['additional_documents']=null;
                    $user->content = serialize($user_content);
                    $user->update();
                }
                if (isset($input['bank_statement_image'])) {
                    if(isset($content['sponsors_of_expenses']['sponsors_bank_img_filename'])){
                        @unlink($content['sponsors_of_expenses']['sponsors_bank_img_filename']);
                    }
                    $filename=$this->uploadPhoto($input['bank_statement_image'], 'sponser-documents');
                    $user_content['sponsors_of_expenses']['sponsors_bank_img_filename']= $filename;
                    $user_content['sponsors_of_expenses']['i_will_prepare_later_bank']=null;
                    $user_content['sponsors_of_expenses']['bank_statement_image']=null;
                    $user->content = serialize($user_content);
                    $user->update();
                }
                if (isset($input['job_letter_image'])) {
                    if(isset($content['sponsors_of_expenses']['sponsors_job_img_filename'])){
                        @unlink($content['sponsors_of_expenses']['sponsors_job_img_filename']);
                    }
                    $filename=$this->uploadPhoto($input['job_letter_image'], 'sponser-documents');
                    $user_content['sponsors_of_expenses']['sponsors_job_img_filename']= $filename;
                    $user_content['sponsors_of_expenses']['i_will_prepare_later_job']=null;
                    $user_content['sponsors_of_expenses']['job_letter_image']=null;
                    $user->content = serialize($user_content);
                    $user->update();
                }
                $response=[
                    'success'=> true,
                    'message'=>"Uploaded document successfully"
                ];
                return response()->json($response, 200);
            } else {
                $response=[
                    'success'=> false,
                    'message'=>"Cannot find record !"
                ];
                return response()->json($response, 400);
            }
        } catch(Exception $e) {
            $response=[
                'success'=> false,
                'message'=>$e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    public function uploadPhoto($image, $img_type)
    {
        // Decode the base64-encoded image data
        $imageBinary = base64_decode($image);
        $imageFormat = 'jpg'; // Default to jpg if format cannot be determined
        if (strpos($imageBinary, "\xFF\xD8") === 0) {
            $imageFormat = 'jpg'; // JPEG format
        } elseif (strpos($imageBinary, "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A") === 0) {
            $imageFormat = 'png'; // PNG format
        } elseif (strpos($imageBinary, "\x47\x49\x46\x38") === 0) {
            $imageFormat = 'gif'; // GIF format
        } elseif (strpos($imageBinary, "II\x2A\x00") === 0 || strpos($imageBinary, "MM\x00\x2A") === 0) {
            $imageFormat = 'tiff'; // TIFF format
        } elseif (strpos($imageBinary, "%PDF") === 0) {
            $imageFormat = 'pdf'; // PDF format
        }
        
        $filename = $img_type."/".Str::uuid().".".$imageFormat;
        Storage::put($filename, $imageBinary);
        return $filename;
    }
}
