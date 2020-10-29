-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 01:54 PM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppsp`
--

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
-- Table structure for table `menu_level1_items`
--

CREATE TABLE `menu_level1_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `menu_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level1_items`
--

INSERT INTO `menu_level1_items` (`id`, `position`, `menu_text`, `text`, `created_at`, `updated_at`) VALUES
(33, 1, '1', '                                          \r\n            \r\n            \r\n            ', '2020-10-25 17:39:53', NULL),
(46, 6, '6', '                                                                                                                \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            ', '2020-10-25 18:06:33', NULL),
(47, 2, '2', '                                                                                    \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            ', '2020-10-25 18:06:38', NULL),
(50, 5, '5', '                            \r\n            \r\n            ', '2020-10-26 14:21:58', NULL),
(51, 7, '7', 'Texto en 7              \r\n            \r\n            ', '2020-10-28 15:52:34', NULL),
(52, 3, '3', '              \r\n            ', '2020-10-28 15:54:37', NULL),
(53, 4, '4', '              \r\n            ', '2020-10-29 13:47:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level2_items`
--

CREATE TABLE `menu_level2_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_level1_item_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `menu_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level2_items`
--

INSERT INTO `menu_level2_items` (`id`, `menu_level1_item_id`, `position`, `menu_text`, `text`, `created_at`, `updated_at`) VALUES
(35, 52, 1, '1 en 3', '              \r\n            ', '2020-10-28 15:57:22', NULL),
(36, 52, 2, '2 en 3 (antes 4 en 4) (antes 2 en 3)', '                                                                      \r\n            \r\n            \r\n            \r\n            \r\n            ', '2020-10-28 15:57:32', NULL),
(38, 52, 3, '3 en 3', '                            \r\n            \r\n            ', '2020-10-28 15:59:30', NULL),
(39, 51, 1, '1 en 7', '              \r\n            ', '2020-10-28 16:16:45', NULL),
(40, 52, 4, '4 en 3', '              \r\n            ', '2020-10-29 13:46:24', NULL),
(41, 51, 2, '2 en 7', '              \r\n            ', '2020-10-29 13:46:47', NULL),
(42, 51, 3, '3 en 7', '              \r\n            ', '2020-10-29 13:48:13', NULL),
(43, 51, 4, '4 en 7', '              \r\n            ', '2020-10-29 13:48:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level3_items`
--

CREATE TABLE `menu_level3_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_level1_item_id` bigint(20) UNSIGNED NOT NULL,
  `menu_level2_item_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `menu_text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level3_items`
--

INSERT INTO `menu_level3_items` (`id`, `menu_level1_item_id`, `menu_level2_item_id`, `position`, `menu_text`, `text`, `created_at`, `updated_at`) VALUES
(6, 52, 35, 1, '1 en 1 en 3', '              \r\n            ', '2020-10-29 13:49:20', NULL),
(7, 52, 35, 2, '2 en 1 en 3', '              \r\n            ', '2020-10-29 13:49:42', NULL),
(8, 52, 35, 3, '3 en 1 en 3', '              \r\n            ', '2020-10-29 13:50:12', NULL),
(9, 51, 39, 1, '1 en 1 en 7', '              \r\n            ', '2020-10-29 13:50:42', NULL),
(10, 51, 39, 2, '2 en 1 en 7', '              \r\n            ', '2020-10-29 13:51:06', NULL),
(11, 51, 39, 3, '3 en 1 en 7', '              \r\n            ', '2020-10-29 13:51:28', NULL),
(12, 52, 35, 4, '4 en 1 en 3', '              \r\n            ', '2020-10-29 13:51:50', NULL),
(13, 51, 39, 4, '4 en 1 en 7', '              \r\n            ', '2020-10-29 13:52:16', NULL),
(14, 51, 41, 1, '1 en 2 en 7', '              \r\n            ', '2020-10-29 13:52:42', NULL),
(15, 51, 41, 2, '2 en 2 en 7', '              \r\n            ', '2020-10-29 13:53:05', NULL),
(16, 51, 41, 3, '3 en 2 en 7', '              \r\n            ', '2020-10-29 13:53:25', NULL),
(17, 51, 41, 4, '4 en 2 en 7', '              \r\n            ', '2020-10-29 13:53:38', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_23_123348_create_menu_level1_items_table', 1),
(5, '2020_10_26_105118_create_menu_level2_items_table', 2),
(6, '2020_10_28_171252_create_menu_level3_items', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu_level1_items`
--
ALTER TABLE `menu_level1_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_level2_items`
--
ALTER TABLE `menu_level2_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_level2_items_menu_level1_item_id_foreign` (`menu_level1_item_id`);

--
-- Indexes for table `menu_level3_items`
--
ALTER TABLE `menu_level3_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_level3_items_menu_level1_item_id_foreign` (`menu_level1_item_id`),
  ADD KEY `menu_level3_items_menu_level2_item_id_foreign` (`menu_level2_item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_level1_items`
--
ALTER TABLE `menu_level1_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `menu_level2_items`
--
ALTER TABLE `menu_level2_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `menu_level3_items`
--
ALTER TABLE `menu_level3_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_level2_items`
--
ALTER TABLE `menu_level2_items`
  ADD CONSTRAINT `menu_level2_items_menu_level1_item_id_foreign` FOREIGN KEY (`menu_level1_item_id`) REFERENCES `menu_level1_items` (`id`);

--
-- Constraints for table `menu_level3_items`
--
ALTER TABLE `menu_level3_items`
  ADD CONSTRAINT `menu_level3_items_menu_level1_item_id_foreign` FOREIGN KEY (`menu_level1_item_id`) REFERENCES `menu_level1_items` (`id`),
  ADD CONSTRAINT `menu_level3_items_menu_level2_item_id_foreign` FOREIGN KEY (`menu_level2_item_id`) REFERENCES `menu_level2_items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
