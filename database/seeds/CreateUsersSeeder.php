<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'table_number'=>'666',
               'email'=>'admin@itsolutionstuff.com',
               'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'table_number'=>'1',
               'email'=>'user@itsolutionstuff.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
               'table_number'=>'2',
               'email'=>'costomer@itsolutionstuff.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
             ],
             [
               'table_number'=>'3',
               'email'=>'sample_user@itsolutionstuff.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
             ],
             [
               'table_number'=>'4',
               'email'=>'sample_costomer@itsolutionstuff.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
