-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2025 lúc 06:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_phone` varchar(20) NOT NULL,
  `account_type` int(11) NOT NULL,
  `account_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `account_password`, `account_email`, `account_phone`, `account_type`, `account_status`) VALUES
(23, 'Admin', '123456', 'admin@gmail.com', '', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `article_link` varchar(255) NOT NULL,
  `article_author` varchar(100) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_summary` text NOT NULL,
  `article_content` text NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_date` date NOT NULL,
  `article_status` int(11) NOT NULL DEFAULT 0,
  `article_tab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`article_link`, `article_author`, `article_title`, `article_summary`, `article_content`, `article_image`, `article_date`, `article_status`, `article_tab`) VALUES
('abc', 'Admin', 'aaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaa</p>\r\n', '<p>aaaaaaaaaaaaaaaaa</p>\r\n', '1739458723_windown11.jpg', '2025-02-13', 1, 'tintuc'),
('windown11-pro-rosa-office-nen-tang-cong-nghe-dot-pha-cho-doanh-nghiep-hien-dai.php', 'Admin', 'Windows 11 Pro & Rosa Office: Nền Tảng Công Nghệ Đột Phá Cho Doanh Nghiệp Hiện Đại', '<h1>&nbsp;</h1>\r\n\r\n<p>Trong thời đại số h&oacute;a, việc lựa chọn phần mềm v&agrave; thiết bị c&ocirc;ng nghệ tối ưu l&agrave; yếu tố then chốt gi&uacute;p doanh nghiệp n&acirc;ng cao năng suất v&agrave; bảo vệ dữ liệu. Windows 11 Pro kết hợp c&ugrave;ng m&aacute;y bộ Rosa Office Ⅰ kh&ocirc;ng chỉ mang đến trải nghiệm l&agrave;m việc mượt m&agrave;, an to&agrave;n m&agrave; c&ograve;n l&agrave; giải ph&aacute;p to&agrave;n diện cho mọi quy m&ocirc; doanh nghiệp.</p>\r\n\r\n<p><img alt=\"\" src=\"https://rosacomputer.vn/assets/upload/news/windown11.jpg\" style=\"height:650px; margin-left:100px; margin-right:100px; width:650px\" /></p>\r\n\r\n<p><strong>Tổng Quan Về M&aacute;y Bộ Rosa Office Ⅰ: Hiệu Suất Vượt Trội, Bảo Mật Tối Ưu</strong></p>\r\n\r\n<p><strong>Rosa Office Ⅰ&nbsp;</strong>l&agrave; hệ thống m&aacute;y t&iacute;nh văn ph&ograve;ng được thiết kế d&agrave;nh ri&ecirc;ng cho m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp. Sản phẩm nổi bật với những ưu điểm:</p>\r\n\r\n<p><strong>&bull; Giao diện đa nhiệm mượt m&agrave;:&nbsp;</strong>Tối ưu h&oacute;a hiệu suất xử l&yacute; đa t&aacute;c vụ, ph&ugrave; hợp với nhu cầu l&agrave;m việc cường độ cao..</p>\r\n\r\n<p><strong>&bull; Bảo mật dữ liệu đa lớp:&nbsp;</strong>Hỗ trợ m&atilde; h&oacute;a th&ocirc;ng tin, ngăn chặn rủi ro r&ograve; rỉ dữ liệu nhạy cảm.</p>\r\n\r\n<p><strong>&bull; Hỗ trợ truy cập từ xa:&nbsp;</strong>Linh hoạt kết nối v&agrave; l&agrave;m việc mọi l&uacute;c, mọi nơi nhờ t&iacute;ch hợp c&ocirc;ng nghệ đ&aacute;m m&acirc;y.</p>\r\n\r\n<p><strong>&bull; Cấu h&igrave;nh ổn định:&nbsp;</strong>Đảm bảo vận h&agrave;nh trơn tru, hạn chế tối đa lỗi hệ thống.</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<p>Với&nbsp;<strong>Windows 11 Pro</strong>&nbsp;được c&agrave;i đặt sẵn, Rosa Office Ⅰ trở th&agrave;nh &ldquo;trợ thủ đắc lực&rdquo; gi&uacute;p doanh nghiệp ho&agrave;n th&agrave;nh c&ocirc;ng việc nhanh ch&oacute;ng, chuy&ecirc;n nghiệp v&agrave; an to&agrave;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://rosacomputer.vn/assets/upload/news/case_cpc_right_.jpg\" style=\"height:650px; margin-left:100px; margin-right:100px; width:650px\" /></p>\r\n\r\n<p><strong>V&igrave; Sao N&ecirc;n Chọn Windows 11 Pro Ch&iacute;nh H&atilde;ng Thay V&igrave; Phần Mềm Giả Mạo?</strong></p>\r\n\r\n<p>Nhiều người lựa chọn phần mềm &ldquo;gi&aacute; rẻ&rdquo; để tiết kiệm chi ph&iacute;, nhưng đ&acirc;y lại l&agrave;&nbsp;<strong>khoản đầu tư rủi ro</strong>&nbsp;với hậu quả kh&oacute; lường:</p>\r\n\r\n<p><strong>1. Nguy cơ mất dữ liệu h&agrave;ng đầu:&nbsp;</strong>68% m&aacute;y t&iacute;nh d&ugrave;ng Windows Pro kh&ocirc;ng ch&iacute;nh h&atilde;ng dễ nhiễm m&atilde; độc, virus hoặc phần mềm gi&aacute;n điệp, đe dọa th&ocirc;ng tin t&agrave;i ch&iacute;nh, kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p><strong>2. Chi ph&iacute; ph&aacute;t sinh cao:&nbsp;</strong>Sử dụng phần mềm lậu khiến doanh nghiệp tốn trung b&igrave;nh 663 USD/m&aacute;y trong v&ograve;ng đời sử dụng, cao hơn 100 USD so với d&ugrave;ng bản quyền (563 USD).</p>\r\n\r\n<p><strong>3. Thiếu hỗ trợ kỹ thuật:&nbsp;</strong>Kh&ocirc;ng nhận được bản cập nhật bảo mật từ Microsoft, hệ thống dễ bị tấn c&ocirc;ng mạng v&agrave; lỗi vận h&agrave;nh.</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<p>Theo b&aacute;o c&aacute;o từ Microsoft, 4 tỷ USD l&agrave; tổn thất ước t&iacute;nh to&agrave;n cầu do phần mềm giả mạo g&acirc;y ra. Do đ&oacute;, đầu tư v&agrave;o Windows 11 Pro ch&iacute;nh h&atilde;ng kh&ocirc;ng chỉ tiết kiệm chi ph&iacute; l&acirc;u d&agrave;i m&agrave; c&ograve;n bảo vệ doanh nghiệp khỏi rủi ro ph&aacute;p l&yacute; v&agrave; uy t&iacute;n.</p>\r\n\r\n<p><strong>L&yacute; Do Windows 11 Pro Lựa Chọn H&agrave;ng Đầu Cho Doanh Nghiệp</strong></p>\r\n\r\n<p>1. Bảo Mật Đa Tầng, Bảo Vệ To&agrave;n Diện</p>\r\n\r\n<p><strong>&bull; BitLocker:&nbsp;</strong>M&atilde; h&oacute;a to&agrave;n bộ ổ cứng, ngăn chặn truy cập tr&aacute;i ph&eacute;p ngay cả khi thiết bị bị đ&aacute;nh cắp.</p>\r\n\r\n<p><strong>&bull; Windows Defender &amp; Secure Boot:&nbsp;</strong>Qu&eacute;t virus thời gian thực, chặn phần mềm độc hại từ l&uacute;c khởi động.</p>\r\n\r\n<p><strong>&bull; Windows Sandbox:&nbsp;</strong>Tạo m&ocirc;i trường ảo an to&agrave;n để kiểm tra file nghi ngờ hoặc phần mềm mới.</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<h2>2. Tối Ưu Hiệu Suất Với C&ocirc;ng Nghệ Hiện Đại</h2>\r\n\r\n<p><strong>&bull; Snap Layouts &amp; Snap Groups:&nbsp;</strong>Quản l&yacute; đa cửa sổ th&ocirc;ng minh, tăng 40% hiệu suất l&agrave;m việc.</p>\r\n\r\n<p><strong>&bull; Microsoft Teams t&iacute;ch hợp:&nbsp;</strong>Họp trực tuyến, chia sẻ m&agrave;n h&igrave;nh ngay từ thanh Taskbar.</p>\r\n\r\n<p><strong>&bull; OneDrive đồng bộ đ&aacute;m m&acirc;y</strong>Lưu trữ v&agrave; truy cập dữ liệu từ xa tr&ecirc;n mọi thiết bị</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<h2>3. C&ocirc;ng Cụ Quản L&yacute; Doanh Nghiệp Chuy&ecirc;n S&acirc;u</h2>\r\n\r\n<p><strong>&bull; Azure Active Directory:&nbsp;</strong>Đăng nhập tập trung v&agrave;o tất cả ứng dụng, giảm rủi ro mất mật khẩu.</p>\r\n\r\n<p><strong>&bull; Remote Desktop:&nbsp;</strong>Truy cập m&aacute;y t&iacute;nh văn ph&ograve;ng từ xa an to&agrave;n, ph&ugrave; hợp với m&ocirc; h&igrave;nh Hybrid Work.</p>\r\n\r\n<p><strong>&bull; Hyper-V:&nbsp;</strong>Chạy m&aacute;y ảo để thử nghiệm phần mềm m&agrave; kh&ocirc;ng ảnh hưởng hệ thống ch&iacute;nh.</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<p><strong>Kết Hợp Windows 11 Pro &amp; Rosa Office Ⅰ: N&acirc;ng Tầm Trải Nghiệm C&ocirc;ng Nghệ</strong></p>\r\n\r\n<h2>4. C&ocirc;ng Cụ Quản L&yacute; Doanh Nghiệp Chuy&ecirc;n S&acirc;u</h2>\r\n\r\n<p>M&aacute;y bộ Rosa Office được trang bị sẵn Windows 11 Pro ch&iacute;nh h&atilde;ng, mang đến giải ph&aacute;p trọn g&oacute;i cho doanh nghiệp:</p>\r\n\r\n<p><strong>&bull; Tiết kiệm thời gian:&nbsp;</strong>Kh&ocirc;ng cần c&agrave;i đặt phần mềm, sẵn s&agrave;ng sử dụng ngay.</p>\r\n\r\n<p><strong>&bull; Tối ưu chi ph&iacute;: :&nbsp;</strong>Tr&aacute;nh rủi ro từ phần mềm giả mạo, tập trung nguồn lực cho kinh doanh.</p>\r\n\r\n<p><strong>&bull; Hỗ trợ kỹ thuật 24/7:&nbsp;</strong>Đội ngũ chuy&ecirc;n gia h&agrave;ng đầu của thương hiệu m&aacute;y bộ Rosa lu&ocirc;n sẵn s&agrave;ng xử l&yacute; sự cố.</p>\r\n\r\n<ol>\r\n</ol>\r\n\r\n<p><strong>Kết luận</strong></p>\r\n\r\n<p><strong>Windows 11 Pro v&agrave; m&aacute;y bộ Rosa Office Ⅰ&nbsp;</strong>l&agrave; sự kết hợp ho&agrave;n hảo giữa phần mềm v&agrave; phần cứng, gi&uacute;p doanh nghiệp tối ưu hiệu suất, bảo mật dữ liệu v&agrave; tiết kiệm chi ph&iacute; l&acirc;u d&agrave;i. Đừng để phần mềm giả mạo trở th&agrave;nh &ldquo;g&oacute;t ch&acirc;n Achilles&rdquo; ph&aacute; hủy th&agrave;nh quả của bạn &ndash; h&atilde;y đầu tư th&ocirc;ng minh với c&ocirc;ng nghệ ch&iacute;nh h&atilde;ng ngay h&ocirc;m nay!</p>\r\n\r\n<p>Li&ecirc;n hệ ngay để được tư vấn về Windows 11 Pro v&agrave; m&aacute;y bộ Rosa Office Ⅰ!</p>\r\n\r\n<ul>\r\n	<li>Tags:</li>\r\n	<li><a href=\"https://rosacomputer.vn/tintuc/windown11-pro-rosa-office-nen-tang-cong-nghe-dot-pha-cho-doanh-nghiep-hien-dai.php\">#Windows11Pro</a></li>\r\n	<li><a href=\"https://rosacomputer.vn/tintuc/windown11-pro-rosa-office-nen-tang-cong-nghe-dot-pha-cho-doanh-nghiep-hien-dai.php\">#RosaOffice</a></li>\r\n	<li><a href=\"https://rosacomputer.vn/tintuc/windown11-pro-rosa-office-nen-tang-cong-nghe-dot-pha-cho-doanh-nghiep-hien-dai.php\">#PhầnMềmCh&iacute;nhH&atilde;ng</a></li>\r\n	<li><a href=\"https://rosacomputer.vn/tintuc/windown11-pro-rosa-office-nen-tang-cong-nghe-dot-pha-cho-doanh-nghiep-hien-dai.php\">#BảoMậtDoanhNghiệp</a></li>\r\n</ul>\r\n', '<h2>Trong thời đại số h&oacute;a, việc lựa chọn phần mềm v&agrave; thiết bị c&ocirc;ng nghệ tối ưu l&agrave; yếu tố then chốt gi&uacute;p doanh nghiệp n&acirc;ng cao năng suất v&agrave; bảo vệ dữ liệu. Windows 11 Pro kết hợp c&ugrave;ng m&aacute;y bộ Rosa Office Ⅰ kh&ocirc;ng chỉ mang đến trải nghiệm l&agrave;m việc mượt m&agrave;, an to&agrave;n m&agrave; c&ograve;n l&agrave; giải ph&aacute;p to&agrave;n diện cho mọi quy m&ocirc; doanh nghiệp.</h2>\r\n', '1739461033_windown11.jpg', '2025-02-13', 1, 'win 11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order` text NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  `delivery_address` varchar(500) DEFAULT NULL,
  `customer_note` varchar(1000) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `formatted_order_id` text DEFAULT NULL,
  `order_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `order`, `customer_name`, `customer_phone`, `customer_email`, `shipping_method`, `delivery_address`, `customer_note`, `status`, `formatted_order_id`, `order_date`) VALUES
(81, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA OFFICE â… </b></big><br>CPU: AMD Ryzen 3 Pro 4350G<br>MAIN: ASUS PRIME A520M-K D4<br>RAM: LEXAR 8G 3200MHz DDR4<br>SSD: LEXAR 256G SATA<br>CASE: ROSA CPC-C09 MATX<br>PSU: ROSA ATX650 (450W)<br>Há»‡ Äiá»u HÃ nh: Windows 11 Pro<br>Phá»¥ Kiá»‡n: ROSA V100 PhÃ­m & Chuá»™t<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>AOC 22â€ (22B30HM23/74)<br>Pháº³ng - FHD - VA - 120Hz - 1ms - 1xDsub - 1x HDMI </b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>Voucher GOT IT trá»‹ giÃ¡ 400K!</b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 7,490,000Ä‘ x 1<br>= 7,490,000Ä‘</b></big></span></div>', 'hinhbui', '0913920316', 'hinhbui@hotmail.com', 'store', 'CÃ”NG TY TNHH TMDV TIN Há»ŒC LONG BÃŒNH<br>50 Ä. Nguyá»…n CÆ° Trinh, PhÆ°á»ng Pháº¡m NgÅ© LÃ£o, Quáº­n 1, Há»“ ChÃ­ Minh', '', 'Äang rÃ¡p mÃ¡y', '28122408505381', '28-12-2024 08:50:53'),
(102, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA GAMING X3D</b></big><br>CPU: AMD Ryzen 7 7800X3D<br>MAIN: ASUS TUF GAMING B650M-E WIFI<br>VGA: ASUS TUF RTX4070TI SUPER O16G<br>RAM: GSKILLS 32G(2x16G) 6400MHz DDR5<br>SSD: LEXAR 2T M.2 NVMe PCIe<br>CASE: MORAX 3FA MATX<br>PSU: ASUS TUF GAMING-850G (850W)<br>Táº£n Nhiá»‡t: Prime LC 360 ARGB<br>Há»‡ Äiá»u HÃ nh: Free DOS<br>Phá»¥ Kiá»‡n: Coolerplus PhÃ­m CÆ¡ HERO G88 & Chuá»™t Gaming G63<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 2</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>AOC 24â€ (24B20JH2/74)<br>Pháº³ng - FHD - IPS - 100Hz - 1xDsub - 1x HDMI</b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 2</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>Voucher GOT IT trá»‹ giÃ¡ 300K!</b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 2</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 57,154,000Ä‘ x 2<br>= 114,308,000Ä‘</b></big></span></div>', 'Äinh Tiáº¿n Thuáº§n', '0975686868', 'ThuanDT7@gmail.com', 'store', 'CÃ”NG TY TNHH TMDV TIN Há»ŒC LONG BÃŒNH<br>50 Ä. Nguyá»…n CÆ° Trinh, PhÆ°á»ng Pháº¡m NgÅ© LÃ£o, Quáº­n 1, Há»“ ChÃ­ Minh', 'Test chÆ¡i khÃ´ng mua', 'Äang xá»­ lÃ½', '210125164214102', '21-01-2025 16:42:14'),
(104, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA AI</b></big><br>CPU: AMD Ryzen 5 PRO 4650G<br>MAIN: ASUS PRIME B550M-A D4<br>VGA: ASUS DUAL RTX4060 O8G V2<br>RAM: LEXAR 16G 3200MHz DDR4<br>SSD: LEXAR 256G SATA<br>CASE: InWin EFS063 MATX<br>PSU: 450W<br>Há»‡ Äiá»u HÃ nh: Windows 11 Pro<br>Phá»¥ Kiá»‡n: ROSA V100 PhÃ­m & Chuá»™t<br>ðŸ”§ CÃ i sáºµn CUDA, Python, VSCode<br>ðŸŽ Táº·ng giÃ¡o trÃ¬nh Python & Demo láº­p trÃ¬nh á»©ng dá»¥ng AI<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>Voucher GOT IT trá»‹ giÃ¡ 300K!</b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 17,709,000Ä‘ x 1<br>= 17,709,000Ä‘</b></big></span></div>', 'Tuan', '023423424', '', 'store', 'CÃ”NG TY TNHH MTV THáº¾ GIá»šI MÃY TÃNH Báº¢NG<br>233 Ä. LÃ½ ThÆ°á»ng Kiá»‡t, DÄ© An, BÃ¬nh DÆ°Æ¡ng', 'test', 'Äang xá»­ lÃ½', '310125080444104', '31-01-2025 08:04:44'),
(106, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA OFFICE N100</b></big><br>CPU: Intel N100<br>MAIN: ASUS PRIME N100I-D D4<br>RAM: LEXAR 8G 3200MHz DDR4<br>SSD: LEXAR 256G SATA<br>CASE: ROSA R101 MATX<br>PSU: ROSA ATX650 (450W)<br>Há»‡ Äiá»u HÃ nh: Windows 11 Pro<br>Phá»¥ Kiá»‡n: ROSA V100 PhÃ­m & Chuá»™t<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 5.199.000Ä‘ x 1<br>= 5.199.000Ä‘</b></big></span></div>', 'Anh Long', '1234556', 'along@gamil.com', 'store', 'CÃ”NG TY TNHH TIN Há»ŒC ÃNH DÆ¯Æ NG<br>20 Quang Trung, Tháº¯ng Lá»£i, BuÃ´n Ma Thuá»™t, Äáº¯k Láº¯k', '', 'Äang xá»­ lÃ½', '110225143042106', '11-02-2025 14:30:42'),
(107, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA MINI â… </b></big><br>MINIPC: I3-1220P <br>ASUS NUC12 PRO Tall RNUC12WSHI300000I<br>RAM: LEXAR 8G 3200MHz DDR4<br>SSD: LEXAR 256G M.2 NVMe PCIe<br>Há»‡ Äiá»u HÃ nh: Windows 11 Pro<br>Phá»¥ Kiá»‡n: ROSA V100 PhÃ­m & Chuá»™t<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr><tr><td style=\"text-align: left;width: 50%;\"><big><b>Voucher GOT IT trá»‹ giÃ¡ 300K!</b></big></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 10.199.000Ä‘ x 1<br>= 10.199.000Ä‘</b></big></span></div>', 'An', '123456', 'an@gmail.com', 'store', 'CÃ”NG TY TNHH MTV THáº¾ GIá»šI MÃY TÃNH Báº¢NG<br>233 Ä. LÃ½ ThÆ°á»ng Kiá»‡t, DÄ© An, BÃ¬nh DÆ°Æ¡ng', '', 'Äang xá»­ lÃ½', '110225153341107', '11-02-2025 15:33:41'),
(108, '<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\"><tr><td style=\"text-align: left;width: 50%;\"><big><b>ROSA OFFICE â… </b></big><br>CPU: AMD Ryzen 3 3200G<br>MAIN: ASUS PRIME A520M-K D4<br>RAM: LEXAR 8G 3200MHz DDR4<br>SSD: KINGSTON 240G SATA<br>CASE: ROSA CPC-C09 MATX<br>PSU: ROSA ATX650 (450W)<br>Há»‡ Äiá»u HÃ nh: Windows 11 Pro<br>Phá»¥ Kiá»‡n: ROSA V100 PhÃ­m & Chuá»™t<br></td><td style=\"text-align: right;width: 50%;\"><font color=\"red\"><b><big>x 1</big></b></font></td></tr></table><div style=\"text-align: right;\"><span style=\"color: red;\"><big><b>Tá»•ng Cá»™ng: 5.999.000Ä‘ x 1<br>= 5.999.000Ä‘</b></big></span></div>', ' Ninh', '123456', 'ninh@gmail.com', 'store', 'CÃ”NG TY TNHH Tin Há»c TH Nha Trang<br>216-218 Thá»‘ng Nháº¥t, PhÆ°Æ¡ng SÃ i, Nha Trang, KhÃ¡nh HÃ²a', '', 'Äang xá»­ lÃ½', '110225173234108', '11-02-2025 17:32:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `SOSERI_SP` varchar(50) NOT NULL,
  `SOSERI_PC` varchar(50) DEFAULT NULL,
  `TENSP` varchar(255) NOT NULL,
  `MASP` varchar(50) NOT NULL,
  `CPU` varchar(100) DEFAULT NULL,
  `RAM` varchar(100) DEFAULT NULL,
  `SSD` varchar(100) DEFAULT NULL,
  `VGA` varchar(100) DEFAULT NULL,
  `MAIN` varchar(100) DEFAULT NULL,
  `NGAYXUAT` date NOT NULL,
  `THOIHANBH` int(11) NOT NULL,
  `SOSERI_CPU` varchar(50) DEFAULT NULL,
  `MASP_CPU` varchar(50) DEFAULT NULL,
  `SOSERI_RAM` varchar(50) DEFAULT NULL,
  `MASP_RAM` varchar(50) DEFAULT NULL,
  `SOSERI_SSD` varchar(50) DEFAULT NULL,
  `MASP_SSD` varchar(50) DEFAULT NULL,
  `SOSERI_VGA` varchar(50) DEFAULT NULL,
  `MASP_VGA` varchar(50) DEFAULT NULL,
  `SOSERI_MAIN` varchar(50) DEFAULT NULL,
  `MASP_MAIN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`SOSERI_SP`, `SOSERI_PC`, `TENSP`, `MASP`, `CPU`, `RAM`, `SSD`, `VGA`, `MAIN`, `NGAYXUAT`, `THOIHANBH`, `SOSERI_CPU`, `MASP_CPU`, `SOSERI_RAM`, `MASP_RAM`, `SOSERI_SSD`, `MASP_SSD`, `SOSERI_VGA`, `MASP_VGA`, `SOSERI_MAIN`, `MASP_MAIN`) VALUES
