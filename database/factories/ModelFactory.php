<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Place::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->company,
        "health" => mt_rand(1, 5),
        "slug" => null,
        "lng" => mt_rand(-35000, -25000) / 10000,
        "lat" => mt_rand(515000, 525000) / 10000,
    ];
});
