-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 08:37 AM
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
(2, 'khanhan', '$2y$10$dJeQJIIxVZemm.VL3b8BBu9Rd5VcQ71UYwa2flu3j/RqtaXZwjbd6', 'Khánh Gia', 'An', 'employee', 'Accountant', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'thaibao', '$2y$10$eqQhspheNdhmOtnu.AK13u0vg3H6F2jyoG03j3ucx6I.zi6NZg9LC', 'Thái Đình', 'Bảo', 'manager', 'Accountant', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'nguyendai', '$2y$10$mplQFyJt0q1ha8fTfr283eFEboadaJ7ZuXoELDIdPSwkDrJatsEga', 'Nguyễn Chánh', 'Đại', 'employee', 'Accountant', b'0', 'images/user.png', '2d6bae6b294c8fd69ba8b203d2517908'),
(5, 'nguyenhung', '$2y$10$GKx4fHOd44GlTSIblpKfV.yXhfWG2W75DtGXPmL5dMZ4PXq5FunUa', 'Nguyễn Hoa', 'Hưng', 'employee', 'Accountant', b'0', 'images/user.png', '17d3e6c4c1c223aedd1dfa7a7aa5f4a2'),
(6, 'trankieu', '$2y$10$N/PhU6CbJoPePMMa6kt.COF.qTVcwUAjtLooOf5nwvylHZRwew7cO', 'Trần Thị', 'Kiều', 'employee', 'Accountant', b'0', 'images/user.png', 'ee75902d94969a20bb31dfb5ab68e4fe'),
(7, 'tokhai', '$2y$10$U3hjUrYWAby.iNmTkg2NTuRfiCxX83N3hRRmDn2hGxprTI0JEMcS2', 'Tô Tấn ', 'Khải', 'employee', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'nguyennhan', '$2y$10$TADv0lKp9.5pZNaMFsRMAe8ZgFI9ryEr7fxgvFbJiirIt7Mxkxw1K', 'Nguyễn Thành ', 'Nhân', 'manager', 'IT', b'1', 'images/user.png', 'e10adc3949ba59abbe56e057f20f883e'),
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
(22, 'ngohieu', '$2y$10$JXm/pqcz05AOFugAaHUQIOS.R/JWl1i87CSr3q3/RKEsIaGe8Mtiq', 'Ngô Trung', 'Hiếu', 'employee', 'Techical ', b'0', 'images/user.png', '808f39c76e93d5361111143e1bddd68f'),
(23, 'truonghung', '$2y$10$gspKV2pUqv6cVQYDGUQpPOye4QNKe0obxbfDK9Lvo0o9PSP3ePbV6', 'Trương Tấn', 'Hùng', 'employee', 'Techical ', b'0', 'images/user.png', '72630e94b83d2aecf7216cc4a84fafa3'),
(24, 'truonghau', '$2y$10$9uRcK/M9IkfDSMGftHoeaO6z9V/vxR./bfGPH4hOI9MiSW7s9D7eu', 'Trương Minh', 'Hậu', 'employee', 'Techical ', b'0', 'images/user.png', 'a4ed3fc1e2892905aa6eed404a9c3883'),
(25, 'tranphi', '$2y$10$b8A7odaRBMeNRKiH352ssOleyolxETeT2WSBSCoIvVHO6d4V8JNJ.', 'Trần Minh', 'Phi', 'manager', 'Techical ', b'0', 'images/user.png', 'df27810856a6030be8bcb3aa5b17d4a1'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
