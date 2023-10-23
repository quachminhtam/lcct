-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2023 at 10:36 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21439292_db_lcct`
--

-- --------------------------------------------------------

--
-- Table structure for table `cum_dvkd`
--

CREATE TABLE `cum_dvkd` (
  `ma_cum` int(10) NOT NULL,
  `ten_cum` varchar(30) NOT NULL,
  `ma_mien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cum_dvkd`
--

INSERT INTO `cum_dvkd` (`ma_cum`, `ten_cum`, `ma_mien`) VALUES
(101, 'Hà Nội', 1),
(102, 'Hải Phòng', 1),
(103, 'Hà Giang', 1),
(104, 'Hà Nam', 1),
(105, 'Hà Tĩnh', 1),
(106, 'Thái Bình', 1),
(107, 'Ninh Bình', 1),
(108, 'Nam Định', 1),
(109, 'Phú Thọ', 1),
(110, 'Hưng Yên', 1),
(201, 'Khánh Hòa', 2),
(202, 'Quảng Nam', 2),
(301, 'Hồ Chí Minh', 3),
(302, 'Đồng Nai', 3),
(303, 'Bà Rịa', 3),
(304, 'Cà Mau', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dieu_phoi`
--

CREATE TABLE `dieu_phoi` (
  `stt` int(10) NOT NULL,
  `ma_hs` int(10) NOT NULL,
  `ma_ns` varchar(10) NOT NULL,
  `cv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dieu_phoi`
--

INSERT INTO `dieu_phoi` (`stt`, `ma_hs`, `ma_ns`, `cv`) VALUES
(1, 230101001, 'duytm', 'thamdinh'),
(3, 230101001, 'quangvt', 'pheduyet'),
(4, 230201001, 'ngannk', 'thamdinh'),
(5, 230201001, 'quangvt', 'pheduyet'),
(9, 230201002, 'duytm', 'thamdinh'),
(13, 230201007, 'duytm', 'thamdinh'),
(14, 230201007, 'quangvt', 'pheduyet'),
(15, 230201008, 'hangtt', 'thamdinh'),
(16, 230201003, 'ngannk', 'thamdinh'),
(17, 230201009, 'duytm', 'thamdinh'),
(18, 230201002, 'quangvt', 'pheduyet'),
(20, 230201010, 'duytm', 'thamdinh'),
(21, 230201010, 'duytm', 'thamdinh'),
(22, 230201010, 'duytm', 'thamdinh'),
(23, 230201010, 'quangvt', 'pheduyet'),
(24, 230201011, 'ngannk', 'thamdinh'),
(25, 230201011, 'hanbb', 'pheduyet');

-- --------------------------------------------------------

--
-- Table structure for table `dp_cv`
--

CREATE TABLE `dp_cv` (
  `cv` varchar(30) NOT NULL,
  `ten_cv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dp_cv`
--

INSERT INTO `dp_cv` (`cv`, `ten_cv`) VALUES
('pheduyet', 'Phê duyệt'),
('thamdinh', 'Thẩm định');

-- --------------------------------------------------------

--
-- Table structure for table `dvkd`
--

CREATE TABLE `dvkd` (
  `ma_dvkd` int(10) NOT NULL,
  `ten_dvkd` varchar(30) NOT NULL,
  `ma_cum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dvkd`
--

INSERT INTO `dvkd` (`ma_dvkd`, `ten_dvkd`, `ma_cum`) VALUES
(10101, 'Đống Đa', 101),
(10102, 'Long Biên', 101),
(10201, 'Hải Phòng', 102),
(10202, 'Ngô Quyền', 102),
(20101, 'Cam Ranh', 201),
(20102, 'Nha Trang', 201),
(20201, 'Quảng Nam', 202),
(20202, 'Hội An', 202),
(30101, 'Bến Thành', 301),
(30102, 'Bến Nghé', 301),
(30103, 'Tân Bình', 301),
(30201, 'Hố Nai', 302),
(30202, 'Long Thành', 302);

-- --------------------------------------------------------

--
-- Table structure for table `hs_td`
--

CREATE TABLE `hs_td` (
  `ma_hs` int(10) NOT NULL,
  `ma_kh` varchar(10) NOT NULL,
  `ma_sp` varchar(10) NOT NULL,
  `ma_tien` varchar(10) NOT NULL,
  `so_tien` bigint(30) NOT NULL,
  `tsdb` text DEFAULT NULL,
  `gt_tsdb` bigint(30) DEFAULT NULL,
  `muc_dich` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hs_td`
--

INSERT INTO `hs_td` (`ma_hs`, `ma_kh`, `ma_sp`, `ma_tien`, `so_tien`, `tsdb`, `gt_tsdb`, `muc_dich`) VALUES
(230101001, 'SME0101', 'SP03', 'USD', 100000, NULL, NULL, 'Thay đổi điều kiện cấp tín dụng/ Đánh giá lại KH mà không cần cập nhật tình hình tài chính'),
(230201001, 'CN0201', 'SP02', 'VND', 500000000, NULL, NULL, 'Cấp tín dụng tiêu dùng mua ô tô không phải kinh doanh'),
(230201002, 'CN0201', 'SP02', 'THB', 1000000000, 'Sổ tiết kiệm/Tiền gửi', 5000000000, 'Cấp tín dụng tiêu dùng mua ô tô không phải kinh doanh'),
(230201003, 'SME0102', 'SP03', 'VND', 300000000, NULL, NULL, 'Thay đổi điều kiện cấp tín dụng/ Đánh giá lại KH mà không cần cập nhật tình hình tài chính'),
(230201005, 'SME0301', 'SP02', 'VND', 1000000000, 'Sổ tiết kiệm/Tiền gửi', 70000000, 'Cấp tín dụng tiêu dùng, mua nhà'),
(230201006, 'CN0201', 'SP02', 'VND', 999999999, 'Ô tô', 700000000, 'Cấp tín dụng tiêu dùng, mua nhà'),
(230201007, 'SME0301', 'SP01', 'VND', 100000000, 'Sổ tiết kiệm', 70000000, 'Cầm cố sổ tiết kiệm'),
(230201008, 'LE0301', 'SP01', 'EUR', 1000, 'Hợp đồng tiền gửi', 700, 'Cầm cố sổ tiết kiệm, hợp đồng tiền gửi'),
(230201009, 'SME0101', 'SP03', 'EUR', 50000, NULL, NULL, 'Thay đổi điều kiện cấp tín dụng/ Đánh giá lại KH mà không cần cập nhật tình hình tài chính'),
(230201010, 'LE0301', 'SP02', 'EUR', 30000, 'Nhà', 1000000000, 'Cấp tín dụng tiêu dùng, mua ô tô'),
(230201011, 'CN0301', 'SP03', 'VND', 800000000, 'Sổ tiết kiệm', 500000000, 'Điều chỉnh điều kiện cấp tín dụng');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(10) NOT NULL,
  `ten_kh` varchar(100) NOT NULL,
  `ma_loai_kh` varchar(10) NOT NULL,
  `ma_dvkd` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `ma_loai_kh`, `ma_dvkd`) VALUES
('CN0101', 'Nguyễn Tuấn Đạt', 'CN', 10101),
('CN0102', 'Lê Hoàng Trung Tín', 'CN', 10101),
('CN0201', 'Lê Thị Hằng', 'CN', 20101),
('CN0301', 'Nguyễn Thị Nghĩa', 'CN', 30103),
('LE0301', 'CT CỔ PHẦN XÂY DỰNG THỦY LỢI 1', 'LE', 30101),
('SME0101', 'CT TNHH SX&TM Sao Sáng', 'SME', 10101),
('SME0102', 'CT TNHH ĐẦU TƯ XD&TM SIÊU VIỆT', 'SME', 30101),
('SME0301', 'CT CỔ PHẦN GRANITE & MARBLE TPS', 'SME', 30101);

-- --------------------------------------------------------

--
-- Table structure for table `loai_kh`
--

CREATE TABLE `loai_kh` (
  `ma_loai_kh` varchar(10) NOT NULL,
  `ten_loai_kh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_kh`
--

INSERT INTO `loai_kh` (`ma_loai_kh`, `ten_loai_kh`) VALUES
('CN', 'Khách hàng cá nhân, hộ gia đình'),
('LE', 'Doanh nghiệp lớn'),
('SME', 'Doanh nghiệp vừa và nhỏ');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `ma_sp` varchar(10) NOT NULL,
  `ten_sp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`ma_sp`, `ten_sp`) VALUES
('SP01', 'Cầm cố sổ tiết kiệm, hợp đồng tiền gửi'),
('SP02', 'Cấp tín dụng tiêu dùng, mua ô tô'),
('SP03', 'Điều chỉnh điều kiện cấp tín dụng');

-- --------------------------------------------------------

--
-- Table structure for table `loai_tien`
--

CREATE TABLE `loai_tien` (
  `ma_tien` varchar(10) NOT NULL,
  `ten_tien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_tien`
--

INSERT INTO `loai_tien` (`ma_tien`, `ten_tien`) VALUES
('EUR', 'Euro'),
('GPB', 'Bảng Anh'),
('THB', 'Baht Thái'),
('USD', 'Dollar Mỹ'),
('VND', 'Đồng Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `ls_gd`
--

CREATE TABLE `ls_gd` (
  `ma_lsgd` int(10) NOT NULL,
  `ma_hs` int(10) NOT NULL,
  `ma_tt` varchar(30) NOT NULL,
  `ma_ns` varchar(10) NOT NULL,
  `thoi_gian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_gd`
--

INSERT INTO `ls_gd` (`ma_lsgd`, `ma_hs`, `ma_tt`, `ma_ns`, `thoi_gian`) VALUES
(1, 230201005, 'soan', 'thunm', '2023-10-03 21:51:15'),
(2, 230201006, 'soan', 'admin', '2023-10-03 21:53:02'),
(6, 230201005, 'xoa', 'thunm', '2023-10-03 22:09:47'),
(8, 230201001, 'soan', 'giangbh', '2023-10-03 17:15:41'),
(9, 230101001, 'soan', 'thunm', '2023-10-03 22:17:41'),
(12, 230101001, 'dieuthamdinh', 'thunm', '2023-10-03 22:22:01'),
(13, 230101001, 'thamdinh', 'taidm', '2023-10-03 22:42:06'),
(14, 230201002, 'soan', 'giangbh', '2023-10-03 22:54:25'),
(15, 230201003, 'soan', 'thunm', '2023-10-03 22:55:26'),
(16, 230201001, 'dieuthamdinh', 'giangbh', '2023-10-04 09:09:27'),
(17, 230101001, 'dieupheduyet', 'duytm', '2023-10-04 09:56:32'),
(18, 230101001, 'thamdinh', 'taidm', '2023-10-04 09:59:13'),
(19, 230101001, 'huy', 'quangvt', '2023-10-04 10:01:41'),
(20, 230201001, 'thamdinh', 'taidm', '2023-10-04 10:25:04'),
(21, 230201001, 'dieupheduyet', 'ngannk', '2023-10-04 10:27:47'),
(22, 230201001, 'thamdinh', 'taidm', '2023-10-04 10:44:33'),
(23, 230201001, 'duyet', 'quangvt', '2023-10-04 10:44:47'),
(24, 230201007, 'soan', 'thunm', '2023-10-10 09:30:05'),
(25, 230201007, 'dieuthamdinh', 'thunm', '2023-10-10 09:30:06'),
(28, 230201002, 'dieuthamdinh', 'giangbh', '2023-10-10 09:48:28'),
(29, 230201002, 'thamdinh', 'taidm', '2023-10-10 10:09:27'),
(35, 230201007, 'thamdinh', 'taidm', '2023-10-10 11:04:54'),
(36, 230201007, 'dieupheduyet', 'duytm', '2023-10-10 11:10:41'),
(37, 230201007, 'pheduyet', 'taidm', '2023-10-10 11:18:26'),
(39, 230201003, 'sua', 'thunm', '2023-10-10 16:05:24'),
(41, 230201003, 'dieuthamdinh', 'thunm', '2023-10-10 16:11:55'),
(42, 230201008, 'soan', 'thunm', '2023-10-12 20:46:01'),
(43, 230201008, 'dieuthamdinh', 'thunm', '2023-10-12 20:46:02'),
(44, 230201008, 'thamdinh', 'taidm', '2023-10-12 20:46:27'),
(45, 230201003, 'thamdinh', 'taidm', '2023-10-12 20:46:31'),
(47, 230201003, 'tra', 'ngannk', '2023-10-12 21:17:16'),
(48, 230201002, 'dieupheduyet', 'duytm', '2023-10-13 13:08:25'),
(49, 230201009, 'soan', 'thunm', '2023-10-13 14:24:48'),
(50, 230201009, 'dieuthamdinh', 'thunm', '2023-10-13 14:24:49'),
(51, 230201009, 'thamdinh', 'taidm', '2023-10-13 14:25:25'),
(52, 230201009, 'dieupheduyet', 'duytm', '2023-10-13 14:25:51'),
(53, 230201002, 'pheduyet', 'taidm', '2023-10-13 14:26:11'),
(54, 230201010, 'soan', 'thunm', '2023-10-21 00:24:50'),
(55, 230201010, 'dieuthamdinh', 'thunm', '2023-10-21 00:24:51'),
(58, 230201010, 'thamdinh', 'taidm', '2023-10-21 01:22:01'),
(59, 230201010, 'dieupheduyet', 'duytm', '2023-10-21 01:24:16'),
(60, 230201010, 'pheduyet', 'taidm', '2023-10-21 01:28:45'),
(61, 230201011, 'soan', 'giangnk', '2023-10-23 01:53:04'),
(62, 230201011, 'sua', 'giangnk', '2023-10-23 01:54:15'),
(63, 230201011, 'sua', 'giangnk', '2023-10-23 01:54:28'),
(64, 230201011, 'dieuthamdinh', 'giangnk', '2023-10-23 01:54:34'),
(65, 230201011, 'thamdinh', 'taidm', '2023-10-23 01:55:08'),
(66, 230201011, 'dieupheduyet', 'ngannk', '2023-10-23 01:55:28'),
(67, 230201011, 'pheduyet', 'taidm', '2023-10-23 01:55:54'),
(71, 230201011, 'duyet', 'hanbb', '2023-10-23 02:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `mien`
--

CREATE TABLE `mien` (
  `ma_mien` int(10) NOT NULL,
  `ten_mien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mien`
--

INSERT INTO `mien` (`ma_mien`, `ten_mien`) VALUES
(1, 'Miền Bắc'),
(2, 'Miền Trung'),
(3, 'Miền Nam');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_su`
--

CREATE TABLE `nhan_su` (
  `ma_ns` varchar(10) NOT NULL,
  `ten_ns` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `ma_dvkd` int(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhan_su`
--

INSERT INTO `nhan_su` (`ma_ns`, `ten_ns`, `role`, `ma_dvkd`, `password`) VALUES
('admin', 'Admin', 'admin', 30102, '123'),
('duytm', 'Trần Minh Duy', 'cvtd', 30102, '123'),
('giangbh', 'Bùi Hà Giang', 'dvkd', 10102, '123'),
('giangnk', 'Nguyễn Kiều Giang', 'dvkd', 30103, '123'),
('hanbb', 'Bồ Bảo Hân', 'cpd', 20101, '123'),
('hangtt', 'Thân Thúy Hằng', 'cvtd', 20201, '123'),
('ngannk', 'Nguyễn Kim Ngân', 'cvtd', 10101, '123'),
('quangvt', 'Vũ Thái Quang', 'cpd', 30101, '123'),
('taidm', 'Dương Minh Tài', 'cvdp', 10102, '123'),
('thanhvk', 'Võ Kim Thanh', 'cvtd', 30201, '123'),
('thunm', 'Nguyễn Minh Thư', 'dvkd', 10101, '123');

-- --------------------------------------------------------

--
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `role` varchar(30) NOT NULL,
  `ten_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`role`, `ten_role`) VALUES
('admin', 'Admin'),
('cpd', 'Cấp phê duyệt'),
('cvdp', 'Chuyên viên điều phối'),
('cvtd', 'Chuyên viên Thẩm định tín dụng'),
('dvkd', 'Đơn vị kinh doanh');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

CREATE TABLE `trang_thai` (
  `ma_tt` varchar(30) NOT NULL,
  `ten_tt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai`
--

INSERT INTO `trang_thai` (`ma_tt`, `ten_tt`) VALUES
('dieupheduyet', 'Trình Cấp phê duyệt xử lý'),
('dieuthamdinh', 'Trình Chuyên viên điều phối xử lý'),
('duyet', 'Hồ sơ được duyệt'),
('huy', 'Hồ sơ không được duyệt'),
('pheduyet', 'Phân công và chờ Cấp phê duyệt xử lý'),
('soan', 'Đang soạn thảo'),
('sua', 'Chỉnh sửa hồ sơ'),
('thamdinh', 'Phân công và chờ Chuyên viên thẩm định xử lý'),
('tra', 'Trả hồ sơ'),
('xoa', 'Hồ sơ xóa');

-- --------------------------------------------------------

--
-- Table structure for table `yeu_cau`
--

CREATE TABLE `yeu_cau` (
  `ma_yc` int(10) NOT NULL,
  `ma_ns` varchar(10) NOT NULL,
  `yeu_cau` text NOT NULL,
  `noi_dung` text DEFAULT NULL,
  `phan_hoi` text DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yeu_cau`
--

INSERT INTO `yeu_cau` (`ma_yc`, `ma_ns`, `yeu_cau`, `noi_dung`, `phan_hoi`, `trang_thai`) VALUES
(1, 'thunm', 'CẤP LẠI MẬT KHẨU', 'Nguyễn Minh Thư - ĐVKD - 10101', '', 1),
(2, 'thunm', 'Chuyển ĐVKD', 'Chuyển ĐVKD từ Long Biên (10102) -> Đống Đa (10101)', '', 0),
(4, 'thunm', 'Trả hồ sơ 230101001', 'Bổ sung abc', NULL, 2),
(10, 'giangnk', 'Hồ sơ 230201011', 'Hồ sơ đã được duyệt', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cum_dvkd`
--
ALTER TABLE `cum_dvkd`
  ADD PRIMARY KEY (`ma_cum`),
  ADD KEY `ma_mien` (`ma_mien`);

--
-- Indexes for table `dieu_phoi`
--
ALTER TABLE `dieu_phoi`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `ma_hs` (`ma_hs`),
  ADD KEY `ma_ns` (`ma_ns`),
  ADD KEY `cv` (`cv`);

--
-- Indexes for table `dp_cv`
--
ALTER TABLE `dp_cv`
  ADD PRIMARY KEY (`cv`);

--
-- Indexes for table `dvkd`
--
ALTER TABLE `dvkd`
  ADD PRIMARY KEY (`ma_dvkd`),
  ADD KEY `ma_cum` (`ma_cum`);

--
-- Indexes for table `hs_td`
--
ALTER TABLE `hs_td`
  ADD PRIMARY KEY (`ma_hs`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_tien` (`ma_tien`),
  ADD KEY `ma_sp_2` (`ma_sp`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`),
  ADD KEY `ma_loai_kh` (`ma_loai_kh`),
  ADD KEY `ma_dvkd` (`ma_dvkd`);

--
-- Indexes for table `loai_kh`
--
ALTER TABLE `loai_kh`
  ADD PRIMARY KEY (`ma_loai_kh`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Indexes for table `loai_tien`
--
ALTER TABLE `loai_tien`
  ADD PRIMARY KEY (`ma_tien`);

--
-- Indexes for table `ls_gd`
--
ALTER TABLE `ls_gd`
  ADD PRIMARY KEY (`ma_lsgd`),
  ADD KEY `ma_hs` (`ma_hs`),
  ADD KEY `ma_tt` (`ma_tt`),
  ADD KEY `ma_ns` (`ma_ns`);

--
-- Indexes for table `mien`
--
ALTER TABLE `mien`
  ADD PRIMARY KEY (`ma_mien`);

--
-- Indexes for table `nhan_su`
--
ALTER TABLE `nhan_su`
  ADD PRIMARY KEY (`ma_ns`),
  ADD KEY `ma_dvkd` (`ma_dvkd`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`ma_tt`);

--
-- Indexes for table `yeu_cau`
--
ALTER TABLE `yeu_cau`
  ADD PRIMARY KEY (`ma_yc`),
  ADD KEY `ma_ns` (`ma_ns`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dieu_phoi`
--
ALTER TABLE `dieu_phoi`
  MODIFY `stt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hs_td`
--
ALTER TABLE `hs_td`
  MODIFY `ma_hs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230201012;

--
-- AUTO_INCREMENT for table `ls_gd`
--
ALTER TABLE `ls_gd`
  MODIFY `ma_lsgd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `yeu_cau`
--
ALTER TABLE `yeu_cau`
  MODIFY `ma_yc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cum_dvkd`
--
ALTER TABLE `cum_dvkd`
  ADD CONSTRAINT `cum_dvkd_ibfk_1` FOREIGN KEY (`ma_mien`) REFERENCES `mien` (`ma_mien`) ON UPDATE NO ACTION;

--
-- Constraints for table `dieu_phoi`
--
ALTER TABLE `dieu_phoi`
  ADD CONSTRAINT `dieu_phoi_ibfk_1` FOREIGN KEY (`cv`) REFERENCES `dp_cv` (`cv`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `dieu_phoi_ibfk_2` FOREIGN KEY (`ma_hs`) REFERENCES `hs_td` (`ma_hs`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `dieu_phoi_ibfk_3` FOREIGN KEY (`ma_ns`) REFERENCES `nhan_su` (`ma_ns`) ON UPDATE NO ACTION;

--
-- Constraints for table `dvkd`
--
ALTER TABLE `dvkd`
  ADD CONSTRAINT `dvkd_ibfk_1` FOREIGN KEY (`ma_cum`) REFERENCES `cum_dvkd` (`ma_cum`) ON UPDATE NO ACTION;

--
-- Constraints for table `hs_td`
--
ALTER TABLE `hs_td`
  ADD CONSTRAINT `hs_td_ibfk_1` FOREIGN KEY (`ma_tien`) REFERENCES `loai_tien` (`ma_tien`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `hs_td_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `loai_sp` (`ma_sp`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `hs_td_ibfk_3` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON UPDATE NO ACTION;

--
-- Constraints for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`ma_loai_kh`) REFERENCES `loai_kh` (`ma_loai_kh`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `khach_hang_ibfk_2` FOREIGN KEY (`ma_dvkd`) REFERENCES `dvkd` (`ma_dvkd`) ON UPDATE NO ACTION;

--
-- Constraints for table `ls_gd`
--
ALTER TABLE `ls_gd`
  ADD CONSTRAINT `ls_gd_ibfk_1` FOREIGN KEY (`ma_hs`) REFERENCES `hs_td` (`ma_hs`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `ls_gd_ibfk_2` FOREIGN KEY (`ma_ns`) REFERENCES `nhan_su` (`ma_ns`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `ls_gd_ibfk_3` FOREIGN KEY (`ma_tt`) REFERENCES `trang_thai` (`ma_tt`) ON UPDATE NO ACTION;

--
-- Constraints for table `nhan_su`
--
ALTER TABLE `nhan_su`
  ADD CONSTRAINT `nhan_su_ibfk_1` FOREIGN KEY (`role`) REFERENCES `phan_quyen` (`role`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhan_su_ibfk_2` FOREIGN KEY (`ma_dvkd`) REFERENCES `dvkd` (`ma_dvkd`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
