<?php

/** @var Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});
