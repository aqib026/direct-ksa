<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype=='customer')
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
    public function create()
    {
        $url = url('user/register');
        $data = compact('url');
        return view('user.layout.userregistration')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ], [
            'name.required'                     => 'Name is required',
            'password.required'                 => 'Password is required',
            'password.min'                      => 'Minimum 8 Characters are required',
            'password_confirmation.required'    => 'Confirm password is required',
            'password_confirmation.same'        => 'Confirm password doesnt matches with password',
            'email.required'                    => 'Email is required',
            'email.email'                       => 'Enter a valid Email'
        ]);

        $user = new admin;

        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->usertype = 'customer';
        $user->save();

        return redirect('user/login');
    }

    
    public function edit()
    {
        $url = url('user/profile/update');
        $user = Auth::user();
        $data = compact('url', 'user');

        return view('user.updateprofile')->with($data);
    }

    public function update(request $request)
    {

        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
           'number'                 => 'required'
        ], [
            'name.required'                     => 'Name is required',
         
            'email.required'                    => 'Email is required',
            'email.email'                       => 'Enter a valid Email'
        ]);

        $user = Admin::find(Auth::user()->id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->number    = $request['number'];
        $user->usertype = 'customer';
        $user->save();

        return redirect('user/dashboard');
    }
    public function passwordedit($id)
    {
        $user = Admin::find($id);

        if (is_null($user)) redirect('admin/users');
        $url = url('user/password/update') . "/" . $id;
        $data = compact('url', 'user');

        return view('user.password')->with($data);
    }

    public function passwordupdate( request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
          ]);
        $user = Auth::user();  
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('user/dashboard');
    }

}