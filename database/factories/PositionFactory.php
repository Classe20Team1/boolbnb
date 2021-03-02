<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Position;
use Faker\Generator as Faker;
use App\Apartment;

$factory->define(Position::class, function (Faker $faker) {

    $apartments = Apartment::all();

    return [
        'apartment_id'=>$faker->numberBetween(1, $apartments->count()),
        'latitude'=>$faker->latitude(41, 41.5),
        'longitude'=>$faker->longitude(12, 12.5),
        'address'=> $faker->streetAddress,
    ];
});
