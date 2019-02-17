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

    public function all()
    {
        // $tags       = Tag::usedTags();
        $tags       = Tag::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $ordered = [];
        $numbers = [];
        // foreach ($tags as $tag) {
        //     $key = ctype_alpha($tag->slug[0]) ? $tag->slug[0] : 'other';
        //     $ordered[$tag->slug[0]][] = $tag;
        // }

        foreach ($tags as $tag) {
            // $key = ctype_alpha($tag->slug[0]) ? $tag->slug[0] : 'other';
            if (ctype_alpha($tag->slug[0])) {
                $ordered[$tag->slug[0]][] = $tag;
            } else {
                $numbers[$tag->slug[0]][] = $tag;
            }
        }

        // dd($ordered);

        // for each key
        // if alpha add to $keys array by key
        // else add to $keys '#' key
        // $sortedNums = ksort($numbers,SORT_NUMERIC);

        foreach ( $numbers as $key=>$item ){
            ksort($numbers);
            $numbers[$key] = $item;
        }

        return view('tags.index', compact('ordered', 'numbers'));
    }
}
