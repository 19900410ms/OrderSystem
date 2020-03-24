<?php

use Illuminate\Database\Seeder;

use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Menu::class, 5)->create();

        $menu = [
            [
               'name'    => 'meat',
               'image'   => '/uploads/images/meat_1585039408.jpg',
               'price'   => '3000',
               'category'=> '1',
            ],
            [
               'name'    => 'fish',
               'image'   => '/uploads/images/fish_1585039423.jpg',
               'price'   => '3000',
               'category'=> '2',
             ],
             [
               'name'    => 'salada',
               'image'   => '/uploads/images/salada_1585039388.jpg',
               'price'   => '1000',
               'category'=> '3',
             ],
             [
               'name'    => 'drink',
               'image'   => '/uploads/images/drink_1585039452.jpg',
               'price'   => '500',
               'category'=> '4',
             ],
             [
               'name'    => 'sweets',
               'image'   => '/uploads/images/sweets_1585039505.jpg',
               'price'   => '1000',
               'category'=> '5',
             ],
             [
               'name'    => 'other',
               'image'   => '/uploads/images/other_1585039488.jpg',
               'price'   => '1500',
               'category'=> '6',
             ],
        ];

        foreach ($menu as $key => $value) {
          Menu::create($value);
      }
    }
}
