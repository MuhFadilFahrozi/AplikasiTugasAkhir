-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2025 at 08:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir4`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participants` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `name`, `nim`, `email`, `phone`, `participants`, `status`, `start_date`, `end_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(11, '13', 'user1', NULL, 'user1@gmail.com', '123123432', NULL, 'Di Setujui', '2025-07-18', '2025-07-18', '09:00', '11:00', '2025-07-17 18:57:27', '2025-07-17 18:59:26'),
(13, '18', 'user1', NULL, 'user1@gmail.com', '123123432', NULL, 'waiting', '2025-10-09', '2025-10-09', '11:09', '13:09', '2025-10-08 21:09:45', '2025-10-08 21:09:45'),
(14, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 50, 'waiting', '2025-10-14', '2025-10-15', '03:29', '05:29', '2025-10-13 13:29:12', '2025-10-13 13:29:12'),
(15, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 50, 'waiting', '2025-10-16', '2025-10-16', '11:33', '13:33', '2025-10-13 20:33:38', '2025-10-13 20:33:38'),
(16, '9', 'user2', NULL, 'user2@gmail.com', '1233214321', 44, 'Di Tolak', '2025-10-24', '2025-10-24', '10:47', '12:47', '2025-10-13 20:47:39', '2025-10-13 20:54:05'),
(17, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 35, 'Di Setujui', '2025-10-17', '2025-10-17', '10:59', '12:59', '2025-10-13 20:59:47', '2025-10-13 21:00:35'),
(18, '9', 'Muh Fadil Fahrozi', 'a11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 40, 'waiting', '2025-10-23', '2025-10-23', '15:19', '17:19', '2025-10-22 00:19:35', '2025-10-22 00:19:35'),
(19, '9', 'Muh Fadil Fahrozi', 'a11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 50, 'waiting', '2025-10-23', '2025-10-23', '17:51', '18:51', '2025-10-22 00:51:05', '2025-10-22 00:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_0c827637ba77c621d0421ac8086dc66f', 'i:1;', 1760413836),
('laravel_cache_0c827637ba77c621d0421ac8086dc66f:timer', 'i:1760413836;', 1760413836),
('laravel_cache_2297bcbfb65a8786a1bb3fe3370f5a4b', 'i:1;', 1761120908),
('laravel_cache_2297bcbfb65a8786a1bb3fe3370f5a4b:timer', 'i:1761120908;', 1761120908),
('laravel_cache_5505d5bfeb66fb70d59097cd2aa7e20c', 'i:1;', 1761119849),
('laravel_cache_5505d5bfeb66fb70d59097cd2aa7e20c:timer', 'i:1761119849;', 1761119849),
('laravel_cache_8f3423da41e0999b3b6b7414dd9ee21e', 'i:1;', 1745857320),
('laravel_cache_8f3423da41e0999b3b6b7414dd9ee21e:timer', 'i:1745857320;', 1745857320),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1761094100),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a:timer', 'i:1761094100;', 1761094100),
('laravel_cache_c63cc66b2e823e01eb356f907d7cdfad', 'i:2;', 1750747106),
('laravel_cache_c63cc66b2e823e01eb356f907d7cdfad:timer', 'i:1750747106;', 1750747106),
('laravel_cache_e10fd735ad88f21f45ee9e47870c152d', 'i:1;', 1761094142),
('laravel_cache_e10fd735ad88f21f45ee9e47870c152d:timer', 'i:1761094142;', 1761094142),
('laravel_cache_fadilfahrozi1945@gmail.com|127.0.0.1', 'i:2;', 1750747106),
('laravel_cache_fadilfahrozi1945@gmail.com|127.0.0.1:timer', 'i:1750747106;', 1750747106),
('laravel_cache_user1@gmail.com12345678|127.0.0.1', 'i:1;', 1745857320),
('laravel_cache_user1@gmail.com12345678|127.0.0.1:timer', 'i:1745857320;', 1745857320);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Fadil', 'fadilfahrozi1945@gmail.com', '081930953014', 'Test', '2025-06-20 02:00:37', '2025-06-20 02:00:37'),
(2, 'Muh Fadil Fahrozi', 'fadilfahrozi1945@gmail.com', '081930953014', 'Message', '2025-06-20 02:03:18', '2025-06-20 02:03:18'),
(3, 'Fadil', 'fadilfahrozi1945@gmail.com', '081930953014', 'Message', '2025-06-20 02:06:35', '2025-06-20 02:06:35'),
(4, 'Muh Fadil Fahrozi', 'fadilfahrozi1945@gmail.com', '081930953014', 'Message', '2025-06-20 02:50:55', '2025-06-20 02:50:55'),
(5, 'user1', 'user1@gmail.com', '123123432', 'Cek notif', '2025-06-24 01:23:44', '2025-06-24 01:23:44'),
(6, 'user1', 'user1@gmail.com', '123123432', 'test', '2025-07-07 00:07:16', '2025-07-07 00:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_22_170120_add_two_factor_columns_to_users_table', 1),
(5, '2025_03_22_170153_create_personal_access_tokens_table', 1),
(7, '2025_04_14_071125_create_rooms_table', 2),
(9, '2025_04_28_160900_create_bookings_table', 3),
(10, '2025_05_05_045906_add_status_field_to_bookings', 4),
(11, '2025_06_20_081844_create_contacts_table', 5),
(12, '2025_10_13_192420_add_participants_to_bookings_table', 6),
(13, '2025_10_13_193650_add_capacity_and_facilities_to_rooms_table', 7),
(14, '2025_10_13_194410_remove_description_and_roomtype_from_rooms_table', 8),
(15, '2025_10_22_065819_add_nim_to_users_table', 9),
(16, '2025_10_22_071449_add_nim_to_bookings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('user1@gmail.com', '$2y$12$V2WrTldsk1TCXPhnI1a/se59wGfVZlFJ5YHGa51VC0eFE16VMdVRu', '2025-06-23 23:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `room_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `facilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_title`, `image`, `capacity`, `facilities`, `created_at`, `updated_at`) VALUES
(9, 'Aula B.5', '1750916689.jpg', 50, 'AC, WiFi, Kursi dan Meja', '2025-05-04 08:53:48', '2025-10-13 13:03:58'),
(10, 'Ruang Rapat D.4.16', '1750916717.jpg', 40, 'AC, Proyektor, WiFi, Kursi dan Meja, Kursi dan Meja', '2025-05-04 08:55:13', '2025-10-13 13:04:32'),
(11, 'Ruang Serba Guna D.1', '1750916742.jpg', 50, 'AC, Proyektor, Sound System, WiFi, Mic Wireless, Kursi dan Meja, Kursi dan Meja', '2025-05-04 08:55:52', '2025-10-13 13:05:18'),
(12, 'Aula E.3', '1750916769.jpg', 325, 'AC, Proyektor, Sound System, WiFi, Mic Wireless, Kursi dan Meja', '2025-05-04 08:56:59', '2025-10-13 13:05:56'),
(13, 'Ruang Rapat G.1', '1750916790.jpg', 30, 'AC, Sound System, WiFi, Mic Wireless, Kursi dan Meja, Kursi dan Meja, Smart TV', '2025-05-04 08:57:53', '2025-10-13 13:06:37'),
(14, 'Ruang Rapat G.3.7', '1750916816.jpg', 25, 'AC, WiFi, Kursi dan Meja, Kursi dan Meja, Smart TV', '2025-05-04 08:58:35', '2025-10-13 13:07:16'),
(15, 'Ruang Rapat H.1', '1746374374.jpg', 100, 'AC, Sound System, WiFi, Mic Wireless, Kursi dan Meja, Kursi dan Meja, Smart TV', '2025-05-04 08:59:34', '2025-10-13 13:07:51'),
(16, 'Aula H.7', '1750916925.jpg', 200, 'AC, Proyektor, Sound System, WiFi, Mic Wireless, Kursi dan Meja, Smart TV', '2025-05-04 09:00:01', '2025-10-13 13:08:18'),
(17, 'Ruang Rapat i5.2', '1750917045.jpg', 30, 'AC, Proyektor, WiFi, Mic Wireless, Kursi dan Meja, Kursi dan Meja', '2025-05-04 09:00:42', '2025-10-13 13:08:51'),
(18, 'Aula I.6', '1750916970.jpg', 150, 'AC, Sound System, WiFi, Mic Wireless, Kursi dan Meja, Smart TV', '2025-05-04 09:01:10', '2025-10-13 13:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4pXccv06mYAU827W83l92iwni1EAHK1iEIC4kb1n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnAyWXZiME1MaVBWa09FM3IyUzdHRmJwUmw2Wms1NlZTQmtCWkhFUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1761121033);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `phone`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(5, 'Admin Fadil', 'A11.2020.123', 'admin@gmail.com', '081967587645', 'admin', NULL, '$2y$12$sAdcC0Yyht.Pv1O16b63sOTL78QeDB.zyxmJFgYzekh9dvxVd0LLm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-21 07:13:03', '2025-04-21 07:13:03'),
(9, 'Muh Fadil Fahrozi', 'a11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 'user', NULL, '$2y$12$hA4ugtZArq89JJNxzWNaKOjdAba3a4QvKubakmf06CEiX35z1kwyW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-22 00:08:46', '2025-10-22 00:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
