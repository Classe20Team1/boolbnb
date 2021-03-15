<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use Faker\Generator as Faker;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();
        $apartments = Apartment::all();
        $array = [
            [
                'lon_max' => 12.505016,
                'lat_max' => 41.905727,
                'lon_min' => 12.456951,
                'lat_min' => 41.867260,
            ],[
                'lon_max' => 14.233003,
                'lat_max' => 40.837840,
                'lon_min' => 14.265318,
                'lat_min' => 40.872118,
            ],[
                'lon_max' => 9.217100,
                'lat_max' => 45.486012,
                'lon_min' => 9.155903,
                'lat_min' => 45.451943,
            ],[
                'lon_max' => 12.337260,
                'lat_max' => 45.444175,
                'lon_min' => 12.321897,
                'lat_min' => 45.431648,
            ],[
                'lon_max' => 9.135561,
                'lat_max' => 39.230923,
                'lon_min' => 9.111700,
                'lat_min' => 39.213502,
            ],[
                'lon_max' => 8.966002,
                'lat_max' => 44.411467,
                'lon_min' => 8.935876,
                'lat_min' => 44.399080,
            ],
        ];
        foreach($apartments as $apartment){
            $i =  $faker->numberBetween(0,5);
            DB::table('positions')->insert([
                'apartment_id'=>$apartment->id,
                'latitude'=> $faker->latitude(
                    $array[$i]['lat_min'],
                    $array[$i]['lat_max']
                ),
                'longitude'=>$faker->longitude(
                    $array[$i]['lon_min'],
                    $array[$i]['lon_max']
                ),
                'address'=> $faker->streetAddress,
            ]);

        }
    }
}
