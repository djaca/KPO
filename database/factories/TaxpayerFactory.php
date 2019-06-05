<?php

use App\Taxpayer;
use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(Taxpayer::class, function (Faker $faker) {
    return [
        'pib'                      => $faker->randomNumber(9),
        'obveznik'                 => $faker->company,
        'sediste'                  => $faker->streetAddress,
        'sifra_poreskog_obveznika' => $faker->randomNumber(3),
        'sifra_delatnosti'         => $faker->randomNumber(3)
    ];
});
