-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-08-11 12:51:38
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `shopclass_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`id`, `name`, `shopclass_id`) VALUES
(1, 'apple', 1),
(2, 'mi', 1),
(3, 'casio', 6),
(8, 'huwai', 1),
(9, 'dell', 12),
(10, 'Alienware', 12),
(14, 'Foreign_Book', 10),
(13, 'tissot', 6);

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `id` int(50) UNSIGNED NOT NULL,
  `shop_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`id`, `shop_id`, `user_id`, `order_id`) VALUES
(150, 10, 11, 0),
(152, 13, 11, 0),
(172, 4, 17, 0),
(184, 9, 21, 0),
(183, 9, 21, 0),
(182, 13, 21, 0),
(181, 9, 21, 0),
(180, 13, 21, 0),
(179, 13, 21, 0),
(178, 13, 21, 0),
(176, 13, 21, 0),
(175, 9, 21, 0),
(177, 13, 21, 0),
(153, 14, 11, 0),
(154, 4, 11, 0),
(155, 3, 11, 0),
(171, 4, 17, 0),
(170, 4, 17, 0),
(169, 4, 17, 0),
(159, 13, 11, 0),
(160, 14, 11, 0),
(161, 4, 11, 0),
(162, 14, 11, 0),
(163, 14, 11, 0),
(164, 14, 11, 0),
(168, 4, 17, 0);

-- --------------------------------------------------------

--
-- 表的结构 `commit`
--

CREATE TABLE `commit` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `commit`
--

INSERT INTO `commit` (`id`, `content`, `user_id`, `shop_id`, `time`) VALUES
(3, '哈哈哈哈哈', 21, 11, '1596197568'),
(2, '咩啊', 21, 11, '1596196418'),
(4, '太棒了吧', 21, 11, '1596197626'),
(5, '是的呢', 21, 11, '1596197654'),
(6, '什么呀', 21, 11, '1596197703'),
(7, '耶！！！！！！！！！！！！！', 21, 11, '1596197817'),
(8, '耶！！！！！！！！！！！！！', 21, 11, '1596197830'),
(9, '耶！！！！！！！！！！！！！', 21, 11, '1596197842'),
(10, '啦啦啦！！', 21, 11, '1596197867'),
(11, '啦啦啦！！！！', 21, 11, '1596197931'),
(12, '哈哈哈', 21, 11, '1596197960'),
(13, '好好看呐！', 6, 13, '1596198498'),
(14, ' 太棒了吧', 1, 13, '1596198524'),
(15, '请友善评论！', 6, 11, '1596852565'),
(16, '牛逼！！！！！！！！！1', 21, 9, '1597118424');

-- --------------------------------------------------------

--
-- 表的结构 `orderdata`
--

CREATE TABLE `orderdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` int(11) NOT NULL,
  `orderstat_id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orderdata`
--

