-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2025 at 03:36 PM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archivhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `armoires`
--

CREATE TABLE `armoires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armoires`
--

INSERT INTO `armoires` (`id`, `numero`, `description`, `room_id`, `created_at`, `updated_at`) VALUES
(2, 'A01', 'Département RH', 7, '2025-05-30 11:19:58', '2025-06-02 14:35:10'),
(3, 'A02', 'Département IT', 7, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(4, 'A03', 'Département Finance', 7, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(5, 'A04', 'Documents administratifs', 7, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(6, 'A05', 'Client', 7, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(7, 'A06', 'Fournisseurs', 7, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(8, 'A07', 'Factures SNEL', 7, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(9, 'A08', 'Factures Regideso', 7, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(14, 'A09', 'Département RH', 7, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(17, 'A01', 'Département RH', 15, '2025-06-24 13:07:03', '2025-06-24 13:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `boites`
--

CREATE TABLE `boites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `etagere_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boites`
--

INSERT INTO `boites` (`id`, `numero`, `description`, `etagere_id`, `created_at`, `updated_at`) VALUES
(1, 'B01', 'Boîte des factures', 1, '2025-06-06 17:48:27', '2025-06-06 17:49:35'),
(2, 'B02', 'Boîte des lettres', 2, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(3, 'B03', 'B test', 5, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(4, 'B045', 'C test', 1, '2025-06-06 21:45:25', '2025-06-10 06:56:15'),
(8, 'B01', 'B test', 11, '2025-06-24 13:07:22', '2025-06-24 13:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('archivhub_cache_10635475ef1e9893d5ddc1aad26658ff', 'i:1;', 1748507807),
('archivhub_cache_10635475ef1e9893d5ddc1aad26658ff:timer', 'i:1748507807;', 1748507807),
('archivhub_cache_15d8671e881778a1c15d7a56c24870f3', 'i:1;', 1749765896),
('archivhub_cache_15d8671e881778a1c15d7a56c24870f3:timer', 'i:1749765896;', 1749765896),
('archivhub_cache_4a762542731b618d3c8c256bb266a1d7', 'i:1;', 1748108045),
('archivhub_cache_4a762542731b618d3c8c256bb266a1d7:timer', 'i:1748108045;', 1748108045),
('archivhub_cache_4e52a22fca6778a07126ea9f8374a97e', 'i:1;', 1748353354),
('archivhub_cache_4e52a22fca6778a07126ea9f8374a97e:timer', 'i:1748353354;', 1748353354),
('archivhub_cache_6d6d232c6d7a387d13313970b46beb98', 'i:1;', 1750771827),
('archivhub_cache_6d6d232c6d7a387d13313970b46beb98:timer', 'i:1750771827;', 1750771827),
('archivhub_cache_b8dab2bac0e77bce62c76faff3176c51', 'i:1;', 1748107798),
('archivhub_cache_b8dab2bac0e77bce62c76faff3176c51:timer', 'i:1748107798;', 1748107798),
('archivhub_cache_c6be2cf7c13d9a527ee2fe401bbae3c7', 'i:2;', 1748353890),
('archivhub_cache_c6be2cf7c13d9a527ee2fe401bbae3c7:timer', 'i:1748353890;', 1748353890),
('archivhub_cache_f81377d382bf1f5b67b6723ee7014661', 'i:1;', 1750844045),
('archivhub_cache_f81377d382bf1f5b67b6723ee7014661:timer', 'i:1750844045;', 1750844045),
('archivhub_cache_horlyandelo@exadgroup.org|127.0.0.1', 'i:1;', 1748507807),
('archivhub_cache_horlyandelo@exadgroup.org|127.0.0.1:timer', 'i:1748507807;', 1748507807);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemises`
--

CREATE TABLE `chemises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `classeur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chemises`
--

INSERT INTO `chemises` (`id`, `numero`, `description`, `classeur_id`, `created_at`, `updated_at`) VALUES
(1, 'D01', 'Dossier privé', 2, '2025-06-10 14:54:46', '2025-06-11 09:12:59'),
(4, 'D02', 'Dossier privé', 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(5, 'D01', 'Dossier privé', 6, '2025-06-24 13:07:47', '2025-06-24 13:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `classeurs`
--

CREATE TABLE `classeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `boite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classeurs`
--

INSERT INTO `classeurs` (`id`, `numero`, `description`, `boite_id`, `created_at`, `updated_at`) VALUES
(1, 'CL01', 'Classeur dossier banques', 2, '2025-06-10 11:17:43', '2025-06-10 11:21:05'),
(2, 'CL02', 'Classeur dossier technique', 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(5, 'CL03', 'Dossier Matadi', 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(6, 'BO1', 'Classeur dossier banque', 8, '2025-06-24 13:07:34', '2025-06-24 13:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `user_id`, `document_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 7, '2025-06-24 10:44:46', '2025-06-24 10:44:46'),
(2, 1, 17, 7, '2025-06-24 10:45:42', '2025-06-24 10:45:42'),
(3, 1, 3, 7, '2025-06-24 10:57:09', '2025-06-24 10:57:09'),
(4, 1, 1, 7, '2025-06-24 10:57:34', '2025-06-24 10:57:34'),
(5, 1, 20, 7, '2025-06-24 10:58:23', '2025-06-24 10:58:23'),
(6, 1, 17, 7, '2025-06-24 10:58:55', '2025-06-24 10:58:55'),
(7, 1, 20, 7, '2025-06-24 11:00:03', '2025-06-24 11:00:03'),
(8, 1, 20, 7, '2025-06-24 12:11:22', '2025-06-24 12:11:22'),
(9, 1, 5, 7, '2025-06-24 12:20:35', '2025-06-24 12:20:35'),
(10, 1, 20, 7, '2025-06-24 12:26:04', '2025-06-24 12:26:04'),
(11, 1, 20, 7, '2025-06-24 12:26:41', '2025-06-24 12:26:41'),
(12, 1, 20, 7, '2025-06-24 12:26:57', '2025-06-24 12:26:57'),
(13, 2, 20, 7, '2025-06-24 12:29:47', '2025-06-24 12:29:47'),
(14, 1, 15, 7, '2025-06-24 12:40:24', '2025-06-24 12:40:24'),
(15, 2, 26, 15, '2025-06-24 13:16:55', '2025-06-24 13:16:55'),
(16, 2, 26, 15, '2025-06-24 13:17:02', '2025-06-24 13:17:02'),
(17, 1, 20, 7, '2025-06-25 08:58:14', '2025-06-25 08:58:14'),
(18, 1, 20, 7, '2025-06-25 09:02:36', '2025-06-25 09:02:36'),
(19, 1, 20, 7, '2025-06-25 09:02:44', '2025-06-25 09:02:44'),
(20, 1, 20, 7, '2025-06-25 09:03:02', '2025-06-25 09:03:02'),
(21, 1, 20, 7, '2025-06-25 09:03:39', '2025-06-25 09:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `origine` varchar(255) DEFAULT NULL,
  `duree_conservation` varchar(255) DEFAULT NULL,
  `detail_duree_conservation` varchar(255) DEFAULT NULL,
  `lien_numerisation` text DEFAULT NULL,
  `context` text DEFAULT NULL,
  `chemise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `titre`, `reference`, `origine`, `duree_conservation`, `detail_duree_conservation`, `lien_numerisation`, `context`, `chemise_id`, `created_at`, `updated_at`) VALUES
(1, 'Lettre CNSS', 'CNSS-LT', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/1.pdf', NULL, 1, '2025-06-12 15:08:06', '2025-06-13 13:07:07'),
(3, 'Lettre SNEL pour le département de la Cybersécurité', 'SNEL-LT', 'SNEL', '2', 'years', '/home/horly-exad/Public/web/archivhub/public/assets/documents/3.pdf', 'Demande de partenariat', 1, '2025-06-12 15:23:25', '2025-06-13 08:26:00'),
(4, 'Lettre test', 'TEST-TF', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(5, 'Document test', 'RDFR', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/5.pdf', NULL, 1, '2025-06-13 08:35:55', '2025-06-13 08:36:16'),
(6, 'Document test 2', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 4, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(7, 'Document test 3', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 4, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(8, 'Document test 4', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(9, 'Document test 3', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(10, 'Document test 4', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(11, 'Document test 6', 'SNEL-LT', NULL, NULL, NULL, NULL, NULL, 4, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(12, 'Document test 7', 'CNSS-LT', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(13, 'Document test 8', 'CNSS-LT', NULL, NULL, NULL, NULL, NULL, 4, '2025-06-13 09:19:01', '2025-06-13 09:19:19'),
(14, 'Document test 9', 'CNSS-LT', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/14.pdf', NULL, 4, '2025-06-13 09:19:41', '2025-06-13 09:20:08'),
(15, 'Document test 10', 'RDFR', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/15.pdf', NULL, 1, '2025-06-13 09:22:19', '2025-06-24 12:40:32'),
(16, 'Document test 11', 'RDFR', NULL, NULL, NULL, NULL, NULL, 4, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(17, 'Document test 12', 'RDFRSED', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/17.pdf', NULL, 1, '2025-06-13 09:23:11', '2025-06-24 08:55:56'),
(20, 'Lettre DGI', 'DGI-DHGD', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/20.pdf', NULL, 1, '2025-06-13 09:24:38', '2025-06-13 13:12:43'),
(25, 'Document test 14', 'RDFR', 'SNEL', NULL, 'years', NULL, NULL, 5, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(26, 'Test', 'TE-FS', NULL, NULL, NULL, '/home/horly-exad/Public/web/archivhub/public/assets/documents/26.pdf', NULL, 5, '2025-06-24 13:16:31', '2025-06-24 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `etageres`
--

CREATE TABLE `etageres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `armoire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etageres`
--

INSERT INTO `etageres` (`id`, `numero`, `description`, `armoire_id`, `created_at`, `updated_at`) VALUES
(1, 'E01', 'Dossier interne', 2, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(2, 'E02', 'Dossier externe', 2, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(5, 'E03', 'Dossier media', 2, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(6, 'E04', 'Dossier media', 2, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(7, 'E05', 'Dossier interne', 2, '2025-06-06 10:11:42', '2025-06-06 10:11:53'),
(11, 'E03', 'Dossier media', 17, '2025-06-24 13:07:13', '2025-06-24 13:07:13');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
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
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cle_licence` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_expiration` date NOT NULL,
  `type_licence` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licences`
--

INSERT INTO `licences` (`id`, `cle_licence`, `date_debut`, `date_expiration`, `type_licence`, `created_at`, `updated_at`) VALUES
(6, 'ATO0-ATO3-CTQ5-OGHO', '2025-05-22', '2026-04-01', 'entreprise', '2025-05-22 19:46:21', '2025-05-22 19:46:21');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_01_164734_add_two_factor_columns_to_users_table', 1),
(5, '2025_05_21_114006_create_licences_table', 1),
(7, '2025_05_22_112751_create_roles_table', 2),
(8, '2025_05_22_113707_add_new_attribute_to_users_table', 2),
(10, '2025_05_24_183009_create_sites_table', 3),
(11, '2025_05_24_183300_create_rooms_table', 3),
(12, '2025_05_25_081937_create_notifications_table', 4),
(13, '2025_05_25_083044_create_read_notifs_table', 5),
(14, '2025_05_27_135635_create_permissions_table', 6),
(15, '2025_05_29_125255_add_new_attribute_to_rooms_table', 7),
(16, '2025_05_30_112117_create_armoires_table', 8),
(17, '2025_06_04_082233_create_etageres_table', 9),
(18, '2025_06_06_150408_create_boites_table', 10),
(19, '2025_06_10_075933_create_classeurs_table', 11),
(20, '2025_06_10_135612_create_chemises_table', 12),
(21, '2025_06_11_144521_create_documents_table', 13),
(22, '2025_06_12_142532_add_new_attributes_in_documents_table', 14),
(23, '2025_06_24_105019_create_consultations_table', 15),
(24, '2025_06_24_110337_add_new_attributes_to_consultations_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `description`, `link`, `id_user`, `created_at`, `updated_at`) VALUES
(10, 'dashboard.added_a_site', '/site', 1, '2025-05-25 10:07:03', '2025-05-25 10:07:03'),
(11, 'dashboard.added_a_site', '/site', 1, '2025-05-25 10:07:31', '2025-05-25 10:07:31'),
(12, 'dashboard.added_a_site', '/site', 1, '2025-05-25 10:07:50', '2025-05-25 10:07:50'),
(13, 'dashboard.has_modified_a_site', '/add_site/9', 1, '2025-05-25 10:08:04', '2025-05-25 10:08:04'),
(14, 'dashboard.has_modified_a_site', '/add_site/10', 1, '2025-05-25 12:25:37', '2025-05-25 12:25:37'),
(15, 'dashboard.has_modified_a_site', '/add_site/11', 1, '2025-05-25 12:33:51', '2025-05-25 12:33:51'),
(16, 'dashboard.has_modified_a_site', '/add_site/10', 1, '2025-05-25 12:57:03', '2025-05-25 12:57:03'),
(17, 'dashboard.has_modified_a_site', '/add_site/10', 1, '2025-05-26 18:27:51', '2025-05-26 18:27:51'),
(18, 'dashboard.has_modified_a_site', '/add_site/11', 1, '2025-05-27 09:30:53', '2025-05-27 09:30:53'),
(19, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:00:11', '2025-05-27 15:00:11'),
(20, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:03:32', '2025-05-27 15:03:32'),
(21, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:03:44', '2025-05-27 15:03:44'),
(22, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:03:48', '2025-05-27 15:03:48'),
(23, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:04:08', '2025-05-27 15:04:08'),
(24, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:04:15', '2025-05-27 15:04:15'),
(25, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-27 15:04:19', '2025-05-27 15:04:19'),
(26, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-28 07:08:55', '2025-05-28 07:08:55'),
(27, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-28 07:09:03', '2025-05-28 07:09:03'),
(28, 'auth.has_added_a_new_user', '/user_management', 1, '2025-05-28 09:18:04', '2025-05-28 09:18:04'),
(29, 'auth.has_added_a_new_user', '/user_management', 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(30, 'auth.has_updated_user', '/user_management', 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(31, 'auth.has_added_a_new_user', '/user_management', 1, '2025-05-28 09:44:56', '2025-05-28 09:44:56'),
(32, 'auth.has_deleted_a_user', '/user_management', 1, '2025-05-28 09:46:04', '2025-05-28 09:46:04'),
(33, 'auth.has_deleted_a_user', '/user_management', 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(34, 'auth.updated_his_profile_information', '/user_management', 1, '2025-05-28 12:22:25', '2025-05-28 12:22:25'),
(35, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 2, '2025-05-28 15:36:00', '2025-05-28 15:36:00'),
(36, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 2, '2025-05-28 15:36:06', '2025-05-28 15:36:06'),
(37, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-28 15:40:05', '2025-05-28 15:40:05'),
(38, 'dashboard.has_changed_an_authorization_for_açuser', '/user_management', 1, '2025-05-28 15:40:24', '2025-05-28 15:40:24'),
(39, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(40, 'dashboard.has_modified_a_room', '/add_room/11/1', 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(41, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(42, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(43, 'dashboard.added_a_site', '/site', 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(44, 'dashboard.has_deleted_a_site', '/site', 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(45, 'dashboard.has_deleted_a_room', '/room/11', 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(46, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(47, 'dashboard.has_deleted_a_room', '/room/11', 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(48, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(49, 'dashboard.has_deleted_a_room', '/room/11', 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(50, 'dashboard.added_a_room', '/room/11', 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(51, 'dashboard.added_a_room', '/room/9', 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(52, 'dashboard.added_a_room', '/room/9', 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(53, 'dashboard.has_modified_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(54, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(55, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(56, 'dashboard.has_modified_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(57, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(58, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(59, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(60, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(61, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(62, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(63, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(64, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(65, 'dashboard.has_modified_a_armoire', '/armoire/9/7', 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(66, 'dashboard.has_modified_a_armoire', '/armoire/9/7', 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(67, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(68, 'dashboard.added_a_site', '/site', 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(69, 'dashboard.added_a_room', '/room/9', 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(70, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(71, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(72, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(73, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(74, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(75, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(76, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(77, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(78, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(79, 'dashboard.has_deleted_a_shelve', '/etagere/9/7', 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(80, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(81, 'dashboard.has_deleted_a_shelve', '/etagere/9/7', 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(82, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(83, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(84, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(85, 'dashboard.updated_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(86, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(87, 'dashboard.has_deleted_a_shelve', '/etagere/9/7', 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(88, 'dashboard.added_a_site', '/site', 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(89, 'dashboard.added_a_site', '/site', 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(90, 'dashboard.added_a_site', '/site', 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(91, 'dashboard.has_deleted_a_site', '/site', 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(92, 'dashboard.has_deleted_a_site', '/site', 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(93, 'dashboard.has_deleted_a_site', '/site', 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(94, 'dashboard.added_a_room', '/room/9', 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(95, 'dashboard.added_a_room', '/room/9', 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(96, 'dashboard.added_a_room', '/room/9', 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(97, 'dashboard.added_a_room', '/room/9', 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(98, 'dashboard.has_deleted_a_room', '/room/9', 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(99, 'dashboard.has_deleted_a_room', '/room/9', 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(100, 'dashboard.has_deleted_a_room', '/room/9', 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(101, 'dashboard.has_deleted_a_room', '/room/9', 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(102, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(103, 'dashboard.updated_a_box', '/boite/9/7', 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(104, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(105, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(106, 'dashboard.added_a_site', '/site', 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(107, 'dashboard.has_deleted_a_site', '/site', 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(108, 'dashboard.added_a_room', '/room/9', 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(109, 'dashboard.has_deleted_a_room', '/room/9', 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(110, 'dashboard.added_a_armoire', '/armoire/9/7', 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(111, 'dashboard.has_deleted_a_cabinet', '/armoire/9/7', 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(112, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(113, 'dashboard.has_deleted_a_shelve', '/etagere/9/7', 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(114, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(115, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(116, 'dashboard.added_a_shelve', '/etagere/9/7', 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(117, 'dashboard.has_deleted_a_shelve', '/etagere/9/7', 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(118, 'dashboard.has_deleted_a_box', '/boite/9/7', 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(119, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(120, 'dashboard.has_deleted_a_box', '/boite/9/7', 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(121, 'dashboard.added_a_box', '/boite/9/7', 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(122, 'dashboard.has_deleted_a_box', '/boite/9/7', 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(123, 'dashboard.updated_a_box', '/boite/9/7', 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(124, 'dashboard.added_a_binder', '/classeur/9/7', 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(125, 'dashboard.added_a_binder', '/classeur/9/7', 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(126, 'dashboard.updated_a_binder', '/classeur/9/7', 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(127, 'dashboard.added_a_binder', '/classeur/9/7', 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(128, 'dashboard.has_deleted_a_binder', '/boite/9/7', 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(129, 'dashboard.added_a_binder', '/classeur/9/7', 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(130, 'dashboard.has_deleted_a_binder', '/classeur/9/7', 1, '2025-06-10 11:34:49', '2025-06-10 11:34:49'),
(131, 'dashboard.added_a_binder', '/classeur/9/7', 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(132, 'dashboard.added_a_folder', '/chemise/9/7', 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(133, 'dashboard.added_a_folder', '/chemise/9/7', 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(134, 'dashboard.has_deleted_a_folder', '/chemise/9/7', 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(135, 'dashboard.added_a_folder', '/chemise/9/7', 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(136, 'dashboard.has_deleted_a_folder', '/chemise/9/7', 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(137, 'dashboard.updated_a_folder', '/chemise/9/7', 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(138, 'dashboard.added_a_folder', '/chemise/9/7', 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(139, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(140, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(141, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(142, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(143, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(144, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(145, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(146, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(147, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(148, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(149, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(150, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(151, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(152, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(153, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(154, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(155, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(156, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(157, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(158, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(159, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(160, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(161, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(162, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(163, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(164, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(165, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(166, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(167, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(168, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(169, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(170, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04'),
(171, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(172, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(173, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(174, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(175, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(176, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(177, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(178, 'dashboard.added_a_document', '/document/9/7', 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(179, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(180, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(181, 'dashboard.has_deleted_a_document', '/document/9/7', 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(182, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(183, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(184, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(185, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-24 08:55:56', '2025-06-24 08:55:56'),
(186, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(187, 'dashboard.updated_a_document', '/document/9/7', 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(188, 'dashboard.added_a_room', '/room/10', 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(189, 'dashboard.added_a_armoire', '/armoire/10/15', 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(190, 'dashboard.added_a_shelve', '/etagere/10/15', 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(191, 'dashboard.added_a_box', '/boite/10/15', 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(192, 'dashboard.added_a_binder', '/classeur/10/15', 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(193, 'dashboard.added_a_folder', '/chemise/10/15', 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(194, 'dashboard.added_a_document', '/document/10/15', 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(195, 'dashboard.added_a_document', '/document/10/15', 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(196, 'dashboard.updated_a_document', '/document/10/15', 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 3, '2025-05-27 15:04:19', '2025-05-27 15:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `read_notifs`
--

CREATE TABLE `read_notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `id_notif` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_sender` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `read_notifs`
--

INSERT INTO `read_notifs` (`id`, `read`, `id_notif`, `id_user`, `id_sender`, `created_at`, `updated_at`) VALUES
(25, 1, 10, 1, 1, '2025-05-25 10:07:03', '2025-05-25 12:25:18'),
(26, 0, 10, 2, 1, '2025-05-25 10:07:03', '2025-05-25 10:07:03'),
(27, 0, 10, 3, 1, '2025-05-25 10:07:03', '2025-05-25 10:07:03'),
(28, 1, 11, 1, 1, '2025-05-25 10:07:31', '2025-05-25 10:08:20'),
(29, 0, 11, 2, 1, '2025-05-25 10:07:31', '2025-05-25 10:07:31'),
(30, 0, 11, 3, 1, '2025-05-25 10:07:31', '2025-05-25 10:07:31'),
(31, 1, 12, 1, 1, '2025-05-25 10:07:50', '2025-05-25 12:25:16'),
(32, 0, 12, 2, 1, '2025-05-25 10:07:50', '2025-05-25 10:07:50'),
(33, 0, 12, 3, 1, '2025-05-25 10:07:50', '2025-05-25 10:07:50'),
(34, 1, 13, 1, 1, '2025-05-25 10:08:04', '2025-05-25 12:25:14'),
(35, 0, 13, 2, 1, '2025-05-25 10:08:04', '2025-05-25 10:08:04'),
(36, 0, 13, 3, 1, '2025-05-25 10:08:04', '2025-05-25 10:08:04'),
(37, 1, 14, 1, 1, '2025-05-25 12:25:37', '2025-05-25 12:57:30'),
(38, 0, 14, 2, 1, '2025-05-25 12:25:37', '2025-05-25 12:25:37'),
(39, 0, 14, 3, 1, '2025-05-25 12:25:37', '2025-05-25 12:25:37'),
(40, 1, 15, 1, 1, '2025-05-25 12:33:51', '2025-05-26 18:27:45'),
(41, 0, 15, 2, 1, '2025-05-25 12:33:51', '2025-05-25 12:33:51'),
(42, 0, 15, 3, 1, '2025-05-25 12:33:51', '2025-05-25 12:33:51'),
(43, 1, 16, 1, 1, '2025-05-25 12:57:03', '2025-05-26 18:25:24'),
(44, 0, 16, 2, 1, '2025-05-25 12:57:03', '2025-05-25 12:57:03'),
(45, 0, 16, 3, 1, '2025-05-25 12:57:03', '2025-05-25 12:57:03'),
(46, 0, 17, 1, 1, '2025-05-26 18:27:51', '2025-05-26 18:27:51'),
(47, 0, 17, 2, 1, '2025-05-26 18:27:51', '2025-05-26 18:27:51'),
(48, 0, 17, 3, 1, '2025-05-26 18:27:51', '2025-05-26 18:27:51'),
(49, 0, 18, 1, 1, '2025-05-27 09:30:53', '2025-05-27 09:30:53'),
(50, 0, 18, 2, 1, '2025-05-27 09:30:53', '2025-05-27 09:30:53'),
(51, 0, 18, 3, 1, '2025-05-27 09:30:53', '2025-05-27 09:30:53'),
(52, 0, 19, 1, 1, '2025-05-27 15:00:11', '2025-05-27 15:00:11'),
(53, 0, 19, 2, 1, '2025-05-27 15:00:11', '2025-05-27 15:00:11'),
(54, 0, 19, 3, 1, '2025-05-27 15:00:11', '2025-05-27 15:00:11'),
(55, 0, 19, 4, 1, '2025-05-27 15:00:11', '2025-05-27 15:00:11'),
(56, 0, 20, 1, 1, '2025-05-27 15:03:32', '2025-05-27 15:03:32'),
(57, 0, 20, 2, 1, '2025-05-27 15:03:32', '2025-05-27 15:03:32'),
(58, 0, 20, 3, 1, '2025-05-27 15:03:32', '2025-05-27 15:03:32'),
(59, 0, 20, 4, 1, '2025-05-27 15:03:32', '2025-05-27 15:03:32'),
(60, 0, 21, 1, 1, '2025-05-27 15:03:44', '2025-05-27 15:03:44'),
(61, 0, 21, 2, 1, '2025-05-27 15:03:44', '2025-05-27 15:03:44'),
(62, 0, 21, 3, 1, '2025-05-27 15:03:44', '2025-05-27 15:03:44'),
(63, 0, 21, 4, 1, '2025-05-27 15:03:44', '2025-05-27 15:03:44'),
(64, 0, 22, 1, 1, '2025-05-27 15:03:48', '2025-05-27 15:03:48'),
(65, 0, 22, 2, 1, '2025-05-27 15:03:48', '2025-05-27 15:03:48'),
(66, 0, 22, 3, 1, '2025-05-27 15:03:48', '2025-05-27 15:03:48'),
(67, 0, 22, 4, 1, '2025-05-27 15:03:48', '2025-05-27 15:03:48'),
(68, 0, 23, 1, 1, '2025-05-27 15:04:08', '2025-05-27 15:04:08'),
(69, 0, 23, 2, 1, '2025-05-27 15:04:08', '2025-05-27 15:04:08'),
(70, 0, 23, 3, 1, '2025-05-27 15:04:08', '2025-05-27 15:04:08'),
(71, 0, 23, 4, 1, '2025-05-27 15:04:08', '2025-05-27 15:04:08'),
(72, 0, 24, 1, 1, '2025-05-27 15:04:15', '2025-05-27 15:04:15'),
(73, 0, 24, 2, 1, '2025-05-27 15:04:15', '2025-05-27 15:04:15'),
(74, 0, 24, 3, 1, '2025-05-27 15:04:15', '2025-05-27 15:04:15'),
(75, 0, 24, 4, 1, '2025-05-27 15:04:15', '2025-05-27 15:04:15'),
(76, 0, 25, 1, 1, '2025-05-27 15:04:19', '2025-05-27 15:04:19'),
(77, 0, 25, 2, 1, '2025-05-27 15:04:19', '2025-05-27 15:04:19'),
(78, 0, 25, 3, 1, '2025-05-27 15:04:19', '2025-05-27 15:04:19'),
(79, 0, 25, 4, 1, '2025-05-27 15:04:19', '2025-05-27 15:04:19'),
(80, 0, 26, 1, 1, '2025-05-28 07:08:55', '2025-05-28 07:08:55'),
(81, 0, 26, 2, 1, '2025-05-28 07:08:55', '2025-05-28 07:08:55'),
(82, 0, 26, 3, 1, '2025-05-28 07:08:55', '2025-05-28 07:08:55'),
(83, 0, 26, 4, 1, '2025-05-28 07:08:55', '2025-05-28 07:08:55'),
(84, 0, 27, 1, 1, '2025-05-28 07:09:03', '2025-05-28 07:09:03'),
(85, 0, 27, 2, 1, '2025-05-28 07:09:03', '2025-05-28 07:09:03'),
(86, 0, 27, 3, 1, '2025-05-28 07:09:03', '2025-05-28 07:09:03'),
(87, 0, 27, 4, 1, '2025-05-28 07:09:03', '2025-05-28 07:09:03'),
(88, 0, 28, 1, 1, '2025-05-28 09:18:04', '2025-05-28 09:18:04'),
(89, 0, 28, 2, 1, '2025-05-28 09:18:04', '2025-05-28 09:18:04'),
(90, 0, 28, 3, 1, '2025-05-28 09:18:04', '2025-05-28 09:18:04'),
(91, 0, 28, 4, 1, '2025-05-28 09:18:04', '2025-05-28 09:18:04'),
(93, 0, 29, 1, 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(94, 0, 29, 2, 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(95, 0, 29, 3, 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(96, 0, 29, 4, 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(98, 0, 29, 6, 2, '2025-05-28 09:22:01', '2025-05-28 09:22:01'),
(99, 0, 30, 1, 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(100, 0, 30, 2, 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(101, 0, 30, 3, 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(102, 0, 30, 4, 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(104, 0, 30, 6, 1, '2025-05-28 09:27:25', '2025-05-28 09:27:25'),
(105, 1, 31, 1, 1, '2025-05-28 09:44:56', '2025-05-28 11:10:22'),
(106, 0, 31, 2, 1, '2025-05-28 09:44:56', '2025-05-28 09:44:56'),
(107, 0, 31, 3, 1, '2025-05-28 09:44:56', '2025-05-28 09:44:56'),
(108, 0, 31, 4, 1, '2025-05-28 09:44:56', '2025-05-28 09:44:56'),
(110, 0, 31, 6, 1, '2025-05-28 09:44:56', '2025-05-28 09:44:56'),
(112, 1, 32, 1, 1, '2025-05-28 09:46:04', '2025-05-28 11:10:14'),
(113, 0, 32, 2, 1, '2025-05-28 09:46:04', '2025-05-28 09:46:04'),
(114, 0, 32, 3, 1, '2025-05-28 09:46:04', '2025-05-28 09:46:04'),
(115, 0, 32, 4, 1, '2025-05-28 09:46:04', '2025-05-28 09:46:04'),
(117, 0, 32, 6, 1, '2025-05-28 09:46:04', '2025-05-28 09:46:04'),
(118, 0, 33, 1, 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(119, 0, 33, 2, 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(120, 0, 33, 3, 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(121, 0, 33, 4, 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(122, 0, 33, 6, 1, '2025-05-28 09:49:34', '2025-05-28 09:49:34'),
(123, 1, 34, 1, 1, '2025-05-28 12:22:25', '2025-05-29 07:36:28'),
(124, 0, 34, 2, 1, '2025-05-28 12:22:25', '2025-05-28 12:22:25'),
(125, 0, 34, 3, 1, '2025-05-28 12:22:25', '2025-05-28 12:22:25'),
(126, 0, 34, 4, 1, '2025-05-28 12:22:25', '2025-05-28 12:22:25'),
(127, 0, 34, 6, 1, '2025-05-28 12:22:25', '2025-05-28 12:22:25'),
(128, 1, 35, 1, 2, '2025-05-28 15:36:00', '2025-05-29 07:36:18'),
(129, 0, 35, 2, 2, '2025-05-28 15:36:00', '2025-05-28 15:36:00'),
(130, 0, 35, 3, 2, '2025-05-28 15:36:00', '2025-05-28 15:36:00'),
(131, 0, 35, 4, 2, '2025-05-28 15:36:00', '2025-05-28 15:36:00'),
(132, 0, 35, 6, 2, '2025-05-28 15:36:00', '2025-05-28 15:36:00'),
(133, 1, 36, 1, 2, '2025-05-28 15:36:06', '2025-05-29 07:36:16'),
(134, 0, 36, 2, 2, '2025-05-28 15:36:06', '2025-05-28 15:36:06'),
(135, 0, 36, 3, 2, '2025-05-28 15:36:06', '2025-05-28 15:36:06'),
(136, 0, 36, 4, 2, '2025-05-28 15:36:06', '2025-05-28 15:36:06'),
(137, 0, 36, 6, 2, '2025-05-28 15:36:06', '2025-05-28 15:36:06'),
(138, 1, 37, 1, 1, '2025-05-28 15:40:05', '2025-05-29 07:36:13'),
(139, 0, 37, 2, 1, '2025-05-28 15:40:05', '2025-05-28 15:40:05'),
(140, 0, 37, 3, 1, '2025-05-28 15:40:05', '2025-05-28 15:40:05'),
(141, 0, 37, 4, 1, '2025-05-28 15:40:05', '2025-05-28 15:40:05'),
(142, 0, 37, 6, 1, '2025-05-28 15:40:05', '2025-05-28 15:40:05'),
(143, 1, 38, 1, 1, '2025-05-28 15:40:24', '2025-05-29 07:36:04'),
(144, 0, 38, 2, 1, '2025-05-28 15:40:24', '2025-05-28 15:40:24'),
(145, 0, 38, 3, 1, '2025-05-28 15:40:24', '2025-05-28 15:40:24'),
(146, 1, 38, 4, 1, '2025-05-28 15:40:24', '2025-05-29 07:37:30'),
(147, 0, 38, 6, 1, '2025-05-28 15:40:24', '2025-05-28 15:40:24'),
(148, 0, 39, 1, 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(149, 0, 39, 2, 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(150, 0, 39, 3, 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(151, 0, 39, 4, 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(152, 0, 39, 6, 1, '2025-05-29 12:33:37', '2025-05-29 12:33:37'),
(153, 0, 40, 1, 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(154, 0, 40, 2, 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(155, 0, 40, 3, 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(156, 0, 40, 4, 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(157, 0, 40, 6, 1, '2025-05-29 12:36:09', '2025-05-29 12:36:09'),
(158, 0, 41, 1, 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(159, 0, 41, 2, 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(160, 0, 41, 3, 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(161, 0, 41, 4, 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(162, 0, 41, 6, 1, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(163, 0, 42, 1, 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(164, 0, 42, 2, 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(165, 0, 42, 3, 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(166, 0, 42, 4, 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(167, 0, 42, 6, 1, '2025-05-29 13:04:21', '2025-05-29 13:04:21'),
(168, 0, 43, 1, 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(169, 0, 43, 2, 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(170, 0, 43, 3, 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(171, 0, 43, 4, 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(172, 0, 43, 6, 1, '2025-05-29 13:14:32', '2025-05-29 13:14:32'),
(173, 0, 44, 1, 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(174, 0, 44, 2, 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(175, 0, 44, 3, 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(176, 0, 44, 4, 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(177, 0, 44, 6, 1, '2025-05-29 13:14:39', '2025-05-29 13:14:39'),
(178, 0, 45, 1, 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(179, 0, 45, 2, 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(180, 0, 45, 3, 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(181, 0, 45, 4, 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(182, 0, 45, 6, 1, '2025-05-29 13:19:29', '2025-05-29 13:19:29'),
(183, 0, 46, 1, 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(184, 0, 46, 2, 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(185, 0, 46, 3, 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(186, 0, 46, 4, 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(187, 0, 46, 6, 1, '2025-05-29 13:20:24', '2025-05-29 13:20:24'),
(188, 0, 47, 1, 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(189, 0, 47, 2, 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(190, 0, 47, 3, 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(191, 0, 47, 4, 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(192, 0, 47, 6, 1, '2025-05-29 13:20:31', '2025-05-29 13:20:31'),
(193, 0, 48, 1, 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(194, 0, 48, 2, 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(195, 0, 48, 3, 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(196, 0, 48, 4, 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(197, 0, 48, 6, 1, '2025-05-29 13:20:42', '2025-05-29 13:20:42'),
(198, 0, 49, 1, 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(199, 0, 49, 2, 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(200, 0, 49, 3, 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(201, 0, 49, 4, 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(202, 0, 49, 6, 1, '2025-05-29 13:20:53', '2025-05-29 13:20:53'),
(203, 0, 50, 1, 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(204, 0, 50, 2, 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(205, 0, 50, 3, 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(206, 0, 50, 4, 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(207, 0, 50, 6, 1, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(208, 0, 51, 1, 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(209, 0, 51, 2, 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(210, 0, 51, 3, 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(211, 0, 51, 4, 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(212, 0, 51, 6, 1, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(213, 0, 52, 1, 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(214, 0, 52, 2, 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(215, 0, 52, 3, 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(216, 0, 52, 4, 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(217, 0, 52, 6, 1, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(218, 0, 53, 1, 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(219, 0, 53, 2, 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(220, 0, 53, 3, 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(221, 0, 53, 4, 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(222, 0, 53, 6, 1, '2025-05-30 11:15:59', '2025-05-30 11:15:59'),
(223, 0, 54, 1, 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(224, 0, 54, 2, 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(225, 0, 54, 3, 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(226, 0, 54, 4, 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(227, 0, 54, 6, 1, '2025-05-30 11:18:34', '2025-05-30 11:18:34'),
(228, 0, 55, 1, 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(229, 0, 55, 2, 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(230, 0, 55, 3, 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(231, 0, 55, 4, 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(232, 0, 55, 6, 1, '2025-05-30 11:19:58', '2025-05-30 11:19:58'),
(233, 0, 56, 1, 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(234, 0, 56, 2, 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(235, 0, 56, 3, 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(236, 0, 56, 4, 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(237, 0, 56, 6, 1, '2025-05-30 11:36:10', '2025-05-30 11:36:10'),
(238, 0, 57, 1, 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(239, 0, 57, 2, 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(240, 0, 57, 3, 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(241, 0, 57, 4, 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(242, 0, 57, 6, 1, '2025-05-30 11:36:34', '2025-05-30 11:36:34'),
(243, 0, 58, 1, 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(244, 0, 58, 2, 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(245, 0, 58, 3, 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(246, 0, 58, 4, 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(247, 0, 58, 6, 1, '2025-05-30 11:36:53', '2025-05-30 11:36:53'),
(248, 0, 59, 1, 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(249, 0, 59, 2, 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(250, 0, 59, 3, 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(251, 0, 59, 4, 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(252, 0, 59, 6, 1, '2025-05-30 11:37:56', '2025-05-30 11:37:56'),
(253, 0, 60, 1, 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(254, 0, 60, 2, 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(255, 0, 60, 3, 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(256, 0, 60, 4, 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(257, 0, 60, 6, 1, '2025-05-30 11:38:27', '2025-05-30 11:38:27'),
(258, 0, 61, 1, 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(259, 0, 61, 2, 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(260, 0, 61, 3, 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(261, 0, 61, 4, 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(262, 0, 61, 6, 1, '2025-05-30 11:38:54', '2025-05-30 11:38:54'),
(263, 0, 62, 1, 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(264, 0, 62, 2, 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(265, 0, 62, 3, 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(266, 0, 62, 4, 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(267, 0, 62, 6, 1, '2025-05-30 11:39:13', '2025-05-30 11:39:13'),
(268, 0, 63, 1, 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(269, 0, 63, 2, 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(270, 0, 63, 3, 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(271, 0, 63, 4, 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(272, 0, 63, 6, 1, '2025-05-30 11:39:45', '2025-05-30 11:39:45'),
(273, 0, 64, 1, 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(274, 0, 64, 2, 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(275, 0, 64, 3, 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(276, 0, 64, 4, 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(277, 0, 64, 6, 1, '2025-05-30 11:43:18', '2025-05-30 11:43:18'),
(278, 0, 65, 1, 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(279, 0, 65, 2, 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(280, 0, 65, 3, 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(281, 0, 65, 4, 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(282, 0, 65, 6, 1, '2025-06-02 14:34:44', '2025-06-02 14:34:44'),
(283, 0, 66, 1, 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(284, 0, 66, 2, 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(285, 0, 66, 3, 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(286, 0, 66, 4, 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(287, 0, 66, 6, 1, '2025-06-02 14:35:10', '2025-06-02 14:35:10'),
(288, 0, 67, 1, 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(289, 0, 67, 2, 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(290, 0, 67, 3, 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(291, 0, 67, 4, 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(292, 0, 67, 6, 1, '2025-06-04 07:06:20', '2025-06-04 07:06:20'),
(293, 0, 68, 1, 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(294, 0, 68, 2, 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(295, 0, 68, 3, 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(296, 0, 68, 4, 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(297, 0, 68, 6, 1, '2025-06-04 07:11:52', '2025-06-04 07:11:52'),
(298, 0, 69, 1, 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(299, 0, 69, 2, 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(300, 0, 69, 3, 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(301, 0, 69, 4, 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(302, 0, 69, 6, 1, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(303, 0, 70, 1, 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(304, 0, 70, 2, 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(305, 0, 70, 3, 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(306, 0, 70, 4, 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(307, 0, 70, 6, 1, '2025-06-04 07:15:06', '2025-06-04 07:15:06'),
(308, 0, 71, 1, 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(309, 0, 71, 2, 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(310, 0, 71, 3, 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(311, 0, 71, 4, 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(312, 0, 71, 6, 1, '2025-06-04 07:15:24', '2025-06-04 07:15:24'),
(313, 0, 72, 1, 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(314, 0, 72, 2, 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(315, 0, 72, 3, 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(316, 0, 72, 4, 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(317, 0, 72, 6, 1, '2025-06-04 07:15:35', '2025-06-04 07:15:35'),
(318, 0, 73, 1, 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(319, 0, 73, 2, 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(320, 0, 73, 3, 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(321, 0, 73, 4, 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(322, 0, 73, 6, 1, '2025-06-04 07:15:42', '2025-06-04 07:15:42'),
(323, 0, 74, 1, 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(324, 0, 74, 2, 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(325, 0, 74, 3, 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(326, 0, 74, 4, 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(327, 0, 74, 6, 1, '2025-06-04 07:16:56', '2025-06-04 07:16:56'),
(328, 0, 75, 1, 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(329, 0, 75, 2, 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(330, 0, 75, 3, 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(331, 0, 75, 4, 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(332, 0, 75, 6, 1, '2025-06-04 07:19:03', '2025-06-04 07:19:03'),
(333, 0, 76, 1, 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(334, 0, 76, 2, 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(335, 0, 76, 3, 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(336, 0, 76, 4, 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(337, 0, 76, 6, 1, '2025-06-05 07:41:23', '2025-06-05 07:41:23'),
(338, 0, 77, 1, 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(339, 0, 77, 2, 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(340, 0, 77, 3, 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(341, 0, 77, 4, 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(342, 0, 77, 6, 1, '2025-06-06 08:31:00', '2025-06-06 08:31:00'),
(343, 0, 78, 1, 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(344, 0, 78, 2, 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(345, 0, 78, 3, 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(346, 0, 78, 4, 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(347, 0, 78, 6, 1, '2025-06-06 08:36:55', '2025-06-06 08:36:55'),
(348, 0, 79, 1, 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(349, 0, 79, 2, 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(350, 0, 79, 3, 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(351, 0, 79, 4, 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(352, 0, 79, 6, 1, '2025-06-06 08:43:15', '2025-06-06 08:43:15'),
(353, 0, 80, 1, 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(354, 0, 80, 2, 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(355, 0, 80, 3, 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(356, 0, 80, 4, 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(357, 0, 80, 6, 1, '2025-06-06 08:44:03', '2025-06-06 08:44:03'),
(358, 0, 81, 1, 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(359, 0, 81, 2, 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(360, 0, 81, 3, 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(361, 0, 81, 4, 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(362, 0, 81, 6, 1, '2025-06-06 08:46:51', '2025-06-06 08:46:51'),
(363, 0, 82, 1, 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(364, 0, 82, 2, 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(365, 0, 82, 3, 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(366, 0, 82, 4, 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(367, 0, 82, 6, 1, '2025-06-06 10:08:55', '2025-06-06 10:08:55'),
(368, 0, 83, 1, 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(369, 0, 83, 2, 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(370, 0, 83, 3, 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(371, 0, 83, 4, 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(372, 0, 83, 6, 1, '2025-06-06 10:11:33', '2025-06-06 10:11:33'),
(373, 0, 84, 1, 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(374, 0, 84, 2, 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(375, 0, 84, 3, 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(376, 0, 84, 4, 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(377, 0, 84, 6, 1, '2025-06-06 10:11:42', '2025-06-06 10:11:42'),
(378, 0, 85, 1, 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(379, 0, 85, 2, 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(380, 0, 85, 3, 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(381, 0, 85, 4, 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(382, 0, 85, 6, 1, '2025-06-06 10:11:53', '2025-06-06 10:11:53'),
(383, 0, 86, 1, 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(384, 0, 86, 2, 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(385, 0, 86, 3, 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(386, 0, 86, 4, 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(387, 0, 86, 6, 1, '2025-06-06 10:12:03', '2025-06-06 10:12:03'),
(388, 0, 87, 1, 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(389, 0, 87, 2, 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(390, 0, 87, 3, 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(391, 0, 87, 4, 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(392, 0, 87, 6, 1, '2025-06-06 10:24:25', '2025-06-06 10:24:25'),
(393, 0, 88, 1, 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(394, 0, 88, 2, 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(395, 0, 88, 3, 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(396, 0, 88, 4, 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(397, 0, 88, 6, 1, '2025-06-06 13:19:28', '2025-06-06 13:19:28'),
(398, 0, 89, 1, 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(399, 0, 89, 2, 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(400, 0, 89, 3, 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(401, 0, 89, 4, 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(402, 0, 89, 6, 1, '2025-06-06 13:19:35', '2025-06-06 13:19:35'),
(403, 0, 90, 1, 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(404, 0, 90, 2, 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(405, 0, 90, 3, 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(406, 0, 90, 4, 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(407, 0, 90, 6, 1, '2025-06-06 13:19:42', '2025-06-06 13:19:42'),
(408, 0, 91, 1, 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(409, 0, 91, 2, 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(410, 0, 91, 3, 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(411, 0, 91, 4, 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(412, 0, 91, 6, 1, '2025-06-06 13:20:05', '2025-06-06 13:20:05'),
(413, 0, 92, 1, 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(414, 0, 92, 2, 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(415, 0, 92, 3, 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(416, 0, 92, 4, 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(417, 0, 92, 6, 1, '2025-06-06 13:20:11', '2025-06-06 13:20:11'),
(418, 0, 93, 1, 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(419, 0, 93, 2, 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(420, 0, 93, 3, 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(421, 0, 93, 4, 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(422, 0, 93, 6, 1, '2025-06-06 13:20:16', '2025-06-06 13:20:16'),
(423, 0, 94, 1, 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(424, 0, 94, 2, 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(425, 0, 94, 3, 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(426, 0, 94, 4, 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(427, 0, 94, 6, 1, '2025-06-06 13:38:19', '2025-06-06 13:38:19'),
(428, 0, 95, 1, 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(429, 0, 95, 2, 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(430, 0, 95, 3, 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(431, 0, 95, 4, 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(432, 0, 95, 6, 1, '2025-06-06 13:38:24', '2025-06-06 13:38:24'),
(433, 0, 96, 1, 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(434, 0, 96, 2, 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(435, 0, 96, 3, 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(436, 0, 96, 4, 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(437, 0, 96, 6, 1, '2025-06-06 13:38:31', '2025-06-06 13:38:31'),
(438, 0, 97, 1, 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(439, 0, 97, 2, 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(440, 0, 97, 3, 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(441, 0, 97, 4, 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(442, 0, 97, 6, 1, '2025-06-06 13:38:37', '2025-06-06 13:38:37'),
(443, 0, 98, 1, 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(444, 0, 98, 2, 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(445, 0, 98, 3, 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(446, 0, 98, 4, 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(447, 0, 98, 6, 1, '2025-06-06 13:38:53', '2025-06-06 13:38:53'),
(448, 0, 99, 1, 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(449, 0, 99, 2, 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(450, 0, 99, 3, 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(451, 0, 99, 4, 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(452, 0, 99, 6, 1, '2025-06-06 13:38:58', '2025-06-06 13:38:58'),
(453, 0, 100, 1, 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(454, 0, 100, 2, 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(455, 0, 100, 3, 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(456, 0, 100, 4, 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(457, 0, 100, 6, 1, '2025-06-06 13:39:01', '2025-06-06 13:39:01'),
(458, 0, 101, 1, 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(459, 0, 101, 2, 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(460, 0, 101, 3, 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(461, 0, 101, 4, 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(462, 0, 101, 6, 1, '2025-06-06 13:39:06', '2025-06-06 13:39:06'),
(463, 0, 102, 1, 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(464, 0, 102, 2, 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(465, 0, 102, 3, 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(466, 0, 102, 4, 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(467, 0, 102, 6, 1, '2025-06-06 17:48:27', '2025-06-06 17:48:27'),
(468, 0, 103, 1, 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(469, 0, 103, 2, 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(470, 0, 103, 3, 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(471, 0, 103, 4, 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(472, 0, 103, 6, 1, '2025-06-06 17:49:35', '2025-06-06 17:49:35'),
(473, 0, 104, 1, 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(474, 0, 104, 2, 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(475, 0, 104, 3, 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(476, 0, 104, 4, 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(477, 0, 104, 6, 1, '2025-06-06 17:50:23', '2025-06-06 17:50:23'),
(478, 0, 105, 1, 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(479, 0, 105, 2, 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(480, 0, 105, 3, 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(481, 0, 105, 4, 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(482, 0, 105, 6, 1, '2025-06-06 18:13:14', '2025-06-06 18:13:14'),
(483, 0, 106, 1, 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(484, 0, 106, 2, 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(485, 0, 106, 3, 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(486, 0, 106, 4, 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(487, 0, 106, 6, 1, '2025-06-06 20:46:34', '2025-06-06 20:46:34'),
(488, 0, 107, 1, 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(489, 0, 107, 2, 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(490, 0, 107, 3, 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(491, 0, 107, 4, 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(492, 0, 107, 6, 1, '2025-06-06 20:46:57', '2025-06-06 20:46:57'),
(493, 0, 108, 1, 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(494, 0, 108, 2, 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(495, 0, 108, 3, 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(496, 0, 108, 4, 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(497, 0, 108, 6, 1, '2025-06-06 20:48:08', '2025-06-06 20:48:08'),
(498, 0, 109, 1, 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(499, 0, 109, 2, 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(500, 0, 109, 3, 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(501, 0, 109, 4, 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(502, 0, 109, 6, 1, '2025-06-06 20:48:24', '2025-06-06 20:48:24'),
(503, 0, 110, 1, 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(504, 0, 110, 2, 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(505, 0, 110, 3, 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(506, 0, 110, 4, 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(507, 0, 110, 6, 1, '2025-06-06 21:22:01', '2025-06-06 21:22:01'),
(508, 0, 111, 1, 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(509, 0, 111, 2, 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(510, 0, 111, 3, 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(511, 0, 111, 4, 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(512, 0, 111, 6, 1, '2025-06-06 21:25:55', '2025-06-06 21:25:55'),
(513, 0, 112, 1, 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(514, 0, 112, 2, 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(515, 0, 112, 3, 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(516, 0, 112, 4, 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(517, 0, 112, 6, 1, '2025-06-06 21:29:07', '2025-06-06 21:29:07'),
(518, 0, 113, 1, 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(519, 0, 113, 2, 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(520, 0, 113, 3, 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(521, 0, 113, 4, 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(522, 0, 113, 6, 1, '2025-06-06 21:29:22', '2025-06-06 21:29:22'),
(523, 0, 114, 1, 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(524, 0, 114, 2, 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(525, 0, 114, 3, 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(526, 0, 114, 4, 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(527, 0, 114, 6, 1, '2025-06-06 21:45:25', '2025-06-06 21:45:25'),
(528, 0, 115, 1, 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(529, 0, 115, 2, 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(530, 0, 115, 3, 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(531, 0, 115, 4, 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(532, 0, 115, 6, 1, '2025-06-06 21:45:48', '2025-06-06 21:45:48'),
(533, 0, 116, 1, 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(534, 0, 116, 2, 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(535, 0, 116, 3, 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(536, 0, 116, 4, 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(537, 0, 116, 6, 1, '2025-06-06 21:46:34', '2025-06-06 21:46:34'),
(538, 0, 117, 1, 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(539, 0, 117, 2, 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(540, 0, 117, 3, 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(541, 0, 117, 4, 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(542, 0, 117, 6, 1, '2025-06-06 21:46:47', '2025-06-06 21:46:47'),
(543, 0, 118, 1, 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(544, 0, 118, 2, 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(545, 0, 118, 3, 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(546, 0, 118, 4, 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(547, 0, 118, 6, 1, '2025-06-06 21:50:52', '2025-06-06 21:50:52'),
(548, 0, 119, 1, 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(549, 0, 119, 2, 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(550, 0, 119, 3, 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(551, 0, 119, 4, 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(552, 0, 119, 6, 1, '2025-06-06 21:51:12', '2025-06-06 21:51:12'),
(553, 0, 120, 1, 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(554, 0, 120, 2, 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(555, 0, 120, 3, 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(556, 0, 120, 4, 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(557, 0, 120, 6, 1, '2025-06-06 21:51:29', '2025-06-06 21:51:29'),
(558, 0, 121, 1, 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(559, 0, 121, 2, 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(560, 0, 121, 3, 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(561, 0, 121, 4, 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(562, 0, 121, 6, 1, '2025-06-06 21:51:40', '2025-06-06 21:51:40'),
(563, 0, 122, 1, 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(564, 0, 122, 2, 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(565, 0, 122, 3, 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(566, 0, 122, 4, 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(567, 0, 122, 6, 1, '2025-06-06 21:52:00', '2025-06-06 21:52:00'),
(568, 0, 123, 1, 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(569, 0, 123, 2, 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(570, 0, 123, 3, 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(571, 0, 123, 4, 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(572, 0, 123, 6, 1, '2025-06-10 06:56:15', '2025-06-10 06:56:15'),
(573, 0, 124, 1, 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(574, 0, 124, 2, 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(575, 0, 124, 3, 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(576, 0, 124, 4, 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(577, 0, 124, 6, 1, '2025-06-10 11:17:43', '2025-06-10 11:17:43'),
(578, 0, 125, 1, 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(579, 0, 125, 2, 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(580, 0, 125, 3, 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(581, 0, 125, 4, 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(582, 0, 125, 6, 1, '2025-06-10 11:19:23', '2025-06-10 11:19:23'),
(583, 0, 126, 1, 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(584, 0, 126, 2, 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(585, 0, 126, 3, 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(586, 0, 126, 4, 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(587, 0, 126, 6, 1, '2025-06-10 11:21:05', '2025-06-10 11:21:05'),
(588, 0, 127, 1, 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(589, 0, 127, 2, 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(590, 0, 127, 3, 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(591, 0, 127, 4, 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(592, 0, 127, 6, 1, '2025-06-10 11:21:23', '2025-06-10 11:21:23'),
(593, 0, 128, 1, 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(594, 0, 128, 2, 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(595, 0, 128, 3, 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(596, 0, 128, 4, 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(597, 0, 128, 6, 1, '2025-06-10 11:33:57', '2025-06-10 11:33:57'),
(598, 0, 129, 1, 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(599, 0, 129, 2, 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(600, 0, 129, 3, 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(601, 0, 129, 4, 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(602, 0, 129, 6, 1, '2025-06-10 11:34:30', '2025-06-10 11:34:30'),
(603, 0, 130, 1, 1, '2025-06-10 11:34:49', '2025-06-10 11:34:49'),
(604, 0, 130, 2, 1, '2025-06-10 11:34:49', '2025-06-10 11:34:49'),
(605, 0, 130, 3, 1, '2025-06-10 11:34:50', '2025-06-10 11:34:50'),
(606, 0, 130, 4, 1, '2025-06-10 11:34:50', '2025-06-10 11:34:50'),
(607, 0, 130, 6, 1, '2025-06-10 11:34:50', '2025-06-10 11:34:50'),
(608, 0, 131, 1, 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(609, 0, 131, 2, 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(610, 0, 131, 3, 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(611, 0, 131, 4, 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(612, 0, 131, 6, 1, '2025-06-10 11:35:53', '2025-06-10 11:35:53'),
(613, 0, 132, 1, 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(614, 0, 132, 2, 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(615, 0, 132, 3, 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(616, 0, 132, 4, 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(617, 0, 132, 6, 1, '2025-06-10 14:54:46', '2025-06-10 14:54:46'),
(618, 0, 133, 1, 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(619, 0, 133, 2, 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(620, 0, 133, 3, 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(621, 0, 133, 4, 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(622, 0, 133, 6, 1, '2025-06-10 15:02:20', '2025-06-10 15:02:20'),
(623, 0, 134, 1, 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(624, 0, 134, 2, 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(625, 0, 134, 3, 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(626, 0, 134, 4, 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(627, 0, 134, 6, 1, '2025-06-10 15:02:25', '2025-06-10 15:02:25'),
(628, 0, 135, 1, 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(629, 0, 135, 2, 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(630, 0, 135, 3, 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(631, 0, 135, 4, 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(632, 0, 135, 6, 1, '2025-06-10 15:02:32', '2025-06-10 15:02:32'),
(633, 0, 136, 1, 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(634, 0, 136, 2, 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(635, 0, 136, 3, 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(636, 0, 136, 4, 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(637, 0, 136, 6, 1, '2025-06-10 15:02:39', '2025-06-10 15:02:39'),
(638, 0, 137, 1, 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(639, 0, 137, 2, 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(640, 0, 137, 3, 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(641, 0, 137, 4, 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(642, 0, 137, 6, 1, '2025-06-11 09:12:59', '2025-06-11 09:12:59'),
(643, 0, 138, 1, 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(644, 0, 138, 2, 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(645, 0, 138, 3, 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(646, 0, 138, 4, 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(647, 0, 138, 6, 1, '2025-06-11 09:13:11', '2025-06-11 09:13:11'),
(648, 0, 139, 1, 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(649, 0, 139, 2, 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(650, 0, 139, 3, 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(651, 0, 139, 4, 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(652, 0, 139, 6, 1, '2025-06-12 15:08:06', '2025-06-12 15:08:06'),
(653, 0, 140, 1, 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(654, 0, 140, 2, 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(655, 0, 140, 3, 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(656, 0, 140, 4, 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(657, 0, 140, 6, 1, '2025-06-12 15:15:28', '2025-06-12 15:15:28'),
(658, 0, 141, 1, 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(659, 0, 141, 2, 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(660, 0, 141, 3, 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(661, 0, 141, 4, 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(662, 0, 141, 6, 1, '2025-06-12 15:23:25', '2025-06-12 15:23:25'),
(663, 0, 142, 1, 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(664, 0, 142, 2, 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(665, 0, 142, 3, 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(666, 0, 142, 4, 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(667, 0, 142, 6, 1, '2025-06-12 15:24:52', '2025-06-12 15:24:52'),
(668, 0, 143, 1, 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(669, 0, 143, 2, 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(670, 0, 143, 3, 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(671, 0, 143, 4, 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(672, 0, 143, 6, 1, '2025-06-12 15:25:59', '2025-06-12 15:25:59'),
(673, 0, 144, 1, 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(674, 0, 144, 2, 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(675, 0, 144, 3, 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(676, 0, 144, 4, 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(677, 0, 144, 6, 1, '2025-06-12 20:45:00', '2025-06-12 20:45:00'),
(678, 0, 145, 1, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(679, 0, 145, 2, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(680, 0, 145, 3, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(681, 0, 145, 4, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(682, 0, 145, 6, 1, '2025-06-12 21:01:31', '2025-06-12 21:01:31'),
(683, 0, 146, 1, 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(684, 0, 146, 2, 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(685, 0, 146, 3, 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(686, 0, 146, 4, 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(687, 0, 146, 6, 1, '2025-06-13 08:26:00', '2025-06-13 08:26:00'),
(688, 0, 147, 1, 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(689, 0, 147, 2, 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(690, 0, 147, 3, 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(691, 0, 147, 4, 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(692, 0, 147, 6, 1, '2025-06-13 08:35:55', '2025-06-13 08:35:55'),
(693, 0, 148, 1, 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(694, 0, 148, 2, 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(695, 0, 148, 3, 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(696, 0, 148, 4, 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(697, 0, 148, 6, 1, '2025-06-13 08:36:16', '2025-06-13 08:36:16'),
(698, 0, 149, 1, 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(699, 0, 149, 2, 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(700, 0, 149, 3, 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(701, 0, 149, 4, 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(702, 0, 149, 6, 1, '2025-06-13 09:03:56', '2025-06-13 09:03:56'),
(703, 0, 150, 1, 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(704, 0, 150, 2, 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(705, 0, 150, 3, 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(706, 0, 150, 4, 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(707, 0, 150, 6, 1, '2025-06-13 09:06:36', '2025-06-13 09:06:36'),
(708, 0, 151, 1, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(709, 0, 151, 2, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(710, 0, 151, 3, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(711, 0, 151, 4, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(712, 0, 151, 6, 1, '2025-06-13 09:07:12', '2025-06-13 09:07:12'),
(713, 0, 152, 1, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(714, 0, 152, 2, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(715, 0, 152, 3, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(716, 0, 152, 4, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(717, 0, 152, 6, 1, '2025-06-13 09:17:52', '2025-06-13 09:17:52'),
(718, 0, 153, 1, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(719, 0, 153, 2, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(720, 0, 153, 3, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(721, 0, 153, 4, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(722, 0, 153, 6, 1, '2025-06-13 09:18:05', '2025-06-13 09:18:05'),
(723, 0, 154, 1, 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(724, 0, 154, 2, 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(725, 0, 154, 3, 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(726, 0, 154, 4, 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(727, 0, 154, 6, 1, '2025-06-13 09:18:27', '2025-06-13 09:18:27'),
(728, 0, 155, 1, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(729, 0, 155, 2, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(730, 0, 155, 3, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(731, 0, 155, 4, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(732, 0, 155, 6, 1, '2025-06-13 09:18:47', '2025-06-13 09:18:47'),
(733, 0, 156, 1, 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(734, 0, 156, 2, 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(735, 0, 156, 3, 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(736, 0, 156, 4, 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(737, 0, 156, 6, 1, '2025-06-13 09:19:01', '2025-06-13 09:19:01'),
(738, 0, 157, 1, 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(739, 0, 157, 2, 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(740, 0, 157, 3, 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(741, 0, 157, 4, 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(742, 0, 157, 6, 1, '2025-06-13 09:19:19', '2025-06-13 09:19:19'),
(743, 0, 158, 1, 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(744, 0, 158, 2, 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(745, 0, 158, 3, 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(746, 0, 158, 4, 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(747, 0, 158, 6, 1, '2025-06-13 09:19:41', '2025-06-13 09:19:41'),
(748, 0, 159, 1, 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(749, 0, 159, 2, 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(750, 0, 159, 3, 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(751, 0, 159, 4, 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(752, 0, 159, 6, 1, '2025-06-13 09:20:08', '2025-06-13 09:20:08'),
(753, 0, 160, 1, 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(754, 0, 160, 2, 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(755, 0, 160, 3, 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(756, 0, 160, 4, 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(757, 0, 160, 6, 1, '2025-06-13 09:22:19', '2025-06-13 09:22:19'),
(758, 0, 161, 1, 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(759, 0, 161, 2, 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(760, 0, 161, 3, 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(761, 0, 161, 4, 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(762, 0, 161, 6, 1, '2025-06-13 09:22:39', '2025-06-13 09:22:39'),
(763, 0, 162, 1, 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(764, 0, 162, 2, 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(765, 0, 162, 3, 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(766, 0, 162, 4, 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(767, 0, 162, 6, 1, '2025-06-13 09:23:11', '2025-06-13 09:23:11'),
(768, 0, 163, 1, 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(769, 0, 163, 2, 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(770, 0, 163, 3, 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(771, 0, 163, 4, 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(772, 0, 163, 6, 1, '2025-06-13 09:23:33', '2025-06-13 09:23:33'),
(773, 0, 164, 1, 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(774, 0, 164, 2, 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(775, 0, 164, 3, 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(776, 0, 164, 4, 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(777, 0, 164, 6, 1, '2025-06-13 09:23:51', '2025-06-13 09:23:51'),
(778, 0, 165, 1, 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(779, 0, 165, 2, 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(780, 0, 165, 3, 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(781, 0, 165, 4, 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(782, 0, 165, 6, 1, '2025-06-13 09:24:38', '2025-06-13 09:24:38'),
(783, 0, 166, 1, 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(784, 0, 166, 2, 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(785, 0, 166, 3, 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(786, 0, 166, 4, 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(787, 0, 166, 6, 1, '2025-06-13 09:25:16', '2025-06-13 09:25:16'),
(788, 0, 167, 1, 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(789, 0, 167, 2, 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(790, 0, 167, 3, 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(791, 0, 167, 4, 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(792, 0, 167, 6, 1, '2025-06-13 09:27:18', '2025-06-13 09:27:18'),
(793, 0, 168, 1, 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(794, 0, 168, 2, 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(795, 0, 168, 3, 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(796, 0, 168, 4, 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(797, 0, 168, 6, 1, '2025-06-13 09:28:09', '2025-06-13 09:28:09'),
(798, 0, 169, 1, 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(799, 0, 169, 2, 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(800, 0, 169, 3, 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(801, 0, 169, 4, 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(802, 0, 169, 6, 1, '2025-06-13 09:29:35', '2025-06-13 09:29:35'),
(803, 0, 170, 1, 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04'),
(804, 0, 170, 2, 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04'),
(805, 0, 170, 3, 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04');
INSERT INTO `read_notifs` (`id`, `read`, `id_notif`, `id_user`, `id_sender`, `created_at`, `updated_at`) VALUES
(806, 0, 170, 4, 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04'),
(807, 0, 170, 6, 1, '2025-06-13 09:53:04', '2025-06-13 09:53:04'),
(808, 0, 171, 1, 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(809, 0, 171, 2, 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(810, 0, 171, 3, 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(811, 0, 171, 4, 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(812, 0, 171, 6, 1, '2025-06-13 09:54:00', '2025-06-13 09:54:00'),
(813, 0, 172, 1, 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(814, 0, 172, 2, 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(815, 0, 172, 3, 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(816, 0, 172, 4, 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(817, 0, 172, 6, 1, '2025-06-13 09:58:41', '2025-06-13 09:58:41'),
(818, 0, 173, 1, 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(819, 0, 173, 2, 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(820, 0, 173, 3, 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(821, 0, 173, 4, 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(822, 0, 173, 6, 1, '2025-06-13 09:58:59', '2025-06-13 09:58:59'),
(823, 0, 174, 1, 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(824, 0, 174, 2, 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(825, 0, 174, 3, 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(826, 0, 174, 4, 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(827, 0, 174, 6, 1, '2025-06-13 09:59:36', '2025-06-13 09:59:36'),
(828, 0, 175, 1, 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(829, 0, 175, 2, 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(830, 0, 175, 3, 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(831, 0, 175, 4, 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(832, 0, 175, 6, 1, '2025-06-13 09:59:59', '2025-06-13 09:59:59'),
(833, 0, 176, 1, 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(834, 0, 176, 2, 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(835, 0, 176, 3, 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(836, 0, 176, 4, 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(837, 0, 176, 6, 1, '2025-06-13 10:00:13', '2025-06-13 10:00:13'),
(838, 0, 177, 1, 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(839, 0, 177, 2, 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(840, 0, 177, 3, 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(841, 0, 177, 4, 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(842, 0, 177, 6, 1, '2025-06-13 10:02:29', '2025-06-13 10:02:29'),
(843, 0, 178, 1, 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(844, 0, 178, 2, 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(845, 0, 178, 3, 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(846, 0, 178, 4, 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(847, 0, 178, 6, 1, '2025-06-13 10:02:48', '2025-06-13 10:02:48'),
(848, 0, 179, 1, 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(849, 0, 179, 2, 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(850, 0, 179, 3, 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(851, 0, 179, 4, 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(852, 0, 179, 6, 1, '2025-06-13 10:02:55', '2025-06-13 10:02:55'),
(853, 0, 180, 1, 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(854, 0, 180, 2, 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(855, 0, 180, 3, 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(856, 0, 180, 4, 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(857, 0, 180, 6, 1, '2025-06-13 10:03:17', '2025-06-13 10:03:17'),
(858, 0, 181, 1, 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(859, 0, 181, 2, 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(860, 0, 181, 3, 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(861, 0, 181, 4, 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(862, 0, 181, 6, 1, '2025-06-13 10:03:36', '2025-06-13 10:03:36'),
(863, 0, 182, 1, 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(864, 0, 182, 2, 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(865, 0, 182, 3, 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(866, 0, 182, 4, 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(867, 0, 182, 6, 1, '2025-06-13 10:04:15', '2025-06-13 10:04:15'),
(868, 0, 183, 1, 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(869, 0, 183, 2, 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(870, 0, 183, 3, 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(871, 0, 183, 4, 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(872, 0, 183, 6, 1, '2025-06-13 13:07:07', '2025-06-13 13:07:07'),
(873, 0, 184, 1, 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(874, 0, 184, 2, 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(875, 0, 184, 3, 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(876, 0, 184, 4, 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(877, 0, 184, 6, 1, '2025-06-13 13:12:43', '2025-06-13 13:12:43'),
(878, 0, 185, 1, 1, '2025-06-24 08:55:56', '2025-06-24 08:55:56'),
(879, 0, 185, 2, 1, '2025-06-24 08:55:57', '2025-06-24 08:55:57'),
(880, 0, 185, 3, 1, '2025-06-24 08:55:57', '2025-06-24 08:55:57'),
(881, 0, 185, 4, 1, '2025-06-24 08:55:57', '2025-06-24 08:55:57'),
(882, 0, 185, 6, 1, '2025-06-24 08:55:57', '2025-06-24 08:55:57'),
(883, 0, 186, 1, 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(884, 0, 186, 2, 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(885, 0, 186, 3, 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(886, 0, 186, 4, 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(887, 0, 186, 6, 1, '2025-06-24 12:38:55', '2025-06-24 12:38:55'),
(888, 0, 187, 1, 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(889, 0, 187, 2, 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(890, 0, 187, 3, 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(891, 0, 187, 4, 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(892, 0, 187, 6, 1, '2025-06-24 12:40:32', '2025-06-24 12:40:32'),
(893, 0, 188, 1, 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(894, 0, 188, 2, 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(895, 0, 188, 3, 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(896, 0, 188, 4, 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(897, 0, 188, 6, 1, '2025-06-24 13:06:45', '2025-06-24 13:06:45'),
(898, 0, 189, 1, 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(899, 0, 189, 2, 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(900, 0, 189, 3, 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(901, 0, 189, 4, 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(902, 0, 189, 6, 1, '2025-06-24 13:07:03', '2025-06-24 13:07:03'),
(903, 0, 190, 1, 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(904, 0, 190, 2, 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(905, 0, 190, 3, 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(906, 0, 190, 4, 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(907, 0, 190, 6, 1, '2025-06-24 13:07:13', '2025-06-24 13:07:13'),
(908, 0, 191, 1, 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(909, 0, 191, 2, 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(910, 0, 191, 3, 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(911, 0, 191, 4, 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(912, 0, 191, 6, 1, '2025-06-24 13:07:22', '2025-06-24 13:07:22'),
(913, 0, 192, 1, 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(914, 0, 192, 2, 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(915, 0, 192, 3, 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(916, 0, 192, 4, 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(917, 0, 192, 6, 1, '2025-06-24 13:07:34', '2025-06-24 13:07:34'),
(918, 0, 193, 1, 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(919, 0, 193, 2, 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(920, 0, 193, 3, 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(921, 0, 193, 4, 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(922, 0, 193, 6, 1, '2025-06-24 13:07:47', '2025-06-24 13:07:47'),
(923, 0, 194, 1, 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(924, 0, 194, 2, 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(925, 0, 194, 3, 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(926, 0, 194, 4, 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(927, 0, 194, 6, 1, '2025-06-24 13:15:05', '2025-06-24 13:15:05'),
(928, 0, 195, 1, 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(929, 0, 195, 2, 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(930, 0, 195, 3, 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(931, 0, 195, 4, 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(932, 0, 195, 6, 2, '2025-06-24 13:16:31', '2025-06-24 13:16:31'),
(933, 0, 196, 1, 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42'),
(934, 0, 196, 2, 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42'),
(935, 0, 196, 3, 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42'),
(936, 0, 196, 4, 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42'),
(937, 0, 196, 6, 2, '2025-06-24 13:16:42', '2025-06-24 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2025-05-22 12:40:04', '2025-05-22 12:40:04'),
(2, 'admin', '2025-05-22 12:40:04', '2025-05-22 12:40:04'),
(3, 'user', '2025-05-22 12:40:34', '2025-05-22 12:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `site_id`, `created_at`, `updated_at`) VALUES
(1, 'Salle A', 'Rez-de-chaussée', 11, '2025-05-29 12:33:37', '2025-05-29 12:36:09'),
(2, 'Salle B', '1er étage', 11, '2025-05-29 13:03:53', '2025-05-29 13:03:53'),
(6, 'Salle C', 'Sous-sol', 11, '2025-05-29 13:35:54', '2025-05-29 13:35:54'),
(7, 'Salle A', 'Rez-de-chaussée', 9, '2025-05-29 13:36:46', '2025-05-29 13:36:46'),
(8, 'Salle B', '1er étage', 9, '2025-05-29 13:36:56', '2025-05-29 13:36:56'),
(9, 'Salle C', '2eme étage', 9, '2025-06-04 07:12:23', '2025-06-04 07:12:23'),
(15, 'Salle Aj', 'Sous-sol', 10, '2025-06-24 13:06:45', '2025-06-24 13:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cW9w70idmn5fkPvirm6N19WYIZEckxFtJK6lAAT8', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFRHRWlmc2czVFlINjBIODRqZUVjWWZiU2tLTXhWNFFNdDhmM2d1TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755100002),
('XAqock63FKmDYLY0ORsTlHE4FIEyGDm5t2Ul0tSC', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic2VEUzlBcXR5NG9oVGFnM1pzNTJzc2M1NHZEVmJzdTFhUUVwV2JmOSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo5OiJhcHBsb2NhbGUiO3M6MjoiZnIiO30=', 1750861395);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(9, 'Kinshasa', 'Kinshasa-Gombe', '2025-05-25 10:07:03', '2025-05-25 10:08:04'),
(10, 'Lubumbashi', 'Katanga-Kolwezi', '2025-05-25 10:07:31', '2025-05-26 18:27:51'),
(11, 'Matadi', 'Kongo-Central', '2025-05-25 10:07:50', '2025-05-27 09:30:53'),
(13, 'Nairobi', 'dee', '2025-06-04 07:11:52', '2025-06-04 07:11:52');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Horly Andelo', 'andmatboy@gmail.com', NULL, '$2y$12$N2hd.R.2.rLKMQZ/d2IWRufMgDG8bP6SAzKwg2CmNTVti0m7xWdAi', NULL, NULL, NULL, NULL, '2025-05-22 17:25:12', '2025-05-28 12:22:25', 1),
(2, 'Mata Horly', 'horlyandelomata@gmail.com', NULL, '$2y$12$3m65Ic63lSvVHJMolkVH7OHF3VAJIzKCJcerWK1IdincWiO3u8Ldi', NULL, NULL, NULL, NULL, '2025-05-22 17:26:30', '2025-05-22 17:26:30', 2),
(3, 'Mat Boy', 'matboy@gmail.com', NULL, '$2y$12$nvAlz5sGkfajReFduVQuiOgqlBAbvWtM8SAMyXgvOACqmXQDt46OG', NULL, NULL, NULL, NULL, '2025-05-22 17:29:14', '2025-05-28 09:27:25', 3),
(4, 'Test USER', 'test@gmail.com', NULL, '$2y$12$SUDzNF2E8r/8XMGyspVmy.fXT4JJMYsDt.hRZ5Y8pYhczAUPYBAVS', NULL, NULL, NULL, NULL, '2025-05-27 12:50:07', '2025-05-27 12:50:07', 3),
(6, 'Test admin', 'testadmin@gmail.com', NULL, '$2y$12$OPYOrfeWHsT3oYqXqM609OAzmoHBhEo9F2DOvYfa2kl2.4mzCxi0e', NULL, NULL, NULL, NULL, '2025-05-28 09:22:01', '2025-05-28 09:22:01', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armoires`
--
ALTER TABLE `armoires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `armoires_id_room_index` (`room_id`);

--
-- Indexes for table `boites`
--
ALTER TABLE `boites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boites_id_etagere_index` (`etagere_id`);

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
-- Indexes for table `chemises`
--
ALTER TABLE `chemises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chemises_classeur_id_index` (`classeur_id`);

--
-- Indexes for table `classeurs`
--
ALTER TABLE `classeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classeurs_boite_id_index` (`boite_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_user_id_index` (`user_id`),
  ADD KEY `consultations_document_id_index` (`document_id`),
  ADD KEY `consultations_room_id_index` (`room_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_chemise_id_index` (`chemise_id`);

--
-- Indexes for table `etageres`
--
ALTER TABLE `etageres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etageres_id_armoire_index` (`armoire_id`);

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
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_id_user_index` (`id_user`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_id_user_index` (`id_user`);

--
-- Indexes for table `read_notifs`
--
ALTER TABLE `read_notifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `read_notifs_id_notif_index` (`id_notif`),
  ADD KEY `read_notifs_id_user_index` (`id_user`),
  ADD KEY `read_notifs_id_sender_index` (`id_sender`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_site_id_index` (`site_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armoires`
--
ALTER TABLE `armoires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `boites`
--
ALTER TABLE `boites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chemises`
--
ALTER TABLE `chemises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classeurs`
--
ALTER TABLE `classeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `etageres`
--
ALTER TABLE `etageres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `read_notifs`
--
ALTER TABLE `read_notifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=938;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armoires`
--
ALTER TABLE `armoires`
  ADD CONSTRAINT `armoires_id_room_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `boites`
--
ALTER TABLE `boites`
  ADD CONSTRAINT `boites_id_etagere_foreign` FOREIGN KEY (`etagere_id`) REFERENCES `etageres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chemises`
--
ALTER TABLE `chemises`
  ADD CONSTRAINT `chemises_classeur_id_foreign` FOREIGN KEY (`classeur_id`) REFERENCES `classeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classeurs`
--
ALTER TABLE `classeurs`
  ADD CONSTRAINT `classeurs_boite_id_foreign` FOREIGN KEY (`boite_id`) REFERENCES `boites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_chemise_id_foreign` FOREIGN KEY (`chemise_id`) REFERENCES `chemises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etageres`
--
ALTER TABLE `etageres`
  ADD CONSTRAINT `etageres_id_armoire_foreign` FOREIGN KEY (`armoire_id`) REFERENCES `armoires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `read_notifs`
--
ALTER TABLE `read_notifs`
  ADD CONSTRAINT `read_notifs_id_notif_foreign` FOREIGN KEY (`id_notif`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `read_notifs_id_sender_foreign` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `read_notifs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
