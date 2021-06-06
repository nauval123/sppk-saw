/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sppk

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-06 12:18:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_06_28_174820_create_role_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_06_28_174943_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('5', '2019_07_04_155617_create_setting_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for penduduk
-- ----------------------------
DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE `penduduk` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(45) DEFAULT '',
  `Nama` varchar(45) DEFAULT '',
  `JenisLantai` double DEFAULT NULL,
  `Penghasilan` double DEFAULT NULL,
  `JumlahAnggota` double DEFAULT NULL,
  `JenisDinding` double DEFAULT NULL,
  `StatusPhk` double DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1312 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penduduk
-- ----------------------------
INSERT INTO `penduduk` VALUES ('1310', '2018101010103978', 'sunaidin', '1', '0.333', '0.75', '0.75', '0.5', '2021-06-01 19:28:41', '2021-05-17 16:00:23');
INSERT INTO `penduduk` VALUES ('1311', 'kaprodi', 'tes3', '0.5', '0.667', '0.75', '0.5', '1', '2021-05-18 05:48:02', '2021-05-18 05:48:02');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'User', '2019-07-04 03:13:31', '2019-07-04 03:13:31');
INSERT INTO `role` VALUES ('2', 'Administrator', '2019-07-04 03:13:31', '2019-07-04 03:13:31');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', null, null);
INSERT INTO `role_user` VALUES ('1', '2', null, null);

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'c1', '{\"weight\":\"1\",\"is_cost\":\"0\"}', '2019-07-04 16:00:38', '2021-05-17 16:00:45');
INSERT INTO `setting` VALUES ('2', 'c2', '{\"weight\":\"0.2\",\"is_cost\":\"0\"}', '2019-07-04 16:00:38', '2019-07-05 02:18:43');
INSERT INTO `setting` VALUES ('3', 'c3', '{\"weight\":\"0.8\",\"is_cost\":\"0\"}', '2019-07-04 16:00:38', '2021-05-17 16:00:45');
INSERT INTO `setting` VALUES ('4', 'c4', '{\"weight\":\"0.6\",\"is_cost\":\"0\"}', '2019-07-04 16:00:38', '2019-07-11 01:55:08');
INSERT INTO `setting` VALUES ('5', 'c5', '{\"weight\":\"0.4\",\"is_cost\":\"1\"}', '2019-07-04 16:00:38', '2021-05-17 16:00:45');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'tes1', 'tes1@email.com', null, '$2y$10$Wkl4bneXZ1SxB7BDhmHTqOMFc6kcq526oeEF1ZoJauCw8vCbwZ1Mi', 'fseJNwmwBtJdjAkapH5V5FVBwQLskfhOqmaIdFNHrPiRNHbP8GpLOulY9EJV', '2021-05-14 12:19:57', '2021-05-14 12:19:57');
