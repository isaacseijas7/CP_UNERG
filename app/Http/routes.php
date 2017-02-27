<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Rutas para el logearse
Route::get('/', 'Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@postLogin');

//Rutas para registrar pasantes
Route::get('/register', 'Auth\AuthController@showRegisterForm');
Route::post('register', 'Auth\AuthController@register');

//Rutas para registrar empresas
Route::get('/empresa', 'EmpresasController@registrarFrm');
Route::post('/empresa/register', 'EmpresasController@registrar');

//Ruta para salir de sistema
Route::get('auth/logout', 'Auth\AuthController@logout');

//Ruta del home
Route::get('/home', 'HomeController@index');

//Rutas que requieren autenticación
Route::group(['middleware' => 'auth'], function(){

	//Ruta para el perfil de usuario
	Route::get('/perfil', 'PersonasController@perfil');
	Route::get('/perfil/editar', 'PersonasController@perfilEditarFrm');
	Route::post('/perfil/persona/editar/', 'PersonasController@perfilPersonaEditar');
	Route::post('/perfil/editar/', 'PersonasController@perfilEditar');
	Route::post('/perfil/empresa/editar/', 'PersonasController@perfilEmpresaEditar');
	Route::post('/perfil/tutoe/editar/', 'PersonasController@perfilTutoEpresarialEditar');

});

//Rutas que requieren autenticación y ser admin
Route::group(['middleware' => ['auth','admin']], function(){

	//Ruta para registrar conograma de pasantias
	Route::get('/cronograma-pasantias', 'PasantiasController@CronogramaFrm');
	Route::post('/cronograma-pasantias', 'PasantiasController@Cronograma');
	Route::post('/cronograma-pasantias/editar', 'PasantiasController@CronogramaEditar');

	Route::group(['middleware' => ['cronograma']], function(){

		Route::get('lista-empresas', 'EmpresasController@index');

		Route::get('/lista-empresas/ver/{empresa}', 'EmpresasController@ver')->where('empresa', '[0-9]+');

		Route::get('/asignacion', 'AsignacionController@indexAc');

		Route::post('/asignacion', 'AsignacionController@asignacionAc');

		Route::get('/evaluaciones-coordinacion/', 'TutoresController@evaluacionesCoFrm');

		Route::post('/evaluaciones/coordinacion/', 'TutoresController@evaluacionesCo');

	});


});


Route::group(['prefix' => 'pasantes', 'middleware' => ['auth','cronograma']], function(){


	Route::group(['middleware' => ['auth','admin']], function(){

		Route::get('/', 'PasantesController@index');

		Route::get('/ver/{pasante}', 'PasantesController@show')->where('pasante', '[0-9]+');

	});

	Route::group(['middleware' => ['auth','pasante']], function(){

		Route::post('register', 'PasantesController@register');

	});
	
});

Route::group(['middleware' => ['auth','pasante']], function(){


	Route::group(['middleware' => ['perfil_pasante']], function(){

		Route::get('empresas', 'EmpresasController@index');


		Route::get('/empresas/ver/{empresa}', 'EmpresasController@ver')->where('empresa', '[0-9]+');

		Route::get('/mis-actividades', 'TutoresController@indexActividadesPasante');


		Route::get('/mis-notas', 'TutoresController@notasPasante');

		Route::get('/mis-notas/academicas-pdf', 'TutoresController@notasAcademicasPDF');
		Route::get('/mis-notas/empresariales-pdf', 'TutoresController@notasEmpresarialesPDF');


		Route::group(['middleware' => ['postulacion_conf']], function(){
			
			Route::get('/empresas/postulaciones', 'EmpresasController@postulaciones');
			
			Route::get('/empresas/postularme/{solucitud}', 'EmpresasController@postularme')->where('solucitud', '[0-9]+');

			Route::post('/empresas/postulaciones/confirmar/', 'EmpresasController@confirmar');

			Route::post('/empresas/postulaciones/eliminar/', 'EmpresasController@eliminarPostulacion');

		});

	});


});

