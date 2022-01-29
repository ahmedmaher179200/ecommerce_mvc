<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class products extends Controller
{
    public function index(){
        //select all products that not delete
        $products = Product::where('status', '!=', -1)->get();
        return view('admins.products.index')->with('products', $products);
    }

    public function delete($id){
        //get product
        $product = Product::find($id);

        //if product not found
        if($product == null)
            return redirect('admins/products')->with('error', 'delete product faild');

        //delte product
        $product->status = -1;
        $product->save();

        return redirect('admins/products')->with('success', 'delete product success');
    }

    public function changeStatus($id){
        //get product
        $product = Product::find($id);

        //if product not found
        if($product == null)
            return redirect('admins/products')->with('error', 'change product status faild');

        if($product->status == 0){
            $product->status = 1;
        } else {
            $product->status = 0;
        }
        $product->save();

        return redirect('admins/products')->with('success', 'change product status success');
    }
}
