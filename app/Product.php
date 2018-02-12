<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Color;
use App\Sale;

class Product extends Model
{
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

	function getPrice(){
		$results = DB::select( DB::raw("SELECT prezzo_finale FROM li_articoli WHERE codice_articolo = '".$this->codice_articolo."' LIMIT 1") );	
		$prezzo_gestionale = $results[0]->prezzo_finale;

		$Sale = \App\Sale::where('codice_articolo', $this->codice_articolo)->first();

		echo $Sale->percentuale_sconto."<br>";
		echo $Sale->prezzo_fisso."<br>";
				
		

		$this->price = $prezzo_gestionale;				
	}
}
