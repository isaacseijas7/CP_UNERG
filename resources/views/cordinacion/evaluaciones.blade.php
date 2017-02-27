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
            <form id="frm" action="{{url('/evaluaciones/coordinacion')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('pasantes_id') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select onchange="datosPasante(this)"  class="chosen-select form-control" placeholder="Ingrese pasantes_id" name="pasantes_id" id="pasantes_id" value="{{ old('pasantes_id') }}">
                                        <option value="" data-notaa="" data-notae="">Seleccione Tutoriado</option>
                                        @foreach($pasantes as $pasante)
                                            
                                            <option data-notaa="{{$pasante->nota_a}}" data-notae="{{$pasante->nota_e}}" value="{{$pasante->pasantes_id}}">{{$pasante->cedula}} {{$pasante->primer_nombre}} {{$pasante->primer_apellido}}</option>
                                        @endforeach
                                    </select>
                                    
                                </span>
                            </label>
                            @if ($errors->has('pasantes_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pasantes_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nota_academica') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	<h2><span class="label label-info arrowed-in-right arrowed" >Nota Academica: </span> <span class="label label-success arrowed" id="nota_aca"></span> </h2>
                                <span class="block input-icon input-icon-right">
                                    <input type="hidden" id="nota_academica" name="nota_academica" value="{{ old('nota_academica') }}" class="form-control" placeholder="Nota Academica" autofocus  />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_academica'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_academica') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nota_empresarial') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	<h2><span  class="label label-info arrowed-in-right arrowed"> Nota Empresarial:  </span> <span class="label label-success arrowed" id="nota_em"></span></h2>
                                <span class="block input-icon input-icon-right">
                                    <input type="hidden" id="nota_empresarial" name="nota_empresarial" value="{{ old('nota_empresarial') }}" class="form-control" placeholder="Nota Empresarial"  />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_empresarial'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_empresarial') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-6">

                        <div class="form-group{{ $errors->has('nota_charla') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	Nota Charla:
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="nota_charla" name="nota_charla" value="{{ old('nota_charla') }}" class="form-control" placeholder="Nota Charla" autofocus />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_charla'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_charla') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nota_req') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	Nota Requerimientos:
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="nota_req" name="nota_req" value="{{ old('nota_req') }}" class="form-control" placeholder="Nota Requerimientos"  />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_req'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_req') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nota_informe') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	Nota Informe:
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="nota_informe" name="nota_informe" value="{{ old('nota_informe') }}" class="form-control" placeholder="Nota Informe" autofocus />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_informe'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_informe') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nota_defensa') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                            	Nota Defensa:
                                <span class="block input-icon input-icon-right">
                                    <input type="text" id="nota_defensa" name="nota_defensa" value="{{ old('nota_defensa') }}" class="form-control" placeholder="Nota Defensa"  />
                                   
                                </span>
                            </label>
                            @if ($errors->has('nota_defensa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nota_defensa') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
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

                    <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
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

	    var nota_academica = document.getElementById('nota_academica'),
	    	nota_empresarial = document.getElementById('nota_empresarial'),
            nota_em = document.getElementById('nota_em'),
            nota_aca = document.getElementById('nota_aca');

    function datosPasante(ele) {
    	optionSelect = ele.querySelector(`[value="${ele.value}"]`);

    	nota_academica.value = optionSelect.dataset.notaa;
    	nota_empresarial.value = optionSelect.dataset.notae;

        nota_em.innerHTML = optionSelect.dataset.notae;
        nota_aca.innerHTML = optionSelect.dataset.notaa;

    	document.getElementById('nota_informe').focus();

    }
   
</script>

<script>

$('#frm')
    .formValidation({
        message: 'Los datos no son validos',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            nota_charla: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido'
                    },
                }
            },
           
            nota_req: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'La nota es requerida'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: ''
                    },
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Solo caracteres numericos'
                    }
                }
            },

            nota_defensa: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'La nota es requerida'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: ''
                    },
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Solo caracteres numericos'
                    }
                }
            },

             nota_informe: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'La nota es requerida'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: ''
                    },
                    regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Solo caracteres numericos'
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