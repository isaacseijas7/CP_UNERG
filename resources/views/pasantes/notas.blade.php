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

        <li class="active">Mis Notas</li>
    </ul>


</div>

<h2><I class="icon-files-o"></I> Mis Notas</h2>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-4">


                        @if($evaluacionE)
                            <a href="{{ url('/mis-notas/empresariales-pdf/') }}" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                                <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                                Notas Empresariales
                                <span class="badge badge-success badge-left">Nota: {{$evaluacionE->nota}}</span>
                            </a>
                        @else
                            <a href="#" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                                <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                                Notas Empresariales
                                <span class="badge badge-warning badge-left">Nota: no cargada</span>
                            </a>
                        @endif
                        

                    </div>
                    <div class="col-md-4">

                         @if($evaluacionA)
                            <a href="{{ url('/mis-notas/academicas-pdf/') }}" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                                <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                                Notas Academicas
                                <span class="badge badge-success badge-left">Nota: {{$evaluacionA->nota}}</span>
                            </a>
                        @else
                            <a href="#" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                                <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                                Notas Academicas
                                <span class="badge badge-warning badge-left">Nota: no cargada</span>
                            </a>
                        @endif
                        
                            
                    </div>
                    <div class="col-md-4">
    

                        @if($evaluacionC)
                            <a href="{{ url('/mis-notas/final-pdf/') }}" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                                <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                                Notas Final
                                @if($evaluacionC->status == "REPROBADO")
                                    <span class="badge badge-danger badge-left">Nota: {{$evaluacionC->status}}</span>
                                @else
                                    <span class="badge badge-success badge-left">Nota: {{$evaluacionC->status}}</span>
                                @endif
                            </a>
                        @else
                            <a href="#" style="width: 100%!important;" class="btn btn-app btn-primary no-radius  ">
                            <i class="ace-icon fa icon-cloud-download bigger-430"></i>
                            Nota Final
                            <span class="badge badge-warning badge-left">Nota: no cargada</span>
                            </a>
                        @endif
                        
                    </div>
                </div>
            


                
            </div>
        </div>
    </div>
</div>



@endsection
