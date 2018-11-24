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

Route::get('forum','ForumController@index');
Route::get('forum/add','ForumController@newTopic')->name('newTopic');
Route::post('forum/add','ForumController@addTopic')->name('addTopic');

Route::get('showtopic/{id}','ForumController@show')->name('getTopic');

Route::post('showtopic/{id}','ForumController@addComment')->name('addComment');
