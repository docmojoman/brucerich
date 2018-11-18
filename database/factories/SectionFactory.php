<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
       'book_id'	=> $faker->numberBetween($min = 0, $max = 10),
        'header'		=> $faker->sentence,
        'description'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'type'		=> randomElement($array = array ('text','video'))
        ];
});
