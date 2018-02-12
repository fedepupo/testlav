<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
	protected $table = "li_barcode";

	function getColor($tavolozza_colore){
		return \App\Color::where('tavolozza', $tavolozza_colore)->where('colore', $this->colore)->first();
	}

	function getSize($tipo_taglia){
		return \App\Size::where('tipo_taglia', $tipo_taglia)->where('taglia', $this->taglia)->first();
	}
}
