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
            width: 225px;
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
            left: -225px;
        }

        .sidebar a {
            color: rgb(14, 2, 3);
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #233342;
            border-radius: 15px;
            color: whitesmoke;
        }

        /* Content harus bergeser jika sidebar terbuka */
        .content {
            margin-left: 225px;
            transition: margin-left 0.3s;
        }

        .content.full {
            margin-left: 0;
        }

        .active {
            background-color: #39718b;
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
    <div class="sidebar bg-info border border-light text-dark" id="sidebar">
        <a href="{{ route('home') }}" class="@if(Request::is('home')) active @endif">Dashboard</a>
        <a href="{{ route('profile') }}" class="@if(Request::is('profile')) active @endif">Profile</a>

        <h6 class="border-dark border-bottom pb-1 ps-2 pt-3 fw-bolder">Main Menu</h6>
        <a href="#">Registration</a>

        <!-- Medical Services with Submenus -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#medical-services">Medical
                Services</a>
            <div class="collapse" id="medical-services">
                <a href="#" class="ps-4"><small>Outpatient</small></a> <!-- Rawat Jalan -->
                <a href="#" class="ps-4"><small>Inpatient</small></a> <!-- Rawat Inap -->
            </div>
        </div>

        <a href="#">Payment</a>
        <a href="#">Pharmacy</a>

        <h6 class="border-dark border-bottom pb-1 ps-2 pt-3 fw-bolder">Main Data</h6>
        <a href="#">Patient</a>
        <a href="#">Practitioner</a>

        <!-- Logout button should not be inside <a> -->
        <div class="mt-3 px-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger w-100">Logout</button>
            </form>
        </div>
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