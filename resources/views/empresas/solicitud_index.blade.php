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
        <li class="active">Solicitudes</li>
        <li >
        	<a href="{{url('/solicitud/nueva')}}">Solicitar Pasante</a>
        </li>
    </ul>


</div>

<div class="page-header">
	<h2>Lista Solicitudes</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover ">
		  	<thead>
		    	<tr>
		      		<th>Num Pasantes</th>
		      		<th>Solicitud</th>
                    <th>Acciones</th>
		    	</tr>
		  	</thead>
		  	<tbody>

		  		@foreach($solicitudes as $solicitud)
			  		<tr>
				      	<td style="width: 100px;">{{ $solicitud->cantidad }}</td>
				      	<td>{{ $solicitud->descripcion }}</td>
                        <td style="width: 100px;">
                            <a class="btn btn-xs btn-info" href="solicitud/postulaciones/{{$solicitud->id}}"><i class="icon-eye"></i></a>
                            <a class="btn btn-xs btn-success" href="solicitud/editar/{{$solicitud->id}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                            <!-- <a class="btn btn-xs btn-danger" href="solicitud/editar/{{$solicitud->id}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a> -->
                        </td>
				    </tr>
				@endforeach

            </tbody>
        </table>
        @if(count($solicitudes) == '0')
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                No hay registros en la <strong>DB</strong>
            </div>
        @endif
    </div>
</div>




@endsection