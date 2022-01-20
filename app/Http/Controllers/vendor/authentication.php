<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\vendor\loginRequest;
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

    // public function signUpView(){

    //     return view('restaurants.signUp');
    // }

    // public function signUp(signUpRestaurant $Request){
    //     Restaurant::create([
    //         'username'      => $Request->username,
    //         'email'         => $Request->email,
    //         'password'      => Hash::make($Request->password),
    //         'name'          => $Request->name,
    //         'active'        => 0,
    //     ]);
    //     return redirect('restaurant/login')->with('success', trans('restaurant.sign up success') );
    // }
}
