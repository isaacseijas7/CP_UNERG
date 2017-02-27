<div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
    </button>

    <div class="navbar-header pull-left">
        <a href="{{ url('/') }}" class="navbar-brand">
            <small>
               <img width="24px;" src="{{asset('assets/img/logo_pasantias.png')}}"> Coordinación de Pasantias
            </small>
        </a>
    </div>

    <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">

            @if (!Auth::user()->persona->pasante && Auth::user()->type=='Pasante')
            <li class="purple">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                    <span class="badge badge-important">1</span>
                </a>

                <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                    <li class="dropdown-header">
                        <i class="ace-icon fa fa-exclamation-triangle"></i>
                        Alerta
                    </li>

                    <li class="dropdown-content">
                        <ul class="dropdown-menu dropdown-navbar navbar-pink">
                            <li>
                                <a href="{{ url('/perfil') }}">
                                    <div class="clearfix">
                                        <span class="pull-left">
                                            <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                            Completa tu perfil
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
                <li><a href="{{ url('/register') }}">Registrarme</a></li>
            @else

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <span class="user-info">
                            <small>Bienvenido,</small>
                            {{ Auth::user()->persona->primer_nombre }}
                            {{ Auth::user()->persona->primer_apellido }}
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{ url('perfil') }}">
                                <i class="ace-icon fa fa-user"></i>
                                Perfil
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ url('/auth/logout') }}">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div><!-- /.navbar-container -->