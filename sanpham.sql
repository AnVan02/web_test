-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2025 lúc 03:23 AM
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

-- ------------------------------------------------------

---
--- Câu trúc bảng cho bảng `baohanh` 
---
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

CREATE TABLE `sanpham` (
  `SOSERI_SP` varchar(50) NOT NULL,
  `SOSERI_PC` varchar(50) DEFAULT NULL,
  `LOAI` varchar(50) NOT NULL,
  `TENSP` varchar(255) NOT NULL,
  `MASP` varchar(50) NOT NULL,
  `NGAYXUAT` date NOT NULL,
  `THOIHANBH` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--



--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `SOSERI_SP` varchar(255) NOT NULL,
  `SOSERI_PC` varchar(255) DEFAULT NULL,
  `TENSP` varchar(255) DEFAULT NULL,
  `MASP` varchar(255) DEFAULT NULL,
  `CPU` varchar(255) DEFAULT NULL,
  `RAM` varchar(255) DEFAULT NULL,
  `SSD` varchar(255) DEFAULT NULL,
  `MAIN` varchar(255) DEFAULT NULL,
  `VGA` varchar(255) DEFAULT NULL,
  `NGAYXUAT` date DEFAULT NULL,
  `THOIHANBH` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- lấy ngày hiện tại
ALTER TABLE sanpham MODIFY NGAYXUAT TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`SOSERI_SP`),
  ADD UNIQUE KEY `unique_soseri_pc` (`SOSERI_PC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `baohanh` (
  `SOSERI_SP` varchar(255) NOT NULL,
  `SOSERI_PC` varchar(255) DEFAULT NULL,
  `LOAI` varchar(1000) NOT NULL,
  `TENSP` varchar(255) NOT NULL,
  `MASP` varchar(255) NOT NULL,
  `NGAYXUAT` date NOT NULL,
  `THOIHANBH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;