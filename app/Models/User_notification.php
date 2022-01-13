<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User_notification extends Model
{
    use HasFactory;

    protected $table = "user_notifications";
    protected $guarded = [];

    protected $casts = [
        'user_id' => 'integer',
    ];

    //relations
    public function User(){
        return $this->BelongsTo(User::class,'user_id');
    }
}
