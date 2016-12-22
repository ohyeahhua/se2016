-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-22 17:28:19
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
(583, 1, 1, 1, 500, '2016-12-22 01:00:00', '2016-12-26 12:00:00', '', 500),
(587, 2, 4, 2, 600, '2016-12-22 05:00:00', '2016-12-26 12:00:00', '', 600),
(591, 1, 5, 1, 300, '2016-12-22 12:00:00', '2016-12-26 12:00:00', '', 300),
(594, 4, 6, 2, 400, '2016-12-22 01:00:00', '2016-12-26 12:00:00', '', 400),
(597, 8, 7, 1, 250, '2016-12-22 01:00:00', '2016-12-26 12:00:00', '', 250),
(600, 6, 5, 3, 800, '2016-12-22 01:00:00', '2016-12-26 12:00:00', '', 800),
(603, 8, 1, 1, 300, '2016-12-22 01:00:00', '2016-12-26 12:00:00', '', 300),
(605, 0, 9, 1, 474, '2016-12-22 17:27:30', '2016-12-22 17:28:25', '', 474),
(606, 0, 9, 1, 458, '2016-12-22 17:28:00', '2016-12-22 17:28:30', '', 458);

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cID` int(11) NOT NULL,
  `Hname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cID`, `Hname`, `function`, `cName`) VALUES
(1, '歧視的川普', '攻擊力 3000\r\n守備力 2000\r\n擅長說出爭議言論使人惱怒\r\n突襲般地騷擾女性使人毫無招架之力', 'A'),
(2, '悲傷之音-Si La Re', '攻擊力 3500\r\n守備力 2000\r\n不停彈奏悲傷三單音-Si La Re\r\n使對手陷入絕望的深淵', 'B'),
(3, '進擊的小英', '攻擊力 2800\r\n守備力 1800\r\n只要一出現\r\n就會使對手的攻擊力掉至五成', 'C'),
(4, '小馬愛說笑', '攻擊力 2400\r\n守備力 2000\r\n說笑話戳中對手笑點後\r\n再趁機發動攻擊', 'D'),
(5, '阿扁口袋深', '攻擊力 3800\r\n守備力 2500\r\n能吸取對手的攻擊力\r\n直至對手認輸或死亡', 'E'),
(6, '做好做滿倫', '攻擊力 2000\r\n守備力 1800\r\n以三寸不爛之舌\r\n說的對手頭昏眼花', 'F'),
(7, '安倍三把箭', '攻擊力 2500\r\n守備力 3000\r\n具備修復能力\r\n能將隊友恢復百分百戰鬥力', 'G'),
(8, '欲罷不能的阿惠', '攻擊力 500\r\n守備力 500\r\n直接將自己的弱點暴露於對手', 'H'),
(9, '福袋', '', '');

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
(15, 18, 2, 2, 2, 2, 1, 1, 0, 0);

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
(0, 'root', 'NPC', 'root', '1009404'),
(1, '1', 'Sam', '1', '3000'),
(2, '2', 'Ming', '2', '3000'),
(3, '3', 'Hua', '3', '2000'),
(4, '4', 'Flower', '4', '4500'),
(5, '5', 'Jack', '5', '2500'),
(6, 'Lucy', '6', '6', '5000'),
(7, 'Jessica', '7', '7', '3500'),
(8, '8', 'John', '8', '3200'),
(9, '9', 'Lulu', '9', '4200'),
(10, '10', 'Denny', '10', '2600'),
(11, '11', 'Pets', '11', '5400'),
(12, '12', 'Ray', '12', '4100'),
(13, '13', 'Hanna', '13', '3400'),
(14, '14', 'Max', '14', '2900'),
(15, '15', 'Chi', '15', '3600');

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
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;
--
-- 使用資料表 AUTO_INCREMENT `card`
--
ALTER TABLE `card`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=641;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
