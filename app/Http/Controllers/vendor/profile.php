<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\vendor\editProfile;
use App\Models\Image;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class profile extends Controller
{
    public function editeView(){
        $vendor = Vendor::find(auth('vendor')->user()->id);

        return view('vendors.profile.editeView')->with('vendor', $vendor);
    }

    public function editeProfile(editProfile $Request){
        //get vendor for guard
        $vendor = Vendor::find(auth('vendor')->user()->id);

        //check if user change password
        if($Request->password == NULL){
            $password = $vendor->password;
        } else{
            $password = Hash::make($Request->password);
        }

        //update data
        $vendor->fullName       = $Request->username;
        $vendor->email          = $Request->email;
        $vendor->password       = $password;
        $vendor->phone          = $Request->phone;
        $vendor->save();

        //change image
        if($Request->hasFile('image')){
            //delete old image
            if(!empty($vendor->image)){
                if(file_exists(base_path('public/uploads/vendors/' . $vendor->image->image))){
                    unlink(base_path('public/uploads/vendors/' . $vendor->image->image));
                }
                $vendor->image->delete();
            }

            //update new images
            $image_path = $this->upload_image($Request->file('image'), 'uploads/vendors', 110, 120);
            Image::create([
                'imageable_id'   => $vendor->id,
                'imageable_type' => 'App\Models\Vendor',
                'image'          => $image_path,
            ]);
        }

        return redirect('vendors')->with('success', 'edite profile success' );
    }
}
