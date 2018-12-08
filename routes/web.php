<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE');
header( 'Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type' );
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

Route::get('/topics/comments/{id}', 'CommentsController@getAllPost');



Route::get('/csrd', function(){
    return response()->json(Session::token());
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');