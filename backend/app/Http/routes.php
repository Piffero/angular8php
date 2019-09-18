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
Route::get('tasks/edit/{id}', 'TaskController@show');
Route::post('tasks/add', 'TaskController@store');
Route::put('tasks/update/{id}', 'TaskController@update');
Route::put('tasks/done/{id}', 'TaskController@done');
Route::delete('tasks/delete/{id}', 'TaskController@destroy');
