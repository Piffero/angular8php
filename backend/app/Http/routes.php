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
Route::post('task/add', 'TaskController@store')->name('task.add');
Route::put('task/update/{id}', 'TaskController@update');
Route::put('task/done/{id}', 'TaskController@done')->name('task.done');
Route::delete('task/delete/{id}', 'TaskController@destroy')->name('task.delete');
