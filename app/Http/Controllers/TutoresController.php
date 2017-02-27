<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\User;
use App\Persona;
use App\Pasante;
use App\TutorAcademico;
use App\TutorEmpresarial;
use App\Empresa;
use Auth;
use Session;
use App\CronogramaPasantia;
use App\Actividad;
use App\EvaluacionEmpresarial;
use App\EvaluacionAcademica;
use App\EvaluacionCoordinacion;
use App\AsignacionEmpresarial;
use App\AsignacionAcademica;

use App\Http\Requests;
use App\Http\Requests\TutoresRequest;
use App\Http\Requests\TutoresEmpresarialesRequest;

class TutoresController extends Controller
{	

    public function __construct()
    {
        Carbon::setlocale("es");
    }

	//Tutores Academicos
    public function tutoresAcademicos()
    {
        if (Auth::user()->type == "Admin") {
            $tutoresAcademicos = TutorAcademico::orderBy('id', 'DESC')->get();

            $tutoresAcademicos->each(function($tutoresAcademicos){
                $tutoresAcademicos->persona;
            });
            
        	return view('tutores.academicos.index')->with('tutores', $tutoresAcademicos);
        }else{
            return redirect()->to('/');
        }
    }

    public function tutoresAcademicosFrm()
    {
    	return view('tutores.academicos.registrar');
    }

    public function tutorAcademicosRegistrar(TutoresRequest $request)
    {
        $persona = Persona::create($request->all());
        
        $tutor = new TutorAcademico($request->all());
        $tutor->persona_id = $persona->id;
        $tutor->save();

        $user = new User($request->all());
        $user->persona_id = $persona->id;
        $user->type = 'Tutor Academico';
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('save','Tutor Academico registrado con exito');
        return redirect()->to('/tutores-academicos/registrar');
    }


    public function showAcademoco($id)
    {
        if (Auth::user()->type == "Admin") {
            $persona = Persona::findOrFail($id);

            $persona->each(function($persona){
                $persona->usuario;
                $persona->tutorAcademico;
            });
            return view('tutores.academicos.ver')->with('tutor', $persona);
        }else{
            return redirect()->to('/');
        }
    }


    public  function editarAcademocoFrm($id)
    {
        if (Auth::user()->type == "Admin") {
            $persona = Persona::findOrFail($id);

            $persona->each(function($persona){
                $persona->usuario;
                $persona->tutorAcademico;
            });
            return view('tutores.academicos.editar')->with('tutor', $persona);
        }else{
            return redirect()->to('/');
        }
    }

