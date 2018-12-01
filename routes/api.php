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
Route::get('categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');
Route::put('/categories/{category}', 'CategoriesController@update');
Route::get('categories/{category}/edit', 'CategoriesController@edit');
Route::delete('/categories/{category}', 'CategoriesController@destroy');
//Маршруты для Тегов
Route::get('/tags','TagsController@index');
Route::get('/tags/{tag}','TagsController@show');
Route::get('tags/create','TagsController@create');
Route::post('/tags', 'TagsController@store');
Route::patch('/tags/{tag}', 'TagsController@update');
Route::get('tags/{tag}/edit','TagsController@edit');
Route::delete('/tags/{tag}', 'TagsController@destroy');
//Маршруты для Пользователя
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}','UsersController@show');
Route::get('users/create', 'UsersController@create');
Route::post('/users', 'UsersController@store');
Route::put('/users/{user}', 'UsersController@update');
Route::get('users/{user}/edit', 'UsersController@edit');
Route::delete('/users/{user}', 'UsersController@destroy');

//В фаиле api.php указываеются роуты именно для создание api приложения.
//полный адресс будет выглядить примерно так mysait.com/api/post или mysait.com/api/user 
//Посты
Route::get('/post/{id?}', 'TopicsController@getPost'); //Возвращает все посты или по id. знак ? означает необязательный параметр
Route::post('/post', 'TopicsController@addPost');  //Добавляет посты. Возвращает ?
Route::put('/post/{id}', 'TopicsController@editPost'); //Редактирование поста по id. Возвращает ?
Route::delete('/post/{id}', 'TopicsController@delPost'); //Удаление поста по id. Возвращает 1 или 0

//Комментарии
Route::get('/comment/{id?}', 'CommentController@getComment'); // Возвращает комментарии все или по id
Route::post('/comment', 'CommentController@addComment'); //Добавление комментари.
Route::put('/comment/{id}', 'CommentController@editComment'); //Редактирование комментария.
Route::delete('/comment/{id}', 'CommentController@delComment'); //Удаляет комментарий. Возвращает 1 или 0


//Юзвери
Route::get('/user/info/{id}', 'UserS@getUser'); // Возвращает данные о пользователе по id. 
Route::get('/user/auth', 'UserS@authUser'); //Авторизация пользователя. Возвращает 1 или 0, и ид пользователя (?)
Route::post('/user', 'UserS@addUser'); //регистрация юзера. Возвращает 1 или 0
Route::put('/user/{id}', 'UserS@editUser'); //Редактирование юзера по id. Возвращает 1 или 0
Route::delete('/user/{id}', 'UserS@delUser'); //Удаление юзера по id. Возвращает 1 или 0


//Правда я еще не понимаю как они на вю сделают работу с сессиями. ))