<?php

use KPO\Item;
use KPO\Taxpayer;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Item::class, function (Faker $faker) {
    return [
        'taxpayer_id'   => function () {
            return factory(Taxpayer::class)->create()->id;
        },
        'date'          => $faker->dateTimeBetween('1 January 2019'),
        'description'   => $faker->text(50, true),
        'product_value' => $faker->randomFloat(2, 500, 10000),
        'service_value' => $faker->randomFloat(2, 500, 10000),
    ];
});
