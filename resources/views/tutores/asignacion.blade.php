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
        <li class="active">Asignación Tutores</li>
    </ul>

</div>

<div class="page-header">
	<h2>Asignación Tutores</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.mensajes')
                </div>
            </div>
            <form action="{{url('/tutores/asignacion')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('pasante_id') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select class="chosen-select form-control" placeholder="Ingrese pasante_id" name="pasante_id" id="pasante_id" value="{{ old('pasante_id') }}">
                                        <option value="">Seleccione Pasante</option>
                                        @foreach($pasantes as $pasante)
                                            
                                            <option value="{{$pasante->id}}">{{$pasante->persona->cedula}} {{$pasante->persona->primer_nombre}} {{$pasante->persona->primer_apellido}}</option>
                                        @endforeach
                                    </select>
                                    
                                </span>
                            </label>
                            @if ($errors->has('pasante_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pasante_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('tutores_a_id') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select class="chosen-select form-control" placeholder="Ingrese tutores_a_id" name="tutores_a_id" id="tutores_a_id" value="{{ old('tutores_a_id') }}">
                                        <option value="">Seleccione Tutor Academico</option>
                                        @foreach($academicos as $academico)
                                            
                                            <option value="{{$academico->id}}">{{$academico->persona->cedula}} {{$academico->persona->primer_nombre}} {{$academico->persona->primer_apellido}}</option>
                                        @endforeach
                                    </select>
                                    
                                </span>
                            </label>
                            @if ($errors->has('tutores_a_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tutores_a_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('tutores_e_id') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select class="chosen-select form-control" placeholder="Ingrese tutores_e_id" name="tutores_e_id" id="tutores_e_id" value="{{ old('tutores_e_id') }}">
                                        <option value="">Seleccione Tutor Empresarial</option>
                                        @foreach($empresariales as $empresarial)
                                            
                                            <option value="{{$empresarial->id}}">{{$empresarial->persona->cedula}} {{$empresarial->persona->primer_nombre}} {{$empresarial->persona->primer_apellido}}</option>
                                        @endforeach
                                    </select>
                                    
                                </span>
                            </label>
                            @if ($errors->has('tutores_e_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tutores_e_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="space-8"></div>
                <div id="respuesta"></div>

                <div class="clearfix">
                    <button type="reset" class="width-35 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Resetear</span>
                    </button>

                    <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
                        <span class="bigger-110">Asignar</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
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
</script>
@endsection