<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor_notification;
use Illuminate\Http\Request;

class notification extends Controller
{
    //ajax
    public function notification_seen(){
        //get vendor notification
        $vendor_notifications = Vendor_notification::where('vendor_id', auth('vendor')->user()->id)
                                                    ->where('seen', 0)
                                                    ->get();

        foreach($vendor_notifications as $vendor_notification){
            $vendor_notification->seen = 1;
            $vendor_notification->save();
        }
    }
}
