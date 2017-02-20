-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2017 at 01:29 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id732289_nihonsei`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '氏名',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT 'ソート',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='category';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `sort`, `created`, `modified`) VALUES
(1, 'Tiến ăn hàng ngày', 1, '2017-02-06 19:50:46', NULL),
(2, 'Tiền Café, ăn vặt', 1, '2017-02-06 19:50:46', NULL),
(3, 'Mua quần áo', 1, '2017-02-06 19:50:46', NULL),
(4, 'Tiền tàu', 1, '2017-02-06 19:50:46', NULL),
(5, 'Tiền học', 1, '2017-02-06 19:50:46', NULL),
(6, 'Linh tinh', 1, '2017-02-06 19:50:46', NULL),
(7, 'Tiền nhà', 1, '2017-02-06 19:50:46', NULL),
(8, 'Tiền điện thoại', 1, '2017-02-06 19:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency_value` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='config';

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `user_id`, `currency_value`, `created`, `modified`) VALUES
(1, 1, 1, '2017-02-14 03:44:40', '2017-02-14 03:44:40'),
(2, 3, 1, '2017-02-14 03:44:40', '2017-02-14 03:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_process` varchar(10) DEFAULT NULL,
  `date_y_m` varchar(7) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL COMMENT '氏名',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT 'ソート',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='daily';

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `user_id`, `category_id`, `date_process`, `date_y_m`, `amount`, `description`, `sort`, `created`, `modified`) VALUES
(1, 3, 1, '2017-02-01', '2017-02', 4000, 'Mua đồ ăn tối', 0, '2017-02-14 04:58:18', '2017-02-15 08:45:57'),
(2, 3, 2, '2017-02-02', '2017-02', 150, 'Café sáng', 0, '2017-02-14 04:58:38', '2017-02-15 08:45:57'),
(3, 3, 2, '2017-02-03', '2017-02', 100, 'Café sáng', 0, '2017-02-14 04:59:18', '2017-02-15 08:45:57'),
(4, 3, 1, '2017-02-04', '2017-02', 3000, 'Mua đồ ăn tối', 0, '2017-02-14 15:31:35', '2017-02-15 08:45:57'),
(5, 3, 4, '2017-02-04', '2017-02', 430, '', 0, '2017-02-14 15:31:56', '2017-02-15 08:45:57'),
(6, 3, 5, '2017-02-04', '2017-02', 150, '', 0, '2017-02-14 15:32:11', '2017-02-15 08:45:57'),
(7, 3, 1, '2017-02-04', '2017-02', 300, 'Ăn sáng', 0, '2017-02-14 15:32:41', '2017-02-15 08:45:57'),
(8, 3, 6, '2017-02-05', '2017-02', 300, 'Ăn sáng', 0, '2017-02-14 16:58:42', '2017-02-15 08:45:57'),
(9, 3, 1, '2017-02-05', '2017-02', 446, 'Ăn trưa', 0, '2017-02-14 16:59:09', '2017-02-15 08:45:57'),
(10, 3, 6, '2017-02-06', '2017-02', 108, '', 0, '2017-02-14 16:59:28', '2017-02-15 08:45:57'),
(11, 3, 2, '2017-02-08', '2017-02', 150, '', 0, '2017-02-14 17:04:08', '2017-02-15 08:45:57'),
(12, 3, 5, '2017-02-08', '2017-02', 2000, 'mua sách', 0, '2017-02-14 17:04:52', '2017-02-15 08:45:57'),
(13, 3, 1, '2017-02-08', '2017-02', 216, '', 0, '2017-02-14 17:05:04', '2017-02-15 08:45:57'),
(14, 3, 2, '2017-02-09', '2017-02', 129, '', 0, '2017-02-14 17:05:41', '2017-02-15 08:45:57'),
(15, 3, 1, '2017-02-09', '2017-02', 2300, '', 0, '2017-02-14 17:05:53', '2017-02-15 08:45:57'),
(16, 3, 2, '2017-02-10', '2017-02', 150, '', 0, '2017-02-14 17:06:09', '2017-02-15 08:45:57'),
(17, 3, 1, '2017-02-11', '2017-02', 700, '', 0, '2017-02-14 17:06:24', '2017-02-15 08:45:57'),
(18, 3, 5, '2017-02-11', '2017-02', 600, '', 0, '2017-02-14 17:06:39', '2017-02-15 08:45:57'),
(19, 3, 1, '2017-02-12', '2017-02', 216, '', 0, '2017-02-14 17:07:03', '2017-02-15 08:45:57'),
(20, 3, 6, '2017-02-12', '2017-02', 300, '', 0, '2017-02-14 17:07:24', '2017-02-15 08:45:57'),
(21, 3, 1, '2017-02-13', '2017-02', 2500, '', 0, '2017-02-14 17:07:38', '2017-02-15 08:45:57'),
(22, 3, 2, '2017-02-14', '2017-02', 161, '', 0, '2017-02-14 17:07:47', '2017-02-15 08:45:57'),
(23, 3, 1, '2017-02-12', '2017-02', 300, '', 0, '2017-02-14 17:40:25', '2017-02-15 08:45:57'),
(24, 3, 2, '2017-02-15', '2017-02', 129, 'Cafe sáng', 0, '2017-02-15 10:50:54', '2017-02-15 08:45:57'),
(25, 3, 2, '2017-02-16', '2017-02', 100, 'Cafe', 0, '2017-02-16 20:52:48', '2017-02-16 20:52:48'),
(26, 3, 2, '2017-02-16', '2017-02', 706, '', 0, '2017-02-16 21:15:21', '2017-02-16 21:15:21'),
(27, 3, 2, '2017-02-17', '2017-02', 108, '', 0, '2017-02-17 10:03:37', '2017-02-17 10:03:37'),
(29, 3, 2, '2017-01-01', '2017-01', 540, '', 0, '2017-02-17 20:56:03', '2017-02-17 20:56:03'),
(30, 3, 2, '2017-01-01', '2017-01', 1800, '', 0, '2017-02-17 20:56:20', '2017-02-17 20:58:29'),
(31, 3, 6, '2017-01-02', '2017-01', 240, '', 0, '2017-02-17 20:59:00', '2017-02-17 20:59:00'),
(32, 3, 2, '2017-01-02', '2017-01', 2150, '', 0, '2017-02-17 20:59:19', '2017-02-17 20:59:19'),
(33, 3, 1, '2017-01-03', '2017-01', 2400, '', 0, '2017-02-17 20:59:46', '2017-02-17 20:59:46'),
(34, 3, 2, '2017-01-05', '2017-01', 432, '', 0, '2017-02-17 21:00:10', '2017-02-17 21:00:10'),
(35, 3, 1, '2017-01-15', '2017-01', 2980, '', 0, '2017-02-17 21:00:32', '2017-02-17 21:00:32'),
(36, 3, 1, '2017-01-16', '2017-01', 1300, '', 0, '2017-02-17 21:00:46', '2017-02-17 21:00:46'),
(37, 3, 1, '2017-01-30', '2017-01', 2329, '', 0, '2017-02-17 21:01:22', '2017-02-17 21:01:22'),
(38, 3, 1, '2017-01-30', '2017-01', 7200, '', 0, '2017-02-17 21:02:05', '2017-02-17 21:02:05'),
(39, 3, 6, '2017-01-30', '2017-01', 7062, '', 0, '2017-02-17 21:02:41', '2017-02-17 21:02:41'),
(40, 3, 4, '2017-01-30', '2017-01', 600, '', 0, '2017-02-17 21:03:05', '2017-02-17 21:03:05'),
(41, 3, 5, '2017-01-30', '2017-01', 1200, '', 0, '2017-02-17 21:03:23', '2017-02-17 21:03:23'),
(42, 3, 8, '2017-01-30', '2017-01', 6016, '', 0, '2017-02-17 21:03:46', '2017-02-17 21:03:46'),
(43, 3, 7, '2017-01-30', '2017-01', 40000, '', 0, '2017-02-17 21:04:17', '2017-02-17 21:04:17'),
(44, 3, 1, '2017-02-18', '2017-02', 220, '', 0, '2017-02-18 13:05:25', '2017-02-18 13:05:25'),
(45, 3, 3, '2017-02-18', '2017-02', 3326, '', 0, '2017-02-18 13:57:47', '2017-02-18 13:57:47'),
(46, 3, 4, '2017-02-18', '2017-02', 440, '', 0, '2017-02-19 03:06:29', '2017-02-19 03:06:29'),
(47, 3, 5, '2017-02-18', '2017-02', 100, '', 0, '2017-02-19 03:07:43', '2017-02-19 03:07:43'),
(48, 3, 1, '2017-02-19', '2017-02', 400, '', 0, '2017-02-19 17:36:05', '2017-02-19 17:36:05'),
(49, 3, 6, '2017-02-19', '2017-02', 300, 'Cầu lông', 0, '2017-02-19 21:54:07', '2017-02-19 21:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `date_y_m` varchar(7) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `default_value` int(11) NOT NULL DEFAULT '0',
  `real_value` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='salary';

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `date_y_m`, `user_id`, `default_value`, `real_value`, `created`, `modified`) VALUES
(1, '2017-02', 3, 195689, 100000, '2017-02-15 16:00:56', '2017-02-15 17:51:30'),
(2, '2017-02', 1, 0, 0, '2017-02-17 19:56:35', '2017-02-17 19:56:35'),
(3, '2017-01', 3, 196891, 100000, '2017-02-17 20:56:03', '2017-02-17 23:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL COMMENT 'ユーザーID',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `name` varchar(50) DEFAULT NULL COMMENT '氏名',
  `role` smallint(1) DEFAULT '1' COMMENT '権限（1:ADMIN,2:USER）',
  `login_date` datetime DEFAULT NULL COMMENT 'ログイン時点',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '作成時点',
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザー';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `login_date`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$26vt0rK.eRkLIh0lYgc1YeSRUCTcqoCdYoAnRGvkrBgn/8d6XS9sq', 'admin', 0, '2017-02-17 19:52:51', '2017-02-06 19:50:45', '2017-02-17 10:52:51'),
(2, 'user1', '$2y$10$Sgnd.Q7xKUQMnWziIXqP8.8AklMAcQG4jO2s9m/aAvRy7C07jwYw2', 'User 1', 1, NULL, '2017-02-14 04:42:27', '2017-02-14 04:42:27'),
(3, 'hieunld', '$2y$10$pNAWvala8gA1DIlQAoqW6ePO4tJjtO7.bEhkG2OjrMY7qW4viIvwe', 'Ngo Le', 0, '2017-02-19 21:53:34', '2017-02-14 04:42:54', '2017-02-19 12:53:34'),
(4, 'thuynttt', '$2y$10$ZSrHAS5APmSS2NoQ8OdxHO1GKNGb0Ee0a0H9S4XKrAxZcGFUnuYuy', 'Nguyễn Thị Thanh Thúy', 1, '2017-02-14 20:34:10', '2017-02-14 06:09:44', '2017-02-14 11:34:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
