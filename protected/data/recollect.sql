-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 12 日 11:12
-- 服务器版本: 5.5.32
-- PHP 版本: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `recollect`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT '2表示被管理员禁用',
  `ctime` int(10) DEFAULT NULL,
  `mtime` int(10) DEFAULT NULL,
  `ltime` int(10) DEFAULT NULL COMMENT '登陆时间',
  `is_deleted` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role_id`, `status`, `ctime`, `mtime`, `ltime`, `is_deleted`) VALUES
(1, 'admin', 'zc@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 1386815413, 1386817922, 1386817922, 0);

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '附件ID',
  `file_name` varchar(255) DEFAULT NULL COMMENT '原文件名称',
  `file_type` varchar(50) DEFAULT NULL COMMENT '文件类型',
  `file_size` bigint(20) DEFAULT NULL COMMENT '文件大小',
  `file_extension` varchar(20) DEFAULT NULL COMMENT '文件扩展名',
  `ctime` int(10) DEFAULT NULL COMMENT '创建时间',
  `hash_code` varchar(32) DEFAULT NULL COMMENT 'MD5值',
  `is_deleted` tinyint(1) DEFAULT '0' COMMENT '是否删除，0：正常 1：删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文件资源表' AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- 表的结构 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `sort_id` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `ctime` int(10) NOT NULL,
  `mtime` int(10) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片表';

-- --------------------------------------------------------

--
-- 表的结构 `photo_sort`
--

CREATE TABLE IF NOT EXISTS `photo_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_name` varchar(32) NOT NULL COMMENT '相册名称',
  `sort_desc` varchar(255) DEFAULT NULL,
  `ctime` int(10) NOT NULL,
  `mtime` int(10) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `system_role`
--

CREATE TABLE IF NOT EXISTS `system_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) DEFAULT NULL COMMENT '角色名称',
  `role_desc` varchar(255) DEFAULT NULL COMMENT '角色说明',
  `rule_ids` text COMMENT '角色权限',
  `ctime` int(10) NOT NULL,
  `mtime` int(10) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `system_role`
--

INSERT INTO `system_role` (`id`, `role_name`, `role_desc`, `rule_ids`, `ctime`, `mtime`, `is_deleted`) VALUES
(1, 'admin', '管理员', '["1","2"]', 1386815289, 1386815856, 0);

-- --------------------------------------------------------

--
-- 表的结构 `system_rule`
--

CREATE TABLE IF NOT EXISTS `system_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(32) DEFAULT NULL COMMENT '权限名称',
  `rule_desc` text COMMENT '权限描述',
  `controller_id` char(32) NOT NULL COMMENT 'Controller',
  `action_id` char(32) NOT NULL COMMENT 'action',
  `ctime` int(10) DEFAULT NULL,
  `mtime` int(10) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `system_rule`
--

INSERT INTO `system_rule` (`id`, `rule_name`, `rule_desc`, `controller_id`, `action_id`, `ctime`, `mtime`, `is_deleted`) VALUES
(1, '权限列表', '权限列表', 'rule', 'index', 1386815245, 1386815245, 0),
(2, '权限修改', '权限修改', 'rule', 'edit', 1386815276, 1386815863, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
