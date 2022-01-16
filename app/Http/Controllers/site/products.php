<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Love;
use App\Models\Product;
use App\Models\Review;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class products extends Controller
{
    public function love(Request $request){
        //** product_id requied
        //** user should log in

        $product = Product::active()->find($request->product_id);

        //if product = null
        if($product == null)
            return "faild";

        //get love
        $love    = Love::where('user_id', auth('web')->user()->id)
                        ->where('product_id', $request->product_id)
                        ->first();

        if($love == NULL){
            //add love
            Love::create([
                'product_id' => $request->product_id,
                'user_id'    => auth('web')->user()->id, 
            ]);
        } else {
            //delete love
            $love->delete();
        }

        return "good";
    }

    public function addReview(Request $request){
        //**user should log in

        $review =  Review::create([
            'product_id'    => $request->product_id,
            'user_id'       => auth('web')->user()->id,
            'content'       => $request->content,
            'rating'        => $request->rating,
        ]);

        return $review;
    }

    public function test(Request $request){
        return Review::first()->User->image->image;
    }

    //helper function

}
