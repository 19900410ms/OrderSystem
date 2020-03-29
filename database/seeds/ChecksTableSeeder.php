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
              'user_id'     => '4',
            ],
            [
              'total_price' => '30000',
              'user_id'     => '5',
            ],
        ];
  
        foreach ($check as $key => $value) {
            Check::create($value);
        }
    }
}
