-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2017 at 03:56 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8
-- database of nit-ket
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1123191_nitket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `itemid` int(11) NOT NULL,
  `stime` datetime DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `initialamount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`itemid`, `stime`, `ctime`, `initialamount`) VALUES
(59, '2017-03-22 10:00:00', '2017-03-23 10:00:00', 5000),
(65, '2017-03-21 10:00:00', '2017-03-21 18:00:00', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `Id` varchar(255) NOT NULL,
  `pref` char(1) NOT NULL,
  `Ip` varchar(39) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`Id`, `pref`, `Ip`, `contact`, `email`) VALUES
('104259148824240844594', 'B', '14.139.185.114', ' ', 'amitamora@gmail.com'),
('103749789759620927527', 'B', '14.139.185.114', ' ', 'anuj.srivastava418@gmail.com'),
('115881888418483421042', 'B', '14.139.185.114', ' ', 'bishakhapriyam14@gmail.com'),
('116899549380975862563', 'B', '14.139.185.114', ' ', 'jeevanprakash612@gmail.com'),
('114013532423286614320', 'B', '::1', ' ', 'jiwanprakashchoudhary@gmail.com'),
('112438690276064233944', 'B', '14.139.185.114', ' ', 'kesarwani.namita11@gmail.com'),
('105125002484545830720', 'B', '14.139.185.114', ' ', 'nitianpk07@gmail.com'),
('100861081965675201530', 'B', '14.139.185.114', ' ', 'priyankaekka15@gmail.com'),
('104094845312737635192', 'B', '14.139.185.114', ' ', 'somnathsamanta0@gmail.com'),
('102276542967729684142', 'B', '117.245.47.35', ' ', 'somnathsamanta900@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fid` int(10) NOT NULL,
  `uname` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `msg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fid`, `uname`, `email`, `mob`, `subject`, `msg`) VALUES
(1, 'sdsdv', 'sgdhjsdfg', 'hgjsdgf', 'gfgsj', 'jdfgsjdf'),
(2, 'priyanka ekka', 'priyankaekka15@gmail.com', '7736922940', 'bjkasbxjs', 'kdlkashd'),
(3, 'aaaa', 'aaaa@gmail.com', '7436465665', 'sdffdh', 'sffhs');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itempicture` text NOT NULL,
  `itemdesc` varchar(200) NOT NULL,
  `itemprice` float NOT NULL,
  `itemcategory` varchar(100) NOT NULL,
  `itemstatus` varchar(100) NOT NULL,
  `uploadedBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itempicture`, `itemdesc`, `itemprice`, `itemcategory`, `itemstatus`, `uploadedBy`) VALUES
(46, 'Computer Networks ed6', 'image/compnetworkandrew.jpg', 'by Andrew s tanenbaum', 200, 'Book', 'Not Available', 'bishakhapriyam14@gmail.com'),
(47, 'Hero Sprint', 'image/herosprint.PNG', 'color: Black &Blue', 2000, 'Bicycle', 'Not Available', 'bishakhapriyam14@gmail.com'),
(48, 'Apple iphone6', 'image/apple6.jpg', 'image/apple-iphone-6-1.jpg, 2GB RAM, 4.7 inch screen, color:silver', 30000, 'Mobile', 'Not Available', 'bishakhapriyam14@gmail.com'),
(49, 'Apple iphone7', 'image/apple7.jpg', '3GB RAM, 5.5inch screen, color:gold', 30000, 'Mobile', 'Not Available', 'priyankaekka15@gmail.com'),
(50, 'Computer Networks', 'image/compnetworkross.jpg', ' By JamesF kurose & Keith w.Ross', 200, 'Book', 'Not Available', 'priyankaekka15@gmail.com'),
(51, 'Lenova Tablet', 'image/lenovo_yoga_tablet_3_8_inch.jpeg', '2GB RAM, Android 5.1, 8 MP camera color:black', 8000, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(52, 'Hero Hawk', 'image/Hero_Hawk.jpg', 'color: Black & Red', 2500, 'Bicycle', 'Not Available', 'priyankaekka15@gmail.com'),
(55, 'Micromax Canvas Tab ', 'image/micromax-tab.jpg', '7 inch, 8GB, Wi-Fi Only), Black by Micromax', 3000, 'Tab', 'Not Available', 'bishakhapriyam14@gmail.com'),
(56, 'Nokia6', 'image/Nokia-6-1.jpg', '4G', 19000, 'Mobile', 'Not Available', 'somnathsamanta0@gmail.com'),
(58, 'Asus Zenfone Max', 'image/asus.jpg', '2GB RAM,5 inch Screen,13MP camera, color:Black', 6000, 'Mobile', 'Not Available', 'anuj.srivastava418@gmail.com'),
(59, 'phone', 'image/mobile.jpg', 'Good Quality Phone', 2500, 'Mobile', 'Available', 'jeevanprakash612@gmail.com'),
(60, 'Lenovo PHAB Plus Tablet ', 'image/lenovo-phab-2-pro-7591.jpg', '6.8 inch, 32GB, Wi-Fi+ LTE+ Voice Calling), Gunmetal Platinum by Lenovo ', 8000, 'Tab', 'Not Available', 'anuj.srivastava418@gmail.com'),
(61, 'SAMSUNG Galaxy Tab 3', 'image/samsung_tab.jpeg', 'Single Sim 7 Inch Tablet 8 GB 7 inch with Wi-Fi+3G ', 4500, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(62, 'SAMSUNG Galaxy tab', 'image/stab.jpeg', 'Single Sim 7 Inch Tablet 8 GB 7 inch with Wi-Fi+3G', 5000, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(63, 'Pixel2', 'image/513201564925PM_635_general_mobile_4g.jpeg', '4G', 5000, 'Mobile', 'Not Available', 'somnathsamanta0@gmail.com'),
(64, 'Pixel3', 'image/alcatel_onetouch_fierce_xl.jpg', '3G', 5600, 'Mobile', 'Not Available', 'somnathsamanta0@gmail.com'),
(65, 'watch mobile', 'image/watch-mobile-phone-big.jpg', 'Branded watch mobile', 2500, 'Mobile', 'Available', 'jiwanprakashchoudhary@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `itemid` int(11) NOT NULL,
  `dateofbid` datetime NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pref` char(1) NOT NULL,
  `id` varchar(255) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`email`, `pref`, `id`, `ip`, `contact`) VALUES
