<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	function pages(){        
		return $this->hasMany('App\Page', 'language_id', 'id');
	}

	function news(){        
		return $this->hasMany('App\News', 'language_id', 'id');
	}
}
