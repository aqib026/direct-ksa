<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email:rfc,dns|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
            'Number'=>'required|regex:/^[0-9]{9,20}$/ |unique:users'

        ]);
        if ($validator->fails()) {
            $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input=$request->all();
        $input['usertype']='customer';
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);
        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $success['name']=$user->name;

        $response=[
            'success'=>true,
            'data'=> $success,
            'message'=>'User Register Successfully'
        ];
        return response()->json($response, 200);
    }



    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $user=Auth::user();
            $success['token']=$user->createToken('MyApp')->plainTextToken;
            $success['name']=$user->name;

            $response=[
                'success'=>true,
                'data'=> $success,
                'message'=>'User Login Successfully'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success'=>false,
                'message'=>'unauthorised'
            ];
            return response()->json($response, );
        }
    }
}
