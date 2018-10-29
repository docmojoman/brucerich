<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
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

    public function setTitleAttribute($value)
    {
        $this->attributes['title']  = $value;
        $this->attributes['slug']   = str_slug($value);
    }

    /*
    * Public Menu
    * View Composer
    */
    public static function insights()
    {
        return static::where('published', 1)->pluck('id', 'title');
    }

}
