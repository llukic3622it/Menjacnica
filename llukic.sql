-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 27, 2025 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llukic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, NULL, NULL, 'Dinar', 'Valuta drzave Srbije'),
(2, NULL, NULL, 'Euro', 'Valuta Evropske unije'),
(3, NULL, NULL, 'Dolar', 'Valuta SAD-a'),
(4, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Svajcarski Franak', 'Valuta Svajcarske');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2025_05_25_150000_create_categories_table', 1),
(6, '2025_05_25_161615_create_products_table', 1),
(7, '2025_05_26_195500_add_is_admin_to_users_table', 2),
(9, '2025_05_26_195524_add_is_admin_to_users_table', 3),
(10, '2025_05_26_200035_add_is_admin_to_users_table', 3),
(11, '2025_05_27_001829_create_user_profiles_table', 4),
(12, '2025_05_27_012429_create_profiles_table', 5),
(13, '2025_05_27_024708_create_racuni_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `description`, `price`, `category_id`) VALUES
(1, NULL, '2025-05-26 00:08:10', 'Kupovni kurs Dinara\r\n', 'Kurs po kojem banka ili menjačnica kupuje stranu valutu od tebe.', 116.00, 1),
(2, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Prodajni kurs dinara', 'Kurs po kojem banka ili menjačnica prodaje stranu valutu tebi.', 114.00, 1),
(9, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Srednji kurs Dinara', 'Srednji kurs dinara predstavlja prosečnu vrednost zvaničnog kursa srpskog dinara (RSD) u odnosu na neku drugu valutu.', 114.00, 1),
(10, '2025-05-14 20:43:16', '2025-05-26 00:08:10', 'Kupovni kurs Eura', 'Kupovni kurs predstavlja kurs po kojem banka ili menjačnica otkupljuje evre od tebe (dakle, kada TI prodaješ evre, a dobijaš dinare).', 115.00, 2),
(11, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Prodajni kurs Evra', 'Prodajni kurs je kurs po kojem banka ili menjačnica prodaje evre tebi (dakle, kada TI kupuješ evre i daješ dinare).', 116.00, 2),
(12, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Srednji kurs Evra', 'Srednji kurs evra je prosečan kurs između kupovnog i prodajnog kursa, koji svakodnevno objavljuje Narodna banka Srbije (NBS).', 114.00, 2),
(13, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Kupovni kurs Dolara', 'To je kurs po kojem banka ili menjačnica otkupljuje dolare od građana.', 123.00, 3),
(14, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Prodajni kurs Dolara', 'Prodajni kurs dolara predstavlja iznos u dinarima koji klijent mora platiti banci ili menjačnici kako bi kupio jedan američki dolar (USD). ', 113.00, 3),
(15, '2025-05-14 20:43:16', '2025-05-26 00:08:10', 'Srednji kurs Dolara', 'Srednji kurs dolara predstavlja prosečnu vrednost između kupovnog i prodajnog kursa dolara. To znači da nije kurs po kojem direktno možete kupiti ili prodati dolare u banci, već služi kao orijentaciona vrednost.', 117.00, 3),
(16, '2025-05-26 20:40:28', '2025-05-26 00:08:10', 'Kupovni kurs Svajcarskog Franka', 'Kupovni kurs frank (CHF) predstavlja vrednost u domaćoj valuti po kojoj banka ili menjačnica kupuje švajcarski franak od klijenata. To je kurs po kojem vi možete prodati frank banci.\r\n\r\n', 114.00, 4),
(17, '2025-05-21 00:23:35', '2025-05-28 00:23:35', 'Prodajni kurs Svajcarskog Franka', 'Prodajni kurs frank (CHF) predstavlja vrednost u domaćoj valuti po kojoj banka ili menjačnica prodaje švajcarski franak klijentima. To je kurs po kojem vi možete kupiti frank od banke.\r\n\r\n', 116.00, 4),
(18, '2025-05-26 20:40:28', '2025-05-26 11:57:53', 'Srednji kurs Svajcarskog Franka', 'Srednji kurs frank (CHF) je prosečna vrednost između kupovnog i prodajnog kursa. Koristi se kao referentni kurs za finansijske izveštaje i obračune, a ne predstavlja kurs po kojem se direktno trguje.', 111.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racuni`
--

CREATE TABLE `racuni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `broj_racuna` varchar(255) NOT NULL,
  `iznos_uplate` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racuni`
--

INSERT INTO `racuni` (`id`, `user_id`, `broj_racuna`, `iznos_uplate`, `created_at`, `updated_at`) VALUES
(1, 2, '45678', 111.00, '2025-05-26 20:40:28', '2025-05-27 01:19:33'),
(3, 1, '342432', 11.00, '2025-05-27 02:51:37', '2025-05-27 02:51:37'),
(4, 1, '342432', 11.00, '2025-05-27 02:51:48', '2025-05-27 02:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Test user', 'test@example.com', '2025-05-25 15:16:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'II6N6fsRhV', 0, '2025-05-25 15:16:29', '2025-05-25 15:16:29'),
(2, 'admin', 'admin123@pwa.rs', NULL, '$2y$10$a7gKhDcRZ7JAxAiKZgNu5OOvaS7uTl8Dg9TMM0GePIqnv/.M7dJTe', NULL, 1, '2025-05-26 11:57:53', '2025-05-26 11:57:53'),
(3, 'editor', 'editor@pwa.rs', NULL, 'editor\r\n', NULL, 0, '2025-05-26 18:20:38', '2025-05-26 18:20:38'),
(4, 'user', 'user@pwa.rs', NULL, 'user\r\n', NULL, 0, '2025-05-26 18:24:33', '2025-05-26 18:24:33'),
(5, 'kalu', 'kalu@gmail.com', '2025-05-20 02:13:06', 'kalu04', NULL, 0, '2025-05-14 20:43:16', '2025-05-21 02:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `phone_number`, `address`, `date_of_birth`, `bio`, `created_at`, `updated_at`) VALUES
(1, 1, '060918123', 'Kralja Milutina, 69', '2025-05-27', '\"Strastveni softverski inženjer sa preko 5 godina iskustva u razvoju web aplikacija koristeći Laravel i Vue.js. Uživa u rešavanju kompleksnih problema, pisanju čistog i čitljivog koda, kao i mentorisanju mlađih programera. Kada ne programira, voli planinarenje i čitanje naučne fantastike.\"', '2025-05-27 00:23:35', '2025-05-26 00:08:10'),
(2, 2, '0606033', 'Kralja Milana,68', '2025-05-20', 'Kreativni dizajner specijalizovan za UI/UX i brendiranje. Poslednjih 7 godina sarađuje sa klijentima širom sveta na razvoju modernih i responzivnih interfejsa. Inspiraciju crpi iz arhitekture i minimalizma. U slobodno vreme crta stripove i pije previše kafe.\"', '2025-05-21 00:23:35', '2025-05-28 00:23:35'),
(3, 3, '0238318', 'Kralja Mihajla,43', '2025-05-14', '\"Full-stack developer koji je slučajno ušao u svet koda preko modovanja video igara. Entuzijasta za backend logiku, API-je i automatizaciju. Kada ne debaguje kod, streamuje retro igre i uči o veštačkoj inteligenciji.\"', '2025-05-21 00:25:24', '2025-05-29 00:25:24'),
(5, 4, '600000', 'Kralja Zorke', '2025-05-27', 'Bio pisac', '2025-05-13 00:27:37', '2025-05-26 23:56:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racuni`
--
ALTER TABLE `racuni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `racuni_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `racuni`
--
ALTER TABLE `racuni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `racuni`
--
ALTER TABLE `racuni`
  ADD CONSTRAINT `racuni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
