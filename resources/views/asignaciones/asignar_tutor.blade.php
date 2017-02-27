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
            <form action="{{url('/asignaciones')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('tutores_e_id') ? ' has-error' : '' }}">
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <select class="chosen-select form-control" placeholder="Ingrese tutores_e_id" name="tutores_e_id" id="tutores_e_id" value="{{ old('tutores_e_id') }}">
                                        <option value="">Seleccione Tutor Academico</option>
                                        @foreach($tutores as $tutor)
                                            
                                            <option value="{{$tutor->id}}">{{$tutor->cedula}} {{$tutor->primer_nombre}} {{$tutor->primer_apellido}}</option>
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

                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('pasante_id') ? ' has-error' : '' }}">
                            
							<label for="form-field-select-2">Pasantes</label>

							<select multiple="" class="chosen-select form-control" id="form-field-select-4" data-placeholder="Pasantes..." name="pasante_id[]" id="form-field-select-2" multiple="multiple">
								@foreach($pasantes as $pasante)
	                                <option value="{{$pasante->pasantes_id}}"> {{$pasante->cedula}} {{$pasante->primer_nombre}} {{$pasante->primer_apellido}}</option>
	                            @endforeach
								
							</select>
                            @if ($errors->has('pasante_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pasante_id') }}</strong>
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