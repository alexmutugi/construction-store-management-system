<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{--<link href="{{ asset('datatable/buttonsdataTables.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('datatable/jquery.dataTables.min.css') }}" rel="stylesheet">

    <script type="text/javascript" charset="utf8" src="{{ asset('datatable/jquery.min.js') }}"></script>

    {{--<script type="text/javascript" charset="utf8" src="{{ asset('datatable/dataTables.buttons.min.js') }}"></script>--}}
    <script type="text/javascript" charset="utf8" src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>




    {{--<link href="{{ asset('datatables/dataTables.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('datatables/dataTables.min.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('datatables/bootstrap36.min.css') }}" rel="stylesheet">--}}
    @yield('style')

    <style>
        body{
            background-color: blanchedalmond;
        }
        .authcont {
            border-radius: 1em;
            padding: 1em;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }
        .navbar{
            background-color: #bebebe;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="cont">
    @yield('content')
</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

    {{--<script src="{{ asset('datatables/dataTables.min.js') }}"></script>--}}
    {{--<script src="{{ asset('datatables/dataTables.js') }}"></script>--}}
    {{--<script src="{{ asset('datatables/jquery-3.3.1.min.js') }}"></script>--}}

</body>
</html>
