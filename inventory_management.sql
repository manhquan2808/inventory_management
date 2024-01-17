-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(10) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `avt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `role_id`, `first_name`, `last_name`, `number`, `email`, `password`, `birthdate`, `created_time`, `updated_time`, `avt`) VALUES
('GD00000', 1, 'Hồ Công', 'Thịnh', '0326429044', 'thinhhocm02@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dUg1LmVvUjZHbk9KV2N0cA$FIY9JBIcaUf68mMLc3GoKG55VDK0yttLSXPim5cdywg', '2002-11-16', '2023-11-04 07:56:23', '2023-12-18 14:22:45', ''),
('NVK_TP2694', 9, 'a', 'a', '123', 'a@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$TzBaM3VsZDJYb3l0LklKbQ$3fvrdBSNvKXrl3YQYa6R15gUR1LwRRIL0Ybgda75kRY', '2023-11-29', '2023-12-14 02:47:47', '2023-12-14 02:47:47', ''),
('NVK57111', 4, 'Phạm Văn ', 'P', '0123879321', 'NVmail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SnZPZjdyUGxJY1N1VzBUOQ$NthZyFVUSQPFt65UetBdfsZR70P/EPFYJelNlwWYa6c', '1997-10-03', '2023-11-30 16:47:44', '2023-11-30 16:47:44', ''),
('NVK90023', 4, 'Nguyễn Văn', 'S', '0765123897', 'nvmail2@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bmxLNmlrUGV2L3hqc3czdg$tw50rjiAr5DfcpYp+h3YFm9IxgpPO7HBlsHOBjyJMB8', '2000-06-05', '2023-11-30 16:50:52', '2023-12-05 22:26:28', ''),
('NVKK54959', 5, 'Kiểm', 'Kê', '0123789321', 'kkmail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$U01sai42ZWVwaHcvNW9Vbw$kQkoP4erPqm+QBkxgrY2ub+7rblQjtXj6FDS+w8i3zU', '1999-03-03', '2023-12-07 19:09:38', '2023-12-07 19:09:38', ''),
('QL_TP29667', 3, 'Nguyễn Thị', 'B', '0123123812', 'QLTPmail2@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NEl5Z1NMalR4cXFiQmU2bQ$0g2uvgSv2lt9RtS7HlvaqgE1fFz9cvBRXhtW/KbEt28', '2002-08-28', '2023-11-27 18:26:15', '2023-11-30 16:30:06', ''),
('QL_TP74637', 3, 'Trần Văn ', 'A', '0123487587', 'QLTPmail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$U2NYd2pLWUVpZy5iaUMwZQ$N+NTHk00hJg+Vm/D77x3x1kODAg8WKpjUbHRS1OwHKQ', '2002-03-06', '2023-11-27 17:11:30', '2023-11-30 16:30:16', ''),
('QL50456', 2, 'Trần Mạnh ', 'Quân', '0912345678', 'manhquan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VmRBTkZ2WnVqOGdna1daag$iI3EH2LW2J1aN4uChyeD8iz68S3t02WCU9nNx8YU1go', '2002-11-16', '2023-10-26 02:03:42', '2023-11-30 16:49:32', ''),
('QL68745', 2, 'Quan', 'Ly', '0123345654', 'QLmail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$TjNsVUZScDlyRE13YW1hQg$76hh7oH/8zbF91Qo+UQHvR5vCzBB3gaunz2Kchb9v5g', '2002-11-16', '2023-10-17 00:29:27', '2023-11-26 15:34:18', '../assets/images/users/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `inventory_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `type_id`, `inventory_name`, `address`, `status`) VALUES
(3, 1, 'Kho Nguyên Vật Liệu 1', 'TPHCM', 'Nguyên Vật Liệu'),
(4, 1, 'Kho Nguyên Vật Liệu 2', 'DongNai', 'Nguyên Vật Liệu'),
(5, 2, 'Kho Thành Phẩm 1', 'TPHCM', 'Thành Phẩm'),
(6, 2, 'Kho Thành Phẩm 2', 'DongNai', 'Thành Phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_check`
--

CREATE TABLE `inventory_check` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_date` datetime NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `actual_quantity` int(10) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_check`
--

INSERT INTO `inventory_check` (`id`, `check_date`, `inventory_id`, `actual_quantity`, `employee_id`, `resource_id`, `status`) VALUES
(33, '2023-12-18 14:24:22', 3, 12, 'NVKK54959', 309, 'Đã được duyệt'),
(34, '2023-12-18 14:24:22', 3, 23, 'NVKK54959', 323, 'Đã được duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_details`
--

CREATE TABLE `inventory_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_details`
--

INSERT INTO `inventory_details` (`id`, `inventory_id`, `employee_id`) VALUES
(3, 3, 'QL68745'),
(4, 4, 'QL50456'),
(12, 5, 'QL_TP74637'),
(13, 6, 'QL_TP29667'),
(14, 3, 'NVK57111'),
(15, 4, 'NVK90023'),
(16, 3, 'NVKK54959'),
(18, 5, 'NVK_TP2694');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_type`
--

CREATE TABLE `inventory_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_type`
--

INSERT INTO `inventory_type` (`id`, `type_name`) VALUES
(1, 'Nguyên Vật Liệu'),
(2, 'Thành Phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `issue_products`
--

CREATE TABLE `issue_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_detail_id` int(10) UNSIGNED NOT NULL,
  `shelves_id` int(10) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_resources`
--

CREATE TABLE `issue_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_detail_id` int(10) UNSIGNED NOT NULL,
  `shelves_id` int(10) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_resources`
--

INSERT INTO `issue_resources` (`id`, `resource_detail_id`, `shelves_id`, `created_date`, `expiration_date`, `status`) VALUES
(141, 118, 4, '2023-11-28 05:39:15', '2023-11-28 05:39:15', 'Nhập nguyên vật liệu'),
(142, 119, 4, '2023-11-28 05:39:15', '2023-11-28 05:39:15', 'Nhập nguyên vật liệu'),
(143, 121, 4, '2023-11-28 05:39:15', '2023-11-28 05:39:15', 'Nhập nguyên vật liệu'),
(144, 122, 4, '2023-11-28 16:58:06', '2023-11-28 16:58:06', 'Nhập nguyên vật liệu'),
(145, 124, 4, '2023-11-28 16:58:06', '2023-11-28 16:58:06', 'Nhập nguyên vật liệu'),
(146, 125, 7, '2023-11-28 16:58:41', '2023-11-28 16:58:41', 'Nhập nguyên vật liệu'),
(147, 126, 7, '2023-11-28 16:58:41', '2023-11-28 16:58:41', 'Nhập nguyên vật liệu'),
(148, 127, 4, '2023-12-01 17:31:03', '2023-12-01 17:31:03', 'Nhập nguyên vật liệu'),
(149, 128, 4, '2023-12-01 17:31:03', '2023-12-01 17:31:03', 'Nhập nguyên vật liệu'),
(150, 129, 4, '2023-12-01 17:31:03', '2023-12-01 17:31:03', 'Nhập nguyên vật liệu'),
(151, 130, 4, '2023-12-01 17:31:03', '2023-12-01 17:31:03', 'Nhập nguyên vật liệu'),
(152, 131, 4, '2023-12-01 17:31:03', '2023-12-01 17:31:03', 'Nhập nguyên vật liệu'),
(153, 136, 4, '2023-12-05 22:20:00', '2023-12-05 22:20:00', 'Nhập nguyên vật liệu'),
(154, 134, 4, '2023-12-05 22:20:00', '2023-12-05 22:20:00', 'Nhập nguyên vật liệu'),
(155, 135, 5, '2023-12-05 22:20:03', '2023-12-05 22:20:03', 'Nhập nguyên vật liệu'),
(156, 139, 4, '2023-12-05 22:28:24', '2023-12-05 22:28:24', 'Nhập nguyên vật liệu'),
(157, 137, 4, '2023-12-05 22:28:24', '2023-12-05 22:28:24', 'Nhập nguyên vật liệu'),
(158, 138, 4, '2023-12-05 22:28:24', '2023-12-05 22:28:24', 'Nhập nguyên vật liệu'),
(159, 141, 6, '2023-12-06 00:16:44', '2023-12-06 00:16:44', 'Nhập nguyên vật liệu'),
(160, 140, 7, '2023-12-06 00:16:47', '2023-12-06 00:16:47', 'Nhập nguyên vật liệu'),
(161, 143, 6, '2023-12-06 00:17:34', '2023-12-06 00:17:34', 'Nhập nguyên vật liệu'),
(162, 144, 6, '2023-12-06 00:17:34', '2023-12-06 00:17:34', 'Nhập nguyên vật liệu'),
(163, 145, 6, '2023-12-06 00:17:34', '2023-12-06 00:17:34', 'Nhập nguyên vật liệu'),
(164, 146, 7, '2023-12-06 00:17:38', '2023-12-06 00:17:38', 'Nhập nguyên vật liệu'),
(165, 142, 7, '2023-12-06 00:17:38', '2023-12-06 00:17:38', 'Nhập nguyên vật liệu'),
(166, 151, 6, '2023-12-07 18:05:19', '2023-12-07 18:05:19', 'Nhập nguyên vật liệu'),
(167, 156, 6, '2023-12-07 18:05:19', '2023-12-07 18:05:19', 'Nhập nguyên vật liệu'),
(168, 147, 6, '2023-12-07 18:05:20', '2023-12-07 18:05:20', 'Nhập nguyên vật liệu'),
(169, 152, 6, '2023-12-07 18:05:20', '2023-12-07 18:05:20', 'Nhập nguyên vật liệu'),
(170, 148, 6, '2023-12-07 18:05:20', '2023-12-07 18:05:20', 'Nhập nguyên vật liệu'),
(171, 155, 7, '2023-12-07 18:05:33', '2023-12-07 18:05:33', 'Nhập nguyên vật liệu'),
(172, 149, 7, '2023-12-07 18:05:33', '2023-12-07 18:05:33', 'Nhập nguyên vật liệu'),
(173, 150, 7, '2023-12-07 18:05:33', '2023-12-07 18:05:33', 'Nhập nguyên vật liệu'),
(174, 153, 7, '2023-12-07 18:05:33', '2023-12-07 18:05:33', 'Nhập nguyên vật liệu'),
(175, 154, 7, '2023-12-07 18:05:33', '2023-12-07 18:05:33', 'Nhập nguyên vật liệu'),
(176, 159, 4, '2023-12-08 11:00:44', '2023-12-08 11:00:44', 'Nhập nguyên vật liệu'),
(177, 160, 4, '2023-12-08 11:00:44', '2023-12-08 11:00:44', 'Nhập nguyên vật liệu'),
(178, 161, 4, '2023-12-08 11:00:44', '2023-12-08 11:00:44', 'Nhập nguyên vật liệu'),
(179, 157, 4, '2023-12-08 11:00:44', '2023-12-08 11:00:44', 'Nhập nguyên vật liệu'),
(180, 158, 4, '2023-12-08 11:00:44', '2023-12-08 11:00:44', 'Nhập nguyên vật liệu'),
(181, 165, 4, '2023-12-12 19:37:18', '2023-12-12 19:37:18', 'Nhập nguyên vật liệu'),
(182, 166, 4, '2023-12-12 19:37:18', '2023-12-12 19:37:18', 'Nhập nguyên vật liệu'),
(183, 162, 4, '2023-12-12 19:37:18', '2023-12-12 19:37:18', 'Nhập nguyên vật liệu'),
(184, 163, 4, '2023-12-12 19:37:18', '2023-12-12 19:37:18', 'Nhập nguyên vật liệu'),
(185, 164, 4, '2023-12-12 19:37:18', '2023-12-12 19:37:18', 'Nhập nguyên vật liệu'),
(186, 167, 4, '2023-12-12 20:22:45', '2023-12-12 20:22:45', 'Nhập nguyên vật liệu'),
(187, 170, 4, '2023-12-12 20:22:45', '2023-12-12 20:22:45', 'Nhập nguyên vật liệu'),
(188, 171, 4, '2023-12-12 20:22:45', '2023-12-12 20:22:45', 'Nhập nguyên vật liệu'),
(189, 173, 4, '2023-12-12 20:34:38', '2023-12-12 20:34:38', 'Nhập nguyên vật liệu'),
(190, 174, 4, '2023-12-12 20:34:38', '2023-12-12 20:34:38', 'Nhập nguyên vật liệu'),
(191, 175, 4, '2023-12-12 20:34:38', '2023-12-12 20:34:38', 'Nhập nguyên vật liệu'),
(192, 176, 4, '2023-12-12 20:34:38', '2023-12-12 20:34:38', 'Nhập nguyên vật liệu'),
(193, 172, 4, '2023-12-12 20:34:38', '2023-12-12 20:34:38', 'Nhập nguyên vật liệu'),
(194, 184, 5, '2023-12-18 11:16:56', '2023-12-18 11:16:56', 'Nhập nguyên vật liệu'),
(195, 185, 5, '2023-12-18 11:16:56', '2023-12-18 11:16:56', 'Nhập nguyên vật liệu'),
(196, 186, 5, '2023-12-18 11:16:56', '2023-12-18 11:16:56', 'Nhập nguyên vật liệu'),
(197, 180, 6, '2023-12-18 11:17:35', '2023-12-18 11:17:35', 'Nhập nguyên vật liệu'),
(198, 181, 6, '2023-12-18 11:17:35', '2023-12-18 11:17:35', 'Nhập nguyên vật liệu'),
(199, 177, 6, '2023-12-18 11:17:35', '2023-12-18 11:17:35', 'Nhập nguyên vật liệu'),
(200, 183, 7, '2023-12-18 11:17:41', '2023-12-18 11:17:41', 'Nhập nguyên vật liệu'),
(201, 178, 7, '2023-12-18 11:17:41', '2023-12-18 11:17:41', 'Nhập nguyên vật liệu'),
(202, 179, 7, '2023-12-18 11:17:41', '2023-12-18 11:17:41', 'Nhập nguyên vật liệu'),
(203, 182, 7, '2023-12-18 11:17:41', '2023-12-18 11:17:41', 'Nhập nguyên vật liệu'),
(204, 187, 4, '2023-12-18 12:35:51', '2023-12-18 12:35:51', 'Nhập nguyên vật liệu'),
(205, 188, 4, '2023-12-18 12:35:51', '2023-12-18 12:35:51', 'Nhập nguyên vật liệu'),
(206, 193, 5, '2023-12-18 12:39:29', '2023-12-18 12:39:29', 'Nhập nguyên vật liệu'),
(207, 198, 5, '2023-12-18 12:39:29', '2023-12-18 12:39:29', 'Nhập nguyên vật liệu'),
(208, 194, 4, '2023-12-18 12:39:52', '2023-12-18 12:39:52', 'Nhập nguyên vật liệu'),
(209, 200, 4, '2023-12-18 12:39:52', '2023-12-18 12:39:52', 'Nhập nguyên vật liệu'),
(210, 201, 4, '2023-12-18 14:17:35', '2023-12-18 14:17:35', 'Nhập nguyên vật liệu'),
(211, 203, 4, '2023-12-18 14:17:35', '2023-12-18 14:17:35', 'Nhập nguyên vật liệu'),
(212, 192, 5, '2023-12-18 14:17:41', '2023-12-18 14:17:41', 'Nhập nguyên vật liệu');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `quantity`, `price`, `status`, `created_date`, `expiration_date`) VALUES
(35, 'Thanh sô cô la', 'Thanh sô cô la thơm ngon', 50, 6000, 'Đã xuất kho', '2023-11-04 13:26:59', '2023-12-12 20:17:07'),
(36, 'Gummy Bears', 'Bánh gummy vị trái cây', 40, 4500, 'Đang chờ nhập ', '2023-11-04 13:27:00', '2023-12-14 00:32:31'),
(37, 'Kẹo mút', 'Kẹo mút nhiều màu sắc và hương vị', 30, 3000, 'Đã nhập kho', '2023-11-04 13:27:00', '2023-12-12 20:17:12'),
(38, 'Bánh kẹo dẻo', 'Bánh kẹo dẻo mềm mại', 20, 4000, 'Đang chờ nhập ', '2023-11-04 13:27:00', '2023-12-14 00:40:31'),
(39, 'Kẹo caramel', 'Kẹo caramel béo ngậy', 35, 6000, 'Hàng lỗi', '2023-12-17 20:38:17', '2023-12-17 20:38:17'),
(40, 'Kẹo dừa', 'Kẹo dừa mềm mại và ngọt ngào', 25, 8000, 'Đã kiểm tra', '2023-12-17 20:37:37', '2023-12-17 20:37:37'),
(41, 'Hạt dẻ cười', 'Hạt dẻ cười nhiều màu sắc và hương vị', 45, 3000, 'Đã kiểm tra', '2023-12-17 20:37:37', '2023-12-17 20:37:37'),
(42, 'Kẹo bông', 'Kẹo bông mềm và ngọt ngào', 30, 4000, 'Đã kiểm tra', '2023-12-18 14:37:05', '2023-12-18 14:37:05'),
(43, 'Hạt kẹo cứng', 'Hạt kẹo cứng dai và lâu tan', 20, 6000, 'Đã kiểm tra', '2023-12-18 14:39:17', '2023-12-18 14:39:17'),
(44, 'Kẹo mè đen', 'Thanh kẹo mè đen cổ điển', 40, 4500, 'Đã kiểm tra', '2023-12-17 20:38:15', '2023-12-17 20:38:15'),
(45, 'Kẹo đá muối', 'Kẹo đá màu sắc và tinh thể', 35, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(46, 'Kẹo fudge', 'Kẹo fudge sô cô la béo ngậy', 25, 8000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(47, 'Kẹo cây', 'Kẹo cây bạc hà truyền thống', 45, 3000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(48, 'Kẹo bơ', 'Kẹo bơ mềm và béo ngậy', 30, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(49, 'Sour Belts', 'Dây kẹo chua chua', 20, 6000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(50, 'Candy Corn', 'Kẹo ngô Halloween cổ điển', 40, 4500, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(51, 'Taffy', 'Kẹo mút biển mặn dai', 35, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(52, 'Peppermint Patties', 'Bánh quy bạc hà phủ sô cô la', 25, 8000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(53, 'Suckers', 'Kẹo mút đa hương vị', 45, 3000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(54, 'Hạt kẹo cứng', 'Hạt kẹo cứng lớn nhiều màu sắc', 30, 4000, 'Đã kiểm tra', '2023-12-17 20:38:15', '2023-12-17 20:38:15'),
(56, 'Candy Corn', '', 12, 0, 'Yêu cầu nhập Thành phẩm', '2023-12-14 19:49:48', '2023-12-14 19:49:48'),
(57, 'Kẹo Dừa', 'làm từ dừa', 12, 12000, 'Đã kiểm tra', '2023-12-17 20:36:14', '2023-12-17 20:36:14'),
(62, 'Kẹo', 'kẹo', 0, 21000, 'Thành phẩm mới', '2024-12-17 00:00:00', '2023-12-18 08:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `product_id`, `inventory_id`, `status`, `time`) VALUES
(40, 39, 5, 'Hàng lỗi, trả hàng', '2023-12-17 20:38:17'),
(41, 40, 5, 'Nhập kho', '2023-12-17 20:37:37'),
(42, 41, 5, 'Nhập kho', '2023-12-17 20:37:37'),
(43, 44, 5, 'Nhập kho', '2023-12-17 20:38:15'),
(44, 57, 5, 'Nhập kho', '2023-12-17 14:35:58'),
(45, 54, 5, 'Nhập kho', '2023-12-17 20:38:15'),
(47, 42, 5, 'Nhập kho', '2023-12-18 14:37:05'),
(48, 43, 5, 'Nhập kho', '2023-12-18 14:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(10) UNSIGNED NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `expiration_time` datetime NOT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_id`, `resource_name`, `quantity`, `status`, `price`, `created_time`, `expiration_time`, `update_time`) VALUES
(291, 'Duong', 10, 'Xuất NVL', 0, '2023-11-28 05:36:09', '2024-11-27 00:00:00', '2023-12-01 17:01:23'),
(292, 'sua', 20, 'Xuất NVL\n', 0, '2023-11-28 05:36:09', '2024-11-27 00:00:00', '2023-12-01 16:47:05'),
(293, 'mat ong', 2, 'Xuất NVL', 0, '2023-11-28 05:36:11', '2024-11-27 00:00:00', '2023-12-01 16:53:18'),
(294, 'socola', 20, 'Xuất NVL', 0, '2023-11-28 05:36:09', '2024-11-27 00:00:00', '2023-12-01 16:53:18'),
(295, 'Duong', 10, 'Xuất NVL', 0, '2023-11-28 16:56:31', '2024-11-27 00:00:00', '2023-12-01 17:01:23'),
(296, 'Sua', 20, 'Xuất NVL', 0, '2023-11-28 16:56:34', '2024-11-27 00:00:00', '2023-12-01 17:01:23'),
(297, 'Socola', 30, 'Xuất NVL', 0, '2023-11-28 16:56:31', '2024-11-27 00:00:00', '2023-12-01 17:01:23'),
(298, 'Vani', 40, 'Xuất NVL', 0, '2023-11-28 16:57:12', '2024-11-27 00:00:00', '2023-12-01 17:05:43'),
(299, 'D?u', 50, 'Xuất NVL', 0, '2023-11-28 16:57:12', '2024-11-27 00:00:00', '2023-12-01 17:05:43'),
(300, 'Duong', 10, 'Xuất NVL', 0, '2023-12-01 17:30:43', '2024-11-30 00:00:00', '2023-12-01 17:32:21'),
(301, 'Sua', 20, 'Xuất NVL', 0, '2023-12-01 17:30:43', '2024-11-30 00:00:00', '2023-12-01 17:32:21'),
(302, 'Socola', 2, 'Xuất NVL', 0, '2023-12-01 17:30:43', '2024-11-30 00:00:00', '2023-12-01 17:32:21'),
(303, 'Vani', 40, 'Xuất NVL', 0, '2023-12-01 17:30:43', '2024-11-30 00:00:00', '2023-12-01 17:32:21'),
(304, 'D?u', 123, 'Xuất NVL', 0, '2023-12-01 17:30:43', '2024-11-30 00:00:00', '2023-12-01 17:32:21'),
(305, 'Duong', 10, 'Hàng lỗi', 0, '2023-12-05 22:17:53', '2024-12-04 00:00:00', NULL),
(306, 'Sua', 20, 'Hàng lỗi', 0, '2023-12-05 22:17:53', '2024-12-04 00:00:00', NULL),
(307, 'Socola', 30, 'Xuất NVL', 0, '2023-12-05 22:17:50', '2024-12-04 00:00:00', '2023-12-05 22:21:18'),
(308, 'Vani', 40, 'Xuất NVL', 0, '2023-12-05 22:17:50', '2024-12-04 00:00:00', '2023-12-05 22:21:18'),
(309, 'D?u', 12, 'Xuất NVL', 0, '2023-12-05 22:17:50', '2024-12-04 00:00:00', '2023-12-05 22:21:23'),
(310, 'Duong', 12, 'Xuất NVL', 0, '2023-12-05 22:25:59', '2024-12-04 00:00:00', '2023-12-08 11:02:17'),
(311, 'Sua', 20, 'Xuất NVL', 0, '2023-12-05 22:25:59', '2024-12-04 00:00:00', '2023-12-08 11:02:17'),
(312, 'Socola', 30, 'Xuất NVL', 0, '2023-12-05 22:25:59', '2024-12-04 00:00:00', '2023-12-08 11:02:17'),
(313, 'Vani', 40, 'Xuất NVL', 0, '2023-12-05 22:27:18', '2024-12-04 00:00:00', '2023-12-07 18:43:34'),
(314, 'D?u', 50, 'Xuất NVL', 0, '2023-12-05 22:27:18', '2024-12-04 00:00:00', '2023-12-07 18:43:34'),
(315, 'Duong', 10, 'Xuất NVL', 0, '2023-12-06 00:17:20', '2024-12-05 00:00:00', '2023-12-07 18:43:34'),
(316, 'Sua', 20, 'Xuất NVL', 0, '2023-12-06 00:17:20', '2024-12-05 00:00:00', '2023-12-07 18:43:34'),
(317, 'Socola', 23, 'Xuất NVL', 0, '2023-12-06 00:17:20', '2024-12-05 00:00:00', '2023-12-07 18:43:34'),
(318, 'Vani', 40, 'Xuất NVL', 0, '2023-12-06 00:17:20', '2024-12-05 00:00:00', '2023-12-07 18:43:34'),
(319, 'D?u', 50, 'Xuất NVL', 0, '2023-12-06 00:17:20', '2024-12-05 00:00:00', '2023-12-07 18:43:34'),
(320, 'Duong', 10, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(321, 'Sua', 20, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(322, 'Socola', 12, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(323, 'Vani', 23, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(324, 'D?u', 50, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(325, 'Duong', 10, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(326, 'Sua', 20, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(327, 'Socola', 30, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(328, 'Vani', 40, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(329, 'D?u', 50, 'Xuất NVL', 0, '2023-12-07 18:04:42', '2024-12-06 00:00:00', '2023-12-07 18:43:34'),
(330, 'Duong', 10, 'Xuất NVL', 0, '2023-12-08 11:00:08', '2024-12-07 00:00:00', '2023-12-08 11:02:17'),
(331, 'Sua', 20, 'Xuất NVL', 0, '2023-12-08 11:00:08', '2024-12-07 00:00:00', '2023-12-08 11:02:17'),
(332, 'Socola', 30, 'Xuất NVL', 0, '2023-12-08 11:00:08', '2024-12-07 00:00:00', '2023-12-08 11:02:17'),
(333, 'Vani', 40, 'Xuất NVL', 0, '2023-12-08 11:00:08', '2024-12-07 00:00:00', '2023-12-08 11:02:17'),
(334, 'D?u', 50, 'Xuất NVL', 0, '2023-12-08 11:00:08', '2024-12-07 00:00:00', '2023-12-08 11:02:17'),
(335, 'Duong', 10, 'Yêu cầu xuất NVL', 0, '2023-12-12 19:35:54', '2024-12-11 00:00:00', NULL),
(336, 'Sua', 20, 'Yêu cầu xuất NVL', 0, '2023-12-12 19:35:54', '2024-12-11 00:00:00', NULL),
(337, 'Socola', 30, 'Yêu cầu xuất NVL', 0, '2023-12-12 19:35:54', '2024-12-11 00:00:00', NULL),
(338, 'Vani', 40, 'Xuất NVL', 0, '2023-12-12 19:35:54', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(339, 'D?u', 50, 'Xuất NVL', 0, '2023-12-12 19:35:54', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(340, 'Duong', 10, 'Xuất NVL', 0, '2023-12-12 20:21:56', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(341, 'Sua', 20, 'Hàng lỗi', 0, '2023-12-12 20:22:02', '2024-12-11 00:00:00', NULL),
(342, 'Socola', 30, 'Hàng lỗi', 0, '2023-12-12 20:22:02', '2024-12-11 00:00:00', NULL),
(343, 'Vani', 40, 'Yêu cầu xuất NVL', 0, '2023-12-12 20:21:56', '2024-12-11 00:00:00', NULL),
(344, 'D?u', 50, 'Yêu cầu xuất NVL', 0, '2023-12-12 20:21:56', '2024-12-11 00:00:00', NULL),
(345, 'Duong', 10, 'Xuất NVL', 0, '2023-12-12 20:33:21', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(346, 'Sua', 20, 'Xuất NVL', 0, '2023-12-12 20:34:03', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(347, 'Socola', 30, 'Xuất NVL', 0, '2023-12-12 20:34:03', '2024-12-11 00:00:00', '2023-12-18 14:20:11'),
(348, 'Vani', 40, 'Yêu cầu xuất NVL', 0, '2023-12-12 20:33:21', '2024-12-11 00:00:00', NULL),
(349, 'D?u', 50, 'Yêu cầu xuất NVL', 0, '2023-12-12 20:33:21', '2024-12-11 00:00:00', NULL),
(350, 'Duong', 10, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-16 00:00:00', NULL),
(351, 'Sua', 20, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-16 00:00:00', NULL),
(352, 'Socola', 30, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:02', '2024-12-16 00:00:00', NULL),
(353, 'Vani', 40, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:02', '2024-12-16 00:00:00', NULL),
(354, 'D?u', 50, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:02', '2024-12-16 00:00:00', NULL),
(355, 'Duong', 10, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-17 00:00:00', NULL),
(356, 'Sua', 20, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-17 00:00:00', NULL),
(357, 'Socola', 30, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-17 00:00:00', NULL),
(358, 'Vani', 40, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-17 00:00:00', NULL),
(359, 'D?u', 50, 'Yêu cầu xuất NVL', 0, '2023-12-18 11:16:20', '2024-12-17 00:00:00', NULL),
(360, 'Duong', 12, 'Yêu cầu xuất NVL', 0, '2023-12-18 12:35:04', '2024-12-17 00:00:00', NULL),
(361, 'Sua', 50, 'Yêu cầu xuất NVL', 0, '2023-12-18 12:35:04', '2024-12-17 00:00:00', NULL),
(362, 'Socola', 23, 'Hàng lỗi', 0, '2023-12-18 12:35:06', '2024-12-17 00:00:00', NULL),
(363, 'Duong', 12, 'Yêu cầu xuất NVL', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(364, 'Sua', 50, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(365, 'Socola', 23, 'Yêu cầu xuất NVL', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(366, 'Duong', 12, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(367, 'Sua', 50, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(368, 'Socola', 23, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(369, 'Duong', 10, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(370, 'Sua', 20, 'Đã kiểm tra', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(371, 'Socola', 30, 'Đã lưu kho', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(372, 'Vani', 40, 'Đã lưu kho', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(373, 'D?u', 50, 'Đã lưu kho', 0, '2023-12-18 12:39:08', '2024-12-17 00:00:00', NULL),
(374, 'Duong', 12, 'Yêu cầu xuất NVL', 0, '2023-12-18 14:17:11', '2024-12-17 00:00:00', NULL),
(375, 'Sua', 30, 'Hàng lỗi', 0, '2023-12-18 14:17:14', '2024-12-17 00:00:00', NULL),
(376, 'Keo', 20, 'Yêu cầu xuất NVL', 0, '2023-12-18 14:17:11', '2024-12-17 00:00:00', NULL),
(377, 'Duong', 10, 'Đã kiểm tra', 0, '2023-12-18 14:31:53', '2024-12-17 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resource_detail`
--

CREATE TABLE `resource_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_detail`
--

INSERT INTO `resource_detail` (`id`, `resource_id`, `inventory_id`, `status`, `time`) VALUES
(118, 291, 3, 'Nhập kho', '2023-11-28 05:36:09'),
(119, 292, 3, 'Nhập kho', '2023-11-28 05:36:09'),
(120, 293, 3, 'Hàng lỗi, trả hàng', '2023-11-28 05:36:11'),
(121, 294, 3, 'Nhập kho', '2023-11-28 05:36:09'),
(122, 295, 3, 'Nhập kho', '2023-11-28 16:56:31'),
(123, 296, 3, 'Hàng lỗi, trả hàng', '2023-11-28 16:56:34'),
(124, 297, 3, 'Nhập kho', '2023-11-28 16:56:31'),
(125, 298, 4, 'Nhập kho', '2023-11-28 16:57:12'),
(126, 299, 4, 'Nhập kho', '2023-11-28 16:57:12'),
(127, 300, 3, 'Nhập kho', '2023-12-01 17:30:43'),
(128, 301, 3, 'Nhập kho', '2023-12-01 17:30:43'),
(129, 302, 3, 'Nhập kho', '2023-12-01 17:30:43'),
(130, 303, 3, 'Nhập kho', '2023-12-01 17:30:43'),
(131, 304, 3, 'Nhập kho', '2023-12-01 17:30:43'),
(132, 305, 3, 'Hàng lỗi, trả hàng', '2023-12-05 22:17:53'),
(133, 306, 3, 'Hàng lỗi, trả hàng', '2023-12-05 22:17:53'),
(134, 307, 3, 'Nhập kho', '2023-12-05 22:17:50'),
(135, 308, 3, 'Nhập kho', '2023-12-05 22:17:50'),
(136, 309, 3, 'Nhập kho', '2023-12-05 22:17:50'),
(137, 310, 3, 'Nhập kho', '2023-12-05 22:25:59'),
(138, 311, 3, 'Nhập kho', '2023-12-05 22:25:59'),
(139, 312, 3, 'Nhập kho', '2023-12-05 22:25:59'),
(140, 313, 4, 'Nhập kho', '2023-12-05 22:27:18'),
(141, 314, 4, 'Nhập kho', '2023-12-05 22:27:18'),
(142, 315, 4, 'Nhập kho', '2023-12-06 00:17:20'),
(143, 316, 4, 'Nhập kho', '2023-12-06 00:17:20'),
(144, 317, 4, 'Nhập kho', '2023-12-06 00:17:20'),
(145, 318, 4, 'Nhập kho', '2023-12-06 00:17:20'),
(146, 319, 4, 'Nhập kho', '2023-12-06 00:17:20'),
(147, 325, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(148, 326, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(149, 327, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(150, 328, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(151, 329, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(152, 320, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(153, 321, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(154, 322, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(155, 323, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(156, 324, 4, 'Nhập kho', '2023-12-07 18:04:42'),
(157, 330, 3, 'Nhập kho', '2023-12-08 11:00:08'),
(158, 331, 3, 'Nhập kho', '2023-12-08 11:00:08'),
(159, 332, 3, 'Nhập kho', '2023-12-08 11:00:08'),
(160, 333, 3, 'Nhập kho', '2023-12-08 11:00:08'),
(161, 334, 3, 'Nhập kho', '2023-12-08 11:00:08'),
(162, 335, 3, 'Nhập kho', '2023-12-12 19:35:54'),
(163, 336, 3, 'Nhập kho', '2023-12-12 19:35:54'),
(164, 337, 3, 'Nhập kho', '2023-12-12 19:35:54'),
(165, 338, 3, 'Nhập kho', '2023-12-12 19:35:54'),
(166, 339, 3, 'Nhập kho', '2023-12-12 19:35:54'),
(167, 340, 3, 'Nhập kho', '2023-12-12 20:21:56'),
(168, 341, 3, 'Hàng lỗi, trả hàng', '2023-12-12 20:22:02'),
(169, 342, 3, 'Hàng lỗi, trả hàng', '2023-12-12 20:22:02'),
(170, 343, 3, 'Nhập kho', '2023-12-12 20:21:56'),
(171, 344, 3, 'Nhập kho', '2023-12-12 20:21:56'),
(172, 345, 3, 'Nhập kho', '2023-12-12 20:33:21'),
(173, 346, 3, 'Nhập kho', '2023-12-12 20:34:03'),
(174, 347, 3, 'Nhập kho', '2023-12-12 20:34:03'),
(175, 348, 3, 'Nhập kho', '2023-12-12 20:33:21'),
(176, 349, 3, 'Nhập kho', '2023-12-12 20:33:21'),
(177, 355, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(178, 356, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(179, 357, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(180, 358, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(181, 359, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(182, 350, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(183, 351, 4, 'Nhập kho', '2023-12-18 11:16:20'),
(184, 352, 3, 'Nhập kho', '2023-12-18 11:16:02'),
(185, 353, 3, 'Nhập kho', '2023-12-18 11:16:02'),
(186, 354, 3, 'Nhập kho', '2023-12-18 11:16:02'),
(187, 360, 3, 'Nhập kho', '2023-12-18 12:35:04'),
(188, 361, 3, 'Nhập kho', '2023-12-18 12:35:04'),
(189, 362, 3, 'Hàng lỗi, trả hàng', '2023-12-18 12:35:06'),
(190, 369, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(191, 370, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(192, 371, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(193, 372, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(194, 373, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(195, 366, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(196, 367, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(197, 368, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(198, 363, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(199, 364, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(200, 365, 3, 'Nhập kho', '2023-12-18 12:39:08'),
(201, 374, 3, 'Nhập kho', '2023-12-18 14:17:11'),
(202, 375, 3, 'Hàng lỗi, trả hàng', '2023-12-18 14:17:14'),
(203, 376, 3, 'Nhập kho', '2023-12-18 14:17:11'),
(204, 377, 3, 'Nhập kho', '2023-12-18 14:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `nickname`) VALUES
(1, 'Ban Giám Đốc', 'BGD'),
(2, 'Quản Lý Kho Nguyên Vật Liệu', 'QL_NVL'),
(3, 'Quản Lý Kho Thành Phẩm', 'QL_TP'),
(4, 'Nhân viên kho NVL', 'NVK_NVL'),
(5, 'Nhân viên kiểm kê NVL', 'NVKK_NVL'),
(6, 'Nhân viên kiểm hàng NVL', 'NVKH_NVL'),
(7, 'Nhân viên bán hàng', 'NVBH_NVL'),
(8, 'Nhân viên yêu cầu', 'NVYC'),
(9, 'Nhân viên kho Thành Phẩm', 'NVK_TP'),
(10, 'Nhân viên kiểm kê TP', 'NVKK_TP');

-- --------------------------------------------------------

--
-- Table structure for table `shelves`
--

CREATE TABLE `shelves` (
  `shelves_id` int(10) UNSIGNED NOT NULL,
  `shelves_name` varchar(255) NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `capacity` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelves`
--

INSERT INTO `shelves` (`shelves_id`, `shelves_name`, `inventory_id`, `capacity`, `status`) VALUES
(4, 'Ke 1', 3, 433, 0),
(5, 'Ke 2', 3, 338, 0),
(6, 'Ke 3', 4, 350, 0),
(7, 'Ke 4', 4, 220, 0),
(8, 'Kệ thành phẩm 1', 5, 1000, 0),
(9, 'Kệ thành phẩm 2', 5, 500, 0),
(10, 'Kệ thành phẩm 3', 6, 500, 0),
(11, 'Kệ thành phẩm 4', 6, 800, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_test`
-- (See below for the actual view)
--
CREATE TABLE `view_test` (
);

-- --------------------------------------------------------

--
-- Structure for view `view_test`
--
DROP TABLE IF EXISTS `view_test`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_test`  AS SELECT `resource`.`resource_name` AS `resource_name` FROM (`resource` join `issue_resources` on(`issue_resources`.`resource_id` = `resource`.`resource_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_roles_employee` (`role_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `fk_type_inventory` (`type_id`);

--
-- Indexes for table `inventory_check`
--
ALTER TABLE `inventory_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory_ic` (`inventory_id`),
  ADD KEY `fk_product_ic` (`resource_id`),
  ADD KEY `fk_employee_ic` (`employee_id`);

--
-- Indexes for table `inventory_details`
--
ALTER TABLE `inventory_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory_details` (`inventory_id`),
  ADD KEY `fk_employee_details` (`employee_id`);

--
-- Indexes for table `inventory_type`
--
ALTER TABLE `inventory_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_products`
--
ALTER TABLE `issue_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shelves_isd` (`shelves_id`),
  ADD KEY `fk_details` (`products_detail_id`);

--
-- Indexes for table `issue_resources`
--
ALTER TABLE `issue_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shelves_ir` (`shelves_id`),
  ADD KEY `fk_resource_detail_ir` (`resource_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `resource_detail`
--
ALTER TABLE `resource_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resource_detail` (`resource_id`),
  ADD KEY `fk_inventory_detail` (`inventory_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shelves`
--
ALTER TABLE `shelves`
  ADD PRIMARY KEY (`shelves_id`),
  ADD KEY `fk_inventory_shelves` (`inventory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory_check`
--
ALTER TABLE `inventory_check`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `inventory_details`
--
ALTER TABLE `inventory_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inventory_type`
--
ALTER TABLE `inventory_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue_products`
--
ALTER TABLE `issue_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_resources`
--
ALTER TABLE `issue_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `resource_detail`
--
ALTER TABLE `resource_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shelves`
--
ALTER TABLE `shelves`
  MODIFY `shelves_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_roles_employee` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_type_inventory` FOREIGN KEY (`type_id`) REFERENCES `inventory_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_check`
--
ALTER TABLE `inventory_check`
  ADD CONSTRAINT `fk_employee_ic` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_ic` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resource_ic` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_details`
--
ALTER TABLE `inventory_details`
  ADD CONSTRAINT `fk_employee_details` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_details` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_products`
--
ALTER TABLE `issue_products`
  ADD CONSTRAINT `fk_details` FOREIGN KEY (`products_detail_id`) REFERENCES `products_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shelves_isd` FOREIGN KEY (`shelves_id`) REFERENCES `shelves` (`shelves_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_resources`
--
ALTER TABLE `issue_resources`
  ADD CONSTRAINT `fk_resource_detail_ir` FOREIGN KEY (`resource_detail_id`) REFERENCES `resource_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shelves_ir` FOREIGN KEY (`shelves_id`) REFERENCES `shelves` (`shelves_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `inventory_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resource_detail`
--
ALTER TABLE `resource_detail`
  ADD CONSTRAINT `fk_inventory_detail` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resource_detail` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelves`
--
ALTER TABLE `shelves`
  ADD CONSTRAINT `fk_inventory_shelves` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
