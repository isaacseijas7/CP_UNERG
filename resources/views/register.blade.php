@extends('layouts.auth')

@section('content')
<div class="main-container">
    @if ($cronograma)
        <a href="{{url('reportes/cronograma')}}" class="btn btn-danger pull-right" >Descargar Cronograma de Pasantías</a>
    @endif
    <div class="main-content">
        <div class="row">
			<div class="center">
                <h1>
                    <img width="130px;" src="{{asset('assets/img/logo_pasantias.png')}}"> <span class="blue" id="id-text2">UNERG</span>
                </h1>
                <h2><span class="white">Coordinación de Pasantías</span></h2>
            </div>
            <div class="space-6"></div>
            <div class="col-md-10 col-md-offset-1">
                <div class="position-relative">
                    <div id="signup-box" class="signup-box visible widget-box no-border">
                        <div class="widget-body">
                            <div class="widget-main">
                                <h4 class="header blue lighter bigger">
                                    <i class="ace-icon fa fa-users blue"></i>
                                    Registro pasante
                                </h4>
			                	<div class="row">
			                        <div class="col-md-12">
			                            @include('partials.mensajes')
			                        </div>
			                    </div>

                                <div class="space-6"></div>
                                <p> Ingrese sus datos: </p>

                                <form id="register_frm" role="form" method="POST" action="{{ url('/register') }}">
                                    {{ csrf_field() }}
                                    <fieldset>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="cedula" name="cedula" value="{{ old('cedula') }}" class="form-control" placeholder="Cedula" autofocus />
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
                                                            <input type="date" id="fecha_nacimento" name="fecha_nacimento" value="{{ old('fecha_nacimento') }}" class="form-control" placeholder="Fecha de Nacimiento" />
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
                                                            <input type="text" id="primer_nombre" name="primer_nombre" value="{{ old('primer_nombre') }}" class="form-control" placeholder="Primer nombre" />
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
                                                            <input type="text" id="segundo_nombre" name="segundo_nombre" value="{{ old('segundo_nombre') }}" class="form-control" placeholder="Segundo nombre" />
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
                                                            <input type="text" id="primer_apellido" name="primer_apellido" value="{{ old('primer_apellido') }}" class="form-control" placeholder="Primer apellido" />
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
                                                            <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido') }}" class="form-control" placeholder="Segundo apellido" />
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
                                                                <option value="Femenino">Femenino</option>
                                                                <option value="Masculino">Masculino</option>
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
                                                            <input type="text" id="telefono_uno" name="telefono_uno" value="{{ old('telefono_uno') }}" class="form-control" placeholder="Teléfono" />
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
                                                            <textarea id="direccion" type="text" class="form-control" name="direccion" placeholder="Dirección Completa de Recidencia Actual">{{ old('direccion') }}</textarea>
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


                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
                                                    <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                            </label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" />
                                                    <i class="ace-icon fa fa-lock"></i>
                                                </span>
                                            </label>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Confirma password" />
                                                    <i class="ace-icon fa fa-retweet"></i>
                                                </span>
                                            </label>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <!-- <label class="block">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl">
                                                I accept the
                                                <a href="#">User Agreement</a>
                                            </span>
                                        </label> -->


                                        <div class="space-24"></div>
                                        <div id="respuesta"></div>

                                        <div class="clearfix">
                                            <button type="reset" class="width-35 pull-left btn btn-sm">
                                                <i class="ace-icon fa fa-refresh"></i>
                                                <span class="bigger-110">Resetear</span>
                                            </button>

                                            <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                                                <span class="bigger-110">Registrarme</span>

                                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <div class="toolbar center">
                                <a href="./" data-target="#login-box" class="back-to-login-link">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Igresar
                                </a>
                            </div>
                        </div><!-- /.widget-body -->
                    </div><!-- /.signup-box -->
                    <br><br><br>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

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

@endsection
