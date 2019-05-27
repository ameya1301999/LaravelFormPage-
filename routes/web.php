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
    return view('form');
});

//Below route is used by the form to submit data calls the store function
Route::post('/store',  'ATGController@store')->name('store');
//Below is the open route to access the form
Route::get('/form',  'ATGController@index')->name('form');