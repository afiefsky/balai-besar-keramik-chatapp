-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2019 at 04:52 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.16-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
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
(11, '15', '2017-08-13 04:33:24'),
(12, '14', '2017-08-13 04:42:42'),
(13, '54', '2017-08-14 01:21:04'),
(14, '91', '2017-08-14 01:24:51'),
(15, '111', '2017-08-22 14:23:17'),
(16, '115', '2017-08-22 14:29:52'),
(17, 'test', '2017-08-22 15:26:17'),
(20, 'spectra', '2017-08-22 15:55:38'),
(21, 'yuhu', '2017-08-22 17:15:21'),
(22, '121', '2019-03-08 02:41:10'),
(23, 'Abstergo', '2019-03-11 09:10:53');

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
(1, 12, 1, 'Laporan_v101.pdf', 0, '0', '1', '2017-08-30 04:20:30'),
(2, 12, 1, 'hayy', 0, '0', NULL, '2017-09-04 07:57:43'),
(3, 22, 1, 'Halo Nu', 0, '0', NULL, '2019-03-08 02:41:22'),
(4, 22, 12, 'Halo', 0, '0', NULL, '2019-03-08 02:41:29'),
(5, 22, 1, 'Piye Kabare', 0, '0', NULL, '2019-03-08 02:41:36'),
(6, 22, 12, 'test test', 0, '0', NULL, '2019-03-08 02:41:39'),
(7, 22, 1, 'Halo Mas Ibnu', 0, '0', NULL, '2019-03-08 09:57:25'),
(8, 22, 12, 'Halo Mas', 0, '0', NULL, '2019-03-08 09:57:32'),
(9, 12, 1, 'Aeon.png', 1, '0', '0', '2019-03-11 01:36:42'),
(10, 22, 12, 'Halo fif', 0, '0', NULL, '2019-03-11 02:30:09'),
(11, 22, 12, 'euy', 0, '0', NULL, '2019-03-11 02:30:10'),
(12, 22, 12, 'bujang', 0, '0', NULL, '2019-03-11 02:30:13'),
(13, 22, 12, 'Aeon1.png', 1, '0', '0', '2019-03-11 02:30:31'),
(14, 22, 1, 'hadir bujang', 0, '0', NULL, '2019-03-11 02:30:42'),
(15, 22, 12, 'Halo Fif', 0, '0', NULL, '2019-03-11 07:42:25'),
(16, 22, 1, 'Halo Bujank', 0, '0', NULL, '2019-03-11 07:42:43'),
(17, 22, 12, 'hi hi', 0, '0', NULL, '2019-03-11 07:44:22'),
(18, 22, 1, 'hey tayo', 0, '0', NULL, '2019-03-11 07:44:30'),
(19, 4, 1, 'hello bujank', 0, '0', NULL, '2019-03-11 09:21:48'),
(20, 4, 12, 'oitoit', 0, '0', NULL, '2019-03-11 09:22:53'),
(21, 4, 12, 'uyee', 0, '0', NULL, '2019-03-11 09:22:55'),
(22, 4, 1, 'apa vngst', 0, '0', NULL, '2019-03-11 09:23:04'),
(23, 4, 12, 'uyeee', 0, '0', NULL, '2019-03-11 09:23:10'),
(24, 22, 1, 'Aeon.png', 1, '0', '0', '2019-03-11 09:46:22'),
(25, 22, 1, 'logo2.png', 1, '0', '0', '2019-03-11 09:47:28'),
(26, 22, 1, 'logo21.png', 1, '0', '0', '2019-03-11 09:47:32'),
(27, 22, 1, 'Aeon1.png', 1, '0', '0', '2019-03-11 09:49:04'),
(28, 22, 1, 'logo.jpeg', 1, '0', '0', '2019-03-11 09:49:45');

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
(8, 1, 5, 11, '2017-08-13 04:33:24'),
(9, 1, 4, 12, '2017-08-13 04:42:42'),
(10, 5, 4, 13, '2017-08-14 01:21:04'),
(11, 9, 1, 14, '2017-08-14 01:24:51'),
(12, 11, 1, 15, '2017-08-22 14:23:17'),
(13, 11, 5, 16, '2017-08-22 14:29:52'),
(14, 12, 1, 22, '2019-03-08 02:41:10');

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
  `is_activated` enum('0','1') DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `first_name`, `last_name`, `division`, `avatar`, `is_logged_in`, `is_activated`, `last_login`) VALUES
(0, 'admin', 'admin', '0', 'admin@mail.com', 'admin', 'admin', 'admin', 'logo1.png', 0, '1', '2017-09-04 07:56:32'),
(1, 'afiefsky', 'nothing', '1', 'afiefsky@gmail.com', 'Muhammad Afief', 'Farista', '', 'YO2jGz3.jpg', 1, '1', '2019-03-10 17:00:00'),
(4, 'tsabitkun', 'nothing', '1', 'tsabitkun@gmail.com', 'Tsabit Abdul', 'Aziz', '', 'logo.png', 0, '1', '2017-09-04 07:58:02'),
(5, 'falon', 'nothing', '1', 'falonvoa@gmail.com', 'Falon', 'Trecks', '', '167003.jpg', 0, '1', '2017-08-23 00:52:56'),
(6, 'havok', 'nothing', '1', 'havok@gmail.com', 'Havok', 'Blaster', '', '1.png', 0, '1', '2017-09-04 07:44:34'),
(7, 'agus', 'nothing', '1', 'agus', 'Agus', 'Mulyadi', 'Staff Dosen', NULL, 0, NULL, '2017-08-13 04:47:02'),
(8, 'wan_gaazid', 'qwerty86', '1', 'wanspartangaazid@gmail.com', 'wawan', 'setiawan', 'humas', NULL, 0, NULL, '2017-08-13 04:47:02'),
(9, 'setiawan', 'qwerty12345', '1', 'setiawan@gmail.com', 'wawan', 'Setiawan', 'humas publikasi', 'IMG_20160109_120132_1_1.jpg', 0, NULL, '2017-08-14 01:32:31'),
(10, 'solomon', 'nothing', '1', 'solomon@gmail.com', 'Solomon', 'Vendy', 'Pegawai', 'default.jpeg', 1, '1', '2017-08-22 17:00:00'),
(11, 'garfield', 'nothing', '1', 'garfield@gmail.com', 'Garfield', 'Bennington', 'Pudir 100', 'default.jpeg', 1, '1', '2017-08-21 17:00:00'),
(12, 'iwisesa', 'nothing', '1', 'iwisesa@gmail.com', 'Ibnu', 'Wisesa', '-', 'default.jpeg', 1, '1', '2019-03-10 17:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chats_details`
--
ALTER TABLE `chats_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats_messages`
--
ALTER TABLE `chats_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups_chats`
--
ALTER TABLE `groups_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups_members`
--
ALTER TABLE `groups_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uri_segments`
--
ALTER TABLE `uri_segments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
