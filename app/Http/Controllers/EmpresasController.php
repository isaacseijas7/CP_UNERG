<?php

namespace App\Http\Controllers;

use App\User;
use App\Empresa;
use App\Persona;
use App\Pasante;
use App\SolicitudPasantes;
use App\PostulacionPasante;
use Auth;
use Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EmpresasRequest;

class EmpresasController extends Controller
{
    public function index(Request $request)
    {


    	$empresas = Empresa::orderBy('id', 'DESC')->get();

        return view('empresas.index')->with('empresas', $empresas);
    }

    public function ver($id){
        $empresa = Empresa::find($id);
        $empresa->each(function($empresa){
            $empresa->solicitudes;
        });
        
        return view('empresas.ver')->with('empresa', $empresa);
    }

    public function registrarFrm()
    {
    	return view('empresa');
    }

    public function registrar(EmpresasRequest $request)
    {
       

        $persona = Persona::create([
            'cedula' => $request->rif, 
            'primer_nombre' => $request->nombre_razon,
            'telefono_uno' => $request->telefono
        ]);

        $user = User::create([
            'email' => $request->correo,
            'persona_id' => $persona->id,
            'password' => bcrypt($request->password),
            'type' => 'Empresa'
        ]);

        $empresa = new Empresa($request->all());
        $empresa->user_id = $user->id;
        $empresa->save();

        Session::flash('save','Empresa registrada con exito');
        return redirect()->to('/empresa');
    }

    public function solicitudIndex(){
        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];

        $solicitudes = SolicitudPasantes::where( 'empresa_id', '=', $empresa->id, 'AND' , 'status' ,'=', 'Pendiente' )->get();

