<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllPosts()
    {
        $response = $this->json('GET','/posts?page=1');
        $response->assertJsonStructure(['data'=>
            ['0' => ['id','category_id','title','description','content','username','user_id']]]);
        $response->assertJsonFragment(['current_page'=>1]);
        $response->assertOk();
    }

    public function testGetPosts()
    {
        $response = $this->json('GET','/posts/1');
        $response->assertJsonStructure([
            'id','category_id','title','description','content','tags','views','created_at','canEdit'
        ]);
    }
}
