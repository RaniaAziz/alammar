-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for alammar
CREATE DATABASE IF NOT EXISTS `alammar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `alammar`;

-- Dumping structure for table alammar.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.clients: ~7 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `mobile`, `tel`, `ID_no`, `email`, `company_name`, `job`, `details`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(2, 'ناصر محمد القحطاني', '0589693210', NULL, '04681321', 'aa@gmail.c', 'الشركة الحديثة', 'مدير', NULL, NULL, NULL, '2022-09-01 12:54:25', '2022-09-03 12:29:09'),
	(4, 'علي أحمد', '0588894', NULL, '125487963', 'aa@gmail.com', 'dfds', 'df', NULL, 'ZHr42zDrLemgWhrKW9FlJQyGWynIDZRs4MO5fdD8.jpg', NULL, '2022-09-03 12:29:41', '2022-09-04 19:06:56'),
	(6, 'عبد العزيز', '3245845', NULL, '5410', 'ad@gmail.com', NULL, NULL, NULL, NULL, NULL, '2022-09-05 09:30:19', '2022-09-05 09:30:19'),
	(9, 'lkml', '6546874', '65465', '564654', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-05 09:45:01', '2022-09-05 09:45:01'),
	(10, 'Hany', '05999999', NULL, '354612132', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-11 11:09:11', '2022-09-11 11:09:11'),
	(11, 'asXM', '265', '55', '555', 'ss@f.d', 'kjkj', 'kjk', NULL, 'K91zxSxdVMbTrTANwREuoc0fHiBO8LwWiA1f8EdD.jpg', NULL, '2022-10-05 13:50:06', '2022-10-05 14:01:12'),
	(12, 'aqsSQ', '56356', '5666', '6668', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 14:06:00', '2022-10-05 14:06:00');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table alammar.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table alammar.mediators
CREATE TABLE IF NOT EXISTS `mediators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mediators_client_id_foreign` (`client_id`),
  CONSTRAINT `mediators_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.mediators: ~3 rows (approximately)
/*!40000 ALTER TABLE `mediators` DISABLE KEYS */;
INSERT INTO `mediators` (`id`, `client_id`, `city`, `neighborhood`, `specialty`, `job`, `employer`, `details`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 2, 'جدة', 'العيزرية', 'مم', 'موم', 'مونمةىنىنت', 'كككككككككككككككككككككككككككككككككككككككككككككككككككككككككككككك', 'GkTNbNgMaKSBHiCSkj4GB1D8t9XZRo1ob9BK6Tzp.jpg', NULL, '2022-09-04 18:56:41', '2022-09-04 19:05:45'),
	(2, 4, 'جدة', 'جدة', 'عقارات', 'سمسار', 'لا', NULL, 'GcXvPi063PNeltzLcrsEJdihkKrMXzsQmB3RfMHX.jpg', NULL, '2022-09-22 05:25:35', '2022-09-22 05:25:35'),
	(3, 11, 'gggggggggggggggg', 'ee', 'dfv', 'ko', 'kj', 'kl;k[p', NULL, NULL, '2022-10-05 14:06:23', '2022-10-05 14:19:13');
/*!40000 ALTER TABLE `mediators` ENABLE KEYS */;

