<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {

    $users = User::all();
    $num_rooms = $faker->numberBetween(1, 4);
    return [
        'user_id' => $faker->numberBetween(1, $users->count()),
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'rooms' => $num_rooms,
        'beds' => $faker->numberBetween($num_rooms, $num_rooms*2),
        'bathrooms' => $faker->numberBetween(1, 3),
        'metri_quadrati' => $num_rooms*70,
        'active' => true,
        'views_count' => 0,
        'price' => $faker->numberBetween(4600, 11900),
        'cover_img' => $faker->url,
    ];
});
