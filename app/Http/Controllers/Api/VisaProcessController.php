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
                        }
                        if (isset($adult_record['adult_personal_photo'])) {
                            $filename=$this->uploadPhoto($adult_record['adult_personal_photo'], 'personalpic');
                            $data['personal_information']['adult'][$key]['adult_avatar_filename']= $filename;
                        }
                    }
                }
                if (isset($data['personal_information']['child']) && count($data['personal_information']['child'])>0) {
                    foreach ($data['personal_information']['child'] as $key=>$child_record) {
                        if (isset($child_record['child_passport'])) {
                            $filename=$this->uploadPhoto($child_record['child_passport'], 'passportpic');
                            $data['personal_information']['child'][$key]['child_passport_filename']= $filename;
                        }
                        if (isset($child_record['child_personal_photo'])) {
                            $filename=$this->uploadPhoto($child_record['child_personal_photo'], 'personalpic');
                            $data['personal_information']['child'][$key]['child_avatar_filename']= $filename;
                        }
                    }
                }
                $user_id=$data["user_id"];
                $user_record=User::find($user_id);
                if (isset($data["payment_method"])) {
                    $payment_data=$data["payment_method"];
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
                        $VisaRequest->save();
                        $response = [
                            'success' => true,
                            'message' => 'Data is successfully stored in visa request and transaction records'
                         ];
                        return response()->json($response, 201);
                    } else {
                        //save data in  user_visa_applications table
                        $VisaRequest = new UserVisaApplications();
                        $VisaRequest->user_id = $user_record->id;
                        $VisaRequest->content = serialize($data);
                        $VisaRequest->save();
                
                        $response = [
                            'success' => true,
                            'message' => 'Data is successfully stored in visa request record'
                         ];
                        return response()->json($response, 201);
                    }
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
            return response()->json($response, 400);
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
        }
        
        $filename = $img_type."/".Str::uuid().".".$imageFormat;
        Storage::put($filename, $imageBinary);
        return $filename;
    }
}
