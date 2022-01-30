<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\create;
use App\Http\Requests\admin\createPromocodesRequest;
use App\Models\Promo_code;
use Illuminate\Http\Request;

class promoCodes extends Controller
{
    public function index(){
        //select all admin
        $promo_codes = Promo_code::get();
        return view('admins.promoCodes.index')->with('promo_codes', $promo_codes);
    }

    public function createView(){
        return view('admins.promoCodes.create');
    }

    public function create(createPromocodesRequest $request){
        Promo_code::create([
            'code'          => $request->code,
            'discound'      => $request->discound,
            'expire_date'   => $request->expire_date,
        ]);

        return redirect('admins/promocodes')->with('success', 'add promo code success');
    }

    public function expiry($id){
        //sellect Promo_code
        $promo_code = Promo_code::find($id);

        if($promo_code == null)
            return redirect('admins/promocodes')->with('error', 'faild');
        

        $promo_code->update(['expire_date'=> '2001-01-01 01:00:00']);

        return redirect('admins/promocodes')->with('success', 'success');
        
    }
}
