<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testLogin()
    {
        // $this->withoutExceptionHandling();
        $user = factory('App\User')->create();
        $this->json('POST', 'login', [
            'email' => $user->email,
            'password' => 'password',
        ], ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure(['data' => ['id', 'name', 'email', 'role', 'point', 'created_at', 'updated_at'], 'accessToken']);
    }

    public function testLogout()
    {
        $this->signIn();
        $response = $this->json('POST', 'logout');
        $response->assertStatus(200)
        ->assertJsonStructure(['message']);
    }

    public function testRegister()
    {
        $data = factory('App\User')->raw();
        $this->json('POST', 'register', $data, ['Accept' => 'application/json'])
        ->assertStatus(201)
        ->assertJsonStructure(['data' => ['id', 'name', 'email', 'role', 'point', 'created_at', 'updated_at']]);
    }
}
