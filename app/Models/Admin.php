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

    public function getRole(){
        if(count($this->roles) > 0){
            return $this->roles[0]->name;
        } else {
            return null;
        }
    }

    public function getRoleId(){
        if(count($this->roles) > 0){
            return $this->roles[0]->id;
        } else {
            return null;
        }
    }
}
