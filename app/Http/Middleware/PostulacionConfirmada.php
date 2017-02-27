<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Session;

class PostulacionConfirmada
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
        $postulacionesPasante = \DB::table('postulaciones_pasantes')
            ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
            ->where('status' ,'=', 'Confirmada')
            ->join('empresas', 'empresas.id', '=', 'postulaciones_pasantes.empresa_id')
            ->get();


        if (count($postulacionesPasante) > 0) {
            Session::flash('delete',"Usted ya confirmo la empresa <b>". $postulacionesPasante[0]->nombre_razon."</b> para realizar sus pasantias ");
            return redirect()->to('/home');
        }else{
            return $next($request);
        }
    }
}
