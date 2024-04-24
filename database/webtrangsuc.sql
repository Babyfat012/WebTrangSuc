-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2024 lúc 06:19 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idhoadon` varchar(50) NOT NULL,
  `idsanpham` varchar(50) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `dongia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` varchar(50) NOT NULL,
  `taikhoankh` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `sonha` varchar(50) DEFAULT NULL,
  `tentp` varchar(50) DEFAULT NULL,
  `tenquan` varchar(50) DEFAULT NULL,
  `tenduong` varchar(50) DEFAULT NULL,
  `ngaymua` datetime DEFAULT NULL,
  `phuongthucthanhtoan` int(11) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `tongtien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `hoten` varchar(50) DEFAULT NULL,
  `taikhoankh` varchar(50) NOT NULL,
  `matkhau` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `sonha` varchar(50) DEFAULT NULL,
  `tenduong` varchar(50) DEFAULT NULL,
  `tenquan` varchar(50) DEFAULT NULL,
  `tentp` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `trangthaitk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `malsp` varchar(10) NOT NULL,
  `tenloaisp` varchar(200) DEFAULT NULL,
  `hinhloaisp` varchar(50) DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`malsp`, `tenloaisp`, `hinhloaisp`, `mota`) VALUES
('BRL', 'Bracelet', 'Bracelet.jpeg', 'A bracelet is an article of jewellery that is worn around the wrist. Bracelets may serve different uses, such as being worn as an ornament. When worn as ornaments, bracelets may have a supportive func'),
('NKL', 'Necklace\r\n', 'Necklace.jpeg', 'A necklace is an article of jewellery that is worn around the neck. Necklaces may have been one of the earliest types of adornment worn by humans.[1] They often serve ceremonial, religious, magical.'),
('RG', 'Ring\r\n', 'Ring.png', 'A ring is a round band, usually made of metal, worn as ornamental jewelry. The term \\\\\\\"ring\\\\\\\" by itself denotes jewellery worn on the finger; when worn as an ornament elsewhere, the body part is sp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `hoten` varchar(50) DEFAULT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) DEFAULT NULL,
  `quyen` varchar(20) DEFAULT NULL,
  `trangthaitk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` varchar(50) NOT NULL,
  `soluong` int(200) DEFAULT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `maloaisp` varchar(10) DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL,
  `hinhanh` varchar(50) DEFAULT NULL,
  `chatlieu` varchar(20) DEFAULT NULL,
  `mausac` varchar(20) DEFAULT NULL,
  `kichthuoc` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`) VALUES
('NKL1', 12, 'Cuban Necklace', 'NKL', 2000, 'abc', 'cuban-dome-16mm-multicolor-chains1602748705.jpeg', 'Gold', 'GOLD', 50);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idhoadon`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `taikhoankh` (`taikhoankh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`taikhoankh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`malsp`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `maloaisp` (`maloaisp`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`taikhoankh`) REFERENCES `khachhang` (`taikhoankh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloaisp`) REFERENCES `loaisanpham` (`malsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
