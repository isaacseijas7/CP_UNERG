@extends('layouts.app')

@section('content')
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ url('/home') }}">Inicio</a>
        </li>
        <li class="active"> Perfil</li>
        <li>
            <a href="{{url('/perfil/editar')}}">Editar</a>
        </li>
    </ul>


</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h2><i class="ace-icon fa fa-user"></i> Perfil</h2>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
											<b>Datos Personales</b>
										</div>
									</div>


									<div>
										<ul class="list-unstyled spaced">
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Cedula:</b> {{$pasante->cedula}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Nombres:</b> {{$pasante->primer_nombre}} {{$pasante->segundo_nombre}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Apellidos:</b> {{$pasante->primer_apellido}} {{$pasante->segundo_apellido}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Genero: </b> {{$pasante->genero}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Fecha de Nacimiento</b> {{$pasante->fecha_nacimento}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Teléfono</b> {{$pasante->telefono_uno}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Email</b> {{$pasante->usuario->email}}
											</li>
											
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i> <b>Dirección</b> {{$pasante->direccion}}
											</li>
										</ul>
									</div>
								</div><!-- /.col -->

								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
											<b>Datos Pasante</b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled  spaced">
											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Zurdo:</b> {{$pasante->pasante->zurdo}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Alergias:</b> {{$pasante->pasante->alergias}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Grupo Sanguineo:</b> {{$pasante->pasante->grupo_sanguineo}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Idiomas:</b> {{$pasante->pasante->idiomas}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Trabaja:</b> {{$pasante->pasante->nombre_empresa}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Cursos & Habilidades:</b> {{$pasante->pasante->cursos_habilidades}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Lugar de Nacimiento:</b> {{$pasante->pasante->lugar_nacimiento}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Email Alternativo:</b> {{$pasante->pasante->email_alternativo}}
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i><b>Estado:</b> {{$pasante->pasante->estado}}
											</li>
											
										</ul>
									</div>
								</div><!-- /.col -->	

							</div><!-- /.row -->

							<div class="row">
                                 @if ($pasante->pasante->estado == "activo")
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-primary arrowed-in arrowed-right">
                                                <b>Datos Tutor Empresarial</b>
                                            </div>
                                        </div>

                                        <div>
                                            <ul class="list-unstyled  spaced">
                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Cedula:</b> {{$tutorEmpre->cedula}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Nombres:</b> {{$tutorEmpre->primer_nombre}} {{$tutorEmpre->segundo_nombre}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Apellidos:</b> {{$tutorEmpre->primer_apellido}} {{$tutorEmpre->segundo_apellido}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Teléfono:</b> {{$tutorEmpre->telefono_uno}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Dirección:</b> {{$tutorEmpre->direccion}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Cargo:</b> {{$tutorEmpre->cargo}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Profesion:</b> {{$tutorEmpre->profesion}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Departamento:</b> {{$tutorEmpre->departamento}}
                                                </li>

                                                
                                            </ul>
                                        </div>
                                    </div><!-- /.col -->
                                @endif

                                @if ($pasante->pasante->tutor_estado == "si")
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                                <b>Datos Tutor Academico</b>
                                            </div>
                                        </div>

                                        <div>
                                            <ul class="list-unstyled  spaced">
                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Cedula:</b> {{$tutorAcade->cedula}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Nombres:</b> {{$tutorAcade->primer_nombre}} {{$tutorAcade->segundo_nombre}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Apellidos:</b> {{$tutorAcade->primer_apellido}} {{$tutorAcade->segundo_apellido}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Teléfono:</b> {{$tutorAcade->telefono_uno}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Dirección:</b> {{$tutorAcade->direccion}}
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i><b>Dirección:</b> {{$tutorAcade->email}}
                                                </li>

                                            </ul>
                                        </div>
                                    </div><!-- /.col -->
                                @endif
                            </div>

							<div class="space"></div>

							<a class="btn btn-xl btn-success" href=" {{url('perfil/editar/')}} "><i class="ace-icon fa fa-pencil bigger-120"></i> Editar</a> 

							

							

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


@endsection
