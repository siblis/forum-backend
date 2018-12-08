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
        return response()->json(Categories::all(),200);
    }

//  Метод вывода конкретной Категории.

    public function show(Categories $category)
    {
        $data = $category;
        $data['posts'] = Post::All()->where('category_id',$category->id);
        return response()->json($data,200);
    }

//  Метод отправки содержимого форм в БД.

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'status' => 'required',
            'avatar' => 'required',
            'description' => 'required'
        ]);

        return Categories::create(request(['name', 'status', 'description', 'avatar']));
    }

//  Метод сохранения изменений в Категории.

    public function update(Categories $category) {

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

