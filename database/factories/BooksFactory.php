<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'=> $faker->title,
        'author'=>  $faker->name,
        'price'=>  rand(30,50),
        'category'=> 'science',
        'status' => rand(true,false),
        'user_id' => 1,
    ];
});
