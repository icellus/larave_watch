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
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL COMMENT '创建时间',
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'admin','admin@admin.com','$2y$10$GBKiY/ngDVpe1iHwlTem3e0fbNrnv1sRLGcj4wT1isK0gbzY4oQoC',1,'vc9WVkndg26YaId6If69ttOqo0fcnJDZ8F0kfEYolFXObMt0HaRaQfJ5NDXC','2018-07-01 15:54:10','2018-07-01 15:54:10');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
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
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES (21,10),(22,10),(35,10),(38,10),(39,10),(40,10),(42,10),(43,10),(44,10),(45,10),(46,10),(47,10),(48,10),(49,10),(50,10),(51,10),(52,10),(53,10),(54,10),(55,10),(56,10),(57,10),(58,10),(59,10),(60,10),(61,10),(62,10),(63,10),(64,10),(65,10),(66,10),(67,10),(68,10),(69,10),(70,10),(71,10),(72,10),(73,10),(74,10),(75,10),(76,10),(77,10),(35,12);
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `fid`, `icon`, `name`, `display_name`, `description`, `is_menu`, `sort`, `created_at`, `updated_at`) VALUES (21,0,'laptop','#-1530326619','系统设置','系统设置',1,5,'2018-06-30 02:43:41','2018-06-30 02:43:39'),(22,21,'','admin.admin_user.create','创建后台用户','页面',0,0,'2018-06-30 02:40:03','2018-06-30 02:40:03'),(35,0,'dashboard','admin.home','Dashboard','后台首页',1,0,'2018-06-30 03:17:45','2018-06-30 03:17:43'),(38,21,'','admin.admin_user.store','保存新建后台用户','操作',0,0,'2018-06-30 02:40:08','2018-06-30 02:40:08'),(39,21,'','admin.admin_user.destroy','删除后台用户','操作',0,0,'2018-06-30 02:40:09','2018-06-30 02:40:09'),(40,21,'','admin.admin_user.destory.all','批量后台用户删除','操作',0,0,'2018-06-30 02:40:11','2018-06-30 02:40:11'),(42,21,'','admin.admin_user.edit','编辑后台用户','页面',0,0,'2018-06-30 02:40:12','2018-06-30 02:40:12'),(43,21,'','admin.admin_user.update','保存编辑后台用户','操作',0,0,'2018-06-30 02:40:13','2018-06-30 02:40:13'),(44,21,'','admin.permission.index','权限管理','页面',1,3,'2018-06-30 02:46:53','2018-06-30 02:46:51'),(45,21,'','admin.permission.create','新建权限','页面',0,0,'2018-06-30 02:40:15','2018-06-30 02:40:15'),(46,21,'','admin.permission.store','保存新建权限','操作',0,0,'2018-06-30 02:40:16','2018-06-30 02:40:16'),(47,21,'','admin.permission.edit','编辑权限','页面',0,0,'2018-06-30 02:40:17','2018-06-30 02:40:17'),(48,21,'','admin.permission.update','保存编辑权限','操作',0,0,'2018-06-30 02:40:18','2018-06-30 02:40:18'),(49,21,'','admin.permission.destroy','删除权限','操作',0,0,'2018-06-30 02:40:19','2018-06-30 02:40:19'),(50,21,'','admin.permission.destory.all','批量删除权限','操作',0,0,'2018-06-30 02:40:20','2018-06-30 02:40:20'),(51,21,'','admin.role.index','角色管理','页面',1,2,'2018-06-30 02:46:42','2018-06-30 02:46:39'),(52,21,'','admin.role.create','新建角色','页面',0,0,'2018-06-30 02:40:22','2018-06-30 02:40:22'),(53,21,'','admin.role.store','保存新建角色','操作',0,0,'2018-06-30 02:40:23','2018-06-30 02:40:23'),(54,21,'','admin.role.edit','编辑角色','页面',0,0,'2018-06-30 02:40:24','2018-06-30 02:40:24'),(55,21,'','admin.role.update','保存编辑角色','操作',0,0,'2018-06-30 02:40:25','2018-06-30 02:40:25'),(56,21,'','admin.role.permissions','角色权限设置','',0,0,'2018-06-30 02:40:26','2018-06-30 02:40:26'),(57,21,'','admin.role.destroy','角色删除','操作',0,0,'2018-06-30 02:40:27','2018-06-30 02:40:27'),(58,21,'','admin.role.destory.all','批量删除角色','',0,0,'2018-06-30 02:40:30','2018-06-30 02:40:30'),(59,0,'th-list','admin.reserve','预约工单','预约工单',1,0,'2018-06-30 02:50:20','2018-06-30 02:50:18'),(60,0,'wrench','admin.goods','维修工单','维修工单',1,0,'2018-06-30 03:10:23','2018-06-30 03:10:21'),(61,59,'edit','admin.reserve.handle','处理工单','预约工单处理操作',0,0,'2018-07-01 09:42:25','2018-07-01 09:42:25'),(62,0,'file-text','#-1531499572','财务账单','财务账单',1,0,'2018-07-13 16:32:53','2018-07-13 16:32:52'),(63,21,'','admin.admin_user.index','用户管理','用户管理',1,1,'2018-06-30 02:46:20','2018-06-30 02:46:18'),(64,60,'','admin.goods.detail','工单详情','工单详情页面',0,0,'2018-07-01 09:41:52','2018-07-01 09:41:52'),(65,60,'','admin.goods.submit','确认收货，完成工单','确认收货，完成工单操作',0,0,'2018-07-01 09:43:35','2018-07-01 09:43:35'),(66,60,'','admin.goods.price','修改工单价格','修改工单价格操作',0,0,'2018-07-01 09:44:18','2018-07-01 09:44:18'),(67,60,'','admin.goods.price.page','修改工单价格页面','修改工单价格页面',0,0,'2018-07-01 09:44:54','2018-07-01 09:44:54'),(68,60,'','admin.goods.price.history','修改工单价格历史记录','修改工单价格历史记录',0,0,'2018-07-01 09:45:43','2018-07-01 09:45:43'),(69,60,'','admin.goods.close','取消工单操作','取消工单操作',0,0,'2018-07-01 09:46:35','2018-07-01 09:46:35'),(70,60,'','admin.goods.courier','工单发货详情页面','工单发货详情页面',0,0,'2018-07-01 09:47:42','2018-07-01 09:47:42'),(71,60,'','admin.goods.courier.upate','更新发货信息','更新发货信息操作',0,0,'2018-07-01 09:49:02','2018-07-01 09:49:02'),(72,60,'','admin.image','上传维修组图','上传维修组图',0,0,'2018-07-01 09:49:11','2018-07-01 09:49:11'),(73,0,'user','admin.user','会员中心','会员列表',1,0,'2018-07-04 15:27:01','2018-07-04 15:27:00'),(74,73,'th-list','admin.user.reserve','预约记录','预约记录',0,0,'2018-07-09 16:28:35','2018-07-09 16:28:35'),(75,73,'th-list','admin.user.order','订单记录','订单记录',0,0,'2018-07-09 16:29:10','2018-07-09 16:29:10'),(76,62,'','admin.order','财务统计','财务统计',1,0,'2018-07-13 16:33:46','2018-07-13 16:33:46'),(77,62,'','admin.order.month','月度统计','月度统计',1,0,'2018-07-13 16:34:24','2018-07-13 16:34:24');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
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
-- Table structure for table `t_comment`
--

