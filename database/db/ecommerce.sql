/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : ecommerce

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 03/07/2021 15:33:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Giày thể thao', 0, 'giay-the-thao', '2021-06-18 18:50:50', '2021-06-20 07:08:29', NULL);
INSERT INTO `categories` VALUES (2, 'Đồng hồ', 0, 'dong-ho', '2021-06-18 19:15:36', '2021-07-03 06:56:01', NULL);
INSERT INTO `categories` VALUES (3, 'Loa', 0, 'loa', '2021-06-18 19:15:47', '2021-07-03 06:56:17', NULL);
INSERT INTO `categories` VALUES (4, 'Tai nghe', 0, 'tai-nghe', '2021-06-18 19:15:58', '2021-07-03 06:56:45', NULL);
INSERT INTO `categories` VALUES (5, 'Điện thoại', 0, 'dien-thoai', '2021-06-18 19:38:29', '2021-07-03 06:57:02', NULL);
INSERT INTO `categories` VALUES (6, 'Phụ kiện điện thoại', 0, 'phu-kien-dien-thoai', '2021-06-18 19:38:37', '2021-07-03 07:01:28', NULL);
INSERT INTO `categories` VALUES (7, 'PC, phụ kiện PC', 0, 'pc-phu-kien-pc', '2021-06-18 19:43:04', '2021-07-03 07:02:14', NULL);
INSERT INTO `categories` VALUES (8, 'Thiết bị mạng, phần mềm', 0, 'thiet-bi-mang-phan-mem', '2021-06-18 19:43:20', '2021-07-03 07:03:03', NULL);
INSERT INTO `categories` VALUES (9, 'Linh kiện điện tử', 0, 'linh-kien-dien-tu', '2021-06-18 19:43:36', '2021-07-03 07:03:41', NULL);
INSERT INTO `categories` VALUES (10, 'Máy chơi game', 0, 'may-choi-game', '2021-06-18 19:43:43', '2021-07-03 07:03:57', NULL);
INSERT INTO `categories` VALUES (11, 'NIKE', 1, 'nike', '2021-06-18 19:44:18', '2021-06-18 19:44:18', NULL);
INSERT INTO `categories` VALUES (12, 'UNDER ARMOUR', 1, 'under-armour', '2021-06-18 19:44:48', '2021-06-18 19:44:48', NULL);
INSERT INTO `categories` VALUES (13, 'ADIDAS', 1, 'adidas', '2021-06-18 19:45:00', '2021-06-18 19:45:00', NULL);
INSERT INTO `categories` VALUES (14, 'Đồng hồ thông minh', 2, 'dong-ho-thong-minh', '2021-06-18 19:45:34', '2021-07-03 07:07:13', NULL);
INSERT INTO `categories` VALUES (15, 'Laptop', 0, 'laptop', '2021-06-18 19:45:51', '2021-07-03 07:05:00', NULL);
INSERT INTO `categories` VALUES (16, 'Loa bluetooth', 3, 'loa-bluetooth', '2021-06-18 19:46:46', '2021-07-03 07:06:54', NULL);
INSERT INTO `categories` VALUES (17, 'Quần áo', 0, 'quan-ao', '2021-06-22 12:12:04', '2021-07-03 07:06:13', NULL);
INSERT INTO `categories` VALUES (18, 'Điện thoại sam sung', 5, 'dien-thoai-sam-sung', '2021-07-03 07:36:36', '2021-07-03 07:36:36', NULL);

-- ----------------------------
-- Table structure for coupons
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons`  (
  `coupon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_time` int(11) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`coupon_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupons
