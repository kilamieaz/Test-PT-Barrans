<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProduct extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_see_all_products()
    {
        $this->signIn();

        $product = factory('App\Product')->create([
            'name' => 'Product 1',
            'description' => 'Description Product 1'
        ]);
        $response = $this->getJson('products')->assertStatus(200);

        $this->assertEquals(1, count($response->json()));

        $this->assertEquals('Product 1', $response->json()['data'][0]['name']);
    }

    /** @test */
    public function a_merchant_can_create_a_product()
    {
        // $this->withoutExceptionHandling();
        $user = factory('App\User')->create([
            'role' => 'merchant'
        ]);
        $this->signIn($user);

        $data = factory('App\Product')->raw();
        $response = $this->postJson('products', $data)
        ->assertStatus(201)
        ->assertJsonStructure(['data' => ['id', 'name', 'description', 'price', 'created_at', 'updated_at']]);

        $this->assertEquals(1, count($response->json()));
    }

    /** @test */
    public function a_merchant_can_update_a_product()
    {
        $user = factory('App\User')->create([
            'role' => 'merchant'
        ]);
        $this->signIn($user);

        $attributes = ['name' => 'product changed', 'price' => 1000, 'description' => 'changed'];

        $product = factory('App\Product')->create();

        $response = $this->putJson("products/$product->id", $attributes)
        ->assertStatus(200)
        ->assertJsonStructure(['data' => ['id', 'name', 'description', 'price', 'created_at', 'updated_at']]);

        $this->assertDatabaseHas('products', $attributes);

        $this->assertEquals('product changed', $response->json()['data']['name']);
    }

    /** @test */
    public function a_merchant_can_delete_a_product()
    {
        $user = factory('App\User')->create([
            'role' => 'merchant'
        ]);
        $this->signIn($user);

        $product = factory('App\Product')->create([
            'name' => 'Product 1',
            'description' => 'Description Product 1'
        ]);

        $this->deleteJson("products/$product->id")->assertStatus(204);

        $this->assertDatabaseMissing('products', $product->only('id'));
    }
}
