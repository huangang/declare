/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : declare

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 04/03/2017 19:44:18 PM
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
INSERT INTO `admin_menu` VALUES ('1', '0', '1', '首页', 'fa-bar-chart', '/', null, '2017-04-02 11:21:26'), ('2', '0', '2', '管理', 'fa-tasks', '', null, '2017-04-02 11:21:35'), ('3', '2', '3', '用户', 'fa-users', 'auth/users', null, '2017-04-02 11:21:42'), ('4', '2', '4', '角色', 'fa-user', 'auth/roles', null, '2017-04-02 11:21:48'), ('5', '2', '5', '权限', 'fa-user', 'auth/permissions', null, '2017-04-02 11:21:59'), ('6', '2', '6', '按钮', 'fa-bars', 'auth/menu', null, '2017-04-02 11:22:09'), ('7', '2', '7', '操作日志', 'fa-history', 'auth/logs', null, '2017-04-02 11:22:18'), ('8', '0', '8', '帮助', 'fa-gears', '', null, '2017-04-02 11:22:28'), ('9', '8', '9', 'Scaffold', 'fa-keyboard-o', 'helpers/scaffold', null, null), ('10', '8', '10', 'Database terminal', 'fa-database', 'helpers/terminal/database', null, null), ('11', '8', '11', 'Laravel artisan', 'fa-terminal', 'helpers/terminal/artisan', null, null), ('13', '2', '12', '学院', 'fa-university', 'college', '2017-04-02 21:58:20', '2017-04-03 12:50:08'), ('14', '2', '13', '项目', 'fa-cubes', 'project', '2017-04-02 22:08:10', '2017-04-03 12:50:15'), ('15', '2', '14', '项目提交', 'fa-edit', 'submit', '2017-04-03 11:56:56', '2017-04-03 12:54:20');
COMMIT;

-- ----------------------------
--  Table structure for `admin_operation_log`
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB;



-- ----------------------------
--  Table structure for `admin_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `admin_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_permissions` VALUES ('1', '角色', 'role', '2017-04-02 21:03:03', '2017-04-02 21:06:05'), ('2', '用户', 'user', '2017-04-02 21:03:22', '2017-04-02 21:03:22'), ('3', '按钮', 'menu', '2017-04-02 21:06:26', '2017-04-02 21:06:26'), ('4', '日志', 'log', '2017-04-03 11:57:22', '2017-04-03 11:57:22'), ('5', '学院', 'college', '2017-04-03 11:57:35', '2017-04-03 11:57:35'), ('6', '项目', 'project', '2017-04-03 11:57:46', '2017-04-03 11:57:46'), ('7', '项目提交', 'submit', '2017-04-03 11:57:58', '2017-04-03 11:57:58');
COMMIT;

-- ----------------------------
--  Table structure for `admin_role_menu`
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `admin_role_menu`
-- ----------------------------
BEGIN;
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null), ('1', '8', null, null), ('1', '3', null, null), ('1', '1', null, null), ('1', '5', null, null), ('1', '6', null, null), ('1', '7', null, null), ('2', '15', null, null), ('2', '1', null, null), ('3', '1', null, null), ('2', '2', null, null), ('1', '13', null, null), ('1', '14', null, null), ('1', '4', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `admin_role_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB;

-- ----------------------------
--  Records of `admin_role_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null), ('1', '2', null, null), ('2', '2', null, null), ('1', '3', null, null), ('1', '4', null, null), ('1', '5', null, null), ('1', '6', null, null), ('1', '7', null, null), ('4', '2', null, null), ('4', '5', null, null), ('4', '6', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `admin_role_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB;

-- ----------------------------
--  Records of `admin_role_users`
-- ----------------------------
BEGIN;
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null), ('2', '2', null, null);
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
) ENGINE=InnoDB AUTO_INCREMENT=5;

-- ----------------------------
--  Records of `admin_roles`
-- ----------------------------
BEGIN;
INSERT INTO `admin_roles` VALUES ('1', '管理员', 'administrator', '2017-03-30 23:30:47', '2017-04-03 12:49:56'), ('2', '用户', 'user', '2017-04-02 21:04:35', '2017-04-02 21:04:35');
COMMIT;

-- ----------------------------
--  Table structure for `admin_user_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `admin_user_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `admin_user_permissions` VALUES ('1', '1', null, null), ('1', '2', null, null), ('1', '3', null, null), ('1', '4', null, null), ('1', '5', null, null), ('1', '6', null, null), ('2', '7', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_no` int(10) unsigned DEFAULT NULL COMMENT '学号',
  `mobile` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '电子邮件',
  `college_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学院ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`),
  UNIQUE KEY `admin_users_student_no_unique` (`student_no`),
  UNIQUE KEY `admin_users_mobile_unique` (`mobile`),
  UNIQUE KEY `admin_users_email_unique` (`email`),
  KEY `admin_users_college_id_index` (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

-- ----------------------------
--  Records of `admin_users`
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$jGcMgHHUD.BK0bjBWw/dyuMeAYQLEUmdWHyz.mFRpdd5EYc0aeEWu', 'Administrator', null, 'QmGPPQIFbpg6SeVD4FSvpF7AUmRUozGGppWNArDSv4skXeLduOLp7wOWMCyi', '2017-03-30 23:30:47', '2017-04-02 17:54:06', null, null, null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `colleges`
-- ----------------------------
DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '学院ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学院名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colleges_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `colleges`
-- ----------------------------
BEGIN;
INSERT INTO `colleges` VALUES ('1', '杭州国际服务工程学院', '2017-04-02 22:00:11', '2017-04-02 22:00:11');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2016_01_04_173148_create_admin_tables', '1'), ('2', '2014_10_12_000000_create_users_table', '2'), ('3', '2014_10_12_100000_create_password_resets_table', '2'), ('4', '2017_04_02_212921_create_colleges_table', '3'), ('5', '2017_04_02_213013_create_projects_table', '3'), ('6', '2017_04_02_213135_create_project_submits_table', '4'), ('7', '2017_04_03_142040_update_admin_user_table', '5');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB;

-- ----------------------------
--  Table structure for `project_submits`
-- ----------------------------
DROP TABLE IF EXISTS `project_submits`;
CREATE TABLE `project_submits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '提交ID',
  `project_id` int(10) unsigned NOT NULL COMMENT '关联项目ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作品标题',
  `body` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '作品描述',
  `tutor` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '指导老师',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '作品文件',
  `is_passed` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否通过',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_submits_project_id_index` (`project_id`),
  KEY `project_submits_user_id_index` (`user_id`),
  KEY `project_submits_title_index` (`title`),
  KEY `project_submits_body_index` (`body`),
  KEY `project_submits_is_passed_index` (`is_passed`)
) ENGINE=InnoDB;


-- ----------------------------
--  Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '项目名',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '项目描述',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '开始时间',
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '结束时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_name_index` (`name`)
) ENGINE=InnoDB;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '电子邮件',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `confirmation_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '确认token',
  `is_active` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否激活',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;
