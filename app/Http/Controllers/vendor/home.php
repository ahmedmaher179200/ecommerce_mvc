<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class home extends Controller
{
    public function homeView(){
        return view('vendors.home.index');
    }

    public function test(){
        return 'saf';
    }
}
