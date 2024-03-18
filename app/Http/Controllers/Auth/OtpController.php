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
            'number' => 'nullable|exists:users,number',
            'login-mobile' => 'nullable|exists:users,number',
        ]);
        
        //$request->input($this->username())
        $mobile_number = $request->number == null ? $request->input('login-mobile') : $request->number;
        $user = User::where('number', $mobile_number)->first();
        $userotp = $this->generateotp($user->id);
        
        if ($userotp) {
            $userotp->sendsms($mobile_number);
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
            'expire_at' => $now->addMinutes(59),
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
            'otp' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $userotp = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();
        $now = now();
        
        if (!$userotp) {
            return redirect()->back()->with('error', 'Your OTP is incorrect.');
        } elseif ($now->isAfter($userotp->expire_at)) {
            return redirect()->back()->with('error', 'Your OTP has expired.');
        }
        
        $userotp->update([
            'expire_at' => now()
        ]);
        
        $user = User::whereId($request->user_id)->first();
        
        if ($user) {
            // Update the user's verification status
            $user->phone_verified = true;
            $user->save();
            
            Auth::login($user);
            return redirect('/')->with('success', 'OTP verification successful.');
        }
        
        return redirect()->route('otp.login')->with('error', 'Your OTP is not correct.');
    }
}
