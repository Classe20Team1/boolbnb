<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {

    $users = User::all();
    $num_rooms = $faker->numberBetween(1, 4);
    $array = [
        'images/external2.jpg',
        'images/external3.jpg',
        'images/external4.jpg',
        'images/external5.jpg',
        'images/external6.jpg',
        'images/external7.png',
        'images/external1.png',
    ];
    return [
        'user_id' => $faker->numberBetween(1, $users->count()),
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'rooms' => $num_rooms,
        'beds' => $faker->numberBetween($num_rooms, $num_rooms*2),
        'bathrooms' => $faker->numberBetween(1, 3),
        'metri_quadrati' => $num_rooms*70,
        'active' => $faker->numberBetween(0,1),
        'views_count' => 0,
        'price' => $faker->numberBetween(4600, 11900),
        'cover_img' => $array[$faker->numberBetween(0, 6)],
    ];
});
