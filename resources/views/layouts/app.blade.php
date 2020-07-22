<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav_item">
                            <a href="/home" class="nav-link">Home</a>
                        </li>
                        <li class="nav_item">
                            <a href="/resume" class="nav-link">Résumé</a>
                        </li>
                        <li class="nav_item">
                            <a href="/aboutme" class="nav-link">About Me</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Projects
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="/projects">Project List</a>
                                <a class="dropdown-item" href="/stockpredictor" >Stock Predictor</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('inc.messages')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <div class="container d-flex justify-content-between">
            <div>
                <p>&copy; Steve Fanega II 2020 </p>
            </div>
            <div class="d-flex footer">
                <a target="_blank" href="mailto:steve.fanega.ii@gmail.com">
                    <img src="{{ asset('/storage/logo_images/GmailLogo.png') }}" alt="Gmail Link">
                </a>
                <a target="_blank" href="//www.github.com/sgfanega">
                    <img src="{{ asset('/storage/logo_images/GithubLogo.png') }}" alt="Github Link">
                </a>
                <a target="_blank" href="//www.linkedin.com/in/steve-fanega-ii/">
                    <img src="{{ asset('/storage/logo_images/LinkedInLogo.png') }}" alt="LinkedIn Link">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
