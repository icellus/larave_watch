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
