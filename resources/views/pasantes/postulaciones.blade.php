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
        <table class="table table-striped table-hover" id="table">
		  	<thead>
		    	<tr>
		      		<th>RIF</th>
		      		<th>Empresa</th>
		      		<th>Status</th>
                    <th>Acciones</th>
		    	</tr>
		  	</thead>
		  	<tbody>

		  		@foreach($postulaciones as $postulacion)
			  		<tr>
				      	<td>{{ $postulacion->rif }}</td>
				      	<td>{{ $postulacion->nombre_razon }}</td>
                        @if ($postulacion->status == "Aceptada")
                            <td><span class="label label-sm label-success">{{ $postulacion->status }}</span> </td>
                            <td>
                                <form method="POST" id="{{ $postulacion->id }}frm" action="{{ url('/empresas/postulaciones/confirmar/') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$postulacion->id}}">
                                    <button type="button" onclick="return confirmar({{ $postulacion->id }});" class="btn btn-xs btn-info"> <i class="icon-check"></i> </button>
                                </form>


                            </td>

                                

                                @elseif($postulacion->status == "Pendiente")
                                    <td><span class="label label-sm label-info">{{ $postulacion->status }}</span> </td>
                                    

                                    <td>
                                        <form method="POST" id="{{ $postulacion->id }}" action="{{ url('/empresas/postulaciones/eliminar/') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$postulacion->id}}">
                                            <button type="button" onclick="return confirmarEliminar({{ $postulacion->id }});" class="btn btn-xs btn-danger"> <i class="icon-close"></i> </button>
                                        </form>
                                    </td>


                                @elseif($postulacion->status == "Rechasada")
                                    <td><span class="label label-sm label-danger">{{ $postulacion->status }}</span> </td>
                                    

                                    <td>
                                        <form method="POST" id="{{ $postulacion->id }}" action="{{ url('/empresas/postulaciones/eliminar/') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$postulacion->id}}">
                                            <button type="button" onclick="return confirmarEliminar({{ $postulacion->id }});" class="btn btn-xs btn-danger"> <i class="icon-close"></i> </button>
                                        </form>
                                    </td>
                                @endif
				      	
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

        function confirmarEliminar(id) {
            console.log(id);
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

        function confirmar(id) {
            console.log(id);
            smoke.confirm("Al confimar ya no podra cambiar de empresa", function(e){
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