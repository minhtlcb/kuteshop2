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

Route::get('','HomeController@index');
Route::group(['prefix'=>'','middleware'=>'checklogin'],function()
{
	Route::get('login','LoginController@login');

//Route::get('login','HomeController@login');
});
    Route::get('cart','LoginController@cart');


Route::post('login','LoginController@postlogin');
Route::post('register','LoginController@postregister');
Route::group(['prefix'=>'admin','middleware'=>'checkuseradmin'],function()
{
Route::get('index','AdminController@index');
Route::get('index2','AdminController@index2');
});
Route::get('logout','LoginController@logout');