DROP TABLE IF EXISTS `t_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水id',
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `value` varchar(1024) NOT NULL COMMENT '备注内容',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='维修工单备注记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_comment`
--

/*!40000 ALTER TABLE `t_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_comment` ENABLE KEYS */;

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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1531 DEFAULT CHARSET=utf8mb4 COMMENT='快递记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_courier`
--

/*!40000 ALTER TABLE `t_courier` DISABLE KEYS */;
INSERT INTO `t_courier` (`id`, `watch_id`, `payment_type`, `type`, `number`, `created_at`, `updated_at`) VALUES (1,2,0,0,'','2018-06-24 07:28:09','2018-06-24 07:28:09'),(2,6,0,1,'1222222','2018-06-24 15:42:17','2018-06-24 15:42:17'),(3,16,0,0,' ','2018-06-25 15:05:04','2018-06-25 15:05:15'),(4,15,1,1,'111','2018-07-01 09:36:42','2018-07-01 09:36:42'),(5,1499,0,0,'','2018-07-01 11:40:02','2018-07-01 11:40:02'),(6,1500,0,1,'123456','2018-07-01 11:50:32','2018-07-01 11:50:32'),(7,1501,0,1,'1234dd','2018-07-01 12:07:16','2018-07-01 12:07:16'),(8,1501,1,1,'23455','2018-07-01 12:28:29','2018-07-01 12:28:29'),(9,1502,0,0,'','2018-07-01 12:40:43','2018-07-01 12:40:43'),(10,1503,0,0,'','2018-07-01 13:15:22','2018-07-01 13:15:22'),(11,1504,0,0,'','2018-07-01 13:25:06','2018-07-01 13:25:06'),(12,1505,0,0,'','2018-07-01 17:51:10','2018-07-01 17:51:10'),(13,1506,0,0,'','2018-07-01 17:51:27','2018-07-01 17:51:27'),(14,1508,0,0,'','2018-07-08 08:36:50','2018-07-08 08:36:50'),(15,1510,0,0,'','2018-07-09 11:13:00','2018-07-09 11:13:00'),(1511,0,0,0,'','2018-07-09 16:23:15','2018-07-09 16:23:15'),(1512,0,0,0,'','2018-07-11 13:39:49','2018-07-11 13:39:49'),(1513,0,0,0,'','2018-07-11 15:37:24','2018-07-11 15:37:24'),(1514,0,0,0,'','2018-07-11 15:37:48','2018-07-11 15:37:48'),(1515,0,0,0,'','2018-07-11 15:38:20','2018-07-11 15:38:20'),(1516,0,0,0,'','2018-07-11 15:41:23','2018-07-11 15:41:23'),(1517,0,0,0,'','2018-07-11 15:41:51','2018-07-11 15:41:51'),(1518,0,0,0,'','2018-07-11 16:01:45','2018-07-11 16:01:45'),(1519,0,0,0,'','2018-07-11 16:12:52','2018-07-11 16:12:52'),(1520,0,0,0,'','2018-07-11 16:30:11','2018-07-11 16:30:11'),(1521,0,0,0,'','2018-07-11 16:36:25','2018-07-11 16:36:25'),(1522,0,0,0,'','2018-07-11 16:38:54','2018-07-11 16:38:54'),(1523,0,0,0,'','2018-07-11 16:42:31','2018-07-11 16:42:31'),(1524,0,0,0,'','2018-07-11 16:44:33','2018-07-11 16:44:33'),(1525,0,0,0,'','2018-07-11 16:45:00','2018-07-11 16:45:00'),(1526,0,0,0,'','2018-07-11 16:49:36','2018-07-11 16:49:36'),(1527,0,0,0,'','2018-07-11 16:50:02','2018-07-11 16:50:02'),(1528,0,0,0,'','2018-07-11 16:50:05','2018-07-11 16:50:05'),(1529,1529,1,0,'','2018-07-12 13:22:08','2018-07-12 13:22:08'),(1530,20,1,0,'12222','2018-07-12 15:09:17','2018-07-12 15:09:17');
/*!40000 ALTER TABLE `t_courier` ENABLE KEYS */;

