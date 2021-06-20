
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `accounts` (
  `accid` int(11) NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(160) DEFAULT NULL UNIQUE,
  `mobile` varchar(25) DEFAULT NULL,
  `password` varchar(160) DEFAULT NULL,
  `title` varchar(25) NOT NULL,
  `firstname` varchar(160) DEFAULT NULL,
  `lastname` varchar(160) DEFAULT NULL,
  `profile_photo` varchar(200) NOT NULL DEFAULT './_store/accounts/profiles/avatar.png',
  `lastlogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accid`)
);


CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accid` int DEFAULT NULL,
  `osystem` varchar(100) DEFAULT 'UNKNOWN',
  `browser` varchar(100) NOT NULL DEFAULT 'UNKNOWN',
  `device` varchar(100) NOT NULL DEFAULT 'UNKNOWN',
  `ipaddr` varchar(17) DEFAULT NULL,
  `details` text NOT NULL,
  `report` varchar(200) DEFAULT NULL,
  `risklevel` enum('low','medium','high') NOT NULL DEFAULT 'low',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
  
CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int DEFAULT NULL,
  `webpart` int DEFAULT NULL,
  `cmskey` varchar(100) DEFAULT NULL UNIQUE,
  `cms` text,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` varchar(100) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `pages` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) DEFAULT NULL,
  `pagestyle` enum('page','blog') NOT NULL DEFAULT 'page',
  `shortname` varchar(200) DEFAULT NULL,
  `menutitle` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `parent` varchar(30) NOT NULL DEFAULT 'home',
  `showtop` varchar(4) NOT NULL DEFAULT 'NO',
  `showheader` tinyint(1) NOT NULL DEFAULT '1',
  `showfooter` tinyint(1) DEFAULT '1',
  `categories` varchar(225) DEFAULT '["cat2"]',
  `enabled` varchar(4) NOT NULL DEFAULT 'YES',
  `metakey` varchar(300) DEFAULT NULL,
  `metades` varchar(300) DEFAULT NULL,
  `excerpt` text,
  `content` mediumtext,
  `photo` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pageid`)
);

INSERT INTO `pages` (`pageid`, `sort`, `pagestyle`, `shortname`, `menutitle`, `title`, `parent`) VALUES
(1000, '0', 'page', 'home', 'Home', 'Welcome to Default Website','0');



CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(360) DEFAULT NULL,
  `name` varchar(100) NOT NULL UNIQUE,
  `value` varchar(260) DEFAULT NULL,
  `type` enum('input','textarea','radio','checkbox','file') NOT NULL DEFAULT 'input',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);


INSERT INTO `settings` (`id`, `caption`, `name`, `value`, `type`, `disabled`) VALUES
(1, 'Application Context Name', 'appname', 'nohenugudd', 'input', 0),
(2, 'Site Domain URL', 'domain', 'http://anthill.com', 'input', 0),
(3, 'Website Title', 'title', 'Anthill Pro.', 'input', 0),
(4, 'Default Landing Page', 'defaultlandingpage', '1000', 'input', 0),
(5, 'Google Page', 'link_google', '#', 'input', 0),
(6, 'LinkedIn Page', 'link_linkedin', '#', 'input', 0),
(7, 'Twitter Page', 'link_twitter', '#', 'input', 0),
(8, 'Facebook Page', 'link_facebook', '#', 'input', 0),
(9, 'YouTube Channel', 'link_youtube', '#', 'input', 0),
(10, 'Instagram Page', 'link_instagram', '#', 'input', 0),
(11, 'Copy Right Text', 'copyright_text', '© 2019 <span>Anthill Pro</span>. All Rights Reserved', 'input', 0);


CREATE TABLE IF NOT EXISTS `webparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) DEFAULT NULL,
  `webpart` varchar(300) DEFAULT NULL,
  `params` varchar(1000) NOT NULL DEFAULT '[]',
  `sort` int(11) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

