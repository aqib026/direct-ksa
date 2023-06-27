<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('user.forgetpassword');
    }

    public function send()
    {
        Mail::to(request('email'))->send(new Email());
        return redirect()->back();
    }
public function reset()
{
    return view('user.resetpassword');
}
}
