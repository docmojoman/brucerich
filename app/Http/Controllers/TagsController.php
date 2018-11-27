<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	$books 		= $tag->books->where('published', '=', 1);
    	$articles	= $tag->articles->where('published', '=', 1);
    	$insights	= $tag->insights->where('published', '=', 1);
    	$videos		= $tag->videos->where('published', '=', 1);
    	$tags 		= Tag::usedTags();
    	// return $books;
    	if ($tag->count()) {
    	return view('tags', compact('books', 'articles','insights', 'videos', 'tag', 'tags'));
    	} else {
    		return view('tags', compact('tags'));
    	}
    }
}
