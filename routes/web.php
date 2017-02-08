<?php

use App\Http\Controllers\UserController;

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

Route::group(array('prefix' => 'api/v1'), function() {
    
    Route::group(array('prefix' => 'users'), function() {
    	Route::get('/', 'UserController@getList');

		Route::get('/{id}', 'UserController@getUserDetail');

		Route::post('/', 'UserController@createUser');
    });

});

Route::group(array('prefix' => 'user'), function() {

	Route::get('/', 'UserController@getListView');

	Route::get('/create', function() {
		return view('user/create');
	});

});