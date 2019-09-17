<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}"></a></li>
                        @elseif( Auth::user()->role == 'Administrator' || Auth::user()->role == 'EC Manager')
                        <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users')}}">Users</a> </li>
                        <li class="{{ Request::is('faculties*') ? 'active' : '' }}"><a href="{{ route('faculties')}}">Faculties</a> </li>

                        <li class="{{ Request::is('eccoordinators*') ? 'active' : '' }}"><a href="{{ route('eccoordinators')}}">EC Coordinators </a> </li>

                        <li class="{{ Request::is('assessments*') ? 'active' : '' }}"><a href="{{ route('assessments')}}">Assessments </a> </li>
                        <li class="{{ Request::is('claimReports') ? 'active' : '' }}"><a href="{{ route('claimReports')}}">Claim Reports</a> </li>

                        @elseif( Auth::user()->role == 'EC Coordinator' )

                        <li class="{{ Request::is('userfaculty') ? 'active' : '' }}"><a href="{{ route('userFaculty')}}">Department List</a> </li>

                        <li class="{{ Request::is('claimFeedback*') ? 'active' : '' }}"><a href="{{ route('claimFeedback')}}">EC Claims Feedback</a> </li>



                        @elseif( Auth::user()->role == 'Student' )

                        <li class="{{ Request::is('subjects') ? 'active' : '' }}"><a href="{{ route('userSubjectList')}}"> Subject List </a> </li>

                        <li class="{{ Request::is('ecclaims') ? 'active' : '' }}"><a href="{{ route('ecclaims')}}">EC Claims</a> </li>
                        <li class="{{ Request::is('claimReports') ? 'active' : '' }}"><a href="{{ route('claimReports')}}">Claim Reports</a> </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
<!--
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                            @else
                            @if( Auth::user()->role == 'EC Coordinator' )

                            <li class=""><a href="{{ route('claimFeedback')}}"><i class="glyphicon glyphicon-envelope" style="font-size: 17px"></i> 

                                <span class="badge" style="margin-top: -20px; @if( $ecclaims>0)background-color: red @else background-color: green @endif"> 

                                    {{ $ecclaims}}
                                </span></a></li>
                                 @elseif( Auth::user()->role == 'Student' )

                            <li class=""><a href="{{ route('claimReports')}}"><i class="glyphicon glyphicon-envelope" style="font-size: 17px"></i> 

                                <span class="badge" style="margin-top: -20px; @if( $ecclaims>0)background-color: red @else background-color: green @endif"> 

                                    {{ $ecclaims}}
                                </span></a></li>

                                @endif
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
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @yield('content')
        </div>


    </body>
    </html>
