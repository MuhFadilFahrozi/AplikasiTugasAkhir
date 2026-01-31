-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2026 at 01:19 PM
-- Server version: 5.7.39
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `name`, `nim`, `email`, `phone`, `participants`, `status`, `admin_notes`, `start_date`, `end_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(11, '13', 'user1', NULL, 'user1@gmail.com', '123123432', NULL, 'Di Setujui', NULL, '2025-07-18', '2025-07-18', '09:00', '11:00', '2025-07-17 18:57:27', '2025-07-17 18:59:26'),
(13, '18', 'user1', NULL, 'user1@gmail.com', '123123432', NULL, 'Di Setujui', NULL, '2025-10-09', '2025-10-09', '11:09', '13:09', '2025-10-08 21:09:45', '2026-01-21 12:32:31'),
(14, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 50, 'waiting', NULL, '2025-10-14', '2025-10-15', '03:29', '05:29', '2025-10-13 13:29:12', '2025-10-13 13:29:12'),
(15, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 50, 'waiting', NULL, '2025-10-16', '2025-10-16', '11:33', '13:33', '2025-10-13 20:33:38', '2025-10-13 20:33:38'),
(17, '9', 'user1', NULL, 'user1@gmail.com', '123123432', 35, 'Di Setujui', NULL, '2025-10-17', '2025-10-17', '10:59', '12:59', '2025-10-13 20:59:47', '2025-10-13 21:00:35'),
(18, '9', 'Muh Fadil Fahrozi', 'a11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 40, 'Di Tolak', 'test catatan 2', '2025-10-23', '2025-10-23', '15:19', '17:19', '2025-10-22 00:19:35', '2026-01-28 06:50:50'),
(20, '13', 'arfian syarillah azhar', '123123', 'arvinazhar18@gmail.com', '0550016161613161', 30, 'waiting', NULL, '2025-12-12', '2025-12-12', '07:40', '14:50', '2025-12-11 06:28:19', '2025-12-11 06:28:19'),
(21, '9', 'Muhamad Lutfil Hakim', '2345', 'shadowoll75@gmail.com', '081934675879', 45, 'waiting', NULL, '2025-12-25', '2025-12-27', '08:11', '22:12', '2025-12-11 08:12:16', '2025-12-11 08:12:16'),
(22, '12', 'm. jodi munir', '234567', 'kamp72742@gmail.com', '089587476909', 12, 'Di Tolak', 'test', '2025-12-20', '2025-12-20', '01:31', '03:31', '2025-12-11 08:31:28', '2026-01-21 13:48:36'),
(23, '12', 'm. jodi munir', '234567', 'kamp72742@gmail.com', '089587476909', 20, 'Di Setujui', NULL, '2025-12-18', '2025-12-19', '01:33', '02:33', '2025-12-11 08:33:28', '2026-01-21 13:08:18'),
(25, '13', 'Muh Fadil Fahrozi', 'A11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 21, 'Di Tolak', NULL, '2026-01-22', '2026-01-24', '07:24', '08:24', '2026-01-21 10:24:57', '2026-01-21 13:38:38'),
(26, '11', 'Muh Fadil Fahrozi', 'A11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 20, 'Di Tolak', 'test tolak', '2026-01-23', '2026-01-23', '08:49', '09:49', '2026-01-21 13:49:17', '2026-01-21 13:54:15'),
(27, '13', 'Akun Testing', 'A11.8080', 'akuntesting@gmail.com', '089876543211', 10, 'waiting', NULL, '2026-01-29', '2026-01-29', '13:43', '17:43', '2026-01-29 00:44:33', '2026-01-29 00:44:33'),
(28, '13', 'Akun Testing', 'A11.8080', 'akuntesting@gmail.com', '089876543211', 9, 'Di Setujui', NULL, '2026-01-30', '2026-01-30', '11:44', '13:45', '2026-01-29 00:45:19', '2026-01-29 00:47:45'),
(29, '14', 'Akun Testing', 'A11.8080', 'akuntesting@gmail.com', '089876543211', 15, 'Di Tolak', 'test penolakan oleh admin', '2026-01-30', '2026-01-30', '14:46', '15:46', '2026-01-29 00:46:32', '2026-01-29 00:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_2297bcbfb65a8786a1bb3fe3370f5a4b', 'i:1;', 1769668394),
('laravel_cache_2297bcbfb65a8786a1bb3fe3370f5a4b:timer', 'i:1769668394;', 1769668394),
('laravel_cache_26fcfd01c1699dde099ad3118a1850b9', 'i:1;', 1769672500),
('laravel_cache_26fcfd01c1699dde099ad3118a1850b9:timer', 'i:1769672500;', 1769672500),
('laravel_cache_5505d5bfeb66fb70d59097cd2aa7e20c', 'i:1;', 1769672883),
('laravel_cache_5505d5bfeb66fb70d59097cd2aa7e20c:timer', 'i:1769672883;', 1769672883);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(16, '2025_10_22_071449_add_nim_to_bookings_table', 10),
(17, '2026_01_21_185453_add_admin_notes_to_bookings_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `facilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5gopwJE92sN3Sg0SOMEWod7cHx7nt47PiEeP4VRC', NULL, '127.0.0.1', 'WhatsApp/2.2587.9 W', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREp5NWJXUlNQOG9OSDdVUnBLcGFPWGJ4WVY2RFc5NktGYmZ2RjNTNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769668238),
('anGj1sLnw58Ca6BZ9sdOw59NLOZfbj520FWy0jJj', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjhqZlNTOWFhTlZxaEpNc21TTXJCRTNWWXNPQlJPWXludllBeEQzdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769669565),
('BrPWU4z8fvioZvvJspj2yhJvwaFrKjXjq548ooFD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmhjdm9XN2Y2QjhqR1p0VU5JaVdoTEtuTmxpZ3B4cGtteE5zTG0waiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769669659),
('EXExkkMRv9ix701KZWSP2DimLJ0PU8xCzbtH8gXG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1JIa2thUzRjcWdIMGZhU0I4TThnQ1pQeXd1eFU4NjVIaHZTZ0tySyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769690807),
('MPJeolHIwBflbG8n6sDiCxN0iBJ4kYL6gLUOn42o', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOThybHVaaGdyc0tqYVRJZlRZSE5RNkY4d3BVM3Z0Nk5ad05OUkN4MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29raW5ncyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1769673434),
('Q2JUeoEaC3XuCplJ3DU20Dci9vnUPxmktFP743tV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjRvUWhDa01BNXZ5UmNLTWlKSnF5d05JcjVjZ1hpVlgyaFU5cjlScyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769673511),
('UqlyTRTBagTVskYQ2obLtl3pDDCQZz2RPTRPFLzw', 13, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZkI4Y0JFUGNNZEROdHlMNjdRTm53elplOGpPeURSM0Rzb2htZ2tibSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMzt9', 1769673112),
('XNkL1I07h7fqAypwyU2Fmbgtswm5RlkGWUktw3Zo', 9, '127.0.0.1', 'Mozilla/5.0 (Linux; U; Android 11; in-id; RMX1931 Build/RKQ1.200928.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 HeyTapBrowser/45.7.5.9', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibG1CcWNUVzRIdVppMnhEUFhpQlBRSUI2SEdRdlBJcFB5UUVzd0FXeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldi9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1769669397),
('zNcdmx9Thr6ts2523mkGUSTx552GxHwCm5WRlv2R', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1NQOUs3ckRTUzhLdGVtd2hOTGpaS1BvUTR1Z2VrTUk5UWRQOTlDUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9zdHJhaWdodGZhY2VkbHktb2NlYW5saWtlLWplcm9tZS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769669618);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `phone`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(5, 'Admin Fadil', 'A11.2020.123', 'admin@gmail.com', '081967587645', 'admin', NULL, '$2y$12$sAdcC0Yyht.Pv1O16b63sOTL78QeDB.zyxmJFgYzekh9dvxVd0LLm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-21 07:13:03', '2025-04-21 07:13:03'),
(9, 'Muh Fadil Fahrozi', 'A11.2020.12968', 'fadilfahrozi1945@gmail.com', '081930953014', 'user', NULL, '$2y$12$hA4ugtZArq89JJNxzWNaKOjdAba3a4QvKubakmf06CEiX35z1kwyW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-22 00:08:46', '2025-10-22 00:08:46'),
(10, 'arfian syarillah azhar', '123123', 'arvinazhar18@gmail.com', '0550016161613161', 'user', NULL, '$2y$12$euo69BFy3trljdKceZxzbuoixqR27ryCFWxAOzTu7CCiw78LGZ4Pi', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-11 06:24:14', '2025-12-11 06:24:14'),
(11, 'Muhamad Lutfil Hakim', '2345', 'shadowoll75@gmail.com', '081934675879', 'user', NULL, '$2y$12$1nLMRex7FwGwN9kGxdO0v.BS.J2L6/EfCiq/WZcN4NL1Pec767i0q', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-11 08:09:47', '2025-12-11 08:09:47'),
(12, 'm. jodi munir', '234567', 'kamp72742@gmail.com', '089587476909', 'user', NULL, '$2y$12$.ZAKcnx9rCfxjOA5BBvkUe6192pyb.hNe6kt7syQucexRCrfsf5g6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-11 08:23:20', '2025-12-11 08:23:20'),
(13, 'Akun Testing', 'A11.8080', 'akuntesting@gmail.com', '089876543211', 'user', NULL, '$2y$12$o4E6Muy0AN6rLiPGVOvmauuaRrwOShe874KoaMZdkXp4224Qmntp2', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-28 23:48:52', '2026-01-28 23:48:52');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
