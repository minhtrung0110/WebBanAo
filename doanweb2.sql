-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 05:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiamgia`
--

CREATE TABLE `chitietgiamgia` (
  `MA_CTGG` int(10) UNSIGNED DEFAULT NULL,
  `MA_SP` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MA_CTHD` int(10) UNSIGNED NOT NULL,
  `MA_SP` int(10) UNSIGNED DEFAULT NULL,
  `SO_LUONG` int(11) DEFAULT NULL,
  `TIEN_GIAM_GIA` float DEFAULT NULL,
  `DON_GIA` float DEFAULT NULL,
  `THANH_TIEN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MA_CTPN` int(10) UNSIGNED NOT NULL,
  `MA_SP` int(10) UNSIGNED DEFAULT NULL,
  `DON_GIA` float NOT NULL,
  `SO_LUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuongtrinhgiamgia`
--

CREATE TABLE `chuongtrinhgiamgia` (
  `MA_CTGG` int(10) UNSIGNED NOT NULL,
  `TEN_CHUONG_TRINH` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LOAI_CHUONG_TRINH` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ND_GIAM_GIA` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PHAN_TRAM_GIAM_GIA` float NOT NULL,
  `NGAY_BAT_DAU` datetime NOT NULL,
  `NGAY_KET_THUC` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MA_DANH_MUC` int(10) UNSIGNED NOT NULL,
  `TEN_DANH_MUC` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MA_DANH_MUC`, `TEN_DANH_MUC`) VALUES
(1, 'Quản Lý Nhân Viên');

-- --------------------------------------------------------

--
-- Table structure for table `groupquyen`
--

CREATE TABLE `groupquyen` (
  `MA_GROUP_QUYEN` int(10) UNSIGNED NOT NULL,
  `TEN_GROUP_QUYEN` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `groupquyen`
--

INSERT INTO `groupquyen` (`MA_GROUP_QUYEN`, `TEN_GROUP_QUYEN`) VALUES
(1, 'admin'),
(2, 'nhanvien'),
(3, 'khachhang');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MA_HD` int(10) UNSIGNED NOT NULL,
  `MA_CTHD` int(10) UNSIGNED DEFAULT NULL,
  `MA_NV` int(10) UNSIGNED DEFAULT NULL,
  `MA_KH` int(10) UNSIGNED DEFAULT NULL,
  `MA_MGG` int(10) UNSIGNED DEFAULT NULL,
  `DIA_CHI` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TINH_TRANG` tinyint(1) DEFAULT NULL,
  `TIEN_GIAM_GIA` float DEFAULT NULL,
  `TONG_TIEN` float DEFAULT NULL,
  `NGAY_LAP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MA_KH` int(10) UNSIGNED NOT NULL,
  `MA_TK` int(10) UNSIGNED DEFAULT NULL,
  `TEN_KH` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `PHONE` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GIOI_TINH` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DIA_CHI` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MA_NV` int(10) UNSIGNED NOT NULL,
  `MA_TK` int(10) UNSIGNED DEFAULT NULL,
  `TEN_NV` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `PHONE` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GIOI_TINH` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MA_PN` int(10) UNSIGNED NOT NULL,
  `MA_CTPN` int(10) UNSIGNED DEFAULT NULL,
  `MA_TK` int(10) UNSIGNED DEFAULT NULL,
  `NGAY_NHAP` datetime NOT NULL,
  `TONG_DON_GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `MA_GROUP_QUYEN` int(10) UNSIGNED DEFAULT NULL,
  `MA_DANH_MUC` int(10) UNSIGNED DEFAULT NULL,
  `TEN_QUYEN` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`MA_GROUP_QUYEN`, `MA_DANH_MUC`, `TEN_QUYEN`) VALUES
(1, 1, 'Quản Lý Nhân Viên');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MA_SP` int(10) UNSIGNED NOT NULL,
  `TEN_SP` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SO_LUONG` int(11) DEFAULT NULL,
  `DON_GIA` float DEFAULT NULL,
  `LOAI_SP` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `KICH_THUOC` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MO_TA` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `HINH_ANH_URL` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MA_SP`, `TEN_SP`, `SO_LUONG`, `DON_GIA`, `LOAI_SP`, `KICH_THUOC`, `MO_TA`, `HINH_ANH_URL`) VALUES
(1, 'Tie Dye Hollogram ', 500, 650000, 'Tee', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/tye-die-hollogram-S.jpg'),
(2, 'Tie Dy Hollogram ', 200, 650000, 'Tee', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/tye-die-hollogram.jpg'),
(3, 'Tie Dye Hollogram ', 300, 650000, 'Tee', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/tye-die-hollogram.jpg'),
(4, 'Tie Dye Hollogram ', 100, 650000, 'Tee', 'XL', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/tye-die-hollogram.jpg'),
(5, 'Bummble Gummm ', 300, 450000, 'Tee', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/bummble-bummm.jpg'),
(6, 'Bummble Gummm ', 200, 450000, 'Tee', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/bummble-bummm.jpg'),
(7, 'Bummble Gummm ', 100, 450000, 'Tee', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/bummble-bummm.jpg'),
(8, 'Summmer Cun ', 300, 750000, 'Hoodie', 'S', 'chất “chill” phóng khoáng và lãng đãng nằm trong BST lần này – một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/summer.jpg'),
(9, 'Summmer Cun ', 200, 650000, 'Hoodie', 'M', 'chất “chill” phóng khoáng và lãng đãng nằm trong BST lần này – một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/summer.jpg'),
(10, 'Summmer Cun ', 100, 550000, 'Hoodie', 'L', 'chất “chill” phóng khoáng và lãng đãng nằm trong BST lần này – một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/summer.jpg'),
(11, 'BOOLAB SKIN', 300, 400000, 'Sweater', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/boolab-skin.jpg'),
(12, 'BOOLAB SKIN ', 200, 400000, 'Sweater', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/boolab-skin.jpg'),
(13, 'BOOLAB SKIN', 100, 400000, 'Sweater', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/boolab-skin.jpg'),
(14, 'Dragon VietNam ', 300, 550000, 'Jacket', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/dragon-vietnam.jpg'),
(15, 'Dragon VietNam ', 200, 550000, 'Jacket', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/dragon-vietnam.jpg'),
(16, 'Dragon VietNam ', 100, 550000, 'Jacket', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/dragon-vietnam.jpg'),
(17, 'Brave Monster ', 300, 650000, 'Hoodie', 'S', 'một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/brave-monster.jpg'),
(18, 'Brave Monster ', 200, 650000, 'Hoodie', 'M', 'một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/brave-monster.jpg'),
(19, 'Brave Monster ', 100, 600000, 'Hoodie', 'L', 'một tinh thần sống chậm sảng khoái và tự do – vốn chưa từng xuất hiện trong DNA của BOO LAAB nhưng lại là một trong những tôn chỉ của cộng đồng hippie. BOO LAAB cũng lần đầu tiên mở cửa phòng thí nghiệm để các “nguyên mẫu” của họ hòa mình vào thiên nhiên', '../images/product-items/brave-monster.jpg'),
(20, 'SWEAT CLOUD', 300, 400000, 'Sweater', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/sweat-cloud.jpg'),
(21, 'SWEAT CLOUD ', 200, 400000, 'Sweater', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/sweat-cloud.jpg'),
(22, 'SWEAT CLOUD', 100, 400000, 'Sweater', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/sweat-cloud.jpg'),
(23, 'Reflection', 300, 550000, 'Jacket', 'S', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/reflection.jpg'),
(24, 'Reflection ', 200, 550000, 'Jacket', 'M', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/reflection.jpg'),
(25, 'Reflection ', 100, 550000, 'Jacket', 'L', 'Không mua bây giờ thì mua bao giờ !!!', '../images/product-items/reflection.jpg'),
(26, 'Bomber', 500, 650000, 'Bombber', 'S', 'asd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `src` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MA_TK` int(10) UNSIGNED NOT NULL,
  `MA_GROUP_QUYEN` int(10) UNSIGNED DEFAULT NULL,
  `TEN_DANG_NHAP` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MAT_KHAU` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT 1,
  `EMAIL` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MA_TK`, `MA_GROUP_QUYEN`, `TEN_DANG_NHAP`, `MAT_KHAU`, `STATUS`, `EMAIL`) VALUES
