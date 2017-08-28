/*
Navicat MySQL Data Transfer

Source Server         : wang
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-25 17:58:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abstract` varchar(100) DEFAULT NULL,
  `category` int(10) DEFAULT NULL,
  `content` text,
  `logo` varchar(80) DEFAULT NULL,
  `option` varchar(30) DEFAULT NULL COMMENT '1:置顶  2：推荐',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '2111', '22222', '1', '', '1', '2', '2017-08-23 14:25:22', '小森');
INSERT INTO `blog_article` VALUES ('2', '222222222', '22222', '1', '', '', '2', null, '小森');
INSERT INTO `blog_article` VALUES ('3', 'goods/productrecycle', '222222', '1', '', '', '2', null, '小森');
INSERT INTO `blog_article` VALUES ('4', 'goods/productrecycle', '111', '2', '', '1111111111', '2', '0000-00-00 00:00:00', '小森');
INSERT INTO `blog_article` VALUES ('5', 'goods/productrecycle11111', '111', '1', '', '1111111111', '2', '0000-00-00 00:00:00', '小森');
INSERT INTO `blog_article` VALUES ('6', '88888', '11', '3', '', '11111', '2', '2017-08-24 03:06:38', '小森');
INSERT INTO `blog_article` VALUES ('7', 'goods/productrecycle', '22222', '1', '', '1111111111', '2', '2017-08-24 03:07:34', '小森');
INSERT INTO `blog_article` VALUES ('8', '88888', '1', '1', '', '1111111111', '2', '2017-08-24 03:51:38', '小森');
INSERT INTO `blog_article` VALUES ('9', '8', '1', '1', '', '1111111111', '2', '2017-08-24 04:22:32', '小森');
INSERT INTO `blog_article` VALUES ('10', '文章111111', '3', '2', '', '111111', '2', '2017-08-25 02:42:42', '小森');
INSERT INTO `blog_article` VALUES ('11', 'goods/product_category', '2', '4', '', '111111', '2', '2017-08-25 04:07:14', '小森');
INSERT INTO `blog_article` VALUES ('12', '11', '333', '3', '', '2', '2', '2017-08-25 06:31:37', '小森');

-- ----------------------------
-- Table structure for blog_nav
-- ----------------------------
DROP TABLE IF EXISTS `blog_nav`;
CREATE TABLE `blog_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_nav
-- ----------------------------
INSERT INTO `blog_nav` VALUES ('1', '顶级分类', '0', '2017-08-25 05:54:33', '45');
INSERT INTO `blog_nav` VALUES ('2', '分类1', '1', '2017-08-25 05:57:48', '50');
INSERT INTO `blog_nav` VALUES ('3', '分类3', '2', '2017-08-25 06:19:05', '50');
INSERT INTO `blog_nav` VALUES ('4', '分类', '0', '2017-08-25 06:26:08', '50');
