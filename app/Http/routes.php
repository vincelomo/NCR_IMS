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

Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => 'auth'],function(){
	Route::get('/device/new','DeviceController@getNew');
	Route::post('/device/new','DeviceController@postNew');
	Route::get('/device/edit/{id}','DeviceController@getEdit');
	Route::post('/device/edit/{id}','DeviceController@postEdit');
});

Route::group(['middleware' => 'perm'],function(){
	Route::get('/user/edit/{id}','UserController@getEdit');
	Route::post('/user/edit/{id}','UserController@postEdit');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'device' => 'DeviceController',
	'user' => 'UserController',
]);
