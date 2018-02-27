<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class PageController extends Controller
{
    public function getprimaryMenu($language_id, $parent = 0){
                      
        $pages = Language::find($language_id)->pages()->where('active', '1')->where('parent', $parent)->get();

        return $pages;
    }
}
