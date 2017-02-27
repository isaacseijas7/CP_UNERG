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
        <li class="active">Cronograma pasantías</li>
    </ul>


</div>

<div class="page-header">
	<h2>Cronograma pasantías</h2>
    <a href="{{url('reportes/cronograma')}}" class="btn btn-danger pull-right" >Imprimir PDF</a>
    <br><br>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12">
                @include('partials.mensajes')
            </div>
            <div id="error"></div>
        </div>
        <form id="aperturar_inscripciones" class="form-horizontal" role="form" method="POST" action="{{ url('/cronograma-pasantias/editar') }}"">
            {{ csrf_field() }}

            <input id="id" type="hidden" class="form-control" name="id" placeholder="id" value="{{ $cronograma->id }}">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('periodo') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="periodo">Periodo Academico</label>
                            <input id="periodo" type="text" class="form-control" name="periodo" placeholder="Periodo" value="{{ $cronograma->periodo }}" autofocus disabled>

                            @if ($errors->has('periodo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('periodo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('primera_charla') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="primera_charla">Fecha Primera Charla</label>
                            <input id="primera_charla" type="date" class="form-control" name="primera_charla" value="{{ $cronograma->primera_charla }}">

                            @if ($errors->has('primera_charla'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('primera_charla') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('segunda_charla') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="segunda_charla">Fecha Segunda Charla</label>
                            <input id="segunda_charla" type="date" class="form-control" name="segunda_charla" value="{{ $cronograma->segunda_charla }}">

                            @if ($errors->has('segunda_charla'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('segunda_charla') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('ini_pasantias') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="ini_pasantias">Fecha Inicio Pasantías</label>
                            <input id="ini_pasantias" type="date" class="form-control" name="ini_pasantias" value="{{ $cronograma->ini_pasantias }}">

                            @if ($errors->has('ini_pasantias'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ini_pasantias') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('entrega_req_inic') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="entrega_req_inic">Fecha Entrega Requeri Iniciales <b>Hasta el</b></label>
                            <input id="entrega_req_inic" type="date" class="form-control" name="entrega_req_inic" value="{{ $cronograma->entrega_req_inic }}">

                            @if ($errors->has('entrega_req_inic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entrega_req_inic') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('primera_visita') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="primera_visita">Fecha Primera Visita del Tutor Académico <b>Hasta el</b></label>
                            <input id="primera_visita" type="date" class="form-control" name="primera_visita" value="{{ $cronograma->primera_visita }}">

                            @if ($errors->has('primera_visita'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('primera_visita') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('reasignacion') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="reasignacion">Fecha Casos especiales: Reasignación <b>Hasta el</b></label>
                            <input id="reasignacion" type="date" class="form-control" name="reasignacion" value="{{ $cronograma->reasignacion }}">

                            @if ($errors->has('reasignacion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reasignacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('segunda_visita') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="segunda_visita">Fecha Segunda Visita del Tutor Académico <b>Hasta el</b></label>
                            <input id="segunda_visita" type="date" class="form-control" name="segunda_visita" value="{{ $cronograma->segunda_visita }}">

                            @if ($errors->has('segunda_visita'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('segunda_visita') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('culminacion_pasantias') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="culminacion_pasantias">Fecha Culminación de Pasantías <b>Hasta el</b></label>
                            <input id="culminacion_pasantias" type="date" class="form-control" name="culminacion_pasantias" value="{{ $cronograma->culminacion_pasantias }}">

                            @if ($errors->has('culminacion_pasantias'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('culminacion_pasantias') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('desde_entrega_req_fina') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="desde_entrega_req_fina">Fecha Entrega Requeri Finales <b>Desde</b></label>
                            <input id="desde_entrega_req_fina" type="date" class="form-control" name="desde_entrega_req_fina" value="{{ $cronograma->desde_entrega_req_fina }}">

                            @if ($errors->has('desde_entrega_req_fina'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('desde_entrega_req_fina') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('hasta_entrega_req_fina') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="hasta_entrega_req_fina">Fecha Entrega Requeri Finales <b>Hasta el</b></label>
                            <input id="hasta_entrega_req_fina" type="date" class="form-control" name="hasta_entrega_req_fina" value="{{ $cronograma->hasta_entrega_req_fina }}">

                            @if ($errors->has('hasta_entrega_req_fina'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hasta_entrega_req_fina') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('desde_presentacion_oral') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="desde_presentacion_oral">Fecha Presentación Oral <b>Desde</b></label>
                            <input id="desde_presentacion_oral" type="date" class="form-control" name="desde_presentacion_oral" value="{{ $cronograma->desde_presentacion_oral }}">

                            @if ($errors->has('desde_presentacion_oral'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('desde_presentacion_oral') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('hasta_presentacion_oral') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="hasta_presentacion_oral">Fecha Presentación Oral <b>Hasta el</b></label>
                            <input id="hasta_presentacion_oral" type="date" class="form-control" name="hasta_presentacion_oral" value="{{ $cronograma->hasta_presentacion_oral }}">

                            @if ($errors->has('hasta_presentacion_oral'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hasta_presentacion_oral') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('carga_notas') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label class="control-label" for="carga_notas">Fecha Carga de Notas <b>Hasta el</b></label>
                            <input id="carga_notas" type="date" class="form-control" name="carga_notas" value="{{ $cronograma->carga_notas }}">

                            @if ($errors->has('carga_notas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('carga_notas') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- <label for="id-date-range-picker-1">Date Range Picker</label>

            <div class="row">
                <div class="col-xs-8 col-sm-11">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>

                        <input class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" />
                    </div>
                </div>
            </div>

            <hr /> -->

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Editar Cronograma
                    </button>
                </div>
            </div>


        </form>
    </div>
</div>


<script type="text/javascript">
    /*jQuery(function($) {
            
        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        })
        .prev().on(ace.click_event, function(){
            console.log('hola');
            $(this).next().focus();
        });
    });*/


    var frm = document.querySelector('#aperturar_inscripciones');


    frm.addEventListener('submit', function  (e) {
        e.preventDefault();

        let primera_charla = new Date(frm.primera_charla.value), 
            segunda_charla = new Date(frm.segunda_charla.value);


        if (segunda_charla <= primera_charla) {

            document.querySelector('#error').innerHTML = `<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    La fecha de la primera charla no puede ser menor o igual a la de segunda
                </div>`;

        }else{
            document.querySelector('#error').innerHTML = '';

            frm.submit();
        }

        console.log(inicio  ,  final);

    } ,false)

</script>

@endsection