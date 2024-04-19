-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 10:57 AM
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
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `drivers` (`driver_id`, `name`, `license_number`, `contact_number`, `model`, `plate_number`, `created_at`, `updated_at`) VALUES
(1, 'Driver 1', 'DL1', '+639123456781', 'Model 1', 'TN1', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(2, 'Driver 2', 'DL2', '+639123456782', 'Model 2', 'TN2', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(3, 'Driver 3', 'DL3', '+639123456783', 'Model 3', 'TN3', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(4, 'Driver 4', 'DL4', '+639123456784', 'Model 4', 'TN4', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(5, 'Driver 5', 'DL5', '+639123456785', 'Model 5', 'TN5', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(6, 'Driver 6', 'DL6', '+639123456786', 'Model 6', 'TN6', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(7, 'Driver 7', 'DL7', '+639123456787', 'Model 7', 'TN7', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(8, 'Driver 8', 'DL8', '+639123456788', 'Model 8', 'TN8', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(9, 'Driver 9', 'DL9', '+639123456789', 'Model 9', 'TN9', '2024-04-17 01:57:20', '2024-04-17 01:57:20'),
(10, 'Driver 10', 'DL10', '+6391234567810', 'Model 10', 'TN10', '2024-04-17 01:57:20', '2024-04-17 01:57:20');

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
(9, '2024_04_02_061738_create_transactions_table', 1);

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
(12, 5, 19, '2024-02-10 00:00:00', '100.00', 'Example landmark', 'Orange 1', 'Orange 5', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(13, 3, 6, '1900-01-17 02:10:07', '100.00', 'Example landmark', 'Vermillion 3', 'Rainbow 21', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(14, 6, 6, '1900-01-18 00:00:00', '100.00', 'Example landmark', 'Rainbow 8', 'Pink 1', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(15, 9, 17, '1900-01-17 00:00:00', '100.00', 'Example landmark', 'Vermillion 3', 'White 4', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(16, 4, 15, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Gray 5', 'Orange 17', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(17, 10, 16, '1900-01-21 02:10:21', '100.00', 'Example landmark', 'Rainbow 8', 'Vermillion 5', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(18, 8, 12, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Orange 1', 'Vermillion 2', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(19, 4, 15, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Rainbow 23', 'Gate 2', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34'),
(20, 5, 9, '2024-02-09 00:00:00', '100.00', 'Example landmark', 'Orange 8', 'Rainbow 6', 'Example notes', 'Completed', '2024-04-18 10:06:34', '2024-04-18 10:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `drivers_license_number_unique` (`license_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
