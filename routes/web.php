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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
	return "Hello World";
});

Route::get('/prueba2', "LibroController@prueba"); 

Route::get('/prueba2/{id}/{name}', "LibroController@prueba2"); 

Route::resource('/libro', "LibroController");

Route::get('/libro/{id}/{name}', "LibroController@prueba2")
->where('id', '[0-9]+');



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['permission:admin writers']], function () {
    //
    Route::resource('writers', 'WriterController');
});

Route::group(['middleware' => ['role:editor']], function () {

 	Route::resource('editorials', 'EditorialController');
});

Route::group(['middleware' => ['role:editor|writer']], function () {

	Route::resource('posts', 'PostController');
});