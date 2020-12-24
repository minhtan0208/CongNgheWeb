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
(1, 'Administator', 'admin@gmail.com', '123456', '09090909099', '', '1563853960.png', '2020-07-10 08:09:12', 1);



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_upload` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `highlight` tinyint(1) NOT NULL,
  `view` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id_blog`, `image`, `title`, `slug`, `summary`, `content`, `date_upload`, `author`, `highlight`, `view`, `flag`, `id_type`) VALUES
(14, '1563078595.jpg', 'Mẹ không cần giỏi nhưng vẫn có thể dạy con học tiếng Anh dễ dàng chỉ với 3 cách', 'Me-khong-can-gioi-nhung-van-co-the-day-con-hoc-tieng-Anh-de-dang-chi-voi-3-cach', 'Giờ đây tiếng Anh là ngôn ngữ rất quan trọng và cần thiết đối với mỗi người nên bạn hãy dạy con học ngay từ bé bằng 3 cách đơn giản và hiệu quả sau đây nhé! <br/>\r\nDạy tiếng Anh cho bé chỉ còn là \"chuyện nhỏ\" nếu mẹ nắm được 3 cách dạy cực kì hiệu quả dưới đây! ', '<p style=\"text-align:justify\">Kh&ocirc;ng thể phủ nhận được vai tr&ograve; của tiếng Anh đối với ch&uacute;ng ta trong cuộc sống ng&agrave;y nay. N&oacute; gi&uacute;p con người&nbsp;h&ograve;a nhập với thế giới, c&ocirc;ng việc thuận lợi hơn, th&ecirc;m tự tin,... Ch&iacute;nh v&igrave; thế việc&nbsp;<a href=\"http://www.yan.vn/nguoi-me-dan-giay-nho-day-nha-phuc-vu-cho-viec-hoc-tieng-anh-hieu-qua-161913.html?utm_campaign=InternallinkYAN&amp;utm_source=167023&amp;utm_medium=noniadesktop\" target=\"_blank\">cho b&eacute; học tiếng Anh</a>&nbsp;ngay từ nhỏ l&agrave; điều v&ocirc; c&ugrave;ng cần thiết nhưng phải học sao cho hiệu quả v&agrave; ph&ugrave; hợp với trẻ th&igrave; kh&ocirc;ng phải ai cũng biết.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Với 3 c&aacute;ch học tiếng Anh đơn giản&nbsp;tại nh&agrave; sau đ&acirc;y d&ugrave; bạn kh&ocirc;ng phải l&agrave; người giỏi tiếng nhưng vẫn ho&agrave;n to&agrave;n c&oacute; thể dạy cho b&eacute; đấy!</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Dạy tiếng Anh từ khi c&ograve;n b&eacute; để con c&oacute; nền tảng vững chắc</em></p>\r\n\r\n<p style=\"text-align:justify\"><strong>1. Tr&ograve; chơi tương t&aacute;c</strong></p>\r\n\r\n<p style=\"text-align:justify\">Bất k&igrave; đứa b&eacute; n&agrave;o cũng đều th&iacute;ch chơi hơn học v&igrave; vậy mẹ kh&ocirc;ng n&ecirc;n chỉ dạy kiến thức một c&aacute;ch kh&ocirc; khan nh&agrave;m ch&aacute;n. Thay v&agrave;o đ&oacute; h&atilde;y c&ugrave;ng con phối hợp chơi những tr&ograve; tương t&aacute;c th&uacute; vị như dưới đ&acirc;y nh&eacute;!&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6-1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\">- Gh&eacute;p từ với tranh: Đ&acirc;y l&agrave; tr&ograve; chơi kh&aacute; đơn giản bạn chỉ cần chuẩn bị những tấm b&igrave;a&nbsp;từ vựng c&ugrave;ng tranh đi k&egrave;m sau đ&oacute; đảo lộn trật tự rồi y&ecirc;u cầu b&eacute; gh&eacute;p lại với nhau.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">- N&eacute;m b&oacute;ng: Tr&ograve; chơi n&agrave;y vừa kết hợp giữa vận động n&ecirc;n b&eacute; sẽ th&iacute;ch lắm đấy! Bạn h&atilde;y chuẩn bị một quả b&oacute;ng nam ch&acirc;m v&agrave; một tấm bảng ghi từ mới. Ba mẹ c&oacute; nhiệm vụ đọc c&aacute;c từ vựng v&agrave; b&eacute; sẽ t&igrave;m vị tr&iacute; của từ đ&oacute; rồi n&eacute;m v&agrave;o.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">- Nghe v&agrave; đo&aacute;n từ: Bố mẹ h&atilde;y chuẩn bị nhiều tấm h&igrave;nh với nhiều từ vựng kh&aacute;c nhau. Nhiệm vụ của bạn l&agrave; ph&aacute;t &acirc;m c&aacute;c từ ấy v&agrave; y&ecirc;u cầu b&eacute; đo&aacute;n ch&uacute;ng rồi chỉ tay v&agrave;o.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6-2.png\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Bạn h&atilde;y ph&aacute;t &acirc;m từ ấy v&agrave; y&ecirc;u cầu b&eacute; đo&aacute;n nh&eacute;!</em></p>\r\n\r\n<p style=\"text-align:justify\">- Tr&ograve; chơi với bảng chứ c&aacute;i: Những chữ&nbsp;c&aacute;i sẽ đơn giản hơn nhiều so với từ vựng n&ecirc;n bạn h&atilde;y cho b&eacute; l&agrave;m quen&nbsp;ngay từ khi bắt đầu học tiếng Anh nh&eacute;! Bạn h&atilde;y dọn sẵn một con đường be b&eacute; c&oacute; xếp c&aacute;c chữ c&aacute;i b&ecirc;n dưới với đ&iacute;ch đến l&agrave; phần thưởng cho trẻ v&agrave; một con x&uacute;c xắc d&ugrave;ng để đổ. Nhiệm vụ của con l&agrave; tung x&uacute;c xắc, t&ugrave;y theo con số m&agrave; b&eacute; sẽ bước tương ứng bắt đầu từ điểm xuất ph&aacute;t v&agrave; đọc&nbsp;đ&uacute;ng chữ c&aacute;i đ&oacute;, nếu&nbsp;con trả lời sai h&atilde;y bảo b&eacute; l&ugrave;i lại.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6-3.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Học bảng chữ đầu ti&ecirc;n để tạo nền tảng cho b&eacute; nh&eacute;!</em></p>\r\n\r\n<p style=\"text-align:justify\"><strong>2. Flashcards&nbsp;</strong></p>\r\n\r\n<p style=\"text-align:justify\">Học tiếng Anh th&ocirc;ng qua flashcards hiện nay kh&aacute; phổ biến bởi độ tiện&nbsp;lợi v&agrave; hiệu quả của n&oacute;, thế n&ecirc;n đ&acirc;y l&agrave; một c&aacute;ch kh&aacute; tuyệt với để cha mẹ&nbsp;<a href=\"http://www.yan.vn/tiet-lo-cac-cach-day-con-cuc-thong-minh-cua-cha-me-phap-165753.html?utm_campaign=InternallinkYAN&amp;utm_source=167023&amp;utm_medium=noniadesktop\" target=\"_blank\">dạy&nbsp;cho b&eacute;</a>&nbsp;đấy! Ba mẹ h&atilde;y chọn những bộ flashcards với c&aacute;c chủ đề gần gũi như nh&agrave; bếp, động vật, lo&agrave;i hoa. Nếu như cha mẹ chưa tự tin về khả năng ph&aacute;t &acirc;m của m&igrave;nh h&atilde;y sử dụng&nbsp;từ điển Oxford online&nbsp;để nhập từ, nghe v&agrave; đọc theo nh&eacute;!&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6-4.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Cho b&eacute; học tiếng Anh bằng flashcards l&agrave; một phương ph&aacute;p rất hữu &iacute;ch đấy!</em></p>\r\n\r\n<p style=\"text-align:justify\">C&oacute; một lưu &yacute; l&agrave; cha mẹ kh&ocirc;ng n&ecirc;n dạy con từng từ ri&ecirc;ng lẻ m&agrave; h&atilde;y kết hợp th&agrave;nh những&nbsp;c&acirc;u với cấu tr&uacute;c đơn giản, như vậy b&eacute; sẽ ghi nhớ được l&acirc;u hơn. Đồng thời, trong qu&aacute; tr&igrave;nh hướng dẫn bạn n&ecirc;n giơ tấm thẻ&nbsp;l&ecirc;n để b&eacute; tập được khả năng phản xạ.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>3. Học tiếng Anh th&ocirc;ng qua phim ảnh, &acirc;m nhạc</strong></p>\r\n\r\n<p style=\"text-align:justify\">&Acirc;m nhạc v&agrave; phim ảnh lu&ocirc;n l&agrave; niềm cảm hứng &quot;bất tận&quot;, n&ecirc;n đ&acirc;y l&agrave; c&aacute;ch rất tốt để bạn dạy con học tiếng Anh đấy! Đặc biệt l&agrave; trẻ em c&oacute; khả năng cảm thụ&nbsp;rất nhanh n&ecirc;n bạn h&atilde;y lựa chọn những bản nhạc v&agrave; bộ phim đơn giản c&oacute; từ vựng m&agrave; b&eacute; đ&atilde; học để con c&oacute; thể nghe, xem. Nếu như bố mẹ bận c&ocirc;ng việc kh&ocirc;ng c&oacute; thời gian học c&ugrave;ng con th&igrave; h&atilde;y thường xuy&ecirc;n bật b&agrave;i h&aacute;t v&agrave; phim cho b&eacute; xem để &quot;thấm&quot; dần nh&eacute;!&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post6-5.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\">Tr&ecirc;n đ&acirc;y l&agrave; những b&iacute; quyết gi&uacute;p con học tiếng Anh cực hiệu quả d&ugrave; mẹ kh&ocirc;ng giỏi vẫn c&oacute; thể dạy b&eacute; một c&aacute;ch dễ d&agrave;ng. H&atilde;y lưu lại v&agrave; &aacute;p dụng với<a href=\"http://www.yan.vn/khi-be-o-nha-mot-minh-cung-bo-v-42530.html?utm_campaign=InternallinkYAN&amp;utm_source=167023&amp;utm_medium=noniadesktop\" target=\"_blank\">&nbsp;b&eacute; nh&agrave; m&igrave;nh&nbsp;</a>nh&eacute;! Con bạn sẽ giỏi tiếng Anh l&ecirc;n tr&ocirc;ng thấy m&agrave; kh&ocirc;ng cần phải đến lớp qu&aacute; sớm đ&acirc;u! Ch&uacute;c bạn v&agrave; b&eacute;&nbsp;th&agrave;nh c&ocirc;ng!</p>\r\n\r\n<p style=\"text-align:right\">Ảnh: Internet</p>\r\n', '2019-07-14 11:29:55', 1, 0, 52, 1, 2),
(17, '1563087276.jpg', 'Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ', 'Canh-bao-benh-Lyme-tu-bo-ve:-Cha-me-cho-nen-lo-la-keo-gay-nguy-hai-cho-tre', 'Bên cạnh các bệnh thường gặp thì vào mùa hè mẹ nên cảnh giác với bệnh Lyme do bọ ve cắn gây nguy hiểm đến trẻ nhé! <br/>\r\nMuốn biết bệnh Lyme do bọ ve cắn nguy hiểm đến bé thế nào và cách phòng tránh ra sao, bạn hãy đọc bài viết này nhé!', '<p style=\"text-align:justify\">Trẻ nhỏ&nbsp;rất yếu n&ecirc;n dễ mắc bệnh do t&aacute;c động của m&ocirc;i trường b&ecirc;n ngo&agrave;i. Trong đ&oacute; những bệnh về c&ocirc;n tr&ugrave;ng hay bọ ve cắn khiến mẹ rất đau đầu v&igrave;&nbsp;ảnh hưởng lớn đến&nbsp;<a href=\"http://www.yan.vn/nhung-dau-hieu-tuong-binh-thuong-nhung-lai-bao-hieu-benh-nang-o-tre-165390.html?utm_campaign=InternallinkYAN&amp;utm_source=166881&amp;utm_medium=noniadesktop\" target=\"_blank\">sức khỏe của b&eacute;</a>. B&agrave;i viết n&agrave;y sẽ cung cấp cho bạn những kiến thức về bệnh Lyme do bọ ve cắn v&agrave; c&aacute;ch ph&ograve;ng tr&aacute;nh để chăm s&oacute;c b&eacute; y&ecirc;u c&ugrave;ng gia đ&igrave;nh&nbsp;thật tốt nh&eacute;!&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bệnh Lyme do bọ ve cắn v&agrave; những điều cần biết</strong></p>\r\n\r\n<p style=\"text-align:justify\">Mới đ&acirc;y Tiến sĩ Thomas Mather thuộc&nbsp;Đại học Rhode Island đ&atilde; chia sẻ rằng&nbsp;m&ugrave;a h&egrave; năm nay l&agrave; dịp b&ugrave;ng nổ của lo&agrave;i bọ ve chuy&ecirc;n l&acirc;y lan bệnh cho cơ thể con người. Những con bọ ve đang sinh s&ocirc;i v&agrave; t&igrave;m vật chủ n&ecirc;n b&eacute; v&agrave; bạn ho&agrave;n to&agrave;n c&oacute; khả năng&nbsp;bị bọ ve b&aacute;m chặt v&agrave;o rồi&nbsp;k&iacute; sinh trong đ&oacute;.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>M&ugrave;a h&egrave; năm nay l&agrave; dịp b&ugrave;ng ph&aacute;t của loại bọ ve g&acirc;y bệnh Lyme rất nguy hiểm.</em></p>\r\n\r\n<p style=\"text-align:justify\">Đối với người lớn việc bị bọ ve b&aacute;m đ&atilde; qu&aacute; rắc rối th&igrave; t&igrave;nh trạng n&agrave;y&nbsp;xảy ra tr&ecirc;n trẻ nhỏ sẽ g&acirc;y ra hậu quả rất nghi&ecirc;m trọng, đ&oacute; l&agrave; bệnh Lyme. Những con bọ ve&nbsp;b&aacute;m&nbsp;tr&ecirc;n người tạo n&ecirc;n cảm gi&aacute;c rất kh&oacute; chịu v&agrave; sẵn s&agrave;ng mang bệnh đến cho vật chủ của n&oacute;. Bệnh nhiễm tr&ugrave;ng n&agrave;y do những con bọ ve ch&acirc;n đen mang mầm bệnh g&acirc;y n&ecirc;n v&agrave; người&nbsp;bệnh, đặc biệt l&agrave; trẻ em c&oacute; c&aacute;c triệu chứng như: sốt, đau đầu, đốm ban v&ograve;ng tr&ograve;n m&agrave;u đỏ, mệt mỏi,... Bệnh Lyme tuy c&oacute; những biểu hiện kh&ocirc;ng qu&aacute; nghi&ecirc;m trọng nhưng nếu&nbsp;kh&ocirc;ng được điều trị kịp thời sẽ lan đến hệ thần kinh, tim v&agrave; khớp. Hậu quả của căn bệnh n&agrave;y l&agrave; sẽ dẫn đến vi&ecirc;m v&agrave; đau khớp trong nhiều năm.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Một b&aacute;o c&aacute;o của Trung t&acirc;m Ngăn ngừa v&agrave; Kiểm so&aacute;t Dịch bệnh Hoa Kỳ (CDC)&nbsp;cho thấy tại c&aacute;c quốc gia Ch&acirc;u &Acirc;u bệnh n&agrave;y ho&agrave;nh h&agrave;nh rất đ&aacute;ng sợ, hậu quả l&agrave; c&oacute; đến khoảng 30 ngh&igrave;n ca chẩn đến mắc bệnh Lyme ở Mỹ trong đ&oacute; c&oacute; rất nhiều trẻ em mắc phải. Đối tượng lớn nhất của bệnh n&agrave;y ch&iacute;nh l&agrave; trẻ em v&agrave; đặc biệt l&agrave; ở lứa tuổi từ 5 đến 10.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\">Minh chứng điển h&igrave;nh cho căn bệnh đ&aacute;ng lo ngại n&agrave;y l&agrave; c&ocirc; b&eacute; Natasha 7 tuổi người Mỹ. V&agrave;o năm 2017 c&ocirc; b&eacute; n&agrave;y mắc phải c&aacute;c triệu chứng như sốt cao v&agrave; kh&ocirc;ng hạ được, đi lại hạn chế v&agrave; lu&ocirc;n kh&oacute;c th&eacute;c v&igrave; đau đớn,... V&igrave; rất lo lắng cho con n&ecirc;n gia đ&igrave;nh đ&atilde; đưa b&eacute; đến bệnh viện v&agrave; b&aacute;c sĩ chẩn đo&aacute;n b&eacute; mắc&nbsp;<a href=\"http://www.yan.vn/hoang-hon-benh-la-nguy-hiem-khon-luong-tu-bo-ve-71055.html?utm_campaign=InternallinkYAN&amp;utm_source=166881&amp;utm_medium=noniadesktop\" target=\"_blank\">bệnh Lyme</a>&nbsp;do bọ ve đốt, hậu quả l&agrave; trong năm n&agrave;y c&ocirc; b&eacute; Natasha được ph&aacute;t hiện l&agrave; bị liệt.</p>\r\n\r\n<p style=\"text-align:justify\">Tuy nhi&ecirc;n, tr&ecirc;n thực tế kh&ocirc;ng phải bất k&igrave; con bọ ve n&agrave;o cũng g&acirc;y bệnh nhưng mọi người kh&ocirc;ng n&ecirc;n v&igrave; thế m&agrave; lơ l&agrave;. Bạn n&ecirc;n c&oacute; hiểu biết về c&aacute;c loại bọ ve để nắm r&otilde; khả năng mang mầm bệnh v&agrave; l&acirc;y lan của n&oacute;. Những loại bọ ve phổ biến l&agrave;: bọ ve ng&ocirc;i sao c&ocirc; đơn (lone star tick), bọ ve nai (deer tick), bẹ ve ch&oacute; (dog tick) với những biểu hiện tựa bệnh cảm c&uacute;m.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-2.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Bạn n&ecirc;n c&oacute; hiểu biết về c&aacute;c loại bọ ve để nắm được khả năng mang mầm bệnh&nbsp;l&acirc;y lan của n&oacute;.</em></p>\r\n\r\n<p style=\"text-align:justify\"><strong>C&aacute;ch ph&ograve;ng ngừa bọ ve cắn v&agrave; truyền bệnh</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong>1. B&igrave;nh xịt ngừa c&ocirc;n tr&ugrave;ng ph&ugrave; hợp&nbsp;</strong></p>\r\n\r\n<p style=\"text-align:justify\">Việc lựa chọn b&igrave;nh xịch ph&ugrave; hợp sẽ g&oacute;p phần đẩy l&ugrave;i c&aacute;c loại bọ ve đ&aacute;ng kể. Theo như khuyến c&aacute;o của CDC bạn n&ecirc;n chọn b&igrave;nh xịch chứa th&agrave;nh phần&nbsp;DEET, picaridin hay chứa tinh dầu bạch đ&agrave;n chanh.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Nếu như bạn lo lắng những loại b&igrave;nh xịt n&agrave;y g&acirc;y ảnh hưởng đến sức khỏe nhưng kh&ocirc;ng muốn bọ ve b&aacute;m tr&ecirc;n quần &aacute;o th&igrave; bạn c&oacute; thể chọn sản phẩm chứa&nbsp;permethrin nh&eacute;! Chất n&agrave;y rất bền m&ugrave;i v&agrave; b&aacute;m được rất l&acirc;u tr&ecirc;n quần &aacute;o thậm ch&iacute; l&agrave; sau v&agrave;i lần giặt.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-4.png\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Lựa chọn b&igrave;nh xịt ph&ugrave; hợp sẽ đẩy l&ugrave;i bệnh&nbsp;đ&aacute;ng kể.</em></p>\r\n\r\n<p><strong>2. Kiểm tra bọ ve v&agrave; vết đốt tr&ecirc;n cơ thể&nbsp;</strong></p>\r\n\r\n<p>Bọ ve thường xuất hiện rất nhiều tại những bụi rậm, nơi c&oacute; c&acirc;y cỏ mọc um t&ugrave;m, thế n&ecirc;n sau mỗi lần hoạt động ngo&agrave;i trời bất kể l&agrave; bạn hay b&eacute; cũng n&ecirc;n kiểm tra bọ ve nh&eacute;! C&aacute;c kiểm tra rất đơn giản bạn chỉ cần rửa sạch người b&eacute; dưới v&ograve;i hoa sen v&agrave; quan s&aacute;t nhất l&agrave; ở những v&ugrave;ng nhạy cảm như bẹn, n&aacute;ch. Bạn n&ecirc;n lưu &yacute; quan s&aacute;t cẩn thận nh&eacute; v&igrave; n&oacute; rất dễ nhầm với vết t&agrave;n nhang, mũi đốt v&agrave; da ch&aacute;y nắng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-5.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Sau mỗi lần hoạt động ngo&agrave;i trời bạn n&ecirc;n kiểm tra xem c&oacute; bọ ve b&aacute;m tr&ecirc;n người b&eacute; hay kh&ocirc;ng.</em></p>\r\n\r\n<p style=\"text-align:justify\"><strong>3. Bọ ve kh&ocirc;ng chỉ c&oacute; ở trong rừng&nbsp;</strong></p>\r\n\r\n<p style=\"text-align:justify\">Nếu bạn nghĩ bọ ve chỉ c&oacute; ở trong rừng hay bụi rậm quả l&agrave; một sai lầm đấy! Bởi v&igrave; n&oacute; c&ograve;n k&iacute; sinh tr&ecirc;n l&ocirc;ng chim, chuột, ch&oacute;,... n&ecirc;n d&ugrave; bạn c&oacute; đi lại tr&ecirc;n th&agrave;nh phố th&igrave; vẫn ho&agrave;n to&agrave;n bị n&oacute; b&aacute;m v&agrave;o. V&igrave; vậy, bạn n&ecirc;n cẩn trọng quan s&aacute;t v&agrave; kiểm tra sau khi về nh&agrave; nh&eacute;!&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-6.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Bọ ve c&ograve;n k&iacute; sinh tr&ecirc;n cả động vật nữa đấy!</em></p>\r\n\r\n<p style=\"text-align:justify\"><strong>4. Chọn trang phục m&agrave;u s&aacute;ng&nbsp;</strong></p>\r\n\r\n<p style=\"text-align:justify\">Những trang phục m&agrave;u tối quả l&agrave; gi&uacute;p b&eacute; thoải m&aacute;i hoạt động m&agrave; kh&ocirc;ng lo vấy bẩn nhưng sẽ khiến bọ ve dễ b&aacute;m hơn v&igrave; kh&oacute; ph&aacute;t hiện. V&igrave; vậy, bạn n&ecirc;n chọn cho con những trang phục s&aacute;ng m&agrave;u để dễ d&agrave;ng nhận biết c&oacute; bọ v&ecirc; ẩn nấp hơn nh&eacute;! Ngo&agrave;i ra, bạn n&ecirc;n trang bị cả tất cho b&eacute; mặc d&ugrave; con đ&atilde; được mặc quần d&agrave;i.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post7-7.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Bạn n&ecirc;n chọn trang phục m&agrave;u s&aacute;ng cho b&eacute; khi ra ngo&agrave;i nh&eacute;!</em></p>\r\n\r\n<p>Bệnh Lyme do bọ ve cắn l&acirc;y lan&nbsp;tr&ecirc;n người lớn đặc biệt l&agrave; trẻ nhỏ rất nghi&ecirc;m trọng n&ecirc;n cha mẹ h&atilde;y ghi nhớ c&aacute;c c&aacute;ch ph&ograve;ng ngừa tr&ecirc;n để<a href=\"http://www.yan.vn/8-bai-thuoc-dan-gian-dieu-tri-hieu-qua-cam-cum-o-tre-160829.html?utm_campaign=InternallinkYAN&amp;utm_source=166881&amp;utm_medium=noniadesktop\" target=\"_blank\">&nbsp;bảo vệ sức khỏe</a>&nbsp;của cả gia đ&igrave;nh&nbsp;v&agrave; kh&ocirc;ng n&ecirc;n lơ l&agrave; d&ugrave; sống tại đ&ocirc; thị lớn&nbsp;nh&eacute;!</p>\r\n\r\n<p style=\"text-align:right\">Ảnh: Internet</p>\r\n', '2019-07-14 13:52:33', 1, 0, 6, 1, 2),
(24, '1563328849.jpg', 'Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh', 'Me-nhat-dinh-phai-biet-nhung-mon-an-tot-cho-ba-bau-cuoi-thai-ki-giup-con-khoe-manh-va-thong-minh', '3 tháng cuối thai kì là thời gian bé yêu có những thay đổi mạnh mẽ. Thời gian này cần bổ sung thêm dưỡng chất tốt cho cả mẹ và bé nhé! <br/>\r\nGiai đoạn cuối thai kì vô cùng quan trọng đối với cả mẹ và bé. Muốn có một thai kỳ khỏe mạnh, cơ thể bà bầu cần nhận đủ các chất dinh dưỡng từ chế độ ăn uống mỗi ngày để khoẻ mạnh và cung cấp cho sự phát triển của thai nhi', '<p style=\"text-align:justify\">Để vừa tốt cho sức khỏe lại c&oacute; đủ nguồn&nbsp;<a href=\"http://www.yan.vn/dinh-duong-hieu-qua-cho-nguoi-chay-bo-marathon-108112.html?utm_campaign=InternallinkYAN&amp;utm_source=166996&amp;utm_medium=noniadesktop\" target=\"_blank\">dinh dưỡng</a>&nbsp;cho b&eacute; y&ecirc;u lớn dần v&agrave; ho&agrave;n thiện từng ng&agrave;y, mẹ h&atilde;y nhớ&nbsp;những thực phẩm tốt cho cả m&igrave;nh v&agrave; b&eacute; sau đ&acirc;y nh&eacute;!</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bột m&egrave; đen</strong></p>\r\n\r\n<p style=\"text-align:justify\">Bột m&egrave; đen c&oacute; c&ocirc;ng dụng l&agrave;m&nbsp;<a href=\"http://www.yan.vn/lam-dep-da-bang-muoi-an-cong-dung-it-nguoi-ngo-toi-cua-muoi-74589.html?utm_campaign=InternallinkYAN&amp;utm_source=166996&amp;utm_medium=noniadesktop\" target=\"_blank\">đẹp da</a>, ph&ograve;ng ngừa những bệnh hay gặp ở b&agrave; bầu v&agrave; hỗ trợ ph&aacute;t triển n&atilde;o bộ của b&eacute;. Ngo&agrave;i ra, m&egrave; đen cũng gi&uacute;p mẹ chuyển dạ&nbsp;nhanh khi sinh đấy. Trước khi đi ngủ, mẹ chỉ cần uống một cốc m&egrave; đen với sắn d&acirc;y v&agrave; đường.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-2.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Trứng vịt lộn</strong></p>\r\n\r\n<p style=\"text-align:justify\">Trứng vịt lộn l&agrave; m&oacute;n ăn d&acirc;n d&atilde; m&agrave; từ người gi&agrave; đến&nbsp;<a href=\"http://www.yan.vn/me-nho-sua-non-vao-mat-con-khien-be-so-sinh-bi-mu-vinh-vien-v-152087.html?utm_campaign=InternallinkYAN&amp;utm_source=166996&amp;utm_medium=noniadesktop\" target=\"_blank\">trẻ nhỏ</a>&nbsp;đều y&ecirc;u th&iacute;ch. Trứng vịt lộn cũng v&ocirc; c&ugrave;ng tốt cho mẹ v&agrave; b&eacute; v&igrave; chứa nhiều chất đạm. Mỗi ng&agrave;y mẹ c&oacute; thể ăn một quả để bổ sung chất dinh dưỡng.&nbsp;Nhưng mẹ n&agrave;o ch&acirc;n tay lạnh, cơ thể thuộc thể h&agrave;n th&igrave; ăn nhiều qu&aacute; cũng kh&ocirc;ng tốt đ&acirc;u nh&eacute;, chỉ hai ng&agrave;y một quả l&agrave; đủ ph&aacute;t huy hiệu quả m&agrave; kh&ocirc;ng g&acirc;y ảnh hưởng rồi đấy.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-3.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-4.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Thịt vịt</strong></p>\r\n\r\n<p style=\"text-align:justify\">Thịt vịt được chứng minh chứa nhiều dinh dưỡng hơn cả thịt g&agrave;. Trong 3 th&aacute;ng cuối thai k&igrave; mẹ thường xuy&ecirc;n ăn thịt vịt sẽ gi&uacute;p b&eacute; sinh ra th&ecirc;m bụ bẫm, đ&aacute;ng y&ecirc;u v&agrave; th&ocirc;ng minh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-5.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-6.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-7.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>C&aacute;c loại đậu</strong></p>\r\n\r\n<p style=\"text-align:justify\">Ngũ cốc được chứng minh c&oacute; nhiều tinh chất tốt cho sự ph&aacute;t triển của thai nhi, đặc biệt l&agrave; n&atilde;o bộ. C&aacute;c sợi protein trong c&aacute;c loại hạt khiến đậu l&agrave; một nguồn dinh dưỡng gi&agrave;u chất sắt, folate v&agrave; kẽm. Trong thời gian mang bầu, mẹ c&oacute; thể chọn nhiều m&oacute;n ăn k&egrave;m, ăn ch&iacute;nh từ ngũ cốc.</p>\r\n\r\n<p style=\"text-align:justify\">Đơn giản nhất, mẹ c&oacute; thể chọn ch&egrave; thập cẩm phối nhiều loại hạt với nhau như đậu xanh, đậu đỏ, đậu đen,&hellip;để ăn giữa buổi, vừa dễ ăn m&agrave; kh&ocirc;ng bị ng&aacute;n, lại c&ograve;n&nbsp;gi&uacute;p tăng c&acirc;n khỏe mạnh v&agrave; th&ocirc;ng minh hơn. Nhưng mẹ bầu cũng nhớ ch&uacute; &yacute; vấn đề vệ sinh an to&agrave;n thực phẩm, hoặc nếu muốn y&ecirc;n t&acirc;m hơn c&oacute; thể tự nấu tại nh&agrave; nh&eacute;!</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-8.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-9.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-10.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>Đu đủ ch&iacute;n</strong></p>\r\n\r\n<p>Đu đủ ch&iacute;n tốt cho sức khỏe của cả mẹ v&agrave; b&eacute;, bởi t&iacute;nh ngọt m&aacute;t v&agrave; gi&agrave;u vitamin của n&oacute;. Đu đủ ch&iacute;n c&oacute; thể ăn tr&aacute;ng miệng, hoặc&nbsp;chế biến th&agrave;nh canh, vừa dễ ăn, vừa bổ dưỡng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-11.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-12.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-13.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><strong>Nước dừa</strong></p>\r\n\r\n<p>Nước dừa vừa ngọt m&aacute;t, vừa dễ uống, lại đảm bảo v&agrave; tốt cho sức khỏe. Kh&ocirc;ng chỉ gi&uacute;p mẹ lọc sạch nước ối, nước dừa c&ograve;n gi&uacute;p b&eacute; c&oacute; một l&agrave;n da trắng trẻo hồng h&agrave;o nữa đấy.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-14.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-15.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Ch&aacute;o c&aacute;</strong></p>\r\n\r\n<p style=\"text-align:justify\">Từ xa xưa người ta đ&atilde; &ldquo;kh&aacute;o&rdquo; nhau rằng ăn nhiều c&aacute; sẽ gi&uacute;p th&ocirc;ng minh hơn. C&aacute; chứa nhiều chất đạm, kh&ocirc;ng những gi&uacute;p an thai m&agrave; c&ograve;n tốt cho sự ph&aacute;t triển của b&eacute; nữa đấy. C&aacute; cũng cung cấp c&aacute;c chất dinh dưỡng như protein v&agrave; vitamin. Mẹ c&oacute; thể chế biến nhiều loại c&aacute; kh&aacute;c nhau như c&aacute; ch&eacute;p, c&aacute; l&oacute;c, c&aacute; di&ecirc;u hồng,&hellip;để tốt cho sức khỏe v&agrave; ăn kh&ocirc;ng bị ng&aacute;n.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-16.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-17.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-18.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Sữa tươi kh&ocirc;ng đường</strong></p>\r\n\r\n<p style=\"text-align:justify\">Nhiều người lo lắng ăn kh&ocirc;ng đ&uacute;ng c&aacute;ch sẽ kh&ocirc;ng v&agrave;o con m&agrave; chỉ g&acirc;y b&eacute;o ph&igrave; cho mẹ. Một trong những thực phẩm c&oacute; thể hạn chế t&igrave;nh trạng tr&ecirc;n&nbsp;l&agrave; sữa tươi kh&ocirc;ng đường. Giai đoạn n&agrave;y, cơ thể mẹ cũng cần lượng canxi lớn để tăng cường cho cơ thể v&agrave; d&agrave;nh một phần truyền cho thai nhi, đảm bảo xương v&agrave; răng b&eacute; chắc khoẻ. Nếu muốn bổ sung th&ecirc;m dưỡng chất cho con m&agrave; kh&ocirc;ng l&agrave;m dư đường huyết cho mẹ, th&igrave; đ&acirc;y ch&iacute;nh l&agrave; một sự lựa chọn th&ocirc;ng minh đấy!</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-19.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/post8-20.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\">Trong 3 th&aacute;ng cuối của thai k&igrave;, chế độ dinh dưỡng của mẹ ảnh hưởng rất lớn đến tr&iacute; th&ocirc;ng minh v&agrave; sức khỏe của b&eacute;, do đ&oacute;&nbsp;<a href=\"http://www.yan.vn/nguyen-nhan-va-cach-chua-tri-mat-ngu-cho-me-bau-166097.html?utm_campaign=InternallinkYAN&amp;utm_source=166996&amp;utm_medium=noniadesktop\" target=\"_blank\">b&agrave; bầu</a>&nbsp;n&ecirc;n ch&uacute; &yacute; bổ sung những thực phẩm gi&agrave;u chất dinh dưỡng v&agrave;o cơ thể. Tuy nhi&ecirc;n c&aacute;c mẹ cũng cần chọn những thực phẩm sạch sẽ, an to&agrave;n vệ sinh thực phẩm để đảm bảo sức khỏe cả cho m&igrave;nh v&agrave; cả b&eacute; y&ecirc;u nữa nh&eacute;.</p>\r\n\r\n<p style=\"text-align:right\">(Ảnh: Internet.)</p>\r\n', '2019-07-17 09:00:08', 2, 0, 8, 1, 8),
(29, 'no-image.jpg', 'Giới thiệu', 'Gioi-thieu', 'Đang cập nhật...', '<p>Đang cập nhật...</p>\r\n', '2019-07-10 11:02:15', 1, 0, 18, 1, 25),
(30, 'no-image.jpg', 'Liên hệ', 'Lien-he', 'Đang cập nhật...', '<p>Đang cập nhật...</p>\r\n', '2019-07-10 11:03:19', 1, 0, 12, 1, 26);

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
(2, 'Hotline: ........', '2020-11-24 11:37:02'),
(5, ' Email: nghia7217@gmail.com', '2020-11-24 11:44:59');

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
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `id_acc` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id_history`, `text`, `time`, `id_acc`, `flag`) VALUES
(95, ' đã tạo loại bài viết <b>Tin tức test</b>', '2019-07-14 13:05:26', 1, 0),
(96, ' đã xóa loại bài viết <b>Tin tức test</b>', '2019-07-14 13:07:03', 1, 0),
(97, ' đã tạo loại bài viết <b>Tin tức test</b>', '2019-07-14 13:16:15', 1, 0),
(98, ' đã chỉnh sửa loại bài viết <b></b> thành <b>Tin tức hàng ngày</b>', '2019-07-14 13:18:10', 0, 0),
(99, ' đã chỉnh sửa loại bài viết <b></b> thành <b>Tin tức n</b>', '2019-07-14 13:19:05', 1, 0),
(100, ' đã chỉnh sửa loại bài viết <b>Tin tức n</b> thành <b>Tin tức nổi bật</b>', '2019-07-14 13:19:52', 1, 0),
(101, ' đã xóa loại bài viết <b>Tin tức nổi bật</b>', '2019-07-14 13:20:01', 1, 0),
(102, ' đã xóa bài viết: <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 13:48:49', 1, 0),
(103, ' đã đăng bài viết <b></b>', '2019-07-14 13:49:56', 1, 0),
(104, ' đã xóa bài viết: <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 13:51:10', 1, 0),
(105, ' đã đăng bài viết <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 13:52:33', 1, 0),
(106, ' đã chỉnh sửa bài viết <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 13:54:36', 1, 0),
(107, ' đã duyệt bài <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 14:01:31', 1, 0),
(108, ' đã tắt duyệt bài <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 14:01:39', 1, 0),
(109, ' đã duyệt bài <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-14 14:01:46', 1, 0),
(110, ' đã tắt duyệt bài <b>Khi bé yêu 6 tháng tuổi, mẹ nhớ \"note\" ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-14 14:05:02', 3, 0),
(111, ' đã đăng bài viết <b>Bài test</b>', '2019-07-14 16:16:40', 1, 0),
(112, ' đã duyệt bài <b>Bài test</b>', '2019-07-14 16:17:00', 1, 0),
(113, ' đã xóa bài viết: <b>Bài test</b>', '2019-07-14 16:17:05', 1, 0),
(114, ' đã duyệt bài <b>Khi bé yêu 6 tháng tuổi, mẹ nhớ \"note\" ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-14 16:17:25', 1, 0),
(115, ' đã tạo loại bài viết <b>Tin test</b>', '2019-07-15 07:02:10', 1, 0),
(116, ' đã chỉnh sửa loại bài viết <b>Tin test</b> thành <b>Tin hot trong ngày</b>', '2019-07-15 07:02:54', 1, 0),
(117, ' đã xóa loại bài viết <b>Tin hot trong ngày</b>', '2019-07-15 07:03:05', 1, 0),
(118, ' đã đăng bài viết <b>Bài test 1</b>', '2019-07-15 07:04:05', 1, 0),
(119, ' đã đăng bài viết <b>Bài test 2</b>', '2019-07-15 07:04:32', 1, 0),
(120, ' đã chỉnh sửa bài viết <b>Bài test 1</b>', '2019-07-15 07:04:51', 1, 0),
(121, ' đã duyệt bài <b>Bài test 1</b>', '2019-07-15 07:05:06', 1, 0),
(122, ' đã tắt duyệt bài <b>Bài test 1</b>', '2019-07-15 07:05:12', 1, 0),
(123, ' đã xóa bài viết: <b>Bài test 1</b>', '2019-07-15 07:05:18', 1, 0),
(124, ' đã chỉnh sửa bài viết <b>Bài viết hay</b>', '2019-07-15 07:05:27', 1, 0),
(125, ' đã xóa bài viết: <b>Bài viết hay</b>', '2019-07-15 07:05:35', 1, 0),
(126, ' đã đăng bài viết <b>Bài test 1</b>', '2019-07-15 07:21:20', 2, 0),
(127, ' đã duyệt bài <b>Bài test 1</b>', '2019-07-15 07:28:06', 1, 0),
(128, ' đã chỉnh sửa bài viết <b>Bài test 1</b>', '2019-07-15 07:28:31', 1, 0),
(129, ' đã tắt duyệt bài <b>Bài test 1</b>', '2019-07-15 07:32:48', 1, 0),
(130, ' đã chỉnh sửa bài viết <b>Bài test 1đsadsa</b>', '2019-07-15 07:36:31', 2, 0),
(131, ' đã xóa bài viết: <b>Bài test 1đsadsa</b>', '2019-07-15 07:36:51', 2, 0),
(132, ' đã đăng bài viết <b>Bài viết test</b>', '2019-07-15 07:37:28', 2, 0),
(133, ' đã chỉnh sửa bài viết <b>Bài viết testdsadsa</b>', '2019-07-15 07:38:15', 1, 0),
(134, ' đã duyệt bài <b>Bài viết testdsadsa</b>', '2019-07-15 07:38:32', 1, 0),
(135, ' đã tắt duyệt bài <b>Bài viết testdsadsa</b>', '2019-07-15 07:43:57', 1, 0),
(136, ' đã duyệt bài <b>Bài viết testdsadsa</b>', '2019-07-15 07:44:45', 1, 0),
(137, ' đã đăng bài viết <b>Bài test 2</b>', '2019-07-15 07:49:40', 4, 0),
(138, ' đã xóa bài viết: <b>Bài test 2</b>', '2019-07-15 07:50:27', 4, 0),
(139, ' đã xóa bài viết: <b>Bài viết testdsadsa</b>', '2019-07-15 07:54:44', 1, 0),
(140, ' đã tạo loại sản phẩm <b>Loại test</b>', '2019-07-15 08:16:48', 1, 0),
(141, ' đã xóa loại sản phẩm <b>Loại test</b>', '2019-07-15 08:20:34', 1, 0),
(142, ' đã chỉnh sửa loại sản phẩm <b>Sản phẩm test</b> thành <b>Sản phẩm nổi bật</b>', '2019-07-15 08:22:16', 1, 0),
(143, ' đã đăng sản phẩm <b>Sản phẩm 1</b>', '2019-07-15 21:22:17', 1, 0),
(144, ' đã đăng sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 21:30:04', 1, 0),
(145, ' đã đăng sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 21:33:40', 1, 0),
(146, ' đã đăng sản phẩm <b>Sản phẩm 1</b>', '2019-07-15 21:45:15', 2, 0),
(147, ' đã xóa sản phẩm <b>Sản phẩm 1</b>', '2019-07-15 21:56:34', 1, 0),
(148, ' đã xóa sản phẩm <b>Sản phẩm đầu tiên</b>', '2019-07-15 21:56:59', 1, 0),
(149, ' đã chỉnh sửa sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 22:40:54', 1, 0),
(150, ' đã chỉnh sửa sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 22:43:35', 1, 0),
(151, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:47:58', 1, 0),
(152, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:48:28', 1, 0),
(153, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:48:57', 1, 0),
(154, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:49:21', 1, 0),
(155, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:51:13', 1, 0),
(156, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:51:50', 1, 0),
(157, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:52:24', 1, 0),
(158, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:53:18', 1, 0),
(159, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:53:47', 1, 0),
(160, ' đã chỉnh sửa sản phẩm <b>Sản phẩm 1</b>', '2019-07-15 22:54:01', 1, 0),
(161, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:54:09', 1, 0),
(162, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-15 22:54:16', 1, 0),
(163, ' đã đăng sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:01:43', 1, 0),
(164, ' đã chỉnh sửa sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:02:56', 1, 0),
(165, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 23:03:06', 1, 0),
(166, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:06:16', 1, 0),
(167, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:06:33', 1, 0),
(168, ' đã duyệt sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:10:56', 1, 0),
(169, ' đã duyệt sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:11:04', 1, 0),
(170, ' đã tắt duyệt sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:11:06', 1, 0),
(171, ' đã duyệt sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:11:12', 1, 0),
(172, ' đã chỉnh sửa sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:21:30', 1, 0),
(173, ' đã duyệt sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 23:24:45', 1, 0),
(174, ' đã đăng sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:26:39', 1, 0),
(175, ' đã đăng sản phẩm <b>Sản phẩm test 3</b>', '2019-07-15 23:27:12', 1, 0),
(176, ' đã duyệt sản phẩm <b>Sản phẩm test 3</b>', '2019-07-15 23:27:28', 1, 0),
(177, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:28:35', 1, 0),
(178, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-15 23:28:43', 1, 0),
(179, ' đã tắt duyệt sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 23:29:30', 1, 0),
(180, ' đã tắt duyệt sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:29:35', 1, 0),
(181, ' đã tắt duyệt sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:29:40', 1, 0),
(182, ' đã tắt duyệt sản phẩm <b>Sản phẩm test 3</b>', '2019-07-15 23:29:44', 1, 0),
(183, ' đã duyệt sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:30:05', 1, 0),
(184, ' đã duyệt sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:30:09', 1, 0),
(185, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-15 23:30:18', 1, 0),
(186, ' đã chỉnh sửa sản phẩm <b>Đầm công chúa Elsa siêu dễ thương cho bé gái từ 3-8 tuổi</b>', '2019-07-15 23:30:35', 1, 0),
(187, ' đã duyệt sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 23:30:41', 1, 0),
(188, ' đã duyệt sản phẩm <b>Sản phẩm 1</b>', '2019-07-15 23:30:43', 1, 0),
(189, ' đã chỉnh sửa sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-15 23:30:52', 1, 0),
(190, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:31:11', 1, 0),
(191, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:31:39', 1, 0),
(192, ' đã duyệt sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:31:52', 1, 0),
(193, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test 2</b>', '2019-07-15 23:32:01', 1, 0),
(194, ' đã tắt duyệt sản phẩm <b>Sản phẩm 1</b>', '2019-07-16 08:20:08', 1, 0),
(195, ' đã xóa bài viết: <b></b>', '2019-07-16 08:25:54', 2, 0),
(196, ' đã xóa sản phẩm <b>Sản phẩm 1</b>', '2019-07-16 08:31:22', 1, 0),
(197, ' đã đăng sản phẩm <b>Sản phẩm 1</b>', '2019-07-16 08:33:30', 2, 0),
(198, ' đã xóa bài viết: <b></b>', '2019-07-16 08:44:27', 2, 0),
(199, ' đã xóa sản phẩm <b>Sản phẩm 1</b>', '2019-07-16 08:45:41', 2, 0),
(200, ' đã đăng sản phẩm <b>Sản phẩm test </b>', '2019-07-16 08:46:08', 2, 0),
(201, ' đã duyệt sản phẩm <b>Sản phẩm test </b>', '2019-07-16 08:46:52', 1, 0),
(202, ' đã tắt duyệt sản phẩm <b>Sản phẩm test </b>', '2019-07-16 08:47:24', 1, 0),
(203, ' đã chỉnh sửa sản phẩm <b>Đầm lụa hoa kèm nón rộng vành dễ thương cho bé gái 2 - 9 tuổi DGB191147</b>', '2019-07-16 08:54:43', 2, 0),
(204, ' đã duyệt sản phẩm <b>Đầm lụa hoa kèm nón rộng vành dễ thương cho bé gái 2 - 9 tuổi DGB191147</b>', '2019-07-16 08:55:34', 1, 0),
(205, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Bộ thun in mắt kính quần legging dễ thương cho bé gái 10 - 15 tuổi BGB118687</b>', '2019-07-16 09:15:18', 1, 0),
(206, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Set quần yếm jeans áo thun Prince dễ thương cho bé gái 10 - 15 tuổi BGB118704</b>', '2019-07-16 09:25:01', 1, 0),
(207, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Set quần yếm jeans áo thun Prince dễ thương cho bé gái 10 - 15 tuổi BGB118704</b>', '2019-07-16 09:25:30', 1, 0),
(208, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-16 09:27:48', 1, 0),
(209, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-16 09:28:04', 1, 0),
(210, ' đã xóa sản phẩm <b>Đầm thun hở lưng sành điệu cho bé gái từ 1-7 tuổi</b>', '2019-07-16 09:49:48', 1, 0),
(211, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-16 09:51:59', 1, 0),
(212, ' đã duyệt sản phẩm <b>Sản phẩm test 3</b>', '2019-07-16 09:54:13', 1, 0),
(213, ' đã duyệt sản phẩm <b>Sản phẩm test</b>', '2019-07-16 09:54:14', 1, 0),
(214, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Bộ thun in mắt kính quần legging dễ thương cho bé gái 10 - 15 tuổi BGB118687</b>', '2019-07-16 10:00:31', 1, 0),
(215, ' đã chỉnh sửa sản phẩm <b>Sản phẩm testDSA</b>', '2019-07-16 10:00:39', 1, 0),
(216, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Bộ thun in mắt kính quần legging dễ thương cho bé gái 10 - 15 tuổi BGB118687</b>', '2019-07-16 10:01:03', 1, 0),
(217, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test 3</b>', '2019-07-16 10:01:09', 1, 0),
(218, ' đã chỉnh sửa sản phẩm <b>Bộ thun in chữ V dễ thương cho bé trai 3 - 10 Tuổi BTB20670</b>', '2019-07-16 10:14:57', 1, 0),
(219, ' đã chỉnh sửa sản phẩm <b>[SIZE ĐẠI] Bộ thun in mắt kính quần legging dễ thương cho bé gái 10 - 15 tuổi BGB118687</b>', '2019-07-16 10:15:13', 1, 0),
(220, ' đã chỉnh sửa sản phẩm <b>Bộ thun in chữ V dễ thương cho bé trai 3 - 10 Tuổi BTB20670</b>', '2019-07-16 10:15:21', 1, 0),
(221, ' đã đăng sản phẩm <b>Bộ kate liền quần sọc kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1066</b>', '2019-07-16 10:18:31', 1, 0),
(222, ' đã duyệt sản phẩm <b>Bộ kate liền quần sọc kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1066</b>', '2019-07-16 10:18:46', 1, 0),
(223, ' đã chỉnh sửa sản phẩm <b>Bộ kate liền quần sọc kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1066</b>', '2019-07-16 10:19:06', 1, 0),
(224, ' đã chỉnh sửa sản phẩm <b>Đầm ren công chúa phối lưới dễ thương cho bé gái 3 - 10 tuổi DGB190707</b>', '2019-07-16 10:27:46', 1, 0),
(225, ' đã chỉnh sửa sản phẩm <b>Đầm suông phối ren dễ thương cho bé gái 2 - 9 tuổi DGB191038</b>', '2019-07-16 10:32:20', 1, 0),
(226, ' đã đăng sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-16 11:54:15', 2, 0),
(227, ' đã duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-16 11:54:52', 1, 0),
(228, ' đã tạo slider', '2019-07-16 19:54:15', 1, 0),
(229, ' đã tạo slider', '2019-07-16 19:55:08', 1, 0),
(230, ' đã tạo slider', '2019-07-16 20:02:57', 1, 0),
(231, ' đã xóa slider', '2019-07-16 20:15:48', 1, 0),
(232, ' đã tạo slider', '2019-07-16 20:16:06', 1, 0),
(233, ' đã xóa slider', '2019-07-16 20:18:35', 1, 0),
(234, ' đã chỉnh sửa slider', '2019-07-16 20:24:49', 1, 0),
(235, ' đã chỉnh sửa slider', '2019-07-16 20:25:02', 1, 0),
(236, ' đã chỉnh sửa slider', '2019-07-16 20:25:21', 1, 0),
(237, ' đã chỉnh sửa slider', '2019-07-16 20:25:37', 1, 0),
(238, ' đã chỉnh sửa slider', '2019-07-16 20:27:03', 1, 0),
(239, ' đã chỉnh sửa slider', '2019-07-16 20:27:39', 1, 0),
(240, ' đã chỉnh sửa slider', '2019-07-16 20:27:47', 1, 0),
(241, ' đã chỉnh sửa slider', '2019-07-16 20:29:00', 1, 0),
(242, ' đã chỉnh sửa slider', '2019-07-16 20:29:13', 1, 0),
(243, ' đã chỉnh sửa slider', '2019-07-16 20:29:21', 1, 0),
(244, ' đã tạo slider', '2019-07-16 20:29:37', 1, 0),
(245, ' đã chỉnh sửa slider', '2019-07-16 20:30:57', 1, 0),
(246, ' đã chỉnh sửa slider', '2019-07-16 20:31:21', 1, 0),
(247, ' đã chỉnh sửa slider', '2019-07-16 20:33:33', 1, 0),
(248, ' đã chỉnh sửa slider', '2019-07-16 20:33:43', 1, 0),
(249, ' đã chỉnh sửa slider', '2019-07-16 20:34:46', 1, 0),
(250, ' đã chỉnh sửa slider', '2019-07-16 20:34:55', 1, 0),
(251, ' đã tạo slider', '2019-07-16 20:37:10', 1, 0),
(252, ' đã chỉnh sửa slider', '2019-07-16 21:40:14', 1, 0),
(253, ' đã chỉnh sửa slider', '2019-07-16 21:41:16', 1, 0),
(254, ' đã thay đổi logo', '2019-07-16 21:42:01', 1, 0),
(255, ' đã thay đổi logo', '2019-07-16 21:42:37', 1, 0),
(256, ' đã thay đổi logo', '2019-07-16 21:42:54', 1, 0),
(257, ' đã thay đổi logo', '2019-07-16 21:43:45', 1, 0),
(258, ' đã thay đổi logo', '2019-07-16 21:45:18', 1, 0),
(259, ' đã thay đổi logo', '2019-07-16 21:45:27', 1, 0),
(260, ' đã thay đổi logo', '2019-07-16 22:11:24', 1, 0),
(261, ' đã đăng bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:00:08', 2, 0),
(262, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:00:49', 2, 0),
(263, ' đã duyệt bài <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:01:19', 1, 0),
(264, ' đã tắt duyệt bài <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:01:48', 1, 0),
(265, ' đã duyệt bài <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:01:53', 1, 0),
(266, ' đã tắt duyệt bài <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:03:57', 1, 0),
(267, ' đã duyệt bài <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:04:25', 1, 0),
(268, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:05:32', 1, 0),
(269, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:06:31', 1, 0),
(270, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:06:52', 1, 0),
(271, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:07:11', 1, 0),
(272, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:07:40', 1, 0),
(273, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:26:29', 1, 0),
(274, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 09:35:02', 1, 0),
(275, ' đã xóa loại sản phẩm <b>Sản phẩm nổi bật</b>', '2019-07-17 10:18:29', 1, 0),
(276, ' đã xóa loại sản phẩm <b>Sản phẩm mới về</b>', '2019-07-17 10:50:04', 1, 0),
(277, ' đã chỉnh sửa bài viết <b>Mẹ nhất định phải biết những món ăn tốt cho bà bầu cuối thai kì giúp con khỏe mạnh và thông minh</b>', '2019-07-17 10:56:59', 1, 0),
(278, ' đã chỉnh sửa bài viết <b>Cảnh báo bệnh Lyme từ bọ ve: Cha mẹ chớ nên lơ là kẻo gây nguy hại cho trẻ</b>', '2019-07-17 10:57:08', 1, 0),
(279, ' đã chỉnh sửa bài viết <b>Mẹ không cần giỏi nhưng vẫn có thể dạy con học tiếng Anh dễ dàng chỉ với 3 cách</b>', '2019-07-17 10:57:20', 1, 0),
(280, ' đã chỉnh sửa bài viết <b>Muốn bé yêu có làn da trắng đẹp, mẹ bầu nhất định phải dùng những thực phẩm này</b>', '2019-07-17 10:57:31', 1, 0),
(281, ' đã xóa loại bài viết <b>Hướng dẫn phối đồ</b>', '2019-07-17 11:43:26', 1, 0),
(282, ' đã đăng sản phẩm <b>Bộ liền quần chấm bi kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1065</b>', '2019-07-18 08:35:50', 1, 0),
(283, ' đã chỉnh sửa sản phẩm <b>Bộ liền quần chấm bi kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1065</b>', '2019-07-18 08:36:03', 1, 0),
(284, ' đã duyệt sản phẩm <b>Bộ liền quần chấm bi kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1065</b>', '2019-07-18 08:36:21', 1, 0),
(285, ' đã chỉnh sửa sản phẩm <b>Bộ kate liền quần sọc kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1066</b>', '2019-07-18 09:00:25', 1, 0),
(286, ' đã chỉnh sửa sản phẩm <b>Bộ kate liền quần sọc kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1066</b>', '2019-07-18 09:06:38', 1, 0),
(287, ' đã đăng sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 09:22:38', 1, 0),
(288, ' đã duyệt sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 09:22:42', 1, 0),
(289, ' đã đăng sản phẩm <b>Set váy yếm kaki kèm áo sọc visco dễ thương cho bé gái 2 - 9 tuổi BGB118690</b>', '2019-07-18 09:27:37', 1, 0),
(290, ' đã duyệt sản phẩm <b>Set váy yếm kaki kèm áo sọc visco dễ thương cho bé gái 2 - 9 tuổi BGB118690</b>', '2019-07-18 09:27:39', 1, 0),
(291, ' đã tắt duyệt sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 15:09:27', 1, 0),
(292, ' đã duyệt sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 15:09:28', 1, 0),
(293, ' đã tắt duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-18 15:20:48', 1, 0),
(294, ' đã duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-18 15:21:49', 1, 0),
(295, ' đã xóa loại sản phẩm <b></b>', '2019-07-18 15:30:35', 1, 0),
(296, ' đã tắt duyệt sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 15:31:25', 1, 0),
(297, ' đã tắt duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-18 15:32:13', 1, 0),
(298, ' đã duyệt sản phẩm <b>Set vest kaki phong cách Hàn Quốc dễ thương cho bé trai từ 3 - 12 Tuổi BTB19875</b>', '2019-07-18 15:38:59', 1, 0),
(299, ' đã duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-18 16:54:55', 1, 0),
(300, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:16:38', 1, 0),
(301, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:17:03', 1, 0),
(302, ' đã duyệt sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:25:20', 1, 0),
(303, ' đã xóa sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:37:45', 1, 0),
(304, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:39:54', 1, 0),
(305, ' đã xóa sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:41:29', 1, 0),
(306, ' đã tạo loại sản phẩm <b>Loại sản phẩm test</b>', '2019-07-19 08:45:34', 1, 0),
(307, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:45:57', 1, 0),
(308, ' đã duyệt sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:46:12', 1, 0),
(309, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:46:32', 1, 0),
(310, ' đã tắt duyệt sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:46:34', 1, 0),
(311, ' đã duyệt sản phẩm <b>Sản phẩm test</b>', '2019-07-19 08:47:48', 1, 0),
(312, ' đã đăng sản phẩm <b>Sản phẩm test 2</b>', '2019-07-19 08:52:10', 1, 0),
(313, ' đã xóa loại sản phẩm <b>Loại sản phẩm test</b>', '2019-07-19 09:09:30', 1, 0),
(314, ' đã tạo loại sản phẩm <b>loại test</b>', '2019-07-19 09:10:43', 1, 0),
(315, ' đã đăng sản phẩm <b>test</b>', '2019-07-19 09:11:05', 1, 0),
(316, ' đã xóa loại sản phẩm <b>loại test</b>', '2019-07-19 09:12:01', 1, 0),
(317, ' đã tạo loại sản phẩm <b>Loại test</b>', '2019-07-19 09:13:01', 1, 0),
(318, ' đã chỉnh sửa sản phẩm <b>test</b>', '2019-07-19 09:13:15', 1, 0),
(319, ' đã xóa loại sản phẩm <b>Loại test</b>', '2019-07-19 09:13:22', 1, 0),
(320, ' đã tạo loại sản phẩm <b>Loại test nè</b>', '2019-07-19 09:13:41', 1, 0),
(321, ' đã đăng sản phẩm <b>Loại test</b>', '2019-07-19 09:14:16', 1, 0),
(322, ' đã xóa loại sản phẩm <b>Loại test nè</b>', '2019-07-19 09:14:52', 1, 0),
(323, ' đã chỉnh sửa bài viết <b>Muốn bé yêu có làn da trắng đẹp, mẹ bầu nhất định phải dùng những thực phẩm này</b>', '2019-07-19 09:47:03', 1, 0),
(324, ' đã tạo loại bài viết <b>Bài test</b>', '2019-07-19 10:35:25', 1, 0),
(325, ' đã đăng bài viết <b>Bài test 1</b>', '2019-07-19 10:38:46', 1, 0),
(326, ' đã chỉnh sửa bài viết <b>Bài test 1</b>', '2019-07-19 10:38:53', 1, 0),
(327, ' đã đăng bài viết <b>Bài test 2</b>', '2019-07-19 10:39:02', 1, 0),
(328, ' đã chỉnh sửa bài viết <b>Bài test 2</b>', '2019-07-19 10:39:16', 1, 0),
(329, ' đã xóa loại bài viết <b>Bài test</b>', '2019-07-19 10:45:44', 1, 0),
(330, ' đã tạo loại bài viết <b>Bài test</b>', '2019-07-19 10:46:54', 1, 0),
(331, ' đã đăng bài viết <b>Bài test</b>', '2019-07-19 10:47:24', 1, 0),
(332, ' đã đăng bài viết <b>Bài test 2</b>', '2019-07-19 10:47:40', 1, 0),
(333, ' đã xóa loại bài viết <b>Bài test</b>', '2019-07-19 10:47:50', 1, 0),
(334, ' đã xóa bài viết: <b>Bài test 2</b>', '2019-07-19 10:48:11', 1, 0),
(335, ' đã chỉnh sửa sản phẩm <b>Bộ liền quần chấm bi kèm BĂNG ĐÔ và GIÀY dễ thương cho bé 0 - 15 tháng SLG1065</b>', '2019-07-19 19:45:21', 1, 0),
(336, ' đã tắt duyệt sản phẩm <b>Set váy yếm kaki kèm áo sọc visco dễ thương cho bé gái 2 - 9 tuổi BGB118690</b>', '2019-07-20 14:18:06', 1, 0),
(337, ' đã tắt duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-20 14:18:38', 1, 0),
(338, ' đã duyệt sản phẩm <b>Set váy yếm kaki kèm áo sọc visco dễ thương cho bé gái 2 - 9 tuổi BGB118690</b>', '2019-07-20 14:18:40', 1, 0),
(339, ' đã hủy đơn hàng <b></b>', '2019-07-20 17:25:58', 1, 0),
(340, ' đã hủy đơn hàng <b></b>', '2019-07-20 17:26:30', 1, 0),
(341, ' đã hủy đơn hàng <b>INV03</b>', '2019-07-20 17:27:45', 1, 0),
(342, ' đã hủy đơn hàng <b>INV02</b>', '2019-07-20 17:28:07', 1, 0),
(343, ' đã xác nhận đơn hàng <b>INV01</b>', '2019-07-20 17:51:14', 1, 0),
(344, ' đã xác nhận đơn hàng <b>INV02</b>', '2019-07-20 18:11:17', 1, 0),
(345, ' đã hủy đơn hàng <b>INV02</b>', '2019-07-20 18:35:45', 1, 0),
(346, ' đã hủy đơn hàng <b>INV02</b>', '2019-07-20 18:42:42', 1, 0),
(347, ' đã xác nhận đơn hàng <b>INV02</b>', '2019-07-20 18:43:22', 1, 0),
(348, ' đã hủy đơn hàng <b>INV02</b>', '2019-07-20 18:43:35', 1, 0),
(349, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV01</b>', '2019-07-20 18:54:54', 1, 0),
(350, ' đã xác nhận đơn hàng <b>INV02</b>', '2019-07-20 19:01:38', 1, 0),
(351, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV02</b>', '2019-07-20 19:03:59', 1, 0),
(352, ' đã hủy đơn hàng <b>INV03</b>', '2019-07-20 19:07:10', 1, 0),
(353, ' đã xác nhận đơn hàng <b>INV03</b>', '2019-07-20 19:08:29', 1, 0),
(354, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV03</b>', '2019-07-20 19:08:50', 1, 0),
(355, ' đã xác nhận đơn hàng <b>INV05</b>', '2019-07-20 19:12:56', 1, 0),
(356, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV05</b>', '2019-07-20 19:22:00', 1, 0),
(357, ' đã xác nhận đơn hàng <b>INV06</b>', '2019-07-20 19:26:17', 1, 0),
(358, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV06</b>', '2019-07-20 19:26:36', 1, 0),
(359, ' đã xác nhận đơn hàng <b>INV07</b>', '2019-07-20 19:27:11', 1, 0),
(360, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV07</b>', '2019-07-20 19:30:27', 1, 0),
(361, ' đã xác nhận đơn hàng <b>INV04</b>', '2019-07-20 19:30:46', 1, 0),
(362, ' đã thu hồi đơn hàng <b></b>', '2019-07-20 19:37:09', 1, 0),
(363, ' đã thu hồi đơn hàng <b>INV04</b>', '2019-07-20 19:38:48', 1, 0),
(364, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV04</b>', '2019-07-20 19:39:36', 1, 0),
(365, ' đã hủy đơn hàng <b>INV08</b>', '2019-07-20 19:44:21', 1, 0),
(366, ' đã hủy đơn hàng <b>INV08</b>', '2019-07-20 19:46:23', 1, 0),
(367, ' đã xác nhận đơn hàng <b>INV08</b>', '2019-07-20 19:46:55', 1, 0),
(368, ' đã hủy đơn hàng <b>INV08</b>', '2019-07-20 19:47:15', 1, 0),
(369, ' đã xác nhận đơn hàng <b>INV08</b>', '2019-07-20 19:47:47', 1, 0),
(370, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV08</b>', '2019-07-20 19:47:58', 1, 0),
(371, ' đã xác nhận đơn hàng <b>INV09</b>', '2019-07-20 19:49:06', 1, 0),
(372, ' đã thu hồi đơn hàng <b>INV09</b>', '2019-07-20 19:49:18', 1, 0),
(373, ' đã hủy đơn hàng <b>INV09</b>', '2019-07-20 19:49:28', 1, 0),
(374, ' đã xác nhận đơn hàng <b>INV09</b>', '2019-07-20 19:50:06', 1, 0),
(375, ' đã thu hồi đơn hàng <b>INV09</b>', '2019-07-20 19:50:14', 1, 0),
(376, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV09</b>', '2019-07-20 19:50:21', 1, 0),
(377, ' đã xác nhận đơn hàng <b>INV10</b>', '2019-07-20 21:03:50', 1, 0),
(378, ' đã xác nhận vận chuyển thành công đơn hàng <b>INV10</b>', '2019-07-20 21:04:01', 1, 0),
(379, ' đã xác nhận đơn hàng <b>INV11</b>', '2019-07-23 10:43:34', 1, 0),
(380, ' đã hủy đơn hàng <b>INV12</b>', '2019-07-23 10:43:41', 1, 0),
(381, ' đã duyệt sản phẩm <b>Set bơi người nhện dễ thương cho bé trai 3 - 10 tuổi BTB20381</b>', '2019-07-23 10:57:02', 1, 0),
(382, ' đã tạo thông tin liên hệ', '2019-07-23 11:36:34', 1, 0),
(383, ' đã tạo thông tin liên hệ', '2019-07-23 11:37:02', 1, 0),
(384, ' đã tạo thông tin liên hệ', '2019-07-23 11:37:09', 1, 0),
(385, ' đã xóa loại thông tin liên hệ', '2019-07-23 11:41:56', 1, 0),
(386, ' đã tạo thông tin liên hệ', '2019-07-23 11:42:07', 1, 0),
(387, ' đã xóa loại thông tin liên hệ', '2019-07-23 11:44:54', 1, 0),
(388, ' đã tạo thông tin liên hệ', '2019-07-23 11:44:59', 1, 0),
(389, ' đã chỉnh sửa thông tin liên hệ', '2019-07-23 11:52:27', 1, 0),
(390, ' đã thu hồi đơn hàng <b>INV11</b>', '2019-07-23 12:58:48', 1, 0),
(391, ' đã xác nhận đơn hàng <b>INV12</b>', '2019-07-23 13:02:29', 1, 0),
(392, ' đã thay đổi logo', '2019-07-24 08:03:43', 1, 0),
(393, ' đã đăng sản phẩm <b>Sản \"phẩm\" test</b>', '2019-07-26 09:58:28', 1, 0),
(394, ' đã xóa sản phẩm <b>Sản \"phẩm\" test</b>', '2019-07-26 09:58:35', 1, 0),
(395, ' đã đăng sản phẩm <b>Sản \"phẩm\" test</b>', '2019-07-26 09:58:57', 1, 0),
(396, ' đã duyệt sản phẩm <b>Sản \"phẩm\" test</b>', '2019-07-26 09:59:22', 1, 0),
(397, ' đã chỉnh sửa sản phẩm <b>Sản \"phẩm\" testdsadsa</b>', '2019-07-26 10:02:33', 1, 0),
(398, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-26 10:03:06', 1, 0),
(399, ' đã chỉnh sửa sản phẩm <b>Sản phẩm test</b>', '2019-07-26 10:12:59', 1, 0),
(400, ' đã chỉnh sửa sản phẩm <b>SDSADSA</b>', '2019-07-26 10:13:21', 1, 0),
(401, ' đã chỉnh sửa sản phẩm <b>dsadsa</b>', '2019-07-26 10:14:00', 1, 0),
(402, ' đã xóa sản phẩm <b>dsadsa</b>', '2019-07-26 10:14:05', 1, 0),
(403, ' đã đăng sản phẩm <b>Sản phẩm test</b>', '2019-07-26 10:15:28', 1, 0),
(404, ' đã xóa sản phẩm <b>Sản phẩm test</b>', '2019-07-26 10:15:32', 1, 0),
(405, ' đã chỉnh sửa bài viết <b>Khi bé yêu 6 tháng tuổi, mẹ nhớ \"note\" ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-26 10:17:43', 1, 0),
(406, ' đã chỉnh sửa bài viết <b>Khi bé yêu 6 tháng tuổi, mẹ nhớ \"note\" ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-26 10:18:51', 1, 0),
(407, ' đã chỉnh sửa bài viết <b>Khi bé yêu 6 tháng tuổi,,,, mẹ nhớ note ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-26 10:20:05', 1, 0),
(408, ' đã chỉnh sửa bài viết <b>Khi bé yêu 6 tháng tuổi, mẹ nhớ note ngay những loại thực phẩm giúp con phát triển vượt trội</b>', '2019-07-26 10:20:28', 1, 0),
(409, ' đã tạo loại sản phẩm <b>Giới thiệu</b>', '2019-07-26 11:00:47', 1, 0),
(410, ' đã tạo loại sản phẩm <b>Liên hệ</b>', '2019-07-26 11:00:56', 1, 0),
(411, ' đã xóa loại sản phẩm <b>Liên hệ</b>', '2019-07-26 11:01:17', 1, 0),
(412, ' đã xóa loại sản phẩm <b>Giới thiệu</b>', '2019-07-26 11:01:21', 1, 0),
(413, ' đã tạo loại bài viết <b>Giới thiệu</b>', '2019-07-26 11:01:34', 1, 0),
(414, ' đã tạo loại bài viết <b>Liên hệ</b>', '2019-07-26 11:01:39', 1, 0),
(415, ' đã đăng bài viết <b>Giới thiệu</b>', '2019-07-26 11:02:15', 1, 0),
(416, ' đã duyệt bài <b>Giới thiệu</b>', '2019-07-26 11:02:19', 1, 0),
(417, ' đã đăng bài viết <b>Liên hệ</b>', '2019-07-26 11:03:19', 1, 0),
(418, ' đã duyệt bài <b>Liên hệ</b>', '2019-07-26 11:03:21', 1, 0),
(419, ' đã chỉnh sửa slider', '2019-07-26 11:27:53', 1, 0),
(420, ' đã chỉnh sửa slider', '2019-07-26 11:27:58', 1, 0),
(421, ' đã chỉnh sửa slider', '2019-07-26 11:28:02', 1, 0);

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
('INV01', 6, 'Nhà trọ Bảo Xuyên, ấp Vĩnh Thuận, xã Vĩnh Hòa Hiệp, Châu Thành, Kiên Giang', 'Màu đỏ, size M, 28kg', '2019-07-20 11:06:26', 2),
('INV14', 6, 'ABC ', 'ABC', '2019-07-26 17:47:42', 0);
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
(1, 'logo12.PNG', 'trang-chu.html', '2019-07-24 08:03:43');

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
  `content` text COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `product` (`sku_product`, `image`, `name_product`, `slug`, `summary`, `content`, `date_upload`, `author`, `qty`, `price`, `highlight`, `view`, `id_type`, `flag`) VALUES
('S01', 'nhungtamlongcaoca.jpg', 'Những Tấm Lòng Cao Cả', 'Nhung-Tam-Long-Cao-Ca', 'Truyện kể về cuộc đời của cậu bé với những bài học về cuộc sống', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product4-1.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product4.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product4-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product4-3.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Cách bảo quản</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nơi khô thoáng</p>\r\n\r\n', '2019-07-15 11:24:22', 1, 118, 125000, 1, 25, 1, 1),
('S03', 'nguvan6.jpg', 'Ngữ Văn lớp 6', 'Sach-day-ngu-van', 'Sách dạy môn ngữ văn lớp 6', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product3.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product3-1.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product3-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product3-3.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nơi không có nước</p>\r\n\r\n', '2019-07-15 21:30:04', 1, 160, 150000, 1, 41, 7, 1),
('S06', 'toanlop4.jpg', 'Toán lớp 4', 'Toan-Lop-4', 'Sách dạy toán lớp 4', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product7-1.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product7.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product7-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bảo quản nơi khô thoáng </p>\r\n\r\n', '2019-07-15 22:47:58', 1, 20, 79000, 0, 65, 7, 1),
('S07', 'mt2.jpg', 'Mỹ thuật lớp 2', 'Sach-day-ve-lop-2', 'Sách dạy vẽ', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product2-1.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product2-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nơi khô</p>\r\n\r\n', '2019-07-15 23:26:39', 1, 200, 139000, 0, 27, 7, 1),
('S08', 'tv1.jpg', 'Tiếng Việt Lớp 1', 'Sach-tieng-viet-1', 'Sách tiếng việt lớp 1', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product6-1.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product6-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product6.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bảo quản nới khô</p>\r\n\r\n', '2019-07-15 23:27:12', 1, 40, 145000, 0, 24, 7, 1),
('S09', 'toanlop3.jpg', 'Toán lớp 3', 'Sach-day-toan-lop-3', 'Là sách', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product1-1.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product1-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product1.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nới khô không nước</p>\r\n\r\n', '2019-07-16 08:46:08', 2, 99, 145000, 1, 73, 7, 1),
('S10', 'abc.jpg', 'ABC', 'Sach ABC', 'Sách dạy tiếng anh', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product5.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nơi khô thoáng</p>\r\n\r\n', '2019-07-16 10:18:31', 1, 199, 139000, 1, 46, 10, 1),
('S11', 'chientranh.jpg', 'Chiến Tranh và Hòa Bình', 'Sach hay', 'Sách nói về chiến tranh và hòa bình', '<h3 style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product8.jpg\" style=\"width:70%\" /></h3>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bảo quản nơi khô không có nước</p>\r\n\r\n', '2019-07-16 11:54:15', 2, 49, 149000, 1, 58, 1, 1),
('S12', 'english1.jpg', 'English for you', 'Bo-sach-giup-hoc-tieng-anh', 'ABCDF', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/banner_project_4.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Để nơi khô thoáng</p>\r\n\r\n', '2019-07-18 08:35:50', 1, 298, 119000, 1, 13, 10, 1),
('S13', 'pt.jpg', 'aaa', 'Sach-phia-tay', 'Sách hay', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product9-1.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product9.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product9-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product9-3.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product9-4.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bảo quản nơi khô ráo</p>\r\n\r\n', '2019-07-18 09:22:38', 1, 395, 145000, 1, 135, 12, 1),
('S14', 'toanlop2.jpg', 'Toán Lớp 2', 'Sach-day-toan-lop-2', 'Sách dạy học toán lớp 2', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product10-1.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product10-2.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product10.jpg\" style=\"width:70%\" /></p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/nienluan/ckfinder/userfiles/images/product10-3.jpg\" style=\"width:70%\" /></p>\r\n\r\n<h3 style=\"text-align:justify\"><strong>Bảo quản sách</strong></h3>\r\n\r\n<p style=\"text-align:justify\">Bảo quản nới khô ráo</p>\r\n\r\n', '2019-07-18 09:27:37', 1, 91, 180000, 1, 177, 12, 1);

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
(4, '113.jpg', 'trang-chu.html', '2019-07-16 20:16:06'),
(5, '113.jpg', 'trang-chu.html', '2019-07-16 20:29:37'),
(6, '113.jpg', 'trang-chu.html', '2019-07-16 20:37:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_blog`
--

