-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.18
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `nail`
--

-- --------------------------------------------------------

--
-- 資料表結構 `帳戶`
--

CREATE TABLE `帳戶` (
  `id` int(11) NOT NULL,
  `帳號` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `密碼` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `帳戶`
--

INSERT INTO `帳戶` (`id`, `帳號`, `密碼`) VALUES
(1, 'manager', '123'),
(2, 'windy', '123'),
(3, 'win', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `平常`
--

CREATE TABLE `平常` (
  `id` int(11) NOT NULL,
  `圖片` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `平常`
--

INSERT INTO `平常` (`id`, `圖片`) VALUES
(1, 'nail/20201217_201228_0.jpg'),
(2, 'nail/20201217_201228_2.jpg'),
(3, 'nail/20201217_201228_3.jpg'),
(4, 'nail/20201217_201228_4.jpg'),
(5, 'nail/20201217_201228_5.jpg'),
(6, 'nail/20201217_201228_6.jpg'),
(7, 'nail/20201217_201228_9.jpg'),
(8, 'nail/20201217_201228_10.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `最新消息`
--

CREATE TABLE `最新消息` (
  `id` int(11) NOT NULL,
  `new` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `最新消息`
--

INSERT INTO `最新消息` (`id`, `new`) VALUES
(1, '聖誕限定！五種聖誕款式'),
(5, '新年款式'),
(7, '優惠折扣！只要選擇喜歡的款式，線上預約時間，就可享有優惠');

-- --------------------------------------------------------

--
-- 資料表結構 `購物車`
--

CREATE TABLE `購物車` (
  `id` int(11) NOT NULL,
  `圖片` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `購物車`
--

INSERT INTO `購物車` (`id`, `圖片`) VALUES
(2, 'nail/20201217_201228_2.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `輪播`
--

CREATE TABLE `輪播` (
  `id` int(11) NOT NULL,
  `圖片` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `輪播`
--

INSERT INTO `輪播` (`id`, `圖片`) VALUES
(1, 'nail/20201217_201228_7.jpg'),
(2, 'nail/20201217_201228_8.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `預約時間`
--

CREATE TABLE `預約時間` (
  `預約者` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int(11) NOT NULL,
  `圖片` text COLLATE utf8mb4_general_ci NOT NULL,
  `時間` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `預約時間`
--

INSERT INTO `預約時間` (`預約者`, `id`, `圖片`, `時間`) VALUES
('win', 1, 'nail/20201217_201228_0.jpg', '2021-01-04T01:59');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `帳戶`
--
ALTER TABLE `帳戶`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `平常`
--
ALTER TABLE `平常`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `最新消息`
--
ALTER TABLE `最新消息`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `購物車`
--
ALTER TABLE `購物車`
  ADD UNIQUE KEY `id` (`id`);

--
-- 資料表索引 `輪播`
--
ALTER TABLE `輪播`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `預約時間`
--
ALTER TABLE `預約時間`
  ADD UNIQUE KEY `id` (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `帳戶`
--
ALTER TABLE `帳戶`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `平常`
--
ALTER TABLE `平常`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `最新消息`
--
ALTER TABLE `最新消息`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `購物車`
--
ALTER TABLE `購物車`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `輪播`
--
ALTER TABLE `輪播`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `預約時間`
--
ALTER TABLE `預約時間`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
