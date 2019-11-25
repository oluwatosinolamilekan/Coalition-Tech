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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function () {
    Route::get('','TaskController@index')->name('task.index');
    Route::get('edit/{id}','TaskController@edit')->name('task.edit');
    Route::post('create','TaskController@store')->name('task.store');
    Route::post('update/{id}','TaskController@update')->name('task.update');
    Route::get('delete/{id}','TaskController@delete')->name('task.delete');

});