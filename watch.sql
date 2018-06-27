-- MySQL dump 10.13  Distrib 5.6.35, for Win32 (AMD64)
--
-- Host: 123.207.107.131    Database: db_watch
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `db_watch`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_watch` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_watch`;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;

--
-- Table structure for table `admin_user_role`
--

DROP TABLE IF EXISTS `admin_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_role` (
  `admin_user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`admin_user_id`,`role_id`),
  KEY `admin_user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `admin_user_roles_admin_user_id_foreign` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_role`
--

/*!40000 ALTER TABLE `admin_user_role` DISABLE KEYS */;
INSERT INTO `admin_user_role` (`admin_user_id`, `role_id`) VALUES (1,10);
/*!40000 ALTER TABLE `admin_user_role` ENABLE KEYS */;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'admin','admin@admin.com','$2y$10$GBKiY/ngDVpe1iHwlTem3e0fbNrnv1sRLGcj4wT1isK0gbzY4oQoC',1,'nKc86Fxw2KVEx3Nj0rXxru8zSenjIi0AvKXxVQi1sLrjcNb7x7lXhnGcpKjl','2018-06-24 05:07:07','2018-06-24 05:07:07');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(128) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_01_18_071439_create_admin_users',1),('2016_01_18_071720_create_admin_password_resets_table',1),('2016_01_23_031442_entrust_base',1),('2016_01_23_031518_entrust_pivot_admin_user_role',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES (20,10),(21,10),(22,10),(35,10),(38,10),(39,10),(40,10),(42,10),(43,10),(44,10),(45,10),(46,10),(47,10),(48,10),(49,10),(50,10),(51,10),(52,10),(53,10),(54,10),(55,10),(56,10),(57,10),(58,10),(59,10),(20,12),(21,12),(22,12),(35,12);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单父ID',
  `icon` varchar(128) DEFAULT NULL COMMENT '图标class',
  `name` varchar(128) NOT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否作为菜单显示,[1|0]',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `fid`, `icon`, `name`, `display_name`, `description`, `is_menu`, `sort`, `created_at`, `updated_at`) VALUES (20,0,'edit','#-1529816456','系统设置','',1,100,'2018-06-24 05:00:56','2018-06-24 05:00:56'),(21,20,'','admin.admin_user.index','用户权限','查看后台用户列表',1,0,'2018-06-18 23:56:26','2018-06-18 23:56:26'),(22,20,'','admin.admin_user.create','创建后台用户','页面',0,0,'2018-06-18 19:48:18','2018-06-18 19:48:18'),(35,0,'home','admin.home','Dashboard','后台首页',1,0,'2018-06-19 00:32:40','2018-06-19 00:32:40'),(38,20,'','admin.admin_user.store','保存新建后台用户','操作',0,0,'2018-06-18 19:48:52','2018-06-18 19:48:52'),(39,20,'','admin.admin_user.destroy','删除后台用户','操作',0,0,'2018-06-18 19:49:09','2018-06-18 19:49:09'),(40,20,'','admin.admin_user.destory.all','批量后台用户删除','操作',0,0,'2018-06-18 20:01:01','2018-06-18 20:01:01'),(42,20,'','admin.admin_user.edit','编辑后台用户','页面',0,0,'2018-06-18 19:48:35','2018-06-18 19:48:35'),(43,20,'','admin.admin_user.update','保存编辑后台用户','操作',0,0,'2018-06-18 19:50:12','2018-06-18 19:50:12'),(44,20,'','admin.permission.index','权限管理','页面',0,0,'2018-06-18 19:51:36','2018-06-18 19:51:36'),(45,20,'','admin.permission.create','新建权限','页面',0,0,'2018-06-18 19:52:16','2018-06-18 19:52:16'),(46,20,'','admin.permission.store','保存新建权限','操作',0,0,'2018-06-18 19:52:38','2018-06-18 19:52:38'),(47,20,'','admin.permission.edit','编辑权限','页面',0,0,'2018-06-18 19:53:29','2018-06-18 19:53:29'),(48,20,'','admin.permission.update','保存编辑权限','操作',0,0,'2018-06-18 19:53:56','2018-06-18 19:53:56'),(49,20,'','admin.permission.destroy','删除权限','操作',0,0,'2018-06-18 19:54:27','2018-06-18 19:54:27'),(50,20,'','admin.permission.destory.all','批量删除权限','操作',0,0,'2018-06-18 19:55:17','2018-06-18 19:55:17'),(51,20,'','admin.role.index','角色管理','页面',0,0,'2018-06-18 19:56:07','2018-06-18 19:56:07'),(52,20,'','admin.role.create','新建角色','页面',0,0,'2018-06-18 19:56:33','2018-06-18 19:56:33'),(53,20,'','admin.role.store','保存新建角色','操作',0,0,'2018-06-18 19:57:26','2018-06-18 19:57:26'),(54,20,'','admin.role.edit','编辑角色','页面',0,0,'2018-06-18 19:58:25','2018-06-18 19:58:25'),(55,20,'','admin.role.update','保存编辑角色','操作',0,0,'2018-06-18 19:58:50','2018-06-18 19:58:50'),(56,20,'','admin.role.permissions','角色权限设置','',0,0,'2018-06-18 19:59:26','2018-06-18 19:59:26'),(57,20,'','admin.role.destroy','角色删除','操作',0,0,'2018-06-18 19:59:49','2018-06-18 19:59:49'),(58,20,'','admin.role.destory.all','批量删除角色','',0,0,'2018-06-18 20:01:58','2018-06-18 20:01:58'),(59,0,'edit','admin.reserve','预约工单','预约工单',1,0,'2018-06-24 05:02:25','2018-06-24 05:02:25'),(60,0,'edit','admin.goods','维修工单','维修工单',1,0,'2018-06-24 13:31:27','2018-06-24 13:31:27'),(61,59,'edit','admin.reserve.handle','处理工单','处理工单',0,0,'2018-06-26 17:05:36','2018-06-26 17:05:36'),(62,0,'edit','admin.order','财务账单','财务账单',1,0,'2018-06-27 16:09:56','2018-06-27 16:09:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES (10,'administrator','系统管理员','','2018-06-19 01:59:52','2018-06-19 01:59:52'),(12,'test','测试狗','','2018-06-19 02:00:43','2018-06-19 02:00:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

--
-- Table structure for table `t_courier`
--

DROP TABLE IF EXISTS `t_courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `watch_id` int(11) NOT NULL COMMENT '腕表id',
  `payment_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '支付方:0-用户.1-店铺',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '取货方式:0-自取,1-快递',
  `number` varchar(64) NOT NULL COMMENT '快递单号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='快递记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_courier`
--

/*!40000 ALTER TABLE `t_courier` DISABLE KEYS */;
INSERT INTO `t_courier` (`id`, `watch_id`, `payment_type`, `type`, `number`, `created_at`, `updated_at`) VALUES (1,2,0,0,'','2018-06-24 07:28:09','2018-06-24 07:28:09'),(2,6,0,1,'1222222','2018-06-24 15:42:17','2018-06-24 15:42:17'),(3,16,0,0,' ','2018-06-25 15:05:04','2018-06-25 15:05:15'),(4,15,1,0,'111','2018-06-27 15:48:36','2018-06-27 15:48:36');
/*!40000 ALTER TABLE `t_courier` ENABLE KEYS */;

--
-- Table structure for table `t_orders`
--

DROP TABLE IF EXISTS `t_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `uid` varchar(32) NOT NULL COMMENT '订单流水号',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `watch_id` int(11) NOT NULL COMMENT '腕表id',
  `out_order_id` varchar(63) NOT NULL COMMENT '外部订单id',
  `transaction_id` varchar(63) NOT NULL COMMENT '微信订单',
  `price` int(11) NOT NULL COMMENT '订单总价格',
  `pay_time` datetime DEFAULT NULL COMMENT '支付时间',
  `status` tinyint(2) NOT NULL COMMENT '订单状态',
  `finish_time` datetime DEFAULT NULL COMMENT '订单完成时间',
  `cancel_time` datetime DEFAULT NULL COMMENT '取消时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_orders`
--

/*!40000 ALTER TABLE `t_orders` DISABLE KEYS */;
INSERT INTO `t_orders` (`id`, `uid`, `user_id`, `watch_id`, `out_order_id`, `transaction_id`, `price`, `pay_time`, `status`, `finish_time`, `cancel_time`, `created_at`, `updated_at`) VALUES (1,'20180624213957',3,15,'','',10,'0000-00-00 00:00:00',5,NULL,NULL,'2018-06-27 15:23:31','2018-06-27 15:23:31'),(2,'20180624213923',3,16,'','',10000,NULL,7,NULL,NULL,'2018-06-27 15:02:22','2018-06-27 15:02:22'),(3,'20180624213945',3,17,'','',0,NULL,1,NULL,NULL,'2018-06-26 14:53:57','2018-06-26 14:53:57'),(4,'20180624213923',3,18,'','',0,NULL,2,NULL,NULL,'2018-06-26 14:53:59','2018-06-26 14:53:59'),(5,'20180624213923',3,19,'','',0,NULL,3,NULL,NULL,'2018-06-26 14:54:01','2018-06-26 14:54:01'),(6,'20180624213923',3,20,'','',0,NULL,4,NULL,NULL,'2018-06-26 14:54:06','2018-06-26 14:54:06'),(7,'20180624213923',3,21,'','',0,'2018-06-25 22:38:42',5,NULL,NULL,'2018-06-25 16:48:04','2018-06-25 16:48:04'),(8,'20180624213923',3,22,'','',0,'2018-06-25 22:38:42',6,NULL,NULL,'2018-06-25 16:48:06','2018-06-25 16:48:06'),(9,'20180624213923',3,23,'','',0,NULL,7,NULL,NULL,'2018-06-26 14:54:09','2018-06-26 14:54:09');
/*!40000 ALTER TABLE `t_orders` ENABLE KEYS */;

--
-- Table structure for table `t_price_records`
--

DROP TABLE IF EXISTS `t_price_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_price_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录id',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `modify_user` int(11) NOT NULL COMMENT '修改人',
  `present_price` int(11) NOT NULL COMMENT '当前价格',
  `change_price` int(11) NOT NULL COMMENT '变更价格',
  `comment` varchar(256) NOT NULL COMMENT '修改备注',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_price_records`
--

/*!40000 ALTER TABLE `t_price_records` DISABLE KEYS */;
INSERT INTO `t_price_records` (`id`, `order_id`, `modify_user`, `present_price`, `change_price`, `comment`, `created_at`, `updated_at`) VALUES (1,2,1,0,10000,'ceshi','2018-06-27 15:18:55','2018-06-27 15:18:55'),(2,2,1,0,10000,'ceshi','2018-06-27 15:18:53','2018-06-27 15:18:53'),(3,1,1,10,990,'ceshi','2018-06-27 15:18:49','2018-06-27 15:18:49'),(4,1,1,1000,99000,'ceshi2','2018-06-27 15:18:51','2018-06-27 15:18:51'),(5,1,1,100000,-99990,'ssss','2018-06-27 15:21:33','2018-06-27 15:21:34');
/*!40000 ALTER TABLE `t_price_records` ENABLE KEYS */;

--
-- Table structure for table `t_reserve`
--

DROP TABLE IF EXISTS `t_reserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `phone` varchar(32) NOT NULL COMMENT '预约手机号',
  `status` tinyint(2) NOT NULL COMMENT '预约状态',
  `handle_time` datetime DEFAULT NULL COMMENT '处理时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reserve`
--

/*!40000 ALTER TABLE `t_reserve` DISABLE KEYS */;
INSERT INTO `t_reserve` (`id`, `user_id`, `phone`, `status`, `handle_time`, `created_at`, `updated_at`) VALUES (1,1,'1234',1,'2018-06-25 01:20:13','2018-06-24 17:20:13','2018-06-24 17:20:13'),(2,1,'1234',1,'2018-06-25 01:20:22','2018-06-24 17:20:22','2018-06-24 17:20:22'),(3,1,'1234',1,'2018-06-25 01:20:29','2018-06-24 17:20:29','2018-06-24 17:20:29'),(4,1,'1234',1,'2018-06-25 02:00:53','2018-06-24 18:00:53','2018-06-24 18:00:53'),(5,1,'1234',1,'2018-06-27 00:15:34','2018-06-26 16:15:35','2018-06-26 16:15:35'),(6,1,'1234',1,'2018-06-27 00:16:36','2018-06-26 16:16:36','2018-06-26 16:16:36'),(7,1,'1234',0,'2018-06-25 01:12:24','2018-06-24 17:20:02','2018-06-24 17:20:02'),(8,1,'1234',0,'2018-06-25 01:12:51','2018-06-24 17:20:02','2018-06-24 17:20:02'),(9,1,'1234',0,'2018-06-25 01:15:28','2018-06-24 17:20:02','2018-06-24 17:20:02'),(10,1,'1234',0,'2018-06-25 01:18:30','2018-06-24 17:20:02','2018-06-24 17:20:02'),(11,1,'1234',0,NULL,'2018-06-24 17:20:02','2018-06-24 17:20:02'),(12,3,'18403018682',0,NULL,'2018-06-25 14:54:38','2018-06-25 14:54:40');
/*!40000 ALTER TABLE `t_reserve` ENABLE KEYS */;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(64) NOT NULL COMMENT '用户姓名',
  `phone` varchar(32) NOT NULL COMMENT '用户手机号',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user`
--

/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` (`id`, `username`, `phone`, `created_at`, `updated_at`) VALUES (1,'xiaoming','1233','2018-06-24 05:40:32','2018-06-24 05:40:34'),(2,'xiaoming','111','2018-06-24 05:40:44','2018-06-24 05:40:46'),(3,'崔平伟','18403018682','2018-06-24 13:39:56','2018-06-24 13:39:56');
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;

--
-- Table structure for table `t_verify_codes`
--

DROP TABLE IF EXISTS `t_verify_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_verify_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(64) DEFAULT NULL COMMENT '手机号',
  `code` varchar(64) DEFAULT NULL COMMENT '验证码',
  `used` int(1) NOT NULL DEFAULT '0' COMMENT '是否验证使用过 0-否 1-是',
  `expire_at` datetime DEFAULT NULL COMMENT '过期时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162794 DEFAULT CHARSET=utf8mb4 COMMENT='短信验证码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_verify_codes`
--

/*!40000 ALTER TABLE `t_verify_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_verify_codes` ENABLE KEYS */;

--
-- Table structure for table `t_watch`
--

DROP TABLE IF EXISTS `t_watch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_watch` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `movement` tinyint(2) NOT NULL COMMENT '机芯:1-石英机芯，2-机械机芯，3-多功能机芯',
  `watch_case` tinyint(2) NOT NULL COMMENT '表壳：1-不锈钢，2-18k金，3-千足金，4-钻石',
  `watch_face` tinyint(2) NOT NULL COMMENT '字面',
  `watch_band` tinyint(2) NOT NULL COMMENT '表带',
  `watch_clasp` tinyint(2) NOT NULL COMMENT '表扣',
  `height` tinyint(2) NOT NULL COMMENT '重量',
  `watch_comment` varchar(128) NOT NULL COMMENT '备注',
  `error_movement` tinyint(2) NOT NULL,
  `error_case` tinyint(2) NOT NULL COMMENT '表壳故障',
  `error_bezel` tinyint(2) NOT NULL,
  `error_cover` tinyint(2) NOT NULL,
  `error_bade` tinyint(2) NOT NULL,
  `error_screws` tinyint(2) NOT NULL,
  `error_glass` tinyint(2) NOT NULL,
  `error_pin` tinyint(2) NOT NULL,
  `error_face` tinyint(2) NOT NULL,
  `error_band` tinyint(2) NOT NULL,
  `error_clasp` tinyint(2) NOT NULL,
  `error_function` tinyint(2) NOT NULL,
  `error_comment` varchar(256) NOT NULL COMMENT '问题描述',
  `province` varchar(16) NOT NULL COMMENT '省',
  `city` varchar(16) NOT NULL COMMENT '市',
  `district` varchar(16) NOT NULL COMMENT '区域',
  `area` varchar(64) NOT NULL COMMENT '详细地址',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1496 DEFAULT CHARSET=utf8mb4 COMMENT='腕表配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_watch`
--

/*!40000 ALTER TABLE `t_watch` DISABLE KEYS */;
INSERT INTO `t_watch` (`id`, `user_id`, `movement`, `watch_case`, `watch_face`, `watch_band`, `watch_clasp`, `height`, `watch_comment`, `error_movement`, `error_case`, `error_bezel`, `error_cover`, `error_bade`, `error_screws`, `error_glass`, `error_pin`, `error_face`, `error_band`, `error_clasp`, `error_function`, `error_comment`, `province`, `city`, `district`, `area`, `created_at`, `updated_at`) VALUES (1,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(2,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(3,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:05','2018-06-24 07:28:05'),(14,0,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:49:07','2018-06-25 16:49:07'),(15,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:49:12','2018-06-25 16:49:12'),(16,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 15:08:47','2018-06-25 15:08:47'),(17,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(18,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(19,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:36','2018-06-25 16:48:36'),(20,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(21,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(22,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:38','2018-06-25 16:48:38'),(23,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:40','2018-06-25 16:48:40'),(24,0,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 14:33:15','2018-06-25 14:33:15');
/*!40000 ALTER TABLE `t_watch` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-28  0:24:24
