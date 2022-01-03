-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 08:36 AM
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
(1, 'khanhan', '2021-12-10 00:14:46', 9, 'Go to hometown', 'upload/khanhan_absence_hometown.docx', 'Refused', '2021-12-11 10:25:36'),
(2, 'thaibao', '2022-01-03 00:15:44', 2, 'Sicked', 'upload/thaibao_absence_sick.docx', 'Waiting', NULL),
(3, 'tokhai', '2022-01-03 00:16:16', 5, 'Travel', 'upload/tokhai_absence_travel.docx', 'Waiting', NULL),
(4, 'nguyennhan', '2022-01-03 00:20:25', 7, 'Travel', 'upload/nguyennhan_absence_travel.docx', 'Approved', '2022-01-03 13:00:29'),
(5, 'phamnghia', '2022-01-03 00:21:19', 1, 'Car Broken', 'upload/phamnghia_absence_carbroken.docx', 'Refused', '2022-01-03 13:00:48'),
(6, 'phamthu', '2022-01-03 00:22:01', 10, 'Pregnant', 'upload/phamthu_absence_pregnant.docx', 'Waiting', NULL),
(7, 'lelong', '2022-01-03 00:23:36', 2, 'illness', 'upload/lelong_absence_illness.docx', 'Waiting', NULL),
(8, 'hophat', '2022-01-03 00:27:33', 3, 'Family Issue', 'upload/hophat_absence_familyissue.docx', 'Waiting', NULL),
(9, 'phamtuan', '2022-01-03 00:28:12', 5, 'Busy', 'upload/phamtuan_absence_busy.docx', 'Waiting', NULL),
(10, 'luuvan', '2022-01-03 00:28:41', 1, 'Hang out', 'upload/luuvan_absence_hangout.docx', 'Waiting', NULL),
(11, 'khanhan', '2021-12-19 10:25:25', 7, 'Go to hometown 2', 'upload/khanhan_absence_hometown2.docx', 'Approved', '2021-12-20 10:25:36'),
(12, 'khanhan', '2022-01-03 10:30:54', 1, 'illness', 'upload/khanhan_absence_ill.docx', 'Waiting', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_form`
--
ALTER TABLE `absence_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence_form`
--
ALTER TABLE `absence_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
