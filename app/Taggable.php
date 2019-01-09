<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{

    public function relationshipExists($tag_id, $taggable_id, $taggable_type)
    {
        // check Taggables is combo exists
        if (static::where('name', $tag)->pluck('id')->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public function destroyRelationships($tag_id)
    {
    	// find tag_id in taggables
    	// delete them
    	return static::table('taggables')->where('tag_id', '=', $tag_id)->delete();
    }

}
