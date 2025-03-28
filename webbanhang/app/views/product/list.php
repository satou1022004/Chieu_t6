<?php include 'app/views/shares/header.php'; ?>

<style>
.product-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 200px;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 1.2rem;
}

.product-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.product-specs {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 0.5rem;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #dc3545;
}

/* CSS mới cho các nút */
.action-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    color: white;
}

.action-btn i {
    font-size: 1rem;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.btn-edit {
    background-color: #f39c12; /* Màu cam cho nút Sửa */
}

.btn-edit:hover {
    background-color: #e67e22;
}

.btn-delete {
    background-color: #e74c3c; /* Màu đỏ cho nút Xóa */
}

.btn-delete:hover {
    background-color: #c0392b;
}

.btn-add-to-cart {
    background-color: #3498db; /* Màu xanh dương cho nút Thêm vào giỏ */
}

.btn-add-to-cart:hover {
    background-color: #2980b9;
}

@media (max-width: 768px) {
    .product-img {
        height: 150px;
    }

    .product-title {
        font-size: 1rem;
    }

    .product-price {
        font-size: 1rem;
    }

    .action-btn {
        padding: 6px 12px;
        font-size: 0.85rem;
    }
}
</style>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Danh sách sản phẩm</h1>
            <a href="/webbanhang/Product/add" class="btn btn-success btn-sm">Thêm sản phẩm mới</a>
        </div>
        
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card product-card">
                        <div>
                            <?php if ($product->image): ?>
                                <img src="/webbanhang/<?php echo $product->image; ?>" 
                                     alt="Product Image" 
                                     class="product-img">
                            <?php else: ?>
                                <div class="no-image">No Image</div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h2 class="product-title">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
                                   class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h2>
                            <p class="product-specs">
                                <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                            <p class="product-price">
                                <?php echo number_format(htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8')); ?>đ
                            </p>
                            <div class="action-buttons">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>"
                                       class="action-btn btn-edit">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                                       class="action-btn btn-delete">
                                        <i class="fas fa-trash"></i> Xóa
                                    </a>
                                <?php endif; ?>
                                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>"
                                   class="action-btn btn-add-to-cart">
                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>