-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 03:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

CREATE DATABASE IF NOT EXISTS `company_clone` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `company_clone`;
-- --------------------------------------------------------

--
-- Table structure for table `absence_form`
--

CREATE TABLE `absence_form` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `number_dayoff` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approval_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_form`
--

INSERT INTO `absence_form` (`id`, `username`, `create_date`, `number_dayoff`, `reason`, `file`, `status`, `approval_date`) VALUES
(1, 'nguyenbibi', '2021-12-08', 3, 'Sick', 'upload/images.png', 'Waiting', '2021-12-31 15:35:30'),
(2, 'hiengay', '2021-12-01', 5, 'Go to hometown', 'upload/movie-poster-1.jpg', 'Refused', '2021-12-31 15:35:30'),
(3, 'nguyentronghien', '2021-12-06', 10, 'pregnant', 'upload/movie-thumb-1.jpg', 'Approved', '2021-12-31 15:35:30'),
(4, 'bonguyen', '2021-12-06', 10, 'busy', 'upload/movie-thumb-1.jpg', 'Refused', '2021-12-31 15:36:01'),
(5, 'mimiming', '2021-12-01', 7, 'Busy', 'upload/movie-poster-1.jpg', 'Approved', '2021-12-31 15:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `absence_info`
--

CREATE TABLE `absence_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_dayoff` int(11) NOT NULL DEFAULT 12,
  `dayoff_used` int(11) NOT NULL DEFAULT 0,
  `dayoff_left` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_info`
--

INSERT INTO `absence_info` (`id`, `username`, `total_dayoff`, `dayoff_used`, `dayoff_left`) VALUES
(1, 'nguyentronghien', 12, 5, 10),
(2, 'hiengay', 15, 5, 7),
(3, 'nguyenbibi', 15, 6, 9),
(4, '0', 12, 0, 0),
(5, 'baonguyen', 12, 0, 0),
(6, 'giabao', 12, 0, 0),
(7, 'bonguyen', 12, 4, 8),
(8, 'tramnguyen', 12, 0, 0),
(9, 'phuongduyen', 12, 0, 0),
(10, 'bunbibun', 12, 0, 0),
(11, 'longnguyen', 12, 0, 0),
(12, 'kynguyen', 12, 0, 0),
(13, 'mimiming', 15, 0, 0),
(14, 'hainguyen', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_room` int(11) NOT NULL,
  `manager_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `number_room`, `manager_user`, `detail`) VALUES
(3, 'Accountant', 1001, 'hiengay', 'this is a accountant department'),
(4, 'IT', 1002, 'binhbinh', 'this is a it department'),
(5, 'Business', 1023, 'mimiming', 'This is Business Department'),
(6, 'Design', 456, 'thanh', 'qwewqe'),
(8, 'Techical ', 312, 'bibibing', 'this is a tech de'),
(10, 'Marketing', 1009, 'bonguyen', 'This is marketing de'),
(11, 'Production', 1005, 'bonguyen', 'this is pro de'),
(12, 'Purchasingg', 1008, 'dungnguyen', 'this is pur dee'),
(13, 'HRM', 1006, '', 'this is HRM de');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'employee',
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` bit(1) DEFAULT b'0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/user.png',
  `pass_md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `department`, `activated`, `avatar`, `pass_md5`) VALUES
