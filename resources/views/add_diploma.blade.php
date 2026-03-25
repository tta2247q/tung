<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chi tiết giao dịch | Blockchain Bank System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
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
        
        /* Main Container */
        .detail-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Transaction Header */
        .tx-header {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .status-success {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-pending {
            background: #fef9c3;
            color: #854d0e;
        }
        
        .tx-hash {
            font-family: 'Space Mono', monospace;
            font-size: 0.9rem;
            background: #f1f5f9;
            padding: 0.75rem;
            border-radius: 12px;
            word-break: break-all;
            margin-top: 1rem;
        }
        
        /* Detail Cards */
        .detail-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .card-title i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
        
        .info-row {
            display: flex;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            width: 140px;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .info-value {
            flex: 1;
            font-family: 'Space Mono', monospace;
            word-break: break-all;
            color: var(--text-light);
        }
        
        .amount-large {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
        }
        
        /* QR Code */
        .qr-container {
            text-align: center;
            padding: 1rem;
        }
        
        #qrcode {
            display: inline-block;
            padding: 1rem;
            background: white;
            border-radius: 16px;
        }
        
        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 2rem;
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
            padding-left: 1.5rem;
            border-left: 2px solid var(--border-color);
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--primary-color);
        }
        
        .timeline-item.completed::before {
            background: var(--success-color);
        }
        
        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .timeline-time {
            font-size: 0.75rem;
            color: var(--text-light);
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .btn-action {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: var(--gradient-1);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-outline {
            border: 2px solid var(--border-color);
            color: var(--text-dark);
        }
        
        .btn-outline:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
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
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .amount-large {
                font-size: 1.5rem;
            }
        }
        
        /* Loading */
        .loading-container {
            text-align: center;
            padding: 3rem;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid var(--border-color);
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
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
                    <a class="nav-link" href="/explorer">
                        <i class="fas fa-cube"></i> Explorer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add">
                        <i class="fas fa-plus-circle"></i> Thêm giao dịch
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transaction/create">
                        <i class="fas fa-plus-circle"></i> Thêm giao dịch
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

<!-- Main Content -->
<div class="detail-container" id="detailContainer">
    <div class="loading-container" id="loading">
        <div class="loading-spinner"></div>
        <p>Đang tải thông tin giao dịch...</p>
    </div>
    
    <div id="transactionContent" style="display: none;">
        <!-- Transaction Header -->
        <div class="tx-header">
            <div>
                <span class="status-badge status-success" id="txStatus">
                    <i class="fas fa-check-circle"></i> Thành công
                </span>
            </div>
            <h3 id="txTypeDisplay">Chuyển tiền</h3>
            <div class="tx-hash" id="txHash"></div>
        </div>
        
        <!-- Amount Card -->
        <div class="detail-card">
            <div class="card-title">
                <i class="fas fa-dollar-sign"></i> Số tiền giao dịch
            </div>
            <div class="text-center">
                <div class="amount-large" id="txAmount">0 USD</div>
                <div class="text-muted mt-2" id="txTotal">(bao gồm phí)</div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Transaction Details -->
            <div class="col-lg-7">
                <div class="detail-card">
                    <div class="card-title">
                        <i class="fas fa-info-circle"></i> Chi tiết giao dịch
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">Mã giao dịch:</div>
                        <div class="info-value" id="detailHash"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Khối:</div>
                        <div class="info-value" id="txBlock"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Thời gian:</div>
                        <div class="info-value" id="txTime"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Loại giao dịch:</div>
                        <div class="info-value" id="txTypeDetail"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Người gửi:</div>
                        <div class="info-value" id="txFrom"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Người nhận:</div>
                        <div class="info-value" id="txTo"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Số tiền:</div>
                        <div class="info-value" id="txAmountDetail"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Phí giao dịch:</div>
                        <div class="info-value" id="txFee"></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Mô tả:</div>
                        <div class="info-value" id="txDescription"></div>
                    </div>
                </div>
            </div>
            
            <!-- QR Code & Actions -->
            <div class="col-lg-5">
                <div class="detail-card">
                    <div class="card-title">
                        <i class="fas fa-qrcode"></i> Mã QR giao dịch
                    </div>
                    <div class="qr-container">
                        <div id="qrcode"></div>
                        <button class="btn-action btn-outline mt-3" onclick="copyToClipboard()">
                            <i class="fas fa-copy"></i> Sao chép mã giao dịch
                        </button>
                    </div>
                </div>
                
                <div class="detail-card">
                    <div class="card-title">
                        <i class="fas fa-clock"></i> Lịch trình giao dịch
                    </div>
                    <div class="timeline" id="timeline">
                        <!-- Timeline will be populated -->
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="/explorer" class="btn-action btn-outline">
                        <i class="fas fa-cube"></i> Xem trên Explorer
                    </a>
                    <a href="/create" class="btn-action btn-primary">
                        <i class="fas fa-plus-circle"></i> Tạo giao dịch mới
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Blockchain Bank. All rights reserved. | Giao dịch đã được xác thực trên Blockchain</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Get transaction hash from URL
    function getTransactionHash() {
        const path = window.location.pathname;
        const hash = path.split('/transaction/')[1];
        return hash ? decodeURIComponent(hash) : null;
    }
    
    // Get all transactions from localStorage
    function getTransactions() {
        return JSON.parse(localStorage.getItem('blockchain_transactions') || '[]');
    }
    
    // Format currency
    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'USD' }).format(amount);
    }
    
    // Format date
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleString('vi-VN', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
    }
    
    // Format time ago
    function timeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diff = Math.floor((now - date) / 1000);
        
        if (diff < 60) return `${diff} giây trước`;
        if (diff < 3600) return `${Math.floor(diff / 60)} phút trước`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} giờ trước`;
        if (diff < 2592000) return `${Math.floor(diff / 86400)} ngày trước`;
        return formatDate(dateString);
    }
    
    // Copy to clipboard
    function copyToClipboard() {
        const hash = document.getElementById('txHash').innerText;
        navigator.clipboard.writeText(hash).then(() => {
            alert('Đã sao chép mã giao dịch!');
        });
    }
    
    // Generate timeline
    function generateTimeline(tx) {
        const timeline = document.getElementById('timeline');
        const txTime = new Date(tx.timestamp);
        const confirmedTime = new Date(txTime.getTime() + 12 * 1000);
        const blockTime = new Date(txTime.getTime() + 6 * 1000);
        
        timeline.innerHTML = `
            <div class="timeline-item completed">
                <div class="timeline-title">
                    <i class="fas fa-check-circle text-success"></i> Giao dịch được tạo
                </div>
                <div class="timeline-time">${timeAgo(tx.timestamp)}</div>
            </div>
            <div class="timeline-item completed">
                <div class="timeline-title">
                    <i class="fas fa-cube"></i> Đã thêm vào mempool
                </div>
                <div class="timeline-time">${timeAgo(new Date(txTime.getTime() + 2 * 1000).toISOString())}</div>
            </div>
            <div class="timeline-item completed">
                <div class="timeline-title">
                    <i class="fas fa-microchip"></i> Đã xác thực bởi miner
                </div>
                <div class="timeline-time">${timeAgo(blockTime.toISOString())}</div>
            </div>
            <div class="timeline-item completed">
                <div class="timeline-title">
                    <i class="fas fa-check-double"></i> Xác nhận trên Blockchain
                </div>
                <div class="timeline-time">${timeAgo(confirmedTime.toISOString())}</div>
            </div>
        `;
    }
    
    // Display transaction details
    function displayTransaction(tx) {
        if (!tx) {
            document.getElementById('loading').innerHTML = `
                <div class="text-center" style="padding: 3rem;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: var(--error-color);"></i>
                    <h4 class="mt-3">Không tìm thấy giao dịch</h4>
                    <p>Mã giao dịch không tồn tại hoặc đã bị xóa.</p>
                    <a href="/transaction/create" class="btn-action btn-primary mt-3">Tạo giao dịch mới</a>
                </div>
            `;
            return;
        }
        
        document.getElementById('loading').style.display = 'none';
        document.getElementById('transactionContent').style.display = 'block';
        
        // Update header
        document.getElementById('txStatus').innerHTML = `
            <i class="fas fa-check-circle"></i> ${tx.status === 'success' ? 'Thành công' : 'Đang xử lý'}
        `;
        document.getElementById('txTypeDisplay').innerHTML = `
            <i class="fas ${tx.type === 'transfer' ? 'fa-exchange-alt' : tx.type === 'deposit' ? 'fa-arrow-down' : tx.type === 'withdraw' ? 'fa-arrow-up' : 'fa-file-contract'}"></i>
            ${tx.typeName || getTypeName(tx.type)}
        `;
        document.getElementById('txHash').innerText = tx.hash;
        
        // Update amount
        document.getElementById('txAmount').innerHTML = formatCurrency(tx.amount);
        document.getElementById('txTotal').innerHTML = `(bao gồm phí ${formatCurrency(tx.fee)})`;
        
        // Update details
        document.getElementById('detailHash').innerText = tx.hash;
        document.getElementById('txBlock').innerHTML = `<a href="#" style="color: var(--primary-color);">#${tx.blockHeight}</a>`;
        document.getElementById('txTime').innerHTML = formatDate(tx.timestamp);
        document.getElementById('txTypeDetail').innerHTML = `
            <span class="badge bg-light text-dark">${tx.typeName || getTypeName(tx.type)}</span>
        `;
        document.getElementById('txFrom').innerHTML = `<span class="tx-hash" style="background: none; padding: 0;">${tx.from}</span>`;
        document.getElementById('txTo').innerHTML = `<span class="tx-hash" style="background: none; padding: 0;">${tx.to}</span>`;
        document.getElementById('txAmountDetail').innerHTML = formatCurrency(tx.amount);
        document.getElementById('txFee').innerHTML = formatCurrency(tx.fee);
        document.getElementById('txDescription').innerHTML = tx.description || '<em class="text-muted">Không có mô tả</em>';
        
        // Generate QR Code
        new QRCode(document.getElementById("qrcode"), {
            text: tx.hash,
            width: 150,
            height: 150,
            colorDark: "#4361ee",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        
        // Generate timeline
        generateTimeline(tx);
    }
    
    function getTypeName(type) {
        const types = {
            transfer: 'Chuyển tiền',
            deposit: 'Nạp tiền',
            withdraw: 'Rút tiền',
            contract: 'Smart Contract'
        };
        return types[type] || type;
    }
    
    // Load transaction
    function loadTransaction() {
        const hash = getTransactionHash();
        
        if (!hash) {
            document.getElementById('loading').innerHTML = `
                <div class="text-center" style="padding: 3rem;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: var(--error-color);"></i>
                    <h4 class="mt-3">Không có mã giao dịch</h4>
                    <p>Vui lòng cung cấp mã giao dịch hợp lệ.</p>
                    <a href="/transaction/create" class="btn-action btn-primary mt-3">Tạo giao dịch mới</a>
                </div>
            `;
            return;
        }

        // Try to fetch from server first
        fetch(`/api/transactions`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(transactions => {
            const transaction = transactions.find(tx => tx.hash === hash);
            
            if (transaction) {
                displayTransaction(transaction);
            } else {
                // Fallback to localStorage
                const localTransactions = getTransactions();
                const localTransaction = localTransactions.find(tx => tx.hash === hash);
                
                if (localTransaction) {
                    displayTransaction(localTransaction);
                } else {
                    // If not found anywhere, show mock data for demo
                    const mockTx = {
                        hash: hash,
                        type: 'transfer',
                        typeName: 'Chuyển tiền',
                        from: '0x742d35Cc6634C0532925a3b844Bc9e9438F8e',
                        to: '0x89205A3A3b2A69De6Dbf7f01ED13B2108B2c43e',
                        amount: 1250.50,
                        fee: 2.50,
                        total: 1253.00,
                        description: 'Chuyển tiền thanh toán hợp đồng',
                        timestamp: new Date().toISOString(),
                        status: 'success',
                        blockHeight: 1284
                    };
                    displayTransaction(mockTx);
                }
            }
        })
        .catch(error => {
            console.error('Error fetching transactions:', error);
            
            // Fallback to localStorage on error
            const transactions = getTransactions();
            const transaction = transactions.find(tx => tx.hash === hash);
            displayTransaction(transaction);
        });
    }
    
    // Load on page ready
    document.addEventListener('DOMContentLoaded', loadTransaction);
</script>

</body>
</html>