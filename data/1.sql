
DROP TABLE IF EXISTS `lazy_category`;
CREATE TABLE `lazy_category`(
  `cat_id` INT(10) NOT NULL PRIMARY key AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `type` tinyint(3) not null comment '1 软文 2微博 3微信 4淘宝'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `lazy_news`;
CREATE TABLE `lazy_news`(
  `news_id` INT(10) NOT NULL PRIMARY key AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `news_url` VARCHAR(255) COMMENT '媒体链接',
  `case_url` VARCHAR(255) COMMENT '案例链接',
  `cat_id` INT(6) NOT NULL COMMENT '分类',
  `price` INT(6) NOT NULL COMMENT '价格',
  `link_type` TINYINT(2) NOT NULL COMMENT '0 空，1 可带文本，2可带超链接，3 都不带',
  `sl_type` TINYINT(2) NOT NULL COMMENT '收录说明 0空 1 2 3',
  `remark` VARCHAR(255),
  `buy_link` VARCHAR(255) COMMENT '淘宝购买链接'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `lazy_wb`;
CREATE TABLE `lazy_wb`(
  `wb_id` INT(10) NOT NULL PRIMARY key AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `platform` char(20) not null default '新浪微博',
  `wb_url` VARCHAR(255) COMMENT '媒体链接',
  `fans_num` int(10) COMMENT '粉丝数量 单位万',
  `cat_id` INT(6) NOT NULL COMMENT '分类',
  `price` INT(8) NOT NULL COMMENT '价格',
  `area` char(8) NOT NULL COMMENT '0 空，1 可带文本，2可带超链接，3 都不带',
  `remark` VARCHAR(255),
  `buy_link` VARCHAR(255) COMMENT '淘宝购买链接'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `lazy_wx`;
CREATE TABLE `lazy_wx`(
  `wx_id` INT(10) NOT NULL PRIMARY key AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `wechat_id` VARCHAR(60) COMMENT '微信号ID',
  `fans_num` int(16) COMMENT '粉丝数量 单位',
  `cat_id` INT(6) NOT NULL COMMENT '分类',
  `price` INT(8) NOT NULL COMMENT '价格',
  `area` char(8) NOT NULL COMMENT '0 空，1 可带文本，2可带超链接，3 都不带',
  `wx_type` tinyint(2) not null comment '0 个人号 1订阅号 2服务号 3企业号',
  `remark` VARCHAR(255),
  `buy_link` VARCHAR(255) COMMENT '淘宝购买链接'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
