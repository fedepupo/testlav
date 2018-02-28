<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::resource('/', 'SlugController');
//Route::get('{slug}', 'SlugController@index')->where('slug', '(.*)');

Route::get('/', ['middleware' => 'checkslug', function(){
	return Config::get('view');
}]);
Route::get('{slug}', ['middleware' => 'checkslug', function(){
	return Config::get('view');
}])->where('slug', '.*');;




//Route::get('/pagina', 'PageController@index');
//Route::resource('/pagina', 'PageController');
//Route::resource('/pagina/{id}/', 'PageController@show');
