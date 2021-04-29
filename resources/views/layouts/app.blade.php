<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- styles include bootstrap -->
        <link href="{{ asset("css/bootstrap.css")}}" rel="stylesheet">
        <link href="{{ asset("css/custom.css")}}   " rel="stylesheet">
        <link href="{{ asset("css/summernote.css")}}   " rel="stylesheet">
        @livewireStyles
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="{{asset("fonts/font.css")}}">
        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">  
    </head>
    <body>
        <div id="app">
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <div class="container">
                    @include('partials.navbar')
                </div>
            </nav>
            <!-- content -->
            <main class="py-4">
                <div class="container">
                    <div class="row text-right">
                        @yield('content')
                    </div>              
                </div>
            </main>
            <!-- footer -->
            <footer class="bg-secondary text-center p-4">
                <a href="https://academy.hsoub.com">
                    <img style="width:100px" src="https://academy.hsoub.com/uploads/monthly_2016_01/SiteLogo-346x108.png.dd3bdd5dfa0e4a7099ebc51f8484032e.png" alt="أكاديمية حسوب">
                </a>
            </footer>
        </div>
        <!-- script include bootstrap -->
        <script src="{{ asset("js/jquery-3.5.1.slim.min.js") }}"></script>
        <script src="{{ asset("js/popper.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.js") }}"></script>
        <script src="{{ asset("js/summernote.js") }}"></script>
        @yield('script')
        @livewireScripts
    </body>
</html>