-- Dumping structure for table alammar.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(6, '2016_06_01_000004_create_oauth_clients_table', 1),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(10, '2022_09_01_082658_create_clients_table', 2),
	(12, '2022_09_03_133500_create_posters_table', 3),
	(14, '2022_09_04_055108_create_orders_table', 4),
	(15, '2022_09_04_082445_create_mediators_table', 5),
	(16, '2022_09_05_161859_add_mobile_column_to_users_table', 6),
	(18, '2022_09_11_112309_create_offers_table', 7),
	(19, '2022_09_14_140744_create_system_notes_table', 8),
	(20, '2022_10_16_081720_add_column_to_offers_table', 9),
	(21, '2022_10_16_081838_add_column_to_orders_table', 9),
	(23, '2022_10_16_095421_add_columns_to_system_notes_table', 10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table alammar.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.oauth_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table alammar.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table alammar.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.oauth_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table alammar.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table alammar.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table alammar.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `offer_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `poster_id` bigint(20) unsigned DEFAULT NULL,
  `order_type` enum('rent','real_estate') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `real_estate_type` enum('flat','fella','land','rest') COLLATE utf8mb4_unicode_ci DEFAULT 'flat',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `soum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_planned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_piece` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `instrument_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mediator` enum('direct','not_direct') COLLATE utf8mb4_unicode_ci DEFAULT 'direct',
  `status` enum('new','received','finished') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_client_id_foreign` (`client_id`),
  KEY `offers_poster_id_foreign` (`poster_id`),
  KEY `offers_user_id_foreign` (`user_id`),
  CONSTRAINT `offers_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `offers_poster_id_foreign` FOREIGN KEY (`poster_id`) REFERENCES `posters` (`id`),
  CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.offers: ~3 rows (approximately)
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` (`id`, `offer_no`, `client_id`, `poster_id`, `order_type`, `real_estate_type`, `city`, `neighborhood`, `space`, `price`, `soum`, `limit`, `no_planned`, `no_piece`, `details`, `instrument_image`, `mediator`, `status`, `lng`, `lat`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '4348', 4, 1, 'rent', 'flat', ';l', ';;', 1500, 5000, NULL, '26', '123', '25', NULL, 'W52GtfFXF9oRxcSATW8xZmuDfhqqxaY7WpjjxTqD.jpg', 'direct', 'received', '39.210548400879', '21.478309829196', NULL, NULL, '2022-09-14 09:18:54', '2022-10-03 18:45:02'),
	(2, '8364', 6, 1, 'rent', 'flat', 'k', 'kj', 20, 200, NULL, '1', '3', '12', NULL, '5TQEfwu0572bLpO1P2xz0yKgHWWpOJLl3kQ1pwuC.jpg', 'not_direct', 'new', '46.716667', '24.633333', NULL, NULL, '2022-09-14 10:19:31', '2022-10-05 12:28:53'),
	(3, '1513', 4, 1, 'real_estate', 'fella', 'mkh', 'kk', 100, 200, NULL, '356', '12', '0263', NULL, NULL, 'direct', 'finished', NULL, NULL, 4, NULL, '2022-09-21 20:22:54', '2022-10-16 08:34:49');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;

-- Dumping structure for table alammar.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `order_type` enum('rent','real_estate') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `real_estate_type` enum('flat','fella','land','rest') COLLATE utf8mb4_unicode_ci DEFAULT 'flat',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space_from` double DEFAULT NULL,
  `space_to` double DEFAULT NULL,
  `price_from` double DEFAULT NULL,
  `price_to` double DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` enum('new','received','finished') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_client_id_foreign` (`client_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.orders: ~4 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `order_no`, `client_id`, `order_type`, `real_estate_type`, `city`, `neighborhood`, `space_from`, `space_to`, `price_from`, `price_to`, `details`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '5079', 2, 'rent', 'flat', 'الرياض', 'النزهة -kk', 100, 9000, 10000, 20000, 'نتىنىنتىة', 'new', NULL, NULL, '2022-09-04 07:10:51', '2022-09-04 07:14:08'),
	(2, '641', 2, 'rent', 'flat', NULL, NULL, 1.2, 1000.5, NULL, NULL, NULL, 'new', NULL, NULL, '2022-09-14 14:06:14', '2022-10-16 07:40:26'),
	(3, '8042', 6, 'rent', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'received', NULL, NULL, '2022-09-14 14:06:26', '2022-10-16 07:38:38'),
	(4, '4483', 10, 'real_estate', 'fella', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'finished', 3, NULL, '2022-09-14 14:06:43', '2022-10-18 17:28:36'),
	(5, '7315', 6, 'rent', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new', 4, NULL, '2022-10-16 08:42:59', '2022-10-16 08:42:59');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table alammar.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table alammar.posters
CREATE TABLE IF NOT EXISTS `posters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `poster_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` enum('S','M','L','XL') COLLATE utf8mb4_unicode_ci DEFAULT 'S',
  `type` enum('for_rent','for_sale','for_waive','wanted') COLLATE utf8mb4_unicode_ci DEFAULT 'for_rent',
  `status` enum('new','old','missing','archived') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.posters: ~0 rows (approximately)
/*!40000 ALTER TABLE `posters` DISABLE KEYS */;
INSERT INTO `posters` (`id`, `poster_no`, `size`, `type`, `status`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'B526', 'L', 'wanted', 'missing', 'Tko2mVkbjDalLj4GdoIyLP48UcfmeIjzEWvDe7j1.jpg', NULL, '2022-09-03 15:45:40', '2022-09-22 05:24:21'),
	(2, '568', 'M', 'for_sale', 'new', '0DjDYYgZOvxWyzWZw0QdSEQOxrzenWZhwmPlHxRq.jpg', NULL, '2022-09-22 05:23:37', '2022-09-22 05:23:37'),
	(3, 'sd555', 'XL', 'for_waive', 'archived', NULL, NULL, '2022-10-05 14:18:15', '2022-10-05 14:18:15');
/*!40000 ALTER TABLE `posters` ENABLE KEYS */;

-- Dumping structure for table alammar.system_notes
CREATE TABLE IF NOT EXISTS `system_notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `offer_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('order','offer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_notes_order_id_foreign` (`order_id`),
  KEY `system_notes_user_id_foreign` (`user_id`),
  KEY `system_notes_offer_id_foreign` (`offer_id`),
  CONSTRAINT `system_notes_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  CONSTRAINT `system_notes_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `system_notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.system_notes: ~9 rows (approximately)
/*!40000 ALTER TABLE `system_notes` DISABLE KEYS */;
INSERT INTO `system_notes` (`id`, `order_id`, `offer_id`, `user_id`, `notes`, `deleted_at`, `created_at`, `updated_at`, `type`) VALUES
	(1, 4, NULL, 3, 'مممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممممم', NULL, '2022-09-15 07:30:57', '2022-09-15 07:36:05', NULL),
	(2, NULL, NULL, 3, NULL, NULL, '2022-09-15 18:04:48', '2022-09-15 18:04:48', NULL),
	(3, 2, NULL, 3, 'fdskcmxlkfewmq', NULL, '2022-10-03 15:35:58', '2022-10-03 15:35:58', NULL),
	(4, 4, NULL, 3, '\\العميل غير راضي', NULL, '2022-10-03 15:41:25', '2022-10-03 15:41:25', NULL),
	(5, 4, NULL, 3, 'الطلب غير صحيح', NULL, '2022-10-03 17:33:17', '2022-10-03 17:33:17', NULL),
	(6, 4, NULL, 3, 'helloooooooooooooo', NULL, '2022-10-03 17:41:30', '2022-10-03 17:41:30', NULL),
	(7, 4, NULL, 3, 'الطلب غير مكتمل', NULL, '2022-10-03 17:42:44', '2022-10-03 17:42:44', NULL),
	(8, 5, NULL, 3, 'new notes order5', NULL, '2022-10-16 11:18:21', '2022-10-16 11:18:21', 'order'),
	(9, NULL, 3, 3, 'new offer notes 3', NULL, '2022-10-16 11:20:09', '2022-10-16 11:20:09', 'offer');
/*!40000 ALTER TABLE `system_notes` ENABLE KEYS */;

-- Dumping structure for table alammar.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alammar.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile`) VALUES
	(3, 'admin', 'admin@dnet.sa', NULL, '$2y$10$4CvvBVes4zHseYhh.oIcruFuaoR43qnBDCWihAl3qAdFFqQfedWt.', NULL, NULL, '2022-10-05 14:18:47', '0596333222'),
	(4, 'منار', 'manar@dnet.sa', NULL, '$2y$10$McZeJDqyXYtX8x4uh5HOF.E1GPE3SZm61/1zqydhrmUPDGzTv.F0O', NULL, '2022-09-05 19:13:00', '2022-10-16 07:35:17', '059568327'),
	(5, 'Rania', 'rania@dnet.sa', NULL, '$2y$10$lxc.dUkQ5YSggs5m//nNPuAXiuujDpnyUagT4oXcEzqPx03HsMPVa', NULL, '2022-10-16 20:03:32', '2022-10-16 20:03:32', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
