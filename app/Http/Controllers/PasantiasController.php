<?php

namespace App\Http\Controllers;

use App\User;
use App\Periodo;
use App\Empresa;
use App\PasantesTutores;
use App\TutorEmpresarial;
use App\TutorAcademico;
use App\Persona;
use App\Pasante;
use App\PasanteInscrito;
use App\CronogramaPasantia;
use Auth;
use Mail;
use Session;

use Illuminate\Http\Request;
use App\Http\Requests\CronogramaRequest;
use App\Http\Requests\CronogramaRequestEdit;

use App\Http\Requests;

class PasantiasController extends Controller
{
    public function index()
    {
    	return view('cordinacion.index');
    }

    public function CronogramaFrm()
    {

        if (count(CronogramaPasantia::activo()) < 1) {
        	
            return view('cordinacion.cronograma');
            
        }else{

            $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
            ->get()->first();

            return view('cordinacion.cronograma_activo')->with('cronograma', $cronograma);
            
        }
    }

    public function Cronograma(CronogramaRequest $request)
    {   
        
        if (count(CronogramaPasantia::activo()) < 1) {
            
            CronogramaPasantia::create($request->all());
            Session::flash('save','Cronograma registrado con exito');

        }else{
            Session::flash('delete',' Ya hay un cronograma registrado actualmente');
        }


        return redirect()->to('/cronograma-pasantias');
    }

    public function CronogramaEditar(CronogramaRequestEdit $request)
    {   
        
        $cronograma = CronogramaPasantia::findOrFail($request->id);

        $cronograma->primera_charla = $request->primera_charla;
        $cronograma->segunda_charla = $request->segunda_charla;
        $cronograma->entrega_req_inic = $request->entrega_req_inic;
        $cronograma->primera_visita = $request->primera_visita;
        $cronograma->reasignacion = $request->reasignacion;
        $cronograma->desarrollo_pasantias = $request->desarrollo_pasantias;
        $cronograma->segunda_visita = $request->segunda_visita;
        $cronograma->desde_entrega_req_fina = $request->desde_entrega_req_fina;
        $cronograma->hasta_entrega_req_fina = $request->hasta_entrega_req_fina;
        $cronograma->desde_presentacion_oral = $request->desde_presentacion_oral;
        $cronograma->hasta_presentacion_oral = $request->hasta_presentacion_oral;
        $cronograma->carga_notas = $request->carga_notas;
        $cronograma->save();
        Session::flash('save','Cronograma editado con exito');
        return redirect()->to('/cronograma-pasantias');
    }


    public function CronogramaPDF(){

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
            ->get()->first();

        $pdf = \PDF::loadView('reportes.cronograma', ['cronograma' => $cronograma]);

        return $pdf->download('cronograma.pdf');
    }

    public function correoPasantias(){



        Mail::send('emails.cuenta',[], function($msj){
            $msj->from('isaajs@gmail.com', 'Isaac Js');
            $msj->to('isaacseias7@gmail.com', 'Isaac Seias')->subject('Correo de Contacto');
        });

        dd('Correo enviado');
    }
}
