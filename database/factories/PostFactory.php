<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->lastName,
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'user_id' => factory(User::class)
    ];
});
