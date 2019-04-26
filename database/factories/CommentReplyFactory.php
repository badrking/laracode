<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CommentReply;
use Faker\Generator as Faker;

$factory->define(CommentReply::class, function (Faker $faker) {
    return [
      'comment_id'=>$faker->numberBetween(1,10),
      'is_active'=>rand(1,0),
      'author'=>$faker->name,
      'body'=>$faker->paragraph(1,true),
      'author_photo'=>$faker->image('public/images',64,64, null, false)
    ];
});
