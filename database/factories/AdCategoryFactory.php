<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdCategory;
use Faker\Generator as Faker;

$factory->define(AdCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle(),
    ];
});

