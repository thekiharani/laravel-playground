<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->unique()->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'created_at' => $faker->dateTimeThisMonth
    ];
});
