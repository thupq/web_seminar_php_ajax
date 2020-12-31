-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 10:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoithao`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `thoigian` date NOT NULL,
  `anh` varchar(100) NOT NULL,
  `mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `ten`, `thoigian`, `anh`, `mota`) VALUES
(3, 'CÆ¡ há»™i Ä‘áº§u tÆ° nÃ´ng sáº£n sáº¡ch', '2020-12-28', 'banner3', ''),
(5, 'Há»™i tháº£o xÃºc tiáº¿n Ä‘áº§u tÆ° tiÃªu thá»¥ nÃ´ng sáº£n TÃ¢y Báº¯c', '2020-12-23', 'banner1', ''),
(6, 'Tham quan vÃ  tráº£i nghiá»‡m sáº£n pháº©m', '2020-12-24', 'banner2', '');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `stt` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`stt`, `ten`) VALUES
(1, 'banner'),
(2, 'lichtrinh'),
(3, 'mathang'),
(4, 'khachmoi'),
(5, 'nhataitro');

-- --------------------------------------------------------

--
-- Table structure for table `lich`
--

CREATE TABLE `lich` (
  `id` int(8) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `tgbatdau` date NOT NULL,
  `tgketthuc` date NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `id` int(8) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `xuatxu` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`id`, `ten`, `xuatxu`, `anh`, `mota`) VALUES
