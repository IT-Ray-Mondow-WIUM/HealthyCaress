<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthy Clinic | @yield('title')</title>
    <link rel="icon" href="{{ asset('images/images1.jpg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        /* Sidebar Default Terbuka */
        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #212529;
            color: white;
            padding-top: 75px;
            transition: all 0.3s;
        }

        /* Jika sidebar ditutup */
        .sidebar.hide {
            left: -250px;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #495057;
            border-radius: 15px;
        }

        /* Content harus bergeser jika sidebar terbuka */
        .content {
            margin-left: 200px;
            transition: margin-left 0.3s;
        }

        .content.full {
            margin-left: 0;
        }

        .active {
            background-color: #040411;
            margin: 0 3px 0 3px;
            border-radius: 15px;
        }

        /* ===== MEDIA QUERY: Untuk tampilan mobile ===== */
        @media (max-width: 430px) {
            .sidebar {
                left: -200px;
                /* Sidebar tertutup default di mobile */
            }

            .content {
                margin-left: 0;
                /* Konten tetap full width di mobile */
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="sidebar bg-info border border-light" id="sidebar">
        <a href="{{ route('home') }}" class="@if(Request::is('home')) active @endif">Dashboard</a>
        <a href="{{ route('profile') }}" class="@if(Request::is('profile')) active @endif">Profile</a>
        <a href="#">Patient</a>
        <a href="#">Practitioner</a>
        <a href="#">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        </a>
    </div>

    <!-- Navbar -->
    <nav class="navbar bg-primary fixed-top">
        <div class="container-fluid">
            <button class="btn btn-outline-light" id="sidebarToggle">☰ Menu</button>
            <a class="navbar-brand mx-2" href="#">My App</a>
        </div>
    </nav>

    <!-- Konten -->
    <div class="content mt-5 p-3" id="content">
        @yield('content')
    </div>

    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            let sidebar = document.getElementById("sidebar");
            let content = document.getElementById("content");

            if (window.innerWidth < 430) {  
                // Jika layar kecil (mobile), hanya toggle sidebar tanpa menggeser konten
                sidebar.classList.toggle("show"); 
            } else {
                // Jika layar besar (desktop), sidebar tetap bisa ditutup dan konten bergeser
                sidebar.classList.toggle("hide");
                content.classList.toggle("full");
            }
        });
    </script>
</body>

</html>