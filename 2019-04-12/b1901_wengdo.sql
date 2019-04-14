-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 04 月 14 日 18:52
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `b1901_wengdo`
--

-- --------------------------------------------------------

--
-- 表的结构 `wd_banner`
--

CREATE TABLE IF NOT EXISTS `wd_banner` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_img` varchar(100) NOT NULL,
  `b_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wd_banner`
--

INSERT INTO `wd_banner` (`b_id`, `b_img`, `b_isshow`) VALUES
(1, './images/banner_01.jpg', 1),
(2, './images/banner_02.jpg', 1),
(3, './images/banner_03.jpg', 1),
(4, './images/banner_02.jpg', 1),
(5, './images/banner_01.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_nav`
--

CREATE TABLE IF NOT EXISTS `wd_nav` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_name` varchar(10) NOT NULL,
  `n_link` varchar(100) NOT NULL,
  `n_isshow` tinyint(4) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wd_nav`
--

INSERT INTO `wd_nav` (`n_id`, `n_name`, `n_link`, `n_isshow`) VALUES
(1, '网站首页', './view/index.html', 1),
(2, '案例展示', './view/case.html', 1),
(3, '资讯动态', './view/new_list.html', 1),
(4, '关于我们', './view/about.html', 1),
(5, '联系我们', './view/contact.html', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_partner`
--

CREATE TABLE IF NOT EXISTS `wd_partner` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(10) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_link` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='合作伙伴' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `wd_partner`
--

INSERT INTO `wd_partner` (`p_id`, `p_title`, `p_img`, `p_link`) VALUES
(1, '中国移动通信', 'images/partner_01.jpg', 'http://www.10086.cn'),
(2, '腾讯', 'images/partner_02.jpg', 'http://www.qq.com'),
(3, '百度', 'images/partner_03.jpg', 'http://www.baidu.com'),
(4, '中国特产网', 'images/partner_04.jpg', 'http://www.cntc.com'),
(5, '哈尔滨地铁', 'images/partner_05.jpg', 'http://www.cntc.com'),
(6, '万达广场', 'images/partner_07.jpg', 'http://www.cntc.com'),
(7, '海尔', 'images/partner_08.jpg', 'http://www.cntc.com'),
(8, '中国国旅', 'images/partner_09.jpg', 'http://www.cntc.com'),
(9, '亲亲网', 'images/partner_10.jpg', 'http://www.cntc.com'),
(10, '居然之家', 'images/partner_11.jpg', 'http://www.cntc.com'),
(11, '凤凰网', 'images/partner_06.jpg', 'http://www.baidu.com'),
(12, '中国联通', 'images/partner_12.jpg', 'http://www.10010.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
