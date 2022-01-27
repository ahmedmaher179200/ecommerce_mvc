<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use LaratrustUserTrait;

    protected $table = 'admins';

    protected $guarded = [];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //relations
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //
    public function getImage(){
        if(!empty($this->image)){
            return $this->image->image;
        } else {
            return 'a1.jpg';
        }
    }
}
