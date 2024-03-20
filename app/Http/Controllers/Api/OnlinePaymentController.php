<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserVisaApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OnlinePaymentController extends Controller
{
    //
    public function storePaymentData(Request $request){

        $validator =Validator::make($request->all(),[
            'user_id' => 'required',
            'adult_count' => 'required',
            'child_count' => 'required',
            'total_amount' => 'required',
            'service_charges' => 'required',
            'customer_service_charges' => 'required',
            'vat_amount' => 'required',
            'transaction_id' => 'required',
            'invoice_id' => 'required',
            'transaction_date' => 'required',
            'status' => 'required',
            'message' => 'required',
            'order_id' => 'required',
            'session_id' => 'required',
            'card_type' => 'required',
            'user_data'=>'required',
            'invoice_value'=>'required',
            'payment_id'=>'required'
        ]);
        if ($validator->fails()) {
             $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);

        }
        $user_id=$request->get('user_id');
        $user=User::find($user_id);
        if(isset($user)){
            $transaction_entry = new Transaction();
                $transaction_entry->user_id=$user->id;
                $transaction_entry->order_id=$request->get('order_id');
                $transaction_entry->total_amount=$request->get('total_amount');
                $transaction_entry->adult_count=$request->get('adult_count');
                $transaction_entry->child_count=$request->get('child_count');
                $transaction_entry->session_id=$request->get('session_id');
                $transaction_entry->user_name=$user->name;
                $transaction_entry->user_email=$user->email;
                $transaction_entry->status=$request->get('status');
                $transaction_entry->invoice_id=$request->get('invoice_id');
                $transaction_entry->transaction_id=$request->get('transaction_id');
                $transaction_entry->payment_id=$request->get('payment_id');
                $transaction_entry->transaction_date=$request->get('transaction_date');
                $transaction_entry->service_charges=$request->get('service_charges');
                $transaction_entry->customer_service_charges=$request->get('customer_service_charges');
                $transaction_entry->vat_amount=$request->get('vat_amount');
                $transaction_entry->invoice_value=$request->get('invoice_value');
                $transaction_entry->message=$request->get('message');
                $transaction_entry->card_type=$request->get('card_type');
                $transaction_entry->save();

                //save data in  user_visa_applications table
                $VisaRequest = new UserVisaApplications();
                $VisaRequest->user_id = $user->id;
                $VisaRequest->content = serialize($request->get('user_data'));
                $VisaRequest->order_id = $request->get('order_id');
                $VisaRequest->save();

                $response=[
                    'success'=> true,
                    'message'=>"Successfully saved data into payment record and visa requests record"
                ];
                return response()->json($response,200);
        }else{
            $response=[
                'success'=> false,
                'message'=>"Not found user with given user id"
            ];
            return response()->json($response, 404);
        }
    }
}
