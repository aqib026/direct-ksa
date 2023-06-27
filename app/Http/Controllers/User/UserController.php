<?php

namespace App\Http\Controllers\user;

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

    public function edit($id)
    {
        $user = admin::find($id);

        if (is_null($user)) redirect('admin/users');

        $url = url('user/profile/update') . "/" . $id;
        $data = compact('url', 'user');

        return view('user.updateprofile')->with($data);
    }

    public function update($id, request $request)
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

        $user = admin::find($id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->number    = $request['number'];
        $user->usertype = 'customer';
        $user->save();

        return redirect('user/dashboard');
    }
    public function passwordedit($id)
    {
        $user = admin::find($id);

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