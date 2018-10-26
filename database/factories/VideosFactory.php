<?php

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
       'user_id'	=> '1',
        'title'		=> $faker->sentence,
        'embed'	=> $faker->imageUrl($width = 240, $height = 480),
        'thumbnail'		=> $faker->imageUrl($width = 240, $height = 480),
        'caption'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'published'		=> $faker->numberBetween($min = 0, $max = 1)
    ];
});
