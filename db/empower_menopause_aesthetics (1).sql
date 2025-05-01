-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 02:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empower_menopause_aesthetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_our_clients`
--

CREATE TABLE `about_our_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<h2>\r\n        Lorem Ipsum&nbsp;is simply dummy text of the printing</h2>\r\n        <p>\r\n        Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n        industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type\r\n        and scrambled it to make a type specimen book. It has survived not only five centuries, but also\r\n        the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the\r\n        1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with\r\n        desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n        </p>\r\n        <div class=\"list\">\r\n        <div>\r\n          <ul>\r\n          <li><i class=\"fa-solid fa-circle-check\"></i> weight management</li>\r\n          <li><i class=\"fa-solid fa-circle-check\"></i> wellness solutions</li>\r\n          </ul>\r\n        </div>\r\n        <div>\r\n          <ul>\r\n          <li><i class=\"fa-solid fa-circle-check\"></i> hormone therapy</li>\r\n          <li><i class=\"fa-solid fa-circle-check\"></i> skincare</li>\r\n          </ul>\r\n        </div>\r\n        </div>', '1744836249_about.webp', '2025-04-16 15:43:13', '2025-04-23 12:09:53'),
(2, 'About Me 123123v554t34', '<h2>Company Director and Registered Nurse mmlnlh234234</h2>\r\n        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n        industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type\r\n        and scrambled it to make a type specimen book. It has survived not only five centuries, but also\r\n        the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered\r\n        alteration in some form, by injected humour, or randomised words which don\'t look even slightly\r\n        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t\r\n        anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet\r\n        tend to repeat predefined chunks as necessary, making this the first true generator on the\r\n        Internet. It uses a dictionary of over 200 Latin words</p>', '1744840194_about.webp', '2025-04-16 16:49:54', '2025-04-23 12:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_stats`
--

CREATE TABLE `about_us_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stats_icon` varchar(255) DEFAULT NULL,
  `stats_title` varchar(255) DEFAULT NULL,
  `stats_value` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '$2y$10$DlnhX/WZgqvXWyguqxB/m.Op.JnPajok.1qmFIzfv85yksiKO8O/G', 0, '1741981114_uifaces12.jpg', NULL, '2025-03-13 18:18:00', '2025-03-14 14:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `greeting` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `banner_description` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `link_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page`, `greeting`, `site_name`, `banner`, `banner_description`, `banner_link`, `link_text`, `created_at`, `updated_at`) VALUES
(2, 'about_us', 'Welcome to EMA', 'About', '1744833433.png', 'Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.', NULL, NULL, '2025-04-16 14:57:13', '2025-04-23 12:35:55'),
(4, 'service', 'Welcome to EMA', 'Services', '1744846710.png', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n               industry\'s standard dummy text ever since the 1500s,</p>', NULL, NULL, '2025-04-16 18:32:54', '2025-04-16 18:38:30'),
(6, 'faqs', 'Welcome to EMA', 'FAQs', '1744912363.png', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n               industry\'s standard dummy text ever since the 1500s,</p>\r\n            <p></p>', NULL, NULL, '2025-04-17 12:52:43', '2025-04-23 12:36:07'),
(8, 'contact', 'Welcome to EMA', 'Contact Us', '1744921339.png', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n               industry\'s standard dummy text ever since the 1500s,</p>\r\n            <p></p>', NULL, NULL, '2025-04-17 15:22:19', '2025-04-17 15:22:19'),
(10, 'product', 'Welcome to EMA', 'Products', '1745019948.png', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n                        industry\'s standard dummy text ever since the 1500s,</p>', NULL, NULL, '2025-04-18 18:43:51', '2025-04-18 18:45:48'),
(12, 'home', 'Welcome to EMA', 'Empowering Women                Through Menopause                Aesthetics & Beyond', '1744824770.png', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n                        industry\'s standard dummy text ever since the 1500s,</p>', NULL, NULL, '2025-04-18 18:43:51', '2025-04-18 18:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 2, '2025-04-30 18:53:45', '2025-04-30 18:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 8, 7, 3, '2025-04-30 18:53:45', '2025-04-30 18:54:58'),
(6, 8, 1, 2, '2025-04-30 18:55:56', '2025-04-30 18:56:00'),
(7, 8, 6, 4, '2025-04-30 18:56:56', '2025-04-30 18:57:07'),
(8, 8, 2, 3, '2025-04-30 19:14:56', '2025-04-30 19:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'abc', '2025-04-18 14:55:24', '2025-04-18 14:55:24'),
(3, 'IJK Updated', 'ijk-updated', '2025-04-18 14:59:41', '2025-04-18 15:08:39'),
(4, 'New category', 'new-category', '2025-04-18 15:10:35', '2025-04-18 15:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Iris Myers', 'irismyers@user.com', '1234232343', 'This is testing Message', 1, '2025-04-17 16:44:54', '2025-04-17 16:44:54');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'What are \'Wrinkle Relaxation Injections\'?', 'Essentially, this product is a naturally occurring protein extract and is generally well-tolerated\r\n                   in the minute levels administered for cosmetic use. The protein relaxes wrinkle-causing muscles\r\n                   creating a refreshed look. The active ingredient is derived from bacteria in sterile laboratory\r\n                   conditions and is a prescription-only medication. The treatments usually take between 15-45 minutes\r\n                   depending on the treatment requested. An initial consultation is required to assess suitability for\r\n                   the medication.', 1, '2025-04-17 13:59:11', '2025-04-17 13:59:11'),
(3, 'How does it work?', 'Essentially, this product is a naturally occurring protein extract and is generally well-tolerated\r\n                   in the minute levels administered for cosmetic use. The protein relaxes wrinkle-causing muscles\r\n                   creating a refreshed look. The active ingredient is derived from bacteria in sterile laboratory\r\n                   conditions and is a prescription-only medication. The treatments usually take between 15-45 minutes\r\n                   depending on the treatment requested. An initial consultation is required to assess suitability for\r\n                   the medication.', 1, '2025-04-17 13:59:53', '2025-04-17 13:59:53'),
(4, 'When are results seen?', 'Essentially, this product is a naturally occurring protein extract and is generally well-tolerated\r\n                   in the minute levels administered for cosmetic use. The protein relaxes wrinkle-causing muscles\r\n                   creating a refreshed look. The active ingredient is derived from bacteria in sterile laboratory\r\n                   conditions and is a prescription-only medication. The treatments usually take between 15-45 minutes\r\n                   depending on the treatment requested. An initial consultation is required to assess suitability for\r\n                   the medication.', 1, '2025-04-17 14:00:32', '2025-04-17 14:00:32'),
(5, 'Are There side effects?', 'Essentially, this product is a naturally occurring protein extract and is generally well-tolerated\r\n                   in the minute levels administered for cosmetic use. The protein relaxes wrinkle-causing muscles\r\n                   creating a refreshed look. The active ingredient is derived from bacteria in sterile laboratory\r\n                   conditions and is a prescription-only medication. The treatments usually take between 15-45 minutes\r\n                   depending on the treatment requested. An initial consultation is required to assess suitability for\r\n                   the medication.', 1, '2025-04-17 14:00:59', '2025-04-17 14:00:59'),
(6, 'How long will the effect last?', 'Essentially, this product is a naturally occurring protein extract and is generally well-tolerated\r\n                   in the minute levels administered for cosmetic use. The protein relaxes wrinkle-causing muscles\r\n                   creating a refreshed look. The active ingredient is derived from bacteria in sterile laboratory\r\n                   conditions and is a prescription-only medication. The treatments usually take between 15-45 minutes\r\n                   depending on the treatment requested. An initial consultation is required to assess suitability for\r\n                   the medication.', 1, '2025-04-17 14:01:49', '2025-04-17 14:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `greeting` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL COMMENT 'slider image',
  `banner_description` text DEFAULT NULL,
  `banner_link` text DEFAULT NULL,
  `link_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `greeting`, `site_name`, `banner`, `banner_description`, `banner_link`, `link_text`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to EMA', 'Empowering Women                Through Menopause                Aesthetics & Beyond', '1744824770.png', '<p>Personalized hormone therapy, aesthetic treatments, and wellness solutions for a confident you.</p>', NULL, NULL, '2025-03-18 16:26:30', '2025-04-18 14:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `home_featureds`
--

CREATE TABLE `home_featureds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_featureds`
--

INSERT INTO `home_featureds` (`id`, `title`, `description`, `image`, `icon`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Autem ut officia dol', 'Commodi eum eligendi.', NULL, 'In molestiae anim de', 'autem-ut-officia-dol', '1', '2025-03-19 13:14:57', '2025-03-20 16:26:49'),
(3, 'Delectus, aliqua Ni. sdd_we', 'Quidem eveniet, ex a.', NULL, '<i class=\"bi bi-bounding-box-circles icon\"></i>', 'delectus-aliqua-ni-sdd-we', '1', '2025-03-19 13:53:47', '2025-03-19 13:53:47'),
(4, 'THis the Title', '<p data-start=\"0\" data-end=\"90\">Here’s a list of common <strong data-start=\"24\" data-end=\"42\">MySQL keywords</strong> you’ll come across when working with databases:</p>\r\n<h3 data-start=\"92\" data-end=\"114\"></h3>', NULL, '<i class=\"bi bi-calendar4-week icon\"></i>', 'this-the-title', '1', '2025-03-19 14:44:53', '2025-03-19 14:44:53'),
(5, 'Repellendus Laudant', 'Sed sed necessitatib.', NULL, 'Cum maiores eaque la', 'repellendus-laudant', '1', '2025-03-19 15:28:07', '2025-03-19 15:28:07');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_13_203018_create_admins_table', 1),
(6, '2025_03_17_194956_create_site_contents_table', 2),
(7, '2025_03_17_211038_create_social_links_table', 3),
(8, '2025_03_18_171728_create_homes_table', 4),
(9, '2025_03_18_185433_create_home_featureds_table', 4),
(10, '2025_03_19_210222_create_about_us_table', 5),
(11, '2025_03_19_211945_create_about_us_stats_table', 5),
(12, '2025_03_19_212426_create_about_our_clients_table', 5),
(13, '2025_03_20_192047_create_services_table', 6),
(14, '2025_03_20_214305_create_categories_table', 7),
(15, '2025_03_20_214316_create_products_table', 7),
(16, '2025_04_16_192715_create_banners_table', 8),
(17, '2025_04_17_004115_create_f_a_q_s_table', 9),
(18, '2025_04_17_192619_create_contact_us_table', 10),
(20, '2025_04_17_220514_create_testimonials_table', 11),
(21, '2025_04_22_165433_create_news_latter_emails_table', 12),
(22, '2025_04_29_220629_add_new_col_to_users_table', 13),
(23, '2025_04_29_222824_create_carts_table', 13),
(24, '2025_04_29_223642_create_cart_items_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `news_latter_emails`
--

CREATE TABLE `news_latter_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribtion_status` tinyint(1) NOT NULL DEFAULT 1,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_latter_emails`
--

INSERT INTO `news_latter_emails` (`id`, `email`, `subscribtion_status`, `subscribed_at`, `unsubscribed_at`, `created_at`, `updated_at`) VALUES
(2, 'saramawut@mailinator.com', 1, '2025-04-22 12:18:32', NULL, '2025-04-22 12:18:32', '2025-04-22 12:18:32'),
(3, 'test@test.com', 1, '2025-04-22 12:18:48', NULL, '2025-04-22 12:18:48', '2025-04-22 12:18:48'),
(4, 'admin@admin.com', 1, '2025-04-24 15:01:28', NULL, '2025-04-24 15:01:28', '2025-04-24 15:01:28');

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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `discount_percentage` decimal(10,0) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `offer_text` text DEFAULT NULL,
  `rating` varchar(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `stock`, `discount_percentage`, `image`, `status`, `offer_text`, `rating`, `featured`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uma Talley Updated', 391.00, NULL, 10, 34, '1745358705_Aesthetic-Services-2.jpg', 1, NULL, '4', 0, 'uma-talley-updated', '2025-04-18 16:24:43', '2025-04-30 18:56:00'),
(2, 4, 'Malcolm Garrett', 314.00, '<p><br></p>', 39, 5, '1745012531_product.jpg', 1, 'Special Edition', '4', 0, 'malcolm-garrett', '2025-04-18 16:42:11', '2025-04-30 19:15:19'),
(4, 4, 'Fleur Jarvis', 655.00, '<p><br></p>', 82, 44, '1745018149_services-img-1.png', 1, 'New Offer', '1', 0, 'fleur-jarvis', '2025-04-18 18:06:27', '2025-04-18 18:15:49'),
(5, 1, 'Shelly Garcia', 104.00, '<p><br></p>', 85, 26, '1745017939_product.webp', 1, 'Culpa magna id est i', '2', 0, 'shelly-garcia', '2025-04-18 18:12:19', '2025-04-18 18:18:48'),
(6, 1, 'Rylee Horne', 827.00, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words by Cicero</span></p>', 18, 48, '1745018982_product-dummy.jpg', 1, 'Culpa possimus quae', '5', 0, 'rylee-horne', '2025-04-18 18:16:17', '2025-04-30 18:57:07'),
(7, 3, 'Pandora Lara', 953.00, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero.</span></p>', 5, 0, '1746050808_product.jpg', 1, 'Ea laboris incidunt', '1', 0, 'pandora-lara', '2025-04-30 17:06:48', '2025-04-30 18:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `icon`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Counselling Services', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1744847672_image.jpg', NULL, 'counselling-services', '1', '2025-04-16 18:54:32', '2025-04-24 14:54:59'),
(2, 'Aesthetic Services', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1745356583_image.png', NULL, 'aesthetic-services', '1', '2025-04-16 19:00:36', '2025-04-24 14:55:13'),
(3, 'Educational Program', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '1744848131_image.webp', NULL, 'educational-program', '1', '2025-04-16 19:02:11', '2025-04-24 14:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `site_contents`
--

CREATE TABLE `site_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `consultation` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contents`
--

INSERT INTO `site_contents` (`id`, `logo`, `footer_logo`, `email`, `phone`, `address`, `copyright`, `consultation`, `footer_text`, `created_at`, `updated_at`) VALUES
(1, '20250416161718_logo (1)-Photoroom.png', '20250416164828_footer-logo.webp', 'info@empowermenopause.com.au', '0466 824 777', 'Dummy address, Beach road, 33441, abc.', 'All Rights Resrved', 'Schedule an Appointment Consultation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2025-03-17 15:18:26', '2025-04-18 14:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `instagram`, `linkedin`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/Author.Melissa.Howcroft', 'https://www.instagram.com/accounts/login/?next=%2Fmelissahowcroft1%2F&source=omni_redirect', 'https://www.linkedin.com/authwall?trk=bf&trkInfo=AQEwjzG5ponOQwAAAZY2FgFwbWjDk8D17dgjtfANjw9lawtWztVfeCmc3zwWzk-88OOUg0z9or8ahNOCDVjiT-5bnr2iyh6JuOInP-qSI7Uk1F4_ndBDB-wwtx5wgsI0QJkGCKg=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F106848055%2Fadmin%2Fdashboard%2F', 'https://x.com/?lang=en', '2025-03-17 16:15:12', '2025-04-25 17:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `post_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `type`, `name`, `image`, `feedback`, `rating`, `status`, `post_date`, `created_at`, `updated_at`) VALUES
(2, 'patient', 'Erric', '1744934042_image.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt\r\n                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in\r\n                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3', '1', '2024-06-04', '2025-04-17 18:54:02', '2025-04-18 12:12:50'),
(3, 'doctor', 'Roth Mendez', '1744996437_image.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt\r\n                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in\r\n                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5', '1', '2025-05-12', '2025-04-18 12:13:57', '2025-04-18 12:13:57'),
(4, 'consultant', 'Shelly Savage', '1744996526_image.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt\r\n                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in\r\n                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2', '1', '2025-05-16', '2025-04-18 12:15:26', '2025-04-18 12:15:44'),
(5, 'patient', 'Gisela Walters', '1745359412_image.png', 'Incididunt numquam v wetrqwererwer', '2', '1', '1981-10-10', '2025-04-22 17:03:32', '2025-04-22 17:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('vendor','user') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `address`, `city`, `state`, `zip`, `country`, `status`, `image`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'user@example.com', '$2y$10$GWA8.sNYfY2BUmxlzZalKuKBXT0YmCwm0u4bjOezt9Yfw/pa75xk6', NULL, 'user', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2025-03-13 18:18:00', '2025-03-13 18:18:00'),
(2, 'Dylan Roach', 'rary@mailinator.com', '$2a$12$GS/N.HezrNJjeQ8oF1hPc.DYsfTwkWlEyyWSh5lf1h5JR189f1Xpy', NULL, 'user', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2025-04-29 18:58:15', '2025-04-29 18:58:15'),
(3, 'Joan Fry', 'kebywuka@mailinator.com', '$2y$10$24hOJ9VD.eBR/MsPOA3sV.Z9HRuLNgM6CFMaesg.shhC1xV7oAgzu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2025-04-29 19:08:01', '2025-04-29 19:08:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_our_clients`
--
ALTER TABLE `about_our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_stats`
--
ALTER TABLE `about_us_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_featureds`
--
ALTER TABLE `home_featureds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_latter_emails`
--
ALTER TABLE `news_latter_emails`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_contents`
--
ALTER TABLE `site_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_our_clients`
--
ALTER TABLE `about_our_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_us_stats`
--
ALTER TABLE `about_us_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_featureds`
--
ALTER TABLE `home_featureds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `news_latter_emails`
--
ALTER TABLE `news_latter_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_contents`
--
ALTER TABLE `site_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
