<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function articles()
    {
    	return $this->hasMany('App\Article', 'group_id');
    }

    public static function articlegroups()
    {
        $sortable_type = 'articleGroup';
        $unsorted_groups = static::all();
        $groupIds = $unsorted_groups->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $groupIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_groups->sortByIds($order->toArray());

            $ags = $ordered->values()->toArray();

            $articlegroups = array_map(function($array){
                return (object)$array;
            }, $ags);
        } else {
            $articlegroups = static::all();
        }

        // dd($articlegroups);

        return $articlegroups;

        // return static::all();
    }

    /**
     * Enable SortableCollection Sorting Feature.
     */
    public function newCollection(array $models = array())
    {
        return new SortableCollection($models);
    }

    /**
     * Get all of the order positions for the article.
     */
    public function position()
    {
        return $this->morphToMany('App\Sort', 'sortable')
                    ->withTimestamps();
    }

}
