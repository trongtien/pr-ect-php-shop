-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 02, 2019 lúc 03:20 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `iddonhang` varchar(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `status` int(10) NOT NULL,
  `diachigiaohang` varchar(100) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iddonhang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`iddonhang`, `amount`, `userid`, `status`, `diachigiaohang`, `note`, `create_at`, `update_at`) VALUES
('5ddfa45cd2176', 200000, '9', 0, '12321', '123', '2019-11-28 10:41:32', '2019-11-28 10:41:32'),
('5ddff40e2bbcd', 120, '9', 0, '681/4 Phạm Thế Hiển Phường 4 Quận 8', 'giao sau 5h', '2019-11-28 16:21:34', '2019-11-28 16:21:34'),
('5ddff60e3ac09', 120, '9', 1, '681/4 Phạm Thế Hiển Phường 4 Quận 8', '123', '2019-11-28 16:30:06', '2019-11-28 16:30:06'),
('5de001eb2a074', 20000, '9', 1, 'Địa chỉ giao hàng', 'Thêm thông tin giao hàng', '2019-11-28 17:20:43', '2019-11-28 17:20:43'),
('5de29f29977fb', 2000003, '9', 0, 'Địa chỉ giao hàng', 'Thêm thông tin giao hàng', '2019-11-30 16:56:09', '2019-11-30 16:56:09'),
('5de5128b462ad', 120, '9', 0, 'Địa chỉ giao hàng', 'Thêm thông tin giao hàng', '2019-12-02 13:32:59', '2019-12-02 13:32:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `idgiohang` varchar(30) NOT NULL,
  `iddonhang` varchar(30) DEFAULT NULL,
  `masanpham` varchar(30) NOT NULL,
  `soluong` int(100) NOT NULL,
  `gia` int(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgiohang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idgiohang`, `iddonhang`, `masanpham`, `soluong`, `gia`, `create_at`, `update_at`) VALUES
('5de5128b548ad', '5de5128b462ad', '5dda9ae1cab39', 1, 120, '2019-12-02 13:32:59', '2019-12-02 13:32:59'),
('5de29f29a4dc6', '5de29f29977fb', '5dda9b46538ac', 1, 2000003, '2019-11-30 16:56:09', '2019-11-30 16:56:09'),
('5de29f29a4b35', '5de29f29977fb', '5dda9ae1cab39', 10, 120, '2019-11-30 16:56:09', '2019-11-30 16:56:09'),
('5de001eb2a9a1', '5de001eb2a074', '5dda914e35cc7', 1, 20000, '2019-11-28 17:20:43', '2019-11-28 17:20:43'),
('5de001eb2a5c8', '5de001eb2a074', '5dda9ae1cab39', 1, 120, '2019-11-28 17:20:43', '2019-11-28 17:20:43'),
('5ddff60e3ae28', '5ddff60e3ac09', '5dda9ae1cab39', 1, 120, '2019-11-28 16:30:06', '2019-11-28 16:30:06'),
('5ddff40e4cfc2', '5ddff40e2bbcd', '5dda9ae1cab39', 1, 120, '2019-11-28 16:21:34', '2019-11-28 16:21:34'),
('5ddfa45cd26a5', '5ddfa45cd2176', '5dda9b46538ac', 1, 200000, '2019-11-28 10:41:32', '2019-11-28 10:41:32'),
('5ddfa3a528585', '5ddfa3a52813d', '5dda9b46538ac', 1, 200000, '2019-11-28 10:38:29', '2019-11-28 10:38:29'),
('5ddfa3642e61b', '5ddfa3642e20e', '5dda9b46538ac', 1, 200000, '2019-11-28 10:37:24', '2019-11-28 10:37:24'),
('5ddfa1f52e515', '5ddfa1f52de14', '5dda9b46538ac', 1, 200000, '2019-11-28 10:31:17', '2019-11-28 10:31:17'),
('5ddfa1f52e3a8', '5ddfa1f52de14', '5dda914e35cc7', 1, 20000, '2019-11-28 10:31:17', '2019-11-28 10:31:17'),
('5ddfa1f52e1df', '5ddfa1f52de14', '5dda9ae1cab39', 7, 120, '2019-11-28 10:31:17', '2019-11-28 10:31:17'),
('5ddfa17edc3d3', '5ddfa17edbca3', '5dda9b46538ac', 1, 200000, '2019-11-28 10:29:18', '2019-11-28 10:29:18'),
('5ddfa17edc244', '5ddfa17edbca3', '5dda914e35cc7', 1, 20000, '2019-11-28 10:29:18', '2019-11-28 10:29:18'),
('5ddfa17edc088', '5ddfa17edbca3', '5dda9ae1cab39', 7, 120, '2019-11-28 10:29:18', '2019-11-28 10:29:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `idhoadon` varchar(30) NOT NULL,
  `idgiohang` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `thanhtien` int(20) NOT NULL,
  `masp` varchar(30) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `soluong` int(100) NOT NULL,
  `ngaylap` date NOT NULL,
  PRIMARY KEY (`idhoadon`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `maloai` varchar(50) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`) VALUES
('5dd951a85d415', 'Balô'),
('qn', 'Quan nam'),
('an', 'Áo Nam'),
('5dd951831d242', 'Giày Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `userid` int(20) NOT NULL,
  `userpassword` varchar(10) NOT NULL,
  `useraddress` varchar(50) NOT NULL,
  `useremail` varchar(20) NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`userid`, `userpassword`, `useraddress`, `useremail`, `level`) VALUES
(1, '123', '123', 'admin@gmail.com', 1),
(8, '123', '21321321', 'tien@gmail.com', 0),
(9, '123', '21321', 'hieu@gmail.com', 0),
(10, '123', '0000000', 'hieu123@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masanpham` varchar(50) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gia` int(20) NOT NULL,
  `maloai` varchar(50) NOT NULL,
  `mau` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `hang` varchar(50) NOT NULL,
  `tinhtrang` varchar(10) NOT NULL,
  `mota` varchar(50) NOT NULL,
  `khuyenmai` int(10) DEFAULT NULL,
  PRIMARY KEY (`masanpham`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `hinh`, `gia`, `maloai`, `mau`, `size`, `hang`, `tinhtrang`, `mota`, `khuyenmai`) VALUES
('5dda9b46538ac', 'Quần Tây', 'category1.PNG', 2000003, 'qn', 'xam', 'M', 'Adidas1', '1', '1đẹp', 0),
('5dda9ae1cab39', 'Áo sơ mi', 'category1.PNG', 120, 'an', 'den', 'L', 'Adidas', 'Còn hàng', 'Áo đẹp', 120),
('5dda914e35cc7', 'Áo sơ mi', 'produce1.PNG', 20000, 'an', 'do', 'L', 'Adidas', 'Còn hàng', 'sản phẩm mới', 300000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
