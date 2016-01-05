-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-01-05 08:42:15
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bag`
--

CREATE TABLE IF NOT EXISTS `bag` (
  `playerid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foodid` int(10) NOT NULL,
  `number` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bag`
--

INSERT INTO `bag` (`playerid`, `foodid`, `number`) VALUES
('admin', 1, 14),
('admin', 2, 14),
('admin', 3, 2),
('admin', 4, 20);

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

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`fid`, `name`, `price`, `recovery`) VALUES
(1, '麵包', 5000, 10),
(2, 'Redbull', 50000, 55),
(3, '七七乳加巧克力', 75000, 60),
(4, '便當', 10000, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `lands`
--

CREATE TABLE IF NOT EXISTS `lands` (
  `landid` int(10) NOT NULL,
  `playerid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `finishtime` int(20) NOT NULL,
  `plantid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `lands`
--

INSERT INTO `lands` (`landid`, `playerid`, `status`, `finishtime`, `plantid`) VALUES
(1, 'admin', 0, 0, 0),
(2, 'admin', 1, 1451979795, 2),
(3, 'admin', 0, 0, 0),
(4, 'admin', 0, 0, 0),
(5, 'admin', -1, 0, 0),
(6, 'admin', -1, 0, 0),
(7, 'admin', -1, 0, 0),
(8, 'admin', -1, 0, 0),
(9, 'admin', -1, 0, 0),
(10, 'admin', -1, 0, 0),
(11, 'admin', -1, 0, 0),
(12, 'admin', -1, 0, 0),
(13, 'admin', -1, 0, 0),
(14, 'admin', -1, 0, 0),
(15, 'admin', -1, 0, 0),
(16, 'admin', -1, 0, 0),
(17, 'admin', -1, 0, 0),
(18, 'admin', -1, 0, 0),
(19, 'admin', -1, 0, 0),
(20, 'admin', -1, 0, 0),
(21, 'admin', -1, 0, 0),
(22, 'admin', -1, 0, 0),
(23, 'admin', -1, 0, 0),
(24, 'admin', -1, 0, 0),
(25, 'admin', -1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `level` int(3) NOT NULL,
  `exp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `levels`
--

INSERT INTO `levels` (`level`, `exp`) VALUES
(2, 34),
(3, 57),
(4, 92),
(5, 135),
(6, 372),
(7, 560),
(8, 840),
(9, 1242),
(10, 1242),
(11, 1242),
(12, 1242),
(13, 1242),
(14, 1242),
(15, 1490),
(16, 1788),
(17, 2415),
(18, 2574),
(19, 3088),
(20, 3705);

-- --------------------------------------------------------

--
-- 資料表結構 `plants`
--

CREATE TABLE IF NOT EXISTS `plants` (
  `plantid` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sellvalue` int(10) NOT NULL,
  `growtime` int(20) NOT NULL,
  `expget` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `plants`
--

INSERT INTO `plants` (`plantid`, `name`, `sellvalue`, `growtime`, `expget`) VALUES
(1, '可可', 3113, 60, 10),
(2, '小麥', 1000, 90, 1),
(3, '蘋果', 614, 600, 20),
(4, '橘子', 215, 1800, 35),
(5, '葡萄', 123, 3600, 50),
(6, '香蕉', 500, 21600, 42),
(7, '稻米', 200, 43200, 90),
(8, '人參', 1, 86400, 80);

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
  `landsavaliable` int(3) NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `pw`, `name`, `energy`, `exp`, `level`, `exptonext`, `money`, `landsavaliable`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ViperLiu1', 99, 363, 5, 372, 19255, 4),
('admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'ViperLiu2', 100, 0, 1, 0, 100, 4),
('admin3', '7c222fb2927d828af22f592134e8932480637c0d', 'ViperLiu3', 100, 0, 1, 0, 100, 4),
('admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'ViperLiu4', 100, 0, 1, 0, 100, 4),
('admin5', '35cc6a0d62fb5a6042d2bb250adfb03ef31a45c8', '測試帳號', 100, 0, 1, 0, 100, 4);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`playerid`,`foodid`);

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- 資料表索引 `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`landid`,`playerid`);

--
-- 資料表索引 `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level`);

--
-- 資料表索引 `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plantid`);

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
-- 使用資料表 AUTO_INCREMENT `plants`
--
ALTER TABLE `plants`
  MODIFY `plantid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
