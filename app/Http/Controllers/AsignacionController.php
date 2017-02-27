<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Persona;
use App\Pasante;
use App\Periodo;
use App\TutorAcademico;
use App\TutorEmpresarial;
use App\Empresa;
use App\AsignacionEmpresarial;
use App\AsignacionAcademica;
use App\CronogramaPasantia;
use Auth;
use Session;

use App\Http\Requests\AsignacionRequest;

use App\Http\Requests;

class AsignacionController extends Controller
{
    
    public function index()
    {   

        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];

        $tutores = \DB::table('tutores_empresariales')
            ->select(
                'tutores_empresariales.*',
                'personas.cedula',
                'personas.primer_nombre',
                'personas.primer_apellido'
            )
            ->where('empresa_id', '=', $empresa->id)
            ->join('personas', 'tutores_empresariales.persona_id', '=', 'personas.id')
            ->get();

        $pasantes = \DB::table('postulaciones_pasantes')
                ->select(
                    'postulaciones_pasantes.*',
                    'postulaciones_pasantes.id as postulaciones_pasantes_id',
                    'pasantes.*',
                    'pasantes.id as pasantes_id',
                    'personas.*'
                )
                ->where('empresa_id', '=', $empresa->id)
                ->where('postulaciones_pasantes.status', '=', "Confirmada")
                ->where('pasantes.estado', '=', "inactivo")
                ->join('pasantes', 'pasantes.id', '=', 'postulaciones_pasantes.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

        return view('asignaciones.asignar_tutor')->with(['tutores' => $tutores, 'pasantes' => $pasantes]);
    }

    public function indexAc()
    {

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();

        $tutores = \DB::table('tutores_academicos')
            ->select(
                'tutores_academicos.*',
                'personas.cedula',
                'personas.primer_nombre',
                'personas.primer_apellido'
            )
            ->join('personas', 'tutores_academicos.persona_id', '=', 'personas.id')
            ->get();

        $pasantes = \DB::table('pasantes')
                ->select(
                    'pasantes.*',
                    'pasantes.id as pasantes_id',
                    'personas.*'
                )
                ->where('pasantes.periodo_academico', '=',$cronograma->periodo )
                ->where('pasantes.tutor_estado', '<>', 'si' )
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

        return view('asignaciones.asignar_tutor_ac')->with(['tutores' => $tutores, 'pasantes' => $pasantes]);
    }

    public function asignacionEp(Request $request)
    {
        $this->validate(request(), [
            'pasante_id' => ['required'],
            'tutores_e_id' => ['required']
        ]);

        foreach ($request->pasante_id as $pasante_id) {
            $pasante = Pasante::find($pasante_id);
            $pasante->estado = 'activo';
            $pasante->save();
            $asignacion = new AsignacionEmpresarial($request->all());
            $asignacion->pasante_id = $pasante_id;
            $asignacion->save();
        }

        Session::flash('save','Asignación con exito');
        return redirect()->to('/asignaciones');

    }

    public function asignacionAc(Request $request)
    {
        $this->validate(request(), [
            'pasante_id' => ['required'],
            'tutores_a_id' => ['required']
        ]);

        foreach ($request->pasante_id as $pasante_id) {
            $pasante = Pasante::find($pasante_id);
            $pasante->tutor_estado = 'si';
            $pasante->save();
            $asignacion = new AsignacionAcademica($request->all());
            $asignacion->pasante_id = $pasante_id;

            $asignacion->save();
        }

        Session::flash('save','Asignación con exito');
        return redirect()->to('/asignacion');
    }
}
