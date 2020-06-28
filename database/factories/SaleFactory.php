<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'amount' => true,
        'employee_id' => function () {
            return factory(App\Employee::class)->create()->id;
        }
    ];
});
