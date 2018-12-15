<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        return Comment::all()->where('post_id', $post_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = value_validation($request->all());
        return response()->json(Comment::create($data), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        //todo исправить данный обработчик. Сделать его универсальным для моделей
        if (Comment::checkWhoUpdated($comment)) {
            $data = value_validation($request->all());
            $comment->update($data);
            return response()->json($comment, 200);
        } else {
            return response()->json(['Error' => 'You don\' have rule'], 403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Comment::checkWhoUpdated($comment)) {
            $comment = Comment::find($id);
            $comment->delete();
            return response()->noContent(204);
        } else {
            return response()->json(['Error' => 'You don\' have rule'], 403);
        }
    }
}
