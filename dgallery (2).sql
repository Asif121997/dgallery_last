-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 08 2026 г., 11:16
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dgallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `row` enum('1','2','3') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `img`, `date`, `row`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, '1776695112_promo-1.jpg', NULL, '1', '2026-04-20 14:18:38', '2026-04-20 14:25:12', NULL),
(20, '1776696259_promo-2.jpg', NULL, '1', '2026-04-20 14:26:52', '2026-04-20 14:45:09', NULL),
(21, '1776774332_banner-5.jpg', NULL, '2', '2026-04-21 12:25:32', '2026-04-21 12:25:32', NULL),
(22, '1776774387_banner-6.jpg', NULL, '2', '2026-04-21 12:26:27', '2026-04-21 12:26:27', NULL),
(23, '1776775785_gallery-1.jpg', NULL, '3', '2026-04-21 12:49:45', '2026-04-21 12:50:42', NULL),
(24, '1776775824_gallery-2.jpg', NULL, '3', '2026-04-21 12:50:24', '2026-04-21 12:50:24', NULL),
(25, '1776775873_gallery-3.jpg', NULL, '3', '2026-04-21 12:51:13', '2026-04-21 12:51:13', NULL),
(26, '1776775904_gallery-4.jpg', NULL, '3', '2026-04-21 12:51:44', '2026-04-21 12:51:44', NULL),
(27, '1776775948_gallery-5.jpg', NULL, '3', '2026-04-21 12:52:28', '2026-04-21 12:52:28', NULL),
(28, '1776775981_gallery-6.jpg', NULL, '3', '2026-04-21 12:53:01', '2026-04-21 12:53:01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `banner_translations`
--

CREATE TABLE `banner_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `special_title` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `btn_text` longtext DEFAULT NULL,
  `btn_link` longtext DEFAULT NULL,
  `badge_text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `banner_translations`
--

INSERT INTO `banner_translations` (`id`, `banner_id`, `locale`, `name`, `special_title`, `text`, `btn_text`, `btn_link`, `badge_text`) VALUES
(41, 19, 'ar', 'Timeless Classics ar', 'Elegant designs that never go out of style, perfect for', '<p>Elegant designs that never go out of style, perfect forElegant designs that never go out of style, perfect forElegant designs that never go out of style, perfect for</p>', 'Shop Now', 'Shop Now', NULL),
(42, 19, 'en', 'Timeless Classics en', 'Elegant designs that never go out of style, perfect for', '<p>Elegant designs that never go out of style, perfect forElegant designs that never go out of style, perfect forElegant designs that never go out of style, perfect for</p>', 'Shop Now', 'Shop Now', NULL),
(43, 19, 'ru', 'Timeless Classics ru', 'Elegant designs that never go out of style, perfect for', '<p>Elegant designs that never go out of style, perfect forElegant designs that never go out of style, perfect for</p>', 'Shop Now', 'Shop Now', NULL),
(44, 20, 'ar', 'Modern Luxe', 'Chic and contemporary pieces for the trendsetters of today', '<p>Chic and contemporary pieces for the trendsetters of today</p>', 'SHOP NOW', 'SHOP NOW', NULL),
(45, 20, 'en', 'Modern Luxe', 'Chic and contemporary pieces for the trendsetters of today', '<p>Chic and contemporary pieces for the trendsetters of today</p>', 'SHOP NOW', 'SHOP NOW', NULL),
(46, 20, 'ru', 'Modern Luxe', 'Chic and contemporary pieces for the trendsetters of today', '<p>Chic and contemporary pieces for the trendsetters of today</p>', 'SHOP NOW', 'SHOP NOW', NULL),
(47, 21, 'ar', 'The Modern Bride Collection', 'Redefining bridal elegance with contemporary designs that radiate sophistication. Celebrate your big day with jewelry as unique as your love story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(48, 21, 'en', 'The Modern Bride Collection', 'Redefining bridal elegance with contemporary designs that radiate sophistication. Celebrate your big day with jewelry as unique as your love story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(49, 21, 'ru', 'The Modern Bride Collection', 'Redefining bridal elegance with contemporary designs that radiate sophistication. Celebrate your big day with jewelry as unique as your love story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(50, 22, 'ar', 'The Art of Stack Collection', 'Express your individuality with stackable rings, bracelets, and necklaces. Mix, match, and layer to create a style that\'s entirely your own.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(51, 22, 'en', 'The Art of Stack Collection', 'Express your individuality with stackable rings, bracelets, and necklaces. Mix, match, and layer to create a style that\'s entirely your own.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(52, 22, 'ru', 'The Art of Stack Collection', 'Express your individuality with stackable rings, bracelets, and necklaces. Mix, match, and layer to create a style that\'s entirely your own.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(53, 23, 'ar', 'Golden Glow Essentials', 'Discover jewelry that defines every moment.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(54, 23, 'en', 'Golden Glow Essentials', 'Discover jewelry that defines every moment.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(55, 23, 'ru', 'Golden Glow Essentials', 'Discover jewelry that defines every moment.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(56, 24, 'ar', 'Timeless Beauty Collection', 'Adorn yourself with elegance that lasts a lifetime.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(57, 24, 'en', 'Timeless Beauty Collection', 'Adorn yourself with elegance that lasts a lifetime.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(58, 24, 'ru', 'Timeless Beauty Collection', 'Adorn yourself with elegance that lasts a lifetime.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(59, 25, 'ar', 'Radiant Spark Jewelry', 'Jewelry that mirrors your inner brilliance.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(60, 25, 'en', 'Radiant Spark Jewelry', 'Jewelry that mirrors your inner brilliance.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(61, 25, 'ru', 'Radiant Spark Jewelry', 'Jewelry that mirrors your inner brilliance.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(62, 26, 'ar', 'Luxe Grace Designs', 'Celebrate life’s sparkle with every piece you wear.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(63, 26, 'en', 'Luxe Grace Designs', 'Celebrate life’s sparkle with every piece you wear.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(64, 26, 'ru', 'Luxe Grace Designs', 'Celebrate life’s sparkle with every piece you wear.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(65, 27, 'ar', 'Shine Within You', 'Designs that embrace beauty, forever.', NULL, NULL, NULL, NULL),
(66, 27, 'en', 'Shine Within You', 'Designs that embrace beauty, forever.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(67, 27, 'ru', 'Shine Within You', 'Designs that embrace beauty, forever.', NULL, NULL, NULL, NULL),
(68, 28, 'ar', 'Elegant Moments Only', 'Let every gem tell your story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(69, 28, 'en', 'Elegant Moments Only', 'Let every gem tell your story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL),
(70, 28, 'ru', 'Elegant Moments Only', 'Let every gem tell your story.', NULL, 'SHOP NOW', 'SHOP NOW', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(55) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` int(11) NOT NULL DEFAULT 0,
  `count` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `product_id`, `color_id`, `size_id`, `count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(310, 'DQ0675', 873, 12, 2, 4, NULL, '2026-04-28 17:52:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `product_category_id` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `show` bigint(20) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_tags_pivot`
--

CREATE TABLE `blog_tags_pivot` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL DEFAULT 0,
  `tag_id` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_text` longtext DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `home` enum('1','0') NOT NULL DEFAULT '0',
  `show_home` int(11) DEFAULT 0,
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `img`, `icon_image`, `parent_id`, `status`, `home`, `show_home`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(248, '1776696990_category-1.jpg', '1777102626_cls-16.jpg', NULL, '1', '1', 1, NULL, '2026-04-20 14:56:30', '2026-04-25 07:37:06', NULL),
(249, '1776697265_cls-19.jpg', '1777102618_cls-15.jpg', NULL, '1', '1', 1, NULL, '2026-04-20 15:01:05', '2026-04-25 07:36:58', NULL),
(250, '1776697315_category-4.jpg', '1777102609_cls-14.jpg', NULL, '1', '1', 1, NULL, '2026-04-20 15:01:55', '2026-04-25 07:36:49', NULL),
(251, '1776697354_cls-1.jpg', '1777102598_cls-13.jpg', NULL, '1', '1', 1, NULL, '2026-04-20 15:02:34', '2026-04-25 07:36:38', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `banner_text` varchar(255) DEFAULT NULL,
  `banner_discount_text` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `banner_text`, `banner_discount_text`, `slug`, `title`, `keywords`, `description`) VALUES
(721, 248, 'en', 'Rings', NULL, NULL, 'rings', NULL, NULL, NULL),
(722, 248, 'ru', 'Кольца', NULL, NULL, 'kolca', NULL, NULL, NULL),
(723, 248, 'ar', 'خواتم', NULL, NULL, 'khoatm', NULL, NULL, NULL),
(724, 249, 'en', 'Bracelets', NULL, NULL, 'bracelets', NULL, NULL, NULL),
(725, 249, 'ru', 'Браслеты', NULL, NULL, 'braslety', NULL, NULL, NULL),
(726, 249, 'ar', 'أساور', NULL, NULL, 'asaor', NULL, NULL, NULL),
(727, 250, 'en', 'Necklaces', NULL, NULL, 'necklaces', NULL, NULL, NULL),
(728, 250, 'ru', 'Ожерелья', NULL, NULL, 'ozerelia', NULL, NULL, NULL),
(729, 250, 'ar', 'القلائد', NULL, NULL, 'alklayd', NULL, NULL, NULL),
(730, 251, 'en', 'Earrings', NULL, NULL, 'earrings', NULL, NULL, NULL),
(731, 251, 'ru', 'Серьги', NULL, NULL, 'sergi', NULL, NULL, NULL),
(732, 251, 'ar', 'أقراط', NULL, NULL, 'akrat', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `img`, `color_code`, `created_at`, `updated_at`) VALUES
(12, '1777362116_pink.jpg', '#000000', '2026-04-21 11:53:17', '2026-04-28 07:41:56'),
(13, '1777362108_yellow.jpg', '#e7d513', '2026-04-21 11:56:41', '2026-04-28 07:41:48'),
(14, '1777362101_gray.jpg', '#000000', '2026-04-28 07:37:33', '2026-04-28 07:41:41');

-- --------------------------------------------------------

--
-- Структура таблицы `color_translations`
--

CREATE TABLE `color_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `color_translations`
--

INSERT INTO `color_translations` (`id`, `color_id`, `locale`, `name`, `slug`) VALUES
(34, 12, 'en', 'Sterling Silver', 'sterling-silver'),
(35, 12, 'ru', 'Sterling Silver', 'sterling-silver'),
(36, 12, 'ar', 'Sterling Silver', 'sterling-silver'),
(37, 13, 'en', 'Gold', 'gold'),
(38, 13, 'ru', 'Gold', 'gold'),
(39, 13, 'ar', 'Gold', 'gold'),
(40, 14, 'en', 'White Gold', 'white-gold'),
(41, 14, 'ru', 'White Gold', 'white-gold'),
(42, 14, 'ar', 'White Gold', 'white-gold');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `type` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `jobs`
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
-- Структура таблицы `job_batches`
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
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_15_132531_create_permission_tables', 1),
(5, '2025_04_15_134229_add_new_column_role_id_users_table', 1),
(6, '2025_04_17_023742_add_new_table_colors', 1),
(7, '2025_04_17_023749_add_new_table_color_translations', 1),
(8, '2025_04_17_105557_add_new_column_slug_color_translations_table', 1),
(9, '2025_04_17_115112_add_new_table_option_groups', 1),
(10, '2025_04_17_115118_add_new_table_option_group_translations', 1),
(11, '2025_04_17_123714_add_new_table_options', 1),
(12, '2025_04_17_123724_add_new_table_option_translations', 1),
(17, '2025_05_06_130526_add_new_table_categories', 2),
(18, '2025_05_06_130536_add_new_table_category_translations', 2),
(23, '2025_05_09_102938_add_new_column_parent_id_categories', 3),
(24, '2025_05_06_120559_add_new_table_products', 4),
(25, '2025_05_06_120605_add_new_table_product_translations', 4),
(26, '2025_05_06_120711_add_new_table_product_options', 4),
(27, '2025_05_06_120716_add_new_table_product_images', 4),
(28, '2025_05_23_075350_add_new_columns_products_table', 5),
(29, '2025_05_23_080805_add_new_columns_products_table', 6),
(30, '2025_05_26_080509_add_new_table_slider', 7),
(31, '2025_05_26_080514_add_new_table_slider_translations', 8),
(32, '2025_05_26_094011_add_new_table_blogs', 9),
(33, '2025_05_26_094018_add_new_table_blog_translations', 10),
(34, '2025_05_26_102207_add_new_column_blogs', 11),
(35, '2025_05_26_105329_add_new_table_brands', 12),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 13),
(37, '2025_05_30_153945_add_new_column_categories_table', 13),
(38, '2025_05_30_154719_add_new_column_categories_table', 14),
(41, '2025_05_30_163211_add_new_table_banners', 15),
(42, '2025_05_30_163218_add_new_table_banner_translations', 15),
(43, '2025_05_31_113627_add_new_table_reviews', 16),
(44, '2025_05_31_113634_add_new_table_review_translations', 16),
(45, '2025_06_01_041801_add_new_table_pages', 17),
(46, '2025_06_01_041807_add_new_table_page_translations', 17),
(47, '2025_06_01_042430_add_new_column_type_pages_table', 18),
(48, '2025_06_01_051929_add_new_table_customers', 19),
(49, '2022_12_14_081209_create_settings_table', 20),
(50, '2022_12_14_120320_create_settings_translations_table', 20),
(51, '2025_07_01_171404_add_new_column_phone_customers_table', 21),
(52, '2025_07_01_171541_add_new_column_status_customers_table', 22),
(53, '2025_08_19_162837_add_new_table_product_categories', 23),
(54, '2025_08_21_120545_add_new_table_product_colors', 24),
(55, '2025_08_22_132134_add_new_table_basket', 24),
(56, '2025_08_23_102932_add_new_table_wishlist', 24),
(57, '2025_08_23_121412_add_new_column_stock_products_table', 24),
(58, '2026_03_31_101312_add_new_column_image_2_sliders_table', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 7),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 7),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 7),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 7),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 7),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 7),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 7),
(14, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 7),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 7),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 7),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 7),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 7),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 7),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 7),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 7),
(22, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 7),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 7),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 7),
(25, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 7),
(26, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 7),
(27, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 7),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 7),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 7),
(30, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 7),
(31, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 7),
(32, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 7),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 7),
(34, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 7),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 7),
(36, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 7),
(37, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 7),
(38, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 7),
(39, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 7),
(40, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 7),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 7),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 7),
(43, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 7),
(44, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 7),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 7),
(46, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 7),
(47, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 7),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 7),
(49, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 7),
(50, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 7),
(51, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 7),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 7),
(53, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 7),
(54, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 7),
(55, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 7),
(56, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 7),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 7),
(58, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 7),
(59, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 7),
(60, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 7),
(61, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 7),
(62, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 7),
(63, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 7),
(64, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 7),
(66, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 7),
(67, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 7),
(68, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 7),
(69, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 7),
(70, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `one_click_orders`
--

CREATE TABLE `one_click_orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0',
  `note` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `option_group_id`, `status`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(418, 137, '1', NULL, '2026-04-28 07:03:35', '2026-04-28 07:42:50', '2026-04-28 07:42:50'),
(419, 137, '1', NULL, '2026-04-28 07:05:00', '2026-04-28 07:42:50', '2026-04-28 07:42:50'),
(420, 137, '1', NULL, '2026-04-28 07:05:18', '2026-04-28 07:42:50', '2026-04-28 07:42:50'),
(421, 137, '1', NULL, '2026-04-28 07:05:36', '2026-04-28 07:42:50', '2026-04-28 07:42:50'),
(422, 138, '1', NULL, '2026-06-08 08:32:46', '2026-06-08 08:32:46', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `option_groups`
--

CREATE TABLE `option_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `option_groups`
--

INSERT INTO `option_groups` (`id`, `icon`, `category_id`, `status`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(137, NULL, 248, '1', NULL, '2026-04-28 07:01:56', '2026-04-28 07:42:50', '2026-04-28 07:42:50'),
(138, NULL, 248, '1', NULL, '2026-06-08 08:30:45', '2026-06-08 08:30:45', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `option_group_translations`
--

CREATE TABLE `option_group_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `option_group_translations`
--

INSERT INTO `option_group_translations` (`id`, `option_group_id`, `locale`, `name`, `slug`, `title`, `keywords`, `description`) VALUES
(409, 137, 'en', 'Material', NULL, NULL, NULL, NULL),
(410, 137, 'ru', 'Material', NULL, NULL, NULL, NULL),
(411, 137, 'ar', 'Material', NULL, NULL, NULL, NULL),
(412, 138, 'en', 'Color 1', 'color-1', NULL, NULL, NULL),
(413, 138, 'ru', 'Color ru', 'color-ru', NULL, NULL, NULL),
(414, 138, 'ar', 'Color ar', 'color-ar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `option_translations`
--

CREATE TABLE `option_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `option_translations`
--

INSERT INTO `option_translations` (`id`, `option_id`, `locale`, `name`, `slug`, `title`, `keywords`, `description`) VALUES
(1252, 418, 'en', 'Gold', 'gold', NULL, NULL, NULL),
(1253, 418, 'ru', 'Gold', 'gold', NULL, NULL, NULL),
(1254, 418, 'ar', 'Gold', 'gold', NULL, NULL, NULL),
(1255, 419, 'en', 'Sterling Silver', 'sterling-silver', NULL, NULL, NULL),
(1256, 419, 'ru', 'Sterling Silver', 'sterling-silver', NULL, NULL, NULL),
(1257, 419, 'ar', 'Sterling Silver', 'sterling-silver', NULL, NULL, NULL),
(1258, 420, 'en', 'White Gold', 'white-gold', NULL, NULL, NULL),
(1259, 420, 'ru', 'White Gold', 'white-gold', NULL, NULL, NULL),
(1260, 420, 'ar', 'White Gold', 'white-gold', NULL, NULL, NULL),
(1261, 421, 'en', 'Pink Gold', 'pink-gold', NULL, NULL, NULL),
(1262, 421, 'ru', 'Pink Gold', 'pink-gold', NULL, NULL, NULL),
(1263, 421, 'ar', 'Pink Gold', 'pink-gold', NULL, NULL, NULL),
(1264, 422, 'en', 'asdfasdfazxczvcxv', 'asdfasdfazxczvcxv', NULL, NULL, NULL),
(1265, 422, 'ru', 'asdfasdf', 'asdfasdf', NULL, NULL, NULL),
(1266, 422, 'ar', 'asdfasdf', 'asdfasdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `orders` longtext DEFAULT NULL,
  `view` enum('0','1') NOT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users index', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(2, 'users create', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(3, 'users edit', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(4, 'users delete', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(5, 'colors index', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(6, 'colors create', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(7, 'colors edit', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(8, 'colors delete', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(9, 'option_groups index', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(10, 'option_groups create', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(11, 'option_groups edit', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(12, 'option_groups delete', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(13, 'options index', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(14, 'options create', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(15, 'options edit', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(16, 'options delete', 'web', '2025-05-06 07:58:38', '2025-05-06 07:58:38'),
(17, 'category index', 'web', NULL, NULL),
(18, 'category create', 'web', NULL, NULL),
(19, 'category edit', 'web', NULL, NULL),
(20, 'category delete', 'web', NULL, NULL),
(21, 'product index', 'web', NULL, NULL),
(22, 'product create', 'web', NULL, NULL),
(23, 'product edit', 'web', NULL, NULL),
(24, 'product delete', 'web', NULL, NULL),
(25, 'sliders index', 'web', NULL, NULL),
(26, 'sliders create', 'web', NULL, NULL),
(27, 'sliders edit', 'web', NULL, NULL),
(28, 'sliders delete', 'web', NULL, NULL),
(29, 'blogs index', 'web', NULL, NULL),
(30, 'blogs create', 'web', NULL, NULL),
(31, 'blogs edit', 'web', NULL, NULL),
(32, 'blogs delete', 'web', NULL, NULL),
(33, 'brands index', 'web', NULL, NULL),
(34, 'brands create', 'web', NULL, NULL),
(35, 'brands edit', 'web', NULL, NULL),
(36, 'brands delete', 'web', NULL, NULL),
(37, 'banner index', 'web', NULL, NULL),
(38, 'banner create', 'web', NULL, NULL),
(39, 'banner edit', 'web', NULL, NULL),
(40, 'banner delete', 'web', NULL, NULL),
(41, 'reviews index', 'web', NULL, NULL),
(42, 'reviews create', 'web', NULL, NULL),
(43, 'reviews edit', 'web', NULL, NULL),
(44, 'reviews delete', 'web', NULL, NULL),
(45, 'pages index', 'web', NULL, NULL),
(46, 'pages create', 'web', NULL, NULL),
(47, 'pages edit', 'web', NULL, NULL),
(48, 'pages delete', 'web', NULL, NULL),
(49, 'settings index', 'web', NULL, NULL),
(50, 'settings create', 'web', NULL, NULL),
(51, 'settings edit', 'web', NULL, NULL),
(52, 'settings delete', 'web', NULL, NULL),
(53, 'orders index', 'web', NULL, NULL),
(54, 'order edit', 'web', NULL, NULL),
(55, 'services index', 'web', NULL, NULL),
(56, 'services create', 'web', NULL, NULL),
(57, 'services edit', 'web', NULL, NULL),
(58, 'services delete', 'web', NULL, NULL),
(59, 'customers index', 'web', NULL, NULL),
(60, 'customers create', 'web', NULL, NULL),
(61, 'customers edit', 'web', NULL, NULL),
(62, 'customers delete', 'web', NULL, NULL),
(63, 'redirect index', 'web', NULL, NULL),
(64, 'redirect create', 'web', NULL, NULL),
(66, 'redirect delete', 'web', NULL, NULL),
(67, 'one_click index', 'web', NULL, NULL),
(68, 'one_click edit', 'web', NULL, NULL),
(69, 'one_click delete', 'web', NULL, NULL),
(70, 'store index', 'web', NULL, NULL),
(71, 'store create', 'web', NULL, NULL),
(72, 'store edit', 'web', NULL, NULL),
(73, 'store delete', 'web', NULL, NULL),
(74, 'size index', 'web', NULL, NULL),
(75, 'size create', 'web', NULL, NULL),
(76, 'size edit', 'web', NULL, NULL),
(77, 'size delete', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `datasheet` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` int(11) NOT NULL DEFAULT 0,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount_price` decimal(15,2) DEFAULT 0.00,
  `wholesale_price` decimal(15,2) DEFAULT NULL,
  `purchase_price` decimal(15,2) DEFAULT NULL,
  `diller_price` decimal(15,2) DEFAULT NULL,
  `special_price` decimal(15,2) DEFAULT NULL,
  `percent` int(11) DEFAULT 0,
  `review` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `new` enum('0','1') NOT NULL DEFAULT '1',
  `stock` enum('1','0') NOT NULL DEFAULT '1',
  `two_hand` enum('0','1') NOT NULL DEFAULT '0',
  `special` enum('1','0') NOT NULL DEFAULT '0',
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `sale` enum('1','0') NOT NULL DEFAULT '0',
  `home` enum('1','0') NOT NULL DEFAULT '0',
  `limited` enum('0','1') NOT NULL DEFAULT '0',
  `show_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `img`, `datasheet`, `category_id`, `brand_id`, `store_id`, `color_id`, `price`, `discount_price`, `wholesale_price`, `purchase_price`, `diller_price`, `special_price`, `percent`, `review`, `status`, `new`, `stock`, `two_hand`, `special`, `featured`, `sale`, `home`, `limited`, `show_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(873, '1776772995_product-24.jpg', '1776772995_product-25.jpg', NULL, 0, 0, 12, 250.00, 200.00, NULL, NULL, NULL, NULL, NULL, '5', '1', '1', '1', '0', '1', '0', '0', '1', '1', 107, '2026-04-21 12:03:15', '2026-04-28 19:45:29', NULL),
(874, '1780910165_WhatsApp Image 2026-03-06 at 15.20.55.jpeg', '1780910165_6996bc3dc6386 (1).jpeg', NULL, 0, 0, NULL, 125.00, 119.98, NULL, NULL, NULL, NULL, 0, '5', '1', '1', '1', '0', '0', '0', '0', '0', '1', 0, '2026-06-08 09:16:05', '2026-06-08 09:16:11', '2026-06-08 09:16:11');

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3202, 248, 873, NULL, NULL, NULL),
(3203, 248, 874, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`id`, `img`, `product_id`) VALUES
(1226, '1776772995_product-24.jpg', 873),
(1227, '1776772995_product-25.jpg', 873),
(1228, '1780910165_1688356002.jpg', 874);

-- --------------------------------------------------------

--
-- Структура таблицы `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `option_id`) VALUES
(2058, 874, 422);

-- --------------------------------------------------------

--
-- Структура таблицы `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `size_id` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 873, 2, '2026-04-28', NULL),
(2, 873, 3, '2026-04-28', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `overview` longtext DEFAULT NULL,
  `information` longtext DEFAULT NULL,
  `delivery` text DEFAULT NULL,
  `installation` text DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_keywords` varchar(255) DEFAULT NULL,
  `page_description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `slug`, `description`, `overview`, `information`, `delivery`, `installation`, `page_title`, `page_keywords`, `page_description`) VALUES
(2524, 873, 'en', 'EMERALD-CUT HALO ENGAGEMENT RING WITH A DIAMOND PLATINUM BAND', 'emerald-cut-halo-engagement-ring-with-a-diamond-platinum-band', '<p>&nbsp;</p>\r\n\r\n<p>Link what you love. This sterling silver link chain holds endless styling potential. Featuring two openable links, groups of four static links between each one and a carabiner closure. Customise your link chain &ndash; then remix it with meaningful charms.</p>', '<p>This regulator has a rolled diaphragm and high flow rate with reduced pressure drop.It has an excellent degree of condensation.</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(2525, 873, 'ru', 'EMERALD-CUT HALO ENGAGEMENT RING WITH A DIAMOND PLATINUM BAND', 'emerald-cut-halo-engagement-ring-with-a-diamond-platinum-band', '<p>&nbsp;</p>\r\n\r\n<p>Link what you love. This sterling silver link chain holds endless styling potential. Featuring two openable links, groups of four static links between each one and a carabiner closure. Customise your link chain &ndash; then remix it with meaningful charms.</p>', '<p>This regulator has a rolled diaphragm and high flow rate with reduced pressure drop.It has an excellent degree of condensation.</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(2526, 873, 'ar', 'EMERALD-CUT HALO ENGAGEMENT RING WITH A DIAMOND PLATINUM BAND', 'emerald-cut-halo-engagement-ring-with-a-diamond-platinum-band', '<p>&nbsp;</p>\r\n\r\n<p>Link what you love. This sterling silver link chain holds endless styling potential. Featuring two openable links, groups of four static links between each one and a carabiner closure. Customise your link chain &ndash; then remix it with meaningful charms.</p>', '<p>This regulator has a rolled diaphragm and high flow rate with reduced pressure drop.It has an excellent degree of condensation.</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(2527, 874, 'en', 'asdfasdf', 'asdfasdf', '<p>asdfasdf</p>', '<p>asdfasdf</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(2528, 874, 'ru', 'asdfasdfasdf', 'asdfasdfasdf', NULL, '<p>asdfasdfasdf</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(2529, 874, 'ar', 'asdfasdf', 'asdfasdf-1', '<p>asdfasdfads</p>', '<p>asdfasdf</p>', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `redirects`
--

CREATE TABLE `redirects` (
  `id` int(11) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `review_translations`
--

CREATE TABLE `review_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `service_translations`
--

CREATE TABLE `service_translations` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `short_text` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_description` text DEFAULT NULL,
  `page_keywords` text DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `service_translations`
--

INSERT INTO `service_translations` (`id`, `service_id`, `title`, `short_text`, `text`, `slug`, `page_title`, `page_description`, `page_keywords`, `locale`, `created_at`, `updated_at`) VALUES
(1, 2, 'Cadmanasd', '<p>sdafasdf</p>', NULL, 'cadmanasd', 'Libero mollitia nihi', NULL, 'Cumque aliqua Labor', 'az', '2025-10-05 10:37:41', '2025-10-05 10:37:41'),
(2, 2, 'Macyasdfasdf', NULL, NULL, 'macyasdfasdf', 'Qui et veniam id do', NULL, 'Recusandae Veritati', 'en', '2025-10-05 10:37:41', '2025-10-05 10:37:41'),
(3, 2, 'James', NULL, NULL, 'james', 'Possimus eligendi u', NULL, 'Laboriosam earum do', 'ru', '2025-10-05 10:37:41', '2025-10-05 10:37:41'),
(4, 3, 'asdfasdfasdfasdfasdf', '<p>asdfasdfasdf</p>', NULL, 'asdfasdfasdfasdfasdf', NULL, NULL, NULL, 'az', '2025-10-05 07:11:06', '2025-10-05 07:11:06'),
(5, 3, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 07:11:06', '2025-10-05 07:11:06'),
(6, 3, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 07:11:06', '2025-10-05 07:11:06'),
(7, 4, 'Carlos', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'carlos', 'Consectetur qui inc', NULL, 'Sapiente voluptatem', 'az', '2025-10-05 07:19:03', '2025-10-05 07:19:03'),
(8, 4, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 07:19:03', '2025-10-05 07:19:03'),
(9, 4, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 07:19:03', '2025-10-05 07:19:03'),
(10, 5, 'Domofon quraşdırılması', NULL, '<p>Yoxla.az şirkəti Bakı şəhərində və Azərbaycanın digər b&ouml;lgələrində <strong>domofon sistemlərinin quraşdırılması</strong> xidmətlərini təklif edir. Eyni zamanda bizim mağazadan aldığınız b&uuml;t&uuml;n b&ouml;y&uuml;k &ouml;l&ccedil;&uuml;l&uuml; məhsulların &ouml;dənişsiz olaraq &ccedil;atdırılması və quraşdırılması xidmətlərini həyata ke&ccedil;iririk.&nbsp;<a href=\"https://yoxla.az/category/nezaret-sistemleri#\">Domofon</a> sistemlərinin qoşulması&nbsp;vasitəsilə təhl&uuml;kəsizlik m&ouml;vzusunu tam əminliklə idarə edə bilər, villa, ev, ofis, anbar və istənilən obyektə giriş-&ccedil;ıxış &uuml;zərində tam&nbsp;nəzarəti təmin etmiş olarsınız.</p>\r\n\r\n<p>Evinizdə domofon sistemlərinin (və ya interkom sistemi də deyilir) quraşdırılması yalnız rahatlıq &uuml;&ccedil;&uuml;n deyil. Bu eyni zamanda evinizin təhl&uuml;kəsizlik səviyyəsini artırır və sevdiklərinizin g&uuml;vənliyini təmin edir. İki tərəfli əlaqə qurulmuş bir cihaz vasitəsilə, &ouml;n qapını a&ccedil;madan evinizin qarşısında kimin olduğunu eşidə və hətta g&ouml;rə bilərsiniz. Qapıdakı qonağınıza smart cihazınız vasitəsilə uzaqdan cavab vermək və siz evdə olmadığınız zaman kimlərin sizi ziyarət etdiyini g&ouml;rmək imkanınız olur.</p>\r\n\r\n<p>Komplekt domofonlar evinizin smart sistemlərinə daha bir rahat və faydalı funksiya əlavə edəcək. Bəs bu sistemin işləməsi tam olaraq necədir? Ev domofon sistemlərinin m&uuml;xtəlif n&ouml;vləri vardır. Onların hər biri fərqli quraşdırmalar, enerji mənbəyi və x&uuml;susiyyətlərə g&ouml;rə fərqlənir. Buna baxmayaraq, &uuml;mumi konsept eynidir. Yəni mikrofonun qabağında danışan bir şəxsin səsini və ya g&ouml;r&uuml;nt&uuml; şəklini başqa bir otaqdakı <a href=\"https://yoxla.az/category/nezaret-sistemleri-domofon\">domofon monitorunda</a> və ya smart cihazda olan başqa bir şəxs tərəfindən eşitməsinə və ya g&ouml;r&uuml;lməsinə imkan verir.</p>\r\n\r\n<h2>Domofon Sisteminin Tərkibi</h2>\r\n\r\n<p>Ev domofon sistemi bir ne&ccedil;ə komponentdən ibarətdir və bunlar arasında ev interkom sistemini mərkəzə alan əsas stansiya yer alır. Bu həm fiziki bir cihaz, həm də smart cihaz vasitəsilə daxil edilən və bulud &uuml;zərində saxlanılan bir smart tətbiqdir. Digər komponentlər interkom stansiyalarını təşkil edir ki, onlar iki tərəfli əlaqə yaratmağa imkan verən kamera və mikrofonu ehtiva edir. Bu, interkomun əksəriyyətlə &ouml;z&uuml;n&uuml;z&uuml;n qapısının, qapınızın qarşısının və ya ziyarət&ccedil;ilərinizin gəldiyi digər yerlərinin qabağında yerləşdirildiyi hissəsidir. Başqa bir interkom stansiyası isə evinizin i&ccedil;ərisinə qoyula bilər ki, siz ziyarət&ccedil;ilərlə əlaqə qura bilsiniz və onlara evinizə girişi təmin edəsiniz. Buna baxmayaraq, indi bir &ccedil;ox sistem sizə bu imkanı verir ki, bunu smart cihazınız vasitəsilə edə biləsiniz və bu, ev interkom və ziyarət&ccedil;ilərinizi tamamilə uzaqdan idarə etmək imkanı yaradır.</p>\r\n\r\n<h2>Ev Domofon Sistemi Əlaqəsi</h2>\r\n\r\n<p>Qapınızın qarşısındakı ziyarət&ccedil;inin səsini və/və ya g&ouml;r&uuml;nt&uuml; şəklini eşitmək və ya g&ouml;rmək &uuml;&ccedil;&uuml;n, interkom stansiyaları səs və/və ya video məlumatını kabel yolu ilə və ya (WiFi şəbəkəsi rabitəsilə) baz stansiyadan digər qəbul edilən interkom stansiyasına &ouml;t&uuml;rəcəkdir.</p>\r\n\r\n<h2>Donofonların Kilidləmə Sistemlərinə İnteqrasiyası</h2>\r\n\r\n<p>Əgər ev interkom sistemi kilidləmə mexanizminiz sistemi ilə inteqrasiya edilmişdirsə, onda d&uuml;yməyə toxunmağınız və ya smart cihazınızda toxunmağınız vasitəsilə ziyarət&ccedil;iləriniz &uuml;&ccedil;&uuml;n darvaza və ya qapıları a&ccedil;maq imkanınız olur. Bu, evinizin girişindəki interkomun daxili elektronik relayını fırlatmaqla işləyir ki, bu da giriş yolunun a&ccedil;ılışına a&ccedil;an signal g&ouml;ndərir və siqnal daxili elektronik kilidlənmə mexanizminə &ccedil;atır, beləliklə giriş yolu a&ccedil;ılır.</p>\r\n\r\n<h2>Ev Domofon Sistemi Quraşdırılması</h2>\r\n\r\n<p>Yoxla.az olaraq, sizə və həyat tərziyinə uyğun y&uuml;ksək keyfiyyətli ev <a href=\"https://yoxla.az/category/nezaret-sistemleri-domofon\">domofon sistemləri</a> təqdim edirik. Ən son model domofonların premium smart x&uuml;susiyyətləri və başqa smart ev sistemləri ilə inteqrasiya imkanı da var. Yoxla.az-da ev domofon sistemlərinin quraşdırılmasının ən y&uuml;ksək standartlarda həyata ke&ccedil;iriləcəyindən əmin ola bilərsiniz.</p>\r\n\r\n<h2>Domofonların Təmiri</h2>\r\n\r\n<p>Yoxla.az sizin təmirə ehtiyacı olan b&uuml;t&uuml;n n&ouml;v BCOM və Yoxla.az saytında satılan məhsulların tam ehtiyyat və təmirini təqdim edir. Əlaqə n&ouml;mrəsi ilə əlaqə saxlayaraq bizə təmirə birbaşa gətirə və yaxud g&ouml;ndərər bilərsiniz.&nbsp;</p>', 'domofon-qurasdirilmasi', 'omofon sistemləri, domofon quraşdırılması, audio domofon, video domofon, qapı zəngi sistemi, təhlükəsizlik sistemləri, interkom sistemi', '<p>domofon sistemləri, domofon quraşdırılması, audio domofon, video domofon, qapı zəngi sistemi, təhl&uuml;kəsizlik sistemləri, interkom sistemi, bina domofonu, mənzil domofonu, giriş nəzarət sistemi, domofon ustası, domofon təmiri, domofon xidməti, ucuz domofon, keyfiyyətli domofon, domofon montajı, blok domofonu, rəqəmsal domofon, simsiz domofon, domofon servisi</p>\r\n\r\n<p>&nbsp;</p>', 'omofon sistemləri, domofon quraşdırılması, audio domofon, video domofon, qapı zəngi sistemi, təhlükəsizlik sistemləri, interkom sistemi', 'az', '2025-10-05 17:31:52', '2025-10-05 17:31:52'),
(11, 5, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 17:31:52', '2025-10-05 17:31:52'),
(12, 5, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 17:31:52', '2025-10-05 17:31:52'),
(13, 6, 'Müşahidə Kameralarının Quraşdırılması', NULL, '<p>Yoxla.az şirkəti Bakı şəhərində və Azərbaycanın digər b&ouml;lgələrində m&uuml;şahidə kameralarının qoşulması xidmətlərini təklif edir. Eyni zamanda bizim mağazadan aldığınız b&uuml;t&uuml;n b&ouml;y&uuml;k &ouml;l&ccedil;&uuml;l&uuml; məhsulların &ouml;dənişsiz olaraq &ccedil;atdırılması və quraşdırılması xidmətlərini həyata ke&ccedil;iririk. WiFi IP kameralar vasitəsilə təhl&uuml;kəsizlik m&ouml;vzusunu tam əminliklə idarə edə bilər, villa, ev, ofis, anbar və istənilən obyekt &uuml;zərində tam video-m&uuml;şahidəni təmin etmiş olarsınız.</p>\r\n\r\n<p>Qeyd etmək istərdik ki, mağazalarımıza yaxınlaşmağınız, ya da onlayn şəkildə məhsul əldə etməyinizdən asılı olmayaraq tərəfimizdən qoyulan şərtlər dəyişməz qalır. Məhsulun sizin &uuml;nvanınıza ən qısa zamanda, təhl&uuml;kəsiz şəkildə &ccedil;atdırılması və quraşdırılması &uuml;&ccedil;&uuml;n Yoxla.az ailəsi olaraq əlimizdən gələnin ən yaxşısını etməyə hər zaman hazırıq.</p>\r\n\r\n<p>M&uuml;şahidə Kameralarının Quraşdırılma Şərtləri</p>\r\n\r\n<p>Yoxla.az-dan əldə etdiyiniz b&uuml;t&uuml;n kameralara zəmanət verilir və ixtisaslaşmış ustalar tərəfindən yerində qoşulma xidmətləri g&ouml;stərilir. Quraşdırılmalar həftəi&ccedil;i 1-5-ci g&uuml;nlər saat 09:00-dan 18:00-dək, şənbə g&uuml;n&uuml; isə 10:00-17:00 aralığında həyata ke&ccedil;irilir. B&ouml;y&uuml;k obyektlərdə m&uuml;şahidə kameralarının qoşulmasından &ouml;ncə kamera sisteminin&nbsp;</p>', 'musahide-kameralarinin-qurasdirilmasi', NULL, NULL, NULL, 'az', '2025-10-05 22:05:32', '2025-10-05 22:05:32'),
(14, 6, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 22:05:32', '2025-10-05 22:05:32'),
(15, 6, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 22:05:32', '2025-10-05 22:05:32'),
(16, 7, 'POS İnteqrasiya', NULL, NULL, 'pos-inteqrasiya', NULL, NULL, NULL, 'az', '2025-10-05 22:06:05', '2025-10-05 22:06:05'),
(17, 7, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 22:06:05', '2025-10-05 22:06:05'),
(18, 7, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 22:06:05', '2025-10-05 22:06:05'),
(19, 8, 'Kamera sisteminin layihələşdirilməsi', NULL, '<p>&nbsp;</p>\r\n\r\n<p>Yoxla.az şirkəti Bakı şəhərində və Azərbaycanın digər b&ouml;lgələrində kamera sistemlərinin layihələndirilməsi xidmətlərini təklif edir. Eyni zamanda bizim mağazadan aldığınız b&uuml;t&uuml;n b&ouml;y&uuml;k &ouml;l&ccedil;&uuml;l&uuml; məhsulların &ouml;dənişsiz olaraq &ccedil;atdırılması və quraşdırılması xidmətlərini həyata ke&ccedil;iririk. WiFi IP kameralar vasitəsilə təhl&uuml;kəsizlik m&ouml;vzusunu tam əminliklə idarə edə bilər, villa, ev, ofis, anbar və istənilən başqa obyekt &uuml;zərində tam video-m&uuml;şahidəni təmin etmiş olarsınız.</p>\r\n\r\n<p><br />\r\nQeyd etmək istərdik ki, mağazalarımıza yaxınlaşmağınız, ya da onlayn şəkildə məhsul əldə etməyinizdən asılı olmayaraq tərəfimizdən qoyulan şərtlər dəyişməz olaraq qalır. Məhsulun sizin &uuml;nvanınıza ən qısa zamanda, təhl&uuml;kəsiz şəkildə &ccedil;atdırılması və quraşdırılması &uuml;&ccedil;&uuml;n Yoxla.az ailəsi olaraq əlimizdən gələnin ən yaxşısını etməyə hər zaman hazırıq.</p>\r\n\r\n<p>M&uuml;şahidə Kameralarının Layihələndirmə Şərtləri<br />\r\nVideo nəzarət &uuml;&ccedil;&uuml;n m&uuml;şahidə kamera sisteminin layihələndirməsi və quraşdırılması xidmətləri həftəi&ccedil;i 1-5-ci g&uuml;nlər saat 09:00-dan 18:00-dək, şənbə g&uuml;n&uuml; isə 10:00-17:00 aralığında həyata ke&ccedil;irilir. Yoxla.az-dan əldə etdiyiniz b&uuml;t&uuml;n kameralara zəmanət verilir və istisaslaşmış ustalar tərəfindən yerində qoşulma xidmətləri g&ouml;stərilir. Unutmayın ki, b&ouml;y&uuml;k obyektlərdə m&uuml;şahidə kameralarının qoşulmasından &ouml;ncə video-kamera sisteminin layihələndirilməsi lazımdır.</p>', 'kamera-sisteminin-layihelesdirilmesi', NULL, NULL, NULL, 'az', '2025-10-05 22:07:50', '2025-10-05 22:07:50'),
(20, 8, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 22:07:50', '2025-10-05 22:07:50'),
(21, 8, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 22:07:50', '2025-10-05 22:07:50'),
(22, 9, 'Access Control sistemlərinin quraşdırılması', NULL, '<p>Yoxla.az şirkəti Bakı şəhərində və Azərbaycanın digər b&ouml;lgələrində access control sistemlərinin (giriş-&ccedil;ıxışa nəzarət sistemləri) quraşdırılması xidmətlərini təklif edir. Eyni zamanda bizim mağazadan aldığınız b&uuml;t&uuml;n b&ouml;y&uuml;k &ouml;l&ccedil;&uuml;l&uuml; məhsulların texniki dəstəyini, habelə &ccedil;atdırılması və quraşdırılması xidmətlərini həyata ke&ccedil;iririk. Biometrik barmaq tanıma cihazları, <a href=\"https://yoxla.az/mehsul/unv-oeu-301s-hmka-menzil-ucun-giris-paneli\">Standalone Access Controlar</a>, <a href=\"https://yoxla.az/mehsul/uz-tanima-sensorlu-giris-terminali-face-recognation-unv-oet-231h-4inch\">kilidlər</a>, <a href=\"https://yoxla.az/mehsul/girise-nezaret-acces-control-id-touch\">smart lock (ağıllı kilit),</a> <a href=\"https://yoxla.az/mehsul/unv-ofg5201-r1-c-tirpod-right-machine-turnstile\">turniket</a>, şlaqbaum, <a href=\"https://yoxla.az/category/nezaret-sistemleri-domofon\">domofon sistemləri</a> vasitəsilə təhl&uuml;kəsizlik m&ouml;vzusunu əminliklə idarə edə bilər, bina, ofis, anbar və ya istənilən obyekt &uuml;zərində giriş-&ccedil;ıxışa nəzarəti tam təmin etmiş olarsınız.</p>\r\n\r\n<p><br />\r\nQeyd etmək istərdik ki, mağazalarımıza yaxınlaşmağınız, ya da onlayn şəkildə məhsul əldə etməyinizdən asılı olmayaraq tərəfimizdən qoyulan şərtlər dəyişməz qalır. Məhsulun sizin &uuml;nvanınıza ən qısa zamanda, təhl&uuml;kəsiz şəkildə &ccedil;atdırılması və quraşdırılması &uuml;&ccedil;&uuml;n Yoxla.az ailəsi olaraq əlimizdən gələnin ən yaxşısını etməyə hər zaman hazırıq.</p>\r\n\r\n<p>Access Control Sistemlərinin Quraşdırılması Şərtləri<br />\r\nYoxla.az-dan əldə etdiyiniz b&uuml;t&uuml;n <a href=\"https://yoxla.az/category/nezaret-sistemleri-girise-nezaret\">access control sistemlərinə</a> zəmanət verilir və ixtisaslaşmış ustalar tərəfindən yerində qoşulma xidmətləri g&ouml;stərilir.&nbsp;</p>\r\n\r\n<p>Quraşdırılma işləri həftəi&ccedil;i 1-5-ci g&uuml;nlər saat 09:00-dan 18:00-dək, şənbə g&uuml;n&uuml; isə 10:00-17:00 aralığında həyata ke&ccedil;irilir. B&ouml;y&uuml;k obyektlərdə, bir ne&ccedil;ə girişin olduğu ərazilərdə access control sisteminin quraşdırılmasından &ouml;ncə layihələndirilmə lazım ola bilər.</p>\r\n\r\n<p>&nbsp;</p>', 'access-control-sistemlerinin-qurasdirilmasi', NULL, NULL, NULL, 'az', '2025-10-05 22:08:30', '2025-10-05 22:08:30'),
(23, 9, NULL, NULL, NULL, '', NULL, NULL, NULL, 'en', '2025-10-05 22:08:30', '2025-10-05 22:08:30'),
(24, 9, NULL, NULL, NULL, '', NULL, NULL, NULL, 'ru', '2025-10-05 22:08:30', '2025-10-05 22:08:30');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
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
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2dlNzUN0KnBFh7HNtBtixw3FrgXFPFvX5KtS8gT6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHdsTWxCd1Jad0JwYmRPclRkN0RXcFBLaTNsZlp4amlWcVFZcW9mZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC9lbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748520084),
('7Dc23UXLY4GE7qvknHeXOZDV6q6JfnNwkiF7t5Yn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXJXMW1XS0N1aGtPeWk4VGI4bjhxRVlKM3ZVeDNzNGlaWkZTYXJzRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwMC9lbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748522287),
('XdlqOVDoLeUebO61gqOhiOS9srIGMiE0pXL9wi3i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWpacGEyZHdqbXRZaHhaQlV2dEdjQlNtSUdUWlQ0Y2VKRDdMekt4QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748520871);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `logo_light` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `logo_dark` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `valyuta` decimal(15,2) NOT NULL DEFAULT 0.00,
  `valyuta_eur` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount_check` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `phone`, `logo_light`, `img`, `logo_dark`, `email`, `whatsapp`, `facebook`, `instagram`, `linkedin`, `twitter`, `youtube`, `telegram`, `tiktok`, `map`, `valyuta`, `valyuta_eur`, `discount_check`, `created_at`, `updated_at`) VALUES
(1, '(+994) 55 310 07 77', '1762062074.jpg', '1762063018.png', NULL, 'info@yoxla.az', '553100777', 'https://www.facebook.com/yoxla.az', 'https://www.instagram.com/yoxlaaz/', NULL, 'https://x.com/yoxla', 'Youtube', NULL, 'https://www.tiktok.com/@yoxlaaz_official', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1913.6062754822485!2d49.95289461055304!3d40.37325441500219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4030635a74885149%3A0x262cf768802449a1!2sRahib%20Mammadov%20Street%2C%20Bak%C4%B1!5e1!3m2!1sen!2saz!4v1767424678656!5m2!1sen!2saz\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1.70, 1.75, 0, NULL, '2026-01-03 19:47:55');

-- --------------------------------------------------------

--
-- Структура таблицы `settings_translations`
--

CREATE TABLE `settings_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settings_id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_desc` text DEFAULT NULL,
  `site_keywords` text DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_text` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `copyrights` varchar(255) DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `settings_translations`
--

INSERT INTO `settings_translations` (`id`, `settings_id`, `site_title`, `site_desc`, `site_keywords`, `slogan`, `address`, `contact_text`, `footer_text`, `copyrights`, `locale`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yoxla.az — Elektronika Mağazası | Online Store', 'Kassa aparatı, barkod printer, kamera, UPS, monitor, şəbəkə və sair Notebook, monitor, printer, proqram təminatı və digər kompüter texnikası məhsullarını etibarlı şəkildə onlayn sifariş et və sürətli çatdırılmadan faydalan.', 'ticarət avadanlıqları, kassa avadanlıqları, barkod printer, barkod skaner, termal printer, kassa printeri, elektron tərəzi, ştrix kod oxuyucu, kassa aparatları, pos sistemləri, mağaza avadanlıqları, topdan ticarət avadanlıqları, pərakəndə satış sistemləri, təhlükəsizlik kameraları, müşahidə kameraları, IP kamera sistemi, DVR NVR sistemləri, monitor satışı, UPS qurğuları, enerji qoruyucu sistemlər, kompüter aksesuarları, mouse klaviatura satışı, şəbəkə avadanlıqları, router modem, switch cihazları, gözəllik avadanlıqları, salon üçün cihazlar, elektrik cihazları, texniki avadanlıqlar, rəsmi satış, topdan satış, pərakəndə satış, bakıda texniki avadanlıq, kompüter hissələri, mağaza sistemi qurulması, yoxla.az, yoxla.az mağaza, professional ticarət avadanlıqları, orijinal avadanlıqlar, zəmanətli məhsullar', 'YOXLA.AZ | Elektron Avadanlıqların Topdan və Pərakəndə Satışı', 'Bakı Xətai rayon Aşıq Ələskər küc 2/1134', 'Bizimlə birbaşa əlaqə saxlamaq ücün əlaqə vasitələrimizdən istifadə edə bilərsiniz.', 'Qiymət hərşeydən önəmlidir. Ona görədə birinci əldən alın!', 'Müəllif Hüquqları Qorunur © 2025 Yoxla.az', 'az', NULL, '2026-01-13 17:23:46'),
(2, 1, 'Yoxla.az — Your Electronics Hub | Online Store', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, '2026-01-13 17:23:46'),
(3, 1, 'Yoxla.az — Интернет магазин электроники в Баку', 'интернет-магазин электроники: cистемы видеонаблюдения, сетевые оборудования, компьютеры и аксессуары - Оптом и Розницу по низким ценам.', NULL, NULL, NULL, NULL, NULL, NULL, 'ru', NULL, '2026-01-13 17:23:46');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '5', 250, '2026-04-28', '2026-04-28', NULL),
(3, '10', 248, '2026-04-28', '2026-04-28', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `image_2` varchar(255) DEFAULT NULL,
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `status`, `image_2`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, '1774938101_slider-6.jpg', '1', '1774938102_img-item.jpg', NULL, '2026-03-31 06:21:42', '2026-03-31 08:13:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(2) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alert_text` varchar(255) DEFAULT NULL,
  `first_btn_text` varchar(255) DEFAULT NULL,
  `first_btn_link` varchar(255) DEFAULT NULL,
  `last_btn_text` varchar(255) DEFAULT NULL,
  `last_btn_link` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `title`, `alert_text`, `first_btn_text`, `first_btn_link`, `last_btn_text`, `last_btn_link`, `description`, `slug`) VALUES
(59, 22, 'en', 'Unveil Your Signature Look', 'Trending', 'SHOP NOW', 'SHOP NOW', 'EXPLORE MORE', 'EXPLORE MORE', '<p>Explore our stunning collection of handcrafted jewelry that blends<br />\r\ntimeless elegance with modern style. Each piece is designed to<br />\r\nempower your individuality&mdash;make your statement today!</p>', 'unveil-your-signature-look'),
(60, 22, 'ru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(61, 22, 'ar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, NULL, '$2y$10$WIMwV.EGFSlou3exIUpmLev/th3/nuZknXQJ1g1WPeEvkOpa193tq', 'w68EXTm12Rzhn5ntyYSIOn6hULjtQ0mSMmD4I3s4Cbzese2O4HJ1HJysTzbz', '2025-05-06 07:58:38', '2025-11-03 13:24:34'),
(7, 'Farid', 'ferid82@gmail.com', NULL, NULL, '$2y$10$jLdbHBqgz8hB.0oCWWVjg.e1AtxFfZJCWX.xxsays197VCMjhc.Aq', NULL, '2025-09-05 10:01:39', '2025-09-05 10:01:39');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(55) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner_translations`
--
ALTER TABLE `banner_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_translations_banner_id_foreign` (`banner_id`);

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baskets_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_tags_pivot`
--
ALTER TABLE `blog_tags_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_translations_blog_id_foreign` (`blog_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color_translations`
--
ALTER TABLE `color_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_translations_color_id_foreign` (`color_id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `one_click_orders`
--
ALTER TABLE `one_click_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_option_group_id_foreign` (`option_group_id`);

--
-- Индексы таблицы `option_groups`
--
ALTER TABLE `option_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `option_group_translations`
--
ALTER TABLE `option_group_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_group_translations_option_group_id_foreign` (`option_group_id`);

--
-- Индексы таблицы `option_translations`
--
ALTER TABLE `option_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_translations_option_id_foreign` (`option_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_translations_page_id_foreign` (`page_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_color_id_foreign` (`color_id`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`),
  ADD KEY `product_options_option_id_foreign` (`option_id`);

--
-- Индексы таблицы `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `redirects`
--
ALTER TABLE `redirects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review_translations`
--
ALTER TABLE `review_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_translations_review_id_foreign` (`review_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_translations`
--
ALTER TABLE `service_translations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings_translations`
--
ALTER TABLE `settings_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_translations_settings_id_foreign` (`settings_id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_translations_slider_id_foreign` (`slider_id`);

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `banner_translations`
--
ALTER TABLE `banner_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `blog_tags_pivot`
--
ALTER TABLE `blog_tags_pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT для таблицы `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблицы `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `color_translations`
--
ALTER TABLE `color_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `one_click_orders`
--
ALTER TABLE `one_click_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT для таблицы `option_groups`
--
ALTER TABLE `option_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT для таблицы `option_group_translations`
--
ALTER TABLE `option_group_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT для таблицы `option_translations`
--
ALTER TABLE `option_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1267;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=875;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3204;

--
-- AUTO_INCREMENT для таблицы `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT для таблицы `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1229;

--
-- AUTO_INCREMENT для таблицы `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2059;

--
-- AUTO_INCREMENT для таблицы `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2530;

--
-- AUTO_INCREMENT для таблицы `redirects`
--
ALTER TABLE `redirects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `review_translations`
--
ALTER TABLE `review_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `service_translations`
--
ALTER TABLE `service_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `settings_translations`
--
ALTER TABLE `settings_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `banner_translations`
--
ALTER TABLE `banner_translations`
  ADD CONSTRAINT `banner_translations_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD CONSTRAINT `blog_translations_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `color_translations`
--
ALTER TABLE `color_translations`
  ADD CONSTRAINT `color_translations_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_option_group_id_foreign` FOREIGN KEY (`option_group_id`) REFERENCES `option_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `option_group_translations`
--
ALTER TABLE `option_group_translations`
  ADD CONSTRAINT `option_group_translations_option_group_id_foreign` FOREIGN KEY (`option_group_id`) REFERENCES `option_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `option_translations`
--
ALTER TABLE `option_translations`
  ADD CONSTRAINT `option_translations_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review_translations`
--
ALTER TABLE `review_translations`
  ADD CONSTRAINT `review_translations_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `settings_translations`
--
ALTER TABLE `settings_translations`
  ADD CONSTRAINT `settings_translations_settings_id_foreign` FOREIGN KEY (`settings_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
