<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <div class="d-flex align-items-center mb-4">
                <a href="/webbanhang/Product/list" class="btn btn-outline-secondary rounded-circle me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h2 class="mb-0 fw-bold">Chỉnh sửa sản phẩm</h2>
            </div>
            
            <?php if (!empty($errors)): ?>
            <div class="alert alert-danger bg-danger-subtle border-0 rounded-3">
                <div class="d-flex">
                    <div class="me-3">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-4"></i>
                    </div>
                    <div>
                        <h5 class="alert-heading text-danger">Có lỗi xảy ra</h5>
                        <ul class="mb-0 ps-3">
                            <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();" class="needs-validation" novalidate>
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                        
                        <div class="row g-4">
                            <!-- Thông tin cơ bản -->
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-medium">Tên sản phẩm</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg rounded-3" 
                                           value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <div class="invalid-feedback">Vui lòng nhập tên sản phẩm</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="category_id" class="form-label fw-medium">Danh mục</label>
                                    <select id="category_id" name="category_id" class="form-select rounded-3" required>
                                        <option value="" disabled>Chọn danh mục</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn danh mục</div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="price" class="form-label fw-medium">Giá (VNĐ)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">₫</span>
                                        <input type="number" id="price" name="price" class="form-control rounded-end" step="1000" 
                                               value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                                        <div class="invalid-feedback">Vui lòng nhập giá hợp lệ</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Phần hình ảnh -->
                            <div class="col-md-4">
                                <div class="image-upload-container h-100 d-flex flex-column">
                                    <label class="form-label fw-medium">Hình ảnh sản phẩm</label>
                                    
                                    <div class="image-preview-container bg-light rounded-3 text-center mb-3 flex-grow-1 position-relative">
                                        <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                                        
                                        <?php if ($product->image): ?>
                                        <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image" class="img-fluid img-preview rounded-3" id="imagePreview">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle delete-image" style="width: 30px; height: 30px; padding: 0;">
                                            <i class="bi bi-x"></i>
                                        </button>
                                        <?php else: ?>
                                        <div class="no-image-placeholder py-5 text-muted" id="placeholderText">
                                            <i class="bi bi-image d-block" style="font-size: 2.5rem;"></i>
                                            <span>Chưa có hình ảnh</span>
                                        </div>
                                        <img src="" alt="Product Image" class="img-fluid img-preview rounded-3 d-none" id="imagePreview">
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="custom-file-upload">
                                        <label for="image" class="btn btn-outline-primary w-100">
                                            <i class="bi bi-upload me-2"></i>Chọn ảnh
                                        </label>
                                        <input type="file" id="image" name="image" class="d-none" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Mô tả sản phẩm -->
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-medium">Mô tả sản phẩm</label>
                                    <textarea id="description" name="description" class="form-control rounded-3" rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả sản phẩm</div>
                                </div>
                            </div>
                            
                            <!-- Nút submit -->
                            <div class="col-12 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="/webbanhang/Product/list" class="btn btn-outline-secondary px-4">Hủy</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-check-circle me-2"></i>Lưu sản phẩm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS bổ sung -->
<style>
    .rounded-4 {
        border-radius: 0.75rem !important;
    }
    
    .image-preview-container {
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    .img-preview {
        max-height: 200px;
        object-fit: contain;
        width: 100%;
    }
    
    .bg-danger-subtle {
        background-color: rgba(220, 53, 69, 0.1);
    }
    
    /* Validate form styling */
    .was-validated .form-control:invalid,
    .form-control.is-invalid {
        border-color: #dc3545;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        padding-right: calc(1.5em + .75rem);
    }
</style>

<!-- JavaScript cho form validation và xem trước ảnh -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    var form = document.querySelector('.needs-validation');
    
    function validateForm() {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
        return form.checkValidity();
    }
    
    // Preview image before upload
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const placeholderText = document.getElementById('placeholderText');
    
    imageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('d-none');
                if (placeholderText) {
                    placeholderText.classList.add('d-none');
                }
            }
            
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Delete image button functionality
    const deleteImageBtn = document.querySelector('.delete-image');
    if (deleteImageBtn) {
        deleteImageBtn.addEventListener('click', function() {
            imagePreview.src = '';
            imagePreview.classList.add('d-none');
            document.querySelector('input[name="existing_image"]').value = '';
            if (placeholderText) {
                placeholderText.classList.remove('d-none');
            }
        });
    }
});
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<?php include 'app/views/shares/footer.php'; ?>