<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class PerfilPasante
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

        if (!Auth::user()->persona->pasante && Auth::user()->type=='Pasante') {
            return redirect()->to('/perfil');
        }else{
            return $next($request);
        }

    }
}
