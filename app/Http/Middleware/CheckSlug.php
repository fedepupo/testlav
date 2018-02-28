<?php

namespace App\Http\Middleware;

use Closure;
use View;
use Carbon\Carbon;
use App\Slug;
use App\Language;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;


class CheckSlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $slug = $request->slug;

        if($slug == ''){
            $slug = "";
        }
        $expiresAt = Carbon::now()->addMinutes($_ENV['CACHE_TIME']);

        $current_language = null;

        $exp = explode("/", $request->path());
        $current_url_code = $exp[0];

        $languages = Cache::remember('languages', $expiresAt, function (){
            return Language::all()->where('active', '1'); 
        });

        if(!empty($languages)){
            foreach ($languages as $key => $value) {
                if($value->code == $current_url_code){
                    $current_language = $value;
                }
            }
        }       

        if(!$current_language){ 
            $current_language = Cache::remember('current_language', $expiresAt, function (){
                return Language::where('is_primary', 1)->first();
            });
        }

        $current_language_id = $current_language->id;
        Config::set('current_language', $current_language);

        $pages = PageController::getprimaryMenu($current_language->id);        

        $Slug = Cache::remember('Slug_'.md5($slug), $expiresAt, function () use ($slug) {
            return Slug::where("slug", $slug)->first();
        });

        if(!isset($Slug->model)){
            $SlugController = new SlugController();
            $Slug = $SlugController->getNewSlug($slug);   
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

            $filters = Cache::remember('filters_'.$product_categories_id, $expiresAt, function () use ($product_categories_id) {
                return \App\ProductCategory::find($product_categories_id)->filters()->get();                
            });

            if(!empty($filters)){
                foreach($filters as $filter){

                    $filter_id = $filter->id;
                    $filter->options = Cache::remember('filters_options_'.$filter_id, $expiresAt, function () use ($filter_id) {
                        return \App\Filter::find($filter_id)->options()->get();
                    });

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

                $NewsController = new NewsController();
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

                $ProductController = new ProductController();
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
                    $filter_option_id = $exp[0]; 

                    $products = Cache::remember('products', $expiresAt, function () use ($product_categories_id, $current_language_id, $filter_option_id) {
                        return \App\ProductCategory::find($product_categories_id)
                        ->products()
                        ->join('products_filters_options', 'products.codice_articolo', '=', 'products_filters_options.codice_articolo')
                        ->where('language_id', $current_language_id)
                        ->where('filter_option_id', $filter_option_id)
                        ->get();
                    });
                }else{
                    $products = Cache::remember('products_'.$product_categories_id."_".$current_language_id, $expiresAt, function () use ($product_categories_id, $current_language_id) {
                        return \App\ProductCategory::find($product_categories_id)->products()->where('language_id', $current_language_id)->take(10)->get();
                    });
                }

                $product_categories = Cache::remember('product_categories_'.$product_categories_id, $expiresAt, function () use ($product_categories_id) {
                    return \App\ProductCategory::where('parent', $product_categories_id)->get();                        
                });

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

            Config::set('view', $View);
        }else{

            //return $next($request);
        }
        return $next($request);
    }
}
