<?php

namespace App\Http\Controllers;

use App\User;
use App\Periodo;
use App\Persona;
use App\Empresa;
use App\Pasante;
use App\PasanteInscrito;
use App\CronogramaPasantia;
use App\AsignacionEmpresarial;
use App\AsignacionAcademica;
use Auth;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class PersonasController extends Controller
{
    public function perfil ()
    {

        $persona = Persona::where('id', '=', Auth::user()->persona_id  )->get()[0];

        $persona->each(function($persona){
            $persona->usuario;
            $persona->pasante;
        });
    	if (Auth::user()->type == "Admin") {
    		return view('auth.perfil')->with('persona', $persona);
    	}
        elseif (Auth::user()->type == "Empresa") {
            $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];
            return view('empresas.perfil')->with('empresa', $empresa);
            
        }
        elseif (Auth::user()->type == "Pasante") {

	        if (!$persona->pasante) {
                $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();
	            return view('pasantes.register')->with(['pasante'=>$persona, 'cronograma'=>$cronograma]);
	        }else{
                
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

                    ->join('personas', 'personas.id', '=', 'tutores_academicos.persona_id')
                    ->join('users', 'users.persona_id', '=', 'tutores_academicos.persona_id')
                    ->first();

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


                //dd($tutorEmpre, $tutorAcade);

	            return view('pasantes.perfil')->with(['pasante' => $persona, 'tutorAcade' => $tutorAcade, 'tutorEmpre' => $tutorEmpre]);
	        } 
    	}elseif (Auth::user()->type == "Tutor Empresarial") {
            
            return view('tutores.empresariales.perfil')->with(['tutor' => $persona]);
            
        }elseif (Auth::user()->type == "Tutor Academico") {
            
            return view('tutores.academicos.perfil')->with(['tutor' => $persona]);
            
        }

    }

    public function perfilEditarFrm(){

        $persona = Persona::where('id', '=', Auth::user()->persona_id  )->get()[0];

        $persona->each(function($persona){
            $persona->usuario;
            $persona->pasante;
        });

        if (Auth::user()->type == "Pasante") {

            return view('pasantes.editar_perfil')->with('pasante', $persona);

        }elseif (Auth::user()->type == "Empresa") {

            $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];
            return view('empresas.editar_perfil')->with('empresa', $empresa);

        }elseif (Auth::user()->type == "Tutor Empresarial") {
            
            return view('tutores.empresariales.editar_perfil')->with(['tutor' => $persona]);
            
        }elseif (Auth::user()->type == "Admin") {
            
            return view('cordinacion.editar_perfil')->with('persona', $persona);

        }elseif (Auth::user()->type == "Tutor Academico") {
            
            return view('tutores.academicos.editar_perfil')->with(['tutor' => $persona]);
            
        }

    }


    public function perfilPersonaEditar(Request $request){

        $persona = Persona::find($request->id);
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->genero = $request->genero;
        $persona->fecha_nacimento = $request->fecha_nacimento;
        $persona->telefono_uno = $request->telefono_uno;
        $persona->direccion = $request->direccion;
        $persona->save();
        Session::flash('save','Datos personales editados con exito');
        return redirect()->to('/perfil/editar/');

    }

    public function perfilEmpresaEditar(Request $request){

        $persona = Empresa::find($request->id);
        $persona->nombre_razon = $request->nombre_razon;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->pagina_web = $request->pagina_web;
        $persona->descripcion = $request->descripcion;
        $persona->save();
        Session::flash('save','Datos empresa editados con exito');
        return redirect()->to('/perfil/editar/');

    }

    public function perfilEditar(Request $request){

        $persona = Pasante::find($request->id);
        $persona->email_alternativo = $request->email_alternativo;
        $persona->zurdo = $request->zurdo;
        $persona->grupo_sanguineo = $request->grupo_sanguineo;
        $persona->alergias = $request->alergias;
        $persona->idiomas = $request->idiomas;
        $persona->nombre_empresa = $request->nombre_empresa;
        $persona->lugar_nacimiento = $request->lugar_nacimiento;
        $persona->cursos_habilidades = $request->cursos_habilidades;
        $persona->save();
        Session::flash('save','Datos pasante editados con exito');
        return redirect()->to('/perfil/editar/');

    }

    public function perfilTutoEpresarialEditar(Request $request)
    {
        $persona = Persona::find($request->id);
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->genero = $request->genero;
        $persona->fecha_nacimento = $request->fecha_nacimento;
        $persona->telefono_uno = $request->telefono_uno;
        $persona->direccion = $request->direccion;
        $persona->save();
        Session::flash('save','Perfil editado con exito');
        return redirect()->to('/perfil/editar/');
    }

}
