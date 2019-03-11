<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function build_menu()
    {
    	$books = \App\Book::where('published', 1)->pluck('id', 'menu_title');

    	$articles = \App\Article::where('published', 1)->pluck('id', 'title');

    	$insights = \App\Insight::where('published', 1)->pluck('id', 'title');
    }

}
