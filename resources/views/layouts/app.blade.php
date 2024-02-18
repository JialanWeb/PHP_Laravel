<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','myProject')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('_partials.nav')

       <!-- @auth | if(Auth::user()) 
               @include('_partials.user')
            @endauth  | endif -->
        @includeWhen(Auth::user(), '_partials.user')

        <main class="py-4">
            @if(Session::get('msg_success'))
            <div class="container">
                <div class="alert alert-success">
                    {!! Session::get('msg_success') !!}
                </div>
            </div>
            @endif

            @if( $errors->any() )
                <div class="container">
                    <div class="alert alert-danger">
                        Bitte überprüfe deine Eingaben
                        <ul>
                        @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
