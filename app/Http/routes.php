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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('user/show', 'UserController@show');
//Route::get('user/edit', 'UserController@edit');

Route::group(array('prefix' => 'user', 'middleware' => ['auth', 'roles'], 'roles' => ['consumer', 'engineer']), function () {
//    Route::get('show', 'UserController@show');
    Route::get('edit', 'UserController@edit');
    //Route::post('update', 'UserController@update');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
