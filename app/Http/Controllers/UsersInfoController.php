<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersInfoController extends Controller
{
    public function index()
    {
        $users_info = DB::table('users_info')->get();
        return response()->json($users_info, 200);
    }

    public function show($id)
    {
        $user_info = DB::table('users_info')->where('id', $id)->get();
        return response()->json($user_info, 200);
    }

    public function store()
    {
        request()->validate([
            'avatar' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'about' => 'required',
            'rating' => 'required',
            'rule' => 'required'
        ]);

        $user_info = DB::table('users_info')->insert
            ([
                'avatar' => request('avatar'),
                'full_name' => request('full_name'),
                'phone' => request('phone'),
                'about' => request('about'),
                'rating' => request('rating'),
                'rule' => request('rule')
            ]);

        return response()->json($user_info, 201);
    }

    public function update($id)
    {
        $user_info = DB::table('users_info')->where('id', $id)->update
            ([
                'avatar' => request('avatar'),
                'full_name' => request('full_name'),
                'phone' => request('avatar'),
                'about' => request('avatar'),
                'rating' => request('rating'),
                'rule' => request('rule')
            ]);

        return response()->json($user_info, 200);
    }

    public function destroy($id)
    {
        DB::table('users_info')->where('id', $id)->delete($id);
        return response()->json(null, 204);
    }
}
