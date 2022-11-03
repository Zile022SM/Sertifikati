<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        @yield('seo-title')
        <!-- Bootstrap Core CSS -->
        <link href="/templates/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/templates/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        @yield('plugins-css')

        <!-- Custom CSS -->
        <link href="/templates/admin/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/templates/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('custom-css')
        
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <br>
                    <br>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="{{route('users-edit',auth()->user()->id)}}"><i class="fa fa-user fa-fw"></i>{{auth()->user()->name}}</a>
                            </li> 
                            <li>
                                <a href="{{route('users-change-password',auth()->user()->id)}}"><i class="fa fa-unlock fa-fw"></i> Change password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('users-logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form" style="display: block; margin-left: auto; margin-right: auto;">
                                    <img  style="width: 150px; height: 50px; display: block; margin-left: auto; margin-right: auto;" src="https://www.procoding.rs/wp-content/uploads/2019/03/Logo-1.png">
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{route('users-welcome')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li> 
                            @if(auth()->user()->role == 'administrator')
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('users-create')}}"><i class="fa fa-user-plus"></i>Create user</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users')}}"><i class="fa fa-list"></i> Users list</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            @endif 
                            
                            <li>
                                <a href="#"><i class="fa fa-user-secret"></i> Teachers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('teachers-create')}}"><i class="fa fa-user-plus"></i> Create teacher</a>
                                    </li>
                                    <li>
                                        <a href="{{route('teachers')}}"><i class="fa fa-list"></i> Teachers list</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fa-mortar-board"></i> Students<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('students-create')}}"><i class="fa fa-user-plus"></i> Create student</a>
                                    </li>
                                    <li>
                                        <a href="{{route('students')}}"><i class="fa fa-list"></i> Students list</a>
                                    </li> 
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
         
                            <li>
                                <a href="#"><i class="fa fa-book"></i> Courses<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('courses-create')}}"><i class="fa fa-clipboard"></i> Create course</a>
                                    </li>
                                    <li>
                                        <a href="{{route('courses')}}"><i class="fa fa-list"></i> Courses list</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
           
                            <li>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Course & Teacher<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('schedules-create')}}"><i class="fa fa-clipboard"></i> Create course & teacher</a>
                                    </li>
                                    <li>
                                        <a href="{{route('schedules')}}"><i class="fa fa-list"></i> Course & Teacher list</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fa-file-text"></i> Certificates<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('certificates-create')}}"><i class="fa fa-clipboard"></i> Create certificate</a>
                                    </li>
                                    <li>
                                        <a href="{{route('certificates')}}"><i class="fa fa-list"></i> Certificates list</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li> 
                            <li>
                                <a href="#"><i class="fa fa-desktop"></i> Knowledge base<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('baza-create')}}"><i class="fa fa-clipboard"></i> Create post</a>
                                    </li>
                                    <li>
                                        <a href="{{route('baza-lista')}}"><i class="fa fa-list"></i> Base list</a>
                                    </li> 
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li> 
                            
                            <li>
                                <a href="#"><i class="fa fa-newspaper-o"></i> Facts<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{route('facts-create')}}"><i class="fa fa-clipboard"></i> Create post</a>
                                    </li>
                                    <li>
                                        <a href="{{route('facts-lista')}}"><i class="fa fa-list"></i> Facts list</a>
                                    </li> 
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="/templates/admin/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/templates/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/templates/admin/vendor/metisMenu/metisMenu.min.js"></script>
         @yield('plugins-js')
        <!-- Custom Theme JavaScript -->
        <script src="/templates/admin/dist/js/sb-admin-2.js"></script>
        @yield('custom-js')
    </body>

</html>
