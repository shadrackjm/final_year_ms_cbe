-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 02:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypms`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `g_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL),
(4, 4, NULL, NULL),
(5, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 7, NULL, NULL),
(8, 8, NULL, NULL),
(9, 9, NULL, NULL),
(10, 10, NULL, NULL),
(11, 11, NULL, NULL),
(12, 12, NULL, NULL),
(13, 13, NULL, NULL),
(14, 14, NULL, NULL),
(15, 15, NULL, NULL),
(16, 16, NULL, NULL),
(17, 17, NULL, NULL),
(18, 18, NULL, NULL),
(19, 19, NULL, NULL),
(20, 20, NULL, NULL),
(21, 21, NULL, NULL),
(22, 22, NULL, NULL),
(23, 23, NULL, NULL),
(24, 24, NULL, NULL),
(25, 25, NULL, NULL),
(26, 26, NULL, NULL),
(27, 27, NULL, NULL),
(28, 28, NULL, NULL),
(29, 29, NULL, NULL),
(30, 30, NULL, NULL),
(31, 31, NULL, NULL),
(32, 32, NULL, NULL),
(33, 33, NULL, NULL),
(34, 34, NULL, NULL),
(35, 35, NULL, NULL),
(36, 36, NULL, NULL),
(37, 37, NULL, NULL),
(38, 38, NULL, NULL),
(39, 39, NULL, NULL),
(40, 40, NULL, NULL),
(41, 41, NULL, NULL),
(42, 42, NULL, NULL),
(43, 43, NULL, NULL),
(44, 44, NULL, NULL),
(45, 45, NULL, NULL),
(46, 46, NULL, NULL),
(47, 47, NULL, NULL),
(48, 48, NULL, NULL),
(49, 49, NULL, NULL),
(50, 50, NULL, NULL),
(51, 51, NULL, NULL),
(52, 52, NULL, NULL),
(53, 53, NULL, NULL),
(54, 54, NULL, NULL),
(55, 55, NULL, NULL),
(56, 56, NULL, NULL),
(57, 57, NULL, NULL),
(58, 58, NULL, NULL),
(59, 59, NULL, NULL),
(60, 60, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_g_id_unique` (`g_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
