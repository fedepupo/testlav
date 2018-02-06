<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Product;

class ProductController extends Controller
{
	public function getAllProductsCategories($language_id){
		$product_categories = Language::find($language_id)->product_categories()->where('active', '1')->get();

		return $product_categories;
	}

	public function getAllProductsInCategory($category_id){
		$products = Product::where('product_categories_id', $category_id)->where('active', '1')->get();

		return $products;
	}
}
