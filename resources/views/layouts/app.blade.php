<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'にいがたサウナビ')}} </title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f19bc1ee0.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
      <!-- Loading -->
      <div id="is-loading">
        <div id="loading">
            <img src="{{ asset('img/Spinner-3.gif') }}" alt="loadingImg" />
        </div>
    </div>
      <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
                    <span class="alert alert-primary text-center js-flash" role="alert">
                        {{ session('flash_message')}}
                    </span>
        @endif
 
        @include('layouts.header')
        @yield('hero')
        @yield('content')
        @include('layouts.footer')

</body>
</html>