<?php

/** @var Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => \factory(User::class),
        'title' => $faker->sentence,
        'body' => $faker->realText(1000),
    ];
});