(1, 1, 'admin', 'admin', 1, 'admin@gmail.com'),
(2, 2, 'Vy', '123456', 1, 'chautuongvy@gmail.com'),
(3, NULL, 'Đại Nam', 'e10adc3949ba59abbe56e057f20f883e', 1, 'dai123@gmail.com'),
(8, NULL, 'Minh Trung', 'e10adc3949ba59abbe56e057f20f883e', 1, 'minhtrung@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgiamgia`
--
ALTER TABLE `chitietgiamgia`
  ADD KEY `MA_CTGG` (`MA_CTGG`),
  ADD KEY `MA_SP` (`MA_SP`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MA_CTHD`),
  ADD KEY `MA_SP` (`MA_SP`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MA_CTPN`),
  ADD KEY `MA_SP` (`MA_SP`);

--
-- Indexes for table `chuongtrinhgiamgia`
--
ALTER TABLE `chuongtrinhgiamgia`
  ADD PRIMARY KEY (`MA_CTGG`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MA_DANH_MUC`);

--
-- Indexes for table `groupquyen`
--
ALTER TABLE `groupquyen`
  ADD PRIMARY KEY (`MA_GROUP_QUYEN`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MA_HD`),
  ADD KEY `MA_CTHD` (`MA_CTHD`),
  ADD KEY `MA_KH` (`MA_KH`),
  ADD KEY `MA_MGG` (`MA_MGG`),
  ADD KEY `MA_NV` (`MA_NV`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KH`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MA_NV`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MA_PN`),
  ADD KEY `MA_CTPN` (`MA_CTPN`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD KEY `MA_GROUP_QUYEN` (`MA_GROUP_QUYEN`),
  ADD KEY `MA_DANH_MUC` (`MA_DANH_MUC`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA_SP`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MA_TK`),
  ADD KEY `MA_GROUP_QUYEN` (`MA_GROUP_QUYEN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MA_CTHD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  MODIFY `MA_CTPN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuongtrinhgiamgia`
--
ALTER TABLE `chuongtrinhgiamgia`
  MODIFY `MA_CTGG` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MA_DANH_MUC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groupquyen`
--
ALTER TABLE `groupquyen`
  MODIFY `MA_GROUP_QUYEN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MA_HD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KH` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MA_NV` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MA_PN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgiamgia`
--
ALTER TABLE `chitietgiamgia`
  ADD CONSTRAINT `chitietgiamgia_ibfk_1` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`),
  ADD CONSTRAINT `chitietgiamgia_ibfk_2` FOREIGN KEY (`MA_SP`) REFERENCES `chuongtrinhgiamgia` (`MA_CTGG`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MA_CTHD`) REFERENCES `chitiethoadon` (`MA_CTHD`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MA_MGG`) REFERENCES `chuongtrinhgiamgia` (`MA_CTGG`),
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`MA_NV`) REFERENCES `nhanvien` (`MA_NV`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MA_TK`) REFERENCES `taikhoan` (`MA_TK`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MA_TK`) REFERENCES `taikhoan` (`MA_TK`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MA_CTPN`) REFERENCES `chitietphieunhap` (`MA_CTPN`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MA_TK`) REFERENCES `taikhoan` (`MA_TK`);

--
-- Constraints for table `quyen`
--
ALTER TABLE `quyen`
  ADD CONSTRAINT `quyen_ibfk_2` FOREIGN KEY (`MA_GROUP_QUYEN`) REFERENCES `groupquyen` (`MA_GROUP_QUYEN`),
  ADD CONSTRAINT `quyen_ibfk_3` FOREIGN KEY (`MA_DANH_MUC`) REFERENCES `danhmuc` (`MA_DANH_MUC`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MA_GROUP_QUYEN`) REFERENCES `groupquyen` (`MA_GROUP_QUYEN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
