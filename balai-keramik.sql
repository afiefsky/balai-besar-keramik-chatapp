-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 11:55 PM
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
(26, '113', '2019-05-19 15:02:33');

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
  `content` text,
  `is_image` tinyint(1) NOT NULL DEFAULT '0',
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `is_doc` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats_messages`
--

INSERT INTO `chats_messages` (`id`, `chat_id`, `user_id`, `content`, `is_image`, `is_read`, `is_doc`, `created_at`) VALUES
(62, 26, 1, 'Halo bit', 0, '0', NULL, '2019-05-19 15:02:38'),
(63, 26, 13, 'halo fif', 0, '0', NULL, '2019-05-19 15:03:16'),
(64, 26, 1, 'oit', 0, '0', NULL, '2019-05-19 15:03:58'),
(65, 26, 1, 'gimana', 0, '0', NULL, '2019-05-19 15:03:59'),
(66, 26, 1, 'test', 0, '0', NULL, '2019-05-19 15:07:44'),
(67, 26, 1, 'tests', 0, '0', NULL, '2019-05-19 15:08:42'),
(68, 26, 13, 'test', 0, '0', NULL, '2019-05-19 15:08:57'),
(69, 26, 13, 'masuk', 0, '0', NULL, '2019-05-19 15:08:59'),
(70, 26, 13, 'masuk', 0, '0', NULL, '2019-05-19 15:09:00'),
(71, 26, 13, 'asli?', 0, '0', NULL, '2019-05-19 15:11:39'),
(72, 26, 1, 'iya euy', 0, '0', NULL, '2019-05-19 15:11:44');

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
(16, 1, 13, 26, '2019-05-19 15:02:33');

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
(0, 'admin', 'nothing', '0', 'admin@mail.com', 'admin', 'admin', 'admin', 'logo1.png', 0, '1', '2019-05-19 15:02:02'),
(1, 'afiefsky', 'nothing', '1', 'afiefsky@gmail.com', 'Muhammad Afief', 'Farista', 'Full Stack Developer', 'Aeon.png', 1, '1', '2019-05-18 17:00:00'),
(13, 'tsabitkun', 'nothing', '1', 'tsabitkun@gmail.com', 'Tsabit Abdul', 'Aziz', 'Full Stack Developer', 'user_default.png', 0, '1', '2019-05-19 15:11:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chats_details`
--
ALTER TABLE `chats_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats_messages`
--
ALTER TABLE `chats_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
-- AUTO_INCREMENT for table `uri_segments`
--
ALTER TABLE `uri_segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
