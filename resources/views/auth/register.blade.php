<x-laravel-ui-adminlte::adminlte-layout>
    <style>
        /* Body Styling */
        body.hold-transition.register-page {
            background-color: #f0f8ff; /* Light blue background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Roboto', sans-serif; /* Clean modern font */
        }

        /* Card Styling */
        .register-box {
            width: 400px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease;
        }

        /* Logo Styling */
        .register-logo a {
            font-size: 2.7rem;
            font-weight: 700; /* Stronger font weight */
            font-family: 'Playfair Display', serif; /* Stylish font */
            background: -webkit-linear-gradient(45deg, #4a90e2, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; /* Gradient text */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3), 
                         0 0 15px rgba(74, 144, 226, 0.6); /* Glow effect */
            letter-spacing: 1.5px;
            text-decoration: none;
        }

        /* Typography */
        .login-box-msg {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Input Fields Styling */
        .form-control {
            border-radius: 25px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Input Group Text */
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 25px;
            color: #007bff; /* Blue icons */
            font-size: 1.2rem;
        }

        /* Button Styling */
        .btn-primary {
            background: linear-gradient(45deg, #4a90e2, #007bff);
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #007bff, #4a90e2);
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(74, 144, 226, 0.8);
        }

        /* Checkbox and Links */
        .icheck-primary input[type="checkbox"] + label {
            font-size: 14px;
            color: #555;
        }

        .icheck-primary a {
            color: #007bff;
            text-decoration: none;
        }

        .icheck-primary a:hover {
            text-decoration: underline;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .text-center a:hover {
            color: #0056b3;
        }

        /* Fade In Animation */
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

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form method="post" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Retype password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>

                        <!-- Agreement & Submit -->
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>

                    <!-- Already Registered -->
                    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                </div>
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
