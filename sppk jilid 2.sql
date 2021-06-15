/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sppk

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-14 00:57:12
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=1316 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penduduk
-- ----------------------------
INSERT INTO `penduduk` VALUES ('1310', '1234567910111213', 'sunaidin', '1', '0.333', '0.75', '0.75', '0.5', '2021-06-09 03:59:41', '2021-05-17 16:00:23');
INSERT INTO `penduduk` VALUES ('1311', '1234567891011213', 'sukinem', '0.5', '0.667', '0.75', '0.5', '1', '2021-06-12 18:46:45', '2021-05-18 05:48:02');
INSERT INTO `penduduk` VALUES ('1312', '3507250510990078', 'suhainin', '0', '0', '0', '0', '0.5', '2021-06-07 09:13:04', '2021-06-07 09:13:04');
INSERT INTO `penduduk` VALUES ('1313', '1824101030789119', 'paralon', '0', '0', '0', '0', '0.5', '2021-06-11 09:48:22', '2021-06-11 09:48:22');
INSERT INTO `penduduk` VALUES ('1314', '1824101030765115', 'parmin', '0', '0', '0', '0', '0.5', '2021-06-12 19:48:41', '2021-06-12 19:48:41');
INSERT INTO `penduduk` VALUES ('1315', '1111111111111111', 'miraz', '0.5', '0.333', '0.75', '0.5', '1', '2021-06-12 19:58:02', '2021-06-12 19:57:11');

-- ----------------------------
-- Table structure for penduduk_periode
-- ----------------------------
DROP TABLE IF EXISTS `penduduk_periode`;
CREATE TABLE `penduduk_periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_id` int(11) DEFAULT NULL,
  `penduduk_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fkIdPenduduk` (`penduduk_id`),
  KEY `fkIdPeriode` (`periode_id`),
  CONSTRAINT `fkIdPenduduk` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkIdPeriode` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penduduk_periode
-- ----------------------------
INSERT INTO `penduduk_periode` VALUES ('1', '1', '1311', '1', '2021-06-11 03:37:54', '2021-06-11 03:37:56');
INSERT INTO `penduduk_periode` VALUES ('2', '1', '1310', '1', '2021-06-11 15:54:37', '2021-06-11 15:54:37');
INSERT INTO `penduduk_periode` VALUES ('3', '1', '1312', '1', '2021-06-13 02:43:03', '2021-06-12 19:43:03');
INSERT INTO `penduduk_periode` VALUES ('6', '1', '1313', '1', '2021-06-13 03:00:54', '2021-06-12 20:00:54');
INSERT INTO `penduduk_periode` VALUES ('8', '1', '1314', '1', '2021-06-13 02:53:46', '2021-06-12 19:53:46');
INSERT INTO `penduduk_periode` VALUES ('9', '1', '1315', '1', '2021-06-13 07:00:54', '2021-06-13 07:00:54');
INSERT INTO `penduduk_periode` VALUES ('10', '2', '1310', '0', '2021-06-13 14:31:01', '2021-06-13 07:31:01');

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of periode
-- ----------------------------
INSERT INTO `periode` VALUES ('1', '2021-06-11 03:01:38', '2021-06-11 03:01:38');
INSERT INTO `periode` VALUES ('2', '2021-06-13 04:36:38', '2021-06-13 04:36:38');
INSERT INTO `periode` VALUES ('3', '2021-06-13 06:59:48', '2021-06-13 06:59:48');

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
INSERT INTO `setting` VALUES ('1', 'c1', '{\"weight\":\"0.6\",\"is_cost\":null}', '2019-07-04 16:00:38', '2021-06-12 20:00:13');
INSERT INTO `setting` VALUES ('2', 'c2', '{\"weight\":\"0.4\",\"is_cost\":null}', '2019-07-04 16:00:38', '2021-06-12 20:00:13');
INSERT INTO `setting` VALUES ('3', 'c3', '{\"weight\":\"1\",\"is_cost\":null}', '2019-07-04 16:00:38', '2021-06-12 20:00:13');
INSERT INTO `setting` VALUES ('4', 'c4', '{\"weight\":\"0.6\",\"is_cost\":null}', '2019-07-04 16:00:38', '2021-06-12 20:00:13');
INSERT INTO `setting` VALUES ('5', 'c5', '{\"weight\":\"1\",\"is_cost\":\"0\"}', '2019-07-04 16:00:38', '2021-06-12 20:00:13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', 'superadmin', 'superadmin', 'superadmin@email.com', null, '$2y$10$UzFcHlHfYntMnrQ0bP7UYu.k3jQ2BVYPJcTgsbtGl8FhyE3coJW5a', null, '2021-06-10 07:09:54', '2021-06-10 07:09:54');
INSERT INTO `users` VALUES ('5', 'sukarelawan', 'sukarelawan', 'sukarelawan@email.com', null, '$2y$10$itBJ2hrhUyPpyokFYIyDv.E9rAHwLPS/0kgAORR6e3AD3.3jZow56', null, '2021-06-10 07:10:51', '2021-06-10 07:10:51');
INSERT INTO `users` VALUES ('6', 'admin', 'Nauval Achmad Yusufa', 'tes1@email.com', null, '$2y$10$y/46gv/Zn6kbaOvg.1UYX.bX55ol8pWOB0FwSCMS/zvJfgaqaJyQq', null, '2021-06-10 17:25:39', '2021-06-10 18:34:59');
