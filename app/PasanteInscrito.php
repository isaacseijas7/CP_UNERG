<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasanteInscrito extends Model
{
    protected $table = 'pasantes_inscritos';

    protected $fillable = [
        'cedula', 'email'
    ];
}
