<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function percentFromNumber($number, $percent){
        return ($number / 100) * $percent;
    }

    public function upload_image($image, $path, $width = 300, $height = 300){
        /*
            $image     image                                => required
            $path      path that i upload image in it       => required
            $width     image with                           => nullable
            $height    iamge height                         => nullable
        */

        //cange iamge name to random number
        $image_name = rand(0,1000000) . time() . '.' . $image->getClientOriginalExtension();
    
        $image_resize = Image::make($image->getRealPath());   
        $image_resize->resize($height, $width);
        $image_resize->save(public_path($path . '/' . $image_name));
        
        return $image_name;
    }
}
