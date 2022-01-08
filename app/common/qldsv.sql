-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 05:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qldsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'Nguyễn Văn A', '54e04d7cafe5b9929847f3f5e3c7102f', 1, '', '2021-12-19 00:37:39', '2021-12-19 00:37:39'),
(2, 'Nguyễn Văn B', '54e04d7cafe5b9929847f3f5e3c7102f', 1, '', '2021-12-19 00:37:39', '2021-12-19 00:37:39'),
(3, 'Trần Văn C', '54e04d7cafe5b9929847f3f5e3c7102f', 1, '', '2021-12-19 00:37:39', '2021-12-19 00:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
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

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `teacher_id`, `subject_id`, `score`, `description`, `updated`, `created`) VALUES
(1, 4, 1, 2, 6, 'có tiến bộ', '2022-01-08 23:02:02', '2022-01-08 23:02:02'),
(2, 3, 3, 4, 6, 'khá hơn so với lần trước!', '2022-01-08 23:02:48', '2022-01-08 23:02:48'),
(3, 1, 4, 7, 10, 'Quá tuyệt vời, quá nice sừ!', '2022-01-08 23:03:21', '2022-01-08 23:03:21'),
(4, 2, 4, 8, 9, 'Cần cố gắng hơn chút nữa!', '2022-01-08 23:03:42', '2022-01-08 23:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `avatar`, `description`, `updated`, `created`) VALUES
(1, 'Trần Đức Bo', 'GGMeet_Avatar_1641657555.png', 'singer', '2022-01-08 22:59:17', '2022-01-08 22:59:17'),
(2, 'Lê Tùng Vân', 'GGMeet_Avatar_2_1641657637.png', 'fjgfjfkgfjgkfg', '2022-01-08 23:00:38', '2022-01-08 23:00:38'),
(3, 'Ngô Bá Khá', 'GGMeet_Avatar_3_1641657655.png', 'fjgkfgjk', '2022-01-08 23:00:57', '2022-01-08 23:00:57'),
(4, 'Cô Ba Vàng Ngọc', 'GGMeet_Avatar_4_1641657686.png', 'jfgkfgjkfglkllkkl', '2022-01-08 23:01:27', '2022-01-08 23:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
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

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `description`, `school_year`, `updated`, `created`) VALUES
(1, 'OOP', NULL, 'Lập trình hướng đối tượng', 'Năm 2', '2022-01-07 20:51:14', '2022-01-07 20:51:14'),
(2, 'Lập trình Python', NULL, 'Môn tự chọn', 'Năm 3', '2022-01-07 20:52:02', '2022-01-07 20:52:02'),
(3, 'Phát triển ứng dụng web', NULL, 'PHP', 'Năm 4', '2022-01-07 20:52:02', '2022-01-07 20:52:02'),
(4, 'Tin học văn phòng', NULL, 'Word, Excel', 'Năm 1', '2022-01-08 14:05:38', '2022-01-08 14:05:38'),
(5, 'Lập trình C++', NULL, 'Môn tự chọn', 'Năm 3', '2022-01-08 14:05:38', '2022-01-08 14:05:38'),
(6, 'Cấu trúc dữ liệu và giải thuật', NULL, 'Môn chuyên ngành', 'Năm 2', '2022-01-08 14:09:33', '2022-01-08 14:09:33'),
(7, 'Phân tích hệ thống thông tin', NULL, 'Thực tập tại các công ty', 'Năm 4', '2022-01-08 14:09:33', '2022-01-08 14:09:33'),
(8, 'Xử lý ảnh', NULL, 'Môn tự chọn', 'Năm 4', '2022-01-08 22:22:01', '2022-01-08 22:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
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
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(1, 'Thầy Huấn Rose', 'thayHuanRose.jpg', 'dfgfdfhbvcvfggfdgfgdgfg', '002', '002', '2022-01-07 23:03:40', '2021-12-30 14:01:41'),
(3, 'Thầy Huấn Rose', 'teacher_1.jpg', 'Đẹp trai, tài năng, tư duy đỉnh cao, tố chất lãnh đạo là những thứ mà Thầy Giáo Ba có', '001', '004', '2021-12-31 08:06:05', '2021-12-30 14:01:41'),
(4, 'Cô Giáo Trân', 'teacher_2.jpg', 'ghgghghh', '001', '002', '2022-01-08 12:45:32', '2021-12-30 14:01:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
