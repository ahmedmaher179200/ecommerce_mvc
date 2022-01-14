<?php

namespace App\Http\Controllers\site\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as authentication;

class auth extends Controller
{
    public function loginView(){
        return view('site.login');
    }

    public function login(Request $request){
        $credentials = ['name' => $request->username, 'password' => $request->password];
        //login
        if (authentication::guard('web')->attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back();
    }

    public function logout(){
        authentication::guard('web')->logout();

        return redirect('/login');
    }
}
