SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR (20) NOT NULL COMMENT 'ユーザーID',
  `password` VARCHAR(100) NOT NULL COMMENT 'パスワード',
  `name` VARCHAR(50) DEFAULT NULL COMMENT '氏名',
  `role` SMALLINT(1) DEFAULT '1' COMMENT '権限（1:ADMIN,2:USER）',
  `login_date` DATETIME DEFAULT NULL COMMENT 'ログイン時点',
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` DATETIME ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='ユーザー';
-- ----------------------------
-- Records of ユーザー
-- ----------------------------
INSERT INTO `users` (`username`, `password`, `name`, `role`) VALUES
('admin', 'admin', 1, 1)
,('hieunld', '123456', 1, 1);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL COMMENT '氏名',
  `sort` INT(11) NOT NULL COMMENT 'ソート',
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` DATETIME ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='category';
-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` (`name`, `sort`) VALUES
('Tiến ăn hàng ngày', 1)
,('Tiền Café, ăn vặt', 1)
,('Mua quần áo', 1)
,('Tiền tàu', 1)
,('Tiền học', 1)
,('Linh tinh', 1)
,('Tiền nhà', 1)
,('Tiền điện thoại', 1);

DROP TABLE IF EXISTS `daily`;
CREATE TABLE `daily` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `date_process` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `content` VARCHAR(100) NOT NULL COMMENT '氏名',
  `description` VARCHAR(100) NOT NULL COMMENT '氏名',
  `sort` INT(11) NOT NULL COMMENT 'ソート',
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` DATETIME ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='daily';
