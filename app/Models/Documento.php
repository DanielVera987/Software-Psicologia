<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [
       'paciente_id', 'path', 'nombre'
    ];

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