CREATE TABLE `type_blog` (
  `id_type` int(11) NOT NULL,
  `typename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_blog`
--

INSERT INTO `type_blog` (`id_type`, `typename`, `slug_type`, `date_create`) VALUES
(1, 'Khuyến mãi', 'Khuyen-mai', '2019-07-12 13:13:23'),
(2, 'Tin tức mới', 'Tin-tuc-moi', '2019-07-12 13:17:04'),
(8, 'Chia sẽ kinh nghiệm', 'Chia-se-kinh-nghiem', '2019-07-12 20:58:41'),
(25, 'Giới thiệu', 'Gioi-thieu', '2019-07-26 11:01:34'),
(26, 'Liên hệ', 'Lien-he', '2019-07-26 11:01:39');

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
(1, 'Sách Tiểu Thuyết', 'Sach-tieu-thuyet', '2019-07-12 12:10:15'),
(7, 'Sách Giáo Khoa', 'Sach-giao-khoa', '2019-07-12 12:39:00'),
(10, 'Sách Tiếng Anh', 'Sach-tieng-anh', '2019-07-12 13:18:23'),
(12, 'Sách hay', 'Sach-hay', '2019-07-12 13:38:23');

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
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

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
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

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
ALTER TABLE `type_blog`
  ADD PRIMARY KEY (`id_type`);

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
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

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
ALTER TABLE `type_blog`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
