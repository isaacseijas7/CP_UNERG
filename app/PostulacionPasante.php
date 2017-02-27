<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostulacionPasante extends Model
{
    protected $table = 'postulaciones_pasantes';

    protected $fillable = [
        'pasante_id', 'empresa_id', 'status'
    ];
}
