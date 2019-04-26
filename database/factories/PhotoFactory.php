<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'file'=>$faker->image('public/images',730,410, null, false) ,
    ];
});
