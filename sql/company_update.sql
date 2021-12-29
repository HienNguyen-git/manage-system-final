-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2021 at 05:07 AM
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
(3, 'nguyentronghien', '2021-12-06 00:00:00', 10, 'pregnant', 'upload/movie-thumb-1.jpg', 'Approved', '2021-11-01 10:32:33'),
(7, 'hiengay', '2021-12-29 09:21:25', 7, 'Having baby ', '', 'Rejected', '2021-12-01 11:05:47'),
(9, 'hiengay', '2021-12-29 09:35:04', 6, 'Ahihihi', 'upload/LabUnittest.pdf', 'Waiting', NULL),
(11, 'hiengay', '2021-12-29 09:54:08', 2, 'No reason here', '', 'Rejected', '2021-12-08 11:07:19');

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
(1, 'hiengay', 12, 0, 0),
(2, 'nguyenbibi', 12, 0, 0),
(3, 'nguyentronghien', 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manager_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `manager_user`, `detail`, `number room`) VALUES
(3, 'accountant', 'nguyenbibi', 'this is a accountant department', 1001),
(4, 'it', 'nguyentronghien', 'this is a it department', 1002);

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
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` bit(1) DEFAULT b'0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `department`, `activated`, `avatar`) VALUES
(1, 'hiengay', '$2y$10$qSKrqlZHIZC4TETDXrWl/Of906KpuUc5ZXU2xWfcjAKcoqqNzF9se', 'hiengay', 'gay', 'employee', 'accountant', b'1', 'upload/index.jpeg'),
(2, 'nguyenbibi', '$2y$10$qSKrqlZHIZC4TETDXrWl/Of906KpuUc5ZXU2xWfcjAKcoqqNzF9se', 'Nguyen', 'bibi', 'employee', 'accountant', b'1', 'upload/user.png'),
(3, 'tdt', '$2y$10$qSKrqlZHIZC4TETDXrWl/Of906KpuUc5ZXU2xWfcjAKcoqqNzF9se', 'Tôn', 'Đức Thắng', 'admin', 'null', b'1', 'images/user.png'),
(4, 'nguyentronghien', '$2y$10$qSKrqlZHIZC4TETDXrWl/Of906KpuUc5ZXU2xWfcjAKcoqqNzF9se', 'Nguyen', 'tronghien', 'manager', 'it', b'1', 'images/user.png'),
(5, 'Ahihihuhu', '$2y$10$qSKrqlZHIZC4TETDXrWl/Of906KpuUc5ZXU2xWfcjAKcoqqNzF9se', 'Ahihi', 'Ahuhu', 'employee', 'Mlem Mlem', b'0', 'images/user.png');

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
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit_day` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submit_task`
--

INSERT INTO `submit_task` (`id_submittask`, `id_task`, `description`, `file`, `submit_day`) VALUES
(1, 1, 'This topic is so hard', 'upload/51900332.zip', '2021-12-27 00:00:00'),
(2, 4, 'This topic is so easy', 'upload/2021-12-14_14-13.png', '2021-12-28 00:00:00'),
(5, 3, 'jksahdfkjsd', 'upload/LONG-NHONG-21-NGÀY.pptx', '2021-12-27 00:00:00'),
(6, 2, 'Nothing new sir', 'upload/NguyenCaoHaiDang-51900306_NguyenTrongHien-51900332_NguyenHuuNhatTruong-51800948_MIS_HK1.21.22.pdf', '2021-12-28 00:00:00'),
(9, 2, 'Nothing new sir. Both facebook and instagram', '', '2021-12-28 16:03:44');

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
(1, 'Write a post', 'About Hien dep trai', 'nguyenbibi', '2022-03-09 00:00:00', 'upload/51900332.zip', 'Rejected'),
(2, 'Check social media', 'Update news', 'hiengay', '2022-01-31 00:00:00', 'upload/HÌNH2.docx', 'Waiting'),
(3, 'Change button style', 'Scale 0.98', 'hiengay', '2022-01-11 00:00:00', 'upload/HÌNH2.docx', 'Canceled'),
(4, 'eat hamburger', 'eat hamburger in month', 'nguyentronghien', '2022-01-07 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(5, 'Netflix and Chill', 'Watch with your gf', 'hiengay', '2021-12-27 21:17:19', 'upload/51900306_LabUnitTest.zip', 'In progress'),
(6, 'Change bg color', 'Change to light blue', 'hiengay', '2022-01-07 00:00:00', 'upload/HÌNH2.docx', 'Completed'),
(7, 'Play game', 'Achive gold', 'hiengay', '2022-01-15 00:00:00', 'upload/HÌNH2.docx', 'Rejected'),
(8, 'Add new row', 'Ahihi', 'hiengay', '2022-02-01 00:00:00', 'upload/HÌNH2.docx', 'In progress');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_department_manager_user` (`manager_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `absence_info`
--
ALTER TABLE `absence_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_submittask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
