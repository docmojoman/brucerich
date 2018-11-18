<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
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
}
