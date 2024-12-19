<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PayChex</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            body {
                background-color: #e3f2fd; /* Light blue background */
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }

            /* Logo and Welcome Card Container */
            .container {
                display: flex;
                justify-content: center;  /* Center horizontally */
                align-items: center;      /* Center vertically */
                flex-direction: column;   /* Stack vertically */
                height: 100%;             /* Ensure full screen height */
                text-align: center;
            }

            /* Logo Container */
            .logo-container {
                width: 200px;
                height: 200px;
                background-color: #ffffff; /* White background for circle */
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                margin-top: 30px;
            }

            .logo {
                width: 80px;
                height: 80px;
                object-fit: cover;
                max-width: 100%;
                max-height: 100%;
                border-radius: 50%;
            }

            /* Card Styling */
            .welcome-card {
                width: 100%;
                max-width: 800px;
                border: none;
                border-radius: 10px;
                background-color: #ffffff;
                box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
                text-align: center;
                padding: 30px 20px;
                margin-bottom: 50px;
            }

            .welcome-card i {
                font-size: 50px;
                color: #1976d2; /* Blue icon color */
                margin-bottom: 15px;
            }

            .welcome-card h1 {
                font-size: 24px;
                font-weight: bold;
                color: #0d47a1; /* Dark blue text */
                margin-bottom: 15px;
            }

            .welcome-card p {
                font-size: 16px;
                color: #6c757d; /* Muted text */
                margin-bottom: 30px;
            }

            .btn-primary {
                background-color: #1976d2;
                border-color: #1976d2;
            }

            .btn-primary:hover {
                background-color: #0d47a1;
                border-color: #0d47a1;
            }

            /* Features Section */
            .features-section {
                display: flex;
                justify-content: space-around;
                margin-bottom: 50px;
                margin-top: 50px;
                flex-wrap: wrap;
            }

            .feature-card {
                width: 30%;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
                text-align: center;
                padding: 20px;
                margin-bottom: 30px;
                opacity: 0;
                transform: translateY(-30px);
                transition: opacity 0.5s ease, transform 0.5s ease, box-shadow 0.3s ease, scale 0.3s ease;
            }

            .feature-card.show {
                opacity: 1;
                transform: translateY(-10px);
            }

            .feature-card:hover {
                transform: translateY(-15px) scale(1.05); /* Moves up and slightly enlarges */
                box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.25); /* Larger and softer shadow */
                z-index: 10; /* Ensures the hovered card visually comes forward */
            }


            .feature-card i {
                font-size: 40px;
                color: #1976d2;
                margin-bottom: 20px;
            }

            .feature-card h3 {
                font-size: 20px;
                font-weight: bold;
                color: #0d47a1;
                margin-bottom: 15px;
            }

            .feature-card p {
                font-size: 16px;
                color: #6c757d;
            }

            /* Footer Section */
            footer {
                background-color: #0d47a1;
                color: white;
                text-align: center;
                padding: 20px 0;
                margin-top: 50px;
            }

            footer a {
                color: #ffffff;
                text-decoration: none;
            }

            footer a:hover {
                text-decoration: underline;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .welcome-card {
                    width: 90%;
                }
                .feature-card {
                    width: 80%;
                    margin: 10px auto;
                }
            }
        </style>

        <script>
            // Function to reveal feature cards when they come into view
            window.addEventListener('scroll', function () {
                const featureCards = document.querySelectorAll('.feature-card');
                featureCards.forEach(function (card) {
                    const cardPosition = card.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    if (cardPosition < windowHeight - 100) {
                        card.classList.add('show');
                    }
                });
            });
        </script>

    </head>
    <body>

        <div class="container">
            <!-- Logo Section -->
            <div class="logo-container">
                <img src="https://www.shutterstock.com/image-vector/payroll-logo-letter-p-r-260nw-2246056743.jpg" alt="Logo" class="logo">
            </div>

            <!-- Welcome Card Section -->
            <div class="welcome-card">
                <i class="fas fa-briefcase"></i>
                <h1>Welcome to PayChex HR & Payroll</h1>
                <p>Streamline your payments, automate employee management, and improve accuracy with ease.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mb-3">Login</a>
                <p class="text-muted">
                    Not registered? 
                    <a href="{{ route('register') }}" class="text-primary">Register here</a>.
                </p>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Secure and Efficient</h3>
                <p>Our platform ensures top-level security while optimizing payroll management for speed and accuracy.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-headset"></i>
                <h3>24/7 Technical Support</h3>
                <p>Access reliable customer support anytime, anywhere to resolve any issues you might encounter.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3>Data-Backed Insights</h3>
                <p>Make informed decisions with data-driven insights to track performance and growth within your organization.</p>
            </div>
        </div>

        <!-- Footer Section -->
        <footer>
            <p>&copy; 2024 PayChex. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </footer>

    </body>
</html>
