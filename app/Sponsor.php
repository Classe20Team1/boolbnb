<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Sponsor extends Model
{
    protected $table = 'sponsors';

    public function apartment(){
      return $this->belongsTo('App\Apartment', 'apartment_id', 'id');
    }

    public function type(){
      return $this->hasOne('App\SponsorType', 'type_id', 'id');
    }

    public static function active()
    {
      $date = Carbon::now();
      $today = $date->format('Y-m-d');
      $filtered = Sponsor::select()
      ->whereDate('date_start', '<=', $today)
      ->whereDate('date_end', '>=', $today)
      ->get();

      return $filtered;
    }
}
