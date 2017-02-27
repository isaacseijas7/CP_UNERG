<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorEmpresarial extends Model
{
    protected $table = 'tutores_empresariales';

    protected $fillable = [
        'cargo', 'departamento', 'profesion', 'persona_id', 'empresa_id'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function asignacion()
    {
        return $this->belongsTo(AsignacionEmpresarial::class);
    }
}
