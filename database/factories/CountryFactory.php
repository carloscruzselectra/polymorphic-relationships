<?php

/** @var Factory $factory */

use App\Country;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->countryCode,
        'name' => $faker->country,
    ];
});
