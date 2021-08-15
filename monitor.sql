/*
 Navicat Premium Data Transfer

 Source Server         : Mariadb
 Source Server Type    : MariaDB
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : monitor

 Target Server Type    : MariaDB
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 15/08/2021 09:04:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (3, 'General Mechandise', '200');
INSERT INTO `transactions` VALUES (4, 'Watches', '500');
INSERT INTO `transactions` VALUES (5, 'Chain', '400');
INSERT INTO `transactions` VALUES (6, 'Shoeses', '500');

-- ----------------------------
-- Table structure for userss
-- ----------------------------
DROP TABLE IF EXISTS `userss`;
CREATE TABLE `userss`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of userss
-- ----------------------------
INSERT INTO `userss` VALUES (1, 'Adnan Abdul-hamid', 'adnanmaltiti@gmail.com', '$2y$10$wZLDaHcIYTj8UUSx91PB/esKjmHbF1J/fV6N9WfyKEwAHmJrHfboW', '2021-08-15 00:31:30');
INSERT INTO `userss` VALUES (2, 'Adija Alhassan', 'adija@nativux.co', '$2y$10$uaYNdaoOoUm.rBdU.U0ZI.ni8e97h576D8NfqZc7cPmNlC0/523BS', '2021-08-15 00:31:30');
INSERT INTO `userss` VALUES (3, 'Aryan Aminu', 'rayan@gmail.com', '$2y$10$jh4qqwnVsqbbdrMoiWk8mOYAGyrS6soA3TH681aLVqXOkvFMr3dPK', '2021-08-15 00:31:30');
INSERT INTO `userss` VALUES (6, 'Mohammed M.', 'm@mail.com', '$2y$10$Q5ANHQ/K8kWs358p1XIj4uyPZ9sq1PQMGcNtA4DnzWKUXT6oT9AKC', '2021-08-15 08:59:20');

SET FOREIGN_KEY_CHECKS = 1;
