<?php

namespace App\Http\Middleware;

use Closure;
use App\CronogramaPasantia;
use Session;

class Cronograma
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   

        if (count(CronogramaPasantia::activo()) < 1) {
            Session::flash('delete','Registre el nuevo <b>Cronograma de Pasantías</b> por favor');
            return redirect()->guest('/cronograma-pasantias');
        }else{
            return $next($request);
        }
    }
}
