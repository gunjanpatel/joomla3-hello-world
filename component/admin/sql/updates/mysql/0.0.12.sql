ALTER TABLE `#__helloworld` ADD `catid` int(11) NOT NULL DEFAULT '0';
ALTER TABLE `#__helloworld` ADD `params` VARCHAR(1024) NOT NULL DEFAULT '';
ALTER TABLE`#__helloworld` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' AFTER `id`;