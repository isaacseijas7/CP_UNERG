<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasante extends Model
{
    protected $table = 'pasantes';

    protected $fillable = [
        'periodo_academico','zurdo', 'alergias', 'grupo_sanguineo', 'idiomas', 'nombre_empresa', 'cursos_habilidades', 'lugar_nacimiento', 'email_alternativo', 'estado', 'tutor_estado' , 'persona_id'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function asignacion_empresarial()
    {
        return $this->belongsTo(AsignacionEmpresarial::class);
    }

    public function actividades()
    {
        return $this->hasOne(Actividad::class);
    }

    public function scopeSearch($query, $periodo)
    {
        return $query->where('periodo_academico', 'LIKE', "%$periodo%");
    }
}
