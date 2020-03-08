<?php

use App\User;
use App\Product;
use App\Transaction;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data user merchant
        factory(User::class)->create(['name' => 'Merchant', 'email' => 'im.merchant@gmail.com', 'role' => 'merchant']);
        //data user customer
        factory(User::class)->create(['name' => 'Customer', 'email' => 'im.customer@gmail.com', 'role' => 'customer']);
        // data user
        factory(User::class, 5)->create()->each(function ($userCustomer) {
            //data product
            factory(Product::class)->create()->each(function ($product) use ($userCustomer) {
                //data transaction
                factory(Transaction::class)->create([
                    'user_id' => $userCustomer->id,
                    'product_id' => $product->id,
                ]);
            });
        });
    }
}
