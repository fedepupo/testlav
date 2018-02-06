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

	function product_categories(){        
		return $this->hasOne('App\ProductCategory', 'slug', 'slug');
	}

	function products(){        
		return $this->hasOne('App\Product', 'slug', 'slug');
	}
}
