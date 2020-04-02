<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'full_name' =>$faker->lastName,
        'document_type' => 'CC',
        'document' => $faker->unique()->numberBetween(0,1000000000),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city_id' => factory(App\City::class)
    ];
});
