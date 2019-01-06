<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'task' => $faker->name,
        'status' => 'doing',
    ];
});
