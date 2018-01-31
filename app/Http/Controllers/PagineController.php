<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagineController extends Controller
{
	public function boot(Request $request)
    {
    	$name = $request->name;
        echo "controller boot - ".$name;
    }

    public function index(Request $request)
    {
    	$name = $request->name;
        echo "controller index - ".$name;
    }
}
