<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Blockchain Bank System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #7209b7;
            --accent-color: #4cc9f0;
            --dark-bg: #0a0e1a;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated background effect */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.05)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
            pointer-events: none;
        }
        
        /* Header Styles - Matching homepage */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }
        
        .navbar-brand i {
            background: none;
            -webkit-background-clip: unset;
            background-clip: unset;
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        /* Login Form Container */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 20px 60px;
        }
        
        /* Form Box - Enhanced version */
        .form-box {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 480px;
            width: 100%;
            animation: slideUp 0.6s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .form-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.3);
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Header Section */
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .form-header h2 {
            font-size: 2rem;
            font-weight: 800;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .form-header i {
            font-size: 3rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }
        
        /* Form Inputs */
        .input-group-custom {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .input-group-custom i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 1;
        }
        
        .input-group-custom input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            background: white;
        }
        
        .input-group-custom input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }
        
        .input-group-custom input:hover {
            border-color: var(--primary-color);
        }
        
        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-light);
            transition: color 0.3s ease;
            z-index: 2;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        /* Remember Me & Forgot Password */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        
        .checkbox-custom input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-color);
        }
        
        .checkbox-custom span {
            color: var(--text-light);
        }
        
        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Submit Button */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--gradient-1);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        /* Register Link */
        .register-link {
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }
        
        .register-link p {
            color: var(--text-light);
            margin: 0;
        }
        
        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Alert Messages */
        .alert-message {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.3s ease;
        }
        
        .alert-message i {
            font-size: 1.2rem;
        }
        
        .alert-error {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            color: #991b1b;
        }
        
        .alert-success {
            background: #dcfce7;
            border-left: 4px solid #10b981;
            color: #065f46;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Footer - Matching homepage */
        .footer {
            background: #0f172a;
            color: white;
            padding: 40px 0 20px;
            margin-top: auto;
        }
        
        .footer p {
            margin: 0;
            text-align: center;
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-box {
                padding: 2rem 1.5rem;
                margin: 0 1rem;
            }
            
            .form-header h2 {
                font-size: 1.75rem;
            }
            
            .navbar-brand {
                font-size: 1.4rem;
            }
        }
        
        /* Loading state */
        .btn-login.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            right: 20px;
            margin-top: -10px;
            border: 2px solid white;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
        }
        
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

<!-- Header - Matching homepage style -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-link"></i>
            Blockchain Bank
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home"></i> Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/login">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">
                        <i class="fas fa-user-plus"></i> Đăng ký
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Login Form Container -->
<div class="login-container">
    <div class="form-box">
        <div class="form-header">
            <i class="fas fa-lock"></i>
            <h2>Đăng nhập</h2>
            <p>Chào mừng bạn quay trở lại!</p>
        </div>
        
        <!-- Error Alert (Example - can be dynamically shown) -->
        @if(session('error'))
        <div class="alert-message alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
        
        <!-- Success Alert (Example - can be dynamically shown) -->
        @if(session('success'))
        <div class="alert-message alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        
        <form method="POST" action="/login" id="loginForm">
            @csrf
            
            <div class="input-group-custom">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            
            <div class="input-group-custom">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                <i class="fas fa-eye password-toggle" id="togglePassword"></i>
            </div>
            
            <div class="form-options">
                <label class="checkbox-custom">
                    <input type="checkbox" name="remember">
                    <span>Ghi nhớ đăng nhập</span>
                </label>
                <a href="/forgot-password" class="forgot-link">Quên mật khẩu?</a>
            </div>
            
            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>
            
            <div class="register-link">
                <p>Chưa có tài khoản? <a href="/register">Đăng ký ngay</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Footer - Matching homepage -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Blockchain Bank. All rights reserved. | Hệ thống ngân hàng ứng dụng Blockchain an toàn và bảo mật</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Additional JavaScript for form enhancements -->
<script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    
    if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
    
    // Form submission with loading state
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            // Add loading state to button
            loginBtn.classList.add('loading');
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
            
            // Disable button to prevent double submission
            loginBtn.disabled = true;
            
            // Form will submit normally, loading state shows while processing
            // If you want to handle via AJAX, you can prevent default and add your logic here
            
            // Note: If using standard form submission, the page will reload
            // The loading state might not be visible. For better UX, consider using AJAX
        });
    }
    
    // Add floating label effect (optional enhancement)
    const inputs = document.querySelectorAll('.input-group-custom input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.querySelector('i').style.color = '#4361ee';
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.querySelector('i').style.color = '#64748b';
            }
        });
    });
    
    // Pre-fill demo credentials (optional - for testing)
    // Uncomment to add demo credentials for testing
    /*
    const demoEmail = document.querySelector('input[name="email"]');
    const demoPassword = document.querySelector('input[name="password"]');
    if (demoEmail && demoPassword && window.location.hostname === 'localhost') {
        demoEmail.value = 'demo@blockchainbank.com';
        demoPassword.value = 'password123';
    }
    */
</script>

</body>
</html>