-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 09:28 AM
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
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `fname`, `Mname`, `lname`, `photo`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anna', 'M', 'kayanda', NULL, 'annakayanda@gmail.com', 775645345, '2023-08-08 11:16:29', '2023-08-08 11:16:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_presentations`
--

CREATE TABLE `final_presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `introduction_Presentation` double(8,2) NOT NULL DEFAULT 0.00,
  `Final_Presentation_1` double(8,2) NOT NULL DEFAULT 0.00,
  `Proposal_Marks` double(8,2) NOT NULL DEFAULT 0.00,
  `Requirements_Presentation` double(8,2) NOT NULL DEFAULT 0.00,
  `Development_Presentation` double(8,2) NOT NULL DEFAULT 0.00,
  `Final_Presentation_Final` double(8,2) NOT NULL DEFAULT 0.00,
  `Supervisors_Individual` double(8,2) NOT NULL DEFAULT 0.00,
  `Project_Report` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_presentations`
--

INSERT INTO `final_presentations` (`id`, `student_id`, `group_id`, `supervisor_id`, `introduction_Presentation`, `Final_Presentation_1`, `Proposal_Marks`, `Requirements_Presentation`, `Development_Presentation`, `Final_Presentation_Final`, `Supervisors_Individual`, `Project_Report`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 4.75, 3.15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:23:54', '2023-08-08 13:26:10'),
(2, 31, 1, 2, 4.60, 3.15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:23:54', '2023-08-08 13:26:10'),
(3, 1, 1, 3, 2.25, 4.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:26:52', '2023-08-08 13:27:21'),
(4, 31, 1, 3, 2.25, 4.05, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:26:52', '2023-08-08 13:27:21'),
(5, 1, 1, 4, 3.80, 4.65, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:30:02', '2023-08-08 13:30:23'),
(6, 31, 1, 4, 4.90, 4.65, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 13:30:02', '2023-08-08 13:30:23'),
(7, 1, 1, 5, 1.25, 1.75, 7.40, 6.20, 7.40, 12.00, 5.60, 20.40, '2023-08-08 13:34:24', '2023-08-08 15:25:38'),
(8, 31, 1, 5, 1.25, 1.75, 6.40, 6.20, 7.40, 12.75, 5.60, 20.40, '2023-08-08 13:34:24', '2023-08-08 15:25:38'),
(9, 16, 2, 5, 2.00, 2.80, 7.20, 3.60, 3.60, 6.75, 3.60, 18.60, '2023-08-08 15:32:16', '2023-08-08 15:34:21'),
(10, 17, 2, 5, 2.00, 2.80, 7.20, 3.60, 3.60, 6.75, 3.60, 17.70, '2023-08-08 15:32:16', '2023-08-08 15:34:21'),
(11, 16, 2, 4, 1.25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 15:42:58', '2023-08-08 15:42:58'),
(12, 17, 2, 4, 1.25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-08 15:42:59', '2023-08-08 15:42:59'),
(13, 18, 3, 4, 2.25, 3.15, 7.20, 8.80, 8.70, 12.30, 5.80, 24.90, '2023-08-10 07:56:19', '2023-08-10 07:59:20'),
(14, 19, 3, 4, 2.25, 3.15, 7.20, 6.80, 9.10, 11.55, 4.70, 23.10, '2023-08-10 07:56:19', '2023-08-10 07:59:20'),
(15, 20, 4, 4, 3.15, 3.15, 7.20, 3.60, 2.70, 4.80, 2.80, 14.40, '2023-08-10 08:00:45', '2023-08-10 08:07:21'),
(16, 21, 4, 4, 3.10, 3.15, 7.20, 2.40, 2.50, 5.40, 2.40, 14.70, '2023-08-10 08:00:46', '2023-08-10 08:07:22'),
(17, 22, 5, 4, 1.85, 2.60, 6.40, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-10 08:09:09', '2023-08-10 08:10:02'),
(18, 23, 5, 4, 1.60, 2.90, 6.70, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-10 08:09:09', '2023-08-10 08:10:02'),
(19, 28, 8, 5, 1.60, 2.60, 7.60, 9.00, 10.00, 13.50, 9.00, 25.20, '2023-08-12 07:07:46', '2023-08-12 07:10:05'),
(20, 24, 6, 5, 3.55, 4.75, 7.30, 5.70, 6.70, 11.55, 7.40, 24.90, '2023-08-12 07:11:39', '2023-08-12 07:14:35'),
(21, 25, 6, 5, 3.80, 3.15, 6.40, 4.70, 6.70, 13.05, 6.30, 15.60, '2023-08-12 07:11:39', '2023-08-12 07:14:35'),
(22, 26, 7, 5, 3.80, 4.55, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-12 07:16:24', '2023-08-12 07:16:52'),
(23, 27, 7, 5, 3.30, 4.15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2023-08-12 07:16:24', '2023-08-12 07:16:52');

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
(60, 60, NULL, NULL),
(61, 61, NULL, NULL),
(62, 62, NULL, NULL),
(63, 63, NULL, NULL),
(64, 64, NULL, NULL),
(65, 65, NULL, NULL),
(66, 66, NULL, NULL),
(67, 67, NULL, NULL),
(68, 68, NULL, NULL),
(69, 69, NULL, NULL),
(70, 70, NULL, NULL),
(71, 71, NULL, NULL),
(72, 72, NULL, NULL),
(73, 73, NULL, NULL),
(74, 74, NULL, NULL),
(75, 75, NULL, NULL),
(76, 76, NULL, NULL),
(77, 77, NULL, NULL),
(78, 78, NULL, NULL),
(79, 79, NULL, NULL),
(80, 80, NULL, NULL),
(81, 81, NULL, NULL),
(82, 82, NULL, NULL),
(83, 83, NULL, NULL),
(84, 84, NULL, NULL),
(85, 85, NULL, NULL),
(86, 86, NULL, NULL),
(87, 87, NULL, NULL),
(88, 88, NULL, NULL),
(89, 89, NULL, NULL),
(90, 90, NULL, NULL),
(91, 91, NULL, NULL),
(92, 92, NULL, NULL),
(93, 93, NULL, NULL),
(94, 94, NULL, NULL),
(95, 95, NULL, NULL),
(96, 96, NULL, NULL),
(97, 97, NULL, NULL),
(98, 98, NULL, NULL),
(99, 99, NULL, NULL),
(100, 100, NULL, NULL),
(101, 101, NULL, NULL),
(102, 102, NULL, NULL),
(103, 103, NULL, NULL),
(104, 104, NULL, NULL),
(105, 105, NULL, NULL),
(106, 106, NULL, NULL),
(107, 107, NULL, NULL),
(108, 108, NULL, NULL),
(109, 109, NULL, NULL),
(110, 110, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_data`
--

CREATE TABLE `group_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_data`
--

