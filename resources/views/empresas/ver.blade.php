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
        @if ( Auth::user()->type=='Admin' )
            <li>
	            <a href="{{ url('/lista-empresas') }}">Empresas</a>
	        </li>
        @endif

        @if ( Auth::user()->type=='Pasante' )
	        <li>
	            <a href="{{ url('/empresas') }}">Empresas</a>
	        </li>
        @endif
        <li class="active">Ver</li>
       
    </ul>


</div>

<div class="page-header">
	<h2>Ver Empresa</h2>
</div>

<div class="row">
    <div class="col-md-12">

    	<div class="row">
    		<div class="col-md-6">
				<div class="widget-body">
					<div class="widget-main padding-24">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
										<b>Datos Empresa</b>
									</div>
								</div>

								<div>
									<ul class="list-unstyled spaced">
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>RIF:</b> {{$empresa->rif}}
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Nombres o Razón:</b> {{$empresa->nombre_razon}}
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Correo:</b> {{$empresa->correo}}
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Teléfono</b> {{$empresa->telefono}}
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Pagina</b> {{$empresa->pagina_web}}
										</li>
										
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Descripción</b> {{$empresa->descripcion}}
										</li>

										<li>
											<i class="ace-icon fa fa-caret-right blue"></i> <b>Dirección</b> {{$empresa->direccion}}
										</li>
									</ul>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->

						<div class="space"></div>

						

					</div>
				</div>
    		</div>
    		<div class="col-md-6">
				<div class="widget-body">
					<div class="widget-main padding-24">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
										<b>Solicitudes</b>
									</div>
								</div>
								<div class="row">
			                        <div class="col-md-12">
			                            @include('partials.mensajes')
			                        </div>
			                    </div>

								<table class="table table-striped table-hover ">
								  	<thead>
								    	<tr>
								      		<th>Num Pasantes</th>
								      		<th>Solicitud</th>
								      		@if ( Auth::user()->type=='Pasante' )
						                    	<th>Postularme</th>
						                    @endif
								    	</tr>
								  	</thead>
								  	<tbody>
										@foreach($empresa->solicitudes as $solicitud)
									  		<tr>
										      	<td>{{ $solicitud->cantidad }}</td>
										      	<td>{{ $solicitud->descripcion }}</td>
					                        	@if ( Auth::user()->type=='Pasante' )
						                        <td>
						                            <div class="hidden-sm hidden-xs btn-group">
						                                <a class="btn btn-xs btn-success" href="{{ url('empresas/postularme/'.$solicitud->id) }}"><i class="icon-check"></i></a>
						                            </div>
						                        </td>
										        @endif
										    </tr>
										@endforeach
								  		
								  	</tbody>
								</table>

								@if(count($empresa->solicitudes) == '0')
				                    <div class="alert alert-dismissible alert-danger">
				                      <button type="button" class="close" data-dismiss="alert">&times;</button>
				                        No hay registros en la <strong>DB</strong>
				                    </div>
				                @endif
								
							</div><!-- /.col -->
						</div><!-- /.row -->

						<div class="space"></div>

						

					</div>
				</div>
    		</div>
    	</div>
        	



    </div>
</div>




@endsection