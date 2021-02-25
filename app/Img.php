<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Img extends Model
{
    protected $table = 'imgs';

    public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }


}
