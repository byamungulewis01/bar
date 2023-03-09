-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 10:28 AM
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
-- Table structure for table `contribute_advocates`
--

CREATE TABLE `contribute_advocates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) NOT NULL,
  `transction_type` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `transction_date` varchar(255) NOT NULL,
  `advocate` bigint(20) UNSIGNED NOT NULL,
  `contribution` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contribute_advocates`
--

INSERT INTO `contribute_advocates` (`id`, `amount`, `transction_type`, `reference_no`, `transction_date`, `advocate`, `contribution`, `created_at`, `updated_at`) VALUES
(1, '7000000', 'REFUND', 'U7677HHHHk', '2023-03-02', 7, 1, '2023-03-01 12:27:56', '2023-03-01 12:27:56'),
(2, '70000', 'PAYMENT', '&HHAGg', '2023-03-02', 8, 1, '2023-03-08 03:19:16', '2023-03-08 03:19:16'),
(3, '1222', 'PAYMENT', '1222', '2023-03-08', 18, 1, '2023-03-08 13:50:35', '2023-03-08 13:50:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribute_advocates`
--
ALTER TABLE `contribute_advocates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contribute_advocates_reference_no_unique` (`reference_no`),
  ADD KEY `contribute_advocates_advocate_foreign` (`advocate`),
  ADD KEY `contribute_advocates_contribution_foreign` (`contribution`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribute_advocates`
--
ALTER TABLE `contribute_advocates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contribute_advocates`
--
ALTER TABLE `contribute_advocates`
  ADD CONSTRAINT `contribute_advocates_advocate_foreign` FOREIGN KEY (`advocate`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contribute_advocates_contribution_foreign` FOREIGN KEY (`contribution`) REFERENCES `contributions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
