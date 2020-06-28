<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        factory(App\Models\Paciente::class, 5)->create();
        factory(App\Models\Cita::class, 5)->create();
        factory(App\Models\Documento::class, 5)->create();
    }
}
