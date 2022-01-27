<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\ElementNode;

class home extends Controller
{
    public function index(){
        $admin = auth('admin')->user();

        if($admin->isAbleTo('delete-admins')){
            return 'good';
        } else {
            return 'false';
        }
        return view('admins.home');
    }
}
