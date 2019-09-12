<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bigscreen</title>
    <link rel="icon" href="{{asset('bigscreenico.ico')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>

<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width: 220px;" src="{{asset('bigscreen_logo.png')}}">
                </a>
            </div>
        </div>
    </nav>

    <main class="container" style="margin-bottom: 10px;margin-top: 10px;">
        @yield('content')
    </main>

</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
