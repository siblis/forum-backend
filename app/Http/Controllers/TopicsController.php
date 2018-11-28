<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
class TopicsController extends Controller
{
    public function index($id)
    {
        return Topic::all()->where('categories_id',$id);
    }

    public function getOne($id)
    {
        return Topic::find($id);
    }

    public function create(Request $request)
    {
        $data = value_validation($request->all());
        return Topic::create($data);
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);
        $data = value_validation($request->all());
        $topic->update($data);
        return $topic;
    }

    public function delete($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return 1;
    }
}
