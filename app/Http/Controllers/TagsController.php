<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
    	$books 		= $tag->books;
    	$articles	= $tag->articles;
    	$insights	= $tag->insights;
    	$videos		= $tag->videos;
    	$tags 		= Tag::all();
    	// return $tag;
    	if ($tag->count()) {
    	return view('tags', compact('books', 'articles','insights', 'videos', 'tag', 'tags'));
    	} else {
    		return view('tags', compact('tags'));
    	}
    }
}
