<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\DatabaseSeed;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CommentsTest extends TestCase
{
    use DatabaseSeed;

    public function Login()
    {
        $login = $this->json('POST','/users/login',[
            'email' => 'admin@mail.ru',
            'password' => 'secret'
        ])->original;
        return ['authorization'=> 'Bearer '.$login['access_token']];
    }

    public function testGetComments():void
    {
        $response = $this->json('GET', '/posts/1/comments');
        $response->assertOk();
        $response->assertJsonStructure(['data'=>[]]);
    }

    public function testGetCommentsContent():void
    {
        $response = $this->json('GET', '/posts/1/comments');
        $res = json_decode($response->content(),true);
        foreach ($res['data'] as $item) {
            $this->assertIsNumeric($item['id']);
            $this->assertIsNumeric($item['post_id']);
            $this->assertIsNumeric($item['user_id']);
            $this->assertIsString($item['content']);
            $this->assertIsArray($item['username']);
            $this->assertIsString($item['username']['name']);
        }
    }

    public function testCreateComentsFailAuth():void
    {
        $response = $this->json('POST','/posts/1/comments',['content'=>'test']);
        $response->assertStatus(403);
    }

    public function testCreateComments():void
    {
        $faker = \Faker\Factory::create('ru_RU');
        $text = $faker->realText(100);
        $response = $this->withHeaders($this->login())->json('POST','/posts/1/comments',
            ['content'=>$text]);
        $response->assertStatus(201);
    }
}
