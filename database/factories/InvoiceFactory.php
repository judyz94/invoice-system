<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'code' => substr($faker->unique()->swiftBicNumber, 0, 6),
        'expedition_date' => $faker->dateTime,
        'due_date' => $faker->dateTime,
        'sale_description' => $faker->sentence,
        'total' => $faker->numberBetween(0,1000000000),
        'vat' => $faker->randomFloat(6,1),
        'total_with_vat' => $faker->randomFloat(20,1),
        'status' => 'New',
        'seller_id' => factory(App\Seller::class),
        'user_id' => factory(App\User::class),
        'customer_id' => factory(App\Customer::class)
    ];
});
