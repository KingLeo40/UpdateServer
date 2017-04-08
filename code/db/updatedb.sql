-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?04 �?08 �?16:26
-- 服务器版本: 5.5.40
-- PHP 版本: 5.5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `updatedb`
--

-- --------------------------------------------------------

--
-- 表的结构 `device_info`
--

CREATE TABLE IF NOT EXISTS `device_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inner_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `memory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `screen_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `process_info` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42B0E46DD17F50A6` (`uuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `device_info`
--

INSERT INTO `device_info` (`id`, `uuid`, `product_name`, `channel`, `app_version`, `inner_version`, `local_version`, `os_version`, `model`, `device`, `memory`, `screen_size`, `net_state`, `country`, `language`, `process_info`) VALUES
(1, '1', 'test', 'test', '1.0.1', '1', '1', 'win', '888', 'rr', '1080', '1080*720', 'g', 'ch', 'zh', 'l'),
(8, 'ffffffff-8f75-6090-ffff-ffffcca8366f', 'test', 'test', '1.0.1', '1', '1', '4.4.2', 'ME371MG', 'ME371MG', '1030', '720,1280', 'WIFI', 'CN', 'zh', 'good');

-- --------------------------------------------------------

--
-- 表的结构 `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `global_config` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_config` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_466113F65E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `global_config`, `update_config`) VALUES
(1, 'test', 'test_config', 'test_update');

-- --------------------------------------------------------

--
-- 表的结构 `test_config`
--

CREATE TABLE IF NOT EXISTS `test_config` (
  `id` int(11) NOT NULL DEFAULT '3',
  `app_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `redirect` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `limit_info` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_tip` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `test_config`
--

INSERT INTO `test_config` (`id`, `app_version`, `channel`, `status`, `redirect`, `limit_info`, `show_tip`) VALUES
(0, '1.0.1', 'test', '1', '', '0', 0),
(1, '1.0.1', 'all', '1', '', '0', 0),
(3, '1.0.2', 'test', '1', '1.0.1', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `test_update`
--

CREATE TABLE IF NOT EXISTS `test_update` (
  `id` int(11) NOT NULL DEFAULT '3',
  `app_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `force_exec` tinyint(1) NOT NULL,
  `need_restart` tinyint(1) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resource_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resource_suffix` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resource_md5` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resource_size` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `test_update`
--

INSERT INTO `test_update` (`id`, `app_version`, `channel`, `type`, `status`, `force_exec`, `need_restart`, `message`, `res_version`, `resource_url`, `resource_suffix`, `resource_md5`, `resource_size`) VALUES
(0, '1.0.1', 'test', 'app', '1', 0, 1, 'hhhhhhhh', '1.0.1', 'http://www.baidu.com', 'apk', '454655465asdf', '556565M'),
(1, '1.0.1', 'test', 'res', '1', 0, 1, 'fesefsefesfesf', '2', 'http://www.baidu.com', 'zip', '566545615651656', '5455M'),
(2, '1.0.1', 'all', 'apk', '1', 0, 1, 'afsdafeweasfe', '1.0.1', 'http://www.baidu.com', 'apk', '469546465456', '45M'),
(3, '1.0.1', 'all', 'res', '1', 0, 1, 'fesafsefseaf', '2', 'http://www.baidu.com', 'zip', '165165156', '15M');

-- --------------------------------------------------------

--
-- 表的结构 `update_config`
--

CREATE TABLE IF NOT EXISTS `update_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `limit_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_tip` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `update_info`
--

CREATE TABLE IF NOT EXISTS `update_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `force_exec` tinyint(1) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `res_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resource_md5` longtext COLLATE utf8_unicode_ci NOT NULL,
  `resource_size` longtext COLLATE utf8_unicode_ci NOT NULL,
  `need_restart` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
