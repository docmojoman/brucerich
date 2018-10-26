<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
       'user_id'	=> '1',
        'title'		=> $faker->sentence,
        'author'	=> 'Bruce Rich',
        'publication' => $faker->company,
        'date'		=> $faker->date,
        'about'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'video'		=> $faker->imageUrl($width = 240, $height = 480),
        'position'		=> null,
        'published'		=> $faker->numberBetween($min = 0, $max = 1)
    ];
});
