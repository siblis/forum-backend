<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Utilities\СheckWhoUpdated;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        return response()->json(Comment::all()->where('post_id', $post_id)->paginate(10),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //todo добавить стандартную валидацию laravel

        request()->validate
        ([
            'user_id' => 'required',
            'post_id' => 'required',
            'content' => 'required',
        ]);

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
    public function update(Request $request, Comment $comment)
    {
        if (СheckWhoUpdated::check($comment['user_id'])) {
            $data = value_validation($request->all());
            $comment->update($data);
            return response()->json($comment, 200);
        } else {
            return response()->json(['Error' => 'You don\' have rule'], 403);
        }

    }


    /**
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        if (СheckWhoUpdated::check($comment['user_id'])) {
            $comment->delete();
            return response()->noContent(204);
        } else {
            return response()->json(['Error' => 'You don\' have rule'], 403);
        }
    }
}
