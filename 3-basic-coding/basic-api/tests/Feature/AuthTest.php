<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Airlock\Airlock;

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
        ->assertJsonStructure(['data' => ['id', 'name', 'email', 'created_at', 'updated_at'], 'accessToken']);
    }

    public function testLogout()
    {
        Airlock::actingAs(
            factory('App\User')->create(),
            ['*']
        );
        $response = $this->json('POST', 'logout');
        $response->assertStatus(200)
        ->assertJsonStructure(['message']);
    }

    public function testRegister()
    {
        $data = factory('App\User')->raw();
        $this->json('POST', 'register', $data, ['Accept' => 'application/json'])
        ->assertStatus(201)
        ->assertJsonStructure(['data' => ['id', 'name', 'email', 'created_at', 'updated_at']]);
    }
}
