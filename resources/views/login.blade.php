@extends('layouts.auth')

@section('content')
<div class="main-container">
    @if ($cronograma)
        <a href="{{url('reportes/cronograma')}}" class="btn btn-danger pull-right" >Descargar Cronograma de Pasantías</a>
    @endif
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <img width="130px;" src="{{asset('assets/img/logo_pasantias.png')}}"> <span class="blue" id="id-text2">UNERG</span>
                        </h1>
                        <h2><span class="white">Coordinación de Pasantías</span></h2>
                    </div>
                    <div class="space-6"></div>
                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="col-md-12">
                                        @include('partials.mensajes')
                                    </div>
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon icon-lock3 blue"></i>
                                        Ingrese sus datos
                                    </h4>

                                    <div class="space-6"></div>

                                    <form id="login_frm" role="form" method="POST" action="{{ url('/login') }}">
                                        {{ csrf_field() }}
                                        <fieldset>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" autofocus />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <!-- <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label> -->

                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Ingresar</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <!-- <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            I forgot my password
                                        </a>
                                    </div> -->

                                    <div style="width: 100%;" class="link-registros">
                                        <a style="display: inline-block; width: 40%;" href="./register" data-target="#signup-box" class="user-signup-link">
                                            Registro pasante
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                        <a style="display: inline-block; width: 40%;" href="./empresa" data-target="#signup-box" class="user-signup-link">
                                            Registro empresa
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <!-- <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Retrieve Password
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Enter your email and to receive instructions
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="email" class="form-control" placeholder="Email" />
                                                    <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Send Me!</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        Back to login
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div> -->

                        
                    </div><!-- /.position-relative -->

                    <!-- <div class="navbar-fixed-top align-right">
                        <br />
                        &nbsp;
                        <a id="btn-login-dark" href="#">Dark</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-blur" href="#">Blur</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-light" href="#">Light</a>
                        &nbsp; &nbsp; &nbsp;
                    </div> -->
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<script>

$('#login_frm')
    .formValidation({
        message: 'Los datos no son validos',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'El email es requerido'
                    },
                    regexp: {
                        regexp: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                        message: 'El email no es valido'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La password es requerida'
                    }
                }
            }
        }
    });


</script>

@endsection
