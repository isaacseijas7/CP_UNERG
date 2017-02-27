<!DOCTYPE html>
<html lang="es-VE">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PASANTÍAS AIS UNERG </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="shortcut icon" href="{{asset('assets/img/logo_pasantias.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('assets/img/logo_pasantias.png')}}" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href=" {{asset('assets/css/bootstrap.min.css')}} " />
    <link rel="stylesheet" href=" {{asset('assets/font-awesome/4.2.0/css/font-awesome.min.css')}} " />
    <link rel="stylesheet" href=" {{asset('assets/css/icomoon.css')}} " />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="{{asset('assets/js/formValidation/css/formValidation.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dataTables/css/dataTables.bootstrap.css') }}">


    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-timepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />

    @yield('css')

    <!--[if lte IE 9]>
        <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{asset('assets/js/jquery.2.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

    <script src="{{asset('assets/js/formValidation/js/formValidation.min.js')}}"></script>
    <script src="{{asset('assets/js/formValidation/js/framework/bootstrap.min.js')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body class="no-skin">


    <div id="navbar" class="navbar navbar-default">
        <script type="text/javascript">
            try{ace.settings.check('navbar' , 'fixed')}catch(e){}
        </script>

        @include('partials.headerMenu')
        
    </div>

    <div class="main-container" id="main-container">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        @include('partials.menuLateral')

        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            @yield('content')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        @include('partials.footer')
        
    </div><!-- /.main-container -->

<!-- basic scripts -->

        <!--[if !IE]> -->
        

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>



<!--[if lte IE 8]>
  <script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>

<script src="{{asset('assets/js/fuelux.spinner.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.autosize.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-tag.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/dataTables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dataTables/js/dataTables.bootstrap.js') }}"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('assets/js/ace.min.js')}}"></script>
<script src="{{asset('assets/js/acciones.js')}}"></script>


<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function($) {

        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(9999) 999-9999');
    
        
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })    
    
    });
</script>

@yield('scripts')

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
