<?php

namespace App\Http\Controllers;

use App\Author;
use App\Comment;
use App\Topic;
use Illuminate\Http\Request;
use Faker;

class ForumController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $topics=Topic::with('comments')->orderBy('updated_at','desc')->get();
        return view('forum',compact('topics'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $topic=Topic::where('id',$id)->with('comments')->first();
        return view('topic')->with([
            'topic'=>$topic
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newTopic(){
        return view('add');
    }

    public function addTopic(Request $request){
        $this->validate($request,Topic::rules());
        $post=$request->all();
        $topic = new Topic();
        $topic->addTopic($post);
        return redirect(route('getTopic',['id'=>$topic->id]));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addComment($id, Request $request){
        $this->validate($request,Comment::rules());
        $post=$request->all();
        $post['topic_id']=$id;
        $comment = new Comment();
        $comment->addComment($post);
        return redirect(route('getTopic',['id'=>$id]));
    }

    /*private function filing($x){
        $faker=Faker\Factory::create();
        for ($i=1;$i<=$x;$i++){
            $topic=new Topic;
            $topic->title=$faker->sentence;
            $topic->description=$faker->paragraph;
            $topic->content=$faker->text;
            $topic->author_id=1;
            $topic->save();
        }
    }*/
}
