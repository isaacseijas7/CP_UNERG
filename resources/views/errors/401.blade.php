<!DOCTYPE html>
<html lang="es-VE">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PASANTÍAS AIS UNERG</title>

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


    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-timepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />

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
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            	<i style="font-size: 145px; color: red;" class="icon-ban"></i>
                <div class="title">Acceso negado</div>
                <hr />
				<div class="space"></div>

				<div class="center">
					<a href="javascript:history.back()" class="btn btn-grey">
						<i class="ace-icon fa fa-arrow-left"></i>
						Volver
					</a>

					<a href="/home" class="btn btn-primary">
						<i class="ace-icon fa fa-tachometer"></i>
						Home
					</a>
				</div>
            </div>
        </div>
    </body>
</html>
