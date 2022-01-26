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
        if(session()->has('cartItems')){
            foreach(session()->get('cartItems') as $key => $cartItem){
                //get index of product in cart item session
                if($cartItem['id'] == $request->product_id)
                    return false;
            }
        }

        //add to cart
        session()->push('cartItems',[
            'id'        => $request->product_id, 
            'quantity'  => $request->quantity,
            'color'     => $request->color,
            'size'      => $request->size,
            'price'     => $product->price,
            'discount'  => [
                                'percentage'  => $product->discound,
                                'value'       => $this->percentFromNumber($product->price, $product->discound),
                        ],
            'name'      => $product->name,
            'iamge'     => $product->images[0]->image,
        ]);

        //nav cart html for ajax
        $nav_cart_html = $this->nav_cart_html($request, $product);

        //totle item price
        $totle_price = array_sum(array_map(function($item) { 
            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
        }, session()->get('cartItems')));

        return [
            'status'            => true,
            'cartItems_count'   => count(session()->get('cartItems')),
            'nav_cart_html'     => $nav_cart_html,
            'totle_price'       => round($totle_price, 2),
        ];
    }

    public function remove(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id)
                session()->forget('cartItems.' . $key);
        }

        //totle item price
        $totle_price = array_sum(array_map(function($item) { 
            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
        }, session()->get('cartItems')));

        return [
            'status'            => true,
            'cartItems_count'   => count(session()->get('cartItems')),
            'totle_price'       => round($totle_price, 2),
        ];
    }

    public function increment(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id){
                session(['cartItems.' . $key .'.quantity' => session()->get('cartItems')[$key]['quantity'] + 1]);
                $item = session()->get('cartItems');
                $product_quantity = $item[$key]['quantity'];
                $totle_item_price = round(($item[$key]['price'] - $item[$key]['discount']['value']) * $item[$key]['quantity'], 2);
            }
        }

        //totle cart price
        $totle_price = array_sum(array_map(function($item) { 
            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
        }, session()->get('cartItems')));

        return [
            'status'            => true,
            'totle_price'       => round($totle_price, 2),
            'totle_item_price'  => $totle_item_price,
            'product_quantity'  => $product_quantity,
        ];
    }

    public function decrement(Request $request){
        foreach(session()->get('cartItems') as $key => $cartItem){
            //get index of product in cart item session
            if($cartItem['id'] == $request->product_id){
                session(['cartItems.' . $key .'.quantity' => session()->get('cartItems')[$key]['quantity'] - 1]);
                $item = session()->get('cartItems');
                $product_quantity = $item[$key]['quantity'];
                $totle_item_price = round(($item[$key]['price'] - $item[$key]['discount']['value']) * $item[$key]['quantity'], 2);
            }
        }

        //totle cart price
        $totle_price = array_sum(array_map(function($item) { 
            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
        }, session()->get('cartItems')));

        return [
            'status'            => true,
            'totle_price'       => round($totle_price, 2),
            'totle_item_price'  => $totle_item_price,
            'product_quantity'  => $product_quantity,
        ];
    }

    //html
    public function nav_cart_html($request, $product){
        $nav_cart_html =    '<li class="header-cart-item flex-w flex-t m-b-12 product-'. $request->product_id .' ">
                                <div class="header-cart-item-img remove-from-cart" data-product_id="' . $request->product_id. '">
                                    <img src="' . url('public/uploads/products/' . $product->images[0]->image). '" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt p-t-8">
                                    <a href="' . url('productDetails/' . $request->product_id). '" class="header-cart-item-name m-b-18 hov-cl1 trans-04">'
                                       . $product->name . 
                                    '</a>

                                    <span class="header-cart-item-info">
                                        <span class="quantity-' . $request->product_id . '">'
                                            .  $request->quantity . 'x' . ($product->price - $this->percentFromNumber($product->price, $product->discound)) . 
                                        '</span>
                                    </span>
                                </div>
                            </li>';
        
        return $nav_cart_html;
    }
}