Route::group(['prefix' => 'tutores-academicos', 'middleware' => ['auth','admin','cronograma']], function(){
	
	//Tutores Academicos
	Route::get('/', 'TutoresController@tutoresAcademicos');

	Route::get('/registrar', 'TutoresController@tutoresAcademicosFrm');

	Route::post('/registrar', 'TutoresController@tutorAcademicosRegistrar');

	Route::get('/ver/{tutor}', 'TutoresController@showAcademoco')->where('tutor', '[0-9]+');

	Route::get('/editar/{tutor}', 'TutoresController@editarAcademocoFrm')->where('tutor', '[0-9]+');

	Route::post('/editar', 'TutoresController@editarAcademoco');


	//---------------------------------------------------------------------------------

	Route::get('/asignacion', 'AsignacionController@asignacionFrm');

	Route::post('/asignacion', 'AsignacionController@asignacion');

});

Route::group(['middleware' => ['auth','empresa']], function(){
	
	Route::get('/solicitud', 'EmpresasController@solicitudIndex');
	Route::get('/solicitud/nueva', 'EmpresasController@solicitarPasanteFrm');
	Route::post('/solicitud/nueva', 'EmpresasController@solicitarPasante');

	Route::get('/solicitud/editar/{solicitud}', 'EmpresasController@solicitarPasanteEditarFrm')->where('solicitud', '[0-9]+');
	Route::post('/solicitud/editar', 'EmpresasController@solicitarPasanteEditar');

	Route::get('/solicitud/postulaciones/{solicitud}', 'EmpresasController@postulacionesPasantes')->where('solicitud', '[0-9]+');

	Route::post('/solicitud/postulaciones/aceptar/', 'EmpresasController@postulacionesAceptar');

	Route::post('/solicitud/postulaciones/rechasar/', 'EmpresasController@postulacionesRechasar');

	Route::get('/pasantes-apectados', 'PasantesController@pasantesAceptados');
	Route::get('/pasantes-apectados/ver/{pasante}', 'PasantesController@show')->where('pasante', '[0-9]+');


	Route::get('/asignaciones', 'AsignacionController@index');

	Route::post('/asignaciones', 'AsignacionController@asignacionEp');

	//Tutores Empresariales
	Route::get('/tutores-empresariales', 'TutoresController@tutoresEmpresariales');

	Route::get('/tutores-empresariales/registrar', 'TutoresController@tutoresEmpresarialesFrm');

	Route::post('/tutores-empresariales/registrar', 'TutoresController@tutorEmpresarialesRegistrar');

	Route::get('/tutores-empresariales/ver/{tutor}', 'TutoresController@showEmpresarial')->where('tutor', '[0-9]+');

	Route::get('/tutores-empresariales/editar/{tutor}', 'TutoresController@editarEmpresarialFrm')->where('tutor', '[0-9]+');

	Route::post('/tutores-empresariales/editar', 'TutoresController@editarEmpresarial');

});


//rutas para los reportes
Route::group(['prefix' => 'reportes', 'middleware' => ['cronograma']], function(){

	Route::get('/cronograma', 'PasantiasController@CronogramaPDF');

});

Route::get('/send-meil', 'PasantiasController@correoPasantias');




Route::group(['middleware' => ['auth','empresarial']], function(){

	Route::get('/tutoreados', 'TutoresController@tutoreadosEp');

	Route::get('tutoreados/ver/{pasante}', 'PasantesController@show')->where('pasante', '[0-9]+');

	Route::get('/evaluaciones/', 'TutoresController@evaluaciones');

	Route::post('/evaluaciones/empresariales/', 'TutoresController@evaluacionesEp');

	Route::get('/add-actividades/', 'TutoresController@addActividadesFrm');

	Route::post('/add-actividades/', 'TutoresController@addActividades');

	Route::get('/actividades', 'TutoresController@indexActividades');

	Route::post('/actividades', 'TutoresController@checkarACtividades');

});


Route::group(['middleware' => ['auth','academico']], function(){

	Route::get('/mis-tutoreados', 'TutoresController@tutoreadosAc');

	Route::get('/mis-tutoreados/ver/{pasante}', 'PasantesController@show')->where('pasante', '[0-9]+');

	Route::get('/mis-tutoreados/evaluaciones', 'TutoresController@evaluacionesAcIndex');

	Route::post('/evaluaciones/academicas/', 'TutoresController@evaluacionesAc');


});
