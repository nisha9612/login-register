-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 10:18 AM
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
-- Database: `login-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `image_path` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `image_path`, `created_at`, `deleted`) VALUES
(1, 3, 'uploads/download (2).jpg', '2024-01-19 10:11:02', 0),
(2, 3, 'uploads/download (3).jpg', '2024-01-19 10:11:02', 0),
(3, 1, 'uploads/download (6).jpg', '2024-01-19 10:15:20', 0),
(4, 1, 'uploads/download (7).jpg', '2024-01-19 10:15:20', 0),
(5, 1, 'uploads/download (8).jpg', '2024-01-19 10:15:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_type`, `username`, `email`, `password`, `confirm_password`, `created_at`, `deleted`) VALUES
(1, 'admin', 'Nisha', 'nishasonawane12@gmail.com', '$2y$10$/W2n5X1D/SzyOOpYioFIYuHg4VtEUDHW0/pf57bFW0DYS/R76eBJS', '$2y$10$/W2n5X1D/SzyOOpYioFIYuHg4VtEUDHW0/pf57bFW0DYS/R76eBJS', '2024-01-19 09:18:49', 0),
(2, 'user', 'Pooja', 'pooja21@gmail.com', '$2y$10$NyCPV.I.3wToJJNlaOYOiu/G3cnIs.5d2A/2fzaF4uK0u8aV1oGBu', '$2y$10$NyCPV.I.3wToJJNlaOYOiu/G3cnIs.5d2A/2fzaF4uK0u8aV1oGBu', '2024-01-19 09:21:54', 0),
(3, 'user', 'Atharva', 'atharv22@gmail.com', '$2y$10$OhWvajehuQS2VtWbWNf1meOZ9.63jWlUbe3DEoLvWRXF8t8nTgzX6', '$2y$10$OhWvajehuQS2VtWbWNf1meOZ9.63jWlUbe3DEoLvWRXF8t8nTgzX6', '2024-01-19 10:06:29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
