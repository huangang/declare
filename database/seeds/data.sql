/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : declare

 Target Server Type    : MySQL
 Target Server Version : 50100
 File Encoding         : utf-8

 Date: 04/03/2017 19:47:42 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16;

-- ----------------------------
--  Records of `admin_menu`
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu` VALUES 
('1', '0', '1', '首页', 'fa-bar-chart', '/', null, '2017-04-02 11:21:26'), 
('2', '0', '2', '管理', 'fa-tasks', '', null, '2017-04-02 11:21:35'),
('3', '2', '3', '用户', 'fa-users', 'auth/users', null, '2017-04-02 11:21:42'),
('4', '2', '4', '角色', 'fa-user', 'auth/roles', null, '2017-04-02 11:21:48'), 
('5', '2', '5', '权限', 'fa-user', 'auth/permissions', null, '2017-04-02 11:21:59'), 
('6', '2', '6', '按钮', 'fa-bars', 'auth/menu', null, '2017-04-02 11:22:09'), 
('7', '2', '7', '操作日志', 'fa-history', 'auth/logs', null, '2017-04-02 11:22:18'), 
('8', '0', '8', '帮助', 'fa-gears', '', null, '2017-04-02 11:22:28'), 
('9', '8', '9', 'Scaffold', 'fa-keyboard-o', 'helpers/scaffold', null, null), 
('10', '8', '10', 'Database terminal', 'fa-database', 'helpers/terminal/database', null, null),
('11', '8', '11', 'Laravel artisan', 'fa-terminal', 'helpers/terminal/artisan', null, null), 
('13', '2', '12', '学院', 'fa-university', 'college', '2017-04-02 21:58:20', '2017-04-03 12:50:08'), 
('14', '2', '13', '项目', 'fa-cubes', 'project', '2017-04-02 22:08:10', '2017-04-03 12:50:15'), 
('15', '2', '14', '项目提交', 'fa-edit', 'submit', '2017-04-03 11:56:56', '2017-04-03 12:54:20');
COMMIT;

-- ----------------------------
--  Records of `admin_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_permissions` VALUES 
('1', '角色', 'role', '2017-04-02 21:03:03', '2017-04-02 21:06:05'), 
('2', '用户', 'user', '2017-04-02 21:03:22', '2017-04-02 21:03:22'), 
('3', '按钮', 'menu', '2017-04-02 21:06:26', '2017-04-02 21:06:26'), 
('4', '日志', 'log', '2017-04-03 11:57:22', '2017-04-03 11:57:22'), 
('5', '学院', 'college', '2017-04-03 11:57:35', '2017-04-03 11:57:35'), 
('6', '项目', 'project', '2017-04-03 11:57:46', '2017-04-03 11:57:46'), 
('7', '项目提交', 'submit', '2017-04-03 11:57:58', '2017-04-03 11:57:58');
COMMIT;


-- ----------------------------
--  Records of `admin_role_menu`
-- ----------------------------
BEGIN;
INSERT INTO `admin_role_menu` VALUES 
('1', '2', null, null), 
('1', '8', null, null), 
('1', '3', null, null), 
('1', '1', null, null), 
('1', '5', null, null), 
('1', '6', null, null), 
('1', '7', null, null), 
('2', '15', null, null), 
('2', '1', null, null), 
('3', '1', null, null), 
('2', '2', null, null), 
('1', '13', null, null), 
('1', '14', null, null), 
('1', '4', null, null);
COMMIT;

-- ----------------------------
--  Records of `admin_role_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_role_permissions` VALUES 
('1', '1', null, null), 
('1', '2', null, null), 
('2', '2', null, null), 
('1', '3', null, null), 
('1', '4', null, null), 
('1', '5', null, null), 
('1', '6', null, null), 
('1', '7', null, null), 
('4', '2', null, null), 
('4', '5', null, null), 
('4', '6', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `admin_roles`
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

-- ----------------------------
--  Records of `admin_roles`
-- ----------------------------
BEGIN;
INSERT INTO `admin_roles` VALUES 
('1', '管理员', 'administrator', '2017-03-30 23:30:47', '2017-04-03 12:49:56'), 
('2', '用户', 'user', '2017-04-02 21:04:35', '2017-04-02 21:04:35');
COMMIT;

-- ----------------------------
--  Records of `admin_user_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_user_permissions` VALUES 
('1', '1', null, null), 
('1', '2', null, null), 
('1', '3', null, null), 
('1', '4', null, null), 
('1', '5', null, null), 
('1', '6', null, null), 
('2', '7', null, null);
COMMIT;

-- ----------------------------
--  Records of `colleges`
-- ----------------------------
BEGIN;
INSERT INTO `colleges` VALUES ('1', '杭州国际服务工程学院', '2017-04-02 22:00:11', '2017-04-02 22:00:11');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
