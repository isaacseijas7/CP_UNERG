<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'rif', 'nombre_razon', 'correo', 'telefono', 'direccion', 'pagina_web', 'descripcion'
    ];

    public function tutorEmpresarial()
    {
        return $this->belongsTo(TutorEmpresarial::class);
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudPasantes::class);
    }

    public function scopeSearch($query, $rif)
    {
        return $query->where('rif', 'LIKE', "%$rif%");
    }
}
