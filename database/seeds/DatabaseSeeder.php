<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUsersSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ChecksTableSeeder::class);
    }
}
