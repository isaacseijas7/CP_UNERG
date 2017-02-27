<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasantesTutores extends Model
{
    protected $table = 'pasantes_tutores';

    protected $fillable = [
        'pasante_id', 'tutores_e_id', 'tutores_a_id', 'periodo_id'
    ];
}
