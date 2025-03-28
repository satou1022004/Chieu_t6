<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Kiểm tra quyền Admin
    private function isAdmin()
    {
        return SessionHelper::isAdmin();
    }

    // Hiển thị danh sách danh mục (mở cho tất cả)
    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm danh mục (chỉ Admin)
    public function add()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        include 'app/views/category/add.php';
    }

    // Lưu danh mục mới (chỉ Admin)
    public function save()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Kiểm tra dữ liệu đầu vào
            if (empty($name)) {
                $error = "Tên danh mục không được để trống.";
                include 'app/views/category/add.php';
                return;
            }

            if ($this->categoryModel->addCategory($name, $description)) {
                header('Location: /webbanhang/Category/list');
            } else {
                $error = "Đã xảy ra lỗi khi thêm danh mục.";
                include 'app/views/category/add.php';
            }
        }
    }

    // Hiển thị form chỉnh sửa danh mục (chỉ Admin)
    public function edit($id)
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    // Cập nhật danh mục (chỉ Admin)
    public function update()
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Kiểm tra dữ liệu đầu vào
            if (empty($name)) {
                $error = "Tên danh mục không được để trống.";
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/category/edit.php';
                return;
            }

            if ($this->categoryModel->updateCategory($id, $name, $description)) {
                header('Location: /webbanhang/Category/list');
            } else {
                $error = "Đã xảy ra lỗi khi cập nhật danh mục.";
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/category/edit.php';
            }
        }
    }

    // Xóa danh mục (chỉ Admin)
    public function delete($id)
    {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /webbanhang/Category/list');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }
}
?>