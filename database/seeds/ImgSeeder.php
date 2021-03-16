<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use Faker\Generator as Faker;


class ImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();
        $array = [
            'images/sofa2.png',
            'images/sofa3.jpg',
            'images/sofa4.jpg',
            'images/sofa5.jpg',
            'images/sofa6.jpg',
            'images/sofa7.jpg',
            'images/sofa1.jpg',
            'images/beds.jpg',
            'images/beds2.jpg',
        ];

        foreach($apartments as $apartment){
            for($i = 1; $i <= 6; $i++){
                DB::table('images')->insert([
                    'apartment_id' => $apartment->id,
                    'path' => $array[$faker->numberBetween(0,8)],
                ]);

            }

        }
    }
}
