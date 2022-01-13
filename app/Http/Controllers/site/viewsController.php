<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    public function homeView(){
        $products = Product::active()->limit(10)->get();
        return view('site.home')->with([
            'products' => $products,
        ]);
    }

    public function productDetails($id){
        $product = Product::active()->find($id);
        return view('site.productDetails')->with([
            'product' => $product,
        ]);
    }

    public function shop(){
        return view('site.shop');
    }
}
