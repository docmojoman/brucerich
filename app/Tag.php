<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get all of the books that are assigned this tag.
     */
    public function books()
    {
        return $this->morphedByMany('App\Book', 'taggable');
    }

    /**
     * Get all of the articles that are assigned this tag.
     */
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }

    /**
     * Get all of the insights that are assigned this tag.
     */
    public function insights()
    {
        return $this->morphedByMany('App\Insight', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function videos()
    {
        return $this->morphedByMany('App\Video', 'taggable');
    }

}