--
-- Table structure for table `t_image`
--

DROP TABLE IF EXISTS `t_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `watch_id` int(11) NOT NULL COMMENT '腕表id',
  `uploader` int(11) NOT NULL COMMENT '上传方:1-用户，2-卖家',
  `img_url` varchar(256) NOT NULL COMMENT '图片url',
  `img_url_compress` varchar(256) NOT NULL COMMENT '压缩图片url',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_image`
--

/*!40000 ALTER TABLE `t_image` DISABLE KEYS */;
INSERT INTO `t_image` (`id`, `watch_id`, `uploader`, `img_url`, `img_url_compress`, `created_at`, `updated_at`) VALUES (1,19,1,'/uploads/images/2018-06-30/20180630_0016582792.jpg','','2018-06-29 17:53:28','2018-06-29 17:53:28'),(2,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:30','2018-06-29 17:53:30'),(3,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:32','2018-06-29 17:53:32'),(4,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:34','2018-06-29 17:53:34'),(18,19,2,'/uploads/images/2018-07-01/20180701_1446290740149.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(19,19,2,'/uploads/images/2018-07-01/20180701_1446290151783.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(20,19,2,'/uploads/images/2018-07-01/20180701_1446295347552.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(25,18,2,'/uploads/images/2018-07-01/20180701_1813243857318.jpg','','2018-07-01 10:13:24','2018-07-01 10:13:24'),(26,1499,1,'','','2018-07-01 11:39:59','2018-07-01 11:39:59'),(27,1500,1,'/uploads/images/2018-07-01/20180701_1950162911561.jpg','','2018-07-01 11:50:17','2018-07-01 11:50:17'),(28,1500,1,'/uploads/images/2018-07-01/20180701_1950165207781.jpg','','2018-07-01 11:50:17','2018-07-01 11:50:17'),(29,1500,1,'/uploads/images/2018-07-01/20180701_1950164148652.jpg','','2018-07-01 11:50:17','2018-07-01 11:50:17'),(30,1500,1,'/uploads/images/2018-07-01/20180701_1950162625822.jpg','','2018-07-01 11:50:17','2018-07-01 11:50:17'),(31,1501,1,'/uploads/images/2018-07-01/20180701_2007033762291.jpg','','2018-07-01 12:07:05','2018-07-01 12:07:05'),(32,1501,2,'/uploads/images/2018-07-01/20180701_2023121671323.jpg','','2018-07-01 12:23:12','2018-07-01 12:23:12'),(33,1501,2,'/uploads/images/2018-07-01/20180701_2023120576792.jpg','','2018-07-01 12:23:12','2018-07-01 12:23:12'),(34,1502,1,'/uploads/images/2018-07-01/20180701_2039294514716.jpg','','2018-07-01 12:39:29','2018-07-01 12:39:29'),(35,1503,1,'/uploads/images/2018-07-01/20180701_2114404945476.jpg','','2018-07-01 13:14:40','2018-07-01 13:14:40'),(36,1503,1,'/uploads/images/2018-07-01/20180701_2114403642389.jpg','','2018-07-01 13:14:41','2018-07-01 13:14:40'),(37,1503,1,'/uploads/images/2018-07-01/20180701_2114407759988.jpg','','2018-07-01 13:14:41','2018-07-01 13:14:40'),(38,1503,1,'/uploads/images/2018-07-01/20180701_2114406439662.jpeg','','2018-07-01 13:14:41','2018-07-01 13:14:41'),(39,0,1,'/uploads/images/2018-07-11/20180711_2140096920203.jpg','','2018-07-11 13:40:09','2018-07-11 13:40:09'),(40,0,1,'/uploads/images/2018-07-11/20180711_2140095138531.png','','2018-07-11 13:40:09','2018-07-11 13:40:09'),(41,1,1,'/uploads/images/2018-07-12/20180712_0013129930803.jpg','','2018-07-11 16:13:13','2018-07-11 16:13:13'),(42,1,1,'/uploads/images/2018-07-12/20180712_0013125383407.jpg','','2018-07-11 16:13:13','2018-07-11 16:13:13'),(43,1,1,'/uploads/images/2018-07-12/20180712_0013124750103.jpg','','2018-07-11 16:13:13','2018-07-11 16:13:13'),(44,1,1,'/uploads/images/2018-07-12/20180712_0013125608278.jpg','','2018-07-11 16:13:13','2018-07-11 16:13:13'),(45,1,1,'/uploads/images/2018-07-12/20180712_0036391618375.jpg','','2018-07-11 16:36:39','2018-07-11 16:36:39'),(46,1,1,'/uploads/images/2018-07-12/20180712_0036399559270.jpg','','2018-07-11 16:36:39','2018-07-11 16:36:39'),(47,1,1,'/uploads/images/2018-07-12/20180712_0045147301678.jpg','','2018-07-11 16:45:14','2018-07-11 16:45:15'),(48,1,1,'/uploads/images/2018-07-12/20180712_0045143728847.jpg','','2018-07-11 16:45:14','2018-07-11 16:45:15'),(49,1525,1,'/uploads/images/2018-07-12/20180712_0045147301678.jpg','','2018-07-11 16:46:27','2018-07-11 16:46:27'),(50,1525,1,'/uploads/images/2018-07-12/20180712_0045143728847.jpg','','2018-07-11 16:46:27','2018-07-11 16:46:27');
/*!40000 ALTER TABLE `t_image` ENABLE KEYS */;

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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='维修工单记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_orders`
--

/*!40000 ALTER TABLE `t_orders` DISABLE KEYS */;
INSERT INTO `t_orders` (`id`, `uid`, `user_id`, `watch_id`, `out_order_id`, `transaction_id`, `price`, `pay_time`, `status`, `finish_time`, `cancel_time`, `created_at`, `updated_at`) VALUES (1,'20180624213957',4,15,'','',10,NULL,2,NULL,'2018-07-01 17:36:49','2018-07-12 13:38:57','2018-07-12 13:38:57'),(2,'20180624213923',4,16,'','',10000,NULL,3,NULL,NULL,'2018-07-12 14:20:25','2018-07-12 14:20:25'),(3,'20180624213945',4,17,'','',30000,NULL,3,NULL,NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(4,'20180624213923',4,18,'','',233300,NULL,3,NULL,NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(5,'20180624213923',4,19,'','',1000,NULL,5,NULL,NULL,'2018-07-12 14:14:14','2018-07-12 14:14:14'),(6,'20180624213923',4,20,'','',0,'2018-07-12 22:58:49',5,NULL,NULL,'2018-07-12 14:58:50','2018-07-12 14:58:50'),(7,'20180624213923',4,21,'','',0,'2018-06-25 22:38:42',5,NULL,NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(8,'20180624213923',4,22,'','',0,'2018-06-25 22:38:42',6,NULL,NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(9,'20180624213923',4,23,'','',0,NULL,7,NULL,NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(10,'20180701195621017701',4,1500,'','',0,NULL,1,NULL,NULL,'2018-07-01 12:02:37','2018-07-01 12:02:37'),(11,'20180701201228016075',4,1501,'','',1590,'2018-07-01 20:27:43',6,'2018-07-01 20:28:43',NULL,'2018-07-01 12:28:43','2018-07-01 12:28:43'),(12,'20180701204132913172',4,1502,'','',25000,'2018-07-01 21:00:15',6,'2018-07-01 21:02:02',NULL,'2018-07-12 13:35:51','2018-07-12 13:35:51'),(20,'20180712003645056552',4,1521,'','',0,NULL,0,NULL,NULL,'2018-07-11 16:36:45','2018-07-11 16:36:45'),(21,'20180712004800950570',4,1525,'','',0,NULL,0,NULL,NULL,'2018-07-11 16:48:00','2018-07-11 16:48:01');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_price_records`
--

/*!40000 ALTER TABLE `t_price_records` DISABLE KEYS */;
INSERT INTO `t_price_records` (`id`, `order_id`, `modify_user`, `present_price`, `change_price`, `comment`, `created_at`, `updated_at`) VALUES (1,2,1,0,10000,'ceshi','2018-06-27 15:18:55','2018-06-27 15:18:55'),(2,2,1,0,10000,'ceshi','2018-06-27 15:18:53','2018-06-27 15:18:53'),(3,1,1,10,990,'ceshi','2018-06-27 15:18:49','2018-06-27 15:18:49'),(4,1,1,1000,99000,'ceshi2','2018-06-27 15:18:51','2018-06-27 15:18:51'),(5,1,1,100000,-99990,'ssss','2018-06-27 15:21:33','2018-06-27 15:21:34'),(6,5,1,0,1000,'修改价格','2018-07-01 07:01:56','2018-07-01 07:01:56'),(7,3,1,0,200,'1','2018-07-01 09:28:06','2018-07-01 09:28:06'),(8,4,1,0,1000,'d\'s\'f\'s\'f','2018-07-01 09:38:52','2018-07-01 09:38:52'),(9,4,1,1000,0,'d\'s\'f\'s\'f','2018-07-01 09:38:54','2018-07-01 09:38:54'),(10,4,1,1000,-977,'sdfsf','2018-07-01 09:39:13','2018-07-01 09:39:13'),(11,4,1,23,0,'sdfsdfsd','2018-07-01 09:39:49','2018-07-01 09:39:49'),(12,4,1,23,0,'sdfsdfsd','2018-07-01 09:39:55','2018-07-01 09:39:55'),(13,3,1,200,-200,'','2018-07-01 09:44:07','2018-07-01 09:44:07'),(14,3,1,0,0,'','2018-07-01 09:46:16','2018-07-01 09:46:16'),(15,3,1,0,0,'','2018-07-01 09:50:40','2018-07-01 09:50:40'),(16,3,1,0,0,'','2018-07-01 09:51:53','2018-07-01 09:51:53'),(17,3,1,0,3,'','2018-07-01 09:55:40','2018-07-01 09:55:40'),(18,11,1,0,100000,'22','2018-07-01 12:14:25','2018-07-01 12:14:25'),(19,11,1,100000,-99855,'22','2018-07-01 12:16:30','2018-07-01 12:16:30'),(20,11,1,145,1445,'','2018-07-01 12:17:00','2018-07-01 12:17:00'),(21,12,1,0,20000,'内测','2018-07-01 12:55:09','2018-07-01 12:55:09'),(22,12,1,20000,-15000,'发现问题被充','2018-07-01 12:57:15','2018-07-01 12:57:15'),(23,12,1,5000,20000,'加了50块钱','2018-07-01 12:57:44','2018-07-01 12:57:44'),(24,4,1,23,233277,'','2018-07-01 13:13:14','2018-07-01 13:13:14'),(25,3,1,3,29997,'','2018-07-01 13:13:53','2018-07-01 13:13:53');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reserve`
--

/*!40000 ALTER TABLE `t_reserve` DISABLE KEYS */;
INSERT INTO `t_reserve` (`id`, `user_id`, `phone`, `status`, `handle_time`, `created_at`, `updated_at`) VALUES (1,5,'1234',1,'2018-06-25 01:20:13','2018-07-09 14:44:21','2018-07-09 14:44:21'),(2,5,'1234',1,'2018-06-25 01:20:22','2018-07-09 14:44:21','2018-07-09 14:44:21'),(3,5,'1234',1,'2018-06-25 01:20:29','2018-07-09 14:44:21','2018-07-09 14:44:21'),(4,5,'1234',1,'2018-06-25 02:00:53','2018-07-09 14:44:21','2018-07-09 14:44:21'),(5,5,'1234',1,'2018-06-27 00:15:34','2018-07-09 14:44:21','2018-07-09 14:44:21'),(6,5,'1234',1,'2018-06-27 00:16:36','2018-07-09 14:44:21','2018-07-09 14:44:21'),(7,5,'1234',1,'2018-07-01 17:35:35','2018-07-09 14:44:21','2018-07-09 14:44:21'),(8,5,'1234',0,'2018-06-25 01:12:51','2018-07-09 14:44:21','2018-07-09 14:44:21'),(9,5,'1234',0,'2018-06-25 01:15:28','2018-07-09 14:44:22','2018-07-09 14:44:22'),(10,5,'1234',0,'2018-06-25 01:18:30','2018-07-09 14:44:22','2018-07-09 14:44:22'),(11,5,'1234',0,NULL,'2018-07-09 14:44:22','2018-07-09 14:44:22'),(12,3,'18403018682',0,NULL,'2018-06-25 14:54:38','2018-06-25 14:54:40');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user`
--

/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` (`id`, `username`, `phone`, `created_at`, `updated_at`) VALUES (1,'xiaoming','1233','2018-06-24 05:40:32','2018-06-24 05:40:34'),(2,'xiaoming','111','2018-06-24 05:40:44','2018-06-24 05:40:46'),(3,'崔平伟','18403018682','2018-06-24 13:39:56','2018-06-24 13:39:56'),(4,'崔平伟','17603018628','2018-07-01 11:56:21','2018-07-01 11:56:21'),(5,'李贺龙','13760324350','2018-07-01 12:41:32','2018-07-01 12:41:32');
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
  `data` varchar(128) NOT NULL COMMENT '短信内容',
  `used` int(1) NOT NULL DEFAULT '0' COMMENT '是否验证使用过 0-否 1-是',
  `expire_at` datetime DEFAULT NULL COMMENT '过期时间',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162801 DEFAULT CHARSET=utf8mb4 COMMENT='短信验证码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_verify_codes`
--

/*!40000 ALTER TABLE `t_verify_codes` DISABLE KEYS */;
INSERT INTO `t_verify_codes` (`id`, `phone`, `code`, `data`, `used`, `expire_at`, `created_at`, `updated_at`) VALUES (162794,'17603018628','9940','【博士豪】9940(手机验证码，请完成验证)，如非本人操作，请忽略本短信',1,'2018-07-01 20:53:17','2018-07-01 12:12:28','2018-07-01 12:12:28'),(162795,'13760324350','3831','【博士豪】3831(手机验证码，请完成验证)，如非本人操作，请忽略本短信',0,'2018-07-01 21:07:49','2018-07-01 12:37:49','2018-07-01 12:37:53'),(162796,'13760324350','6815','【博士豪】6815(手机验证码，请完成验证)，如非本人操作，请忽略本短信',1,'2018-07-01 21:11:03','2018-07-01 12:41:32','2018-07-01 12:41:32'),(162797,'13760324350','9792','【博士豪】9792(手机验证码，请完成验证)，如非本人操作，请忽略本短信',0,'2018-07-01 21:45:33','2018-07-01 13:15:33','2018-07-01 13:15:33'),(162798,'17603018628','8285','【博士豪】8285(手机验证码，请完成验证)，如非本人操作，请忽略本短信',1,'2018-07-11 23:35:04','2018-07-11 15:33:00','2018-07-11 15:33:00'),(162799,'17603018628','2396','【博士豪】2396(手机验证码，请完成验证)，如非本人操作，请忽略本短信',0,'2018-07-11 23:41:40','2018-07-11 15:11:40','2018-07-11 15:11:40'),(162800,'17603018628','6999','【博士豪】6999(手机验证码，请完成验证)，如非本人操作，请忽略本短信',1,'2018-07-12 21:57:09','2018-07-12 13:27:30','2018-07-12 13:27:30');
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
  `movement` varchar(64) NOT NULL COMMENT '机芯:1-石英机芯，2-机械机芯，3-多功能机芯',
  `watch_case` varchar(64) NOT NULL COMMENT '表壳：1-不锈钢，2-18k金，3-千足金，4-钻石',
  `watch_face` varchar(64) NOT NULL COMMENT '字面',
  `watch_band` varchar(64) NOT NULL COMMENT '表带',
  `watch_clasp` varchar(64) NOT NULL COMMENT '表扣',
  `height` int(11) NOT NULL COMMENT '重量',
  `watch_comment` varchar(128) NOT NULL COMMENT '备注',
  `error_movement` varchar(64) NOT NULL,
  `error_case` varchar(64) NOT NULL COMMENT '表壳故障',
  `error_bezel` varchar(64) NOT NULL,
  `error_cover` varchar(64) NOT NULL,
  `error_bade` varchar(64) NOT NULL,
  `error_screws` varchar(64) NOT NULL,
  `error_glass` varchar(64) NOT NULL,
  `error_pin` varchar(64) NOT NULL,
  `error_face` varchar(64) NOT NULL,
  `error_band` varchar(64) NOT NULL,
  `error_clasp` varchar(64) NOT NULL,
  `error_function` varchar(64) NOT NULL,
  `error_comment` varchar(256) NOT NULL COMMENT '问题描述',
  `province` varchar(16) NOT NULL COMMENT '省',
  `city` varchar(16) NOT NULL COMMENT '市',
  `district` varchar(16) NOT NULL COMMENT '区域',
  `area` varchar(64) NOT NULL COMMENT '详细地址',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1530 DEFAULT CHARSET=utf8mb4 COMMENT='腕表配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_watch`
--

/*!40000 ALTER TABLE `t_watch` DISABLE KEYS */;
INSERT INTO `t_watch` (`id`, `user_id`, `movement`, `watch_case`, `watch_face`, `watch_band`, `watch_clasp`, `height`, `watch_comment`, `error_movement`, `error_case`, `error_bezel`, `error_cover`, `error_bade`, `error_screws`, `error_glass`, `error_pin`, `error_face`, `error_band`, `error_clasp`, `error_function`, `error_comment`, `province`, `city`, `district`, `area`, `created_at`, `updated_at`) VALUES (1,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(2,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(3,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-24 07:28:05','2018-06-24 07:28:05'),(14,0,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:49:07','2018-06-25 16:49:07'),(15,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:49:12','2018-06-25 16:49:12'),(16,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 15:08:47','2018-06-25 15:08:47'),(17,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(18,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(19,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:36','2018-06-25 16:48:36'),(20,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(21,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(22,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:38','2018-06-25 16:48:38'),(23,3,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 16:48:40','2018-06-25 16:48:40'),(24,0,'1','2','1','0','2',111,'111111111','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-25 14:33:15','2018-06-25 14:33:15'),(1496,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-29 16:16:51','2018-06-29 16:16:51'),(1497,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-29 16:17:00','2018-06-29 16:17:00'),(1498,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-06-29 16:18:42','2018-06-29 16:18:42'),(1499,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-01 11:39:59','2018-07-01 11:39:59'),(1500,0,'0','1','0','1','0',100,'测试工单','2','2','0','0','2','0','0','0','0','2','0','0','','','','','','2018-07-01 11:50:32','2018-07-01 11:50:32'),(1501,0,'1','2','0','1','1',100,'111','0','0','3','3','0','0','0','0','2','0','0','0','','北京','市辖区','东城区','2323','2018-07-01 12:12:28','2018-07-01 12:12:28'),(1502,0,'1','1','0','1','1',120,'走时不太准确。维修一下。','5','2','1','1','1','1','1','1','1','4','1','1','','广东','深圳市','罗湖区','水贝珠宝交易中心','2018-07-01 12:41:32','2018-07-01 12:41:32'),(1503,0,'1','1','3','1','0',127,'这是一个备注手表状态说明。','5','3','3','2','2','2','2','2','3','2','3','1','','','','','','2018-07-01 13:15:22','2018-07-01 13:15:22'),(1504,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-01 13:25:01','2018-07-01 13:25:01'),(1505,0,'1','1','1','2','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-01 17:51:06','2018-07-01 17:51:06'),(1506,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-01 17:51:25','2018-07-01 17:51:25'),(1507,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-04 05:24:31','2018-07-04 05:24:31'),(1508,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-08 08:36:35','2018-07-08 08:36:35'),(1509,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-08 17:02:13','2018-07-08 17:02:13'),(1510,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-09 11:12:58','2018-07-09 11:12:58'),(1511,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-09 16:23:15','2018-07-09 16:23:15'),(1517,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','2','2','0','','','','','','2018-07-11 15:41:51','2018-07-11 15:41:51'),(1518,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-11 16:01:45','2018-07-11 16:01:45'),(1519,4,'1','1','1','0','1',127,'','2','2','0','0','0','0','0','0','2','0','0','0','','湖北','武汉市','江夏区','zhognguo ','2018-07-11 16:14:01','2018-07-11 16:14:01'),(1520,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','','','','','','2018-07-11 16:30:11','2018-07-11 16:30:11'),(1521,4,'1','1','1','5','1',111,'','0','2','2','2','0','0','0','0','0','2','0','0','','北京','市辖区','东城区','111','2018-07-11 16:36:45','2018-07-11 16:36:45'),(1522,0,'0','0','0','0','0',0,'','1','2','0','2','0','0','0','0','0','0','0','0','','','','','','2018-07-11 16:38:54','2018-07-11 16:38:54'),(1523,0,'0','0','0','0','0',0,'','2','2','0','0','0','0','0','0','0','0','0','0','11111111111111','','','','','2018-07-11 16:42:31','2018-07-11 16:42:31'),(1524,0,'0','0','0','0','0',0,'','1','2','2','2','0','0','0','0','0','0','0','0','我是第一个测试','','','','','2018-07-11 16:44:33','2018-07-11 16:44:33'),(1525,4,'0','1','0','1','0',0,'我是第二个测试','0','0','0','0','0','0','0','1','1','1','0','0','我是第一个测试','北京','市辖区','东城区','1111','2018-07-11 16:48:01','2018-07-11 16:48:01'),(1526,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','2','0','11','','','','','2018-07-11 16:49:36','2018-07-11 16:49:36'),(1527,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','2','0','11','','','','','2018-07-11 16:50:02','2018-07-11 16:50:02'),(1528,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','2','0','11','','','','','2018-07-11 16:50:05','2018-07-11 16:50:05'),(1529,0,'0','0','0','0','0',0,'','0','0','0','0','0','0','0','0','0','0','0','0','11','','','','','2018-07-12 13:22:08','2018-07-12 13:22:08');
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
  `created_at` timestamp NOT NULL COMMENT '创建时间',
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

-- Dump completed on 2018-07-14  0:35:29
