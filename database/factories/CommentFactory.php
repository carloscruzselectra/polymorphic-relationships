<?php

/** @var Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => \factory(User::class),
        'post_id' => \factory(Post::class),
        'body' => $faker->realText(),
    ];
});
