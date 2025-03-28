<?php include 'app/views/shares/header.php'; ?>

<div class="container">
    <h2 class="mt-4">Danh sách danh mục</h2>
    <?php if (SessionHelper::isAdmin()): ?>
        <a href="/webbanhang/Category/add" class="btn btn-primary mb-3">Thêm danh mục</a>
    <?php endif; ?>
    <?php if (!empty($categories)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <th>Hành động</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category->id); ?></td>
                        <td><?php echo htmlspecialchars($category->name); ?></td>
                        <td><?php echo htmlspecialchars($category->description); ?></td>
                        <?php if (SessionHelper::isAdmin()): ?>
                            <td>
                                <a href="/webbanhang/Category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="/webbanhang/Category/delete/<?php echo $category->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có danh mục nào.</p>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>