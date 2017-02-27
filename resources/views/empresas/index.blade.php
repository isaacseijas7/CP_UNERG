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
        <li class="active">Empresas</li>
       
    </ul>
</div>

<div class="page-header">
	<h2>Lista Empresas</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="table" >
		  	<thead>
		    	<tr>
		      		<th>RIF</th>
		      		<th>Nombres o Razón</th>
		      		<th>Corro</th>
		      		<th>Teléfono</th>
                    <th>Acciones</th>
		    	</tr>
		  	</thead>
		  	<tbody>

		  		@foreach($empresas as $empresa)
			  		<tr>
				      	<td>{{ $empresa->rif }}</td>
				      	<td>{{ $empresa->nombre_razon }}</td>
				      	<td>{{ $empresa->correo }}</td>
                        <td>{{ $empresa->telefono }}</td>
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                @if ( Auth::user()->type=='Admin' )
                                    <a class="btn btn-xs btn-info" href="{{ url('lista-empresas/ver/'.$empresa->id) }}"><i class="icon-eye"></i></a>
                                @endif

                                @if ( Auth::user()->type=='Pasante' )
                                    <a class="btn btn-xs btn-info" href="{{ url('empresas/ver/'.$empresa->id) }}"><i class="icon-eye"></i></a>
                                @endif
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