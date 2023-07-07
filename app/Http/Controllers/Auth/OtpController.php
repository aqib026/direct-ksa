<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Auth;


class OtpController extends Controller
{
    public function login()
    {
    return view('auth.otpmobile');
    }
    public function generate(Request $request)
    {
        $request->validate([
            'number' => 'required|exists:users,number',
        ]);
        
        $user = User::where('number', $request->number)->first();
        $userotp = $this->generateotp($user->id);
        
        if ($userotp) {
            $userotp->sendsms($request->number);
            return redirect()->route('otp.verification', [$userotp->user_id])->with('success', 'OTP has been sent to your mobile number!');
        }
        
        // Handle the case where $userotp is null
        return redirect()->back()->with('error', 'Failed to generate OTP. Please try again.');
    }
    
    public function generateotp($user_id)
    {
        $user = User::find($user_id);
        $now = now();
        
        $userotp = UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(12344, 99999),
            'expire_at' => $now->addMinutes(10),
        ]);
        
        return $userotp;
    }
    
    public function verification($user_id)
    {
        return view('auth.verification')->with([
            'user_id'=>$user_id
        ]);
    }
    public function loginotp(Request $request)
    {
    $request->validate([
        'otp'=>'required',
        'user_id'=>'required|exists:users,id'
    ]);
    $userotp = UserOtp::where('user_id',$request->user_id)->where('otp',$request->otp )->first();
    $now= now();
    if(!$userotp)
    {
        return redirect()->back()->with('error','Your OTP is Incorrect');
    }
    elseif ($userotp && $now->isAfter($userotp->expire_at)){
        return redirect()->back()->with('error','Your OTP is Expired');
    }
    
   $user = User::whereId($request->user_id)->first();
    if ($user){
        $userotp->update([
            'expire_at'=>now()
        ]);
        Auth::login($user);
        return redirect('/');
    
    }
        return redirect()->route('otp.login')->with('error','Your OTP is not correct');
    
    }
}