    public function editarAcademoco(Request $request)
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
        Session::flash('save','Tutor Academico editado con exito');
        return redirect()->to('/tutores-academicos/editar/'.$request->id);
    }



    //Tutores Empresariales
    public function tutoresEmpresariales()
    {
        
        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];

        $tutores = \DB::table('tutores_empresariales')
            ->select(
                'tutores_empresariales.*',
                'personas.cedula',
                'personas.primer_nombre',
                'personas.primer_apellido',
                'personas.segundo_nombre',
                'personas.segundo_apellido',
                'personas.genero',
                'personas.fecha_nacimento',
                'personas.telefono_uno'

            )
            ->where('empresa_id', '=', $empresa->id)
            ->join('personas', 'tutores_empresariales.persona_id', '=', 'personas.id')
            ->get();

        return view('tutores.empresariales.index')->with('tutores', $tutores);
    }

    public function tutoresEmpresarialesFrm()
    {   
        
        $empresas = Empresa::orderBy('id', 'DESC')->paginate(100);
        return view('tutores.empresariales.registrar')->with('empresas', $empresas);

    }

    public function tutorEmpresarialesRegistrar(TutoresEmpresarialesRequest $request)
    {
        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];
        $persona = Persona::create($request->all());
        
        $tutor = new TutorEmpresarial($request->all());
        $tutor->persona_id = $persona->id;
        $tutor->empresa_id = $empresa->id;
        $tutor->save();

        $user = new User($request->all());
        $user->persona_id = $persona->id;
        $user->type = 'Tutor Empresarial';
        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('save','Tutor Empresarial registrado con exito');
        return redirect()->to('/tutores-empresariales/registrar');
    }

    public function showEmpresarial($id)
    {
        $persona = Persona::findOrFail($id);

        $persona->each(function($persona){
            $persona->usuario;
            $persona->tutorEmpresarial; 
        });

        //dd($persona->tutorEmpresarial->empresa->nombre_razon);
        return view('tutores.empresariales.ver')->with('tutor', $persona);
    }

    public  function editarEmpresarialFrm($id)
    {
        $persona = Persona::findOrFail($id);

        $persona->each(function($persona){
            $persona->usuario;
            $persona->tutorEmpresarial;
        });

        $empresas = Empresa::orderBy('id', 'DESC')->paginate(100);
        return view('tutores.empresariales.editar')->with(['tutor' => $persona, 'empresas' => $empresas]);
    }

    public function editarEmpresarial(Request $request)
    {
        $persona = Persona::find($request->id);
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->genero = $request->genero;
        $persona->fecha_nacimento = $request->fecha_nacimento;
        $persona->telefono_uno = $request->telefono_uno;
        $persona->save();

        $tutor = TutorEmpresarial::where('persona_id', '=', $persona->id  )->get()[0];
        $tutor->cargo = $request->cargo;
        $tutor->departamento = $request->departamento;
        $tutor->profesion = $request->profesion;
        $tutor->save();

        Session::flash('save','Tutor Empresarial editado con exito');
        return redirect()->to('/tutores-empresariales/editar/'.$request->id);
    }


    public function tutoreadosEp()
    {
        $pasantes = \DB::table('asignacion_empresarial')
            ->where('tutores_e_id', '=', Auth::user()->persona->tutorEmpresarial->id)
            ->select(
                    'asignacion_empresarial.*',
                    'asignacion_empresarial.id as asignacion_id',
                    'pasantes.*',
                    'pasantes.id as pasantes_id',
                    'personas.*'
                )
            ->join('pasantes', 'pasantes.id', '=', 'asignacion_empresarial.pasante_id')
            ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
            ->get();


        return view('tutores.empresariales.tutoreados')->with(['pasantes'=>$pasantes]);
    }

    public function tutoreadosAc()
    {
        $pasantes = \DB::table('asignacion_academica')
            ->where('tutores_a_id', '=', Auth::user()->persona->tutorAcademico->id)
            ->select(
                    'asignacion_academica.*',
                    'asignacion_academica.id as asignacion_id',
                    'pasantes.*',
                    'pasantes.id as pasantes_id',
                    'personas.*'
                )
            ->join('pasantes', 'pasantes.id', '=', 'asignacion_academica.pasante_id')
            ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
            ->get();


        return view('tutores.academicos.tutoreados')->with(['pasantes'=>$pasantes]);
    }

    public function evaluacionesCoFrm()
    {

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();

        $pasantes = \DB::table('pasantes')
            ->where('asignacion_academica.estado_notas', '=', 'cargadas')
            //->where('asignacion_empresarial.estado_notas', '=', 'cargadas')
            //->where('pasantes.evaluado', '=', 'no')

            ->select(
                    'pasantes.*',
                    'asignacion_academica.id as asignacion_a_id',
                    'asignacion_academica.*',
                    'asignacion_empresarial.id as asignacion_e_id',
                    'asignacion_empresarial.*',
                    'pasantes.id as pasantes_id',
                    'personas.*',
                    'evaluaciones_academicas.nota',
                    'evaluaciones_academicas.nota as nota_a',
                    'evaluaciones_empresariales.nota',
                    'evaluaciones_empresariales.nota as nota_e'
                 )

            ->join('asignacion_academica', 'asignacion_academica.pasante_id', '=', 'pasantes.id')
            ->join('evaluaciones_academicas', 'evaluaciones_academicas.id', '=', 'asignacion_academica.id')
            ->join('asignacion_empresarial', 'asignacion_empresarial.pasante_id', '=', 'pasantes.id')
            ->join('evaluaciones_empresariales', 'evaluaciones_empresariales.id', '=', 'asignacion_empresarial.id')
            ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
            ->get();



        //dd($pasantes);
        return view('cordinacion.evaluaciones')->with(['cronograma'=>$cronograma, 'pasantes'=>$pasantes]);
    }

    public function evaluacionesCo(Request $request)
    {
        $this->validate(request(), [
            'pasantes_id' => 'required|unique:evaluaciones_coordinacio',
            'nota_academica' => 'required',
            'nota_empresarial' => 'required',
            //'nota_charla' => 'required',
            //'nota_req' => 'required',
            'nota_informe' => 'required',
            'nota_defensa' => 'required'
        ]);

        $notaA = $request->nota_academica * 20 / 100; 
        $notaE = $request->nota_empresarial * 20 / 100;
        $notaI = $request->nota_informe * 20 / 100;
        $notaD = $request->nota_defensa * 40 / 100; 

        $NOTA = $notaA + $notaE + $notaI + $notaD;

        $NOTA_dies = $NOTA * 0.1;
        
        if ($NOTA_dies < 5.5) {
            $status = 'REPROBADO';
            $msj = 'delete';
        }else{
            $status = 'APROBADO';
            $msj = 'save';
        }

        if ($request->nota_empresarial < 55) {
           EvaluacionCoordinacion::create([
               'nota_academica' => $request->nota_academica,
               'nota_empresarial' => $request->nota_empresarial,
               //'nota_charla' => 0,
               //'nota_req' => 0,
               'nota_informe' => 0,
               'nota_defensa' => 0,
               'status' => 'REPROBADO',
               'pasantes_id' => $request->pasantes_id
           ]);
           Session::flash('delete','El estudiante esta REPROBADO por su tutor empresarial');
        }else{

            EvaluacionCoordinacion::create([
                            'nota_academica' => $notaA,
                            'nota_empresarial' => $notaE,
                            //'nota_charla' => 0,
                            //'nota_req' => 0,
                            'nota_informe' => $notaI,
                            'nota_defensa' => $notaD,
                            'status' => $status,
                            'pasantes_id' => $request->pasantes_id
                        ]);
            Session::flash($msj,'Evaluacion cargada con exito estudiante '.$status.' CON  '.$NOTA_dies);

        }

        $persona = Pasante::findOrFail($request->pasantes_id);
        $persona->evaluado = 'si';
        $persona->save();

        //EvaluacionCoordinacion::create($request->all());

        return redirect()->to('/evaluaciones-coordinacion');


    }

    public function evaluaciones()
    {
        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();

        //$tomorrow = Carbon::now()->addDay();


        //list($Y,$m,$d) = explode("-", $cronograma->desde_entrega_req_fina);

        //$lastWeek = Carbon::createFromDate($Y,$m,$d)->subWeek();

        //dd($lastWeek);

        if (Auth::user()->empresarial()) {
            $pasantes = \DB::table('asignacion_empresarial')
                ->where('tutores_e_id', '=', Auth::user()->persona->tutorEmpresarial->id)
                ->where('estado_notas', '=', 'no_cargadas')
                ->select(
                        'asignacion_empresarial.*',
                        'asignacion_empresarial.id as asignacion_id',
                        'pasantes.*',
                        'pasantes.id as pasantes_id',
                        'personas.*'
                    )
                ->join('pasantes', 'pasantes.id', '=', 'asignacion_empresarial.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

            return view('tutores.empresariales.evaluaciones')->with(['cronograma'=>$cronograma, 'pasantes'=>$pasantes]);
        }

    }

    public function evaluacionesEp(Request $request)
    {

        $this->validate(request(), [
            'tutoreado' => 'required',
            'uno' => 'required',
            'dos' => 'required',
            'tres' => 'required',
            'cuatro' => 'required',
            'cinco' => 'required',
            'seis' => 'required',
            'siete' => 'required',
            'ocho' => 'required',
            'nueve' => 'required',
            'dies' => 'required'
        ]);

        $nota =  $request->uno +
                 $request->dos +
                 $request->tres +
                 $request->cuatro +
                 $request->cinco +
                 $request->seis +
                 $request->siete +
                 $request->ocho +
                 $request->nueve +
                 $request->dies;


        $asignacion = AsignacionEmpresarial::where('pasante_id', '=', $request->tutoreado  )->get()[0];
        $asignacion->estado_notas = 'cargadas';
        $asignacion->save();

        $evaluacion = EvaluacionEmpresarial::create([
            'nota' => $nota,
            'asignacion_id' => $asignacion->id,
            'aspenco_uno' => $request->uno,
            'aspenco_dos' => $request->dos,
            'aspenco_tres' => $request->tres,
            'aspenco_cuatro' => $request->cuatro,
            'aspenco_cinco' => $request->cinco,
            'aspenco_seis' => $request->seis,
            'aspenco_siete' => $request->siete,
            'aspenco_ocho' => $request->ocho,
            'aspenco_nueve' => $request->nueve,
            'aspenco_dies' => $request->dies
        ]);

        Session::flash('save','Evaluacion cargada con exito');
        return redirect()->to('/evaluaciones');
    }

    public function evaluacionesAcIndex()
    {
        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();


        if (Auth::user()->academico()) {
            $pasantes = \DB::table('asignacion_academica')
                ->where('tutores_a_id', '=', Auth::user()->persona->tutorAcademico->id)
                ->where('estado_notas', '=', 'no_cargadas')
                ->select(
                        'asignacion_academica.*',
                        'asignacion_academica.id as asignacion_id',
                        'pasantes.*',
                        'pasantes.id as pasantes_id',
                        'personas.*'
                    )
                ->join('pasantes', 'pasantes.id', '=', 'asignacion_academica.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

            return view('tutores.academicos.evaluaciones')->with(['cronograma'=>$cronograma, 'pasantes'=>$pasantes]);
        }

    }

    public function evaluacionesAc(Request $request)
    {

        $this->validate(request(), [
            'tutoreado' => 'required',
            'uno' => 'required',
            'dos' => 'required',
            'tres' => 'required',
            'cuatro' => 'required',
            'cinco' => 'required',
            'seis' => 'required',
            'siete' => 'required',
            'ocho' => 'required',
            'nueve' => 'required',
            'dies' => 'required'
        ]);

        $nota =  $request->uno +
                 $request->dos +
                 $request->tres +
                 $request->cuatro +
                 $request->cinco +
                 $request->seis +
                 $request->siete +
                 $request->ocho +
                 $request->nueve +
                 $request->dies;


        $asignacion = AsignacionAcademica::where('pasante_id', '=', $request->tutoreado  )->get()[0];
        $asignacion->estado_notas = 'cargadas';
        $asignacion->save();

        $evaluacion = EvaluacionAcademica::create([
            'nota' => $nota,
            'asignacion_id' => $asignacion->id,
            'aspenco_uno' => $request->uno,
            'aspenco_dos' => $request->dos,
            'aspenco_tres' => $request->tres,
            'aspenco_cuatro' => $request->cuatro,
            'aspenco_cinco' => $request->cinco,
            'aspenco_seis' => $request->seis,
            'aspenco_siete' => $request->siete,
            'aspenco_ocho' => $request->ocho,
            'aspenco_nueve' => $request->nueve,
            'aspenco_dies' => $request->dies
        ]);

        Session::flash('save','Evaluacion cargada con exito');
        return redirect()->to('/mis-tutoreados/evaluaciones');
    }

    public function addActividadesFrm()
    {

        $pasantes = \DB::table('asignacion_empresarial')
                ->where('tutores_e_id', '=', Auth::user()->persona->tutorEmpresarial->id)
                ->select(
                        'asignacion_empresarial.*',
                        'asignacion_empresarial.id as asignacion_id',
                        'pasantes.*',
                        'pasantes.id as pasantes_id',
                        'personas.*'
                    )
                ->join('pasantes', 'pasantes.id', '=', 'asignacion_empresarial.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();

        return view('tutores.empresariales.add_actividades')->with(['pasantes'=>$pasantes]);
    }

    public function addActividades(Request $request)
    {
        $this->validate(request(), [
            'actividad' => ['required'],
            'pasante_id' => ['required']
        ]);

        foreach ($request->pasante_id as $pasante_id) {
            $actividad = new Actividad();
            $actividad->actividad = $request->actividad;
            $actividad->pasante_id = $pasante_id;
            $actividad->tutor_id = Auth::user()->persona->tutorEmpresarial->id;
            $actividad->save();
        }

        Session::flash('save','Actividad creada con exito');
        return redirect()->to('/add-actividades');
    }


    public function indexActividades()
    {



        $actividades = Actividad::orderBy('id', 'DESC')
            ->where('tutor_id', '=', Auth::user()->persona->tutorEmpresarial->id)
            ->get();

    
        $actividades->each(function($actividades){
            $actividades->pasante;
            $actividades->pasante->persona;
            $actividades->pasante->persona->usuario;
        });

        return view('tutores.empresariales.actividades')->with(['actividades'=>$actividades]);
    }


    public function indexActividadesPasante()
    {

        $actividades = Actividad::orderBy('id', 'DESC')
            ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
            ->get();

    
        $actividades->each(function($actividades){
            $actividades->pasante;
            $actividades->pasante->persona;
            $actividades->pasante->persona->usuario;
        });

        return view('pasantes.actividades')->with(['actividades'=>$actividades]);
    }

    public function checkarACtividades(Request $request)
    {
        $actividades = explode(',', $request->actividades_check);

        for ($i=0; $i < count($actividades) - 1 ; $i++) { 
            $actividad = Actividad::find($actividades[$i]);
            $actividad->status = "Finalizada";
            $actividad->save();
        }

        Session::flash('save','Actividades finalizadas');
        return redirect()->to('/actividades');
    }

    public function notasPasante()
    {   


        $asignacionE = AsignacionEmpresarial::where('pasante_id', '=', Auth::user()->persona->pasante->id  )->get()->first();

        if($asignacionE){

            $evaluacionE = EvaluacionEmpresarial::where('asignacion_id', '=', $asignacionE->id )->get()->first();
         
        }else{
            $evaluacionE = null;
        }

       $asignacionA = AsignacionAcademica::where('pasante_id', '=', Auth::user()->persona->pasante->id  )->get()->first();

        if($asignacionA){

            $evaluacionA = EvaluacionAcademica::where('asignacion_id', '=', $asignacionA->id )->get()->first();

        }else{
            $evaluacionA = null;
        }

        if ($evaluacionA != null && $evaluacionE != null) {

            $evaluacionC = EvaluacionCoordinacion::where('pasantes_id', '=', Auth::user()->persona->pasante->id )->get()->first();

        }else{
            $evaluacionC = null;
        }

        return view('pasantes.notas')->with(['asignacionE'=>$asignacionE, 'evaluacionA'=>$evaluacionA, 'evaluacionE'=>$evaluacionE, 'evaluacionC'=>$evaluacionC]);
    }


    public function notasAcademicasPDF()
    {

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();

        $asignacionA = AsignacionAcademica::where('pasante_id', '=', Auth::user()->persona->pasante->id  )->get()->first();

        if($asignacionA){

            $evaluacionA = EvaluacionAcademica::where('asignacion_id', '=', $asignacionA->id )->get()->first();
        }

         $tutor = \DB::table('asignacion_academica')
                ->where('tutores_a_id', '=', $asignacionA->tutores_a_id)
                ->where('pasante_id', '=', $asignacionA->pasante_id)
                ->select(
                        'asignacion_academica.*',
                        'asignacion_academica.id as asignacion_academica',
                        'tutores_academicos.*',
                        'tutores_academicos.id as tutores_academicos_id',
                        'personas.*'
                    )
                ->join('tutores_academicos', 'tutores_academicos.id', '=', 'asignacion_academica.tutores_a_id')
                ->join('personas', 'personas.id', '=', 'tutores_academicos.persona_id')
                ->first();

        $pdf = \PDF::loadView('reportes.notasAcademicas', ['evaluacion' => $evaluacionA, 'cronograma' =>$cronograma, 'tutor' => $tutor]);

        return $pdf->download('notas-academicas.pdf');
    }

    public function notasEmpresarialesPDF()
    {

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();

        $asignacionE = AsignacionEmpresarial::where('pasante_id', '=', Auth::user()->persona->pasante->id  )->get()->first();

        if($asignacionE){

            $evaluacionE = EvaluacionEmpresarial::where('asignacion_id', '=', $asignacionE->id )->get()->first();
        }


        $tutor = \DB::table('asignacion_empresarial')
                ->where('tutores_e_id', '=', $asignacionE->tutores_e_id)
                ->where('pasante_id', '=', $asignacionE->pasante_id)
                ->select(
                        'asignacion_empresarial.*',
                        'asignacion_empresarial.id as asignacion_empresarial',
                        'tutores_empresariales.*',
                        'tutores_empresariales.id as tutores_empresariales_id',
                        'personas.*'
                    )
                ->join('tutores_empresariales', 'tutores_empresariales.id', '=', 'asignacion_empresarial.tutores_e_id')
                ->join('personas', 'personas.id', '=', 'tutores_empresariales.persona_id')
                ->first();


        $pdf = \PDF::loadView('reportes.notasEmpresariales', ['evaluacion' => $evaluacionE, 'cronograma' =>$cronograma, 'tutor' => $tutor]);

        return $pdf->download('notas-empresariales.pdf');


    }

}
