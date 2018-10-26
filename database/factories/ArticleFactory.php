<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
           'user_id'	=> '1',
            'title'		=> $faker->sentence,
            'author'	=> 'Bruce Rich',
            'publication' => $faker->catchPhrase,
            'date'		=> $faker->date,
            'page'		=> $faker->numberBetween($min = 20, $max = 120),
            'description'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image'		=> $faker->imageUrl($width = 240, $height = 480),
            'link'		=> $faker->url,
            'pdf'		=> 'file.pdf',
            'group_id'	=> $faker->numberBetween($min = 0, $max = 6)
    ];
});