        return view('empresas.solicitud_index')->with('solicitudes', $solicitudes);
    }

    public function solicitarPasanteFrm(){
        return view('empresas.solicitar');
    }

    public function solicitarPasante(Request $request){

        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];
        $solicitudes = SolicitudPasantes::where( 'empresa_id', '=', $empresa->id, 'AND' , 'status' ,'=', 'Pendiente')->get();

        if (count($solicitudes) < 1) {
            
            $solicitud = new SolicitudPasantes($request->all());
            $solicitud->empresa_id = $empresa->id;
            $solicitud->save();
            Session::flash('save','Solicitud enviada con exito');
        
        }else{
            //Session::flash('delete','Supero el máximo de solicitudes permitidas por este período');
            Session::flash('delete','Ya no puede realizar otra solicitud por este periodo');
            //return redirect()->to('/solicitud/editar/'.$solicitudes[0]->id); 
        }

            return redirect()->to('/solicitud/nueva');
    }


    public function solicitarPasanteEditarFrm($id){
        $solicitud = SolicitudPasantes::where( 'id', '=', $id )->get()[0];
        return view('empresas.solicitud_editar')->with('solicitud', $solicitud);

    }


    public function solicitarPasanteEditar(Request $request){

        $solicitud = SolicitudPasantes::find($request->id);
        $solicitud->cantidad = $request->cantidad;
        $solicitud->descripcion = $request->descripcion;
        $solicitud->save();
        Session::flash('save','Solicitud editada con exito');  
        return redirect()->to('/solicitud/editar/'.$request->id);
    }

    public function postularme($id){

        $solicitud = SolicitudPasantes::find($id);

        if (!$solicitud) {
            return redirect()->to('/empresas');
        }else{

            //$postulaciones = PostulacionPasante::where( 'pasante_id', '=', Auth::user()->persona->pasante->id, 'AND' , 'status' ,'=', 'Pendiente')->get();
            $postulacionesPendiente = \DB::table('postulaciones_pasantes')
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->where('empresa_id' ,'=', $solicitud->empresa_id)
                ->where('status' ,'=', 'Pendiente')
                ->get();

            $postulacionesAceptada = \DB::table('postulaciones_pasantes')
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->where('empresa_id' ,'=', $solicitud->empresa_id)
                ->where('status' ,'=', 'Aceptada')
                ->get();

            $postulacionesRechasada = \DB::table('postulaciones_pasantes')
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->where('empresa_id' ,'=', $solicitud->empresa_id)
                ->where('status' ,'=', 'Rechasada')
                ->get();

            $postulacionesConfirmada = \DB::table('postulaciones_pasantes')
                ->where('empresa_id' ,'=', $solicitud->empresa_id)
                ->where('status' ,'=', 'Confirmada')
                ->get();

            $postulacionesEmpresa = \DB::table('postulaciones_pasantes')
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->where('empresa_id' ,'=', $solicitud->empresa_id)
                ->get();

                $postulacionesPasante = \DB::table('postulaciones_pasantes')
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->get();

            if(count($postulacionesConfirmada) >= $solicitud->cantidad){
                //dd(count($postulacionesConfirmada),  $solicitud->cantidad);
                Session::flash('delete','<strong>Cupos</strong> no disponibles');
            }else{

               /* if (count($postulacionesPasante) < 3) {*/

                    if (count($postulacionesEmpresa)>0) {
                        Session::flash('delete','Solo puede postularse <strong>una sola vez en esta empresa</strong>');
                    }else{

                        if (count($postulacionesPendiente) >0 ) {

                            Session::flash('delete','Postulación ya enviada <strong>a espera de la confirmación de la empresa</strong>');
                        }else{

                            if (count($postulacionesRechasada) >0 ) {
                                Session::flash('delete','Postulación <strong>rechazada</strong>');
                            }else{

                                if (count($postulacionesAceptada) >0 ) {
                                    Session::flash('save','Postulación ya <strong>aceptada</strong>');
                                }else{

                                    $postulacion = new PostulacionPasante();
                                    $postulacion->pasante_id = Auth::user()->persona->pasante->id;
                                    $postulacion->empresa_id = $solicitud->empresa_id;
                                    $postulacion->status = 'Pendiente';
                                    $postulacion->save();

                                    Session::flash('save','Postulación <strong>enviada con exito</strong>');
                                }

                            }
                        }

                    }

            
                /*}else{
                    Session::flash('delete','<strong>Supero el máximo</strong> de postulaciones permitidas');    
                }*/

            
            }

            return redirect()->to('/empresas/ver/'.$solicitud->empresa_id);



        }

    }

    public function postulaciones(){
        $postulacionesPasante = \DB::table('postulaciones_pasantes')
                ->select(
                    'postulaciones_pasantes.*',
                    'empresas.rif',
                    'empresas.nombre_razon',
                    'empresas.correo',
                    'empresas.telefono'
                )
                ->where('pasante_id', '=', Auth::user()->persona->pasante->id)
                ->join('empresas', 'empresas.id', '=', 'postulaciones_pasantes.empresa_id')
                ->get();

        return view('pasantes.postulaciones')->with('postulaciones', $postulacionesPasante);
    }

    public function postulacionesPasantes($id){

        $empresa = Empresa::where('user_id', '=', Auth::user()->id  )->get()[0];

        //$solicitud = SolicitudPasantes::find($id);

        $postulaciones = \DB::table('postulaciones_pasantes')
                ->select(
                    'postulaciones_pasantes.*',
                    'postulaciones_pasantes.id as postulaciones_pasantes_id',
                    'pasantes.*',
                    'personas.*'
                )
                ->where('empresa_id', '=', $empresa->id)
                ->where('postulaciones_pasantes.status', '=', "Pendiente")
                ->join('pasantes', 'pasantes.id', '=', 'postulaciones_pasantes.pasante_id')
                ->join('personas', 'personas.id', '=', 'pasantes.persona_id')
                ->get();
  

        return view('empresas.postulaciones')->with('postulaciones', $postulaciones);
    }

    public function  postulacionesAceptar(Request $equest){
        $postulacion = PostulacionPasante::find($equest->id);

        $solicitud = \DB::table('sulicitudes_pasantes')
                ->where('empresa_id' ,'=', $postulacion->empresa_id)
                ->where('status' ,'=', 'Pendiente')
                ->get();

        if ($postulacion->status == "Aceptada") {
            Session::flash('save','<strong>Postulacion ya Aceptada</strong>');
        }elseif ($postulacion->status == "Rechasada") {
            Session::flash('delete','<strong>Postulacion ya Rechasada</strong>');
        }else{


            $postulacionesAceptada = \DB::table('postulaciones_pasantes')
                ->where('empresa_id' ,'=', $postulacion->empresa_id)
                ->where('status' ,'=', 'Aceptada')
                ->get();

            if (count($postulacionesAceptada) >= $solicitud[0]->cantidad) {
                Session::flash('delete',"<strong>Ya tiene los ".$solicitud[0]->cantidad." pasantes solicitudos para solicitar mas pasantes puede editar la candidad de la solicitud </strong>");
            }else{
                $postulacion->status = "Aceptada";

                $postulacion->save();
                Session::flash('save','<strong>Postulacion Aceptada solo hace falta la confirmacion del pasante</strong>');
                
            }
        }

        return redirect()->to('/solicitud/postulaciones/'.$solicitud[0]->id);

    }

    public function  postulacionesRechasar(Request $request){
        $postulacion = PostulacionPasante::find($request->id);

        $solicitud = \DB::table('sulicitudes_pasantes')
                ->where('empresa_id' ,'=', $postulacion->empresa_id)
                ->where('status' ,'=', 'Pendiente')
                ->get();

     
        $postulacion->status = "Rechasada";

        $postulacion->save();
        Session::flash('delete','<strong>Postulacion Rechasada</strong>');
   

        return redirect()->to('/solicitud/postulaciones/'.$solicitud[0]->id);

    }

    public function confirmar(Request $request){

        $postulacion = PostulacionPasante::find($request->id);
        $postulacion->status = "Confirmada";
        $postulacion->save();
        Session::flash('save','<strong>Empresa confirmada a espera de su tutor empresarial</strong>');
        return redirect()->to('/home');
    }

    public function eliminarPostulacion(Request $request){
        $postulacion = PostulacionPasante::find($request->id);

        $postulacion->delete();

        return redirect()->to('/empresas/postulaciones/');

    }

}
