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
        return static::all();
    }
}
