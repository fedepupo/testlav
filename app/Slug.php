<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    function pages(){        
		return $this->hasOne('App\Page', 'slug', 'slug');
	}

	function news(){        
		return $this->hasOne('App\News', 'slug', 'slug');
	}
}
