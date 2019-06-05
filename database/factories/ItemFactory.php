<?php

use App\Item;
use App\Taxpayer;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Item::class, function (Faker $faker) {
    return [
        'taxpayer_id'   => function () {
            return factory(Taxpayer::class)->create()->id;
        },
        'date'          => $faker->date(),
        'description'   => $faker->words(7, true),
        'product_value' => $faker->randomFloat(2, 500, 10000),
        'service_value' => $faker->randomFloat(2, 500, 10000),
    ];
});
