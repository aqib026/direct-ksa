<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DateTime;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email:rfc,dns|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
            'number'=>'required|regex:/^\+966[0-9]{9,20}$/|unique:users'        ]);
        if ($validator->fails()) {
            $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input=$request->all();
        $input['usertype']='customer';
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $success['name']=$user->name;


        $otp = rand(12344, 99999);
        $user->otp = $otp;
        $user->otp_expiration=new DateTime();
        $user->save();


        $data = [
            'otp' => $otp,
            'name' => $user->name,
        ];


        Mail::to($user->email)->send(new SendOtp($data));

        $response=[
            'success'=>true,
            'data'=> $success,
            'message'=>'User Register Successfully,Otp is send to the given email'
        ];
        return response()->json($response, 200);
    }



    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $user=Auth::user();
            $success['token']=$user->createToken('MyApp')->plainTextToken;
            $success['name']=$user->name;

            $response=[
                'success'=>true,
                'data'=> $success,
                'message'=>'User Login Successfully'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success'=>false,
                'message'=>'unauthorised'
            ];
            return response()->json($response, );
        }
    }

    public function verifyEmail(Request $request)
    {

            $validator = Validator::make($request->all(), [
                'otp' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                $response = [
                    'success' => false,
                    'message' => $validator->errors()
                ];
                return response()->json($response, 400);
            }

            $email = $request->get('email');
            $otp = $request->get('otp');
            $userotp = User::where('email', $email)->first();

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
                        $userotp->email_verified_at = now();
                        $userotp->otp = null;
                        $userotp->otp_expiration = null;
                        $userotp->update();
                        $response = [
                            'success' => true,
                            'message' => 'Email verification successful.'
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
}
