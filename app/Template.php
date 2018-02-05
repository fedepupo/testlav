<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{	
    function pages(){        
		return $this->hasMany('App\Page', 'template_id', 'id');
	}
}
