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
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype=='users'){
                return view ('admin.dashboard');
            }
            else if($usertype=='admin')
            {
                return view ('admin.dashboard');
            }
            else if($usertype=='customer')
            {
                return view ('user.layout.dashboard');
            }
            else
            {
                return redirect()->back();
            }
        }


    }

 



}



