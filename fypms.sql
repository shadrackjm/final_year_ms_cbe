-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 10:35 AM
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

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `level`, `body`, `created_at`, `updated_at`) VALUES
(2, 'Presenetation 1', 'bachelor', 'Presentation 1 will be held in 26/07/2023.', '2023-07-16 11:46:28', '2023-07-16 11:46:28'),
(3, 'Presentation 2', 'bachelor', 'presentation 2 will be held on 18/9/2023, the venue will be b1 - 5 to b1-7, the presentation will involve assessment on proposals rewritting and proposal presentations.', '2023-07-16 12:52:36', '2023-07-16 12:52:36'),
(4, 'Next Presentation will be on 20/2/2023', 'supervisor', 'hfjkhejfhejkfhef', '2023-07-17 09:35:44', '2023-07-17 09:35:44'),
(5, 'Presentation 1', 'diploma', 'Presentation 1 will be held on 12/20/2023. if there will be any changes you\'ll be notified.', '2023-07-17 09:37:00', '2023-07-17 09:37:00');

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
(1, 'Anna', 'A', 'Kayanda', NULL, 'annakayanda@gmail.com', 755888888, '2023-07-07 11:55:30', '2023-07-07 11:55:30', NULL);

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
(20, 20, NULL, NULL);

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
(2, '03.0001.01.01.2020', 1, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(3, '03.0003.01.01.2020', 2, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(4, '03.0004.01.01.2020', 2, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(5, '03.0005.01.01.2020', 3, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(6, '03.0006.01.01.2020', 3, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(7, '03.0007.01.01.2020', 3, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(8, '03.0008.01.01.2020', 4, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(9, '03.0009.01.01.2020', 5, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(10, '03.0010.01.01.2020', 5, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(11, '03.0011.01.01.2020', 6, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(12, '03.0012.01.01.2020', 6, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(13, '03.0013.01.01.2020', 7, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(14, '03.0014.01.01.2020', 7, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(15, '03.0015.01.01.2020', 8, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(16, '03.0016.01.01.2020', 8, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(17, '03.0017.01.01.2020', 9, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(18, '03.0018.01.01.2020', 9, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(19, '03.0019.01.01.2020', 10, '2023-07-07 11:57:08', '2023-07-07 11:57:08'),
(20, '03.0020.01.01.2020', 10, '2023-07-07 11:57:08', '2023-07-07 11:57:08');

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
(1, 1, 1, '2023-07-07 11:58:21', '2023-07-07 11:58:21'),
(2, 3, 2, '2023-07-07 11:59:14', '2023-07-07 11:59:14'),
(3, 2, 3, '2023-07-16 09:46:10', '2023-07-16 09:46:10'),
(4, 4, 3, '2023-07-17 10:32:00', '2023-07-17 10:32:00');

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
(23, '2023_07_07_142700_create_proposals_table', 1),
(24, '2023_07_16_133815_create_announcements_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase1s`
--

INSERT INTO `phase1_subphase1s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_topic`, `Significance_project`, `Setting_objectives`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 2, 8.20, 8.00, 30.00, 19.00, 30.00, '2023-07-07 12:02:01', '2023-07-07 12:02:01'),
(2, 6, 3, 2, 7.00, 7.00, 25.00, 7.00, 7.00, '2023-07-07 12:02:01', '2023-07-07 12:02:01'),
(3, 7, 3, 2, 7.40, 7.00, 28.00, 7.00, 7.00, '2023-07-07 12:02:01', '2023-07-07 12:02:01'),
(4, 5, 3, 1, 8.00, 8.00, 8.00, 8.00, 8.00, '2023-07-07 12:03:02', '2023-07-07 12:03:02'),
(5, 6, 3, 1, 8.50, 8.00, 8.00, 8.00, 8.00, '2023-07-07 12:03:02', '2023-07-07 12:03:02'),
(6, 7, 3, 1, 8.00, 8.00, 8.00, 8.00, 8.00, '2023-07-07 12:03:02', '2023-07-07 12:03:02'),
(10, 1, 1, 1, 4.00, 4.00, 7.00, 8.00, 7.00, '2023-07-15 12:59:20', '2023-07-15 12:59:20'),
(11, 1, 1, 2, 5.00, 7.00, 9.00, 8.00, 7.00, '2023-07-15 13:00:17', '2023-07-15 13:00:17'),
(17, 3, 2, 2, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:13:12', '2023-07-17 09:13:12'),
(18, 4, 2, 2, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:13:13', '2023-07-17 09:13:13');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase2s`
--

INSERT INTO `phase1_subphase2s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_topic`, `Significance_project`, `Setting_objectives`, `Methodology`, `Implementation_plan`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 2, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:18:39', '2023-07-17 09:18:39'),
(2, 4, 2, 2, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:18:39', '2023-07-17 09:18:39'),
(3, 1, 1, 2, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:21:22', '2023-07-17 09:21:22');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase1_subphase3s`
--

INSERT INTO `phase1_subphase3s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Project_Background`, `Significance_project`, `Setting_objectives`, `Methodology`, `Implementation_plan`, `Expected_Output`, `Expected_Outcome`, `Conclusion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:27:48', '2023-07-17 09:27:48');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase2_subphase1s`
--

INSERT INTO `phase2_subphase1s` (`id`, `student_id`, `group_id`, `supervisor_id`, `Appearance`, `Presentation_skills`, `Understanding_Project_requirements`, `Requirements_Analysis_Design`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 7.00, 7.00, 7.00, 7.00, '2023-07-17 09:32:51', '2023-07-17 09:32:51');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Project Proposal Phase Assessment', '2023-07-01 10:14:34', '2023-07-01 10:14:34'),
(3, 'Project Implementation Phase Assessment', '2023-07-01 10:14:54', '2023-07-01 10:14:54');

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
(1, 1, 'waste management system', 2, NULL, '2023-07-07 11:58:16', '2023-07-07 12:00:19'),
(2, 3, 'Omega crew Techs', 2, NULL, '2023-07-07 11:58:49', '2023-07-07 12:00:23'),
(3, 2, 'Final Year Project Management system', 2, NULL, '2023-07-16 09:43:03', '2023-07-16 09:56:35'),
(4, 4, 'CBESO information system', 2, NULL, '2023-07-17 10:00:38', '2023-07-17 10:35:11'),
(5, 5, 'Qr Code Invitation App', 2, NULL, '2023-07-17 10:06:57', '2023-07-17 10:20:42');

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

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `group_id`, `proposal`, `proposal_status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 4, '07172023133405danielsalaho64b5191dc482a.docx', 1, NULL, '2023-07-17 10:34:05', '2023-07-17 10:34:05');

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
(1, 2, 'Final Year Project Management system', '2023-07-16 09:55:25', '2023-07-16 09:55:25'),
(2, 4, 'CBESO information system', '2023-07-17 10:20:36', '2023-07-17 10:20:36');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regno`, `fname`, `mname`, `lname`, `level`, `photo`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, '03.0001.01.01.2020', 'rodrick', 'petere', 'musingi', 'bachelor', NULL, 'wiz1@gmail.com', 754638831, '2023-07-07 11:55:50', '2023-07-07 11:55:50'),
(2, '03.0002.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz2@gmail.com', 754638832, '2023-07-07 11:55:50', '2023-07-07 11:55:50'),
(3, '03.0003.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', '0716202315405864b3e55abeab203.0003.01.01.2020.jpg', 'wiz3@gmail.com', 754638833, '2023-07-07 11:55:50', '2023-07-16 12:40:58'),
(4, '03.0004.01.01.2020', 'adelino', 'aniceth', 'ntacho', 'bachelor', NULL, 'adelino@gmail.com', 754638834, '2023-07-07 11:55:50', '2023-07-16 09:47:21'),
(5, '03.0005.01.01.2020', 'shady', 'mballah', 'mballah', 'bachelor', NULL, 'wiz5@gmail.com', 754638835, '2023-07-07 11:55:50', '2023-07-07 11:55:50'),
(6, '03.0006.01.01.2020', 'wiz', 'mballah', 'mballah', 'bachelor', NULL, 'wiz6@gmail.com', 754638836, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(7, '03.0007.01.01.2020', 'shadra', 'mballah', 'mballah', 'bachelor', NULL, 'wiz7@gmail.com', 754638837, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(8, '03.0008.01.01.2020', 'daniel', 'j', 'salaho', 'bachelor', NULL, 'wiz8@gmail.com', 754638838, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(9, '03.0009.01.01.2020', 'mathew', 'mihungo', 'greyson', 'bachelor', NULL, 'wiz9@gmail.com', 754638839, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(10, '03.0010.01.01.2020', 'wilfred', 'sospiter', 'william', 'bachelor', NULL, 'wiz10@gmail.com', 754638811, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(11, '03.0011.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz11@gmail.com', 754638812, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(12, '03.0012.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz12@gmail.com', 754638813, '2023-07-07 11:55:51', '2023-07-07 11:55:51'),
(13, '03.0013.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz13@gmail.com', 754638814, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(14, '03.0014.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz14@gmail.com', 754638815, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(15, '03.0015.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz15@gmail.com', 754638816, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(16, '03.0016.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz16@gmail.com', 754638817, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(17, '03.0017.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz17@gmail.com', 754638818, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(18, '03.0018.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz18@gmail.com', 754638819, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(19, '03.0019.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz19@gmail.com', 754638821, '2023-07-07 11:55:52', '2023-07-07 11:55:52'),
(20, '03.0020.01.01.2020', 'shadrack', 'mballah', 'mballah', 'bachelor', NULL, 'wiz20@gmail.com', 754638823, '2023-07-07 11:55:53', '2023-07-07 11:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_phases`
--

CREATE TABLE `sub_phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subphase_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_phases`
--

INSERT INTO `sub_phases` (`id`, `subphase_name`, `phase_id`, `created_at`, `updated_at`) VALUES
(3, 'Introduction Presentation Assessment Form (100 Points Equiv. to 5 Marks)', 2, '2023-07-01 10:16:28', '2023-07-01 10:16:28'),
(4, 'Final Presentation Assessment Form (100 Points Equiv.to 5 Marks)', 2, '2023-07-01 10:17:16', '2023-07-01 10:17:16'),
(5, 'Proposal Marks Allocation (100 Points Equiv.to 10 Marks)', 2, '2023-07-01 10:18:00', '2023-07-01 10:18:00'),
(6, 'Requirement Presentation Assessment Form (100 Points Equiv. to 10 Marks)', 3, '2023-07-01 10:18:54', '2023-07-01 10:18:54'),
(7, 'Development Presentation Assessment (100 Points Equiv.to 10 Marks) Form', 3, '2023-07-01 10:20:13', '2023-07-01 10:20:13'),
(8, 'Final Presentation Assessment Form (100 Equiv.to 15 Marks)', 3, '2023-07-01 10:20:52', '2023-07-01 10:20:52'),
(9, 'Supervsor\'s individual Student Assessment Form (100 Points Equiv.to 10 Marks)', 3, '2023-07-01 10:21:58', '2023-07-01 10:21:58'),
(10, 'Project Report Marks Allocation (100 Points Equiv.to 30 Marks)', 3, '2023-07-01 10:22:40', '2023-07-01 10:22:40');

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
(1, 'alexander', 'M', 'Makanta', NULL, 'makanta@gmail.com', 73536336, '2023-07-07 11:56:07', '2023-07-07 11:56:07'),
(2, 'alfred', 'A', 'Kajiruga', NULL, 'kajirunga@gmail.com', 73535363, '2023-07-07 11:56:07', '2023-07-07 11:56:07'),
(3, 'Joseph', 'Dunstan', 'Haule', NULL, 'haule@gmail.com', 764353533, '2023-07-16 09:41:12', '2023-07-16 09:41:12'),
(8, 'saika', 'M', 'saika', NULL, 'saika@gmail.com', 73936336, '2023-07-17 11:01:55', '2023-07-17 11:01:55'),
(9, 'paul', 'A', 'magoge', NULL, 'magoge@gmail.com', 73575363, '2023-07-17 11:01:55', '2023-07-17 11:01:55'),
(10, 'respickius', 'A', 'casmir', NULL, 'casmir@gmail.com', 73535365, '2023-07-17 11:01:55', '2023-07-17 11:01:55'),
(11, 'aston', 'A', 'maoge', NULL, 'aston@gmail.com', 73535383, '2023-07-17 11:01:55', '2023-07-17 11:01:55'),
(12, 'frank', 'A', 'magoge', NULL, 'frank@gmail.com', 73535963, '2023-07-17 11:01:55', '2023-07-17 11:01:55'),
(13, 'kijazi', 'A', 'kijazi', NULL, 'kijazi@gmail.com', 73595363, '2023-07-17 11:01:55', '2023-07-17 11:01:55');

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

INSERT INTO `users` (`id`, `username`, `fname`, `Mname`, `lname`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'annakayanda@gmail.com', 'Anna', 'A', 'Kayanda', 'annakayanda@gmail.com', '1', NULL, '$2y$10$obNPdMAkEySw3BcC.WFyleX6.TTvCGYhJN7Rq8LN8lip2b3HnmPom', NULL, '2023-07-07 11:55:30', '2023-07-07 11:55:30', NULL),
(2, '03.0001.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz1@gmail.com', '0', NULL, '$2y$10$0d93lZBsUaDbKQJ9YFIr8u0fiO76.Sk0.ELAXcxScO.A/iwSLUhLy', NULL, '2023-07-07 11:55:50', '2023-07-07 11:55:50', NULL),
(3, '03.0002.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz2@gmail.com', '0', NULL, '$2y$10$oGdkprHfq3RqYIv9E2l66ebuj6WUlRxSy1WbfwCvSB2IptMcgxhvi', NULL, '2023-07-07 11:55:50', '2023-07-07 11:55:50', NULL),
(4, '03.0003.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz3@gmail.com', '0', NULL, '$2y$10$lLl/0FMf6dgpA8GuPyPlVOUwB8WKmbIe18XSTXxD0llKAtf6ra.PW', NULL, '2023-07-07 11:55:50', '2023-07-07 11:55:50', NULL),
(5, '03.0004.01.01.2020', 'adelino', NULL, 'ntacho', 'adelino@gmail.com', '0', NULL, '$2y$10$hS1OOWddHMoJmYau.YW1getkkI1RLxY.KiZIsKGO4Gy0SuXf5u9ne', NULL, '2023-07-07 11:55:50', '2023-07-16 09:47:21', NULL),
(6, '03.0005.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz5@gmail.com', '0', NULL, '$2y$10$qexeMhehy7NtE5nOtnA1yO3DY5MIbIAAXyTvPW38UfCbFRFIqNPk6', NULL, '2023-07-07 11:55:50', '2023-07-07 11:55:50', NULL),
(7, '03.0006.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz6@gmail.com', '0', NULL, '$2y$10$U3h1PVuWsP8SkPfxwJQhu.5mhFd5Q8gGzZgL.IlOCXXOfP6n5GlDu', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(8, '03.0007.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz7@gmail.com', '0', NULL, '$2y$10$ax1/txiMLmBoQDgkUuEh5uW6mgc3oBvTAqRs6r8fkwa/7I/R4kikm', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(9, '03.0008.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz8@gmail.com', '0', NULL, '$2y$10$E.oimCW0y7r0Udptis89cODqOygI7DaxSkUfv2TmVkPBaIaXYdUSm', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(10, '03.0009.01.01.2020', 'methew', '', 'greyson', 'wiz9@gmail.com', '0', NULL, '$2y$10$huvkkVuecQjQmh7e1c8bU.n7QchJ46AmlT7ibbCb32TjpU.W6DDXu', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(11, '03.0010.01.01.2020', 'wilfred', '', 'william', 'wiz10@gmail.com', '0', NULL, '$2y$10$ueu5KCX1svczsMxv5lGhnO/FRO2psCBgQCzwsChTzzpmeIy/jEXgq', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(12, '03.0011.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz11@gmail.com', '0', NULL, '$2y$10$.R7C5zAfkDCcxJRMWboZjeNhiK39jpOx2vTwGMWg23W6eO/.6ho46', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(13, '03.0012.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz12@gmail.com', '0', NULL, '$2y$10$CEYxNrleWKMpngxjLpi.FepZpcKk8iP0Dgeol/g2mOvtJZDyzxjiS', NULL, '2023-07-07 11:55:51', '2023-07-07 11:55:51', NULL),
(14, '03.0013.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz13@gmail.com', '0', NULL, '$2y$10$JXfq/.6EgifhLafTgfsq7u27W7pewoZ.x4twSvFXaPDj0Aia5cZ4.', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(15, '03.0014.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz14@gmail.com', '0', NULL, '$2y$10$kDaDw0MkQLujydzmGsKzheNnsfFoM3kRFlUYKA9RWWlIaN1ofkpOu', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(16, '03.0015.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz15@gmail.com', '0', NULL, '$2y$10$ID739Ak9Uz3iXFg2fQoV.OMvljRb/SRysxeB0xT8kPcGwjtw1MaXi', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(17, '03.0016.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz16@gmail.com', '0', NULL, '$2y$10$CGt6w4YrDerYdwV1cxe5zeJPTM3qzlKt4NBP4gCfhV3U9VpstI2.6', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(18, '03.0017.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz17@gmail.com', '0', NULL, '$2y$10$hwEG10a6ZVZpd.mK3h0J3OHE265k7A5CGhqCHQFc5mTLeX5o..Sge', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(19, '03.0018.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz18@gmail.com', '0', NULL, '$2y$10$u2YnUAkBDWtb.JkMz4xVguNn65PSjZ.lapP0Vb5Fq5kmblQG1dgyu', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(20, '03.0019.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz19@gmail.com', '0', NULL, '$2y$10$BCe04042BTvF2HLKsAgAgugKkGqw4h2guYGjZ7nunINiiPuR161ka', NULL, '2023-07-07 11:55:52', '2023-07-07 11:55:52', NULL),
(21, '03.0020.01.01.2020', 'shadrack', 'mballah', 'mballah', 'wiz20@gmail.com', '0', NULL, '$2y$10$2eocEGFUvBGK3nruH5q9S.861zyhiFUfMi7ENAkZ6dgQlUiy92vBy', NULL, '2023-07-07 11:55:53', '2023-07-07 11:55:53', NULL),
(22, 'makanta@gmail.com', 'alexander', 'M', 'Makanta', 'makanta@gmail.com', '2', NULL, '$2y$10$hGji6FsU8b3X7Ycj5bJTFuuDDShnP/5b3Ut7IoMiTPxigF/3NbLQq', NULL, '2023-07-07 11:56:07', '2023-07-07 11:56:07', NULL),
(23, 'kajirunga@gmail.com', 'alfred', 'A', 'Kajiruga', 'kajirunga@gmail.com', '2', NULL, '$2y$10$Fw3ch3VDrP4LuPAX.3ndF.vZHXslkA56X2u1/BfYQMziDFQf49sri', NULL, '2023-07-07 11:56:07', '2023-07-07 11:56:07', NULL),
(24, 'haule@gmail.com', 'Joseph', 'Dunstan', 'Haule', 'haule@gmail.com', '2', NULL, '$2y$10$jMEvEhKlsB/.IPEB.1/Au.Kyf5Q5260ETfok21NALvDmOrDxsadLi', NULL, '2023-07-16 09:41:11', '2023-07-16 09:41:11', NULL),
(29, 'saika@gmail.com', 'saika', 'M', 'saika', 'saika@gmail.com', '2', NULL, '$2y$10$euAPpOMPke/dsnYf3WS.nu.eQk/veSxyqUXtWcBm.TT2Qii.KbLay', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL),
(30, 'magoge@gmail.com', 'paul', 'A', 'magoge', 'magoge@gmail.com', '2', NULL, '$2y$10$sIpKYfwYUWrulsiV7AOkLuNIZwjN1TIm6LnayOOwq0JPp8sem4B7C', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL),
(31, 'casmir@gmail.com', 'respickius', 'A', 'casmir', 'casmir@gmail.com', '2', NULL, '$2y$10$oUFJSS5xzmb2qOMk0wGiu.D7WG1DwifbKrxvE94AMwYzyBvW5fjcu', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL),
(32, 'aston@gmail.com', 'aston', 'A', 'maoge', 'aston@gmail.com', '2', NULL, '$2y$10$v77YWIES2h9Ya6pAFPB9ROljlq2aiCF2nT1tQ0i7rOAXb6sYKz3X.', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL),
(33, 'frank@gmail.com', 'frank', 'A', 'magoge', 'frank@gmail.com', '2', NULL, '$2y$10$OYRyIYQFASjj9OAE3Hg8HOl7Pd5T2mJvEcTtMdR66YJ7XaNxEmuaa', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL),
(34, 'kijazi@gmail.com', 'kijazi', 'A', 'kijazi', 'kijazi@gmail.com', '2', NULL, '$2y$10$9u0cvq1udxwriRbtuekXcORknuMgWoF/ZzcZPY11aaEsnt9f/5Qe2', NULL, '2023-07-17 11:01:55', '2023-07-17 11:01:55', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group_data`
--
ALTER TABLE `group_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group_supervisors`
--
ALTER TABLE `group_supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase1_subphase1s`
--
ALTER TABLE `phase1_subphase1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phase1_subphase2s`
--
ALTER TABLE `phase1_subphase2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phase1_subphase3s`
--
ALTER TABLE `phase1_subphase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phase2_subphase1s`
--
ALTER TABLE `phase2_subphase1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phase2_subphase2s`
--
ALTER TABLE `phase2_subphase2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase2_subphase3s`
--
ALTER TABLE `phase2_subphase3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase2_subphase4s`
--
ALTER TABLE `phase2_subphase4s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase2_subphase5s`
--
ALTER TABLE `phase2_subphase5s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_titles`
--
ALTER TABLE `project_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejected_titles`
--
ALTER TABLE `rejected_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_phases`
--
ALTER TABLE `sub_phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

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
