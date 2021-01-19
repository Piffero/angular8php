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

Route::get('/', function () {
    return view('welcome');
});

Route::get('task', 'TaskController@index');
Route::get('task/edit/{id}', 'TaskController@show');
Route::post('task/add', 'TaskController@store');
Route::put('task/update/{id}', 'TaskController@update');
Route::put('task/done/{id}', 'TaskController@done');
Route::delete('task/delete/{id}', 'TaskController@destroy');

Route::get('taskUser', 'TaskUserController@index');
Route::get('taskUser/edit/{id}', 'TaskUserController@show');
Route::post('taskUser/add', 'TaskUserController@store');
Route::put('taskUser/update/{id}', 'TaskUserController@update');
Route::put('taskUser/done/{id}', 'TaskUserController@done');
Route::delete('taskUser/delete/{id}', 'TaskUserController@destroy');
