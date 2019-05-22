<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;


$factory->define(Item::class, function (Faker $faker) {
    return [
        'date'          => $faker->date(),
        'description'   => $faker->words(7, true),
        'product_value' => $faker->randomFloat(2, 500, 10000),
        'service_value' => $faker->randomFloat(2, 500, 10000),
    ];
});
