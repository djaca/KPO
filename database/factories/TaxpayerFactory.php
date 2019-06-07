<?php

use KPO\Taxpayer;
use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(Taxpayer::class, function (Faker $faker) {
    return [
        'id'            => $faker->unique()->randomNumber(9),
        'name'          => $faker->company,
        'place'         => $faker->streetAddress,
        'taxpayer_code' => $faker->randomNumber(3),
        'activity_code' => $faker->randomNumber(3)
    ];
});
