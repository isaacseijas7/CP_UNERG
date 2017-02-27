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

	<h3 style="text-align: center; justify-content: center;">PLANIFICACIÓN PARA EL PROCESO DE PASANTÍAS</h3>

	<p style="text-align: center; justify-content: center; font-style: 22px;">(PERÍODO LECTIVO {{ $cronograma->periodo }})</p>


		<table style="table-layout: fixed; width: 100%;" border="1" >
			<tr>
				<th style="text-align: center; ">ACTIVIDAD</th>
				<th style="text-align: center; ">FECHA</th>
			</tr>
			<tr>
				<td style="text-align: center;">Charla informativa</td>
				<td style="text-align: center;">
					Desde: {{ $cronograma->primera_charla }} Hasta el {{ $cronograma->segunda_charla }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Inicio Pasantías **</td>
				<td style="text-align: center;">
					Desde: {{ $cronograma->ini_pasantias }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Entrega Requerimientos Iniciales</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->entrega_req_inic }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Primera Visita del Tutor Académico</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->primera_visita }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Casos especiales: Reasignación *</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->reasignacion }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Segunda Visita del Tutor Académico</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->segunda_visita }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Culminación de Pasantías</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->culminacion_pasantias }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Entrega Requerimientos Finales</td>
				<td style="text-align: center;">
					Desde: {{ $cronograma->desde_entrega_req_fina }} - Hasta el {{ $cronograma->hasta_entrega_req_fina }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Presentación Oral</td>
				<td style="text-align: center;">
					Desde: {{ $cronograma->desde_presentacion_oral }} - Hasta el {{ $cronograma->hasta_presentacion_oral }}
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">Presentación Oral</td>
				<td style="text-align: center;">
					Hasta el {{ $cronograma->carga_notas }}
				</td>
			</tr>
		</table>
		<br>

		<p>
			* En caso de no ser visitado por primera vez en la fecha estipulada, el pasante deberá
			notificar a la Coordinación y se le reasignará el Tutor Académico.
		</p>

		<p>
			** El inicio de Pasantías queda sujeto a las políticas de la Sede de Pasantías, siendo
			aprobado por la Coordinación.
		</p>

		<h4>OBSERVACIONES:</h4>

		<p>
			En absolutamente todos los casos, se aceptará solo las Pasantías cuyas
			actividades del Plan de trabajo se adecuen al perfil del Ingeniero en Informática.
		</p>

		<p>
			El Tutor Académico realizará dos (02) visitas de control: una al inicio del proceso
			de Pasantías y la segunda durante mediados del desarrollo de las Pasantías o su cierre
			para el retiro de la evaluación de las Pasantías por parte de la empresa en la última
			semana de las mismas.
		</p>

		<p>
			El Tutor Académico será asignado por la Coordinación de Pasantías (según lo
			establecido por sus cargas académicas y dedicación).
		</p>

		<p>
			Todo proceso de Pasantías deberá ser presentado oralmente.
		</p>



</body>
</html>


