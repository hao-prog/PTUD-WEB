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

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`) VALUES
(1, 'Thầy Huấn Rose', 'thayHuanRose.jpg', 'Thầy dạy môn Giáo dục công dân', '001', '001'),
(3, 'Phan Tấn Trung', 'teacher_1.jpg', 'Đẹp trai, tài năng, tư duy đỉnh cao, tố chất lãnh đạo là những thứ mà Thầy Giáo Ba KHÔNG có', '002', '003'),
(4, 'Cô giáo Minh Thu', 'teacher_2.jpg', 'Cô dạy môn Vật lý rất hay', '001', '004');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
