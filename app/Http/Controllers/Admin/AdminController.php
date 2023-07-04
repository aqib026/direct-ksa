<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\image;
use App\Http\Controllers\Controller;




use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url('admin/add-user');
        $title = "Add User";
        $data = compact('url', 'title');
        return view('auth.editregister')->with($data);
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

        $user = new Admin;

        $user->name     = $request['name'];
        $user->email    = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->usertype = $request['usertype'];
        $user->save();

        return redirect('admin/users');
    }


    public function show(request $request)
    {
        
        $search = $request["search"] ?? "";
        
        if ($search != "") {
            $users = Admin::where('usertype', '!=', 'customer')->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");                      
            })->paginate(20);
        } else {
             $users = Admin::where('usertype', '!=', 'customer')->paginate(20);     
        }
        $data = compact('users', 'search');
        return view('admin.users')->with($data);
    }

    public function customer(request $request)
    {
        
        $search = $request["search"] ?? "";
        
        if ($search != "") {
            $users = Admin::where('usertype', '=', 'customer')->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");                      
            })->paginate(20);
        } else {
             $users = Admin::where('usertype', '=', 'customer')->paginate(20);     
        }
        $data = compact('users', 'search');
        return view('admin.customer.customer')->with($data);
    }

    public function destroy($id)
    {

        $user = Admin::find($id);
        if (!is_null($user));
        $user->delete();

        return redirect()->back();
    }

    /**
     * Edit resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::find($id);

        if (is_null($user)) redirect('admin/users');

        $title = "Edit User Registration";
        $url = url('admin/user/update') . "/" . $id;
        $data = compact('url', 'user', 'title');

        return view('auth.editregister')->with($data);
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

        $user = Admin::find($id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        if ($request['password'] !== "" && $request['password'] == $request['password_confirmation'] && !is_null($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->usertype = $request['usertype'];
        $user->save();

        return redirect('admin/users');
    }
    public function customeredit($id)
    {
        $user = Admin::find($id);

        if (is_null($user)) redirect('admin/users');

        $title = "Edit User Registration";
        $url = url('admin/customer/update') . "/" . $id;
        $data = compact('url', 'user', 'title');

        return view('admin.customer.editcustomer')->with($data);
    }

    public function customerupdate($id, request $request)
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

        $user = Admin::find($id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        if ($request['password'] !== "" && $request['password'] == $request['password_confirmation'] && !is_null($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->usertype = 'customer';
        $user->save();

        return redirect('admin/customer');
    }


    public function setting()
    {
        $url = url('/admin/setting');    // we have to do this for update form
        $data = compact('url');

        return view('admin.setting')->with($data);
    }

    public function new($id)
    {
        $user = Admin::find($id);

        if (is_null($user))
            redirect('admin/dashboard');

        $title = "Edit Profile";
        $url = url('admin/profile/update') . "/" . $id;
        $data = compact('url', 'user', 'title');

        return view('auth.profile')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($id, Request $request)
    {
        $user = Admin::find($id);

        $user->name     = $request['name'];
        if (isset($request) && !empty($request->file('profile_pic'))) {

            $profile = time() . "p." . $request->file('profile_pic')->getClientOriginalExtension();
            $user->profile_pic = $request->file('profile_pic')->storeas('profile', $profile);
        }
        $user->save();

        return redirect('admin/dashboard');
    }
}
