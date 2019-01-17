<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
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

    public function book()
    {
    	return $this->belongsTo('App\Book');
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

    /**
    * Public Book Sections Page
    */
    public static function sections($book_id)
    {
        $sortable_type = 'section';
        $unsorted_sections = static::where('book_id', $book_id)->get();
        $sectionIds = $unsorted_sections->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $sectionIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_sections->sortByIds($order->toArray());

            $bks = $ordered->values()->toArray();

            $sections = array_map(function($array){
                return (object)$array;
            }, $bks);
        } else {
            $sections = static::where('book_id', $book_id)->get();
        }

        return $sections;
    }

}
