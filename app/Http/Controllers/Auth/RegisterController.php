<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'number' => 'required|regex:/^[0-9]{9,20}$/ |unique:users',
        ], [
            'number.regex'      => __('register.number_regex_validation'),
            'number.unique'    => __('register.number_unique_validation'),
            'email.unique'    => __('register.email_unique_validation'),
            'email.email'    => __('register.email_regix_validation'),
            'email.required'    => __('register.email_required_validation'),
            'name.required'    => __('register.name_required_validation'),
            'number.required'    => __('register.number_required_validation'),
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
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'number' => '+966'.$data['number'],
            'password' => Hash::make($data['password']),
            'usertype'=>'customer',

        ]);
        try {
            $user->sendEmailVerificationNotification();
        } catch(Exception $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/user-verify-email-send.log'),
             ])->info('There is problem while sending email: /n '.print_r($e->getMessage(), true));
        }
       

        return $user;
    }
}
