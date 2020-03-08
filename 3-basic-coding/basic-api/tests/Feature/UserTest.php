<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function all_user_with_filter()
    {
        $dao = factory('App\User')->create([
            'name' => 'Dao',
            'email' => 'dao@example.com',
            'role' => 'customer'
        ]);

        $dao->each(
            function ($user) {
                factory('App\Product')->create()->each(function ($product) use ($user) {
                    //data transaction
                    factory('App\Transaction')->create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ]);
                });
            }
        );

        $jan = factory('App\User')->create([
            'name' => 'Jan',
            'email' => 'jan@example.com',
            'role' => 'merchant'
        ]);
        $this->signIn($jan);

        // all users
        $responseUsers = $this->getJson('users')->assertStatus(200);
        $this->assertEquals(2, count($responseUsers->json()['data']));

        // user customer
        $responseCustomer = $this->getJson('users?role=customer')->assertStatus(200);
        $this->assertEquals(1, count($responseCustomer->json()['data']));
        $this->assertEquals($dao->name, $responseCustomer->json()['data'][0]['name']);

        // user merchant
        $responseMerchant = $this->getJson('users?role=merchant')->assertStatus(200);
        $this->assertEquals(1, count($responseMerchant->json()['data']));
        $this->assertEquals($jan->name, $responseMerchant->json()['data'][0]['name']);

        // user customer has transaction
        $customerHasTransaction = $this->getJson('users?role=customer&has_transaction=true')->assertStatus(200);
        $this->assertEquals(1, count($customerHasTransaction->json()['data']));
        $this->assertEquals($dao->name, $customerHasTransaction->json()['data'][0]['name']);
    }
}
