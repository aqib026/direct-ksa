<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\FeaturedSales;
use App\Models\UserVisaApplications;
use App\Models\Countries;
use App\Models\VisaNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Note;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user = Auth()->user();
            if ($user->usertype == 'customer') {
                return view('user.layout.dashboard');
            }if ($user->usertype == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back();
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
            'password_confirmation' => 'required|same:password',
            'number'                 => 'required'

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
        $user->number    = $request['number'];
        $user->usertype = 'customer';
        $user->save();

        return redirect('otp/login');
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

        return redirect()->back()->with('success', 'Profile Has Been Updated Successfully.');
    }
    public function passwordedit()
    {
        $user = Auth::user();
        if (is_null($user)) redirect('admin/users');
        $url = url('user/password/update');
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

        return redirect()->back()->with('success', 'Password Has Been Updated Successfully.');
    }

    public function services()
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $accre = FeaturedSales::where('user_id',Auth::user()->id)->get();
                $data=compact('accre');
                return view('user.services')->with($data);
            } else {
                return redirect()->back();
            }
        }
    }

    public function servicesdetail($id)
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $featured_sale = FeaturedSales::find($id);
                $notes = Note::where('featured_id', $id)->get();
                $data = compact('featured_sale','notes');
                return view('user.servicesdetail')->with($data);
            } else {
                return redirect()->back();
            }
        }
    }

    public function visarequests()
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $country = '';
                $accre = UserVisaApplications::where('user_id',Auth::user()->id)->get();
                $data = array();
                foreach ($accre as $acc) {
                    $data[$acc['id']] = unserialize($acc['content']);
                    $country = countries::where('id', $data[$acc['id']]['country'])->first();
                    $data[$acc['id']]['country_name'] =  $country;
                }
                return view('user.visarequests', compact('data'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function visarequest($id)
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $country = '';
                $accre = UserVisaApplications::find($id);
                $data = array();
                $data = unserialize($accre['content']);
                $country = countries::where('id', $data['country'])->first();
                $data['country_name'] =  $country;
                $notes = VisaNote::where('visa_request_id', $id)->get();
                return view('user.visarequestdetail', compact('data','notes'));
            } else {
                return redirect()->back();
            }
        }
    }
}
