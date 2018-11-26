<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
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

    /**
     * Get all of the tags for the video.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')
                    ->withTimestamps();
    }


    /**
    * Public List Page
    */
    public static function videos()
    {
        $sortable_type = 'video';
        $unsorted_videos = static::where('published', 1)->get();
        // dd($unsorted_videos);
        $videoIds = $unsorted_videos->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $videoIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_videos->sortByIds($order->toArray());

            $vids = $ordered->values()->toArray();

            $videos = array_map(function($array){
                return (object)$array;
            }, $vids);
        } else {
            $videos = static::all();
        }

        // dd($videos);

        return $videos;
        // return static::where('published', 1)->pluck('id', 'title');
    }

    /**
     * Add method for fetching published.
     * \App\Video::published();
     */
    public static function published()
    {
        return static::where('published', 1)->get();
    }

    /**
     * Add method for publishing.
     * \App\Video::publish($id);
     */
    public static function publish($id)
    {
        $video = static::find($id);

        if ($video->published == 0) {

            $video->published = 1;
            $video->save();
            return true;
        }

        $video->published = 0;
        $video->save();
        return true;
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
