<?php
/* @var $topics \App\Topic*/
/* @var $topic \App\Topic*/
?>
<a href="{{route('newTopic')}}">Создать топик</a>
<br><br><br>
<table>
    <tr>
        <th>Title</th><th>Author</th><th>Comments</th>
    </tr>
    @foreach($topics as $topic)
        <tr>
            <td><a href="{{route('getTopic',['id'=>$topic->id])}}">{{$topic->title}}</a><br>
                {{$topic->description}}
            </td>

            <td>{{$topic->author->name}}</td>
            <td>{{$topic->comments()->count()}}</td>
        </tr>
    @endforeach
</table>

