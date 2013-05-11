-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2013 at 12:13 AM
-- Server version: 5.6.10
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ishuqian`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `list_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  `is_private` tinyint(3) unsigned NOT NULL,
  `comment` text NOT NULL,
  `views` int(11) unsigned NOT NULL,
  `answers` int(11) unsigned NOT NULL,
  `score` int(11) unsigned NOT NULL,
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `list_id`, `title`, `url`, `is_private`, `comment`, `views`, `answers`, `score`, `addtime`) VALUES
(1, 1, 3, 'Session 类 - CodeIgniter 中文手册|用户手册|用户指南|Wiki文档', 'http://codeigniter.org.cn/user_guide/libraries/sessions.html', 0, '0', 0, 0, 0, 1366118274),
(2, 3, 6, '在Mac OS X中配置Apache ＋ PHP ＋ MySQL @ 随网之舞', 'http://dancewithnet.com/2010/05/09/run-apache-php-mysql-in-mac-os-x/', 0, '0', 0, 0, 0, 1366120635),
(3, 3, 6, '熵的社会学意义 - 阮一峰的网络日志', 'http://www.ruanyifeng.com/blog/2013/04/entropy.html', 1, '0', 0, 0, 0, 1366120862),
(4, 4, 0, 'HTML &lt;a&gt; 标签的 coords 属性', 'http://www.w3school.com.cn/tags/att_a_coords.asp', 0, '0', 0, 0, 0, 1366121658),
(5, 5, 0, '新浪微博开放平台', 'http://open.weibo.com/', 0, '0', 0, 0, 0, 1366361476);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(90) NOT NULL DEFAULT '',
  `bookmarks` int(11) unsigned NOT NULL COMMENT '此类型书签数量',
  `color` varchar(10) NOT NULL DEFAULT '' COMMENT '个性化分类的颜色',
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `name`, `bookmarks`, `color`, `addtime`) VALUES
(0, 0, '无分类', 0, '', 0),
(1, 1, 'news', 0, '', 1366083639),
(2, 1, 'tools', 0, '', 1366083702),
(3, 1, 'study', 0, '', 1366083834),
(4, 1, 'blogs', 0, '', 1366085176),
(5, 1, '吃货', 0, '', 1366085488),
(6, 3, 'study', 0, '', 1366120520),
(7, 3, 'tools', 0, '', 1366120556),
(8, 4, 'test', 0, '', 1366121349),
(10, 5, 'test', 0, '', 1366361492),
(11, 7, '技术', 0, '', 1366438280);

-- --------------------------------------------------------

--
-- Table structure for table `sns`
--

CREATE TABLE IF NOT EXISTS `sns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identity` varchar(255) NOT NULL COMMENT '唯一标示',
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL COMMENT '社交账号类型',
  `access_token` varchar(255) DEFAULT NULL,
  `expire` int(11) unsigned NOT NULL,
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sns`
--

INSERT INTO `sns` (`id`, `identity`, `user_id`, `type`, `access_token`, `expire`, `addtime`) VALUES
(5, '2146096683', 15, 'weibo', '2.00dmnO2CCJ4N6Dd42c8bf5884Phz5E', 157679999, 1366440465);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `bookmarks` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加书签数量',
  `following` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '正在关注者',
  `followers` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关注者',
  `addtime` int(11) unsigned NOT NULL,
  `cookie_auth` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `avatar`, `bookmarks`, `following`, `followers`, `addtime`, `cookie_auth`) VALUES
(1, 'julytwilight@msn.com', '', '7805c4ad9014575f414a41bb147747f0', '', 0, 0, 0, 1365931230, '30dec407cdf486313d22bb201436279f'),
(2, 'tingeen@yeah.net', '', '9eb99424cee65ecc78b66e92f7551836', '', 0, 0, 0, 1366020904, ''),
(3, 'seven@cactus-studio.com', '', '7805c4ad9014575f414a41bb147747f0', '', 0, 0, 0, 1366120215, 'bcc5db01b4db18ed68cf48239c45d326'),
(4, 'test@test.com', '', '7805c4ad9014575f414a41bb147747f0', '', 0, 0, 0, 1366121326, ''),
(5, 'julytwilight@yahoo.com', '', '9eb99424cee65ecc78b66e92f7551836', '', 0, 0, 0, 1366361421, ''),
(15, '', '2子仇杀队', '', 'http://tp4.sinaimg.cn/2146096683/50/5656682641/1', 0, 0, 0, 1366440465, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
