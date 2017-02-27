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
        <li class="active">Actividades</li>
       
    </ul>

</div>

<div class="page-header">
    <h2>Lista Actividades</h2>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                @include('partials.mensajes')
            </div>
        </div>
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Actividad</th>
                    <th>Pasante</th>
                    <th>Status / Tiempo</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($actividades as $actividad)
                    <tr>
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->actividad }}</td>
                        <td>{{ $actividad->pasante->persona->cedula }} {{ $actividad->pasante->persona->primer_nombre }} {{ $actividad->pasante->persona->primer_apellido }}</td>
                        <td>
                            @if ( $actividad->status=='Pendiente' )

                                <span class="label label-sm label-danger">{{ $actividad->status }}</span> {{ $actividad->created_at->diffForHumans() }}

                            @endif
                            @if ( $actividad->status=='Finalizada' )
                                
                                <span class="label label-sm label-success">{{ $actividad->status }}</span> {{ $actividad->updated_at->diffForHumans() }}

                            @endif
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