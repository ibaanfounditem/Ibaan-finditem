-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2022 at 12:56 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibaanrecord_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

DROP TABLE IF EXISTS `tbl_chat`;
CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `textmessage` varchar(5000) DEFAULT NULL,
  `datesent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `sender_id`, `recipient`, `textmessage`, `datesent`) VALUES
(45, 1, 4, 'bakit ga', '2022-11-19 00:27:46'),
(46, 1, 4, 'alin ga naman', '2022-11-19 00:28:01'),
(47, 1, 4, 'patingin ga', '2022-11-19 00:28:17'),
(44, 1, 4, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 16 and password is: <h5>egBxWdDZ</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=c74d97b01eae257e44aa9d5bade97baf\">', '2022-11-19 00:12:23'),
(48, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 6 and password is: <h5>XrKYZtiU</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1679091c5a880faf6fb5e6087eb1b2dc\">', '2022-11-25 02:36:23'),
(49, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 6 and password is: <h5>sWHwxorb</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1679091c5a880faf6fb5e6087eb1b2dc\">', '2022-11-25 02:39:54'),
(50, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 19 and password is: <h5>kSB1fYLU</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1f0e3dad99908345f7439f8ffabdffc4\">', '2022-11-25 07:31:57'),
(51, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 6 and password is: <h5>jBmZPAhL</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1679091c5a880faf6fb5e6087eb1b2dc\">', '2022-11-25 07:36:58'),
(52, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 6 and password is: <h5>spXx5Ssu</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1679091c5a880faf6fb5e6087eb1b2dc\">', '2022-11-25 07:40:11'),
(53, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 19 and password is: <h5>odjuxde3</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1f0e3dad99908345f7439f8ffabdffc4\">', '2022-11-25 07:40:21'),
(54, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 6 and password is: <h5>tiYz7i2R</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1679091c5a880faf6fb5e6087eb1b2dc\">', '2022-11-25 07:47:09'),
(55, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>qRJMRSfG</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 07:55:50'),
(56, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 18 and password is: <h5>DMsAztZ6</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=6f4922f45568161a8cdf4ad2299f6d23\">', '2022-11-25 08:49:15'),
(57, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 19 and password is: <h5>WsnXOSm1</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1f0e3dad99908345f7439f8ffabdffc4\">', '2022-11-25 09:03:51'),
(58, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 19 and password is: <h5>CftLu2Ob</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=1f0e3dad99908345f7439f8ffabdffc4\">', '2022-11-25 09:05:37'),
(59, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 18 and password is: <h5>qVckF5Hp</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=6f4922f45568161a8cdf4ad2299f6d23\">', '2022-11-25 10:59:38'),
(60, 1, 5, 'Dear Mr/Ms. <br> We want to inform you that the details/image you sent to us does not match to the item that we had.', '2022-11-25 11:45:31'),
(61, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>hByxrJx5</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 12:27:57'),
(62, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>7HBXhi08</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 12:37:24'),
(63, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>w9bGB8Fd</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 12:41:24'),
(64, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>a3q5sUQ5</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 14:42:41'),
(65, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>NqwtmCS3</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 14:44:53'),
(66, 1, 5, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 20 and password is: <h5>jEH9oVjf</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=98f13708210194c475687be6106a3b84\">', '2022-11-25 14:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_chats`
--

DROP TABLE IF EXISTS `tbl_user_chats`;
CREATE TABLE IF NOT EXISTS `tbl_user_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `textmessage` varchar(5000) NOT NULL,
  `datesent` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_chats`
--

INSERT INTO `tbl_user_chats` (`id`, `sender_id`, `recipient`, `textmessage`, `datesent`) VALUES
(15, 4, 1, 'ari ba ga', '2022-11-19 00:28:12'),
(14, 4, 1, 'nakit mo na ga ari', '2022-11-19 00:27:56'),
(13, 4, 1, 'hoy admin', '2022-11-19 00:27:34'),
(12, 4, 1, 'wewewa', '2022-11-19 00:19:18'),
(16, 5, 1, 'Okay po.', '2022-11-25 09:09:37'),
(17, 5, 1, 'Salamat po!', '2022-11-25 18:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` int(15) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin_office@gmail.com', 'admin123'),
(2, 'Admin 1', 'admin1_office@gmail.com', 'admin456');