INSERT INTO `orderdata` (`id`, `code`, `user_id`, `shop_id`, `num`, `price`, `time`, `orderstat_id`, `relation_id`) VALUES
(6, '1595831245', 11, 1, 5, 12313, 1595831245, 3, 2),
(7, '1595831513', 11, 4, 5, 6653, 1595831513, 3, 2),
(4, '1595753015', 1, 1, 1, 22, 84335, 2, 1),
(5, '1595753015', 1, 1, 1, 22.5, 84335, 2, 1),
(8, '9779217815', 17, 11, 2, 19998, 1596297792, 1, 8),
(9, '9779217815', 17, 8, 1, 3453, 1596297792, 1, 8),
(10, '9789715311', 17, 11, 2, 19998, 1596297897, 1, 8),
(11, '9789715311', 17, 8, 1, 3453, 1596297897, 1, 8),
(12, '9797513337', 17, 11, 2, 19998, 1596297975, 1, 8),
(13, '9797513337', 17, 8, 1, 3453, 1596297975, 1, 8),
(14, '9803516411', 17, 11, 2, 19998, 1596298035, 1, 8),
(15, '9803516411', 17, 8, 1, 3453, 1596298035, 1, 8),
(16, '9807020071', 17, 4, 5, 21615, 1596298070, 1, 8),
(17, '5259959095', 21, 14, 10, 98980, 1596852599, 1, 2),
(18, '5259959095', 21, 13, 5, 49995, 1596852599, 1, 2),
(19, '5259959095', 21, 9, 11, 62216, 1596852599, 1, 2),
(20, '5259959095', 21, 4, 1, 4323, 1596852599, 1, 2),
(21, '5259959095', 21, 10, 2, 11008, 1596852599, 1, 2),
(22, '5261214333', 21, 14, 10, 98980, 1596852612, 1, 2),
(23, '5261214333', 21, 13, 5, 49995, 1596852612, 1, 2),
(24, '5261214333', 21, 9, 11, 62216, 1596852612, 1, 2),
(25, '5261214333', 21, 4, 1, 4323, 1596852612, 1, 2),
(26, '5261214333', 21, 10, 2, 11008, 1596852612, 1, 2),
(27, '5266618847', 21, 14, 10, 98980, 1596852666, 1, 2),
(28, '5266618847', 21, 13, 5, 49995, 1596852666, 1, 2),
(29, '5266618847', 21, 9, 11, 62216, 1596852666, 1, 2),
(30, '5266618847', 21, 4, 1, 4323, 1596852666, 1, 2),
(31, '5266618847', 21, 10, 2, 11008, 1596852666, 1, 2),
(32, '5277720678', 21, 14, 10, 98980, 1596852777, 1, 2),
(33, '5277720678', 21, 13, 5, 49995, 1596852777, 1, 2),
(34, '5277720678', 21, 9, 11, 62216, 1596852777, 1, 2),
(35, '5277720678', 21, 4, 1, 4323, 1596852777, 1, 2),
(36, '5277720678', 21, 10, 2, 11008, 1596852777, 1, 2),
(37, '5286599058', 21, 14, 10, 98980, 1596852865, 1, 2),
(38, '5286599058', 21, 14, 10, 98980, 1596852865, 1, 2),
(39, '5286599058', 21, 13, 5, 49995, 1596852865, 1, 2),
(40, '5286599058', 21, 13, 5, 49995, 1596852865, 1, 2),
(41, '5286599058', 21, 9, 11, 62216, 1596852865, 1, 2),
(42, '5286599058', 21, 9, 11, 62216, 1596852865, 1, 2),
(43, '5286599058', 21, 4, 1, 4323, 1596852865, 1, 2),
(44, '5286599058', 21, 4, 1, 4323, 1596852865, 1, 2),
(45, '5286599058', 21, 10, 2, 11008, 1596852865, 1, 2),
(46, '5544442619', 21, 14, 10, 98980, 1596855444, 1, 5),
(47, '5544442619', 21, 14, 10, 98980, 1596855444, 1, 5),
(48, '5544442619', 21, 13, 5, 49995, 1596855444, 1, 5),
(49, '5544442619', 21, 13, 5, 49995, 1596855444, 1, 5),
(50, '5544442619', 21, 9, 11, 62216, 1596855444, 1, 5),
(51, '5544442619', 21, 9, 11, 62216, 1596855444, 1, 5),
(52, '5544442619', 21, 4, 1, 4323, 1596855444, 1, 5),
(53, '5544442619', 21, 4, 1, 4323, 1596855444, 1, 5),
(54, '5544442619', 21, 10, 2, 11008, 1596855444, 1, 5);

-- --------------------------------------------------------

--
-- 表的结构 `orderstat`
--

CREATE TABLE `orderstat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orderstat`
--

INSERT INTO `orderstat` (`id`, `name`) VALUES
(1, '未发货'),
(2, '已发货'),
(3, '已付款'),
(4, '已确认'),
(5, '已取消');

