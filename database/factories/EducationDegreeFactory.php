<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EducationDegree;
use Faker\Generator as Faker;

$factory->define(EducationDegree::class, function (Faker $faker) {
    $priceFloor = $faker->randomFloat('2', 1, 1500);
    $priceCeiling = $faker->randomFloat('2', $priceFloor, 9999);

    return [
        'name' => $faker->unique()->jobTitle(),
    ];
});
