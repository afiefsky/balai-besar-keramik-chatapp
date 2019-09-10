-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 04:05 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balai-keramik`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `topic` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `topic`, `created_at`) VALUES
(27, '1-13', '2019-08-24 23:10:06'),
(28, '18-1', '2019-08-25 14:21:14'),
(29, '18-13', '2019-08-25 14:22:16'),
(30, '0-1', '2019-09-08 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `chats_details`
--

CREATE TABLE `chats_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chats_messages`
--

CREATE TABLE `chats_messages` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chat_from` int(11) DEFAULT NULL,
  `chat_to` int(11) DEFAULT NULL,
  `content` text,
  `is_image` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `is_doc` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats_messages`
--

INSERT INTO `chats_messages` (`id`, `chat_id`, `user_id`, `chat_from`, `chat_to`, `content`, `is_image`, `is_read`, `is_doc`, `created_at`) VALUES
(105, 28, 1, 1, 18, 'halo raph', 0, '0', NULL, '2019-09-01 03:39:52'),
(106, 27, 13, 13, 1, 'Halo fif', 0, '0', NULL, '2019-09-01 03:49:57'),
(107, 29, 13, 13, 18, 'Halo raph', 0, '0', NULL, '2019-09-01 03:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups_chats`
--

CREATE TABLE `groups_chats` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `total_member` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups_members`
--

CREATE TABLE `groups_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` text,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `name`, `icon`, `created_date`, `updated_date`) VALUES
(1, 'Research and Development', NULL, '2019-09-08 00:00:00', NULL),
(2, 'Pengujian', NULL, '2019-09-08 00:00:00', NULL),
(3, 'Kalibrasi', NULL, '2019-09-08 00:00:00', NULL),
(4, 'Sertifikasi', NULL, '2019-09-08 00:00:00', NULL),
(5, 'Pelatihan', NULL, '2019-09-08 00:00:00', NULL),
(6, 'Konsultasi', NULL, '2019-09-08 00:00:00', NULL),
(7, 'Standarisasi', NULL, '2019-09-08 00:00:00', NULL),
(8, 'Rekayasa', NULL, '2019-09-08 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uri_segments`
--

CREATE TABLE `uri_segments` (
  `id` int(11) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uri_segments`
--

INSERT INTO `uri_segments` (`id`, `first`, `second`, `chat_id`, `created_at`) VALUES
(17, 1, 13, 27, '2019-08-24 23:10:06'),
(18, 18, 1, 28, '2019-08-25 14:21:14'),
(19, 18, 13, 29, '2019-08-25 14:22:16'),
(20, 0, 1, 30, '2019-09-08 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `first_name`, `last_name`, `division`, `avatar`, `is_logged_in`, `is_activated`, `last_login`) VALUES
(0, 'admin', '3e47b75000b0924b6c9ba5759a7cf15d', '0', 'admin@mail.com', 'admin', 'admin', 'admin', 'administrator.jpg', 0, '1', '2019-09-08 13:04:44'),
(1, 'afiefsky', '3e47b75000b0924b6c9ba5759a7cf15d', '1', 'afiefsky@gmail.com', 'Muhammad Afief', 'Farista', 'Full Stack Developer', 'afiefsky.png', 1, '1', '2019-09-07 17:00:00'),
(13, 'tsabitkun', '3e47b75000b0924b6c9ba5759a7cf15d', '1', 'tsabitkun@gmail.com', 'Tsabit Abdul', 'Aziz', 'Full Stack Developer', 'user_default.png', 0, '1', '2019-09-01 03:52:28'),
(18, '', '3e47b75000b0924b6c9ba5759a7cf15d', '1', 'raphtalia@mail.com', 'Raphtalia', 'Helen', '', 'default.jpeg', 1, '1', '2019-09-01 03:52:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats_details`
--
ALTER TABLE `chats_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats_messages`
--
ALTER TABLE `chats_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_chats`
--
ALTER TABLE `groups_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_members`
--
ALTER TABLE `groups_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uri_segments`
--
ALTER TABLE `uri_segments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chats_details`
--
ALTER TABLE `chats_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats_messages`
--
ALTER TABLE `chats_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups_chats`
--
ALTER TABLE `groups_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups_members`
--
ALTER TABLE `groups_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uri_segments`
--
ALTER TABLE `uri_segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
