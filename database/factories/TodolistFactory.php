<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todolist;
use Faker\Generator as Faker;

$factory->define(Todolist::class, function (Faker $faker) {
    return [
        "name" =>$faker->sentence
    ];
});
