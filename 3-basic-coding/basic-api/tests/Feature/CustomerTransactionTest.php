<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTransactionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_customer_can_buy_product()
    {
        $user = $this->signIn();
        $product = factory('App\Product')->create();
        $attributes = ['user_id' => $user->id, 'product_id' => $product->id, 'quantity' => 1];
        $response = $this->postJson('transactions', $attributes);
        $response->assertStatus(201)
        ->assertJsonStructure(['data' => ['user_id', 'product_id', 'quantity', 'created_at', 'updated_at']]);
        $this->assertEquals(1, count($response->json()));
        $this->assertDatabaseHas('transactions', $attributes);
    }
}
