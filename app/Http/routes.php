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

Route::group(array('prefix' => 'user', 'middleware' => ['auth', 'roles'], 'roles' => ['consumer', 'engineer', 'administrator']), function () {
    Route::get('show', 'UserController@show');
    Route::get('edit', 'UserController@edit');
    Route::post('update', 'UserController@update');
});

Route::group(array('prefix' => 'users', 'middleware' => ['auth', 'roles'], 'roles' => ['administrator']), function () {
    Route::get('', 'UserController@index');
    Route::get('create', 'UserController@create');
    Route::post('store', 'UserController@store');
    Route::get('edit/{id}', 'UserController@modify');
    Route::post('modify', 'UserController@saveModify');
    Route::get('destroy/{id}', 'UserController@destroy');
});

Route::group(array('prefix' => 'engineers', 'middleware' => ['auth', 'roles'], 'roles' => ['consumer', 'engineer', 'administrator']), function () {
    Route::get('', 'EngineerController@index');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
