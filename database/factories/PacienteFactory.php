<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'sexo' => 'H',
        'edad' => '20',
        'direccion' => $faker->address,
        'fechaNac' => $faker->date,
        'telefono' => $faker->phoneNumber,
        'notas' => $faker->sentence(10)
    ];
});
