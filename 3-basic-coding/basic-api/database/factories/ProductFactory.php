<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Product ???'),
        'price' => $faker->randomNumber(3),
        'description' => $faker->lexify('Description Product ???'),
    ];
});