(1, 'Máº­n Äiá»‡n BiÃªn', 'Äiá»‡n BiÃªn Phá»§', 'man2', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur'),
(2, 'Háº¡t dá»•i', 'TÃ¢y Báº¯c', 'doi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur'),
(3, 'ChÃ¨', 'HÃ  Giang', 'che', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur'),
(4, 'MÄƒng', 'TÃ¢y Báº¯c', 'mang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur'),
(5, 'DÃ¢u tÃ¢y', 'LÃ o Cai', 'dau', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex, obcaecati qui tempora molestiae provident itaque repellendus aliquid, cumque quis officiis iure consectetur');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(8) NOT NULL,
  `tenmuc` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `ngaysinh` varchar(10) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `vaitro` varchar(100) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(10) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `xuly` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `tenmuc`, `ten`, `ngaysinh`, `gioitinh`, `email`, `anh`, `vaitro`, `taikhoan`, `matkhau`, `mota`, `xuly`) VALUES
(1, '', 'Pham Quang Thu', '1999-02-05', 'nam', 'thu2@gmail.com', 'xxxxxxxx', 'admin', 'thupq', '12345', 'mÃ´ táº£ vá» thá»©', ''),
(3, '', 'Nguyen van A', '2020-12-01', 'nam', '', 'xxxxxxxxxxxxxx', 'thamgia', '', '', '', ''),
(7, 'khachmoi', 'Nguyen VanA', '2020-12-01', 'nam', 'thu@gmail.comd', 'img1', 'khachmoi', '', '', 'sua11', ''),
(9, 'khachmoi', 'Pham Quang Thinh', '2020-12-01', 'nam', 'thinh@gmail.com', 'img2', 'khachmoi', '', '', 'khongkhong', ''),
(38, 'khachmoi', 'BÃ© TÃ½', '2010-03-10', 'nam', 'phamquangthu2@gmail.com', 'img3', 'khachmoi', '', '', 'mo ta ve cu be', ''),
(39, 'khachmoi', 'Quang sua 2', '2020-12-19', 'nam', 'quang@gmail.com', 'img4', 'khachmoi', '', '', 'mo ta ve quang', ''),
(40, 'khachmoi', 'Quang sua 1', '2020-12-19', 'nam', 'quang@gmail.com', 'img5', 'khachmoi', '', '', 'mo ta ve quang', ''),
(42, '', 'Pham Hai An', '2026-12-31', 'nam', 'an@gmail.com', 'https://3.bp.blogspot.com/_aGPBKzYSJTM/S-1ZFwWkY6I/AAAAAAAAAI0/CMmFuRTiVS8/s1600/conan4.jpg', 'admin', 'haian', 'haian', 'mo ta ve quang', ''),
(44, '', 'Pham Quynh Thu', '2028-12-26', 'ná»¯', 'thuquynh@gmail.com', 'imgg6', 'khachmoi', '', '', 'mo ta be thu', ''),
(45, 'khachmoi', 'Pháº¡m Quang Thá»©', '1999-02-05', 'nam', 'phamquangthu502@gmail.com', 'img7', 'khachmoi', '', '', 'mÃ´ táº£ vá» Thá»©', ''),
(47, '', 'Äá»— VÄƒn Táº¥n ', '2020-12-05', 'nam', 'muoitan@gmail.com', 'img9', 'khachmoi', '', '', 'mÃ´ táº£ vá» táº¥n', ''),
(49, '', 'Donaruma', '1999-12-04', 'nam', 'dauna@gmail.com', 'xuko', 'khachmoi', '', '', 'milan', ''),
(50, 'khachmoi', 'Maldini', '1964-12-04', 'nam', 'dauna@gmail.com', 'img5', 'khachmoi', '', '', 'trung vá»‡ milan', ''),
(51, '', 'NgÃ´ VÄƒn Báº¯p', '1999-02-15', 'nam', 'bapcanbo@gmail.com', 'xxxxxxxx', 'admin', 'bapngo', '4321', 'NgÃ´ nÆ°á»›ng', ''),
(55, '', ' HoÃ ng Anh ThÆ°', '2020-12-31', 'ná»¯', 'phamquangthu2@gmail.com', '', '', '', '', 'NEU', 'yes'),
(60, '', ' Cu bÃ©', '2020-12-26', 'nam', 'phamquangthu2@gmail.com', '', '', '', '', 'ko', 'yes'),
(61, '', ' TÃ¨o', '2020-12-31', 'ná»¯', 'phamquangthu2@gmail.com', '', '', '', '', 'ko', 'yes'),
(62, '', ' TÃ½', '2021-01-01', 'ná»¯', 'duy@gmail.com', '', '', '', '', 'Báº£o trá»£ truyá»n thÃ´ng', 'no'),
(63, '', ' Pham Hai An', '2020-12-30', 'ná»¯', 'phamquangthu502@gmail.com', '', '', '', '', 's', 'no'),
(64, '', ' MÃ­a', '2021-01-01', 'nam', 'phamquangthu502@gmail.com', '', '', '', '', 'sa', 'yes'),
(65, '', ' Theo', '2020-12-19', 'nam', 'phamquangthu2@gmail.com', '', '', '', '', 'Milan', 'no'),
(66, '', ' ÄÃ o Thuáº­n', '2021-01-01', 'nam', 'thuan@gmail.com', '', '', '', '', 'ko', 'yes'),
(67, '', ' Quan', '2020-12-30', 'ná»¯', 'duy@gmail.com', '', '', '', '', 'sx', 'no'),
(68, '', ' Pháº¡m Quang Thá»‹nh', '2000-12-26', 'nam', 'thinh@gmail.com', '', '', '', '', 'UET', 'yes'),
(69, 'khachmoi', 'Tran Van', '2020-12-12', 'nam', 'vang@gmail.com', 'nobita', 'khachmoi', '', '', 'ko', ''),
(70, '', ' hung', '2020-12-02', 'nu', 'hung@gmail.com', '', '', '', '', 'hungdz', 'no'),
(71, '', ' Adam Smith', '2020-12-01', 'nam', 'mit@gmail.com', '', '', '', '', 'edison company', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `nhataitro`
--

CREATE TABLE `nhataitro` (
  `id` int(8) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhataitro`
--

INSERT INTO `nhataitro` (`id`, `ten`, `logo`, `mota`) VALUES
(1, 'BigC', 'bigc', 'TÃ i trá»£ máº·t báº±ng'),
(2, 'Vinmart', 'vin', 'TÃ i trá»£ vÃ ng'),
(3, 'VNPT', 'vnpt', 'NhÃ  tÃ i trá»£ kim cÆ°Æ¡ng, truyá»n thÃ´ng'),
(4, 'MÆ°á»ng Thanh', 'muongthanh', 'TÃ i trá»£ kim cÆ°Æ¡ng1'),
(6, 'Truyá»n hÃ¬nh HÃ  Ná»™i', 'hn1', 'Báº£o trá»£ truyá»n thÃ´ng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ten`),
  ADD KEY `stt` (`stt`);

--
-- Indexes for table `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhataitro`
--
ALTER TABLE `nhataitro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `stt` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lich`
--
ALTER TABLE `lich`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `nhataitro`
--
ALTER TABLE `nhataitro`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
