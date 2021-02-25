<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }
}
