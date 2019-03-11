<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
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
     * Create a conversation slug.
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
     * Add method for fetching published.
     * \App\Interview::published();
     */
    public static function published()
    {
        return static::where('published', 1)->get();
    }

    /**
     * Method for publishing.
     */
    public static function publish($id)
    {
        $interview = static::find($id);

        if ($interview->published == 0) {

            $interview->published = 1;
            $interview->save();
            $status = "Interview published!";
            return $status;
        }

        $interview->published = 0;
        $interview->save();
        $status = "Interview un-published!";
        return $status;
    }

    /**
    * Public Menu View Composer
    * Public List Page
    */
    public static function interviews()
    {
        $sortable_type = 'interview';
        $unsorted_interviews = static::where('published', 1)->get();
        $interviewIds = $unsorted_interviews->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $interviewIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_interviews->sortByIds($order->toArray());

            $insts = $ordered->values()->toArray();

            $interviews = array_map(function($array){
                return (object)$array;
            }, $insts);
        } else {
            $interviews = static::all();
        }

        return $interviews;
    }


    /**
     * Get all of the tags for the insight.
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
     * Get all of the order positions for the insight.
     * $interview->position()->attach(#);
     */
    public function position()
    {
        return $this->morphToMany('App\Sort', 'sortable')
                    ->withTimestamps();
    }

}
