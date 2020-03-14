<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        "todo" => $faker->sentence,
        "completed" => $faker->randomElement([0,1]),
        'location' => $faker->address,
        'date' => $faker->date,
        'time' => $faker->time,
    ];
});
