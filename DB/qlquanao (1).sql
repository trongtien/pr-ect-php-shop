-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 18, 2019 lúc 05:43 PM
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
('qn', 'Quan nam'),
('an', 'Áo Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
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
('1', 'qưeqư', 'catelory4.PNG', 1231, 'qn', 'do', 'L', '12312', '2', 'tao ao', 12321),
('2', 'hieu', 'category1.PNG', 10000, 'an', 'do', 'XXL', 'ai biet', '2', 'tao ao', 0),
('10', 'quan1', 'category1.PNG', 200000, 'an', 'xam', 'M', 'GUT', 'Còn hàng', 'new ao', 500000),
('123', 'qwe', 'produce1.PNG', 123213, 'an', 'do', 'L', 'abc', 'Hết hàng', 'tao ao', 500000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
