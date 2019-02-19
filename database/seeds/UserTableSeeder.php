<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role_customer = Role::where('name', 'customer')->first();
        $role_seller = Role::where('name', 'seller')->first();
        $customer = new User();
        $customer->name = 'customer name';
        $customer->email = 'customer@example.com';
        $customer->password = bcrypt('secret');
        $customer->save();
        $customer->roles()->attach($role_customer);
        $seller = new User();
        $seller->name = 'seller Name';
        $seller->email = 'seller@example.com';
        $seller->password = bcrypt('secret');
        $seller->save();
        $seller->roles()->attach($role_seller);
    }

}
