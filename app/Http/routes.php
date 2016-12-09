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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'WelcomeController@index');
    Route::get('lang/{lang}', [
    	'as'=>'lang.switch', 
    	'uses'=>'LanguageController@switchLang']);
});


Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>['auth'], 'namespace'=>'Admin'], function(){
	// Route::get('dashboard', 'PostController@index');
	// Route::post('post', 'PostController@post');
	// Route::get('showPost', 'PostController@showPost');
	// 
	
	Route::resource('posts', 'PostController');
});
