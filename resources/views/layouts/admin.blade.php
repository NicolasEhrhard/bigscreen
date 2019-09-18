<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bigscreen</title>
    <link rel="icon" href="{{asset('bigscreenico.ico')}}"/>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/chart-plugin.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('/css/argon.css?v=1.0.0')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ url('/') }}">
            <img class="navbar-brand-img" alt="..." src="{{asset('bigscreen_logo_blue.png')}}">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{asset('stevejobs.jpg')}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ url('/') }}">
                            <img src="{{asset('bigscreen_logo_blue.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main"
                                aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?=Str::contains(url()->current(), 'administration/accueil') ? 'active' : ''?>"
                       href="{{url('administration/accueil')}}">
                        <i class="fa fa-cube text-primary"></i>Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Str::contains(url()->current(), 'administration/questionnaires') ? 'active' : ''?>"
                       href="{{url('administration/questionnaires')}}">
                        <i class="fa fa-asterisk text-primary"></i>Questionnaires
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Str::contains(url()->current(), 'administration/reponses') ? 'active' : ''?>"
                       href="{{url('administration/reponses')}}">
                        <i class="fa fa-table text-primary"></i>Réponses
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>

<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            @If (Str::contains(url()->current(), 'administration/accueil'))
                <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block">Accueil</a>
            @endif
            @If (Str::contains(url()->current(), 'administration/questionnaires'))
                <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block">Questionnaires</a>
            @endif
            @If (Str::contains(url()->current(), 'administration/reponses'))
                <a class="h4 mb-0 text-uppercase d-none d-lg-inline-block">Réponses</a>
            @endif
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset('stevejobs.jpg')}}">
                        </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
</div>

<script src="{{ asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
