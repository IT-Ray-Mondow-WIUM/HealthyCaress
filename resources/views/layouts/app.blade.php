<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthy Clinic | @yield('title')</title>
    <link rel="icon" href="{{ asset('images/images1.jpg') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    @vite(['resources/js/app.js'])
    <style>
        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #003973, #E5E5BE);
            color: white;
            padding-top: 75px;
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar.hide {
            left: -250px;
        }

        .sidebar a,
        .dropdown-toggle {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .active {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        /* Content Styling */
        .content {
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        .content.full {
            margin-left: 0;
        }

        /* Navbar Styling */
        .navbar {
            transition: all 0.3s ease-in-out;
        }

        /* Sidebar Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.show {
                left: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

</head>

<body class="bg-light">

    <!-- Sidebar -->
    <div class="sidebar bg-info border-light" id="sidebar">
        <a href="{{ route('home') }}" class="@if(Request::is('home')) active @endif">Dashboard</a>
        <a href="{{ route('profile') }}" class="@if(Request::is('profile')) active @endif">Profile</a>

        <h6 class="border-bottom pb-1 ps-3 pt-3 fw-bolder">Main Menu</h6>
        <a href="{{ route('registration') }}" class="@if(Request::is('registration')) active @endif">Registration</a>

        <!-- Medical Services with Submenus -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#medical-services">
                Medical Services
            </a>
            <div class="collapse ps-3" id="medical-services">
                <a href="#">Outpatient</a>
                <a href="#">Inpatient</a>
            </div>
        </div>

        <a href="#">Payment</a>
        <a href="#">Pharmacy</a>

        <h6 class="border-bottom pb-1 ps-3 pt-3 fw-bolder">Main Data</h6>
        <a href="#">Patient</a>
        <a href="#">Practitioner</a>

        <!-- Logout -->
        <div class="mt-3 px-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <button class="btn btn-outline-light" id="sidebarToggle">☰ Menu</button>
            <a class="navbar-brand mx-auto fw-bold" href="#">Healthy Clinic</a>
        </div>
    </nav>

    <!-- Overlay untuk Mobile -->
    <div id="overlay" class="position-fixed w-100 h-100 bg-dark opacity-50 d-none" style="z-index: 999;"></div>

    <!-- Konten -->
    <div class="content mt-5 p-3" id="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS & Sidebar Script -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            let sidebar = document.getElementById("sidebar");
            let content = document.getElementById("content");
            let overlay = document.getElementById("overlay");

            if (window.innerWidth < 768) {
                sidebar.classList.toggle("show");
                overlay.classList.toggle("d-none");
            } else {
                sidebar.classList.toggle("hide");
                content.classList.toggle("full");
            }
        });

        // Tutup sidebar jika overlay diklik
        document.getElementById("overlay").addEventListener("click", function() {
            document.getElementById("sidebar").classList.remove("show");
            document.getElementById("overlay").classList.add("d-none");
        });
    </script>

</body>

</html>