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
        <li class="active">Tutores Empresariales</li>
        <li >
        	<a href="{{url('/tutores-empresariales/registrar')}}">Registrar Tutor</a>
        </li>
    </ul>
</div>

<div class="page-header">
	<h2>Lista Tutores Empresariales</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="table">
		  	<thead>
		    	<tr>
		      		<th>Cedula</th>
		      		<th>Nombres</th>
		      		<th>Apellidos</th>
                    <th>Genero</th>
		      		<th>Teléfono</th>
                    <th>Acciones</th>
		    	</tr>
		  	</thead>
		  	<tbody>

		  		@foreach($tutores as $tutor)
			  		<tr>
				      	<td>{{ $tutor->cedula }}</td>
				      	<td>{{ $tutor->primer_nombre }} {{ $tutor->segundo_nombre }}</td>
				      	<td>{{ $tutor->primer_apellido }} {{ $tutor->segundo_apellido }}</td>
                        <td>{{ $tutor->genero }}</td>
				      	<td>{{ $tutor->telefono_uno }}</td>
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <a class="btn btn-xs btn-info" href="tutores-empresariales/ver/{{$tutor->persona_id}}"><i class="icon-eye"></i></a>
                                <a class="btn btn-xs btn-success" href="tutores-empresariales/editar/{{$tutor->persona_id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                                <!-- <a class="btn btn-xs btn-danger" href="tutores-empresariales/editar/{{$tutor->id}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a> -->
                            </div>
                        </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
        @if(count($tutores) == '0')
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                No hay registros en la <strong>DB</strong>
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

        function confirmar(id) {
            smoke.confirm("¿Desea Eliminar este Vendedor?", function(e){
                if (e){
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

       // opc = document.getElementById('vende');
       // opc.className = 'active';
    </script>
@endsection