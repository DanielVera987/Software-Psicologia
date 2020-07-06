<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id'); 
            $table->unsignedInteger('paciente_id');
            $table->string('title');
            $table->text('descripcion');
            $table->text('observaciones');
            $table->string('negacion');
            $table->string('aceptacion');
            $table->string('pagado');
            $table->string('finalizado');
            $table->string('medio_pago'); //Gratis, Efectivo, Terjeta
            $table->string('importe');
            $table->string('hora_inicio');
            $table->string('hora_final');
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
