<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #E6F0FA;
            font-family: 'Arial', sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Background shapes */
        .background-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .shape-1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: #2C3E50;
            transform: skewY(-10deg);
            transform-origin: top left;
        }

        .shape-2 {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 70%;
            background: #E67E22;
            transform: skewY(-10deg);
            transform-origin: bottom right;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .login-card h2 {
            color: #2C3E50;
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .avatar {
            width: 60px;
            height: 60px;
            background: #E6E6E6;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            color: #2C3E50;
        }

        .form-group {
            position: relative;
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 40px 10px 35px;
            border: 1px solid #E6E6E6;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2C3E50;
        }

        .form-group input::placeholder {
            color: #999;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #999;
            font-size: 16px;
        }

        .form-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
            cursor: pointer;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 15px;
        }

        .forgot-password a {
            color: #2C3E50;
            font-size: 12px;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .sign-in-btn {
            width: 100%;
            padding: 12px;
            background: #E67E22;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sign-in-btn:hover {
            background: #D35400;
        }

        .footer-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .social-links {
            display: flex;
            gap: 10px;
        }

        .social-links a {
            color: #2C3E50;
            font-size: 14px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #E67E22;
        }

        .signup-link a {
            color: #E67E22;
            font-size: 12px;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Background Shapes -->
    <div class="background-shapes">
        <div class="shape-1"></div>
        <div class="shape-2"></div>
    </div>

    <!-- Login Card -->
    <div class="login-card">
        <h2>My Account</h2>
        <div class="avatar">
            <i class="fas fa-user"></i>
        </div>
        <form action="/webbanhang/account/checklogin" method="post">
            <!-- Username -->
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Login" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>

            <!-- Forgot Password -->
            <div class="forgot-password">
                <a href="#!">Forgot password?</a>
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="sign-in-btn">Sign in</button>

            <!-- Social Media Links and Sign Up Link -->
            <div class="footer-links">
                <div class="social-links">
                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!"><i class="fab fa-twitter"></i></a>
                    <a href="#!"><i class="fab fa-google"></i></a>
                </div>
                <div class="signup-link">
                    <a href="/webbanhang/account/register">SIGN UP</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>