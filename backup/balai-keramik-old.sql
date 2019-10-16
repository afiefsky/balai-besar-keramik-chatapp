-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `chats` (`id`, `topic`, `created_at`) VALUES
(33,	'1-1-1',	'2019-09-23 03:25:21'),
(34,	'1-0-1',	'2019-09-23 03:25:40');

DROP TABLE IF EXISTS `chats_details`;
CREATE TABLE `chats_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `chats_messages`;
CREATE TABLE `chats_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `chat_from` int(11) DEFAULT NULL,
  `chat_to` int(11) DEFAULT NULL,
  `content` text,
  `is_image` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `is_doc` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `layanan_id` (`layanan_id`),
  CONSTRAINT `chats_messages_ibfk_1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `chats_messages` (`id`, `chat_id`, `user_id`, `layanan_id`, `chat_from`, `chat_to`, `content`, `is_image`, `is_read`, `is_doc`, `created_at`) VALUES
(113,	33,	1,	1,	1,	1,	'Halo',	0,	'0',	NULL,	'2019-09-23 03:25:24'),
(114,	34,	0,	1,	0,	1,	'test',	0,	'0',	NULL,	'2019-09-23 03:26:08'),
(115,	34,	0,	1,	0,	1,	'halo',	0,	'0',	NULL,	'2019-09-23 03:26:13'),
(116,	34,	1,	1,	1,	0,	'masuk',	0,	'0',	NULL,	'2019-09-23 03:26:16');

DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `groups_chats`;
CREATE TABLE `groups_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `total_member` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `groups_members`;
CREATE TABLE `groups_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` text,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `layanan` (`id`, `name`, `icon`, `created_date`, `updated_date`) VALUES
(1,	'Research and Development',	NULL,	'2019-09-08 00:00:00',	NULL),
(2,	'Pengujian',	NULL,	'2019-09-08 00:00:00',	NULL),
(3,	'Kalibrasi',	NULL,	'2019-09-08 00:00:00',	NULL),
(4,	'Sertifikasi',	NULL,	'2019-09-08 00:00:00',	NULL),
(5,	'Pelatihan',	NULL,	'2019-09-08 00:00:00',	NULL),
(6,	'Konsultasi',	NULL,	'2019-09-08 00:00:00',	NULL),
(7,	'Standarisasi',	NULL,	'2019-09-08 00:00:00',	NULL),
(8,	'Rekayasa',	NULL,	'2019-09-08 00:00:00',	NULL);

DROP TABLE IF EXISTS `uri_segments`;
CREATE TABLE `uri_segments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `uri_segments` (`id`, `first`, `second`, `third`, `chat_id`, `created_at`) VALUES
(23,	1,	1,	1,	33,	'2019-09-23 03:25:21'),
(24,	1,	0,	1,	34,	'2019-09-23 03:25:40');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 = admin; 1 = common user',
  `email` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `division` varchar(100) NOT NULL,
  `avatar` text,
  `is_logged_in` tinyint(1) NOT NULL,
  `is_activated` enum('0','1') DEFAULT '1',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `first_name`, `last_name`, `division`, `avatar`, `is_logged_in`, `is_activated`, `last_login`) VALUES
(0,	'admin',	'3e47b75000b0924b6c9ba5759a7cf15d',	'0',	'admin@mail.com',	'admin',	'admin',	'admin',	'administrator.jpg',	1,	'1',	'2019-09-22 17:00:00'),
(1,	'afiefsky',	'3e47b75000b0924b6c9ba5759a7cf15d',	'1',	'afiefsky@gmail.com',	'Muhammad Afief',	'Farista',	'Full Stack Developer',	'afiefsky.png',	0,	'1',	'2019-09-23 03:25:48'),
(13,	'tsabitkun',	'3e47b75000b0924b6c9ba5759a7cf15d',	'1',	'tsabitkun@gmail.com',	'Tsabit Abdul',	'Aziz',	'Full Stack Developer',	'user_default.png',	0,	'1',	'2019-09-01 03:52:28'),
(18,	'',	'3e47b75000b0924b6c9ba5759a7cf15d',	'1',	'raphtalia@mail.com',	'Raphtalia',	'Helen',	'',	'default.jpeg',	1,	'1',	'2019-09-01 03:52:33');

-- 2019-09-23 03:26:45