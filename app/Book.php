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

    public static function books()
    {
        // \App\Book::where('published', 1)->pluck('id', 'title');
        return static::where('published', 1)->pluck('id', 'title');
    }

}
