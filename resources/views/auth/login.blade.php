<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Healthy Clinic | Login</title>
    <link rel="icon" href="{{ asset('images/images1.jpg') }}" type="image/x-icon">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #b5cdba, #79b686);
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-logo img {
            max-width: 220px;
            margin-bottom: -45px;
            margin-top: -45px;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-label {
            display: block;
            text-align: left;
            font-weight: 600;
            color: #218838;
        }

        .form-check-label {
            text-align: left;
            width: 100%;
            display: block;
        }

        .btn-custom {
            border-radius: 10px;
            width: 100%;
        }

        footer {
            font-size: 12px;
            color: gray;
            margin-top: 15px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="login-logo">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo">
        </div>

        <!-- Form Login -->
        <h4 class="text-center text-light mb-4 bg-success p-2"><i class="bi bi-person-fill-down"></i></h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                {{-- <label for="email" class="text-success mb-2 form-label">Email Address</label> --}}

                <div class="d-flex">
                    <label for="email" class="input-group-text me-1"><i class="bi bi-envelope"></i></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Type here" required>
                </div>
                @error('email')
                <span class="invalid-feedback">
                    <strong>email salah</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                {{-- <label for="password" class="text-success mb-2 form-label">Password</label> --}}
                <div class="d-flex">
                    <label for="password" class="input-group-text me-1"><i class="bi bi-key-fill"></i></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Type here" required>
                </div>
                @error('password')
                <span class="invalid-feedback">
                    <strong>Password Salah</strong>
                </span>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    <small>Remember Me</small>
                </label>
            </div>
            <div class="d-flex">
                <a href="/" class="btn btn-danger btn-custom m-1">Cancel</a>
                <button type="submit" class="btn btn-success btn-custom m-1">Login</button>
            </div>
        </form>

        <footer>CreatedBy: @__raymondowsagala__</footer>
    </div>

</body>

</html>