-- ----------------------------
INSERT INTO `coupons` VALUES (1, 'Giảm giá mùa covid', 12, 1, 10, 'XBIT2X', '2021-06-30 17:19:46', '2021-06-30 17:19:46');
INSERT INTO `coupons` VALUES (2, 'Giảm giá mùa covid 2021', 10, 2, 1000000, 'XBIT2X123', '2021-06-30 17:21:18', '2021-06-30 17:21:18');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `customer_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'Xuan Bach', 1, '+84646465465', 'Hà Nội', 'bachvip@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (2, 'ABC', 1, '+84646465465', 'Hà Nội', 'abcsss@gmail.com', '$2y$10$ZJuZnzDWG3/RFq12pggzsuZoNmaTnFzmrBDTyKIbxXC.QJ0lQEtei', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (3, 'ABC', 0, '09009293113', '123', 'a67687bc@gmail.com', '$2y$10$YblVUcXHwJMGJjfyJJOy3uvTmpKA0gzKVgdYLGm8FoHB7CahyS5oO', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (4, 'ABC', 1, '09009293113', 'Hà Nội', 'adm2222in@gmail.com', '$2y$10$RD9EF7yT5QYjJ496iJdLm.GqWC.RgvD8gLis6mc/WgQTDV3uoOpQC', '2021-06-25 14:21:05', '2021-06-25 14:21:05', NULL);
INSERT INTO `customers` VALUES (5, 'Tricker', 1, '+84646465465', 'Hà Nội', 'adm2222in@gmail.com', '$2y$10$5.Ai2EHB.s4EfXVarjFnK.TqVq7u6PpE86qt.ykvBJRpkl0VGuNIu', '2021-06-25 14:28:39', '2021-06-25 14:28:39', NULL);
INSERT INTO `customers` VALUES (6, 'ABC', 0, '+84646465465', 'Hà Nội', 'admin@gmail.com', '$2y$10$XpfqUOiXGgsissTITqYqheXCe6tdFj0KOWAEt4zJXZ.ijxzc2zPqC', '2021-06-25 14:33:09', '2021-06-25 14:33:09', NULL);
INSERT INTO `customers` VALUES (7, 'Tricker', 1, '09009293113333', 'Hà Nội', 'tricker@gmail.com', '$2y$10$74qsfdl9Fw6rtsFYZpzfgeMveXi0g/bFDlDGnz9c3c6IixeH4VFFW', '2021-06-26 03:33:54', '2021-06-26 03:33:54', NULL);
INSERT INTO `customers` VALUES (8, 'Bhsajd', 1, '+84646465465', 'Hà Nội', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-06-26 03:44:08', '2021-06-26 03:44:08', NULL);
INSERT INTO `customers` VALUES (9, 'ABC', 1, '09009293113', 'Hà Nội', 'abc@gmail.com', '$2y$10$5.c8Y95uNaj6q1aKSyZWI.OcNvLA6JfpNS/U2KNmz68Qu1oWj6lRu', '2021-06-26 06:45:17', '2021-06-26 06:45:17', NULL);
INSERT INTO `customers` VALUES (10, 'Admin', 0, '+84646465465', 'Hà Nội', 'abc@gmail.comq', '202cb962ac59075b964b07152d234b70', '2021-06-26 09:16:48', '2021-06-26 09:16:48', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Menu 1', 0, NULL, '2021-06-16 06:42:21', '', '2021-06-16 06:42:21');
INSERT INTO `menus` VALUES (2, 'Menu 2', 0, NULL, '2021-06-17 09:13:42', 'menu-2', NULL);
INSERT INTO `menus` VALUES (3, 'Menu 3', 0, NULL, '2021-06-30 17:26:25', 'menu-3', NULL);
INSERT INTO `menus` VALUES (4, 'Menu 1.1-edit', 1, NULL, '2021-06-15 00:59:02', 'menu-11-edit', '2021-06-15 00:59:02');
INSERT INTO `menus` VALUES (5, 'Menu 1.2', 1, NULL, NULL, '', NULL);
INSERT INTO `menus` VALUES (6, 'Menu 1.1.1', 4, NULL, NULL, '', NULL);
INSERT INTO `menus` VALUES (7, 'Menu 1.2.1', 5, NULL, NULL, '', NULL);
INSERT INTO `menus` VALUES (8, 'Menu 2.1-edit', 2, NULL, '2021-06-15 00:52:58', 'menu-21-edit', NULL);
INSERT INTO `menus` VALUES (9, 'Menu 3.1', 3, NULL, NULL, '', NULL);
INSERT INTO `menus` VALUES (10, 'Menu 1.1.1.1', 6, '2021-06-15 00:17:34', '2021-06-15 00:17:34', '', NULL);
INSERT INTO `menus` VALUES (11, 'Menu 4', 0, '2021-06-15 00:23:56', '2021-06-15 00:23:56', '', NULL);
INSERT INTO `menus` VALUES (12, 'Menu 4.1', 11, '2021-06-15 00:24:18', '2021-06-15 00:24:18', '', NULL);
INSERT INTO `menus` VALUES (13, 'Menu 5', 0, '2021-06-15 00:30:20', '2021-06-15 00:30:20', 'menu-5', NULL);
INSERT INTO `menus` VALUES (14, 'Menu 5.1', 13, '2021-06-15 00:32:26', '2021-06-15 00:32:26', 'menu-51', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_06_13_222806_create_categories_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_06_15_022813_add_column_deleted_at_to_table_categories', 1);
INSERT INTO `migrations` VALUES (6, '2021_06_15_023733_create_menus_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_06_15_072600_add_column_slug_to_menus_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_06_15_075426_add_collumn_soft_delete_to_menus_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_06_15_103633_create_products_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_06_15_103954_create_product_images_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_06_15_104112_create_tags_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_06_15_104220_create_product_tags_table', 1);
INSERT INTO `migrations` VALUES (13, '2021_06_15_162313_add_column_feature_image_name', 1);
INSERT INTO `migrations` VALUES (14, '2021_06_15_192111_add_column_image_name_to_table_product_image', 1);
INSERT INTO `migrations` VALUES (15, '2021_06_16_032608_add_column_deleted_at_to_product_table', 1);
INSERT INTO `migrations` VALUES (16, '2021_06_16_052302_create_sliders_table', 1);
INSERT INTO `migrations` VALUES (17, '2021_06_16_114935_add_column_deleted_at_to_sliders', 1);
INSERT INTO `migrations` VALUES (18, '2021_06_16_134831_create_settings_table', 1);
INSERT INTO `migrations` VALUES (19, '2021_06_16_145523_add_column_type_settings_table', 1);
INSERT INTO `migrations` VALUES (20, '2021_06_16_185752_create_roles_table', 1);
INSERT INTO `migrations` VALUES (21, '2021_06_16_190045_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (22, '2021_06_16_190247_create_table_user_role', 1);
INSERT INTO `migrations` VALUES (23, '2021_06_16_190539_create_table_permission_role', 1);
INSERT INTO `migrations` VALUES (24, '2021_06_17_072051_add_column_deleted_at_table_users', 1);
INSERT INTO `migrations` VALUES (25, '2021_06_17_084214_add_column_parent_id_permission', 1);
INSERT INTO `migrations` VALUES (26, '2021_06_17_111802_add_column_deleted_at_to_table_roles', 1);
INSERT INTO `migrations` VALUES (27, '2021_06_18_032630_add_column_key_permission_table', 1);
INSERT INTO `migrations` VALUES (28, '2021_06_19_115939_create_tbl_admin_table', 1);
INSERT INTO `migrations` VALUES (29, '2021_06_22_091228_add_column_views_products', 1);
INSERT INTO `migrations` VALUES (30, '2021_06_22_091501_add_column_description_products', 1);
INSERT INTO `migrations` VALUES (31, '2021_06_24_164131_create_customers_table', 1);
INSERT INTO `migrations` VALUES (32, '2021_06_25_071020_shop_order', 1);
INSERT INTO `migrations` VALUES (33, '2021_06_25_090816_tbl_shipping', 2);
INSERT INTO `migrations` VALUES (34, '2021_06_25_153818_add_column_remember_token_to_table_customer', 3);
INSERT INTO `migrations` VALUES (35, '2021_06_27_151420_create_table_tbl_payment', 4);
INSERT INTO `migrations` VALUES (36, '2021_06_27_152823_create_table_tbl_order', 4);
INSERT INTO `migrations` VALUES (37, '2021_06_27_152906_create_table_tbl_order_details', 4);
INSERT INTO `migrations` VALUES (38, '2021_06_29_063238_add_column_product_slug_to_table_products', 5);
INSERT INTO `migrations` VALUES (39, '2021_06_30_164501_create_coupons_table', 6);
INSERT INTO `migrations` VALUES (40, '2021_07_01_073344_add_column_shipping_method_to_table_tbl_shipping', 7);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_status` int(20) NOT NULL,
  `order_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, 8, 1, 2, '12e82', '2021-07-01 08:36:18', '2021-07-02 19:06:47');
INSERT INTO `order` VALUES (2, 8, 2, 1, '69259', '2021-07-01 10:36:13', '2021-07-02 19:12:48');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_coupon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, '69259', 4, 'giay nikie1', '23000000', 3, 'XBIT2X123', '2021-07-01 17:36:13', '2021-07-01 17:36:13');
INSERT INTO `order_details` VALUES (2, '12e82', 1, 'Giày Nike', '19000000', 2, 'no', NULL, NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 108 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 5, 7, NULL, NULL);
INSERT INTO `permission_role` VALUES (2, 5, 8, NULL, NULL);
INSERT INTO `permission_role` VALUES (3, 5, 9, NULL, NULL);
INSERT INTO `permission_role` VALUES (4, 5, 10, NULL, NULL);
INSERT INTO `permission_role` VALUES (13, 6, 4, NULL, NULL);
INSERT INTO `permission_role` VALUES (14, 6, 5, NULL, NULL);
INSERT INTO `permission_role` VALUES (52, 2, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (80, 1, 2, NULL, NULL);
INSERT INTO `permission_role` VALUES (81, 1, 3, NULL, NULL);
INSERT INTO `permission_role` VALUES (82, 1, 4, NULL, NULL);
INSERT INTO `permission_role` VALUES (83, 1, 5, NULL, NULL);
INSERT INTO `permission_role` VALUES (84, 1, 7, NULL, NULL);
INSERT INTO `permission_role` VALUES (85, 1, 8, NULL, NULL);
INSERT INTO `permission_role` VALUES (86, 1, 9, NULL, NULL);
INSERT INTO `permission_role` VALUES (87, 1, 10, NULL, NULL);
INSERT INTO `permission_role` VALUES (88, 1, 12, NULL, NULL);
INSERT INTO `permission_role` VALUES (89, 1, 13, NULL, NULL);
INSERT INTO `permission_role` VALUES (90, 1, 14, NULL, NULL);
INSERT INTO `permission_role` VALUES (91, 1, 15, NULL, NULL);
INSERT INTO `permission_role` VALUES (92, 1, 17, NULL, NULL);
INSERT INTO `permission_role` VALUES (93, 1, 18, NULL, NULL);
INSERT INTO `permission_role` VALUES (94, 1, 19, NULL, NULL);
INSERT INTO `permission_role` VALUES (95, 1, 20, NULL, NULL);
INSERT INTO `permission_role` VALUES (96, 1, 22, NULL, NULL);
INSERT INTO `permission_role` VALUES (97, 1, 23, NULL, NULL);
INSERT INTO `permission_role` VALUES (98, 1, 24, NULL, NULL);
INSERT INTO `permission_role` VALUES (99, 1, 25, NULL, NULL);
INSERT INTO `permission_role` VALUES (100, 1, 27, NULL, NULL);
INSERT INTO `permission_role` VALUES (101, 1, 28, NULL, NULL);
INSERT INTO `permission_role` VALUES (102, 1, 29, NULL, NULL);
INSERT INTO `permission_role` VALUES (103, 1, 30, NULL, NULL);
INSERT INTO `permission_role` VALUES (104, 1, 32, NULL, NULL);
INSERT INTO `permission_role` VALUES (105, 1, 33, NULL, NULL);
INSERT INTO `permission_role` VALUES (106, 1, 34, NULL, NULL);
INSERT INTO `permission_role` VALUES (107, 1, 35, NULL, NULL);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Category', 'Category', '2021-06-17 20:33:49', '2021-06-17 20:33:49', 0, NULL);
INSERT INTO `permissions` VALUES (2, 'List', 'List', '2021-06-17 20:33:49', '2021-06-17 20:33:49', 1, 'Category_List');
INSERT INTO `permissions` VALUES (3, 'Add', 'Add', '2021-06-17 20:33:49', '2021-06-17 20:33:49', 1, 'Category_Add');
INSERT INTO `permissions` VALUES (4, 'Edit', 'Edit', '2021-06-17 20:33:49', '2021-06-17 20:33:49', 1, 'Category_Edit');
INSERT INTO `permissions` VALUES (5, 'Delete', 'Delete', '2021-06-17 20:33:49', '2021-06-17 20:33:49', 1, 'Category_Delete');
INSERT INTO `permissions` VALUES (6, 'Slider', 'Slider', '2021-06-17 20:33:59', '2021-06-17 20:33:59', 0, NULL);
INSERT INTO `permissions` VALUES (7, 'List', 'List', '2021-06-17 20:33:59', '2021-06-17 20:33:59', 6, 'Slider_List');
INSERT INTO `permissions` VALUES (8, 'Add', 'Add', '2021-06-17 20:33:59', '2021-06-17 20:33:59', 6, 'Slider_Add');
INSERT INTO `permissions` VALUES (9, 'Edit', 'Edit', '2021-06-17 20:33:59', '2021-06-17 20:33:59', 6, 'Slider_Edit');
INSERT INTO `permissions` VALUES (10, 'Delete', 'Delete', '2021-06-17 20:33:59', '2021-06-17 20:33:59', 6, 'Slider_Delete');
INSERT INTO `permissions` VALUES (11, 'Menu', 'Menu', '2021-06-17 20:34:09', '2021-06-17 20:34:09', 0, NULL);
INSERT INTO `permissions` VALUES (12, 'List', 'List', '2021-06-17 20:34:09', '2021-06-17 20:34:09', 11, 'Menu_List');
INSERT INTO `permissions` VALUES (13, 'Add', 'Add', '2021-06-17 20:34:09', '2021-06-17 20:34:09', 11, 'Menu_Add');
INSERT INTO `permissions` VALUES (14, 'Edit', 'Edit', '2021-06-17 20:34:09', '2021-06-17 20:34:09', 11, 'Menu_Edit');
INSERT INTO `permissions` VALUES (15, 'Delete', 'Delete', '2021-06-17 20:34:09', '2021-06-17 20:34:09', 11, 'Menu_Delete');
INSERT INTO `permissions` VALUES (16, 'Product', 'Product', '2021-06-17 20:34:19', '2021-06-17 20:34:19', 0, NULL);
INSERT INTO `permissions` VALUES (17, 'List', 'List', '2021-06-17 20:34:19', '2021-06-17 20:34:19', 16, 'Product_List');
INSERT INTO `permissions` VALUES (18, 'Add', 'Add', '2021-06-17 20:34:19', '2021-06-17 20:34:19', 16, 'Product_Add');
INSERT INTO `permissions` VALUES (19, 'Edit', 'Edit', '2021-06-17 20:34:19', '2021-06-17 20:34:19', 16, 'Product_Edit');
INSERT INTO `permissions` VALUES (20, 'Delete', 'Delete', '2021-06-17 20:34:19', '2021-06-17 20:34:19', 16, 'Product_Delete');
INSERT INTO `permissions` VALUES (21, 'Setting', 'Setting', '2021-06-17 20:34:23', '2021-06-17 20:34:23', 0, NULL);
INSERT INTO `permissions` VALUES (22, 'List', 'List', '2021-06-17 20:34:23', '2021-06-17 20:34:23', 21, 'Setting_List');
INSERT INTO `permissions` VALUES (23, 'Add', 'Add', '2021-06-17 20:34:23', '2021-06-17 20:34:23', 21, 'Setting_Add');
INSERT INTO `permissions` VALUES (24, 'Edit', 'Edit', '2021-06-17 20:34:23', '2021-06-17 20:34:23', 21, 'Setting_Edit');
INSERT INTO `permissions` VALUES (25, 'Delete', 'Delete', '2021-06-17 20:34:23', '2021-06-17 20:34:23', 21, 'Setting_Delete');
INSERT INTO `permissions` VALUES (26, 'User', 'User', '2021-06-17 20:34:44', '2021-06-17 20:34:44', 0, NULL);
INSERT INTO `permissions` VALUES (27, 'List', 'List', '2021-06-17 20:34:44', '2021-06-17 20:34:44', 26, 'User_List');
INSERT INTO `permissions` VALUES (28, 'Add', 'Add', '2021-06-17 20:34:44', '2021-06-17 20:34:44', 26, 'User_Add');
INSERT INTO `permissions` VALUES (29, 'Edit', 'Edit', '2021-06-17 20:34:44', '2021-06-17 20:34:44', 26, 'User_Edit');
INSERT INTO `permissions` VALUES (30, 'Delete', 'Delete', '2021-06-17 20:34:44', '2021-06-17 20:34:44', 26, 'User_Delete');
INSERT INTO `permissions` VALUES (31, 'Role', 'Role', '2021-06-17 20:35:02', '2021-06-17 20:35:02', 0, NULL);
INSERT INTO `permissions` VALUES (32, 'List', 'List', '2021-06-17 20:35:02', '2021-06-17 20:35:02', 31, 'Role_List');
INSERT INTO `permissions` VALUES (33, 'Add', 'Add', '2021-06-17 20:35:02', '2021-06-17 20:35:02', 31, 'Role_Add');
INSERT INTO `permissions` VALUES (34, 'Edit', 'Edit', '2021-06-17 20:35:02', '2021-06-17 20:35:02', 31, 'Role_Edit');
INSERT INTO `permissions` VALUES (35, 'Delete', 'Delete', '2021-06-17 20:35:02', '2021-06-17 20:35:02', 31, 'Role_Delete');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES (1, '/storage/product/4/UqKeEVP02HWYSvZuSlLm.jpg', 1, '2021-06-22 04:40:53', '2021-06-22 04:40:53', 'nike-air-jordan-1-high-university-blue-1-1.jpg');
INSERT INTO `product_images` VALUES (2, '/storage/product/4/ywm7W7uAtl7j17jB0911.jpg', 1, '2021-06-22 04:40:53', '2021-06-22 04:40:53', 'nike-air-jordan-1-high-university-blue-1-1-1.jpg');
INSERT INTO `product_images` VALUES (3, '/storage/product/4/usJLX8iirTwvbg2d4s1G.jpg', 1, '2021-06-22 04:40:53', '2021-06-22 04:40:53', 'nike-air-jordan-1-mid-satin-grey-toe.jpg');
INSERT INTO `product_images` VALUES (4, '/storage/product/4/GFQDrszs4hxPaTpAd8Hf.jpg', 2, '2021-06-22 04:51:44', '2021-06-22 04:51:44', 'nike-air-jordan-1-high-university-blue-1-1.jpg');
INSERT INTO `product_images` VALUES (5, '/storage/product/4/UgL9JZ7MFfq9wAueARNV.jpg', 2, '2021-06-22 04:51:44', '2021-06-22 04:51:44', 'nike-air-jordan-1-high-university-blue-1-1-1.jpg');
INSERT INTO `product_images` VALUES (6, '/storage/product/4/kb81IoQFwvaxPnWG1OiL.jpg', 2, '2021-06-22 04:51:44', '2021-06-22 04:51:44', 'nike-air-jordan-1-mid-satin-grey-toe.jpg');
INSERT INTO `product_images` VALUES (8, '/storage/product/4/aQcEGYL7G5dlLn7LSGwd.jpg', 4, '2021-06-22 06:20:57', '2021-06-22 06:20:57', 'nike-air-jordan-1-mid-satin-grey-toe.jpg');
INSERT INTO `product_images` VALUES (9, '/storage/product/4/VAqOHpgTGfT4dKqiwYtM.jpg', 5, '2021-07-03 07:17:12', '2021-07-03 07:17:12', 'dogn ho66.jpg');
INSERT INTO `product_images` VALUES (10, '/storage/product/4/x7LOtB56bjSyIwwUebKB.jpg', 6, '2021-07-03 07:31:01', '2021-07-03 07:31:01', 'tainghe80.jpg');
INSERT INTO `product_images` VALUES (11, '/storage/product/4/nkORETo2lRKCjTKkIAkt.jpg', 7, '2021-07-03 07:44:22', '2021-07-03 07:44:22', 'samsung80.jpg');
INSERT INTO `product_images` VALUES (12, '/storage/product/4/sN3EpxB43PNSgaFYgXFD.jpg', 8, '2021-07-03 07:58:24', '2021-07-03 07:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation8.jpg');
INSERT INTO `product_images` VALUES (13, '/storage/product/4/Lnal1eLuzhFTNneK8Pdp.jpg', 8, '2021-07-03 07:58:24', '2021-07-03 07:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation40.jpg');
INSERT INTO `product_images` VALUES (14, '/storage/product/4/URaQMP5Pkb7lWWemDWbM.jpg', 8, '2021-07-03 07:58:24', '2021-07-03 07:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Đỏ-Dualshock-4-red-GameStation61.jpg');
INSERT INTO `product_images` VALUES (15, '/storage/product/4/cvd2wca4HRkB2NetMqkO.jpg', 8, '2021-07-03 07:58:24', '2021-07-03 07:58:24', 'Tay-cầm-PS4-Slim-Chính-Hãng-Màu-Trắng-Dualshock-4-white-GameStation36.jpg');
INSERT INTO `product_images` VALUES (16, '/storage/product/4/roHFshsgvFEG7hqZQqMg.jpg', 9, '2021-07-03 08:01:29', '2021-07-03 08:01:29', 'tải xuống (1)44.jpg');
INSERT INTO `product_images` VALUES (17, '/storage/product/4/pbZQrtDd7Yt1J5T3UALR.jpg', 10, '2021-07-03 08:06:07', '2021-07-03 08:06:07', 'mayps381.jpg');

-- ----------------------------
-- Table structure for product_tags
-- ----------------------------
DROP TABLE IF EXISTS `product_tags`;
CREATE TABLE `product_tags`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_tags
-- ----------------------------
INSERT INTO `product_tags` VALUES (1, 1, 1, '2021-06-22 04:40:53', '2021-06-22 04:40:53');
INSERT INTO `product_tags` VALUES (2, 2, 2, '2021-06-22 04:51:44', '2021-06-22 04:51:44');
INSERT INTO `product_tags` VALUES (3, 4, 1, '2021-06-22 06:20:57', '2021-06-22 06:20:57');
INSERT INTO `product_tags` VALUES (4, 5, 3, '2021-07-03 07:17:12', '2021-07-03 07:17:12');
INSERT INTO `product_tags` VALUES (5, 6, 4, '2021-07-03 07:31:01', '2021-07-03 07:31:01');
INSERT INTO `product_tags` VALUES (6, 7, 5, '2021-07-03 07:44:22', '2021-07-03 07:44:22');
INSERT INTO `product_tags` VALUES (7, 8, 6, '2021-07-03 07:58:24', '2021-07-03 07:58:24');
INSERT INTO `product_tags` VALUES (8, 8, 7, '2021-07-03 07:58:24', '2021-07-03 07:58:24');
INSERT INTO `product_tags` VALUES (9, 9, 8, '2021-07-03 08:01:29', '2021-07-03 08:01:29');
INSERT INTO `product_tags` VALUES (10, 10, 9, '2021-07-03 08:06:07', '2021-07-03 08:06:07');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Giày Nike', '19000000', '/storage/product/4/ce8TIuazyFrItOI6QDpg.jpg', '<p>Nike</p>', 4, 11, '2021-06-22 04:40:53', '2021-06-22 04:40:53', 'nike-air-jordan-1-high-university-blue-1-1.jpg', NULL, 6, '<p>Nike đẳng cấp</p>', 'giay-nike');
INSERT INTO `products` VALUES (2, 'giay nikie', '25000000', '/storage/product/4/07wVdMy9aFKinwvH22Q2.jpg', '<p>Nike</p>', 4, 1, '2021-06-22 04:51:44', '2021-06-22 04:51:44', 'nike-air-jordan-1-mid-satin-grey-toe.jpg', NULL, NULL, '<p>NIke</p>', 'giay-nikie');
INSERT INTO `products` VALUES (4, 'giay nikie1', '23000000', '/storage/product/4/fIyKwImEUgvMRJX8d3PW.jpg', '<p>Nike</p>', 4, 1, '2021-06-22 06:20:57', '2021-06-22 21:21:52', 'aQcEGYL7G5dlLn7LSGwd.jpg', '2021-07-03 07:59:01', NULL, '<p>nikee</p>', 'giay-nikie1');
INSERT INTO `products` VALUES (5, 'Đồng hồ thông minh Apple', '28000000', '/storage/product/4/dPm6rAQI8Q67IPaqGApS.jpg', '<p>Đồng hồ th&ocirc;ng minh Apple</p>', 4, 14, NULL, NULL, 'dogn ho66.jpg', NULL, NULL, '<p>Đồng hồ th&ocirc;ng minh Apple</p>', 'dong-ho-thong-minh-apple');
INSERT INTO `products` VALUES (6, 'Tai nghe 5G', '12000000', '/storage/product/4/LRtEijErIkTxDuA714AE.jpg', '<p>Tai nghe 5G</p>', 4, 4, NULL, '2021-07-03 07:57:45', 'tainghe80.jpg', NULL, NULL, '<p>Tai nghe 5G</p>', 'tai-nghe-5g');
INSERT INTO `products` VALUES (7, 'Samsung Galaxy ultra 20', '19000000', '/storage/product/4/jn7QQsNwweqlzJwSKvmu.jpg', '<p>Samsung Galaxy ultra 20</p>', 4, 18, '2021-07-03 07:44:22', '2021-07-03 07:46:07', 'samsung80.jpg', NULL, NULL, '<p>Samsung Galaxy ultra 20</p>', 'samsung-galaxy-ultra-20');
INSERT INTO `products` VALUES (8, 'Combo Máy PS4 slim 1T kèm 2 tay và đĩa PES 20', '11000000', '/storage/product/4/1XWHqA1VBMd4H8RlM6at.jpg', '<p>M&aacute;y Ps4 pro b&aacute;n bởi Hotgamestore - Đại l&yacute; ch&iacute;nh h&atilde;ng Playstation của Sony tại Việt Nam - l&agrave; m&aacute;y nhập khẩu ch&iacute;nh h&atilde;ng, bảo h&agrave;nh tại Trung t&acirc;m hỗ trợ bảo h&agrave;nh Sony to&agrave;n Việt Nam. M&aacute;y Ps4 pro được k&iacute;ch hoạt bảo h&agrave;nh ngay khi kh&aacute;ch h&agrave;ng&nbsp;mua m&aacute;y, qu&yacute; kh&aacute;ch kh&ocirc;ng cần bất cứ giấy tờ g&igrave; khi mang m&aacute;y Ps4 pro đi bảo h&agrave;nh .</p>', 4, 10, '2021-07-03 07:58:24', NULL, '12344468.jpg', NULL, NULL, '<p>Combo M&aacute;y PS4 slim 1T k&egrave;m 2 tay v&agrave; đĩa PES 20</p>', 'combo-may-ps4-slim-1t-kem-2-tay-va-dia-pes-20');
INSERT INTO `products` VALUES (9, 'Tai nghe 5G đỏ', '15000000', '/storage/product/4/o6hVpSJ0h9M4PuXXOXLn.jpg', '<p>Tai nghe 5G đỏ</p>', 4, 4, '2021-07-03 08:01:29', NULL, 'tải xuống (1)44.jpg', NULL, NULL, '<p>Tai nghe 5G đỏ</p>', 'tai-nghe-5g-do');
INSERT INTO `products` VALUES (10, 'Máy PS4 slim Mega pack 2', '7550000', '/storage/product/4/SMskuz5MRBR2gVVCyCTZ.jpg', '<p>M&aacute;y PS4 slim mega pack h&agrave;ng ch&iacute;nh h&atilde;ng Sony Việt Nam. Bảo h&agrave;nh h&atilde;ng 01 năm. Miễn ph&iacute; lắp đặt n&ocirc;i th&agrave;nh H&agrave; nội. Ship COD to&agrave;n quốc. Hỗ trợ trả g&oacute;p l&atilde;i xuất 0%</p>\r\n<p>Bộ sản phẩm gồm :</p>\r\n<p>- 01 bộ m&aacute;y PS4 slim ổ cứng 1T đời mới nhất cuh 2218 ( đ&atilde; c&oacute; 01 tay theo m&aacute;y )</p>\r\n<p>- 03 đĩa game mới nguy&ecirc;n seal: God of war 4, Horizon complete edition v&agrave; GTA 5</p>\r\n<p>KH&Ocirc;NG LẤY QU&Agrave; TẶNG VUI L&Ograve;NG INBOX SHOP HOẶC GỌI HOTLINE 0936011022<img src=\"/storage/photos/4/ps4_slim_mega_pack_.jpg\" alt=\"\" width=\"700\" height=\"700\" /></p>', 4, 10, '2021-07-03 08:06:07', NULL, 'mayps381.jpg', NULL, NULL, '<p>M&aacute;y PS4 slim Mega pack 2</p>', 'may-ps4-slim-mega-pack-2');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (3, 3, 2, NULL, NULL);
INSERT INTO `role_user` VALUES (4, 2, 2, NULL, NULL);
INSERT INTO `role_user` VALUES (5, 1, 1, NULL, NULL);
INSERT INTO `role_user` VALUES (6, 4, 1, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'Quản trị hệ thống', NULL, '2021-06-19 01:37:30', NULL);
INSERT INTO `roles` VALUES (2, 'Tester', 'Người kiểm tra hệ thống', NULL, '2021-06-19 01:37:05', NULL);
INSERT INTO `roles` VALUES (3, 'developer', 'Phát triển hệ thống', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (4, 'content', 'Chỉnh sửa nội dung', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (5, 'Editor', 'Người soạn thoải văn bản', '2021-06-17 03:25:24', '2021-06-17 03:25:24', NULL);
INSERT INTO `roles` VALUES (6, 'Editor1', 'Người soạn thoải văn bản1', '2021-06-17 04:11:22', '2021-06-17 04:24:40', '2021-06-17 04:24:40');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'phone_contact', '0929690966', '2021-06-19 00:30:26', '2021-06-19 00:30:26', 'Text');
INSERT INTO `settings` VALUES (2, 'email', 'admin@gmail.com', '2021-06-19 00:30:56', '2021-06-19 00:30:56', 'Text');
INSERT INTO `settings` VALUES (3, 'facebook_link', 'https://www.facebook.com/me', '2021-06-19 00:33:53', '2021-06-19 03:12:52', 'Text');
INSERT INTO `settings` VALUES (4, 'linkendin_link', 'https://www.linkendin.com/profile.php?id=100053321355897', '2021-06-19 00:34:19', '2021-06-19 00:34:19', 'Text');
INSERT INTO `settings` VALUES (5, 'footer_information', '<p class=\"pull-left\">Copyright © 2021 </p>\r\n                <p class=\"pull-right\">Designed by <span><a style=\"text-decoration: none\" target=\"_blank\"\r\n                                                           href=\"http://fb.com/xuanbachpc\">Coder</a></span></p>', '2021-06-19 00:36:46', '2021-06-19 00:58:46', 'Textarea');

-- ----------------------------
-- Table structure for shipping
-- ----------------------------
DROP TABLE IF EXISTS `shipping`;
CREATE TABLE `shipping`  (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_method` int(11) NOT NULL,
  PRIMARY KEY (`shipping_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shipping
-- ----------------------------
INSERT INTO `shipping` VALUES (1, 'baac', 'abc@gmail.com', '8023809812', 'hn', '123hn', NULL, NULL, 1);
INSERT INTO `shipping` VALUES (2, 'baac', 'abc@gmail.com', '8023809812', 'Ha noi', 'giao vao buoi chieu', NULL, NULL, 0);

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//S1se9fSbn94gYCWputJp.jpg', 'rmn10Sliding_690x300 (1).jpg', '2021-06-18 09:58:36', '2021-06-18 10:04:03', NULL);
INSERT INTO `sliders` VALUES (2, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//WoUWyVnkN9nodWwQ630x.png', 'banner_2.png', '2021-06-18 10:13:22', '2021-06-18 10:13:22', NULL);
INSERT INTO `sliders` VALUES (3, 'Hot sale', 'Flash sale đến 20/07/2021', '/storage/slider//yb0bqIz1vDdnp9MsBllJ.png', 'banner_3.png', '2021-06-18 10:15:53', '2021-06-18 10:15:53', NULL);

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, 'nike', '2021-06-22 04:40:53', '2021-06-22 04:40:53');
INSERT INTO `tags` VALUES (2, 'nike 12', '2021-06-22 04:51:44', '2021-06-22 04:51:44');
INSERT INTO `tags` VALUES (3, 'Đồng hồ thông minh Apple', '2021-07-03 07:17:12', '2021-07-03 07:17:12');
INSERT INTO `tags` VALUES (4, 'Tai nghe 5G', '2021-07-03 07:31:01', '2021-07-03 07:31:01');
INSERT INTO `tags` VALUES (5, 'Samsung Galaxy ultra 20', '2021-07-03 07:44:22', '2021-07-03 07:44:22');
INSERT INTO `tags` VALUES (6, 'ps4', '2021-07-03 07:58:24', '2021-07-03 07:58:24');
INSERT INTO `tags` VALUES (7, 'máy ps4', '2021-07-03 07:58:24', '2021-07-03 07:58:24');
INSERT INTO `tags` VALUES (8, 'Tai nghe 5G đỏ', '2021-07-03 08:01:29', '2021-07-03 08:01:29');
INSERT INTO `tags` VALUES (9, 'ps 381', '2021-07-03 08:06:07', '2021-07-03 08:06:07');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Xuân Bách', 'xuanbachdev@gmail.com', NULL, '$2y$10$iFNfTm0m/0x/36ggimLT0.aFACKTMyV3OskopeVvmtobLwKiXQmIC', 'jxJRyCEFd3O7FtKWcIftdPgqv3IcuRhsSEt6tHbrHDJusw10qcInli5tPy1d', NULL, '2021-06-17 20:38:58', NULL);
INSERT INTO `users` VALUES (2, 'Anonymous123', 'anonymous@gmail.com', NULL, '$2y$10$C2M.xne571cNOPUQo4T0D.Ruvon8VxBPt6XvZGyQFhMJRFuRr8.eS', NULL, '2021-06-16 23:46:22', '2021-06-17 07:42:50', NULL);
INSERT INTO `users` VALUES (3, 'Tester', 'tester@gmail.com', NULL, '$2y$10$iM4Y0UOolTw8eagf5JprEOsy.UIYKB9LANVnp5zkHrfIpcEDn0eNO', NULL, '2021-06-17 00:26:49', '2021-06-17 00:30:35', '2021-06-17 00:30:35');
INSERT INTO `users` VALUES (4, 'Admin', 'admin', NULL, '$2y$10$S9xsNJq4ex3Kd3jFQ3Yl6e/8cmcR90i4wiYwx8uQv.Ag8WZme38Aq', 'VdpXJnf6dYlOUSSjojJwT7ERyDso8Ndg6xuTG8aracIeIBQWLtGlnxLIIE8t', '2021-06-19 01:28:35', '2021-06-19 01:33:08', NULL);

SET FOREIGN_KEY_CHECKS = 1;
