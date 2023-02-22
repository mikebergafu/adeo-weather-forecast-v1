-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2023 at 05:56 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adeo_weather_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_code`, `lon`, `lat`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'New York', 'US', -75.4999, 40.7143, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(2, 'London', 'GB', -0.1257, 51.5085, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(3, 'Paris', 'US', 2.3488, 48.8534, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(4, 'Berlin', 'US', 13.4105, 52.5244, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12'),
(5, 'Tokyo', 'US', 139.6917, 35.6895, 1, '2023-02-22 11:40:15', '2023-02-22 11:40:12');

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
-- Table structure for table `forecasts`
--

CREATE TABLE `forecasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forecast_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp` double DEFAULT NULL,
  `pressure` double DEFAULT NULL,
  `humidity` double DEFAULT NULL,
  `dew_point` double DEFAULT NULL,
  `uvi` double DEFAULT NULL,
  `clouds` double DEFAULT NULL,
  `visibility` double DEFAULT NULL,
  `wind_speed` double DEFAULT NULL,
  `wind_deg` double DEFAULT NULL,
  `wind_gust` double DEFAULT NULL,
  `sea_level` double DEFAULT NULL,
  `grnd_level` double DEFAULT NULL,
  `weather_forecast_update_tracker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forecasts`
--

INSERT INTO `forecasts` (`id`, `uuid`, `timestamp`, `lat`, `lon`, `city`, `forecast_date`, `temp`, `pressure`, `humidity`, `dew_point`, `uvi`, `clouds`, `visibility`, `wind_speed`, `wind_deg`, `wind_gust`, `sea_level`, `grnd_level`, `weather_forecast_update_tracker_id`, `created_at`, `updated_at`) VALUES
(1, '2ba4cff9-358b-4b90-b523-93b8cdff87e8', 1677024000, 40.7143, -75.4999, 'New_York', '22-02-2023', 277.83, 1003, 81, 274.85, 0, 0, 10000, 0.45, 360, 1.34, NULL, NULL, NULL, '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(2, 'b9a414d4-ce92-4f17-b1e6-3081e934ff10', 1677024000, 51.5085, -0.1257, 'London', '22-02-2023', 279.73, 1011, 90, 278.21, 0, 90, 9000, 1.03, 0, NULL, NULL, NULL, NULL, '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(3, '9fb0bd7c-bc82-4466-a42c-0cee87c838cf', 1677024000, 48.8534, 2.3488, 'Paris', '22-02-2023', 283.03, 1014, 81, 279.93, 0, 0, 10000, 1.54, 210, NULL, NULL, NULL, NULL, '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(4, 'd9b58d06-0c64-4ab9-bcd9-56a7d92221ae', 1677024000, 52.5244, 13.4105, 'Berlin', '22-02-2023', 281.33, 1004, 79, 277.91, 0, 75, 10000, 1.79, 249, 3.58, NULL, NULL, NULL, '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(5, '190b9189-87ea-4dfc-8ee9-a7266a22cafa', 1677024000, 35.6895, 139.6917, 'Tokyo', '22-02-2023', 277.35, 1031, 41, 266.15, 1.79, 0, 10000, 5.66, 360, NULL, NULL, NULL, NULL, '2023-02-22 17:39:03', '2023-02-22 17:39:03');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_22_051310_create_weather_table', 1),
(8, '2023_02_22_075924_create_weather_forecast_update_trackers_table', 1),
(9, '2023_02_22_060411_create_cities_table', 2),
(12, '2023_02_22_051027_create_forecasts_table', 3);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forecast_id` bigint(20) UNSIGNED NOT NULL,
  `main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `uuid`, `forecast_id`, `main`, `description`, `display_icon`, `created_at`, `updated_at`) VALUES
(1, '583c722e-6344-4202-85ba-833430ce5003', 1, 'Clear', 'clear sky', '01n', '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(2, '3b53ad8e-b257-4129-997c-a17a5ba637ed', 2, 'Rain', 'light rain', '10n', '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(3, '24103875-8437-4da0-be91-a4bfa7c6e6f4', 3, 'Mist', 'mist', '50n', '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(4, '6b84ad06-7c21-4281-bc0a-d305dba715a8', 4, 'Clouds', 'broken clouds', '04n', '2023-02-22 17:39:03', '2023-02-22 17:39:03'),
(5, '7b4af419-6fff-4209-9294-02122eddbdca', 5, 'Clear', 'clear sky', '01d', '2023-02-22 17:39:03', '2023-02-22 17:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `weather_forecast_update_trackers`
--

CREATE TABLE `weather_forecast_update_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_duration` double DEFAULT NULL,
  `started_at` datetime NOT NULL,
  `ended_at` datetime DEFAULT NULL,
  `status` enum('NEW','PROCESSING','COMPLETED','CANCELLED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forecasts`
--
ALTER TABLE `forecasts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_weather_forecast_update_tracker_fk` (`weather_forecast_update_tracker_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_weather_forecast_fk` (`forecast_id`);

--
-- Indexes for table `weather_forecast_update_trackers`
--
ALTER TABLE `weather_forecast_update_trackers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forecasts`
--
ALTER TABLE `forecasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weather_forecast_update_trackers`
--
ALTER TABLE `weather_forecast_update_trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
