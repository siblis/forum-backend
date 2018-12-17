<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersInfoController extends Controller
{

    public function show($id)
    {
        $user_info = DB::table('users_info')->where('id', $id)->get();
        return response()->json($user_info, 200);
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
}
