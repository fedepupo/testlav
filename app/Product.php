<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Color;
use App\Sale;

class Product extends Model
{
	protected $primaryKey = 'codice_articolo';

	function brands(){ 
    	//Model, chiave primaria del Model (Brand), Chiave esterna del Model corrente (Product)
		return $this->hasOne('App\Brand', 'marca', 'brand_id');
	}

	function sales(){ 
		return $this->hasOne('App\Sale', 'codice_articolo', 'brand_id');
	}

	function barcodes(){ 
		return $this->hasMany('App\Barcode', 'codice_articolo', 'codice_articolo');
	}

	function filter_options(){ 	
		return $this->belongsToMany('App\FilterOption', 'products_filters_options', 'codice_articolo');
	}

	function getPrice(){
		$results = DB::table('li_articoli')->where('codice_articolo', $this->codice_articolo)->get();
		$this->price_list = $prezzo_gestionale = $results[0]->prezzo_finale;

		$prezzo_finale = $prezzo_gestionale;

		$Sale = \App\Sale::where('codice_articolo', $this->codice_articolo)->first();
		if(is_object($Sale)){
			if($Sale->percentuale_sconto > 0){
				$prezzo_finale -= $prezzo_finale*$Sale->percentuale_sconto/100; 
			}elseif($Sale->prezzo_fisso > 0){
				$prezzo_finale = $Sale->prezzo_fisso; 
			}
		}
		

		$this->price = $prezzo_finale;				
	}
}
