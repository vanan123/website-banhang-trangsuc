-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2020 lúc 07:10 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chbantrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `idtrangsuc` int(10) NOT NULL,
  `idthanhvien` int(10) NOT NULL,
  `noidung` text NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idtrangsuc`, `idthanhvien`, `noidung`, `thoigian`) VALUES
(5, 1, 4, 'ok', '2020-10-31'),
(6, 1, 4, 'good', '2020-10-31'),
(8, 1, 4, 'quá đẹp', '2020-10-31'),
(9, 2, 4, 'rất đẹp', '2020-10-31'),
(10, 2, 3, 'sản phẩm rất chất lượng', '2020-10-31'),
(11, 2, 3, 'quá ngon', '2020-10-31'),
(12, 1, 3, 'sản phẩm rất chất lượng', '2020-10-31'),
(13, 3, 3, 'quá quý phái', '2020-10-31'),
(14, 3, 3, 'rất sang trọng', '2020-10-31'),
(15, 7, 3, 'quá đẹp', '2020-11-01'),
(16, 1, 3, 'rất đẹp', '2020-11-01'),
(17, 1, 3, 'ok', '2020-11-01'),
(18, 5, 3, 'rất đẹp', '2020-11-01'),
(19, 6, 4, 'Rất phù hợp để tặng cho người mình yêu', '2020-11-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` int(11) NOT NULL,
  `mathe` varchar(50) NOT NULL,
  `mathanhvien` int(11) NOT NULL,
  `matrangsuc` varchar(100) NOT NULL,
  `soluong` varchar(100) NOT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  `diachigiaohang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `mathe`, `mathanhvien`, `matrangsuc`, `soluong`, `ngaylap`, `tongtien`, `diachigiaohang`) VALUES
(7, '1111-2222-3333-9999', 3, '1,5', '1,1', '2020-11-01', 7800000, 'đà nẵng'),
(8, '2222-2222-1111-1111', 3, '1,5', '1,2', '2020-11-01', 13400000, 'Quy Nhơn'),
(9, '1111-9999-2222-8888', 4, '8,54', '1,2', '2020-11-01', 16900000, 'Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitrangsuc`
--

