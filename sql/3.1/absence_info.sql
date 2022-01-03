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
(23, 'khanhan', 12, 7, 5),
(24, 'thaibao', 15, 0, 15),
(25, 'nguyendai', 12, 0, 12),
(27, 'nguyenhung', 12, 0, 12),
(28, 'trankieu', 12, 0, 12),
(29, 'tokhai', 12, 0, 12),
(30, 'nguyennhan', 15, 7, 8),
(31, 'tranphuc', 12, 0, 12),
(32, 'nguyenson', 12, 0, 12),
(33, 'nguyenthinh', 12, 0, 12),
(34, 'phamnghia', 12, 0, 12),
(35, 'phamthu', 12, 0, 12),
(36, 'phandat', 12, 0, 12),
(37, 'ngocduy', 12, 0, 12),
(38, 'thaiha', 12, 0, 12),
(39, 'lelong', 15, 0, 15),
(40, 'dangnam', 12, 0, 12),
(42, 'hophat', 12, 0, 12),
(43, 'matrung', 12, 0, 12),
(44, 'ngohieu', 12, 0, 12),
(45, 'truonghung', 12, 0, 12),
(46, 'truonghau', 12, 0, 12),
(47, 'tranphi', 15, 0, 15),
(48, 'tranthuan', 12, 0, 12),
(51, 'phamtuan', 15, 0, 15),
(53, 'luongquang', 12, 0, 12),
(54, 'luuvan', 12, 0, 12),
(55, 'nguyenduyen', 12, 0, 12),
(56, 'duyennguyen', 12, 0, 12),
(57, 'duyenduyen', 12, 0, 12),
(58, 'duyenduyen', 12, 0, 12),
(59, 'duyenduyen', 12, 0, 12),
(60, 'duyenduyen', 12, 0, 12),
(61, 'duyenduyen', 12, 0, 12),
(62, 'duyenduyen', 12, 0, 12),
(63, 'duyenduyen', 12, 0, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_info`
--
ALTER TABLE `absence_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence_info`
--
ALTER TABLE `absence_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
