<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slug;
use App\Language;
use App\Product;
use App\Brand;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SlugController extends Controller
{

	public function index($slug = '', PageController $PageController, Request $Request, NewsController $NewsController, ProductController $ProductController)
	{
		$current_language = null;
		$expiresAt = Carbon::now()->addMinutes(1);

		$exp = explode("/", $Request->path());
		$current_url_code = $exp[0];

		$languages = Language::all()->where('active', '1'); 
		if(!empty($languages)){
			foreach ($languages as $key => $value) {
				if($value->code == $current_url_code){
					$current_language = $value;
				}
			}
		}		

		if(!$current_language){
			$current_language = Language::where('is_primary', 1)->first();
		}
		$current_language_id = $current_language->id;
		
		$pages = $PageController->getprimaryMenu($current_language->id);		

		$Slug = Slug::where("slug", $slug)->first();
		if(!isset($Slug->model)){
			$Slug = $this->getNewSlug($slug);	
		}

		switch($Slug->model){
			case "Page":
			$page = Slug::find($Slug->id)->pages()->first();
			$view = $page->template->view;
			break;

			case "News":
			$news = Slug::find($Slug->id)->news()->first();
			$view = "news.detail";
			break;

			case "ProductCategory":

			$product_categories = Slug::find($Slug->id)->product_categories()->first();					
			$product_categories_id = $product_categories->id;

			$filters = Cache::remember('filters', $expiresAt, function () use ($product_categories_id) {
				return \App\ProductCategory::find($product_categories_id)->filters()->get();				
			});

			if(!empty($filters)){
				foreach($filters as $filter){
					$filter->options = \App\Filter::find($filter->id)->options()->get();
					if(!empty($filter->options)){
						foreach($filter->options as $option){

							$option_id = $option->id;


							$option->count = Cache::remember('count_filter_'.$option->id, $expiresAt, function () use ($product_categories_id, $current_language_id, $option_id) {
								return \App\ProductCategory::find($product_categories_id)
								->products()
								->join('products_filters_options', 'products.codice_articolo', '=', 'products_filters_options.codice_articolo')
								->where('language_id', $current_language_id)
								->where('filter_option_id', $option_id)
								->count();
							});

						}
					}
				}
			}

			$view = "pages.productslist";
			break;

			case "Product":
			$product = Slug::find($Slug->id)->products()->first();
			$product->getPrice();

			if(!empty($product->barcodes)){
				foreach($product->barcodes as $barcode){
					$colore = $barcode->getColor($product->tavolozza_colori);
					$barcode->colore_descrizione = $colore->descrizione;

					$taglia = $barcode->getSize($product->tipo_taglia);
					$barcode->taglia_descrizione = $taglia->descrizione;

					$taglia = $barcode->getSize($product->tipo_taglia_normalizzata);
					$barcode->taglia_normalizzata_descrizione = $taglia->descrizione;
				}
			}

			$filter_options = $product->filter_options()->get();					

			$view = "products.detail";
			break;
		}


		if($view){
			switch($view){
				case "homepage":

				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('pages', $pages);	

				break;

				case "pages.detail":

				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('pages', $pages);	
				break;

				case "pages.newslist":

				$news = $NewsController->getAllNews($current_language->id);

				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('news', $news)
				->with('pages', $pages);	
				break;

				case "news.detail":

				$View =  View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('news', $news)
				->with('pages', $pages);	
				break;

				case "pages.productcategorieslist":

				$product_categories = $ProductController->getAllProductsCategories($current_language->id);

				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('product_categories', $product_categories)
				->with('pages', $pages);	
				break;

				case "pages.productslist":

				if(!empty($this->url)){
					$exp = explode("-", $this->url[0]);

					$products = \App\ProductCategory::find($product_categories->id)
					->products()
					->join('products_filters_options', 'products.codice_articolo', '=', 'products_filters_options.codice_articolo')
					->where('language_id', $current_language->id)
					->where('filter_option_id', $exp[0])
					->get();

					$filtered = $products->reject(function ($item, $key) {							
						echo "<pre>";
						print_r($item->filter_options());
						echo "</pre>";
						exit();		
						return $item->price > 5000;
					});

					$products = $filtered->all();
				}else{
					$products = \App\ProductCategory::find($product_categories->id)->products()->where('language_id', $current_language->id)->get();												
				}
				$product_categories = \App\ProductCategory::where('parent', $product_categories->id)->get();						


				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('products', $products)
				->with('product_categories', $product_categories)
				->with('filters', $filters)
				->with('pages', $pages);
				break;

				case "products.detail":

				$View = View::make($view)
				->with('slug', $Slug)
				->with('languages', $languages)
				->with('product', $product)
				->with('filter_options', $filter_options)
				->with('pages', $pages);
				break;

			}

			return $View;
		}

	}

	public function getNewSlug($slug = ''){
		$expSlug = explode("/", $slug);

		$this->url[] = ($expSlug[count($expSlug)-1]);
		unset($expSlug[count($expSlug)-1]);

		$slug = implode("/", $expSlug);

		if($slug != ''){
			$Slug = Slug::where("slug", $slug)->first();
			if(!isset($Slug->model)){
				$Slug = $this->getNewSlug($slug);	
			}
		}

		return $Slug;
	}
}
