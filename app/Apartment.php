<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = [
      'title',
      'description',
      'bathrooms',
      'price',
      'beds',
      'rooms',
      'metri_quadrati',
      'services',
      '_token',
      'address',
      'city',
      'cover_img'
    ];

    public function user(){
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function imgs(){
      return $this->hasMany('App\Img', 'apartment_id', 'id');
    }

    public function messages(){
      return $this->hasMany('App\Message', 'apartment_id', 'id');
    }

    public function position(){
      return $this->hasOne('App\Position', 'apartment_id', 'id');
    }

    public function sponsors(){
      return $this->hasMany('App\Sponsor', 'apartment_id', 'id');
    }
    public function services()
    {
      return $this->belongsToMany('App\Service', 'apartment_service');
    }
}
