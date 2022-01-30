<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class users extends Controller
{
    public function index(){
        $users = User::get();
        return view('admins.users.index')->with('users', $users);
    }

    public function block($id){
        //sellect user
        $user = User::find($id);

        if($user == null)
            return redirect('admins/users')->with('error', 'this user not found');
        
        //change user status
        if($user->status == 0){
            $user->status = 1;
        } else {
            $user->status = 0;
        }  
        $user->save();
        
        return redirect('admins/users')->with('success', 'success');
    }
}
