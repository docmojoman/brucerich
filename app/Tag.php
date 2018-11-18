<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public static function exists($tag)
    {
        return static::where('id', $tag)->exists();
    }

    public static function addNew($tag)
    {
        return static::insertGetId([
            'name' => $tag,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name']  = $value;
        $this->attributes['slug']   = str_slug($value);
    }

}
