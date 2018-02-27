<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Product;

class ProductController extends Controller
{
	public function getAllProductsCategories($language_id){
		$product_categories = Language::find($language_id)->product_categories()
		->where('active', '1')
		->where('parent', '0')
		->get();

		return $product_categories;
	}
}
