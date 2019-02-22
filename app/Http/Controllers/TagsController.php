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
    	// $tags 		= Tag::usedTags();

        $relatedBooks =  Tag::related($books);
        $relatedArticles =  Tag::related($articles);
        $relatedInsights =  Tag::related($insights);
        $relatedVideos =  Tag::related($videos);
        $allTags = array_values(array_unique(array_collapse([
            $relatedBooks,
            $relatedArticles,
            $relatedInsights,
            $relatedVideos
        ])));

        $tags = Tag::all()->whereIn('id', $allTags)->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        // $allTagsSorted = sort($allTags);

        // dd($tags);

    	if ($tag->count()) {
    	return view('tags', compact('books', 'articles','insights', 'videos', 'tag', 'tags'));
    	} else {
    		return view('tags', compact('tags'));
    	}
    }

    public function all()
    {
        $tags       = Tag::usedTags()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $ordered    = [];
        $numbers    = [];

        foreach ($tags as $tag) {
            // $key = ctype_alpha($tag->slug[0]) ? $tag->slug[0] : 'other';
            if (ctype_alpha($tag->slug[0])) {
                $ordered[$tag->slug[0]][] = $tag;
            } else {
                $numbers[$tag->slug[0]][] = $tag;
            }
        }

        foreach ($numbers as $key=>$item){
            ksort($numbers);
            $numbers[$key] = $item;
        }

        return view('tags.index', compact('ordered', 'numbers'));
    }

    // public function related($tag)
    // {
    //     $ids = [];
    //     $i = 0;
    //     foreach($tag as $t) {
    //         $ids['taggable_id'][$i] = $t['pivot']->taggable_id;
    //         $ids['taggable_type'][$i] = $t['pivot']->taggable_type;
    //         $i++;
    //     }
    //     return $ids;
    // }
}
