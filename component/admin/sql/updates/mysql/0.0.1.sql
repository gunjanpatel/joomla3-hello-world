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
-- Database: `joomla33`
--

-- --------------------------------------------------------

--
-- Table structure for table `afto8_helloworld_category`
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
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_left_right` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `afto8_helloworld_category`
--

INSERT INTO `#__helloworld_category` (`id`, `parent_id`, `lft`, `rgt`, `level`, `title`, `alias`, `access`, `path`, `published`, `checked_out`, `checked_out_time`, `created_user_id`, `created_time`, `image`) VALUES
(1, 0, 0, 15, 0, 'root', 'root', 0, '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(19, 18, 3, 4, 3, 'AshA', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '1392813268_'),
(20, 17, 6, 9, 2, 'cover', '', 7, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '1392814701_'),
(18, 17, 2, 5, 2, 'NokIa', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(17, 1, 1, 14, 1, 'MobilE', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '1392815092_'),
(21, 20, 7, 8, 3, 'FronT COveR', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(22, 17, 10, 11, 2, 'blackberry', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '1392885366_'),
(26, 17, 12, 13, 2, 'micromax', '', 1, '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '1392813231_');
