<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class orders extends Controller
{
    public function showView(){
        $orders_orderdetail = Orderdetail::whereHas('Product', function($query){
            $query->where('vendor_id', auth('vendor')->user()->id);
        })->get();
            
        return view('vendors.orders.ordersView')->with('orders_orderdetail', $orders_orderdetail);
    }

    // public function changeStage($id){
    //     $Reqest = ModelsRequest::find($id);

    //     if(!empty($Reqest)){
    //         if($Reqest->stage == 0){
    //             $Reqest->stage = 2;
    //         } else if($Reqest->stage == 2){
    //             $Reqest->stage = 0;
    //         }
    //         $Reqest->save();
            
    //     } 
    //     return redirect('restaurant/orders')->with('success', trans('restaurant.success') );

        
    // }
}
