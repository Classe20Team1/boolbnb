<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment', 'apartments_services', 'apartment_id', 'service_id');
    }
}
