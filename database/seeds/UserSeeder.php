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
           'nombre' => 'Daniel',
           'apellido' => 'Vera',
           'telefono' => '9875649963',
           'email' => 'danielveraangulo703@gmail.com',
           'password' => \Hash::make('12345678')
        ]);
    }
}
