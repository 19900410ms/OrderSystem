<?php

use Illuminate\Database\Seeder;
use App\Models\Check;

class ChecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = [
            [
              'total_price' => '20000',
              'user_id'     => '2',
              'order_id'    => '2',
            ],
        ];
  
        foreach ($check as $key => $value) {
            Check::create($value);
        }
    }
}
