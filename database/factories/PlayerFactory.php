<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1, 201),
        'name' => $faker->name,
        'level_id' => $faker->numberBetween(1, 3),
        'score' => $faker->numberBetween(0, 150),
        'suspected' => $faker->boolean,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
