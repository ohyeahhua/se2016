-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-15 06:49:10
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.21

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
  `num` int(255) NOT NULL,
  `lowprice` int(11) NOT NULL,
  `uptime` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `high_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `high_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `auction`
--

INSERT INTO `auction` (`aid`, `uid`, `cID`, `num`, `lowprice`, `uptime`, `deadline`, `high_name`, `high_price`) VALUES
(20, 17, 3, 2, 100, '2016-12-12 23:00:00', '2017-12-12 01:00:00', '', 100),
(25, 17, 4, 2, 500, '2015-12-31 12:59:00', '2016-12-30 12:59:00', '', 500);

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cID` int(11) NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cID`, `cName`, `function`) VALUES
(1, 'A', ''),
(2, 'B', ''),
(3, 'C', ''),
(4, 'D', ''),
(5, 'E', ''),
(6, 'F', ''),
(7, 'G', ''),
(8, 'H', ''),
(9, '福袋', '');

-- --------------------------------------------------------

--
-- 資料表結構 `inventory`
--

CREATE TABLE `inventory` (
  `id` int(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `C` int(11) NOT NULL,
  `D` int(11) NOT NULL,
  `E` int(11) NOT NULL,
  `F` int(11) NOT NULL,
  `G` int(11) NOT NULL,
  `H` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `inventory`
--

INSERT INTO `inventory` (`id`, `uid`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`) VALUES
(13, 16, 3, 470, 2, 2, 0, 0, 0, 5),
(14, 17, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `uid` int(11) NOT NULL,
  `loginID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `money` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`uid`, `loginID`, `name`, `pwd`, `money`) VALUES
(16, '123', '123', '123', '1000'),
(17, '456', '456', '456', '71512');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `rid` int(11) NOT NULL,
  `auc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bidder` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `record`
--

INSERT INTO `record` (`rid`, `auc`, `bidder`, `cName`, `price`, `deadline`) VALUES
(599, '456', '123', 'B', 0, '2016-12-13 00:00:00'),
(600, '456', '123', 'B', 0, '2016-12-13 00:00:00'),
(601, '456', '123', 'B', 0, '2016-12-13 00:00:00'),
(602, '456', '123', 'B', 0, '2016-12-13 00:00:00'),
(603, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(604, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(605, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(606, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(607, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(608, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(609, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(610, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(611, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(612, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(613, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(614, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(615, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(616, '456', '123', 'B', 5000, '2016-12-13 00:00:00'),
(617, '456', '123', 'B', 512, '2016-12-13 00:00:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`aid`);

--
-- 資料表索引 `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cID`);

--
-- 資料表索引 `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`rid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `auction`
--
ALTER TABLE `auction`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用資料表 AUTO_INCREMENT `card`
--
ALTER TABLE `card`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用資料表 AUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=618;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
