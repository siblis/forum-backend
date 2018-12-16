<?php

namespace App;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public static function searchQuery()
    {
        $search = Input::get('search');

        if($search !='')
        {
            $categories = Categories::whereRaw('LOWER ("name") LIKE ? ', [trim(strtolower($search)) . '%'])
                ->get(['name']);

            $posts = Post::whereRaw('LOWER ("title") LIKE ?', [trim(strtolower($search)) . '%'])
                ->orWhereRaw('LOWER ("content") LIKE ?', [trim(strtolower($search)) . '%'])
                ->get(['title', 'content']);

            $users = Users::whereRaw('LOWER ("username") LIKE ?', [trim(strtolower($search)) . '%'])
                ->orWhereRaw('LOWER ("user_email") LIKE ?', [trim(strtolower($search)) . '%'])
                ->get(['username', 'user_email']);

            $tags = Tag::whereRaw('LOWER ("name") LIKE ?', [trim(strtolower($search)) . '%'])->get();

            $result = [];

            array_push($result, $categories, $posts, $users, $tags);

            $keys = ['Categories', 'Posts', 'Users', 'Tags'];

            $search_result = array_combine($keys, $result);

            return response()->json($search_result, 200);
        }
        else
        {
            return response()->json(null, 204);
        }
    }
}
