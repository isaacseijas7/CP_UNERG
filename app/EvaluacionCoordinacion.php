<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionCoordinacion extends Model
{
    protected $table = 'evaluaciones_coordinacio';

    protected $fillable = [
        'nota_academica', 'nota_empresarial', 'nota_charla', 'nota_req', 'nota_informe', 'nota_defensa', 'status', 'pasantes_id',
    ];
}
