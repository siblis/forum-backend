<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public static function searchQuery($search)
    {
        if($search !='')
        {
            $categories = Categories::whereRaw('LOWER ("name") LIKE ? ', [trim(strtolower($search)) . '%'])
                ->paginate(15)->get(['name']);

            $posts = Post::whereRaw('LOWER ("title") LIKE ?', [trim(strtolower($search)) . '%'])
                ->orWhereRaw('LOWER ("content") LIKE ?', [trim(strtolower($search)) . '%'])
                ->paginate(15)->get(['title', 'content']);

            $users = User::whereRaw('LOWER ("name") LIKE ?', [trim(strtolower($search)) . '%'])
                ->orWhereRaw('LOWER ("email") LIKE ?', [trim(strtolower($search)) . '%'])
                ->paginate(15)->get(['name', 'email']);

            $tags = Tag::whereRaw('LOWER ("name") LIKE ?', [trim(strtolower($search)) . '%'])->paginate(15)->get();

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