-- --------------------------------------------------------

--
-- 表的结构 `relation`
--

CREATE TABLE `relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `realname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `relation`
--

INSERT INTO `relation` (`id`, `realname`, `address`, `telephone`, `email`, `user_id`) VALUES
(1, 'John', 'earth', '13232333232', '324242425435@qq.com', 12),
(2, 'dzh', 'sysu', '1231231', 'dengzh8@mail2.sysu.edu.cn', 21),
(3, 'ric', 'gku', '13423245647', '2334234@ricardo2001zg.moe', 21),
(9, 'Sammi Green', 'dgut', '233525', 'sammigreen2020@gmail.com', 21),
(7, 'dzh', 'sysu', '13631720132', 'dengzh8@mail2.sysu.edu.cn', 11),
(8, 'tony', 'pku', '13456238923', '72662378@thu.edu.cn', 17);

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `upshelf` tinyint(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `stock`, `upshelf`, `image`, `brand_id`, `class_id`) VALUES
(1, 'iphonexr', 4323, 12, 0, 'null', 1, 1),
(4, 'ipad air3', 4323, 12, 1, ' null', 1, 12),
(3, 'macbook pro', 4323, 12, 1, 'null', 8, 12),
(5, 'R3', 9, 22, 1, ' null', 10, 12),
(6, 'MacBook Air', 7999, 123, 1, ' null', 1, 12),
(7, 'macbook Pro 16', 18999, 22, 1, ' null', 1, 12),
(9, 'iphone4s', 3453, 12, 1, ' null', 1, 1),
(10, 'iphone6s', 5656, 12, 1, ' null', 1, 1),
(17, 'R5', 12000, 22, 1, ' null', 10, 12),
(11, 'phone se', 9999, 22, 1, ' null', 1, 1),
(12, 'huawei mate30', 4323, 12, 1, ' null', 8, 1),
(13, 'Red and Black', 9999, 23, 1, 'null', 14, 10),
(18, 'honor7', 5656, 22, 1, ' null', 8, 1),
(15, 'phone xsmax', 4323, 12, 1, ' null', 1, 1),
(14, 'R2', 9999, 212, 1, ' null', 10, 12);

-- --------------------------------------------------------

--
-- 表的结构 `shopclass`
--

CREATE TABLE `shopclass` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shopclass`
--

INSERT INTO `shopclass` (`id`, `name`) VALUES
(1, '手机'),
(10, '书'),
(6, '手表'),
(15, '相机'),
(12, '电脑');

-- --------------------------------------------------------

--
-- 表的结构 `userdata`
--

CREATE TABLE `userdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regtime` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `password`, `regtime`, `admin`) VALUES
(11, 'Mary', '9998', 1595652677, 0),
(1, 'user2', '321', 1595551278, 0),
(17, 'Lucy', '235', 1595768212, 0),
(13, 'Miranda', '555', 1595665057, 0),
(6, 'admin', '333', 1595551432, 1),
(12, 'John', '456', 1595662700, 0),
(15, 'Tom', '235', 1595666540, 0),
(18, 'user3', '111', 1595812456, 0),
(19, 'Jane', '666777', 1596112631, 0),
(20, 'Howie', '888', 1596112693, 0),
(21, 'Angela', '777', 1596114230, 0),
(27, 'Linda', '564', 1596941765, 0),
(24, 'ketty', '123', 1596880453, 0),
(25, 'cherry', '234', 1596880558, 0);

--
-- 转储表的索引
--

--
-- 表的索引 `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `commit`
--
ALTER TABLE `commit`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `orderstat`
--
ALTER TABLE `orderstat`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `shopclass`
--
ALTER TABLE `shopclass`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- 使用表AUTO_INCREMENT `commit`
--
ALTER TABLE `commit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 使用表AUTO_INCREMENT `orderstat`
--
ALTER TABLE `orderstat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `shopclass`
--
ALTER TABLE `shopclass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
