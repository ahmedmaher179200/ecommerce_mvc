<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\loginRequest;
use App\Http\Requests\admin\signUpRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authentication extends Controller
{
    public function loginView(){

        return view('admins.login');
    }

    public function login(loginRequest $Request){
        $credentials = ['username' => $Request->username, 'password' => $Request->password];
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admins');
        }

        return redirect()->back()->with('error', trans('username or password is wrong') );
    }
    

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect('admins/login');
    }
}
