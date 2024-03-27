<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    //
    public function loginOtp(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'number' => 'exists:users,number|nullable',
            'email' => 'exists:users,email|nullable',
        ], [
            "number"=>"Please enter valid registered mobile number",
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
                    if (isset($userotp->email)) {
                        $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                        Mail::to($user->email)->send(new SendOtp($data));
                        $response=[
                            'success'=> true,
                            'message'=>'OTP has been sent to your registered email !',
                            'user_id'=>$userotp->id
                        ];
                        return response()->json($response, 200);
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
                    if (isset($userotp->email)) {
                        $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                        Mail::to($user->email)->send(new SendOtp($data));
                        $response=[
                            'success'=> true,
                            'message'=>'OTP has been sent to your registered email !',
                            'user_id'=>$userotp->id
                        ];
                        return response()->json($response, 200);
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
                if (isset($userotp->email)) {
                    $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    Mail::to($user->email)->send(new SendOtp($data));
                    $response=[
                        'success'=> true,
                        'message'=>'OTP has been sent to your registered email !',
                        'user_id'=>$userotp->id
                    ];
                    return response()->json($response, 200);
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
        $validator =Validator::make($request->all(),[
            'otp' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
             $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);

        }
        $user_id=$request->get('user_id');
        $otp=$request->get('otp');
        $userotp = User::find($user_id);
        if(isset($userotp->otp) && isset($userotp->otp_expiration) ){

            $current_time = new DateTime();

           
            $other_time = new DateTime($userotp->otp_expiration);

           
            $interval = $current_time->diff($other_time);

           
            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                $response=[
                    'success'=> false,
                    'message'=>'Your OTP has expired.Please Try again with new OTP'
                ];
                return response()->json($response, 419);
            } else{
                if($userotp->otp==$otp){

                    $data['token']=$userotp->createToken('MyApp')->plainTextToken;
                    $data['name']=$userotp->name;
                    $userotp->otp=null;
                    $userotp->otp_expiration=null;
                    $userotp->update();
                    $response=[
                        'success'=> true,
                        'message'=>'OTP verification successful.',
                        'data'=>$data
                    ];
                    return response()->json($response, 200);
                }else{
                    $response=[
                        'success'=> false,
                        'message'=>'Your OTP is incorrect.',
                    ];
                    return response()->json($response, 400);
                }
            }

        }else{
            $response=[
                'success'=> false,
                'message'=>'Something went wrong. try again later!',
            ];
            return response()->json($response, 500);
        }
    
    }
    
}
