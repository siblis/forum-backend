<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentsController extends Controller
{
    public function index($topic_id)
    {
        // return 'hello';
        return Comment::all()->where('topic_id',$topic_id);
    }

    public function create(Request $request,$id)
    {
        // id,user_id,topic_id,content
        $data = Comment::validate($request->all());
        $comment = Comment::create([
            'user_id' => $data['user_id'],
            'topic_id' => $id,
            'content' => $data['content']
        ]);
        return $comment->all()->last();
    }

    public function update(Request $request,$id)
    {
        $comment = Comment::find($id);
        if (isset($request['content'])) {
            $request['content'] = strip_tags($request['content']);
        }
        $comment->update($request->all());
        return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
