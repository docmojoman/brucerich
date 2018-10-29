<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
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

    public function category()
    {
        return $this->belongsTo('App\ArticleGroup');
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

    public function setTitleAttribute($value)
    {
        $this->attributes['title']  = $value;
        $this->attributes['slug']   = str_slug($value);
    }
}
