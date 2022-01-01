-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2022 at 06:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
CREATE DATABASE IF NOT EXISTS `company` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `company`;
-- --------------------------------------------------------

--
-- Table structure for table `absence_form`
--

CREATE TABLE `absence_form` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `number_dayoff` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Waiting',
  `approval_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_form`
--

INSERT INTO `absence_form` (`id`, `username`, `create_date`, `number_dayoff`, `reason`, `file`, `status`, `approval_date`) VALUES
(1, 'nguyentronghien', '2021-12-06 00:00:00', 10, 'pregnant', 'upload/movie-thumb-1.jpg', 'Approved', '2021-11-01 10:32:33'),
(2, 'hiengay', '2021-12-29 09:21:25', 7, 'Having baby ', '', 'Rejected', '2021-12-01 11:05:47'),
(3, 'hiengay', '2021-12-29 09:54:08', 2, 'No reason here', '', 'Rejected', '2021-12-08 11:07:19'),
(4, 'hiengay', '2021-12-29 23:23:37', 10, 'Just test function', '', 'Waiting', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absence_info`
--

CREATE TABLE `absence_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_dayoff` int(11) NOT NULL DEFAULT 12,
  `dayoff_used` int(11) NOT NULL DEFAULT 0,
  `dayoff_left` int(11) NOT NULL DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_info`
--

INSERT INTO `absence_info` (`id`, `username`, `total_dayoff`, `dayoff_used`, `dayoff_left`) VALUES
(1, 'nguyentronghien', 12, 5, 10),
(3, 'nguyenbibi', 15, 3, 12),
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
(14, 'hiengay', 12, 12, 0),
(15, 'hihihi', 12, 0, 12),
(16, 'nhanviena', 12, 0, 12),
(17, 'nhanvienb', 12, 0, 12),
(18, 'nhanvienc', 12, 0, 12),
(19, 'nhanviend', 12, 0, 12),
(20, 'nhanviene', 12, 0, 12),
(21, 'nhanvienf', 12, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_room` int(11) NOT NULL,
  `manager_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `number_room`, `manager_user`, `detail`) VALUES
(1, 'Accountant', 1001, 'nguyenbibi', 'this is a accountant department'),
(2, 'IT', 1002, 'hihihi', 'this is a it department'),
(3, 'Business', 1023, 'mimiming', 'This is Business Department'),
(4, 'Design', 456, 'thanh', 'qwewqe'),
(5, 'Techical ', 312, 'bibibing', 'this is a tech de'),
(6, 'Marketing', 1009, 'bonguyen', 'This is marketing de'),
(7, 'Production', 1005, 'bonguyen', 'this is pro de'),
(8, 'Purchasingg', 1008, 'dungnguyen', 'this is pur dee'),
(9, 'HRM', 1006, 'nhanviena', 'this is HRM de');

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
(1, 'tramnguyen', '$2y$10$ra7RHbZp7OcpKl7MI3tZlerYhdU.gVQQUMFyjmmoLKw1nXrPM1SnC', 'tram', 'nguyen', 'employee', 'business', b'1', 'images/user.png', '20aad8b7ac719800b535a421c2ecc4f8'),
(2, 'phuongduyen', '$2y$10$s09qLkCGwQKPkMLPQ5jL4uV/9lPD47np8ZYDvNKhnEbxBNkSJqPUK', 'phuong', 'duyen', 'manager', 'business', b'1', 'images/user.png', '57214332653ec16b60499d81bcd20da7'),
(3, 'bunbibun', '$2y$10$i0bvMniHiifZMQlUNUxpte5ZTIw06S.Tgug4AYbwXcxKDrMLoS3bS', 'bun', 'bi', 'employee', 'IT', b'0', 'images/user.png', 'beaef1815ae171f7306077f9ac5f30fe'),
(4, 'longnguyen', '$2y$10$dUNcLPPViEDdbaLpnvF8YuLR1gXzQHU9Y/1Utztjojvo.2dfpOYsy', 'long', 'nguyen', 'employee', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'kynguyen', '$2y$10$LyDQE8teLDv9E2uBR5ittOobMHozdWqqmZsLBZRXDwjiJOpwY0PcK', 'ky', 'nguyen', 'employee', 'IT', b'0', 'images/user.png', '273720e19f59e2f6c7634db6a44c35b7'),
(6, 'admin', '$2y$10$9y5Hm5zmD7YNoEbsHJtNvOghQYd.wPyagwZoPSMr.wI1.VTdZg7Ri', 'Admin', '', 'admin', 'company', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'hiengay', '$2y$10$GWFKIzyVtwWPPq6l58E2ju6lFhBmeorGNSMD9QYcTI1AF3brhkZ7K', 'Hien', 'Dep Trai', 'employee', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'hihihi', '$2y$10$r8bZ7OrO1i.w5.HgUEQt2epBh7ehLYXZZ7N7oofEh7c0n8EHDhuDK', 'hihi', 'hihi', 'manager', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'nhanviena', '$2y$10$WscT2gL6V6.wuFB9wb6QCeTnnfLEh4JXhEdQr2ECuUXRbr/duuyp6', 'nhanvien ', 'a', 'manager', 'HRM', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'nhanvienb', '$2y$10$qp52zH6rZdBJtRMk31Ab0u0Xzv2CKnCn9tk9n7F8Gh7EWlmhxe/DS', 'nhanvien', 'b', 'employee', 'HRM', b'0', 'images/user.png', 'a05c21ed67ae19e0595f6697179afe80'),
(11, 'nhanvienc', '$2y$10$boeFg8GBnTxCC65THYikIuba/ifW7EI.V1zfFZUlw65xSwlFWHi1a', 'nhanvien', 'c', 'employee', 'HRM', b'0', 'images/user.png', 'd48e0d8887cf6bf6b2c05f08ceb81cfc'),
(12, 'nhanviend', '$2y$10$9tSUlD1/Kpw5S268rQuQ0OWCsF7YeCUfArHtQZcJ8txiviumdaJk.', 'nhanvien', 'd', 'employee', 'HRM', b'0', 'images/user.png', 'fe60b2deb9b3fe59ea79b623ac4dcd8e'),
(13, 'nhanviene', '$2y$10$EPs1qMr6IgT6ziyGaeSEZeFsQ4V9cEgaiHHwd4cGlGMU0PO4Y4npO', 'nhanvien', 'e', 'manager', 'HRM', b'0', 'images/user.png', 'af68333feece10bb18b884c57360d0b8'),
(14, 'nhanvienf', '$2y$10$csdSfKiscB.NSEdSaG46Su2u7RfJyvdfEu86RaYLzBvfVVKwYrmoy', 'nhanvien', 'f', 'employee', 'Production', b'0', 'images/user.png', 'b048e278c4be9fe81c3a9f41d98de50e');

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
(2, 6, 'Good', 'On time'),
(3, 7, 'Bad', 'Late'),
(6, 4, 'Bad', 'Late');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_reject`
--

CREATE TABLE `feedback_reject` (
  `id_feedback` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extend_deadline` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_reject`
--

INSERT INTO `feedback_reject` (`id_feedback`, `id_task`, `description`, `file`, `extend_deadline`) VALUES
(2, 2, 'Many news there, please check again', 'upload/LabUnittest.pdf', 0),
(3, 2, 'Are you sure about that? Check again please', 'upload/LabUnittest.pdf', 0),
(16, 8, 'Ahihdifhasdifh', '', 1),
(17, 1, 'alskdjfl;skdjf', 'upload/51900306_51900332.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submit_task`
--

CREATE TABLE `submit_task` (
  `id_submittask` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `sm_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sm_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit_day` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submit_task`
--

INSERT INTO `submit_task` (`id_submittask`, `id_task`, `sm_description`, `sm_file`, `submit_day`) VALUES
(1, 1, 'This topic is so hard', 'upload/51900332.zip', '2021-12-27 00:00:00'),
(2, 4, 'This topic is so easy', 'upload/2021-12-14_14-13.png', '2021-12-28 00:00:00'),
(4, 2, 'Nothing new sir', 'upload/NguyenCaoHaiDang-51900306_NguyenTrongHien-51900332_NguyenHuuNhatTruong-51800948_MIS_HK1.21.22.pdf', '2021-12-28 00:00:00'),
(5, 2, 'I cant not find anything ser !!!', 'upload/movie-thumb-1.jpg', '2021-12-30 09:19:45'),
(6, 2, 'Nothing to update sirrrrrrrrrrrrrr', 'upload/Lab03.zip', '2021-12-30 10:12:46'),
(7, 8, 'Added a new row', 'upload/baocao.docx', '2021-12-30 14:15:14');

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
(1, 'Write a post', 'About Hien dep trai', 'nguyenbibi', '2022-01-12 00:00:00', 'upload/51900332.zip', 'Rejected'),
(2, 'Check social media', 'Update news', 'hiengay', '2022-01-31 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(3, 'Change button style', 'Scale 0.98', 'hiengay', '2022-01-11 00:00:00', 'upload/HÌNH2.docx', 'Canceled'),
(4, 'eat hamburger', 'eat hamburger in month', 'nguyentronghien', '2021-12-17 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(5, 'Netflix and Chill', 'Watch with your gf', 'hiengay', '2022-03-01 00:00:00', 'upload/51900306_LabUnitTest.zip', 'In progress'),
(6, 'Change bg color', 'Change to light blue', 'hiengay', '2022-01-07 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(7, 'Play game', 'Achive gold', 'hiengay', '2022-01-15 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(8, 'Add new row', 'Ahihi', 'hiengay', '2022-01-07 00:00:00', 'upload/HÌNH2.docx', 'Rejected');

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
  ADD PRIMARY KEY (`id_submittask`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `absence_info`
--
ALTER TABLE `absence_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback_complete`
--
ALTER TABLE `feedback_complete`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_reject`
--
ALTER TABLE `feedback_reject`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submit_task`
--
ALTER TABLE `submit_task`
  MODIFY `id_submittask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
