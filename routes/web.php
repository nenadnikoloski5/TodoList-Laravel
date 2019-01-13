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

Route::get('/', "baseController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post("/store", "baseController@store");



Route::delete("/delete/{id}", "baseController@destroy");
Route::get("/update/{id}", "baseController@update");
Route::patch("/update/{id}", "baseController@patch");

Route::patch("/complete/{id}", "baseController@complete");