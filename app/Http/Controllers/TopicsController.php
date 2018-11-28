<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
class TopicsController extends Controller
{
    public function index($id)
    {
        return Topic::all()->where('category_id',$id);
    }

    public function getOne($id)
    {
        return Topic::find($id);
    }

    public function create(Request $request)
    {
            return Topic::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);
        $topic->update($request->all());
        return $topic;
    }

    public function delete($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return 1;
    }
}
