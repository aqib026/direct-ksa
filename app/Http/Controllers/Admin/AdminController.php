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
        $user = new admin;

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
            $users = admin::where('name', 'like', "%$search%")->orwhere('email', 'like', "%$search%")->get();
        } else {
            $users = admin::paginate(6);
        }
        $data = compact('users', 'search');
        return view('admin.users')->with($data);
    }

    public function destroy($id)
    {

        $user = admin::find($id);
        if (!is_null($user));
        $user->delete();

        return redirect()->back();
    }

    public function edit($id)
    {

        $user = admin::find($id);

        if (is_null($user))
            redirect('admin/users');

        $title = "Edit User Registration";
        $url = url('admin/user/update') . "/" . $id;
        $data = compact('url', 'user', 'title');

        return view('auth.editregister')->with($data);
    }

    public function update($id, request $request)
    {
        $user = admin::find($id);
        $user->name     = $request['name'];
        $user->email    = $request['email'];
        if ($request['password'] !== "" && $request['password'] == $request['password_confirmation'] && !is_null($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->usertype = $request['usertype'];
        $user->save();

        return redirect('admin/users');
    }

    public function setting()
    {
        $url = url('/admin/setting');    // we have to do this for update form
        $data = compact('url');

        return view('admin.setting')->with($data);
    }

    public function new($id)
    {
        $user = admin::find($id);

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
        $user = admin::find($id);

        $user->name     = $request['name'];
        if (isset($request) && !empty($request->file('profile_pic'))) {

            $profile = time() . "p." . $request->file('profile_pic')->getClientOriginalExtension();
            $user->profile_pic = $request->file('profile_pic')->storeas('profile', $profile);
        }
        $user->save();

        return redirect('admin/dashboard');
    }
}
