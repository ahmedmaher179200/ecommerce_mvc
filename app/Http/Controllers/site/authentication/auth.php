<?php

namespace App\Http\Controllers\site\authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as authentication;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class auth extends Controller
{
    public function loginView(){
        return view('site.login');
    }

    public function login(Request $request){
        $credentials = ['name' => $request->username, 'password' => $request->password];
        //login
        if (authentication::guard('web')->attempt($credentials)) {
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'username or password is wrong');
    }

    public function logout(){
        authentication::guard('web')->logout();

        return redirect('/login');
    }

    public function signUpView(){
        return view('site.signUp');
    }

    public function signUp(Request $request){
            $validator = Validator::make($request->all(), [
                'username'         => 'required|string',
                'email'            => 'required|string|email|max:255|unique:users',
                'password'         => 'required|string|min:6',
                'confirm_password' => 'required|string|same:password',
            ]);

            if($validator->fails()){
                return redirect()->back()->with('error', $validator->errors());
            }

            User::create([
            'name'              => $request->get('username'),
            'email'             => $request->get('email'),
            'password'          => Hash::make($request->get('password')),
        ]);

        return redirect('login')->with('', 'sign up');
    }
}
