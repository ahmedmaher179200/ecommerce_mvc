<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Love;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class viewsController extends Controller
{
    public function homeView(){
        $products = Product::active()
                                ->orderBy('number_of_sell', 'desc')
                                ->limit(10)->get();
                                
        return view('site.home')->with([
            'products' => $products,
        ]);
    }

    public function productDetails($product_id){
        //sellect product
        $product = Product::active()->find($product_id);

        //if product not found
        if($product == NULL)
            return redirect('');

        //sellect product reviews
        $reviews = Review::where('product_id', $product_id)->paginate(4);

        //get reviews count
        $reviews_count = Review::where('product_id', $product_id)->count();


        //sellect related products 
        $related_products = Product::active()
                                    ->where('sub_categoriesId', $product->sub_categoriesId)
                                    ->where('id', '!=', $product->id)
                                    ->limit(8)
                                    ->get();

        return view('site.productDetails')->with([
            'product'           => $product,
            'related_products'  => $related_products,
            'reviews'           => $reviews,
            'reviews_count'     => $reviews_count,
        ]);
    }

    public function shop(Request $request){
        $products = products::ProductsFilter($request);

        return view('site.shop')->with([
            'products' => $products,
        ]);
    }

    public function cartView(){
        return view('site.cart');
    }

}
