<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;
use App\Apartment;

$factory->define(Message::class, function (Faker $faker) {

    $apartments = Apartment::all();

    return [

        'apart_id'=>$faker->numberBetween(1, $apartments->count()),
        'description'=>$faker->text,
        'user_email'=>$faker->email,
        'readed'=>$faker->boolean,
    ];
});
