<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware'=>'auth'], function () {
	Route::get('/', 'App\Http\Controllers\HomeController@index')->name('dashboard');

	Route::group(['prefix' => 'users', 'middleware'=>'admin'], function () {
		Route::get('/', ['as' => 'users', 'uses'=>'App\Http\Controllers\UserController@index']);
		Route::get('/create', ['as' => 'create_user', 'uses'=>'App\Http\Controllers\UserController@create']);
		Route::post('/create', ['uses'=>'App\Http\Controllers\UserController@store']);
	});
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

