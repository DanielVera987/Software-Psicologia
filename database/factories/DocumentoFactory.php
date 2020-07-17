<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Documento;
use Faker\Generator as Faker;

$factory->define(Documento::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'paciente_id' => rand(1,5),
        'path' => $faker->imageUrl,
        'nombre' => $faker->title
    ];
});
