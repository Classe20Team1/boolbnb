<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  
  protected $table = 'positions';

  protected $fillable = [
    'title',
    'apartment_id',
    'description',
    'bathrooms',
    'price',
    'beds',
    'rooms',
    'longitude',
    'latitude',
    'metri_quadrati',
    'services',
    '_token',
    'address',
    'city',
  ];
  
  public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }

  public static function radius($latitude, $longitude, $radius)
  {

    $filtered = Position::selectRaw("id, apartment_id, address, latitude, longitude,
                     ( 6371 * acos( cos( radians($latitude) ) *
                       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians($longitude)
                       ) + sin( radians($latitude) ) *
                       sin( radians( latitude ) ) )
                     ) AS distance", [$latitude, $longitude, $radius])
      ->havingRaw("distance < $radius")
      ->orderBy("distance", 'asc')
      ->limit(20)
      ->get();

    return $filtered;
  }
}

