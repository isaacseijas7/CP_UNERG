<link rel="stylesheet" type="text/css" href="public/assets/pdf/css/print_static.css">

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="{{asset('assets/img/logo_pasantias.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/img/logo_pasantias.png')}}" />
	<title>Cronograma Pasantías UNERGS</title>
</head>
<body>

<table style="width: 100%;">
	<tr>
		<td style="width: 10%;">
			<img width="80px;" src="assets/img/logo-unerg.png">
		</td>
		<td style="width: 75%;">
			<h3 style="text-align: center; justify-content: center;">UNIVERSIDAD RÓMULO GALLEGOS <br>
			ÁREA DE INGENIERÍA DE SISTEMAS <br>
			PROGRAMA INGENIERÍA EN INFORMÁTICA</h3>
		</td>
		<td style="width: 10%;">
			<img width="80px;" src="assets/img/ais.jpeg">
		</td>
	</tr>
</table>
	

	<br>

	<h3 style="text-align: center; justify-content: center;">Notas Academicas</h3>

	<p style="text-align: center; justify-content: center; font-style: 22px;">(PERÍODO LECTIVO {{ $cronograma->periodo }})</p>

	<table style="table-layout: fixed; width: 100%;"  border="1" >
		<tr>
			<td>
				<b>Pasante:</b>
			</td>
			<td>
				<b>Tutor Academico:</b>
			</td>
		</tr>
		<tr>
			<td>
				<p><b>Cedula: </b> V-{{Auth::user()->persona->cedula}}  <br>
				<b>Nombres y Apellidos: </b> {{Auth::user()->persona->primer_nombre}} {{Auth::user()->persona->segundo_nombre}} {{Auth::user()->persona->primer_apellido}} {{Auth::user()->persona->segundo_apellido}} </p>
			</td>
			<td>
				<p><b>Cedula: </b> V-{{$tutor->cedula}}  <br>
				<b>Nombres y Apellidos: </b> {{$tutor->primer_nombre}} {{$tutor->segundo_nombre}} {{$tutor->primer_apellido}} {{$tutor->segundo_apellido}} </p>
			</td>
		</tr>
	</table>
	<hr>

	<table style="table-layout: fixed; width: 100%;" border="1" >
			<tr>
				<th style="text-align: center; ">ASPECTOS A EVALUAR</th>
				<th style="text-align: center; ">NOTA</th>
			</tr>
			<tr>
				<td style="text-align: center;">Asistencia y puntualidad: el cumplimiento de las
actividades.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_uno}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Iniciativa: capacidad para proponer espontánea y
oportunamente sugerencias útiles, tomar acciones para
mejorar prácticas o procedimientos.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_dos}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Creatividad: aporte original de soluciones producidas por
su propio análisis de un problema sin ayuda de otros.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_tres}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Habilidad para aprender: capacidad para aceptar y fijar
conocimientos sobre procesos, procedimientos, instrumentos
y equipos de trabajo.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_cuatro}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Aptitud para el juicio creativo / evaluativo: habilidad para
juzgar el valor correcto de información, métodos soluciones,
etc. y para identificar inconsistencias y errores en asuntos
sometidos a su análisis.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_cinco}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Responsabilidad: en la entrega oportuna de las tareas
encomendadas.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_seis}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Presentación: Capacidad de demostrar pulcritud y buena
presencia dentro de la empresa.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_siete}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Adaptabilidad: capacidad de adaptase a situaciones
cambiantes, nuevos deberes y procedimientos, sin dificultad y
con efectividad.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_ocho}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Participación: es el grado en que el pasante se identifica
con el trabajo, participando con entusiasmo en el mismo.</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_nueve}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">¿Sapiente itaque dolorem vitae voluptate quisquam tenetur repudiandae veniam odit similique quia!?</td>
				<td style="text-align: center;">
					{{$evaluacion->aspenco_dies}}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;"> <h3>Total:</h3> </td>
				<td style="text-align: center;">
					{{$evaluacion->nota}}
				</td>
			</tr>
	</table>

</body>
</html>


