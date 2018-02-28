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

			return $Slug;
		}
	}
}
