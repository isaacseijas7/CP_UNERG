<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (Auth::user()->type == "Admin") {

            return view('home')->with('titulo', 'Coordinación de Pasantias');
        }
        elseif (Auth::user()->type == "Empresa") {
            
            return view('home')->with('titulo', 'Empresa');
            
        }elseif (Auth::user()->type == "Pasante") {
            
            return view('home')->with('titulo', 'Pasante');
            
        }elseif (Auth::user()->type == "Tutor Empresarial") {
            
            return view('home')->with('titulo', 'Tutor Empresarial');
            
        }elseif (Auth::user()->type == "Tutor Academico") {
            
            return view('home')->with('titulo', 'Tutor Academico');
            
        }
        

    }
}
