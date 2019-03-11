<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{

    /**
     * Get all sortable records of a given type.
     */
    public static function order($sortable_type)
    {
    	return \DB::table('sortables')
	    	->select('sort_id', 'sortable_id')
	    	->where('sortable_type', $sortable_type);
    }

    /**
     * Get all sortable records of a given type.
     */
    public static function groupOrder($sortable_type, $ids)
    {
        return \DB::table('sortables')
            ->select('sort_id', 'sortable_id')
            ->where('sortable_type', $sortable_type)
            ->whereIn('sortable_id', $ids)
            ->orderBy('sort_id');
    }

    /**
     * Add new sortable record of a given type.
     */
    public static function addNewOrder($sortable_type, $sort_id, $sortable_id)
    {
        return \DB::table('sortables')
                ->insert([
                    'sort_id' => $sort_id,
                    'sortable_id' => $sortable_id,
                    'sortable_type' => $sortable_type
                ]);
    }

    /**
     * Update sortable record of a given type.
     */
    public static function updateOrder($sortable_type, $sort_id, $sortable_id)
    {
        return \DB::table('sortables')
            ->where('sortable_type', '=', $sortable_type)
            ->where('sortable_id', '=', $sortable_id)
            ->update(['sort_id' => $sort_id]);
    }

    public static function type($sortable_type)
    {
        switch ($sortable_type) {
            case "article":
                return new \App\Article;
                break;
            case "articleGroup":
                return new \App\ArticleGroup;
                break;
            case "book":
                return new \App\Book;
                break;
            case "insight":
                return new \App\Insight;
                break;
            case "interview":
                return new \App\Interview;
                break;
            case "section":
                return new \App\Section;
                break;
            case "video":
                return new \App\Video;
                break;
            default:
                return false;
        }

    }

    /**
     * Establish the sort postion of the book.
     */
    public function books()
    {
        return $this->morphedByMany('App\Book', 'sortable');
    }

    /**
     * Establish the sort postion of the article.
     */
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'sortable');
    }

    /**
     * Establish the sort postion of the insight.
     */
    public function insights()
    {
        return $this->morphedByMany('App\Insight', 'sortable');
    }

    /**
     * Establish the sort postion of the video.
     */
    public function interviews()
    {
        return $this->morphedByMany('App\Interview', 'sortable');
    }

    /**
     * Establish the sort postion of the video.
     */
    public function videos()
    {
        return $this->morphedByMany('App\Video', 'sortable');
    }

    /**
     * Establish the sort postion of the video.
     */
    public function sections()
    {
        return $this->morphedByMany('App\Section', 'sortable');
    }

}
