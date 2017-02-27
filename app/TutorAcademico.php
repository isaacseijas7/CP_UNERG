<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAcademico extends Model
{
    protected $table = 'tutores_academicos';

    protected $fillable = [
        'persona_id'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function asignacion()
    {
        return $this->belongsTo(AsignacionAcademica::class);
    }
}
