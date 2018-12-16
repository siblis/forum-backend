<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//  Метод вывода всех Пользователей.

    public function index()
    {
        return response()->json(Users::all(),200);
    }

//  Метод вывода конкретного Пользователя.

    public function show(Users $user)
    {
        return response()->json($user,200);
    }

//  Метод отправки содержимого форм в БД.

    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'user_email' => 'required',
            'password' => 'required',
        ]);
        $data = Users::create(request(['username', 'user_email', 'password']));
       return response()->json($data,201);
    }

//  Метод сохранения изменений Пользователей.

    public function update(Users $user) {

        $user->update(request()->all());

        return response()->json($user,200);
    }

//  Метод удаления Пользователя.

    public function destroy($id) {

        Users::findOrFail($id)->delete();

        return response()->noContent(204);
    }
}
