-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dharampura', 1, '2022/06/28 08:19:17 PM', '2022/06/28 08:19:17 PM'),
(2, 'Mughalpura', 1, '2022/06/29 03:03:20 PM', '2022/06/29 03:03:20 PM'),
(3, 'Murgi khana', 1, '2022/08/30 12:25:27 PM', '2022/08/30 12:25:27 PM');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(45, 2, 3, '??', '2022/08/31 10:06:48 AM'),
(47, 3, 2, '?', '2022/09/01 10:07:37 AM');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `fullname`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abd', 'abdul@gmail.com', '+1 (302) 394-6938', 'a', 0, '2022/06/27 09:22:37 PM', '2022/06/27 09:22:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `recover_auth`
--

CREATE TABLE `recover_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `route_id`, `status`, `created_at`, `updated_at`) VALUES
(30, 2, 1, 1, '2022/09/01 10:30:54 AM', '2022/09/01 10:31:43 AM');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `arrival` varchar(11) DEFAULT NULL,
  `departure` varchar(11) DEFAULT NULL,
  `fare` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `user_id`, `vehicle_id`, `location_id`, `arrival`, `departure`, `fare`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '12:00 AM', '12:00 AM', '500', 1, '2022/06/29 01:03:42 AM', '2022/06/29 03:45:36 PM'),
(4, 3, 2, 3, '12:00 AM', '12:30 AM', '400', 1, '2022/08/31 11:07:52 AM', '2022/08/31 11:07:52 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `about`, `address`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Ali', 'ali@gmail.com', 'aa5f9f65b56c061344c609e01f3f021e', 'avatar1656350290A PIC.jpg', 'a', '2055 Limestone Rd STE 200-C, W', '+1 (302) 39', 2, 1, '2022/06/27 08:37:25 PM', '2022/06/29 04:33:41 PM'),
(2, 'Abdul', 'Hannan', 'passenger@gmail.com', 'aa5f9f65b56c061344c609e01f3f021e', 'avatar16619240716608640.jpg', 'df', 'df', '03204322564', 0, 1, '2022/06/29 01:52:13 PM', '2022/08/22 07:35:28 PM'),
(3, 'Abdul', 'Rafay', 'driver@gmail.com', 'aa5f9f65b56c061344c609e01f3f021e', 'avatar16611975860bde97c98254046a241d5fa877b9c205.jpg', 'jkn', 'df', '03204322564', 1, 0, '2022/06/29 05:10:07 PM', '2022/09/01 10:00:49 AM');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(11) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `seats` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `type`, `brand`, `color`, `seats`, `model`, `reg_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Car', 'honda', 'black', '4', '2016', '1551', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recover_auth`
--
ALTER TABLE `recover_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recover_auth`
--
ALTER TABLE `recover_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
