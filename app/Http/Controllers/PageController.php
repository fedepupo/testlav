<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*$languages = Language::all()->where('active', '1');                
        $pages = Language::find(1)->pages()->where('active', '1')->get();

        return View::make('pages.index')
        ->with('languages', $languages)
        ->with('pages', $pages);*/
    }

    public function getprimaryMenu($language_id, $parent = 0){
                      
        $pages = Language::find($language_id)->pages()->where('active', '1')->where('parent', $parent)->get();

        return $pages;
    }
}
