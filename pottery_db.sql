-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 07:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pottery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(21, 9, 10, 'Handmade ceramic dish ', 150, 1, 'd1.jpg'),
(22, 9, 8, 'Red pot', 259, 1, 'p1.jpg'),
(24, 10, 11, 'Ceramic dish ', 189, 1, 'd2.jpg'),
(25, 10, 12, 'Handmade dish ', 200, 1, 'd3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 9, 'rahul', 'rahul1@gmail.com', '7894561233', 'Hello,\r\nYour service is so good ,and also your product is amazing.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(7, 7, 'khushali', '1234567891', 'khushali123@gmail.com', 'cash on delivery', 'A, 201, sarita soc., punagam, surat, gujarat, india - 360002', 'White pot (399 x 1) - Ceramic dish  (189 x 1) - ', 588, '2024-10-15', 'completed'),
(8, 5, 'vandan patel', '1234658971', 'vandan1@gmail.com', 'cash on delivery', 'A, 201, sarita soc., punagam, surat, gujarat, india - 395010', 'Ceramic Mug (159 x 1) - Rajesthani Red pot (450 x 1) - ', 609, '2024-10-15', 'pending'),
(9, 8, 'gaurang', '1212454578', 'gaurang1@gmail.com', 'cash on delivery', 'B, 502, abhainagar, punagam, surat, gujarat, india - 360025', 'Ceramic Unique Decorative Vase  (500 x 1) - ', 500, '2024-10-15', 'pending'),
(10, 8, 'gaurang', '1212454578', 'gaurang1@gmail.com', 'cash on delivery', 'B, 502, abhainagar, punagam, surat, gujarat, india - 360025', 'Handmade ceramic dish  (150 x 1) - ', 150, '2024-10-15', 'pending'),
(11, 9, 'rahul', '7894561233', 'rahul1@gmail.com', 'cash on delivery', 'B, 2, parasnagar, Ghatlodiya, Ahmedabad, gujarat, india - 380052', 'Ceramic dish  (189 x 1) - ', 189, '2024-10-15', 'completed'),
(12, 9, 'rahul', '7894561233', 'rahul1@gmail.com', 'cash on delivery', 'B, 2, parasnagar, Ghatlodiya, Ahmedabad, gujarat, india - 380052', 'Cool Jar (480 x 1) - ', 480, '2024-10-15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`) VALUES
(7, 'White pot', 'Matlu', 400, 'p2.jpg'),
(8, 'Red pot', 'Matlu', 259, 'p1.jpg'),
(9, 'Rajesthani Red pot', 'Matlu', 450, 'p3.png'),
(10, 'Handmade ceramic dish ', 'Dishes', 150, 'd1.jpg'),
(11, 'Ceramic dish ', 'Dishes', 189, 'd2.jpg'),
(12, 'Handmade dish ', 'Dishes', 200, 'd3.jpg'),
(13, 'Mug', 'Mugs', 150, 'm1.jpg'),
(14, 'Ceramic Mug', 'Mugs', 159, 'm2.jpg'),
(15, 'Handmade ceramic Mug', 'Mugs', 189, 'm3.jpg'),
(16, 'Ceramic Unique Decorative Vase ', 'Others Product', 500, 'Ceramic Unique Decorative Vase.jpg'),
(17, 'Cool Jar', 'Others Product', 480, 'cool jar.jpg'),
(18, 'Rosemary Ceramics', 'Others Product', 600, 'aa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(5, 'vandan patel', 'vandan1@gmail.com', '1234658971', '0e2f8a02016fca75f55d8a23a93cd1aa83da369c', 'A, 201, sarita soc., punagam, surat, gujarat, india - 395010'),
(7, 'khushali', 'khushali123@gmail.com', '1234567891', '7725c98cb77f51db7852eb84be5a080d2077c4be', 'A, 201, sarita soc., punagam, surat, gujarat, india - 360002'),
(8, 'gaurang', 'gaurang1@gmail.com', '1212454578', '59992df2f0a21a60e423871962bababb3c7975ea', 'B, 502, abhainagar, punagam, surat, gujarat, india - 360025'),
(9, 'rahul', 'rahul1@gmail.com', '7894561233', 'e7b3fae2e65175774b0b491ff6f2b8f151bc2e46', 'B, 2, parasnagar, Ghatlodiya, Ahmedabad, gujarat, india - 380052'),
(10, 'gaurang', 'parmarparmar1298@gmail.com', '1234567854', '59992df2f0a21a60e423871962bababb3c7975ea', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(4, 9, 12, 'Handmade dish ', 200, 'd3.jpg'),
(5, 9, 11, 'Ceramic dish ', 189, 'd2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
