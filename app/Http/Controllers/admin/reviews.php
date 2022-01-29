<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class reviews extends Controller
{
    public function index(){
        //select all reviews that not delete
        $reviews = Review::get();
        return view('admins.reviews.index')->with('reviews', $reviews);
    }

    public function delete($id){
        //get peview
        $peview = Review::find($id);

        //if peview not found
        if($peview == null)
            return redirect('admins/reviews')->with('error', 'delete peviews faild');

        //delte peview
        $peview->delete();

        return redirect('admins/reviews')->with('success', 'delete peview success');
    }
}