(1, 'hiengay', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'hiengayyyy', 'gayyyy', 'manager', 'Accountant', b'1', 'upload/user.png', ''),
(2, 'nguyenbibi', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'Nguyen', 'bibi', 'employee', 'Accountant', b'1', 'upload/images.png', ''),
(3, 'admin', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'admin', 'admin', 'admin', 'company', b'1', '', ''),
(4, 'nguyentronghien', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'Nguyen', 'tronghien', 'employee', 'Accountant', b'1', '', ''),
(5, 'bonguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'bo', 'nguyen', 'employee', 'Business', b'1', 'upload/movie-poster-8.jpg', ''),
(6, 'taonguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'tao', 'nguyen', 'employee', 'IT', b'1', '', ''),
(8, 'bunbun', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'bun', 'bun', 'employee', 'Accountant', b'1', '', ''),
(9, 'hhnguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'hienhien', 'nguyen', 'employee', 'IT', b'1', '', ''),
(10, 'bunnguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'bun', 'nguyen', 'employee', 'IT', b'1', '', ''),
(11, 'binhbinh', '$2y$10$n4UwDmdlXK9eBrTMuWFeNOu7doJBw5gY9EnO5Hkg6D9Vjy/OFOIAS', 'binh', 'binh', 'manager', 'IT', b'1', '', 'e35cf7b66449df565f93c607d5a81d09'),
(12, 'vunguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'vu', 'nguyen', 'employee', 'IT', b'0', '', ''),
(13, 'trannguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'tran', 'nguyen', 'employee', 'Business', b'0', '', ''),
(14, 'taoapple', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'tao', 'apple', 'employee', 'IT', b'0', '', ''),
(15, 'haibabon', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'haiii', 'baaa', 'employee', 'IT', b'0', '', ''),
(22, 'dungnguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'dung', 'nguyen', 'employee', 'IT', b'0', '', ''),
(23, 'dennguyen', '$2y$10$MMkVKvaWmnXCF3KboYXcTOhwL/SqxNOPYGoRKaSzNFNI6z3H66pQm', 'den', 'nguyen', 'employee', 'IT', b'0', '', ''),
(24, 'baonguyen', '$2y$10$B9PnmRVXAmaHL5e6wShuT.5l/7fserNMns8Xnl4ma96Qx9wz.UzB6', 'bao', 'nguyen', 'employee', 'Business', b'0', '', ''),
(25, 'giabao', '$2y$10$gqYl4HUrYK072MCnpb13puMXe2tgv4jCvfnwvRK4QzjjpVSh9BfVG', 'gia', 'bao', 'employee', 'IT', b'1', '', ''),
(26, 'tramnguyen', '$2y$10$ra7RHbZp7OcpKl7MI3tZlerYhdU.gVQQUMFyjmmoLKw1nXrPM1SnC', 'tram', 'nguyen', 'employee', 'Business', b'1', 'images/user.png', '20aad8b7ac719800b535a421c2ecc4f8'),
(27, 'phuongduyen', '$2y$10$s09qLkCGwQKPkMLPQ5jL4uV/9lPD47np8ZYDvNKhnEbxBNkSJqPUK', 'phuong', 'duyen', 'employee', 'Business', b'1', 'images/user.png', '57214332653ec16b60499d81bcd20da7'),
(28, 'bunbibun', '$2y$10$i0bvMniHiifZMQlUNUxpte5ZTIw06S.Tgug4AYbwXcxKDrMLoS3bS', 'bun', 'bi', 'employee', 'IT', b'0', 'images/user.png', 'beaef1815ae171f7306077f9ac5f30fe'),
(29, 'longnguyen', '$2y$10$dUNcLPPViEDdbaLpnvF8YuLR1gXzQHU9Y/1Utztjojvo.2dfpOYsy', 'long', 'nguyen', 'employee', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'kynguyen', '$2y$10$LyDQE8teLDv9E2uBR5ittOobMHozdWqqmZsLBZRXDwjiJOpwY0PcK', 'ky', 'nguyen', 'employee', 'IT', b'0', 'images/user.png', '273720e19f59e2f6c7634db6a44c35b7'),
(31, 'mimiming', '$2y$10$9y5Hm5zmD7YNoEbsHJtNvOghQYd.wPyagwZoPSMr.wI1.VTdZg7Ri', 'mimimi', 'ng', 'manager', 'Business', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(32, 'hainguyen', '$2y$10$UA/Y5kc1WtqxrVCrShcmG.yRPLS2dL1M7CA2qCqufAqCfucXwA9fy', 'Hải', 'Nguyễn', 'employee', 'Techical ', b'1', 'images/user.png', 'e35cf7b66449df565f93c607d5a81d09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_complete`
--

CREATE TABLE `feedback_complete` (
  `id_feedback` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `rating` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_submit` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_complete`
--

INSERT INTO `feedback_complete` (`id_feedback`, `id_task`, `rating`, `time_submit`) VALUES
(1, 4, 'Good', 'On time');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_reject`
--

CREATE TABLE `feedback_reject` (
  `id_feedback` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extend_deadline` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_reject`
--

INSERT INTO `feedback_reject` (`id_feedback`, `id_task`, `description`, `file`, `extend_deadline`) VALUES
(1, 1, 'not realitics', 'upload/In-America.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submit_task`
--

CREATE TABLE `submit_task` (
  `id_submittask` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submit_day` date NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submit_task`
--

INSERT INTO `submit_task` (`id_submittask`, `id_task`, `description`, `file`, `submit_day`, `username`) VALUES
(1, 1, 'This topic is so hard', 'upload/51900332.zip', '2021-12-27', 'nguyenbibi'),
(2, 4, 'This topic is so easy', 'upload/2021-12-14_14-13.png', '2021-12-28', 'nguyentronghien'),
(3, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', ''),
(4, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', ''),
(5, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', ''),
(6, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', ''),
(7, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', ''),
(8, 1, 'weree', 'upload/Kế hoạch tổ chức chương trình.xlsx', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `person`, `deadline`, `file`, `status`) VALUES
(1, 'Write a post', 'About Hien dep trai', 'nguyenbibi', '2022-03-09 00:00:00', '../upload/51900332.zip', 'Waiting'),
(2, 'Play game', 'archieve gold', 'bunbun', '2022-01-03 00:00:00', '../upload/HÌNH2.docx', 'New'),
(4, 'eat hamburger', 'eat hamburger in month', 'nguyentronghien', '2022-01-07 00:00:00', '../upload/HÌNH2.docx', 'Completed'),
(5, 'eqweqwe', 'qwewqewqeqwe', 'nguyentronghien', '2021-12-08 00:00:00', '../upload/TDS3.TL.03. TIEU CHI DANH GIA KET QUA HOC TAP_TBM_20210308_235430_857_20211214_163533_455.xlsx', 'New'),
(6, 'qweqweqwe', 'qwewqe', 'nguyenbibi', '2021-12-08 00:00:00', '../upload/moneyShopee.PNG', 'New'),
(7, 'task so 7', 'this is task 7', 'nguyenbibi', '2022-01-08 00:00:00', '../upload/1.PNG', 'New'),
(8, 'task so 7', 'this iss task 7', 'nguyenbibi', '2022-01-08 00:00:00', '../upload/1.PNG', 'New'),
(9, 'task so 88', 'task so 888888', 'nguyenbibi', '2021-12-10 00:00:00', '../upload/moneyShopee.PNG', 'New'),
(10, 'eeee', 'qweqweqwe', 'bunbun', '2022-01-08 00:00:00', '../upload/Lab08.pdf', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_form`
--
ALTER TABLE `absence_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absence_info`
--
ALTER TABLE `absence_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_complete`
--
ALTER TABLE `feedback_complete`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `feedback_reject`
--
ALTER TABLE `feedback_reject`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `submit_task`
--
ALTER TABLE `submit_task`
  ADD PRIMARY KEY (`id_submittask`),
  ADD KEY `FK_submit_task_id_task` (`id_task`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence_form`
--
ALTER TABLE `absence_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `absence_info`
--
ALTER TABLE `absence_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `feedback_complete`
--
ALTER TABLE `feedback_complete`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_reject`
--
ALTER TABLE `feedback_reject`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submit_task`
--
ALTER TABLE `submit_task`
  MODIFY `id_submittask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
