-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 26, 2019 lúc 12:51 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nienluan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_acc` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_acc`, `name`, `email`, `password`, `phone`, `address`, `image`, `date_create`, `level`) VALUES
(1, 'Administator', 'admin@gmail.com', '123456', '09090909099', '', '1563853960.png', '2020-12-25 08:09:12', 1);



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--



--
-- Đang đổ dữ liệu cho bảng `blog`
--


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `sku_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id_contact`, `content`, `date_create`) VALUES
(1, 'Địa chỉ: Quận 5, TP Hồ Chí Minh', '2020-11-24 11:36:34'),
(2, 'Hotline: ........', '2020-12-24 11:37:02'),
(5, ' Email: nghia7217@gmail.com', '2020-12-24 11:44:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id_detail_invoice` int(11) NOT NULL,
  `code_invoice` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sku_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_invoice`
--

INSERT INTO `detail_invoice` (`id_detail_invoice`, `code_invoice`, `sku_product`, `qty`) VALUES
(3, 'INV01', 'S13', 1),
(4, 'INV01', 'S01', 2),
(5, 'INV01', 'S11', 1),
(6, 'INV01', 'S14', 1),
(14, 'INV02', 'S14', 1),
(17, 'INV03', 'S14', 3),
(18, 'INV03', 'S13', 1),
(19, 'INV04', 'S12', 1),
(20, 'INV04', 'S10', 1),
(21, 'INV05', 'S13', 1),
(22, 'INV06', 'S14', 1),
(23, 'INV07', 'S13', 1),
(27, 'INV08', 'S14', 1),
(29, 'INV09', 'S14', 1),
(30, 'INV10', 'S14', 1),
(31, 'INV11', 'S14', 2),
(34, 'INV12', 'S14', 1),
(35, 'INV12', 'S13', 2),
(36, 'INV12', 'S07', 1),
(37, 'INV13', 'S13', 1),
(38, 'INV14', 'S12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`

-- Đang đổ dữ liệu cho bảng `history`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `sku_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name_image` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

	INSERT INTO `image` (`id_image`, `sku_product`, `name_image`) VALUES
	(6, 'S09', 'toanlop3.jpg'),
	(7, 'S09', 'toanlop3.jpg'),
	(8, 'S14', 'toanlop2.jpg'),
	(9, 'S14', 'toanlop2.jpg'),
	(10, 'S14', 'toanlop2.jpg'),
	(14, 'S13', 'pt.jpg'),
	(15, 'S13', 'pt.jpg'),
	(16, 'S13', 'pt.jpg'),
	(17, 'S13', 'pt.jpg'),
	(18, 'S08', 'tv1.jpg'),
	(19, 'S08', 'tv1.jpg'),
	(20, 'S07', 'mt2.jpg'),
	(21, 'S07', 'mt2.jpg'),
	(22, 'S06', 'toanlop4.jpg'),
	(23, 'S06', 'toanlop4.jpg'),
	(24, 'S03', 'nguvan6.jpg'),
	(25, 'S03', 'nguvan6.jpg'),
	(26, 'S03', 'nguvan6.jpg'),
	(27, 'S01', 'm_tamlong.jpg'),
	(28, 'S01', 'm_tamlong.jpg'),
	(29, 'S01', 'm_tamlong.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `code_invoice` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_customer` int(11) NOT NULL,
  `info_receive` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `info_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`code_invoice`, `id_customer`, `info_receive`, `info_product`, `order_date`, `flag`) VALUES
('INV01', 6, 'Nhà trọ Bảo Xuyên, ấp Vĩnh Thuận, xã Vĩnh Hòa Hiệp, Châu Thành, Kiên Giang', 'Màu đỏ, size M, 28kg', '2020-12-25 11:06:26', 2),
('INV14', 6, 'ABC ', 'ABC', '2020-12-25 17:47:42', 0);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo`
--

CREATE TABLE `logo` (
  `id_lg` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logo`
--

INSERT INTO `logo` (`id_lg`, `image`, `link`, `date_upload`) VALUES
(1, 'logoShop.PNG', 'trang-chu.html', '2010-12-25 08:03:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `sku_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_product` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `date_upload` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `highlight` tinyint(1) NOT NULL,
  `view` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`sku_product`, `image`, `name_product`, `slug`, `summary`, `date_upload`, `author`, `qty`, `price`, `highlight`, `view`, `id_type`, `flag`) VALUES
('S01', 'nhungtamlongcaoca.jpg', 'Những Tấm Lòng Cao Cả', 'Nhung-Tam-Long-Cao-Ca', 'Truyện kể về cuộc đời của cậu bé với những bài học về cuộc sống', '2020-12-25 11:24:22', 1, 118, 125000, 1, 25, 1, 1),
('S03', 'nguvan6.jpg', 'Ngữ Văn lớp 6', 'Sach-day-ngu-van', 'Sách dạy môn ngữ văn lớp 6', '2020-12-25 21:30:04', 1, 160, 150000, 1, 41, 7, 1),
('S06', 'toanlop4.jpg', 'Toán lớp 4', 'Toan-Lop-4', 'Sách dạy toán lớp 4', '2020-12-25 22:47:58', 1, 20, 79000, 0, 65, 7, 1),
('S07', 'mt2.jpg', 'Mỹ thuật lớp 2', 'Sach-day-ve-lop-2', 'Sách dạy vẽ', '2020-12-25 23:26:39', 1, 200, 139000, 0, 27, 7, 1),
('S08', 'tv1.jpg', 'Tiếng Việt Lớp 1', 'Sach-tieng-viet-1', 'Sách tiếng việt lớp 1', '2020-12-25 23:27:12', 1, 40, 145000, 0, 24, 7, 1),
('S09', 'toanlop3.jpg', 'Toán lớp 3', 'Sach-day-toan-lop-3', 'Là sách',  '2020-12-25 08:46:08', 2, 99, 145000, 1, 73, 7, 1),
('S10', 'abc.jpg', 'ABC', 'Sach ABC', 'Sách dạy tiếng anh', '2020-12-25 10:18:31', 1, 199, 139000, 1, 46, 10, 1),
('S11', 'chientranh.jpg', 'Chiến Tranh và Hòa Bình', 'Sach hay', 'Sách nói về chiến tranh và hòa bình', '2020-12-25 11:54:15', 2, 49, 149000, 1, 58, 1, 1),
('S12', 'english1.jpg', 'English for you', 'Bo-sach-giup-hoc-tieng-anh', 'ABCDF', '2020-12-25 08:35:50', 1, 298, 119000, 1, 13, 10, 1),
('S13', 'pt.jpg', 'aaa', 'Sach-phia-tay', 'Sách hay',  '2020-12-25 09:22:38', 1, 395, 145000, 1, 135, 12, 1),
('S14', 'toanlop2.jpg', 'Toán Lớp 2', 'Sach-day-toan-lop-2', 'Sách dạy học toán lớp 2', '2020-12-25 09:27:37', 1, 91, 185000, 1, 177, 12, 1),
('S15', 'sachkinhte.jpg', 'Sách kinh tế', 'Sach-day-kinh-te', 'Sách dạy kinh tế', '2020-12-25 09:27:37', 1, 91, 190000, 1, 177, 13, 1),
('S2', 'quatangcuocsong.jpg', 'Sách quà tặng cuộc sống', 'Sach-qua-tang-cuoc-song', 'Sách quà tặng cuộc sống', '2020-12-25 09:27:37', 1, 91, 280000, 1, 177, 15, 1),
('S4', 'sachkinhdi.jpg', 'Sách kinh di', 'Sach-kinh-di', 'Sách kinh dị',  '2020-12-25 09:27:37', 1, 91, 380000, 1, 177, 14, 1),
('S16', 'quatangvogia.jpg', 'Sách quà tặng cuộc sống', 'Sach-qua-tang-cuoc-song', 'Sách quà tặng cuộc sống', '2020-12-25 09:27:37', 1, 91, 480000, 1, 177, 15, 1),
('S17', 'longdungcam.jpg', 'Sách quà tặng cuộc sống', 'Sach-qua-tang-cuoc-song', 'Sách quà tặng cuộc sống', '2020-12-25 09:27:37', 1, 91, 280000, 1, 177, 15, 1),
('S115', 'kinhtevimo.jpg', 'Kinh Tế Vĩ Mô', 'Sach-day-kinh-te', 'Sách dạy kinh tế','2020-12-25 09:27:37', 1, 91, 80000, 1, 177, 13, 1),
('S151', 'kinhtehoc.jpg', 'Kinh Tế Học', 'Sach-day-kinh-te', 'Sách dạy kinh tế', '2020-12-25 09:27:37', 1, 91, 180000, 1, 177, 13, 1),
('S41', 'matnatrang.jpg', 'Mặt nạ trắng', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 110000, 1, 177, 14, 1),
('S42', 'yeuquai.jpg', 'Yêu quái', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 120000, 1, 177, 14, 1),
('S43', 'lamdaucoichet.jpg', 'Làm dâu cỏi chết', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 130000, 1, 177, 14, 1),
('S44', 'thanchet.jpg', 'Thần chết', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 140000, 1, 177, 14, 1),
('S45', 'buombaothudieptu.jpg', 'Bướm báo thù', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 190000, 1, 177, 14, 1),
('S46', 'hathan.jpg', 'Hà thần', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 150000, 1, 177, 14, 1),
('S47', 'cuubienlien.jpg', 'Cửu biện liên', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 200000, 1, 177, 14, 1),
('S48', 'giengthothan.jpg', 'Giếng thở than', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 210000, 1, 177, 14, 1),
('S49', 'longlauyeuquat.jpg', 'Lòng lâu yêu quật', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 230000, 1, 177, 14, 1),
('S411', 'moidemmottruyenkinhdi.jpg', 'Một đêm một truyện kinh dị', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 210000, 1, 177, 14, 1),
('S412', 'tutruyentamlinhnghiepam.jpg', 'Từ truyện tâm linh nghiệp âm', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 290000, 1, 177, 14, 1),
('S413', 'bahoikinhdi.jpg', 'Ba hồi kinh dị', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 150000, 1, 177, 14, 1),
('S414', 'nhuchongngai.jpg', 'Nhục hồng ngải', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 160000, 1, 177, 14, 1),
('S415', 'bongtrangtrangnga.jpg', 'Bóng trăng trắng ngà', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 230000, 1, 177, 14, 1),
('S416', 'traohuyet.jpg', 'Tráo huyết', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 240000, 1, 177, 14, 1),
('S417', 'codauthubay.jpg', 'Cô dâu thứ bảy', 'Sach-kinh-di', 'Sách kinh dị', '2020-12-25 09:27:37', 1, 91, 250000, 1, 177, 14, 1),
('S418', 'kiepnantroidinh.jpg', 'Kiếp nạn trời định', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 260000, 1, 177, 14, 1),
('S419', 'diemquy.jpg', 'Diễm quỷ', 'Sach-kinh-di', 'Sách kinh dị','2020-12-25 09:27:37', 1, 91, 270000, 1, 177, 14, 1);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id_slider`, `image`, `link`, `date_create`) VALUES
(4, '113.jpg', 'trang-chu.html', '2020-12-25 20:16:06'),
(5, '113.jpg', 'trang-chu.html', '2020-12-25 20:29:37'),
(6, '113.jpg', 'trang-chu.html', '2020-12-25 20:37:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_blog`

-- Đang đổ dữ liệu cho bảng `type_blog`

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id_type` int(11) NOT NULL,
  `typename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id_type`, `typename`, `slug_type`, `date_create`) VALUES
(1, 'Sách Tiểu Thuyết', 'Sach-tieu-thuyet', '2020-12-25 12:10:15'),
(7, 'Sách Giáo Khoa', 'Sach-giao-khoa', '2020-12-25 12:39:00'),
(10, 'Sách Tiếng Anh', 'Sach-tieng-anh', '2020-12-25 13:18:23'),
(12, 'Sách hay', 'Sach-hay', '2020-12-25 13:38:23'),
(13, 'Sách kinh tế', 'Sach-kinh-te', '2020-12-25 13:38:23'),
(14, 'Truyện kinh dị', 'Truyen-kinh-di', '2020-12-25 13:38:23'),
(15, 'Truyện quà tặng cuộc sống', 'Truyen-qua-tang-cuoc-song', '2020-12-25 13:38:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_acc`);

--
-- Chỉ mục cho bảng `blog`


--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD PRIMARY KEY (`id_detail_invoice`);

--
-- Chỉ mục cho bảng `history`

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`code_invoice`);

--
-- Chỉ mục cho bảng `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_lg`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sku_product`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `type_blog`
--

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `blog`
--
--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `detail_invoice`
--
ALTER TABLE `detail_invoice`
  MODIFY `id_detail_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `history`
--


--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `logo`
--
ALTER TABLE `logo`
  MODIFY `id_lg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `type_blog`
--


--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
