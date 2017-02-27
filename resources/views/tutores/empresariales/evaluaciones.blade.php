@extends('layouts.app')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/smoke/smoke.css') }}">
@endsection

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
        <li class="active">Evaluaciones</li>
    </ul>
</div>

<div class="page-header">
	<h2>Evaluaciones</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.mensajes')
                </div>
            </div>
            <form id="frm" action="{{url('/evaluaciones/empresariales')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('tutoreado') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select class="chosen-select form-control" placeholder="Ingrese tutoreado" name="tutoreado" id="tutoreado" value="{{ old('tutoreado') }}">
                                        <option value="">Seleccione Tutoriado</option>
                                        @foreach($pasantes as $pasante)
                                            
                                            <option value="{{$pasante->pasantes_id}}">{{$pasante->cedula}} {{$pasante->primer_nombre}} {{$pasante->primer_apellido}}</option>
                                        @endforeach
                                    </select>
                                    
                                </span>
                            </label>
                            @if ($errors->has('tutoreado'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tutoreado') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="col-md-12">
                             @if ($errors->has('uno') || $errors->has('dos') || $errors->has('tres') || $errors->has('cuatro') || $errors->has('cinco') || $errors->has('seis') || $errors->has('siete') || $errors->has('ocho') || $errors->has('nueve') || $errors->has('dies') )
                                <div class="form-group has-error">
                                    <span class="help-block">
                                        <strong> LOS ASPECTOS A EVALUAR SON REQUERIDOS </strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ASPECTOS A EVALUAR</th>
                                <th>Muy mal</th>
                                <th>Mal</th>
                                <th>Indiferente</th>
                                <th>Bien</th>
                                <th>Muy bien</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 400px;">Asistencia y puntualidad: el cumplimiento del horario normal de trabajo.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="uno" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="uno" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="uno" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="uno" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="uno" required >

                                </td>
                            </tr>
                            <tr>
                                <td>Iniciativa: capacidad para proponer espontánea y
oportunamente sugerencias útiles, tomar acciones para
mejorar prácticas o procedimientos.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="dos" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="dos" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="dos" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="dos" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="dos" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Habilidad para aprender: capacidad para aceptar y fijar
conocimientos sobre procesos, procedimientos, instrumentos
y equipos de trabajo.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="tres" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="tres" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="tres" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="tres" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="tres" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Aptitud para el juicio creativo / evaluativo: habilidad para
juzgar el valor correcto de información, métodos soluciones,
etc. y para identificar inconsistencias y errores en asuntos
sometidos a su análisis.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="cuatro" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="cuatro" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="cuatro" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="cuatro" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="cuatro" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Responsabilidad: es la ejecución de las actividades que el
pasante debe cumplir dentro de las condiciones de tiempo y
calidad preestablecidas.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="cinco" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="cinco" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="cinco" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="cinco" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="cinco" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Hábitos de seguridad: observa conductas relativas al
cumplimiento y aplicación de normas de seguridad y su aporte
de ideas para prevención de accidentes.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="seis" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="seis" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="seis" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="seis" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="seis" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Colaboración: disposición para colaborar con todo el
personal en forma espontánea.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="siete" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="siete" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="siete" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="siete" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="siete" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Calidad de los resultados: es la medida en que el trabajo
realizado se ajusta alas metas preestablecidas.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="ocho" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="ocho" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="ocho" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="ocho" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="ocho" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Participación: es el grado en que el pasante se identifica con
el trabajo, participando con entusiasmo en el mismo.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="nueve" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="nueve" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="nueve" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="nueve" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="nueve" required >

                                </td>
                            </tr>

                            <tr>
                                <td>Conocimiento de la empresa: mide el grado de conocimiento
de la estructura, de los organismos y de sus productos.</td>
                                <td style="text-align: center;" title="Muy mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="2" name="dies" required >

                                </td>
                                <td style="text-align: center;" title="Mal" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="4" name="dies" required >

                                </td>
                                <td style="text-align: center;" title="Indiferente" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="6" name="dies" required >

                                </td>
                                <td style="text-align: center;" title="Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="8" name="dies" required >

                                </td>
                                <td style="text-align: center;" title="Muy Bien" >
                                    
                                    <input style="cursor: pointer;" type="radio" value="10" name="dies" required >

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <input type="hidden" name="nota" id="nota" >
                </div>
                <div style="text-align: center; font-size: 28px!important; background-color: #ccc; color: #fff;" id="respuesta"></div>
                
                <br>

                <div class="clearfix">
                    <button type="reset" class="width-35 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Resetear</span>
                    </button>

                    <button type="button" onclick="return confirmar();" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                        <span class="bigger-110">Evaluar</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>

<div class="row">
    
</div>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script>

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


    var radiosUnos = document.querySelectorAll('[name="uno"]')
        radiosDos = document.querySelectorAll('[name="dos"]')
        radiosTres = document.querySelectorAll('[name="tres"]')
        radiosCuantro = document.querySelectorAll('[name="cuatro"]')
        radiosCinco = document.querySelectorAll('[name="cinco"]')
        radiosSeis = document.querySelectorAll('[name="seis"]');
        radiosSiete = document.querySelectorAll('[name="siete"]')
        radiosOcho = document.querySelectorAll('[name="ocho"]')
        radiosNueve = document.querySelectorAll('[name="nueve"]')
        radiosDies = document.querySelectorAll('[name="dies"]')
        respuestaNota = document.querySelector('#respuesta');

        arrayNotas = [];

        for (var i = radiosUnos.length - 1; i >= 0; i--) {
            radiosUnos[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosDos.length - 1; i >= 0; i--) {
            radiosDos[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosTres.length - 1; i >= 0; i--) {
            radiosTres[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosCuantro.length - 1; i >= 0; i--) {
            radiosCuantro[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosCinco.length - 1; i >= 0; i--) {
            radiosCinco[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosSeis.length - 1; i >= 0; i--) {
            radiosSeis[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosSiete.length - 1; i >= 0; i--) {
            radiosSiete[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosOcho.length - 1; i >= 0; i--) {
            radiosOcho[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosNueve.length - 1; i >= 0; i--) {
            radiosNueve[i].addEventListener('click', calcularNota, false);
        }

        for (var i = radiosDies.length - 1; i >= 0; i--) {
            radiosDies[i].addEventListener('click', calcularNota, false);
        }


        function calcularNota(evento) {

            if (arrayNotas.length != 0) {

                arrayNotas.forEach( function(element, index) {

                    if (element.nota == evento.target.name) {

                        arrayNotas.splice(index, 1);

                    }

                });

                agregarNota({
                    'nota': evento.target.name,
                    'value': evento.target.value
                });
                
            }else {
                
                agregarNota({
                    'nota': evento.target.name,
                    'value': evento.target.value
                });
            }

            //console.log(arrayNotas);
        }

        function agregarNota(nota) {
            arrayNotas.push(nota);

            //console.table(arrayNotas);

            var nota = 0;

            arrayNotas.forEach( function(element, index) {
                nota = eval(`${nota} + ${element.value}`);
            });
            respuestaNota.innerHTML = 'NOTA: '+nota;
        }

   
</script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/smoke/smoke.js') }}"></script>
    <script type="text/javascript">
      
        function confirmar() {

            smoke.confirm("Confirme la evaluación del pasante", function(e){
                if (e){
                    //console.log(document.getElementById('formulario'));
                    document.getElementById('frm').submit();
                }else{
                    return false;
                }
            }, {
                ok: "Si",
                cancel: "No",
                classname: "custom-class",
                reverseButtons: true
            });
        }

       // opc = document.getElementById('vende');
       // opc.className = 'active';
    </script>
@endsection