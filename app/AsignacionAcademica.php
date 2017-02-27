<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionAcademica extends Model
{
    protected $table = 'asignacion_academica';

    protected $fillable = [
        'pasante_id', 'tutores_a_id'
    ];

    public function pasante()
    {
        return $this->hasOne(Pasante::class);
    }

    public function tutoAcademico()
    {
        return $this->hasOne(TutorAcademico::class);
    }
}
