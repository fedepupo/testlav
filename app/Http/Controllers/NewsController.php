<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class NewsController extends Controller
{
    public function getAllNews($language_id){
    	$news = Language::find($language_id)->news()->where('date', '<=',  'NOW()')->get();

    	return $news;
    }
}
