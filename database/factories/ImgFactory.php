<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Img;
use Faker\Generator as Faker;
use App\Apartment;

$factory->define(Img::class, function (Faker $faker) {

    $apartments = Apartment::all();

    return [

          'apart_id'=>$faker->numberBetween(1, $apartments->count()),
          'path'=>$faker->url,
    ];
});
