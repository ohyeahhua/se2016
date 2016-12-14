-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-14 17:47:40
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
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cID` int(11) NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cID`, `cName`, `function`) VALUES
(1, '歧視的川普', '攻擊力 3000\r\n守備力 2000\r\n擅長說出爭議言論使人惱怒\r\n突襲般地騷擾女性使人毫無招架之力'),
(2, '悲傷之音-Si La Re', '攻擊力 3500\r\n守備力 2000\r\n不停彈奏悲傷三單音-Si La Re\r\n使對手陷入絕望的深淵'),
(3, '進擊的小英', '攻擊力 2800\r\n守備力 1800\r\n只要一出現\r\n就會使對手的攻擊力掉至五成'),
(4, '小馬愛說笑', '攻擊力 2400\r\n守備力 2000\r\n說笑話戳中對手笑點後\r\n再趁機發動攻擊'),
(5, '阿扁口袋深', '攻擊力 3800\r\n守備力 2500\r\n能吸取對手的攻擊力\r\n直至對手認輸或死亡'),
(6, '做好做滿倫', '攻擊力 2000\r\n守備力 1800\r\n以三寸不爛之舌\r\n說的對手頭昏眼花'),
(7, '安倍三把箭', '攻擊力 2500\r\n守備力 3000\r\n具備修復能力\r\n能將隊友恢復百分百戰鬥力'),
(8, '欲罷不能的阿惠', '攻擊力 500\r\n守備力 500\r\n直接將自己的弱點暴露於對手'),
(9, '福袋', '');

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
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
