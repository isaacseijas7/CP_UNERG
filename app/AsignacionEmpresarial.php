<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionEmpresarial extends Model
{
    protected $table = 'asignacion_empresarial';

    protected $fillable = [
        'pasante_id', 'tutores_e_id'
    ];

    public function pasante()
    {
        return $this->hasOne(Pasante::class);
    }

    public function tutoEmpresarial()
    {
        return $this->hasOne(TutorEmpresarial::class);
    }
}
