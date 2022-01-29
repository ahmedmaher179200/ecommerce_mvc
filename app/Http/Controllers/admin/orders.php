<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class orders extends Controller
{
    public function index(){
        //select all orders that not delete
        $orders = Order::get();
        return view('admins.orders.index')->with('orders', $orders);
    }

    public function cancel($id){
        //get order
        $order = Order::find($id);

        //if order not found
        if($order == null)
            return redirect('admins/orders')->with('error', 'change order status faild');

        $order->status = -1;
        $order->save();

        return redirect('admins/orders')->with('success', 'cancel order success');
    }

    public function nextStage($id){
        //get order
        $order = Order::find($id);

        //if order not found
        if($order == null)
            return redirect('admins/orders')->with('error', 'change order status faild');

        //next stage
        if($order->status < 2){
            $order->status += 1;
        }
        $order->save();
        
        return redirect('admins/orders')->with('success', 'change order status success');
    }
}
