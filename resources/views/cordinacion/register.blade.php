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
            <a href="{{url('/pasantias')}}">Pasantías</a>
        </li>
        <li class="active">Registrar</li>
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
						<h2>Registrar Pasantías</h2>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<form id="pasantias_frm" role="form" method="POST" action="{{ url('/pasantias/register') }}">
                                    {{ csrf_field() }}

                                    <H3>Datos de la empresa</H3>

                                    <div class="row">
                                    	<div class="col-md-6">
                                    		<div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
	                                    		<label class="control-label" for="rif">RIF</label>
					                            <input id="rif" type="text" class="form-control" name="rif" value="{{ old('rif') }}" placeholder="RIF de la empresa" autofocus>

					                            @if ($errors->has('rif'))
					                                <span class="help-block">
					                                    <strong>{{ $errors->first('rif') }}</strong>
					                                </span>
					                            @endif		
                                    		</div>
                                    	</div>
                                    	<div class="col-md-6">
                                    		<div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
	                                    		<label class="control-label" for="empresa">Empresa</label>
					                            <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" placeholder="Empresa">

					                            @if ($errors->has('empresa'))
					                                <span class="help-block">
					                                    <strong>{{ $errors->first('empresa') }}</strong>
					                                </span>
					                            @endif
                                    		</div>
                                    	</div>
                                    </div>

                                    <div class="row">
                                    	<div class="col-md-12">
                                    		<div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
					                            <label class="control-label" for="descripcion">Descripción</label>
					                            <textarea id="descripcion" type="text" placeholder="Descripción de la empresa" class="form-control" name="descripcion" >{{ old('descripcion') }}</textarea>

					                            @if ($errors->has('descripcion'))
					                                <span class="help-block">
					                                    <strong>{{ $errors->first('descripcion') }}</strong>
					                                </span>
					                            @endif
						                    </div>
                                    	</div>
                                    </div>

                                    <h3>Datos tutor academico</h3>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                                <label class="control-label" for="cedula">Cedula</label>
                                                <input id="cedula" placeholder="Cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" autofocus>

                                                @if ($errors->has('cedula'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cedula') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('primer_nombre') ? ' has-error' : '' }}">
                                                <label class="control-label" for="primer_nombre">Primer nombre</label>
                                                <input id="primer_nombre" type="text" class="form-control" placeholder="Primer nombre" name="primer_nombre" value="{{ old('primer_nombre') }}">

                                                @if ($errors->has('primer_nombre'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('primer_nombre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('segundo_nombre') ? ' has-error' : '' }}">
                                                <label class="control-label" for="segundo_nombre">Segundo nombre</label>
                                                <input id="segundo_nombre" type="text" class="form-control" name="segundo_nombre" value="{{ old('segundo_nombre') }}">

                                                @if ($errors->has('segundo_nombre'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('segundo_nombre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('primer_apellido') ? ' has-error' : '' }}">
                                                <label class="control-label" for="primer_apellido">Primer apellido</label>
                                                <input id="primer_apellido" type="text" class="form-control" name="primer_apellido" value="{{ old('primer_apellido') }}">

                                                @if ($errors->has('primer_apellido'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('primer_apellido') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('segundo_apellido') ? ' has-error' : '' }}">
                                                <label class="control-label" for="segundo_apellido">Segundo apellido</label>
                                                <input id="segundo_apellido" type="text" class="form-control" name="segundo_apellido" value="{{ old('segundo_apellido') }}">

                                                @if ($errors->has('segundo_apellido'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('segundo_apellido') }}</strong>
                                                    </span>
                                                @endif
                                            </div>                              
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                                                <label class="control-label" for="genero">Genero</label>
                                                <select class="form-control" placeholder="Ingrese genero" name="genero" id="genero" value="{{ old('genero') }}">
                                                    <option value="">Seleccione el genero</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Masculino">Masculino</option>
                                                </select>

                                                @if ($errors->has('genero'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('genero') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('telefono_uno') ? ' has-error' : '' }}">
                                                <label class="control-label" for="telefono_uno">Teléfono celular</label>
                                                <input id="telefono_uno" type="text" class="form-control" name="telefono_uno" value="{{ old('telefono_uno') }}">

                                                @if ($errors->has('telefono_uno'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telefono_uno') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('telefono_dos') ? ' has-error' : '' }}">
                                                <label class="control-label" for="telefono_dos">Teléfono habitación</label>
                                                <input id="telefono_dos" type="text" class="form-control" name="telefono_dos" value="{{ old('telefono_dos') }}">

                                                @if ($errors->has('telefono_dos'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telefono_dos') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

									<div class="space-14"></div>
                                    <div id="respuesta"></div>

                                    <div class="clearfix">
                                        <button type="reset" class="width-35 pull-left btn btn-sm">
                                            <i class="ace-icon fa fa-refresh"></i>
                                            <span class="bigger-110">Resetear</span>
                                        </button>

                                        <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                                            <span class="bigger-110">Registrar</span>

                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                        </button>
                                    </div>
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
<script>
    
    $('#pasantias_frm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rif: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El rif es requerido'
                    },
                    stringLength: {
                        min: 11,
                        max: 12,
                        message: 'Minimo 11 caracteres Maximo 12 caracreres'
                    }
                }
            },
            empresa: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    }
                }
            },
            descripcion: {
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
                        regexp: /^[a-zA-Z_\.]+$/,
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
                        regexp: /^[a-zA-Z_\.]+$/,
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
                        regexp: /^[a-zA-Z_\.]+$/,
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
                        regexp: /^[a-zA-Z_\.]+$/,
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
                        message: 'El campo es requerido'
                    },
                    stringLength: {
                        min: 7,
                        max: 8,
                        message: 'Minimo 7 caracteres Maximo 8 caracreres'
                    },
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Campo no valido'
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
            }
        }
    });

</script>
@endsection
