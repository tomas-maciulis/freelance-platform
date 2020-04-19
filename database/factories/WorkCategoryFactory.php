<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkCategory;
use Faker\Generator as Faker;

$factory->define(WorkCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle(),
    ];
});

