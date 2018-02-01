<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class HomeController extends Controller
{
    public function index()
	{
		$PageHome = Page::where('template', '=', '1')->first();		
		return view('homepage.index')->with('PageHome', $PageHome);
	}
}
