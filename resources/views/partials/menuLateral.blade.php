@if (!Auth::guest())

    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>

        <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts --> 

        <ul class="nav nav-list">
            <li class="">
                <a href="{{ url('/home') }}">
                    <i class="menu-icon fa fa-home home-icon"></i>
                    <span class="menu-text"> Inicio </span>
                </a>

                <b class="arrow"></b>
            </li>


            @if ( Auth::user()->type=='Pasante' )
                <!-- <li class="">
                    <a href="{{ url('/pasantias/register') }}">
                        <i class="menu-icon icon-file-text-o"></i>
                        <span class="menu-text"> Registrar Pasantias</span>
                    </a>

                    <b class="arrow"></b>
                </li> -->
                
                <li class="">
                    <a href="{{ url('/empresas') }}">
                        <i class="menu-icon icon-briefcase2"></i>
                        <span class="menu-text"> Empresas </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/empresas/postulaciones') }}">
                        <i class="menu-icon icon-inbox"></i>
                        <span class="menu-text"> Postulaciones </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                
                <li class="">
                    <a href="{{ url('/mis-actividades') }}">
                        <i class="menu-icon icon-check-square-o"></i>
                        <span class="menu-text"> Actividades </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/mis-notas') }}">
                        <i class="menu-icon icon-files-o"></i>
                        <span class="menu-text">Mis Notas </span>
                    </a>

                    <b class="arrow"></b>
                </li>


            @endif

            

            @if ( Auth::user()->type=='Admin' )

                <li class="">
                    <a href="{{ url('/pasantes') }}">
                        <i class="menu-icon icon-people"></i>
                        <span class="menu-text"> Pasantes </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon icon-users2"></i>
                        <span class="menu-text"> Tutores </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{ url('/tutores-academicos') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Listar
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="{{ url('/tutores-academicos/registrar') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Registrar
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ url('/lista-empresas') }}">
                        <i class="menu-icon icon-briefcase2"></i>
                        <span class="menu-text"> Empresas </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/asignacion') }}">
                        <i class="menu-icon icon-compress"></i>
                        <span class="menu-text"> Asignaciones Tutores </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/cronograma-pasantias') }}">
                        <i class="menu-icon icon-folder-open"></i>
                        <span class="menu-text"> Cronograma </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/evaluaciones-coordinacion') }}">
                        <i class="menu-icon icon-file-text"></i>
                        <span class="menu-text"> Evaluaciones </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            @endif

            

            @if ( Auth::user()->type=='Empresa' )

                <li class="">
                    <a href="{{ url('/solicitud/nueva') }}">
                        <i class="menu-icon icon-group_add"></i>
                        <span class="menu-text">Solicitar Pasantes </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/solicitud') }}">
                        <i class="menu-icon icon-envelope-o"></i>
                        <span class="menu-text">Solicitudes </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon icon-users2"></i>
                        <span class="menu-text"> Tutores </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{ url('/tutores-empresariales') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Listar
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="{{ url('/tutores-empresariales/registrar') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Registrar
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ url('/pasantes-apectados') }}">
                        <i class="menu-icon icon-people"></i>
                        <span class="menu-text">Pasantes </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/asignaciones') }}">
                        <i class="menu-icon icon-expand"></i>
                        <span class="menu-text">Asignasines </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            @endif


            @if ( Auth::user()->type=='Tutor Empresarial' )

                <li class="">
                    <a href="{{ url('/tutoreados') }}">
                        <i class="menu-icon icon-people"></i>
                        <span class="menu-text">Tutoreados </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/add-actividades') }}">
                        <i class="menu-icon icon-check-square"></i>
                        <span class="menu-text"> Agregar Actividades </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/actividades') }}">
                        <i class="menu-icon icon-check-square-o"></i>
                        <span class="menu-text">Actividades </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('/evaluaciones') }}">
                        <i class="menu-icon icon-file-text"></i>
                        <span class="menu-text"> Evaluaciones </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            @endif

            @if ( Auth::user()->type=='Tutor Academico' )

                <li class="">
                    <a href="{{ url('/mis-tutoreados') }}">
                        <i class="menu-icon icon-people"></i>
                        <span class="menu-text">Tutoreados </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{ url('mis-tutoreados/evaluaciones') }}">
                        <i class="menu-icon icon-file-text"></i>
                        <span class="menu-text"> Evaluaciones </span>
                    </a>

                    <b class="arrow"></b>
                </li>

               

            @endif



        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>

@endif