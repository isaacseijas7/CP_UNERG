<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionEmpresarial extends Model
{
    protected $table = 'evaluaciones_empresariales';

    protected $fillable = [
        'nota', 'aspenco_uno', 'aspenco_dos', 'aspenco_tres', 'aspenco_cuatro', 'aspenco_cinco', 'aspenco_seis', 'aspenco_siete', 'aspenco_ocho', 'aspenco_nueve', 'aspenco_dies', 'asignacion_id'
    ];


    public function asignacionE()
    {
        return $this->belongsTo(AsignacionEmpresarial::class);
    }
}
