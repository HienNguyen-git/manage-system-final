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
(1, 'khanhan', '2021-12-10 00:14:46', 9, 'Go to hometown', 'upload/khanhan_absence_hometown.docx', 'Refused', '2021-12-11 10:25:36'),
(2, 'thaibao', '2022-01-03 00:15:44', 2, 'Sicked', 'upload/thaibao_absence_sick.docx', 'Refused', '2021-12-11 10:57:58'),
(3, 'tokhai', '2022-01-03 00:16:16', 5, 'Travel', 'upload/tokhai_absence_travel.docx', 'Waiting', NULL),
(4, 'nguyennhan', '2022-01-03 00:20:25', 7, 'Travel', 'upload/nguyennhan_absence_travel.docx', 'Approved', '2022-01-03 13:00:29'),
(5, 'phamnghia', '2022-01-03 00:21:19', 1, 'Car Broken', 'upload/phamnghia_absence_carbroken.docx', 'Refused', '2022-01-03 13:00:48'),
(6, 'phamthu', '2022-01-03 00:22:01', 10, 'Pregnant', 'upload/phamthu_absence_pregnant.docx', 'Waiting', NULL),
(7, 'lelong', '2022-01-03 00:23:36', 2, 'illness', 'upload/lelong_absence_illness.docx', 'Waiting', NULL),
(8, 'hophat', '2022-01-03 00:27:33', 3, 'Family Issue', 'upload/hophat_absence_familyissue.docx', 'Waiting', NULL),
(9, 'phamtuan', '2022-01-03 00:28:12', 5, 'Busy', 'upload/phamtuan_absence_busy.docx', 'Waiting', NULL),
(10, 'luuvan', '2022-01-03 00:28:41', 1, 'Hang out', 'upload/luuvan_absence_hangout.docx', 'Waiting', NULL),
(11, 'khanhan', '2021-12-19 10:25:25', 7, 'Go to hometown 2', 'upload/khanhan_absence_hometown2.docx', 'Approved', '2021-12-20 10:25:36'),
(12, 'khanhan', '2022-01-03 10:30:54', 1, 'illness', 'upload/khanhan_absence_ill.docx', 'Waiting', NULL),
(14, 'thaibao', '2022-01-04 10:57:42', 3, 'Child Care', 'upload/thaibao_absence_childcare.docx', 'Approved', '2021-12-20 10:57:58'),
(15, 'thaibao', '2022-01-04 10:58:59', 2, 'Busy', 'upload/thaibao_absence_busy.docx', 'Waiting', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
(23, 'khanhan', 15, 7, 8),
(24, 'thaibao', 12, 0, 12),
(25, 'nguyendai', 12, 0, 12),
(27, 'nguyenhung', 12, 0, 12),
(28, 'trankieu', 12, 0, 12),
(29, 'tokhai', 15, 0, 15),
(30, 'nguyennhan', 12, 7, 5),
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
(44, 'ngohieu', 15, 0, 15),
(45, 'truonghung', 12, 0, 12),
(46, 'truonghau', 12, 0, 12),
(47, 'tranphi', 12, 0, 12),
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
(63, 'duyenduyen', 12, 0, 12),
(64, 'ngtrong', 12, 0, 12);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
(6, 'Marketing', 1006, 'phamtuan', 'A marketing department promotes your business and drives sales of its products or services. It provides the necessary research to identify your target customers and other audiences. ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
(1, 'admin', '$2y$10$9y5Hm5zmD7YNoEbsHJtNvOghQYd.wPyagwZoPSMr.wI1.VTdZg7Ri', 'Admin', '', 'admin', 'Company', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'khanhan', '$2y$10$dJeQJIIxVZemm.VL3b8BBu9Rd5VcQ71UYwa2flu3j/RqtaXZwjbd6', 'Khánh Gia', 'An', 'manager', 'Accountant', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'thaibao', '$2y$10$eqQhspheNdhmOtnu.AK13u0vg3H6F2jyoG03j3ucx6I.zi6NZg9LC', 'Thái Đình', 'Bảo', 'employee', 'Accountant', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'nguyendai', '$2y$10$mplQFyJt0q1ha8fTfr283eFEboadaJ7ZuXoELDIdPSwkDrJatsEga', 'Nguyễn Chánh', 'Đại', 'employee', 'Accountant', b'0', 'images/user.png', '2d6bae6b294c8fd69ba8b203d2517908'),
(5, 'nguyenhung', '$2y$10$GKx4fHOd44GlTSIblpKfV.yXhfWG2W75DtGXPmL5dMZ4PXq5FunUa', 'Nguyễn Hoa', 'Hưng', 'employee', 'Accountant', b'0', 'images/user.png', '17d3e6c4c1c223aedd1dfa7a7aa5f4a2'),
(6, 'trankieu', '$2y$10$N/PhU6CbJoPePMMa6kt.COF.qTVcwUAjtLooOf5nwvylHZRwew7cO', 'Trần Thị', 'Kiều', 'employee', 'Accountant', b'0', 'images/user.png', 'ee75902d94969a20bb31dfb5ab68e4fe'),
(7, 'tokhai', '$2y$10$U3hjUrYWAby.iNmTkg2NTuRfiCxX83N3hRRmDn2hGxprTI0JEMcS2', 'Tô Tấn ', 'Khải', 'manager', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'nguyennhan', '$2y$10$TADv0lKp9.5pZNaMFsRMAe8ZgFI9ryEr7fxgvFbJiirIt7Mxkxw1K', 'Nguyễn Thành ', 'Nhân', 'employee', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'tranphuc', '$2y$10$0T0osWXxoz1eNqIrfTBr5OhnIv9r54lTn9/Onc4yPv7H748Y8/TV.', 'Trần Hoàng ', 'Phúc', 'employee', 'IT', b'0', 'images/user.png', 'df3d08281fb045245c445ca0fef197a4'),
(10, 'nguyenson', '$2y$10$T1d7SSkDDAD6VnOORmwH4eRlU4PXSbbFWRO939P3/YjC25i1eLatq', 'Nguyễn', 'Sơn', 'employee', 'IT', b'0', 'images/user.png', '82f05a2fb7fef172ca36ed4c2f4e5338'),
(11, 'nguyenthinh', '$2y$10$0J2MaulkBv3zJUV5eNt/yeCcGv2dXjnq4ZS.Y77Ze6kKvExc/LEka', 'Nguyễn Trần', 'Thịnh', 'employee', 'IT', b'0', 'images/user.png', 'c96768a0566d717ea236020372eb6c2c'),
(12, 'phamnghia', '$2y$10$gGVe7Wv6J4b43j7s5lnjAe3q6VBwrDZLwABQFA5hGqHw9YI36E9xK', 'Phạm Hùng ', 'Nghĩa', 'manager', 'Business', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'phamthu', '$2y$10$wQYiBh6AUns/JSeIdByHWO.bVFdV2CZDW.nSH1klnTcFY0Karxvo6', 'Phạm Anh ', 'Thư', 'employee', 'Business', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'phandat', '$2y$10$VwHOAR4TAbdBL85HnvaqV.Li8bkR6DwYHGVZranlQd1kVo8f9OiSe', 'Phan Thành ', 'Đạt', 'employee', 'Business', b'0', 'images/user.png', 'b0ad197bddf2706fadb549205a5b6875'),
(15, 'ngocduy', '$2y$10$8vZJ7Sj0DQ6yJMHHBP7Kn.OnrcpfFdYRn8F/PhfXXC1F6aoXWIJdK', 'Ngọc Linh', 'Duy', 'employee', 'Business', b'0', 'images/user.png', '6d5c377638188a055c54ab7ac5da3d85'),
(16, 'thaiha', '$2y$10$h8cKPlyNLqr7JMLHArYaJOGSihuDv/K42meHVuoxkMPmZXhvvV1A.', 'Thái Khánh ', 'Hà', 'employee', 'Business', b'0', 'images/user.png', 'ed97f7feb25c0cd8a0d05ea4a53de6e3'),
(17, 'lelong', '$2y$10$NuSUDDiMNGs1sgVS845peewgAMAmSLcdT8m28vCBSHErLCUwUSlYS', 'Lê Tiểu ', 'Long', 'manager', 'Design', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'dangnam', '$2y$10$.tRT6DelWbR1Ugnuj.RZI.N0.84gWWJTuP4bhC5ig3etAVxvhiAmO', 'Đặng Hoàng', 'Nam', 'employee', 'Design', b'0', 'images/user.png', '6ba6f33a6c1112128dbfec91adbeb7ec'),
(19, 'nguyentai', '$2y$10$JXm/pqcz05AOFugAaHUQIOS.R/JWl1i87CSr3q3/RKEsIaGe8Mtiq', 'Nguyễn Xuân', 'Tài', 'employee', 'Design', b'0', 'images/user.png', '808f39c76e93d5361111143e1bddd68f'),
(20, 'hophat', '$2y$10$dQEeySlPbRQj/dvoPzcHUO05eoSb4X.c.KtORsj95wpWbdK.wODFy', 'Hồ Văn ', 'Phát', 'employee', 'Design', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'matrung', '$2y$10$aBloPv3SsT9Oym8u/QnXWebQXnOaZxmBxEQi.zzI492D48k3wAwFG', 'Mã Văn', 'Trung', 'employee', 'Design', b'0', 'images/user.png', '5e665ed22f3a40e29004d02384f95eb0'),
(22, 'ngohieu', '$2y$10$JXm/pqcz05AOFugAaHUQIOS.R/JWl1i87CSr3q3/RKEsIaGe8Mtiq', 'Ngô Trung', 'Hiếu', 'manager', 'Techical ', b'0', 'images/user.png', '808f39c76e93d5361111143e1bddd68f'),
(23, 'truonghung', '$2y$10$gspKV2pUqv6cVQYDGUQpPOye4QNKe0obxbfDK9Lvo0o9PSP3ePbV6', 'Trương Tấn', 'Hùng', 'employee', 'Techical ', b'0', 'images/user.png', '72630e94b83d2aecf7216cc4a84fafa3'),
(24, 'truonghau', '$2y$10$9uRcK/M9IkfDSMGftHoeaO6z9V/vxR./bfGPH4hOI9MiSW7s9D7eu', 'Trương Minh', 'Hậu', 'employee', 'Techical ', b'0', 'images/user.png', 'a4ed3fc1e2892905aa6eed404a9c3883'),
(25, 'tranphi', '$2y$10$b8A7odaRBMeNRKiH352ssOleyolxETeT2WSBSCoIvVHO6d4V8JNJ.', 'Trần Minh', 'Phi', 'employee', 'Techical ', b'0', 'images/user.png', 'df27810856a6030be8bcb3aa5b17d4a1'),
(26, 'tranthuan', '$2y$10$FRr2ZqLIJf3VdIIAM.oW6ec/RyQzt4QtgbKnznu5nFB.QI8M5EgGi', 'Trần Công', 'Thuận', 'employee', 'Techical ', b'0', 'images/user.png', 'd09d9772701a57b4a2a39ef280f7504d'),
(27, 'phamtuan', '$2y$10$6sCsqgbujiWXJ4NYkxCiC.I929cTE9i8oEdpmHcgpD.jzUY6.ruje', 'Phạm Thanh', 'Tuấn', 'manager', 'Marketing', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(28, 'luongquang', '$2y$10$u0yRM1YCqrV6QI7FLdRyp.xOS2A4U2dRUJmO2cAJ.dPcybofNQ9Nm', 'Lương Minh ', 'Quang', 'employee', 'Marketing', b'0', 'images/user.png', '4121f341b4af0f27104ed85d1b955aba'),
(29, 'luuvan', '$2y$10$4mEXvctpXPCqQMEF.liGr.5FoNEMBM9urKlWxgKpIYv3Dqkp6KL96', 'Lưu Kiến', 'Văn', 'employee', 'Marketing', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'xuantruong', '$2y$10$u0yRM1YCqrV6QI7FLdRyp.xOS2A4U2dRUJmO2cAJ.dPcybofNQ9Nm', 'Nguyễn Xuân', 'Trường', 'employee', 'Marketing', b'0', 'images/user.png', '4121f341b4af0f27104ed85d1b955aba'),
(31, 'minhhai', '$2y$10$u0yRM1YCqrV6QI7FLdRyp.xOS2A4U2dRUJmO2cAJ.dPcybofNQ9Nm', 'Nguyễn Minh', 'Hải', 'employee', 'Marketing', b'0', 'images/user.png', '4121f341b4af0f27104ed85d1b955aba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
(1, 'Preparing accounts and tax returns', 'Preparing accounts and tax returns. Preparing accounts and tax returns. Preparing accounts and tax returns', 'thaibao', '2022-01-03 00:00:00', 'upload/preparing-accounts-and-tax-returns_accountant.docx', 'Canceled'),
(2, 'Monitoring spending and budgets', 'Monitoring spending and budgets. Monitoring spending and budgets. Monitoring spending and budgets. Monitoring spending and budgets', 'nguyendai', '2022-01-05 00:00:00', 'upload/monitoring-spending-and-budgets_accountant.docx', 'New'),
(3, 'Auditing and analysing financial performance', 'Auditing and analysing financial performance. Auditing and analysing financial performance. Auditing and analysing financial performance. Auditing and analysing financial performance', 'nguyenhung', '2022-01-08 00:00:00', 'upload/auditing-and-analysing-financial-performance_accountant.docx', 'In progress'),
(4, 'Advising on how to reduce costs and increase profits', 'Advising on how to reduce costs and increase profits. Advising on how to reduce costs and increase profits. Advising on how to reduce costs and increase profits', 'thaibao', '2022-01-16 00:00:00', 'upload/advising-on-how-to-reduce-costs-and-increase-profits_accountant.docx', 'Waiting'),
(5, 'Financial forecasting and risk analysis', 'Financial forecasting and risk analysis. Financial forecasting and risk analysis. Financial forecasting and risk analysis. Financial forecasting and risk analysis', 'trankieu', '2022-01-08 00:00:00', 'upload/financial-forecasting-and-risk-analysis_accountant.docx', 'Completed'),
(6, 'Conception', 'Planning and development, sometimes called project conception, is the very beginning of the construction process.', 'nguyennhan', '2022-01-04 00:00:00', 'upload/conception_it.docx', 'Rejected'),
(7, 'Design', 'The design process is where the impossible (or at least impossibly expensive) dreams of your client meet what is actually doable.', 'tranphuc', '2022-01-10 00:00:00', 'upload/design_it.docx', 'Canceled'),
(8, 'Preconstruction', 'In this stage of the process, construction platforms that help team members collaborate easily and coordinate schedules are extremely helpful and save time.', 'nguyenson', '2022-01-05 00:00:00', 'upload/preconstruction_it.docx', 'New'),
(9, 'Procurement', 'This is where schedules can really get tied in a knot. You have a lot of varied delivery schedules and a lot of vendors you need to juggle so that the right materials get into the right people’s hands at the right times.', 'nguyenthinh', '2022-01-12 00:00:00', 'upload/procurement_it.docx', 'Completed'),
(10, 'Construction', 'Time to dig in the dirt, pour some concrete, bend some rebar, and fire up the welder. Now the project finally moves from paper (or more accurately, a CAD drawing) to the physical world.', 'nguyennhan', '2022-01-08 00:00:00', 'upload/construction_it.docx', 'In progress'),
(11, 'Keeping Track of Cash Flow', 'Every small business must keep records of its day-to-day financial workings, a task known as bookkeeping. This information provides the foundation you draw on to manage your company\'s finances.', 'phamthu', '2022-01-02 00:00:00', 'upload/keeping-track-of-cash-flow_business.docx', 'Waiting'),
(12, 'Looking After Your People', 'Hire and train personnel\nMaintain records of employee work history and tax information.\nAdminister employee benefits\nAddress employee issues and complaints\nTake disciplinary action in case of poor employee performance\n\n', 'phandat', '2022-01-08 00:00:00', 'upload/keeping-track-of-cash-flow_business.docx', 'In progress'),
(13, 'Purchasing Resources and Supplies', '\r\n\r\nWhether your business provides a product or a service, you need supplies and materials to keep things running. Your purchasing department makes sure you have what you need when you need it.', 'ngocduy', '2022-01-11 00:00:00', 'upload/purchasing-resources-and-supplies_business.docx', 'Canceled'),
(14, 'Making and Distributing the Product', 'Receive orders and set production numbers\r\nMonitor and improve workflow\r\nMaintain and repair equipment\r\nPackage and store finished product\r\n\r\n', 'thaiha', '2022-01-17 00:00:00', 'upload/making-and-distributing-the-product_business.docx', 'New'),
(15, 'Taking Care of Customers', 'Work with customers through each phase of your sales process\r\nReceive and respond to customer feedback\r\nTake care of customer needs and special requests\r\n\r\n', 'phamthu', '2022-01-12 00:00:00', 'upload/taking-care-of-customers_business.docx', 'Completed'),
(16, 'Competition Research', 'This will help see how other products were tackling this issue and taking notes of the things I did and didn’t like. Make a summary of the competition', 'dangnam', '2022-01-08 00:00:00', 'upload/competition-research_design.docx', 'Rejected'),
(17, 'User research', 'Research everything about the users. There could be different methodologies to learn about them', 'lehuy', '2022-01-09 00:00:00', 'upload/user-research_design.docx', 'New'),
(18, 'Personas', 'With the information provided by the User Research you will be able to create the Personas. A Persona is the representative of a group of users with their context', 'hophat', '2022-01-16 00:00:00', 'upload/personas_design.docx', 'New'),
(19, 'Information on Personas', 'Depending on the needs of the users and the problems of the product, the information to be carried by each Persona is different. ', 'matrung', '2022-01-06 00:00:00', 'upload/information-on-personas_design.docx', 'Completed'),
(20, 'Understand the context and the need of the user', 'The objective is to understand with each persona how was its experience while using the product', 'matrung', '2022-01-09 00:00:00', 'upload/understand-the-context-and-the-need-of-the-user_design.docx', 'Waiting'),
(21, 'List of User Problems', 'Once you have the context of the product and the users, you need to create a list of the users problems. Based on the Personas you created, write in Post-It’s all the problems these users have', 'dangnam', '2022-02-02 00:00:00', 'upload/list-of-user-problems_design.docx', 'In progress'),
(22, 'Email Automation', 'Written an email series like (Immediately send this, 2 days later send this, 7 days later do this) and want this to go to the people you captured in that lead capture form', 'truonghung', '2022-02-01 00:00:00', 'upload/email-automation_technical.docx', 'Completed'),
(23, 'Setup a Payment Form', 'using Stripe, eWay or Paypal to accept payments, we can setup an order form somewhere in your sales funnel or on your website', 'truonghau', '2022-02-05 00:00:00', 'upload/setup-a-payment-form_technical.docx', 'Waiting'),
(24, 'Add Testimonials to Website', 'Got some testimonials on LinkedIn or that have come through on email, and want to show them off on your website, send them through and let us know where to put them.', 'tranphi', '2022-01-19 00:00:00', 'upload/add-testimonials-to-website_technical.docx', 'In progress'),
(25, 'Conversion Pixel Tracking Codes', 'If you\'re doing PPC advertising, chances are you have a Conversion Tracking pixel that we can place on the page ', 'tranthuan', '2022-01-15 00:00:00', 'upload/conversion-pixel-tracking-codes_technical.docx', 'New'),
(26, 'Import a CSV Into CRM', 'Have a CSV File and need help importing it into your Email Marketing Tool? Send it through, let us know how to save it, lists, tags, sequences, etc....', 'truonghung', '2022-01-22 00:00:00', 'upload/import-a-csv-into-crm_technical.docx', 'Rejected'),
(27, 'Defining and managing brand', 'This involves defining who you are, what you stand for, what you say about yourself, what you do and how your company acts.', 'xuantruong', '2022-01-15 00:00:00', 'upload/defining-and-managing-brand_marketing.docx', 'Canceled'),
(28, 'Producing marketing and promotional materials', 'Marketing department should create the materials that describe and promote your core products and/or services', 'minhhai', '2022-01-20 00:00:00', 'upload/producing-marketing-and-promotional-materials_marketing.docx', 'In progress'),
(29, 'Create long-term growth', 'Marketing must take a long-term view of its products and brands and how its profits should be grown. Based on its positioning, it must initiate new-product development, testing and launching.', 'luongquang', '2022-01-27 00:00:00', 'upload/create-long-term-growth_marketing.docx', 'New'),
(30, 'Social Media Scheduling', 'A super helpful way to save time scheduling your social media posts in advance is with a social media management app like Buffer.', 'luuvan', '2022-01-13 00:00:00', 'upload/social-media-scheduling_marketing.docx', 'Waiting'),
(31, 'Implementation and control', 'Marketing must organize its marketing resources and implement and control the marketing plans. It must build a marketing organization that is capable of implementing marketing plans and strategies.', 'minhhai', '2022-01-06 00:00:00', 'upload/implementation-and-control_marketing.docx', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
(1, 4, 'I submit this task. Please email me if my submit have any problem', 'upload/submit_advising-on-how-to-reduce-costs-and-increase.docx', '2022-01-03 23:31:32'),
(2, 5, 'This is my submit', 'upload/submit_ financial-forecasting-and-risk-analysis.docx', '2022-01-03 23:35:26'),
(3, 5, 'I checked. Check my submit again please', 'upload/submit_again_ financial-forecasting-and-risk-analysis.docx', '2022-01-03 23:37:41'),
(4, 5, 'I added. Really sorry for my mistake', 'upload/submit_again2_financial-forecasting-and-risk-analysis.docx', '2022-01-03 23:41:25'),
(5, 6, 'This is my first submit', 'upload/submit_conception.docx', '2022-01-03 23:50:22'),
(6, 9, 'Submit task procurement', 'upload/submit_procurement.docx', '2022-01-04 08:42:00'),
(7, 15, 'This is a submit of Taking Care of Customers', 'upload/submit_taking-care-of-customers.docx', '2022-01-04 08:45:09'),
(8, 15, 'I submit again my task sir!', 'upload/submit_again_taking-care-of-customers.docx', '2022-01-04 08:46:41'),
(9, 11, 'This is a submit of Keeping Track of Cash Flow', 'upload/submit_keeping-track-of-cash-flow.docx', '2022-01-04 08:49:44'),
(10, 20, 'This is a submit of Understand the context and the need of the user', 'upload/submit_understand-the-context-and-the-need-of-the-user.docx', '2022-01-04 08:55:10'),
(11, 19, 'This is a submit of Information on Personas', 'upload/submit_information-on-personas.docx', '2022-01-04 08:56:14'),
(12, 16, 'This is a submit of Competition Research', 'upload/submit_competition-research.docx', '2022-01-04 08:57:26'),
(13, 22, 'This is a submit of Email Automation', 'upload/submit_email-automation.docx', '2022-01-04 09:01:21'),
(14, 26, 'This is a submit of Import a CSV Into CRM', 'upload/submit_import-a-csv-into-crm.docx', '2022-01-04 09:02:10'),
(15, 23, 'Setup a Payment Form', 'upload/submit_setup-a-payment-form.docx', '2022-01-04 09:05:18'),
(16, 31, 'This is a submit of Implementation and control', 'upload/submit_implementation-and-control.docx', '2022-01-04 09:32:15'),
(17, 30, 'This is a submit of Social Media Scheduling', 'upload/implementation-and-control_marketing.docx', '2022-01-04 09:34:08'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submit_task`
--
ALTER TABLE `submit_task`
  ADD PRIMARY KEY (`id_submittask`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submit_task`
--
ALTER TABLE `submit_task`
  MODIFY `id_submittask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
(1, 5, 'OK', 'On time'),
(2, 9, 'Good', 'On time'),
(3, 15, 'OK', 'On time'),
(4, 19, 'Good', 'On time'),
(5, 22, 'Bad', 'On time'),
(6, 31, 'OK', 'On time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_complete`
--
ALTER TABLE `feedback_complete`
  ADD PRIMARY KEY (`id_feedback`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_complete`
--
ALTER TABLE `feedback_complete`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


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
(1, 5, 'MIssing some important information. Please check again', '', 0),
(2, 5, 'You missed financial forecasting report!!!!', 'upload/additional_file_financial-forecasting-and-risk-analysis_accountant.docx', 1),
(3, 6, 'Missing construction process.', '', 0),
(4, 15, 'I think you should show more detail', '', 0),
(5, 16, 'The research miss some important information. Please check again!', 'upload/additional_competition-research_design.docx', 1),
(6, 26, 'Got some error when execute. Fix it please!', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_reject`
--
ALTER TABLE `feedback_reject`
  ADD PRIMARY KEY (`id_feedback`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_reject`
--
ALTER TABLE `feedback_reject`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
