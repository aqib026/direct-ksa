<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\image;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view(request $request)
{
    $users = admin :: all();
$data=compact('users');

 return view('admin.users')->with($data);

}

public function delete($id)
{
$user=admin::find($id);
if(!is_null($user));
{
$user->delete();
}
return redirect()->back();
}

public function edit($id)
{
    $user= admin::find($id);
    if(is_null($user))

    {
        redirect('admin/users');
    }
    else
    {
        $title="Edit User Registration";
        $url=url('admin/user/update')."/".$id;
        $data=compact('url','user','title');
        return view('auth.editregister')->with($data);
         
    }
}

public function update($id , request $request)
{

  $user= admin::find($id);

  $user->name=$request ['name'];
$user->email=$request['email'];
$user->password=bcrypt($request['password']);
$user->usertype=$request['usertype'];
// $user->file=$request['file'];

$user->save();
return redirect('admin/users');
}
public function setting()
{
    $url = url('/admin/setting');    // we have to do this for update form
   

    $data = compact ('url'); 
    return view('admin.setting')->with($data);
}



}


