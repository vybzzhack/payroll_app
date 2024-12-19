<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

        <style>
            /* General Styling */
            body.hold-transition.login-page {
                background-color: #f5f7fa; /* Light background */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: 'Poppins', sans-serif;
            }

            /* Login Box Styling */
            .login-box {
                background-color: #fff;
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
                animation: fadeIn 0.8s ease-in-out;
            }

            /* Logo Styling */
            .login-logo a {
                font-size: 2.5rem; /* Slightly larger for emphasis */
                color: #4a90e2; /* Updated blue shade */
                font-weight: 700; /* Stronger font weight for boldness */
                font-family: 'Playfair Display', serif; /* A fancy serif font */
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3), /* Larger drop shadow */
                            0 0 15px rgba(74, 144, 226, 0.6); /* Glow effect in matching color */
                text-decoration: none;
                letter-spacing: 1px; /* Slight letter spacing for elegance */
                background: -webkit-linear-gradient(45deg, #4a90e2, #00d4ff);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; /* Gradient text */
            }

            /* Input Field Styling */
            .form-control {
                border-radius: 25px;
                border: 1px solid #ccc;
                padding: 10px 15px;
                box-shadow: none;
                transition: all 0.3s ease;
                font-size: 1rem;
            }

            .form-control:focus {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            /* Password Toggle Button */
            .input-group-text {
                background-color: transparent;
                border: none;
                cursor: pointer;
                color: #007bff;
            }

            /* Button Styling */
            .btn-primary {
                background-color: #007bff;
                border: none;
                border-radius: 25px;
                padding: 10px 20px;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }

            /* Link Styling */
            .login-card-body a {
                color: #007bff;
                text-decoration: none;
                font-weight: 600;
                transition: color 0.3s ease;
            }

            .login-card-body a:hover {
                color: #0056b3;
                text-decoration: underline;
            }

            /* Real-Time Validation Styling */
            .error-message {
                color: #d9534f;
                font-size: 0.875rem;
                margin-top: 5px;
            }

            /* Animation */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
        <script>
            // Password Visibility Toggle
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.getElementById('togglePassword');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            }

            // Real-time Email Validation
            function validateEmail(input) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const errorMessage = document.getElementById('emailError');
                if (!emailRegex.test(input.value)) {
                    errorMessage.textContent = 'Invalid email format';
                } else {
                    errorMessage.textContent = '';
                }
            }
        </script>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form method="post" action="{{ url('/login') }}">
                        @csrf
                        <!-- Email Input -->
                        <div class="input-group mb-3">
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                                oninput="validateEmail(this)">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <div id="emailError" class="error-message"></div>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text" onclick="togglePassword()">
                                    <span id="togglePassword" class="fas fa-eye"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me & Submit Button -->
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>

                    <!-- Links -->
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">
                            <i class="fas fa-key"></i> Forgot my password
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> Register a new membership
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
