<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\addAdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class users extends Controller
{
    public function index(){
        //select all admin
        $admins = Admin::where('id', '!=', auth('admin')->user()->id)->get();
        return view('admins.admins.index')->with('admins', $admins);
    }

    public function delete($id){
        $admin = Admin::find($id);

        //if admin not found
        if($admin == null){
            return redirect('admins/admins');
        }

        //delete admin
        $admin->delete();

        return redirect('admins/admins');
    }

    public function createView(){
        $roles = Role::all();
        return view('admins.admins.create')->with('roles', $roles);
    }

    public function create(addAdminRequest $request){
        $admin = Admin::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        //add role to admin
        $admin->roles()->attach([$request->role_id]);

        return redirect('admins/admins');
    }
}
