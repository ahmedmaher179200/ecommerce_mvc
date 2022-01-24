<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class home extends Controller
{
    public function homeView(){
        //get count of all order
        $all_order_count = Orderdetail::whereHas('Product', function($q){
            $q->where('vendor_id', auth('vendor')->user()->id);
        })->count();

        //get count of finshed order
        $finshed_order_count = Orderdetail::whereHas('Product', function($q){
            $q->where('vendor_id', auth('vendor')->user()->id);
        })->whereHas('Order', function($q){
            $q->where('status', 2);
        })->count();

        //get total money
        $total_money = Orderdetail::whereHas('Product', function($q){
            $q->where('vendor_id', auth('vendor')->user()->id);
        })->whereHas('Order', function($q){
            $q->where('status', 2);
        })->sum('product_total_price');

        return view('vendors.home.index')->with([
            'all_order_count'       => $all_order_count,
            'finshed_order_count'   => $finshed_order_count,
            'total_money'           => $total_money,
        ]);
    }
}
