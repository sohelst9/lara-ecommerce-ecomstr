-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2023 at 06:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-com-str`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Sohel', 'admin@gmail.com', '$2y$10$w.OwK.EIB9FCMvHZrDjbK.Onh27g87vBox0TTOtOWXa85BJl4z5Ve', 'Uploads/Admin/65682c6d2e8c0.webp', 0, '2023-10-30 07:37:31', '2023-12-23 00:28:53'),
(2, 'Rasel Rana', 'rasel@gmail.com', '$2y$10$GNr8TBZ1sKFKgD4.qApy0u3tOW5b726GjnAxMTmMV2Cxve69kq5Wm', NULL, 0, '2023-12-01 06:51:10', '2023-12-01 06:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `sub_title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Zephr Robertson', 'zephr-robertson', 'Ipsum magnam aut ve', 'Uploads/Banner/zephr-robertsonss.jpg', '1', '2023-11-15 02:05:46', '2023-11-16 00:01:12'),
(2, 'Sharon Middleton', 'sharon-middleton', 'Ipsum magnam aut ve', 'Uploads/Banner/sharon-middleton.jpg', '1', '2023-11-15 02:06:15', '2023-11-15 23:09:23'),
(3, 'Zachery Delaney', 'zachery-delaney', 'Omnis enim est expe', 'Uploads/Banner/zachery-delaney.jpg', '1', '2023-11-15 02:06:34', '2023-11-15 23:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` tinyint DEFAULT NULL,
  `size_id` tinyint DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Loafer', 'loafer', 'Loafer', 'Uploads/Category/loafer.jpg', 'Loafer', 'Loafer', 'Loafer', '2023-10-31 11:37:21', '2023-10-31 11:37:21'),
(2, 'Sneakers', 'sneakers', 'Sneakers', 'Uploads/Category/sneakers.jpg', 'Sneakers', 'Sneakers', 'Sneakers', '2023-10-31 11:37:50', '2023-10-31 11:37:50'),
(3, 'Sandal', 'sandal', 'Sandal', 'Uploads/Category/sandal.jpg', 'Sandal', 'Sandal', 'Sandal', '2023-10-31 11:38:19', '2023-10-31 11:38:19'),
(4, 'Ballet flat', 'ballet-flat', 'Ballet flat', 'Uploads/Category/ballet-flat.jpg', 'Ballet flat', 'Ballet flat', 'Ballet flat', '2023-10-31 11:38:52', '2023-10-31 11:38:52'),
(5, 'Women Shoes', 'women-shoes', 'Women Shoes', 'Uploads/Category/women-shoes.jpg', 'Women Shoes', 'Women Shoes', 'Women Shoes', '2023-10-31 11:43:31', '2023-10-31 11:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `slug`, `code`, `created_at`, `updated_at`) VALUES
(1, 'NA', 'na', NULL, '2023-11-02 11:08:54', '2023-11-02 11:08:54'),
(2, 'Black', 'black', NULL, '2023-11-16 00:13:58', '2023-11-16 00:13:58'),
(3, 'White', 'white', NULL, '2023-11-16 00:14:04', '2023-11-16 00:14:04'),
(4, 'Green', 'green', NULL, '2023-11-16 00:14:14', '2023-11-16 00:14:14'),
(5, 'Blue', 'blue', NULL, '2023-11-16 00:14:20', '2023-11-16 00:14:20'),
(6, 'Gray', 'gray', NULL, '2023-11-16 00:14:25', '2023-11-16 00:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `validity` date NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `discount`, `validity`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test10', 10, '2023-12-07', 0, '2023-11-25 06:38:53', '2023-12-01 06:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int NOT NULL,
  `division_id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '22.65561018', '92.17541121', 'www.rangamati.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '21.44315751', '91.97381741', 'www.coxsbazar.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(15, 2, 'Rajshahi', 'রাজশাহী', '24.37230298', '88.56307623', 'www.rajshahi.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '25.09636876', '89.04004280', 'www.joypurhat.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(19, 2, 'Naogaon', 'নওগাঁ', '24.83256191', '88.92485205', 'www.naogaon.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '24.26361358', '89.91794786', 'www.tangail.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', '2023-11-28 09:24:12', '2023-11-28 09:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', '2023-11-28 09:24:44', '2023-11-28 09:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `gallery_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `product_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uploads/Product/GalleryImage/1-65413dcd19ada.jpg', '2023-10-31 11:47:57', '2023-10-31 11:47:57'),
(2, 1, 'Uploads/Product/GalleryImage/1-65413dcd2c1b4.jpg', '2023-10-31 11:47:57', '2023-10-31 11:47:57'),
(3, 1, 'Uploads/Product/GalleryImage/1-65413dcd32290.jpg', '2023-10-31 11:47:57', '2023-10-31 11:47:57'),
(4, 2, 'Uploads/Product/GalleryImage/2-65413de4e2a0f.jpg', '2023-10-31 11:48:20', '2023-10-31 11:48:20'),
(5, 2, 'Uploads/Product/GalleryImage/2-65413de4eadf7.jpg', '2023-10-31 11:48:20', '2023-10-31 11:48:20'),
(6, 2, 'Uploads/Product/GalleryImage/2-65413de4f10ef.jpg', '2023-10-31 11:48:20', '2023-10-31 11:48:20'),
(7, 3, 'Uploads/Product/GalleryImage/3-65413dfdf27c3.jpg', '2023-10-31 11:48:46', '2023-10-31 11:48:46'),
(8, 3, 'Uploads/Product/GalleryImage/3-65413dfe0681f.jpg', '2023-10-31 11:48:46', '2023-10-31 11:48:46'),
(9, 3, 'Uploads/Product/GalleryImage/3-65413dfe0c946.jpg', '2023-10-31 11:48:46', '2023-10-31 11:48:46'),
(10, 4, 'Uploads/Product/GalleryImage/4-65413e6dbb412.jpg', '2023-10-31 11:50:37', '2023-10-31 11:50:37'),
(11, 4, 'Uploads/Product/GalleryImage/4-65413e6dc3071.jpg', '2023-10-31 11:50:37', '2023-10-31 11:50:37'),
(12, 4, 'Uploads/Product/GalleryImage/4-65413e6dc7777.jpg', '2023-10-31 11:50:37', '2023-10-31 11:50:37'),
(13, 5, 'Uploads/Product/GalleryImage/5-65413e8bb2a1b.jpg', '2023-10-31 11:51:07', '2023-10-31 11:51:07'),
(14, 5, 'Uploads/Product/GalleryImage/5-65413e8bba49d.jpg', '2023-10-31 11:51:07', '2023-10-31 11:51:07'),
(15, 5, 'Uploads/Product/GalleryImage/5-65413e8bbee6b.jpg', '2023-10-31 11:51:07', '2023-10-31 11:51:07'),
(16, 6, 'Uploads/Product/GalleryImage/6-65413ea70d41c.jpg', '2023-10-31 11:51:35', '2023-10-31 11:51:35'),
(17, 6, 'Uploads/Product/GalleryImage/6-65413ea714efb.jpg', '2023-10-31 11:51:35', '2023-10-31 11:51:35'),
(18, 6, 'Uploads/Product/GalleryImage/6-65413ea71f8f8.jpg', '2023-10-31 11:51:35', '2023-10-31 11:51:35'),
(19, 7, 'Uploads/Product/GalleryImage/7-6541e72b2ee22.jpg', '2023-10-31 23:50:35', '2023-10-31 23:50:35'),
(20, 7, 'Uploads/Product/GalleryImage/7-6541e72b41153.jpg', '2023-10-31 23:50:35', '2023-10-31 23:50:35'),
(21, 7, 'Uploads/Product/GalleryImage/7-6541e72b4b48f.jpg', '2023-10-31 23:50:35', '2023-10-31 23:50:35'),
(22, 8, 'Uploads/Product/GalleryImage/8-6541e99867588.jpg', '2023-11-01 00:00:56', '2023-11-01 00:00:56'),
(23, 8, 'Uploads/Product/GalleryImage/8-6541e998759be.jpg', '2023-11-01 00:00:56', '2023-11-01 00:00:56'),
(24, 9, 'Uploads/Product/GalleryImage/9-6541e9e6a8e7b.jpg', '2023-11-01 00:02:14', '2023-11-01 00:02:14'),
(25, 9, 'Uploads/Product/GalleryImage/9-6541e9e6acfeb.jpg', '2023-11-01 00:02:14', '2023-11-01 00:02:14'),
(26, 9, 'Uploads/Product/GalleryImage/9-6541e9e6b3172.jpg', '2023-11-01 00:02:14', '2023-11-01 00:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_11_140532_create_admins_table', 1),
(6, '2023_10_12_095550_create_categories_table', 1),
(7, '2023_10_13_090248_create_products_table', 1),
(8, '2023_10_13_112624_create_gallery_images_table', 1),
(9, '2023_10_13_191905_create_colors_table', 1),
(10, '2023_10_13_191913_create_sizes_table', 1),
(11, '2023_10_14_065040_create_product_variations_table', 1),
(12, '2023_10_23_090508_create_permission_tables', 1),
(14, '2023_11_15_064033_create_banners_table', 2),
(17, '2023_11_18_160927_create_carts_table', 3),
(18, '2023_11_25_095154_create_coupons_table', 4),
(19, '2023_11_28_064554_create_divisions_table', 5),
(20, '2023_11_28_064653_create_districts_table', 5),
(22, '2023_11_28_083118_create_sub_districts_table', 6),
(25, '2023_11_28_092229_create_upazilas_table', 7),
(28, '2023_11_28_115718_create_orders_table', 8),
(29, '2023_11_28_124644_create_order_product_details_table', 8),
(30, '2023_12_05_021033_create_wishlists_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Backend\\Admin', 1),
(5, 'App\\Models\\Backend\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `trnx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int NOT NULL,
  `district_id` int NOT NULL,
  `upazila_id` int NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(15,2) NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `delivery_charge` int NOT NULL,
  `total` double(15,2) NOT NULL,
  `delivery_status` int NOT NULL DEFAULT '0' COMMENT 'status 0 pending\r\nstatus 1 processing\r\nstatus 2 delivered\r\nstatus 3 canceled\r\n',
  `payment_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `trnx_id`, `name`, `email`, `phone`, `division_id`, `district_id`, `upazila_id`, `zip_code`, `address`, `order_note`, `payment_type`, `sub_total`, `discount`, `delivery_charge`, `total`, `delivery_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ECOM_IaedKHZo', 'Sohel Rana', 'sohel.naptechlabs@gmail.com', '01568562265', 2, 12, 107, '6710', 'Kazipur, Sirajganj, Bangladesh', 'ddddddddd', 'cash_on_delivery', 2773.14, 0, 130, 2903.14, 1, 1, '2023-11-28 08:00:38', '2023-11-30 02:47:32'),
(2, 1, 'ECOM_ps8jN7uf', 'Sohel Rana', 'sohel@gmail.com', '01568562265', 2, 12, 107, '6710', 'Kazipur, Sirajganj, Bangladesh', 'dddsrertetrfgdgrtrggf', 'cash_on_delivery', 2835.63, 0, 130, 2965.63, 2, 1, '2023-11-30 19:55:49', '2023-11-30 19:58:50'),
(3, 4, 'ECOM_oWItoAfO', 'Rasel Rana', 'rasel@gmail.com', '01752412541', 3, 27, 209, '2540', 'Rupsha, Khulna', 'sdsdsdsdsds', 'cash_on_delivery', 1705.20, 40, 130, 1153.12, 2, 1, '2023-12-01 00:04:23', '2023-12-01 22:47:43'),
(4, 1, 'ECOM_Z4IBIW91', 'Sohel Rana', 'sohel@gmail.com', '01568562265', 1, 2, 19, '6710', 'Feni', 'sdsd', 'cash_on_delivery', 5670.00, 0, 130, 5800.00, 0, 0, '2023-12-02 00:18:06', '2023-12-02 00:18:06'),
(5, 1, 'ECOM_7sTwpLDl', 'Sohel Rana', 'sohel@gmail.com', '01568562265', 2, 17, 150, '3456', 'ddsdsd', 'sdsdds', 'cash_on_delivery', 1129.55, 0, 130, 1259.55, 0, 0, '2023-12-05 00:32:11', '2023-12-05 00:32:11'),
(6, 1, 'ECOM_TardTjMc', 'Yeo Peck', 'kiba@mailinator.com', '+1 (452) 391-8946', 1, 3, 26, '15839', 'Est a officia non ea', 'Dolorum nihil asperi', 'cash_on_delivery', 1632.60, 0, 70, 1702.60, 0, 0, '2023-12-11 06:52:40', '2023-12-11 06:52:40'),
(7, 1, 'ECOM_txcshyS1', 'Sohel Rana', 'sohel@gmail.com', '01568562265', 2, 12, 105, '6710', 'Kazipur, Sirajganj, Bangladesh', 'dddsrertetrfgdgrtrggf', 'cash_on_delivery', 1386.00, 0, 70, 1456.00, 0, 0, '2023-12-23 00:25:15', '2023-12-23 00:25:15'),
(8, 1, 'ECOM_bEiYjLy3', 'Sohel Rana', 'sohel@gmail.com', '01568562265', 2, 13, 113, '6710', 'Kazipur, Sirajganj, Bangladesh', 'dsdsddsa', 'cash_on_delivery', 945.00, 0, 70, 1015.00, 0, 0, '2023-12-23 00:28:12', '2023-12-23 00:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_product_details`
--

CREATE TABLE `order_product_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product_details`
--

INSERT INTO `order_product_details` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `product_name`, `product_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, 6, 'Patience Oneill', '823.68', '3', '2023-11-28 08:00:38', '2023-11-28 08:00:38'),
(2, 1, 6, 2, 3, 'Elvis Acosta', '151.05', '2', '2023-11-28 08:00:38', '2023-11-28 08:00:38'),
(3, 2, 7, 1, 7, 'Sharon Middleton', '945.21', '3', '2023-11-30 19:55:50', '2023-11-30 19:55:50'),
(4, 3, 4, 4, 12, 'Ruby Wynn', '206.00', '3', '2023-12-01 00:04:23', '2023-12-01 00:04:23'),
(5, 3, 1, 2, 10, 'Lael Barnett', '543.60', '2', '2023-12-01 00:04:23', '2023-12-01 00:04:23'),
(6, 4, 7, 1, 7, 'Sharon Middleton', '945.00', '6', '2023-12-02 00:18:06', '2023-12-02 00:18:06'),
(7, 5, 3, 2, 7, 'Zachery Delaney', '338.20', '2', '2023-12-05 00:32:11', '2023-12-05 00:32:11'),
(8, 5, 6, 2, 3, 'Elvis Acosta', '151.05', '3', '2023-12-05 00:32:11', '2023-12-05 00:32:11'),
(9, 6, 3, 2, 7, 'Zachery Delaney', '338.20', '3', '2023-12-11 06:52:40', '2023-12-11 06:52:40'),
(10, 6, 4, 4, 12, 'Ruby Wynn', '206.00', '3', '2023-12-11 06:52:40', '2023-12-11 06:52:40'),
(11, 7, 8, 2, 12, 'Eaton Washington', '693.00', '2', '2023-12-23 00:25:15', '2023-12-23 00:25:15'),
(12, 8, 7, 1, 7, 'Sharon Middleton', '945.00', '1', '2023-12-23 00:28:12', '2023-12-23 00:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-role', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(2, 'create-role', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(3, 'edit-role', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(4, 'delete-role', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(5, 'view-permission', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(6, 'create-permission', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(7, 'edit-permission', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(8, 'delete-permission', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(9, 'view-staff', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(10, 'create-staff', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(11, 'edit-staff', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(12, 'delete-staff', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(13, 'view-category', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(14, 'create-category', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(15, 'edit-category', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(16, 'delete-category', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(17, 'view-color', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(18, 'create-color', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(19, 'edit-color', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(20, 'delete-color', 'admin', '2023-10-30 07:37:30', '2023-10-30 07:37:30'),
(21, 'view-size', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(22, 'create-size', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(23, 'edit-size', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(24, 'delete-size', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(25, 'view-product', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(26, 'create-product', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(27, 'edit-product', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(28, 'delete-product', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(29, 'show-variation', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(30, 'create-variation', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(31, 'edit-variation', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(32, 'delete-variation', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(33, 'view-customer', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(34, 'view-banner', 'admin', '2023-11-15 23:59:57', '2023-11-15 23:59:57'),
(35, 'create-banner', 'admin', '2023-11-16 00:00:07', '2023-11-16 00:00:07'),
(36, 'edit-banner', 'admin', '2023-11-16 00:00:24', '2023-11-16 00:00:24'),
(37, 'delete-banner', 'admin', '2023-11-16 00:00:32', '2023-11-16 00:00:32'),
(38, 'status-banner', 'admin', '2023-11-16 00:00:40', '2023-11-16 00:00:40'),
(39, 'view-coupon', 'admin', '2023-12-01 06:49:01', '2023-12-01 06:49:01'),
(40, 'create-coupon', 'admin', '2023-12-01 06:49:07', '2023-12-01 06:49:07'),
(41, 'edit-coupon', 'admin', '2023-12-01 06:49:16', '2023-12-01 06:49:16'),
(42, 'delete-coupon', 'admin', '2023-12-01 06:49:24', '2023-12-01 06:49:24'),
(43, 'show-coupon', 'admin', '2023-12-01 06:49:34', '2023-12-01 06:49:34'),
(44, 'view-order', 'admin', '2023-12-01 07:50:50', '2023-12-01 07:50:50'),
(45, 'order-payment-status', 'admin', '2023-12-01 07:52:02', '2023-12-01 07:52:02'),
(46, 'delivery_status', 'admin', '2023-12-01 07:57:54', '2023-12-01 07:57:54'),
(47, 'order-invoice', 'admin', '2023-12-01 07:58:06', '2023-12-01 07:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` tinyint NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(16,2) NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` decimal(16,2) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_feature` tinyint DEFAULT '0',
  `just_for_you` tinyint DEFAULT '0',
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `thumbnail`, `quantity`, `price`, `discount`, `discount_price`, `description`, `is_feature`, `just_for_you`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lael Barnett', 'lael-barnett', 5, 'Uploads/Product/Thumbnail/lael-barnett.jpg', 18, 604.00, '10', 543.60, '<p>dfdfd</p>', 1, 0, 'Sit reiciendis provi', 'Aperiam esse culpa', '<p>dsd</p>', NULL, '2023-10-31 11:47:57', '2023-11-30 23:58:12'),
(2, 'Christian Reyes', 'christian-reyes', 1, 'Uploads/Product/Thumbnail/christian-reyes.jpg', 25, 264.00, NULL, 264.00, '<p>sdsds</p>', 1, 1, 'Voluptatibus numquam', 'Velit rerum maiores', '<p>sdsds</p>', NULL, '2023-10-31 11:48:20', '2023-11-23 20:13:42'),
(3, 'Zachery Delaney', 'zachery-delaney', 2, 'Uploads/Product/Thumbnail/zachery-delaney.jpg', 17, 356.00, '5', 338.20, '<p>sdsd</p>', 1, 1, 'Beatae voluptate cul', 'Nostrum et non persp', '<p>sdsds</p>', NULL, '2023-10-31 11:48:45', '2023-12-05 21:46:15'),
(4, 'Ruby Wynn', 'ruby-wynn', 5, 'Uploads/Product/Thumbnail/ruby-wynn- update.jpg', 44, 206.00, NULL, 206.00, '<p>sdsd</p>', 0, 1, 'Molestiae illum lab', 'Aliqua Pariatur Ve', '<p>sdsd</p>', NULL, '2023-10-31 11:50:37', '2023-12-11 06:52:03'),
(5, 'Patience Oneill', 'patience-oneill', 2, 'Uploads/Product/Thumbnail/patience-oneill.jpg', 47, 858.00, '4', 823.68, '<p>sds</p>', 1, 0, 'Rem aperiam blanditi', 'Non reprehenderit u', NULL, NULL, '2023-10-31 11:51:07', '2023-11-26 21:43:41'),
(6, 'Elvis Acosta', 'elvis-acosta', 1, 'Uploads/Product/Thumbnail/elvis-acosta.jpg', 21, 159.00, '5', 151.05, '<p>sdsdsd</p>', 1, 1, 'Sit et quis dolor a', 'Ea possimus officia', '<p>sdsd</p>', NULL, '2023-10-31 11:51:35', '2023-12-04 00:24:30'),
(7, 'Sharon Middleton', 'sharon-middleton', 5, 'Uploads/Product/Thumbnail/sharon-middleton.jpg', 20, 945.00, NULL, 945.00, '<p>dsd</p>', 1, 1, 'Exercitation non qui', 'Quia accusamus susci', '<p>dsd</p>', NULL, '2023-10-31 23:50:35', '2023-12-23 00:26:50'),
(8, 'Eaton Washington', 'eaton-washington', 1, 'Uploads/Product/Thumbnail/eaton-washington.jpg', 68, 693.00, NULL, 693.00, '<p>ddsd</p>', 1, 0, 'Mollit vitae consequ', 'Porro in mollitia co', NULL, NULL, '2023-11-01 00:00:56', '2023-12-23 00:24:47'),
(9, 'Zephr Robertson', 'zephr-robertson', 3, 'Uploads/Product/Thumbnail/zephr-robertson.jpg', 103, 441.00, '4', 423.36, '<p>dsds</p>', 1, 1, 'Quam aute tempore f', 'Deserunt in et vel s', NULL, NULL, '2023-11-01 00:02:14', '2023-12-01 23:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` tinyint NOT NULL,
  `size_id` tinyint DEFAULT NULL,
  `color_id` tinyint DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `size_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 9, 4, 1, 20, '2023-11-16 00:14:55', '2023-11-16 00:14:55'),
(2, 9, 5, 2, 15, '2023-11-16 00:15:06', '2023-11-23 20:16:20'),
(3, 9, 9, 4, 10, '2023-11-16 00:15:17', '2023-11-23 20:08:12'),
(4, 9, 13, 5, 20, '2023-11-16 00:15:57', '2023-11-16 00:15:57'),
(5, 8, 12, 2, 4, '2023-11-16 00:16:13', '2023-12-23 00:24:47'),
(6, 8, 13, 5, 20, '2023-11-16 00:16:23', '2023-11-26 21:16:53'),
(7, 8, 13, 2, 20, '2023-11-16 00:16:34', '2023-11-19 00:54:05'),
(8, 7, 7, 1, 10, '2023-11-16 00:17:23', '2023-12-23 00:26:50'),
(9, 7, 10, 2, 10, '2023-11-16 00:17:33', '2023-12-03 23:44:36'),
(10, 9, 5, 1, 10, '2023-11-17 22:29:23', '2023-11-17 22:29:23'),
(11, 9, 2, 1, 20, '2023-11-17 22:29:36', '2023-11-17 22:29:36'),
(12, 9, 4, 5, 8, '2023-11-18 09:31:14', '2023-11-18 09:31:14'),
(13, 6, 3, 2, 15, '2023-11-23 07:45:38', '2023-12-04 00:24:30'),
(14, 5, 6, 3, 47, '2023-11-23 07:45:50', '2023-11-26 21:43:41'),
(15, 1, 10, 2, 18, '2023-11-23 07:46:03', '2023-11-30 23:58:12'),
(16, 4, 12, 4, 44, '2023-11-23 07:46:16', '2023-12-11 06:52:03'),
(17, 3, 7, 2, 13, '2023-11-23 07:46:29', '2023-12-05 21:46:16'),
(18, 2, 7, 5, 20, '2023-11-23 07:46:49', '2023-11-23 20:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(2, 'moderator', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(3, 'editor', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(4, 'order_manage', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31'),
(5, 'viewer', 'admin', '2023-10-30 07:37:31', '2023-10-30 07:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'NA', 'na', '2023-11-16 00:12:47', '2023-11-16 00:12:47'),
(3, '6', '6', '2023-11-16 00:12:52', '2023-11-16 00:12:52'),
(4, '7', '7', '2023-11-16 00:12:57', '2023-11-16 00:12:57'),
(5, '8', '8', '2023-11-16 00:13:01', '2023-11-16 00:13:01'),
(6, '9', '9', '2023-11-16 00:13:06', '2023-11-16 00:13:06'),
(7, '36', '36', '2023-11-16 00:13:10', '2023-11-16 00:13:10'),
(8, '37', '37', '2023-11-16 00:13:15', '2023-11-16 00:13:15'),
(9, '38', '38', '2023-11-16 00:13:20', '2023-11-16 00:13:20'),
(10, '39', '39', '2023-11-16 00:13:25', '2023-11-16 00:13:25'),
(11, '40', '40', '2023-11-16 00:13:31', '2023-11-16 00:13:31'),
(12, '41', '41', '2023-11-16 00:13:36', '2023-11-16 00:13:36'),
(13, '42', '42', '2023-11-16 00:13:41', '2023-11-16 00:13:41'),
(14, '43', '43', '2023-11-16 00:13:45', '2023-11-16 00:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int NOT NULL,
  `district_id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17');
INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', '2023-11-28 09:25:17', '2023-11-28 09:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sohel Rana', 'sohel@gmail.com', '01568562265', 'Kazipur, Sirajganj, Bangladesh', 'Uploads/Customer/sohel-rana-656d65703e84f.webp', NULL, '$2y$10$JJXxPo1pCXdKqsATfgbGyOcB1UvFHjpizpVFgpNdGlbu8lbqoq2W6', NULL, '2023-11-20 21:45:52', '2023-12-04 19:26:40'),
(2, 'Nell Dickson', 'zaqeg@mailinator.com', '01741414521', NULL, NULL, NULL, '$2y$10$4sWI8ppIsPuKM1ys0DXwQ.zX5BwXYFZZxbznnaZJ3q8p741zmMY/q', NULL, '2023-11-21 00:37:08', '2023-11-21 00:37:08'),
(3, 'dd', 'sohel1@gmail.com', '01568562265', NULL, NULL, NULL, '$2y$10$F3wW8xMigBH6M1CoH1cU8Ob6RsTI7bQ13fhi0ot3J/HWV2gNj6Sxu', NULL, '2023-11-22 04:50:57', '2023-11-22 04:50:57'),
(4, 'Rasel Rana', 'rasel@gmail.com', '01752412541', NULL, NULL, NULL, '$2y$10$BSqgq4HIYdF6OAFp3hrClOPTuE9fNLSRF./PQ3gOeGSdWu9UaEiqi', NULL, '2023-11-30 23:57:52', '2023-11-30 23:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '2023-12-04 22:16:41', '2023-12-04 22:16:41'),
(5, 1, 4, '2023-12-04 22:16:45', '2023-12-04 22:16:45'),
(6, 1, 3, '2023-12-04 22:21:22', '2023-12-04 22:21:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product_details`
--
ALTER TABLE `order_product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_details_order_id_foreign` (`order_id`),
  ADD KEY `order_product_details_product_id_foreign` (`product_id`),
  ADD KEY `order_product_details_color_id_foreign` (`color_id`),
  ADD KEY `order_product_details_size_id_foreign` (`size_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_product_details`
--
ALTER TABLE `order_product_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product_details`
--
ALTER TABLE `order_product_details`
  ADD CONSTRAINT `order_product_details_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `order_product_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_product_details_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
