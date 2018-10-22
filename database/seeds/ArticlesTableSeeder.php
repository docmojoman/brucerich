<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	foreach (range(1, 25) as $index) {

            $title = $faker->sentence;

    		Article::create([
	    		'user_id'	=> '1',
	            'title'		=> $title,
                'slug'      => str_slug($title, '-'),
	            'author'	=> 'Bruce Rich',
	            'publication' => $faker->catchPhrase,
	            'date'		=> $faker->date,
	            'page'		=> $faker->numberBetween($min = 20, $max = 120),
	            'description'	=> $faker->paragraph($nbSentences = 12, $variableNbSentences = true),
	            'image'		=> $faker->imageUrl($width = 240, $height = 480),
	            'link'		=> $faker->url,
	            'pdf'		=> 'file.pdf',
	            'group_id'	=> $faker->numberBetween($min = 1, $max = 6),
                'published' => $faker->numberBetween($min =0, $max = 1)
			]);
    	}

        //
    }
}
