/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : cake3

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-02-14 13:36:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '氏名',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT 'ソート',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='category';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Tiến ăn hàng ngày', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('2', 'Tiền Café, ăn vặt', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('3', 'Mua quần áo', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('4', 'Tiền tàu', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('5', 'Tiền học', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('6', 'Linh tinh', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('7', 'Tiền nhà', '1', '2017-02-06 19:50:46', null);
INSERT INTO `category` VALUES ('8', 'Tiền điện thoại', '1', '2017-02-06 19:50:46', null);

-- ----------------------------
-- Table structure for daily
-- ----------------------------
DROP TABLE IF EXISTS `daily`;
CREATE TABLE `daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_process` varchar(10) DEFAULT NULL,
  `date_y_m` varchar(7) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL COMMENT '氏名',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT 'ソート',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='daily';

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT 'ユーザーID',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `name` varchar(50) DEFAULT NULL COMMENT '氏名',
  `role` smallint(1) DEFAULT '1' COMMENT '権限（1:ADMIN,2:USER）',
  `login_date` datetime DEFAULT NULL COMMENT 'ログイン時点',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ユーザー';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$teYaAoOG0Bq2salTHhusDeki9rG9la3qcRWGmenaNxw/.trBjpFDC', 'admin', '1', '2017-02-14 03:44:40', '2017-02-06 19:50:45', '2017-02-14 03:44:40');
