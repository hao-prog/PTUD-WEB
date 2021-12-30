-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 08:21 AM
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

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(0, 'Thầy Huấn Rose', 'thayHuanRose.jpg', 'Thầy dạy môn Giáo dục công dân', '001', '001', '2021-12-30 14:07:08', '2021-12-30 14:01:41'),
(3, 'Phan Tấn Trung', 'teacher_1.jpg', 'Đẹp trai, tài năng, tư duy đỉnh cao, tố chất lãnh đạo là những thứ mà Thầy Giáo Ba KHÔNG có', '002', '003', '2021-12-30 14:07:04', '2021-12-30 14:01:41'),
(4, 'Cô giáo Minh Thu', 'teacher_2.jpg', 'Cô dạy môn Vật lý rất hay', '001', '004', '2021-12-30 14:06:57', '2021-12-30 14:01:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
