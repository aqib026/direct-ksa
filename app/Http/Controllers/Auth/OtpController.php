<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function login()
    {
        return view('auth.otpmobile');
    }

    public function generate(Request $request)
    {
        $request->merge(['number' => '+966' . $request->number]);


        $rules = [];
        $messages = [];

        if ($request->has('number') && $request->input('email') === null) {
            $rules['number'] = ['required', 'regex:/^(\+966)[0-9]{9,14}$/', 'exists:users'];
            $messages['number'] = "Please enter valid registered mobile number";
        }

        if ($request->has('email') && $request->input('number') === null) {
            $rules['email'] = ['exists:users', 'regex:/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/'];
            $messages['email'] = "Please enter valid registered email address";
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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
                        return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', 'OTP has been sent to your registered email !');
                    } else {
                        // Handle the case where $userotp is null
                        return redirect()->back()->with('error', 'Somethings went wroing. Please try again later.');
                    }
                } else {
                    // Handle the case where $userotp is null
                    return redirect()->back()->with('error', 'Failed to generate OTP. Please try again.');
                }
            } else {
                $userotp=$user;
                if ($userotp) {
                    if (isset($userotp->email)) {
                        $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                        Mail::to($user->email)->send(new SendOtp($data));
                        return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', 'OTP has been sent to your registered email !');
                    } else {
                        // Handle the case where $userotp is null
                        return redirect()->back()->with('error', 'Somethings went wroing. Please try again later.');
                    }
                } else {
                    // Handle the case where $userotp is null
                    return redirect()->back()->with('error', 'Failed to generate OTP. Please try again.');
                }
            }
        } else {
            $userotp = $this->generateotp($user->id);

            if ($userotp) {
                if (isset($userotp->email)) {
                    $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    Mail::to($user->email)->send(new SendOtp($data));

                    return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', 'OTP has been sent to your registered email !');
                } else {
                    // Handle the case where $userotp is null
                    return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
                }
            } else {
                // Handle the case where $userotp is null
                return redirect()->back()->with('error', 'Failed to generate OTP. Please try again.');
            }
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

    public function verification($user_id)
    {
        $user=User::find($user_id);
        if(isset( $user)){
            return view('auth.verification',compact('user'));
        }else{
            return redirect()->back()->with('error', "Record not found!");
        }

    }

    public function loginotp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        $user_id=$request->get('user_id');
        $otp=$request->get('otp');
        $userotp = User::find($user_id);
        if(isset($userotp->otp) && isset($userotp->otp_expiration) ){

            $current_time = new DateTime();


            $other_time = new DateTime($userotp->otp_expiration);


            $interval = $current_time->diff($other_time);


            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                return redirect()->back()->with('error', 'Your OTP has expired.Please Try again with new OTP');
            } else{
                if($userotp->otp==$otp){

                    Auth::login($userotp);
                    $userotp->otp=null;
                    $userotp->otp_expiration=null;
                    $userotp->update();
                    return redirect('/user/dashboard')->with('success', 'OTP verification successful.');
                }else{
                    return redirect()->back()->with('error', 'Your OTP is incorrect.');
                }
            }

        }else{
            return redirect()->back()->with('error', 'Something went wrong try again later!');
        }

    }
}
