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
        <li class="active">Perfil</li>
        <li >
        	<a href="{{url('perfil/editar/')}}">Editar Pefil</a>
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
                        <h2>Datos Tutor Academico</h2>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main padding-24">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                            <b>Datos Personales</b>
                                        </div>
                                    </div>

                                    <div>
                                        <ul class="list-unstyled spaced">
                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Cedula:</b> {{$tutor->cedula}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Nombres:</b> {{$tutor->primer_nombre}} {{$tutor->segundo_nombre}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Apellidos:</b> {{$tutor->primer_apellido}} {{$tutor->segundo_apellido}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Genero: </b> {{$tutor->genero}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Fecha de Nacimiento</b> {{$tutor->fecha_nacimento}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Teléfono</b> {{$tutor->telefono_uno}}
                                            </li>

                                            <li>
                                                <i class="ace-icon fa fa-caret-right blue"></i> <b>Email</b> {{$tutor->usuario->email}}
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