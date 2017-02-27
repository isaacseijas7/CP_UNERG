<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $fillable = [
        'periodo', 'fecha_inicio', 'fecha_final'
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }
}
