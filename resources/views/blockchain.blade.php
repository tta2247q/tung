<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockchain Explorer | Blockchain Bank System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
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
        
        /* Hero Section */
        .explorer-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .explorer-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="2"/><circle cx="50" cy="50" r="30" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></svg>') repeat;
            opacity: 0.3;
        }
        
        .explorer-hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.5rem;
        }
        
        .explorer-hero p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
        }
        
        /* Search Box */
        .search-box {
            max-width: 700px;
            margin: 0 auto;
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
        }
        
        .search-input-group button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Main Container */
        .explorer-container {
            max-width: 1400px;
            margin: -2rem auto 2rem;
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-dark);
            font-family: 'Space Mono', monospace;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 0.85rem;
        }
        
        /* Section Tabs */
        .section-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .tab-btn {
            background: none;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .tab-btn:hover {
            color: var(--primary-color);
        }
        
        .tab-btn.active {
            color: var(--primary-color);
        }
        
        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gradient-1);
        }
        
        /* Blocks Section */
        .blocks-section, .transactions-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
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
            font-weight: 700;
            margin: 0;
        }
        
        .view-all {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        /* Block Cards */
        .blocks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1rem;
        }
        
        .block-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }
        
        .block-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }
        
        .block-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        
        .block-height {
            font-weight: 700;
            color: var(--primary-color);
            font-family: 'Space Mono', monospace;
        }
        
        .block-time {
            font-size: 0.75rem;
            color: var(--text-light);
        }
        
        .block-hash {
            font-family: 'Space Mono', monospace;
            font-size: 0.8rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            word-break: break-all;
        }
        
        .block-details {
            display: flex;
            gap: 1rem;
            font-size: 0.75rem;
            color: var(--text-light);
        }
        
        /* Transaction Table */
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
            font-size: 0.85rem;
        }
        
        .transaction-table tr:hover {
            background: #f8fafc;
            cursor: pointer;
        }
        
        .tx-hash {
            font-family: 'Space Mono', monospace;
            font-size: 0.8rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .status-success {
            background: #dcfce7;
            color: #166534;
        }
        
        /* Latest Transactions Sidebar */
        .sidebar-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .tx-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .tx-item:last-child {
            border-bottom: none;
        }
        
        .tx-info {
            flex: 1;
        }
        
        .tx-id {
            font-family: 'Space Mono', monospace;
            font-size: 0.75rem;
            color: var(--text-dark);
        }
        
        .tx-amount {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .tx-time {
            font-size: 0.7rem;
            color: var(--text-light);
        }
        
        /* Modal */
        .modal-content {
            border-radius: 20px;
            border: none;
        }
        
        .modal-header {
            background: var(--gradient-1);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        
        .detail-row {
            display: flex;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .detail-label {
            width: 140px;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .detail-value {
            flex: 1;
            font-family: 'Space Mono', monospace;
            font-size: 0.85rem;
            word-break: break-all;
            color: var(--text-light);
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
            .explorer-hero h1 {
                font-size: 1.8rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .blocks-grid {
                grid-template-columns: 1fr;
            }
            
            .transaction-table {
                display: block;
                overflow-x: auto;
            }
        }
        
        /* Loading */
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
                    <a class="nav-link active" href="/explorer">
                        <i class="fas fa-cube"></i> Explorer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search">
                        <i class="fas fa-search"></i> Tra cứu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="explorer-hero">
    <div class="container text-center">
        <h1>
            <i class="fas fa-cube"></i> Blockchain Explorer
        </h1>
        <p>Khám phá các khối, giao dịch và dữ liệu trên Blockchain Bank</p>
        
        <div class="search-box">
            <div class="search-input-group">
                <input type="text" id="searchInput" placeholder="Tìm kiếm theo Block Height, Transaction Hash hoặc địa chỉ ví..." autocomplete="off">
                <button id="searchBtn">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="explorer-container">
    <!-- Stats Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-cubes"></i></div>
            <div class="stat-value" id="totalBlocks">1,284</div>
            <div class="stat-label">Tổng số khối</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-exchange-alt"></i></div>
            <div class="stat-value" id="totalTransactions">8,942</div>
            <div class="stat-label">Tổng giao dịch</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-value" id="avgBlockTime">2.5</div>
            <div class="stat-label">Thời gian khối (giây)</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-chart-line"></i></div>
            <div class="stat-value" id="hashRate">125.4</div>
            <div class="stat-label">Hash Rate (TH/s)</div>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-lg-8">
            <!-- Tabs -->
            <div class="section-tabs">
                <button class="tab-btn active" data-tab="blocks">
                    <i class="fas fa-cube"></i> Các khối mới nhất
                </button>
                <button class="tab-btn" data-tab="transactions">
                    <i class="fas fa-list"></i> Giao dịch mới nhất
                </button>
            </div>
            
            <!-- Blocks Section -->
            <div id="blocksSection" class="blocks-section">
                <div class="section-header">
                    <h3><i class="fas fa-cube"></i> Các khối gần đây</h3>
                    <a href="#" class="view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="blocks-grid" id="blocksGrid">
                    <!-- Blocks will be loaded here -->
                </div>
            </div>
            
            <!-- Transactions Section -->
            <div id="transactionsSection" class="transactions-section" style="display: none;">
                <div class="section-header">
                    <h3><i class="fas fa-list"></i> Giao dịch gần đây</h3>
                    <a href="#" class="view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="transaction-table">
                        <thead>
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>Khối</th>
                                <th>Người gửi</th>
                                <th>Người nhận</th>
                                <th>Số tiền</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody id="transactionsTableBody">
                            <!-- Transactions will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Latest Transactions Sidebar -->
            <div class="sidebar-section">
                <div class="sidebar-title">
                    <i class="fas fa-clock"></i> Giao dịch gần đây
                </div>
                <div id="latestTransactions">
                    <!-- Latest transactions will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Details -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Chi tiết</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Dynamic content -->
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Blockchain Bank. All rights reserved. | Dữ liệu được xác thực trên Blockchain, minh bạch và không thể thay đổi</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Explorer JavaScript -->
<script>
    // Mock blockchain data
    let blocks = [];
    let transactions = [];
    
    // Generate mock data
    function generateMockData() {
        const now = new Date();
        
        // Generate blocks
        for (let i = 1; i <= 20; i++) {
            const height = 1284 - i + 1;
            const timestamp = new Date(now.getTime() - (i * 150 * 1000));
            blocks.push({
                height: height,
                hash: generateHash(),
                parentHash: i === 1 ? '0x0000000000000000000000000000000000000000' : generateHash(),
                timestamp: timestamp.toISOString(),
                transactions: Math.floor(Math.random() * 15) + 5,
                miner: generateAddress(),
                size: Math.floor(Math.random() * 2000) + 500,
                difficulty: (height * 1000000).toLocaleString()
            });
        }
        
        // Generate transactions
        for (let i = 1; i <= 50; i++) {
            const timestamp = new Date(now.getTime() - (i * 30 * 1000));
            transactions.push({
                hash: generateHash(),
                blockHeight: blocks[Math.floor(Math.random() * blocks.length)].height,
                from: i % 3 === 0 ? 'Contract' : generateAddress(),
                to: generateAddress(),
                amount: Math.floor(Math.random() * 10000) + 100,
                fee: Math.floor(Math.random() * 50) + 1,
                timestamp: timestamp.toISOString(),
                status: 'success',
                type: ['transfer', 'deposit', 'withdraw', 'contract'][Math.floor(Math.random() * 4)]
            });
        }
        
        // Sort blocks by height descending
        blocks.sort((a, b) => b.height - a.height);
        // Sort transactions by timestamp descending
        transactions.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
    }
    
    function generateHash() {
        const chars = '0123456789abcdef';
        let hash = '0x';
        for (let i = 0; i < 64; i++) {
            hash += chars[Math.floor(Math.random() * chars.length)];
        }
        return hash;
    }
    
    function generateAddress() {
        const chars = '0123456789abcdef';
        let address = '0x';
        for (let i = 0; i < 40; i++) {
            address += chars[Math.floor(Math.random() * chars.length)];
        }
        return address;
    }
    
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const diff = Math.floor((now - date) / 1000);
        
        if (diff < 60) return `${diff} giây trước`;
        if (diff < 3600) return `${Math.floor(diff / 60)} phút trước`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} giờ trước`;
        return date.toLocaleDateString('vi-VN');
    }
    
    function formatNumber(num) {
        return num.toLocaleString('vi-VN');
    }
    
    function renderBlocks() {
        const container = document.getElementById('blocksGrid');
        const recentBlocks = blocks.slice(0, 6);
        
        container.innerHTML = recentBlocks.map(block => `
            <div class="block-card" onclick="showBlockDetail(${block.height})">
                <div class="block-header">
                    <span class="block-height">
                        <i class="fas fa-cube"></i> Khối #${formatNumber(block.height)}
                    </span>
                    <span class="block-time">${formatTime(block.timestamp)}</span>
                </div>
                <div class="block-hash" title="${block.hash}">
                    ${block.hash.substring(0, 20)}...${block.hash.substring(block.hash.length - 12)}
                </div>
                <div class="block-details">
                    <span><i class="fas fa-exchange-alt"></i> ${block.transactions} giao dịch</span>
                    <span><i class="fas fa-hard-drive"></i> ${block.size} KB</span>
                    <span><i class="fas fa-user"></i> ${block.miner.substring(0, 12)}...</span>
                </div>
            </div>
        `).join('');
    }
    
    function renderTransactions() {
        const tbody = document.getElementById('transactionsTableBody');
        const recentTxs = transactions.slice(0, 10);
        
        tbody.innerHTML = recentTxs.map(tx => `
            <tr onclick="showTransactionDetail('${tx.hash}')">
                <td class="tx-hash" title="${tx.hash}">${tx.hash.substring(0, 16)}...${tx.hash.substring(tx.hash.length - 8)}</td>
                <td>#${formatNumber(tx.blockHeight)}</td>
                <td class="tx-hash" title="${tx.from}">${tx.from.substring(0, 12)}...</td>
                <td class="tx-hash" title="${tx.to}">${tx.to.substring(0, 12)}...</td>
                <td><strong>${formatNumber(tx.amount)} USD</strong></td>
                <td>${formatTime(tx.timestamp)}</td>
            </tr>
        `).join('');
    }
    
    function renderLatestTransactions() {
        const container = document.getElementById('latestTransactions');
        const latestTxs = transactions.slice(0, 5);
        
        container.innerHTML = latestTxs.map(tx => `
            <div class="tx-item" onclick="showTransactionDetail('${tx.hash}')" style="cursor: pointer;">
                <div class="tx-info">
                    <div class="tx-id" title="${tx.hash}">${tx.hash.substring(0, 20)}...</div>
                    <div class="tx-time">${formatTime(tx.timestamp)}</div>
                </div>
                <div class="tx-amount">${formatNumber(tx.amount)} USD</div>
            </div>
        `).join('');
    }
    
    function updateStats() {
        document.getElementById('totalBlocks').textContent = formatNumber(blocks.length);
        document.getElementById('totalTransactions').textContent = formatNumber(transactions.length);
        document.getElementById('avgBlockTime').textContent = '2.5';
        document.getElementById('hashRate').textContent = '125.4';
    }
    
    function showBlockDetail(height) {
        const block = blocks.find(b => b.height === height);
        if (!block) return;
        
        const modalBody = document.getElementById('modalBody');
        document.getElementById('modalTitle').innerHTML = `<i class="fas fa-cube"></i> Chi tiết khối #${formatNumber(block.height)}`;
        
        modalBody.innerHTML = `
            <div class="detail-row">
                <div class="detail-label">Block Height:</div>
                <div class="detail-value">${formatNumber(block.height)}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Block Hash:</div>
                <div class="detail-value">${block.hash}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Parent Hash:</div>
                <div class="detail-value">${block.parentHash}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Timestamp:</div>
                <div class="detail-value">${new Date(block.timestamp).toLocaleString('vi-VN')}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Transactions:</div>
                <div class="detail-value">${block.transactions} giao dịch</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Miner:</div>
                <div class="detail-value">${block.miner}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Block Size:</div>
                <div class="detail-value">${block.size} KB</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Difficulty:</div>
                <div class="detail-value">${block.difficulty}</div>
            </div>
        `;
        
        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }
    
    function showTransactionDetail(hash) {
        const tx = transactions.find(t => t.hash === hash);
        if (!tx) return;
        
        const modalBody = document.getElementById('modalBody');
        document.getElementById('modalTitle').innerHTML = `<i class="fas fa-exchange-alt"></i> Chi tiết giao dịch`;
        
        modalBody.innerHTML = `
            <div class="detail-row">
                <div class="detail-label">Transaction Hash:</div>
                <div class="detail-value">${tx.hash}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Block:</div>
                <div class="detail-value">#${formatNumber(tx.blockHeight)}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">From:</div>
                <div class="detail-value">${tx.from}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">To:</div>
                <div class="detail-value">${tx.to}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Amount:</div>
                <div class="detail-value"><strong>${formatNumber(tx.amount)} USD</strong></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Transaction Fee:</div>
                <div class="detail-value">${tx.fee} USD</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Type:</div>
                <div class="detail-value">${tx.type.toUpperCase()}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Status:</div>
                <div class="detail-value"><span class="status-badge status-success">${tx.status.toUpperCase()}</span></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Timestamp:</div>
                <div class="detail-value">${new Date(tx.timestamp).toLocaleString('vi-VN')}</div>
            </div>
        `;
        
        new bootstrap.Modal(document.getElementById('detailModal')).show();
    }
    
    function search() {
        const query = document.getElementById('searchInput').value.toLowerCase().trim();
        if (!query) return;
        
        // Search in blocks
        const block = blocks.find(b => b.height.toString() === query || b.hash.toLowerCase().includes(query));
        if (block) {
            showBlockDetail(block.height);
            return;
        }
        
        // Search in transactions
        const tx = transactions.find(t => t.hash.toLowerCase().includes(query) || 
            t.from.toLowerCase().includes(query) || 
            t.to.toLowerCase().includes(query));
        if (tx) {
            showTransactionDetail(tx.hash);
            return;
        }
        
        alert('Không tìm thấy kết quả phù hợp');
    }
    
    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const tab = this.dataset.tab;
            if (tab === 'blocks') {
                document.getElementById('blocksSection').style.display = 'block';
                document.getElementById('transactionsSection').style.display = 'none';
            } else {
                document.getElementById('blocksSection').style.display = 'none';
                document.getElementById('transactionsSection').style.display = 'block';
            }
        });
    });
    
    // Initialize
    generateMockData();
    renderBlocks();
    renderTransactions();
    renderLatestTransactions();
    updateStats();
    
    // Event listeners
    document.getElementById('searchBtn').addEventListener('click', search);
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') search();
    });
</script>

</body>
</html>