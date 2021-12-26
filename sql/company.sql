-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 09:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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
  `create _date` date NOT NULL,
  `number_dayoff` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_form`
--

INSERT INTO `absence_form` (`id`, `username`, `create _date`, `number_dayoff`, `reason`, `file`, `status`) VALUES
(1, 'nguyenbibi', '2021-12-08', 3, 'Sick', 'upload/images.png', 'waiting'),
(2, 'hiengay', '2021-12-01', 5, 'Go to hometown', 'upload/movie-poster-1.jpg', 'refused'),
(3, 'nguyentronghien', '2021-12-06', 10, 'pregnant', 'upload/movie-thumb-1.jpg', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `absence_info`
--

CREATE TABLE `absence_info` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_dayoff` int(11) NOT NULL,
  `dayoff_used` int(11) NOT NULL,
  `dayoff_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence_info`
--

INSERT INTO `absence_info` (`username`, `total_dayoff`, `dayoff_used`, `dayoff_left`) VALUES
('nguyentronghien', 15, 5, 10),
('hiengay', 12, 5, 7),
('nguyenbibi', 15, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `firstname`, `lastname`, `password`, `activated`) VALUES
('asdasd', 'asd', 'asd', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('bibinguyen', 'bi', 'bi', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('haidang', 'Dang', 'Nguyen', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('haihai', 'hai', 'hai', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('hiengay', 'hiengay', 'gay', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('hienng', 'Ng', 'Hien', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('hiennguyen', 'Nguyen', 'Hien', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('miming', 'Mi', 'Mi', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('miminguyen', 'Ming', 'Mi', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('mvmanh', 'Mai', 'Văn Mạnh', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('nchdang', 'Nguyen', 'Dang', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('nguyenbibi', 'Nguyen', 'bibi', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1'),
('qweqwe', 'qwe', 'qwe', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'0'),
('tdt', 'Tôn', 'Đức Thắng', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', b'1');

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
  `activated` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `department`, `activated`) VALUES
(1, 'hiengay', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', 'hiengay', 'gay', 'employee', 'accountant', b'1'),
(2, 'nguyenbibi', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', 'Nguyen', 'bibi', 'manager', 'accountant', b'1'),
(3, 'tdt', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', 'Tôn', 'Đức Thắng', 'admin', 'null', b'1'),
(4, 'nguyentronghien', '$2y$10$EvQ2StKj/auPaPGun8hTW.T1VNDvTpIqmSgTNFA5fvvW5./XCXyPi', 'Nguyen', 'tronghien', 'manager', 'it', b'1');

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
(2, 4, 'This topic is so easy', 'upload/2021-12-14_14-13.png', '2021-12-28', 'nguyentronghien');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `person`, `deadline`, `file`, `status`) VALUES
(1, 'Write a post', 'About Hien dep trai', 'nguyenbibi', '2022-03-09', 'upload/51900332.zip', 'Rejected'),
(2, 'Play game', 'archieve gold', 'hiengay', '2022-01-03', 'upload/HÌNH2.docx', 'New'),
(3, 'change background color', 'change background color light blue', 'hiengay', '2022-01-07', 'upload/HÌNH2.docx', 'In progress'),
(4, 'eat hamburger', 'eat hamburger in month', 'nguyentronghien', '2022-01-07', 'upload/HÌNH2.docx', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_form`
--
ALTER TABLE `absence_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_submittask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
