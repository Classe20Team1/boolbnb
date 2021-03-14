<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use Faker\Generator as Faker;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();
        foreach($apartments as $apartment){
            $active = $faker->numberBetween(0,1);
            if($active){
                DB::table('sponsors')->insert([
                    'apartment_id' => $apartment->id,
                    'type_id' => 3,
                    'date_start' => Carbon::now()->format('Y-m-d H:i:s'),
                    'date_end' => Carbon::now()->addDays(6)->format('Y-m-d H:i:s'),
                ]);
            }

        }

    }
}
