-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 09:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `product_id`) VALUES
(1, 2, 6),
(2, 2, 10),
(3, 2, 9),
(4, 5, 10),
(5, 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `send_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_name`, `from_email`, `from_phone`, `msg_title`, `msg`, `send_date`, `user_id`) VALUES
(1, 'Ø£Ø­Ù…Ø¯ Ù…Ø­Ù…Ø¯', 'aaa@eee.com', NULL, 'Ø±Ø³Ø§Ù„Ø© Ø¨Ø¹Ù†ÙˆØ§Ù† 1', 'Ù†Øµ Ø§Ù„Ø±Ø³Ø§Ù„Ø© 1 Ù†Øµ Ø§Ù„Ø±Ø³Ø§Ù„Ø© 1 Ù†Øµ Ø§Ù„Ø±Ø³Ø§Ù„Ø© 1 Ù†Øµ Ø§Ù„Ø±Ø³Ø§Ù„Ø© 1', '2021-03-16 21:43:10', NULL),
(2, 'Ø£Ø­Ù…Ø¯ Ù…Ø­Ù…Ø¯', 'aaa@eee.com', NULL, 'Ø±Ø³Ø§Ù„Ø© Ø¨Ø¹Ù†ÙˆØ§Ù† 1', 'Ø±Ø³Ø§Ù„Ø© Ø¨Ø¹Ù†ÙˆØ§Ù† 1 Ø±Ø³Ø§Ù„Ø© Ø¨Ø¹Ù†ÙˆØ§Ù† 1 Ø±Ø³Ø§Ù„Ø© Ø¨Ø¹Ù†ÙˆØ§Ù† 1', '2021-03-22 22:43:47', 5),
(3, 'as', 'moh154231@gmail.com', NULL, 'as', 's', '2022-03-28 21:47:15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_num` int(5) NOT NULL,
  `total_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(2) NOT NULL DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_num`, `total_price`, `order_status`, `order_date`) VALUES
(1, 2, 7, '12.4', 1, '2021-03-17 20:56:42'),
(2, 5, 1, '330', 1, '2021-03-22 22:42:14'),
(3, 3, 2, '70.9', 2, '2021-03-25 21:08:27'),
(4, 3, 3, '582', 1, '2021-04-01 22:07:22'),
(5, 3, 4, '120', 1, '2021-04-01 22:10:45'),
(6, 3, 5, '600', 1, '2021-04-01 22:13:52'),
(7, 6, 1, '120', 1, '2022-03-28 21:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `type` int(2) DEFAULT NULL,
  `available_quantity` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_status` int(1) DEFAULT NULL,
  `discount_status` int(1) DEFAULT NULL,
  `discount_percent` int(3) DEFAULT NULL,
  `price_after_discount` float DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `available_quantity`, `available_status`, `discount_status`, `discount_percent`, `price_after_discount`, `about`, `image`) VALUES
(6, 'منتج', 4.5, 1, '0', 1, 1, 25, 2.9, 'وصف', 'uploads/products/1604681551_51WtMtoKA+L._AC_SY400_.jpg'),
(10, 'منتج', 3.75, 6, '0', 1, 0, 0, 0, 'وصف', 'uploads/products/1604681733_pngtree-opening-season-watercolor-pen-illustration-image_1211101.jpg'),
(11, 'منتج', 66, 1, '0', NULL, NULL, NULL, NULL, 'وصف', 'uploads/products/1615919063_asset-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `order_num` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `phone`, `pass`, `type`, `order_num`) VALUES
(1, 'admin', 'admin', 'admin@cpanel.com', NULL, '1234554321', 0, 1),
(4, 'Nasser Nasser', 'Nasser', 'aa@aa.com', '009746634565', '1234', 1, 1),
(5, 'Nasser', 'Nasser', 'nn@nn.com', '009746634565', '123456', 1, 2),
(6, 'Mohammed F Samour', '120181466', 'moh154231@gmail.com', '+972592384541', '123456', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_order_num` int(5) NOT NULL,
  `order_status` int(1) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `product_id`, `user_order_num`, `order_status`, `product_quantity`, `product_price`) VALUES
(1, 2, 10, 7, 2, 5, 3.75),
(2, 2, 7, 7, 2, 1, 4.9),
(3, 2, 6, 8, 1, 5, 2.9),
(4, 5, 11, 1, 2, 5, 66),
(5, 3, 11, 2, 2, 1, 66),
(6, 3, 7, 2, 2, 1, 4.9),
(7, 3, 12, 3, 2, 1, 120),
(8, 3, 11, 3, 2, 7, 66),
(9, 3, 12, 4, 2, 1, 120),
(10, 3, 12, 5, 2, 5, 120),
(11, 3, 12, 6, 1, 1, 120),
(12, 6, 12, 1, 2, 1, 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
