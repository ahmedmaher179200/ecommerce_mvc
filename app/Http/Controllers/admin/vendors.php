<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class vendors extends Controller
{
    public function index(){
        $vendors = Vendor::get();
        return view('admins.vendors.index')->with('vendors', $vendors);
    }

    public function block($id){
        //sellect user
        $vendor = Vendor::find($id);

        if($vendor == null)
            return redirect('admins/vendors')->with('error', 'this user not found');
        
        //change user status
        if($vendor->status == 0){
            $vendor->status = 1;
        } else {
            $vendor->status = 0;
        }  
        $vendor->save();
        
        return redirect('admins/vendors')->with('success', 'success');
    }
}
