-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 08:05 PM
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
('CC63298', 2, 'Resource', 'Supplier', '0123456788', 'resource_supplier@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$T2V3QzNiaU40Z09VTnhSOQ$1Ewe0frfV0Ctc3gxp9ujIbfHOt751751cHuzeiujx3o', '1995-02-15', '2023-11-04 13:53:59', '2023-11-17 02:15:17', ''),
('GD00000', 1, 'Hồ Công', 'Thịnh', '0326429044', 'thinhhocm02@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$a2ZsS1RaaEVQU29wbkd0Sg$cf64gg2SXANSAVXfcofHONnr9DjNHDMcC0A3CJvulRs', '2002-11-16', '2023-11-04 07:56:23', '2023-11-17 02:15:22', ''),
('NVYC54705', 8, 'Trần Văn ', 'A', '0123456789', 'a@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Y1ZZQ2tSMVZSZTgxL25YMQ$4aajJFbz+PRi2aMnwdfCqTBmqJcYTbDFiFjTaz2ouAY', '2023-11-08', '2023-11-21 21:16:36', '2023-11-21 21:16:36', ''),
('QL50456', 2, 'Trần Mạnh ', 'Quân', '0912345678', 'manhquan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$djNnVXRwSDlXOFhsd0cxdg$9gaJLXxWfa41mRJNP8+IpapATr6VpmaX/job328G46M', '2002-11-16', '2023-10-26 02:03:42', '2023-11-17 02:17:38', ''),
('QL68745', 2, 'Quan', 'Ly', '0123345654', 'QLmail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Uy82alN2Tnh1ZEJqOXdFLg$4GQvEiE5+UQpzDu4NGB5lkzlJ/4pLWiP/kdL8yqUuUU', '2002-11-16', '2023-10-17 00:29:27', '2023-11-17 02:17:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `inventory_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `type_id`, `inventory_name`, `adress`, `status`) VALUES
(3, 1, 'Kho 1', 'TPHCM', 'Nguyên Vật Liệu'),
(4, 1, 'Kho 2', 'DongNai', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_check`
--

CREATE TABLE `inventory_check` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_date` datetime NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `actual_quantity` int(10) NOT NULL,
  `actual_expiration_date` datetime NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 4, 'QL50456');

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
  `issue_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
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
(127, 80, 6, '2023-11-21 20:57:22', '2023-11-21 20:57:22', 'Nhập nguyên vật liệu'),
(128, 81, 7, '2023-11-21 20:57:25', '2023-11-21 20:57:25', 'Nhập nguyên vật liệu'),
(129, 78, 4, '2023-11-21 20:57:43', '2023-11-21 20:57:43', 'Nhập nguyên vật liệu'),
(130, 79, 5, '2023-11-21 20:57:46', '2023-11-21 20:57:46', 'Nhập nguyên vật liệu'),
(131, 88, 4, '2023-11-21 20:59:04', '2023-11-21 20:59:04', 'Nhập nguyên vật liệu'),
(132, 89, 4, '2023-11-21 20:59:04', '2023-11-21 20:59:04', 'Nhập nguyên vật liệu'),
(133, 86, 7, '2023-11-21 20:59:21', '2023-11-21 20:59:21', 'Nhập nguyên vật liệu'),
(134, 87, 7, '2023-11-21 20:59:21', '2023-11-21 20:59:21', 'Nhập nguyên vật liệu');

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
(35, 'Thanh sô cô la', 'Thanh sô cô la thơm ngon', 50, 6000, 'Có sẵn', '2023-11-04 13:26:59', '2023-11-04 13:26:59'),
(36, 'Gummy Bears', 'Bánh gummy vị trái cây', 40, 4500, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(37, 'Kẹo mút', 'Kẹo mút nhiều màu sắc và hương vị', 30, 3000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(38, 'Bánh kẹo dẻo', 'Bánh kẹo dẻo mềm mại', 20, 4000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(39, 'Kẹo caramel', 'Kẹo caramel béo ngậy', 35, 6000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(40, 'Kẹo dừa', 'Kẹo dừa mềm mại và ngọt ngào', 25, 8000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(41, 'Hạt dẻ cười', 'Hạt dẻ cười nhiều màu sắc và hương vị', 45, 3000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(42, 'Kẹo bông', 'Kẹo bông mềm và ngọt ngào', 30, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(43, 'Hạt kẹo cứng', 'Hạt kẹo cứng dai và lâu tan', 20, 6000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(44, 'Kẹo mè đen', 'Thanh kẹo mè đen cổ điển', 40, 4500, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(45, 'Kẹo đá muối', 'Kẹo đá màu sắc và tinh thể', 35, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(46, 'Kẹo fudge', 'Kẹo fudge sô cô la béo ngậy', 25, 8000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(47, 'Kẹo cây', 'Kẹo cây bạc hà truyền thống', 45, 3000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(48, 'Kẹo bơ', 'Kẹo bơ mềm và béo ngậy', 30, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(49, 'Sour Belts', 'Dây kẹo chua chua', 20, 6000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(50, 'Candy Corn', 'Kẹo ngô Halloween cổ điển', 40, 4500, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(51, 'Taffy', 'Kẹo mút biển mặn dai', 35, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(52, 'Peppermint Patties', 'Bánh quy bạc hà phủ sô cô la', 25, 8000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(53, 'Suckers', 'Kẹo mút đa hương vị', 45, 3000, 'Có sẵn', '2023-11-04 13:27:00', '2023-11-04 13:27:00'),
(54, 'Hạt kẹo cứng', 'Hạt kẹo cứng lớn nhiều màu sắc', 30, 4000, 'Ít', '2023-11-04 13:27:00', '2023-11-04 13:27:00');

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
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_id`, `resource_name`, `quantity`, `status`, `price`, `created_time`, `expiration_time`) VALUES
(263, 'Duong', 10, 'Đã lưu kho', 0, '2023-11-21 20:57:05', '2024-11-20 00:00:00'),
(264, 'sua', 20, 'Đã lưu kho', 0, '2023-11-21 20:57:05', '2024-11-20 00:00:00'),
(265, 'mat ong', 30, 'Đã lưu kho', 0, '2023-11-21 20:57:09', '2024-11-20 00:00:00'),
(266, 'socola', 20, 'Đã lưu kho', 0, '2023-11-21 20:57:09', '2024-11-20 00:00:00'),
(267, 'Duong', 10, 'Đã lưu kho', 0, '2023-11-21 20:58:46', '2024-11-20 00:00:00'),
(268, 'sua', 20, 'Đã lưu kho', 0, '2023-11-21 20:58:46', '2024-11-20 00:00:00'),
(269, 'mat ong', 30, 'Đã lưu kho', 0, '2023-11-21 20:58:50', '2024-11-20 00:00:00'),
(270, 'socola', 20, 'Đã lưu kho', 0, '2023-11-21 20:58:50', '2024-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resource_detail`
--

CREATE TABLE `resource_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_detail`
--

INSERT INTO `resource_detail` (`id`, `resource_id`, `inventory_id`) VALUES
(78, 263, 3),
(79, 264, 3),
(80, 265, 4),
(81, 266, 4),
(82, 265, 4),
(83, 266, 4),
(84, 263, 3),
(85, 264, 3),
(86, 267, 4),
(87, 268, 4),
(88, 269, 3),
(89, 270, 3),
(90, 269, 3),
(91, 270, 3),
(92, 267, 4),
(93, 268, 4);

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
(3, 'Quản Lý Kho Nguyên Thành Phẩm', 'QL_TP'),
(4, 'Nhân viên kho', 'NVK'),
(5, 'Nhân viên kiểm kê', 'NVKK'),
(6, 'Nhân viên kiểm hàng', 'NVKH'),
(7, 'Nhân viên bán hàng', 'NVBH'),
(8, 'Nhân viên yêu cầu', 'NVYC');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `quantity_ordered` int(10) NOT NULL,
  `employee_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sales_order_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 'Ke 1', 3, 440, 0),
(5, 'Ke 2', 3, 580, 0),
(6, 'Ke 3', 4, 470, 0),
(7, 'Ke 4', 4, 450, 0);

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
  ADD KEY `fk_product_ic` (`product_id`),
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
  ADD KEY `fk_issue_isd` (`issue_id`),
  ADD KEY `fk_product_isd` (`product_id`),
  ADD KEY `fk_shelves_isd` (`shelves_id`);

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
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_so` (`employee_id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_sod` (`product_id`),
  ADD KEY `fk_saleorder_sod` (`sales_order_id`);

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
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_check`
--
ALTER TABLE `inventory_check`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_details`
--
ALTER TABLE `inventory_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `resource_detail`
--
ALTER TABLE `resource_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelves`
--
ALTER TABLE `shelves`
  MODIFY `shelves_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_product_ic` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_product_isd` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shelves_isd` FOREIGN KEY (`shelves_id`) REFERENCES `shelves` (`shelves_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_resources`
--
ALTER TABLE `issue_resources`
  ADD CONSTRAINT `fk_resource_detail_ir` FOREIGN KEY (`resource_detail_id`) REFERENCES `resource_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shelves_ir` FOREIGN KEY (`shelves_id`) REFERENCES `shelves` (`shelves_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resource_detail`
--
ALTER TABLE `resource_detail`
  ADD CONSTRAINT `fk_inventory_detail` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resource_detail` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `fk_employee_so` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD CONSTRAINT `fk_product_sod` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_saleorder_sod` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelves`
--
ALTER TABLE `shelves`
  ADD CONSTRAINT `fk_inventory_shelves` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
