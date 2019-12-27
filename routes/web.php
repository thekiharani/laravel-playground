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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pay', 'PayOrderController@store')->name('pay');
Route::get('channels', 'ChannelController@index')->name('channels.index');
Route::get('post/create', 'PostController@create')->name('post.create');
