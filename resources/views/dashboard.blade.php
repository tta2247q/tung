<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockchain Bank | Hệ thống ngân hàng ứng dụng Blockchain</title>
    
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
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }
        
        /* Header Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0 0 50px 50px;
            padding: 100px 0 120px;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
        }
        
        .hero h2 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero p {
            font-size: 1.2rem;
            opacity: 0.95;
            animation: fadeInUp 0.8s ease 0.2s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }
        
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
        
        /* Features Section */
        .features {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .feature-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-1);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-card:hover::before {
            transform: scaleX(1);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .feature-card p {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 60px 0;
            margin: 40px 0;
            border-radius: 30px;
        }
        
        .stat-item {
            text-align: center;
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        /* CTA Section */
        .cta-section {
            background: var(--gradient-1);
            border-radius: 30px;
            padding: 60px 40px;
            margin: 40px 0;
            text-align: center;
        }
        
        .cta-section h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-section p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 2rem;
        }
        
        .btn-custom {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin: 0 10px;
        }
        
        .btn-primary-custom {
            background: white;
            color: var(--primary-color);
            border: none;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: var(--primary-dark);
        }
        
        .btn-outline-custom {
            background: transparent;
            border: 2px solid white;
            color: white;
        }
        
        .btn-outline-custom:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 60px 0 20px;
            margin-top: 60px;
        }
        
        .footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 40px;
            padding-top: 20px;
            text-align: center;
            color: #64748b;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero {
                padding: 60px 0 80px;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .feature-card {
                margin-bottom: 1.5rem;
            }
            
            .cta-section {
                padding: 40px 20px;
            }
            
            .cta-section h3 {
                font-size: 1.5rem;
            }
            
            .stat-number {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<!-- Header / Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
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
                    <a class="nav-link" href="/register">
                        <i class="fas fa-user-plus"></i> Đăng ký
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero text-white">
    <div class="container text-center position-relative">
        <h2>Hệ thống ngân hàng ứng dụng Blockchain</h2>
        <p class="lead">Lưu trữ giao dịch an toàn, minh bạch và không thể chỉnh sửa.</p>
        <div class="mt-4">
            <a href="/register" class="btn btn-light btn-lg me-3">
                <i class="fas fa-rocket"></i> Bắt đầu ngay
            </a>
            <a href="/login" class="btn btn-outline-light btn-lg">
                <i class="fas fa-lock"></i> Đăng nhập
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<div class="container features">
    <h2 class="section-title">
        <i class="fas fa-crown"></i> Tính năng nổi bật
    </h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Bảo mật cao</h3>
                <p>Dữ liệu giao dịch được lưu trữ trên Blockchain với mã hóa tiên tiến, đảm bảo an toàn tuyệt đối cho tài sản của bạn.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Minh bạch</h3>
                <p>Mọi giao dịch đều có thể kiểm tra và xác thực một cách công khai, mang lại sự tin tưởng tuyệt đối cho người dùng.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Phi tập trung</h3>
                <p>Không thể sửa đổi dữ liệu đã ghi, hệ thống hoạt động độc lập không phụ thuộc vào bất kỳ tổ chức trung gian nào.</p>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="container">
    <div class="stats-section">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="stat-item">
                    <div class="stat-number">
                        <i class="fas fa-chart-simple"></i> 10K+
                    </div>
                    <div class="stat-label">Giao dịch mỗi ngày</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="stat-item">
                    <div class="stat-number">
                        <i class="fas fa-users"></i> 50K+
                    </div>
                    <div class="stat-label">Người dùng tin cậy</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="stat-item">
                    <div class="stat-number">
                        <i class="fas fa-clock"></i> 99.9%
                    </div>
                    <div class="stat-label">Thời gian hoạt động</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number">
                        <i class="fas fa-star"></i> 4.9/5
                    </div>
                    <div class="stat-label">Đánh giá từ khách hàng</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="container">
    <div class="cta-section text-white">
        <h3>Sẵn sàng trải nghiệm tương lai của ngân hàng?</h3>
        <p>Tham gia cùng hàng ngàn người dùng đã tin tưởng sử dụng Blockchain Bank</p>
        <div>
            <a href="/register" class="btn btn-primary-custom btn-custom">
                <i class="fas fa-user-plus"></i> Đăng ký ngay
            </a>
            <a href="/login" class="btn btn-outline-custom btn-custom">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>
                    <i class="fas fa-link"></i> Blockchain Bank
                </h5>
                <p class="text-secondary">Hệ thống ngân hàng ứng dụng công nghệ Blockchain hàng đầu, mang đến giải pháp tài chính an toàn và minh bạch cho tương lai.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Liên kết</h5>
                <ul class="list-unstyled">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/login">Đăng nhập</a></li>
                    <li><a href="/register">Đăng ký</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Công nghệ</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Blockchain</a></li>
                    <li><a href="#">Smart Contract</a></li>
                    <li><a href="#">Mã hóa AES-256</a></li>
                    <li><a href="#">Xác thực 2 lớp</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Liên hệ</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-envelope"></i> <a href="mailto:support@blockchainbank.com">support@blockchainbank.com</a></li>
                    <li><i class="fas fa-phone"></i> <a href="tel:19001234">1900 1234</a></li>
                    <li><i class="fas fa-map-marker-alt"></i> Tòa nhà Blockchain, Hà Nội</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Blockchain Bank. All rights reserved. | Bảo mật thông tin tuyệt đối với công nghệ Blockchain</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Add smooth scrolling -->
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Add animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.feature-card, .stat-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
</script>

</body>
</html>