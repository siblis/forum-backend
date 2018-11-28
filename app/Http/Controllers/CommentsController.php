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
        $data = value_validation($request->all());
        return Comment::create($data);
    }

    public function update(Request $request,$id)
    {
        $comment = Comment::find($id);
        $data = value_validation($request->all());
        $comment->update($data);
        return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
