<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ad;
use App\AdCategory;
use App\User;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    $priceFloor = $faker->randomFloat('2', 1, 1500);
    $priceCeiling = $faker->randomFloat('2', $priceFloor, 9999);

    return [
        'title' => $faker->text(100),
        'body' => $faker->text(10000),
        'price_floor' => $priceFloor,
        'price_ceiling' => $priceCeiling,
        'user_id' => User::all()->random(1)->first()->id,
        'ad_category_id' => AdCategory::all()->random(1)->first()->id,
        'active_for' => $faker->numberBetween(1, 30),
        'created_at' => $faker->dateTimeBetween(now()->subDays(60), now()),
    ];
});
