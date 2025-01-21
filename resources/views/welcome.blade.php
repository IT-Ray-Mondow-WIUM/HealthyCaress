<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .navbar {
            background-color: #3498db;
            /* Warna utama navigasi */
        }

        .navbar-nav .nav-link {
            color: #fff;
            /* Warna teks navigasi */
        }

        .navbar-nav .nav-link:hover {
            background-color: #2980b9;
            /* Warna hover */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid d-flex justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="m-3 p-5 bg-primary text-white text-center" style="height: 300px">
        <h1>My First Bootstrap 5 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <div class="m-3 p-5 bg-primary text-white text-center" style="height: 300px">
        <h1>My First Bootstrap 5 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>
</body>

</html>