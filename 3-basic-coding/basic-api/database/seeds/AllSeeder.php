<?php

use App\User;
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
        $merchant = new User();
        $merchant->name = 'Merchant';
        $merchant->email = 'im.merchant@gmail.com';
        $merchant->role = 'merchant';
        $merchant->email_verified_at = now();
        $merchant->remember_token = Str::random(10);
        $merchant->password = bcrypt('password');
        $merchant->save();

        //data user customer
        $customer = new User();
        $customer->name = 'Customer';
        $customer->email = 'im.customer@gmail.com';
        $customer->email_verified_at = now();
        $customer->remember_token = Str::random(10);
        $customer->password = bcrypt('password');
        $customer->save();
    }
}
