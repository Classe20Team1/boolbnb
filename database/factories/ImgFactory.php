<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Img;
use Faker\Generator as Faker;
use App\Apartment;

$factory->define(Img::class, function (Faker $faker) {

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
        for($i = 1; $i <= 4; $i++){
            $num = $faker->numberBetween(0,8);
            DB::table('images')->insert([

                'apartment_id' => $apartment->id,
                'path' => $array[$num],
            ]);

        }

    }
});
