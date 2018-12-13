<?php
#header('Access-Control-Allow-Origin: *');
#header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
#header( 'Access-Control-Allow-Headers', 'X-Requested-With, Authorization, Content-Type' );
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//todo разобраться с cors
//todo разобраться с методами put delete

Route::group(['middleware' => ['cors']], function () {
//Маршруты для постов
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');
//Маршруты для комментариев
    Route::get('/comments/{id}', 'CommentsController@index');
//Маршруты для Категорий
    Route::get('/categories', 'CategoriesController@index');
    Route::get('/categories/{category}', 'CategoriesController@show');
//Маршруты для Тегов
    Route::get('/tags', 'TagsController@index');
    Route::get('/tags/{tag}', 'TagsController@show');
});

//Маршруты для Пользователя
Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'users'
], function ($router) {

    Route::post('login', 'AuthController@login'); //Авторизация пользователя. Возвращает user и token
    //Route::post('logout', 'AuthController@logout'); //Выход
    Route::post('refresh', 'AuthController@refresh'); //Обновление токена
    Route::post('me', 'AuthController@me'); // Получение авторизованного пользователя. Возвращает user
    Route::post('register', 'AuthController@register'); //Регистрация пользователя. Возвращает user, token, статус 201
});

//
Route::group(['middleware' => ['jwt.verify','cors']], function () {
    //роуты для постов
    Route::post('/posts', 'PostsController@store');
    Route::put('/posts/{post}', 'PostsController@update');
    Route::delete('/posts/{post}', 'PostsController@delete');
    //роуты для комментариев
    Route::post('/comments', 'CommentsController@store');
    Route::put('/comments/{id}', 'CommentsController@update');
    Route::delete('/comments/{id}', 'CommentsController@destroy');
    //роуты для тегов
    Route::post('/tags', 'TagsController@store');
    Route::patch('/tags/{tag}', 'TagsController@update');
    Route::delete('/tags/{tag}', 'TagsController@destroy');
    //роуты для категорий
    Route::post('/categories', 'CategoriesController@store');
    Route::put('/categories/{category}', 'CategoriesController@update');
    Route::delete('/categories/{category}', 'CategoriesController@destroy');
});
