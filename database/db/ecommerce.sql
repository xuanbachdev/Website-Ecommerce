-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 11:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`, `category_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giày thể thao', 0, 'giay-the-thao', '2021-06-18 11:50:50', '2021-06-20 00:08:29', NULL),
(2, 'Đồng hồ', 0, 'dong-ho', '2021-06-18 12:15:36', '2021-07-02 23:56:01', NULL),
(3, 'Loa', 0, 'loa', '2021-06-18 12:15:47', '2021-07-02 23:56:17', NULL),
(4, 'Tai nghe', 0, 'tai-nghe', '2021-06-18 12:15:58', '2021-07-02 23:56:45', NULL),
(5, 'Điện thoại', 0, 'dien-thoai', '2021-06-18 12:38:29', '2021-07-02 23:57:02', NULL),
(6, 'Phụ kiện điện thoại', 0, 'phu-kien-dien-thoai', '2021-06-18 12:38:37', '2021-07-03 00:01:28', NULL),
(7, 'PC, phụ kiện PC', 0, 'pc-phu-kien-pc', '2021-06-18 12:43:04', '2021-07-03 00:02:14', NULL),
(8, 'Thiết bị mạng, phần mềm', 0, 'thiet-bi-mang-phan-mem', '2021-06-18 12:43:20', '2021-07-03 00:03:03', NULL),
(9, 'Linh kiện điện tử', 0, 'linh-kien-dien-tu', '2021-06-18 12:43:36', '2021-07-03 00:03:41', NULL),
(10, 'Máy chơi game', 0, 'may-choi-game', '2021-06-18 12:43:43', '2021-07-03 00:03:57', NULL),
(11, 'NIKE', 1, 'nike', '2021-06-18 12:44:18', '2021-06-18 12:44:18', NULL),
(12, 'UNDER ARMOUR', 1, 'under-armour', '2021-06-18 12:44:48', '2021-06-18 12:44:48', NULL),
(13, 'ADIDAS', 1, 'adidas', '2021-06-18 12:45:00', '2021-06-18 12:45:00', NULL),
(14, 'Đồng hồ thông minh', 2, 'dong-ho-thong-minh', '2021-06-18 12:45:34', '2021-07-03 00:07:13', NULL),
(15, 'Laptop', 0, 'laptop', '2021-06-18 12:45:51', '2021-07-03 00:05:00', NULL),
(16, 'Loa bluetooth', 3, 'loa-bluetooth', '2021-06-18 12:46:46', '2021-07-03 00:06:54', NULL),
(17, 'Quần áo', 0, 'quan-ao', '2021-06-22 05:12:04', '2021-07-03 00:06:13', NULL),
(18, 'Điện thoại sam sung', 5, 'dien-thoai-sam-sung', '2021-07-03 00:36:36', '2021-07-03 00:36:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_time` int(11) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, 'Giảm giá mùa covid', 12, 1, 10, 'XBIT2X', '2021-06-30 10:19:46', '2021-06-30 10:19:46'),
(2, 'Giảm giá mùa covid 2021', 10, 2, 1000000, 'XBIT2X123', '2021-06-30 10:21:18', '2021-06-30 10:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `google_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `google_id`, `customer_name`, `gender`, `customer_phone`, `customer_address`, `customer_email`, `customer_password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, NULL, 'Xuan Bach', 1, '+84646465465', 'Hà Nội', 'bachvip@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(2, NULL, 'ABC', 1, '+84646465465', 'Hà Nội', 'abcsss@gmail.com', '$2y$10$ZJuZnzDWG3/RFq12pggzsuZoNmaTnFzmrBDTyKIbxXC.QJ0lQEtei', NULL, NULL, NULL),
(3, NULL, 'ABC', 0, '09009293113', '123', 'a67687bc@gmail.com', '$2y$10$YblVUcXHwJMGJjfyJJOy3uvTmpKA0gzKVgdYLGm8FoHB7CahyS5oO', NULL, NULL, NULL),
(4, NULL, 'ABC', 1, '09009293113', 'Hà Nội', 'adm2222in@gmail.com', '$2y$10$RD9EF7yT5QYjJ496iJdLm.GqWC.RgvD8gLis6mc/WgQTDV3uoOpQC', '2021-06-25 07:21:05', '2021-06-25 07:21:05', NULL),
(5, NULL, 'Tricker', 1, '+84646465465', 'Hà Nội', 'adm2222in@gmail.com', '$2y$10$5.Ai2EHB.s4EfXVarjFnK.TqVq7u6PpE86qt.ykvBJRpkl0VGuNIu', '2021-06-25 07:28:39', '2021-06-25 07:28:39', NULL),
(6, NULL, 'ABC', 0, '+84646465465', 'Hà Nội', 'admin@gmail.com', '$2y$10$XpfqUOiXGgsissTITqYqheXCe6tdFj0KOWAEt4zJXZ.ijxzc2zPqC', '2021-06-25 07:33:09', '2021-06-25 07:33:09', NULL),
(7, NULL, 'Tricker', 1, '09009293113333', 'Hà Nội', 'tricker@gmail.com', '$2y$10$74qsfdl9Fw6rtsFYZpzfgeMveXi0g/bFDlDGnz9c3c6IixeH4VFFW', '2021-06-25 20:33:54', '2021-06-25 20:33:54', NULL),
(8, NULL, 'Bhsajd', 1, '+84646465465', 'Hà Nội', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-06-25 20:44:08', '2021-06-25 20:44:08', NULL),
(9, NULL, 'ABC', 1, '09009293113', 'Hà Nội', 'abc@gmail.com', '$2y$10$5.c8Y95uNaj6q1aKSyZWI.OcNvLA6JfpNS/U2KNmz68Qu1oWj6lRu', '2021-06-25 23:45:17', '2021-06-25 23:45:17', NULL),
(10, NULL, 'Admin', 0, '+84646465465', 'Hà Nội', 'abc@gmail.comq', '202cb962ac59075b964b07152d234b70', '2021-06-26 02:16:48', '2021-06-26 02:16:48', NULL),
(11, NULL, 'Nguyễn Tiến Anh', 1, '0123456789', 'Thái Bình', 'nta@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-07-04 01:36:46', '2021-07-04 01:36:46', NULL),
(13, NULL, 'Nguyễn Tiến Anh', 1, '012345678', 'Thái Bình', 'romcoca251100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-04 02:03:58', '2021-07-04 02:03:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'Menu 1', 0, NULL, '2021-06-15 23:42:21', '', '2021-06-15 23:42:21'),
(2, 'Menu 2', 0, NULL, '2021-06-17 02:13:42', 'menu-2', NULL),
(3, 'Menu 3', 0, NULL, '2021-06-30 10:26:25', 'menu-3', NULL),
(4, 'Menu 1.1-edit', 1, NULL, '2021-06-14 17:59:02', 'menu-11-edit', '2021-06-14 17:59:02'),
(5, 'Menu 1.2', 1, NULL, NULL, '', NULL),
(6, 'Menu 1.1.1', 4, NULL, NULL, '', NULL),
(7, 'Menu 1.2.1', 5, NULL, NULL, '', NULL),
(8, 'Menu 2.1-edit', 2, NULL, '2021-06-14 17:52:58', 'menu-21-edit', NULL),
(9, 'Menu 3.1', 3, NULL, NULL, '', NULL),
(10, 'Menu 1.1.1.1', 6, '2021-06-14 17:17:34', '2021-06-14 17:17:34', '', NULL),
(11, 'Menu 4', 0, '2021-06-14 17:23:56', '2021-06-14 17:23:56', '', NULL),
(12, 'Menu 4.1', 11, '2021-06-14 17:24:18', '2021-06-14 17:24:18', '', NULL),
(13, 'Menu 5', 0, '2021-06-14 17:30:20', '2021-06-14 17:30:20', 'menu-5', NULL),
(14, 'Menu 5.1', 13, '2021-06-14 17:32:26', '2021-06-14 17:32:26', 'menu-51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_13_222806_create_categories_table', 1),
(5, '2021_06_15_022813_add_column_deleted_at_to_table_categories', 1),
(6, '2021_06_15_023733_create_menus_table', 1),
(7, '2021_06_15_072600_add_column_slug_to_menus_table', 1),
(8, '2021_06_15_075426_add_collumn_soft_delete_to_menus_table', 1),
(9, '2021_06_15_103633_create_products_table', 1),
(10, '2021_06_15_103954_create_product_images_table', 1),
(11, '2021_06_15_104112_create_tags_table', 1),
(12, '2021_06_15_104220_create_product_tags_table', 1),
(13, '2021_06_15_162313_add_column_feature_image_name', 1),
(14, '2021_06_15_192111_add_column_image_name_to_table_product_image', 1),
(15, '2021_06_16_032608_add_column_deleted_at_to_product_table', 1),
(16, '2021_06_16_052302_create_sliders_table', 1),
(17, '2021_06_16_114935_add_column_deleted_at_to_sliders', 1),
(18, '2021_06_16_134831_create_settings_table', 1),
(19, '2021_06_16_145523_add_column_type_settings_table', 1),
(20, '2021_06_16_185752_create_roles_table', 1),
(21, '2021_06_16_190045_create_permissions_table', 1),
(22, '2021_06_16_190247_create_table_user_role', 1),
(23, '2021_06_16_190539_create_table_permission_role', 1),
(24, '2021_06_17_072051_add_column_deleted_at_table_users', 1),
(25, '2021_06_17_084214_add_column_parent_id_permission', 1),
(26, '2021_06_17_111802_add_column_deleted_at_to_table_roles', 1),
(27, '2021_06_18_032630_add_column_key_permission_table', 1),
(28, '2021_06_19_115939_create_tbl_admin_table', 1),
(29, '2021_06_22_091228_add_column_views_products', 1),
(30, '2021_06_22_091501_add_column_description_products', 1),
(31, '2021_06_24_164131_create_customers_table', 1),
(32, '2021_06_25_071020_shop_order', 1),
(33, '2021_06_25_090816_tbl_shipping', 2),
(34, '2021_06_25_153818_add_column_remember_token_to_table_customer', 3),
(35, '2021_06_27_151420_create_table_tbl_payment', 4),
(36, '2021_06_27_152823_create_table_tbl_order', 4),
(37, '2021_06_27_152906_create_table_tbl_order_details', 4),
(38, '2021_06_29_063238_add_column_product_slug_to_table_products', 5),
(39, '2021_06_30_164501_create_coupons_table', 6),
(40, '2021_07_01_073344_add_column_shipping_method_to_table_tbl_shipping', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_status` int(20) NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `shipping_id`, `order_status`, `order_code`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 2, '12e82', '2021-07-01 01:36:18', '2021-07-02 12:06:47'),
(2, 8, 2, 1, '69259', '2021-07-01 03:36:13', '2021-07-02 12:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_coupon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_code`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_coupon`, `created_at`, `updated_at`) VALUES
(1, '69259', 4, 'giay nikie1', '23000000', 3, 'XBIT2X123', '2021-07-01 10:36:13', '2021-07-01 10:36:13'),
(2, '12e82', 1, 'Giày Nike', '19000000', 2, 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'Category', 'Category', '2021-06-17 13:33:49', '2021-06-17 13:33:49', 0, NULL),
(2, 'List', 'List', '2021-06-17 13:33:49', '2021-06-17 13:33:49', 1, 'Category_List'),
(3, 'Add', 'Add', '2021-06-17 13:33:49', '2021-06-17 13:33:49', 1, 'Category_Add'),
(4, 'Edit', 'Edit', '2021-06-17 13:33:49', '2021-06-17 13:33:49', 1, 'Category_Edit'),
(5, 'Delete', 'Delete', '2021-06-17 13:33:49', '2021-06-17 13:33:49', 1, 'Category_Delete'),
(6, 'Slider', 'Slider', '2021-06-17 13:33:59', '2021-06-17 13:33:59', 0, NULL),
(7, 'List', 'List', '2021-06-17 13:33:59', '2021-06-17 13:33:59', 6, 'Slider_List'),
(8, 'Add', 'Add', '2021-06-17 13:33:59', '2021-06-17 13:33:59', 6, 'Slider_Add'),
(9, 'Edit', 'Edit', '2021-06-17 13:33:59', '2021-06-17 13:33:59', 6, 'Slider_Edit'),
(10, 'Delete', 'Delete', '2021-06-17 13:33:59', '2021-06-17 13:33:59', 6, 'Slider_Delete'),
(11, 'Menu', 'Menu', '2021-06-17 13:34:09', '2021-06-17 13:34:09', 0, NULL),
(12, 'List', 'List', '2021-06-17 13:34:09', '2021-06-17 13:34:09', 11, 'Menu_List'),
(13, 'Add', 'Add', '2021-06-17 13:34:09', '2021-06-17 13:34:09', 11, 'Menu_Add'),
(14, 'Edit', 'Edit', '2021-06-17 13:34:09', '2021-06-17 13:34:09', 11, 'Menu_Edit'),
(15, 'Delete', 'Delete', '2021-06-17 13:34:09', '2021-06-17 13:34:09', 11, 'Menu_Delete'),
(16, 'Product', 'Product', '2021-06-17 13:34:19', '2021-06-17 13:34:19', 0, NULL),
(17, 'List', 'List', '2021-06-17 13:34:19', '2021-06-17 13:34:19', 16, 'Product_List'),
(18, 'Add', 'Add', '2021-06-17 13:34:19', '2021-06-17 13:34:19', 16, 'Product_Add'),
(19, 'Edit', 'Edit', '2021-06-17 13:34:19', '2021-06-17 13:34:19', 16, 'Product_Edit'),
(20, 'Delete', 'Delete', '2021-06-17 13:34:19', '2021-06-17 13:34:19', 16, 'Product_Delete'),
(21, 'Setting', 'Setting', '2021-06-17 13:34:23', '2021-06-17 13:34:23', 0, NULL),
(22, 'List', 'List', '2021-06-17 13:34:23', '2021-06-17 13:34:23', 21, 'Setting_List'),
(23, 'Add', 'Add', '2021-06-17 13:34:23', '2021-06-17 13:34:23', 21, 'Setting_Add'),
(24, 'Edit', 'Edit', '2021-06-17 13:34:23', '2021-06-17 13:34:23', 21, 'Setting_Edit'),
(25, 'Delete', 'Delete', '2021-06-17 13:34:23', '2021-06-17 13:34:23', 21, 'Setting_Delete'),
(26, 'User', 'User', '2021-06-17 13:34:44', '2021-06-17 13:34:44', 0, NULL),
(27, 'List', 'List', '2021-06-17 13:34:44', '2021-06-17 13:34:44', 26, 'User_List'),
(28, 'Add', 'Add', '2021-06-17 13:34:44', '2021-06-17 13:34:44', 26, 'User_Add'),
(29, 'Edit', 'Edit', '2021-06-17 13:34:44', '2021-06-17 13:34:44', 26, 'User_Edit'),
(30, 'Delete', 'Delete', '2021-06-17 13:34:44', '2021-06-17 13:34:44', 26, 'User_Delete'),
(31, 'Role', 'Role', '2021-06-17 13:35:02', '2021-06-17 13:35:02', 0, NULL),
(32, 'List', 'List', '2021-06-17 13:35:02', '2021-06-17 13:35:02', 31, 'Role_List'),
(33, 'Add', 'Add', '2021-06-17 13:35:02', '2021-06-17 13:35:02', 31, 'Role_Add'),
(34, 'Edit', 'Edit', '2021-06-17 13:35:02', '2021-06-17 13:35:02', 31, 'Role_Edit'),
(35, 'Delete', 'Delete', '2021-06-17 13:35:02', '2021-06-17 13:35:02', 31, 'Role_Delete');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 5, 7, NULL, NULL),
(2, 5, 8, NULL, NULL),
(3, 5, 9, NULL, NULL),
(4, 5, 10, NULL, NULL),
(13, 6, 4, NULL, NULL),
(14, 6, 5, NULL, NULL),
(52, 2, 2, NULL, NULL),
(80, 1, 2, NULL, NULL),
(81, 1, 3, NULL, NULL),
(82, 1, 4, NULL, NULL),
(83, 1, 5, NULL, NULL),
(84, 1, 7, NULL, NULL),
(85, 1, 8, NULL, NULL),
(86, 1, 9, NULL, NULL),
(87, 1, 10, NULL, NULL),
(88, 1, 12, NULL, NULL),
(89, 1, 13, NULL, NULL),
(90, 1, 14, NULL, NULL),
(91, 1, 15, NULL, NULL),
(92, 1, 17, NULL, NULL),
(93, 1, 18, NULL, NULL),
(94, 1, 19, NULL, NULL),
(95, 1, 20, NULL, NULL),
(96, 1, 22, NULL, NULL),
(97, 1, 23, NULL, NULL),
(98, 1, 24, NULL, NULL),
(99, 1, 25, NULL, NULL),
(100, 1, 27, NULL, NULL),
(101, 1, 28, NULL, NULL),
(102, 1, 29, NULL, NULL),
(103, 1, 30, NULL, NULL),
(104, 1, 32, NULL, NULL),
(105, 1, 33, NULL, NULL),
(106, 1, 34, NULL, NULL),
(107, 1, 35, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `feature_image_name`, `deleted_at`, `views_count`, `description`, `product_slug`) VALUES
(1, 'Giày Nike', '19000000', '/storage/product/4/ce8TIuazyFrItOI6QDpg.jpg', '<p>Nike</p>', 4, 11, '2021-06-21 21:40:53', '2021-06-21 21:40:53', 'nike-air-jordan-1-high-university-blue-1-1.jpg', NULL, 6, '<p>Nike đẳng cấp</p>', 'giay-nike'),
(2, 'giay nikie', '25000000', '/storage/product/4/07wVdMy9aFKinwvH22Q2.jpg', '<p>Nike</p>', 4, 1, '2021-06-21 21:51:44', '2021-06-21 21:51:44', 'nike-air-jordan-1-mid-satin-grey-toe.jpg', NULL, NULL, '<p>NIke</p>', 'giay-nikie'),
(4, 'giay nikie1', '23000000', '/storage/product/4/fIyKwImEUgvMRJX8d3PW.jpg', '<p>Nike</p>', 4, 1, '2021-06-21 23:20:57', '2021-06-22 14:21:52', 'aQcEGYL7G5dlLn7LSGwd.jpg', '2021-07-03 00:59:01', NULL, '<p>nikee</p>', 'giay-nikie1'),
(5, 'Đồng hồ thông minh Apple', '28000000', '/storage/product/4/dPm6rAQI8Q67IPaqGApS.jpg', '<p>Đồng hồ th&ocirc;ng minh Apple</p>', 4, 14, NULL, NULL, 'dogn ho66.jpg', NULL, NULL, '<p>Đồng hồ th&ocirc;ng minh Apple</p>', 'dong-ho-thong-minh-apple'),
(6, 'Tai nghe 5G', '12000000', '/storage/product/4/LRtEijErIkTxDuA714AE.jpg', '<p>Tai nghe 5G</p>', 4, 4, NULL, '2021-07-03 00:57:45', 'tainghe80.jpg', NULL, NULL, '<p>Tai nghe 5G</p>', 'tai-nghe-5g'),
(7, 'Samsung Galaxy ultra 20', '19000000', '/storage/product/4/jn7QQsNwweqlzJwSKvmu.jpg', '<p>Samsung Galaxy ultra 20</p>', 4, 18, '2021-07-03 00:44:22', '2021-07-03 00:46:07', 'samsung80.jpg', NULL, NULL, '<p>Samsung Galaxy ultra 20</p>', 'samsung-galaxy-ultra-20'),
(8, 'Combo Máy PS4 slim 1T kèm 2 tay và đĩa PES 20', '11000000', '/storage/product/4/1XWHqA1VBMd4H8RlM6at.jpg', '<p>M&aacute;y Ps4 pro b&aacute;n bởi Hotgamestore - Đại l&yacute; ch&iacute;nh h&atilde;ng Playstation của Sony tại Việt Nam - l&agrave; m&aacute;y nhập khẩu ch&iacute;nh h&atilde;ng, bảo h&agrave;nh tại Trung t&acirc;m hỗ trợ bảo h&agrave;nh Sony to&agrave;n Việt Nam. M&aacute;y Ps4 pro được k&iacute;ch hoạt bảo h&agrave;nh ngay khi kh&aacute;ch h&agrave;ng&nbsp;mua m&aacute;y, qu&yacute; kh&aacute;ch kh&ocirc;ng cần bất cứ giấy tờ g&igrave; khi mang m&aacute;y Ps4 pro đi bảo h&agrave;nh .</p>', 4, 10, '2021-07-03 00:58:24', NULL, '12344468.jpg', NULL, NULL, '<p>Combo M&aacute;y PS4 slim 1T k&egrave;m 2 tay v&agrave; đĩa PES 20</p>', 'combo-may-ps4-slim-1t-kem-2-tay-va-dia-pes-20'),
(9, 'Tai nghe 5G đỏ', '15000000', '/storage/product/4/o6hVpSJ0h9M4PuXXOXLn.jpg', '<p>Tai nghe 5G đỏ</p>', 4, 4, '2021-07-03 01:01:29', NULL, 'tải xuống (1)44.jpg', NULL, NULL, '<p>Tai nghe 5G đỏ</p>', 'tai-nghe-5g-do'),
(10, 'Máy PS4 slim Mega pack 2', '7550000', '/storage/product/4/SMskuz5MRBR2gVVCyCTZ.jpg', '<p>M&aacute;y PS4 slim mega pack h&agrave;ng ch&iacute;nh h&atilde;ng Sony Việt Nam. Bảo h&agrave;nh h&atilde;ng 01 năm. Miễn ph&iacute; lắp đặt n&ocirc;i th&agrave;nh H&agrave; nội. Ship COD to&agrave;n quốc. Hỗ trợ trả g&oacute;p l&atilde;i xuất 0%</p>\r\n<p>Bộ sản phẩm gồm :</p>\r\n<p>- 01 bộ m&aacute;y PS4 slim ổ cứng 1T đời mới nhất cuh 2218 ( đ&atilde; c&oacute; 01 tay theo m&aacute;y )</p>\r\n<p>- 03 đĩa game mới nguy&ecirc;n seal: God of war 4, Horizon complete edition v&agrave; GTA 5</p>\r\n<p>KH&Ocirc;NG LẤY QU&Agrave; TẶNG VUI L&Ograve;NG INBOX SHOP HOẶC GỌI HOTLINE 0936011022<img src=\"/storage/photos/4/ps4_slim_mega_pack_.jpg\" alt=\"\" width=\"700\" height=\"700\" /></p>', 4, 10, '2021-07-03 01:06:07', NULL, 'mayps381.jpg', NULL, NULL, '<p>M&aacute;y PS4 slim Mega pack 2</p>', 'may-ps4-slim-mega-pack-2');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`, `image_name`) VALUES
(1, '/storage/product/4/UqKeEVP02HWYSvZuSlLm.jpg', 1, '2021-06-21 21:40:53', '2021-06-21 21:40:53', 'nike-air-jordan-1-high-university-blue-1-1.jpg'),
(2, '/storage/product/4/ywm7W7uAtl7j17jB0911.jpg', 1, '2021-06-21 21:40:53', '2021-06-21 21:40:53', 'nike-air-jordan-1-high-university-blue-1-1-1.jpg'),
(3, '/storage/product/4/usJLX8iirTwvbg2d4s1G.jpg', 1, '2021-06-21 21:40:53', '2021-06-21 21:40:53', 'nike-air-jordan-1-mid-satin-grey-toe.jpg'),
(4, '/storage/product/4/GFQDrszs4hxPaTpAd8Hf.jpg', 2, '2021-06-21 21:51:44', '2021-06-21 21:51:44', 'nike-air-jordan-1-high-university-blue-1-1.jpg'),
(5, '/storage/product/4/UgL9JZ7MFfq9wAueARNV.jpg', 2, '2021-06-21 21:51:44', '2021-06-21 21:51:44', 'nike-air-jordan-1-high-university-blue-1-1-1.jpg'),
(6, '/storage/product/4/kb81IoQFwvaxPnWG1OiL.jpg', 2, '2021-06-21 21:51:44', '2021-06-21 21:51:44', 'nike-air-jordan-1-mid-satin-grey-toe.jpg'),
(8, '/storage/product/4/aQcEGYL7G5dlLn7LSGwd.jpg', 4, '2021-06-21 23:20:57', '2021-06-21 23:20:57', 'nike-air-jordan-1-mid-satin-grey-toe.jpg'),
(9, '/storage/product/4/VAqOHpgTGfT4dKqiwYtM.jpg', 5, '2021-07-03 00:17:12', '2021-07-03 00:17:12', 'dogn ho66.jpg'),
(10, '/storage/product/4/x7LOtB56bjSyIwwUebKB.jpg', 6, '2021-07-03 00:31:01', '2021-07-03 00:31:01', 'tainghe80.jpg'),
(11, '/storage/product/4/nkORETo2lRKCjTKkIAkt.jpg', 7, '2021-07-03 00:44:22', '2021-07-03 00:44:22', 'samsung80.jpg'),
(12, '/storage/product/4/sN3EpxB43PNSgaFYgXFD.jpg', 8, '2021-07-03 00:58:24', '2021-07-03 00:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation8.jpg'),
(13, '/storage/product/4/Lnal1eLuzhFTNneK8Pdp.jpg', 8, '2021-07-03 00:58:24', '2021-07-03 00:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation40.jpg'),
(14, '/storage/product/4/URaQMP5Pkb7lWWemDWbM.jpg', 8, '2021-07-03 00:58:24', '2021-07-03 00:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation61.jpg'),
(15, '/storage/product/4/cvd2wca4HRkB2NetMqkO.jpg', 8, '2021-07-03 00:58:24', '2021-07-03 00:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Trắng-Dualshock-4-white-GameStation36.jpg'),
(16, '/storage/product/4/roHFshsgvFEG7hqZQqMg.jpg', 9, '2021-07-03 01:01:29', '2021-07-03 01:01:29', 'tải xuống (1)44.jpg'),
(17, '/storage/product/4/pbZQrtDd7Yt1J5T3UALR.jpg', 10, '2021-07-03 01:06:07', '2021-07-03 01:06:07', 'mayps381.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-06-21 21:40:53', '2021-06-21 21:40:53'),
(2, 2, 2, '2021-06-21 21:51:44', '2021-06-21 21:51:44'),
(3, 4, 1, '2021-06-21 23:20:57', '2021-06-21 23:20:57'),
(4, 5, 3, '2021-07-03 00:17:12', '2021-07-03 00:17:12'),
(5, 6, 4, '2021-07-03 00:31:01', '2021-07-03 00:31:01'),
(6, 7, 5, '2021-07-03 00:44:22', '2021-07-03 00:44:22'),
(7, 8, 6, '2021-07-03 00:58:24', '2021-07-03 00:58:24'),
(8, 8, 7, '2021-07-03 00:58:24', '2021-07-03 00:58:24'),
(9, 9, 8, '2021-07-03 01:01:29', '2021-07-03 01:01:29'),
(10, 10, 9, '2021-07-03 01:06:07', '2021-07-03 01:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Quản trị hệ thống', NULL, '2021-06-18 18:37:30', NULL),
(2, 'Tester', 'Người kiểm tra hệ thống', NULL, '2021-06-18 18:37:05', NULL),
(3, 'developer', 'Phát triển hệ thống', NULL, NULL, NULL),
(4, 'content', 'Chỉnh sửa nội dung', NULL, NULL, NULL),
(5, 'Editor', 'Người soạn thoải văn bản', '2021-06-16 20:25:24', '2021-06-16 20:25:24', NULL),
(6, 'Editor1', 'Người soạn thoải văn bản1', '2021-06-16 21:11:22', '2021-06-16 21:24:40', '2021-06-16 21:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`) VALUES
(1, 'phone_contact', '0929690966', '2021-06-18 17:30:26', '2021-06-18 17:30:26', 'Text'),
(2, 'email', 'admin@gmail.com', '2021-06-18 17:30:56', '2021-06-18 17:30:56', 'Text'),
(3, 'facebook_link', 'https://www.facebook.com/me', '2021-06-18 17:33:53', '2021-06-18 20:12:52', 'Text'),
(4, 'linkendin_link', 'https://www.linkendin.com/profile.php?id=100053321355897', '2021-06-18 17:34:19', '2021-06-18 17:34:19', 'Text'),
(5, 'footer_information', '<p class=\"pull-left\">Copyright © 2021 </p>\r\n                <p class=\"pull-right\">Designed by <span><a style=\"text-decoration: none\" target=\"_blank\"\r\n                                                           href=\"http://fb.com/xuanbachpc\">Coder</a></span></p>', '2021-06-18 17:36:46', '2021-06-18 17:58:46', 'Textarea');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_notes`, `created_at`, `updated_at`, `shipping_method`) VALUES
(1, 'baac', 'abc@gmail.com', '8023809812', 'hn', '123hn', NULL, NULL, 1),
(2, 'baac', 'abc@gmail.com', '8023809812', 'Ha noi', 'giao vao buoi chieu', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//S1se9fSbn94gYCWputJp.jpg', 'rmn10Sliding_690x300 (1).jpg', '2021-06-18 02:58:36', '2021-06-18 03:04:03', NULL),
(2, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//WoUWyVnkN9nodWwQ630x.png', 'banner_2.png', '2021-06-18 03:13:22', '2021-06-18 03:13:22', NULL),
(3, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//yb0bqIz1vDdnp9MsBllJ.png', 'banner_3.png', '2021-06-18 03:15:53', '2021-06-18 03:15:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'nike', '2021-06-21 21:40:53', '2021-06-21 21:40:53'),
(2, 'nike 12', '2021-06-21 21:51:44', '2021-06-21 21:51:44'),
(3, 'Đồng hồ thông minh Apple', '2021-07-03 00:17:12', '2021-07-03 00:17:12'),
(4, 'Tai nghe 5G', '2021-07-03 00:31:01', '2021-07-03 00:31:01'),
(5, 'Samsung Galaxy ultra 20', '2021-07-03 00:44:22', '2021-07-03 00:44:22'),
(6, 'ps4', '2021-07-03 00:58:24', '2021-07-03 00:58:24'),
(7, 'máy ps4', '2021-07-03 00:58:24', '2021-07-03 00:58:24'),
(8, 'Tai nghe 5G đỏ', '2021-07-03 01:01:29', '2021-07-03 01:01:29'),
(9, 'ps 381', '2021-07-03 01:06:07', '2021-07-03 01:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Xuân Bách', 'xuanbachdev@gmail.com', NULL, '$2y$10$iFNfTm0m/0x/36ggimLT0.aFACKTMyV3OskopeVvmtobLwKiXQmIC', 'jxJRyCEFd3O7FtKWcIftdPgqv3IcuRhsSEt6tHbrHDJusw10qcInli5tPy1d', NULL, '2021-06-17 13:38:58', NULL),
(2, 'Anonymous123', 'anonymous@gmail.com', NULL, '$2y$10$C2M.xne571cNOPUQo4T0D.Ruvon8VxBPt6XvZGyQFhMJRFuRr8.eS', NULL, '2021-06-16 16:46:22', '2021-06-17 00:42:50', NULL),
(3, 'Tester', 'tester@gmail.com', NULL, '$2y$10$iM4Y0UOolTw8eagf5JprEOsy.UIYKB9LANVnp5zkHrfIpcEDn0eNO', NULL, '2021-06-16 17:26:49', '2021-06-16 17:30:35', '2021-06-16 17:30:35'),
(4, 'Admin', 'admin', NULL, '$2y$10$S9xsNJq4ex3Kd3jFQ3Yl6e/8cmcR90i4wiYwx8uQv.Ag8WZme38Aq', 'VdpXJnf6dYlOUSSjojJwT7ERyDso8Ndg6xuTG8aracIeIBQWLtGlnxLIIE8t', '2021-06-18 18:28:35', '2021-06-18 18:33:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`) USING BTREE;

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`) USING BTREE;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`) USING BTREE;

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`) USING BTREE;

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
