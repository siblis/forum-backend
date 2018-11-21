<?php
/**
 * Created by PhpStorm.
 * User: timurka
 * Date: 21.11.18
 * Time: 16:47
 */
?>

<form method="post" action="{{route('addTopic')}}">
    <div>
        <label for="author">Автор</label>
        <input type="text" name="author" id="author">
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>

    <div>
        <label for="desc">Description</label>
        <input type="text" name="description" id="desc">
    </div>

    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
    </div>

    <button type="submit">Отправить</button>

    {{csrf_field()}}

</form>
