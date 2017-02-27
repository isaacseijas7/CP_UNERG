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
        <li class="active">Postulaciones</li>
    </ul>

</div>

<div class="page-header">
	<h2>Lista Postulaciones</h2>
</div>

<div class="row">
    <div class="col-md-12">
    	<div class="row">
            <div class="col-md-12">
                @include('partials.mensajes')
            </div>
        </div>
        <table class="table table-striped table-hover" id="table">
		  	<thead>
		    	<tr>
		      		<th>Cedula</th>
		      		<th>Pasante</th>
		      		<th>Teléfono</th>
		      		<th>Habilidades y Destrezas</th>
		      		<th>Aceptar / Rechasar</th>
		    	</tr>
		  	</thead>
		  	<tbody>

		  		@foreach($postulaciones as $postulacion)
			  		<tr>
				      	<td>{{ $postulacion->cedula }}</td>
				      	<td>{{ $postulacion->primer_nombre }} {{ $postulacion->primer_apellido }}</td>
				      	<td>{{ $postulacion->telefono_uno }}</td>
				      	<td>{{ $postulacion->cursos_habilidades }}</td>
				      	<td>

				      		<form style="display: inline;" method="POST" id="{{ $postulacion->id }}frm" action="{{ url('/solicitud/postulaciones/aceptar/') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$postulacion->postulaciones_pasantes_id}}">
                                <button type="button" onclick="return aceptar({{ $postulacion->id }});" class="btn btn-xs btn-info"> <i class="icon-check"></i> </button>
                            </form>
				      		
				      		<form style="display: inline;" method="POST" id="{{ $postulacion->id }}" action="{{ url('/solicitud/postulaciones/rechasar/') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$postulacion->postulaciones_pasantes_id}}">
                                <button type="button" onclick="return confirmarEliminar({{ $postulacion->id }});" class="btn btn-xs btn-danger"> <i class="icon-close"></i> </button>
                            </form>


				      	</td> 

				    </tr>
				@endforeach

		  		
		  	</tbody>
		</table>
        @if(count($postulaciones) == '0')
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                No hay Postulaciones pendientes
            </div>
        @endif
    </div>
</div>


@endsection

@section('scripts')
    <script src="{{ asset('assets/smoke/smoke.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                "language": {
                    "lengthMenu": "Ver _MENU_ entradas por pagina",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Viendo la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay informacion",
                    "search": "Buscar: ",
                    "paginate": {
                        "previous": "Anterior ",
                        "next": " Proximo",
                    }
                },
                responsive: true
            });
        } );

        function confirmarEliminar(id) {
            smoke.confirm("¿Desea Eliminar la postulación?", function(e){
                if (e){
                    //console.log(document.getElementById('formulario'));
                    document.getElementById(id).submit();
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

        function aceptar(id) {
            smoke.confirm("¿Desea aceptar al postulación?", function(e){
                if (e){
                    //console.log(document.getElementById('formulario'));
                    document.getElementById(id+'frm').submit();
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