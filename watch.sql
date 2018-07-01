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
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES (21,10),(22,10),(35,10),(38,10),(39,10),(40,10),(42,10),(43,10),(44,10),(45,10),(46,10),(47,10),(48,10),(49,10),(50,10),(51,10),(52,10),(53,10),(54,10),(55,10),(56,10),(57,10),(58,10),(59,10),(60,10),(61,10),(63,10),(64,10),(65,10),(66,10),(67,10),(68,10),(69,10),(70,10),(71,10),(72,10),(35,12);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `fid`, `icon`, `name`, `display_name`, `description`, `is_menu`, `sort`, `created_at`, `updated_at`) VALUES (21,0,'laptop','#-1530326619','系统设置','系统设置',1,5,'2018-06-30 02:43:41','2018-06-30 02:43:39'),(22,21,'','admin.admin_user.create','创建后台用户','页面',0,0,'2018-06-30 02:40:03','2018-06-30 02:40:03'),(35,0,'dashboard','admin.home','Dashboard','后台首页',1,0,'2018-06-30 03:17:45','2018-06-30 03:17:43'),(38,21,'','admin.admin_user.store','保存新建后台用户','操作',0,0,'2018-06-30 02:40:08','2018-06-30 02:40:08'),(39,21,'','admin.admin_user.destroy','删除后台用户','操作',0,0,'2018-06-30 02:40:09','2018-06-30 02:40:09'),(40,21,'','admin.admin_user.destory.all','批量后台用户删除','操作',0,0,'2018-06-30 02:40:11','2018-06-30 02:40:11'),(42,21,'','admin.admin_user.edit','编辑后台用户','页面',0,0,'2018-06-30 02:40:12','2018-06-30 02:40:12'),(43,21,'','admin.admin_user.update','保存编辑后台用户','操作',0,0,'2018-06-30 02:40:13','2018-06-30 02:40:13'),(44,21,'','admin.permission.index','权限管理','页面',1,3,'2018-06-30 02:46:53','2018-06-30 02:46:51'),(45,21,'','admin.permission.create','新建权限','页面',0,0,'2018-06-30 02:40:15','2018-06-30 02:40:15'),(46,21,'','admin.permission.store','保存新建权限','操作',0,0,'2018-06-30 02:40:16','2018-06-30 02:40:16'),(47,21,'','admin.permission.edit','编辑权限','页面',0,0,'2018-06-30 02:40:17','2018-06-30 02:40:17'),(48,21,'','admin.permission.update','保存编辑权限','操作',0,0,'2018-06-30 02:40:18','2018-06-30 02:40:18'),(49,21,'','admin.permission.destroy','删除权限','操作',0,0,'2018-06-30 02:40:19','2018-06-30 02:40:19'),(50,21,'','admin.permission.destory.all','批量删除权限','操作',0,0,'2018-06-30 02:40:20','2018-06-30 02:40:20'),(51,21,'','admin.role.index','角色管理','页面',1,2,'2018-06-30 02:46:42','2018-06-30 02:46:39'),(52,21,'','admin.role.create','新建角色','页面',0,0,'2018-06-30 02:40:22','2018-06-30 02:40:22'),(53,21,'','admin.role.store','保存新建角色','操作',0,0,'2018-06-30 02:40:23','2018-06-30 02:40:23'),(54,21,'','admin.role.edit','编辑角色','页面',0,0,'2018-06-30 02:40:24','2018-06-30 02:40:24'),(55,21,'','admin.role.update','保存编辑角色','操作',0,0,'2018-06-30 02:40:25','2018-06-30 02:40:25'),(56,21,'','admin.role.permissions','角色权限设置','',0,0,'2018-06-30 02:40:26','2018-06-30 02:40:26'),(57,21,'','admin.role.destroy','角色删除','操作',0,0,'2018-06-30 02:40:27','2018-06-30 02:40:27'),(58,21,'','admin.role.destory.all','批量删除角色','',0,0,'2018-06-30 02:40:30','2018-06-30 02:40:30'),(59,0,'th-list','admin.reserve','预约工单','预约工单',1,0,'2018-06-30 02:50:20','2018-06-30 02:50:18'),(60,0,'wrench','admin.goods','维修工单','维修工单',1,0,'2018-06-30 03:10:23','2018-06-30 03:10:21'),(61,59,'edit','admin.reserve.handle','处理工单','预约工单处理操作',0,0,'2018-07-01 09:42:25','2018-07-01 09:42:25'),(62,0,'file-text','admin.order','财务账单','财务账单',1,0,'2018-06-30 02:49:41','2018-06-30 02:49:38'),(63,21,'','admin.admin_user.index','用户管理','用户管理',1,1,'2018-06-30 02:46:20','2018-06-30 02:46:18'),(64,60,'','admin.goods.detail','工单详情','工单详情页面',0,0,'2018-07-01 09:41:52','2018-07-01 09:41:52'),(65,60,'','admin.goods.submit','确认收货，完成工单','确认收货，完成工单操作',0,0,'2018-07-01 09:43:35','2018-07-01 09:43:35'),(66,60,'','admin.goods.price','修改工单价格','修改工单价格操作',0,0,'2018-07-01 09:44:18','2018-07-01 09:44:18'),(67,60,'','admin.goods.price.page','修改工单价格页面','修改工单价格页面',0,0,'2018-07-01 09:44:54','2018-07-01 09:44:54'),(68,60,'','admin.goods.price.history','修改工单价格历史记录','修改工单价格历史记录',0,0,'2018-07-01 09:45:43','2018-07-01 09:45:43'),(69,60,'','admin.goods.close','取消工单操作','取消工单操作',0,0,'2018-07-01 09:46:35','2018-07-01 09:46:35'),(70,60,'','admin.goods.courier','工单发货详情页面','工单发货详情页面',0,0,'2018-07-01 09:47:42','2018-07-01 09:47:42'),(71,60,'','admin.goods.courier.upate','更新发货信息','更新发货信息操作',0,0,'2018-07-01 09:49:02','2018-07-01 09:49:02'),(72,60,'','admin.image','上传维修组图','上传维修组图',0,0,'2018-07-01 09:49:11','2018-07-01 09:49:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='快递记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_courier`
--

/*!40000 ALTER TABLE `t_courier` DISABLE KEYS */;
INSERT INTO `t_courier` (`id`, `watch_id`, `payment_type`, `type`, `number`, `created_at`, `updated_at`) VALUES (1,2,0,0,'','2018-06-24 07:28:09','2018-06-24 07:28:09'),(2,6,0,1,'1222222','2018-06-24 15:42:17','2018-06-24 15:42:17'),(3,16,0,0,' ','2018-06-25 15:05:04','2018-06-25 15:05:15'),(4,15,1,1,'111','2018-07-01 09:36:42','2018-07-01 09:36:42'),(5,1499,0,0,'','2018-07-01 11:40:02','2018-07-01 11:40:02');
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_image`
--

/*!40000 ALTER TABLE `t_image` DISABLE KEYS */;
INSERT INTO `t_image` (`id`, `watch_id`, `uploader`, `img_url`, `img_url_compress`, `created_at`, `updated_at`) VALUES (1,19,1,'/uploads/images/2018-06-30/20180630_0016582792.jpg','','2018-06-29 17:53:28','2018-06-29 17:53:28'),(2,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:30','2018-06-29 17:53:30'),(3,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:32','2018-06-29 17:53:32'),(4,19,1,'/uploads/images/2018-06-30/20180630_0016339217.jpg','','2018-06-29 17:53:34','2018-06-29 17:53:34'),(18,19,2,'/uploads/images/2018-07-01/20180701_1446290740149.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(19,19,2,'/uploads/images/2018-07-01/20180701_1446290151783.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(20,19,2,'/uploads/images/2018-07-01/20180701_1446295347552.jpg','','2018-07-01 06:46:29','2018-07-01 06:46:29'),(25,18,2,'/uploads/images/2018-07-01/20180701_1813243857318.jpg','','2018-07-01 10:13:24','2018-07-01 10:13:24'),(26,1499,1,'','','2018-07-01 11:39:59','2018-07-01 11:39:59');
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_orders`
--

/*!40000 ALTER TABLE `t_orders` DISABLE KEYS */;
INSERT INTO `t_orders` (`id`, `uid`, `user_id`, `watch_id`, `out_order_id`, `transaction_id`, `price`, `pay_time`, `status`, `finish_time`, `cancel_time`, `created_at`, `updated_at`) VALUES (1,'20180624213957',3,15,'','',10,NULL,7,NULL,'2018-07-01 17:36:49','2018-07-01 09:37:31','2018-07-01 09:37:31'),(2,'20180624213923',3,16,'','',10000,NULL,7,NULL,NULL,'2018-06-27 15:02:22','2018-06-27 15:02:22'),(3,'20180624213945',3,17,'','',3,NULL,3,NULL,NULL,'2018-07-01 10:08:27','2018-07-01 10:08:27'),(4,'20180624213923',3,18,'','',23,NULL,3,NULL,NULL,'2018-07-01 09:39:14','2018-07-01 09:39:14'),(5,'20180624213923',3,19,'','',1000,NULL,4,NULL,NULL,'2018-07-01 07:24:46','2018-07-01 07:24:46'),(6,'20180624213923',3,20,'','',0,NULL,4,NULL,NULL,'2018-06-26 14:54:06','2018-06-26 14:54:06'),(7,'20180624213923',3,21,'','',0,'2018-06-25 22:38:42',5,NULL,NULL,'2018-06-25 16:48:04','2018-06-25 16:48:04'),(8,'20180624213923',3,22,'','',0,'2018-06-25 22:38:42',6,NULL,NULL,'2018-06-25 16:48:06','2018-06-25 16:48:06'),(9,'20180624213923',3,23,'','',0,NULL,7,NULL,NULL,'2018-06-26 14:54:09','2018-06-26 14:54:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_price_records`
--

/*!40000 ALTER TABLE `t_price_records` DISABLE KEYS */;
INSERT INTO `t_price_records` (`id`, `order_id`, `modify_user`, `present_price`, `change_price`, `comment`, `created_at`, `updated_at`) VALUES (1,2,1,0,10000,'ceshi','2018-06-27 15:18:55','2018-06-27 15:18:55'),(2,2,1,0,10000,'ceshi','2018-06-27 15:18:53','2018-06-27 15:18:53'),(3,1,1,10,990,'ceshi','2018-06-27 15:18:49','2018-06-27 15:18:49'),(4,1,1,1000,99000,'ceshi2','2018-06-27 15:18:51','2018-06-27 15:18:51'),(5,1,1,100000,-99990,'ssss','2018-06-27 15:21:33','2018-06-27 15:21:34'),(6,5,1,0,1000,'修改价格','2018-07-01 07:01:56','2018-07-01 07:01:56'),(7,3,1,0,200,'1','2018-07-01 09:28:06','2018-07-01 09:28:06'),(8,4,1,0,1000,'d\'s\'f\'s\'f','2018-07-01 09:38:52','2018-07-01 09:38:52'),(9,4,1,1000,0,'d\'s\'f\'s\'f','2018-07-01 09:38:54','2018-07-01 09:38:54'),(10,4,1,1000,-977,'sdfsf','2018-07-01 09:39:13','2018-07-01 09:39:13'),(11,4,1,23,0,'sdfsdfsd','2018-07-01 09:39:49','2018-07-01 09:39:49'),(12,4,1,23,0,'sdfsdfsd','2018-07-01 09:39:55','2018-07-01 09:39:55'),(13,3,1,200,-200,'','2018-07-01 09:44:07','2018-07-01 09:44:07'),(14,3,1,0,0,'','2018-07-01 09:46:16','2018-07-01 09:46:16'),(15,3,1,0,0,'','2018-07-01 09:50:40','2018-07-01 09:50:40'),(16,3,1,0,0,'','2018-07-01 09:51:53','2018-07-01 09:51:53'),(17,3,1,0,3,'','2018-07-01 09:55:40','2018-07-01 09:55:40');
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
INSERT INTO `t_reserve` (`id`, `user_id`, `phone`, `status`, `handle_time`, `created_at`, `updated_at`) VALUES (1,1,'1234',1,'2018-06-25 01:20:13','2018-06-24 17:20:13','2018-06-24 17:20:13'),(2,1,'1234',1,'2018-06-25 01:20:22','2018-06-24 17:20:22','2018-06-24 17:20:22'),(3,1,'1234',1,'2018-06-25 01:20:29','2018-06-24 17:20:29','2018-06-24 17:20:29'),(4,1,'1234',1,'2018-06-25 02:00:53','2018-06-24 18:00:53','2018-06-24 18:00:53'),(5,1,'1234',1,'2018-06-27 00:15:34','2018-06-26 16:15:35','2018-06-26 16:15:35'),(6,1,'1234',1,'2018-06-27 00:16:36','2018-06-26 16:16:36','2018-06-26 16:16:36'),(7,1,'1234',1,'2018-07-01 17:35:35','2018-07-01 09:35:35','2018-07-01 09:35:35'),(8,1,'1234',0,'2018-06-25 01:12:51','2018-06-24 17:20:02','2018-06-24 17:20:02'),(9,1,'1234',0,'2018-06-25 01:15:28','2018-06-24 17:20:02','2018-06-24 17:20:02'),(10,1,'1234',0,'2018-06-25 01:18:30','2018-06-24 17:20:02','2018-06-24 17:20:02'),(11,1,'1234',0,NULL,'2018-06-24 17:20:02','2018-06-24 17:20:02'),(12,3,'18403018682',0,NULL,'2018-06-25 14:54:38','2018-06-25 14:54:40');
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
  `data` varchar(128) NOT NULL COMMENT '短信内容',
  `used` int(1) NOT NULL DEFAULT '0' COMMENT '是否验证使用过 0-否 1-是',
  `expire_at` datetime DEFAULT NULL COMMENT '过期时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162795 DEFAULT CHARSET=utf8mb4 COMMENT='短信验证码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_verify_codes`
--

/*!40000 ALTER TABLE `t_verify_codes` DISABLE KEYS */;
INSERT INTO `t_verify_codes` (`id`, `phone`, `code`, `data`, `used`, `expire_at`, `created_at`, `updated_at`) VALUES (162794,'17603018628','9940','【博士豪】9940(手机验证码，请完成验证)，如非本人操作，请忽略本短信',0,'2018-07-01 19:53:17','2018-07-01 11:48:17','2018-07-01 11:48:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=1500 DEFAULT CHARSET=utf8mb4 COMMENT='腕表配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_watch`
--

/*!40000 ALTER TABLE `t_watch` DISABLE KEYS */;
INSERT INTO `t_watch` (`id`, `user_id`, `movement`, `watch_case`, `watch_face`, `watch_band`, `watch_clasp`, `height`, `watch_comment`, `error_movement`, `error_case`, `error_bezel`, `error_cover`, `error_bade`, `error_screws`, `error_glass`, `error_pin`, `error_face`, `error_band`, `error_clasp`, `error_function`, `error_comment`, `province`, `city`, `district`, `area`, `created_at`, `updated_at`) VALUES (1,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(2,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:04','2018-06-24 07:28:04'),(3,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-24 07:28:05','2018-06-24 07:28:05'),(14,0,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:49:07','2018-06-25 16:49:07'),(15,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:49:12','2018-06-25 16:49:12'),(16,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 15:08:47','2018-06-25 15:08:47'),(17,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(18,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:35','2018-06-25 16:48:35'),(19,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:36','2018-06-25 16:48:36'),(20,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(21,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:37','2018-06-25 16:48:37'),(22,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:38','2018-06-25 16:48:38'),(23,3,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 16:48:40','2018-06-25 16:48:40'),(24,0,1,2,1,0,2,111,'111111111',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-25 14:33:15','2018-06-25 14:33:15'),(1496,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-29 16:16:51','2018-06-29 16:16:51'),(1497,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-29 16:17:00','2018-06-29 16:17:00'),(1498,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-06-29 16:18:42','2018-06-29 16:18:42'),(1499,0,0,0,0,0,0,0,'',0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','2018-07-01 11:39:59','2018-07-01 11:39:59');
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

-- Dump completed on 2018-07-01 19:48:34
