-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-03 14:38:12
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `card`
--

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cID` int(11) NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `inform` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '擁有',
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cID`, `cName`, `owner`, `inform`, `status`, `time`) VALUES
(1, 'A', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(2, 'B', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(3, 'C', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(4, 'D', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(5, 'E', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(6, 'F', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(7, 'G', 0, '', '擁有', '0000-00-00 00:00:00.000000'),
(8, 'H', 0, '', '擁有', '0000-00-00 00:00:00.000000');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `card`
--
ALTER TABLE `card`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
