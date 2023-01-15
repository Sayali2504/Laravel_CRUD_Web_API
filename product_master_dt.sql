-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 04:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `mobile`, `password`, `profile_image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '9527079474', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '2023-01-06 14:41:47', '2023-01-08 21:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Entertainment', 'enter', 0, '2023-01-07 13:43:14', '2023-01-08 12:23:03'),
(4, 'fashion and lifestyle', 'fashion-and-lifestyle', 1, '2023-01-08 12:30:03', '2023-01-08 12:30:03'),
(6, 'Electronics and telecommunication', 'electronics-and-telecommunication', 1, '2023-01-08 12:31:32', '2023-01-08 12:31:32'),
(24, 'Electronics and telecommunication', 'electronics-and-telecommunication', 0, '2023-01-08 12:38:36', '2023-01-08 12:38:51'),
(25, 'Food', 'food', 1, '2023-01-08 18:51:19', '2023-01-08 18:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories` varchar(250) DEFAULT NULL,
  `product_title` varchar(250) DEFAULT NULL,
  `product_slug` varchar(250) DEFAULT NULL,
  `featured_image` varchar(250) DEFAULT NULL,
  `gallary` varchar(250) DEFAULT NULL,
  `product_description` varchar(300) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories`, `product_title`, `product_slug`, `featured_image`, `gallary`, `product_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Baby suit', 'baby-suit', '1', '1', 'Baby suit for kids of one year', 1, '2023-01-08 13:12:20', '2023-01-08 13:12:20'),
(26, '1,6', 'Mobile', 'mobile', '5', '', '<p>Mobile - I <b>phone 14 pro</b></p>', 1, '2023-01-08 17:41:18', '2023-01-08 17:41:18'),
(27, '1,6', 'Mobile', 'mobile', '6', '', '<p>Mobile - I <b>phone 14 pro</b></p>', 1, '2023-01-08 17:41:26', '2023-01-08 17:41:26'),
(28, '1,6', 'Mobile', 'mobile', '7', '', '<p>Mobile - I <b>phone 14 pro</b></p>', 1, '2023-01-08 17:42:37', '2023-01-08 17:42:37'),
(29, '1,4,24', 'Car', 'car', '11', NULL, '<p>dfb</p>', 1, '2023-01-08 18:50:14', '2023-01-08 18:50:14'),
(30, '1', 'Television setup', 'television-setup', '12', NULL, 'SONY TV', 1, '2023-01-08 18:50:53', '2023-01-08 18:50:53'),
(31, '25', 'Veg pizza', 'veg-pizza', '13', NULL, '<p>Pizz with veg toppings</p>', 1, '2023-01-08 18:52:00', '2023-01-08 18:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `size`, `type`, `path`, `created_at`, `updated_at`) VALUES
(1, '16731789285e04ca5ff9424cd90bed4867012e123b.jpg', '197549', 'image/jpeg', 'uploads/16731789285e04ca5ff9424cd90bed4867012e123b.jpg', '2023-01-08 17:25:28', '2023-01-08 17:25:28'),
(2, '167317896489b4771795f4d9de52afb6dc806c4d2c.jpg', '197549', 'image/jpeg', 'uploads/167317896489b4771795f4d9de52afb6dc806c4d2c.jpg', '2023-01-08 17:26:04', '2023-01-08 17:26:04'),
(3, '16731798096769928efae499df4f155058781ca1b4.jpg', '362026', 'image/jpeg', 'uploads/16731798096769928efae499df4f155058781ca1b4.jpg', '2023-01-08 17:40:09', '2023-01-08 17:40:09'),
(4, '16731798292e607b8d1d7275badc9293c0828eac47.jpg', '362026', 'image/jpeg', 'uploads/16731798292e607b8d1d7275badc9293c0828eac47.jpg', '2023-01-08 17:40:29', '2023-01-08 17:40:29'),
(5, '16731798784d05e2944f811a3164e2d77d4b37655c.jpg', '362026', 'image/jpeg', 'uploads/16731798784d05e2944f811a3164e2d77d4b37655c.jpg', '2023-01-08 17:41:18', '2023-01-08 17:41:18'),
(6, '1673179886ea2f770c77498f257a629f71fb5edeca.jpg', '362026', 'image/jpeg', 'uploads/1673179886ea2f770c77498f257a629f71fb5edeca.jpg', '2023-01-08 17:41:26', '2023-01-08 17:41:26'),
(7, '16731799573964293e03b138ec66d69b7fb33d858c.jpg', '362026', 'image/jpeg', 'uploads/16731799573964293e03b138ec66d69b7fb33d858c.jpg', '2023-01-08 17:42:37', '2023-01-08 17:42:37'),
(8, '167318016645ea588599c348c0f94dd5cd20a776b8.jpg', '747846', 'image/jpeg', 'uploads/167318016645ea588599c348c0f94dd5cd20a776b8.jpg', '2023-01-08 17:46:06', '2023-01-08 17:46:06'),
(9, '16731836559b71b04a2d868015b7b60a4746b757df.jpg', '325103', 'image/jpeg', 'uploads/16731836559b71b04a2d868015b7b60a4746b757df.jpg', '2023-01-08 18:44:15', '2023-01-08 18:44:15'),
(10, '1673183742e9da8299b9a00fc40d65b1eea8aa10e6.jpg', '92442', 'image/jpeg', 'uploads/1673183742e9da8299b9a00fc40d65b1eea8aa10e6.jpg', '2023-01-08 18:45:42', '2023-01-08 18:45:42'),
(11, '16731840146db2aba429d1feb67eff537b7c70a12b.jpg', '577463', 'image/jpeg', 'uploads/16731840146db2aba429d1feb67eff537b7c70a12b.jpg', '2023-01-08 18:50:14', '2023-01-08 18:50:14'),
(12, '16731840539345ead6a67b5efc474aff547ea8cc5e.jpg', '325103', 'image/jpeg', 'uploads/16731840539345ead6a67b5efc474aff547ea8cc5e.jpg', '2023-01-08 18:50:53', '2023-01-08 18:50:53'),
(13, '16731841201073fb81c2b50f6bc3dbafcfb7fb3b43.jpg', '325103', 'image/jpeg', 'uploads/16731841201073fb81c2b50f6bc3dbafcfb7fb3b43.jpg', '2023-01-08 18:52:00', '2023-01-08 18:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Sayali', 'Balkawade', 'balkawadesayali@gmail.com', '09527079474', '', '2023-01-07 12:32:17', '2023-01-07 12:32:17'),
(4, 'Snehal', 'Balkawade', 'balkawadesayali@gmail.com', '6527079474', '', '2023-01-07 12:36:32', '2023-01-07 13:01:05'),
(6, 'Shreya', 'Balkawade', 'Sayali@gmail.com', '9527079472', '$2y$10$ff/e3ZFXmTV/xMJMFv0zmegi3TBmWUF5bhPjB1vLkzdy1pQUbDqDO', '2023-01-08 19:38:00', '2023-01-08 21:09:27'),
(7, 'Sayalii', 'B', 'sayalib@gmail.com', '9527079474', '$2y$10$t5RNynPfmvVWNqxrIZ8cXujPQbi.HbOIx3.OFscQiWldVT8Etse.G', '2023-01-08 20:53:17', '2023-01-08 20:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
