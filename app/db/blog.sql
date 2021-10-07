-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2021 at 07:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `name`, `slug`, `banner_url`, `blog_body`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zoom Class E-78', 'md-lemon-patwari', 'http://localhost:8000/storage/blog/6yWjsVL9i5fO2UYqpohnVxsibDcsDbsTnUysRezS.png', '<p>online class</p>', 0, 'active', 1, '2021-10-06 22:09:35', '2021-10-06 23:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2021-10-06 22:09:35', '2021-10-06 22:09:35'),
(2, 1, 9, '2021-10-06 22:09:35', '2021-10-06 22:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-06 22:09:35', '2021-10-06 22:09:35'),
(2, 1, 3, '2021-10-06 22:09:35', '2021-10-06 22:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lindsey Armstrong', 'ad-occaecati-voluptatem-quos-delectus-nihil-est', 'inactive', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(2, 'Darian Grady', 'ducimus-dolorum-sed-quam-aut-doloremque-qui', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(3, 'Gilbert Feeney DDS', 'error-est-temporibus-voluptatem', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(4, 'Dr. Vance Koss II', 'ratione-sit-quos-eum-enim-odit-qui-ut-tenetur', 'inactive', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(5, 'Freeman Blick', 'autem-esse-non-fugit', 'inactive', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(6, 'Prof. Mittie Dicki V', 'asperiores-omnis-quasi-quis-rerum-aut-sit', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(7, 'Esmeralda Borer', 'quae-pariatur-maxime-sunt-doloribus-officiis-rerum', 'inactive', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(8, 'Andrew Hagenes', 'beatae-adipisci-doloribus-sapiente-quae-fugiat-itaque-veritatis-minima', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(9, 'Noah Crona', 'quis-ipsum-aliquid-autem-quia', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(10, 'Royce Mills', 'officiis-rerum-accusamus-praesentium-voluptatibus-numquam-magnam', 'inactive', '2021-10-06 22:08:46', '2021-10-06 22:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `comments_id`, `user_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(5, 'test', NULL, 1, 1, '2021-10-06 23:10:00', '2021-10-06 23:10:00'),
(6, 'test2', NULL, 1, 1, '2021-10-06 23:10:06', '2021-10-06 23:10:06'),
(7, 'test reply', 5, 1, 1, '2021-10-06 23:10:16', '2021-10-06 23:10:16'),
(8, 'dfd', 7, 1, 1, '2021-10-06 23:20:38', '2021-10-06 23:20:38'),
(9, 'test reply 2', 5, 1, 1, '2021-10-06 23:21:10', '2021-10-06 23:21:10'),
(10, 'test2 reply', 6, 1, 1, '2021-10-06 23:23:05', '2021-10-06 23:23:05'),
(11, 'test3', NULL, 1, 1, '2021-10-06 23:23:12', '2021-10-06 23:23:12'),
(12, 'test3 reply', 11, 1, 1, '2021-10-06 23:23:21', '2021-10-06 23:23:21');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_06_085329_create_sessions_table', 1),
(7, '2021_10_06_090749_create_categories_table', 1),
(8, '2021_10_06_090757_create_tags_table', 1),
(9, '2021_10_06_092525_create_blogs_table', 1),
(10, '2021_10_06_093325_create_blog_category_table', 1),
(11, '2021_10_06_093424_create_blog_tag_table', 1),
(12, '2021_10_07_031534_create_comments_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'AccessToken', '55bf8c286d79c712370836c97b7082196e4e36216fad544b99520a3c708e3577', '[\"*\"]', '2021-10-06 22:33:38', '2021-10-06 22:18:01', '2021-10-06 22:33:38'),
(2, 'App\\Models\\User', 1, 'AccessToken', 'df262e9dbcc28e0ba7192489907e416031bead5289fdc2bbc0d79788e8baf9d1', '[\"*\"]', '2021-10-06 23:23:21', '2021-10-06 23:06:17', '2021-10-06 23:23:21'),
(3, 'App\\Models\\User', 1, 'AccessToken', 'f0a70ee109edb87cad32cfab728f6bc60f43850f4b8bbf6d63e88e15d7cc64a2', '[\"*\"]', NULL, '2021-10-06 23:27:21', '2021-10-06 23:27:21'),
(4, 'App\\Models\\User', 1, 'AccessToken', '30e0ba46efcd2aa85f8fa0e9f7be7907d46fdad9c9ad42285326fc08a0dbb865', '[\"*\"]', NULL, '2021-10-06 23:28:18', '2021-10-06 23:28:18'),
(5, 'App\\Models\\User', 1, 'AccessToken', '2165cf4fe6f1099410f978a56623b03bfb0725e43256653bdadc48146ee77971', '[\"*\"]', NULL, '2021-10-06 23:28:21', '2021-10-06 23:28:21'),
(6, 'App\\Models\\User', 1, 'AccessToken', '94b2382e95ed877e8ed7837bdde1d51cabe1f5ca49c44e76b354797dc530beb6', '[\"*\"]', NULL, '2021-10-06 23:28:22', '2021-10-06 23:28:22'),
(7, 'App\\Models\\User', 1, 'AccessToken', 'ef70804d377ed06168b60f6062a9e7ba34e91f74ca897c3837df9cfb2b8d31dd', '[\"*\"]', NULL, '2021-10-06 23:28:22', '2021-10-06 23:28:22'),
(8, 'App\\Models\\User', 1, 'AccessToken', '6008d804bfaa326455ff333c1767d952c7af5bdd196f9860567c6fdd18790239', '[\"*\"]', NULL, '2021-10-06 23:28:34', '2021-10-06 23:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9XShxYr12fIA3w4PxOaY1bMGtIBbqtq5BrFGw0fk', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickhyamRlZlBlZ2U0Z01BZ3RYMU01eExvWk1ZUlNHdlFVbE9nYzVidyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1633584713);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ms. Janet Gutmann', 'quia-et-labore-quam-quia-aut-harum-neque', 'active', '2021-10-06 22:08:46', '2021-10-06 22:08:46'),
(2, 'Mrs. Ruthie Jacobs', 'non-nihil-quia-doloribus-quaerat-repudiandae-enim', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(3, 'Montana Daugherty', 'suscipit-ratione-magnam-minima-accusantium-aut-non-exercitationem', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(4, 'Monserrate Mosciski', 'fugit-sit-fugit-qui-consequuntur-quidem-eum', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(5, 'Deven Quitzon', 'quo-nisi-impedit-delectus-iste-qui-ea-voluptatem-dolores', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(6, 'Audrey Kuhlman', 'nihil-eligendi-ut-aspernatur-omnis-eligendi-aut', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(7, 'Wilburn Rodriguez', 'repellat-et-molestiae-ex-molestias-magnam-temporibus-quis-officia', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(8, 'Victoria Gaylord', 'excepturi-consequatur-saepe-et-magni-animi-pariatur', 'active', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(9, 'Geovanny Orn', 'fugiat-adipisci-harum-libero-consectetur-voluptate-et-quis', 'inactive', '2021-10-06 22:08:47', '2021-10-06 22:08:47'),
(10, 'Ladarius Ernser', 'dolorem-atque-qui-deserunt-odit', 'inactive', '2021-10-06 22:08:47', '2021-10-06 22:08:47');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Lemon Patwari', 'lemonpatwari@gmail.com', '2021-10-06 22:08:46', '$2y$10$eJSCb8PMIQpwQJ7n/zh1le2xWiMRwwclALiNUDgH.ohz8MSEuZv9C', NULL, NULL, NULL, NULL, NULL, '2021-10-06 22:08:46', '2021-10-06 22:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tag_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_comments_id_foreign` (`comments_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `blog_category_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `blog_tag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_comments_id_foreign` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
