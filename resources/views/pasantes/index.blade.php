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
        <li class="active">Pasantes</li>
    </ul>

    <div class="nav-search" id="nav-search">
        <form class="form-search" name="periodo" method="GET">
            <span class="input-icon">
                <input type="text" placeholder="Buscar por periodo..." class="nav-search-input" id="nav-search-input" name="periodo" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
        </form>
    </div>
</div>

<div class="page-header">
	<h2>Lista Pasantes</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover " id="table">
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

		  		@foreach($pasantes as $pasante)
			  		<tr>
				      	<td>{{ $pasante->persona->cedula }}</td>
				      	<td>{{ $pasante->persona->primer_nombre }} {{ $pasante->persona->segundo_nombre }}</td>
				      	<td>{{ $pasante->persona->primer_apellido }} {{ $pasante->persona->segundo_apellido }}</td>
                        <td>{{ $pasante->persona->genero }}</td>
				      	<td>{{ $pasante->persona->telefono_uno }}</td>
                        <td>

                            <div class="hidden-sm hidden-xs btn-group">
                                <a class="btn btn-xs btn-info" href="pasantes/ver/{{$pasante->persona->id}}"> <i class="icon-eye"></i> </a>
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