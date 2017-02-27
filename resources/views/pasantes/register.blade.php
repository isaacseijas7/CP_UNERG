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
								<!-- <div class="col-sm-6">
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

<div class="col-sm-12">
	<div class="row">
		<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
			<b>Datos Pasante</b>
		</div>
	</div>

    <form id="pasantes_frm" role="form" method="POST" action="{{ url('/pasantes/register') }}">
        {{ csrf_field() }}

        <input type="hidden" name="periodo_academico" value="{{$cronograma->periodo}}">
		<div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('telefono_dos') ? ' has-error' : '' }}">
                    <label class="control-label" for="telefono_dos">Teléfono habitación</label>
                    <input id="telefono_dos" type="text" class="form-control" name="telefono_dos" placeholder="Teléfono habitación" value="{{ old('telefono_dos') }}" autofocus>

                    @if ($errors->has('telefono_dos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefono_dos') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email_alternativo') ? ' has-error' : '' }}">
                    <label class="control-label" for="email_alternativo">Email Alternativo</label>
                    <input id="email_alternativo" type="text" class="form-control" name="email_alternativo" value="{{ old('email_alternativo') }}" placeholder="Email Alternativo" autofocus>

                    @if ($errors->has('email_alternativo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_alternativo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group{{ $errors->has('zurdo') ? ' has-error' : '' }}">
                   
                    <label class="control-label" for="">¿Es Zurdo?</label>

                    <div class="radio">
                        <label>
                            <input name="zurdo" id="zurdo1" value="Si" type="radio">
                            Si
                        </label>
                        <label>
                            <input name="zurdo" id="zurdo2" value="No" type="radio">
                            No
                        </label>
                    </div>

                    @if ($errors->has('zurdo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zurdo') }}</strong>
                        </span>
                    @endif
                  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('grupo_sanguineo') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label class="control-label" for="grupo_sanguineo">Grupo Sanguineo ?</label>
                        <select class="form-control" placeholder="Ingrese grupo_sanguineo" name="grupo_sanguineo" id="grupo_sanguineo" value="{{ old('grupo_sanguineo') }}">
                            <option value="">Grupo Sanguineo ?</option>
                            <option value="NO SABE / NO CONTESTA">NO SABE / NO CONTESTA</option>
                            <option value="AB +">AB +</option>
                            <option value="AB -">AB -</option>
                            <option value="A +">A +</option>
                            <option value="A -">A -</option>
                            <option value="B +">B +</option>
                            <option value="B -">B -</option>
                            <option value="O +">O +</option>
                            <option value="O -">O -</option>
                        </select>

                        @if ($errors->has('grupo_sanguineo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('grupo_sanguineo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group{{ $errors->has('alergico') ? ' has-error' : '' }}">
                   
                    <label class="control-label" for="alergico">¿Alérgico?</label>

                    <div class="checkbox">
                        <label>
                            <input value="alergico" type="checkbox" name="alergico" id="alergico" value="{{ old('alergico') }}"> SI
                        </label>
                    </div>

                    @if ($errors->has('alergico'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alergico') }}</strong>
                        </span>
                    @endif
                  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   
                    <label class="control-label" for="alergias">Indique Alergia</label>
                    <input id="alergias" type="text" placeholder="Indique Alergia" class="form-control" disabled name="alergias" value="{{ old('alergias') }}">

                    @if ($errors->has('alergias'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alergias') }}</strong>
                        </span>
                    @endif
                  
                </div>
            </div>
            
        </div>

    	 <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('idiomas') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label class="control-label" for="idiomas">Manejo de Idiomas ?</label>
                        <input id="idiomas" type="text" class="form-control" name="idiomas" value="{{ old('idiomas') }}">
                        @if ($errors->has('idiomas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idiomas') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group{{ $errors->has('trabaja') ? ' has-error' : '' }}">
                   
                    <label class="control-label" for="trabaja">¿Tranaja?</label>

                    <div class="checkbox">
                        <label>
                            <input value="trabaja" type="checkbox" name="trabaja" id="trabaja" value="{{ old('trabaja') }}"> SI
                        </label>
                    </div>

                    @if ($errors->has('trabaja'))
                        <span class="help-block">
                            <strong>{{ $errors->first('trabaja') }}</strong>
                        </span>
                    @endif
                  
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('nombre_empresa') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label class="control-label" for="nombre_empresa">Nombre de la empreza</label>
                        <input id="nombre_empresa" type="text" class="form-control" placeholder="Nombre de la empreza" name="nombre_empresa" disabled="" value="{{ old('nombre_empresa') }}">

                        @if ($errors->has('nombre_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre_empresa') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('lugar_nacimiento') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label class="control-label" for="lugar_nacimiento">Lugar de Nacimiento</label>
                        <textarea id="lugar_nacimiento" type="text" class="form-control" name="lugar_nacimiento">{{ old('lugar_nacimiento') }}</textarea>
                        @if ($errors->has('lugar_nacimiento'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lugar_nacimiento') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('cursos_habilidades') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label class="control-label" for="cursos_habilidades">Cursos Realizados, Habilidades y Destrezas</label>
                        <textarea id="cursos_habilidades" type="text" class="form-control" name="cursos_habilidades">{{ old('cursos_habilidades') }}</textarea>
                        @if ($errors->has('cursos_habilidades'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cursos_habilidades') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="space-10"></div>
        <div id="respuesta"></div>

        <div class="clearfix">
            <button type="reset" class="width-35 pull-left btn btn-sm">
                <i class="ace-icon fa fa-refresh"></i>
                <span class="bigger-110">Resetear</span>
            </button>

            <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                <span class="bigger-110">Guardar</span>

                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>
        </div>
    </form>
	
</div><!-- /.col -->

							</div><!-- /.row -->

							<div class="space"></div>

							

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


<script>

var imputAlergias = document.querySelector('#alergias'),
	imputNombreEmpresa = document.querySelector('#nombre_empresa');
	
document.querySelector('#alergico').addEventListener('click', function (e) {

	if (e.target.checked) {
		imputAlergias.removeAttribute('disabled');
		imputAlergias.focus();
	}else{
		imputAlergias.setAttribute('disabled', true);
	}
	
}, false);

document.querySelector('#trabaja').addEventListener('click', function (e) {

	if (e.target.checked) {
		imputNombreEmpresa.removeAttribute('disabled');
		imputNombreEmpresa.focus();
	}else{
		imputNombreEmpresa.setAttribute('disabled', true);
	}
	
}, false);


$('#pasantes_frm')
    .formValidation({
        message: 'Los datos no son validos',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fecha_nacimento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            primer_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.]+$/,
                        message: 'Campo no valido'
                    }
                }
            },
            segundo_nombre: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.]+$/,
                        message: 'Campo no valido'
                    }
                }
            },
            primer_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.]+$/,
                        message: 'Campo no valido'
                    }
                }
            },
            segundo_apellido: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\.]+$/,
                        message: 'Campo no valido'
                    }
                }
            },
            cargo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El cargo es requerido'
                    }
                }
            },
            departamento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El departamento es requerido'
                    }
                }
            },
            profesion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'La profesion es requerida'
                    }
                }
            },
            telefono_dos: {
                message: 'The username is not valid',
                validators: {
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Campo no valido'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: '11 caracteres'
                    },
                }
            },
            telefono_dos: {
                message: 'The username is not valid',
                validators: {
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Campo no valido'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: '11 caracteres'
                    },
                }
            },
            cedula: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'La cedula es requerida'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'Minimo 7 caracteres Maximo 8 caracreres'
                    },
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Solo caracteres numericos'
                    }
                }
            },
            zurdo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            grupo_sanguineo: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            lugar_nacimiento: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            email_alternativo: {
                validators: {
                    regexp: {
                        regexp: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                        message: 'El email no es valido'
                    }
                }
            }
        }
    })
  /*  .on('success.form.fv', function(event) {
            event.preventDefault();
            var $form = $(event.target),
                token = $("input[name=_token]").val();

            $.ajax({
                url: $form.attr('action'),
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: $form.serialize(),
                beforeSend : function (){        
                },
                success: function(datos){
                    if (datos.danger) {
                        $('#respuesta').html( acciones.mensajes(datos.danger, 'alert-danger')+'<br>' );    
                    }else{
                        $('#respuesta').html( acciones.mensajes(datos.success)+'<br>' );
                    }
                    
                },
                error: function (error){
                    var message = "";
                    if (error.responseJSON.cedula) {
                        message += error.responseJSON.cedula+'<br>';
                    }
                    if (error.responseJSON.email) {
                        message += error.responseJSON.email+'<br>';
                    }if (error.responseJSON.password) {
                        message += error.responseJSON.password+'<br>';
                    }

                    $('#respuesta').html( acciones.mensajes(message, 'alert-danger')+'<br>' );
                }
            });
    });*/

</script>



@endsection
