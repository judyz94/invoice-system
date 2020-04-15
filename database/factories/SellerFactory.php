<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'full_name' =>$faker->name,
        'document_type' => 'CC',
        'document' => $faker->unique()->numberBetween(0,1000000000),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city_id' => factory(App\City::class)
    ];
});
