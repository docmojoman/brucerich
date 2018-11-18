<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
       'user_id'	=> '1',
        'title'		=> $faker->sentence,
        'publisher'		=> $faker->catchPhrase,
        'image'     => $faker->imageUrl($width = 240, $height = 480),
        'alt_tags'		=> $faker->word,
        'amazon'		=> $faker->url,
        'introduction'	=> $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'about'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'published'		=> $faker->numberBetween($min = 0, $max = 1)
    ];
});
