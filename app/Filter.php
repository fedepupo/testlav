<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    function options(){ 
		return $this->hasMany('App\FilterOption', 'filter_id', 'id');
	}
}
