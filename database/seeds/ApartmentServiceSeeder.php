<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facade\DB;
use App\Apartment;
use App\Service;
use Faker\Generator as Faker;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $apartments = Apartment::all();
      $services = Service::all();

      foreach ($apartments as $apartment){
        for ($i = 0; $i < $faker->numberBetween(1, $services->count()); $i++){
          DB::table('apartments_services')->insert([
            'apartment_id' => $apartment->id,
            'service_id' => $i
          ]);
        }
      }
    }
}
