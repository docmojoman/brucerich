<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Insight extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
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

    /**
     * Add method for publishing.
     * \App\Article::publish($id);
     */
    public static function publish($id)
    {
        $insight = static::find($id);

        if ($insight->published == 0) {

            $insight->published = 1;
            $insight->save();
            return true;
        }

        $insight->published = 0;
        $insight->save();
        return true;
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
