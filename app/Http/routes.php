<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { return view('welcome'); });

/*
-Route::get('articles','ArticlesController@index');
-Route::get('articles/create','ArticlesController@create');
-Route::get('articles/{id}','ArticlesController@show');
-Route::post('articles','ArticlesController@store');
-Route::get('articles/{id}/edit', 'ArticlesController@edit');*/

// can be replaced by:
Route::resource('articles','ArticlesController');
Route::resource('categories', 'CategoriesController');
/* php artisan route:list */

Route::get('/home', 'HomeController@index');




Route::auth();