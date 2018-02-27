<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products() {
		return $this->belongsToMany('App\Product', 'products_in_categories', 'product_category_id', 'codice_articolo');
	}

	function filters(){ 
		return $this->hasMany('App\Filter', 'product_category_id', 'id');
	}
}
