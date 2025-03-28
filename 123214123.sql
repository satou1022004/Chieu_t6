-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~2 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(3, 'ThanhNQ', 'NguyenQuangThanh', '$2y$10$KWqnkXqRLyF88yQql1p3/eZ8vyNat2e9Nzn.jRpbo/1hhVxyXhc6u', 'admin'),
	(4, 'thanh', 'thanh', '$2y$10$xmFVzdeW47JncHJzAzNlSeraHcPlACb/3HIROCKR3uD72MyHplGBC', 'user');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~19 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'VinFast ', 'xe dien\r\n'),
	(2, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(3, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(4, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming'),
	(5, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(6, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(7, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming'),
	(8, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(9, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(10, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming'),
	(11, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(12, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(13, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming'),
	(14, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(15, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(16, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming'),
	(17, 'Điện thoại', 'Các loại điện thoại di động thông minh'),
	(18, 'Laptop', 'Các dòng máy tính xách tay phục vụ công việc, học tập và giải trí'),
	(19, 'Máy tính để bàn', 'Các loại PC, máy tính bàn cho văn phòng và gaming');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `created_at`) VALUES
	(1, 'VinFast VF8', '0978637485', 'DF', '2025-03-20 08:36:22'),
	(2, 'sdasdas', '21312312', 'ádasdasd', '2025-03-21 08:15:47');

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~3 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
	(1, 1, 1, 1, 4535345.00),
	(2, 2, 8, 1, 1200000.00),
	(3, 2, 48, 1, 21990000.00);

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~12 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(48, 'Google Pixel 7 Pro', 'Điện thoại Android thuần Google với camera AI', 21990000.00, 'uploads/1.jpg', 1),
	(50, 'MacBook Pro M2', 'Laptop Apple với chip M2 mạnh mẽ', 35990000.00, 'uploads/3.jpg', 3),
	(51, 'Dell XPS 15', 'Laptop cao cấp dành cho designer và lập trình viên', 42990000.00, 'uploads/4.jpg', 3),
	(52, 'Asus ROG Strix G16', 'Laptop gaming với RTX 4060', 32990000.00, 'uploads/6.jpg', 3),
	(53, 'HP Omen 16', 'Laptop gaming với màn hình 165Hz', 28990000.00, 'uploads/7.jpg', 3),
	(54, 'Lenovo Legion 5 Pro', 'Laptop gaming mạnh mẽ với AMD Ryzen 7', 31990000.00, 'uploads/shopping.jpg', 3),
	(55, 'PC Gaming RTX 4090', 'Máy tính chơi game cao cấp với card đồ họa RTX 4090', 69990000.00, 'pc_gaming_rtx4090.jpg', 3),
	(56, 'HP Pavilion Desktop', 'Máy tính văn phòng nhỏ gọn', 15990000.00, 'hp_pavilion.jpg', 3),
	(57, 'iPhone 15 Pro Max', 'Điện thoại Apple với chip A17 Bionic', 29990000.00, 'iphone15pro.jpg', 1),
	(58, 'Samsung Galaxy S23 Ultra', 'Smartphone flagship của Samsung với camera 200MP', 25990000.00, 'uploads/9.jpg', 2),
	(59, 'Xiaomi 13 Pro', 'Điện thoại cao cấp của Xiaomi với camera Leica', 19990000.00, 'uploads/8.jpg', 2),
	(67, 'PC Gaming RTX 4090', 'Máy tính chơi game cao cấp với card đồ họa RTX 4090', 69990000.00, 'pc_gaming_rtx4090.jpg', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
