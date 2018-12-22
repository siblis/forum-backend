<?php

namespace Tests\Feature;

use Tests\DatabaseSeed;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use DatabaseSeed;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLoginUser()
    {
        $response = $this->json('POST', '/users/login', [
            'email' => 'admin@mail.ru',
            'password' => 'secret'
        ]);
        $response->assertOk();
        $response->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }

    public function testLoginResponse()
    {
        $response = $this->json('POST', '/users/login', [
            'email' => 'admin@mail.ru',
            'password' => 'secret'
        ]);
        $res = $response->original;
        $this->assertIsString($res['access_token']);
        $this->assertEquals($res['token_type'], 'bearer');
    }


}
