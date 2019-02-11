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

    // public static function hasId($tag)
    // {
    //     return static::where('name', $tag)->pluck('id');
    // }

    /**
    'ashoka' has id
    '1' is the id for 'ashoka'
    'foo' has no id
    '2001' has no id
    */


    public static function hasId($tag)
    {
        if (static::where('name', $tag)->pluck('id')->isEmpty()) {
            if (static::exists($tag)) {
                return $tag;
            }
            return false;
        } else {
            return static::where('name', $tag)->pluck('id')->toArray();
        }
    }

    public static function taggedAlready($tag_id, $taggable_id, $taggable_type)
    {
        // Check taggables to see if relationship exists
        return \App\Taggable::where([['tag_id', '=', $tag_id], ['taggable_id', '=', $taggable_id], ['taggable_type', '=', $taggable_type]]);
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

    public static function usedTags()
    {
        // Show only tags that are attached
        $allTags = static::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        // Get ids from Taggables
        $attached = \App\Taggable::all()->pluck('tag_id');
        // Cast to array
        $uTags = array_unique($attached->toArray());

        return $allTags->whereIn('id', $uTags);

    }

}
