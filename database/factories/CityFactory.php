<?php

/** @var Factory $factory */

use App\City;
use App\Country;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(City::class, function (Faker $faker) {
    return [
        'country_id' => factory(Country::class),
        'name' => $faker->city,
    ];
});
