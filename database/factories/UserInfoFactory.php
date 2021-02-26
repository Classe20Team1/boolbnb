<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use Faker\Generator as Faker;
// use Faker\Provider\it_IT\Company;
// use Faker\Provider\it_IT\Person;
use App\User;

$factory->define(UserInfo::class, function (Faker $faker) {

    $users = User::all();

    return [
      'user_id'=>$faker->numberBetween(1, $users->count()),
      'fullname'=>$faker->name,
      'sex'=>$faker->randomElement(['M', 'F', 'Not Defined', 'Fluid']),
      'p_iva'=>$faker->creditCardNumber,
      'birthdate'=>$faker->dateTimeBetween('01-01-1900', '31-12-2013')->format('d/m/Y'),
      'phone_number'=>$faker->phoneNumber,
      'address'=> $faker->streetAddress,
      'fiscal_code'=>$faker->creditCardNumber,
    ];
});
