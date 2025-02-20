<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healthy Clinic</title>
    <link rel="icon" href="{{ asset('images/images1.jpg') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Hero Section */
        .hero {
            background: url('https://wallpaperaccess.com/full/3750058.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 150px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(46, 204, 113, 0.7);
            /* Overlay hijau transparan */
        }

        .hero-content {
            position: relative;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out forwards;
        }

        /* Animasi Fade In */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi Tombol */
        .btn-animated {
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-animated:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
        }

        .active {
            background-color: black;
            border-radius: 7px;
        }

        /* Pastikan semua gambar dalam layanan memiliki ukuran yang sama */
        .image-container {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 10px;
        }

        .service-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Healthy Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light btn-sm ms-2" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <h1 class="display-4 fw-bold" data-aos="fade-up">Welcome to Healthy Clinic</h1>
            <p class="lead" data-aos="fade-up" data-aos-delay="300">Your trusted partner for better health</p>
            <a href="#about" class="btn btn-light text-success btn-animated mt-3" data-aos="fade-up"
                data-aos-delay="500">Learn More</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6" data-aos="fade-right">
                <img src="https://images.thequint.com/thequint/2024-02/649f6ef2-70c9-456b-af16-21f7c975a123/iStock_1227367005.jpg"
                    class="img-fluid rounded shadow" alt="Doctor">
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h2>About Us</h2>
                <p>Healthy Clinic is committed to providing the best healthcare services. Our team of professional
                    doctors is here to help you stay healthy.</p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-light py-5">
        <div class="container text-center py-4" style="border-top: solid #000 1px; border-bottom: solid #000 1px;">
            <h2 class="mb-4" data-aos="fade-up">Our Services</h2>
            <div class="row">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="container p-3 shadow" style="height: 425px">
                        <h5>General Checkup</h5>
                        <div class="px-2 mb-4 image-container">
                            <img src="https://www.cubaheal.com/wp-content/uploads/2019/09/comprehensive-medical-check-up.jpg"
                                alt="General Checkup" class="img-fluid service-img">
                        </div>
                        <p>Regular health checkups to ensure your well-being.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card p-3 shadow" style="height: 425px">
                        <h5>Specialist Consultation</h5>
                        <div class="card px-2 mb-4 image-container">
                            <img src="https://truckinghq.com/wp-content/uploads/2023/03/AdobeStock_520966924-1-scaled-e1679680013201.jpeg"
                                alt="Specialist Consultation" class="img-fluid service-img">
                        </div>
                        <p>Meet our experienced specialists for expert advice.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card p-3 shadow" style="height: 425px">
                        <h5>Emergency Care</h5>
                        <div class="card px-2 mb-4 image-container">
                            <img src="https://santiamhospital.org/wp-content/uploads/2019/09/Emergency-Room.jpg"
                                alt="Emergency Care" class="img-fluid service-img">
                        </div>
                        <p>24/7 emergency services for immediate medical attention.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container my-5 text-center">
        <h2 data-aos="fade-up">Contact Us</h2>
        <p data-aos="fade-up" data-aos-delay="200">Have any questions? Feel free to reach out.</p>
        <a href="mailto:info@healthyclinic.com" class="btn btn-success btn-animated" data-aos="fade-up"
            data-aos-delay="400">Email Us</a>
    </section>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3">
        <p>© 2025 Healthy Clinic. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap & AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

</body>

</html>