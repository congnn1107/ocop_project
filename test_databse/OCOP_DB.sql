-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2020 at 07:14 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OCOP_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bo_ql`
--

CREATE TABLE `tb_bo_ql` (
  `id_bo` int NOT NULL,
  `ten_bo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bo_ql`
--

INSERT INTO `tb_bo_ql` (`id_bo`, `ten_bo`) VALUES
(1, 'Nông nghiệp và Phát triển nông thôn'),
(2, 'Công thương'),
(3, 'Y tế'),
(4, 'Khoa học và Công nghệ'),
(5, 'Vãn hóa, Thể thao và Du lịch');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nganh_sp`
--

CREATE TABLE `tb_nganh_sp` (
  `id_nganh` int NOT NULL,
  `ten_nganh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_nganh_sp`
--

INSERT INTO `tb_nganh_sp` (`id_nganh`, `ten_nganh`) VALUES
(6, 'Dịch vụ du lịch nông thôn và bán hàng'),
(2, 'Đồ uống'),
(3, 'Thảo dược'),
(4, 'Thủ công mỹ nghệ, trang trí'),
(1, 'Thực phẩm'),
(5, 'Vải, may mặc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nhom_sp`
--

CREATE TABLE `tb_nhom_sp` (
  `id_nhom_sp` int NOT NULL,
  `ten_nhom_sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nganh_sp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_nhom_sp`
--

INSERT INTO `tb_nhom_sp` (`id_nhom_sp`, `ten_nhom_sp`, `nganh_sp`) VALUES
(1, 'Thực phẩm tươi sống', 1),
(2, 'Thực phẩm thô, sơ chế', 1),
(3, 'Thực phẩm chế biến', 1),
(4, 'Gia vị', 1),
(5, 'Chè', 1),
(6, 'Cà phê, ca cao', 1),
(7, 'Đồ uống có cồn', 2),
(8, 'Đồ uống không cồn', 2),
(9, 'Thực phẩm chức năng, thuốc từ dược liệu, thuốc Y học cổ truyền', 3),
(10, 'Mỹ phẩm', 3),
(11, 'Trang thiết bị, dụng cụ y tế', 3),
(12, 'Thảo dược khác', 3),
(13, 'Thủ công mỹ nghệ, trang trí', 4),
(14, 'Thủ công mỹ nghệ gia dụng', 4),
(15, 'Vải, may mặc', 5),
(16, 'Dịch vụ du lịch - truyền thống - lễ hội', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_phan_nhom_sp`
--

CREATE TABLE `tb_phan_nhom_sp` (
  `id_phan_nhom` int NOT NULL,
  `ten_phan_nhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhom` int NOT NULL,
  `bo_ql` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_phan_nhom_sp`
--

INSERT INTO `tb_phan_nhom_sp` (`id_phan_nhom`, `ten_phan_nhom`, `nhom`, `bo_ql`) VALUES
(1, 'Rau, củ, quả, hạt tươi', 1, 1),
(2, 'Thịt, trứng, sữa tươi', 1, 1),
(3, 'Gạo, ngũ cốc', 2, 1),
(4, 'Mật ong, các sản phẩm từ mật ong, mật khác', 2, 1),
(5, 'Đồ ăn nhanh', 3, 2),
(6, 'Chế biến từ gạo, ngũ cốc', 3, 1),
(7, 'Chế biến từ rau, củ, quả, hạt', 3, 1),
(8, 'Chế biến từ thịt, trứng, sữa', 3, 1),
(9, 'Chế biến từ thủy, hải sản', 3, 1),
(10, 'Tương, nước mắm, gia vị lỏng khác', 4, 1),
(11, 'Gia vị khác', 4, 1),
(12, 'Chè tươi, chế biến', 5, 1),
(13, 'Các sản phẩm khác từ chè, trà', 5, 1),
(14, 'Cà phê, ca cao', 6, 1),
(15, 'Rượu trắng', 7, 2),
(16, 'Đồ uống có cồn khác', 7, 2),
(17, 'Nước khoáng thiên nhiên, nước uống tinh khiết', 8, 3),
(18, 'Đồ uống không cồn', 8, 2),
(19, 'Thực phẩm chức năng, thuốc từ dược liệu, thuốc Y học cổ truyền', 9, 3),
(20, 'Mỹ phẩm', 10, 3),
(21, 'Trang thiết bị, dụng cụ y tế', 11, 3),
(22, 'Thảo dược khác', 12, 3),
(23, 'Thủ công mỹ nghệ, trang trí', 13, 4),
(24, 'Thủ công mỹ nghệ gia dụng', 14, 4),
(25, 'Vải, may mặc', 15, 2),
(26, 'Dịch vụ du lịch - truyền thống - lễ hội', 16, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bo_ql`
--
ALTER TABLE `tb_bo_ql`
  ADD PRIMARY KEY (`id_bo`);

--
-- Indexes for table `tb_nganh_sp`
--
ALTER TABLE `tb_nganh_sp`
  ADD PRIMARY KEY (`id_nganh`),
  ADD UNIQUE KEY `ten_nganh` (`ten_nganh`);

--
-- Indexes for table `tb_nhom_sp`
--
ALTER TABLE `tb_nhom_sp`
  ADD PRIMARY KEY (`id_nhom_sp`),
  ADD KEY `fk_nhom-nganh` (`nganh_sp`);

--
-- Indexes for table `tb_phan_nhom_sp`
--
ALTER TABLE `tb_phan_nhom_sp`
  ADD PRIMARY KEY (`id_phan_nhom`),
  ADD KEY `fk_phan_nhom-bo_ql` (`bo_ql`),
  ADD KEY `fk_phan_nhom-nhom` (`nhom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bo_ql`
--
ALTER TABLE `tb_bo_ql`
  MODIFY `id_bo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_nganh_sp`
--
ALTER TABLE `tb_nganh_sp`
  MODIFY `id_nganh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_nhom_sp`
--
ALTER TABLE `tb_nhom_sp`
  MODIFY `id_nhom_sp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_phan_nhom_sp`
--
ALTER TABLE `tb_phan_nhom_sp`
  MODIFY `id_phan_nhom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_nhom_sp`
--
ALTER TABLE `tb_nhom_sp`
  ADD CONSTRAINT `fk_nhom-nganh` FOREIGN KEY (`nganh_sp`) REFERENCES `tb_nganh_sp` (`id_nganh`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_phan_nhom_sp`
--
ALTER TABLE `tb_phan_nhom_sp`
  ADD CONSTRAINT `fk_phan_nhom-bo_ql` FOREIGN KEY (`bo_ql`) REFERENCES `tb_bo_ql` (`id_bo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_phan_nhom-nhom` FOREIGN KEY (`nhom`) REFERENCES `tb_nhom_sp` (`id_nhom_sp`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
