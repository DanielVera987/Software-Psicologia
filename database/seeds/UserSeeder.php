<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'nombre' => 'admin',
           'apellido' => 'admin',
           'telefono' => '123456789',
           'email' => 'admin@admin.com',
           'password' => \Hash::make('12345678')
        ]);
    }
}
