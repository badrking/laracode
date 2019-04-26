<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,10),
        'category_id'=>$faker->numberBetween(1,10),
        'photo_id'=>$faker->numberBetween(11,20),
        'title'=>$faker->sentence(5, 10),
        'body'=>$faker->paragraphs(rand(10,15),true),
        'slug'=>$faker->slug()
    ];
});