CREATE TABLE `loaitrangsuc` (
  `maloaitrangsuc` int(11) NOT NULL,
  `tenloaitrangsuc` text NOT NULL,
  `hienthi` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaitrangsuc`
--

INSERT INTO `loaitrangsuc` (`maloaitrangsuc`, `tenloaitrangsuc`, `hienthi`) VALUES
(1, 'Nhẫn', b'1'),
(2, 'Dây chuyền', b'1'),
(3, 'Lắc tay', b'1'),
(4, 'Bông tai', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaivang`
--

CREATE TABLE `loaivang` (
  `maloaivang` int(11) NOT NULL,
  `tenloaivang` text NOT NULL,
  `hienthi` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaivang`
--

INSERT INTO `loaivang` (`maloaivang`, `tenloaivang`, `hienthi`) VALUES
(1, 'Vàng trắng', b'1'),
(2, 'Vàng 18K', b'1'),
(3, 'Vàng 24K', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `mathanhvien` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`mathanhvien`, `hoten`, `email`, `matkhau`, `sdt`) VALUES
(1, 'Chung Nguyễn', 'nguyenvanan19it1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0906554011'),
(2, 'Trung', 'abc12@gmail.com', '202cb962ac59075b964b07152d234b70', '0906554071'),
(3, 'Chung1 Nguyễn', 'nguyenvanan9a4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0906554071'),
(4, 'Văn An', 'abc1@gmail.com', '202cb962ac59075b964b07152d234b70', '0906554077'),
(5, 'Trung', 'abc123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0906554012');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thethanhtoan`
--

CREATE TABLE `thethanhtoan` (
  `mathe` varchar(50) NOT NULL,
  `tentrenthe` varchar(50) NOT NULL,
  `CVV` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thethanhtoan`
--

INSERT INTO `thethanhtoan` (`mathe`, `tentrenthe`, `CVV`) VALUES
('4444-2222-9999-1111', 'NGUYEN VAN ANH', '42998cf32d'),
('2222-4444-6666-1111', 'NGUYEN VAN AN', '06138bc5af'),
('1222-2222-4444-5555', 'NGUYEN VAN VAN', '202cb962ac'),
('1222-2222-4444-1234', 'NGUYEN VAN ABC', 'bcbe3365e6'),
('1111-2222-3333-9999', 'NGUYEN VAN AN', '979d472a84'),
('2222-2222-1111-1111', 'NGUYEN VAN ANH', 'eb16372791'),
('1111-9999-2222-8888', 'NGUYEN VAN CHUNG', '3def184ad8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangsuc`
--

CREATE TABLE `trangsuc` (
  `matrangsuc` int(11) NOT NULL,
  `tentrangsuc` text NOT NULL,
  `maloaitrangsuc` int(11) NOT NULL,
  `maloaivang` int(11) NOT NULL,
  `giaban` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `Thuonghieu` varchar(255) NOT NULL,
  `Bosuutap` varchar(255) NOT NULL,
  `Loaida` varchar(255) NOT NULL,
  `Mauda` varchar(255) NOT NULL,
  `Hinhdang` varchar(255) NOT NULL,
  `Diptang` text NOT NULL,
  `Trongluong` float NOT NULL,
  `Chungloai` varchar(255) NOT NULL,
  `Tuoivang` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trangsuc`
--

INSERT INTO `trangsuc` (`matrangsuc`, `tentrangsuc`, `maloaitrangsuc`, `maloaivang`, `giaban`, `soluong`, `hinhanh`, `Thuonghieu`, `Bosuutap`, `Loaida`, `Mauda`, `Hinhdang`, `Diptang`, `Trongluong`, `Chungloai`, `Tuoivang`) VALUES
(1, 'Nhẫn cưới nữ AC1311', 1, 1, 2200000, 13, 'VangTrang\\Nhan\\NhanT1.jpg', 'AC', 'Hạnh phúc vàng', 'ECZ Swarovski', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà Cưới<br>\r\nKỷ niệm ngày cưới', 3.68808, 'Nhẫn', 'Vàng 10k'),
(2, 'Nhẫn cưới Đôi AC2211', 1, 1, 3400000, 21, 'VangTrang\\Nhan\\NhanT2.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương trắng', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết', 5.67889, 'Nhẫn đôi', 'Vàng 14K'),
(3, 'Nhẫn cưới nữ AC 1213 ', 1, 1, 2500000, 12, 'VangTrang\\Nhan\\NhanT3.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn\r\nQuà cưới - Kỷ niệm ngày cưới\r\nCác dịp lễ tết', 4.07889, 'Nhẫn', 'Vàng 14K'),
(4, 'Nhẫn cưới nữ AC 1215', 1, 1, 2300000, 13, 'VangTrang\\Nhan\\NhanT4.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết', 3.87889, 'Nhẫn', 'Vàng 14K'),
(5, 'Nhẫn cưới đôi AC 1223', 1, 1, 5600000, 23, 'VangTrang\\Nhan\\NhanT5.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết', 8.07889, 'Nhẫn đôi', 'Vàng 14K'),
(6, 'Nhẫn cưới nam AC 1211', 1, 1, 1800000, 10, 'VangTrang\\Nhan\\NhanT6.jpg', 'AC', 'Hạnh phúc viên mãn', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết', 4.17289, 'Nhẫn', 'Vàng 14K'),
(7, 'Nhẫn cưới nam AC 1212', 1, 1, 1600000, 9, 'VangTrang\\Nhan\\NhanT7.jpg', 'AC', 'Hạnh phúc viên mãn', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết', 4.01288, 'Nhẫn', 'Vàng 14K'),
(8, 'Nhẫn cưới đôi AC 1323', 1, 1, 5300000, 17, 'VangTrang\\Nhan\\NhanT8.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương trắng', 'Trắng', 'Tròn', 'Cầu hôn<br>\r\nQuà cưới - Kỷ niệm ngày cưới<br>\r\nCác dịp lễ tết<br>', 7.97789, 'Nhẫn đôi', 'Vàng 14K'),
(9, 'Dây chuyền', 2, 1, 1420000, 10, 'VangTrang\\DayChuyen\\DayChuyenT1.jpg', '', '', '', '', '', '', 0, '', '0'),
(10, 'Dây chuyền', 2, 1, 1150000, 10, 'VangTrang\\DayChuyen\\DayChuyenT2.jpg', '', '', '', '', '', '', 0, '', '0'),
(11, 'Dây chuyền', 2, 1, 1220000, 10, 'VangTrang\\DayChuyen\\DayChuyenT3.jpg', '', '', '', '', '', '', 0, '', '0'),
(12, 'Dây chuyền', 2, 1, 1450000, 10, 'VangTrang\\DayChuyen\\DayChuyenT4.jpg', '', '', '', '', '', '', 0, '', '0'),
(13, 'Dây chuyền', 2, 1, 1240000, 10, 'VangTrang\\DayChuyen\\DayChuyenT5.jpg', '', '', '', '', '', '', 0, '', '0'),
(14, 'Lắc tay', 3, 1, 580000, 10, 'VangTrang\\LacTay\\LacTayT1.jpg', '', '', '', '', '', '', 0, '', '0'),
(15, 'Lắc tay', 3, 1, 1300000, 10, 'VangTrang\\LacTay\\LacTayT2.jpg', '', '', '', '', '', '', 0, '', '0'),
(16, 'Lắc tay', 3, 1, 2100000, 10, 'VangTrang\\LacTay\\LacTayT3.jpg', '', '', '', '', '', '', 0, '', '0'),
(17, 'Lắc tay', 3, 1, 1520000, 10, 'VangTrang\\LacTay\\LacTayT4.jpg', '', '', '', '', '', '', 0, '', '0'),
(18, 'Lắc tay', 3, 1, 1420000, 10, 'VangTrang\\LacTay\\LacTayT5.jpg', '', '', '', '', '', '', 0, '', '0'),
(19, 'Lắc tay', 3, 1, 1100000, 10, 'VangTrang\\LacTay\\LacTayT6.jpg', '', '', '', '', '', '', 0, '', '0'),
(20, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT1.jpg', '', '', '', '', '', '', 0, '', '0'),
(21, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT2.jpg', '', '', '', '', '', '', 0, '', '0'),
(22, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT3.jpg', '', '', '', '', '', '', 0, '', '0'),
(23, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT4.jpg', '', '', '', '', '', '', 0, '', '0'),
(24, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT5.jpg', '', '', '', '', '', '', 0, '', '0'),
(25, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT6.jpg', '', '', '', '', '', '', 0, '', '0'),
(26, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT7.jpg', '', '', '', '', '', '', 0, '', '0'),
(27, 'Bông tai', 4, 1, 5800000, 23, 'VangTrang\\BongTai\\BongTaiT8.jpg', '', '', '', '', '', '', 0, '', '0'),
(28, 'Nhẫn cưới nữ AC 2213', 1, 2, 2500000, 13, 'Vang18K\\Nhan\\Nhan18V1.jpg', 'AC', 'Tình yêu vĩnh cửu', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Kỷ niệm ngày cưới <br>\r\nCác dịp lễ, tết', 5.1231, 'Nhẫn', 'Vàng 18K '),
(29, 'Nhẫn cưới đôi AC 9999', 1, 2, 10450000, 15, 'Vang18K\\Nhan\\Nhan18V2.jpg', 'AC', 'Hạnh phúc vàng', 'Kim cương tự nhiên', 'Trắng', 'Tròn', 'Cầu hôn <br>\r\nKỷ niệm ngày cưới <br>\r\nCác dịp lễ, tết ', 9.99519, 'Nhẫn đôi', 'Vàng 18K'),
(30, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(31, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(32, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(33, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(34, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V7.jpg', '', '', '', '', '', '', 0, '', '0'),
(35, 'Nhẫn', 1, 2, 1450000, 15, 'Vang18K\\Nhan\\Nhan18V8.jpg', '', '', '', '', '', '', 0, '', '0'),
(36, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(37, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(38, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(39, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(40, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(41, 'Dây chuyền', 2, 2, 5800000, 20, 'Vang18K\\DayChuyen\\DayChuyen18V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(42, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(43, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(44, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(45, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(46, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(47, 'Lắc Tay', 3, 2, 5800000, 20, 'Vang18K\\LacTay\\LacTay18V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(48, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(49, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(50, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(51, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(52, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(53, 'Bông Tai', 4, 2, 5800000, 20, 'Vang18K\\BongTai\\BongTai18V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(54, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(55, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(56, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(57, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(58, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(59, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(60, 'Nhẫn', 1, 2, 5800000, 20, 'Vang24K\\Nhan\\Nhan24V7.jpg', '', '', '', '', '', '', 0, '', '0'),
(61, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(62, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(63, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(64, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(65, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(66, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(67, 'Dây Chuyền', 2, 2, 5800000, 20, 'Vang24K\\DayChuyen\\DayChuyen24V7.jpg', '', '', '', '', '', '', 0, '', '0'),
(68, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(69, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(70, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(71, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(72, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(73, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(74, 'Lắc Tay', 3, 3, 1230000, 18, 'Vang24K\\LacTay\\LacTay24V7.jpg', '', '', '', '', '', '', 0, '', '0'),
(75, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V1.jpg', '', '', '', '', '', '', 0, '', '0'),
(76, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V2.jpg', '', '', '', '', '', '', 0, '', '0'),
(77, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V3.jpg', '', '', '', '', '', '', 0, '', '0'),
(78, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V4.jpg', '', '', '', '', '', '', 0, '', '0'),
(79, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V5.jpg', '', '', '', '', '', '', 0, '', '0'),
(80, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V6.jpg', '', '', '', '', '', '', 0, '', '0'),
(81, 'Bông Tai', 4, 3, 1230000, 18, 'Vang24K\\BongTai\\BongTai24V7.jpg', '', '', '', '', '', '', 0, '', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`,`mathe`,`mathanhvien`,`matrangsuc`) USING BTREE;

--
-- Chỉ mục cho bảng `loaitrangsuc`
--
ALTER TABLE `loaitrangsuc`
  ADD PRIMARY KEY (`maloaitrangsuc`);

--
-- Chỉ mục cho bảng `loaivang`
--
ALTER TABLE `loaivang`
  ADD PRIMARY KEY (`maloaivang`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`mathanhvien`);

--
-- Chỉ mục cho bảng `thethanhtoan`
--
ALTER TABLE `thethanhtoan`
  ADD PRIMARY KEY (`mathe`);

--
-- Chỉ mục cho bảng `trangsuc`
--
ALTER TABLE `trangsuc`
  ADD PRIMARY KEY (`matrangsuc`),
  ADD KEY `fk_TrangSuc_LoaiTrangSuc` (`maloaitrangsuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loaitrangsuc`
--
ALTER TABLE `loaitrangsuc`
  MODIFY `maloaitrangsuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaivang`
--
ALTER TABLE `loaivang`
  MODIFY `maloaivang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `mathanhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `trangsuc`
--
ALTER TABLE `trangsuc`
  MODIFY `matrangsuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
