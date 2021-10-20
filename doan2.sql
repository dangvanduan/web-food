-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 30, 2021 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `transaction_id`, `product_name`, `product_id`, `amount`, `price`) VALUES
(1, 0, 'Phở nạm', 63, 4, 24000),
(2, 0, 'Bún riêu chả', 55, 4, 25000),
(3, 0, 'bún chả cá', 56, 10, 25000),
(4, 0, 'bún chả cá', 56, 10, 25000),
(5, 0, 'Phở nạm', 63, 4, 24000),
(6, 0, 'Phở nạm', 63, 4, 24000),
(7, 0, 'Phở nạm', 63, 4, 24000),
(8, 24, 'Mỳ quảng đặc biệt', 59, 4, 25000),
(9, 25, 'Phở nạm', 63, 4, 24000),
(10, 26, 'Phở nạm', 63, 4, 24000),
(11, 27, 'Bún thập cẩm', 57, 3, 23000),
(12, 30, 'Phở nạm', 63, 2, 24000),
(13, 30, 'Mỳ quảng thập cẩm', 61, 1, 24000),
(14, 30, 'Bún bò Huế', 58, 1, 25000),
(15, 33, 'Phở nạm', 63, 2, 24000),
(16, 33, 'Mỳ quảng thập cẩm', 61, 1, 24000),
(17, 33, 'Bún bò Huế', 58, 1, 25000),
(18, 36, 'Phở nạm', 63, 2, 24000),
(19, 36, 'Mỳ quảng thập cẩm', 61, 1, 24000),
(20, 36, 'Bún bò Huế', 58, 1, 25000),
(21, 37, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(22, 37, 'Bún bò Huế', 58, 2, 25000),
(23, 37, 'Gà rán sốt đậu', 54, 1, 45000),
(24, 37, 'Phở tái', 62, 4, 27000),
(25, 38, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(26, 38, 'Bún bò Huế', 58, 2, 25000),
(27, 38, 'Gà rán sốt đậu', 54, 1, 45000),
(28, 38, 'Phở tái', 62, 4, 27000),
(29, 39, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(30, 39, 'Bún bò Huế', 58, 2, 25000),
(31, 39, 'Gà rán sốt đậu', 54, 1, 45000),
(32, 39, 'Phở tái', 62, 4, 27000),
(33, 40, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(34, 40, 'Bún bò Huế', 58, 2, 25000),
(35, 40, 'Gà rán sốt đậu', 54, 1, 45000),
(36, 40, 'Phở tái', 62, 4, 27000),
(37, 41, 'Mỳ quảng sứa', 60, 1, 24000),
(38, 42, 'Phở tái', 62, 1, 27000),
(39, 43, 'Bún bò Huế', 58, 5, 25000),
(40, 44, 'Bún riêu chả', 55, 5, 25000),
(41, 46, 'Gà rán sốt đậu', 54, 5, 45000),
(42, 46, 'Bún riêu chả', 0, 1, 25000),
(43, 48, 'Gà rán sốt đậu', 54, 5, 45000),
(44, 48, 'Bún riêu chả', 0, 1, 25000),
(45, 50, 'Phở tái', 0, 1, 27000),
(46, 50, 'Bánh mỳ ốp la', 0, 4, 15000),
(47, 52, 'Phở tái', 0, 1, 27000),
(48, 52, 'Bánh mỳ ốp la', 0, 4, 15000),
(49, 54, 'Xà lách trộn kiểu Nga', 1, 11, 59000),
(50, 54, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(51, 56, 'Xà lách trộn kiểu Nga', 1, 11, 59000),
(52, 56, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(53, 58, 'Súp rau', 7, 2, 29000),
(54, 58, '\r\nSúp gà kem sữa', 8, 1, 39000),
(55, 60, 'Súp rau', 7, 2, 29000),
(56, 60, '\r\nSúp gà kem sữa', 8, 1, 39000),
(57, 61, 'Supreme', 6, 1, 269000),
(58, 62, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(59, 63, 'Seafood Pesto', 11, 1, 269000),
(60, 64, 'Seafood Pesto', 11, 1, 269000),
(61, 65, 'Tomato sp', 3, 1, 68000),
(62, 66, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(63, 67, 'Tomato sp', 3, 4, 68000),
(64, 68, 'Tomato sp', 3, 1, 68000),
(65, 69, 'Supreme', 6, 1, 269000),
(66, 70, 'Súp rau', 7, 1, 29000),
(67, 71, 'Seafood Pesto', 11, 1, 269000),
(68, 72, 'Bún bò Huế', 58, 1, 25000),
(69, 73, 'Súp rau', 7, 1, 29000),
(70, 74, 'Seafood Pesto', 11, 1, 269000),
(71, 75, 'Tomato sp', 3, 1, 68000),
(72, 76, 'Cơm tấm sườn ', 15, 1, 20000),
(73, 77, 'Supreme', 6, 1, 269000),
(74, 78, 'bún chả cá', 56, 1, 25000),
(75, 79, 'Súp rau', 7, 1, 29000),
(76, 80, 'Seafood Pesto', 11, 1, 269000),
(77, 81, '\r\nSúp gà kem sữa', 8, 1, 39000),
(78, 82, 'Tomato sp', 5, 1, 68000),
(79, 82, 'Seafood Chowder', 12, 1, 59000),
(80, 83, 'Tomato sp', 5, 1, 68000),
(81, 83, 'Seafood Chowder', 12, 1, 59000),
(82, 84, 'Seafood Pesto', 11, 1, 269000),
(83, 84, 'Seafood Chowder', 12, 1, 59000),
(84, 85, 'Seafood Pesto', 11, 1, 269000),
(85, 85, 'Seafood Chowder', 12, 1, 59000),
(86, 86, 'Seafood Chowder', 12, 1, 59000),
(87, 86, 'bún chả cá', 56, 1, 25000),
(88, 87, 'Seafood Chowder', 12, 1, 59000),
(89, 87, 'bún chả cá', 56, 1, 25000),
(90, 88, 'Bún bò Huế', 58, 1, 25000),
(91, 88, 'Bún thập cẩm', 57, 1, 23000),
(92, 89, 'Bún bò Huế', 58, 1, 25000),
(93, 89, 'Bún thập cẩm', 57, 1, 23000),
(94, 90, 'Gà rán sốt đậu', 54, 1, 45000),
(95, 90, 'Bún riêu chả', 55, 1, 25000),
(96, 91, 'Gà rán sốt đậu', 54, 1, 45000),
(97, 91, 'Bún riêu chả', 55, 1, 25000),
(98, 92, 'Bánh bao thịt', 26, 1, 14000),
(99, 92, 'Bánh mỳ lúa mạch', 31, 1, 10000),
(100, 93, 'Bánh bao thịt', 26, 1, 14000),
(101, 93, 'Bánh mỳ lúa mạch', 31, 1, 10000),
(102, 94, 'Súp rau', 7, 1, 29000),
(103, 94, '\r\nSúp gà kem sữa', 10, 1, 39000),
(104, 95, 'Súp rau', 7, 1, 29000),
(105, 95, '\r\nSúp gà kem sữa', 10, 1, 39000),
(106, 96, 'Seafood Pesto', 11, 1, 269000),
(107, 96, 'Súp rau', 9, 1, 29000),
(108, 97, 'Seafood Pesto', 11, 1, 269000),
(109, 97, 'Súp rau', 9, 1, 29000),
(110, 98, 'Bún bò Huế', 58, 2, 25000),
(111, 98, 'Bún thập cẩm', 57, 1, 23000),
(112, 99, 'Bún bò Huế', 58, 2, 25000),
(113, 99, 'Bún thập cẩm', 57, 1, 23000),
(114, 100, 'Tomato sp', 3, 1, 68000),
(115, 100, 'Súp rau', 7, 1, 29000),
(116, 101, 'Tomato sp', 3, 1, 68000),
(117, 101, 'Súp rau', 7, 1, 29000),
(118, 102, 'Seafood Pesto', 11, 1, 269000),
(119, 102, 'Súp rau', 9, 1, 29000),
(120, 103, 'Seafood Pesto', 11, 1, 269000),
(121, 103, 'Súp rau', 9, 1, 29000),
(122, 105, 'Tomato sp', 0, 1, 68000),
(123, 105, 'Seafood Pesto', 0, 1, 269000),
(124, 107, 'Tomato sp', 0, 1, 68000),
(125, 107, 'Seafood Pesto', 0, 1, 269000),
(126, 109, 'Tomato sp', 0, 1, 68000),
(127, 109, 'Bún thập cẩm', 0, 1, 23000),
(128, 111, 'Tomato sp', 0, 1, 68000),
(129, 111, 'Bún thập cẩm', 0, 1, 23000),
(130, 113, 'Supreme', 0, 1, 269000),
(131, 113, 'Seafood Pesto', 0, 1, 269000),
(132, 115, 'Supreme', 0, 1, 269000),
(133, 115, 'Seafood Pesto', 0, 1, 269000),
(134, 117, 'Súp rau', 0, 1, 29000),
(135, 117, 'Phở tái', 0, 1, 27000),
(136, 119, 'Xà lách trộn kiểu Pháp', 0, 1, 59000),
(137, 119, 'Gà rán sốt đậu', 0, 1, 45000),
(138, 121, 'Seafood Pesto', 0, 1, 269000),
(139, 121, 'bún chả cá', 0, 1, 25000),
(140, 123, 'Xà lách trộn kiểu Pháp', 0, 1, 59000),
(141, 123, 'Seafood Chowder', 0, 1, 59000),
(142, 125, 'Seafood Pesto', 0, 1, 269000),
(143, 125, 'Mỳ quảng đặc biệt', 0, 1, 25000),
(144, 127, 'Súp rau', 0, 1, 29000),
(145, 127, 'Mỳ quảng đặc biệt', 0, 1, 25000),
(146, 128, '\r\nSúp gà kem sữa', 0, 1, 39000),
(147, 128, 'Mỳ quảng đặc biệt', 0, 1, 25000),
(148, 129, 'Supreme', 0, 1, 269000),
(149, 129, 'Mỳ quảng sứa', 0, 1, 24000),
(150, 130, 'Supreme', 0, 1, 269000),
(151, 130, 'Phở tái', 0, 1, 27000),
(152, 131, '\r\nSúp gà kem sữa', 0, 1, 39000),
(153, 131, 'Phở bò viên', 0, 1, 30000),
(154, 132, 'Supreme', 6, 1, 269000),
(155, 132, 'Bún bò Huế', 58, 1, 25000),
(156, 134, 'Súp rau', 7, 1, 29000),
(157, 134, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(158, 135, 'Súp rau', 7, 1, 29000),
(159, 135, 'Bún bò Huế', 58, 4, 25000),
(160, 136, 'Supreme', 6, 1, 269000),
(161, 137, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(162, 138, 'Supreme', 6, 1, 269000),
(163, 139, 'Phở nạm', 63, 1, 24000),
(164, 140, 'Phở nạm', 63, 1, 24000),
(165, 140, 'Phở bò viên', 64, 1, 30000),
(166, 141, 'Phở nạm', 63, 1, 24000),
(167, 142, 'Phở tái', 62, 2, 27000),
(168, 142, 'Bún riêu chả', 55, 1, 25000),
(169, 142, 'Mỳ quảng thập cẩm', 61, 1, 24000),
(170, 143, 'Xà lách trộn kiểu Nga', 1, 1, 59000),
(171, 143, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(172, 144, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(173, 145, 'Mỳ quảng sứa', 60, 1, 24000),
(174, 145, 'Tomato sp', 3, 1, 68000),
(175, 146, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(176, 146, 'Tomato sp', 3, 1, 68000),
(177, 147, 'Supreme', 4, 1, 269000),
(178, 149, 'Phở bò viên', 64, 1, 30000),
(179, 150, 'Súp rau', 7, 2, 29000),
(180, 151, 'Phở tái', 62, 8, 27000),
(181, 151, 'Phở nạm', 63, 7, 24000),
(182, 151, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(183, 151, 'Tomato sp', 3, 1, 68000),
(184, 151, '\r\nSúp gà kem sữa', 8, 1, 39000),
(185, 151, 'bún chả cá', 56, 1, 25000),
(186, 153, 'Phở bò viên', 64, 1, 30000),
(187, 154, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(188, 155, 'Tomato sp', 3, 1, 68000),
(189, 157, 'Phở nạm', 63, 1, 24000),
(190, 159, 'Tomato sp', 5, 1, 68000),
(191, 160, 'Xà lách trộn kiểu Nga', 1, 1, 59000),
(192, 161, 'Xà lách trộn kiểu Pháp', 2, 4, 59000),
(193, 161, 'Xà lách trộn kiểu Nga', 1, 3, 59000),
(194, 162, 'Mỳ quảng đặc biệt', 59, 1, 25000),
(195, 162, 'Mỳ quảng sứa', 60, 1, 24000),
(196, 163, 'Xà lách trộn kiểu Pháp', 2, 1, 59000),
(197, 165, 'Súp rau', 7, 1, 29000),
(198, 166, 'Phở nạm', 63, 1, 24000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `parent_id`) VALUES
(1, 'CƠM HỘP', 0),
(2, 'BÁNH', 0),
(3, 'ĐỒ UỐNG', 0),
(4, 'THỨC ĂN NHANH', 0),
(5, 'BÚN, MỲ, PHỞ', 0),
(27, 'CƠM TRƯA', 1),
(28, 'CƠM CHIỀU', 1),
(29, 'BÁNH NGỌT', 2),
(30, 'BÁNH MẶN', 2),
(31, 'TRÀ SỮA', 3),
(32, 'CÀ PHÊ', 3),
(33, 'PIZZA', 4),
(34, 'HAMBERGER', 4),
(35, 'GÀ RÁN', 4),
(36, 'BÚN', 5),
(37, 'MỲ QUẢNG', 5),
(38, 'PHỞ', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `content`, `created_at`, `parent_id`) VALUES
(1, 1, 1, '111', '2021-05-26 22:13:55', 0),
(2, 0, 0, '{22sdd}', '2021-05-26 22:15:57', 0),
(3, 1, 2, '22sdd', '2021-05-26 22:16:56', 0),
(4, 1, 2, '22sdd', '2021-05-26 22:28:37', 0),
(7, 5, 62, '222222222', '2021-05-26 22:33:04', 0),
(8, 5, 62, '22222222', '2021-05-26 22:34:02', 0),
(9, 5, 62, '22222222', '2021-05-26 22:34:30', 0),
(10, 5, 64, 'Phở ngon', '2021-05-27 19:02:40', 0),
(11, 5, 64, '222', '2021-05-27 19:03:00', 0),
(12, 5, 62, '3333', '2021-05-28 20:07:26', 0),
(13, 5, 62, '3333', '2021-05-28 20:09:34', 0),
(14, 5, 64, '333', '2021-05-28 20:25:27', 0),
(15, 5, 64, '333', '2021-05-28 20:25:28', 0),
(16, 5, 62, '444', '2021-05-28 20:35:01', 0),
(17, 5, 62, '55', '2021-05-28 20:39:07', 16),
(18, 5, 62, '66', '2021-05-28 20:42:49', 17),
(19, 5, 62, '66', '2021-05-28 20:44:46', 17),
(20, 5, 62, '777', '2021-05-28 20:52:29', 12),
(21, 5, 62, '888', '2021-05-29 15:26:32', 20),
(26, 5, 60, 'Phở ngon quá', '2021-05-29 19:05:22', 0),
(27, 5, 60, '22', '2021-05-29 19:05:38', 26),
(28, 32, 64, '1111', '2021-06-07 19:42:32', 0),
(29, 32, 64, '2222', '2021-06-07 19:42:53', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `address`, `email`, `phone`, `title`, `content`) VALUES
(1, 'Trần Trung', '24 Hòa Cầm Đà Nẵng', 'trantrung@gmail.com', '0981234567', 'Chưa nhận được quà', 'Chỉ nhận vào giờ hành chính'),
(2, 'Trần Trung', '24 Hòa Cầm Đà Nẵng', 'trantrung@gmail.com', '0981234567', 'Chưa nhận được quà', 'Chỉ nhận vào giờ hành chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(10) NOT NULL,
  `coupon_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_value` float NOT NULL,
  `coupon_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `end_day`, `coupon_value`, `coupon_number`) VALUES
(1, 'Giảm giá tháng 6 10% tổng giá trị đơn hàng', 'TVSDGGT6', '2021-06-30', 0.1, 2),
(2, 'Giảm giá tháng 7 15% tổng giá trị đơn hàng', 'TVSDGGT7', '2021-07-30', 0.15, 3),
(3, 'Giảm giá tháng 8 10% tổng giá trị đơn hàng', 'TVSDGGT8', '2021-08-30', 0.1, 4),
(6, '111', '123456', '0000-00-00', 0.1, 3),
(7, '1111', '12345', '0000-00-00', 0.1, 2),
(8, '11111111', '111111', '0000-00-00', 0.1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_text` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_news` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `created_at`, `detail_text`, `picture`, `coupon_code`, `type_news`) VALUES
(1, 'Tặng 1 bánh pizza miễn phí cho ngày sinh nhật của bạn', '12/5/2019', ' Tặng 1 pizza cỡ M (áp dụng cho tất cả các loại pizza trừ số 3, 11 và 12)    Quý khách vui lòng mang theo chứng minh thư nhân dân hoặc các giấy tờ tương đương thể hiện ngày sinh nhật trùng với ngày nhận bánh    Mỗi khách hàng chỉ được nhận 1 bánh tặng miễn phí    Chỉ áp dụng với các đơn hàng có giá trị trên 250.000đ    Cửa hàng tặng miễn phí tối đa 10 bánh/ 1 ngày cho 10 người đăng kí đầu tiên', 'pizza.jpg', 'TVSDGGT6', 1),
(2, 'Tặng 1 bánh pizza miễn phí cho ngày sinh nhật của bạn', '12/5/2021', ' Tặng 1 pizza cỡ M (áp dụng cho tất cả các loại pizza trừ số 3, 11 và 12)\r\n    Quý khách vui lòng mang theo chứng minh thư nhân dân hoặc các giấy tờ tương đương thể hiện ngày sinh nhật trùng với ngày nhận bánh\r\n    Mỗi khách hàng chỉ được nhận 1 bánh tặng miễn phí\r\n    Chỉ áp dụng với các đơn hàng có giá trị trên 250.000đ\r\n    Cửa hàng tặng miễn phí tối đa 10 bánh/ 1 ngày cho 10 người đăng kí đầu tiên', 'pizza.jpg', 'TVSDGGT7', 1),
(7, 'Khuyến mãi thứ 2, thứ 4, thứ 6 hàng tuần Khuyến mãi thứ 2, thứ 4, thứ 6 hàng tuần', '12/12/2020', '<p>&Aacute;p dụng cho thứ 2, thứ 4, thứ 6 h&agrave;ng tuần<br />\r\n&nbsp;&nbsp;&nbsp; &Aacute;p dụng cho c&aacute;c h&igrave;nh thức: giao b&aacute;nh v&agrave; mang về<br />\r\n&nbsp;&nbsp;&nbsp; Kh&ocirc;ng &aacute;p dụng ng&agrave;y lễ, tết</p>\r\n', 'Khuyến mãi thứ 2, thứ 4, thứ 6 hàng tuần Khuyến mãi thứ 2, thứ 4, thứ 6 hàng tuần-1621307401.png', 'TVSDGGT8', 2),
(8, 'Khuyến mãi thứ 3, thứ 5 hàng tuần', '12/12/2019', '<p>&Aacute;p dụng cho thứ 2, thứ 3, thứ 5 h&agrave;ng tuần<br />\r\n&nbsp;&nbsp;&nbsp; &Aacute;p dụng cho c&aacute;c h&igrave;nh thức: giao b&aacute;nh v&agrave; mang về<br />\r\n&nbsp;&nbsp;&nbsp; Kh&ocirc;ng &aacute;p dụng ng&agrave;y lễ, tết</p>\r\n', 'Khuyến mãi thứ 3, thứ 5 hàng tuần-1621307470.jpeg', 'TVSDGGT5', 1),
(9, 'Tặng 1 bánh pizza miễn phí cho ngày sinh nhật của bạn', '12/12/2018', '<p>&nbsp;&nbsp; Tặng 1 pizza cỡ M (&aacute;p dụng cho tất cả c&aacute;c loại pizza trừ số 3, 11 v&agrave; 12)<br />\r\n&nbsp;&nbsp;&nbsp; Qu&yacute; kh&aacute;ch vui l&ograve;ng mang theo chứng minh thư nh&acirc;n d&acirc;n hoặc c&aacute;c giấy tờ tương đương thể hiện ng&agrave;y sinh nhật tr&ugrave;ng với ng&agrave;y nhận b&aacute;nh<br />\r\n&nbsp;&nbsp;&nbsp; Mỗi kh&aacute;ch h&agrave;ng chỉ được nhận 1 b&aacute;nh tặng miễn ph&iacute;<br />\r\n&nbsp;&nbsp;&nbsp; Chỉ &aacute;p dụng với c&aacute;c đơn h&agrave;ng c&oacute; gi&aacute; trị tr&ecirc;n 250.000đ<br />\r\n&nbsp;&nbsp;&nbsp; Cửa h&agrave;ng tặng miễn ph&iacute; tối đa 10 b&aacute;nh/ 1 ng&agrave;y cho 10 người đăng k&iacute; đầu ti&ecirc;n</p>\r\n', 'Tặng 1 bánh pizza miễn phí cho ngày sinh nhật của bạn-1621307506.jpg', 'TVSDGGT3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pay_money` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `method` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_describe` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) NOT NULL,
  `product_detail` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `source_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_describe`, `picture`, `cat_id`, `product_detail`, `price`, `parent_id`, `source_id`) VALUES
(1, 'Xà lách trộn kiểu Nga', 'Món salad Nga luôn tươi ngon và hấp dẫn những ai thưởng thức.', 'pizza.jpg', 27, 'Món salad Nga luôn tươi ngon và hấp dẫn những ai thưởng thức.\r\nCách làm:\r\n\r\n- Luộc chín hạt đậu Hà Lan, khoai tây và cà rốt rồi vớt ra, để ráo nước, cho chung vào một bát to.\r\n\r\n- Trút dưa chuột muối vào\r\n\r\n- Lần lượt cho dấm, dầu ô liu, muối và hạt tiêu để tăng hương vị, trộn đều. Lưu ý, làm việc này khi các loại rau củ vẫn còn đang ấm nhé!\r\n\r\n- Bạn có thể cho thêm trứng sắt hạt lựu vào lúc này, hoặc trứng chỉ để trang trí. Cho mayonnaise vào trộn đều\r\n\r\n- Bọc bát salad Nga lại và cho vào tủ lạnh để trong 1 giờ.\r\n\r\n- Sau đó, cho salad Nga ra đĩa, trang trí với trứng, dưa chuột muối rồi thưởng thức.', 59000, 1, 3),
(2, 'Xà lách trộn kiểu Pháp', 'Món salad Nga luôn tươi ngon và hấp dẫn những ai thưởng thức.', 'pizza.jpg', 28, 'Món salad Nga luôn tươi ngon và hấp dẫn những ai thưởng thức.\r\nCách làm:\r\n\r\n- Luộc chín hạt đậu Hà Lan, khoai tây và cà rốt rồi vớt ra, để ráo nước, cho chung vào một bát to.\r\n\r\n- Trút dưa chuột muối vào\r\n\r\n- Lần lượt cho dấm, dầu ô liu, muối và hạt tiêu để tăng hương vị, trộn đều. Lưu ý, làm việc này khi các loại rau củ vẫn còn đang ấm nhé!\r\n\r\n- Bạn có thể cho thêm trứng sắt hạt lựu vào lúc này, hoặc trứng chỉ để trang trí. Cho mayonnaise vào trộn đều\r\n\r\n- Bọc bát salad Nga lại và cho vào tủ lạnh để trong 1 giờ.\r\n\r\n- Sau đó, cho salad Nga ra đĩa, trang trí với trứng, dưa chuột muối rồi thưởng thức.', 59000, 1, 3),
(3, 'Tomato sp', 'Mỳ Ý sốt cà chua hương vị ngon, thưởng thức rất hợp khẩu vị\r\n\r\nMón ăn không gây béo mà hương vị lại đầy đủ, rất dễ ăn', 'my_xao_thap_cam_large.jpg', 27, 'Mỳ Ý sốt cà chua hương vị ngon, thưởng thức rất hợp khẩu vị\r\n\r\nMón ăn không gây béo mà hương vị lại đầy đủ, rất dễ ăn\r\n\r\n﻿', 68000, 1, 3),
(4, 'Supreme', 'Pizza phủ xúc xích, thịt bò, ớt chuông, nấm rơm và hành tây.\r\n\r\nMón pizza vẫn luôn là món khoái khẩu cho các chị em trong những dịp đi chơi hay gọi đến nhà đều rất tiện lợi', 'supreme_pizza_large.jpg', 33, 'Pizza phủ xúc xích, thịt bò, ớt chuông, nấm rơm và hành tây.\r\n\r\nMón pizza vẫn luôn là món khoái khẩu cho các chị em trong những dịp đi chơi hay gọi đến nhà đều rất tiện lợi\r\n ', 269000, 4, 3),
(5, 'Tomato sp', 'Mỳ Ý sốt cà chua hương vị ngon, thưởng thức rất hợp khẩu vị\r\n\r\nMón ăn không gây béo mà hương vị lại đầy đủ, rất dễ ăn', 'my_xao_thap_cam_large.jpg', 28, 'Mỳ Ý sốt cà chua hương vị ngon, thưởng thức rất hợp khẩu vị\r\n\r\nMón ăn không gây béo mà hương vị lại đầy đủ, rất dễ ăn\r\n\r\n﻿', 68000, 1, 3),
(6, 'Supreme', 'Pizza phủ xúc xích, thịt bò, ớt chuông, nấm rơm và hành tây.\r\n\r\nMón pizza vẫn luôn là món khoái khẩu cho các chị em trong những dịp đi chơi hay gọi đến nhà đều rất tiện lợi', 'supreme_pizza_large.jpg', 27, 'Pizza phủ xúc xích, thịt bò, ớt chuông, nấm rơm và hành tây.\r\n\r\nMón pizza vẫn luôn là món khoái khẩu cho các chị em trong những dịp đi chơi hay gọi đến nhà đều rất tiện lợi\r\n ', 269000, 1, 3),
(7, 'Súp rau', 'Súp rau củ cải và carot thơm ngon, thưởng thức tuyệt vời sau khi đã ăn pizza.\r\n\r\nMón canh ngon lành mà không hề ngán, lại đầy dinh dưỡng', 'sup_cua_large.jpg', 27, 'Súp rau củ cải và carot thơm ngon, thưởng thức tuyệt vời sau khi đã ăn pizza.\r\n\r\nMón canh ngon lành mà không hề ngán, lại đầy dinh dưỡng', 29000, 1, 2),
(8, '\r\nSúp gà kem sữa', 'Chưa có mô tả', 'sup_tom_large.jpg', 28, 'Chưa có mô tả', 39000, 1, 2),
(9, 'Súp rau', 'Súp rau củ cải và carot thơm ngon, thưởng thức tuyệt vời sau khi đã ăn pizza.\r\n\r\nMón canh ngon lành mà không hề ngán, lại đầy dinh dưỡng', 'sup_cua_large.jpg', 28, 'Súp rau củ cải và carot thơm ngon, thưởng thức tuyệt vời sau khi đã ăn pizza.\r\n\r\nMón canh ngon lành mà không hề ngán, lại đầy dinh dưỡng', 29000, 1, 3),
(10, '\r\nSúp gà kem sữa', 'Chưa có mô tả', 'sup_tom_large.jpg', 27, 'Chưa có mô tả', 39000, 1, 2),
(11, 'Seafood Pesto', 'Pizza hải sản với tôm, mực nghêu và nấm trên nền sốt Pesto và phô mai.\r\n\r\nMón ăn vô cùng hấp dẫn và ngon lành, vô cùng tiện lợi', 'pizza_lap_xuong_large.jpg', 33, 'Pizza hải sản với tôm, mực nghêu và nấm trên nền sốt Pesto và phô mai.\r\n\r\nMón ăn vô cùng hấp dẫn và ngon lành, vô cùng tiện lợi', 269000, 4, 3),
(12, 'Seafood Chowder', 'Súp hải sản phủ bánh nướng.\r\n\r\nMón canh ngon lành và đầy màu sắc, hương vị thơm ngon, bổ dưỡng', 'sup_ngheu_large.jpg', 1, 'Súp hải sản phủ bánh nướng.\r\n\r\nMón canh ngon lành và đầy màu sắc, hương vị thơm ngon, bổ dưỡng', 59000, 1, 3),
(13, 'Seafood Pesto', 'Pizza hải sản với tôm, mực nghêu và nấm trên nền sốt Pesto và phô mai.\r\n\r\nMón ăn vô cùng hấp dẫn và ngon lành, vô cùng tiện lợi', 'pizza_lap_xuong_large.jpg', 33, 'Pizza hải sản với tôm, mực nghêu và nấm trên nền sốt Pesto và phô mai.\r\n\r\nMón ăn vô cùng hấp dẫn và ngon lành, vô cùng tiện lợi', 269000, 4, 3),
(14, 'Seafood Chowder', 'Súp hải sản phủ bánh nướng.\r\n\r\nMón canh ngon lành và đầy màu sắc, hương vị thơm ngon, bổ dưỡng', 'sup_ngheu_large.jpg', 1, 'Súp hải sản phủ bánh nướng.\r\n\r\nMón canh ngon lành và đầy màu sắc, hương vị thơm ngon, bổ dưỡng', 59000, 1, 3),
(15, 'Cơm tấm sườn ', '<p>a</p>\r\n', 'Cơm tấm sườn -1621219021.jpg', 1, '<p>a</p>\r\n', 20000, 1, 1),
(16, 'Cơm tấm gà nướng', '<p>1</p>\r\n', 'Cơm tấm gà nướng-1621219181.jpg', 1, '<p>a</p>\r\n', 25000, 1, 1),
(17, 'Cơm thịt xíu', '<p>1</p>\r\n', 'Cơm thịt xíu-1621219422.jpg', 1, '<p>1</p>\r\n', 15000, 1, 1),
(18, 'Cơm Huế', '<p>1</p>\r\n', 'Cơm Huế-1621219586.jpg', 1, '<p>1</p>\r\n', 25000, 1, 1),
(19, 'Bánh bông lan trứng muối', '<p>1</p>\r\n', 'Bánh bông lan trứng muối-1621219741.jpg', 30, '<p>1</p>\r\n', 50000, 2, 1),
(20, 'Bánh gato kem cuộn', '<p>1</p>\r\n', 'Bánh gato kem cuộn-1621219802.jpg', 29, '<p>1</p>\r\n', 11000, 2, 3),
(21, 'Bánh bông lan', '<p>1</p>\r\n', 'Bánh bông lan-1621219871.jpg', 29, '<p>1</p>\r\n', 15000, 2, 1),
(22, 'Bánh mỳ chả thịt', '<p>1</p>\r\n', 'Bánh mỳ chả thịt-1621219916.jpg', 30, '<p>1</p>\r\n', 15000, 2, 1),
(23, 'Bánh mỳ bơ tỏi', '<p>1</p>\r\n', 'Bánh mỳ bơ tỏi-1621220007.jpeg', 30, '<p>1</p>\r\n', 20000, 2, 2),
(24, 'Bánh bao chiên', '<p>1</p>\r\n', 'Bánh bao chiên-1621220051.jpeg', 30, '<p>1</p>\r\n', 10000, 2, 2),
(25, 'Bánh bao không nhân', '<p>1</p>\r\n', 'Bánh bao không nhân-1621220086.jpeg', 30, '<p>1</p>\r\n', 10000, 2, 2),
(26, 'Bánh bao thịt', '<p>1</p>\r\n', 'Bánh bao thịt-1621220114.jpeg', 30, '<p>1</p>\r\n', 14000, 2, 2),
(27, 'Bánh mỳ không', '<p>1</p>\r\n', 'Bánh mỳ không-1621220154.jpg', 30, '<p>1</p>\r\n', 2000, 2, 1),
(28, 'Bánh mỳ ốp la', '<p>1</p>\r\n', 'Bánh mỳ ốp la-1621220188.jpg', 30, '<p>1</p>\r\n', 15000, 2, 1),
(29, 'Bánh mỳ thịt nướng', '<p>1</p>\r\n', 'Bánh mỳ thịt nướng-1621220220.jpg', 30, '<p>1</p>\r\n', 14000, 2, 1),
(30, 'Bánh mỳ xúc xích', '<p>1</p>\r\n', 'Bánh mỳ xúc xích-1621220251.jpeg', 30, '<p>1</p>\r\n', 17000, 2, 3),
(31, 'Bánh mỳ lúa mạch', '<p>1</p>\r\n', 'Bánh mỳ lúa mạch-1621220303.jpg', 29, '<p>1</p>\r\n', 10000, 2, 3),
(32, 'Bánh tart trứng', '<p>1</p>\r\n', 'Bánh tart trứng-1621220339.jpg', 29, '<p>1</p>\r\n', 20000, 2, 3),
(33, 'Hot dog', '<p>1</p>\r\n', 'Hot dog-1621220370.jpg', 30, '<p>1</p>\r\n', 25000, 2, 3),
(34, 'Cà phê sữa Sài gòn', '<p>1</p>\r\n', 'Cà phê sữa Sài gòn-1621220439.jpg', 32, '<p>1</p>\r\n', 15000, 3, 1),
(35, 'Cà phê đen', '<p>1</p>\r\n', 'Cà phê đen-1621220464.jpg', 32, '<p>1</p>\r\n', 14000, 3, 1),
(36, 'Cà ơhê sữa', '<p>1</p>\r\n', 'Cà ơhê sữa-1621220494.jpg', 32, '<p>1</p>\r\n', 16000, 3, 1),
(37, 'Cà phê đen Sài gòn', '<p>1</p>\r\n', 'Cà phê đen Sài gòn-1621220528.jpg', 32, '<p>1</p>\r\n', 20000, 3, 1),
(38, 'Bạc xỉu đá', '<p>1</p>\r\n', 'Bạc xỉu đá-1621220599.jpeg', 32, '<p>1</p>\r\n', 15000, 3, 1),
(39, 'Trà sữa socola', '<p>1</p>\r\n', 'Trà sữa socola-1621220678.jpeg', 31, '<p>1</p>\r\n', 15000, 3, 2),
(40, 'Trà sữa thái xanh', '<p>123</p>\r\n', 'Trà sữa thái xanh-1621220725.jpg', 31, '<p>1</p>\r\n', 20000, 3, 2),
(41, 'Trà sữa đặc biệt', '<p>1</p>\r\n', 'Trà sữa đặc biệt-1621220821.jpg', 31, '<p>1</p>\r\n', 25000, 3, 2),
(42, 'Trà sữa việt quất', '<p>1</p>\r\n', 'Trà sữa việt quất-1621220853.jpeg', 31, '<p>1</p>\r\n', 25000, 3, 2),
(43, 'Trà sữa truyền thống', '<p>1</p>\r\n', 'Trà sữa truyền thống-1621220891.jpeg', 31, '<p>1</p>\r\n', 20000, 3, 2),
(44, 'Pizza hải sản ', '<p>1</p>\r\n', 'Pizza hải sản -1621220977.jpg', 33, '<p>1</p>\r\n', 150000, 4, 3),
(45, 'Pizza bò', '<p>1</p>\r\n', 'Pizza bò-1621221283.jpg', 33, '<p>1</p>\r\n', 50000, 4, 3),
(46, 'Pizza phô mai', '<p>1</p>\r\n', 'Pizza phô mai-1621221313.jpg', 33, '<p>1</p>\r\n', 100000, 4, 3),
(47, 'Pizza Roma', '<p>1</p>\r\n', 'Pizza Roma-1621221352.jpg', 33, '<p>1</p>\r\n', 110000, 4, 3),
(48, 'Hamberger đậu phụ', '<p>1</p>\r\n', 'Hamberger đậu phụ-1621221471.jpg', 34, '<p>1</p>\r\n', 20000, 4, 3),
(49, 'Hamberger thịt heo', '<p>1</p>\r\n', 'Hamberger thịt heo-1621221515.png', 34, '', 100000, 4, 3),
(50, 'Hamberger cá ngừ', '<p>1</p>\r\n', 'Hamberger cá ngừ-1621221545.png', 34, '<p>1</p>\r\n', 20000, 4, 3),
(51, 'Hamberger thịt nướng', '<p>1</p>\r\n', 'Hamberger thịt nướng-1621221585.png', 34, '<p>1</p>\r\n', 20000, 4, 3),
(52, 'Gà rán H&S', '<p>1</p>\r\n', 'Gà rán H&S-1621221689.jpeg', 35, '<p>1</p>\r\n', 50000, 4, 3),
(53, 'Gà rán sốt phô mai', '<p>1</p>\r\n', 'Gà rán sốt phô mai-1621221722.jpeg', 35, '<p>1</p>\r\n', 46000, 4, 3),
(54, 'Gà rán sốt đậu', '<p>1</p>\r\n', 'Gà rán sốt đậu-1621221749.jpeg', 35, '<p>1</p>\r\n', 45000, 4, 2),
(55, 'Bún riêu chả', '<p>1</p>\r\n', 'Bún riêu chả-1621221810.jpg', 36, '<p>1</p>\r\n', 25000, 5, 1),
(56, 'bún chả cá', '<p>1</p>\r\n', 'bún chả cá-1621221843.jpg', 36, '<p>1</p>\r\n', 25000, 5, 1),
(57, 'Bún thập cẩm', '<p>11</p>\r\n', 'Bún thập cẩm-1621221876.jpg', 36, '<p>1</p>\r\n', 23000, 5, 1),
(58, 'Bún bò Huế', '<p>1</p>\r\n', 'Bún bò Huế-1621221953.jpg', 36, '<p>1</p>\r\n', 25000, 5, 1),
(59, 'Mỳ quảng đặc biệt', '<p>1</p>\r\n', 'Mỳ quảng đặc biệt-1621222031.jpeg', 37, '<p>1</p>\r\n', 25000, 5, 1),
(60, 'Mỳ quảng sứa', '<p>1</p>\r\n', 'Mỳ quảng sứa-1621222075.jpeg', 37, '<p>1</p>\r\n', 24000, 5, 1),
(61, 'Mỳ quảng thập cẩm', '<p>1</p>\r\n', 'Mỳ quảng thập cẩm-1621222120.jpeg', 37, '<p>1</p>\r\n', 24000, 5, 1),
(62, 'Phở tái', '<p>1</p>\r\n', 'Phở tái-1621222181.jpg', 38, '<p>1</p>\r\n', 27000, 5, 1),
(63, 'Phở nạm', '<p>1</p>\r\n', 'Phở nạm-1621222202.jpg', 38, '<p>1</p>\r\n', 24000, 5, 1),
(64, 'Phở bò viên', '<p>1</p>\r\n', 'Phở bò viên-1621222238.jpeg', 38, '<p>1</p>\r\n', 30000, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `source`
--

CREATE TABLE `source` (
  `source_id` int(10) NOT NULL,
  `source_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `source`
--

INSERT INTO `source` (`source_id`, `source_name`) VALUES
(1, 'Ẩm thực Việt'),
(2, 'Ẩm thực Á'),
(3, 'Ẩm thực Âu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL,
  `coupon_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `coupon_id`, `coupon_name`, `coupon_code`, `coupon_value`) VALUES
(1, 5, 1, 'Giảm giá tháng 6 10% tổng giá trị đơn hàng', 'TVSDGGT6', 0.1),
(2, 5, 2, 'Giảm giá tháng 7 15% tổng giá trị đơn hàng', 'TVSDGGT7', 0.15),
(3, 5, 3, 'Giảm giá tháng 8 15% tổng giá trị đơn hàng', 'TVSDGGT8', 0.1),
(8, 5, 6, '111', '123456', 0.1),
(9, 5, 7, '1111', '12345', 0.1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum_money` float NOT NULL,
  `total` int(10) NOT NULL,
  `order_day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `name`, `phone`, `email`, `address`, `sum_money`, `total`, `order_day`) VALUES
(1, 0, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(2, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(3, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(4, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(5, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(6, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(7, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(8, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(9, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(10, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(11, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(12, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(13, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(14, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(15, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(16, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(17, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(18, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(19, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, ''),
(20, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 07:04:35'),
(21, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:24:09'),
(22, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:24:16'),
(23, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:25:20'),
(24, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:45:05'),
(25, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:47:29'),
(26, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 10:49:22'),
(27, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 69000, 0, '2021-05-25 10:57:36'),
(28, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 48000, 0, '2021-05-25 12:08:45'),
(29, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 72000, 0, '2021-05-25 12:08:45'),
(30, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 97000, 0, '2021-05-25 12:08:45'),
(31, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 48000, 0, '2021-05-25 12:08:45'),
(32, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 72000, 0, '2021-05-25 12:08:45'),
(33, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 97000, 0, '2021-05-25 12:08:45'),
(34, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 48000, 0, '2021-05-25 12:08:45'),
(35, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 72000, 0, '2021-05-25 12:08:45'),
(36, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 97000, 0, '2021-05-25 12:08:45'),
(37, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 12:20:04'),
(38, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 12:20:04'),
(39, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 12:20:04'),
(40, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 12:20:04'),
(41, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 14:19:26'),
(42, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 14:20:20'),
(43, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-05-25 14:22:59'),
(44, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 125000, 0, '2021-05-25 14:25:02'),
(45, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 225000, 0, '2021-05-25 15:52:36'),
(46, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 250000, 0, '2021-05-25 15:52:36'),
(47, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 225000, 0, '2021-05-25 15:52:36'),
(48, 5, 'Đặng Văn Duẫn', '123456789', 'huy@gmail.com', 'Cẩm Lệ', 250000, 0, '2021-05-25 15:52:36'),
(49, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 27000, 0, '2021-05-28 16:46:33'),
(50, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 87000, 0, '2021-05-28 16:46:33'),
(51, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 27000, 0, '2021-05-28 16:46:33'),
(52, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 87000, 0, '2021-05-28 16:46:33'),
(53, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 649000, 0, '2021-06-03 12:05:48'),
(54, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 708000, 0, '2021-06-03 12:05:48'),
(55, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 649000, 0, '2021-06-03 12:05:48'),
(56, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 708000, 0, '2021-06-03 12:05:48'),
(57, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 58000, 0, '2021-06-03 12:11:50'),
(58, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 97000, 0, '2021-06-03 12:11:50'),
(59, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 58000, 0, '2021-06-03 12:11:50'),
(60, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 97000, 0, '2021-06-03 12:11:50'),
(61, 29, 'Lê Huy', '0769710126', 'huy1234@gmail.com', '09', 269000, 0, '2021-06-03 12:17:54'),
(62, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 59000, 0, '2021-06-04 03:45:29'),
(63, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-04 03:46:15'),
(64, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-04 03:46:41'),
(65, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-04 14:30:20'),
(66, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 59000, 0, '2021-06-04 14:41:19'),
(67, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 272000, 0, '2021-06-04 14:53:03'),
(68, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-05 14:16:40'),
(69, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-05 15:03:39'),
(70, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 0, '2021-06-05 15:16:07'),
(71, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-05 15:16:57'),
(72, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 25000, 0, '2021-06-05 15:25:49'),
(73, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 0, '2021-06-05 15:56:32'),
(74, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-05 16:05:18'),
(75, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-05 16:07:21'),
(76, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 20000, 0, '2021-06-06 03:27:19'),
(77, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-06 03:27:44'),
(78, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 25000, 0, '2021-06-06 03:33:36'),
(79, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 0, '2021-06-06 03:39:47'),
(80, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-06 04:15:51'),
(81, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 39000, 0, '2021-06-06 04:16:26'),
(82, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 127000, 0, '2021-06-06 04:20:38'),
(83, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 127000, 0, '2021-06-06 04:20:38'),
(84, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 328000, 0, '2021-06-06 04:21:37'),
(85, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 328000, 0, '2021-06-06 04:21:37'),
(86, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 84000, 0, '2021-06-06 04:25:33'),
(87, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 84000, 0, '2021-06-06 04:25:33'),
(88, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 48000, 0, '2021-06-06 04:26:01'),
(89, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 48000, 0, '2021-06-06 04:26:01'),
(90, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 70000, 0, '2021-06-06 04:37:24'),
(91, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 70000, 0, '2021-06-06 04:37:24'),
(92, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 24000, 0, '2021-06-06 15:35:53'),
(93, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 24000, 0, '2021-06-06 15:35:53'),
(94, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-06 15:39:55'),
(95, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-06 15:39:55'),
(96, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 298000, 0, '2021-06-06 15:40:48'),
(97, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 298000, 0, '2021-06-06 15:40:48'),
(98, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 73000, 0, '2021-06-06 16:00:47'),
(99, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 73000, 0, '2021-06-06 16:00:47'),
(100, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 04:53:26'),
(101, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 04:53:26'),
(102, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 04:56:04'),
(103, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 04:56:04'),
(104, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-07 05:20:47'),
(105, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 337000, 0, '2021-06-07 05:20:47'),
(106, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-07 05:20:47'),
(107, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 337000, 0, '2021-06-07 05:20:47'),
(108, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-07 05:21:46'),
(109, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 91000, 0, '2021-06-07 05:21:46'),
(110, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 0, '2021-06-07 05:21:46'),
(111, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 91000, 0, '2021-06-07 05:21:46'),
(112, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-07 05:23:46'),
(113, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 538000, 0, '2021-06-07 05:23:46'),
(114, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-07 05:23:46'),
(115, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 538000, 0, '2021-06-07 05:23:46'),
(116, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 0, '2021-06-07 05:36:32'),
(117, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 56000, 0, '2021-06-07 05:36:32'),
(118, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 09:56:18'),
(119, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 09:56:18'),
(120, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 09:57:32'),
(121, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 09:57:32'),
(122, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 53100, 0, '2021-06-07 10:01:31'),
(123, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 106200, 0, '2021-06-07 10:01:31'),
(124, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 269000, 0, '2021-06-07 10:03:07'),
(125, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 294000, 0, '2021-06-07 10:03:07'),
(126, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 0, '2021-06-07 10:08:21'),
(127, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 54000, 0, '2021-06-07 10:08:21'),
(128, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 64000, 0, '2021-06-07 10:09:59'),
(129, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 263700, 0, '2021-06-07 10:12:30'),
(130, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 266400, 0, '2021-06-07 10:14:47'),
(131, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 10:19:34'),
(132, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 264600, 0, '2021-06-07 10:22:28'),
(133, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-07 10:25:40'),
(134, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 48600, 0, '2021-06-07 10:27:34'),
(135, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 116100, 0, '2021-06-07 14:34:42'),
(136, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 242100, 0, '2021-06-07 14:36:49'),
(137, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 21250, 0, '2021-06-15 04:14:39'),
(138, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 228650, 0, '2021-06-15 04:32:15'),
(139, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 21600, 0, '2021-06-15 04:40:35'),
(140, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 48600, 0, '2021-06-15 04:45:11'),
(141, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 21600, 0, '2021-06-15 04:48:57'),
(142, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 87550, 103000, '2021-06-15 05:08:08'),
(143, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 75600, 84000, '2021-06-15 09:58:54'),
(144, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 50150, 59000, '2021-06-22 13:41:23'),
(145, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 78200, 92000, '2021-06-22 15:35:08'),
(146, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 114300, 127000, '2021-06-22 17:44:38'),
(147, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 242100, 269000, '2021-06-23 03:08:02'),
(148, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-23 03:08:40'),
(149, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 25500, 30000, '2021-06-23 03:09:27'),
(150, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 49300, 58000, '2021-06-23 04:00:23'),
(151, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 517500, 575000, '2021-06-23 11:36:50'),
(152, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-23 11:37:41'),
(153, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 25500, 30000, '2021-06-23 11:44:45'),
(154, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 50150, 59000, '2021-06-23 11:52:20'),
(155, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 61200, 68000, '2021-06-23 12:24:13'),
(156, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-23 12:24:34'),
(157, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 20400, 0, '2021-06-23 13:05:15'),
(158, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 20400, 0, '2021-06-23 13:06:45'),
(159, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 68000, 57800, '2021-06-23 13:08:28'),
(160, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 59000, 50150, '2021-06-23 13:37:58'),
(161, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 413000, 371700, '2021-06-23 16:19:28'),
(162, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 49000, 44100, '2021-06-23 16:22:13'),
(163, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 59000, 0, '2021-06-23 16:31:27'),
(164, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 0, 0, '2021-06-23 16:32:49'),
(165, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 29000, 24650, '2021-06-23 16:33:07'),
(166, 5, 'Đặng Văn Duẫn', '0123456789', 'huy@gmail.com', 'Cẩm Lệ', 24000, 20400, '2021-06-27 14:42:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `full_name`, `phone`, `address`) VALUES
(1, 'tranquoctrung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Quốc Trung', '0425161342 ', 'Đà Nẵng'),
(2, 'tranquoctrung2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Quốc Trung', '0425161342', 'Đà Nẵng'),
(3, 'nguyenvana34@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn A', '0981234567', 'Quảng Nam'),
(4, 'nguyenvana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn A', '0981234567', 'Quảng Nam'),
(5, 'huy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Văn Duẫn', '0123456789', 'Cẩm Lệ'),
(29, 'huy1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Huy', '0769710126', '09'),
(31, 'huy1111@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Huy', '0769710126', 'Cẩm Lệ'),
(32, 'huy2222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Văn Duẫn', '0769710126', 'Cẩm Lệ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`source_id`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT cho bảng `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `source`
--
ALTER TABLE `source`
  MODIFY `source_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
