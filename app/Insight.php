<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
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
     * Add method for fetching published.
     * \App\Insight::published();
     */
    public static function published()
    {
        return static::where('published', 1)->get();
    }

    /*
    * Public Menu
    * View Composer
    */
    public static function insights()
    {
        return static::where('published', 1)->pluck('id', 'title');
    }

    /**
     * Get all of the tags for the insight.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')
                    ->withTimestamps();
    }

}
