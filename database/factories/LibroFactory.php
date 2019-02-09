<?php

use Faker\Generator as Faker;

$factory->define(App\Libro::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence(6, true),
        'valor' => $faker->numberBetween(10000,50000),
        'author' => $faker->name
    ];
});
