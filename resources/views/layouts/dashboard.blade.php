<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('startboot/css/bootstrap.css') }}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{{ asset('startboot/css/sb-admin.css') }}" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="{{ asset('startboot/css/plugins/morris.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->
    {{--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap1.min.css') }}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/sb-admin.css') }}" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="{{ asset('bootstrap/css/morris.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{ asset('bootstrap/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/font-awesome1.min.css') }}" rel="stylesheet">



</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WELCOME TO JIMAI ASSET MANAGEMENT SYSTEM</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::User()->name}} <b class="caret"></b></a>

                <ul class="dropdown-menu">


                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="{{url('/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{url('/materials')}}"><i class="fa fa-fw fa-bar-chart-o"></i> materials</a>
                </li>
                <li>
                    <a href="{{url('/workers')}}"><i class="fa fa-fw fa-table"></i> workers</a>
                </li>
                <li>
                    <a href="{{url('/Assets')}}"><i class="fa fa-fw fa-table"></i>Assets</a>
                </li>
                <li>
                    <a href="{{url('/suppliers')}}"><i class="fa fa-fw fa-table"></i> suppliers</a>
                </li>
            </ul>


        </div>
        <!-- /.navbar-collapse -->
    </nav>

    {{--<div id="page-wrapper">--}}


            <div class="panel panel-default">

                <div class="panel-body" style="min-height: 100%;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('errror'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
           @yield('content')
           @yield('content1')
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    <!-- /#page-wrapper -->

<!-- /#wrapper -->

<!-- jQuery -->
    <script src="{{ asset('startboot/js/jquery.js') }}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('startboot/js/bootstrap.js') }}"></script>


    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('startboot/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('startboot/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('startboot/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
