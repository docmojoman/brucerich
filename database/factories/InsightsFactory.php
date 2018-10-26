<?php

use Faker\Generator as Faker;

$factory->define(App\Insight::class, function (Faker $faker) {
    return [
       'user_id'	=> '1',
        'title'		=> $faker->sentence,
        'author'	=> 'Bruce Rich',
        'description'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'copy'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'published'		=> $faker->numberBetween($min = 0, $max = 1)
    ];
});
