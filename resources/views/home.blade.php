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

        <!-- <li>
            <a href="#">Other Pages</a>
        </li>
        <li class="active">Blank Page</li> -->
    </ul>


</div>

<h2>{{$titulo}}</h2>

<div class="row">
    <div class="col-md-12">
        @include('partials.mensajes')
    </div>
</div>

<img width="100%;" src="{{asset('assets/img/pic4.jpg')}}">

@endsection
