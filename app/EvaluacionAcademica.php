<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionAcademica extends Model
{
    protected $table = 'evaluaciones_academicas';

    protected $fillable = [
        'nota', 'aspenco_uno', 'aspenco_dos', 'aspenco_tres', 'aspenco_cuatro', 'aspenco_cinco', 'aspenco_seis', 'aspenco_siete', 'aspenco_ocho', 'aspenco_nueve', 'aspenco_dies', 'asignacion_id'
    ];
}
