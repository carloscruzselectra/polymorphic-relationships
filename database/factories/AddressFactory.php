<?php

/** @var Factory $factory */

use App\Address;
use App\City;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => \factory(User::class),
        'city_id' => \factory(City::class),
        'street' => $faker->streetName,
        'street_number' => $faker->numberBetween(1, 200),
        'zip' => $faker->postcode,
    ];
});
