<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
      'nombre', 'apellido', 'sexo', 'edad', 'direccion', 'fechaNac',
      'telefono', 'notas'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function citas(){
      return $this->hasMany('App\Models\Cita');
    }

    public function documentos(){
      return $this->hasMany('App\Models\Documento');
    }
}
