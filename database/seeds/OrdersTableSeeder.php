<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Order::class, 5)->create();
        $order = [
            [
              'count'        => '1',
              'user_id'      => '2',
              'menu_id'      => '1',
            ],
            [
              'count'        => '5',
              'user_id'      => '2',
              'menu_id'      => '2',
            ],
            [
              'count'        => '3',
              'user_id'      => '2',
              'menu_id'      => '3',
             ],
            [
              'count'        => '2',
              'user_id'      => '3',
              'menu_id'      => '4',
            ],
            [
              'count'        => '3',
              'user_id'      => '3',
              'menu_id'      => '5',
            ],
            [
              'count'        => '1',
              'user_id'      => '3',
              'menu_id'      => '6',
            ],
        ];
  
        foreach ($order as $key => $value) {
            Order::create($value);
        }
    }
}
