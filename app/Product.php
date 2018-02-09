<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function brands(){ 
    	//Model, chiave primaria del Model, Chiave esterna del Model corrente
		return $this->hasOne('App\Brand', 'marca', 'brand_id');
	}

	function sales(){ 
		return $this->hasOne('App\Sale', 'codice_articolo', 'brand_id');
	}
}
