-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 10:27 AM
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
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_period` date NOT NULL,
  `end_period` date NOT NULL,
  `deadline` date NOT NULL,
  `amount` varchar(255) NOT NULL,
  `percentage` decimal(8,2) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `yearInBar` int(11) NOT NULL,
  `createdBy` bigint(20) UNSIGNED NOT NULL,
  `updateby` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `name`, `start_period`, `end_period`, `deadline`, `amount`, `percentage`, `concern`, `yearInBar`, `createdBy`, `updateby`, `created_at`, `updated_at`) VALUES
(1, 'Contribution 2023', '2023-02-01', '2023-01-31', '2023-03-25', '7,000,000', '20.30', '1,2', 2023, 2, NULL, '2023-03-01 06:47:57', '2023-03-01 06:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contributions_createdby_foreign` (`createdBy`),
  ADD KEY `contributions_updateby_foreign` (`updateby`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contributions_updateby_foreign` FOREIGN KEY (`updateby`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
