-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 02:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prirodaleci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `fk_order` int(11) NOT NULL,
  `delivery_number` int(11) NOT NULL,
  `post_express` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `time` datetime NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Neposlato','Poslato','Stiglo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lastname`, `address`, `zip`, `time`, `phone`, `email`, `status`, `note`) VALUES
(55, 'Perke Peric', 'eqeqeqe', 'Jovana Bjelica 1', 37000, '2021-06-14 16:18:02', '1231231', 'nenad.peric@outlook.com', 'Neposlato', 'qeqeqeqeqeq'),
(56, 'Perke Peric', '', '', 0, '2021-07-03 16:59:00', '123123', 'nenad.peric@outlook.com', 'Neposlato', ''),
(57, 'Perke Peric', 'eeee', 'Jovana Bjelica 1', 37000, '2021-07-29 15:07:57', '12312312313', 'nenad.peric@outlook.com', 'Neposlato', 'rrrrrr'),
(58, 'Perke Peric', 'qeqeq', 'Jovana Bjelica 1', 37000, '2021-07-29 15:08:59', '12312312313', 'nenad.peric@outlook.com', 'Neposlato', 'qeqe'),
(59, 'Perke Peric', 'dddd', 'Jovana Bjelica 1', 37000, '2021-07-30 16:06:37', '12312312313', 'nenad.peric@outlook.com', 'Neposlato', 'qweqe');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `fk_order` int(11) NOT NULL,
  `item` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `fk_order`, `item`, `quantity`) VALUES
(10, 55, 'nonbak', 12),
(11, 55, 'postkovid', 12),
(12, 57, 'nonbak', 1),
(13, 58, 'nonbak', 1),
(14, 59, 'nonbak', 11);

-- --------------------------------------------------------

--
-- Table structure for table `storage_items`
--

CREATE TABLE `storage_items` (
  `id` int(11) NOT NULL,
  `item` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_items`
--

INSERT INTO `storage_items` (`id`, `item`, `quantity`) VALUES
(1, 'nonbak', 111),
(2, 'postkovid', 1111),
(3, 'nonbak', 55),
(4, 'postkovid', 55),
(5, 'nonbak', 1),
(6, 'postkovid', 1),
(7, 'nonbak', 1),
(8, 'postkovid', 2),
(23, 'nonbak', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`fk_order`);

--
-- Indexes for table `storage_items`
--
ALTER TABLE `storage_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `storage_items`
--
ALTER TABLE `storage_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`fk_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
