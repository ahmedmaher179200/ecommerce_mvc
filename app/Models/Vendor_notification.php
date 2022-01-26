<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_notification extends Model
{
    use HasFactory;
    protected $table = "vendor_notifications";
    protected $guarded = [];

    protected $casts = [
        'user_id' => 'integer',
        'vendor_id' => 'integer',
    ];

    //relations
    public function User(){
        return $this->BelongsTo(User::class,'user_id');
    }

    public function Vendor(){
        return $this->BelongsTo(Vendor::class,'vendor_id');
    }
}
