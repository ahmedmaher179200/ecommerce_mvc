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
    //ajax
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

        //get loves count
        $love_count =Love::where('user_id', auth('web')->user()->id)->count();

        return ['love_count' => $love_count];
    }

    //ajax
    public function addReview(Request $request){
        //**user should log in

        $review =  Review::create([
            'product_id'    => $request->product_id,
            'user_id'       => auth('web')->user()->id,
            'content'       => $request->content,
            'rating'        => $request->rating,
        ]);

        //get reviws count
        $reviews_count = Review::where('product_id', $request->product_id)->count();

        //html code
        $code = $this->review_html($review);

        return [
                    'code' => $code,
                    'reviews_count' => $reviews_count,
            ];
    }

    public function test(Request $request){
        return Review::first()->User->image->image;
    }

    //** helper function **//

    //review html for (ajax)
    public function review_html($review){
        $star = '';
        $none_star = '';
        for($i = 0; $i < $review->rating; $i++){
            $star .= '<i class="zmdi zmdi-star"></i>';
        }

        for($i = 0; $i < 5 - $review->rating; $i++){
            $none_star .= '<i class="zmdi zmdi-star-outline"></i>';
        }

        $code = '<div class="flex-w flex-t p-b-68">
                    <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                        <img src="' . url('public/uploads/users/' . $review->User->image->image). '" alt="AVATAR">
                    </div>

                    <div class="size-207">
                        <div class="flex-w flex-sb-m p-b-17">
                            <span class="mtext-107 cl2 p-r-20">'
                               . $review->User->name .
                            '</span>

                            <span class="fs-18 cl11">'.
                                    //star
                                    $star
                                    .
                                    $none_star
                                .'
                            </span>
                        </div>

                        <p class="stext-102 cl6">'
                            . $review->content .
                        '</p>
                    </div>
                </div>';

        return $code;
    }

}
