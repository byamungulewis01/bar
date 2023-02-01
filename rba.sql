-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 07:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rba`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `blocked`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Patrick ISHIMWE', 'test@example.com', 'patrick.ishimwe', '2023-01-23 04:28:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '2Jtxenj1DA', NULL, '2023-01-23 04:28:18', '2023-01-23 04:28:18'),
(2, 'BYAMUNGU Lewis', 'byamungulewis@gmail.com', 'bmglewis@gmail.com', '2023-01-23 04:28:18', '$2y$10$itJ9ajohR2VcLPpoIUQX1.l47LKawGoOUyA9B83FYH2PNgIOMkpvO', 0, 'ytouuE7xavLKjUkPa9FkdxavNNd51H8yZiUhy4UxihWMGRZMFl6c9glexWk1', NULL, '2023-01-23 04:28:18', '2023-01-23 04:47:26'),
(3, 'NDIKUMANA Eric', 'ndikumana@gmail.com', 'eric.ndikumana', '2023-01-23 04:28:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'JYoa0Rb6CR', NULL, '2023-01-23 04:28:18', '2023-01-23 04:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lawscategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `user_id`, `lawscategory_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-31 07:31:12', '2023-01-31 07:31:12'),
(2, 1, 3, '2023-01-31 07:31:12', '2023-01-31 07:31:12'),
(3, 1, 47, '2023-01-31 07:31:12', '2023-01-31 07:31:12'),
(4, 5, 1, '2023-01-31 10:10:08', '2023-01-31 10:10:08'),
(5, 4, 5, '2023-01-31 11:18:32', '2023-01-31 11:18:32'),
(6, 2, 5, '2023-01-31 11:31:51', '2023-01-31 11:31:51'),
(7, 7, 5, '2023-01-31 15:16:46', '2023-01-31 15:16:46'),
(8, 7, 7, '2023-01-31 15:16:46', '2023-01-31 15:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `authentication_log`
--

CREATE TABLE `authentication_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authenticatable_type` varchar(255) NOT NULL,
  `authenticatable_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `login_successful` tinyint(1) NOT NULL DEFAULT 0,
  `logout_at` timestamp NULL DEFAULT NULL,
  `cleared_by_user` tinyint(1) NOT NULL DEFAULT 0,
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`location`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentication_log`
--

INSERT INTO `authentication_log` (`id`, `authenticatable_type`, `authenticatable_id`, `ip_address`, `user_agent`, `login_at`, `login_successful`, `logout_at`, `cleared_by_user`, `location`) VALUES
(1, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.55', '2023-01-23 04:47:03', 1, '2023-01-23 04:47:26', 0, NULL),
(2, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.55', '2023-01-23 04:47:33', 1, '2023-01-23 04:48:10', 0, NULL),
(3, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', NULL, 0, '2023-01-23 04:47:50', 0, NULL),
(4, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.55', '2023-01-23 04:48:20', 1, '2023-01-23 04:48:47', 0, NULL),
(5, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-23 04:49:41', 1, NULL, 0, NULL),
(6, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-23 11:29:46', 1, NULL, 0, NULL),
(7, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-23 16:23:16', 1, NULL, 0, NULL),
(8, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-24 01:07:56', 1, NULL, 0, NULL),
(9, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-25 04:29:19', 1, '2023-01-25 05:54:41', 0, NULL),
(10, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-25 05:55:07', 1, '2023-01-25 05:58:04', 0, NULL),
(11, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-25 05:58:19', 1, '2023-01-25 09:04:11', 0, NULL),
(12, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-25 09:04:23', 1, '2023-01-25 10:42:25', 0, NULL),
(13, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-25 10:42:39', 1, NULL, 0, NULL),
(14, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 04:04:48', 1, '2023-01-31 05:34:46', 0, NULL),
(15, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 05:52:12', 1, '2023-01-31 05:56:11', 0, NULL),
(16, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 06:31:18', 1, '2023-01-31 06:49:09', 0, NULL),
(17, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 06:49:19', 1, '2023-01-31 07:29:01', 0, NULL),
(18, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 07:29:18', 1, '2023-01-31 07:40:53', 0, NULL),
(19, 'App\\Models\\User', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 10:09:13', 1, '2023-01-31 10:09:42', 0, NULL),
(20, 'App\\Models\\User', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 10:09:54', 1, '2023-01-31 10:10:15', 0, NULL),
(21, 'App\\Models\\User', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 11:17:37', 1, '2023-01-31 11:17:59', 0, NULL),
(22, 'App\\Models\\User', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 11:18:09', 1, '2023-01-31 11:18:51', 0, NULL),
(23, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 11:31:35', 1, '2023-01-31 11:31:58', 0, NULL),
(24, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 13:22:54', 1, '2023-01-31 15:09:26', 0, NULL),
(25, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:11:43', 1, '2023-01-31 15:14:08', 0, NULL),
(26, 'App\\Models\\User', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:15:08', 1, '2023-01-31 15:15:31', 0, NULL),
(27, 'App\\Models\\User', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:15:50', 1, '2023-01-31 15:16:50', 0, NULL),
(28, 'App\\Models\\User', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:18:56', 1, '2023-01-31 15:19:18', 0, NULL),
(29, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:19:28', 1, '2023-01-31 15:21:50', 0, NULL),
(30, 'App\\Models\\Admin', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2023-01-31 15:40:39', 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discipline`
--

CREATE TABLE `discipline` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_email` varchar(255) DEFAULT NULL,
  `p_phone` varchar(255) DEFAULT NULL,
  `p_advocate` int(11) DEFAULT NULL,
  `d_name` varchar(255) DEFAULT NULL,
  `d_email` varchar(255) DEFAULT NULL,
  `d_phone` varchar(255) DEFAULT NULL,
  `d_advocate` int(11) DEFAULT NULL,
  `case_number` varchar(255) NOT NULL,
  `case_type` enum('1','2','3') NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `sammary` longtext NOT NULL,
  `case_status` enum('OPEN','CLOSED') NOT NULL DEFAULT 'OPEN',
  `authority` enum('BATONIER','DISCIPLINARY COMMITEE') NOT NULL DEFAULT 'BATONIER',
  `register` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discipline`
--

INSERT INTO `discipline` (`id`, `p_name`, `p_email`, `p_phone`, `p_advocate`, `d_name`, `d_email`, `d_phone`, `d_advocate`, `case_number`, `case_type`, `complaint`, `sammary`, `case_status`, `authority`, `register`, `created_at`, `updated_at`) VALUES
(1, 'SEKANYANA Jirbert', 'sekanyanaprince@gmail.com', '0786663333', NULL, 'Umutuzo Aime', 'aimeumutuzo@gmail.com', NULL, 2, 'DC/1/2023', '1', 'Urubanza rwicyaha kanaka', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love. updated today', 'OPEN', 'BATONIER', 2, '2023-01-23 04:32:11', '2023-01-23 22:00:00'),
(2, 'NYIRAHABIMANA Chantal', 'chantal@gmail.com', NULL, 4, 'Ndarishize Moize', 'moize@gmail.com', '0788000000', NULL, 'DC/2/2023', '2', 'Ubiriganya nubwambuzi Kumbaraga', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton \r\ncandy I love.', 'CLOSED', 'BATONIER', 2, '2023-01-23 04:34:37', '2023-01-24 04:43:00'),
(3, 'Uwizewe jean', 'uwizewe@gmail.com', NULL, 5, 'Ndayambaje jean Paul', 'ndayambaje@gmail.com', NULL, 6, 'DC/3/2023', '3', 'Kwibwa Imachne update3', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.   update   1', 'OPEN', 'BATONIER', 2, '2023-01-23 04:35:07', '2023-01-23 22:00:00'),
(4, 'Dusabe rose', 'dusabe@gmail.com', '0778884444', NULL, 'NYIRAHABIMANA Chantal', 'chantal@gmail.com', NULL, 4, 'DC/4/2023', '1', 'Kumuhoza kunkeke', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.', 'OPEN', 'BATONIER', 2, '2023-01-24 11:48:49', '2023-01-24 11:48:49'),
(5, 'Umutuzo Aime', 'aimeumutuzo@gmail.com', NULL, 2, 'Yves SUGIRA', 'sugira@gmail.com', NULL, 1, 'DC/5/2023', '3', 'Kwibwa Amafranga', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.', 'OPEN', 'BATONIER', 2, '2023-01-24 11:59:32', '2023-01-23 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `discipline_participants`
--

CREATE TABLE `discipline_participants` (
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `discipline_case` bigint(20) NOT NULL,
  `advocate` bigint(20) NOT NULL,
  `role` enum('Plaintiff','Defendant') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discipline_participants`
--

INSERT INTO `discipline_participants` (`table_id`, `discipline_case`, `advocate`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Plaintiff', '2023-01-23 04:32:11', '2023-01-23 22:00:00'),
(2, 2, 4, 'Defendant', '2023-01-23 04:34:37', '2023-01-23 22:00:00'),
(3, 3, 5, 'Plaintiff', '2023-01-23 04:35:07', '2023-01-23 22:00:00'),
(4, 3, 6, 'Defendant', '2023-01-23 04:35:07', '2023-01-23 22:00:00'),
(5, 2, 2, 'Plaintiff', '2023-01-23 05:29:01', '2023-01-23 22:00:00'),
(6, 4, 4, 'Plaintiff', '2023-01-24 11:48:49', '2023-01-24 11:48:49'),
(7, 5, 2, 'Plaintiff', '2023-01-24 11:59:32', '2023-01-23 22:00:00'),
(8, 5, 1, 'Defendant', '2023-01-24 11:59:32', '2023-01-23 22:00:00'),
(9, 1, 3, 'Defendant', '2023-01-25 05:25:46', '2023-01-25 05:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `discipline_sittings`
--

CREATE TABLE `discipline_sittings` (
  `sitting_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `sittingDay` varchar(255) NOT NULL DEFAULT 'NONE',
  `sittingTime` varchar(255) NOT NULL DEFAULT 'NONE',
  `sittingVenue` varchar(255) NOT NULL DEFAULT 'NONE',
  `discipline_case` bigint(20) NOT NULL,
  `decisionCategory` varchar(255) DEFAULT NULL,
  `targetedAdvocate` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `scheduledBy` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discipline_sittings`
--

INSERT INTO `discipline_sittings` (`sitting_id`, `category`, `sittingDay`, `sittingTime`, `sittingVenue`, `discipline_case`, `decisionCategory`, `targetedAdvocate`, `comment`, `scheduledBy`, `created_at`, `updated_at`) VALUES
(1, '', 'NONE', 'NONE', 'NONE', 1, NULL, NULL, NULL, 2, '2023-01-23 04:32:11', '2023-01-23 04:32:11'),
(2, 'Mediation', '2023-01-24', '16:12', 'Gisozi Dove Hotel', 2, 'Referral to discipline commitee', 'Umutuzo Aime', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake.', 2, '2023-01-23 04:34:37', '2023-01-23 06:14:17'),
(3, 'Hearing by BATONIER', '2023-01-25', '21:00', 'RBA HQ', 3, 'Blame', 'N/A<', 'Twanzuyeko Tuzahurizahamwe Byose hanyuma tugafata umwanzuro', 2, '2023-01-23 04:35:07', '2023-01-24 05:01:58'),
(4, 'Hearing by BATONIER', '2023-01-24', '10:55', 'RBA HQ Office', 2, 'Referral to discipline commitee', 'Yves SUGIRA', 'Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake.', 2, '2023-01-23 06:54:54', '2023-01-23 06:58:12'),
(5, '', 'NONE', 'NONE', 'NONE', 4, NULL, NULL, NULL, 2, '2023-01-24 11:48:49', '2023-01-24 11:48:49'),
(6, '', 'NONE', 'NONE', 'NONE', 5, NULL, NULL, NULL, 2, '2023-01-24 11:59:32', '2023-01-24 11:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`id`, `user_id`, `meeting_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2023-01-23 13:08:07', '2023-01-23 13:08:07'),
(2, 2, 2, 2, '2023-01-23 13:08:07', '2023-01-23 13:08:07'),
(3, 3, 2, 1, '2023-01-23 13:08:07', '2023-01-23 13:08:07'),
(4, 4, 2, 1, '2023-01-23 13:08:07', '2023-01-23 13:08:07'),
(5, 1, 4, 1, '2023-01-23 13:22:53', '2023-01-23 13:22:53'),
(6, 2, 4, 1, '2023-01-23 13:22:53', '2023-01-23 13:22:53'),
(7, 3, 4, 1, '2023-01-23 13:22:53', '2023-01-23 13:22:53'),
(8, 4, 4, 1, '2023-01-23 13:22:53', '2023-01-23 13:22:53'),
(10, 3, 1, 1, '2023-01-24 08:07:16', '2023-01-24 08:07:16'),
(13, 1, 1, 1, '2023-01-24 08:43:13', '2023-01-24 08:43:13'),
(14, 6, 1, 1, '2023-01-24 08:55:01', '2023-01-24 08:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `lawscategories`
--

CREATE TABLE `lawscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawscategories`
--

INSERT INTO `lawscategories` (`id`, `title`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrative law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(2, 'Admiralty (or maritime) law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(3, 'Advertising law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(4, 'Agency law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(5, 'Alcohol law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(6, 'Alternative dispute resolution', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(7, 'Animal law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(8, 'Antitrust law (or competition law)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(9, 'Appellate practice', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(10, 'Art law (or art and culture law)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(11, 'Aviation law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(12, 'Banking law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(13, 'Bankruptcy law(creditor debtor rights,insolvency reorganization)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(14, 'Bioethics', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(15, 'Business law (or commercial law); also commercial litigation', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(16, 'Business organizations law (or companies law)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(17, 'Civil law or common law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(18, 'Class action litigation/Mass tort litigation', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(19, 'Communications law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(20, 'Computer law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(21, 'Conflict of law (or private international law)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(22, 'Constitutional law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(23, 'Construction law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(24, 'Consumer law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(25, 'Contract law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(26, 'Copyright law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(27, 'Corporate law (or company law)\", \"Corporate compliance law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(28, 'Corporate governance law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(29, 'Criminal law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(30, 'Cryptography law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(31, 'Cultural property law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(32, 'Custom law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(33, 'Cyber law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(34, 'Defamation', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(35, 'Derivatives and futures law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(36, 'Drug control law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(37, 'Elder law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(38, 'Employee benefits law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(39, 'Employment law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(40, 'Energy law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(41, 'Entertainment law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(42, 'Environmental law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(43, 'Equipment finance law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(44, 'Evidence', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(45, 'Family law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(46, 'FDA law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(47, 'Financial services regulation law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(48, 'Firearm law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(49, 'Food law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(50, 'Franchise law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(51, 'Gaming law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(52, 'Health law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(53, 'Health and safety law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(54, 'Health care law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(55, 'Immigration law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(56, 'Insurance law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(57, 'Intellectual property law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(58, 'International law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(59, 'International trade and finance law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(60, 'Internet law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(61, 'Labour law (or Labor law)', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(62, 'Land use & zoning law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(63, 'Litigation', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(64, 'Martial law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(65, 'Media law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(66, 'Mergers & acquisitions law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(67, 'Military law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(68, 'Mining law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(69, 'Juvenile law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(70, 'Music law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(71, 'Mutual funds law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(72, 'Nationality law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(73, 'Native American law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(74, 'Obscenity law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(75, 'Oil & gas law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(76, 'Parliamentary law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(77, 'Patent law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(78, 'Poverty law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(79, 'Privacy law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(80, 'Private equity law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(81, 'Private funds law / Hedge funds law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(82, 'Procedural law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(83, 'Product liability litigationProperty law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(84, 'Public health law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(85, 'Public International Law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(86, 'Railroad law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(87, 'Real estate law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(88, 'Securities law / Capital markets law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(89, 'Social Security', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(90, 'Disability law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(91, 'Space law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(92, 'Sports law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(93, 'Statutory law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(94, 'Tax law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(95, 'Technology law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(96, 'Timber law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(97, 'Tort law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(98, 'Trademark law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(99, 'Transport law / Transportation law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(100, 'Trusts & estates law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(101, 'Utilities Regulation Venture capital law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(102, 'Water law', NULL, NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `maritals`
--

CREATE TABLE `maritals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maritals`
--

INSERT INTO `maritals` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Single', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(2, 'Married', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(3, 'Divorced', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(4, 'Separated', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(5, 'Widowed', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(6, 'Catholic Nun', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(7, 'Catholic Priest', NULL, '2023-01-23 04:28:19', '2023-01-23 04:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `credits` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `date`, `start`, `end`, `venue`, `credits`, `published`, `created_at`, `updated_at`) VALUES
(1, 'New Meeting', '2023-01-23', '12:00:00', '15:00:00', 'Testing HQ', '0.2', 0, '2023-01-23 13:05:12', '2023-01-23 13:05:12'),
(2, 'Inama Idanzwe', '2023-01-23', '12:00:00', '17:00:00', 'RBA HQ', '0.2', 1, '2023-01-23 13:08:07', '2023-01-23 13:08:07'),
(3, 'Hooks', '2023-01-26', '12:00:00', '12:00:00', 'Musanze BAR', '1', 0, '2023-01-23 13:21:18', '2023-01-23 13:21:18'),
(4, 'Mutungo bagter', '2023-01-24', '14:00:00', '17:30:00', 'RBA HQ', '1', 1, '2023-01-23 13:22:53', '2023-01-23 13:22:53'),
(5, 'Kwiga ku year badge', '2023-01-28', '12:00:00', '16:00:00', 'RBA HQ', '1.3', 0, '2023-01-24 05:35:13', '2023-01-24 05:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_10_122950_create_admins_table', 1),
(6, '2023_01_11_002722_create_maritals_table', 1),
(7, '2023_01_11_003130_create_lawscategories_table', 1),
(8, '2023_01_11_003547_create_organizations_table', 1),
(9, '2023_01_11_004949_create_addresses_table', 1),
(10, '2023_01_11_005412_create_socials_table', 1),
(11, '2023_01_11_005629_create_phonenumbers_table', 1),
(12, '2023_01_11_005909_create_areas_table', 1),
(13, '2023_01_15_175951_create_permission_tables', 1),
(14, '2023_01_15_180553_create_meetings_table', 1),
(15, '2023_01_15_190701_create_authentication_log_table', 1),
(16, '2023_01_21_131215_create_probono_table', 1),
(17, '2023_01_21_175141_create_probono_members_table', 1),
(18, '2023_01_22_140817_create_discipline_table', 1),
(19, '2023_01_22_142701_create_discipline_participants_table', 1),
(20, '2023_01_22_142730_create_discipline_sittings_table', 1),
(21, '2023_01_23_113656_create_invitation', 2),
(22, '2023_01_31_151021_create_probonos_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Lawfirm','Other') NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'web', '2023-01-23 04:28:18', '2023-01-23 04:28:18'),
(2, 'create-users', 'org', '2023-01-23 04:28:18', '2023-01-23 04:28:18'),
(3, 'edit-users', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(4, 'edit-users', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(5, 'delete-users', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(6, 'delete-users', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(7, 'view-users', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(8, 'view-users', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(9, 'user-profile', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(10, 'user-profile', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(11, 'set-user-status', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(12, 'set-user-status', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(13, 'view-inactive', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(14, 'view-inactive', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(15, 'activate-inactive', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(16, 'activate-inactive', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(17, 'create-org', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(18, 'create-org', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(19, 'edit-org', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(20, 'edit-org', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(21, 'delete-org', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(22, 'delete-org', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(23, 'view-org', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(24, 'view-org', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(25, 'create-meeting', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(26, 'create-meeting', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(27, 'edit-meeting', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(28, 'edit-meeting', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(29, 'delete-meeting', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(30, 'delete-meeting', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(31, 'view-meeting', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(32, 'view-meeting', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(33, 'make-attendance', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(34, 'make-attendance', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(35, 'view-attendance', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(36, 'view-attendance', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(37, 'send-invitation', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(38, 'send-invitation', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(39, 'notify-invitees', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(40, 'notify-invitees', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(41, 'upload-minutes', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(42, 'upload-minutes', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(43, 'create-roles', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(44, 'create-roles', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(45, 'edit-roles', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(46, 'edit-roles', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(47, 'delete-roles', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(48, 'delete-roles', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(49, 'view-roles', 'web', '2023-01-23 04:28:19', '2023-01-23 04:28:19'),
(50, 'view-roles', 'org', '2023-01-23 04:28:19', '2023-01-23 04:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonenumbers`
--

CREATE TABLE `phonenumbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonenumbers`
--

INSERT INTO `phonenumbers` (`id`, `name`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'mobile', '0786663377', 3, NULL, NULL),
(2, 'mobile', '07866635555', 4, NULL, NULL),
(3, 'mobile', '0786655566', 2, NULL, NULL),
(4, 'mobile', '07833555568', 1, NULL, NULL),
(5, 'mobile', '0788766666', 5, '2023-01-24 04:55:08', '2023-01-24 04:55:08'),
(6, 'mobile', '0777665555', 6, '2023-01-24 04:56:55', '2023-01-24 04:56:55'),
(7, 'mobile', '0788672689', 7, '2023-01-31 15:13:24', '2023-01-31 15:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `probonos`
--

CREATE TABLE `probonos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `referral_case_no` varchar(255) NOT NULL,
  `jurisdiction` varchar(255) NOT NULL,
  `court` varchar(255) NOT NULL,
  `case_nature` varchar(255) NOT NULL,
  `hearing_date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `referrel` bigint(20) UNSIGNED NOT NULL,
  `status` enum('OPEN','CLOSED') NOT NULL,
  `register` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `probonos`
--

INSERT INTO `probonos` (`id`, `fname`, `lname`, `gender`, `age`, `phone`, `referral_case_no`, `jurisdiction`, `court`, `case_nature`, `hearing_date`, `category`, `referrel`, `status`, `register`, `created_at`, `updated_at`) VALUES
(1, 'Eric', 'MUHOZA', 'Male', '44', '0778884444', 'RC 8889999AB', 'test1', 'Rwibanze', 'Social', '2023-02-03', 'Prosecutor', 3, 'OPEN', '2', '2023-01-31 14:43:29', '2023-01-31 14:43:29'),
(2, 'Michel', 'Joel', 'Male', '56', '0786663333', 'RC 455PA2022A', 'test2', 'Rwibanze2', 'Civil', '2023-02-02', 'Case Agaist RBA', 1, 'OPEN', '2', '2023-01-31 14:46:42', '2023-01-31 14:46:42'),
(3, 'Umulisa', 'Noella', 'Female', '33', '0786663355', 'RC 337Hy77', 'test3', 'Rwibanze3', 'Social', '2023-02-02', 'Supreme count', 2, 'OPEN', '2', '2023-01-31 14:48:05', '2023-01-31 14:48:05'),
(4, 'umuhoza', 'alice', 'Female', '33', '0786663355', 'RC33334KK', 'test4', 'Rwibanze4', 'Social', '2023-02-02', 'Legal Aid to General Public', 1, 'OPEN', '2', '2023-01-31 14:49:20', '2023-01-31 14:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `probono_members`
--

CREATE TABLE `probono_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advocate` int(11) NOT NULL,
  `probono` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `probono_members`
--

INSERT INTO `probono_members` (`id`, `advocate`, `probono`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-23 16:24:15', '2023-01-23 16:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin', '2023-01-23 04:28:19', '2023-01-23 04:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `marital` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `diplome` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `regNumber` varchar(255) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  `practicing` enum('1','2','3','4','5','6') NOT NULL,
  `category` enum('Advocate','Staff') NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `district`, `gender`, `marital`, `photo`, `diplome`, `username`, `email_verified_at`, `regNumber`, `status`, `practicing`, `category`, `password`, `date`, `blocked`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Yves SUGIRA', 'sugira@gmail.com', 'Nyabihu', 'Male', '1', '141424-1-old.jpg', '141424-1-old.jpg', NULL, NULL, '001/T/2023', '1', '2', 'Advocate', '$2y$10$9CaoQrH4CITnBe/mxJrOk.OU9alNWVRcr9tbB3C8fHVNSKewa3tKi', '2023-01-21', 0, NULL, NULL, '2023-01-21 10:14:24', '2023-01-21 11:13:32'),
(2, 'Umutuzo Aime', 'aimeumutuzo@gmail.com', 'Muhanga', 'Female', 'Married', '141909-4.jpg', '141909-6.jpg', NULL, NULL, '002/S/2023', '2', '3', 'Advocate', '$2y$10$ZjfPNtzonCWp/J71vGeuxeNUbm3eeijiziNr8lDiIlQOhnzJzQice', '2023-01-21', 0, NULL, NULL, '2023-01-21 10:19:09', '2023-01-28 10:19:09'),
(3, 'NIYIGENA Clemance', 'clemmy@gmail.com', 'Kamonyi', 'Female', '4', '142034-6.jpg', '142034-6.jpg', NULL, NULL, 'RSTA/1/23', '3', '1', 'Staff', '$2y$10$SGdE4Ez4cfgvC14311WlQOTOsVknePeMoa89CiQmkcbMpI0L.cKVm', '2023-01-18', 0, NULL, NULL, '2023-01-21 10:20:34', '2023-01-21 10:20:34'),
(4, 'NYIRAHABIMANA Chantal', 'chantal@gmail.com', 'Gicumbi', 'Female', 'Married', '142158-8.jpg', '142158-8.jpg', NULL, NULL, 'RSTA/2/23', '4', '1', 'Staff', '$2y$10$p3tTWf4t7s4NUuPbKMrot.lxEcjrjYp3QkNg85USPI2F3cr2H9/DW', '2023-01-04', 0, NULL, NULL, '2023-01-21 10:21:59', '2023-01-31 11:17:59'),
(5, 'Uwizewe jean', 'uwizewe@gmail.com', 'Kicukiro', 'Male', 'Divorce', '065507-d4.jpg', '065507-d4.jpg', NULL, NULL, '003/S/2023', '2', '3', 'Advocate', '$2y$10$t5z4ffWE61J5qxLLZvQy.exNAt1/zvfjA0PH/QKlR39TJUZETwORG', '2023-01-24', 0, NULL, NULL, '2023-01-24 04:55:08', '2023-01-31 10:09:42'),
(6, 'Ndayambaje jean Paul', 'ndayambaje@gmail.com', 'Nyabihu', 'Male', 'Married', '065654-pawandeep.jpg', '065654-pawandeep.jpg', NULL, NULL, 'RSTA/3/23', '3', '1', 'Staff', '$2y$10$7cCDnyNRGNHS8i9oOgePBejhZ2MTf07jdBSQc8s1lsL6y7XPB1IVG', '2023-01-23', 0, NULL, NULL, '2023-01-24 04:56:55', '2023-01-24 04:56:55'),
(7, 'UWIZEWE JEAN', 'uwizewe@test.com', 'Nyagatare', 'Male', '2', '171324-1-old.jpg', '171324-1-old.jpg', NULL, NULL, '004/S/2023', '2', '2', 'Advocate', '$2y$10$DpZoINko8ZPpi8wLnabX0eXIAbbejvQzH9xd/qH.jiYtYJvHazk7m', '2023-01-31', 0, NULL, NULL, '2023-01-31 15:13:24', '2023-01-31 15:15:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_lawscategory_id_foreign` (`lawscategory_id`),
  ADD KEY `areas_user_id_foreign` (`user_id`);

--
-- Indexes for table `authentication_log`
--
ALTER TABLE `authentication_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authentication_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`);

--
-- Indexes for table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discipline_participants`
--
ALTER TABLE `discipline_participants`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `discipline_sittings`
--
ALTER TABLE `discipline_sittings`
  ADD PRIMARY KEY (`sitting_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawscategories`
--
ALTER TABLE `lawscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritals`
--
ALTER TABLE `maritals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phonenumbers_user_id_foreign` (`user_id`);

--
-- Indexes for table `probonos`
--
ALTER TABLE `probonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `probonos_referrel_foreign` (`referrel`);

--
-- Indexes for table `probono_members`
--
ALTER TABLE `probono_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `authentication_log`
--
ALTER TABLE `authentication_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discipline_participants`
--
ALTER TABLE `discipline_participants`
  MODIFY `table_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discipline_sittings`
--
ALTER TABLE `discipline_sittings`
  MODIFY `sitting_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lawscategories`
--
ALTER TABLE `lawscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `maritals`
--
ALTER TABLE `maritals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `probonos`
--
ALTER TABLE `probonos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `probono_members`
--
ALTER TABLE `probono_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_lawscategory_id_foreign` FOREIGN KEY (`lawscategory_id`) REFERENCES `lawscategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `areas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  ADD CONSTRAINT `phonenumbers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `probonos`
--
ALTER TABLE `probonos`
  ADD CONSTRAINT `probonos_referrel_foreign` FOREIGN KEY (`referrel`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
