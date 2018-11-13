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
     * Add method for fetching published.
     * \App\Book::published();
     */
    public static function published()
    {
        return static::where('published', 1)->get();
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
    * Public Menu View Composer
    * Public List Page
    */
    public static function books()
    {
        $sortable_type = 'book';
        $unsorted_books = static::where('published', 1)->get();
        // dd($unsorted_books);
        $bookIds = $unsorted_books->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $bookIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_books->sortByIds($order->toArray());

            $bks = $ordered->values()->toArray();

            $books = array_map(function($array){
                return (object)$array;
            }, $bks);
        } else {
            $books = static::all();
        }

        // dd($books);

        return $books;
        // return static::where('published', 1)->pluck('id', 'title');
    }

    /**
     * Get all of the tags for the book.
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
     * Get all of the order positions for the book.
     * $book->position()->attach(#);
     */
    public function position()
    {
        return $this->morphToMany('App\Sort', 'sortable')
                    ->withTimestamps();
    }

}
