CREATE TABLE IF NOT EXISTS `#__helloworld` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`greeting` VARCHAR(25) NOT NULL,
`published` tinyint(4) NOT NULL,
PRIMARY KEY (`id`)
)
ENGINE =MyISAM
AUTO_INCREMENT =0
DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `#__helloworld_category` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`parent_id` int(10) unsigned NOT NULL DEFAULT '0',
`lft` int(11) NOT NULL DEFAULT '0',
`rgt` int(11) NOT NULL DEFAULT '0',
`level` int(10) unsigned NOT NULL DEFAULT '0',
`title` varchar(255) NOT NULL,
`image` varchar(255) NOT NULL,
`alias` varchar(255) NOT NULL DEFAULT '',
`access` tinyint(3) unsigned NOT NULL DEFAULT '0',
`path` varchar(255) NOT NULL DEFAULT '',
`published` int(1) NOT NULL DEFAULT '0',
`checked_out` int(4) NOT NULL DEFAULT '0',
`checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_user_id` int(4) NOT NULL DEFAULT '875',
PRIMARY KEY (`id`),
KEY `idx_left_right` (`lft`,`rgt`)
)
ENGINE=MyISAM
DEFAULT CHARSET=utf8
COMMENT="Store helloworld category data";