-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-08 19:37:01
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `c19`
--

-- --------------------------------------------------------

--
-- 資料表結構 `auction`
--

CREATE TABLE `auction` (
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cID` int(11) NOT NULL,
  `lowprice` int(11) NOT NULL,
  `uptime` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `high-name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `high-price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `auction`
--

INSERT INTO `auction` (`aid`, `uid`, `cID`, `lowprice`, `uptime`, `deadline`, `high-name`, `high-price`) VALUES
(1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(3, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(4, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(5, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(6, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(7, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(8, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`aid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `auction`
--
ALTER TABLE `auction`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