-- --------------------------------------------------------

--
-- Table structure for table `tb_announcement`
--

DROP TABLE IF EXISTS `tb_announcement`;
CREATE TABLE IF NOT EXISTS `tb_announcement` (
  `announceId` int(15) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `caption` text NOT NULL,
  `timedate` datetime NOT NULL,
  PRIMARY KEY (`announceId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_announcement`
--

INSERT INTO `tb_announcement` (`announceId`, `subject`, `caption`, `timedate`) VALUES
(4, 'Claim', 'Good day! Sa lahat po ng magkeclaim ng kanilang item ngayon. Hanggang 12 noon lang po open ang Kulture de Ibaan office. Salamat po!', '2022-11-25 19:24:05'),
(2, 'Transaction', 'Good day! Simula po bukas August 20, 2022 hanggang August 25, 2022 ay mula 8:00 am hanggang 12:00 pm laang po ang pagclaim ng inyong item.', '2022-08-20 21:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_claimedowner`
--

DROP TABLE IF EXISTS `tb_claimedowner`;
CREATE TABLE IF NOT EXISTS `tb_claimedowner` (
  `itemNo` int(15) NOT NULL,
  `owner` varchar(25) NOT NULL,
  `tdclaimed` datetime NOT NULL,
  PRIMARY KEY (`itemNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_claimedowner`
--

INSERT INTO `tb_claimedowner` (`itemNo`, `owner`, `tdclaimed`) VALUES
(0, 'ABCD', '2022-07-09 16:37:00'),
(4, 'ABCD', '2022-07-09 16:59:00'),
(2, 'Aimee', '2022-07-09 17:32:00'),
(5, 'ABCD', '2022-07-09 18:00:00'),
(20, 'Sydney Guerra', '2022-11-25 17:46:35'),
(17, 'asfasfa', '2022-11-25 00:30:13'),
(18, 'Sydney Guerra', '2022-11-25 00:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_claimedrecord`
--

DROP TABLE IF EXISTS `tb_claimedrecord`;
CREATE TABLE IF NOT EXISTS `tb_claimedrecord` (
  `clfinder` varchar(25) NOT NULL,
  `clcontact` varchar(12) NOT NULL,
  `clitemno` int(15) NOT NULL,
  `cltime` time NOT NULL,
  `cldate` date NOT NULL,
  `clitemCategory` varchar(50) NOT NULL,
  `clitemLocation` varchar(50) NOT NULL,
  `clitemDescription` varchar(100) NOT NULL,
  PRIMARY KEY (`clitemno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_claimedrecord`
--

INSERT INTO `tb_claimedrecord` (`clfinder`, `clcontact`, `clitemno`, `cltime`, `cldate`, `clitemCategory`, `clitemLocation`, `clitemDescription`) VALUES
('Eysii', '09128736457', 5, '00:20:22', '0000-00-00', 'SSS ID', 'SM City', 'SSS ID - Jeyzii De Leon'),
('Aliya Nicole Deguzman', '09112839012', 20, '17:46:00', '2022-11-25', 'Bag', 'Merkanto Park', 'Merong lamang mga ID'),
('Alliya Nicole Sanchez', '09187265389', 17, '00:30:00', '2022-11-25', 'Cellphone', 'Palengke Bago', 'Samsung A10s'),
('Juan', '01234', 18, '00:59:00', '2022-11-25', 'Cellphone', 'Student\'s Lounge ', 'Xiaomi Poco X3 Pro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_deletemsg`
--

DROP TABLE IF EXISTS `tb_deletemsg`;
CREATE TABLE IF NOT EXISTS `tb_deletemsg` (
  `dmid` int(11) NOT NULL,
  `dmitemnumber` int(11) NOT NULL,
  `dmaccountId` varchar(15) NOT NULL,
  `dmmyfile` varchar(255) NOT NULL,
  `dmdescription` text NOT NULL,
  `datetime` datetime NOT NULL,
  `itemColor` varchar(255) NOT NULL,
  `itemBrand` varchar(255) NOT NULL,
  `itemLocation` varchar(255) NOT NULL,
  PRIMARY KEY (`dmid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_deletemsg`
--

INSERT INTO `tb_deletemsg` (`dmid`, `dmitemnumber`, `dmaccountId`, `dmmyfile`, `dmdescription`, `datetime`, `itemColor`, `itemBrand`, `itemLocation`) VALUES
(10, 18, '4', 'all_proof/e33d75910d3c04e128d4cf26305a54c5', 'wa', '2022-10-23 16:16:22', '', '', ''),
(12, 19, '4', 'all_proof/a36248618d747f3866f2ae00df844d53Acer_Wallpaper_01_5000x2814.jpg', 'Red // Clear Case / Anime Lock Screen wallpaper.\r\n', '2022-10-26 23:03:18', '', '', ''),
(13, 18, '4', 'all_proof/bf486b4162fb388360a2f14ef79d7b4bAcer_Wallpaper_01_5000x2814.jpg', 'Nawala po last October 26, 2022 sa palengke bago. May sticker na anime po sa likod tas clear case.', '2022-10-26 23:21:57', '', '', ''),
(28, 19, '4', 'all_proof/45fdd32c12ba526c2100296135d52899', 'asdasd', '2022-11-18 23:19:37', 'werw', '', ''),
(26, 16, '4', 'all_proof/ede9ee1d5ed85a8a7f7f0dceec8b4b34', 'S10', '2022-11-18 23:07:41', '', '', ''),
(30, 16, '4', 'all_proof/0c3339f468e9b40c0e604d05081f7111', 'asdasd', '2022-11-18 23:38:01', '', '', ''),
(33, 16, '4', 'all_proof/6724c12ae6e84c1efb42db011c878c3d', '124', '2022-11-18 23:51:57', 'Samsung', 'Blue', '2141'),
(34, 16, '4', 'all_proof/f4c7c3d5378a6fb548d969e19e156935', '', '2022-11-18 23:59:33', 'asda', 'sdasd', 'asdas'),
(36, 16, '4', 'all_proof/0f2c7d13f36cedfc1d2c7514b636a487', 'asd', '2022-11-19 00:06:53', 'asdada', 'sdasd', 'asda'),
(37, 18, '4', 'all_proof/7343972c5e804aee32fe8271ed1d731c', 'hahahaaha', '2022-11-19 00:08:01', 'ada', 'asd', 'asda'),
(39, 6, '5', 'all_proof/fabb5aedfcaa9ba08ff3ec2f987c0f7f', 'School Requirements', '2022-11-25 02:36:16', 'Documentation', 'Yellow', '19'),
(43, 18, '5', 'all_proof/33ff0ca68b93f831143e1aae560ba1b0', 'School Requirements', '2022-11-25 08:48:58', 'NA', 'Yellow', '7/11'),
(40, 19, '5', 'all_proof/1b15fe3df078bdad6b138a887e356847', 'School Requirements', '2022-11-25 07:31:42', 'NA', 'Yellow', '7/11'),
(45, 18, '5', 'all_proof/61e93be818ac1720aaf3f4444996df2dcherry mobile.png', 'Meron password na 12345 and sticker name na ateez.', '2022-11-25 10:48:17', 'Cherry Mobile', 'Green', '7/11'),
(46, 20, '5', 'all_proof/c6a1e21e2d50aaa0073f9153e85f246e', 'Sa merkanto ko po naiwan ito and may mga books po itong laman and ID.', '2022-11-25 11:38:23', 'Channel', 'Stripe White', 'Merkanto'),
(47, 20, '5', 'all_proof/f36ade1619392da765f9db569bd7e9df', 'May lamang mga libro', '2022-11-25 11:41:40', 'channel', 'stripe white', 'merkanto park'),
(44, 19, '5', 'all_proof/fe18dba29fa2cb95a7ec74d991566927', 'Merong laman na pera worth 500-700 and may ID na kasama Sydney T. Guerra', '2022-11-25 09:05:29', 'Channel', 'Brown', '7/11'),
(48, 20, '5', 'all_proof/f6de99bbcc19a2e3f59eb3ab1ad1246b', 'Merong lamang mga id at libro.', '2022-11-25 11:54:07', 'Channel', 'White', 'Merkanto Park');

-- --------------------------------------------------------

--
-- Table structure for table `tb_itemrecord`
--

DROP TABLE IF EXISTS `tb_itemrecord`;
CREATE TABLE IF NOT EXISTS `tb_itemrecord` (
  `finder` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `itemNo` int(25) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `itemCategory` varchar(50) NOT NULL,
  `itemLocation` varchar(50) NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `itemBrand` varchar(100) NOT NULL,
  `itemColor` varchar(50) NOT NULL,
  `qrCode` varchar(300) DEFAULT NULL,
  `isClaimed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_itemrecord`
--

INSERT INTO `tb_itemrecord` (`finder`, `contact`, `itemNo`, `date`, `time`, `itemCategory`, `itemLocation`, `itemDescription`, `itemBrand`, `itemColor`, `qrCode`, `isClaimed`) VALUES
('Marinel Villanueva', '09090909090', 21, '2022-11-25', '13:26:00', 'Cellphone', 'Paradahan ng Palindan', 'Merong sticker na hello kitty at may password', 'Samsung A10s', 'Green', NULL, 0),
('Xander Dela Cruz', '092829910124', 22, '2022-11-25', '13:34:00', 'ID', 'Simbahan', 'SSID Sydney Guerra', 'NA', 'NA', NULL, 0),
('Aliya Nicole Deguzman', '09112839012', 20, '2022-11-25', '11:25:00', 'Bag', 'Merkanto Park', 'Merong lamang mga ID', 'Channel', 'White', NULL, 1),
('Juan', '01234', 18, '2022-09-10', '10:00:00', 'Cellphone', 'Student\'s Lounge ', 'Xiaomi Poco X3 Pro', 'gwa', 'gaw', '', 1),
('Xander Dela Pena', '09128736457', 19, '2022-11-25', '08:57:00', 'Wallet', '7/11', 'Merong ID at may lamang pera 500-600', 'Channel', 'Brown', NULL, 0),
('Aimy Castillo ', '09223810928 ', 23, '2022-11-25', '13:44:00', 'ID ', 'Guada Mart ', 'Paymaya Card', 'NA ', 'NA ', NULL, 0),
('Angelo Tejada ', '09123890123 ', 24, '2022-11-25', '14:52:00', 'Card ', 'High way ', 'Passport and SSS Id', 'NA ', 'NA ', NULL, 0),
('Marian Guerra', '09987620129', 25, '2022-11-25', '18:05:00', 'Bag', 'Palengke', 'Merong keychain na may pangalan na Baby', 'Hawk', 'Green', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

DROP TABLE IF EXISTS `tb_messages`;
CREATE TABLE IF NOT EXISTS `tb_messages` (
  `msgId` int(15) NOT NULL AUTO_INCREMENT,
  `itemnumber` int(15) NOT NULL,
  `accountId` varchar(25) NOT NULL,
  `myfile` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `itemBrand` varchar(255) NOT NULL,
  `itemColor` varchar(255) NOT NULL,
  `itemLocation` varchar(255) NOT NULL,
  PRIMARY KEY (`msgId`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_messages`
--

INSERT INTO `tb_messages` (`msgId`, `itemnumber`, `accountId`, `myfile`, `description`, `datetime`, `itemBrand`, `itemColor`, `itemLocation`) VALUES
(1, 12, '12', 'asdasdasd', 'asdasdasd', '2022-10-09 10:36:41', '', '', ''),
(6, 10, '$AccountId', '$dst_db', '$Description', '2022-10-23 14:01:48', '', '', ''),
(11, 15, '4', 'all_proof/970f14d4d50841f653d18bbfd2961dd5', '6u76i87o9', '2022-10-23 16:34:18', '', '', ''),
(23, 15, '4', 'all_proof/78c7b643dd769f503565d1e723448bda', '', '2022-11-18 19:57:45', '', '', ''),
(41, 3, '5', 'all_proof/2c63dbd6901db273f0bc95d660e91e85samsung a10s.jpg', 'Cherry Mobile merong sticker na ateez', '2022-11-25 07:52:48', 'Cherry ', 'Blue', 'Palengke');

-- --------------------------------------------------------

--
-- Table structure for table `tb_residentsacc`
--

DROP TABLE IF EXISTS `tb_residentsacc`;
CREATE TABLE IF NOT EXISTS `tb_residentsacc` (
  `accountId` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_residentsacc`
--

INSERT INTO `tb_residentsacc` (`accountId`, `fname`, `lname`, `address`, `contact`, `gender`, `email`, `password`, `code`, `status`) VALUES
(7, 'Marian', 'Guerra', '179, Padre Garcia', '09123789201', 'Female', 'marianzguerra@gmail.com', '7d3e916476245ed4e09b7d795c562982', '0', 'Verified'),
(4, 'ABCD', 'EFGH', 'Gulood', '12345678901', 'Male', 'atherius@gmail.com', '8bedf7d8ab83e0bbc265efe7fc14dcab', '0', 'Verified'),
(5, 'Sydney', 'Tejada', '179, Palindan Ibaan Batangas', '09077692691', 'Female', 'sydney@gmail.com', '8b7d77704d083314e430e08e73175952', '0', 'Verified'),
(6, 'Via Beanca', 'Guerra', 'Palindan Ibaan Batangas', '09077692691', 'Female', 'tejadavia.2001@gmail.com', '99c8417d520f7cf3b34cc2631dc725f1', '0', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `tb_verifiedmsg`
--

DROP TABLE IF EXISTS `tb_verifiedmsg`;
CREATE TABLE IF NOT EXISTS `tb_verifiedmsg` (
  `archid` int(11) NOT NULL,
  `architemnumber` int(11) NOT NULL,
  `archaccountId` varchar(15) NOT NULL,
  `archmyfile` varchar(255) NOT NULL,
  `archdescription` text NOT NULL,
  `datetime` datetime NOT NULL,
  `archItemBrand` varchar(255) NOT NULL,
  `archItemColor` varchar(255) NOT NULL,
  `archItemLocation` varchar(255) NOT NULL,
  `verifiedPwd` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_verifiedmsg`
--

INSERT INTO `tb_verifiedmsg` (`archid`, `architemnumber`, `archaccountId`, `archmyfile`, `archdescription`, `datetime`, `archItemBrand`, `archItemColor`, `archItemLocation`, `verifiedPwd`) VALUES
(16, 16, '4', 'all_proof/1c5df159d33939a0c2dfddf64fdd8c59', 'adsasd', '2022-11-18 18:11:13', '', '', '', ''),
(8, 15, '4', 'all_proof/a350a6ad22c7097355ba3fb98c5fac82icon.ico', 'NAKITA KO KANINA', '2022-10-23 14:52:07', '', '', '', ''),
(14, 17, '4', 'all_proof/ace1dc2a18695993ad13a504212fdb9fhutao4.png', '', '2022-11-18 17:39:58', '', '', '', ''),
(17, 19, '4', 'all_proof/99fe62815a18ec633d167e7b06305955', '', '2022-11-18 19:03:48', '', '', '', '1NBpHW1L'),
(18, 16, '4', 'all_proof/24be1d35ffa6352e151c3b653ea91419', '', '2022-11-18 19:15:38', '', '', '', 'QrOZ5vvY'),
(19, 16, '4', 'all_proof/735abcef23325f3e087211d1ee4fa96a', '', '2022-11-18 19:33:57', '', '', '', 'ivQLKRum'),
(20, 16, '4', 'all_proof/b886904bdb8781a30a8459d8cc014c44', 'asfaf', '2022-11-18 19:36:00', '', '', '', 'xPzmdIj1'),
(21, 16, '4', 'all_proof/88fa092f25062edeaf8aae5363a76ffd', 'dasd', '2022-11-18 19:37:54', '', '', '', '6F9B4kvu'),
(22, 19, '4', 'all_proof/21fb3442b907c2f2c97e2ca06f70291b', '', '2022-11-18 19:42:48', '', '', '', 'gdBU5O1K'),
(25, 19, '4', 'all_proof/6d0560a2f0c12af8bd6106ed5f007fb4', '', '2022-11-18 19:59:48', '', '', '', 'k3mix5Mj'),
(24, 18, '4', 'all_proof/2139aa2f2726c7e81ff7dea14f8217d6', '', '2022-11-18 19:58:05', '', '', '', 'KAGocdsO'),
(49, 20, '5', 'all_proof/52de594e66f8e226357e026d32b5e036', 'Merong lamang mga libro at id sa wallet.', '2022-11-25 12:25:20', 'Channel', 'White', 'Merkanto Park', 'NqwtmCS3'),
(42, 20, '5', 'all_proof/c4eb0c9798124f4d3c281480a796a8cbcherry mobile.png', 'Meron siyang sticker na ateez at may pangalan na Sydney', '2022-11-25 07:55:43', 'Cherry Mobile', 'Green', 'Palengke', 'jEH9oVjf');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwchat`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwchat`;
CREATE TABLE IF NOT EXISTS `vwchat` (
`id` int(11)
,`sender_id` int(11)
,`recipient` int(11)
,`textmessage` varchar(5000)
,`datesent` datetime
,`fullname` varchar(101)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwchatusers`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwchatusers`;
CREATE TABLE IF NOT EXISTS `vwchatusers` (
`id` int(11)
,`sender_id` int(11)
,`recipient` int(11)
,`textmessage` varchar(5000)
,`datesent` datetime
,`fullname` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwmatched`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwmatched`;
CREATE TABLE IF NOT EXISTS `vwmatched` (
`msgId` int(15)
,`itemnumber` int(15)
,`accountId` varchar(25)
,`myfile` varchar(255)
,`description` varchar(255)
,`datetime` datetime
,`itemLocation` varchar(255)
,`itemBrand` varchar(255)
,`itemColor` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwunmatched`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwunmatched`;
CREATE TABLE IF NOT EXISTS `vwunmatched` (
`msgId` int(15)
,`itemnumber` int(15)
,`accountId` varchar(25)
,`myfile` varchar(255)
,`description` varchar(255)
,`datetime` datetime
,`itemLocation` varchar(255)
,`itemBrand` varchar(255)
,`itemColor` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vwchat`
--
DROP TABLE IF EXISTS `vwchat`;

DROP VIEW IF EXISTS `vwchat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwchat`  AS SELECT `t1`.`id` AS `id`, `t1`.`sender_id` AS `sender_id`, `t1`.`recipient` AS `recipient`, `t1`.`textmessage` AS `textmessage`, `t1`.`datesent` AS `datesent`, concat(`t2`.`fname`,' ',`t2`.`lname`) AS `fullname` FROM (`tbl_chat` `t1` join `tb_residentsacc` `t2` on((`t1`.`recipient` = `t2`.`accountId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwchatusers`
--
DROP TABLE IF EXISTS `vwchatusers`;

DROP VIEW IF EXISTS `vwchatusers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwchatusers`  AS SELECT `t1`.`id` AS `id`, `t1`.`sender_id` AS `sender_id`, `t1`.`recipient` AS `recipient`, `t1`.`textmessage` AS `textmessage`, `t1`.`datesent` AS `datesent`, `t2`.`admin_name` AS `fullname` FROM (`tbl_user_chats` `t1` join `tb_admin` `t2` on((`t1`.`recipient` = `t2`.`admin_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwmatched`
--
DROP TABLE IF EXISTS `vwmatched`;

DROP VIEW IF EXISTS `vwmatched`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwmatched`  AS SELECT `t1`.`msgId` AS `msgId`, `t1`.`itemnumber` AS `itemnumber`, `t1`.`accountId` AS `accountId`, `t1`.`myfile` AS `myfile`, `t1`.`description` AS `description`, `t1`.`datetime` AS `datetime`, `t1`.`itemLocation` AS `itemLocation`, `t1`.`itemBrand` AS `itemBrand`, `t1`.`itemColor` AS `itemColor` FROM (`tb_messages` `t1` join `tb_itemrecord` `tbitem` on(((`t1`.`itemnumber` = `tbitem`.`itemNo`) and (`t1`.`itemBrand` = `tbitem`.`itemBrand`) and (`t1`.`itemColor` = `tbitem`.`itemColor`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwunmatched`
--
DROP TABLE IF EXISTS `vwunmatched`;

DROP VIEW IF EXISTS `vwunmatched`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwunmatched`  AS SELECT `t1`.`msgId` AS `msgId`, `t1`.`itemnumber` AS `itemnumber`, `t1`.`accountId` AS `accountId`, `t1`.`myfile` AS `myfile`, `t1`.`description` AS `description`, `t1`.`datetime` AS `datetime`, `t1`.`itemLocation` AS `itemLocation`, `t1`.`itemBrand` AS `itemBrand`, `t1`.`itemColor` AS `itemColor` FROM (`tb_messages` `t1` join `tb_itemrecord` `tbitem` on(((`t1`.`itemnumber` = `tbitem`.`itemNo`) and (((`t1`.`itemBrand` = `tbitem`.`itemBrand`) = FALSE) or ((`t1`.`itemColor` = `tbitem`.`itemColor`) = FALSE))))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
