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
        $userAdmin = new User();
        $userAdmin->name = 'Merchant';
        $userAdmin->email = 'im.merchant@gmail.com';
        $userAdmin->email_verified_at = now();
        $userAdmin->remember_token = Str::random(10);
        $userAdmin->password = bcrypt('password');
        $userAdmin->save();

        //data user customer
        $userAdmin = new User();
        $userAdmin->name = 'Customer';
        $userAdmin->email = 'im.customer@gmail.com';
        $userAdmin->email_verified_at = now();
        $userAdmin->remember_token = Str::random(10);
        $userAdmin->password = bcrypt('password');
        $userAdmin->save();
    }
}
