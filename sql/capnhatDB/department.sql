-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 08:20 AM
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
(1, 'Accountant', 1001, 'khanhan', 'An accounting department provides accounting services and manages the finances of a company. Its responsibilities include recording accounts, paying bills, billing clients and customers, tracking assets and expenditures, managing payroll and keeping track'),
(2, 'IT', 1002, 'tokhai', 'The IT department oversees the installation and maintenance of computer network systems within a company. Its primary function is to ensure that the network runs smoothly. The IT department must evaluate and install the proper hardware and software ne'),
(3, 'Business', 1003, 'phamnghia', 'Business Department is a department that plays a key role in an enterprise. The job of the department is understood to be in charge of the research, development and distribution of products.'),
(4, 'Design', 1004, 'lelong', 'A design department manager oversees various creative and design projects for an organization'),
(5, 'Techical', 1005, 'ngohieu', 'Technical Support is a position hired by a company to oversee and maintain their computer hardware and software systems. '),
(6, 'Marketing', 1006, 'dotai', 'A marketing department promotes your business and drives sales of its products or services. It provides the necessary research to identify your target customers and other audiences. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
