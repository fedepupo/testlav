<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	function template(){		
		return $this->belongsTo('App\Template');
	}

	function slug(){		
		return $this->belongsTo('App\Slug');
	}
}
