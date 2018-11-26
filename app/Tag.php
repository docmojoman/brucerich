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

    public function setNameAttribute($value)
    {
        $this->attributes['name']  = $value;
        $this->attributes['slug']   = $this->uniqueSlug($value);
    }

    /**
     * Create a unique slug.
     *
     * @param  string $title
     * @return string
     */
    public function uniqueSlug($value)
    {
        $slug = str_slug($value);

        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public static function addNew($tag)
    {
        return static::insertGetId([
            'name'          => $tag,
            'slug'          => str_slug($tag),
            'created_at'    => NOW(),
            'updated_at'    => NOW()
        ]);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
