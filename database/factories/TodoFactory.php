<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        "todo" => $faker->sentence,
        "completed" => $faker->randomElement([0,1]),
        'content' => $faker->text,
        'location' => $faker->address,
        'datetime' => $faker->dateTime,
    ];
});
