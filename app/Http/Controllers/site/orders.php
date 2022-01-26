<?php

namespace App\Http\Controllers\site;

use App\Events\vendor_notification as EventsVendor_notification;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Vendor_notification;
use Illuminate\Http\Request;

class orders extends Controller
{
    public function makeOrder(){
        //get totle cart price
        $totle_cart_price = array_sum(array_map(function($item) { 
            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
        }, session()->get('cartItems')));
        
        //create order
        $order = Order::create([
            'user_id'       => auth('web')->user()->id,
            'status'        => 0,
            'total'         => $totle_cart_price,
            'final_total'   => null,
            'shipping_cost' => 5,
        ]);

        //create order details
        foreach(session()->get('cartItems') as $cartItem){
            $this->makeOrderDetails($cartItem, $order);
        }

        //cart empty
        session()->forget('cartItems');

        return 'good';
    }

    public function makeOrderDetails($cartItem, $order){
        //get totle item price
        $totle_item_price = ($cartItem['price'] - $cartItem['discount']['value']) * $cartItem['quantity'];
        
        //get product discound
        if($cartItem['discount']['percentage'] == null){
            $discound = 0;
        } else{
            $discound = $cartItem['discount']['percentage'];
        }
        //create order details
        Orderdetail::create([
            'product_id'          => $cartItem['id'],
            'order_id'            => $order->id,
            'quantity'            => $cartItem['quantity'],
            'product_price'       => $cartItem['price'],
            'product_discound'    => $discound,
            'product_total_price' => $totle_item_price,
            'color'               => $cartItem['color'],
            'size'                => $cartItem['size'],
        ]);

        //get product
        $product = Product::find($cartItem['id']);

        //creat notification
        $vendor_notification = $this->createOrderNotification($product->Vendor->id, 'title', 'content');

        //send notificaiton
        $new_notifications = Vendor_notification::where('vendor_id', auth('vendor')->user()->id)
                                                ->where('seen', 0)
                                                ->get();
        $data = [
            'vendor_id'         => $product->Vendor->id,
            'count'             => count($new_notifications),
            'notification_html' => $this->notification_html($vendor_notification->title, $vendor_notification->content, $vendor_notification->created_at),
        ];
        event(new EventsVendor_notification($data));
    }

    public function createOrderNotification($vendor_id, $title, $content){
        //get product
        $vendor_notification = Vendor_notification::create([
            'user_id'   => auth('web')->user()->id,
            'vendor_id' => $vendor_id,
            'type'      => 1,
            'title'     => $title,
            'content'   => $content,
            'seen'      => 0,
        ]);

        return $vendor_notification;
    }

    // html
    public function notification_html($title, $content, $created_at){
        $code = '<div class="media">
        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
        <div class="media-body">
          <h6 class="media-heading">' . $title . '</h6>
          <p class="notification-text font-small-3 text-muted">' . $content . '</p>
          <small>
            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">' . $created_at . '</time>
          </small>
        </div>
      </div>';

      return $code;
    }
}
