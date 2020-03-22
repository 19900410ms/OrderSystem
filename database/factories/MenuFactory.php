<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    return [
        'name'    => $faker->unique()->foodName(),
        'image'   => $faker->image('public/storage',640,480, null, false),
        'price'   => $faker->randomFloat(4, 300, 2000),
        'category'=> $faker->randomFloat(2, 1, 15),
    ];
});
