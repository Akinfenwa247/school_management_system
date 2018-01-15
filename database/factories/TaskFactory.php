<?php

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
        "task_date" => $faker->date("d/m/Y H:i:s", $max = 'now'),
    ];
});
