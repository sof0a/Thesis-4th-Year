-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 07:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toda_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `butaos`
--

CREATE TABLE `butaos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `toda_commission` decimal(10,2) NOT NULL,
  `toda_paid` decimal(10,2) NOT NULL,
  `toda_balance` decimal(10,2) NOT NULL,
  `toda_payment_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `butaos`
--

INSERT INTO `butaos` (`id`, `driver_id`, `toda_commission`, `toda_paid`, `toda_balance`, `toda_payment_status`, `created_at`, `updated_at`) VALUES
(2, 3, '10.00', '10.00', '0.00', 'Completed', '2024-05-14 18:52:52', '2024-05-14 22:24:27'),
(3, 5, '10.00', '10.00', '0.00', 'Completed', '2024-05-14 22:34:30', '2024-05-14 22:34:37'),
(4, 8, '10.00', '10.00', '0.00', 'Completed', '2024-05-14 22:34:51', '2024-05-14 22:35:12'),
(5, 5, '10.00', '5.00', '5.00', 'Pending', '2024-05-14 22:35:29', '2024-05-14 22:35:29'),
(8, 3, '10.00', '5.00', '5.00', 'Pending', '2024-05-15 21:07:48', '2024-05-15 21:07:48'),
(9, 0, '10.00', '10.00', '0.00', 'Completed', '2024-05-15 21:09:35', '2024-05-15 21:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `rfid`, `image`, `first_name`, `last_name`, `middle_name`, `license_number`, `contact_number`, `model`, `plate_number`, `created_at`, `updated_at`) VALUES
(2, '123', '', 'Robert', 'Downy', 'F.', 'DL2', '+639123456782', 'Model 2', 'TN2', '2024-04-17 01:57:20', '2024-05-13 19:49:29'),
(3, '345', '', 'Bob', 'Builder', NULL, 'DL3', '+639123456783', 'Model 3', 'TN3', '2024-04-17 01:57:20', '2024-05-14 14:20:24'),
(4, '678', '', 'Allysa', 'Dizon', 'A', 'DL4', '+639123456784', 'Model 4', 'TN4', '2024-04-17 01:57:20', '2024-05-01 11:21:14'),
(5, '789', '', 'Erick', 'Monson', '', 'DL5', '+639123456785', 'Model 5', 'TN5', '2024-04-17 01:57:20', '2024-05-12 19:18:27'),
(6, '891', '', 'Roald', 'Comargo', NULL, 'DL6', '+639123456786', 'Model 6', 'TN6', '2024-04-17 01:57:20', '2024-05-01 10:44:56'),
(7, '124', '', 'Samson', 'WithS', NULL, 'DL7', '+639123456787', 'Model 7', 'TN7', '2024-04-17 01:57:20', '2024-05-01 10:44:53'),
(8, '125', '', 'Cyrus', 'Great', '', 'DL8', '+639123456788', 'Model 8', 'TN8', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(12, '126', '', 'Arnold', 'Swswsw', '', 'LN ONE', '091234567899', 'AWS', 'PN222', '2024-04-26 12:18:01', '2024-04-26 12:18:01'),
(13, '127', '', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2024-05-01 01:40:20', '2024-05-01 01:40:20'),
(14, '128', '', 'G', 'G', 'G', 'G', 'GG', 'G', 'G', '2024-05-01 09:20:02', '2024-05-01 09:20:02'),
(18, '131', '', 'ROald', 'Comargo', NULL, 'R12232', '12454578', 'M1', 'asd2222', '2024-05-08 16:22:56', '2024-05-08 16:22:56');

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
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_02_052414_create_admins_table', 1),
(6, '2024_04_02_052421_create_drivers_table', 1),
(7, '2024_04_02_052426_create_tricycles_table', 1),
(8, '2024_04_02_052438_create_passengers_table', 1),
(9, '2024_04_02_061738_create_transactions_table', 1),
(11, '2024_05_14_025647_create_toda_goals_table', 2),
(13, '2024_05_14_033511_create_butao_table', 3),
(14, '2024_05_14_055124_create_butaos_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `name`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Passenger 1', '+639987654321', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(2, 'Passenger 2', '+639987654322', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(3, 'Passenger 3', '+639987654323', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(4, 'Passenger 4', '+639987654324', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(5, 'Passenger 5', '+639987654325', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(6, 'Passenger 6', '+639987654326', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(7, 'Passenger 7', '+639987654327', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(8, 'Passenger 8', '+639987654328', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(9, 'Passenger 9', '+639987654329', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(10, 'Passenger 10', '+6399876543210', '2024-04-17 01:57:21', '2024-04-17 01:57:21'),
(11, 'Passenger 1', '+639987654321', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(12, 'Passenger 2', '+639987654322', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(13, 'Passenger 3', '+639987654323', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(14, 'Passenger 4', '+639987654324', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(15, 'Passenger 5', '+639987654325', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(16, 'Passenger 6', '+639987654326', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(17, 'Passenger 7', '+639987654327', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(18, 'Passenger 8', '+639987654328', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(19, 'Passenger 9', '+639987654329', '2024-04-17 02:04:59', '2024-04-17 02:04:59'),
(20, 'Passenger 10', '+6399876543210', '2024-04-17 02:04:59', '2024-04-17 02:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `passenger_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `fare_amount` decimal(10,2) NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropoff_point` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `driver_id`, `passenger_id`, `date`, `fare_amount`, `landmark`, `pickup_point`, `dropoff_point`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 15, '2024-02-10 00:00:00', '100.00', 'Example landmark', 'Rainbow 8', 'Rainbow 1', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(12, 5, 19, '2024-05-06 00:00:00', '100.00', 'Example landmark', 'Orange 1', 'Orange 5', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(13, 3, 6, '2024-05-06 02:10:07', '100.00', 'Example landmark', 'Vermillion 3', 'Rainbow 21', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(14, 6, 6, '1900-01-18 00:00:00', '100.00', 'Example landmark', 'Rainbow 8', 'Pink 1', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(15, 9, 17, '2024-05-06 00:00:00', '100.00', 'Example landmark', 'Vermillion 3', 'White 4', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(16, 4, 15, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Gray 5', 'Orange 17', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(17, 10, 16, '2024-05-05 16:01:43', '100.00', 'Example landmark', 'Rainbow 8', 'Vermillion 5', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(18, 8, 12, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Orange 1', 'Vermillion 2', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(19, 4, 15, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Rainbow 23', 'Gate 2', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(20, 5, 9, '2024-05-05 00:00:00', '100.00', 'Example landmark', 'Orange 8', 'Rainbow 6', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_toda`
--

CREATE TABLE `transaction_toda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `butaos`
--
ALTER TABLE `butaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_license_number_unique` (`license_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_toda`
--
ALTER TABLE `transaction_toda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `butaos`
--
ALTER TABLE `butaos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaction_toda`
--
ALTER TABLE `transaction_toda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
