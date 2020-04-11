-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 24, 2019 lúc 04:26 PM
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
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `idgiohang` varchar(30) NOT NULL,
  `soluongsp` int(100) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `masanpham` varchar(30) NOT NULL,
  `thanhtien` int(30) NOT NULL,
  `tensanpham` varchar(30) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  PRIMARY KEY (`idgiohang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idgiohang`, `soluongsp`, `userid`, `masanpham`, `thanhtien`, `tensanpham`, `diachi`) VALUES
('5ddaad51b5fdc', 8, '9', '5dda914e35cc7', 0, 'Áo sơ mi', '180 cao lỗ'),
('5ddaadfa8a7a0', 8, '9', '5dda914e35cc7', 0, 'Áo sơ mi', '200 phan the hien'),
('5ddaaf1b4d462', 1, '9', '5dda9ae1cab39', 120, 'Áo sơ mi', '');

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
  `khuyenmai` int(10) NOT NULL,
  PRIMARY KEY (`masanpham`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `hinh`, `gia`, `maloai`, `mau`, `size`, `hang`, `tinhtrang`, `mota`, `khuyenmai`) VALUES
('5dda9b46538ac', 'Quần Tây', 'catelory4.PNG', 200000, 'an', 'xam', 'XL', 'Adidas', 'Còn hàng', 'Quần đẹp', 200000),
('5dda9ae1cab39', 'Áo sơ mi', 'category1.PNG', 120, 'an', 'den', 'L', 'Adidas', 'Còn hàng', 'Áo đẹp', 120),
('5dda914e35cc7', 'Áo sơ mi', 'produce1.PNG', 20000, 'an', 'do', 'L', 'Adidas', 'Còn hàng', 'sản phẩm mới', 300000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
