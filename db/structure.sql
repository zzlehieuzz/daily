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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='users';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$teYaAoOG0Bq2salTHhusDeki9rG9la3qcRWGmenaNxw/.trBjpFDC', 'admin', '1', '2017-02-14 03:44:40', '2017-02-06 19:50:45', '2017-02-14 03:44:40');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `currency_value` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='config';

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 1, 1, '2017-02-14 03:44:40', '2017-02-14 03:44:40');
INSERT INTO `config` VALUES (1, 3, 1, '2017-02-14 03:44:40', '2017-02-14 03:44:40');

-- ----------------------------
-- Table structure for salary
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_y_m` varchar(7) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `default_value` int(11) NOT NULL DEFAULT '0',
  `real_value` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='salary';

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
