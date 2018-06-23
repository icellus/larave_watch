
-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

CREATE DATABASE `db_watch` /*!40100 DEFAULT CHARACTER SET utf8mb4 */

create table t_user (
    id int(11) AUTO_INCREMENT PRIMARY KEY COMMENT '用户id',
    username varchar(64) not null COMMENT '用户姓名',
    phone VARCHAR(32) not NULL UNIQUE KEY comment '用户手机号',
    `created_at` timestamp NOT NULL  COMMENT '创建时间',
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';



create table t_reserve (
  id int(11) AUTO_INCREMENT PRIMARY KEY comment 'id',
  user_id int(11)  not null   COMMENT '用户id',
  phone VARCHAR(32) not null comment '预约手机号',
  `created_at` timestamp NOT NULL  COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';

create table t_orders (
  id int(11) AUTO_INCREMENT PRIMARY KEY  COMMENT '订单id',
  uid varchar(32) not null comment '订单流水号',
  user_id int(11) not null comment '用户id',
  repair_price int(11) not null comment '维修价格',
  extra_price int(11) not null comment '额外维修价格',
  price int(11) not null comment '订单总价格',
  pay_time DATETIME not NULL COMMENT '支付时间',
  status tinyint(2) not null comment '订单状态',
  `created_at` timestamp NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='预约记录表';

create table t_watch (
  id int(11) AUTO_INCREMENT PRIMARY KEY  COMMENT 'id',
  order_id int(11) not null comment '订单id',
  movement TINYINT(2) not null comment '机芯:1-石英机芯，2-机械机芯，3-多功能机芯',
  watch_case tinyint(2) not null comment '表壳：1-不锈钢，2-18k金，3-千足金，4-钻石',
  watch_face tinyint(2) not null comment '字面',
  watch_band tinyint(2) not null comment '表带',
  watch_clasp tinyint(2) not NULL comment '表扣',
  height tinyint(2) not null comment '重量',
  watch_comment VARCHAR(128) not null comment '备注',
  error_movement tinyint(2) not null comment '',
  error_case tinyint(2) not null comment '表壳故障',
  error_bezel tinyint(2) not null,
  error_cover tinyint(2) not null,
  error_bade tinyint(2) not null,
  error_screws tinyint(2) not null,
  error_glass tinyint(2) not null,
  error_pin tinyint(2) not null,
  error_face tinyint(2) not null,
  error_band tinyint(2) not null,
  error_clasp tinyint(2) not null,
  error_function tinyint(2) not null,
  error_comment varchar(256) not null comment '问题描述',
  area_code int(11) not null comment '地区id',
  area VARCHAR(64) not null comment '详细地址',
  `created_at` timestamp NOT NULL  COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='腕表配置表';

create table t_courier (
  id int(11) AUTO_INCREMENT PRIMARY KEY comment 'id',
  order_id int(11) not null comment '订单id',
  payment_type tinyint(2) not null DEFAULT 0 comment '支付方:0-用户.1-店铺',
  type tinyint(2) not null DEFAULT 0 comment '取货方式:0-自取,1-快递',
  number VARCHAR(64) not null comment '快递单号',
  `created_at` timestamp NOT NULL  COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='快递记录表';


  CREATE TABLE `t_verify_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(64) DEFAULT NULL COMMENT '手机号',
  `code` varchar(64) DEFAULT NULL COMMENT '验证码',
  `used` int(1) NOT NULL DEFAULT '0' COMMENT '是否验证使用过 0-否 1-是',
  `expire_at` DATETIME NULL DEFAULT NULL COMMENT '过期时间',
  `created_at` timestamp NOT NULL  COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间，有修改自动更新',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162794 DEFAULT CHARSET=utf8mb4 COMMENT='短信验证码'
;


  ALTER  table t_courier CHANGE order_id watch_id int(11) not null comment '腕表id' AFTER id;
  alter table t_watch change area_code province VARCHAR(16) not null COMMENT '省' AFTER error_comment;
ALTER table t_watch add city VARCHAR(16) not null COMMENT '市' AFTER province;
ALTER table t_watch add district VARCHAR(16) not null comment '区域' AFTER city;
ALTER table t_watch add user_id int(11) not null comment '用户id' AFTER id;
alter table t_orders add watch_id int(11) not null comment '腕表id' after user_id;
alter table t_orders add out_order_id VARCHAR(63) not null comment '外部订单id' after watch_id;
alter table t_orders add transaction_id VARCHAR(63) not null comment '微信订单' after out_order_id;


--
-- 表的结构 `admin_password_resets`
--

CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$GBKiY/ngDVpe1iHwlTem3e0fbNrnv1sRLGcj4wT1isK0gbzY4oQoC', 1, 'aot2y8pFRyurjUWQs2JiH3QWZJcSTepfsgB1qXPwtXST8inqnjdTwilMSaa4', '2018-06-19 02:44:26', '2018-06-19 02:44:26');

-- --------------------------------------------------------

--
-- 表的结构 `admin_user_role`
--

CREATE TABLE IF NOT EXISTS `admin_user_role` (
  `admin_user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `admin_user_role`
--

INSERT INTO `admin_user_role` (`admin_user_id`, `role_id`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(128) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_18_071439_create_admin_users', 1),
('2016_01_18_071720_create_admin_password_resets_table', 1),
('2016_01_23_031442_entrust_base', 1),
('2016_01_23_031518_entrust_pivot_admin_user_role', 1);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单父ID',
  `icon` varchar(128) DEFAULT NULL COMMENT '图标class',
  `name` varchar(128) NOT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否作为菜单显示,[1|0]',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `permissions`
--

INSERT INTO `permissions` (`id`, `fid`, `icon`, `name`, `display_name`, `description`, `is_menu`, `sort`, `created_at`, `updated_at`) VALUES
(20, 0, 'edit', '#-1456129983', '系统设置', '', 1, 100, '2018-06-19 08:33:03', '2018-06-19 08:33:03'),
(21, 20, '', 'admin.admin_user.index', '用户权限', '查看后台用户列表', 1, 0, '2018-06-19 07:56:26', '2018-06-19 07:56:26'),
(22, 20, '', 'admin.admin_user.create', '创建后台用户', '页面', 0, 0, '2018-06-19 03:48:18', '2018-06-19 03:48:18'),
(35, 0, 'home', 'admin.home', 'Dashboard', '后台首页', 1, 0, '2018-06-19 08:32:40', '2018-06-19 08:32:40'),
(36, 0, ' fa-laptop', '#-1456132007', '博客管理', '', 1, 0, '2018-06-19 09:06:47', '2018-06-19 09:06:47'),
(37, 36, '', 'admin.blog.index', '博客列表', '', 1, 0, '2018-06-19 09:15:48', '2018-06-19 09:15:48'),
(38, 20, '', 'admin.admin_user.store', '保存新建后台用户', '操作', 0, 0, '2018-06-19 03:48:52', '2018-06-19 03:48:52'),
(39, 20, '', 'admin.admin_user.destroy', '删除后台用户', '操作', 0, 0, '2018-06-19 03:49:09', '2018-06-19 03:49:09'),
(40, 20, '', 'admin.admin_user.destory.all', '批量后台用户删除', '操作', 0, 0, '2018-06-19 04:01:01', '2018-06-19 04:01:01'),
(42, 20, '', 'admin.admin_user.edit', '编辑后台用户', '页面', 0, 0, '2018-06-19 03:48:35', '2018-06-19 03:48:35'),
(43, 20, '', 'admin.admin_user.update', '保存编辑后台用户', '操作', 0, 0, '2018-06-19 03:50:12', '2018-06-19 03:50:12'),
(44, 20, '', 'admin.permission.index', '权限管理', '页面', 0, 0, '2018-06-19 03:51:36', '2018-06-19 03:51:36'),
(45, 20, '', 'admin.permission.create', '新建权限', '页面', 0, 0, '2018-06-19 03:52:16', '2018-06-19 03:52:16'),
(46, 20, '', 'admin.permission.store', '保存新建权限', '操作', 0, 0, '2018-06-19 03:52:38', '2018-06-19 03:52:38'),
(47, 20, '', 'admin.permission.edit', '编辑权限', '页面', 0, 0, '2018-06-19 03:53:29', '2018-06-19 03:53:29'),
(48, 20, '', 'admin.permission.update', '保存编辑权限', '操作', 0, 0, '2018-06-19 03:53:56', '2018-06-19 03:53:56'),
(49, 20, '', 'admin.permission.destroy', '删除权限', '操作', 0, 0, '2018-06-19 03:54:27', '2018-06-19 03:54:27'),
(50, 20, '', 'admin.permission.destory.all', '批量删除权限', '操作', 0, 0, '2018-06-19 03:55:17', '2018-06-19 03:55:17'),
(51, 20, '', 'admin.role.index', '角色管理', '页面', 0, 0, '2018-06-19 03:56:07', '2018-06-19 03:56:07'),
(52, 20, '', 'admin.role.create', '新建角色', '页面', 0, 0, '2018-06-19 03:56:33', '2018-06-19 03:56:33'),
(53, 20, '', 'admin.role.store', '保存新建角色', '操作', 0, 0, '2018-06-19 03:57:26', '2018-06-19 03:57:26'),
(54, 20, '', 'admin.role.edit', '编辑角色', '页面', 0, 0, '2018-06-19 03:58:25', '2018-06-19 03:58:25'),
(55, 20, '', 'admin.role.update', '保存编辑角色', '操作', 0, 0, '2018-06-19 03:58:50', '2018-06-19 03:58:50'),
(56, 20, '', 'admin.role.permissions', '角色权限设置', '', 0, 0, '2018-06-19 03:59:26', '2018-06-19 03:59:26'),
(57, 20, '', 'admin.role.destroy', '角色删除', '操作', 0, 0, '2018-06-19 03:59:49', '2018-06-19 03:59:49'),
(58, 20, '', 'admin.role.destory.all', '批量删除角色', '', 0, 0, '2018-06-19 04:01:58', '2018-06-19 04:01:58');

-- --------------------------------------------------------

--
-- 表的结构 `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(20, 10),
(21, 10),
(22, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 10),
(46, 10),
(47, 10),
(48, 10),
(49, 10),
(50, 10),
(51, 10),
(52, 10),
(53, 10),
(54, 10),
(55, 10),
(56, 10),
(57, 10),
(58, 10),
(20, 12),
(21, 12),
(22, 12),
(35, 12),
(36, 12),
(37, 12);

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(10, 'administrator', '系统管理员', '', '2018-06-19 09:59:52', '2018-06-19 09:59:52'),
(12, 'test', '测试狗', '', '2018-06-19 10:00:43', '2018-06-19 10:00:43');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `admin_user_role`
--
ALTER TABLE `admin_user_role`
  ADD PRIMARY KEY (`admin_user_id`,`role_id`),
  ADD KEY `admin_user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `admin_user_role`
--
ALTER TABLE `admin_user_role`
  ADD CONSTRAINT `admin_user_roles_admin_user_id_foreign` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
