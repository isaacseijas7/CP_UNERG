@extends('layouts.auth')

@section('content')
<div class="main-container">
     
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
                                    Registro empresa
                                </h4>
			                	<div class="row">
			                        <div class="col-md-12">
			                            @include('partials.mensajes')
			                        </div>
			                    </div>

                                <div class="space-6"></div>
                                <p> Ingrese sus datos: </p>

                                <form id="register_frm" role="form" method="POST" action="{{ url('/empresa/register') }}">
                                    {{ csrf_field() }}
                                    <fieldset>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="rif" name="rif" value="{{ old('rif') }}" class="form-control" placeholder="R.I.F. / N.I.T." autofocus />
                                                            <i class="ace-icon icon-location-arrow"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('rif'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('rif') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('nombre_razon') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="nombre_razon" name="nombre_razon" value="{{ old('nombre_razon') }}" class="form-control" placeholder="Nombre o Razón" />
                                                            <i class="ace-icon icon-bookmarks"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('nombre_razon'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nombre_razon') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Teléfono" />
                                                            <i class="ace-icon icon-phone2"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('telefono'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('telefono') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('pagina_web') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="pagina_web" name="pagina_web" value="{{ old('pagina_web') }}" class="form-control" placeholder="Pagina Web" />
                                                            <i class="ace-icon icon-world"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('pagina_web'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('pagina_web') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripción" />
                                                            <i class="ace-icon icon-bookmark"></i>
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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <textarea id="direccion" type="text" class="form-control" name="direccion" placeholder="Dirección Completa">{{ old('direccion') }}</textarea>
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

                                        <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="correo" id="correo" name="correo" value="{{ old('correo') }}" class="form-control" placeholder="correo" />
                                                    <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                            </label>
                                            @if ($errors->has('correo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('correo') }}</strong>
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
            nombre_razon: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            telefono: {
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
            rif: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'EL RIF es requeridO'
                    },
                    stringLength: {
                        min: 10,
                        max: 12,
                        message: 'Minimo 10 caracteres Maximo 12 caracreres'
                    }
                    /*regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Solo caracteres numericos'
                    }*/
                }
            },
            correo: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido'
                    },
                    regexp: {
                        regexp: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                        message: 'El correo no es valido'
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
            pagina_web: {
                validators: {
                    regexp: {
                        regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/,
                        message: 'Pagina no es valida'
                    }
                }
            },
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
