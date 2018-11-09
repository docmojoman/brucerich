<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SortableCollection extends \Illuminate\Database\Eloquent\Collection
{
    public function sortByIds(array $ids) {
        return $this->sortBy(function($model) use ($ids){
            return array_search($model->getKey(), $ids);
        });
    }

}
