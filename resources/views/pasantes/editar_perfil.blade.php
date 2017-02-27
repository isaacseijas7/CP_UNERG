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
        <li>
            <a href="{{url('/perfil')}}">Perfil</a>
        </li>
        <li class="active"> Editar</li>
    </ul>

</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>
		<div class="row">
            <div class="col-md-12">
                @include('partials.mensajes')
            </div>
        </div>

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

					<h3>Datos personales</h3>
					
					<form id="register_frm" role="form" method="POST" action="{{ url('/perfil/persona/editar/') }}">
					    {{ csrf_field() }}
					    <fieldset>

					    	<input type="hidden" name="id" value="{{$pasante->id}}">

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="cedula" name="cedula" value="{{ $pasante->cedula }}" class="form-control" placeholder="Cedula" disabled  />
					                            <i class="ace-icon icon-location-arrow"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('cedula'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('cedula') }}</strong>
					                        </span>
					                    @endif
					                </div>
					                
					            </div>
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('fecha_nacimento') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="date" id="fecha_nacimento" name="fecha_nacimento" value="{{ $pasante->fecha_nacimento }}" class="form-control" placeholder="Fecha de Nacimiento" autofocus />
					                            <i class="ace-icon icon-calendar2"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('fecha_nacimento'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('fecha_nacimento') }}</strong>
					                        </span>
					                    @endif
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('primer_nombre') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="primer_nombre" name="primer_nombre" value="{{ $pasante->primer_nombre }}" class="form-control" placeholder="Primer nombre" />
					                            <i class="ace-icon icon-square-o"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('primer_nombre'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('primer_nombre') }}</strong>
					                        </span>
					                    @endif
					                </div>
					                
					            </div>
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('segundo_nombre') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="segundo_nombre" name="segundo_nombre" value="{{ $pasante->segundo_nombre }}" class="form-control" placeholder="Segundo nombre" />
					                            <i class="ace-icon icon-square"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('segundo_nombre'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('segundo_nombre') }}</strong>
					                        </span>
					                    @endif
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('primer_apellido') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="primer_apellido" name="primer_apellido" value="{{ $pasante->primer_apellido }}" class="form-control" placeholder="Primer apellido" />
					                            <i class="ace-icon icon-bookmark-o"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('primer_apellido'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('primer_apellido') }}</strong>
					                        </span>
					                    @endif
					                </div>
					                
					            </div>
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('segundo_apellido') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{ $pasante->segundo_apellido }}" class="form-control" placeholder="Segundo apellido" />
					                            <i class="ace-icon icon-bookmark"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('segundo_apellido'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('segundo_apellido') }}</strong>
					                        </span>
					                    @endif
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <select class="form-control" placeholder="Ingrese genero" name="genero" id="genero" value="{{ old('genero') }}">
					                                <option value="">Seleccione el genero</option>
					                                @if($pasante->genero == "Femenino")
                                                        <option selected value="Femenino">Femenino</option>
                                                        <option value="Masculino">Masculino</option>

													@else
														<option value="Femenino">Femenino</option>
                                                        <option selected value="Masculino">Masculino</option>
                                                    @endif
					                            </select>
					                            
					                        </span>
					                    </label>
					                    @if ($errors->has('genero'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('genero') }}</strong>
					                        </span>
					                    @endif
					                </div>
					                
					            </div>
					            <div class="col-md-6">
					                <div class="form-group{{ $errors->has('telefono_uno') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <input type="text" id="telefono_uno" name="telefono_uno" value="{{ $pasante->telefono_uno }}" class="form-control" placeholder="Teléfono" />
					                            <i class="ace-icon icon-phone2"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('telefono_uno'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('telefono_uno') }}</strong>
					                        </span>
					                    @endif
					                </div>
					            </div>
					        </div>

					        <div class="row">
					            <div class="col-md-12">
					                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
					                    <label class="block clearfix">
					                        <span class="block input-icon input-icon-right">
					                            <textarea id="direccion" type="text" class="form-control" name="direccion" placeholder="Dirección Completa de Recidencia Actual">{{ $pasante->direccion }}</textarea>
					                            <i class="ace-icon icon-map-marker"></i>
					                        </span>
					                    </label>
					                    @if ($errors->has('direccion'))
					                        <span class="help-block">
					                            <strong>{{ $errors->first('direccion') }}</strong>
					                        </span>
					                    @endif
					                </div>
					            </div>
					        </div>


					        
					        <!-- <label class="block">
					            <input type="checkbox" class="ace" />
					            <span class="lbl">
					                I accept the
					                <a href="#">User Agreement</a>
					            </span>
					        </label> -->


					        <div class="space-5"></div>
					        <div id="respuesta"></div>

					        <div class="clearfix">
					            <button type="reset" class="width-35 pull-left btn btn-sm">
					                <i class="ace-icon fa fa-refresh"></i>
					                <span class="bigger-110">Resetear</span>
					            </button>

					            <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
					                <span class="bigger-110">Editar</span>

					                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
					            </button>
					        </div>
					    </fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="space-24"></div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<h3>Datos Pasante</h3>

	
	<form id="pasantes_frm" role="form" method="POST" action="{{ url('/perfil/editar/') }}">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{$pasante->pasante->id}}">

		<div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('telefono_dos') ? ' has-error' : '' }}">
                    <label class="control-label" for="telefono_dos">Teléfono habitación</label>
                    <input id="telefono_dos" type="text" class="form-control" name="telefono_dos" placeholder="Teléfono habitación" value="{{ $pasante->pasante->telefono_dos }}" autofocus>

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
                    <input id="email_alternativo" type="text" class="form-control" name="email_alternativo" value="{{ $pasante->pasante->email_alternativo }}" placeholder="Email Alternativo" autofocus>

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
                    	@if($pasante->pasante->zurdo == "No")
	                        <label>
	                            <input name="zurdo" id="zurdo1" value="Si" type="radio">
	                            Si
	                        </label>
	                        <label>
	                            <input checked name="zurdo" id="zurdo2" value="No" type="radio">
	                            No
	                        </label>
						@else
							<label>
	                            <input checked name="zurdo" id="zurdo1" value="Si" type="radio">
	                            Si
	                        </label>
	                        <label>
	                            <input name="zurdo" id="zurdo2" value="No" type="radio">
	                            No
	                        </label>
                        @endif
                        
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
                        <select class="form-control" placeholder="Ingrese grupo_sanguineo" name="grupo_sanguineo" id="grupo_sanguineo" data-valor="{{ $pasante->pasante->grupo_sanguineo }}"  value="{{ $pasante->pasante->grupo_sanguineo }}">
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
                            <input value="alergico" type="checkbox" name="alergico" id="alergico" value="{{ $pasante->pasante->alergico }}"> SI
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
                    <input id="alergias" type="text" placeholder="Indique Alergia" class="form-control" disabled name="alergias" value="{{ $pasante->pasante->alergias }}">

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
                        <textarea id="lugar_nacimiento" type="text" class="form-control" name="lugar_nacimiento">{{ $pasante->pasante->lugar_nacimiento }}</textarea>
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
                        <textarea id="cursos_habilidades" type="text" class="form-control" name="cursos_habilidades">{{ $pasante->pasante->cursos_habilidades }}</textarea>
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
                <span class="bigger-110">Editar</span>

                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>
        </div>
    </form>

				</div>
				<div class="col-md-2"></div>
			</div>



		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<script>

$('#register_frm')
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
            telefono_uno: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
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
            genero: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El email es requerido'
                    },
                    regexp: {
                        regexp: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                        message: 'El email no es valido'
                    }
                }
            },
            direccion: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                    stringLength: {
                        min: 7,
                        max: 255,
                        message: 'Minimo 7 caracteres Maximo 255 caracreres'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La password es requerida'
                    },
                    stringLength: {
                        min: 6,
                        max: 12,
                        message: 'Minimo 6 y maximo 12 caracteres'
                    },
                    different: {
                        field: 'email',
                        message: 'La password no puede ser igual al email'
                    },
                }
            },
            password_confirmation: {
                validators: {
                    notEmpty: {
                        message: 'Debe confirmar la password'
                    },
                    identical: {
                        field: 'password',
                        message: 'La password y el campo confirma password no coinciden'
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

    var  selectTipoSangre = document.getElementById('grupo_sanguineo');

    	for (var i = selectTipoSangre.options.length - 1; i >= 0; i--) {
    		
    		if (selectTipoSangre.options[i].value ==  selectTipoSangre.dataset.valor) {
  
    			selectTipoSangre.options[i].selected = true;
    			break;
    		}

    	}

</script>


@endsection
