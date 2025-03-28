<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .top-bar {
            background-color: #FFC107;
            padding: 10px 0;
            text-align: center;
        }
        .main-header {
            background-color: #000;
            padding: 10px 0;
        }
        .main-header .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .main-header .navbar-nav .nav-link {
            color: white !important;
        }
        .main-header .icon-link {
            color: white;
            margin-left: 15px;
            font-size: 1.2rem;
        }
        .main-header .icon-link i {
            margin-right: 5px;
        }
        .menu-btn {
            background-color: #FFC107;
            color: black;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .menu-btn i {
            margin-right: 5px;
        }
        .menu-bar a {
            color: #333;
            margin-left: 15px;
            text-decoration: none;
        }
        .menu-bar a:hover {
            color: #FFC107;
        }
        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Thanh vàng trên cùng -->
    <div class="top-bar"></div>

    <!-- Thanh điều hướng chính -->
    <nav class="navbar navbar-expand-lg main-header">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/Product/">Quản lý sản phẩm</a>
            <div class="navbar-nav ml-auto">
                <a class="icon-link" href="/webbanhang/Product/cart">
                    <i class="fas fa-shopping-cart"></i> Danh sách giỏ hàng
                </a>
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <a class="icon-link" href="#">
                        <?php echo htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")"; ?>
                    </a>
                    <a class="icon-link" href="/webbanhang/account/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                <?php else: ?>
                    <a class="icon-link" href="/webbanhang/account/login"><i class="fas fa-user"></i> Đăng nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Thanh menu phụ -->
    <div class="container mt-2 menu-bar">
        <button class="menu-btn"><i class="fas fa-bars"></i></button>
        <a href="/webbanhang/Product/">Danh sách sản phẩm</a>
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/webbanhang/Product/add">Thêm sản phẩm</a>
            <a href="/webbanhang/Category/list">Danh mục sản phẩm</a>
        <?php endif; ?>
    </div>

    <!-- Dòng chữ chào mừng -->
    <div class="container mt-4">
        <div class="welcome-message">
            Chào mừng đến với trang web của tôi
        </div>
    </div>  