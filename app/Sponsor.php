<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';

    public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }

    public function type(){
      return $this->hasOne('App\SponsorType', 'type_id', 'id');
    }
}
