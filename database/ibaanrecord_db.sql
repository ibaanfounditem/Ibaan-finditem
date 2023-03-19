-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2022 at 06:07 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `sender_id`, `recipient`, `textmessage`, `datesent`) VALUES
(45, 1, 4, 'bakit ga', '2022-11-19 00:27:46'),
(46, 1, 4, 'alin ga naman', '2022-11-19 00:28:01'),
(47, 1, 4, 'patingin ga', '2022-11-19 00:28:17'),
(44, 1, 4, 'Dear Mr/Ms. <br> We would like to inform you that the details/image you sent to us has matched with the item that we had. You may now claim it here at the Item Lost and Found. Just present the attached QR Code and the password provided! <br> Thank you! <br> Item No: 16 and password is: <h5>egBxWdDZ</h5> <br> <img class=\"xqr\" src=\"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=c74d97b01eae257e44aa9d5bade97baf\">', '2022-11-19 00:12:23');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_chats`
--

INSERT INTO `tbl_user_chats` (`id`, `sender_id`, `recipient`, `textmessage`, `datesent`) VALUES
(15, 4, 1, 'ari ba ga', '2022-11-19 00:28:12'),
(14, 4, 1, 'nakit mo na ga ari', '2022-11-19 00:27:56'),
(13, 4, 1, 'hoy admin', '2022-11-19 00:27:34'),
(12, 4, 1, 'wewewa', '2022-11-19 00:19:18');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_announcement`
--