('SP001', 'PC001', 'Laptop Dell XPS 15', 'DELLXPS15', 'Intel Core i7-12700H', '16GB DDR5', '512GB NVMe SSD', 'NVIDIA RTX 3060', 'Dell Mainboard Z690', '2023-10-01', 24, 'CPU001', 'CPUDELL123', 'RAM001', 'RAMDELL123', 'SSD001', 'SSDDELL123', 'VGA001', 'VGADELL123', 'MAIN001', 'MAINDELL123'),
('SP003', 'PC003', 'PC Đồ Họa RTX', 'PCGRAPHIC', 'Intel Core i9-13900K', NULL, NULL, 'NVIDIA RTX 4090', NULL, '2023-12-20', 36, 'CPU003', 'CPUINTEL13900K', NULL, NULL, NULL, NULL, 'VGA003', 'VGARTX4090', NULL, NULL),
('SP004', 'PC004', 'Workstation HP', 'WORKSTATIONHP', NULL, '64GB DDR5 ECC', '2TB PCIe 4.0 SSD', NULL, 'HP Z690 Workstation', '2024-01-10', 48, NULL, NULL, 'RAM004', 'RAMHP123', 'SSD004', 'SSDHP123', NULL, NULL, 'MAIN004', 'MAINHP123'),
('SP654321', 'PC123987', 'Laptop Asus ROG', 'ASUS2023', 'AMD Ryzen 7 5800H', '16GB', '512GB SSD', 'NVIDIA RTX 3060', 'AMD B550', '2025-10-10', 36, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`SOSERI_SP`),
  ADD UNIQUE KEY `SOSERI_PC` (`SOSERI_PC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