INSERT INTO `group_data` (`id`, `regno`, `group_id`, `created_at`, `updated_at`) VALUES
(1, '03.4691.01.01.2020', 2, '2023-08-08 11:42:36', '2023-08-08 11:52:05'),
(2, '03.7725.01.01.2020', 2, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(3, '03.3885.01.01.2020', 3, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(4, '03.0305.01.01.2020', 3, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(5, '03.5542.01.01.2020', 4, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(6, '03.6922.01.01.2020', 4, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(7, '03.1279.01.01.2020', 5, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(8, '03.3003.01.01.2020', 5, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(9, '03.4305.01.01.2020', 6, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(10, '03.8962.01.01.2020', 6, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(11, '03.6866.01.01.2020', 7, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(12, '03.8327.01.01.2020', 7, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(13, '03.5668.01.01.2020', 8, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(14, '03.3456.01.01.2020', 9, '2023-08-08 11:42:36', '2023-08-08 11:53:21'),
(15, '03.1605.01.01.2020', 9, '2023-08-08 11:42:36', '2023-08-08 11:42:36'),
(16, '03.3443.01.01.2020', 1, '2023-08-08 11:42:51', '2023-08-08 11:51:42'),
(17, '03.8953.01.01.2020', 1, '2023-08-08 11:43:02', '2023-08-08 11:51:56'),
(18, '03.1103.01.01.2020', 10, '2023-08-08 11:52:47', '2023-08-08 11:52:47'),
(19, '03.1066.01.01.2020', 10, '2023-08-08 11:53:03', '2023-08-08 12:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `group_supervisors`
--

CREATE TABLE `group_supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_supervisors`
--

INSERT INTO `group_supervisors` (`id`, `group_id`, `supervisor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-08-08 11:53:46', '2023-08-08 11:53:46'),
(2, 3, 4, '2023-08-08 12:47:09', '2023-08-08 12:47:09'),
(3, 4, 5, '2023-08-08 12:47:17', '2023-08-08 12:47:17'),
(4, 5, 6, '2023-08-08 12:47:27', '2023-08-08 12:47:27'),
(5, 2, 2, '2023-08-08 12:47:53', '2023-08-08 12:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_08_091956_create_supervisors_table', 1),
(5, '2023_05_18_145550_create_coordinators_table', 1),
(6, '2023_05_25_120549_create_students_table', 1),
(7, '2023_05_30_105907_create_phases_table', 1),
(8, '2023_05_30_110028_create_sub_phases_table', 1),
(9, '2023_05_31_074557_create_password_resets_table', 1),
(10, '2023_06_26_171801_create_groups_table', 1),
(11, '2023_06_26_171836_create_group_supervisors_table', 1),
(12, '2023_06_26_171847_create_project_titles_table', 1),
(13, '2023_06_26_180043_create_group_data_table', 1),
(14, '2023_06_26_182729_create_rejected_titles_table', 1),
(15, '2023_07_06_140858_create_phase1_subphase1s_table', 1),
(16, '2023_07_06_141112_create_phase1_subphase2s_table', 1),
(17, '2023_07_06_141204_create_phase1_subphase3s_table', 1),
(18, '2023_07_06_141254_create_phase2_subphase1s_table', 1),
(19, '2023_07_06_141336_create_phase2_subphase2s_table', 1),
(20, '2023_07_06_141538_create_phase2_subphase4s_table', 1),
(21, '2023_07_06_141613_create_phase2_subphase5s_table', 1),
(22, '2023_07_06_141855_create_phase2_subphase3s_table', 1),
(23, '2023_07_16_133815_create_announcements_table', 1),
(24, '2023_07_31_113605_create_proposals_table', 1),
(25, '2023_07_31_151144_create_final_presentations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phase1_subphase1s`
--

CREATE TABLE `phase1_subphase1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Appearance` double(8,2) NOT NULL,
  `Presentation_skills` double(8,2) NOT NULL,
  `Understanding_topic` double(8,2) NOT NULL,
  `Significance_project` double(8,2) NOT NULL,
  `Setting_objectives` double(8,2) NOT NULL,
  `introduction_Presentation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase1s`
--

INSERT INTO `phase1_subphase1s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_topic`, `Significance_project`, `Setting_objectives`, `introduction_Presentation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 9.00, 9.00, 29.00, 19.00, 29.00, 4.75, '2023-08-08 13:23:54', '2023-08-08 13:23:54'),
(2, 31, 1, 2, 9.00, 9.00, 28.00, 18.00, 28.00, 4.60, '2023-08-08 13:23:54', '2023-08-08 13:23:54'),
(3, 1, 1, 3, 9.00, 9.00, 9.00, 9.00, 9.00, 2.25, '2023-08-08 13:26:52', '2023-08-08 13:26:52'),
(4, 31, 1, 3, 9.00, 9.00, 9.00, 9.00, 9.00, 2.25, '2023-08-08 13:26:52', '2023-08-08 13:26:52'),
(5, 1, 1, 4, 9.00, 9.00, 29.00, 20.00, 9.00, 3.80, '2023-08-08 13:30:02', '2023-08-08 13:30:02'),
(6, 31, 1, 4, 9.00, 9.00, 30.00, 20.00, 30.00, 4.90, '2023-08-08 13:30:02', '2023-08-08 13:30:02'),
(7, 1, 1, 5, 5.00, 5.00, 5.00, 5.00, 5.00, 1.25, '2023-08-08 13:34:24', '2023-08-08 13:34:24'),
(8, 31, 1, 5, 5.00, 5.00, 5.00, 5.00, 5.00, 1.25, '2023-08-08 13:34:24', '2023-08-08 13:34:24'),
(9, 16, 2, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 2.00, '2023-08-08 15:32:16', '2023-08-08 15:32:16'),
(10, 17, 2, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 2.00, '2023-08-08 15:32:16', '2023-08-08 15:32:16'),
(11, 16, 2, 4, 5.00, 5.00, 5.00, 5.00, 5.00, 1.25, '2023-08-08 15:42:58', '2023-08-08 15:42:58'),
(12, 17, 2, 4, 5.00, 5.00, 5.00, 5.00, 5.00, 1.25, '2023-08-08 15:42:59', '2023-08-08 15:42:59'),
(13, 18, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 2.25, '2023-08-10 07:56:19', '2023-08-10 07:56:19'),
(14, 19, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 2.25, '2023-08-10 07:56:19', '2023-08-10 07:56:19'),
(15, 20, 4, 4, 9.00, 9.00, 10.00, 15.00, 20.00, 3.15, '2023-08-10 08:00:45', '2023-08-10 08:00:45'),
(16, 21, 4, 4, 9.00, 9.00, 10.00, 15.00, 19.00, 3.10, '2023-08-10 08:00:45', '2023-08-10 08:00:45'),
(17, 22, 5, 4, 9.00, 8.00, 7.00, 6.00, 7.00, 1.85, '2023-08-10 08:09:09', '2023-08-10 08:09:09'),
(18, 23, 5, 4, 8.00, 9.00, 0.00, 7.00, 8.00, 1.60, '2023-08-10 08:09:09', '2023-08-10 08:09:09'),
(19, 28, 8, 5, 6.00, 6.00, 5.00, 7.00, 8.00, 1.60, '2023-08-12 07:07:46', '2023-08-12 07:07:46'),
(20, 24, 6, 5, 6.00, 8.00, 8.00, 19.00, 30.00, 3.55, '2023-08-12 07:11:39', '2023-08-12 07:11:39'),
(21, 25, 6, 5, 9.00, 9.00, 20.00, 18.00, 20.00, 3.80, '2023-08-12 07:11:39', '2023-08-12 07:11:39'),
(22, 26, 7, 5, 8.00, 8.00, 10.00, 20.00, 30.00, 3.80, '2023-08-12 07:16:24', '2023-08-12 07:16:24'),
(23, 27, 7, 5, 9.00, 9.00, 20.00, 8.00, 20.00, 3.30, '2023-08-12 07:16:24', '2023-08-12 07:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `phase1_subphase2s`
--

CREATE TABLE `phase1_subphase2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Appearance` double(8,2) NOT NULL,
  `Presentation_skills` double(8,2) NOT NULL,
  `Understanding_topic` double(8,2) NOT NULL,
  `Significance_project` double(8,2) NOT NULL,
  `Setting_objectives` double(8,2) NOT NULL,
  `Methodology` double(8,2) NOT NULL,
  `Implementation_plan` double(8,2) NOT NULL,
  `Final_Presentation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase2s`
--

INSERT INTO `phase1_subphase2s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_topic`, `Significance_project`, `Setting_objectives`, `Methodology`, `Implementation_plan`, `Final_Presentation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-08 13:26:10', '2023-08-08 13:26:10'),
(2, 31, 1, 2, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-08 13:26:10', '2023-08-08 13:26:10'),
(3, 1, 1, 3, 9.00, 9.00, 9.00, 9.00, 18.00, 18.00, 10.00, 4.10, '2023-08-08 13:27:21', '2023-08-08 13:27:21'),
(4, 31, 1, 3, 9.00, 9.00, 9.00, 9.00, 17.00, 18.00, 10.00, 4.05, '2023-08-08 13:27:21', '2023-08-08 13:27:21'),
(5, 1, 1, 4, 9.00, 9.00, 9.00, 9.00, 19.00, 19.00, 19.00, 4.65, '2023-08-08 13:30:23', '2023-08-08 13:30:23'),
(6, 31, 1, 4, 9.00, 9.00, 9.00, 9.00, 19.00, 19.00, 19.00, 4.65, '2023-08-08 13:30:23', '2023-08-08 13:30:23'),
(7, 1, 1, 5, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 1.75, '2023-08-08 13:34:34', '2023-08-08 13:34:34'),
(8, 31, 1, 5, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 1.75, '2023-08-08 13:34:34', '2023-08-08 13:34:34'),
(9, 16, 2, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 2.80, '2023-08-08 15:32:38', '2023-08-08 15:32:38'),
(10, 17, 2, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 2.80, '2023-08-08 15:32:38', '2023-08-08 15:32:38'),
(11, 18, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-10 07:56:33', '2023-08-10 07:56:33'),
(12, 19, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-10 07:56:33', '2023-08-10 07:56:33'),
(13, 20, 4, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-10 08:01:00', '2023-08-10 08:01:00'),
(14, 21, 4, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-10 08:01:01', '2023-08-10 08:01:01'),
(15, 22, 5, 4, 8.00, 7.00, 8.00, 9.00, 7.00, 6.00, 7.00, 2.60, '2023-08-10 08:09:43', '2023-08-10 08:09:43'),
(16, 23, 5, 4, 9.00, 9.00, 8.00, 9.00, 7.00, 8.00, 8.00, 2.90, '2023-08-10 08:09:43', '2023-08-10 08:09:43'),
(17, 28, 8, 5, 8.00, 5.00, 4.00, 8.00, 9.00, 9.00, 9.00, 2.60, '2023-08-12 07:08:07', '2023-08-12 07:08:07'),
(18, 24, 6, 5, 9.00, 9.00, 9.00, 9.00, 19.00, 20.00, 20.00, 4.75, '2023-08-12 07:12:02', '2023-08-12 07:12:02'),
(19, 25, 6, 5, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 3.15, '2023-08-12 07:12:02', '2023-08-12 07:12:02'),
(20, 26, 7, 5, 9.00, 8.00, 8.00, 8.00, 20.00, 19.00, 19.00, 4.55, '2023-08-12 07:16:52', '2023-08-12 07:16:52'),
(21, 27, 7, 5, 9.00, 9.00, 7.00, 8.00, 19.00, 16.00, 15.00, 4.15, '2023-08-12 07:16:52', '2023-08-12 07:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `phase1_subphase3s`
--

CREATE TABLE `phase1_subphase3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Project_Background` double(8,2) NOT NULL,
  `Significance_project` double(8,2) NOT NULL,
  `Setting_objectives` double(8,2) NOT NULL,
  `Methodology` double(8,2) NOT NULL,
  `Implementation_plan` double(8,2) NOT NULL,
  `Expected_Output` double(8,2) NOT NULL,
  `Expected_Outcome` double(8,2) NOT NULL,
  `Conclusion` double(8,2) NOT NULL,
  `Proposal_Marks` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase3s`
--

INSERT INTO `phase1_subphase3s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Project_Background`, `Significance_project`, `Setting_objectives`, `Methodology`, `Implementation_plan`, `Expected_Output`, `Expected_Outcome`, `Conclusion`, `Proposal_Marks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 10.00, 10.00, 10.00, 10.00, 10.00, 8.00, 8.00, 8.00, 7.40, '2023-08-08 13:37:07', '2023-08-08 13:37:07'),
(2, 31, 1, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 6.40, '2023-08-08 13:37:07', '2023-08-08 13:37:07'),
(3, 16, 2, 5, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-08 15:33:02', '2023-08-08 15:33:02'),
(4, 17, 2, 5, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-08 15:33:02', '2023-08-08 15:33:02'),
(5, 18, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-10 07:56:48', '2023-08-10 07:56:48'),
(6, 19, 3, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-10 07:56:48', '2023-08-10 07:56:48'),
(7, 20, 4, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-10 08:01:20', '2023-08-10 08:01:20'),
(8, 21, 4, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.20, '2023-08-10 08:01:21', '2023-08-10 08:01:21'),
(9, 22, 5, 4, 8.00, 7.00, 7.00, 8.00, 8.00, 8.00, 9.00, 9.00, 6.40, '2023-08-10 08:10:02', '2023-08-10 08:10:02'),
(10, 23, 5, 4, 9.00, 9.00, 9.00, 9.00, 9.00, 9.00, 7.00, 6.00, 6.70, '2023-08-10 08:10:02', '2023-08-10 08:10:02'),
(11, 28, 8, 5, 9.00, 9.00, 9.00, 9.00, 10.00, 10.00, 10.00, 10.00, 7.60, '2023-08-12 07:08:28', '2023-08-12 07:08:28'),
(12, 24, 6, 5, 15.00, 10.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 7.30, '2023-08-12 07:12:18', '2023-08-12 07:12:18'),
(13, 25, 6, 5, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 6.40, '2023-08-12 07:12:18', '2023-08-12 07:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `phase2_subphase1s`
--

CREATE TABLE `phase2_subphase1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Appearance` double(8,2) NOT NULL,
  `Presentation_skills` double(8,2) NOT NULL,
  `Understanding_Project_requirements` double(8,2) NOT NULL,
  `Requirements_Analysis_Design` double(8,2) NOT NULL,
  `Requirements_Presentation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase1s`
--

INSERT INTO `phase2_subphase1s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_Project_requirements`, `Requirements_Analysis_Design`, `Requirements_Presentation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 6.00, 6.00, 20.00, 30.00, 6.20, '2023-08-08 15:23:37', '2023-08-08 15:23:37'),
(2, 31, 1, 5, 6.00, 6.00, 20.00, 30.00, 6.20, '2023-08-08 15:23:37', '2023-08-08 15:23:37'),
(3, 16, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:12', '2023-08-08 15:33:12'),
(4, 17, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:12', '2023-08-08 15:33:12'),
(5, 18, 3, 4, 9.00, 9.00, 20.00, 50.00, 8.80, '2023-08-10 07:57:32', '2023-08-10 07:57:32'),
(6, 19, 3, 4, 9.00, 6.00, 8.00, 45.00, 6.80, '2023-08-10 07:57:33', '2023-08-10 07:57:33'),
(7, 20, 4, 4, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-10 08:05:54', '2023-08-10 08:05:54'),
(8, 21, 4, 4, 6.00, 7.00, 6.00, 5.00, 2.40, '2023-08-10 08:05:54', '2023-08-10 08:05:54'),
(9, 28, 8, 5, 10.00, 10.00, 20.00, 50.00, 9.00, '2023-08-12 07:08:48', '2023-08-12 07:08:48'),
(10, 24, 6, 5, 9.00, 9.00, 9.00, 30.00, 5.70, '2023-08-12 07:12:39', '2023-08-12 07:12:39'),
(11, 25, 6, 5, 9.00, 9.00, 9.00, 20.00, 4.70, '2023-08-12 07:12:39', '2023-08-12 07:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `phase2_subphase2s`
--

CREATE TABLE `phase2_subphase2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Appearance` double(8,2) NOT NULL,
  `Presentation_skills` double(8,2) NOT NULL,
  `Understanding_Project_requirements` double(8,2) NOT NULL,
  `Initial_Implementation` double(8,2) NOT NULL,
  `Development_Presentation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase2s`
--

INSERT INTO `phase2_subphase2s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_Project_requirements`, `Initial_Implementation`, `Development_Presentation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 7.00, 7.00, 10.00, 50.00, 7.40, '2023-08-08 15:24:00', '2023-08-08 15:24:00'),
(2, 31, 1, 5, 7.00, 7.00, 10.00, 50.00, 7.40, '2023-08-08 15:24:00', '2023-08-08 15:24:00'),
(3, 16, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:24', '2023-08-08 15:33:24'),
(4, 17, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:24', '2023-08-08 15:33:24'),
(5, 18, 3, 4, 9.00, 9.00, 19.00, 50.00, 8.70, '2023-08-10 07:57:51', '2023-08-10 07:57:51'),
(6, 19, 3, 4, 9.00, 9.00, 18.00, 55.00, 9.10, '2023-08-10 07:57:51', '2023-08-10 07:57:51'),
(7, 20, 4, 4, 8.00, 8.00, 5.00, 6.00, 2.70, '2023-08-10 08:06:15', '2023-08-10 08:06:15'),
(8, 21, 4, 4, 5.00, 6.00, 8.00, 6.00, 2.50, '2023-08-10 08:06:15', '2023-08-10 08:06:15'),
(9, 28, 8, 5, 10.00, 10.00, 20.00, 60.00, 10.00, '2023-08-12 07:09:02', '2023-08-12 07:09:02'),
(10, 24, 6, 5, 9.00, 9.00, 9.00, 40.00, 6.70, '2023-08-12 07:13:07', '2023-08-12 07:13:07'),
(11, 25, 6, 5, 9.00, 9.00, 9.00, 40.00, 6.70, '2023-08-12 07:13:07', '2023-08-12 07:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `phase2_subphase3s`
--

CREATE TABLE `phase2_subphase3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Appearance` double(8,2) NOT NULL,
  `Presentation_skills` double(8,2) NOT NULL,
  `Understanding_Project_requirements` double(8,2) NOT NULL,
  `Requirements_Analysis_Design` double(8,2) NOT NULL,
  `Implementation` double(8,2) NOT NULL,
  `Final_Presentation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase3s`
--

INSERT INTO `phase2_subphase3s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_Project_requirements`, `Requirements_Analysis_Design`, `Implementation`, `Final_Presentation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 10.00, 10.00, 10.00, 20.00, 30.00, 12.00, '2023-08-08 15:24:23', '2023-08-08 15:24:23'),
(2, 31, 1, 5, 10.00, 10.00, 10.00, 20.00, 35.00, 12.75, '2023-08-08 15:24:23', '2023-08-08 15:24:23'),
(3, 16, 2, 5, 9.00, 9.00, 9.00, 9.00, 9.00, 6.75, '2023-08-08 15:33:41', '2023-08-08 15:33:41'),
(4, 17, 2, 5, 9.00, 9.00, 9.00, 9.00, 9.00, 6.75, '2023-08-08 15:33:41', '2023-08-08 15:33:41'),
(5, 18, 3, 4, 9.00, 9.00, 9.00, 20.00, 35.00, 12.30, '2023-08-10 07:58:18', '2023-08-10 07:58:18'),
(6, 19, 3, 4, 9.00, 9.00, 9.00, 20.00, 30.00, 11.55, '2023-08-10 07:58:18', '2023-08-10 07:58:18'),
(7, 20, 4, 4, 7.00, 7.00, 6.00, 5.00, 7.00, 4.80, '2023-08-10 08:06:35', '2023-08-10 08:06:35'),
(8, 21, 4, 4, 8.00, 8.00, 7.00, 6.00, 7.00, 5.40, '2023-08-10 08:06:35', '2023-08-10 08:06:35'),
(9, 28, 8, 5, 10.00, 10.00, 10.00, 20.00, 40.00, 13.50, '2023-08-12 07:09:24', '2023-08-12 07:09:24'),
(10, 24, 6, 5, 9.00, 9.00, 9.00, 20.00, 30.00, 11.55, '2023-08-12 07:13:28', '2023-08-12 07:13:28'),
(11, 25, 6, 5, 9.00, 9.00, 9.00, 20.00, 40.00, 13.05, '2023-08-12 07:13:28', '2023-08-12 07:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `phase2_subphase4s`
--

CREATE TABLE `phase2_subphase4s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `General_Understanding_Project` double(8,2) NOT NULL,
  `System_development` double(8,2) NOT NULL,
  `Team_Working` double(8,2) NOT NULL,
  `Individual_Technical_Capability` double(8,2) NOT NULL,
  `Supervisors_Individual` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase4s`
--

INSERT INTO `phase2_subphase4s` (`id`, `student_id`, `group_id`, `supervisor_id`, `General_Understanding_Project`, `System_development`, `Team_Working`, `Individual_Technical_Capability`, `Supervisors_Individual`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 8.00, 8.00, 10.00, 30.00, 5.60, '2023-08-08 15:24:45', '2023-08-08 15:24:45'),
(2, 31, 1, 5, 8.00, 8.00, 10.00, 30.00, 5.60, '2023-08-08 15:24:46', '2023-08-08 15:24:46'),
(3, 16, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:54', '2023-08-08 15:33:54'),
(4, 17, 2, 5, 9.00, 9.00, 9.00, 9.00, 3.60, '2023-08-08 15:33:54', '2023-08-08 15:33:54'),
(5, 18, 3, 4, 9.00, 20.00, 20.00, 9.00, 5.80, '2023-08-10 07:58:41', '2023-08-10 07:58:41'),
(6, 19, 3, 4, 9.00, 9.00, 9.00, 20.00, 4.70, '2023-08-10 07:58:41', '2023-08-10 07:58:41'),
(7, 20, 4, 4, 9.00, 8.00, 6.00, 5.00, 2.80, '2023-08-10 08:06:45', '2023-08-10 08:06:45'),
(8, 21, 4, 4, 5.00, 6.00, 7.00, 6.00, 2.40, '2023-08-10 08:06:45', '2023-08-10 08:06:45'),
(9, 28, 8, 5, 10.00, 20.00, 20.00, 40.00, 9.00, '2023-08-12 07:09:37', '2023-08-12 07:09:37'),
(10, 24, 6, 5, 9.00, 18.00, 17.00, 30.00, 7.40, '2023-08-12 07:13:51', '2023-08-12 07:13:51'),
(11, 25, 6, 5, 9.00, 17.00, 17.00, 20.00, 6.30, '2023-08-12 07:13:51', '2023-08-12 07:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `phase2_subphase5s`
--

CREATE TABLE `phase2_subphase5s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `Project_Background` double(8,2) NOT NULL,
  `Significance_project` double(8,2) NOT NULL,
  `Setting_objectives` double(8,2) NOT NULL,
  `Methodology` double(8,2) NOT NULL,
  `System_Implementation` double(8,2) NOT NULL,
  `Results` double(8,2) NOT NULL,
  `Conclusion` double(8,2) NOT NULL,
  `System_Documentation` double(8,2) NOT NULL,
  `Project_Report` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase5s`
--

INSERT INTO `phase2_subphase5s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Project_Background`, `Significance_project`, `Setting_objectives`, `Methodology`, `System_Implementation`, `Results`, `Conclusion`, `System_Documentation`, `Project_Report`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 7.00, 4.00, 7.00, 7.00, 20.00, 8.00, 5.00, 10.00, 20.40, '2023-08-08 15:25:38', '2023-08-08 15:25:38'),
(2, 31, 1, 5, 7.00, 3.00, 6.00, 7.00, 25.00, 8.00, 4.00, 8.00, 20.40, '2023-08-08 15:25:38', '2023-08-08 15:25:38'),
(3, 16, 2, 5, 9.00, 4.00, 9.00, 9.00, 9.00, 9.00, 4.00, 9.00, 18.60, '2023-08-08 15:34:21', '2023-08-08 15:34:21'),
(4, 17, 2, 5, 9.00, 4.00, 9.00, 9.00, 9.00, 7.00, 3.00, 9.00, 17.70, '2023-08-08 15:34:21', '2023-08-08 15:34:21'),
(5, 18, 3, 4, 9.00, 3.00, 9.00, 9.00, 30.00, 10.00, 4.00, 9.00, 24.90, '2023-08-10 07:59:20', '2023-08-10 07:59:20'),
(6, 19, 3, 4, 9.00, 5.00, 9.00, 9.00, 20.00, 10.00, 5.00, 10.00, 23.10, '2023-08-10 07:59:20', '2023-08-10 07:59:20'),
(7, 20, 4, 4, 9.00, 4.00, 6.00, 6.00, 7.00, 7.00, 2.00, 7.00, 14.40, '2023-08-10 08:07:21', '2023-08-10 08:07:21'),
(8, 21, 4, 4, 6.00, 2.00, 7.00, 7.00, 8.00, 8.00, 3.00, 8.00, 14.70, '2023-08-10 08:07:22', '2023-08-10 08:07:22'),
(9, 28, 8, 5, 10.00, 4.00, 9.00, 9.00, 30.00, 9.00, 4.00, 9.00, 25.20, '2023-08-12 07:10:05', '2023-08-12 07:10:05'),
(10, 24, 6, 5, 9.00, 5.00, 10.00, 10.00, 30.00, 7.00, 3.00, 9.00, 24.90, '2023-08-12 07:14:34', '2023-08-12 07:14:34'),
(11, 25, 6, 5, 7.00, 3.00, 8.00, 8.00, 7.00, 6.00, 3.00, 10.00, 15.60, '2023-08-12 07:14:35', '2023-08-12 07:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phase_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `phase_name`, `created_at`, `updated_at`) VALUES
(2, 'Project Proposal Phase Assessment', '2023-07-01 04:14:34', '2023-07-01 04:14:34'),
(3, 'Project Implementation Phase Assessment', '2023-07-01 04:14:54', '2023-07-01 04:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `project_titles`
--

CREATE TABLE `project_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_status` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_titles`
--

INSERT INTO `project_titles` (`id`, `group_id`, `title`, `title_status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Final Year Project Management system', 2, NULL, '2023-08-08 11:46:32', '2023-08-08 12:31:33'),
(2, 2, 'waste management system', 2, NULL, '2023-08-08 12:30:16', '2023-08-08 12:30:58'),
(3, 3, 'Omega crew Techs', 2, NULL, '2023-08-08 12:43:37', '2023-08-08 12:43:46'),
(4, 4, 'CBESO information system', 2, NULL, '2023-08-08 12:44:21', '2023-08-08 12:46:17'),
(5, 5, 'Boer Trek', 2, NULL, '2023-08-08 12:44:47', '2023-08-08 12:46:21'),
(6, 6, 'result information system', 2, NULL, '2023-08-08 12:45:24', '2023-08-08 12:46:25'),
(7, 7, 'Mortuary management system', 2, NULL, '2023-08-08 12:45:51', '2023-08-08 12:46:29'),
(8, 8, 'online Auction management system', 2, NULL, '2023-08-10 08:12:55', '2023-08-10 08:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_status` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejected_titles`
--

CREATE TABLE `rejected_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejected_titles`
--

INSERT INTO `rejected_titles` (`id`, `group_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Omega crew Techs', '2023-08-08 12:30:47', '2023-08-08 12:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `has_group` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regno`, `fname`, `mname`, `lname`, `level`, `photo`, `email`, `phone`, `has_group`, `created_at`, `updated_at`) VALUES
(1, '03.3443.01.01.2020', 'shadrack', 'j', 'mballah', 'bachelor', NULL, 'shadrack@gmail.com', 71635353, 1, '2023-08-08 11:28:43', '2023-08-08 11:42:51'),
(2, '03.3634.01.01.2020', 'rodrick', 'p ', 'musingi', 'bachelor', NULL, 'rodrick@gmail.com', 711111111, 0, '2023-08-08 11:28:43', '2023-08-08 11:28:43'),
(3, '03.1576.01.01.2020', 'Macmillan', 'a ', 'mwako', 'bachelor', NULL, 'mac@gmail.com', 722222222, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(4, '03.1327.01.01.2020', 'monica', 'frontos', 'shirima', 'bachelor', NULL, 'monica@gmail.com', 711111121, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(5, '03.8327.02.01.2020', 'benjamin', 't', 'bathromew', 'bachelor', NULL, 'benjamin@gmail.com', 711111131, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(6, '03.8376.01.01.2020', 'justus', 'b', 'joseph', 'bachelor', NULL, 'justus@gmail.com', 711111311, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(7, '03.4096.01.01.2020', 'moses', 'lukoo', 'william', 'bachelor', NULL, 'moses@gmail.com', 711118961, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(8, '03.1066.01.01.2020', 'stella', 'lucas', 'kapinga', 'bachelor', NULL, 'stella@gmail.com', 711001111, 1, '2023-08-08 11:28:44', '2023-08-08 11:53:03'),
(9, '03.1103.01.01.2020', 'doreen', 'christopher', 'nushi', 'bachelor', NULL, 'doreen@gmail.com', 711110111, 1, '2023-08-08 11:28:44', '2023-08-08 11:52:47'),
(10, '03.1759.01.01.2020', 'david', 'ernest', 'george', 'bachelor', NULL, 'david@gmail.com', 711112011, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(11, '03.0775.01.01.2020', 'erick', 'f', 'mhanga', 'bachelor', NULL, 'erick@gmail.com', 711119011, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(12, '03.4955.01.01.2020', 'amiasadi', 'abdala', 'selemani', 'bachelor', NULL, 'amiasadi@gmail.com', 711198111, 0, '2023-08-08 11:28:44', '2023-08-08 11:28:44'),
(13, '03.8508.01.01.2020', 'razak', 'h ', 'ally', 'bachelor', NULL, 'razak@gmail.com', 710111111, 0, '2023-08-08 11:28:45', '2023-08-08 11:28:45'),
(14, '03.5076.01.01.2020', 'jeremia ', 't', 'mgonda', 'bachelor', NULL, 'jeremia@gmail.com', 711176111, 0, '2023-08-08 11:28:45', '2023-08-08 11:28:45'),
(15, '03.4701.01.01.2020', 'mathew', 'mihungo', 'greyson', 'bachelor', NULL, 'mathew@gmail.com', 711118111, 0, '2023-08-08 11:28:45', '2023-08-08 11:28:45'),
(16, '03.4691.01.01.2020', 'mary', 'lucas', 'balnabas', 'bachelor', NULL, 'mary@gmail.com', 717611111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(17, '03.7725.01.01.2020', 'isaa', 'k', 'hamisi', 'bachelor', NULL, 'issa@gmail.com', 711651111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(18, '03.3885.01.01.2020', 'tunu', 'frank', 'mhagama', 'bachelor', NULL, 'tunu@gmail.com', 711871111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(19, '03.0305.01.01.2020', 'peter', 'e ', 'mponeja', 'bachelor', NULL, 'peter@gmail.com', 711991111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(20, '03.5542.01.01.2020', 'daniel', 'j ', 'salaho', 'bachelor', NULL, 'daniel@gmail.com', 717711111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(21, '03.6922.01.01.2020', 'joseph', 'gerlad', 'jonathan', 'bachelor', NULL, 'joseph@gmail.com', 711661111, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(22, '03.1279.01.01.2020', 'wilfred', 'sospiter', 'william', 'bachelor', NULL, 'wilfred@gmail.com', 711115511, 1, '2023-08-08 11:28:45', '2023-08-08 11:42:36'),
(23, '03.3003.01.01.2020', 'boniphace', 'mtabuto', 'mbumbuni', 'bachelor', NULL, 'boniphace@gmail.com', 722111111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(24, '03.4305.01.01.2020', 'zeituni', 'a', 'namakonje', 'diploma', NULL, 'zeituni@gmail.com', 711119911, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(25, '03.8962.01.01.2020', 'juma ', 'f ', 'ng`ambi', 'diploma', NULL, 'juma@gmail.com', 711178111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(26, '03.6866.01.01.2020', 'salma', 't', 'abubakar', 'diploma', NULL, 'salma@gmail.com', 711511111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(27, '03.8327.01.01.2020', 'hansbert', 'c ', 'philip', 'diploma', NULL, 'hansbert@gmail.com', 711171111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(28, '03.5668.01.01.2020', 'benjamin', 'e ', 'kulwa', 'diploma', NULL, 'benjaminkulwa@gmail.com', 711711111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(29, '03.3456.01.01.2020', 'agentina', 'brayson', 'kalinga', 'diploma', NULL, 'agentina@gmail.com', 711811911, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(30, '03.1605.01.01.2020', 'kivan', 'b ', 'fungo', 'diploma', NULL, 'kivan@gmail.com', 712811111, 1, '2023-08-08 11:28:46', '2023-08-08 11:42:36'),
(31, '03.8953.01.01.2020', 'adelino', 'a', 'ntacho', 'diploma', NULL, 'adelinontacho@gmail.com', 711119111, 1, '2023-08-08 11:28:46', '2023-08-08 11:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_phases`
--

CREATE TABLE `sub_phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subphase_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase_id` bigint(20) UNSIGNED NOT NULL,
  `allow_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_phases`
--

INSERT INTO `sub_phases` (`id`, `subphase_name`, `phase_id`, `allow_status`, `created_at`, `updated_at`) VALUES
(3, 'Introduction Presentation Assessment Form (100 Points Equiv. to 5 Marks)', 2, 1, '2023-07-01 04:16:28', '2023-08-08 13:23:14'),
(4, 'Final Presentation Assessment Form (100 Points Equiv.to 5 Marks)', 2, 1, '2023-07-01 04:17:16', '2023-08-08 13:11:45'),
(5, 'Proposal Marks Allocation (100 Points Equiv.to 10 Marks)', 2, 1, '2023-07-01 04:18:00', '2023-08-08 13:36:34'),
(6, 'Requirement Presentation Assessment Form (100 Points Equiv. to 10 Marks)', 3, 1, '2023-07-01 04:18:54', '2023-08-08 15:21:35'),
(7, 'Development Presentation Assessment (100 Points Equiv.to 10 Marks) Form', 3, 1, '2023-07-01 04:20:13', '2023-08-08 15:21:37'),
(8, 'Final Presentation Assessment Form (100 Equiv.to 15 Marks)', 3, 1, '2023-07-01 04:20:52', '2023-08-08 15:21:39'),
(9, 'Supervisor\'s individual Student Assessment Form (100 Points Equiv.to 10 Marks)', 3, 1, '2023-07-01 04:21:58', '2023-08-08 15:22:27'),
(10, 'Project Report Marks Allocation (100 Points Equiv.to 30 Marks)', 3, 1, '2023-07-01 04:22:40', '2023-08-08 15:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `firstname`, `middlename`, `lastname`, `photo`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'kijazi', 'A', 'kijazi', NULL, 'kijazi@gmail.com', 73591363, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(2, 'baraka', 'A', 'mwasampeta', NULL, 'barakamwasampeta@gmail.com', 73555363, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(3, 'alfred', 'A', 'kajirunga', NULL, 'kajirunga@gmail.com', 73596363, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(4, 'alexander', 'A', 'makanta', NULL, 'makanta@gmail.com', 73585363, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(5, 'joseph', 'dunstan', 'HAULE', NULL, 'haule@gmail.com', 73595463, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(6, 'donald', 'A', 'stephen', NULL, 'donald@gmail.com', 73597363, '2023-08-08 11:33:19', '2023-08-08 11:33:19'),
(7, 'anna', 'kayanda', 'anna', NULL, 'kayanda@gmail.com', 73595263, '2023-08-08 11:33:19', '2023-08-08 11:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `Mname`, `lname`, `email`, `is_admin`, `last_login`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'annakayanda@gmail.com', 'Anna', 'M', 'kayanda', 'annakayanda@gmail.com', '1', '2023-08-12 07:06:05', NULL, '$2y$10$jl04uwBEz/9fgqjE8/S5Ku5QGyxs.z5qIoKX3fanPTyWkxAc9vxKS', NULL, '2023-08-08 11:16:29', '2023-08-12 07:06:05', NULL),
(9, '03.3443.01.01.2020', 'shadrack', 'j', 'mballah', 'shadrack@gmail.com', '0', '2023-08-10 08:21:13', NULL, '$2y$10$RhtV307fyn6Za5wDaz36ueD.BUgJg85Gy4EjBoScc2MTA9KHngqIC', NULL, '2023-08-08 11:28:43', '2023-08-10 08:21:13', NULL),
(10, '03.3634.01.01.2020', 'rodrick', 'p ', 'musingi', 'rodrick@gmail.com', '0', '2023-08-08 11:28:43', NULL, '$2y$10$rmUlcIhrRelMDK.tXnEIluE5m8fR4t3MDnN53rLqrGeKZq9lByHri', NULL, '2023-08-08 11:28:43', '2023-08-08 11:28:43', NULL),
(11, '03.1576.01.01.2020', 'Macmillan', 'a ', 'mwako', 'mac@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$kIxih7KrvgvQ4.xZKz.60.FgeSa0NRUOKH6tX8LZ0WFV3gQviuX3C', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(12, '03.1327.01.01.2020', 'monica', 'frontos', 'shirima', 'monica@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$qk/nHIYENcZcG3N1ZzfnCOt5SMbdE/F6FH0S5A6LgQ44wW6eAZb5q', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(13, '03.8327.02.01.2020', 'benjamin', 't', 'bathromew', 'benjamin@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$PstgucWhMmdMx2wgBafQneYd1B.FXhioFH/Pj/XSetkxq6ZL5CAzy', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(14, '03.8376.01.01.2020', 'justus', 'b', 'joseph', 'justus@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$YE7k4AiL9fj87w.aALkr5ej4LoyCNAOg96Z4JnDPhGCJQ8PWADn8e', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(15, '03.4096.01.01.2020', 'moses', 'lukoo', 'william', 'moses@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$G64UZtnpEK68onHQho6DNu0Ch3OzK5meyGrvti08Ji848rMfiYNIW', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(16, '03.1066.01.01.2020', 'stella', 'lucas', 'kapinga', 'stella@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$x1lPG81KEiW63Je3eLhgHet7S7vOTZW3YalGRUfEvM0MPpy03fPpa', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(17, '03.1103.01.01.2020', 'doreen', 'christopher', 'nushi', 'doreen@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$KlaVv7G7xif7yRL8HqitWenWOj/iDN9FLp/5qoQWF1AKse9rWeOUa', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(18, '03.1759.01.01.2020', 'david', 'ernest', 'george', 'david@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$soSIty7sWBh4oIUFw.6lP..41miMjcEdF3VPTqurxZh4e9iMGAVOC', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(19, '03.0775.01.01.2020', 'erick', 'f', 'mhanga', 'erick@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$76wlVDs1AGQAASJf2CmaUuIKC/USxlLEIBkGssEWnxs0.xtYszRe2', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(20, '03.4955.01.01.2020', 'amiasadi', 'abdala', 'selemani', 'amiasadi@gmail.com', '0', '2023-08-08 11:28:44', NULL, '$2y$10$vR70oObG.Fz3ShrsDMZE/.QsJdWOnCmen/fxr5qzfpVQgdfITAoNa', NULL, '2023-08-08 11:28:44', '2023-08-08 11:28:44', NULL),
(21, '03.8508.01.01.2020', 'razak', 'h ', 'ally', 'razak@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$4YNXBZOpMJ.i4yuUs/rQiejoEyWW.zjIJoK40CFhlzOdnXlorzKs2', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(22, '03.5076.01.01.2020', 'jeremia ', 't', 'mgonda', 'jeremia@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$ZEqZkd03UBODYfjg5r6pb./JPWOfRBtEMb8IGSPXzAUNDoifCI8tO', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(23, '03.4701.01.01.2020', 'mathew', 'mihungo', 'greyson', 'mathew@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$7RMMUIrJUPYFMcR36BkXEOI.juDRqbkp8N85gI34h5yTqU1efC8S.', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(24, '03.4691.01.01.2020', 'mary', 'lucas', 'balnabas', 'mary@gmail.com', '0', '2023-08-08 12:30:06', NULL, '$2y$10$M3QHeoI/5mbdB3GveL2GT.IW7eoBjvS0WJHou/HCW8aVkDa.d01lO', NULL, '2023-08-08 11:28:45', '2023-08-08 12:30:06', NULL),
(25, '03.7725.01.01.2020', 'isaa', 'k', 'hamisi', 'issa@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$7yish0B0Kfqh9oaquHWVRuUVHVkKQSVNckf4F/0u/WTKFcEH8z95i', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(26, '03.3885.01.01.2020', 'tunu', 'frank', 'mhagama', 'tunu@gmail.com', '0', '2023-08-08 12:43:27', NULL, '$2y$10$iHhABuUY2icXPHmzPRABn.oTE1WC7fc4vqQgUlO06wvmU1uqWlAo6', NULL, '2023-08-08 11:28:45', '2023-08-08 12:43:27', NULL),
(27, '03.0305.01.01.2020', 'peter', 'e ', 'mponeja', 'peter@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$AQgIQrS9jgNkarW.6oxlLuCWZhdbQfWuoy0/cxzv7jj11zJk4lvxa', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(28, '03.5542.01.01.2020', 'daniel', 'j ', 'salaho', 'daniel@gmail.com', '0', '2023-08-08 12:44:07', NULL, '$2y$10$mHmtSMQU1nlgyAh5WSuCT.4gDzxwls8MtRx.j7ZT8ltYaegQUA5m.', NULL, '2023-08-08 11:28:45', '2023-08-08 12:44:07', NULL),
(29, '03.6922.01.01.2020', 'joseph', 'gerlad', 'jonathan', 'joseph@gmail.com', '0', '2023-08-08 11:28:45', NULL, '$2y$10$9PMU.ANvM1Dn5vlK0PNRr..W7adq4hKGHrPmHyDvK2rEb6F9soT2u', NULL, '2023-08-08 11:28:45', '2023-08-08 11:28:45', NULL),
(30, '03.1279.01.01.2020', 'wilfred', 'sospiter', 'william', 'wilfred@gmail.com', '0', '2023-08-08 12:44:38', NULL, '$2y$10$RuOWZcq60xsEf2Eamii1D.3F.WNQzAx/3EOTxazm8skPVu6POxK/e', NULL, '2023-08-08 11:28:45', '2023-08-08 12:44:38', NULL),
(31, '03.3003.01.01.2020', 'boniphace', 'mtabuto', 'mbumbuni', 'boniphace@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$g6fuGCS/Ok7P0/02KZ58/.6uc.You6IZMWMPwmN66ItDmDEsG1bqq', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(32, '03.4305.01.01.2020', 'zeituni', 'a', 'namakonje', 'zeituni@gmail.com', '0', '2023-08-08 12:45:01', NULL, '$2y$10$ZJoFEHq3RwF8AACdhltcGu6J.kYMOPkS18T2aYfLyDzzqqS4Of/OK', NULL, '2023-08-08 11:28:46', '2023-08-08 12:45:01', NULL),
(33, '03.8962.01.01.2020', 'juma ', 'f ', 'ng`ambi', 'juma@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$b.5tsFu1Y4He/dr6EIcWr.cmNpsD7CErGh6XT6f8vKuBfnkeHJRO.', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(34, '03.6866.01.01.2020', 'salma', 't', 'abubakar', 'salma@gmail.com', '0', '2023-08-08 12:45:36', NULL, '$2y$10$cHEi30WnHWiwOA8mpO3Wne5SmDMSOJ7PYmRamlXSwMIRhO.Sr.0Hm', NULL, '2023-08-08 11:28:46', '2023-08-08 12:45:36', NULL),
(35, '03.8327.01.01.2020', 'hansbert', 'c ', 'philip', 'hansbert@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$QiJiE2b3xbASgfM.1xQSPuOoWv1KVwdwcFfXKDgacHrlgipqVWOaC', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(36, '03.5668.01.01.2020', 'benjamin', 'e ', 'kulwa', 'benjaminkulwa@gmail.com', '0', '2023-08-10 08:12:27', NULL, '$2y$10$JmLfVUVfc50NQunZIAXtheCJi5GfiPRX2VgWfcts7EM/glfsdQAXO', NULL, '2023-08-08 11:28:46', '2023-08-10 08:12:27', NULL),
(37, '03.3456.01.01.2020', 'agentina', 'brayson', 'kalinga', 'agentina@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$BP77IopKHMC2TJPeTCwNO.OGYHvdQtP0OU3nXDlW3wLGPsFrdfNA.', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(38, '03.1605.01.01.2020', 'kivan', 'b ', 'fungo', 'kivan@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$pX2d/Oig5kRR6r0l.ZlQBu1AqXQt4GmUwd8.aFL5zwsODxGe8fxcW', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(39, '03.8953.01.01.2020', 'adelino', 'a', 'ntacho', 'adelinontacho@gmail.com', '0', '2023-08-08 11:28:46', NULL, '$2y$10$X1DDWTThd5TAGnRzgAIiWu6GbMGZ7BEyzreBiW3pliZ3M1Iga5HkC', NULL, '2023-08-08 11:28:46', '2023-08-08 11:28:46', NULL),
(42, 'kijazi@gmail.com', 'kijazi', 'A', 'kijazi', 'kijazi@gmail.com', '2', '2023-08-08 11:33:19', NULL, '$2y$10$oCX/QK5iVmLajTYBz3IWwujTr2TBn18YTYV08Pb96nQp3F276drOa', NULL, '2023-08-08 11:33:19', '2023-08-08 11:33:19', NULL),
(43, 'barakamwasampeta@gmail.com', 'baraka', 'A', 'mwasampeta', 'barakamwasampeta@gmail.com', '2', '2023-08-08 12:46:48', NULL, '$2y$10$bCTZEfJWO7KKiW96d/gyw.1P.jd53Z2gXla1NBcR/ZGn7smgWRAl2', NULL, '2023-08-08 11:33:19', '2023-08-08 12:46:48', NULL),
(44, 'kajirunga@gmail.com', 'alfred', 'A', 'kajirunga', 'kajirunga@gmail.com', '2', '2023-08-08 13:26:36', NULL, '$2y$10$3x16xFhKpbGpVA47ZaMJguAgcVqncab6a2j7lEfwaxY3bKvt75/f6', NULL, '2023-08-08 11:33:19', '2023-08-08 13:26:36', NULL),
(45, 'makanta@gmail.com', 'alexander', 'A', 'makanta', 'makanta@gmail.com', '2', '2023-08-10 07:53:36', NULL, '$2y$10$Csh0tqVztkmjcZvZ04Mgg.LTNt91f1E.hXxiyGqRORj.sGvG4kk3e', NULL, '2023-08-08 11:33:19', '2023-08-10 07:53:36', NULL),
(46, 'haule@gmail.com', 'joseph', 'dunstan', 'HAULE', 'haule@gmail.com', '2', '2023-08-12 07:06:12', NULL, '$2y$10$FE3asZFj/v/j4038/iWmDuAu7bworn7U5plAfDKNqf.XVKiHjoBsO', NULL, '2023-08-08 11:33:19', '2023-08-12 07:06:12', NULL),
(47, 'donald@gmail.com', 'donald', 'A', 'stephen', 'donald@gmail.com', '2', '2023-08-08 11:33:19', NULL, '$2y$10$YtAmJ2jHu27LC6V7K9/WOOsaF1wXqJvymwt9mfSAwacGJSIz.QZmO', NULL, '2023-08-08 11:33:19', '2023-08-08 11:33:19', NULL),
(48, 'kayanda@gmail.com', 'anna', 'kayanda', 'anna', 'kayanda@gmail.com', '2', '2023-08-08 11:33:19', NULL, '$2y$10$zKJUm3ZpoH2wzPSFYP7SFuskRAiu9HFDka/u5J0pu9Ur0BSTwL18a', NULL, '2023-08-08 11:33:19', '2023-08-08 11:33:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinators_email_unique` (`email`),
  ADD UNIQUE KEY `coordinators_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_presentations`
--
ALTER TABLE `final_presentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_presentations_student_id_foreign` (`student_id`),
  ADD KEY `final_presentations_group_id_foreign` (`group_id`),
  ADD KEY `final_presentations_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_g_id_unique` (`g_id`);

--
-- Indexes for table `group_data`
--
ALTER TABLE `group_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_data_regno_unique` (`regno`),
  ADD KEY `group_data_group_id_foreign` (`group_id`);

--
-- Indexes for table `group_supervisors`
--
ALTER TABLE `group_supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_supervisors_group_id_unique` (`group_id`),
  ADD KEY `group_supervisors_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phase1_subphase1s`
--
ALTER TABLE `phase1_subphase1s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase1_subphase1s_student_id_foreign` (`student_id`),
  ADD KEY `phase1_subphase1s_group_id_foreign` (`group_id`),
  ADD KEY `phase1_subphase1s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase1_subphase2s`
--
ALTER TABLE `phase1_subphase2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase1_subphase2s_student_id_foreign` (`student_id`),
  ADD KEY `phase1_subphase2s_group_id_foreign` (`group_id`),
  ADD KEY `phase1_subphase2s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase1_subphase3s`
--
ALTER TABLE `phase1_subphase3s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase1_subphase3s_student_id_foreign` (`student_id`),
  ADD KEY `phase1_subphase3s_group_id_foreign` (`group_id`),
  ADD KEY `phase1_subphase3s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase2_subphase1s`
--
ALTER TABLE `phase2_subphase1s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase2_subphase1s_student_id_foreign` (`student_id`),
  ADD KEY `phase2_subphase1s_group_id_foreign` (`group_id`),
  ADD KEY `phase2_subphase1s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase2_subphase2s`
--
ALTER TABLE `phase2_subphase2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase2_subphase2s_student_id_foreign` (`student_id`),
  ADD KEY `phase2_subphase2s_group_id_foreign` (`group_id`),
  ADD KEY `phase2_subphase2s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase2_subphase3s`
--
ALTER TABLE `phase2_subphase3s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase2_subphase3s_student_id_foreign` (`student_id`),
  ADD KEY `phase2_subphase3s_group_id_foreign` (`group_id`),
  ADD KEY `phase2_subphase3s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase2_subphase4s`
--
ALTER TABLE `phase2_subphase4s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase2_subphase4s_student_id_foreign` (`student_id`),
  ADD KEY `phase2_subphase4s_group_id_foreign` (`group_id`),
  ADD KEY `phase2_subphase4s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phase2_subphase5s`
--
ALTER TABLE `phase2_subphase5s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase2_subphase5s_student_id_foreign` (`student_id`),
  ADD KEY `phase2_subphase5s_group_id_foreign` (`group_id`),
  ADD KEY `phase2_subphase5s_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_titles`
--
ALTER TABLE `project_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_titles_title_unique` (`title`),
  ADD KEY `project_titles_group_id_foreign` (`group_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proposals_proposal_unique` (`proposal`),
  ADD KEY `proposals_group_id_foreign` (`group_id`);

--
-- Indexes for table `rejected_titles`
--
ALTER TABLE `rejected_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejected_titles_group_id_foreign` (`group_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_regno_unique` (`regno`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`);

--
-- Indexes for table `sub_phases`
--
ALTER TABLE `sub_phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_phases_phase_id_foreign` (`phase_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisors_email_unique` (`email`),
  ADD UNIQUE KEY `supervisors_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_presentations`
--
ALTER TABLE `final_presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `group_data`
--
ALTER TABLE `group_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `group_supervisors`
--
ALTER TABLE `group_supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase1_subphase1s`
--
ALTER TABLE `phase1_subphase1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `phase1_subphase2s`
--
ALTER TABLE `phase1_subphase2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `phase1_subphase3s`
--
ALTER TABLE `phase1_subphase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phase2_subphase1s`
--
ALTER TABLE `phase2_subphase1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phase2_subphase2s`
--
ALTER TABLE `phase2_subphase2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phase2_subphase3s`
--
ALTER TABLE `phase2_subphase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phase2_subphase4s`
--
ALTER TABLE `phase2_subphase4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phase2_subphase5s`
--
ALTER TABLE `phase2_subphase5s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_titles`
--
ALTER TABLE `project_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejected_titles`
--
ALTER TABLE `rejected_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub_phases`
--
ALTER TABLE `sub_phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `final_presentations`
--
ALTER TABLE `final_presentations`
  ADD CONSTRAINT `final_presentations_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_presentations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_presentations_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_data`
--
ALTER TABLE `group_data`
  ADD CONSTRAINT `group_data_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`g_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_data_regno_foreign` FOREIGN KEY (`regno`) REFERENCES `students` (`regno`) ON DELETE CASCADE;

--
-- Constraints for table `group_supervisors`
--
ALTER TABLE `group_supervisors`
  ADD CONSTRAINT `group_supervisors_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`g_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_supervisors_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase1_subphase1s`
--
ALTER TABLE `phase1_subphase1s`
  ADD CONSTRAINT `phase1_subphase1s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase1s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase1s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase1_subphase2s`
--
ALTER TABLE `phase1_subphase2s`
  ADD CONSTRAINT `phase1_subphase2s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase2s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase2s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase1_subphase3s`
--
ALTER TABLE `phase1_subphase3s`
  ADD CONSTRAINT `phase1_subphase3s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase3s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase1_subphase3s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase2_subphase1s`
--
ALTER TABLE `phase2_subphase1s`
  ADD CONSTRAINT `phase2_subphase1s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase1s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase1s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase2_subphase2s`
--
ALTER TABLE `phase2_subphase2s`
  ADD CONSTRAINT `phase2_subphase2s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase2s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase2s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase2_subphase3s`
--
ALTER TABLE `phase2_subphase3s`
  ADD CONSTRAINT `phase2_subphase3s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase3s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase3s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase2_subphase4s`
--
ALTER TABLE `phase2_subphase4s`
  ADD CONSTRAINT `phase2_subphase4s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase4s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase4s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phase2_subphase5s`
--
ALTER TABLE `phase2_subphase5s`
  ADD CONSTRAINT `phase2_subphase5s_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase5s_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phase2_subphase5s_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_titles`
--
ALTER TABLE `project_titles`
  ADD CONSTRAINT `project_titles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`g_id`) ON DELETE CASCADE;

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`g_id`) ON DELETE CASCADE;

--
-- Constraints for table `rejected_titles`
--
ALTER TABLE `rejected_titles`
  ADD CONSTRAINT `rejected_titles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`g_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_phases`
--
ALTER TABLE `sub_phases`
  ADD CONSTRAINT `sub_phases_phase_id_foreign` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
