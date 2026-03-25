<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký | Blockchain Bank System</title>
    
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
            --success-color: #10b981;
            --error-color: #ef4444;
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
        
        .nav-link.active {
            color: var(--primary-color);
        }
        
        .nav-link.active::after {
            width: 80%;
        }
        
        /* Register Container */
        .register-container {
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
            max-width: 520px;
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
            margin-bottom: 1.25rem;
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
        
        .input-group-custom input.error {
            border-color: var(--error-color);
        }
        
        .input-group-custom .error-message {
            position: absolute;
            bottom: -20px;
            left: 16px;
            font-size: 0.75rem;
            color: var(--error-color);
            display: none;
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
        
        /* Strength Meter */
        .strength-meter {
            margin-top: 8px;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-text {
            font-size: 0.7rem;
            margin-top: 4px;
            color: var(--text-light);
        }
        
        /* Terms and Conditions */
        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 1.5rem 0;
            cursor: pointer;
        }
        
        .terms-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-top: 2px;
            cursor: pointer;
            accent-color: var(--primary-color);
        }
        
        .terms-checkbox label {
            color: var(--text-light);
            font-size: 0.85rem;
            cursor: pointer;
            line-height: 1.4;
        }
        
        .terms-checkbox a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .terms-checkbox a:hover {
            text-decoration: underline;
        }
        
        /* Submit Button */
        .btn-register {
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
        
        .btn-register::before {
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
        
        .btn-register:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        /* Login Link */
        .login-link {
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }
        
        .login-link p {
            color: var(--text-light);
            margin: 0;
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
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
        .btn-register.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .btn-register.loading::after {
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
        
        /* Password match indicator */
        .password-match {
            font-size: 0.7rem;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .password-match i {
            font-size: 0.7rem;
        }
        
        .match-success {
            color: var(--success-color);
        }
        
        .match-error {
            color: var(--error-color);
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
                    <a class="nav-link" href="/login">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/register">
                        <i class="fas fa-user-plus"></i> Đăng ký
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Register Form Container -->
<div class="register-container">
    <div class="form-box">
        <div class="form-header">
            <i class="fas fa-user-plus"></i>
            <h2>Tạo tài khoản mới</h2>
            <p>Đăng ký để trải nghiệm hệ thống ngân hàng Blockchain</p>
        </div>
        
        <!-- Error Alert -->
        @if(session('error'))
        <div class="alert-message alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
        
        <!-- Success Alert -->
        @if(session('success'))
        <div class="alert-message alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        
        <form method="POST" action="/register" id="registerForm">
            @csrf
            
            <div class="input-group-custom">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Họ và tên" value="{{ old('name') }}" required>
                <div class="error-message" id="nameError"></div>
            </div>
            
            <div class="input-group-custom">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                <div class="error-message" id="emailError"></div>
            </div>
            
            <div class="input-group-custom">
                <i class="fas fa-phone"></i>
                <input type="tel" name="phone" id="phone" placeholder="Số điện thoại (tùy chọn)" value="{{ old('phone') }}">
                <div class="error-message" id="phoneError"></div>
            </div>
            
            <div class="input-group-custom">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                <div class="strength-meter">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
                <div class="strength-text" id="strengthText"></div>
                <div class="error-message" id="passwordError"></div>
            </div>
            
            <div class="input-group-custom">
                <i class="fas fa-check-circle"></i>
                <input type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Xác nhận mật khẩu" required>
                <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
                <div class="password-match" id="passwordMatch"></div>
                <div class="error-message" id="confirmError"></div>
            </div>
            
            <div class="terms-checkbox">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">
                    Tôi đồng ý với <a href="/terms" target="_blank">Điều khoản dịch vụ</a> và 
                    <a href="/privacy" target="_blank">Chính sách bảo mật</a>
                </label>
            </div>
            
            <button type="submit" class="btn-register" id="registerBtn">
                <i class="fas fa-user-plus"></i> Đăng ký ngay
            </button>
            
            <div class="login-link">
                <p>Đã có tài khoản? <a href="/login">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Footer - Matching homepage -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Blockchain Bank. All rights reserved. | Bảo mật và an toàn với công nghệ Blockchain</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Additional JavaScript for form enhancements -->
<script>
    // Password visibility toggle
    const togglePassword = document.querySelector('#togglePassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const password = document.querySelector('#password');
    const confirmPassword = document.querySelector('#passwordConfirmation');
    
    if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
    
    if (toggleConfirmPassword && confirmPassword) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
    
    // Password strength meter
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    
    function checkPasswordStrength(pwd) {
        let strength = 0;
        let message = '';
        let color = '';
        
        if (pwd.length === 0) {
            strengthBar.style.width = '0%';
            strengthText.textContent = '';
            return;
        }
        
        // Length check
        if (pwd.length >= 8) strength++;
        if (pwd.length >= 12) strength++;
        
        // Complexity checks
        if (/[a-z]/.test(pwd)) strength++;
        if (/[A-Z]/.test(pwd)) strength++;
        if (/[0-9]/.test(pwd)) strength++;
        if (/[^a-zA-Z0-9]/.test(pwd)) strength++;
        
        // Determine strength level
        if (strength <= 2) {
            message = 'Yếu';
            color = '#ef4444';
            strengthBar.style.width = '25%';
        } else if (strength <= 4) {
            message = 'Trung bình';
            color = '#f59e0b';
            strengthBar.style.width = '50%';
        } else if (strength <= 6) {
            message = 'Mạnh';
            color = '#10b981';
            strengthBar.style.width = '75%';
        } else {
            message = 'Rất mạnh';
            color = '#10b981';
            strengthBar.style.width = '100%';
        }
        
        strengthBar.style.background = color;
        strengthText.textContent = `Độ mạnh: ${message}`;
        strengthText.style.color = color;
    }
    
    if (password) {
        password.addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });
    }
    
    // Password match check
    const passwordMatch = document.getElementById('passwordMatch');
    
    function checkPasswordMatch() {
        if (confirmPassword && password) {
            if (confirmPassword.value.length > 0) {
                if (password.value === confirmPassword.value) {
                    passwordMatch.innerHTML = '<i class="fas fa-check-circle"></i> Mật khẩu khớp';
                    passwordMatch.className = 'password-match match-success';
                    confirmPassword.style.borderColor = '#10b981';
                } else {
                    passwordMatch.innerHTML = '<i class="fas fa-times-circle"></i> Mật khẩu không khớp';
                    passwordMatch.className = 'password-match match-error';
                    confirmPassword.style.borderColor = '#ef4444';
                }
            } else {
                passwordMatch.innerHTML = '';
                confirmPassword.style.borderColor = '#e2e8f0';
            }
        }
    }
    
    if (confirmPassword) {
        confirmPassword.addEventListener('input', checkPasswordMatch);
    }
    
    // Real-time email validation
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            if (this.value.length > 0 && !emailRegex.test(this.value)) {
                this.style.borderColor = '#ef4444';
                const emailError = document.getElementById('emailError');
                if (emailError) {
                    emailError.textContent = 'Email không hợp lệ';
                    emailError.style.display = 'block';
                }
            } else {
                this.style.borderColor = '#e2e8f0';
                const emailError = document.getElementById('emailError');
                if (emailError) {
                    emailError.style.display = 'none';
                }
            }
        });
    }
    
    // Form validation and submission
    const registerForm = document.getElementById('registerForm');
    const registerBtn = document.getElementById('registerBtn');
    const termsCheckbox = document.getElementById('terms');
    
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validate name
            const name = document.getElementById('name');
            if (name && name.value.trim().length < 2) {
                e.preventDefault();
                isValid = false;
                name.style.borderColor = '#ef4444';
                const nameError = document.getElementById('nameError');
                if (nameError) {
                    nameError.textContent = 'Họ tên phải có ít nhất 2 ký tự';
                    nameError.style.display = 'block';
                }
            }
            
            // Validate email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            if (email && !emailRegex.test(email.value)) {
                e.preventDefault();
                isValid = false;
                email.style.borderColor = '#ef4444';
                const emailError = document.getElementById('emailError');
                if (emailError) {
                    emailError.textContent = 'Email không hợp lệ';
                    emailError.style.display = 'block';
                }
            }
            
            // Validate password
            if (password && password.value.length < 8) {
                e.preventDefault();
                isValid = false;
                password.style.borderColor = '#ef4444';
                const passwordError = document.getElementById('passwordError');
                if (passwordError) {
                    passwordError.textContent = 'Mật khẩu phải có ít nhất 8 ký tự';
                    passwordError.style.display = 'block';
                }
            }
            
            // Validate password confirmation
            if (confirmPassword && password && password.value !== confirmPassword.value) {
                e.preventDefault();
                isValid = false;
                confirmPassword.style.borderColor = '#ef4444';
                const confirmError = document.getElementById('confirmError');
                if (confirmError) {
                    confirmError.textContent = 'Mật khẩu xác nhận không khớp';
                    confirmError.style.display = 'block';
                }
            }
            
            // Validate terms
            if (termsCheckbox && !termsCheckbox.checked) {
                e.preventDefault();
                isValid = false;
                termsCheckbox.style.outline = '2px solid #ef4444';
                setTimeout(() => {
                    termsCheckbox.style.outline = '';
                }, 2000);
            }
            
            if (isValid) {
                // Add loading state
                registerBtn.classList.add('loading');
                registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
                registerBtn.disabled = true;
            }
        });
    }
    
    // Clear error on focus
    const inputs = document.querySelectorAll('.input-group-custom input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#e2e8f0';
            const errorDiv = this.parentElement.querySelector('.error-message');
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
        });
    });
    
    // Floating icon effect
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
    
    // Phone number formatting (optional)
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }
</script>

</body>
</html>