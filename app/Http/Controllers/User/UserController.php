<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

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

        $title = "Edit User Registration";
        $url = url('user/profile/update') . "/" . $id;
        $data = compact('url', 'user', 'title');

        return view('user.updateprofile')->with($data);
    }

    public function update($id, request $request)
    {

        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password'
        ], [
            'name.required'                     => 'Name is required',
            'password.min'                      => 'Minimum 8 Characters are required',
            'password_confirmation.same'        => 'Confirm password doesnt matches with password',
            'email.required'                    => 'Email is required',
            'email.email'                       => 'Enter a valid Email'
        ]);

        $user = admin::find($id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        if ($request['password'] !== "" && $request['password'] == $request['password_confirmation'] && !is_null($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->usertype = 'customer';
        $user->save();

        return redirect('user/dashboard');
    }

}