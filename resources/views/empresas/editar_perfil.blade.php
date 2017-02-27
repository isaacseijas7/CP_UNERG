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
        <li>
            <a href="{{url('/perfil')}}">Perfil</a>
        </li>
        <li class="active"> Editar</li>
    </ul>

</div>
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h2>Editar</h2>

				<div class="row">
                    <div class="col-md-12">
                        @include('partials.mensajes')
                    </div>
                </div>
				<form id="register_frm" role="form" method="POST" action="{{ url('/perfil/empresa/editar/') }}">
		            {{ csrf_field() }}
		            <fieldset>

		            	<input type="hidden" name="id" value="{{$empresa->id}}">

		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="text" id="rif" name="rif" value="{{ $empresa->rif }}" class="form-control" placeholder="R.I.F. / N.I.T." disabled />
		                                    <i class="ace-icon icon-location-arrow"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('rif'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('rif') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('nombre_razon') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="text" id="nombre_razon" name="nombre_razon" value="{{ $empresa->nombre_razon }}" class="form-control" placeholder="Nombre o Razón" autofocus/>
		                                    <i class="ace-icon icon-bookmarks"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('nombre_razon'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('nombre_razon') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>
		                </div>

		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="email" id="correo" name="correo" value="{{ $empresa->correo }}" class="form-control" placeholder="Correo" />
		                                    <i class="ace-icon fa fa-envelope"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('correo'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('correo') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="text" id="telefono" name="telefono" value="{{ $empresa->telefono }}" class="form-control" placeholder="Teléfono" />
		                                    <i class="ace-icon icon-phone2"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('telefono'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('telefono') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>
		                </div>

		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('pagina_web') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="text" id="pagina_web" name="pagina_web" value="{{ $empresa->pagina_web }}" class="form-control" placeholder="Pagina Web" />
		                                    <i class="ace-icon icon-world"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('pagina_web'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('pagina_web') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <input type="text" id="descripcion" name="descripcion" value="{{ $empresa->descripcion }}" class="form-control" placeholder="Descripción" />
		                                    <i class="ace-icon icon-bookmark"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('descripcion'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('descripcion') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>
		                </div>

		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
		                            <label class="block clearfix">
		                                <span class="block input-icon input-icon-right">
		                                    <textarea id="direccion" type="text" class="form-control" name="direccion" placeholder="Dirección Completa">{{ $empresa->direccion }}</textarea>
		                                    <i class="ace-icon icon-map-marker"></i>
		                                </span>
		                            </label>
		                            @if ($errors->has('direccion'))
		                                <span class="help-block">
		                                    <strong>{{ $errors->first('direccion') }}</strong>
		                                </span>
		                            @endif
		                        </div>
		                    </div>
		                </div>


		               
		                <!-- <label class="block">
		                    <input type="checkbox" class="ace" />
		                    <span class="lbl">
		                        I accept the
		                        <a href="#">User Agreement</a>
		                    </span>
		                </label> -->


		                <div class="space-24"></div>
		                <div id="respuesta"></div>

		                <div class="clearfix">
		                    <button type="reset" class="width-35 pull-left btn btn-sm">
		                        <i class="ace-icon fa fa-refresh"></i>
		                        <span class="bigger-110">Resetear</span>
		                    </button>

		                    <button type="submit" data-btn="btn" class="width-60 pull-right btn btn-sm btn-primary">
		                        <span class="bigger-110">Registrarme</span>

		                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
		                    </button>
		                </div>
		            </fieldset>
		        </form>
			</div>
			<div class="col-md-2"></div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


@endsection
