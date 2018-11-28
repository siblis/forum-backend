<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentsController extends Controller
{
    public function getAllPost($topic_id)
    {
        return 'hello';
        // return Comments::all()->where('topic_id',$topic_id);
    }

    public function create(Request $request,$id)
    {
        // id,user_id,topic_id,content
        $data = Comment::validate($request->all());
        $comment = Comment::create([
            'user_id' => $data['user_id'],
            'topic_id' => $data['topic_id'],
            'content' => $data['content']
        ]);
        return $comment->all()->first();
    }
}
