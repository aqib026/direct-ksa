<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    public function index()
    {
        $user = Auth::user();
        
        if ($user) {
            if ($user->usertype === 'admin') {
                return view('admin.dashboard');
            } elseif ($user->usertype === 'customer') {
                if ($user->hasVerifiedEmail()) {
                    return view('user.layout.dashboard');
                } else {
                    return redirect()->route('verification.notice')->with('error', 'Please verify your email address.');
                }
            }
        }
        
        return redirect()->back();
    }
 



}



