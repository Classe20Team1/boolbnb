<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;
use Illuminate\Support\Facades\DB;
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
          ->whereDate('date_end', '>=', $today)
          ->get();

    $array = [];
    foreach ($filtered as $sponsor){
        array_push($array, $sponsor->apartment_id);
    }
        $apartments = Apartment::all();
        foreach($apartments as $apartment){
            if (in_array($apartment->id, $array)){
                DB::table('apartments')
                    ->where('id', $apartment->id)
                    ->update(['active' => 1]);
            } else {
                DB::table('apartments')
                    ->where('id', $apartment->id)
                    ->update(['active' => 0]);
            }
        }

      return $filtered;
    }
}
