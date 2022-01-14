<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Love;
use App\Models\Product;
use Illuminate\Http\Request;

class products extends Controller
{
    public function love($id){
        $product = Product::active()->find($id);

        //if product = null
        if($product == null)
            return "faild";

        //get love
        $love    = Love::where('user_id', auth('web')->user()->id)
                        ->where('product_id', $product->id)
                        ->first();

        if($love == NULL){
            //add love
            Love::create([
                'product_id' => $id,
                'user_id'    => auth('web')->user()->id, 
            ]);
        } else {
            //delete love
            $love->delete();
        }

        return "good";
    }

    //helper function

}
