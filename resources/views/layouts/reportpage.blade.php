<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('dt/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/search.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/buttonsdataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dt/dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/datepicker.css') }}" rel="stylesheet">



    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">


    <style>
        .breadcrumb a{
            text-transform: uppercase;
        }
        .top-nav a{
            color: white;
        }
        .nav-sidebar a{
            color: white;
        }
        .top-nav a:hover{
            background-color: #9fcdff;;
            color: blue;
        }
        .nav-sidebar a:hover{
            background-color: #9fcdff;;
            color: blue;
        }
    </style>


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #1b1e21;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">JIMAI ASSET MANAGEMENT SYSTEM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
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
            <form class="navbar-form navbar-left">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>
@if(Auth::User()->id <=2)
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" style="background-color: #1f648b;">
                <ul class="nav nav-sidebar text-uppercase">
                    <li>
                        <a href="{{url('/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('/materials')}}"><i class="fa fa-fw fa-book"></i> materials</a>
                    </li>
                    <li>
                        <a href="{{url('/tools')}}"><i class="fa fa-fw fa-wrench"></i>Tools</a>
                    </li>
                    <li>
                        <a href="{{url('/workers')}}"><i class="fa fa-fw fa-users"></i> workers</a>
                    </li>

                    <li>
                        <a href="{{url('/suppliers')}}"><i class="fa fa-fw fa-table"></i> suppliers</a>
                    </li>
                    <li>
                        <a href="{{url('/report')}}"><i class="fa fa-fw fa-print"></i> report</a>
                    </li>
                </ul>

            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('oops'))
                    <div class="alert alert-danger">
                        {{ session('oops') }}
                    </div>
                @elseif (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif


                @yield('content')
                @yield('content1')
            </div>
        </div>
    </div>
@else
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" style="background-color: cornflowerblue;">
                <ul class="nav nav-sidebar text-uppercase">
                    <li>
                        <a href="{{url('keeper/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('keeper/workers')}}"><i class="fa fa-fw fa-users"></i> workers</a>
                    </li>
                    <li>
                        <a href="{{url('keeper/tools')}}"><i class="fa fa-fw fa-wrench"></i>Tools</a>
                    </li>
                    <li>
                        <a href="{{url('keeper/materials')}}"><i class="fa fa-fw fa-book"></i> materials</a>
                    </li>

                    <li>
                        <a href="{{url('keeper/suppliers')}}"><i class="fa fa-fw fa-table"></i> suppliers</a>
                    </li>
                    <li>
                        <a href="{{url('keeper/report')}}"><i class="fa fa-fw fa-print"></i> report</a>
                    </li>
                </ul>

            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('oops'))
                    <div class="alert alert-danger">
                        {{ session('oops') }}
                    </div>
                @elseif (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif

                @yield('content')
                @yield('content1')
            </div>
        </div>
    </div>
@endif

<!-- Bootstrap core JavaScript
    ================================================== -->

{{--<script type="text/javascript" charset="utf8" src="{{ asset('/datatable/dataTables.min.js') }}"></script>--}}
<script type="text/javascript" charset="utf8" src="{{ asset('dt/jquery.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/bootstrap.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/search.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('dt/dataTables.min.js') }}"></script>

<!-- jQuery -->
<!-- Bootstrap Core JavaScript -->

<script language="javascript">
    function PrintMe(DivID) {
        var disp_setting="toolbar=yes,location=no,";
        disp_setting+="directories=yes,menubar=yes,";
        disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
        var content_vlue = document.getElementById(DivID).innerHTML;
        var docprint=window.open("","",disp_setting);
        docprint.document.open();
        docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
        docprint.document.write('<head><title>Material Supplied</title>');
        docprint.document.write('<style type="text/css">body{ margin:10px; ');
        docprint.document.write('a{color:#000;text-decoration:none;}');
        docprint.document.write('a{color:#000;text-decoration:none;} </style>');
        docprint.document.write('</head><body onLoad="self.print()"><center>');
        docprint.document.write(content_vlue);
        docprint.document.write('</center></body></html>');
        docprint.document.close();
        docprint.focus();
    }
</script>

@yield('script')
<!-- FOR DataTable -->
<script>
    {
        $(document).ready(function()
        {
            $('#MyTable').DataTable();
        });
    }


</body>
</html>
