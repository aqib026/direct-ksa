<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class OtpController extends Controller
{
    //
    public function loginOtp(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'number' => 'exists:users,number|nullable',
            'email' => 'exists:users,email|nullable',
        ], [
            "number"=>"Please enter valid phone number with minimum 9 digits",
            "email"=>"Please enter valid registered email address"
        ]);
        if ($validator->fails()) {
             $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);

        }

        $mobile_number = $request->number??null;
        $email=$request->input('email')??null;
        if(isset($mobile_number)){
            $user = User::where('number', $mobile_number)->first();
        }elseif(isset($email)){
            $user = User::where('email',$email)->first();
        }
        $userotp=null;
        if (isset($user->otp) && isset($user->otp_expiration)) {
            $current_time = new DateTime();


            $other_time = new DateTime($user->otp_expiration);


            $interval = $current_time->diff($other_time);


            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                $userotp = $this->generateotp($user->id);
                if ($userotp) {
                    $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    if (isset($email)) {
                        $data["email"]=$email;
                        $reponse=$this->sendEmail($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered email !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                        
                    }else if($mobile_number){
                        $data["phone"]=$mobile_number;
                        $reponse=$this->sendSMS($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered phone number !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                    } else {
                        // Handle the case where $userotp is null
                        $response=[
                            'success'=> false,
                            'message'=>'Something went wrong. Please try again later.'
                        ];
                        return response()->json($response, 400);
                    }
                    
                } else {
                    // Handle the case where $userotp is null
                    $response=[
                        'success'=> false,
                        'message'=>'Failed to generate OTP. Please try again.'
                    ];
                    return response()->json($response, 500);
                }
            } else {
                $userotp=$user;
                if ($userotp) {
                    $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    if (isset($email)) {
                        $data["email"]=$email;
                        $reponse=$this->sendEmail($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered email !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                        
                    }else if($mobile_number){
                        $data["phone"]=$mobile_number;
                        $reponse=$this->sendSMS($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered phone number !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                    } else {
                        // Handle the case where $userotp is null
                        $response=[
                            'success'=> false,
                            'message'=>'Something went wrong. Please try again later.'
                        ];
                        return response()->json($response, 400);
                    }
                } else {
                    // Handle the case where $userotp is null
                    $response=[
                        'success'=> false,
                        'message'=>'Failed to generate OTP. Please try again.'
                    ];
                    return response()->json($response, 500);
                }
            }
        } elseif(isset($user)) {
            $userotp = $this->generateotp($user->id);

            if ($userotp) {
                $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    if (isset($email)) {
                        $data["email"]=$email;
                        $reponse=$this->sendEmail($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered email !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                        
                    }else if($mobile_number){
                        $data["phone"]=$mobile_number;
                        $reponse=$this->sendSMS($data);
                        if ($reponse["success"==true]) {
                            $json_response=[
                                'success'=> true,
                                'message'=>'OTP has been sent to your registered phone number !',
                                'user_id'=>$userotp->id
                            ];
                            return response()->json($json_response, 200);
                        }else{
                            $response=[
                                'success'=> false,
                                'message'=>'Something went wrong. Please try again later.'
                            ];
                            return response()->json($response, 400);
                        }
                    } else {
                        // Handle the case where $userotp is null
                        $response=[
                            'success'=> false,
                            'message'=>'Something went wrong. Please try again later.'
                        ];
                        return response()->json($response, 400);
                    }
            } else {
                // Handle the case where $userotp is null
                $response=[
                    'success'=> false,
                    'message'=>'Failed to generate OTP. Please try again.'
                ];
                return response()->json($response, 500);
            }
        }else{
            $response=[
                'success'=> false,
                'message'=>'Failed to generate OTP. Invalid User'
            ];
            return response()->json($response, 404);
        }
    }
    public function generateotp($user_id)
    {
        $user = User::find($user_id);
        $current_time = new DateTime();
        $user->otp=rand(12344, 99999);
        $user->otp_expiration=$current_time;
        $user->update();

        return $user;
    }
    public function otpVerification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'user_id'=>'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }


        $otp = $request->get('otp');
        $user_id= $request->get('user_id');
        $userotp = User::find($user_id);
        if (isset($userotp->otp) && isset($userotp->otp_expiration)) {
            $current_time = new DateTime();
            $other_time = new DateTime($userotp->otp_expiration);
            $interval = $current_time->diff($other_time);

            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                $response = [
                    'success' => false,
                    'message' => 'Your OTP has expired. Please try again with a new OTP'
                ];
                return response()->json($response, 419);
            } else {
                if ($userotp->otp == $otp) {
                    $data['token'] = $userotp->createToken('MyApp')->plainTextToken;
                    $data['name'] = $userotp->name;
                    $userotp->otp = null;
                    $userotp->otp_expiration = null;
                    $userotp->update();
                    $response = [
                        'success' => true,
                        'message' => 'OTP verification successful.',
                        'data' => $data
                    ];
                    return response()->json($response, 200);
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Your OTP is incorrect.',
                    ];
                    return response()->json($response, 400);
                }
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Something went wrong. Please try again later!',
            ];
            return response()->json($response, 500);
        }
    }
    protected function sendSMS($data)
    {
        try {
            $account_sid = env("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
    
            $msg = "Hi ".$data["name"]."\n";
            $msg .="Use the following one-time password (OTP) to prove your identity.This OTP is valid for 10 minutes \n";
            $msg .= $data["otp"]."\n";
            $msg .="Exvisas Team \n";
            $client->messages->create(
                $data['phone'],
                ['from' => $twilio_number, 'body' => $msg]
            );
            return ["success"=>true];
        } catch(Exception $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/opt-api-twilio-errors.log'),
             ])->info('There is problem while sending sms: /n '.print_r($e->getMessage(), true));
            return ["success"=>false,"error"=>$e->getMessage()];
        }
    }
    protected function sendEmail($data)
    {
        try {
            Mail::to($data["email"])->send(new SendOtp($data));
            return ["success"=>true];
        } catch(Exception $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/otp-api-email-errors.log'),
             ])->info('There is problem while sending email: /n '.print_r($e->getMessage(), true));
            return ["success"=>false,"error"=>$e->getMessage()];
        }
    }

}
