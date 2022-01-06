-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 06:50 PM
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
-- Cơ sở dữ liệu: `qldsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `school_year` char(10) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specialized` char(10) DEFAULT NULL,
  `degree` char(10) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(5, 'Thầy An', '', 'đẹp trai', '001', '001', '2022-01-06 23:59:06', '2021-12-30 14:01:41'),
(6, 'Thầy Bình', '', 'nhiệt tình', '001', '002', '2022-01-06 23:58:54', '2021-12-30 14:01:41'),
(7, 'Thầy Thoát', '', 'giảng hay', '001', '003', '2022-01-06 23:59:01', '2021-12-30 14:01:41'),
(8, 'Thầy Giải', '', 'quan tâm học viên', '001', '004', '2022-01-07 00:00:07', '2021-12-30 14:01:41'),
(10, 'Trần Tuấn Huy', '', 'khó tính trong lúc kiểm tra', '001', '005', '2022-01-07 00:00:52', '2021-12-30 14:01:41'),
(11, 'Nguyễn Xuân Đới', '', 'thích nghiên cứu, nhiệt tình', '002', '001', '2022-01-06 23:59:06', '2021-12-30 14:01:41'),
(12, 'Nguyễn Thị Thắm', '', 'Xinh đẹp, duyên dáng, dạy hay', '002', '002', '2022-01-06 23:58:54', '2021-12-30 14:01:41'),
(13, 'Vũ Văn Thành', '', 'giảng hay, nhiệt tình, quan tâm sinh viên', '002', '003', '2022-01-06 23:59:01', '2021-12-30 14:01:41'),
(14, 'Đỗ Thị Bảo Ngọc', '', 'quan tâm học viên', '002', '004', '2022-01-07 00:00:07', '2021-12-30 14:01:41'),
(15, 'Lê Thanh Tâm', '', 'giảng chi tiết dễ hiểu', '002', '005', '2022-01-07 00:00:23', '2021-12-30 14:01:41');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
