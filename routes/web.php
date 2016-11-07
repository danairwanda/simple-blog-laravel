<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// we will add new route for blog into middleware group
Route::group(['middleware' => ['web']], function(){
	Route::resource('/blog','BlogController');
});


// return redirect()->to('crud/');
// Route::resource('crud','CrudController');

// Route::get('/crud','AjaxController@index');
// Route::post('/crud/store','AjaxController@store');
// Route::post('/crud/update','AjaxController@update');
// Route::post('/crud/destroy','AjaxController@destroy');