('amitamora@gmail.com', 'S', '104259148824240844594', '::1', ' '),
('anuj.srivastava418@gmail.com', 'S', '103749789759620927527', '14.139.185.114', ' '),
('avinashpatelacs@gmail.com', 'S', '115187749035894803999', '14.139.185.114', ' '),
('bishakhapriyam14@gmail.com', 'S', '115881888418483421042', '137.97.4.40', ' '),
('jeevanprakash612@gmail.com', 'S', '116899549380975862563', '14.139.185.114', ' '),
('jiwanprakashchoudhary@gmail.com', 'S', '114013532423286614320', '::1', ' '),
('kesarwani.namita11@gmail.com', 'S', '112438690276064233944', '14.139.185.114', ' '),
('nitianpk07@gmail.com', 'S', '105125002484545830720', '14.139.185.114', ' '),
('nitketnitc15@gmail.com', 'S', '106897908046517507037', '137.97.1.7', ' '),
('priyankaekka15@gmail.com', 'S', '100861081965675201530', '42.110.128.120', ' '),
('somnathsamanta0@gmail.com', 'S', '104094845312737635192', '14.139.185.114', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `fname`, `lname`, `email`, `gender`, `locale`, `gpluslink`, `picture`, `created`, `modified`) VALUES
(0, 'google', '114013532423286614320', 'JIWAN', 'PRAKASH', 'jiwanprakashchoudhary@gmail.com', 'male', 'en', 'https://plus.google.com/114013532423286614320', 'https://lh4.googleusercontent.com/-NAk8Dnatouk/AAAAAAAAAAI/AAAAAAAABB0/8g5ujMIqd1k/photo.jpg', '2017-03-19 17:23:51', '2017-03-21 11:19:42'),
(6, 'google', '104259148824240844594', 'Amit', 'kumar', 'amitamora@gmail.com', 'male', 'en', 'https://plus.google.com/104259148824240844594', 'https://lh5.googleusercontent.com/-vm_66c6hPcw/AAAAAAAAAAI/AAAAAAAAAq0/lt4f-O8Uhf4/photo.jpg', '2017-03-19 19:16:56', '2017-03-21 09:17:56'),
(7, 'google', '118085557121770991952', 'Sarvesh', 'Singh', '007sarveshsingh@gmail.com', '', 'en', 'https://plus.google.com/118085557121770991952', 'https://lh5.googleusercontent.com/-5RJdFlVZMYw/AAAAAAAAAAI/AAAAAAAAABY/0kr8R2hsG2U/photo.jpg', '2017-03-20 10:57:10', '2017-03-20 11:14:38'),
(8, 'google', '100861081965675201530', 'Priyanka', 'Ekka', 'priyankaekka15@gmail.com', 'female', 'en', 'https://plus.google.com/100861081965675201530', 'https://lh4.googleusercontent.com/-rdAs54dMHKM/AAAAAAAAAAI/AAAAAAAAAdM/c7CD5vYpRnE/photo.jpg', '2017-03-20 12:20:19', '2017-03-21 09:01:47'),
(9, 'google', '106897908046517507037', 'nit-ket', 'nitc', 'nitketnitc15@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-20 14:59:09', '2017-03-20 14:59:09'),
(10, 'google', '115881888418483421042', 'Bishakha', 'Kumari', 'bishakhapriyam14@gmail.com', '', 'en', 'https://plus.google.com/115881888418483421042', 'https://lh6.googleusercontent.com/-3wW5KEyoJBA/AAAAAAAAAAI/AAAAAAAAAFQ/v-WmYFN_88k/photo.jpg', '2017-03-20 15:32:27', '2017-03-20 22:04:58'),
(11, 'google', '104094845312737635192', 'somnath', 'samanta', 'somnathsamanta0@gmail.com', 'male', 'en', 'https://plus.google.com/104094845312737635192', 'https://lh4.googleusercontent.com/-4021aWnanQk/AAAAAAAAAAI/AAAAAAAAAXI/2pP3SlvvKr4/photo.jpg', '2017-03-20 17:00:51', '2017-03-21 09:32:48'),
(12, 'google', '103749789759620927527', 'Anuj', 'Srivastava', 'anuj.srivastava418@gmail.com', 'male', 'en', 'https://plus.google.com/103749789759620927527', 'https://lh4.googleusercontent.com/-XCQNAcP36x0/AAAAAAAAAAI/AAAAAAAABgU/Bt4McpRNxSY/photo.jpg', '2017-03-20 18:31:37', '2017-03-21 15:32:49'),
(13, 'google', '102276542967729684142', 'somnath', 'samanta', 'somnathsamanta900@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-20 19:00:01', '2017-03-21 04:22:35'),
(14, 'google', '116899549380975862563', 'Jeevan', 'Prakash', 'jeevanprakash612@gmail.com', 'male', 'en', 'https://plus.google.com/116899549380975862563', 'https://lh6.googleusercontent.com/-AUomKloMKYA/AAAAAAAAAAI/AAAAAAAAADI/casxVpPanp0/photo.jpg', '2017-03-20 20:20:54', '2017-03-21 15:36:47'),
(15, 'google', '112438690276064233944', 'namita', 'kesarwani', 'kesarwani.namita11@gmail.com', '', 'en', 'https://plus.google.com/112438690276064233944', 'https://lh4.googleusercontent.com/-b9hHAr5-u14/AAAAAAAAAAI/AAAAAAAADJA/JWoLVbsAgtA/photo.jpg', '2017-03-21 08:30:09', '2017-03-21 08:33:06'),
(16, 'google', '105125002484545830720', 'pankaj', 'kumar', 'nitianpk07@gmail.com', '', 'en', 'https://plus.google.com/105125002484545830720', 'https://lh3.googleusercontent.com/-L8rf4ChVcWs/AAAAAAAAAAI/AAAAAAAAAC0/YeUR2wUM0rw/photo.jpg', '2017-03-21 14:59:07', '2017-03-21 15:04:42'),
(17, 'google', '115187749035894803999', 'avinash', 'patel', 'avinashpatelacs@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-21 15:22:09', '2017-03-21 15:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `uploadedBy` (`uploadedBy`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD KEY `participant_ibfk_1` (`email`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `item` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`uploadedBy`) REFERENCES `seller` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`email`) REFERENCES `buyer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `bid` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
