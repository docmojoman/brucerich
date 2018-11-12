<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']  = $value;
        $this->attributes['slug']   = str_slug($value);
    }

    /**
     * Get all of the tags for the video.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')
                    ->withTimestamps();
    }

    /**
     * Enable SortableCollection Sorting Feature.
     */
    public function newCollection(array $models = array())
    {
        return new SortableCollection($models);
    }

    /**
     * Get all of the order positions for the video.
     * $video->position()->attach(#);
     */
    public function position()
    {
        return $this->morphToMany('App\Sort', 'sortable')
                    ->withTimestamps();
    }

}
