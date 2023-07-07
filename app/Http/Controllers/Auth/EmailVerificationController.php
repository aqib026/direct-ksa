<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }
    
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        
        return redirect('/dashboard')->with('verified', true);
       
    
    }
    
    public function sendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('message', 'Verification link sent!');
    }
}
?>
