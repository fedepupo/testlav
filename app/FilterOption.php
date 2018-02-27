<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilterOption extends Model
{
    public function filter()
    {
        return $this->hasOne('App\Filter', 'id', 'filter_id');
    }
}
