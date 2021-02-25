<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }
}
