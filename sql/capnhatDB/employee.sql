-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 08:19 AM
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
USE `company`;
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
(1, 'admin', '$2y$10$9y5Hm5zmD7YNoEbsHJtNvOghQYd.wPyagwZoPSMr.wI1.VTdZg7Ri', 'Admin', '', 'admin', 'Company', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'khanhan', '$2y$10$86ugPtITWaAwLCAWos6CF.ymJfPrkUZs3g04ALF2bE6mlvfacamlO', 'Khánh Gia', 'An', 'manager', 'Accountant', b'0', 'images/user.png', 'cd970800ad5efd5f8881346e21714204'),
(3, 'thaibao', '$2y$10$ochHXDtjTyyg8G0gA7aSQ.dUsrur3Rbofq6AK.a2ZeOWOCdXrCoSa', 'Thái Đình', 'Bảo', 'employee', 'Accountant', b'0', 'images/user.png', 'dff9b72438988c9502d98a3a94a6e462'),
(4, 'nguyendai', '$2y$10$mplQFyJt0q1ha8fTfr283eFEboadaJ7ZuXoELDIdPSwkDrJatsEga', 'Nguyễn Chánh', 'Đại', 'employee', 'Accountant', b'0', 'images/user.png', '2d6bae6b294c8fd69ba8b203d2517908'),
(5, 'nguyenhung', '$2y$10$GKx4fHOd44GlTSIblpKfV.yXhfWG2W75DtGXPmL5dMZ4PXq5FunUa', 'Nguyễn Hoa', 'Hưng', 'employee', 'Accountant', b'0', 'images/user.png', '17d3e6c4c1c223aedd1dfa7a7aa5f4a2'),
(6, 'trankieu', '$2y$10$N/PhU6CbJoPePMMa6kt.COF.qTVcwUAjtLooOf5nwvylHZRwew7cO', 'Trần Thị', 'Kiều', 'employee', 'Accountant', b'0', 'images/user.png', 'ee75902d94969a20bb31dfb5ab68e4fe'),
(7, 'tokhai', '$2y$10$LwNjva.2NJE0/1WHJJnNIO8RoLRyZl2KXo7rnyeiHW4fg42qAjy/q', 'Tô Tấn ', 'Khải', 'manager', 'IT', b'0', 'images/user.png', 'dbc24eb4db443334be9adb3ab2d5c811'),
(8, 'nguyennhan', '$2y$10$9wkf5dHYyDP9cPJmzIxLE.458SuCSc8vCH0rRCpAbCZmN4M/Gt04O', 'Nguyễn Thành ', 'Nhân', 'employee', 'IT', b'0', 'images/user.png', '833c894c6dade6c35593b075728e9d07'),
(9, 'tranphuc', '$2y$10$0T0osWXxoz1eNqIrfTBr5OhnIv9r54lTn9/Onc4yPv7H748Y8/TV.', 'Trần Hoàng ', 'Phúc', 'employee', 'IT', b'0', 'images/user.png', 'df3d08281fb045245c445ca0fef197a4'),
(10, 'nguyenson', '$2y$10$T1d7SSkDDAD6VnOORmwH4eRlU4PXSbbFWRO939P3/YjC25i1eLatq', 'Nguyễn', 'Sơn', 'employee', 'IT', b'0', 'images/user.png', '82f05a2fb7fef172ca36ed4c2f4e5338'),
(11, 'nguyenthinh', '$2y$10$0J2MaulkBv3zJUV5eNt/yeCcGv2dXjnq4ZS.Y77Ze6kKvExc/LEka', 'Nguyễn Trần', 'Thịnh', 'employee', 'IT', b'0', 'images/user.png', 'c96768a0566d717ea236020372eb6c2c'),
(12, 'phamnghia', '$2y$10$JSwpxGO3Kd7w0v6Ju/YOV./C1UJwqYYp3MkmPnj1NCbFxeVLkMHhO', 'Phạm Hùng ', 'Nghĩa', 'manager', 'Business', b'0', 'images/user.png', 'fda2c4b5546c2298967157f60c5522f1'),
(13, 'phamthu', '$2y$10$Fc4TFRv1GWvfAPrjz.CgwuegK4SwaWeiMajnaCAoz6HRI.Ao9Rb76', 'Phạm Anh ', 'Thư', 'employee', 'Business', b'0', 'images/user.png', '1adca1513e26b1a2897481476f8d213c'),
(14, 'phandat', '$2y$10$VwHOAR4TAbdBL85HnvaqV.Li8bkR6DwYHGVZranlQd1kVo8f9OiSe', 'Phan Thành ', 'Đạt', 'employee', 'Business', b'0', 'images/user.png', 'b0ad197bddf2706fadb549205a5b6875'),
(15, 'ngocduy', '$2y$10$8vZJ7Sj0DQ6yJMHHBP7Kn.OnrcpfFdYRn8F/PhfXXC1F6aoXWIJdK', 'Ngọc Linh', 'Duy', 'employee', 'Business', b'0', 'images/user.png', '6d5c377638188a055c54ab7ac5da3d85'),
(16, 'thaiha', '$2y$10$h8cKPlyNLqr7JMLHArYaJOGSihuDv/K42meHVuoxkMPmZXhvvV1A.', 'Thái Khánh ', 'Hà', 'employee', 'Business', b'0', 'images/user.png', 'ed97f7feb25c0cd8a0d05ea4a53de6e3'),
(17, 'lelong', '$2y$10$eXqqFubBhQOW5E4CC5GPUe5tLVMRapgZHPedslILiVC2h/rL5y0bu', 'Lê Tiểu ', 'Long', 'manager', 'Design', b'0', 'images/user.png', 'f798ad15d82d26b9dfefd9aaab5fc92a'),
(18, 'dangnam', '$2y$10$.tRT6DelWbR1Ugnuj.RZI.N0.84gWWJTuP4bhC5ig3etAVxvhiAmO', 'Đặng Hoàng', 'Nam', 'employee', 'Design', b'0', 'images/user.png', '6ba6f33a6c1112128dbfec91adbeb7ec'),
(19, 'lehuy', '$2y$10$pe6XL.FT9sDINO7UcFh4gujToXGxCRwd3s48nao6E6LZlHQeUFOOW', 'Lê Hoàng', 'Huy', 'employee', 'Design', b'0', 'images/user.png', 'ffdeabbb7730fd78a72c32976390079c'),
(20, 'hophat', '$2y$10$sDKJuLNxFD4hJz3yj0c65.GGeX5AVQkum9acfW9RvLZJaBItN13Ri', 'Hồ Văn ', 'Phát', 'employee', 'Design', b'0', 'images/user.png', '9834c46cc1792624deb7abb46416fa5e'),
(21, 'matrung', '$2y$10$aBloPv3SsT9Oym8u/QnXWebQXnOaZxmBxEQi.zzI492D48k3wAwFG', 'Mã Văn', 'Trung', 'employee', 'Design', b'0', 'images/user.png', '5e665ed22f3a40e29004d02384f95eb0'),
(22, 'ngohieu', '$2y$10$JXm/pqcz05AOFugAaHUQIOS.R/JWl1i87CSr3q3/RKEsIaGe8Mtiq', 'Ngô Trung', 'Hiếu', 'manager', 'Techical ', b'0', 'images/user.png', '808f39c76e93d5361111143e1bddd68f'),
(23, 'truonghung', '$2y$10$gspKV2pUqv6cVQYDGUQpPOye4QNKe0obxbfDK9Lvo0o9PSP3ePbV6', 'Trương Tấn', 'Hùng', 'employee', 'Techical ', b'0', 'images/user.png', '72630e94b83d2aecf7216cc4a84fafa3'),
(24, 'truonghau', '$2y$10$9uRcK/M9IkfDSMGftHoeaO6z9V/vxR./bfGPH4hOI9MiSW7s9D7eu', 'Trương Minh', 'Hậu', 'employee', 'Techical ', b'0', 'images/user.png', 'a4ed3fc1e2892905aa6eed404a9c3883'),
(25, 'tranphi', '$2y$10$b8A7odaRBMeNRKiH352ssOleyolxETeT2WSBSCoIvVHO6d4V8JNJ.', 'Trần Minh', 'Phi', 'employee', 'Techical ', b'0', 'images/user.png', 'df27810856a6030be8bcb3aa5b17d4a1'),
(26, 'tranthuan', '$2y$10$FRr2ZqLIJf3VdIIAM.oW6ec/RyQzt4QtgbKnznu5nFB.QI8M5EgGi', 'Trần Công', 'Thuận', 'employee', 'Techical ', b'0', 'images/user.png', 'd09d9772701a57b4a2a39ef280f7504d'),
(27, 'dotai', '$2y$10$vdlYhqMKgWtnyCmZ7c66CuppyUX2EC47xAhQzlN5yGEUfZDP017SW', 'Đỗ Xuân', 'Tài', 'manager', 'Marketing', b'0', 'images/user.png', '94fa84e9033595ca135b08aec158394f'),
(28, 'phamtuan', '$2y$10$VywMO7uOS3YjJuJXiheDquRi/o2ELCqrPi7TU75VZwGkIGxEeVpN6', 'Phạm Thanh', 'Tuấn', 'employee', 'Marketing', b'0', 'images/user.png', 'f401f964f471377fe9bb7a03bc335a88'),
(29, 'levy', '$2y$10$LOiPfNY0e13FCaQliQR.ROFyMOqmeN.1nYs51xhgC1ppyNUdqG3xi', 'Lê Triệu', 'Vỹ', 'employee', 'Marketing', b'0', 'images/user.png', '6639c3233dfa712e4e2aa1bd48315bcc'),
(30, 'luongquang', '$2y$10$u0yRM1YCqrV6QI7FLdRyp.xOS2A4U2dRUJmO2cAJ.dPcybofNQ9Nm', 'Lương Minh ', 'Quang', 'employee', 'Marketing', b'0', 'images/user.png', '4121f341b4af0f27104ed85d1b955aba'),
(31, 'luuvan', '$2y$10$vmG7u.NBnnCo9QO4Fn9HC.xNjiuXL.J8JuNtaSUulnpZbE8eDNXUO', 'Lưu Kiến', 'Văn', 'employee', 'Marketing', b'0', 'images/user.png', '7b53fed5cbbbdb504f1372ffb731d695');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
