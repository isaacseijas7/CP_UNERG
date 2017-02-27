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
                    <th>Acciones</th>
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
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">
                                @if ( $actividad->status=='Pendiente' )
                                    <div class="ace-settings-item">
                                        <input type="checkbox" name="finalizada[]" value="{{$actividad->id}}" class="ace ace-checkbox-2" id="ace-settings-navbar{{$actividad->id}}" />
                                        <label class="lbl" for="ace-settings-navbar{{$actividad->id}}"> Finalizada</label>
                                    </div>
                                @endif
                                @if ( $actividad->status=='Finalizada' )
                                    <div class="ace-settings-item">
                                        <input type="checkbox" checked disabled name="finalizada[]" value="{{$actividad->id}}" class="ace ace-checkbox-2" id="ace-settings-navbar{{$actividad->id}}" />
                                        <label class="lbl" for="ace-settings-navbar{{$actividad->id}}"> Listo</label>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form method="POST" action="{{ url('/actividades') }}">
            {{ csrf_field() }}
            <input type="hidden" id="actividades_check" name="actividades_check">
            <button type="submit" class="btn btn-xl btn-success"  ><i class="ace-icon fa icon-check-square"></i> Finalizar Actividates</button>
        </form>

    </div>
</div>


<script type="text/javascript">
     
var checkes = document.querySelectorAll('.ace-checkbox-2'),
    actividades = document.querySelector('#actividades_check'),
    array = [];

    for (var i = checkes.length - 1; i >= 0; i--) {
        checkes[i].addEventListener('click', function (e) {
            
            if (e.target.checked == true) {
                array.push(e.target.value);
                    actividades.value = '';
                for (var i = array.length - 1; i >= 0; i--) {
                    console.log(array[i]);
                    actualizar(array[i]);
                }
            }else  {
                for (var i = 0; i < array.length; i++) {
                    if ( e.target.checked == i ) {
                        array.splice(i, 1);
                        break;
                    }
                }
                    actividades.value = '';
                for (var i = array.length - 1; i >= 0; i--) {

                    console.log(array[i]);
                    actualizar(array[i]);
                }
            }

        }, false)
    }

    function actualizar(iten) {

        actividades.value += iten + ', ';
    }






</script>

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