<?php

use App\Address;
use App\City;
use App\Comment;
use App\Company;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Artisan::call('migrate:fresh');

    /** @var Post $post */
    $post = factory(Post::class)->create();
    $post2 = factory(Post::class)->create();

    /** @var Company $company */
    $company = factory(Company::class)->create();
    $tag = factory(Tag::class)
        ->create(['name' => 'programming']);

    $post->tags()->sync($tag);
    $post2->tags()->sync($tag);
    $company->tags()->sync($tag);

    return $tag->posts->load('tags');

    return $company->load('tags');




    /** @var User $user */
    $user = factory(User::class)->create();

    $user->posts()
        ->saveMany(factory(Post::class)->times(3)->make(['user_id' => $user->id]))
        ->each(function ($post) {
            $post->comments()->saveMany(factory(Comment::class)->times(3)->make());
        });

    $company = factory(Company::class)->create();
    $company->addresses()->create([
        'street' => '124 st.',
        'street_number' => 1,
        'city_id' => factory(City::class)->create()->id,
        'zip' => '28999'
    ]);

    $company->addresses()->create([
        'street' => '125 st.',
        'street_number' => 2,
        'city_id' => factory(City::class)->create()->id,
        'zip' => '90000'
    ]);

    //return $company->load('addresses');

    $user->address()->create([
        'street' => '124 st.',
        'street_number' => 1,
        'city_id' => factory(City::class)->create()->id,
        'zip' => '28999'
    ]);

    $user->address()->create([
        'street' => '125 st.',
        'street_number' => 1,
        'city_id' => factory(City::class)->create()->id,
        'zip' => '28999'
    ]);

    $address = Address::first();

    return $address->addressable;

    return $user->load('address');

    return $user->load('city.country')
        ->load('address.city.country')
        ->load('company')
        ->load('posts.comments.user.company');
});
