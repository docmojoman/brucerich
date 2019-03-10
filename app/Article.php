<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
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

    public function category()
    {
        return $this->belongsTo('App\ArticleGroup');
    }

    /**
    * Public List Page
    */
    public static function articles($group_id)
    {
        $sortable_type = 'article';
        $unsorted_articles = static::where([['group_id', '=', $group_id], ['published', '=', 1]])->get();
        // dd($unsorted_articles);
        $articleIds = $unsorted_articles->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $articleIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_articles->sortByIds($order->toArray());

            // dd($ordered);

            $arts = $ordered->values()->toArray();

            $articles = array_map(function($array){
                return (object)$array;
            }, $arts);

            // $articles = collect($arts)->map(function ($item) {
            //     return (object) $item;
            // });
        } else {
            $articles = static::all();
        }

        // dd($articles);

        return $articles;
    }

    /**
     * Add method for fetching published.
     * \App\Article::published();
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
        $article = static::find($id);

        if ($article->published == 0) {

            $article->published = 1;
            $article->save();
            $status = "Article published!";
            return $status;
        }

        $article->published = 0;
        $article->save();
        $status = "Article un-published!";
        return $status;
    }

    /**
     * Enable SortableCollection Sorting Feature.
     */
    public function newCollection(array $models = array())
    {
        return new SortableCollection($models);
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
     * Get all of the tags for the article.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable')
                    ->withTimestamps();
    }

    /**
     * Get all of the order positions for the article.
     */
    public function position()
    {
        return $this->morphToMany('App\Sort', 'sortable')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include published articles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePubd($query)
    {
        return $query->where('published', '=', 1);
    }

    /**
     * Scope a query to only include articles in category.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategory($query, $id)
    {
        return $query->where('group_id', '=', $id);
    }

}
