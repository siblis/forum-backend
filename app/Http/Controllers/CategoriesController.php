<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
//  Метод вывода всех Категорий.

    public function index()
    {
        $data = Categories::all();
        $data = Categories::getAmountPosts($data);
        return response()->json($data,200);
    }

//  Метод вывода конкретной Категории.

    public function show(Categories $category)
    {
        $data = $category;
        $data['posts'] = Post::All()->where('category_id',$category->id)->count();
        return response()->json($data,200);
    }

//  Метод отправки содержимого форм в БД.

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'avatar' => 'required',
            'description' => 'required'
        ]);

        $data = value_validation(request(['name', 'description', 'avatar']));
        $data['status'] = true;//пока заглушка

        $category = Categories::create($data);
        return response()->json($category, 201);
    }

//  Метод сохранения изменений в Категории.

    public function update(Categories $category) {
        //todo Добавить валидацию
        $category->update(request()->all());

        return response()->json($category,200);
    }

//  Метод Удаления Категории.

    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();

        return response()->noContent(204);
    }
}

