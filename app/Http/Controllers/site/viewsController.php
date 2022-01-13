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

        $related_products = Product::active()
                                    ->where('sub_categoriesId', $product->sub_categoriesId)
                                    ->where('id', '!=', $product->id)
                                    ->limit(8)
                                    ->get();

        return view('site.productDetails')->with([
            'product'           => $product,
            'related_products'  => $related_products,
        ]);
    }

    public function shop(){
        $products = Product::active()->get();

        return view('site.shop')->with([
            'products' => $products,
        ]);
    }
}
