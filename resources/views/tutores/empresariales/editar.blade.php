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
            <a href="{{url('/tutores-empresariales')}}">Tutores Empresarial</a>
        </li>
        <li class="active">Editar Tutor</li>
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
						<h2>Editar Tutor Empresarial</h2>
                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.mensajes')
                            </div>
                        </div>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<form id="register_frm" role="form" method="POST" action="{{ url('/tutores-empresariales/editar') }}">
                                    {{ csrf_field() }}
                                    <fieldset>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="cedula" name="cedula" value="{{$tutor->cedula}}" class="form-control" placeholder="Cedula" disabled />
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
                                                            <input type="date" id="fecha_nacimento" name="fecha_nacimento" value="{{ $tutor->fecha_nacimento }}" class="form-control" placeholder="Fecha de Nacimiento" autofocus/>
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
                                                            <input type="text" id="primer_nombre" name="primer_nombre" value="{{ $tutor->primer_nombre }}" class="form-control" placeholder="Primer nombre" />
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
                                                            <input type="text" id="segundo_nombre" name="segundo_nombre" value="{{ $tutor->segundo_nombre }}" class="form-control" placeholder="Segundo nombre" />
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
                                                            <input type="text" id="primer_apellido" name="primer_apellido" value="{{ $tutor->primer_apellido }}" class="form-control" placeholder="Primer apellido" />
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
                                                            <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{ $tutor->segundo_apellido }}" class="form-control" placeholder="Segundo apellido" />
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
                                                                @if($tutor->genero == "Femenino")
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
                                                            <input type="text" id="telefono_uno" name="telefono_uno" value="{{ $tutor->telefono_uno }}" class="form-control" placeholder="Teléfono" />
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

                                        <h3>Datos de la Empresa</h3>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="cargo" name="cargo" value="{{ $tutor->tutorEmpresarial->cargo }}" class="form-control" placeholder="Cargo" />
                                                            <i class="ace-icon icon-star-o"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('cargo'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('cargo') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="departamento" name="departamento" value="{{ $tutor->tutorEmpresarial->departamento }}" class="form-control" placeholder="Departamento" />
                                                            <i class="ace-icon icon-paperclip"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('departamento'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('departamento') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('profesion') ? ' has-error' : '' }}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" id="profesion" name="profesion" value="{{ $tutor->tutorEmpresarial->profesion }}" class="form-control" placeholder="Profesion" />
                                                            <i class="ace-icon icon-certificate"></i>
                                                        </span>
                                                    </label>
                                                    @if ($errors->has('profesion'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('profesion') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{$tutor->id}}" name="id">

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
                                                <span class="bigger-110">Editar</span>

                                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
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
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
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

    if(!ace.vars['touch']) {
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
            $('.chosen-select').each(function() {
                 var $this = $(this);
                 $this.next().css({'width': $this.parent().width()});
            })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
            if(event_name != 'sidebar_collapsed') return;
            $('.chosen-select').each(function() {
                 var $this = $(this);
                 $this.next().css({'width': $this.parent().width()});
            })
        });


        $('#chosen-multiple-style .btn').on('click', function(e){
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
             else $('#form-field-select-4').removeClass('tag-input-style');
        });
    }

</script>
@endsection
