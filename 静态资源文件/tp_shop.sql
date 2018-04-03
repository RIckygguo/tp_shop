-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-31 12:40:43
-- 服务器版本： 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `o2o_area`
--

CREATE TABLE `o2o_area` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_area`
--

INSERT INTO `o2o_area` (`id`, `name`, `city_id`, `parent_id`, `list_order`, `status`, `create_time`, `update_time`) VALUES
(7, '广东省', 0, 0, 0, 1, 0, 1522424780),
(8, '广州市', 0, 7, 0, 1, 0, 0),
(9, '北京省', 0, 0, 0, 1, 0, 1522424782),
(11, '湖北省', 0, 0, 123, 1, 0, 1522424921),
(12, '深圳市', 0, 7, 0, 1, 0, 0),
(13, '重庆市', 0, 0, 21, 1, 1522336578, 1522424809),
(14, '南京市', 0, 0, 0, 1, 1522485600, 1522485600),
(15, '河北省', 0, 0, 0, 1, 1522485609, 1522485609),
(16, '云南省', 0, 0, 0, 1, 1522485617, 1522485617),
(17, '贵州省', 0, 0, 0, 1, 1522485625, 1522485625);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_category`
--

CREATE TABLE `o2o_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(11) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='菜单分类';

--
-- 转存表中的数据 `o2o_category`
--

INSERT INTO `o2o_category` (`id`, `name`, `parent_id`, `list_order`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
(76, '美食', 0, 0, 1, 1521883736, 1521886069, 0),
(77, '娱乐', 0, 0, 1, 1521883745, 1521883745, 0),
(78, '酒店', 0, 0, 1, 1521883754, 1521886066, 0),
(79, 'KTV', 77, 0, 1, 1521883765, 1521884660, 0),
(80, '服饰', 0, 0, 1, 1521885937, 1521885947, 0),
(81, '美妆', 0, 0, 1, 1521886030, 1521886030, 0),
(82, '日用品', 0, 0, 1, 1521886084, 1521886084, 0),
(83, '游戏', 0, 2, 1, 1521886105, 1521901506, 0),
(84, '旅游', 0, 123, -1, 1521886147, 1522420590, 0);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_city`
--

CREATE TABLE `o2o_city` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `uname` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_city`
--

INSERT INTO `o2o_city` (`id`, `name`, `uname`, `parent_id`, `list_order`, `status`, `create_time`, `update_time`) VALUES
(1, '北京市', '', 0, 1, 1, 1522489765, 1522490339),
(5, '广东省', '', 0, 0, 1, 1522490303, 1522490303),
(6, '上海市', '', 0, 0, 1, 1522490315, 1522490323),
(7, '湖北省', '', 0, 0, 1, 1522490331, 1522490331);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_deal`
--

CREATE TABLE `o2o_deal` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `shop_id` int(11) UNSIGNED NOT NULL,
  `shop_location_id` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `origin_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `current_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(255) NOT NULL DEFAULT '',
  `buy_count` int(11) NOT NULL DEFAULT '0',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `coupons_start_time` int(11) NOT NULL DEFAULT '0',
  `coupons_end_time` int(11) NOT NULL DEFAULT '0',
  `xpoint` varchar(20) NOT NULL DEFAULT '',
  `ypoint` varchar(20) NOT NULL DEFAULT '',
  `shopper_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `balance_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `notes` text NOT NULL,
  `cate_id` int(11) UNSIGNED NOT NULL,
  `se_cate_id` int(11) UNSIGNED NOT NULL,
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_introduce`
--

CREATE TABLE `o2o_introduce` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `image` char(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_shop`
--

CREATE TABLE `o2o_shop` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `licence` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(255) NOT NULL DEFAULT '',
  `bank_info` varchar(50) NOT NULL DEFAULT '',
  `bank_name` varchar(50) NOT NULL DEFAULT '',
  `bank_user` varchar(50) NOT NULL DEFAULT '',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00',
  `responser` varchar(50) NOT NULL DEFAULT '',
  `responser_tel` varchar(20) NOT NULL DEFAULT '',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_shopper`
--

CREATE TABLE `o2o_shopper` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `shop_id` int(11) UNSIGNED NOT NULL,
  `last_login_ip` varchar(20) NOT NULL DEFAULT '',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_shop_location`
--

CREATE TABLE `o2o_shop_location` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `contact` varchar(20) NOT NULL DEFAULT '',
  `xpoint` varchar(20) NOT NULL DEFAULT '',
  `ypoint` varchar(20) NOT NULL DEFAULT '',
  `shop_id` int(11) UNSIGNED NOT NULL,
  `open_time` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(255) NOT NULL DEFAULT '',
  `cate_id` int(11) UNSIGNED NOT NULL,
  `cate_path` varchar(50) NOT NULL DEFAULT '',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_user`
--

CREATE TABLE `o2o_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(30) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `list_order` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `o2o_area`
--
ALTER TABLE `o2o_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `o2o_category`
--
ALTER TABLE `o2o_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `o2o_city`
--
ALTER TABLE `o2o_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `o2o_deal`
--
ALTER TABLE `o2o_deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `se_cate_id` (`se_cate_id`),
  ADD KEY `start_time` (`start_time`),
  ADD KEY `end_time` (`end_time`);

--
-- Indexes for table `o2o_introduce`
--
ALTER TABLE `o2o_introduce`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `o2o_shop`
--
ALTER TABLE `o2o_shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `o2o_shopper`
--
ALTER TABLE `o2o_shopper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `o2o_shop_location`
--
ALTER TABLE `o2o_shop_location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `name_2` (`name`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `o2o_user`
--
ALTER TABLE `o2o_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `o2o_area`
--
ALTER TABLE `o2o_area`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `o2o_category`
--
ALTER TABLE `o2o_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- 使用表AUTO_INCREMENT `o2o_city`
--
ALTER TABLE `o2o_city`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `o2o_deal`
--
ALTER TABLE `o2o_deal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_introduce`
--
ALTER TABLE `o2o_introduce`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_shop`
--
ALTER TABLE `o2o_shop`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_shopper`
--
ALTER TABLE `o2o_shopper`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_shop_location`
--
ALTER TABLE `o2o_shop_location`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `o2o_user`
--
ALTER TABLE `o2o_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
