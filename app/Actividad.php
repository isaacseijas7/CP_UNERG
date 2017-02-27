<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'actividad', 'pasante_id', 'status'
    ];

    public function pasante()
    {
        return $this->belongsTo(Pasante::class);
    }
}
