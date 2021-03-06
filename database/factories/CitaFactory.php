<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cita;
use Faker\Generator as Faker;

$factory->define(Cita::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'paciente_id' => rand(1,5),
        'title' => $faker->title,
        'descripcion' => $faker->sentence(10),
        'observaciones' => $faker->sentence(5),
        'negacion' => 'no',
        'aceptacion' => 'si',
        'distrajo' => 'si',
        'concentro' => 'no',
        'borro' => 'no',
        'pagado' => 'si',
        'finalizado' => 'no',
        'medio_pago' => 'Efectivo',
        'importe' => '150',
        'hora_inicio' => $faker->time,
        'hora_final' => $faker->time,
        'fecha_inicio' => $faker->date,
        'fecha_final' => $faker->date
    ];
});
