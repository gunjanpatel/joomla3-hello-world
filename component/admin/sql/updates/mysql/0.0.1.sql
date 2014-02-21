-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2014 at 10:44 AM
-- Server version: 5.1.72
-- PHP Version: 5.3.2-1ubuntu4.22

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joomla032`
--

-- --------------------------------------------------------

--
-- Table structure for table `#__helloworld_category`
--

CREATE TABLE IF NOT EXISTS `#__helloworld_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `published` int(1) NOT NULL DEFAULT '0',
  `checked_out` int(1) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_left_right` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `#__helloworld_category`
--

INSERT INTO `#__helloworld_category` (`id`, `parent_id`, `lft`, `rgt`, `level`, `title`, `alias`, `access`, `path`, `published`, `checked_out`, `checked_out_time`, `created_user_id`, `image`) VALUES
(15, 6, 3, 4, 3, 'Galaxy Grand 2', '', 6, '', 1, 0, '0000-00-00 00:00:00', 0, '1392715929_grand2.jpg'),
(4, 1, 1, 34, 1, 'MobilE', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392715895_mobile.jpg'),
(1, 0, 0, 35, 0, 'root', 'root', 0, '', 1, 0, '0000-00-00 00:00:00', 0, ''),
(19, 6, 5, 6, 3, 'galaxy core', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392715945_core.jpg'),
(6, 4, 2, 11, 2, 'samsung phone', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392715911_samphone.jpg'),
(10, 4, 22, 31, 2, 'Cover', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642581_'),
(11, 10, 23, 26, 3, 'backcover', '', 7, '', 1, 0, '0000-00-00 00:00:00', 0, '1392784535_backcover1.jpeg'),
(17, 4, 12, 17, 2, 'NokiA', '', 3, '', 1, 0, '0000-00-00 00:00:00', 0, '1392716076_nokphone.jpeg'),
(18, 10, 27, 30, 3, 'Front Cover', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, ''),
(20, 11, 24, 25, 4, 'colorful', '', 8, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642406_'),
(24, 6, 7, 8, 3, 'galaxy note2', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392715961_note2.jpg'),
(32, 18, 28, 29, 4, 'official', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642430_'),
(31, 6, 9, 10, 3, 'galaxy s5', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392716061_s5.jpeg'),
(33, 17, 13, 14, 3, 'asha 305', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642457_'),
(34, 17, 15, 16, 3, 'symbian phones', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642484_'),
(35, 4, 18, 21, 2, 'AccessoRies', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392811138_'),
(36, 35, 19, 20, 3, 'Head PhoNe', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392642640_'),
(37, 4, 32, 33, 2, 'red', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '1392873963_a4.jpeg');
