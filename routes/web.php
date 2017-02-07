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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/chocolates','ChocolateController@index');
Route::get('/chocolates/create','ChocolateController@create');
Route::post('/chocolates','ChocolateController@store');
Route::get('/chocolates/{id}/edit','ChocolateController@edit');


