<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudPasantes extends Model
{
    protected $table = 'sulicitudes_pasantes';

    protected $fillable = [
        'cantidad', 'descripcion', 'status', 'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
