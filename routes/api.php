<?php
header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/topics/{id}', 'TopicsController@index');
Route::get('/topic/{id}', 'TopicsController@getOne');
Route::post('topics', 'TopicsController@create');
Route::post('/topics/{id}/put', 'TopicsController@update');
Route::post('/topics/{id}/delete', 'TopicsController@delete');


Route::get('/comments/{id}', 'CommentsController@index');
Route::post('/comments/{id}', 'CommentsController@create');
Route::post('/comments/{id}/put', 'CommentsController@update');
Route::post('/comments/{id}/delete', 'CommentsController@delete');
