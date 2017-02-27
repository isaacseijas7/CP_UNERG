<?php

namespace App\Http\Controllers;

use App\User;
use App\Periodo;
use App\Persona;
use App\Pasante;
use App\PasanteInscrito;
use App\Empresa;
use App\SolicitudPasantes;
use App\PostulacionPasante;
use Auth;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class PasantesController extends Controller
{
    
    public function index(Request $request)
    {

        if (Auth::user()->type == "Admin") {
        	$pasantes = Pasante::search($request->periodo)->orderBy('id', 'DESC')->get();

            $pasantes->each(function($pasantes){
                $pasantes->persona;
            });

            return view('pasantes.index')->with('pasantes', $pasantes);
        }else{
            return redirect()->to('/');
        }
    }

    public function show($id)
    {
        //Mostrara los datos del pasante

        $persona = Persona::findOrFail($id);

        $persona->each(function($persona){
            $persona->usuario;
            $persona->pasante;
        });

        
            $tutorAcade = null; $tutorEmpre = null;
            if($persona->pasante->tutor_estado == "si"){
                $tutorAcade = \DB::table('asignacion_academica')
                    ->select(
                        'asignacion_academica.*',
                        'asignacion_academica.id as asignacion_id',
                        'tutores_academicos.persona_id',
                        'personas.*',
                        'users.*'
                    )
                    ->where('asignacion_academica.pasante_id', '=', $persona->pasante->id )
                    ->join('tutores_academicos', 'tutores_academicos.id', '=', 'asignacion_academica.tutores_a_id')
                    ->join('users', 'users.persona_id', '=', 'tutores_academicos.persona_id')

                    ->join('personas', 'personas.id', '=', 'tutores_academicos.persona_id')
                    ->first();
            }
            if($persona->pasante->estado == "activo"){
                $tutorEmpre = \DB::table('asignacion_empresarial')
                    ->select(
                        'asignacion_empresarial.*',
                        'asignacion_empresarial.id as asignacion_id',
                        'tutores_empresariales.cargo',
                        'tutores_empresariales.departamento',
                        'tutores_empresariales.profesion',
                        'personas.*'
                    )
                    ->where('asignacion_empresarial.pasante_id', '=', $persona->pasante->id )
                    ->join('tutores_empresariales', 'tutores_empresariales.id', '=', 'asignacion_empresarial.tutores_e_id')

                    ->join('personas', 'personas.id', '=', 'tutores_empresariales.persona_id')
                    ->first();
                
            }
        
        return view('pasantes.ver')->with(['pasante' => $persona, 'tutorAcade' => $tutorAcade, 'tutorEmpre' => $tutorEmpre]);
        
    } 

    public function register (Request $request)
    {
        $pasante = new Pasante($request->all());
        $pasante->persona_id = Auth::user()->persona_id;
        $pasante->estado = 'inactivo';
        $pasante->save();
        return redirect()->to('/perfil');
    }

    public function pasantesAceptados()
    {

        $empresa = \DB::table('empresas')
            ->where('user_id', '=', Auth::user()->id)
             ->get();    
        
        $pasantes = \DB::table('postulaciones_pasantes')
                ->select(
                    'postulaciones_pasantes.*',
                    'postulaciones_pasantes.id as postulaciones_pasantes_id',
                    'pasantes.*',
                    'personas.*'
                )
                ->where('empresa_id', '=', $empresa[0]->id)
                ->where('postulaciones_pasantes.status', '=', "Confirmada")
                ->join('pasantes', 'pasantes.id', '=', 'postulaciones_pasantes.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

    
        return view('empresas.pasantes_apectados')->with('pasantes', $pasantes);
    }


}
