<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Thêm giao dịch mới | Blockchain Bank System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

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
        .create-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 30px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease;
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

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header .icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .form-header .icon i {
            font-size: 2.5rem;
            color: white;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-light);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .form-group label i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .required::after {
            content: '*';
            color: var(--error-color);
            margin-left: 4px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .form-control.error,
        .form-select.error {
            border-color: var(--error-color);
        }

        .error-message {
            font-size: 0.75rem;
            color: var(--error-color);
            margin-top: 0.25rem;
            display: none;
        }

        /* Input Group with Currency */
        .input-group-custom {
            position: relative;
        }

        .input-group-custom .currency {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-weight: 600;
            pointer-events: none;
        }

        /* Transaction Preview */
        .transaction-preview {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .transaction-preview:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .preview-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .preview-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .preview-row:last-child {
            border-bottom: none;
        }

        .preview-label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .preview-value {
            font-family: 'Space Mono', monospace;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: var(--gradient-1);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Alert Messages */
        .alert-message {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideDown 0.3s ease;
        }

        .alert-success {
            background: #dcfce7;
            border-left: 4px solid var(--success-color);
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            border-left: 4px solid var(--error-color);
            color: #991b1b;
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
            .form-card {
                padding: 1.5rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .preview-row {
                flex-direction: column;
                gap: 0.25rem;
            }
        }

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
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

        /* Tooltip */
        .info-tooltip {
            cursor: help;
            color: var(--text-light);
            margin-left: 0.25rem;
            font-size: 0.8rem;
        }

        .info-tooltip:hover {
            color: var(--primary-color);
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .quick-btn {
            background: #f1f5f9;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quick-btn:hover {
            background: var(--primary-color);
            color: white;
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
                        <a class="nav-link active" href="/transaction/create">
                            <i class="fas fa-plus-circle"></i> Thêm giao dịch
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/search">
                            <i class="fas fa-search"></i> Tra cứu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-certificate"></i> Xem bằng cấp
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
    <div class="create-container">
        <div class="form-card">
            <div class="form-header">
                <div class="icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h2>Tạo giao dịch mới</h2>
                <p>Thực hiện giao dịch trên Blockchain Bank một cách an toàn và minh bạch</p>
            </div>

            <!-- Alert Message Container -->
            <div id="alertMessage" style="display: none;"></div>

            <form id="transactionForm">
                <!-- Transaction Type -->
                <div class="form-group">
                    <label class="required">
                        <i class="fas fa-tag"></i> Loại giao dịch
                    </label>
                    <select class="form-control" id="txType" required>
                        <option value="">-- Chọn loại giao dịch --</option>
                        <option value="transfer">💸 Chuyển tiền</option>
                        <option value="deposit">📥 Nạp tiền</option>
                        <option value="withdraw">📤 Rút tiền</option>
                        <option value="contract">📄 Smart Contract</option>
                    </select>
                    <div class="error-message" id="typeError" style="display: none;">Vui lòng chọn loại giao dịch</div>
                </div>

                <!-- From Address -->
                <div class="form-group">
                    <label class="required">
                        <i class="fas fa-user"></i> Địa chỉ người gửi
                    </label>
                    <input type="text" class="form-control" id="fromAddress" placeholder="Nhập địa chỉ ví người gửi (0x...)" required>
                    <div class="error-message" id="fromError" style="display: none;">Vui lòng nhập địa chỉ người gửi hợp lệ</div>
                </div>

                <!-- To Address -->
                <div class="form-group">
                    <label class="required">
                        <i class="fas fa-user-check"></i> Địa chỉ người nhận
                    </label>
                    <input type="text" class="form-control" id="toAddress" placeholder="Nhập địa chỉ ví người nhận (0x...)" required>
                    <div class="error-message" id="toError" style="display: none;">Vui lòng nhập địa chỉ người nhận hợp lệ</div>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="required">
                        <i class="fas fa-dollar-sign"></i> Số tiền (USD)
                    </label>
                    <input type="number" class="form-control" id="amount" placeholder="Nhập số tiền" step="0.01" min="0.01" required>
                    <div class="error-message" id="amountError" style="display: none;">Số tiền phải lớn hơn 0</div>
                </div>

                <!-- Fee -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-gas-pump"></i> Phí giao dịch (USD)
                    </label>
                    <input type="number" class="form-control" id="fee" placeholder="Phí giao dịch" step="0.01" value="1.00">
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>
                        <i class="fas fa-align-left"></i> Mô tả (tùy chọn)
                    </label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Nhập mô tả cho giao dịch..."></textarea>
                </div>

                <!-- Transaction Preview -->
                <div class="transaction-preview" id="transactionPreview" style="display: none;">
                    <div class="preview-title">
                        <i class="fas fa-eye"></i> Xem trước giao dịch
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Mã giao dịch:</span>
                        <span class="preview-value" id="previewHash">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Loại:</span>
                        <span class="preview-value" id="previewType">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Người gửi:</span>
                        <span class="preview-value" id="previewFrom">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Người nhận:</span>
                        <span class="preview-value" id="previewTo">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Số tiền:</span>
                        <span class="preview-value" id="previewAmount">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Phí giao dịch:</span>
                        <span class="preview-value" id="previewFee">-</span>
                    </div>
                    <div class="preview-row">
                        <span class="preview-label">Tổng cộng:</span>
                        <span class="preview-value" id="previewTotal">-</span>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <i class="fas fa-check-circle"></i> Xác nhận và tạo giao dịch
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Blockchain Bank. All rights reserved. | Giao dịch được xác thực trên Blockchain an toàn và
                minh bạch</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Generate transaction hash
        function generateTransactionHash() {
            const chars = '0123456789abcdef';
            let hash = '0x';
            for (let i = 0; i < 64; i++) {
                hash += chars[Math.floor(Math.random() * chars.length)];
            }
            return hash;
        }

        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'USD'
            }).format(amount);
        }

        // Get transaction type name
        function getTypeName(type) {
            const types = {
                transfer: 'Chuyển tiền',
                deposit: 'Nạp tiền',
                withdraw: 'Rút tiền',
                contract: 'Smart Contract'
            };
            return types[type] || type;
        }

        // Get type icon
        function getTypeIcon(type) {
            const icons = {
                transfer: 'fa-exchange-alt',
                deposit: 'fa-arrow-down',
                withdraw: 'fa-arrow-up',
                contract: 'fa-file-contract'
            };
            return icons[type] || 'fa-circle';
        }

        // Validate address format
        function isValidAddress(address) {
            return /^0x[a-fA-F0-9]{40}$/.test(address);
        }

        // Update preview
        function updatePreview() {
            const type = document.getElementById('txType').value;
            const from = document.getElementById('fromAddress').value;
            const to = document.getElementById('toAddress').value;
            const amount = parseFloat(document.getElementById('amount').value);
            const fee = parseFloat(document.getElementById('fee').value) || 0;

            if (type && from && to && amount > 0) {
                document.getElementById('transactionPreview').style.display = 'block';
                document.getElementById('previewHash').textContent = generateTransactionHash().substring(0, 30) + '...';
                document.getElementById('previewType').innerHTML =
                    `<i class="fas ${getTypeIcon(type)}"></i> ${getTypeName(type)}`;
                document.getElementById('previewFrom').textContent = from.substring(0, 20) + '...' + from.substring(from
                    .length - 8);
                document.getElementById('previewTo').textContent = to.substring(0, 20) + '...' + to.substring(to.length -
                8);
                document.getElementById('previewAmount').textContent = formatCurrency(amount);
                document.getElementById('previewFee').textContent = formatCurrency(fee);
                document.getElementById('previewTotal').textContent = formatCurrency(amount + fee);
            } else {
                document.getElementById('transactionPreview').style.display = 'none';
            }
        }

        // Validate form
        function validateForm() {
            let isValid = true;

            // Reset errors
            document.querySelectorAll('.form-control, .form-select').forEach(el => {
                el.classList.remove('error');
            });
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });

            // Validate type
            const type = document.getElementById('txType').value;
            if (!type) {
                document.getElementById('txType').classList.add('error');
                document.getElementById('typeError').style.display = 'block';
                isValid = false;
            }

            // Validate from address
            const from = document.getElementById('fromAddress').value;
            if (!from) {
                document.getElementById('fromAddress').classList.add('error');
                document.getElementById('fromError').textContent = 'Vui lòng nhập địa chỉ người gửi';
                document.getElementById('fromError').style.display = 'block';
                isValid = false;
            } else if (!isValidAddress(from)) {
                document.getElementById('fromAddress').classList.add('error');
                document.getElementById('fromError').textContent =
                    'Địa chỉ không hợp lệ (phải bắt đầu bằng 0x và có 42 ký tự)';
                document.getElementById('fromError').style.display = 'block';
                isValid = false;
            }

            // Validate to address
            const to = document.getElementById('toAddress').value;
            if (!to) {
                document.getElementById('toAddress').classList.add('error');
                document.getElementById('toError').textContent = 'Vui lòng nhập địa chỉ người nhận';
                document.getElementById('toError').style.display = 'block';
                isValid = false;
            } else if (!isValidAddress(to)) {
                document.getElementById('toAddress').classList.add('error');
                document.getElementById('toError').textContent =
                    'Địa chỉ không hợp lệ (phải bắt đầu bằng 0x và có 42 ký tự)';
                document.getElementById('toError').style.display = 'block';
                isValid = false;
            }

            // Check same address
            if (from && to && from === to && isValid) {
                document.getElementById('toAddress').classList.add('error');
                document.getElementById('toError').textContent = 'Địa chỉ người gửi và người nhận không thể giống nhau';
                document.getElementById('toError').style.display = 'block';
                isValid = false;
            }

            // Validate amount
            const amount = parseFloat(document.getElementById('amount').value);
            if (isNaN(amount) || amount <= 0) {
                document.getElementById('amount').classList.add('error');
                document.getElementById('amountError').style.display = 'block';
                isValid = false;
            }

            return isValid;
        }

        // Show alert
        function showAlert(message, type) {
            const alertDiv = document.getElementById('alertMessage');
            alertDiv.innerHTML = `
            <div class="alert-message alert-${type}">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                <span>${message}</span>
            </div>
        `;
            alertDiv.style.display = 'block';

            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        }

        // Save transaction to localStorage
        function saveTransaction(transaction) {
            let transactions = JSON.parse(localStorage.getItem('blockchain_transactions') || '[]');
            transactions.unshift(transaction);
            localStorage.setItem('blockchain_transactions', JSON.stringify(transactions));
            return transactions.length;
        }

        // Handle form submission
        document.getElementById('transactionForm').addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validateForm()) {
            return;
        }

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="loading-spinner"></span> Đang xử lý giao dịch...';

        const type = document.getElementById('txType').value;
        const from = document.getElementById('fromAddress').value;
        const to = document.getElementById('toAddress').value;
        const amount = parseFloat(document.getElementById('amount').value);
        const fee = parseFloat(document.getElementById('fee').value) || 1;
        const description = document.getElementById('description').value;

        // Send transaction data to server
        fetch('/api/transactions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    type: type,
                    from: from,
                    to: to,
                    amount: amount,
                    fee: fee,
                    description: description || 'No description'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(
                        `✅ Giao dịch đã được tạo thành công! Mã giao dịch: ${data.hash.substring(0, 20)}...`,
                        'success');

                    // Reset form
                    document.getElementById('transactionForm').reset();
                    document.getElementById('transactionPreview').style.display = 'none';

                    // Redirect to transaction detail after 2 seconds
                    setTimeout(() => {
                        window.location.href = `/transaction/${data.hash}`;
                    }, 2000);
                } else {
                    showAlert(`❌ Lỗi: ${data.message}`, 'error');
                }

                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Xác nhận và tạo giao dịch';
            })
            .catch(error => {
                showAlert(`❌ Lỗi kết nối: ${error.message}`, 'error');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Xác nhận và tạo giao dịch';
            });
        });

        // Real-time validation and preview
        document.getElementById('txType').addEventListener('change', updatePreview);
        document.getElementById('fromAddress').addEventListener('input', updatePreview);
        document.getElementById('toAddress').addEventListener('input', updatePreview);
        document.getElementById('amount').addEventListener('input', updatePreview);
        document.getElementById('fee').addEventListener('input', updatePreview);

        // Real-time address validation
        document.getElementById('fromAddress').addEventListener('input', function() {
            if (this.value && !isValidAddress(this.value)) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });

        document.getElementById('toAddress').addEventListener('input', function() {
            if (this.value && !isValidAddress(this.value)) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });

        // Amount validation
        document.getElementById('amount').addEventListener('input', function() {
            const amount = parseFloat(this.value);
            if (isNaN(amount) || amount <= 0) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });

        // Initial preview update on page load if any fields are pre-filled
        setTimeout(updatePreview, 100);
    </script>

</body>

</html>
