<?php

/** @var Factory $factory */

use App\Address;
use App\City;
use App\Company;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'city_id' => \factory(City::class),
        'street' => $faker->streetName,
        'street_number' => $faker->numberBetween(1, 200),
        'zip' => $faker->postcode,
    ];
});

$factory->state(Address::class, 'user', function ($faker) {
    $user = \factory(User::class)->create();
    return [
        'addressable_id' => $user->id,
        'addressable_type' => $user->getTable(),
    ];
});

$factory->state(Address::class, 'company', function ($faker) {
    $company = \factory(Company::class)->create();
    return [
        'addressable_id' => $company->id,
        'addressable_type' => $company->getTable(),
    ];
});
