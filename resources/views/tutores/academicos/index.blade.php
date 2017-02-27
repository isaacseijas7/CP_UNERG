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
        <li class="active">Tutores Academicos</li>
        <li >
        	<a href="{{url('/tutores-academicos/registrar')}}">Registrar Tutor</a>
        </li>
    </ul>

</div>

<div class="page-header">
	<h2>Lista Tutores Academicos</h2>
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
				      	<td>{{ $tutor->persona->cedula }}</td>
				      	<td>{{ $tutor->persona->primer_nombre }} {{ $tutor->persona->segundo_nombre }}</td>
				      	<td>{{ $tutor->persona->primer_apellido }} {{ $tutor->persona->segundo_apellido }}</td>
                        <td>{{ $tutor->persona->genero }}</td>
				      	<td>{{ $tutor->persona->telefono_uno }}</td>
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                <a class="btn btn-xs btn-info" href="tutores-academicos/ver/{{$tutor->persona->id}}"><i class="icon-eye"></i></a>
                                <a class="btn btn-xs btn-success" href="tutores-academicos/editar/{{$tutor->persona->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                                <!-- <a class="btn btn-xs btn-danger" href="tutores-academicos/editar/{{$tutor->persona->id}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a> -->
                            </div>
                        </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
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