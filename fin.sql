-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 �?12 ??01 ??21:16
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `fin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `fid` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `recovery` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `id` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `requiredlevel` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `land`
--

INSERT INTO `land` (`id`, `status`, `requiredlevel`) VALUES
(20, -1, 0),
(21, -1, 0),
(22, -1, 0),
(23, -1, 0),
(24, -1, 0),
(0, 0, 0),
(1, 0, 0),
(2, -1, 0),
(3, -1, 0),
(4, -1, 0),
(5, 0, 0),
(6, 0, 0),
(7, -1, 0),
(8, -1, 0),
(9, -1, 0),
(10, -1, 0),
(11, -1, 0),
(12, -1, 0),
(13, -1, 0),
(14, -1, 0),
(15, -1, 0),
(16, -1, 0),
(17, -1, 0),
(18, -1, 0),
(19, -1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `plants`
--

CREATE TABLE IF NOT EXISTS `plants` (
  `id` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sellvalue` int(10) NOT NULL,
  `growtime` int(20) NOT NULL,
  `expget` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) NOT NULL,
  `value` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `test`
--

INSERT INTO `test` (`id`, `value`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pw` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `energy` int(3) NOT NULL DEFAULT '100',
  `exp` int(10) NOT NULL DEFAULT '0',
  `level` int(3) NOT NULL DEFAULT '1',
  `exptonext` int(10) NOT NULL,
  `money` int(10) NOT NULL,
  `avaliable` text COLLATE utf8_unicode_ci NOT NULL,
  `landsavaliable` int(3) NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `pw`, `name`, `energy`, `exp`, `level`, `exptonext`, `money`, `avaliable`, `landsavaliable`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ViperLiu1', 100, 0, 1, 0, 100, '0,0,0,0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', 4),
('admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'ViperLiu2', 100, 0, 1, 0, 100, '0,0,0,0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', 4),
('admin3', '7c222fb2927d828af22f592134e8932480637c0d', 'ViperLiu3', 100, 0, 1, 0, 100, '0,0,0,0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', 4),
('admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'ViperLiu4', 100, 0, 1, 0, 100, '0,0,0,0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', 4),
('admin5', '35cc6a0d62fb5a6042d2bb250adfb03ef31a45c8', '測試帳號', 100, 0, 1, 0, 100, '0,0,0,0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1', 4);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
