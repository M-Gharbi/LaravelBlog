<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\User;
use App\Contact;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' =>$faker->firstName,
        'last_name' =>$faker->lastName,
        'phone' =>$faker->phoneNumber,
        'email' =>$faker->email,
        'address' =>$faker->address,
        'post_id' => Post::pluck('id')->random(),
        'user_id' => factory(User::class)
    ];
});
