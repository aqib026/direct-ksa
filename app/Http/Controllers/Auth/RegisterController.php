<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'number' => 'required|regex:/^[0-9]{9,14}$/ |unique:users',
        ], [
            'number.regex'      => 'Mobile number must be at least 9 digits',
            'number.unique'    => 'Mobile number already exists',
            'email.unique'    => 'Email already exists',
            'email.email'    => 'Enter valid email address',
            'email.required'    => 'Email is required',
            'name.required'    => 'Name is required',
            'number.required'    => 'Mobile number is required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => '+966'.$data['number'],
            'password' => Hash::make($data['password']),
            'usertype'=>'customer',

        ]);
        $user->sendEmailVerificationNotification();

        return $user;
    }
}
