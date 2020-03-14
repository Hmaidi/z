-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for larajobstest
CREATE DATABASE IF NOT EXISTS `larajobstest` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `larajobstest`;

-- Dumping structure for table larajobstest.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'web', '2020-03-05 15:50:16', '2020-03-05 15:50:16', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table larajobstest.category_job
CREATE TABLE IF NOT EXISTS `category_job` (
  `job_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `job_id_fk_476513` (`job_id`),
  KEY `category_id_fk_476513` (`category_id`),
  CONSTRAINT `category_id_fk_476513` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_id_fk_476513` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.category_job: ~0 rows (approximately)
/*!40000 ALTER TABLE `category_job` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_job` ENABLE KEYS */;

-- Dumping structure for table larajobstest.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.companies: ~0 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Machinestalk', '2020-03-05 15:49:14', '2020-03-05 15:49:14', NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table larajobstest.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.countries: ~0 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table larajobstest.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` longtext COLLATE utf8mb4_unicode_ci,
  `requirements` longtext COLLATE utf8mb4_unicode_ci,
  `job_nature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_rated` tinyint(1) DEFAULT '0',
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_fk_476211` (`location_id`),
  KEY `company_fk_476511` (`company_id`),
  CONSTRAINT `company_fk_476511` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `location_fk_476211` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `title`, `short_description`, `full_description`, `requirements`, `job_nature`, `address`, `top_rated`, `salary`, `created_at`, `updated_at`, `deleted_at`, `location_id`, `company_id`) VALUES
	(1, 'job web', 'Develop big data solutions for Hadoop platform, leveraging Cloudera or Map R ecosystem tools Application', 'Develop big data solutions for Hadoop platform, leveraging Cloudera or Map R ecosystem tools Application', 'Develop big data solutions for Hadoop platform, leveraging Cloudera or Map R ecosystem tools Application', 'Full-time', 'Riyadh', 0, '1500', '2020-03-05 15:50:01', '2020-03-05 15:50:01', NULL, 1, 1);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table larajobstest.jobsapply
CREATE TABLE IF NOT EXISTS `jobsapply` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PreferredPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CountryResidence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CurrentVisaStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CurrentJobTitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CurrentCompany` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SalaryInformation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CurrentTotalMonthlyPackage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpectedMonthlySalary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_Job` int(11) NOT NULL,
  `Name_Job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobsapply_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.jobsapply: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobsapply` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobsapply` ENABLE KEYS */;

-- Dumping structure for table larajobstest.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.locations: ~0 rows (approximately)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Jeddah', '2020-03-05 15:49:28', '2020-03-05 15:49:28', NULL);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Dumping structure for table larajobstest.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.media: ~0 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table larajobstest.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.migrations: ~21 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(5, '2016_06_01_000004_create_oauth_clients_table', 1),
	(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(7, '2019_10_16_000001_create_media_table', 1),
	(8, '2019_10_16_000002_create_permissions_table', 1),
	(9, '2019_10_16_000003_create_roles_table', 1),
	(10, '2019_10_16_000004_create_users_table', 1),
	(11, '2019_10_16_000005_create_categories_table', 1),
	(12, '2019_10_16_000006_create_locations_table', 1),
	(13, '2019_10_16_000007_create_companies_table', 1),
	(14, '2019_10_16_000008_create_jobs_table', 1),
	(15, '2019_10_16_000009_create_permission_role_pivot_table', 1),
	(16, '2019_10_16_000010_create_role_user_pivot_table', 1),
	(17, '2019_10_16_000011_create_category_job_pivot_table', 1),
	(18, '2019_10_16_000012_add_relationship_fields_to_jobs_table', 1),
	(19, '2020_02_14_090123_create_jobsapply_table', 1),
	(20, '2020_02_27_134135_countries', 1),
	(21, '2020_02_27_134147_states', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table larajobstest.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.oauth_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table larajobstest.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table larajobstest.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.oauth_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table larajobstest.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table larajobstest.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table larajobstest.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table larajobstest.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.permissions: ~36 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'user_management_access', NULL, NULL, NULL),
	(2, 'permission_create', NULL, NULL, NULL),
	(3, 'permission_edit', NULL, NULL, NULL),
	(4, 'permission_show', NULL, NULL, NULL),
	(5, 'permission_delete', NULL, NULL, NULL),
	(6, 'permission_access', NULL, NULL, NULL),
	(7, 'role_create', NULL, NULL, NULL),
	(8, 'role_edit', NULL, NULL, NULL),
	(9, 'role_show', NULL, NULL, NULL),
	(10, 'role_delete', NULL, NULL, NULL),
	(11, 'role_access', NULL, NULL, NULL),
	(12, 'user_create', NULL, NULL, NULL),
	(13, 'user_edit', NULL, NULL, NULL),
	(14, 'user_show', NULL, NULL, NULL),
	(15, 'user_delete', NULL, NULL, NULL),
	(16, 'user_access', NULL, NULL, NULL),
	(17, 'category_create', NULL, NULL, NULL),
	(18, 'category_edit', NULL, NULL, NULL),
	(19, 'category_show', NULL, NULL, NULL),
	(20, 'category_delete', NULL, NULL, NULL),
	(21, 'category_access', NULL, NULL, NULL),
	(22, 'location_create', NULL, NULL, NULL),
	(23, 'location_edit', NULL, NULL, NULL),
	(24, 'location_show', NULL, NULL, NULL),
	(25, 'location_delete', NULL, NULL, NULL),
	(26, 'location_access', NULL, NULL, NULL),
	(27, 'company_create', NULL, NULL, NULL),
	(28, 'company_edit', NULL, NULL, NULL),
	(29, 'company_show', NULL, NULL, NULL),
	(30, 'company_delete', NULL, NULL, NULL),
	(31, 'company_access', NULL, NULL, NULL),
	(32, 'job_create', NULL, NULL, NULL),
	(33, 'job_edit', NULL, NULL, NULL),
	(34, 'job_show', NULL, NULL, NULL),
	(35, 'job_delete', NULL, NULL, NULL),
	(36, 'job_access', NULL, NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table larajobstest.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `role_id_fk_476162` (`role_id`),
  KEY `permission_id_fk_476162` (`permission_id`),
  CONSTRAINT `permission_id_fk_476162` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_476162` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.permission_role: ~58 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 14),
	(1, 15),
	(1, 16),
	(1, 17),
	(1, 18),
	(1, 19),
	(1, 20),
	(1, 21),
	(1, 22),
	(1, 23),
	(1, 24),
	(1, 25),
	(1, 26),
	(1, 27),
	(1, 28),
	(1, 29),
	(1, 30),
	(1, 31),
	(1, 32),
	(1, 33),
	(1, 34),
	(1, 35),
	(1, 36),
	(2, 17),
	(2, 18),
	(2, 19),
	(2, 20),
	(2, 21),
	(2, 22),
	(2, 23),
	(2, 24),
	(2, 25),
	(2, 26),
	(2, 27),
	(2, 28),
	(2, 29),
	(2, 30),
	(2, 31),
	(2, 32),
	(2, 33),
	(2, 34),
	(2, 35),
	(2, 36),
	(3, 34),
	(3, 36);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table larajobstest.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', NULL, NULL, NULL),
	(2, 'User', NULL, NULL, NULL),
	(3, 'candidate', '2020-03-03 08:21:51', '2020-03-03 08:21:51', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table larajobstest.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_476171` (`user_id`),
  KEY `role_id_fk_476171` (`role_id`),
  CONSTRAINT `role_id_fk_476171` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_476171` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.role_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
	(1, 1),
	(2, 2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table larajobstest.states
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.states: ~0 rows (approximately)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;

-- Dumping structure for table larajobstest.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PreferredPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SalaryInformation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CountryResidence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CurrentVisaStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CurrentJobTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CurrentCompany` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CurrentTotalMonthlyPackage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ExpectedMonthlySalary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` longtext COLLATE utf8mb4_unicode_ci,
  `skills` mediumtext COLLATE utf8mb4_unicode_ci,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inputBio` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table larajobstest.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `FirstName`, `email`, `email_verified_at`, `password`, `admin`, `role`, `remember_token`, `created_at`, `deleted_at`, `updated_at`, `LastName`, `Nationality`, `Gender`, `PreferredPhone`, `SalaryInformation`, `CountryResidence`, `CurrentVisaStatus`, `CurrentJobTitle`, `CurrentCompany`, `Currency`, `CurrentTotalMonthlyPackage`, `ExpectedMonthlySalary`, `City`, `terms`, `address`, `cover_letter`, `skills`, `resume`, `photo`, `inputBio`) VALUES
	(1, 'AdminAdmin', 'soufien.hmaidi@Machinestalk.com', NULL, '$2y$10$o.3HlxYJXlcYXcKHghtTaOunrWEAw1D1XYfdoVPqt9m/epPoowunq', 1, 'Admin', NULL, NULL, NULL, '2020-02-13 08:19:42', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
	(2, 'UserTest', 'sofienhmaidiweb@gmail.com', NULL, '$2y$10$H2Rcvx8l9k6JV1VPrnV5XO3DQ7HtGp7zOZugBic6CdXcCUx/FCTWe', 0, 'User', NULL, '2020-02-18 15:29:50', NULL, '2020-02-18 15:29:50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
	(3, 'demoCustomer', 'demoCustomer@hh.fr', NULL, '$2y$10$Hc4EL8v42FLayKS1anhrjurumM.rB5BYgUdwM/vpA8e.ojpkeu5sK', 0, 'candidate', NULL, '2020-03-02 08:06:35', NULL, '2020-03-02 08:06:35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
	(4, 'sofien Hmaidi', 'soufien.hmaidi@ffa.com', NULL, '$2y$10$3kIDSUoIKcKYvAt9wcnGpu8JWQhZBiK0tCcQ6uWt4F4xmCCzB6Ebe', 0, 'candidate', NULL, '2020-03-03 08:08:43', NULL, '2020-03-03 08:08:43', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
	(5, 'ShanAhme', 'soufien.hmaidi@fff.ca', NULL, '$2y$10$XdICKSIFCX5ZriGdkl8.PeZQLjj6bumu0we6Qb4.wH5cbQwzSv7JC', 0, 'candidate', NULL, '2020-03-03 11:13:03', NULL, '2020-03-03 11:13:03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
	(6, 'FirstNamecxvc', 'soufien.hmaidiFirstName@ffa.com', NULL, '$2y$10$Cx1bUMOu8u936mdWv/tCpedSlmdio38bdMi8sN1IWXWdyUqRffaG.', 0, 'candidate', NULL, '2020-03-05 13:33:03', NULL, '2020-03-05 13:33:03', 'xcvx', 'Saudi Arabia', 'Choose...', '967259874', 'FirstName', 'Ariana', 'No Selection', 'FirstName', 'FirstName', 'No Selection', 'FirstName', 'FirstName', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Shan', 'soufien.hmaidisoufien@Machinestalk.com', NULL, '$2y$10$pChGbTkRh1l/1NWPk/NDgurUa5rek9Sx1EuW2xzs0souYZ64SP4eu', 0, 'candidate', NULL, '2020-03-05 13:38:53', NULL, '2020-03-06 15:43:21', 'Ahmed', NULL, 'Men', '0502394020', NULL, NULL, 'Residence', NULL, 'Machinestalk', 'SAR', NULL, NULL, 'Riyadh', '', NULL, '1111111', 'Your cover leCCQQQCtterSSS', NULL, 'Vision2030-1_1582038822_1583502346.png', 'Your cover letterBQQiographyBiographyBiography');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
