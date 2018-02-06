<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slug;
use App\Language;
use App\Product;
use View;

class SlugController extends Controller
{

	public function index($slug = '', PageController $PageController, Request $Request, NewsController $NewsController, ProductController $ProductController)
	{
		$current_language = null;

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
		
		$pages = $PageController->getprimaryMenu($current_language->id);		

		$slug = Slug::where("slug", $slug)->first();

		switch($slug->model){
			case "Page":
			$page = Slug::find($slug->id)->pages()->first();
			$view = $page->template->view;
			break;

			case "News":
			$news = Slug::find($slug->id)->news()->first();
			$view = "news.detail";
			break;

			case "ProductCategory":
			$product_categories = Slug::find($slug->id)->product_categories()->first();					
			$view = "pages.productslist";
			break;

			case "Product":
			$product = Slug::find($slug->id)->products()->first();					
			$view = "products.detail";
			break;
		}


		if($view){
			switch($view){
				case "homepage":

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('pages', $pages);	

				break;

				case "pages.detail":

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('pages', $pages);	
				break;

				case "pages.newslist":

				$news = $NewsController->getAllNews($current_language->id);

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('news', $news)
				->with('pages', $pages);	
				break;

				case "news.detail":

				$View =  View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('news', $news)
				->with('pages', $pages);	
				break;

				case "pages.productcategorieslist":

				$product_categories = $ProductController->getAllProductsCategories($current_language->id);

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('page', $page)
				->with('product_categories', $product_categories)
				->with('pages', $pages);	
				break;

				case "pages.productslist":

				$products = $ProductController->getAllProductsInCategory($product_categories->id);

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('products', $products)
				->with('pages', $pages);
				break;

				case "products.detail":

				$View = View::make($view)
				->with('slug', $slug)
				->with('languages', $languages)
				->with('product', $product)
				->with('pages', $pages);
				break;

			}

			return $View;
		}
		
	}
}
