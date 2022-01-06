-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2022 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_sinh_vien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `score` int(2) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `school_year` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `description`, `school_year`, `updated`, `created`) VALUES
(1, 'English', 'english.jpg', 'Ngoại ngữ', '2', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(2, 'Literature', 'literature.jpg', 'Mon van hoc', '3', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(3, 'Statistics', 'statistic.jpg', 'Xac suat', '3', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(4, 'Chemistry', 'chemistry.jpg', 'Mon hoa cho SV', '2', '2022-01-04 15:26:52', '2022-01-04 15:26:52'),
(5, 'Web design', 'mathematics.jpg', 'Thiet ke web', '4', '2022-01-04 15:26:52', '2022-01-04 15:26:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `specialized` char(10) NOT NULL,
  `degree` char(10) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(1, 'Nguyễn Văn An', 'nva.jpg', 'Thạc sĩ khoa toán', 'MAT', 'ThS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(2, 'Nguyễn Văn Bình', 'ttb.jpg', 'Tiến sĩ khoa lý', 'GEO', 'TS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(3, 'Nguyễn Văn Giải', 'hkt.jpg', 'Giáo sư công nghệ', 'AST', 'GS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(4, 'Nguyễn Văn Thoát', 'nkq.jpg', 'Phó giáo sư mời giảng', 'CHE', 'PGS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(5, 'Trần Tuấn Huy', 'tvc.jpg', 'Giáo Sư khoa Toán', 'MAT', 'GS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(6, 'Phạm Ngọc Dương', 'ntv.jpg', 'Tiến sĩ khoa sinh', 'BIO', 'TS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(7, 'Thành Quân Ức', 'vth.jpg', 'Tiến sĩ mời giảng', 'CHE', 'TS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(8, 'La Quán Trung', 'ntd.jpg', 'Thạc sĩ khoa sinh', 'BIO', 'ThS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(9, 'Khúc Đặng Ngữ', 'ncv.jpg', 'Giáo sư khoa lý', 'GEO', 'GS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(10, 'Lê Ngọc Khánh Vy', 'nhh.jpg', 'Phó giáo sư mời giảng', 'AST', 'PGS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(11, 'Lê Ngọc', 'nhh.jpg', 'Tiến sĩ nghiên cứu', 'AST', 'TS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(12, 'Tùng Lâm', 'nhh.jpg', 'Thạc sĩ nghiên cứu', 'AST', 'ThS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(13, 'Phương Dung', 'nhh.jpg', 'Thạc sĩ nghiên cứu', 'AST', 'ThS', '2022-01-05 16:03:55', '2022-01-05 16:03:55'),
(14, 'Trần Xuân Khang', 'nhh.jpg', 'Giáo sư khoa sinh', 'BIO', 'GS', '2022-01-05 16:03:55', '2022-01-05 16:03:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
