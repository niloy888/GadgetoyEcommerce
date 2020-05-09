-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2020 at 03:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadgetoy_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 1, '2020-04-25 15:22:11', '2020-05-01 07:55:18'),
(2, 'Nokia', 1, '2020-04-25 15:22:25', '2020-04-25 15:22:25'),
(3, 'Xiaomi', 1, '2020-04-25 15:22:31', '2020-04-25 15:22:31'),
(4, 'HP', 1, '2020-04-25 15:22:43', '2020-04-25 15:22:43'),
(5, 'Acer', 1, '2020-04-25 15:22:48', '2020-04-25 15:22:48'),
(6, 'Dell', 1, '2020-04-25 15:22:54', '2020-04-25 15:22:54'),
(8, 'TpLink', 1, '2020-04-25 15:23:18', '2020-04-25 15:23:18'),
(9, 'TotoLink', 1, '2020-04-25 15:23:26', '2020-04-25 15:23:26'),
(10, 'Apple', 1, '2020-04-26 14:07:39', '2020-04-26 14:07:39'),
(11, 'Toshiba', 1, '2020-04-26 14:16:43', '2020-04-26 14:16:43'),
(12, 'Rockstar Games', 1, '2020-04-26 14:19:18', '2020-04-26 14:19:18'),
(13, 'Rolex', 1, '2020-04-26 14:20:53', '2020-04-26 14:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 1, '2020-04-25 14:46:50', '2020-04-25 15:06:05'),
(2, 'Laptop', 1, '2020-04-25 15:06:27', '2020-04-25 15:06:27'),
(3, 'Desktop', 1, '2020-04-25 15:06:40', '2020-04-25 15:06:40'),
(4, 'Watch', 1, '2020-04-25 15:06:48', '2020-04-25 15:06:48'),
(5, 'Router', 1, '2020-04-25 15:06:57', '2020-04-25 15:06:57'),
(6, 'Video Games', 1, '2020-04-25 15:07:09', '2020-04-25 15:07:09'),
(7, 'Controller', 1, '2020-04-25 15:07:19', '2020-04-25 15:07:19'),
(8, 'Webcam', 1, '2020-04-26 14:10:58', '2020-04-26 14:10:58'),
(9, 'Photocopier', 1, '2020-04-26 14:12:47', '2020-04-26 14:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `nid` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `full_name`, `contact_no`, `present_address`, `permanent_address`, `nid`, `created_at`, `updated_at`) VALUES
(1, 'niloy.barua74@gmail.com', '$2y$10$XZBPEem1EiUMfMD8.Z1D6uPVGulvoXzZztBoaajt0EWYA37DhXeeO', 'niloy barua', '123456', 'kazir dewori', 'kazir dewori', 123456, '2020-04-26 13:06:17', '2020-04-30 15:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'atanu', 'barua', 'niloy.barua74@gmail.com', '147896', 'hello i want to say that  i like nhz', '2020-05-08 10:05:42', '2020-05-08 10:05:42'),
(2, 'atanu', 'barua', 'niloy.barua74@gmail.com', '123456', 'haha i was joking. i dont like nhz', '2020-05-08 10:06:57', '2020-05-08 10:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit_price` double NOT NULL,
  `unit_x_quantity_price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `client_id`, `vendor_id`, `payment_id`, `product_id`, `product_quantity`, `product_unit_price`, `unit_x_quantity_price`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, 1, 8, 4, 3, 1, 2000, 2000, 3, '2020-05-01 03:39:09', '2020-05-08 01:36:49'),
(7, 5, 1, 8, 5, 3, 4, 2000, 8000, 2, '2020-05-01 03:57:22', '2020-05-08 01:35:09'),
(8, 5, 1, 8, 5, 4, 2, 20000, 40000, 2, '2020-05-01 03:57:22', '2020-05-08 01:46:26'),
(9, 6, 1, 8, 6, 3, 5, 2000, 10000, 3, '2020-05-01 11:14:40', '2020-05-08 01:46:21'),
(10, 6, 1, 8, 6, 11, 1, 2500, 2500, 5, '2020-05-01 11:14:40', '2020-05-08 05:20:45'),
(11, 7, 1, 8, 7, 3, 1, 2000, 2000, 3, '2020-05-01 11:17:22', '2020-05-08 01:46:14');

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
(3, '2020_04_25_204420_create_categories_table', 2),
(4, '2020_04_25_211138_create_brands_table', 3),
(5, '2020_04_25_212749_create_products_table', 4),
(6, '2020_04_26_080837_create_vendors_table', 5),
(7, '2020_04_26_174515_create_clients_table', 6),
(8, '2020_04_29_082628_create_orders_table', 7),
(9, '2020_04_29_082757_create_invoices_table', 7),
(10, '2020_04_30_123230_create_payments_table', 7),
(11, '2020_05_08_151605_create_contact_us_table', 8),
(12, '2020_05_08_181443_create_product_reviews_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `payment_id`, `full_address`, `city`, `district`, `sub_total`, `vat`, `total_cost`, `created_at`, `updated_at`) VALUES
(4, 1, 4, 'nfkdnfk', 'kvnekvn', 'Dhaka', '', '420.00', '2,000.00', '2020-05-01 03:39:08', '2020-05-01 03:39:09'),
(5, 1, 5, 'ashkar dighi', 'chittagong', 'Chattogram', '48,000.00', '4,800.00', '52,800.00', '2020-05-01 03:57:22', '2020-05-01 03:57:22'),
(6, 1, 6, 'noakhali', 'ctg', 'Chattogram', '12,500.00', '1,250.00', '13,750.00', '2020-05-01 11:14:39', '2020-05-01 11:14:40'),
(7, 1, 7, 'brahmanbaria', 'ctg', 'Chattogram', '2,000.00', '200.00', '2,200.00', '2020-05-01 11:17:21', '2020-05-01 11:17:22');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `security_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `client_id`, `payment_method`, `name_on_card`, `card_number`, `expire_date`, `security_number`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Credit Card', 'cvcbfcb', '3699', '2020-06-19', '3699', 'cvbcvb', '2020-04-30 11:22:16', '2020-04-30 11:22:16'),
(2, 2, 1, 'Credit Card', 'fdsfdfd', '1236', '2020-06-19', '3698', 'xcxvx', '2020-04-30 11:28:35', '2020-04-30 11:28:35'),
(3, 3, 1, 'Credit Card', 'niloy', '1478', '2020-06-19', '3214', 'nice', '2020-05-01 01:33:54', '2020-05-01 01:33:54'),
(4, 4, 1, 'Bkash', 'dmvndmvn', 'dvndv', '2020-06-19', '3669', 'dcndjknckj', '2020-05-01 03:39:08', '2020-05-01 03:39:08'),
(5, 5, 1, 'PayPal', 'niloy', '1236', '2020-06-19', '3698', 'nice', '2020-05-01 03:57:22', '2020-05-01 03:57:22'),
(6, 6, 1, 'Credit Card', 'niloy', '1236', '2020-06-19', '2369', 'nice', '2020-05-01 11:14:40', '2020-05-01 11:14:40'),
(7, 7, 1, 'Bkash', 'niloy', '1236', '2020-06-19', '3698', 'hmm', '2020-05-01 11:17:22', '2020-05-01 11:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_discount` double(10,2) NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` int(255) DEFAULT '0',
  `rating` int(255) NOT NULL DEFAULT '4',
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `vendor_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_discount`, `product_image`, `popularity`, `rating`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 8, 'nokia 1100', 'jvndjsnvdksvmkdlm', 2000.00, 15, 100.00, 'product-images/51CJ8F1AW6L._AC_.jpg', 2, 2, 1, '2020-04-26 08:37:05', '2020-05-08 15:16:11'),
(4, 1, 3, 8, 'note 7 pro', 'dvsdvnsdjnvsdn', 20000.00, 12, 100.00, 'product-images/C242F83B-6939-035E-6201-F7F739B24211.jpg', 0, 3, 1, '2020-04-26 14:06:34', '2020-05-08 15:11:09'),
(5, 2, 10, 8, 'Macbook Air 2019', 'hshdksdgksdkvjsd', 200000.00, 5, 500.00, 'product-images/aZjLxvp3BzPDZHWvYRGLpN.jpg', 0, 4, 1, '2020-04-26 14:08:50', '2020-04-26 14:08:50'),
(6, 2, 5, 8, 'acer aspire v3', 'jndjkfsdkgsdjk', 42000.00, 5, 100.00, 'product-images/7LrHdP3dcZPL7aVHjMPo4D-1200-80.jpg', 0, 4, 1, '2020-04-26 14:10:16', '2020-04-26 14:10:16'),
(7, 8, 6, 8, 'Webcam C10', 'jndjnsdfjgngsdg', 110000.00, 5, 500.00, 'product-images/34263.jpg', 0, 4, 1, '2020-04-26 14:12:10', '2020-04-26 14:12:10'),
(8, 9, 11, 8, 'E-studio Color Photocopier', 'fbgsdjbsgjkdnsvkjd', 120000.00, 3, 1000.00, 'product-images/toshiba-e-studio-256-copier.jpg', 0, 4, 1, '2020-04-26 14:18:19', '2020-04-26 14:18:19'),
(9, 6, 12, 8, 'GTA-V', 'kmkmsdksdkmsdk', 580.00, 10, 50.00, 'product-images/Grand_Theft_Auto_V.png', 0, 0, 1, '2020-04-26 14:20:08', '2020-05-09 08:49:46'),
(10, 4, 13, 8, 'Rolex Daytona', 'njjknfjgnsdkjnjv', 20000.00, 9, 500.00, 'product-images/rolex-datejust-rolex-daytona-watch-diamond-source-nyc-png-favpng-zbKxqj9yruf2deh73tDBSWP15.jpg', 0, 4, 1, '2020-04-26 14:21:40', '2020-04-26 14:21:40'),
(11, 5, 8, 8, 'TP-Link TL-WR940N', 'dbdbfknfnjf', 2500.00, 15, 200.00, 'product-images/tp-link-tl-wr940n-450mbps-wireless-lan-router-big_ies419003.jpg', 1, 4, 1, '2020-04-26 14:23:35', '2020-05-01 11:14:40'),
(12, 5, 9, 8, 'Totolink A3002RUV2', 'ejfnenfenfje', 2000.00, 12, 200.00, 'product-images/A3002RU-V2_wr_01.jpg', 0, 4, 1, '2020-04-26 14:25:34', '2020-05-09 02:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `client_id` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `client_id`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'nice', 4, '2020-05-08 12:41:59', '2020-05-08 12:41:59'),
(2, 5, 1, 'bad product', 2, '2020-05-08 12:43:15', '2020-05-08 12:43:15'),
(3, 4, 1, 'nice phone', 4, '2020-05-08 12:55:33', '2020-05-08 12:55:33'),
(4, 4, 1, 'fantastic', 5, '2020-05-08 12:56:10', '2020-05-08 12:56:10'),
(5, 4, 1, 'bad totally', 2, '2020-05-08 12:56:40', '2020-05-08 12:56:40'),
(6, 4, 1, 'not bad nor good', 3, '2020-05-08 12:57:26', '2020-05-08 12:57:26'),
(7, 3, 1, 'bad', 2, '2020-05-08 14:56:35', '2020-05-08 14:56:35'),
(8, 3, 1, 'worst', 1, '2020-05-08 14:56:51', '2020-05-08 14:56:51'),
(9, 3, 1, 'dont buy', 2, '2020-05-08 14:58:06', '2020-05-08 14:58:06'),
(10, 4, 1, 'bad', 1, '2020-05-08 15:12:06', '2020-05-08 15:12:06'),
(11, 4, 1, 'good product', 5, '2020-05-08 15:12:58', '2020-05-08 15:12:58'),
(12, 3, 1, 'dont buy please', 1, '2020-05-08 15:14:29', '2020-05-08 15:14:29'),
(13, 3, 1, 'best nokia mobile ever', 5, '2020-05-08 15:16:11', '2020-05-08 15:16:11');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niloy', 'niloy.barua74@gmail.com', NULL, '$2y$10$YRVSrUAviB1U2dgqN3v8GeWThyBr8omtvwMltkQrSXGBLhwwc3Ph2', NULL, '2020-04-25 11:40:04', '2020-04-25 11:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(11) NOT NULL,
  `activity` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `full_name`, `email`, `password`, `phone`, `city`, `location`, `nid`, `activity`, `created_at`, `updated_at`) VALUES
(3, 'atanu barua', 'atanu@gmail.com', '$2y$10$9N9wXQh7yxuQD.mIh3OG4enXg9POSjo1u5iyZc9LCuNAoVYyJE5vS', '123456', 'ctg', 'ctg', 123456, 1, '2020-04-26 03:36:22', '2020-05-01 07:53:13'),
(8, 'niloy barua', 'niloy.barua74@gmail.com', '$2y$10$3wo7gL12kSfX7br2fLODv.kOmbYAlKjIp0YcyN.z8w4W20W4/wH3a', '123456', 'ctg', 'ctg', 123456, 1, '2020-04-26 05:13:48', '2020-04-26 06:09:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
