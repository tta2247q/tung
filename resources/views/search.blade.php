<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm giao dịch | Blockchain Bank System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Chart.js for statistics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #7209b7;
            --accent-color: #4cc9f0;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
            --dark-bg: #0a0e1a;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
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
            position: sticky;
            top: 0;
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
        
        /* Main Container */
        .search-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Search Hero Section */
        .search-hero {
            background: var(--gradient-1);
            border-radius: 30px;
            padding: 3rem;
            margin-bottom: 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .search-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: moveBackground 20s linear infinite;
        }
        
        @keyframes moveBackground {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(50px, 50px);
            }
        }
        
        .search-hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .search-hero p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }
        
        /* Search Box */
        .search-box {
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .search-input-group {
            background: white;
            border-radius: 60px;
            padding: 0.5rem;
            display: flex;
            gap: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .search-input-group input {
            flex: 1;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            border-radius: 60px;
            outline: none;
            font-family: 'Inter', sans-serif;
        }
        
        .search-input-group button {
            background: var(--gradient-1);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 60px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .search-input-group button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .filter-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: flex-end;
        }
        
        .filter-item {
            flex: 1;
            min-width: 150px;
        }
        
        .filter-item label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .filter-item select,
        .filter-item input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: white;
        }
        
        .filter-item select:focus,
        .filter-item input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .reset-filter {
            background: #f1f5f9;
            color: var(--text-light);
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .reset-filter:hover {
            background: #e2e8f0;
            color: var(--text-dark);
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Chart Section */
        .chart-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .chart-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        /* Transactions Table */
        .transactions-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .section-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }
        
        .result-count {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .transaction-table th {
            text-align: left;
            padding: 1rem;
            background: #f8fafc;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .transaction-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-light);
        }
        
        .transaction-table tr:hover {
            background: #f8fafc;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-success {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef9c3;
            color: #854d0e;
        }
        
        .status-failed {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .transaction-hash {
            font-family: monospace;
            font-size: 0.85rem;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .view-details {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .view-details:hover {
            text-decoration: underline;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .page-item {
            list-style: none;
        }
        
        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: white;
            border: 1px solid var(--border-color);
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .page-link:hover,
        .page-item.active .page-link {
            background: var(--gradient-1);
            color: white;
            border-color: transparent;
        }
        
        /* No Results */
        .no-results {
            text-align: center;
            padding: 3rem;
            color: var(--text-light);
        }
        
        .no-results i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 40px 0 20px;
            margin-top: 3rem;
        }
        
        .footer p {
            margin: 0;
            text-align: center;
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .search-hero {
                padding: 2rem 1.5rem;
            }
            
            .search-hero h1 {
                font-size: 1.8rem;
            }
            
            .search-input-group {
                flex-direction: column;
                border-radius: 20px;
            }
            
            .search-input-group input {
                border-radius: 20px;
            }
            
            .search-input-group button {
                border-radius: 20px;
                justify-content: center;
            }
            
            .filter-group {
                flex-direction: column;
            }
            
            .filter-item {
                width: 100%;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .transaction-table th,
            .transaction-table td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
        }
        
        /* Loading Animation */
        .loading-spinner {
            text-align: center;
            padding: 2rem;
        }
        
        .loading-spinner i {
            font-size: 2rem;
            color: var(--primary-color);
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

<!-- Header -->
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
                    <a class="nav-link active" href="/search">
                        <i class="fas fa-search"></i> Tra cứu
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

<!-- Main Content -->
<div class="search-container">
    <!-- Search Hero -->
    <div class="search-hero">
        <h1>
            <i class="fas fa-search"></i> Tra cứu giao dịch Blockchain
        </h1>
        <p>Tra cứu thông tin giao dịch trên hệ thống Blockchain Bank một cách minh bạch và nhanh chóng</p>
        
        <div class="search-box">
            <div class="search-input-group">
                <input type="text" id="searchInput" placeholder="Nhập mã giao dịch (Transaction Hash), địa chỉ ví hoặc email..." autocomplete="off">
                <button id="searchBtn">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </div>
    </div>
    
    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-title">
            <i class="fas fa-filter"></i> Bộ lọc nâng cao
        </div>
        <div class="filter-group">
            <div class="filter-item">
                <label>Loại giao dịch</label>
                <select id="transactionType">
                    <option value="all">Tất cả</option>
                    <option value="transfer">Chuyển tiền</option>
                    <option value="deposit">Nạp tiền</option>
                    <option value="withdraw">Rút tiền</option>
                    <option value="contract">Smart Contract</option>
                </select>
            </div>
            <div class="filter-item">
                <label>Trạng thái</label>
                <select id="statusFilter">
                    <option value="all">Tất cả</option>
                    <option value="success">Thành công</option>
                    <option value="pending">Đang xử lý</option>
                    <option value="failed">Thất bại</option>
                </select>
            </div>
            <div class="filter-item">
                <label>Từ ngày</label>
                <input type="date" id="startDate">
            </div>
            <div class="filter-item">
                <label>Đến ngày</label>
                <input type="date" id="endDate">
            </div>
            <div class="filter-item">
                <button class="reset-filter" id="resetFilter">
                    <i class="fas fa-undo-alt"></i> Đặt lại
                </button>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-value" id="totalTransactions">0</div>
            <div class="stat-label">Tổng số giao dịch</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value" id="successCount">0</div>
            <div class="stat-label">Giao dịch thành công</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value" id="pendingCount">0</div>
            <div class="stat-label">Đang xử lý</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-value" id="totalVolume">0</div>
            <div class="stat-label">Tổng giá trị (USD)</div>
        </div>
    </div>
    
    <!-- Chart Section -->
    <div class="chart-section">
        <div class="chart-title">
            <i class="fas fa-chart-bar"></i>
            Thống kê giao dịch theo ngày
        </div>
        <div class="chart-container">
            <canvas id="transactionChart"></canvas>
        </div>
    </div>
    
    <!-- Transactions Table -->
    <div class="transactions-section">
        <div class="section-header">
            <h3>
                <i class="fas fa-list"></i> Danh sách giao dịch
            </h3>
            <div class="result-count" id="resultCount">
                Hiển thị 0 kết quả
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Mã giao dịch</th>
                        <th>Loại</th>
                        <th>Số tiền</th>
                        <th>Người gửi</th>
                        <th>Người nhận</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody id="transactionsTableBody">
                    <!-- Transactions will be loaded here -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="pagination" id="pagination">
            <!-- Pagination will be loaded here -->
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Blockchain Bank. All rights reserved. | Dữ liệu được lưu trữ trên Blockchain, minh bạch và không thể chỉnh sửa</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Search Page JavaScript -->
<script>
    // Mock data for demonstration
    let allTransactions = [
        { hash: '0x7f9e8d3c2b1a5e6d8f9a7b5c3d2e1f4a5b6c7d8e', type: 'transfer', amount: 1250.50, from: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', to: '0x89205A3A3b2A69De6Dbf7f01ED13B2108B2c43e', time: '2024-01-15 10:30:00', status: 'success', description: 'Chuyển tiền đến ví khách hàng' },
        { hash: '0x8a9b7c6d5e4f3a2b1c0d9e8f7a6b5c4d3e2f1a0b', type: 'deposit', amount: 5000.00, from: 'Nguyễn Văn A', to: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', time: '2024-01-15 09:15:00', status: 'success', description: 'Nạp tiền vào ví' },
        { hash: '0x1a2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b', type: 'withdraw', amount: 350.75, from: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', to: 'Trần Thị B', time: '2024-01-14 16:45:00', status: 'pending', description: 'Rút tiền về tài khoản ngân hàng' },
        { hash: '0x9c8b7a6d5e4f3g2h1i0j9k8l7m6n5o4p3q2r1s0t', type: 'transfer', amount: 2100.00, from: '0x89205A3A3b2A69De6Dbf7f01ED13B2108B2c43e', to: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', time: '2024-01-14 11:20:00', status: 'success', description: 'Thanh toán hợp đồng' },
        { hash: '0x2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b1c', type: 'contract', amount: 8750.00, from: 'Smart Contract', to: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', time: '2024-01-13 14:30:00', status: 'success', description: 'Thực thi hợp đồng thông minh' },
        { hash: '0x3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b1c2d', type: 'transfer', amount: 525.25, from: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', to: '0xaBc123dEf456Gh789Ij012Kl345Mn678Op901', time: '2024-01-13 09:00:00', status: 'failed', description: 'Chuyển tiền thất bại' },
        { hash: '0x4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b1c2d3e', type: 'deposit', amount: 15000.00, from: 'Lê Văn C', to: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', time: '2024-01-12 20:15:00', status: 'success', description: 'Nạp tiền từ tài khoản ngân hàng' },
        { hash: '0x5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b1c2d3e4f', type: 'transfer', amount: 880.00, from: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e', to: '0x9b8c7d6e5f4a3b2c1d0e9f8a7b6c5d4e3f2a1b0c', time: '2024-01-12 13:45:00', status: 'success', description: 'Chuyển tiền thanh toán' }
    ];
    
    let currentPage = 1;
    let itemsPerPage = 5;
    let filteredTransactions = [...allTransactions];
    let chart = null;
    
    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        updateStats();
        renderTable();
        renderPagination();
        initChart();
        
        // Event listeners
        document.getElementById('searchBtn').addEventListener('click', performSearch);
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') performSearch();
        });
        document.getElementById('resetFilter').addEventListener('click', resetFilters);
        document.getElementById('transactionType').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('startDate').addEventListener('change', applyFilters);
        document.getElementById('endDate').addEventListener('change', applyFilters);
    });
    
    function performSearch() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        
        if (searchTerm === '') {
            filteredTransactions = [...allTransactions];
        } else {
            filteredTransactions = allTransactions.filter(tx => 
                tx.hash.toLowerCase().includes(searchTerm) ||
                tx.from.toLowerCase().includes(searchTerm) ||
                tx.to.toLowerCase().includes(searchTerm) ||
                (tx.description && tx.description.toLowerCase().includes(searchTerm))
            );
        }
        
        applyFilters();
    }
    
    function applyFilters() {
        let filtered = [...filteredTransactions];
        
        const type = document.getElementById('transactionType').value;
        const status = document.getElementById('statusFilter').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        
        if (type !== 'all') {
            filtered = filtered.filter(tx => tx.type === type);
        }
        
        if (status !== 'all') {
            filtered = filtered.filter(tx => tx.status === status);
        }
        
        if (startDate) {
            filtered = filtered.filter(tx => tx.time.split(' ')[0] >= startDate);
        }
        
        if (endDate) {
            filtered = filtered.filter(tx => tx.time.split(' ')[0] <= endDate);
        }
        
        filteredTransactions = filtered;
        currentPage = 1;
        updateStats();
        renderTable();
        renderPagination();
        updateChart();
    }
    
    function resetFilters() {
        document.getElementById('transactionType').value = 'all';
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        document.getElementById('searchInput').value = '';
        filteredTransactions = [...allTransactions];
        currentPage = 1;
        updateStats();
        renderTable();
        renderPagination();
        updateChart();
    }
    
    function updateStats() {
        const total = filteredTransactions.length;
        const success = filteredTransactions.filter(tx => tx.status === 'success').length;
        const pending = filteredTransactions.filter(tx => tx.status === 'pending').length;
        const totalVolume = filteredTransactions.reduce((sum, tx) => sum + tx.amount, 0);
        
        document.getElementById('totalTransactions').textContent = total;
        document.getElementById('successCount').textContent = success;
        document.getElementById('pendingCount').textContent = pending;
        document.getElementById('totalVolume').textContent = totalVolume.toLocaleString('vi-VN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        document.getElementById('resultCount').textContent = `Hiển thị ${Math.min(itemsPerPage, filteredTransactions.length)} / ${total} kết quả`;
    }
    
    function renderTable() {
        const tbody = document.getElementById('transactionsTableBody');
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageTransactions = filteredTransactions.slice(start, end);
        
        if (pageTransactions.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="no-results">
                        <i class="fas fa-inbox"></i>
                        <p>Không tìm thấy giao dịch nào</p>
                    </td>
                </tr>
            `;
            return;
        }
        
        tbody.innerHTML = pageTransactions.map(tx => {
            const typeIcon = {
                transfer: '<i class="fas fa-exchange-alt"></i>',
                deposit: '<i class="fas fa-arrow-down"></i>',
                withdraw: '<i class="fas fa-arrow-up"></i>',
                contract: '<i class="fas fa-file-contract"></i>'
            }[tx.type] || '<i class="fas fa-circle"></i>';
            
            const typeName = {
                transfer: 'Chuyển tiền',
                deposit: 'Nạp tiền',
                withdraw: 'Rút tiền',
                contract: 'Smart Contract'
            }[tx.type] || tx.type;
            
            const statusClass = {
                success: 'status-success',
                pending: 'status-pending',
                failed: 'status-failed'
            }[tx.status] || '';
            
            const statusName = {
                success: 'Thành công',
                pending: 'Đang xử lý',
                failed: 'Thất bại'
            }[tx.status] || tx.status;
            
            return `
                <tr>
                    <td class="transaction-hash" title="${tx.hash}">${tx.hash.substring(0, 16)}...</td>
                    <td>${typeIcon} ${typeName}</td>
                    <td><strong>${tx.amount.toLocaleString('vi-VN')} USD</strong></td>
                    <td class="transaction-hash" title="${tx.from}">${tx.from.substring(0, 12)}...</td>
                    <td class="transaction-hash" title="${tx.to}">${tx.to.substring(0, 12)}...</td>
                    <td>${tx.time}</td>
                    <td><span class="status-badge ${statusClass}">${statusName}</span></td>
                    <td><a href="#" class="view-details" onclick="viewDetails('${tx.hash}'); return false;">Xem chi tiết</a></td>
                </tr>
            `;
        }).join('');
    }
    
    function renderPagination() {
        const totalPages = Math.ceil(filteredTransactions.length / itemsPerPage);
        const paginationDiv = document.getElementById('pagination');
        
        if (totalPages <= 1) {
            paginationDiv.innerHTML = '';
            return;
        }
        
        let html = '';
        
        // Previous button
        html += `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a href="#" class="page-link" onclick="changePage(${currentPage - 1}); return false;">&laquo;</a>
            </li>
        `;
        
        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
                html += `
                    <li class="page-item ${currentPage === i ? 'active' : ''}">
                        <a href="#" class="page-link" onclick="changePage(${i}); return false;">${i}</a>
                    </li>
                `;
            } else if (i === currentPage - 3 || i === currentPage + 3) {
                html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
            }
        }
        
        // Next button
        html += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a href="#" class="page-link" onclick="changePage(${currentPage + 1}); return false;">&raquo;</a>
            </li>
        `;
        
        paginationDiv.innerHTML = html;
    }
    
    function changePage(page) {
        const totalPages = Math.ceil(filteredTransactions.length / itemsPerPage);
        if (page >= 1 && page <= totalPages) {
            currentPage = page;
            renderTable();
            renderPagination();
        }
    }
    
    function initChart() {
        const ctx = document.getElementById('transactionChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Số lượng giao dịch',
                    data: [],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
        updateChart();
    }
    
    function updateChart() {
        const dailyCounts = {};
        filteredTransactions.forEach(tx => {
            const date = tx.time.split(' ')[0];
            dailyCounts[date] = (dailyCounts[date] || 0) + 1;
        });
        
        const sortedDates = Object.keys(dailyCounts).sort();
        const counts = sortedDates.map(date => dailyCounts[date]);
        
        chart.data.labels = sortedDates;
        chart.data.datasets[0].data = counts;
        chart.update();
    }
    
    function viewDetails(hash) {
        alert(`Chi tiết giao dịch:\nMã giao dịch: ${hash}\nĐây là thông tin chi tiết từ Blockchain.`);
    }
</script>

</body>
</html>