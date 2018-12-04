<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('user_id');
<<<<<<< HEAD
=======
            //$table->integer('tag_id');
>>>>>>> поправил миграцию Posts (убрал поле tag_id и ключ к нему), поправил модель и контроллер Post (включил жадную загрузку комментов)
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->integer('views')->default(0);
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
<<<<<<< HEAD
=======
            //$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> поправил миграцию Posts (убрал поле tag_id и ключ к нему), поправил модель и контроллер Post (включил жадную загрузку комментов)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
