<?php include 'app/views/shares/header.php'; ?>

<div class="container">
    <h2 class="mt-4">Thêm danh mục</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form action="/webbanhang/Category/save" method="POST">
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="/webbanhang/Category/list" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>