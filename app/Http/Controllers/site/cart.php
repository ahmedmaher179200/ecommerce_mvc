<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class cart extends Controller
{
    public function add(Request $request){
        //required product_id
        //required quantity
        //nullaple color
        //nullaple size

        $product = Product::active()->find($request->product_id);

        //if this product not found
        if($product == NULL){
            return false;
        }

        //check if user already add this product to cart
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id)
                return false;
        }

        //add to cart
        session()->push('cartItems',[
            'id'        => $request->product_id, 
            'quantity'  => $request->quantity,
            'color'     => $request->color,
            'size'      => $request->size,
            'price'     => $product->price,
            'discount'  => [
                                'percentage'  => $product->discount,
                                'value'       => $this->percentFromNumber($product->price, $product->discound),
                        ],
            'name'      => $product->name,
            'iamge'     => $product->images[0]->image,
        ]);

        return true;
    }

    public function remove(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id)
                session()->forget('cartItems.' . $key);
        }

        return true;
    }

    public function increment(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id)
                session(['cartItems.' . $key .'.quantity' => session()->get('cartItems')[$key]['quantity'] + 1]);
        }

        return true;
    }

    public function decrement(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id)
                session(['cartItems.' . $key .'.quantity' => session()->get('cartItems')[$key]['quantity'] - 1]);
        }

        return true;
    }

    public function test(Request $request){
        // session()->forget('cartItems.1');

        // session()->push('cartItems',[
        //     'id'        => 1, 
        //     'quantity'  => 2,
        //     'color'     => 'red',
        //     'size'      => 'lg',
        //     'price'     => 100,
        //     'discount'  => [
        //                         'percentage'  => 20,
        //                         'value'       => 20,
        //                 ],
        //     'name'      => 'truwser',
        //     'iamge'      => 'a1.jpg',

        //  ]);
        
        // return array_sum(array_map(function($item) { 
        //     return $item['price'] * $item['quantity']; 
        // }, session()->get('cartItems')));

        // foreach(session()->get('cartItems') as $key => $cartItem){
        //     if($cartItem['id'] == 1)
        //         echo $key;
        // }

        // session(['cartItems.0.quantity' => 10]);

        return session()->get('cartItems');
    }

}