INSERT INTO `tb_announcement` (`announceId`, `subject`, `caption`, `timedate`) VALUES
(1, 'No Transaction', 'Good day! Our Office on July 18, 2022 Monday will close due to heavy rain!. Thank you!', '2022-07-09 13:18:08'),
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
(19, 'ABCD EFGH', '2022-11-22 00:42:18');

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
('Juan Der Pool ', '01234  ', 19, '10:37:00', '2022-10-18', 'Cellphone  ', 'Hilltop  ', 'Xiaomi F1');

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
(37, 18, '4', 'all_proof/7343972c5e804aee32fe8271ed1d731c', 'hahahaaha', '2022-11-19 00:08:01', 'ada', 'asd', 'asda');

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
  PRIMARY KEY (`itemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_itemrecord`
--

INSERT INTO `tb_itemrecord` (`finder`, `contact`, `itemNo`, `date`, `time`, `itemCategory`, `itemLocation`, `itemDescription`, `itemBrand`, `itemColor`, `qrCode`) VALUES
('Annaliza Jane De Chavez ', '09813749001 ', 21, '2022-11-24', '00:07:00', 'Cellphone ', 'Recto Gym ', 'Stitch Case', 'Samsung A10s ', 'Green ', NULL),
('Juan', '01234', 18, '2022-09-10', '10:00:00', 'Cellphone', 'Student\'s Lounge ', 'Xiaomi Poco X3 Pro', 'gwa', 'gaw', ''),
('Xander Dela Pena', '09128736457', 19, '2022-11-23', '23:41:00', 'Wallet', 'Luma Palengke', 'Cash 500-600', 'Luisviton', 'Brown', NULL),
('Rachel Deguzman', '09123678392', 20, '2022-11-24', '00:00:00', 'Wallet', '7/11', 'Cash 500-600', 'Luisviton', 'Brown', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_messages`
--

INSERT INTO `tb_messages` (`msgId`, `itemnumber`, `accountId`, `myfile`, `description`, `datetime`, `itemBrand`, `itemColor`, `itemLocation`) VALUES
(1, 12, '12', 'asdasdasd', 'asdasdasd', '2022-10-09 10:36:41', '', '', ''),
(6, 10, '$AccountId', '$dst_db', '$Description', '2022-10-23 14:01:48', '', '', ''),
(11, 15, '4', 'all_proof/970f14d4d50841f653d18bbfd2961dd5', '6u76i87o9', '2022-10-23 16:34:18', '', '', ''),
(23, 15, '4', 'all_proof/78c7b643dd769f503565d1e723448bda', '', '2022-11-18 19:57:45', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_residentsacc`
--

INSERT INTO `tb_residentsacc` (`accountId`, `fname`, `lname`, `address`, `contact`, `gender`, `email`, `password`, `code`, `status`) VALUES
(1, 'Via', 'Tejada', 'Palindan Ibaan Batangas', '09082738297', 'FEMALE', 'ldmvbg@gmail.com', 'Qwertyuiop_1', '862661', 'Verified'),
(2, 'Angelica', 'De Lana', 'Lapu-Lapu Ibaan Batangas', '09128372899', 'Female', 'angelica2@gmail.com', 'Nhasjkkhs', '0', 'Verified'),
(3, 'Hey', 'Loo', 'Palindan Ibaan Batangas', '09079183791', '', 'atherius.meet@gmail.com', 'Via_guerra08', '0', 'Verified'),
(4, 'ABCD', 'EFGH', 'Gulood', '12345678901', '', 'atherius@gmail.com', '8bedf7d8ab83e0bbc265efe7fc14dcab', '0', 'Verified'),
(5, 'Sydney', 'Tejada', 'Palindan Ibaan Batangas', '09077692691', 'Female', 'sydney@gmail.com', '8b7d77704d083314e430e08e73175952', '0', 'Verified'),
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
  `verifiedPwd` varchar(1000) NOT NULL,
  `isClaimed` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_verifiedmsg`
--

INSERT INTO `tb_verifiedmsg` (`archid`, `architemnumber`, `archaccountId`, `archmyfile`, `archdescription`, `datetime`, `archItemBrand`, `archItemColor`, `archItemLocation`, `verifiedPwd`, `isClaimed`) VALUES
(16, 16, '4', 'all_proof/1c5df159d33939a0c2dfddf64fdd8c59', 'adsasd', '2022-11-18 18:11:13', '', '', '', '', b'0'),
(8, 15, '4', 'all_proof/a350a6ad22c7097355ba3fb98c5fac82icon.ico', 'NAKITA KO KANINA', '2022-10-23 14:52:07', '', '', '', '', b'0'),
(14, 17, '4', 'all_proof/ace1dc2a18695993ad13a504212fdb9fhutao4.png', '', '2022-11-18 17:39:58', '', '', '', '', b'0'),
(17, 19, '4', 'all_proof/99fe62815a18ec633d167e7b06305955', '', '2022-11-18 19:03:48', '', '', '', '1NBpHW1L', b'1'),
(18, 16, '4', 'all_proof/24be1d35ffa6352e151c3b653ea91419', '', '2022-11-18 19:15:38', '', '', '', 'QrOZ5vvY', b'0'),
(19, 16, '4', 'all_proof/735abcef23325f3e087211d1ee4fa96a', '', '2022-11-18 19:33:57', '', '', '', 'ivQLKRum', b'0'),
(20, 16, '4', 'all_proof/b886904bdb8781a30a8459d8cc014c44', 'asfaf', '2022-11-18 19:36:00', '', '', '', 'xPzmdIj1', b'0'),
(21, 16, '4', 'all_proof/88fa092f25062edeaf8aae5363a76ffd', 'dasd', '2022-11-18 19:37:54', '', '', '', '6F9B4kvu', b'0'),
(22, 19, '4', 'all_proof/21fb3442b907c2f2c97e2ca06f70291b', '', '2022-11-18 19:42:48', '', '', '', 'gdBU5O1K', b'1'),
(25, 19, '4', 'all_proof/6d0560a2f0c12af8bd6106ed5f007fb4', '', '2022-11-18 19:59:48', '', '', '', 'k3mix5Mj', b'1'),
(24, 18, '4', 'all_proof/2139aa2f2726c7e81ff7dea14f8217d6', '', '2022-11-18 19:58:05', '', '', '', 'KAGocdsO', b'0'),
(29, 16, '4', 'all_proof/6c57b448669613b907bffaed6570744c', 'NAKITA KO DUN', '2022-11-18 23:21:44', 'Samsung', 'Blue', '', 'Gtd6hjdi', b'0'),
(27, 16, '4', 'all_proof/4f13b13d8db3f0ada94753d5e684b1c2', 'al;sdk;asd', '2022-11-18 23:09:32', '', '', '', 'usSzknGZ', b'0'),
(38, 16, '4', 'all_proof/9695eb8da2a98ccb9ab2919d621bca5bamber4.png', 'asdasd', '2022-11-19 00:12:09', 'Samsung', 'BLue', 'asdasd', 'egBxWdDZ', b'0'),
(35, 16, '4', 'all_proof/2acab1c2c58e329a207bbd644b822ba3', '', '2022-11-19 00:05:39', 'asdasd', 'asdasd', 'asda', 'j7YxDKjk', b'0');

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
-- Table structure for table `vwmatched`
--

DROP TABLE IF EXISTS `vwmatched`;
CREATE TABLE IF NOT EXISTS `vwmatched` (
  `msgId` int(15) DEFAULT NULL,
  `itemnumber` int(15) DEFAULT NULL,
  `accountId` varchar(25) DEFAULT NULL,
  `myfile` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `itemLocation` varchar(255) DEFAULT NULL,
  `itemBrand` varchar(255) DEFAULT NULL,
  `itemColor` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vwunmatched`
--

DROP TABLE IF EXISTS `vwunmatched`;
CREATE TABLE IF NOT EXISTS `vwunmatched` (
  `msgId` int(15) DEFAULT NULL,
  `itemnumber` int(15) DEFAULT NULL,
  `accountId` varchar(25) DEFAULT NULL,
  `myfile` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `itemLocation` varchar(255) DEFAULT NULL,
  `itemBrand` varchar(255) DEFAULT NULL,
  `itemColor` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `vwchatusers`
--
DROP TABLE IF EXISTS `vwchatusers`;

DROP VIEW IF EXISTS `vwchatusers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwchatusers`  AS SELECT `t1`.`id` AS `id`, `t1`.`sender_id` AS `sender_id`, `t1`.`recipient` AS `recipient`, `t1`.`textmessage` AS `textmessage`, `t1`.`datesent` AS `datesent`, `t2`.`admin_name` AS `fullname` FROM (`tbl_user_chats` `t1` join `tb_admin` `t2` on((`t1`.`recipient` = `t2`.`admin_id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
