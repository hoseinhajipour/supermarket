<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role_customer = new Role();
        $role_customer->name = 'customer';
        $role_customer->description = 'A customer user';
        $role_customer->save();

        $role_seller = new Role();
        $role_seller->name = 'seller';
        $role_seller->description = 'A seller user';
        $role_seller->save();
    }

}
