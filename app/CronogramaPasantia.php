<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CronogramaPasantia extends Model
{
	protected $table = 'cronogramas_pasantias';

    protected $fillable = [
	    'periodo', 'primera_charla', 'segunda_charla', 'entrega_req_inic', 'primera_visita', 'reasignacion', 'desarrollo_pasantias', 'segunda_visita', 'desde_entrega_req_fina', 'hasta_entrega_req_fina', 'desde_presentacion_oral', 'hasta_presentacion_oral', 'carga_notas', 'estado'
    ];

    static function activo()
    {
    	return  CronogramaPasantia::where('estado', '=', 'activo' )->get();
    }

}
