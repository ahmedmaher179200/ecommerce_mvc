<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $guarded = [];

    protected $casts = [
        'id'            => 'integer',
        'product_id'    => 'integer',
        'user_id'       => 'integer',
        'rating'        => 'integer',
    ];
    //relations
    public function Product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
