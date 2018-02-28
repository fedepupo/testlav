<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
	static function getprimaryMenu($language_id, $parent = 0){

		$pages = Language::find($language_id)->pages()->where('active', '1')->where('parent', $parent)->get();

		return $pages;
	}
}
