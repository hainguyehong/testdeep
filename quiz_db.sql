-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 18, 2024 lúc 06:24 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quiz_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cau_hoi`
--

CREATE TABLE `cau_hoi` (
  `ma_cau_hoi` int(11) NOT NULL,
  `ten_cau_hoi` varchar(255) NOT NULL,
  `muc_do` int(11) NOT NULL,
  `loai_cau_hoi` int(11) NOT NULL,
  `hinh_anh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cau_hoi`
--

INSERT INTO `cau_hoi` (`ma_cau_hoi`, `ten_cau_hoi`, `muc_do`, `loai_cau_hoi`, `hinh_anh`) VALUES
(1, 'Sắp xếp các mùa theo thứ tự đúng ', 1, 3, ''),
(2, 'sắp xếp các câu sau theo thứ tự kết quả tăng dần', 1, 3, ''),
(3, 'sắp xếp các màu bạn nhìn thấy theo thứ tự từ trái sang phải ', 1, 3, '1.jpg'),
(4, 'hàm test 2 ', 1, 1, ''),
(5, 'hàm test 3', 1, 2, ''),
(6, 'hàm tesst 4', 1, 4, ''),
(7, 'hàm test 5', 1, 5, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dap_an_sap_xep`
--

CREATE TABLE `dap_an_sap_xep` (
  `ma_da` int(11) NOT NULL,
  `cac_dap_an` varchar(255) NOT NULL,
  `ma_cau_hoi` int(11) NOT NULL,
  `thu_tu_dap_an_dung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dap_an_sap_xep`
--

INSERT INTO `dap_an_sap_xep` (`ma_da`, `cac_dap_an`, `ma_cau_hoi`, `thu_tu_dap_an_dung`) VALUES
(1, 'xuân', 1, 1),
(2, 'thu', 1, 3),
(3, 'hạ', 1, 2),
(4, 'đông', 1, 4),
(5, '1', 2, 1),
(6, '3', 2, 4),
(7, '4', 2, 2),
(8, '2', 2, 3),
(9, '5', 2, 5),
(13, 'xanh lá cây', 3, 4),
(14, 'đỏ', 3, 2),
(15, 'vàng', 3, 3),
(16, 'xanh nước biển', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su`
--

CREATE TABLE `lich_su` (
  `id_lich_su` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diem_so` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_su`
--

INSERT INTO `lich_su` (`id_lich_su`, `id_user`, `diem_so`) VALUES
(1, 1, 0),
(2, 1, 33.33),
(3, 1, 33.33),
(4, 1, 33.33),
(5, 1, 33.33),
(6, 1, 0),
(7, 1, 0),
(8, 1, 0),
(9, 1, 0),
(10, 1, 0),
(11, 1, 0),
(12, 1, 0),
(13, 1, 0),
(14, 1, 0),
(15, 1, 0),
(16, 1, 0),
(17, 1, 0),
(18, 1, 0),
(19, 1, 0),
(20, 1, 0),
(21, 1, 0),
(22, 1, 0),
(23, 1, 0),
(24, 1, 33.33),
(25, 1, 33.33),
(26, 1, 0),
(27, 1, 0),
(28, 1, 0),
(29, 1, 66.67),
(30, 1, 66.67),
(31, 1, 66.67),
(32, 1, 0),
(33, 1, 0),
(34, 1, 0),
(35, 1, 0),
(36, 1, 33.33),
(37, 1, 33.33),
(38, 1, 33.33),
(39, 1, 0),
(40, 1, 0),
(41, 1, 0),
(42, 1, 0),
(43, 1, 0),
(44, 1, 0),
(45, 1, 0),
(46, 1, 0),
(47, 1, 33.33),
(48, 1, 33.33),
(49, 1, 33.33),
(50, 1, 33.33),
(51, 1, 33.33),
(52, 1, 33.33),
(53, 1, 33.33),
(54, 1, 33.33),
(55, 1, 33.33),
(56, 1, 33.33),
(57, 1, 33.33),
(58, 1, 33.33),
(59, 1, 33.33),
(60, 1, 33.33),
(61, 1, 33.33),
(62, 1, 33.33),
(63, 1, 33.33),
(64, 1, 33.33),
(65, 1, 33.33),
(66, 1, 0),
(67, 1, 0),
(68, 1, 66.67),
(69, 1, 66.67),
(70, 1, 33.33),
(71, 1, 33.33),
(72, 1, 33.33),
(73, 1, 33.33),
(74, 1, 33.33),
(75, 1, 66.67),
(76, 1, 66.67),
(77, 1, 66.67),
(78, 1, 66.67),
(79, 1, 33.33),
(80, 1, 33.33),
(81, 1, 33.33),
(82, 1, 33.33),
(83, 1, 33.33),
(84, 1, 33.33),
(85, 1, 33.33),
(86, 1, 0),
(87, 1, 0),
(88, 1, 0),
(89, 1, 0),
(90, 1, 0),
(91, 1, 0),
(92, 1, 0),
(93, 1, 0),
(94, 1, 33.33),
(95, 1, 33.33),
(96, 1, 33.33),
(97, 1, 33.33),
(98, 1, 33.33),
(99, 1, 33.33),
(100, 1, 0),
(101, 1, 0),
(102, 1, 33.33),
(103, 1, 33.33),
(104, 1, 33.33),
(105, 1, 33.33),
(106, 1, 33.33),
(107, 1, 33.33),
(108, 1, 33.33),
(109, 1, 33.33),
(110, 1, 33.33),
(111, 1, 33.33),
(112, 1, 0),
(113, 1, 0),
(114, 1, 0),
(115, 1, 0),
(116, 1, 33.33),
(117, 1, 0),
(118, 1, 0),
(119, 1, 0),
(120, 1, 0),
(121, 1, 0),
(122, 1, 0),
(123, 1, 0),
(124, 1, 0),
(125, 1, 0),
(126, 1, 0),
(127, 1, 0),
(128, 1, 0),
(129, 1, 33.33),
(130, 1, 0),
(131, 1, 33.33),
(132, 1, 0),
(133, 1, 0),
(134, 1, 0),
(135, 1, 0),
(136, 1, 0),
(137, 1, 0),
(138, 1, 0),
(139, 1, 0),
(140, 1, 0),
(141, 1, 0),
(142, 1, 0),
(143, 1, 0),
(144, 1, 0),
(145, 1, 0),
(146, 1, 0),
(147, 1, 0),
(148, 1, 0),
(149, 1, 33.33),
(150, 1, 33.33),
(151, 1, 33.33),
(152, 1, 0),
(153, 1, 0),
(154, 1, 0),
(155, 1, 0),
(156, 1, 0),
(157, 1, 33.33),
(158, 1, 0),
(159, 1, 0),
(160, 1, 0),
(161, 1, 33.33),
(162, 1, 0),
(163, 1, 0),
(164, 1, 0),
(165, 1, 33.33),
(166, 1, 0),
(167, 1, 0),
(168, 1, 33.33),
(169, 1, 33.33),
(170, 1, 0),
(171, 1, 0),
(172, 1, 33.33),
(173, 1, 66.67),
(174, 1, 0),
(175, 1, 0),
(176, 1, 0),
(177, 1, 66.67),
(178, 1, 100),
(179, 1, 100),
(180, 1, 100),
(181, 1, 0),
(182, 1, 100),
(183, 1, 100),
(184, 1, 100),
(185, 1, 33.33),
(186, 1, 100),
(187, 1, 0),
(188, 1, 0),
(189, 1, 0),
(190, 1, 0),
(191, 1, 0),
(192, 1, 100),
(193, 1, 100),
(194, 1, 100),
(195, 1, 100),
(196, 1, 0),
(197, 1, 0),
(198, 1, 0),
(199, 1, 0),
(200, 1, 0),
(201, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_cau_hoi`
--

CREATE TABLE `loai_cau_hoi` (
  `ma_loai_cau` int(11) NOT NULL,
  `ten_loai_cau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_cau_hoi`
--

INSERT INTO `loai_cau_hoi` (`ma_loai_cau`, `ten_loai_cau`) VALUES
(1, 'Nối'),
(2, 'Điền'),
(3, 'Sắp xếp'),
(4, 'một đáp án'),
(5, 'nhiều đáp án');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_answers`
--

CREATE TABLE `user_answers` (
  `id_user_answer` int(11) NOT NULL,
  `ma_cau_hoi` int(11) NOT NULL,
  `so_lan_tra_loi_sai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_answers`
--

INSERT INTO `user_answers` (`id_user_answer`, `ma_cau_hoi`, `so_lan_tra_loi_sai`, `id_user`) VALUES
(1, 1, 8, 1),
(2, 2, 8, 1),
(3, 3, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_answers_correct`
--

CREATE TABLE `user_answers_correct` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thu_tu_tra_loi` int(11) NOT NULL,
  `ma_cau_hoi` int(11) NOT NULL,
  `ma_da` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_answers_correct`
--

INSERT INTO `user_answers_correct` (`id`, `id_user`, `thu_tu_tra_loi`, `ma_cau_hoi`, `ma_da`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 3, 1, 2),
(3, 1, 2, 1, 3),
(4, 1, 4, 1, 4),
(5, 1, 1, 2, 5),
(6, 1, 4, 2, 6),
(7, 1, 2, 2, 7),
(8, 1, 3, 2, 8),
(9, 1, 5, 2, 9),
(10, 1, 4, 3, 13),
(11, 1, 2, 3, 14),
(12, 1, 3, 3, 15),
(13, 1, 1, 3, 16),
(14, 1, 1, 1, 1),
(15, 1, 3, 1, 2),
(16, 1, 2, 1, 3),
(17, 1, 4, 1, 4),
(18, 1, 1, 2, 5),
(19, 1, 4, 2, 6),
(20, 1, 2, 2, 7),
(21, 1, 3, 2, 8),
(22, 1, 5, 2, 9),
(23, 1, 4, 3, 13),
(24, 1, 2, 3, 14),
(25, 1, 3, 3, 15),
(26, 1, 1, 3, 16),
(27, 1, 1, 1, 1),
(28, 1, 2, 1, 2),
(29, 1, 3, 1, 3),
(30, 1, 4, 1, 4),
(31, 1, 1, 2, 5),
(32, 1, 4, 2, 8),
(33, 1, 2, 2, 6),
(34, 1, 3, 2, 7),
(35, 1, 5, 2, 9),
(36, 1, 4, 3, 16),
(37, 1, 3, 3, 15),
(38, 1, 2, 3, 14),
(39, 1, 1, 3, 13),
(40, 1, 1, 1, 1),
(41, 1, 3, 1, 2),
(42, 1, 2, 1, 3),
(43, 1, 4, 1, 4),
(44, 1, 1, 2, 5),
(45, 1, 4, 2, 6),
(46, 1, 2, 2, 7),
(47, 1, 3, 2, 8),
(48, 1, 5, 2, 9),
(49, 1, 4, 3, 13),
(50, 1, 2, 3, 14),
(51, 1, 3, 3, 15),
(52, 1, 1, 3, 16),
(53, 1, 1, 1, 1),
(54, 1, 2, 1, 2),
(55, 1, 3, 1, 3),
(56, 1, 4, 1, 4),
(57, 1, 1, 2, 5),
(58, 1, 2, 2, 6),
(59, 1, 3, 2, 7),
(60, 1, 4, 2, 8),
(61, 1, 5, 2, 9),
(62, 1, 1, 3, 13),
(63, 1, 2, 3, 14),
(64, 1, 3, 3, 15),
(65, 1, 4, 3, 16),
(66, 1, 1, 1, 1),
(67, 1, 2, 1, 2),
(68, 1, 3, 1, 3),
(69, 1, 4, 1, 4),
(70, 1, 1, 2, 5),
(71, 1, 2, 2, 6),
(72, 1, 3, 2, 7),
(73, 1, 4, 2, 8),
(74, 1, 5, 2, 9),
(75, 1, 1, 3, 13),
(76, 1, 2, 3, 14),
(77, 1, 3, 3, 15),
(78, 1, 4, 3, 16),
(79, 1, 1, 1, 1),
(80, 1, 2, 1, 2),
(81, 1, 3, 1, 3),
(82, 1, 4, 1, 4),
(83, 1, 1, 2, 5),
(84, 1, 2, 2, 6),
(85, 1, 3, 2, 7),
(86, 1, 4, 2, 8),
(87, 1, 5, 2, 9),
(88, 1, 1, 3, 13),
(89, 1, 2, 3, 14),
(90, 1, 3, 3, 15),
(91, 1, 4, 3, 16),
(92, 1, 1, 1, 1),
(93, 1, 2, 1, 2),
(94, 1, 3, 1, 3),
(95, 1, 4, 1, 4),
(96, 1, 1, 2, 5),
(97, 1, 2, 2, 6),
(98, 1, 3, 2, 7),
(99, 1, 4, 2, 8),
(100, 1, 5, 2, 9),
(101, 1, 1, 3, 13),
(102, 1, 2, 3, 14),
(103, 1, 3, 3, 15),
(104, 1, 4, 3, 16),
(105, 1, 1, 1, 1),
(106, 1, 2, 1, 2),
(107, 1, 3, 1, 3),
(108, 1, 4, 1, 4),
(109, 1, 1, 2, 5),
(110, 1, 2, 2, 6),
(111, 1, 3, 2, 7),
(112, 1, 4, 2, 8),
(113, 1, 5, 2, 9),
(114, 1, 1, 3, 13),
(115, 1, 2, 3, 14),
(116, 1, 3, 3, 15),
(117, 1, 4, 3, 16),
(118, 1, 1, 1, 1),
(119, 1, 3, 1, 2),
(120, 1, 2, 1, 3),
(121, 1, 4, 1, 4),
(122, 1, 1, 2, 5),
(123, 1, 4, 2, 6),
(124, 1, 2, 2, 7),
(125, 1, 3, 2, 8),
(126, 1, 5, 2, 9),
(127, 1, 4, 3, 13),
(128, 1, 2, 3, 14),
(129, 1, 3, 3, 15),
(130, 1, 1, 3, 16),
(131, 1, 1, 1, 1),
(132, 1, 3, 1, 2),
(133, 1, 2, 1, 3),
(134, 1, 4, 1, 4),
(135, 1, 1, 2, 5),
(136, 1, 4, 2, 6),
(137, 1, 2, 2, 7),
(138, 1, 3, 2, 8),
(139, 1, 5, 2, 9),
(140, 1, 4, 3, 13),
(141, 1, 2, 3, 14),
(142, 1, 3, 3, 15),
(143, 1, 1, 3, 16),
(144, 1, 1, 1, 1),
(145, 1, 3, 1, 2),
(146, 1, 2, 1, 3),
(147, 1, 4, 1, 4),
(148, 1, 1, 2, 5),
(149, 1, 4, 2, 6),
(150, 1, 2, 2, 7),
(151, 1, 3, 2, 8),
(152, 1, 5, 2, 9),
(153, 1, 4, 3, 13),
(154, 1, 2, 3, 14),
(155, 1, 3, 3, 15),
(156, 1, 1, 3, 16),
(157, 1, 1, 1, 1),
(158, 1, 3, 1, 2),
(159, 1, 2, 1, 3),
(160, 1, 4, 1, 4),
(161, 1, 1, 2, 5),
(162, 1, 4, 2, 6),
(163, 1, 2, 2, 7),
(164, 1, 3, 2, 8),
(165, 1, 5, 2, 9),
(166, 1, 4, 3, 13),
(167, 1, 2, 3, 14),
(168, 1, 3, 3, 15),
(169, 1, 1, 3, 16),
(170, 1, 1, 1, 1),
(171, 1, 2, 1, 2),
(172, 1, 3, 1, 3),
(173, 1, 4, 1, 4),
(174, 1, 1, 2, 5),
(175, 1, 2, 2, 6),
(176, 1, 3, 2, 7),
(177, 1, 4, 2, 8),
(178, 1, 5, 2, 9),
(179, 1, 1, 3, 13),
(180, 1, 2, 3, 14),
(181, 1, 3, 3, 15),
(182, 1, 4, 3, 16),
(183, 1, 1, 1, 1),
(184, 1, 2, 1, 2),
(185, 1, 3, 1, 3),
(186, 1, 4, 1, 4),
(187, 1, 1, 2, 5),
(188, 1, 2, 2, 6),
(189, 1, 3, 2, 7),
(190, 1, 4, 2, 8),
(191, 1, 5, 2, 9),
(192, 1, 1, 3, 13),
(193, 1, 2, 3, 14),
(194, 1, 3, 3, 15),
(195, 1, 4, 3, 16),
(196, 1, 1, 1, 1),
(197, 1, 2, 1, 2),
(198, 1, 3, 1, 3),
(199, 1, 4, 1, 4),
(200, 1, 1, 2, 5),
(201, 1, 2, 2, 6),
(202, 1, 3, 2, 7),
(203, 1, 4, 2, 8),
(204, 1, 5, 2, 9),
(205, 1, 1, 3, 13),
(206, 1, 2, 3, 14),
(207, 1, 3, 3, 15),
(208, 1, 4, 3, 16),
(209, 1, 1, 1, 1),
(210, 1, 2, 1, 2),
(211, 1, 3, 1, 3),
(212, 1, 4, 1, 4),
(213, 1, 1, 2, 5),
(214, 1, 2, 2, 6),
(215, 1, 3, 2, 7),
(216, 1, 4, 2, 8),
(217, 1, 5, 2, 9),
(218, 1, 1, 3, 13),
(219, 1, 2, 3, 14),
(220, 1, 3, 3, 15),
(221, 1, 4, 3, 16),
(222, 1, 1, 1, 1),
(223, 1, 2, 1, 2),
(224, 1, 3, 1, 3),
(225, 1, 4, 1, 4),
(226, 1, 1, 2, 5),
(227, 1, 2, 2, 6),
(228, 1, 3, 2, 7),
(229, 1, 4, 2, 8),
(230, 1, 5, 2, 9),
(231, 1, 1, 3, 13),
(232, 1, 2, 3, 14),
(233, 1, 3, 3, 15),
(234, 1, 4, 3, 16),
(235, 1, 1, 1, 1),
(236, 1, 2, 1, 2),
(237, 1, 3, 1, 3),
(238, 1, 4, 1, 4),
(239, 1, 1, 2, 5),
(240, 1, 2, 2, 6),
(241, 1, 3, 2, 7),
(242, 1, 4, 2, 8),
(243, 1, 5, 2, 9),
(244, 1, 1, 3, 13),
(245, 1, 2, 3, 14),
(246, 1, 3, 3, 15),
(247, 1, 4, 3, 16);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cau_hoi`
--
ALTER TABLE `cau_hoi`
  ADD PRIMARY KEY (`ma_cau_hoi`),
  ADD KEY `loai_cau_hoi` (`loai_cau_hoi`);

--
-- Chỉ mục cho bảng `dap_an_sap_xep`
--
ALTER TABLE `dap_an_sap_xep`
  ADD PRIMARY KEY (`ma_da`),
  ADD KEY `ma_cau_hoi` (`ma_cau_hoi`);

--
-- Chỉ mục cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  ADD PRIMARY KEY (`id_lich_su`);

--
-- Chỉ mục cho bảng `loai_cau_hoi`
--
ALTER TABLE `loai_cau_hoi`
  ADD PRIMARY KEY (`ma_loai_cau`);

--
-- Chỉ mục cho bảng `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id_user_answer`),
  ADD KEY `ma_cau_hoi` (`ma_cau_hoi`);

--
-- Chỉ mục cho bảng `user_answers_correct`
--
ALTER TABLE `user_answers_correct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_cau_hoi` (`ma_cau_hoi`),
  ADD KEY `ma_da` (`ma_da`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cau_hoi`
--
ALTER TABLE `cau_hoi`
  MODIFY `ma_cau_hoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dap_an_sap_xep`
--
ALTER TABLE `dap_an_sap_xep`
  MODIFY `ma_da` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  MODIFY `id_lich_su` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT cho bảng `loai_cau_hoi`
--
ALTER TABLE `loai_cau_hoi`
  MODIFY `ma_loai_cau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id_user_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_answers_correct`
--
ALTER TABLE `user_answers_correct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cau_hoi`
--
ALTER TABLE `cau_hoi`
  ADD CONSTRAINT `cau_hoi_ibfk_1` FOREIGN KEY (`loai_cau_hoi`) REFERENCES `loai_cau_hoi` (`ma_loai_cau`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dap_an_sap_xep`
--
ALTER TABLE `dap_an_sap_xep`
  ADD CONSTRAINT `dap_an_sap_xep_ibfk_1` FOREIGN KEY (`ma_cau_hoi`) REFERENCES `cau_hoi` (`ma_cau_hoi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_ibfk_1` FOREIGN KEY (`ma_cau_hoi`) REFERENCES `cau_hoi` (`ma_cau_hoi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_answers_correct`
--
ALTER TABLE `user_answers_correct`
  ADD CONSTRAINT `user_answers_correct_ibfk_1` FOREIGN KEY (`ma_cau_hoi`) REFERENCES `cau_hoi` (`ma_cau_hoi`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_answers_correct_ibfk_2` FOREIGN KEY (`ma_da`) REFERENCES `dap_an_sap_xep` (`ma_da`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
