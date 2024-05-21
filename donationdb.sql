-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 06:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `short`, `created_at`, `updated_at`) VALUES
(1, 'A+ (A Positive)', 'A+', '2023-05-27 12:47:44', '2023-05-27 12:47:44'),
(2, 'A- (A Negative)', 'A-', NULL, NULL),
(3, 'B+ (B Positive)', 'B+', NULL, NULL),
(4, 'B- (B Negative)', 'B-', NULL, NULL),
(5, 'AB+ (AB Positive)', 'AB+', NULL, NULL),
(6, 'AB- (AB Negative)', 'AB-', NULL, NULL),
(7, 'O+ (O Positive)', 'O+', NULL, NULL),
(8, 'O- (O Negative)', 'O-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', NULL, NULL),
(2, 'Feni', NULL, NULL),
(3, 'Brahmanbaria', NULL, NULL),
(4, 'Rangamati', NULL, NULL),
(5, 'Noakhali', NULL, NULL),
(6, 'Chandpur', NULL, NULL),
(7, 'Lakshmipur', NULL, NULL),
(8, 'Chattogram', NULL, NULL),
(9, 'Coxsbazar', NULL, NULL),
(10, 'Khagrachhari', NULL, NULL),
(11, 'Bandarban', NULL, NULL),
(12, 'Sirajganj', NULL, NULL),
(13, 'Pabna', NULL, NULL),
(14, 'Bogura', NULL, NULL),
(15, 'Rajshahi', NULL, NULL),
(16, 'Natore', NULL, NULL),
(17, 'Joypurhat', NULL, NULL),
(18, 'Chapainawabganj', NULL, NULL),
(19, 'Naogaon', NULL, NULL),
(20, 'Jashore', NULL, NULL),
(21, 'Satkhira', NULL, NULL),
(22, 'Meherpur', NULL, NULL),
(23, 'Narail', NULL, NULL),
(24, 'Chuadanga', NULL, NULL),
(25, 'Kushtia', NULL, NULL),
(26, 'Magura', NULL, NULL),
(27, 'Khulna', NULL, NULL),
(28, 'Bagerhat', NULL, NULL),
(29, 'Jhenaidah', NULL, NULL),
(30, 'Jhalakathi', NULL, NULL),
(31, 'Patuakhali', NULL, NULL),
(32, 'Pirojpur', NULL, NULL),
(33, 'Barisal', NULL, NULL),
(34, 'Bhola', NULL, NULL),
(35, 'Barguna', NULL, NULL),
(36, 'Sylhet', NULL, NULL),
(37, 'Moulvibazar', NULL, NULL),
(38, 'Habiganj', NULL, NULL),
(39, 'Sunamganj', NULL, NULL),
(40, 'Narsingdi', NULL, NULL),
(41, 'Gazipur', NULL, NULL),
(42, 'Shariatpur', NULL, NULL),
(43, 'Narayanganj', NULL, NULL),
(44, 'Tangail', NULL, NULL),
(45, 'Kishoreganj', NULL, NULL),
(46, 'Manikganj', NULL, NULL),
(47, 'Dhaka', NULL, NULL),
(48, 'Munshiganj', NULL, NULL),
(49, 'Rajbari', NULL, NULL),
(50, 'Madaripur', NULL, NULL),
(51, 'Gopalganj', NULL, NULL),
(52, 'Faridpur', NULL, NULL),
(53, 'Panchagarh', NULL, NULL),
(54, 'Dinajpur', NULL, NULL),
(55, 'Lalmonirhat', NULL, NULL),
(56, 'Nilphamari', NULL, NULL),
(57, 'Gaibandha', NULL, NULL),
(58, 'Thakurgaon', NULL, NULL),
(59, 'Rangpur', NULL, NULL),
(60, 'Kurigram', NULL, NULL),
(61, 'Sherpur', NULL, NULL),
(62, 'Mymensingh', NULL, NULL),
(63, 'Jamalpur', NULL, NULL),
(64, 'Netrokona', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donate_records`
--

CREATE TABLE `donate_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `donate_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donate_records`
--

INSERT INTO `donate_records` (`id`, `user_id`, `donate_date`, `location`, `created_at`, `updated_at`) VALUES
(1, 10, '2023-05-28', 'sdfsd', '2023-05-28 05:49:39', '2023-05-28 05:49:39'),
(2, 10, '2023-05-15', 'sdfs', '2023-05-28 05:50:35', '2023-05-28 05:50:35'),
(3, 10, '2023-05-14', 'sdfsdf', '2023-05-28 05:51:54', '2023-05-28 05:51:54'),
(4, 10, '2023-05-31', 'sdfsdf', '2023-05-28 05:58:31', '2023-05-28 05:58:31'),
(5, 11, '2023-06-10', 'CMCH', '2023-06-24 09:23:34', '2023-06-24 09:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `donor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `last_donate_date` date DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `user_id`, `donor_id`, `name`, `mobile`, `email`, `area`, `blood_group_id`, `district_id`, `last_donate_date`, `picture`, `created_at`, `updated_at`) VALUES
(8, 11, 'D1011', 'Ali', 'Akbar', 'akbar@gmail.com', 'chandgaon', 7, 8, '2023-06-10', NULL, '2023-06-24 09:22:38', '2023-06-24 09:23:34');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_27_183503_create_districts_table', 2),
(6, '2023_05_27_184120_create_blood_groups_table', 3),
(7, '2023_05_27_190944_create_donors_table', 4),
(8, '2023_05_28_113922_create_donate_records_table', 5);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_type` tinyint(4) DEFAULT 1 COMMENT '1=admin,2=donor',
  `user_status` tinyint(4) DEFAULT 1 COMMENT '1=active,2=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Ali', 'akbar@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, NULL, '2023-06-24 09:22:38', '2023-06-24 09:22:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_records`
--
ALTER TABLE `donate_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `donate_records`
--
ALTER TABLE `donate_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
