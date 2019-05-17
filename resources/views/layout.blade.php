<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RolePlayingGame') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    RolePlayingGame
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/dashboard/index') }}">Dashboard <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/monster/index')}}">Monsters</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/hero/index')}}">Heroes<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/public/public.js') }}"></script>
<script src="{{ asset('js/public/jquery-3.2.1.min.js') }}"></script>
@yield('scripts')

</body>
</html>
