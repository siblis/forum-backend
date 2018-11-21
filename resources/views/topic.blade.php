<?php
/* @var $topic \App\Topic */
/* @var $comments \App\Comment */
?>
<h1>Тема форума №{{$topic->id}}</h1>

{{$topic->author->name}} {{$topic->created_at}}
<hr>
<h2>Заголовок темы:</h2>
{{$topic->title}}
<hr>
<h2>Описание темы</h2>
{{$topic->description}}
<hr>
<h2>Текст темы</h2>
{{$topic->content}}
<hr><hr>
<h2>Комменты</h2>
@foreach($topic->comments as $comment)
    {{$comment->author->name}} {{$comment->created_at}}
    <p>{{$comment->text}}</p>
    <hr>

@endforeach

<form method="post" action="{{route('addComment',['id'=>$topic->id])}}">
    <div>
        <label for="author">Автор</label>
        <input type="text" name="author" id="author">
    </div>

    <div>
        <label for="comment">Комментарий</label>
        <textarea name="text" id="comment"></textarea>
    </div>

    <button type="submit">Отправить</button>

    {{csrf_field()}}

</form>
