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

Route::get('/', ['as' => 'index', 'uses' => 'TaskController@index']);

Route::get('/{id}', ['as' => 'show', 'uses' => 'TaskController@show']);

Route::post('/store', ['as' => 'store', 'uses' => 'TaskController@store']);



