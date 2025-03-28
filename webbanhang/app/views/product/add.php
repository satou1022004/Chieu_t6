<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
        }
        
        body {
            background-color: var(--light-color);
            font-family: 'Nunito', sans-serif;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .card-header i {
            margin-right: 10px;
        }
        
        .form-control, .form-select {
            border-radius: 5px;
            padding: 12px;
            border: 1px solid #d1d3e2;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #2e59d9;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: var(--dark-color);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.2s;
        }
        
        .btn-secondary:hover {
            background-color: #4e505f;
            transform: translateY(-2px);
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border-radius: 5px;
            padding: 15px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .page-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 25px;
            border-left: 5px solid var(--primary-color);
            padding-left: 15px;
        }
        
        .footer {
            background-color: white;
            padding: 15px;
            text-align: center;
            color: var(--dark-color);
            font-size: 14px;
            margin-top: 30px;
            border-top: 1px solid #e3e6f0;
        }
    </style>
</head>
<body>
    <?php include 'app/views/shares/header.php'; ?>
    
    <div class="container py-5">
        <h1 class="page-title">Thêm sản phẩm mới</h1>
        
        <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> Nhập thông tin sản phẩm
            </div>
            <div class="card-body">
                <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();" id="productForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Danh mục:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                    <select id="category_id" name="category_id" class="form-select" required>
                                        <option value="" selected disabled>Chọn danh mục</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả:</label>
                                <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Hình ảnh:</label>
                                <!-- Giữ nguyên input file như trong code gốc của bạn -->
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/webbanhang/Product" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách sản phẩm
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Thêm sản phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'app/views/shares/footer.php'; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Kiểm tra dữ liệu hợp lệ trước khi gửi form
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const price = document.getElementById('price').value;
            const category = document.getElementById('category_id').value;
            const description = document.getElementById('description').value.trim();
            
            if (name === '') {
                alert('Vui lòng nhập tên sản phẩm');
                return false;
            }
            
            if (description === '') {
                alert('Vui lòng nhập mô tả sản phẩm');
                return false;
            }
            
            if (price <= 0) {
                alert('Giá sản phẩm phải lớn hơn 0');
                return false;
            }
            
            if (category === '') {
                alert('Vui lòng chọn danh mục sản phẩm');
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>