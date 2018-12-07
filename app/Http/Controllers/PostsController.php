<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class PostsController extends Controller
{
    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        $post->views++;
        $post->timestamps=false;
        $post->save();
        return $post;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store (Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required',
            'category_id'=>'required',
            'title'=>'required',
            'content'=>'required'
        ]);
        $post = Post::create($request->all());
        return response()->json($post,201);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return Post|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Post $post)
    {
        if (time()<=strtotime($post->created_at)+3600) {
            $this->validate($request,[
                'title'=>'required',
                'content'=>'required'
            ]);
            $post->update($request->all());
            return response()->json($post,200);
        }
        return $post;
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}

