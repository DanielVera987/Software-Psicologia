<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
       'paciente_id'
       , 'title'
       , 'descripcion'
       , 'observaciones'
       , 'negacion'
       , 'aceptacion'
       , 'distrajo'
       , 'concentro'
       , 'borro'
       , 'pagado'
       , 'finalizado'
       , 'medio_pago'
       , 'importe'
       , 'hora_inicio'
       , 'hora_final'
       , 'fecha_inicio'
       , 'fecha_final'
    ];

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }

}
