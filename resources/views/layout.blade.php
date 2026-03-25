<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Blockchain Diploma - Secure Certificate Management</title>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #062a32 0%, #0c4a4f 50%, #105f57 100%);
            color: #e7f8f7;
            min-height: 100vh;
            margin: 0;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 1rem 2.5rem;
            min-height: calc(100vh - 140px);
        }

        .content-card {
            background: rgba(16, 51, 59, 0.94);
            border-radius: 1.25rem;
            box-shadow: 0 20px 42px rgba(0, 0, 0, 0.35);
            overflow: hidden;
            animation: fadeInUp 0.45s ease-out;
            border: 1px solid rgba(73, 161, 151, 0.35);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .navbar-custom {
            background: linear-gradient(130deg, #0c3f3a 0%, #197362 45%, #29a67f 100%);
            padding: 0.2rem 0;
            max-height: 80px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(5px);
        }

        .navbar-brand {
            color: #f1fff8 !important;
            font-weight: 700;
            letter-spacing: 0.02em;
            font-size: 1.15rem;
            text-shadow: 0 1px 5px rgba(8, 44, 41, 0.55);
        }

        .nav-link {
            color: rgba(233, 255, 250, 0.95) !important;
            font-weight: 600;
            padding: 0.75rem 0.9rem;
            border-radius: 0.4rem;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: #062f2c !important;
            background-color: rgba(240, 255, 242, 0.24);
            transform: translateY(-1px);
        }

        .navbar .btn-outline-light,
        .navbar .btn-light {
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 999px;
            padding: 0.4rem 0.9rem;
            box-shadow: 0 6px 14px rgba(0,0,0,0.32);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .navbar .btn-outline-light:hover,
        .navbar .btn-light:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.42);
        }

        .navbar .btn-outline-light {
            border-color: rgba(255,255,255,0.6);
            color: rgba(255,255,255,0.95);
            background: rgba(15, 41, 38, 0.28);
        }

        .navbar .btn-outline-light:hover {
            background: rgba(255,255,255,0.22);
        }

        .footer {
            text-align: center;
            padding: 0.8rem 0;
            color: rgba(237, 255, 250, 0.95);
            background: rgba(7, 27, 27, 0.6);
            border-top: 1px solid rgba(148, 237, 225, 0.35);
            font-size: 0.88rem;
            position: relative;
            z-index: 2;
        }

        .btn-primary, .btn-success, .btn-info, .btn-warning, .btn-danger {
            border: none;
            box-shadow: 0 8px 20px rgba(20, 127, 112, 0.35);
        }

        .btn-primary {
            background-color: #24b088;
            border-color: #1f9681;
            color: #fcfff9;
        }

        .btn-primary:hover {
            background-color: #1e976f;
        }

        .btn:hover {
            transform: translateY(-1px);
            transition: transform 0.2s ease;
        }

        .form-control {
            background: rgba(15, 35, 37, 0.9);
            color: #eefefb;
            border: 1px solid rgba(104, 190, 169, 0.6);
        }

        .form-control:focus {
            border-color: #76e5c6;
            box-shadow: 0 0 0 0.15rem rgba(91, 212, 183, 0.35);
            background: rgba(18, 50, 53, 0.95);
            color: #f7fffd;
        }

        .card {
            border-radius: 1.15rem;
            border: 1px solid rgba(101, 200, 176, 0.35);
            background: rgba(14, 48, 53, 0.88);
        }

        .card-header {
            background: rgba(20, 58, 62, 0.8);
            border-bottom: 1px solid rgba(119, 225, 196, 0.35);
            color: #e7f8f7;
        }

        .form-label {
            color: #d2fff8;
        }

        .min-vh-100 {
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0.8rem 1.6rem;
            }

            .navbar-brand { font-size: 1.2rem; }

            .content-card { box-shadow: 0 10px 26px rgba(0, 0, 0, 0.30); }
        }
    </style>
    @stack('styles')

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-2">
        <div class="main-container d-flex align-items-center justify-content-between">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="fas fa-graduation-cap me-2"></i>
                <span>Blockchain Diplomas</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item me-lg-2">
                        <a class="nav-link px-3" href="/"><i class="fas fa-tachometer-alt me-1"></i>Dashboard</a>
                    </li>
                    <li class="nav-item me-lg-2">
                        <a class="nav-link px-3" href="/add"><i class="fas fa-plus-circle me-1"></i>Add Diploma</a>
                    </li>
                    <li class="nav-item me-lg-2">
                        <a class="nav-link px-3" href="/blockchain"><i class="fas fa-link me-1"></i>Blockchain</a>
                    </li>
                    <li class="nav-item me-lg-2">
                        <a class="nav-link px-3" href="/search"><i class="fas fa-search me-1"></i>Search</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="/login" class="btn btn-outline-light btn-sm px-3">Login</a>
                    <a href="/register" class="btn btn-light btn-sm px-3">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="content-card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="p-4">
                @yield('content')
            </div>
        </div>

        
    </div>

    <footer class="footer">
        <div class="main-container d-flex justify-content-between flex-wrap">
            <div>
                <strong>Blockchain Diploma</strong> - Quản lý và xác minh văn bằng an toàn.
            </div>
            <div>
                <a href="/" class="text-white me-3">Home</a>
                <a href="/add" class="text-white me-3">Add Diploma</a>
                <a href="/blockchain" class="text-white me-3">Blockchain</a>
                <a href="/search" class="text-white">Search</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('scripts')

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut("slow", function() {
                    $(this).alert('close');
                });
            }, 5000);
        });
    </script>

</body>

</html>