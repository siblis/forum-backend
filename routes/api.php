<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
header( 'Access-Control-Allow-Headers', 'X-Requested-With, Authorization, Content-Type' );
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'PostsController@index');
Route::get('/post/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@delete');

Route::get('/comments/{id}', 'CommentsController@index');
Route::post('/comments/{id}', 'CommentsController@store');
Route::put('/comments/{id}', 'CommentsController@update');
Route::delete('/comments/{id}', 'CommentsController@destroy');

//Маршруты для Категорий
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{category}','CategoriesController@show');
Route::post('/categories', 'CategoriesController@store');
Route::put('/categories/{category}', 'CategoriesController@update');
Route::delete('/categories/{category}', 'CategoriesController@destroy');
//Маршруты для Тегов
Route::get('/tags','TagsController@index');
Route::get('/tags/{tag}','TagsController@show');
Route::post('/tags', 'TagsController@store');
Route::patch('/tags/{tag}', 'TagsController@update');
Route::delete('/tags/{tag}', 'TagsController@destroy');
//Маршруты для Пользователя
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}','UsersController@show');
Route::post('/users', 'UsersController@store');
Route::put('/users/{user}', 'UsersController@update');
Route::delete('/users/{user}', 'UsersController@destroy');

//В фаиле api.php указываеются роуты именно для создание api приложения.
//полный адресс будет выглядить примерно так mysait.com/api/post или mysait.com/api/user
