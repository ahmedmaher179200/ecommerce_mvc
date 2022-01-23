<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\vendor\loginRequest;
use App\Http\Requests\vendor\signUp;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authentication extends Controller
{
    public function loginView(){

        return view('vendors.login');
    }

    public function login(loginRequest $Request){
        if (Auth::guard('vendor')->attempt(['fullName' => $Request->username, 'password' => $Request->password])) {
            return redirect('vendors');
        }

        return redirect()->back()->with('error', trans('username or password is wrong') );
    }
    

    public function logout(){
        Auth::guard('vendor')->logout();

        return redirect('vendors/login');
    }

    public function signUpView(){
        return view('vendors.signUp');
    }

    public function signUp(signUp $Request){
        Vendor::create([
            'fullName'      => $Request->username,
            'email'         => $Request->email,
            'password'      => Hash::make($Request->password),
            'phone'         => $Request->phone,
            'status'        => 1,
        ]);

        return redirect('vendors/login')->with('success', 'sign up success');
    }
}
