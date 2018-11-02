<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
       'user_id'	=> '1',
        'title'		=> $faker->sentence,
        'image'     => $faker->imageUrl($width = 240, $height = 480),
        'about'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'position'		=> null,
        'published'		=> $faker->numberBetween($min = 0, $max = 1)
    ];
});
