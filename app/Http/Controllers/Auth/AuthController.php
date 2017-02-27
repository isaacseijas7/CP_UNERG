<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Periodo;
use App\Persona;
use App\Pasante;
use App\PasanteInscrito;
use App\CronogramaPasantia;
use Auth;
use Session;

use Validator;

use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


use App\Http\Requests\PasantesRequest;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => 'required|min:8',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showLoginForm()
    {

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
            ->get()->first();

        return view('login')->with('cronograma', $cronograma);
    }

    public function showRegisterForm()
    {

        if (count(CronogramaPasantia::activo()) < 1) {
            Session::flash('delete',' Inscripciones no disponibles ');
            return redirect()->to('/');
        }else{
            $cronograma = CronogramaPasantia::where('estado', '=', 'activo')
                ->get()->first();
            
            return view('register')->with('cronograma', $cronograma);
        }

    }

    public function register (UserRequest $request)
    {
        $periodo_activo =  Periodo::where('estado', '=', 'activo' )->get();
    
        if (count(CronogramaPasantia::activo()) < 1) {
            Session::flash('delete',' Inscripciones no disponibles ');
            return redirect()->to('/');
        }else{
            $pasante_inscrito =  PasanteInscrito::where('cedula', '=', $request->cedula )->get();
            if (count($pasante_inscrito) < 1 ) {
                Session::flash('delete',' Estudiante no inscrito en la materia Pasantias UNERG ');
            }else{
                $persona = Persona::create($request->all());
                $user = new User($request->all());
                $user->persona_id = $persona->id;
                $user->password = bcrypt($request->password);
                $user->save();

                //$pasante = new Pasante($request->all());
                //$pasante->persona_id = $persona->id;

                //$pasante->save();

                Session::flash('save','Pasante registrado con exito');
            }

        }

        return redirect()->to('/register');

    }

}
