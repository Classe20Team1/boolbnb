<?php

namespace App;
use App\User;
use App\Img;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';
    public function user(){
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function imgs(){
      return $this->hasMany('App\img', 'apartment_id', 'id');

    }
}
