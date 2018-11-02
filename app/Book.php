<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
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

    public function sections()
    {
    	return $this->hasMany('App\Section');
    }

    public function setTitleAttribute($value)
    {
    	$this->attributes['title']	= $value;
    	$this->attributes['slug']	= str_slug($value);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

/**
* Public Menu
* View Composer
*
*/
    public static function books()
    {
        return static::where('published', 1)->pluck('id', 'title');
    }

    /**
     * Get all of the tags for the book.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')
                    ->withTimestamps();
    }

}
