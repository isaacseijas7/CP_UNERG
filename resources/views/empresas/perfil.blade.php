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
        <li class="active"> Perfil</li>
        <li>
            <a href="{{url('/perfil/editar')}}">Editar</a>
        </li>
    </ul>

</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h2><i class="ace-icon fa fa-user"></i> Perfil</h2>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-24">
							<div class="row">
								<div class="col-sm-6">
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

							<a class="btn btn-xl btn-success" href=" {{url('perfil/editar/')}} "><i class="ace-icon fa fa-pencil bigger-120"></i> Editar</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


@endsection
