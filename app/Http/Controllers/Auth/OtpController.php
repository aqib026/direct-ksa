<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        $merge_number="false";
        if ($request->has('merge_number')) {
            $merge_number=$request->get('merge_number');
        }
        if ($request->number && $merge_number!="false") {
            $request->merge(['number' => '+966' . $request->number]);
        };
        $rules = [];
        $messages = [];
        if ($request->has('number') && $request->input('email') === null) {
            $rules = ['number'=>'required|exists:users,number'];
            $messages=["number" =>__('otp.number_validation')];
        } elseif ($request->has('email') && $request->input('number') === null) {
            $rules = ['email'=>'required|exists:users'];
            $messages= ["email"=>__('otp.email_validation')];
        } else {
            return redirect()->back()->with('general-error', trans('login.general_error'));
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            if ($merge_number=="false") {
                return redirect()->back()->with('error', __('otp.otp_error_message'));
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        $mobile_number = $request->number??null;
        $email=$request->input('email')??null;
        if (isset($mobile_number)) {
            $user = User::where('number', $mobile_number)->first();
        } elseif (isset($email)) {
            $user = User::where('email', $email)->first();
        }
        $userotp=null;
        if (isset($user->otp) && isset($user->otp_expiration)) {
            $current_time = new DateTime();


            $other_time = new DateTime($user->otp_expiration);


            $interval = $current_time->diff($other_time);


            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                $userotp = $this->generateotp($user->id);
                if ($userotp) {
                    if (isset($email) ||  isset($mobile_number)) {
                        $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                        if (isset($mobile_number)) {
                            $data["phone"]=$mobile_number;
                            $reponse=$this->sendSMS($data);
                            if ($reponse["success"]==true) {
                                return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                            } else {
                                return redirect()->back()->with('error', __('otp.otp_error_message'));
                            }
                        } elseif (isset($email)) {
                            $data["email"]=$email;
                            $reponse=$this->sendEmail($data);
                            if ($reponse["success"]==true) {
                                return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                            } else {
                                return redirect()->back()->with('error', __('otp.otp_error_message'));
                            }
                        }
                    } else {
                        // Handle the case where $userotp is null
                        return redirect()->back()->with('error', __('otp.otp_error_message'));
                    }
                } else {
                    // Handle the case where $userotp is null
                    return redirect()->back()->with('error', __('otp.otp_failed_message'));
                }
            } else {
                $userotp=$user;
                if ($userotp) {
                    $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                    if (isset($mobile_number)) {
                        $data["phone"]=$mobile_number;
                        $reponse=$this->sendSMS($data);
                        if ($reponse["success"]==true) {
                            return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                        } else {
                            return redirect()->back()->with('error', __('otp.otp_error_message'));
                        }
                    } elseif (isset($email)) {
                        $data["email"]=$email;
                        $reponse=$this->sendEmail($data);
                        if ($reponse["success"]==true) {
                            return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                        } else {
                            return redirect()->back()->with('error', __('otp.otp_error_message'));
                        }
                    }
                } else {
                    // Handle the case where $userotp is null
                    return redirect()->back()->with('error', __('otp.otp_failed_message'));
                }
            }
        } elseif (isset($user)) {
            $userotp = $this->generateotp($user->id);

            if ($userotp) {
                $data=["otp"=>$userotp->otp,"name"=>$userotp->name];
                if (isset($mobile_number)) {
                    $data["phone"]=$mobile_number;
                    $reponse=$this->sendSMS($data);
                    if ($reponse["success"]==true) {
                        return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                    } else {
                        return redirect()->back()->with('error', __('otp.otp_error_message'));
                    }
                } elseif (isset($email)) {
                    $data["email"]=$email;
                    $reponse=$this->sendEmail($data);
                    if ($reponse["success"]==true) {
                        return redirect()->route('otp.verification', ["user_id"=>$userotp->id])->with('success', __('otp.opt_success_message'));
                    } else {
                        return redirect()->back()->with('error', __('otp.otp_error_message'));
                    }
                }
            } else {
                // Handle the case where $userotp is null
                return redirect()->back()->with('error', __('otp.otp_failed_message'));
            }
        } else {
            return redirect()->back()->with('error', __('otp.invalid_user_message'));
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
        if (isset($user)) {
            return view('auth.verification', compact('user'));
        } else {
            return redirect()->back()->with('error', __('otp.record_not_found'));
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
        if (isset($userotp->otp) && isset($userotp->otp_expiration)) {
            $current_time = new DateTime();


            $other_time = new DateTime($userotp->otp_expiration);


            $interval = $current_time->diff($other_time);


            if ($interval->i > 10 || $interval->h > 0 || $interval->d > 0 || $interval->m > 0 || $interval->y > 0) {
                return redirect()->back()->with('error', __('otp.otp_expiration_message'));
            } else {
                if ($userotp->otp==$otp) {
                    Auth::login($userotp);
                    $userotp->otp=null;
                    $userotp->otp_expiration=null;
                    $userotp->update();
                    return redirect('/user/dashboard')->with('success', __('otp.otp_verification_message'));
                } else {
                    return redirect()->back()->with('error', __('otp.opt_incorrect_message'));
                }
            }
        } else {
            return redirect()->back()->with('error', __('otp.otp_error_message'));
        }
    }
    protected function sendSMS($data)
    {
        try {
            $api_key = env("VONAGE_API_KEY");
            $secret_key = env("VONAGE_SECRET_KEY");
            $vonage_number = env("VONAGE_NUMBER");
            $voange_credentials = new \Vonage\Client\Credentials\Basic($api_key, $secret_key);
            $client = new \Vonage\Client($voange_credentials);

            $msg = "Hi ".$data["name"]."\n";
            $msg .="Use the following one-time password (OTP) to prove your identity.This OTP is valid for 10 minutes \n";
            $msg .= $data["otp"]."\n";
            $msg .="Exvisas Team \n";
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($data['phone'], $vonage_number, $msg)
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                return ["success"=>true];
            } else {
                return ["success"=>false,"error"=>"The message failed with status: ".$message->getStatus()];
            }
        } catch(Exception $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/otp-twilio-errors.log'),
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
                'path' => storage_path('logs/otp-email-errors.log'),
             ])->info('There is problem while sending email: /n '.print_r($e->getMessage(), true));
            return ["success"=>false,"error"=>$e->getMessage()];
        }
    }
}
