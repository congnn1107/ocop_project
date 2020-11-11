-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2020 at 09:24 PM
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
-- Table structure for table `tb_bo_tieu_chi`
--

CREATE TABLE `tb_bo_tieu_chi` (
  `nhom_sp` int NOT NULL,
  `phan` int NOT NULL,
  `nhom_tieu_chi` int NOT NULL,
  `tieu_chi` int DEFAULT NULL,
  `lua_chon` int NOT NULL,
  `diem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bo_tieu_chi`
--

INSERT INTO `tb_bo_tieu_chi` (`nhom_sp`, `phan`, `nhom_tieu_chi`, `tieu_chi`, `lua_chon`, `diem`) VALUES
(1, 1, 1, 1, 1, 0),
(1, 1, 1, 1, 2, 1),
(1, 1, 2, 2, 3, 0),
(1, 1, 2, 2, 4, 1),
(1, 2, 4, 5, 8, 1),
(1, 2, 4, 5, 9, 4),
(1, 3, 6, 7, 13, 0),
(1, 3, 6, 7, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lua_chon`
--

CREATE TABLE `tb_lua_chon` (
  `id` int NOT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_lua_chon`
--

INSERT INTO `tb_lua_chon` (`id`, `contents`, `notes`) VALUES
(1, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh dưới 50%', ''),
(2, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh từ 50% đến dưới 75%', ''),
(3, 'Phân loại', ''),
(4, 'Sơ chế', ''),
(5, 'Sơ chế (rửa, làm sạch)', ''),
(6, 'Phát triển sản phẩm của nhà sản xuất ủy thác, chỉ thay đổi nhãn hiệu', ''),
(7, 'Hộ gia đình có đăng ký kinh doanh, tổ hợp tác (có giấy đăng ký kinh doanh của tổ trưởng). Công ty Trách nhiệm hữu hạn (TNHH) 1 thành viên, doanh nghiệp tư nhân (DNTN)', ''),
(8, 'Thị trường trong huyện', ''),
(9, 'Thị trường quốc tế', ''),
(10, 'Không đồng đều', ''),
(11, 'Không đồng đều, chấp nhận được', ''),
(12, 'Đồng đều', ''),
(13, 'Không có', ''),
(14, 'Có 1-2 chỉ tiêu', ''),
(15, 'Độc đáo', ''),
(16, 'Tương đối độc đáo', '');

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
-- Table structure for table `tb_nhom_tieu_chi`
--

CREATE TABLE `tb_nhom_tieu_chi` (
  `id` int NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_nhom_tieu_chi`
--

INSERT INTO `tb_nhom_tieu_chi` (`id`, `content`, `notes`) VALUES
(1, 'Tổ chức sản xuất', ''),
(2, 'Phát triển sản phẩm', ''),
(3, 'Sức mạnh cộng đồng', ''),
(4, 'Tiếp thị', ''),
(5, 'Chỉ tiêu cảm quan', ''),
(6, 'Dinh dưỡng', 'Chỉ ra hàm lượng của các chỉ tiêu dinh dưỡng như: Protit, Lipid, Vitamin,... (theo phiếu kiểm nghiệm do cơ quan có thẩm quyền cấp)'),
(7, 'Tính độc đáo', 'Chất lượng: Có nét riêng, khác biệt, không lẫn với sản phẩm khác, tiềm năng thành thương hiệu của địa phương');

-- --------------------------------------------------------

--
-- Table structure for table `tb_phan`
--

CREATE TABLE `tb_phan` (
  `id` int NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_phan`
--

INSERT INTO `tb_phan` (`id`, `content`) VALUES
(1, 'A. Sản phẩm và sức mạnh cộng đồng'),
(2, 'B. Khả năng tiếp thị'),
(3, 'C. Chất lượng sản phẩm');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_tieu_chi`
--

CREATE TABLE `tb_tieu_chi` (
  `id` int NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_tieu_chi`
--

INSERT INTO `tb_tieu_chi` (`id`, `content`, `notes`) VALUES
(1, 'Nguồn nguyên liệu', NULL),
(2, 'Gia tăng giá trị', NULL),
(3, 'Nguồn gốc ý tưởng sản phẩm', NULL),
(4, 'Loại hình tổ chức sản xuất, kinh doanh', NULL),
(5, 'Khu vực phân phối chính', NULL),
(6, 'Kích thước, hình dạng bề ngoài', NULL),
(7, 'Dinh dưỡng', NULL),
(8, 'Tính độc đáo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_bo_tieu_chi`
--

CREATE TABLE `test_bo_tieu_chi` (
  `id` int NOT NULL,
  `id_phan` int NOT NULL,
  `phan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_nhom_tc` int NOT NULL,
  `nhom_tc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_tieu_chi` int NOT NULL,
  `tieu_chi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_lua_chon` int NOT NULL,
  `lua_chon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diem` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_bo_tieu_chi`
--

INSERT INTO `test_bo_tieu_chi` (`id`, `id_phan`, `phan`, `id_nhom_tc`, `nhom_tc`, `id_tieu_chi`, `tieu_chi`, `id_lua_chon`, `lua_chon`, `diem`, `time`) VALUES
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 1, 'Nguồn nguyên liệu', 1, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh dưới 50%', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 1, 'Nguồn nguyên liệu', 2, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh từ 50% đến dưới 75%', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 1, 'Nguồn nguyên liệu', 3, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh từ 75% đến 100%', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 2, 'Gia tăng giá trị', 1, 'Phân loại', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 2, 'Gia tăng giá trị', 2, 'Sơ chế (rửa, làm sạch)', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 2, 'Gia tăng giá trị', 3, 'Ứng dụng công nghệ cao trong trồng, sơ chế', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 2, 'Gia tăng giá trị', 4, 'Ứng dụng công nghệ cao trong trồng, sơ chế, bảo quản (nâng cao chất lượng sản phẩm/ giữ chất lượng ổn định trong quá trình bảo quản…)', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 3, 'Năng lực sản xuất đáp ứng yêu cầu phân phối ', 1, ' Có năng lực, quy mô sản xuất mức độ nhỏ ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 3, 'Năng lực sản xuất đáp ứng yêu cầu phân phối ', 2, ' Có năng lực, quy mô sản xuất trung bình ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 3, 'Năng lực sản xuất đáp ứng yêu cầu phân phối ', 3, ' Có năng lực, quy mô sản xuất lớn ', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 3, 'Năng lực sản xuất đáp ứng yêu cầu phân phối ', 4, ' Có năng lực, quy mô sản xuất lớn, có thể đáp ứng thị trường xuất khẩu ', 4, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 4, 'Liên kết sản xuất ', 1, ' Không có liên kết hoặc có nhưng không rõ ràng ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 4, 'Liên kết sản xuất ', 2, ' Có liên kết, chặt chẽ (phạm vi trong tỉnh)  ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 4, 'Liên kết sản xuất ', 3, ' Liên kết chuỗi chặt chẽ (phạm vi trong tỉnh), quy mô lớn hoặc có hộ nghèo (trong tỉnh) tham gia liên kết. ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 5, 'Bảo vệ môi trường trong quá trình sản xuất', 1, ' Có quan tâm (bằng hoạt động cụ thể) đến các tác động môi trường trong quá trình sản xuất ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 5, 'Bảo vệ môi trường trong quá trình sản xuất', 2, ' Có đánh giá tác động môi trường/kế hoạch bảo vệ môi trường (hoặc tương đương) nhưng chưa theo quy định hiện hành ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 5, 'Bảo vệ môi trường trong quá trình sản xuất', 3, ' Có đánh giá tác động môi trường/kế hoạch bảo vệ môi trường (hoặc tương đương) theo quy định hiện hành ', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 5, 'Bảo vệ môi trường trong quá trình sản xuất', 4, ' Có đánh giá tác động môi trường/kế hoạch bảo vệ môi trường (hoặc tương đương) theo quy định hiện hành; có minh chứng triển khai/áp dụng ', 4, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 5, 'Bảo vệ môi trường trong quá trình sản xuất', 5, ' Có đánh giá tác động môi trường/kế hoạch bảo vệ môi trường (hoặc tương đương) theo quy định hiện hành; có minh chứng triển khai/áp dụng; có sử dụng/tái chế phụ phẩm, chất thải trong quá trình sản xuất ', 5, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 6, 'Sử dụng năng lượng, công nghệ thân thiện bền vững trong SX ', 1, ' Không sử dụng năng lượng hiện đại, bền vững, đáng tin cậy (sạch, tái tạo,...)/công nghệ thân thiện môi trường ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 1, 'TỔ CHỨC SẢN XUẤT', 6, 'Sử dụng năng lượng, công nghệ thân thiện bền vững trong SX ', 2, ' Có sử dụng năng lượng hiện đại, bền vững, đáng tin cậy (sạch, tái tạo,...)/công nghệ thân thiện môi trường ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 1, 'Nguồn gốc ý tưởng sản phẩm ', 1, ' Phát triển dựa trên sản phẩm của nhà sản xuất khác, chỉ thay đổi nhãn hiệu ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 1, 'Nguồn gốc ý tưởng sản phẩm ', 2, ' Phát triển dựa trên sản phẩm của nhà sản xuất khác, có cải tiến về chất lượng, bao bì. ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 1, 'Nguồn gốc ý tưởng sản phẩm ', 3, ' Phát triển dựa trên ý tưởng của mình, sản phẩm chưa có trên thị trường ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 1, 'Nguồn gốc ý tưởng sản phẩm ', 4, ' Phát triển ý tưởng của mình gắn với bảo tồn sản phẩm truyền thông/đặc sản/thế mạnh của địa phương ', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 2, 'Tính hoàn thiện của bao bì ', 1, ' Bao bì đơn giản, thông tin ghi nhãn chưa đầy đủ ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 2, 'Tính hoàn thiện của bao bì ', 2, ' Bao bì đơn giản, thông tin ghi nhãn đầy đủ ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 2, 'Tính hoàn thiện của bao bì ', 3, ' Bao bì phù hợp, thông tin ghi nhãn đầy đủ, có truy xuất nguồn gốc ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 2, 'Tính hoàn thiện của bao bì ', 4, ' Bao bì phù hợp, thông tin ghi nhãn đầy đủ, có truy xuất nguồn gốc, có chứng nhận bảo hộ nhãn hiệu/kiểu dáng công nghiệp ', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 3, 'Phong cách, hình thức của bao bì ', 1, ' Không thuận tiện, không đẹp ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 3, 'Phong cách, hình thức của bao bì ', 2, ' Thuận tiện hoặc đẹp ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 2, 'PHÁT TRIỂN SẢN PHẨM ', 3, 'Phong cách, hình thức của bao bì ', 3, ' Thuận tiện, đẹp, sang trọng ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 1, 'Loại hình tổ chức sản xuất - kinh doanh ', 1, ' Hộ gia đình có đăng ký kinh doanh, tổ hợp tác (có giấy đăng ký kinh doanh của tổ trưởng), Công ty Trách nhiệm hữu hạn (TNHH) 1 thành viên, doanh nghiệp tư nhân (DNTN) ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 1, 'Loại hình tổ chức sản xuất - kinh doanh ', 2, ' Công ty TNHH hai thành viên trở lên, công ty cổ phần có vốn góp của cộng đồng địa phương <51% ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 1, 'Loại hình tổ chức sản xuất - kinh doanh ', 3, ' HTX tổ chức, hoạt động theo Luật HTX 2012 hoặc công ty cổ phần có vốn góp của cộng đồng địa phương ≥ 51% ', 3, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 2, 'Sự tham gia của cộng đồng trong quản lý, điều hành ', 1, ' Có < 50% số thành viên quản trị cao cấp (Ban giám đốc, Hội đồng quản trị - HĐQT, Hội đồng thành viên - HĐTV) tham gia quản lý là người trong tỉnh hoặc tổ hợp tác có số thành viên là người trong tỉnh < 50% số thành viên tổ hợp tác ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 2, 'Sự tham gia của cộng đồng trong quản lý, điều hành ', 2, ' Có ≥ 50% số thành viên quản trị cao cấp (Ban giám đốc, HĐQT, HĐTV) tham gia quản lý là người trong tỉnh hoặc < 50% số thành viên quản trị cao cao cấp là người trong tỉnh nhưng có thành viên là phụ nữ địa phương ', 2, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 2, 'Sự tham gia của cộng đồng trong quản lý, điều hành ', 3, ' Giám đốc/Chủ hộ không phải là người trong tỉnh ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 2, 'Sự tham gia của cộng đồng trong quản lý, điều hành ', 4, ' Giám đốc/Chủ hộ là người trong tỉnh ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 3, 'Sử dụng lao động địa phương ', 1, ' Có sử dụng < 50% lao động là người địa phương ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 3, 'Sử dụng lao động địa phương ', 2, ' Có sử dụng ≥ 50% lao động là người địa phương hoặc có thu nhập bình quân/lao động ≥ mức thu nhập bình quân/người đạt chuẩn nông thôn mới của địa phương tại thời điểm đánh giá. ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 4, 'Tăng trưởng sản xuất kinh doanh ', 1, ' Tăng trưởng < 10% về doanh thu so với năm trước liền kề ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 4, 'Tăng trưởng sản xuất kinh doanh ', 2, ' Tăng trưởng ≥ 10% về doanh thu so với năm trước liền kề ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 5, 'Kế toán ', 1, ' Không có kế toán hoặc chỉ thuê kế toán khi có yêu cầu, thời vụ ', 0, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 5, 'Kế toán ', 2, ' Có kế toán, công tác kế toán được thực hiện thường xuyên ', 1, '2020-11-07 05:03:18'),
(1, 1, 'Phần A: SẢN PHẨM VÀ SỨC MẠNH CỦA CỘNG ĐỒNG (35 Điểm)', 3, 'SỨC MẠNH CỘNG ĐỒNG', 5, 'Kế toán ', 3, ' Có Tổ chức hệ thống kế toán ', 2, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 1, 'Khu vực phân phối chính ', 1, ' Thị trường trong huyện ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 1, 'Khu vực phân phối chính ', 2, ' Thị trường ngoài huyện, có dưới 5 đại diện/đại lý phân phối ', 2, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 1, 'Khu vực phân phối chính ', 3, ' Thị trường ngoài huyện, có ≥ 5 đại diện/đại lý phân phối ', 3, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 1, 'Khu vực phân phối chính ', 4, ' Thị trường quốc tế ', 5, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 2, 'Tổ chức phân phối ', 1, ' Không có người chịu trách nhiệm quản lý phân phối  ', 0, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 2, 'Tổ chức phân phối ', 2, ' Có người chịu trách nhiệm quản lý phân phối  ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 2, 'Tổ chức phân phối ', 3, ' Có bộ phận/phòng quản lý phân phối  ', 3, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 2, 'Tổ chức phân phối ', 4, ' Có bộ phận/phòng quản lý phân phối, có ứng dụng công nghệ thông tin trong quản lý ', 5, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 3, 'Quảng bá sản phẩm', 1, ' Không có hoạt động quảng bá ', 0, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 3, 'Quảng bá sản phẩm', 2, ' Có một số hoạt động quảng bá ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 3, 'Quảng bá sản phẩm', 3, ' Có nhiều hoạt động quảng bá, có website của cơ sở, có tham gia hoạt động xúc tiến thương mại trong tỉnh ', 2, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 3, 'Quảng bá sản phẩm', 4, ' Có nhiều hoạt động quảng bá, có website của cơ sở, có tham gia hoạt động xúc tiến thương mại ngoài tỉnh ', 3, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 1, 'TIẾP THỊ', 3, 'Quảng bá sản phẩm', 5, ' Có nhiều hoạt động quảng bá, có website của cơ sở, có tham gia hoạt động xúc tiến thương mại ngoài tỉnh và quốc tế ', 5, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 1, ' Không có câu chuyện, hoặc có nhưng không được tư liệu hóa ', 0, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 2, ' Có tài liệu giới thiệu về sản phẩm ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 3, ' Có câu chuyện được tư liệu hóa (có cốt chuyện, nội dung cụ thể) ', 2, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 4, ' Có câu chuyện được tư liệu hóa, trình bày trên nhãn/tờ rơi ', 3, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 5, ' Có câu chuyện được tư liệu hóa, trình bày trên nhãn/tờ rơi và website ', 4, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 1, 'Câu chuyện về sản phẩm ', 6, ' Có câu chuyện được tư liệu hóa, trình bày trên nhãn/tờ rơi, website (dưới dạng hình ảnh, clip,...) ', 5, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 2, 'Trí tuệ/bản sắc địa phương ', 1, ' Giống với câu chuyện sản phẩm ở nơi khác ', 0, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 2, 'Trí tuệ/bản sắc địa phương ', 2, ' Tương đối giống câu chuyện sản phẩm ở nơi khác, có thay đổi một số yếu tố ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 2, 'Trí tuệ/bản sắc địa phương ', 3, ' Có câu chuyện riêng ', 2, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 2, 'Trí tuệ/bản sắc địa phương ', 4, ' Có câu chuyện riêng, thể hiện trí tuệ/bản sắc địa phương ', 3, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 3, 'Cấu trúc câu chuyện ', 1, ' Đơn giản ', 1, '2020-11-07 05:03:18'),
(1, 2, 'Phần B: KHẢ NĂNG TIẾP THỊ (25 Điểm)', 2, 'CÂU CHUYỆN VỀ SẢN PHẨM', 3, 'Cấu trúc câu chuyện ', 2, ' Có đầy đủ các yếu tố của câu chuyện sản phẩm ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 1, 'Kích thước, hình dạng bề ngoài', 1, ' Không đồng đều ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 1, 'Kích thước, hình dạng bề ngoài', 2, ' Không đồng đều, chấp nhận được ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 1, 'Kích thước, hình dạng bề ngoài', 3, ' Đồng đều ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 2, 'Màu sắc, độ chín ', 1, ' Không phù hợp ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 2, 'Màu sắc, độ chín ', 2, ' Chấp nhận được ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 2, 'Màu sắc, độ chín ', 3, ' Tương đối phù hợp ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 2, 'Màu sắc, độ chín ', 4, ' Phù hợp ', 5, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 2, 'Màu sắc, độ chín ', 5, ' Rất phù hợp ', 8, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 3, 'Mùi/vị', 1, ' Kém ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 3, 'Mùi/vị', 2, ' Trung bình ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 3, 'Mùi/vị', 3, ' Tương đối tốt ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 3, 'Mùi/vị', 4, ' Tốt ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 4, 'Tính đầy đủ, sạch', 1, ' Tương đối chấp nhận được ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 4, 'Tính đầy đủ, sạch', 2, ' Chấp nhận được ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 4, 'Tính đầy đủ, sạch', 3, ' Tốt ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 4, 'Tính đầy đủ, sạch', 4, ' Rất tốt ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 5, 'Kết cấu/cách sắp đặt ', 1, ' Nghèo nàn ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 5, 'Kết cấu/cách sắp đặt ', 2, ' Trung bình ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 1, 'CHỈ TIÊU CẢM QUAN', 5, 'Kết cấu/cách sắp đặt ', 3, ' Tốt ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 2, 'DINH DƯỠNG ', 1, 'DINH DƯỠNG ', 1, ' Không có ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 2, 'DINH DƯỠNG ', 1, 'DINH DƯỠNG ', 2, ' Có 1 -2 chỉ tiêu ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 2, 'DINH DƯỠNG ', 1, 'DINH DƯỠNG ', 3, ' Có trên 2 chỉ tiêu ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 3, 'TÍNH ĐỘC ĐÁO ', 1, 'TÍNH ĐỘC ĐÁO', 1, ' Trung bình ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 3, 'TÍNH ĐỘC ĐÁO ', 1, 'TÍNH ĐỘC ĐÁO', 2, ' Tương đối độc đáo ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 3, 'TÍNH ĐỘC ĐÁO ', 1, 'TÍNH ĐỘC ĐÁO', 3, ' Độc đáo ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 3, 'TÍNH ĐỘC ĐÁO ', 1, 'TÍNH ĐỘC ĐÁO', 4, ' Rất độc đáo ', 5, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 1, 'Hồ sơ công bố tiêu chuẩn sản phẩm của cơ sở sản xuất ', 1, ' Không có Bản công bố tiêu chuẩn sản phẩm/chất lượng ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 1, 'Hồ sơ công bố tiêu chuẩn sản phẩm của cơ sở sản xuất ', 2, ' Có Tiêu chuẩn sản phẩm ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 1, 'Hồ sơ công bố tiêu chuẩn sản phẩm của cơ sở sản xuất ', 3, ' Có Tiêu chuẩn sản phẩm, có Bản công bố tiêu chuẩn/chất lượng ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 2, 'Kiểm tra định kỳ các chỉ tiêu ATTP ', 1, ' Không có ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 2, 'Kiểm tra định kỳ các chỉ tiêu ATTP ', 2, ' Có, nhưng không đạt ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 2, 'Kiểm tra định kỳ các chỉ tiêu ATTP ', 3, ' Có, đạt nhưng không đủ ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 4, 'CÔNG BỐ CHẤT LƯỢNG SẢN PHẨM', 2, 'Kiểm tra định kỳ các chỉ tiêu ATTP ', 4, ' Có, đạt đầy đủ (vi sinh, kim loại nặng, dư lượng thuốc BVTV, phụ gia, hóa chất không mong muốn,...) theo quy định. ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, ' Không có hoạt động kiểm soát chất lượng sản phẩm ', 0, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 2, ' Có kế hoạch kiểm soát chất lượng sản phẩm ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 3, ' Có ghi hồ sơ lô sản xuất ', 2, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 4, ' Có kế hoạch kiểm soát chất lượng sản phẩm, có ghi hồ sơ lô sản xuất ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 5, ' Có Chứng nhận quản lý chất lượng tiên tiến (VietGAP/GlobalGAP/hữu cơ/..) ', 4, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 5, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 1, 'ĐẢM BẢO CHẤT LƯỢNG SẢN PHẨM', 6, ' Có chứng nhận đủ điều kiện ATTP cho xuất khẩu và các thủ tục pháp lý khác theo yêu cầu của thị trường đích ', 5, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 6, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 1, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 1, ' Có thể xuất khẩu đến thị trường khu vực ', 1, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 6, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 1, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 2, ' Có thể xuất khẩu các thị trường ngoài khu vực ', 3, '2020-11-07 05:03:18'),
(1, 3, 'Phần C: CHẤT LƯỢNG SẢN PHẨM (40 Điểm)', 6, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 1, 'CƠ HỘI THỊ TRƯỜNG TOÀN CẦU', 3, ' Có thể xuất khẩu đến các thị trường có tiêu chuẩn cao (Mỹ, Nhật, EU...) ', 5, '2020-11-07 05:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `test_ds_tieu_chi`
--

CREATE TABLE `test_ds_tieu_chi` (
  `id` int NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `parent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_ds_tieu_chi`
--

INSERT INTO `test_ds_tieu_chi` (`id`, `content`, `parent`) VALUES
(1, 'Sản phẩm và sức mạnh của cộng đồng', 0),
(2, 'Tổ chức sản xuất', 1),
(3, 'Nguồn nguyên liệu', 2),
(4, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh dưới 50%', 3),
(5, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh từ 50% đến dưới 75%', 3),
(6, 'Sử dụng nguyên liệu có nguồn gốc trong tỉnh từ 75% đến 100%', 3),
(7, 'Gia tăng giá trị', 2),
(8, 'Phân loại, sơ chê', 7),
(9, 'Chế biến đơn giản', 7),
(10, 'Chế biến', 7),
(11, 'Chế biến sâu', 7),
(12, 'Tiêu chí B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_nhom_sp_bo_tc`
--

CREATE TABLE `test_nhom_sp_bo_tc` (
  `nhomsp` int NOT NULL,
  `bo_tc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_nhom_sp_bo_tc`
--

INSERT INTO `test_nhom_sp_bo_tc` (`nhomsp`, `bo_tc`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pcd`
-- (See below for the actual view)
--
CREATE TABLE `v_pcd` (
`Phan` text
,`NhomTc` text
,`TieuChi` text
,`LuaChon` text
,`Diem` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_phieu_cham_diem`
-- (See below for the actual view)
--
CREATE TABLE `v_phieu_cham_diem` (
`BoSanPham` varchar(255)
,`Phan` text
,`NhomTieuChi` text
,`TieuChi` text
,`LuaChon` text
,`Diem` int
);

-- --------------------------------------------------------

--
-- Structure for view `v_pcd`
--
DROP TABLE IF EXISTS `v_pcd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nncpro`@`localhost` SQL SECURITY DEFINER VIEW `v_pcd`  AS  select `test_bo_tieu_chi`.`phan` AS `Phan`,`test_bo_tieu_chi`.`nhom_tc` AS `NhomTc`,`test_bo_tieu_chi`.`tieu_chi` AS `TieuChi`,`test_bo_tieu_chi`.`lua_chon` AS `LuaChon`,`test_bo_tieu_chi`.`diem` AS `Diem` from ((`test_bo_tieu_chi` join `test_nhom_sp_bo_tc` on((`test_bo_tieu_chi`.`id` = `test_nhom_sp_bo_tc`.`bo_tc`))) join `tb_phan_nhom_sp` on((`test_nhom_sp_bo_tc`.`nhomsp` = `tb_phan_nhom_sp`.`id_phan_nhom`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_phieu_cham_diem`
--
DROP TABLE IF EXISTS `v_phieu_cham_diem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nncpro`@`localhost` SQL SECURITY DEFINER VIEW `v_phieu_cham_diem`  AS  select `tb_phan_nhom_sp`.`ten_phan_nhom` AS `BoSanPham`,`tb_phan`.`content` AS `Phan`,`tb_nhom_tieu_chi`.`content` AS `NhomTieuChi`,`tb_tieu_chi`.`content` AS `TieuChi`,`tb_lua_chon`.`contents` AS `LuaChon`,`tb_bo_tieu_chi`.`diem` AS `Diem` from (((((`tb_phan_nhom_sp` join `tb_phan`) join `tb_nhom_tieu_chi`) join `tb_tieu_chi`) join `tb_lua_chon`) join `tb_bo_tieu_chi`) where ((`tb_phan_nhom_sp`.`id_phan_nhom` = `tb_bo_tieu_chi`.`nhom_sp`) and (`tb_bo_tieu_chi`.`phan` = `tb_phan`.`id`) and (`tb_bo_tieu_chi`.`nhom_tieu_chi` = `tb_nhom_tieu_chi`.`id`) and (`tb_bo_tieu_chi`.`tieu_chi` = `tb_tieu_chi`.`id`) and (`tb_bo_tieu_chi`.`lua_chon` = `tb_lua_chon`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bo_ql`
--
ALTER TABLE `tb_bo_ql`
  ADD PRIMARY KEY (`id_bo`);

--
-- Indexes for table `tb_bo_tieu_chi`
--
ALTER TABLE `tb_bo_tieu_chi`
  ADD UNIQUE KEY `id` (`nhom_sp`,`phan`,`nhom_tieu_chi`,`tieu_chi`,`lua_chon`),
  ADD KEY `fk_bo_tc-phan` (`phan`),
  ADD KEY `fk_bo_tc-nhom_tieu_chi` (`nhom_tieu_chi`),
  ADD KEY `fk_bo_tc-tieu_chi` (`tieu_chi`),
  ADD KEY `fk_bo_tc-lua_chon` (`lua_chon`);

--
-- Indexes for table `tb_lua_chon`
--
ALTER TABLE `tb_lua_chon`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_nhom_tieu_chi`
--
ALTER TABLE `tb_nhom_tieu_chi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_phan`
--
ALTER TABLE `tb_phan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_phan_nhom_sp`
--
ALTER TABLE `tb_phan_nhom_sp`
  ADD PRIMARY KEY (`id_phan_nhom`),
  ADD KEY `fk_phan_nhom-bo_ql` (`bo_ql`),
  ADD KEY `fk_phan_nhom-nhom` (`nhom`);

--
-- Indexes for table `tb_tieu_chi`
--
ALTER TABLE `tb_tieu_chi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_bo_tieu_chi`
--
ALTER TABLE `test_bo_tieu_chi`
  ADD UNIQUE KEY `id` (`id`,`id_phan`,`id_nhom_tc`,`id_tieu_chi`,`id_lua_chon`);

--
-- Indexes for table `test_ds_tieu_chi`
--
ALTER TABLE `test_ds_tieu_chi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_nhom_sp_bo_tc`
--
ALTER TABLE `test_nhom_sp_bo_tc`
  ADD PRIMARY KEY (`nhomsp`),
  ADD KEY `fk_to_bo_tc` (`bo_tc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bo_ql`
--
ALTER TABLE `tb_bo_ql`
  MODIFY `id_bo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lua_chon`
--
ALTER TABLE `tb_lua_chon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `tb_nhom_tieu_chi`
--
ALTER TABLE `tb_nhom_tieu_chi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_phan`
--
ALTER TABLE `tb_phan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_phan_nhom_sp`
--
ALTER TABLE `tb_phan_nhom_sp`
  MODIFY `id_phan_nhom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_tieu_chi`
--
ALTER TABLE `tb_tieu_chi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_ds_tieu_chi`
--
ALTER TABLE `test_ds_tieu_chi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bo_tieu_chi`
--
ALTER TABLE `tb_bo_tieu_chi`
  ADD CONSTRAINT `fk_bo_tc-lua_chon` FOREIGN KEY (`lua_chon`) REFERENCES `tb_lua_chon` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bo_tc-nhom_tieu_chi` FOREIGN KEY (`nhom_tieu_chi`) REFERENCES `tb_nhom_tieu_chi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bo_tc-phan` FOREIGN KEY (`phan`) REFERENCES `tb_phan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bo_tc-phan_nhom_sp` FOREIGN KEY (`nhom_sp`) REFERENCES `tb_phan_nhom_sp` (`id_phan_nhom`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bo_tc-tieu_chi` FOREIGN KEY (`tieu_chi`) REFERENCES `tb_tieu_chi` (`id`) ON UPDATE CASCADE;

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

--
-- Constraints for table `test_nhom_sp_bo_tc`
--
ALTER TABLE `test_nhom_sp_bo_tc`
  ADD CONSTRAINT `fk_to_bo_tc` FOREIGN KEY (`bo_tc`) REFERENCES `test_bo_tieu_chi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_to_phan_nhom_sp` FOREIGN KEY (`nhomsp`) REFERENCES `tb_phan_nhom_sp` (`id_phan_nhom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
