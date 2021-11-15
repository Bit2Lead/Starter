<?php

namespace App\Http\Controllers\Admin\Signin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Signin_model;
use Auth;

class Signin extends Controller
{
    public function __construct()
    {
        $this->Signin_model = new Signin_model();
    }
    public function index()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $smg = [
            'password.required' => 'Password field is required!',
            'email.required' => 'Email field is required!',
            'password.min' => 'Must be at least 6 characters!',
            'email.email' => 'Must be an email address!'
        ];
        $data = Request::all();
        $validator = Validator::make($data, $rules, $smg);
        
        if($validator->fails())
        {
            return response()->json([
                'validator' => $validator->errors()
            ]);
        }else
        {
            $auth = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
            if($auth){
                return response()->json([
                    'status' => 200,
                    'message' => "Login success"
                ]);
            }else
            {
               return response()->json([
                    'status' => 'auth_error',
                    'auth_error' => "Incorrect email or password!"
                ]); 
            }
            
        }

        
    }
}
