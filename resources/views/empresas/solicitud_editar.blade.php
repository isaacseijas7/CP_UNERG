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
        <li >
            <a href="{{url('/solicitud')}}">Solicitudes</a>
        </li>
        <li class="active">Solicitud Editar</li>
    </ul>

</div>

<div class="page-header">
	<h2>Solicitud Editar</h2>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                @include('partials.mensajes')
            </div>
        </div>
        <form id="solicitud_frm" role="form" method="POST" action="{{ url('/solicitud/editar') }}">
            {{ csrf_field() }}
            <fieldset>

                <input type="hidden" name="id" value="{{ $solicitud->id }}">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="cantidad" name="cantidad" value="{{ $solicitud->cantidad }}" class="form-control" placeholder="Cantidad de pasantes" autofocus />
                                    <i class="ace-icon icon-location-arrow"></i>
                                </span>
                            </label>
                            @if ($errors->has('cantidad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
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
                                    <textarea id="descripcion" type="text" class="form-control" name="descripcion" placeholder="Descripción de la solicitud">{{ $solicitud->descripcion }}</textarea>
                                    <i class="ace-icon icon-map-marker"></i>
                                </span>
                            </label>
                            @if ($errors->has('descripcion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
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


                <div class="space-24"></div>
                <div id="respuesta"></div>

                <div class="clearfix">
                    <button type="reset" class="width-35 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Resetear</span>
                    </button>

                    <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                        <span class="bigger-110">Solicitud Editar</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<script>
$('#solicitud_frm')
    .formValidation({
        message: 'Los datos no son validos',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            cantidad: {
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
                        min: 1,
                        max: 3,
                        message: '3 caracteres maximo'
                    },
                }
            },
            
            descripcion: {
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