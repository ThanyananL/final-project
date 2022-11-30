-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2021 at 08:34 PM
-- Server version: 10.3.32-MariaDB-log
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_N309`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_bank` varchar(100) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `account_photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='บัญชีธนาคาร';

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_bank`, `account_name`, `account_number`, `account_photo`) VALUES
(29, 'กสิกรไทย', 'กฤษฎา  สุภาผล ', '0973747010', '740242474.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(200) NOT NULL,
  `admin_pass` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_degree_id` int(11) NOT NULL DEFAULT 2,
  `admin_date` date NOT NULL,
  `admin_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_name`, `admin_degree_id`, `admin_date`, `admin_time`) VALUES
(1, 'admin', '@789789', 'admin', 1, '0000-00-00', '00:00:00'),
(9, 'test9999', '123456', 'test9999', 2, '2021-01-22', '14:02:16'),
(10, 'testadmin', '789789', 'testadmin', 2, '2021-01-25', '19:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin_degree`
--

CREATE TABLE `admin_degree` (
  `admin_degree_id` int(11) NOT NULL,
  `admin_degree_name` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_degree`
--

INSERT INTO `admin_degree` (`admin_degree_id`, `admin_degree_name`) VALUES
(1, 'ผู้ดูแลระดับ 1 (หลัก)'),
(2, 'ผู้ดูแลระดับ 2 ');

-- --------------------------------------------------------

--
-- Table structure for table `admin_remove`
--

CREATE TABLE `admin_remove` (
  `admin_remove_id` int(11) NOT NULL,
  `admin_remove_name` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_remove`
--

INSERT INTO `admin_remove` (`admin_remove_id`, `admin_remove_name`) VALUES
(1, 'ลบได้'),
(2, 'ไม่สามารถลบได้');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(300) NOT NULL,
  `article_detail` varchar(300) DEFAULT NULL,
  `article_photo` varchar(1000) NOT NULL,
  `article_review` longtext DEFAULT NULL,
  `article_date` date NOT NULL,
  `article_time` time NOT NULL,
  `article_datetime` datetime NOT NULL,
  `article_sort` int(11) NOT NULL,
  `article_page` varchar(250) DEFAULT NULL,
  `article_name_eng` varchar(1000) DEFAULT NULL,
  `article_detail_eng` varchar(2000) DEFAULT NULL,
  `article_review_eng` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_name`, `article_detail`, `article_photo`, `article_review`, `article_date`, `article_time`, `article_datetime`, `article_sort`, `article_page`, `article_name_eng`, `article_detail_eng`, `article_review_eng`) VALUES
(101, 'ผ้าม่าน นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ ได้หลายรูปแบบ', '1. ม่านพับ (Roman Blind) เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ', '10839855462130769376.gif', '<p><strong>&nbsp;1. ม่านพับ (</strong><strong>Roman Blind)</strong>&nbsp;เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ ในการตัดเย็บ โดยเราสามารถเลือกผ้าม่านแบบสีเรียบ หรือมีลวดลายในการตัดเย็บได้ตามใจชอบ แต่ม่านพับก็มีข้อเสีย คือเวลาถอดซักอาจจะยากกว่า<strong>&nbsp;ผ้าม่าน</strong>&nbsp;แบบอื่นๆ และเมื่อซักเสร็จต้องตั้งเชือกด้านหลังของผ้า มิฉะนั้นเวลาดึงขึ้น-ลงอาจทำให้ผ้าเอียงได้</p>\r\n\r\n<p><strong>&nbsp;2. ม่านจีบ (</strong><strong>Pleat Curtain)&nbsp;</strong>เป็นแบบ&nbsp;<strong>ผ้าม่าน</strong>&nbsp;ที่ได้รับความนิยมกันมานานแล้ว ด้วยส่วนหัวของผ้าที่มีการจับจีบสวยงาม โดยเว้นระยะห่างหัวจีบประมาณ 10-12 ซม. สำหรับม่านจีบนี้สามารถรีดแบบอัดจีบ หรือ รีดเรียบก็ได้ ซึ่งในปัจจุบันคนจะนิยมรีดเรียบมากกว่า เมื่อแขวนผ้าม่านขึ้นมา ผ้าม่านก็จะเป็นรอนๆ ทำให้ดูทันสมัยมากกว่าการรีดจีบ ส่วนตัวรางนั้น สามารถเลือกรางได้สองแบบคือรางยูโก้ที่มีลูกล้อหรือที่เรียกกันว่ารางตัวเอ็มราง หรือเป็นรางโชว์ ซึ่งมีหลากหลายแบบให้เลือก ทั้งแบบไม้ แบบโลหะ ตามแต่คนชอบ</p>', '2021-11-30', '15:01:50', '2021-11-30 15:01:50', 0, 'ผ้าม่าน-นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ-ได้หลายรูปแบบ-บทความ-101', '', '', ''),
(102, 'ผ้าม่าน นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ ได้หลายรูปแบบ', '1. ม่านพับ (Roman Blind) เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ', '260159344419914879.gif', '<p><strong>&nbsp;1. ม่านพับ (</strong><strong>Roman Blind)</strong>&nbsp;เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ ในการตัดเย็บ โดยเราสามารถเลือกผ้าม่านแบบสีเรียบ หรือมีลวดลายในการตัดเย็บได้ตามใจชอบ แต่ม่านพับก็มีข้อเสีย คือเวลาถอดซักอาจจะยากกว่า<strong>&nbsp;ผ้าม่าน</strong>&nbsp;แบบอื่นๆ และเมื่อซักเสร็จต้องตั้งเชือกด้านหลังของผ้า มิฉะนั้นเวลาดึงขึ้น-ลงอาจทำให้ผ้าเอียงได้</p>\r\n\r\n<p><strong>&nbsp;2. ม่านจีบ (</strong><strong>Pleat Curtain)&nbsp;</strong>เป็นแบบ&nbsp;<strong>ผ้าม่าน</strong>&nbsp;ที่ได้รับความนิยมกันมานานแล้ว ด้วยส่วนหัวของผ้าที่มีการจับจีบสวยงาม โดยเว้นระยะห่างหัวจีบประมาณ 10-12 ซม. สำหรับม่านจีบนี้สามารถรีดแบบอัดจีบ หรือ รีดเรียบก็ได้ ซึ่งในปัจจุบันคนจะนิยมรีดเรียบมากกว่า เมื่อแขวนผ้าม่านขึ้นมา ผ้าม่านก็จะเป็นรอนๆ ทำให้ดูทันสมัยมากกว่าการรีดจีบ ส่วนตัวรางนั้น สามารถเลือกรางได้สองแบบคือรางยูโก้ที่มีลูกล้อหรือที่เรียกกันว่ารางตัวเอ็มราง หรือเป็นรางโชว์ ซึ่งมีหลากหลายแบบให้เลือก ทั้งแบบไม้ แบบโลหะ ตามแต่คนชอบ</p>', '2021-11-30', '15:01:55', '2021-11-30 15:01:55', 0, 'ผ้าม่าน-นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ-ได้หลายรูปแบบ-บทความ-102', '', '', ''),
(103, 'ผ้าม่าน นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ ได้หลายรูปแบบ', '1. ม่านพับ (Roman Blind) เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ', '1443278721049926966.gif', '<p><strong>&nbsp;1. ม่านพับ (</strong><strong>Roman Blind)</strong>&nbsp;เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ ในการตัดเย็บ โดยเราสามารถเลือกผ้าม่านแบบสีเรียบ หรือมีลวดลายในการตัดเย็บได้ตามใจชอบ แต่ม่านพับก็มีข้อเสีย คือเวลาถอดซักอาจจะยากกว่า<strong>&nbsp;ผ้าม่าน</strong>&nbsp;แบบอื่นๆ และเมื่อซักเสร็จต้องตั้งเชือกด้านหลังของผ้า มิฉะนั้นเวลาดึงขึ้น-ลงอาจทำให้ผ้าเอียงได้</p>\r\n\r\n<p><strong>&nbsp;2. ม่านจีบ (</strong><strong>Pleat Curtain)&nbsp;</strong>เป็นแบบ&nbsp;<strong>ผ้าม่าน</strong>&nbsp;ที่ได้รับความนิยมกันมานานแล้ว ด้วยส่วนหัวของผ้าที่มีการจับจีบสวยงาม โดยเว้นระยะห่างหัวจีบประมาณ 10-12 ซม. สำหรับม่านจีบนี้สามารถรีดแบบอัดจีบ หรือ รีดเรียบก็ได้ ซึ่งในปัจจุบันคนจะนิยมรีดเรียบมากกว่า เมื่อแขวนผ้าม่านขึ้นมา ผ้าม่านก็จะเป็นรอนๆ ทำให้ดูทันสมัยมากกว่าการรีดจีบ ส่วนตัวรางนั้น สามารถเลือกรางได้สองแบบคือรางยูโก้ที่มีลูกล้อหรือที่เรียกกันว่ารางตัวเอ็มราง หรือเป็นรางโชว์ ซึ่งมีหลากหลายแบบให้เลือก ทั้งแบบไม้ แบบโลหะ ตามแต่คนชอบ</p>', '2021-11-30', '15:01:56', '2021-11-30 15:01:56', 0, 'ผ้าม่าน-นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ-ได้หลายรูปแบบ-บทความ-103', '', '', ''),
(104, 'ผ้าม่าน นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ ได้หลายรูปแบบ', '1. ม่านพับ (Roman Blind) เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ', '1031085549400919.gif', '<p><strong>&nbsp;1. ม่านพับ (</strong><strong>Roman Blind)</strong>&nbsp;เป็นม่านที่มีความนิยมมากในปัจจุบัน เนื่องจากม่านพับมีลักษณะการเก็บที่พับขึ้นพับลง ไล่ขึ้นไปเรื่อยๆ จึงทำให้ไม่เกะกะพื้นที่ด้านข้าง จึงมักนิยมใช้ในคอนโด หรือหน้าต่างเล็กๆตรงหัวเตียง ม่านพับใช้ผ้าเหมือนกับผ้าม่านปกติ ในการตัดเย็บ โดยเราสามารถเลือกผ้าม่านแบบสีเรียบ หรือมีลวดลายในการตัดเย็บได้ตามใจชอบ แต่ม่านพับก็มีข้อเสีย คือเวลาถอดซักอาจจะยากกว่า<strong>&nbsp;ผ้าม่าน</strong>&nbsp;แบบอื่นๆ และเมื่อซักเสร็จต้องตั้งเชือกด้านหลังของผ้า มิฉะนั้นเวลาดึงขึ้น-ลงอาจทำให้ผ้าเอียงได้</p>\r\n\r\n<p><strong>&nbsp;2. ม่านจีบ (</strong><strong>Pleat Curtain)&nbsp;</strong>เป็นแบบ&nbsp;<strong>ผ้าม่าน</strong>&nbsp;ที่ได้รับความนิยมกันมานานแล้ว ด้วยส่วนหัวของผ้าที่มีการจับจีบสวยงาม โดยเว้นระยะห่างหัวจีบประมาณ 10-12 ซม. สำหรับม่านจีบนี้สามารถรีดแบบอัดจีบ หรือ รีดเรียบก็ได้ ซึ่งในปัจจุบันคนจะนิยมรีดเรียบมากกว่า เมื่อแขวนผ้าม่านขึ้นมา ผ้าม่านก็จะเป็นรอนๆ ทำให้ดูทันสมัยมากกว่าการรีดจีบ ส่วนตัวรางนั้น สามารถเลือกรางได้สองแบบคือรางยูโก้ที่มีลูกล้อหรือที่เรียกกันว่ารางตัวเอ็มราง หรือเป็นรางโชว์ ซึ่งมีหลากหลายแบบให้เลือก ทั้งแบบไม้ แบบโลหะ ตามแต่คนชอบ</p>', '2021-11-30', '15:01:57', '2021-11-30 15:01:57', 0, 'ผ้าม่าน-นั้นมีหลายชนิดซึ่งแต่ละชนิดนั้นก็สามารถเย็บเป็นรูปแบบต่างๆ-ได้หลายรูปแบบ-บทความ-104', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `article_picture`
--

CREATE TABLE `article_picture` (
  `article_picture_id` int(11) NOT NULL,
  `article_picture_photo` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billrequest`
--

CREATE TABLE `billrequest` (
  `billrequest_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `billrequest_order_id` varchar(1000) NOT NULL,
  `billrequest_member_id` varchar(1000) DEFAULT NULL,
  `billrequest_price` varchar(1000) DEFAULT NULL,
  `billrequest_product` varchar(1000) DEFAULT NULL,
  `billrequest_p_price` varchar(1000) DEFAULT NULL,
  `billrequest_amount` varchar(1000) DEFAULT NULL,
  `billrequest_time` varchar(1000) DEFAULT NULL,
  `billrequest_date` varchar(100) DEFAULT NULL,
  `billrequest_status` varchar(1000) DEFAULT '1',
  `billrequest_package` varchar(1000) DEFAULT 'รอการจัดส่ง',
  `billrequest_weight` varchar(1000) DEFAULT NULL,
  `billrequest_member_name` varchar(1000) DEFAULT NULL,
  `billrequest_member_email` varchar(1000) DEFAULT NULL,
  `billrequest_member_address` varchar(1000) DEFAULT NULL,
  `billrequest_member_zipcode` varchar(1000) DEFAULT NULL,
  `billrequest_member_phone` varchar(1000) DEFAULT NULL,
  `billrequest_p_name` varchar(1000) DEFAULT NULL,
  `billrequest_p_detail` varchar(1000) DEFAULT NULL,
  `billrequest_p_link` varchar(1000) DEFAULT NULL,
  `billrequest_who_id` varchar(1000) DEFAULT '1',
  `billrequest_cash_on_name` varchar(1000) DEFAULT NULL,
  `notification_id` varchar(1000) DEFAULT '1',
  `billrequest_product_name` text DEFAULT NULL,
  `billrequest_product_amount` text DEFAULT NULL,
  `billrequest_product_price` text DEFAULT NULL,
  `billrequest_product_amount_price` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cash_on`
--

CREATE TABLE `cash_on` (
  `cash_on_id` int(11) NOT NULL,
  `cash_on_name` varchar(1000) DEFAULT NULL,
  `cash_on_detail` varchar(1000) DEFAULT NULL,
  `cash_on_name_eng` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_on`
--

INSERT INTO `cash_on` (`cash_on_id`, `cash_on_name`, `cash_on_detail`, `cash_on_name_eng`) VALUES
(1, 'โอนเงิน', NULL, 'Bank transfer');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `catalog_id` int(11) NOT NULL,
  `catalog_name` varchar(200) NOT NULL,
  `catalog_photo` varchar(200) DEFAULT NULL,
  `catalog_cover` varchar(250) NOT NULL,
  `catalog_min` varchar(1000) NOT NULL,
  `catalog_detail` text DEFAULT NULL,
  `catalog_sort` int(11) NOT NULL,
  `catalog_page` text DEFAULT NULL,
  `catalog_name_eng` varchar(1000) DEFAULT NULL,
  `catalog_detail_eng` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalog_id`, `catalog_name`, `catalog_photo`, `catalog_cover`, `catalog_min`, `catalog_detail`, `catalog_sort`, `catalog_page`, `catalog_name_eng`, `catalog_detail_eng`) VALUES
(182, 'สีดำ', '1341654448.jpg', '', '', '', 0, '2034304592', NULL, NULL),
(183, 'สีทอง', '109707690.jpg', '', '', '', 0, '1665856810', NULL, NULL),
(184, 'สีชมพู', '893202153.jpg', '', '', '', 0, '1890377636', NULL, NULL),
(185, 'สีขาว', '627746557.jpg', '', '', '', 0, '1751695255', NULL, NULL),
(186, 'สีน้ำเงิน', '477667137.jpg', '', '', '', 0, '1576358062', NULL, NULL),
(187, 'หมวดสี', '594731876.jpg', '', '', '', 0, '1919582318', NULL, NULL),
(191, 'หมวดสี', '1380201049.jpg', '', '', '', 0, '161003569', NULL, NULL),
(192, 'หมวดสี', '687131608.jpg', '', '', '', 0, '1323952366', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(200) DEFAULT NULL,
  `collection_name_eng` varchar(200) DEFAULT NULL,
  `collection_detail` varchar(1000) DEFAULT NULL,
  `collection_detail_eng` varchar(1000) DEFAULT NULL,
  `collection_photo` varchar(200) DEFAULT NULL,
  `collection_sort` int(11) DEFAULT 0,
  `collection_page` varchar(250) DEFAULT NULL,
  `catalog_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `collection_name_eng`, `collection_detail`, `collection_detail_eng`, `collection_photo`, `collection_sort`, `collection_page`, `catalog_id`) VALUES
(1, 'หมวดหมู่ย่อย a001x', NULL, '', NULL, NULL, 0, '1836496183', 169),
(2, 'หมวดหมู่ย่อย a002', NULL, '', NULL, NULL, 0, '1327435528', 169),
(4, 'ดินสอ', NULL, '', NULL, NULL, 0, '427433218', 170),
(5, 'ปากกา', NULL, '', NULL, NULL, 0, '1916285658', 170),
(6, 'ไม้บรรทัด', NULL, '', NULL, NULL, 0, '2024955803', 170),
(7, 'ยางลบ', NULL, '', NULL, NULL, 0, '1978980684', 170),
(8, 'กบเหลาดินสอ', NULL, '', NULL, NULL, 0, '1458620238', 170),
(9, 'น้ำยาลบคำผิด', NULL, '', NULL, NULL, 0, '381172391', 170);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL,
  `contactus_name` varchar(255) DEFAULT NULL,
  `contactus_last` varchar(255) DEFAULT NULL,
  `contactus_email` varchar(255) DEFAULT NULL,
  `contactus_phone` varchar(255) DEFAULT NULL,
  `contactus_company` text DEFAULT NULL,
  `contactus_message` text DEFAULT NULL,
  `contactus_date` date NOT NULL,
  `contactus_time` time NOT NULL,
  `notification_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Device`
--

CREATE TABLE `Device` (
  `DeviceID` int(11) NOT NULL,
  `DeviceName` varchar(1000) DEFAULT NULL,
  `DeviceText1` varchar(1000) DEFAULT NULL,
  `DeviceText2` varchar(1000) DEFAULT NULL,
  `DeviceText3` varchar(1000) DEFAULT NULL,
  `DevicePhoto` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Device`
--

INSERT INTO `Device` (`DeviceID`, `DeviceName`, `DeviceText1`, `DeviceText2`, `DeviceText3`, `DevicePhoto`) VALUES
(1, 'Apple', 'iPhone', 'Mac OS', 'IOS', '45796106knowledge_graph_logo.png'),
(2, 'Windows', 'Windows', 'Windows', 'Windows', '567172563download.png'),
(4, 'Android', 'Android', 'Android', 'Android', '1304965330images.png'),
(5, 'SAMSUNG', 'SAMSUNG', 'SM', 'SAMSUNG', '1357635180samsung-logo-png-1288.jpg'),
(11, 'Opera', 'Opera', 'Opera', 'Opera', '381632333unnamed.png'),
(13, 'Nexus', 'Nexus', 'Nexus', 'Nexus', '1183670435rainbow_x_sample_2.jpg'),
(14, 'Vivo', 'Vivo', 'Vivo', 'Vivo', '747711229vivo-1-logo-png-transparent.png'),
(15, 'HUAWEI', 'HUAWEI', 'HUAWEI', 'HUAWEI', '2027336877download.jpg'),
(16, 'xiaomi', 'MI', 'MI', 'Mi', '325725748768px-Xiaomi_logo.svg.png'),
(18, 'Windows 7', 'Windows NT 6.1', 'Windows NT 6.1', 'Windows NT 6.1', '160086375214_26072013113314_0.jpg'),
(19, 'Macintosh', 'Macintosh', 'Macintosh', 'Macintosh', '3861924162016-04-08-01.jpg'),
(20, 'Windows 8.1', 'Windows NT 6.3', 'Windows NT 6.3', 'Windows NT 6.3', '1580134240Windows8.1.jpg'),
(21, 'windows 10', 'Windows NT 10.0', 'Windows NT 10.0', 'Windows NT 10.0', '524177638Windows-10-logo-e1502132803317.png'),
(22, 'OPPO', 'CPH', 'CPH', 'X900', '371569200untitled-1_85.jpg'),
(24, 'Linux', 'Linux', 'Linux', 'Linux', '17585722031200px-Tux.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `fixed`
--

CREATE TABLE `fixed` (
  `fixed_id` int(11) NOT NULL,
  `fixed_website` varchar(255) NOT NULL,
  `fixed_company` varchar(255) NOT NULL,
  `fixed_topic` varchar(255) DEFAULT NULL,
  `fixed_inbox` varchar(255) DEFAULT NULL,
  `fixed_sent` varchar(255) DEFAULT NULL,
  `fixed_titlelogo` varchar(255) DEFAULT NULL,
  `fixed_navlogo` varchar(1000) NOT NULL,
  `fixed_pluginpage` varchar(1000) DEFAULT NULL,
  `fixed_navbar` varchar(250) DEFAULT NULL,
  `fixed_qrcode` varchar(2000) DEFAULT NULL,
  `fixed_googlemaps` varchar(1000) DEFAULT NULL,
  `fixed_graphicmap` varchar(1000) DEFAULT NULL,
  `fixed_address01` text DEFAULT NULL,
  `fixed_address02` text DEFAULT NULL,
  `fixed_address03` varchar(1000) DEFAULT NULL,
  `fixed_company_eng` varchar(2000) DEFAULT NULL,
  `fixed_topic_eng` varchar(2000) DEFAULT NULL,
  `fixed_navbar_eng` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixed`
--

INSERT INTO `fixed` (`fixed_id`, `fixed_website`, `fixed_company`, `fixed_topic`, `fixed_inbox`, `fixed_sent`, `fixed_titlelogo`, `fixed_navlogo`, `fixed_pluginpage`, `fixed_navbar`, `fixed_qrcode`, `fixed_googlemaps`, `fixed_graphicmap`, `fixed_address01`, `fixed_address02`, `fixed_address03`, `fixed_company_eng`, `fixed_topic_eng`, `fixed_navbar_eng`) VALUES
(2, 'kritsadacurtain.com', 'กฤษฎา ผ้าม่าน', 'จำหน่ายผ้าม่าน ออกแบบ ติดตั้งผ้าม่าน', 'kritsadacurtain@gmail.com', 'no-reply@kritsadacurtain.com', '235198450 - 594304100 - logo.png', '2091109187 - 594304100 - logo.png', 'www.facebook.com/%E0%B8%81%E0%B8%A4%E0%B8%A9%E0%B8%8E%E0%B8%B2-%E0%B8%9C%E0%B9%89%E0%B8%B2%E0%B8%A1%E0%B9%88%E0%B8%B2%E0%B8%99-108356241662476', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d208542.84467497419!2d100.2509063935373!3d13.778275417319836!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2918415ee8dd7%3A0x90c6a9d199c8944a!2z4LiB4Lik4Lip4LiO4LiyIOC4nOC5ieC4suC4oeC5iOC4suC4mSAo4LiK4LmI4Liy4LiH4Lij4Lix4LiV4LiZ4LmMKQ!5e0!3m2!1sth!2sth!4v1638341805695!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '', 'กฤษฎา ผ้าม่าน โทร.081-989-9837 , 082-674-5947', '62/125 หมู่12 หมู่บ้าน พระปิ่น3 ต.บางแม่นาง ', 'อ.บางใหญ่ จ.นนทบุรี 11140 เลขที่การค้า : 3201000031961', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_code` varchar(1000) DEFAULT NULL,
  `gallery_photo` varchar(2000) DEFAULT NULL,
  `gallery_video` varchar(1000) DEFAULT NULL,
  `gallery_youtube` varchar(2000) NOT NULL,
  `gallery_facebook` varchar(2000) NOT NULL,
  `gallery_review` text DEFAULT NULL,
  `gallery_link` varchar(1000) DEFAULT NULL,
  `gallery_download` varchar(1000) DEFAULT NULL,
  `gallery_sort` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Historylog`
--

CREATE TABLE `Historylog` (
  `HistorylogID` int(11) NOT NULL,
  `HistorylogDate` date DEFAULT NULL,
  `HistorylogTime` time DEFAULT NULL,
  `HistorylogIP` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HistorylogAgent` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Historyloglanguage` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HistorylogActivities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `AdminName` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Historylog`
--

INSERT INTO `Historylog` (`HistorylogID`, `HistorylogDate`, `HistorylogTime`, `HistorylogIP`, `HistorylogAgent`, `Historyloglanguage`, `HistorylogActivities`, `AdminID`, `AdminName`) VALUES
(1, '2020-12-02', '19:34:27', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  บัตรเดบิต ATM ยังจำเป็นมั้ย เมื่อยุคนี้ถอนเงินโดยไม่ต้องใช้บัตร', 1, ''),
(2, '2020-12-02', '19:34:29', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  ZOTAC Technology Limited ', 1, ''),
(3, '2020-12-02', '19:34:32', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  อัพเดท 4 แล็ปท็อปสเปคเยี่ยม เรียนก็ได้ ทำงานก็ดี ด้วยฮาร์ดดิสก์แบบ SSD', 1, ''),
(4, '2020-12-02', '19:34:34', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  แนะนำ! 5 จุดเด่นของ Surface Go 2 อุปกรณ์ที่เบาและคล่องตัวที่สุดจาก Microsoft', 1, ''),
(5, '2020-12-02', '19:34:37', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  วิธีลบพื้นหลังในวิดีโอ ที่ง่ายเหมือนไดคัทภาพ', 1, ''),
(6, '2020-12-02', '19:34:39', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  วิธีเปลี่ยนพื้นหลัง LINE PC อย่างรวดเร็ว', 1, ''),
(7, '2020-12-02', '19:34:42', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  เทคนิคการใช้ Google Maps ไว้วางแผนเที่ยวช่วงหยุดยาว', 1, ''),
(8, '2020-12-02', '19:34:44', '124.122.34.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9,th;q=0.8', 'article_Del  Instagram Shopping เปิดตัวในไทยแล้ว', 1, ''),
(9, '2020-12-03', '21:02:58', '124.122.17.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'en-US,en;q=0.9', 'collection_Del  ,บ', 1, ''),
(10, '2021-07-22', '20:48:48', '124.122.14.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ชื่อเรียก เครื่องหนังชนิดต่างๆ', 0, ''),
(11, '2021-07-22', '20:48:49', '124.122.14.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  หนังแท้ VS หนังเทียม', 0, ''),
(12, '2021-07-22', '20:48:50', '124.122.14.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ประเภทของหนังแท้ (Leather type)', 0, ''),
(13, '2021-07-22', '20:48:52', '124.122.14.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ชื่อบทความ x', 0, ''),
(14, '2021-07-25', '13:52:46', '27.145.136.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ประโยชน์และคุณค่าทางโภชนาการของสตรอเบอร์รี่', 0, ''),
(15, '2021-07-25', '13:52:47', '27.145.136.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ประโยชน์และคุณค่าทางโภชนาการของสตรอเบอร์รี่', 0, ''),
(16, '2021-07-25', '13:52:48', '27.145.136.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ประโยชน์และคุณค่าทางโภชนาการของสตรอเบอร์รี่', 0, ''),
(17, '2021-07-25', '13:52:49', '27.145.136.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ประโยชน์และคุณค่าทางโภชนาการของสตรอเบอร์รี่', 0, ''),
(18, '2021-07-25', '14:40:15', '27.145.136.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  จุดเด่นจุดด้อยของแบบบ้านแต่ละประเภท', 0, ''),
(19, '2021-08-01', '15:48:27', '171.101.103.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ชื่อบทความ x', 0, ''),
(20, '2021-08-01', '15:48:29', '171.101.103.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  จุดเด่นจุดด้อยของแบบบ้านแต่ละประเภท', 0, ''),
(21, '2021-08-01', '15:48:30', '171.101.103.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  จุดเด่นแบบบ้านสไตล์โมเดิร์น Modern', 0, ''),
(22, '2021-08-01', '15:48:31', '171.101.103.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  บทความที่ 114 5 แบบบ้านราคาประหยัด ดีไซน์สวยอยู่สบายสร้างง่ายมีอยู่จริง', 0, ''),
(23, '2021-08-02', '19:26:57', '171.96.233.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ความสำคัญของ เครื่องเขียน ในยุคแห่งการพิมพ์', 0, ''),
(24, '2021-11-21', '21:21:41', '171.96.159.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ความสำคัญของ เครื่องเขียน ในยุคแห่งการพิมพ์', 0, ''),
(25, '2021-11-21', '21:21:42', '171.96.159.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  เคล็ดลับชุบชีวิต ปากกาลูกลื่นเขียนไม่ออก', 0, ''),
(26, '2021-11-21', '21:21:43', '171.96.159.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  รู้หรือไม่ ? ว่าประเทศใดบ้างที่ผลิตหัวปากกาลูกลื่นได้บ้าง', 0, ''),
(27, '2021-11-29', '21:09:40', '171.96.220.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ทางเลือกสุขภาพ ลดน้ำหนักปลอดภัย ด้วยอาหารคีโต', 0, ''),
(28, '2021-11-29', '21:09:41', '171.96.220.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ตารางกินคีโต (Keto) 7 วัน เมนูคีโต ลดน้ำหนัก หาง่าย ทำสะดวก ไม่แพง', 0, ''),
(29, '2021-11-29', '21:09:42', '171.96.220.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8', 'article_Del  ตารางกินคีโต (Keto) 7 วัน เมนูคีโต ลดน้ำหนัก หาง่าย ทำสะดวก ไม่แพง', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_email` varchar(200) DEFAULT NULL,
  `member_name` varchar(200) NOT NULL,
  `member_address` varchar(1000) NOT NULL,
  `member_zipcode` int(10) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_point` int(11) NOT NULL DEFAULT 0,
  `member_now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_phone`, `member_email`, `member_name`, `member_address`, `member_zipcode`, `member_password`, `member_point`, `member_now`) VALUES
(63, '0826745947', 'kitkitza541@gmail.com', 'กฤษฎา', '62/125', 11140, '123456789789a', 0, '2021-12-03 19:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อตกลงและเงื่อนไข';

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_name`) VALUES
(1, 'ยังไม่อ่าน'),
(2, 'อ่านแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `Online`
--

CREATE TABLE `Online` (
  `ID` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `time_online` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Online`
--

INSERT INTO `Online` (`ID`, `session`, `time_online`) VALUES
(1, 'vool2avac5alhhkpp3cups6dlg', '1611045057'),
(2, 'q7g9bjtueqq6nnfd0pldv7aib1', '1611044899'),
(3, '2cfo54s5mujbh3j96m7d76v8n8', '1611045142'),
(4, 'j9l3dhf2qo24189k2ut8kn9sck', '1611072132'),
(5, '2d75tsbd3svjbabad7pee8iajr', '1611046831'),
(6, 'vvb62a6iuf4r7j7jekt1jbpntl', '1611072034'),
(7, 'eeenouutvdum4qs28kq9n15hda', '1611053503'),
(8, 'q6h24bm1fqnnf4f7ulf26p93sa', '1611060358'),
(9, 'rr41bv77j71n57ilngl0t0ec3h', '1611060364'),
(10, 'u0fgpssqhee6uug3pdvltlnnc6', '1611066847'),
(11, 'eguk2l8neqnskmhdmm3kacev4r', '1611064526'),
(12, '26q1hub7ct06ijqoa541fh23lh', '1611065746'),
(13, 'mlueoloionv168augaaqp59ce7', '1611069040'),
(14, 'qt8n5859hi6dmlhrh16l65gt9q', '1611070258'),
(15, 'kq45c6ld7g722lhhp7oirqljgi', '1611070199'),
(16, 'a2d97r22d9k05i3a5o7mj77gkv', '1611070248'),
(17, 'lrtatj7j7cp02slrnk2ebteslr', '1611111149'),
(18, 'qu4254ie90pur94s6l8cf4mhhr', '1611149574'),
(19, 'epp6tibmdokpuhiamagllf1547', '1611130577'),
(20, 'slmgrvbtjm331ttr4ua30s03s6', '1611124539'),
(21, '4c10ucoupuos276s7j8bd2ng5v', '1611124945'),
(22, '0nrlet0neg63kdi9aalki65v5f', '1611125339'),
(23, 'r1lh9s3tao00r2f73pul66d2iu', '1611126461'),
(24, '73ui52kv28seun2r9gbrh0ie70', '1611132998'),
(25, 'hrc9i2f6f5533qscq2fllgutvj', '1611134884'),
(26, 'li2hve8qr2pope018p21reh81n', '1611139830'),
(27, '7m9jjn5of9tl1v6dqdml1vik9j', '1611153802'),
(28, 't6potmp1sc0df7k2id2cv9kie0', '1611146937'),
(29, 'b7rh8ulfk994avhmedt8taleus', '1611152121'),
(30, 'lm177uj0odj1bls07hd0ji6q98', '1611164074'),
(31, 'jfqa6v6phdb313resgh8jf7q1n', '1611168213'),
(32, '8qaooafg0a7dcjaale43i22iqh', '1611171774'),
(33, '3fh87olq0s9jea10sst2bvh7sr', '1611175065'),
(34, 'srrhh57vgehslcjnisl2230dj4', '1611176098'),
(35, 's1sr11mdcdvn49n3lt5e4ukc0t', '1611176926'),
(36, 'vvqmmabr5h8likb56blg1nc5sn', '1611178371'),
(37, 'p629dv7dcqt6h2g9cmc1758nie', '1611178588'),
(38, '6due04c0vre91s5grsndkr6c8k', '1611178639'),
(39, '5muogeqihqqa366fhao65tkqkj', '1611181283'),
(40, 'k08s037f80shigna1g2jr9ovh4', '1611181580'),
(41, '6pqooamvobf5roacvsrejedb6c', '1611182871'),
(42, '2mvp0ns6q13ronqh5lcjrpr639', '1611184939'),
(43, 'lthrf4ri1lclsq1ourqgn5n4g4', '1611186187'),
(44, 'j1s9rv5c47skgiugokvrfqkn82', '1611188399'),
(45, 'knrb5v7essbofvnalkdcv6hme5', '1611189609'),
(46, '4omeh8m1fku74k3rmi2inmhmlk', '1611192096'),
(47, '9nmm1bld5mhs1qumdsvp1bcpg7', '1611195990'),
(48, 'in5rsb79olmeo54fdqvmcmvkfk', '1611203766'),
(49, 'ka5tpc1igifdbf32mipiegssge', '1611204111'),
(50, 'kj80okni4d6m2biap6ggvedgcp', '1611208012'),
(51, '7querrjs1b92d4acidvlbanhf6', '1611212189'),
(52, '3lcn436vo2le84l35ck07grl68', '1611218117'),
(53, 'ovg49thok5ovttb6gmfs61hqrq', '1611216506'),
(54, 'f1j7fplkttu0qo54sebullr65p', '1611219691'),
(55, 'maf7dnpgjonte3umlclvkk2rja', '1611220750'),
(56, 'hlf94ar9lh2omasn15pj0brhtr', '1611221076'),
(57, 'ida0ds82ksad6n5tb7j5shg4rm', '1611224913'),
(58, 'uk5fit8us8c3eicgsidsl3ln3n', '1611226514'),
(59, 'amqcrqcpq6ag9tbcivp13ksbi7', '1611229379'),
(60, 'n5t71sp2n0l8solefn3s48h4su', '1611242186'),
(61, 'hnar06r47ephblq08fvee6ri5h', '1611234121'),
(62, 'rl9jkmjd1tplsuh1uu1dj6q6km', '1611237599'),
(63, 'cutdck3iek4j9nktg3c8dea6qa', '1611244039'),
(64, '45o086uu5t2k6m7ff6mpvrum5e', '1611246394'),
(65, '9lnvg6h29s6b4ssau7nbi3khpq', '1611253455'),
(66, '0mp09l3r6u3bnjct660ob0cm27', '1611255392'),
(67, 'a20vu14md47k4u7uavoda11nvj', '1611255392'),
(68, '4l7toah41l96jb19nk87gna2mu', '1611257069'),
(69, '09ne0h21teebtacu7qiadeuphm', '1611260084'),
(70, 'kk06bphc5n6loecdi3bhg00u07', '1611262098'),
(71, 'pl23589k2kip1on5ee6q104vu9', '1611270537'),
(72, 'ib49ctitun2a7ir66ql6u7j1r0', '1611271296'),
(73, 'a9oogcu6vdoniki261hf5qrgp0', '1611272893'),
(74, 'iqukimvv3jq0dh177qvcm644kl', '1611280158'),
(75, 'r757994c8osh3u5h73k2p6cc1g', '1611286184'),
(76, '1ri8d7jhto2qspl4471cm1q2gm', '1611290729'),
(77, 'dbml3b6pddhehd26afvtia3o8o', '1611305640'),
(78, 'ql9kqu7a6pnhmpbfifb3j9vjpu', '1611306100'),
(79, '580rmb65s6gr376bstk5uat6im', '1611313658'),
(80, 'h1std7ptnqjl22qdcq8dafo2qd', '1611315605'),
(81, '53747upl26edmnsgl8bd0351q1', '1611324741'),
(82, 'abteepk82gd1hd6oag9p0l0ilt', '1611322961'),
(83, 'ma429i7nmvecvs13223v5ta8h1', '1611323170'),
(84, 'jl02i8khti8e1ua18e3ke9sndu', '1611326479'),
(85, 'h7f2tv43tubgmnjblmr0i4dpa2', '1611342409'),
(86, 'qvj2c0fq5dcb4j5jsdqlhgg007', '1611346149'),
(87, 'gdt0hjseogsq6qk2uvt900s9cl', '1611351568'),
(88, '0l9hq9a9p23clr78qbgb10e4i2', '1611361103'),
(89, 'bf5qqs3stkd4qeu53m2nb14mr9', '1611372687'),
(90, '296940h60bi1pij05adt4bdp75', '1611385545'),
(91, 'mt7jmobt09mkcdls49rouhfud7', '1611398764'),
(92, 'pfmigankuejmklj2cs0ftr49f0', '1611415576'),
(93, 'ihct0034k05fg7iqlcuu12pomv', '1611431360'),
(94, 'q33i9u0h01p9u034s2j4obg43p', '1611440016'),
(95, '9ih2af8sk51v9ebqcf43qlhadl', '1611441274'),
(96, 'quevnlvn0p42vv93oo7kb8fmet', '1611449068'),
(97, '4ock2c4tvf7ktot0l2m5tmqado', '1611459808'),
(98, 'r0ga6gs9o7n81edaqqe8paqqo2', '1611466599'),
(99, 'tgbglgl2ovn4pi0a0kvvnr2rjp', '1611472888'),
(100, '9aob6jc2fqs3mgfj9ahcf3n1dn', '1611472897'),
(101, '3feog0sgejd0rhcdckvulips5q', '1611472900'),
(102, 'njpem9jrgur94nav88gmi4ofvg', '1611472955'),
(103, 'u2370lpa64ne78jimabpui5dre', '1611475570'),
(104, 'h41r60rn21fi9mc43n9qjhgdk0', '1611477532'),
(105, '4drphvrn08knm83r5lkcamdpv9', '1611494155'),
(106, '0apdqg2p1p1d30uvlmvreotes4', '1611513141'),
(107, '8at5b5r51udfrcj21a0sia7f6n', '1611555525'),
(108, 'sc9kqng8fpccnu4nhlsphksl89', '1611584080'),
(109, 'a3uqc5ojka98eift8kvgnheagg', '1611578996'),
(110, 'hqbaplrp3moenqm1gvutdedji2', '1611597418'),
(111, 'jol5hhbbj45ua61tlsgk6lrpn5', '1611602206'),
(112, 'iqhaiovv5bspnihsp5blrc8di0', '1611614924'),
(113, 'u50kr6jpeebo83fqhd00g414p3', '1611633638'),
(114, 'phhbrue6tfrefibhsjjdl1tnvo', '1611644253'),
(115, 'hnav9d033oasocpcns7d0bo50b', '1611665145'),
(116, '405v2lh6m6ntb9mslame4dqjpe', '1611656450'),
(117, 'ufl9guvlpvmrt2tjbrr4u8tll5', '1611681611'),
(118, 'kmrbq971bfg5vajjao20o2f8pf', '1611697513'),
(119, 'cvoo9569errs5u6qjtat00c8gg', '1611710688'),
(120, '5b8m4mst70qgupgufs092nnge7', '1611720704'),
(121, 'hakk5fub1f3q4987p7i4jdp2a2', '1611726966'),
(122, 'cvd8inlenc3vmqp6h5dutq520m', '1611727922'),
(123, 'liiv03p00gp0vbu71spnsdcc3q', '1611748754'),
(124, 'vf0o2ur7ocbnjdag24iea0ecfm', '1611772224'),
(125, 'dhpvd0hakn1gkl308jv87p9qkb', '1611785527'),
(126, '79kr7h3pl94p1ugofiksv0u8be', '1611799226'),
(127, 'fe0k5asbe6svnklc7u1gvs53v8', '1611822694'),
(128, '8366ktj4vb87t0f2v7ohi9u131', '1611869397'),
(129, 'rj1cffbhjbm1ifk6hsn9ldqnnt', '1611886755'),
(130, 'qf6o5qsnvp18dmd4kv5lv71iqv', '1611900231'),
(131, '8bqk1ic861qe78d3a2isc4iipi', '1611911991'),
(132, 'v0r4mrggfc619lepl8jm3vjnp2', '1611936229'),
(133, 'thgr0it4j9hol9lodjnk6flhf8', '1611957819'),
(134, '1gv4e39bt6jpeoprqqaoi5nr2f', '1611973329'),
(135, 's7i6eiflslbu6v7uq11n6qju26', '1611992844'),
(136, 'gvmug20oiqtcm04nfuh4cvrmh5', '1611995279'),
(137, '7m74oege8kk3lbe11rs0ou7mn6', '1611996016'),
(138, 'sjelkhtaq0a800k8lf7h5kasc3', '1612082139'),
(139, 'fvndanhnpr1hu6kjnc330llgcg', '1612020768'),
(140, 'vc1f4omm6glvpqlf38a22dp27p', '1612045047'),
(141, 's55u77ffrcg2gh26110r7rhkao', '1612105579'),
(142, '8q330a13l78fholt02fn65mu84', '1612114697'),
(143, 'j3e120t7ciamaa706bl2jmmk1b', '1612160659'),
(144, 'hudnda8cu6ubam6761un4petkb', '1612171608'),
(145, '93rq5mv6utal29dekoh2499jml', '1612226547'),
(146, '8muglu4glqdon33h53c4ii4cmk', '1612226573'),
(147, 'c9il6r9onalat80595loo29177', '1612232109'),
(148, '3mkmtim38k2n2v1s0j34ih1n3p', '1612233656'),
(149, '5al7r2tb1g3fts4ioruu3ddpbb', '1612234338'),
(150, 'u75ovhfosqsrcgi9e8o7vb9t7k', '1612252397'),
(151, 'r4u1v4v916md68p43h8ql36omt', '1612252508'),
(152, '101frovofk1ctotuor3t2noqdr', '1612255979'),
(153, '7i88go0nt6c53epp8pjjrou6an', '1612274638'),
(154, '3j30qrgdril45gpc4rj6fth5j9', '1612275504'),
(155, 'vc5enpmhf5jgfitui17fd9r89q', '1612276214'),
(156, 'u0fn6qjq9hl8cl0qg507cku249', '1612296575'),
(157, '93idq8rnc605atvca7doj1sg7c', '1612302010'),
(158, 'hhhhlfjvdh95qq4919a44ctd56', '1612302011'),
(159, 'k7nt7l0qt8j731cm4hvm871kk8', '1612302015'),
(160, 'rhm1lhm4esq6cuq6lmjk9eji3k', '1612302015'),
(161, 'jjtbutc9femgs1fdutn99qa7fc', '1612302887'),
(162, 'ou7d8ocvaln7micnp9mrno7dqq', '1612421782'),
(163, 'o9num7rurekhp6h3se5mejgt1q', '1612428630'),
(164, 'l97fmh8n55pvfm0kk2mirju4q9', '1612429069'),
(165, 'j1svv05m62rorj29097frs7eb2', '1612443417'),
(166, '7nfbf9c60mkbmloh4urih7fjrh', '1612442359'),
(167, 'd1pueirn3c51vftl1meihln2o9', '1612443306'),
(168, 'd0c7fdmmfaj2qssbcntjhaq253', '1612446527'),
(169, '5fcn3nq4h1ans06smvhav016eo', '1612450151'),
(170, 'b3i268cd0loei7rrvq4rjh2rnm', '1612522186'),
(171, 'vr7mo193r102vpn57lsb1hju4l', '1612491528'),
(172, 'j3udp6bdcrlu3m38ljohnig943', '1612509081'),
(173, 'qm8udu2e89bk1221ml4ql7lc06', '1612508839'),
(174, 'grga8ofu9llc29pinmr9ctti8d', '1612510370'),
(175, 'cj8olm49fqdekou5vg4ve4msdg', '1612559524'),
(176, 'm3df2cpbp7mtbd8uc1kvorhr44', '1612560694'),
(177, 's9762ft8bc3c1lrismi4a1n86i', '1612763436'),
(178, 'o9aph2nq487c6o3qf1b36kmevk', '1612629702'),
(179, 'g7l24eh6lu8vbs1qslr52n69l8', '1612677471'),
(180, 'hum129glmddgrn8ahasdmb15ej', '1612680207'),
(181, 'eo1m5snmtm87ghnji32eg55hgj', '1612736648'),
(182, 'foh79kkbrrfq0j3l74of1gjl05', '1612764804'),
(183, 's105gsmhad0t7oaucok1b07ojr', '1612786872'),
(184, '6smjum321renvg6nakgfha0bgd', '1612786878'),
(185, 'vvs7jpdvvvl7g6me91gsfmpdmr', '1612790080'),
(186, 'gq4hueuh8vp2ubc3j2qgefdbev', '1612843953'),
(187, 'mujn9ornf77gjhr1hqp40493vr', '1612861972'),
(188, 'nbh9589nc4vn2nic6aaj5bin0i', '1612931164'),
(189, 'b4m60q2st1h011i8pfet2vkk4l', '1613010824'),
(190, 'tstk23fpt942pp3ofpj55r3cid', '1613029878'),
(191, '6q0d39a53drrh63se015casj1u', '1613032868'),
(192, 'j2jllm6rqjjp82c5jcvrg8ep70', '1613056920'),
(193, '28m749kkuqkprcs53c9311r09l', '1613055599'),
(194, 'n6n3igslbf25309iee5sv8qc15', '1613055601'),
(195, '2dus4euo77im42sfd4r7sob5pu', '1613056094'),
(196, '6bku7pq22coodl7d2govgm3i3s', '1613073254'),
(197, '4jks8r3dou2qmk985112seef18', '1613111520'),
(198, 'cio6q9vq3hs7r8vmqomdeu6131', '1613147531'),
(199, 'so4kigctcukhquf54u46ak3f4m', '1613194819'),
(200, 'u6qqio5lonnheg1ui9alnhh75f', '1613194864'),
(201, 'v7p8j6otsvu1dm6upg9k2s3rss', '1613203624'),
(202, 'load2idbp2nb6j8reif52eu44m', '1613232610'),
(203, 'ms59tjakdb4n03mlv0kt1rvco1', '1613228560'),
(204, 'tvme9nf3mfmemqqr5h5ha9n3m3', '1613251415'),
(205, '77t8mukbpgj8rmouu74al9qu60', '1613259982'),
(206, 'bhtpcs3buoiu4qj4rf0o45f4o5', '1613266388'),
(207, 'tjah6mckr7loskp9j1a44geq44', '1613289454'),
(208, 'h8shvat7qtukbka9vkshv612i2', '1626765689'),
(209, 'iun4gp27nrhjodt75m6atocku0', '1626788077'),
(210, 'vdihrtto702ma14dvj6497j3i8', '1626853121'),
(211, 'dp68rphe60ertho8v0fq8q3nml', '1626878352'),
(212, '0r8c1j57e0im20itlai6sdiqd1', '1626987103'),
(213, 'fsi8re28qq9tcnm1ph6bcb6fqb', '1627044505'),
(214, 'adhedn6akige4cpgvi2t1q6hff', '1627032205'),
(215, '9t37379l76idduthb5arpenv08', '1627032157'),
(216, '5ulq3nmb3fbmqccchd7sl3bkcs', '1627033272'),
(217, 'q0f4e8300pijvfjieluluhh6iq', '1627112899'),
(218, 's4iimginchu9d7m3v9q595jhs8', '1627125320'),
(219, 'am9t539vo72ee2gbrn4d0sla43', '1627131762'),
(220, 'ber1sapeq1it05t8dj0t000n7b', '1627199101'),
(221, 'p7e0o91g0sm99qfvda281qqkq8', '1627748300'),
(222, 'bpfu2v5goq60jj6j4d42ds3o77', '1627800853'),
(223, 'bg4mrssqifr6jtvtuq66hn7oug', '1627808527'),
(224, '1ig3g0e36jhi40o8kivbtd62o5', '1627836003'),
(225, 'gq2f9f39vk89mtuleoivjs8lf4', '1627894653'),
(226, 'dhmf50o4noungeaocl124tpbg7', '1627908518'),
(227, 'divvlr634n38b7t150qgmlm8ng', '1627911033'),
(228, 'bfvhqj17d7nsmop1mambhtkldq', '1627931867'),
(229, '7v7l6d1ku0kspc738aasfneosh', '1627976387'),
(230, '21afpmo334cige72lnf1cr6jim', '1627978364'),
(231, '6ns9sjrsvc5d37bah7hl5s8u6f', '1627993860'),
(232, 'ad89619302if7i69bo2ngmebd6', '1627987080'),
(233, 'esfih77lidroeui6uk8uk1f9mj', '1627994764'),
(234, '4qgohbrtt7n3mmp4f9i9a2g6ab', '1627996407'),
(235, '6prnkfnk9nvnlpv6m6ajc0em1g', '1627995037'),
(236, 'bubruntdnh08r1l3oo2ag032c1', '1628008803'),
(237, '0gvhj9gkkduqss5ta9oo0f8j72', '1628066058'),
(238, 'k32amlh7l07hkkmg2r8tpf14hd', '1628046259'),
(239, 'pkdta2pj19siurl1aji17dc6v0', '1628045657'),
(240, 'fpjh31lnb9ipji6skssf6snnkh', '1628045659'),
(241, '5vdriqhkh8n5q38nc740b527cc', '1628069930'),
(242, '0oo35j2c7ud51uj297k23s86li', '1628070015'),
(243, 'gt860jd12ja7o9pc8bqc9v4bug', '1628079631'),
(244, 'icn4f88d2g8tp8akvr9lvtn90n', '1628079631'),
(245, 'mgfc0sqkmgbgus0sqe98neo6qg', '1628080227'),
(246, '7472um5t14evt7asfkel5tqbca', '1628079635'),
(247, 'rsld42h9u628a6593ijvfmb7l2', '1628080162'),
(248, 'e3f6agurh0cbevlo4dflecd8fs', '1628086379'),
(249, '55e81l4q4fons7i3cds831qfri', '1628234859'),
(250, '5f61mfbp154irkcidd71e6773t', '1628238310'),
(251, 'p76kl258efmthsmsattorr6sp0', '1628312647'),
(252, '1ltgkhnasmfsuquv1o97pufn0i', '1628359254'),
(253, '0d39ppagj5ipoq5i6lsbsn73vt', '1628359256'),
(254, '4ardb8kt59817qvmkp0hoodsa6', '1628677799'),
(255, 'b7upnjm90spn5i5kj4d959i9cc', '1628482814'),
(256, 'p1ned2go2li235emka08t5dm1k', '1628508503'),
(257, 'i7btgm6te83oodj3hhfu490bu5', '1628570720'),
(258, 'u79c51dj6ilf1rsmqtq87anf1r', '1628595872'),
(259, 'vt3et84a9ocpgvq834e4ps9dbp', '1628602550'),
(260, 'hc0oss17bjtbu5b97bh60a51bk', '1628617001'),
(261, '6ols8nhmavg2mrdc9rrs4k30dn', '1628664182'),
(262, '3uj8k0jre72ei2r5j8k06tup0q', '1628821834'),
(263, 'kkn2v663lgcb0jcnv73pe4l6j2', '1628992221'),
(264, '3nncsdiur2f0v7a1oe7a88apmt', '1629035388'),
(265, 'an0dcjoe2s4ebf7mitnf6nicga', '1629281453'),
(266, 'sbju5ecubko114gma556gmuqje', '1629131815'),
(267, '5b2m10qjqm1eeqp17uivc64o8c', '1629131817'),
(268, 'vrjt1f0ulop1moeldn3mrulkc4', '1629352575'),
(269, 'tdqbfigr9nfcvvce01h8q24334', '1629356709'),
(270, 'v071457vu370nvs7kr9opdvflv', '1629378662'),
(271, 'qdrlb7foe4t2bq56gj5d2e3h38', '1629424342'),
(272, 'h17mej1fqecnbqeg6bg0e48qng', '1629387433'),
(273, 'jf22ffa30f7ap7og80tfimna5v', '1629441725'),
(274, 'pq0keci8ucud9g9q8i8a4dak1i', '1629505458'),
(275, '1pn0f9bj9ofcej3spbvfn3vad1', '1629530795'),
(276, 'tmac785qkskuib9qojmdqrkh58', '1629711988'),
(277, 'ga3jk9gq8ds6euhcfobpobj67g', '1629712170'),
(278, 'aa47stkof0n80h9b952sldogcn', '1629893577'),
(279, 'defs19lsbd4vmepcm3gcfs4p29', '1629819257'),
(280, 'jd976kebuf6aeo1psgk2sl7c4q', '1629825463'),
(281, '3jtofhpbgkcjvckfi5qep8nhn8', '1629826922'),
(282, '755f8pnh9plmnv9mrskj6veqce', '1629874075'),
(283, '3dmaclklaqdkp92170rcqqjj6g', '1630539474'),
(284, '95ks4skksk788an0l6u3dgg5au', '1629985634'),
(285, 'oc4fo7g6t2to8vhijj12tftqjp', '1630135458'),
(286, 'fv4jr95shs2sjh0esk3qsg9m47', '1630144439'),
(287, 'pf7areimes1lljq1tf1hufksaf', '1630146717'),
(288, 'p8tmj771vt80vrq0baccrkimkm', '1630158306'),
(289, 'bv4i4ge7q9qooqbfhcdb74j21i', '1630169347'),
(290, 'q5vn6kuldhjkn41tfjt6spjmnn', '1630212654'),
(291, 'r50je38m1cebhaio5ihd867ctd', '1630239675'),
(292, '5bct7apvseme1127i4u8ukv1ev', '1630238369'),
(293, '697o1vj99inqi82gclr0b6qomg', '1630238086'),
(294, 'va22eharc596h5ehgloplgdbgv', '1630238437'),
(295, 'umvbl1e6h9285hdh26o9c0dqhq', '1630241723'),
(296, 'beq07vsa8s1nren5i6d377o1r0', '1630244520'),
(297, 'i3pi2e3fh3u4rno665eteakn0i', '1630245443'),
(298, 'kpgrhfgf099di82u8fbdvb8a4f', '1630245451'),
(299, 'c5jok4v3nsecnv9ugnflqnlte0', '1630245463'),
(300, '1dmh3utl0qun0v4c5m7kb6rgvu', '1630252296'),
(301, 'rqp0u9kb6lpknuhrapamfpt7hl', '1630288296'),
(302, 'tmjk3l40fadkrddj9tk5j7f2fl', '1630508174'),
(303, '6iok768gj5dfp7fmgmfvoukqci', '1630509825'),
(304, 'la4erm9griv5rdv9vjq6nuc4pq', '1630509796'),
(305, 'cqa0sjac2gerk0rdea15p6evft', '1630770175'),
(306, '6davaui34l9a95btg7f8tmtku1', '1630972864'),
(307, 'j7go16fcq9godjnlokmhi79mtd', '1631033280'),
(308, '91emalkhdopcgtuqgu3g5lu07n', '1631715029'),
(309, 'e22r4dgieu4o89ot3kjh6g357d', '1631254136'),
(310, '8sac04ooicfc5v342uf0i2hbot', '1631254136'),
(311, 'ajg31puuvfhqbln3amjb1pouja', '1631285752'),
(312, 'vprso9dl1eut8oqqdqfvfu2bml', '1631327441'),
(313, '5b0518co6o5vjtrdkbhljtvlmr', '1631584270'),
(314, '4680hnio616btj221v6ighcl77', '1631715264'),
(315, 'ducm0lat8tjfpf9jl44gp689pr', '1631761588'),
(316, '9gub26nvhim0dgdvjd5l1vpd8f', '1631777375'),
(317, 'qo5n4t72pbag64idktiljmrbqk', '1631813022'),
(318, 'u1la3fpd93kkj4nuhimmke0nkf', '1631797340'),
(319, 'sts6qksnbkaqcrgb3rt93ic7pp', '1631807241'),
(320, 'pl42mf2mv05vl646mfri0n6qi7', '1631924779'),
(321, 'lmvm7e1nf492juhke151lsfbpi', '1631868492'),
(322, 'sprqora576t312kag7qnghfbv6', '1631882248'),
(323, 'nsko7mj1sirau579blve31de8g', '1631884499'),
(324, 'spclfqd65fbs3me7j0pkbokmkk', '1631921613'),
(325, 'fe1mtbg5dkdc43i8sdcd1lh1q6', '1631924953'),
(326, 'nndkutmli86csvt2c8n3mf9j1h', '1632111833'),
(327, 'almc5aj29mv50ln1gu9u7gtmcd', '1631925145'),
(328, 'ae92uog4il39chnl03fp75ft6f', '1631926379'),
(329, 'aabbtdosftsqfjafoi5g21mcng', '1631934271'),
(330, 'm3mls9fpjov52be83c43mkubvr', '1631936212'),
(331, 'e4mrhtsb6i2010t19ueg6taana', '1631937007'),
(332, '2loep57a974fan033bvisaa7ot', '1631942328'),
(333, 'ger4u4h412lbln29j4n57j5ieh', '1631942949'),
(334, '28ldh0vuk3nap6p8bd9pmm4ilv', '1631947107'),
(335, '5kh8cp2o8on6prehneuqm16gdf', '1631962136'),
(336, '1s7c9f2p48a430o3d0dbupiu5n', '1631962142'),
(337, 'u4fqrt5fv4kgnm94l1m7gnli6u', '1631962480'),
(338, '1af5njkt0ejq7e3u9kp60qqeie', '1631987204'),
(339, '65kk8fhmockunhhvm7fqshejre', '1632035923'),
(340, '49gtvrpqevn29n5hlqctt47mmq', '1632039799'),
(341, '9mlgkfslg15g7hfd7kdg0hulf6', '1632110265'),
(342, '076et9qsmq78jtf77qkh0h0mbo', '1632156768'),
(343, 'tsoivc19map550ggnng8umup8s', '1632159461'),
(344, 'f20u1a62b8369a76r1r6uco9bv', '1632163911'),
(345, '5pf2k563edcdjqn4ke1197qtfl', '1632165617'),
(346, 'i30ctvrpoa9m1ppt3gboce16in', '1632210933'),
(347, 'f2lubl9l2m76emai4iiq0rv288', '1632212774'),
(348, '1tiadgalnaqtgp89gocc3e9vuc', '1632238594'),
(349, 'i21n9b43hiuccj3ggn6h8lk70j', '1632331462'),
(350, '9ctn3gjr68k7v7b0nlvkitnd24', '1632331730'),
(351, '80572ik8ddhrdoi9h418rd7l8k', '1632397348'),
(352, 'ak9qh816sct250bl0igbkuic5m', '1632452042'),
(353, 'vnr1e1226om2lbt0atias9jlj9', '1632453231'),
(354, 'sahirlv31i13r9s5vkr4s8ocl6', '1632499527'),
(355, 'ougbk7u1f7j24dt3o3qhdg9tm9', '1632505665'),
(356, 'cj6621j027lno6fijlh19p385m', '1632663587'),
(357, 'lk0qbd1poasnd78rs5dtlnj5ql', '1632665324'),
(358, '796g0btsla3a9aa2hjh0q19tl7', '1632667410'),
(359, 'ranve4o01snin4v91lm6n0psnr', '1632701571'),
(360, 'pnpgdt26h057824lejhhb902vv', '1632709136'),
(361, '1343oaqnjb2gb3pfsi0r3o93lb', '1632715236'),
(362, '9tiss3jtl6a44c3b41tsv54itq', '1632723253'),
(363, 'ng04f7alnprq5lchdu3le3tahf', '1632723250'),
(364, 'k0njg0h7oiqhac5d6j7fchprgi', '1637523026'),
(365, '4u5atq4hultrqo7q9bkpc9cs70', '1637564394'),
(366, 'oh4grt555h65me0p72tu82f9q3', '1637566139'),
(367, 'be4t2422rgdvdcgoa1ioi1j790', '1637596971'),
(368, 'elkvh1p4fpamdvstcp4b1cspc6', '1637606897'),
(369, 'jttek69jf4d8jdh86e38bl0t0l', '1637657108'),
(370, 'ag2k6g2dacca2oqsj39ob5ihmk', '1637676976'),
(371, 'u7c19cf8cvkcgqj2vt2b0bgihu', '1637868502'),
(372, 'dslt1mdvqpj306h27ko08ij31a', '1637917217'),
(373, 'p9p0lp4a075rmdko6pe5mrfpr1', '1637950609'),
(374, '0frv08d55aac1ucvu7isv6b8k8', '1637938112'),
(375, '3os1us1bj1tac3bonq0vcnqnlk', '1638001849'),
(376, 'eu2704qktnpf1hakds6hm578vf', '1638086745'),
(377, 'rbv05rl9bjjcuf9t5re8q9j5di', '1638196473'),
(378, 'rosaqc2oj7hgk5824c85pn2kj9', '1638212053'),
(379, 's7e0sfv8scrtcilokt6crgulks', '1638260131'),
(380, 'i886mhkh96j6cqntg0h3pr7g0s', '1638347375'),
(381, 'ijjmo0ho571u83klp0k59j6vnl', '1638366927'),
(382, 'uhf3u55cli417acr26ma194cof', '1638368794'),
(383, 'ili6e2ae45n2e7saa8v6ld943t', '1638367978'),
(384, '6kjkgv9ov745kp7kkh5bgiieq2', '1638368301'),
(385, '7mkev5v357r15u2v71nar57bk0', '1638368346'),
(386, 'uh9qrg70griqeqrmu0fgnj0lbt', '1638368783'),
(387, '86ka20n7clq5vuaim7pidc41eh', '1638369285'),
(388, 'bgs4gkqf9j2g6tifb99kn7ujhj', '1638369386'),
(389, '6lb7jsi53h3m138hrafjdnn9r5', '1638371494'),
(390, 'b454h4qdikpjr8r4e6gj4lc6ha', '1638371656'),
(391, 'nct5k7oatld7gpltqh5a8upo4e', '1638375201'),
(392, 'cnoage1anpkq9b1i1ds9up783m', '1638375691'),
(393, '54l97i9shtrf17ogdg2nd7tsfp', '1638376418'),
(394, 'fsu51skadoqgla6dgnrpi4jsbe', '1638377045'),
(395, 'q2mg8o3721v6koggqdvcmr41ul', '1638377122'),
(396, 'q456qnhg0bf4qofroihivqqquk', '1638381320'),
(397, 'onmq464smid9ob6n0sfv6clsne', '1638410874'),
(398, 'gv4ij732vgcd9842up46rved4u', '1638430571'),
(399, 'aqfha0u9onl9splr8ebpm38a4k', '1638522782'),
(400, '5k271d8pns0s5duqm1crif26g6', '1638535720'),
(401, 'cnc6o0t2ip25sgg0ei5jamkvd1', '1638430927'),
(402, '1iudr5u8p48llscrb8qs309u50', '1638430935'),
(403, '360135bsa7bb8fvekpaigd18mg', '1638435545'),
(404, 'jrbubjqikp3gpcbqrsapmii9mr', '1638431635'),
(405, '403vqcib1dre2cstggrlpst5lj', '1638431638'),
(406, 'av7590anr4gevhi0pgbinjbvtb', '1638431645'),
(407, 'ot0uus5gcffgd70gbggc7pr9uh', '1638431647'),
(408, 'eoq7c3mmhci9jo624re40aphev', '1638431648'),
(409, 'i5kbschojv2f6344ohvf5otkm8', '1638431649'),
(410, 'shrgv5g71qk8t148vqv4r7keq1', '1638431870'),
(411, '860mgk5el8v8pirpkio1dl8jpn', '1638431870'),
(412, '3unl2d7vfi2rd9oiht8qdib0lr', '1638433789'),
(413, 'fr7j2b2k9o5dk86ab896brc5pm', '1638441840'),
(414, '67ropi3titc9uapa85ej918opn', '1638447296'),
(415, 'ici2ih7cd18jkuq0r7ev00litd', '1638468931'),
(416, 'f6s8gdrh17qr6cfh2f3r866htc', '1638454957'),
(417, 'hk5f94e3i1gl1psu5fbu4hpuql', '1638458096'),
(418, 'ct8525sei2s9eijblfb2r3i1ag', '1638458127'),
(419, '96i87vqtsv40au45j2okjvn33n', '1638464604'),
(420, 'lss1cbcie41hfougi36gvovbd6', '1638473429'),
(421, '37a700jlu8ac070m1pndcj9gb3', '1638474037'),
(422, 'of6grucea4ru8lhs3bik35pvcl', '1638474093'),
(423, 'ldokp709s14usj71luci1b2tqp', '1638482048'),
(424, 'ophgvlq70rhul9fjor9qumh62h', '1638482057'),
(425, 'mpfdtdrthmh02fuvmrke5o10ec', '1638482311'),
(426, 'i5ccvlq6cls06cppkns0ahjd76', '1638483695'),
(427, 'tc2jdtod1hqi99n1qn0d4qeh3b', '1638484202'),
(428, '9l3imf9d6iego35naj0e2g0sgh', '1638487857'),
(429, '00o1lfslgokj0npbucelnuiuiv', '1638488976'),
(430, '090t42c13bh8ctv7p01r3gd7t1', '1638490950'),
(431, 'cp5b2lr6vf6quc3c8tepiujk0s', '1638493650'),
(432, '4ul1osr4cic6d8qv1elr07127u', '1638503178'),
(433, 'h30rm3sbtsamr84iu4dksiefcb', '1638503211'),
(434, 'p7ffic4omanb8ovlsor41tp5su', '1638503753'),
(435, '6l39f70ghjokfn8dp550e438e7', '1638506130'),
(436, 'jjb1l9gqp55pt57qrcrte7g05o', '1638506396'),
(437, '7hbvflcd541crpnm6p8qplgnqg', '1638510036'),
(438, 'j1merqpateu58niff7845eo39j', '1638511175'),
(439, 'egpq9muj2tqlbq5d0o2a2k5peh', '1638516145'),
(440, '7lk7clfm95okvflaffj1g90k8u', '1638517491'),
(441, 'i8q9c6eqkorh4qtninituab827', '1638523231'),
(442, '50s0na853gj5vn48qpilsm0no0', '1638522743'),
(443, 'b8mkl4aop0c3mm9c6r4enals67', '1638522736'),
(444, 'hvv8ld52vg9mo9lrojpgppf69f', '1638526707'),
(445, '1h2fevc4k62oup904utts0cohk', '1638526755'),
(446, 'bi16a0pnfo47dfhd2ug184nmrl', '1638534226'),
(447, '27fd4ba89ag0i1urvnkknivq8g', '1638533525'),
(448, 'pn3pau4ibl655tc5kqb63ot7aj', '1638532724'),
(449, 'jjkmd6m4ekivdvpa75lnntb25d', '1638532729'),
(450, '87b95b7nskf8igdu5uiftf058p', '1638532780'),
(451, 'duihrl61ftvsvns240na7r9cor', '1638532920'),
(452, 'lbbgovlp7512h7mtnnedn22p8s', '1638533111'),
(453, '449g0n1u18si70suekolqc29rc', '1638533226'),
(454, '178c3s8qcqaajeodqmimn2lmaj', '1638533405'),
(455, 'b2noj2219f1vvhu8daadln42sq', '1638533143'),
(456, '1p0eme109cqa6lecoka2kiuvml', '1638533145'),
(457, 'f03shtia2glgmhb03sfjpnsqeq', '1638533272'),
(458, '6glmn0rhbcj1ne5gm52lbnhll6', '1638533429'),
(459, 'cqijv622bqk6k7ir66pn2lvi7e', '1638533444'),
(460, 'qth8f8j7sigmbovbmq0f7oupen', '1638533447'),
(461, 'oqphag9448d16e9mcb7ko8pdjn', '1638533450'),
(462, 'r1p6f1toq2jjmfsi6g6fi9h4k0', '1638534043'),
(463, '867ho499o8t2kdoj3egeqbenp0', '1638535234'),
(464, 'b66b7mrhh9o7p6jduiv3ca0qja', '1638534224'),
(465, 't9vsqfve6tm6bacc2qhlh4em5v', '1638535737'),
(466, '6c886ml2q5bq0v8abqqlkhljru', '1638538408');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_list_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `order_list_member_id` int(11) DEFAULT NULL,
  `order_list_price` int(11) NOT NULL,
  `order_list_product` int(11) DEFAULT NULL,
  `order_list_p_price` int(11) DEFAULT NULL,
  `order_list_amount` int(11) NOT NULL,
  `order_list_time` time NOT NULL,
  `order_list_date` date NOT NULL,
  `order_list_status` int(50) NOT NULL DEFAULT 1,
  `order_list_package` varchar(100) DEFAULT 'รอการจัดส่ง',
  `order_list_weight` int(11) DEFAULT NULL,
  `order_list_member_name` varchar(255) DEFAULT NULL,
  `order_list_member_email` varchar(255) DEFAULT NULL,
  `order_list_member_address` varchar(255) DEFAULT NULL,
  `order_list_member_zipcode` varchar(255) DEFAULT NULL,
  `order_list_member_phone` varchar(255) DEFAULT NULL,
  `order_list_p_name` varchar(255) DEFAULT NULL,
  `order_list_p_detail` varchar(255) DEFAULT NULL,
  `order_list_p_link` varchar(255) DEFAULT NULL,
  `order_list_who_id` int(11) NOT NULL DEFAULT 1,
  `order_list_cash_on_name` varchar(1000) DEFAULT NULL,
  `notification_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_list_id`, `order_list_member_id`, `order_list_price`, `order_list_product`, `order_list_p_price`, `order_list_amount`, `order_list_time`, `order_list_date`, `order_list_status`, `order_list_package`, `order_list_weight`, `order_list_member_name`, `order_list_member_email`, `order_list_member_address`, `order_list_member_zipcode`, `order_list_member_phone`, `order_list_p_name`, `order_list_p_detail`, `order_list_p_link`, `order_list_who_id`, `order_list_cash_on_name`, `notification_id`) VALUES
(00001, NULL, 7000, 7000, 0, 1, '01:14:38', '2021-12-03', 2, 'รอการจัดส่ง', 0, 'ทดสอบ การสั่งซื้อ', 'apidoh.co@gmail.com', '59/9', '999999', '0947644444', 'ส่งฟรี.', NULL, '', 2, 'โอนเงิน', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_list_status`
--

CREATE TABLE `order_list_status` (
  `order_list_status_id` int(11) NOT NULL,
  `order_list_status_name` varchar(100) NOT NULL,
  `order_list_status_sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list_status`
--

INSERT INTO `order_list_status` (`order_list_status_id`, `order_list_status_name`, `order_list_status_sort`) VALUES
(1, 'รอชำระเงิน ', 3),
(2, 'รอตรวจสอบ ', 4),
(3, 'ชำระเงินแล้ว ', 5),
(4, 'ยกเลิกรายการสั่งซื้อ', 2),
(5, 'ลบรายการสั่งซื้อ', 1),
(7, 'กำลังจัดส่งสินค้า', 6),
(8, 'จัดส่งสินค้าแล้ว', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_list_who`
--

CREATE TABLE `order_list_who` (
  `order_list_who_id` int(11) NOT NULL,
  `order_list_who_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list_who`
--

INSERT INTO `order_list_who` (`order_list_who_id`, `order_list_who_name`) VALUES
(1, 'ไม่ได้เป็นสมาชิก'),
(2, 'สมาชิก');

-- --------------------------------------------------------

--
-- Table structure for table `or_product`
--

CREATE TABLE `or_product` (
  `or_product_id` int(11) NOT NULL,
  `order_list_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `or_product`
--

INSERT INTO `or_product` (`or_product_id`, `order_list_id`, `product_id`, `product_amount`) VALUES
(1, 1, 143, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE `pagecontent` (
  `pagecontent_id` int(11) NOT NULL,
  `pagecontent_name` varchar(100) NOT NULL,
  `pagecontent_review` longtext NOT NULL,
  `pagecontent_update` datetime NOT NULL,
  `pagecontent_review_eng` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontent_id`, `pagecontent_name`, `pagecontent_review`, `pagecontent_update`, `pagecontent_review_eng`) VALUES
(1, 'home', '', '2019-11-11 21:23:51', ''),
(2, 'aboutus', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://kritsadacurtain.com/cloud/store_photos_img/1103224084logo.png\" style=\"height:200px; width:200px\" /></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:20px\">กฤษฎา ผ้าม่าน (ช่างรัตน์)<br />\r\n62/125 หมู่บ้านพระปิ่น3 ซอยลุงพร้อม 2 ต.บางแม่นาง ตำบล บางม่วง อำเภอบางใหญ่ นนทบุรี 11140<br />\r\n&bull;จำหน่ายผ้าม่าน ออกแบบ ติดตั้งผ้าม่าน แบบต่างๆ เช่น ม่านตาไก่ ม่านจีบ ม่านพับ ม่านจีบรางโชว์ ม่านกล่อง ม่านน้ำตกหรือม่านระย้า ม่านหลุยส์ ม่านสกายไลท์ ม่านคอกระเช้า ม่าบาหลี ม่านตามแบบ<br />\r\n&bull;มีผ้าให้เลือก ผ้าทึบ ผ้าโปร่ง ผ้าUV ผ้ากันแสง กันกันแดด Blackout Dim out ผ้าฝ้าย ผ้าไหมโพลีเอสเตอร์ ผ้าโปร่งแบบปักลาย พิมพ์ลายพื้นเรียบ ผ้าพื้นสี ผ้าบุเฟอร์นิเจอร์ ผ้ากันน้ำ ผ้ากันไฟลาม &nbsp;<br />\r\n&bull;จำหน่ายและบริการติดตั้ง มู่ลี่ไม้ ไม้แท้ รามินและบาสวูดโฟมวูด อลูมิเนียม ม่านม้วน แชงกรีล่า ม่านม้วนเมจิกสกรีน ม่านไม้ไผ่ ม่านปรับแสง ดิมเอ้าท์ Dim out แบล็คเอาท์ Black out &nbsp;ซันสกรีน Sun Screen ม่านปรับแสงพีวีซี ม่านปรับแสงอลูมิเนียม&nbsp;<br />\r\n&bull;จำหน่ายอุปกรณ์ม่าน รางม่าน รางประดับ รางสกายไลท์ รางม่านพับ รางอลูมิเนียม สายรวบม่าน ตะขอเกี่ยว สายรวบม่าน ชายครุย ด้ามจูงผ้าม่าน อุปกรณ์ผ้าม่าน รับซักผ้าม่าน<br />\r\n&bull;จำหน่าย ติดตั้งวอลเปเปอร์</span><br />\r\n&nbsp;</p>\r\n', '2021-02-02 21:03:42', ''),
(3, 'contactus', '<p><span style=\"font-size:22px\">กฤษฎา ผ้าม่าน (ช่างรัตน์)</span></p>\r\n\r\n<p><span style=\"font-size:22px\">โทร.081-989-9837 , 082-674-5947 </span></p>\r\n\r\n<p><span style=\"font-size:22px\">62/125 หมู่12 หมู่บ้าน พระปิ่น3 </span></p>\r\n\r\n<p><span style=\"font-size:22px\">ต.บางแม่นาง อ.บางใหญ่ จ.นนทบุรี 11140 </span></p>\r\n\r\n<p><span style=\"font-size:22px\">เลขที่การค้า : 3201000031961</span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-12-01 14:04:57', '');
INSERT INTO `pagecontent` (`pagecontent_id`, `pagecontent_name`, `pagecontent_review`, `pagecontent_update`, `pagecontent_review_eng`) VALUES
INSERT INTO `pagecontent` (`pagecontent_id`, `pagecontent_name`, `pagecontent_review`, `pagecontent_update`, `pagecontent_review_eng`) VALUES
(12, 'tagfooter', '<p>จำหน่ายผ้าม่าน ออกแบบ ติดตั้งผ้าม่าน แบบต่างๆ เช่น ม่านตาไก่ ม่านจีบ ม่านพับ ม่านจีบรางโชว์ ม่านกล่อง ม่านน้ำตกหรือม่านระย้า ม่านหลุยส์ ม่านสกายไลท์ ม่านคอกระเช้า ม่าบาหลี ม่านตามแบบ</p>\r\n', '2021-02-02 20:46:06', ''),
(13, 'bottom-menu', '<p>ร้านขายอาหาร วัตถุดิบ คีโตเจนิก และอาหารลดเบาหวาน ลดน้ำหนัก</p>\r\n\r\n<p>ร้าน ketohousekorat 256/21 ถนนยมราช ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000 โทร 0855451636</p>\r\n\r\n<p>https://maps.app.goo.gl/8BUThMUh7bJ5rk2F7</p>\r\n\r\n<p>Korat, Thailand</p>\r\n\r\n<p>Call 085 545 1636</p>\r\n\r\n<p><a href=\"mailto:ketohousekorat@gmail.com\">ketohousekorat@gmail.com</a></p>\r\n', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_list_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `payment_price` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `payment_photo` varchar(500) NOT NULL,
  `payment_now` datetime NOT NULL,
  `account_id` int(11) NOT NULL,
  `notification_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_list_id`, `payment_price`, `payment_date`, `payment_time`, `payment_photo`, `payment_now`, `account_id`, `notification_id`) VALUES
(48, 00001, 0, '2021-12-03', '01:15:30', '114325398740242474.jpg', '2021-12-03 01:15:30', 29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `portage`
--

CREATE TABLE `portage` (
  `portage_id` int(10) UNSIGNED NOT NULL,
  `portage_name` varchar(100) DEFAULT NULL,
  `portage_detail` varchar(1000) DEFAULT NULL,
  `portage_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portage`
--

INSERT INTO `portage` (`portage_id`, `portage_name`, `portage_detail`, `portage_link`) VALUES
(25, 'ส่งฟรี.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(1000) DEFAULT NULL,
  `product_price` int(11) NOT NULL DEFAULT 0,
  `product_code` varchar(1000) DEFAULT NULL,
  `product_detail` varchar(1000) DEFAULT NULL,
  `product_photo` varchar(1000) DEFAULT NULL,
  `product_review` text DEFAULT NULL,
  `product_amount` int(11) NOT NULL DEFAULT 0,
  `product_datetime` datetime DEFAULT NULL,
  `product_sizetext` varchar(500) DEFAULT NULL,
  `product_status_id` int(11) NOT NULL DEFAULT 1,
  `product_search` varchar(2000) DEFAULT NULL,
  `product_sort` int(11) NOT NULL DEFAULT 0,
  `product_pixel` text DEFAULT NULL,
  `product_weight` int(11) NOT NULL DEFAULT 0,
  `brand_name` varchar(1000) DEFAULT NULL,
  `catalog_name` varchar(1000) DEFAULT NULL,
  `recommend_name` varchar(1000) DEFAULT NULL,
  `proportion_name` varchar(1000) DEFAULT NULL,
  `product_cost` text DEFAULT NULL,
  `product_wholesale` text DEFAULT NULL,
  `product_note` text DEFAULT NULL,
  `collection_id` int(11) NOT NULL DEFAULT 0,
  `catalog_id` int(11) DEFAULT 0,
  `product_name_eng` varchar(500) DEFAULT NULL,
  `product_detail_eng` varchar(2000) DEFAULT NULL,
  `product_review_eng` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_code`, `product_detail`, `product_photo`, `product_review`, `product_amount`, `product_datetime`, `product_sizetext`, `product_status_id`, `product_search`, `product_sort`, `product_pixel`, `product_weight`, `brand_name`, `catalog_name`, `recommend_name`, `proportion_name`, `product_cost`, `product_wholesale`, `product_note`, `collection_id`, `catalog_id`, `product_name_eng`, `product_detail_eng`, `product_review_eng`) VALUES
(1, 'เป็นไอเทมที่ขาดไม่ได้ในตู้เสื้อผ้าของคุณ', 400, '', '', 'product_photo237732064.jpg', '', 0, '2021-01-09 14:09:14', '', 3, ' เป็นไอเทมที่ขาดไม่ได้ในตู้เสื้อผ้าของคุณ   เป็นไอเทมที่ขาดไม่ได้ในตู้เสื้อผ้าของคุณ', 0, NULL, 0, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(2, 'ชื่อสินค้า', 9999, '', '', 'product_photo798301235.jpg', '', 0, '2021-01-09 19:57:12', '', 3, NULL, 0, NULL, 0, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(3, 'ALDO', 1043, '', 'Light Pink WOMEN WALLET ON A CHAIN GALALIVETH-680 PINK', 'product_photo975913342.webp', '<p>กระเป๋าสตางค์ผู้หญิง GALALIVETH-680<br />\r\nทางบริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนสินค้า แต่สามารถคืนสินค้าได้<br />\r\n- ลักษณะหนังอัดลาย<br />\r\n- ผลิตจากวัสดุสังเคราะห์<br />\r\n-ความยาวสายกระเป๋า 17.5x8,5x2.5 cm</p>', 22, '2021-01-14 14:00:17', '', 3, NULL, 0, NULL, 2000, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(4, 'Tommy Hilfiger', 1990, '', 'ICONIC LOGO CARD HOLDER AW0AW09025 BLACK', 'product_photo1357429991.webp', '<p>&bull; สี : ดำ<br />\r\n&bull; โอกาสที่สวมใส่ : ลำลอง<br />\r\n&bull; เหมาะกับกิจกรรม : ทั่วไป<br />\r\n&bull; ไซส์ : 10 x 0.5 x 7.5cm<br />\r\n&bull; เพศ : ผู้หญิง<br />\r\n&bull; อายุ : ผู้ใหญ่<br />\r\n&bull; วิธีดูแลรักษา : เช็ดทำความสะอาดด้วยผ้าหรือฟองน้ำชุบน้ำหมาดๆ</p>', 15, '2021-01-14 14:00:22', '', 3, NULL, 0, NULL, 100, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(5, 'Tommy Hilfiger', 1990, '', '', 'product_photo1265040207.webp', '', 37, '2021-01-14 14:00:32', '', 3, NULL, 0, NULL, 100, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(6, 'Tommy Hilfiger', 2900, '', '', 'product_photo1978017939.webp', '', 5, '2021-01-14 13:59:20', '', 3, NULL, 0, NULL, 100, ' ', ' ', ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(7, 'กระเป๋าสตางค์ COACH F41302 SMALL TRIFOLD WALLET IN SIGNATURE CANVAS (IME74) Color: IM/KHAKI/SADDLE 2', 6000, '', 'COACH', 'product_photo2054287216.webp', '', 0, '2021-01-19 19:40:12', '', 3, NULL, 7, NULL, 200, ' ', NULL, ' ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(8, 'TH SEASONAL MED SLIM WALLET AW0AW08918 MULTI COLOR', 2990, '', 'Tommy Hilfiger', 'product_photo2003433602.webp', '', 0, '2021-01-19 17:33:01', '', 3, NULL, 12, NULL, 100, ' ', NULL, ' ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(9, 'Th Seasonal Slim Walllet AW0AW08917 MULTI COLOR', 3590, '', 'Tommy Hilfiger', 'product_photo1047734540.webp', '', 15, '2021-01-19 19:40:27', '', 3, NULL, 6, NULL, 100, ' ', NULL, ' ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(10, 'Poppy Med Za Corp AW0AW08911 NAVY BLUE', 2250, '', '• สี : กรมท่า', 'product_photo1841090840.webp', '', 3, '2021-01-19 17:36:02', '', 3, NULL, 9, NULL, 100, ' ', NULL, ' ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(11, '123', 123, '', '', 'product_photo1260119875.JPG', '', 0, '2021-01-17 14:00:34', '', 3, NULL, 0, NULL, 0, ' ', NULL, ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(12, 'กระเป๋าคาดอก', 13900, '9999', 'COACH 78777 WARREN BELT BAG IN SIGNATURE CANVAS Charcoal Black สีดำ', 'product_photo507954175.webp', '', 10, '2021-01-19 19:39:43', '', 3, NULL, 8, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 149, NULL, NULL, NULL),
(13, 'กระเป๋าคาดอก 1', 13903, '6', 'COACH 78777 WARREN BELT BAG IN SIGNATURE CANVAS Charcoal Black สีดำ 2', 'product_photo318508454.webp', '<p>7</p>', 4, '2021-01-18 20:14:34', '', 3, NULL, 0, NULL, 5, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(14, 'ORIGINALS Monogram Festival Bag Unisex Black FT9297', 800, '', 'ADIDAS ORIGINALS Monogram Festival Bag Unisex Black FT9297', 'product_photo840477300.webp', '<p>There&#39;s one at every festival. The friend who brings a backpack and ends up carrying everybody else&#39;s jacket, water bottle and sunscreen. Don&#39;t let it be you. Show up with this adidas bag instead. It&#39;s the perfect size for carting around your daily essentials and nobody else&#39;s.</p>', 10, '2021-01-19 17:33:46', '', 3, NULL, 11, NULL, 300, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 149, NULL, NULL, NULL),
(15, 'กระเป๋าสะพายฮัสกี้ส์', 2795, '', 'Huskies Bags กระเป๋าสะพายฮัสกี้ส์ Huskies Bags HK 02-780 BL สีดำ จัดจำหน่ายโดย: HUSKIES', 'product_photo1684830643.webp', '<p>- ผลิตจากผ้าโพลีเอสเตอร์คุณภาพดี กันน้ำได้ - ด้านหน้าออกแบบให้เห็นซิปฟันเหล็ก ดูเท่ห์ มีสไตล์ - ด้านหน้ามี 1 ช่องซิปขนาดกว้าง ที่สามารถใส่สิ่งของได้หลากหลาย - หูจับกระเป๋าหุ้มด้วยฟองน้ำ ตัดเย็บอย่างดี ทำให้นุ่มมือเวลาหิ้วกระเป๋า - ด้านหลังกระเป๋าสามารถเสียบกับคันชักกระเป๋าเดินทางได้อีกด้วย - ซับในผลิตจากผ้าโพลีเอสเตอร์ ทอลาย Huskies สีเทา แข็งแรงทนทาน - และภายในยังมีช่องแบ่งแยกใส่สัมภาระได้อีก เช่นสมุดโน๊ต, กระเป๋าสตางค์ - ด้านในของช่องซิปด้านหน้ายังมีช่องใส่มือถือ และช่องเสียบปากกา - และ มีการออกแบบเพิ่มสำหรับสายคล้องพวงกุญแจอีกด้วย - ขนาดกระเป๋า 3.5x10x14 นิ้ว / 750 กรัม</p>', 10, '2021-01-19 17:34:19', '', 3, NULL, 10, NULL, 500, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 149, NULL, NULL, NULL),
(16, 'Money Clip A', 790, '33', 'กระเป๋าใส่บัตร', 'product_photo1076411747.jpg', '', 15, '2021-02-04 19:56:41', '', 3, NULL, 1, NULL, 15, NULL, NULL, ' ', '', '', '', '', 0, 149, NULL, NULL, NULL),
(17, 'Coin pouch L', 890, '', '', 'product_photo476135583.jpg', '', 42, '2021-01-20 19:22:13', '', 3, NULL, 5, NULL, 7, NULL, NULL, ' ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(18, 'Key holder E', 120, '33', '', 'product_photo3136450.jpeg', '', 0, '2021-02-02 20:37:56', '', 3, NULL, 2, NULL, 879, NULL, NULL, ' ', '', '', '', '', 0, 150, NULL, NULL, NULL),
(19, 'Key holder B', 290, '33', '', 'product_photo1496584777.jpeg', '', 12, '2021-02-02 20:36:28', '', 3, NULL, 3, NULL, 500, NULL, NULL, ' ', '', '', '', '', 0, 150, NULL, NULL, NULL),
(20, 'Key holder C', 290, '', '', 'product_photo856986888.jpg', '', 5, '2021-01-19 17:28:13', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 150, NULL, NULL, NULL),
(21, 'Foldable wallet', 990, '', '', 'product_photo1346747606.jpg', '', 23, '2021-01-20 19:22:40', '', 3, NULL, 4, NULL, 15, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(22, '777', 777, '777', '777', 'product_photo966325273.jpg', '', 777, '2021-01-19 21:22:38', '', 3, NULL, 0, NULL, 777, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 148, NULL, NULL, NULL),
(23, 'ชื่อสินค้า ห', 9000, NULL, 'ยละเอียดเบื้องต้น', 'product_photo494191929.jpg', '', 0, '2021-02-04 13:37:32', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, NULL, NULL, NULL),
(24, 'ชื่อสินค้า (eng)', 999999, NULL, 'รายละเอียดเบื้องต้น (eng)', 'product_photo1963629346.jpg', '<p>(eng) รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด</p>', 20, '2021-07-20 20:21:29', '', 3, NULL, 0, NULL, 100, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 149, '', '', ''),
(25, 'ชื่อสินค้า', 999999, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1199834684.jpg', '<p>รายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด</p>', 20, '2021-07-20 20:22:17', '', 3, NULL, 0, NULL, 100, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 149, '', '', ''),
(26, 'ชื่อสินค้า 1', 9999993, NULL, 'รายละเอียดเบื้องต้น 2', 'product_photo1795258292.jpg', '<p>รายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด&nbsp;รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด</p>', 204, '2021-07-20 20:42:54', '', 3, NULL, 0, NULL, 1005, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 148, 'ชื่อสินค้า (eng) 1', 'รายละเอียดเบื้องต้น (eng) 2', '(eng) 3 รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด'),
(27, 'ชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1775563567.jpg', '<p>รายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมดรายละเอียดทั้งหมด</p>', 6, '2021-07-22 17:29:18', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 153, 'product', 'productproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(28, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo2079980736.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 19, '2021-07-23 02:38:21', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(29, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo44691690.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:38:43', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(30, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo915114548.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:39:18', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(31, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1575351986.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:39:34', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(32, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1202675052.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:39:40', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(33, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1677715792.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:39:49', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(34, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo2075329095.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 20, '2021-07-23 02:39:54', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(35, 'ชื่อสินค้า', 1590, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1843231632.jpg', '<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>\r\n\r\n<p>แอ๊ปเปิ้ลวอชิงตัน แอ๊ปเปิ้ลเขียว สตอเบอรี่ ส้มแมนดาริน กีวี่ สาลี่ทอง&nbsp;</p>', 19, '2021-07-23 02:40:06', '', 3, NULL, 0, NULL, 200, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 154, 'productproductproduct', 'productproductproductproductproduct', '&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;\r\n\r\n&lt;p&gt;productproductproductproductproductproductproductproductproductproduct&lt;/p&gt;'),
(36, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ งบไม่เกิน 2 ล้าน', 100000, NULL, 'แบบบ้านชั้นเดียว สไตล์คอนเทมโพรารี ที่ปรับเปลี่ยนโครงสร้างและเลย์เอาต์ให้เหมาะกับชีวิตของผู้อาศัย', 'product_photo1143123849.jpg', '<p>แบบบ้านชั้นเดียว สไตล์คอนเทมโพรารี ที่ปรับเปลี่ยนโครงสร้างและเลย์เอาต์ให้เหมาะกับชีวิตของผู้อาศัย มีพื้นที่ใช้สอยประมาณ 135 ตารางเมตร ประกอบด้วย 3 ห้องนอน 2 ห้องน้ำ ห้องครัว ห้องนั่งเล่น ห้องกินข้าว พร้อมสวนหน้าบ้าน และที่จอดรถ แม้จะเป็นบ้านหลังเล็ก ๆ แต่ก็เรียกได้ว่าสวยแถมน่าอยู่มากทีเดียว ที่สำคัญเหมาะกับคนงบน้อยที่อยากมีบ้าน เพราะใช้งบประมาณ 1.69 ล้านบาท ถือว่าเป็นบ้านชั้นเดียวที่สวยงาม มีสิ่งอำนวยความสะดวกครบครัน ในราคาที่คุ้มค่ามากจริง ๆ</p>', 10, '2021-07-25 13:50:30', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 163, 'One-story house design, 3 bedrooms, 2 bathrooms, budget not over 2 million', 'one-story house Contemporary style that modify the structure and layout to suit the lives of the residents', '&lt;p&gt;one-story house Contemporary style that modify the structure and layout to suit the lives of the residents It has a usable area of ​​approximately 135 square meters, consisting of 3 bedrooms, 2 bathrooms, a kitchen, a living room, a dining room with a front garden and a car park. Although it is a small house, it can be said that it is very beautiful and livable. Most importantly, suitable for low budget people who want to have a home. Because of the budget of 1.69 million baht, it is considered a beautiful one-story house. There are complete facilities. At a price that is really worth it.&lt;/p&gt;'),
(37, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ งบไม่เกิน 2 ล้าน', 100000, NULL, 'แบบบ้านชั้นเดียว สไตล์คอนเทมโพรารี ที่ปรับเปลี่ยนโครงสร้างและเลย์เอาต์ให้เหมาะกับชีวิตของผู้อาศัย', 'product_photo464410804.jpg', '<p>แบบบ้านชั้นเดียว สไตล์คอนเทมโพรารี ที่ปรับเปลี่ยนโครงสร้างและเลย์เอาต์ให้เหมาะกับชีวิตของผู้อาศัย มีพื้นที่ใช้สอยประมาณ 135 ตารางเมตร ประกอบด้วย 3 ห้องนอน 2 ห้องน้ำ ห้องครัว ห้องนั่งเล่น ห้องกินข้าว พร้อมสวนหน้าบ้าน และที่จอดรถ แม้จะเป็นบ้านหลังเล็ก ๆ แต่ก็เรียกได้ว่าสวยแถมน่าอยู่มากทีเดียว ที่สำคัญเหมาะกับคนงบน้อยที่อยากมีบ้าน เพราะใช้งบประมาณ 1.69 ล้านบาท ถือว่าเป็นบ้านชั้นเดียวที่สวยงาม มีสิ่งอำนวยความสะดวกครบครัน ในราคาที่คุ้มค่ามากจริง ๆ</p>', 10, '2021-07-25 13:40:34', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 163, '', '', ''),
(38, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ สไตล์โมเดิร์น', 100000, NULL, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ จาก BLACK BRUSH architect ที่ผสมผสานบ้านยกพื้นสูงแบบไทย ๆ ให้เป็นสไตล์โมเดิร์น และคุมโทนด้วยสีขาว-ดำที่ทำให้ดูทันสมัยมากขึ้น มาพร้อมที่จอดรถและสวนหน้าบ้าน ขนาดพอเหมาะสำหรับครอบครัวเล็ก ๆ มาก ๆ เลย', 'product_photo469609924.jpg', '<p>แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ จาก&nbsp;<a target=_blank  href=\"https://web.facebook.com/BLACK-BRUSH-architect-973110889553555/posts/?ref=page_internal&amp;_rdc=1&amp;_rdr\" rel=\"nofollow\" >BLACK BRUSH architect</a>&nbsp;ที่ผสมผสานบ้านยกพื้นสูงแบบไทย ๆ ให้เป็นสไตล์โมเดิร์น และคุมโทนด้วยสีขาว-ดำที่ทำให้ดูทันสมัยมากขึ้น มาพร้อมที่จอดรถและสวนหน้าบ้าน ขนาดพอเหมาะสำหรับครอบครัวเล็ก ๆ มาก ๆ เลย</p>', 20, '2021-07-25 13:49:12', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 163, 'One-story house plans, 3 bedrooms, 2 bathrooms, modern style', 'A one-storey house with 3 bedrooms, 2 bathrooms from BLACK BRUSH architect that combines a Thai-style elevated house with a modern style. and control the tone with black and white that makes it look more modern Comes with parking and a garden in front of the house. The size is perfect for a very small family.', '&lt;p&gt;A one-storey house with 3 bedrooms, 2 bathrooms from BLACK BRUSH architect that combines a Thai-style elevated house with a modern style. and control the tone with black and white that makes it look more modern Comes with parking and a garden in front of the house. The size is perfect for a very small family.&lt;/p&gt;'),
(39, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ สไตล์โมเดิร์น', 100000, NULL, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ จาก BLACK BRUSH architect ที่ผสมผสานบ้านยกพื้นสูงแบบไทย ๆ ให้เป็นสไตล์โมเดิร์น และคุมโทนด้วยสีขาว-ดำที่ทำให้ดูทันสมัยมากขึ้น มาพร้อมที่จอดรถและสวนหน้าบ้าน ขนาดพอเหมาะสำหรับครอบครัวเล็ก ๆ มาก ๆ เลย', 'product_photo1133795070.jpg', '<p>แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ จาก&nbsp;<a target=_blank  href=\"https://web.facebook.com/BLACK-BRUSH-architect-973110889553555/posts/?ref=page_internal&amp;_rdc=1&amp;_rdr\" rel=\"nofollow\" >BLACK BRUSH architect</a>&nbsp;ที่ผสมผสานบ้านยกพื้นสูงแบบไทย ๆ ให้เป็นสไตล์โมเดิร์น และคุมโทนด้วยสีขาว-ดำที่ทำให้ดูทันสมัยมากขึ้น มาพร้อมที่จอดรถและสวนหน้าบ้าน ขนาดพอเหมาะสำหรับครอบครัวเล็ก ๆ มาก ๆ เลย</p>', 20, '2021-07-25 13:50:44', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 163, 'One-story house plans, 3 bedrooms, 2 bathrooms, modern style', 'A one-storey house with 3 bedrooms, 2 bathrooms from BLACK BRUSH architect that combines a Thai-style elevated house with a modern style. and control the tone with black and white that makes it look more modern Comes with parking and a garden in front of the house. The size is perfect for a very small family.', '&lt;p&gt;A one-storey house with 3 bedrooms, 2 bathrooms from BLACK BRUSH architect that combines a Thai-style elevated house with a modern style. and control the tone with black and white that makes it look more modern Comes with parking and a garden in front of the house. The size is perfect for a very small family.&lt;/p&gt;'),
(40, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ มีระเบียงไม้หลังบ้าน', 100000, NULL, 'แบบบ้านชั้นเดียวสวย ๆ เอาใจคนชอบบ้านไม้จาก sherihaby เน้นตกแต่งด้วยโทนสีขาวและวัสดุไม้ทั้งภายในและภายนอก ทำให้บ้านหลังเล็ก ๆ หลังนี้มีบรรยากาศที่ดูกว้างขวาง สว่าง และโปร่งสบาย นอกจากนี้หลังบ้านยังมีระเบียงมุงระแนงไม้กว้าง ๆ ไว้นั่งเล่นอีกต่างหาก', 'product_photo1470045255.jpg', '<p>แบบบ้านชั้นเดียวสวย ๆ เอาใจคนชอบบ้านไม้จาก&nbsp;<a target=_blank  href=\"http://www.sherihaby.com/gable-house\" rel=\"nofollow\" >sherihaby</a>&nbsp;เน้นตกแต่งด้วยโทนสีขาวและวัสดุไม้ทั้งภายในและภายนอก ทำให้บ้านหลังเล็ก ๆ หลังนี้มีบรรยากาศที่ดูกว้างขวาง สว่าง และโปร่งสบาย นอกจากนี้หลังบ้านยังมีระเบียงมุงระแนงไม้กว้าง ๆ ไว้นั่งเล่นอีกต่างหาก&nbsp;</p>', 10, '2021-07-25 13:50:35', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 163, '', '', ''),
(41, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ มีระเบียงไม้หลังบ้าน', 100000, NULL, 'แบบบ้านชั้นเดียวสวย ๆ เอาใจคนชอบบ้านไม้จาก sherihaby เน้นตกแต่งด้วยโทนสีขาวและวัสดุไม้ทั้งภายในและภายนอก ทำให้บ้านหลังเล็ก ๆ หลังนี้มีบรรยากาศที่ดูกว้างขวาง สว่าง และโปร่งสบาย นอกจากนี้หลังบ้านยังมีระเบียงมุงระแนงไม้กว้าง ๆ ไว้นั่งเล่นอีกต่างหาก', 'product_photo1512925060.jpg', '<p>แบบบ้านชั้นเดียวสวย ๆ เอาใจคนชอบบ้านไม้จาก&nbsp;<a target=_blank  href=\"http://www.sherihaby.com/gable-house\" rel=\"nofollow\" >sherihaby</a>&nbsp;เน้นตกแต่งด้วยโทนสีขาวและวัสดุไม้ทั้งภายในและภายนอก ทำให้บ้านหลังเล็ก ๆ หลังนี้มีบรรยากาศที่ดูกว้างขวาง สว่าง และโปร่งสบาย นอกจากนี้หลังบ้านยังมีระเบียงมุงระแนงไม้กว้าง ๆ ไว้นั่งเล่นอีกต่างหาก&nbsp;</p>', 10, '2021-07-25 13:50:15', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 163, '', '', ''),
(42, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ มีครัวไทยหลังบ้าน', 200000, NULL, 'แบบบ้านชั้นเดียวสไตล์โมเดิร์น ที่ปรับเปลี่ยนให้เข้ากับอากาศเมืองไทย และกลายเป็นบ้านขนาดกะทัดรัดที่ทั้งสวยและน่าอยู่ของ คุณ Phung&#039;g Sudarat ด้านในมีพื้นที่ใช้สอยประมาณ 180 ตารางเมตร 3 ห้องนอน 2 ห้องน้ำ ครัวฝรั่ง และต่อเติมหลังบ้านเป็นครัวไทย โดยเธอและสามีเป็นคนออกแบบและซื้อของเองทั้งหมด แม้จะสารภาพว่างานหนักไม่ใช่เล่น แต่พอทุกอย่างเสร็จสมบูรณ์ ก็ทำให้ครอบครัวมีความสุขมากจริง ๆ', 'product_photo648127235.jpg', '<p>แบบบ้านชั้นเดียวสไตล์โมเดิร์น ที่ปรับเปลี่ยนให้เข้ากับอากาศเมืองไทย และกลายเป็นบ้านขนาดกะทัดรัดที่ทั้งสวยและน่าอยู่ของ&nbsp;<a target=_blank  href=\"https://web.facebook.com/phungg.sudarat?_rdc=1&amp;_rdr\" rel=\"nofollow\" >คุณ Phung&#39;g Sudarat</a>&nbsp;ด้านในมีพื้นที่ใช้สอยประมาณ 180 ตารางเมตร 3 ห้องนอน 2 ห้องน้ำ ครัวฝรั่ง และต่อเติมหลังบ้านเป็นครัวไทย โดยเธอและสามีเป็นคนออกแบบและซื้อของเองทั้งหมด แม้จะสารภาพว่างานหนักไม่ใช่เล่น แต่พอทุกอย่างเสร็จสมบูรณ์ ก็ทำให้ครอบครัวมีความสุขมากจริง ๆ&nbsp;</p>', 20, '2021-07-25 13:51:20', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 163, '', '', ''),
(43, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ มีครัวไทยหลังบ้าน', 200000, NULL, 'แบบบ้านชั้นเดียวสไตล์โมเดิร์น ที่ปรับเปลี่ยนให้เข้ากับอากาศเมืองไทย และกลายเป็นบ้านขนาดกะทัดรัดที่ทั้งสวยและน่าอยู่ของ คุณ Phung&#039;g Sudarat ด้านในมีพื้นที่ใช้สอยประมาณ 180 ตารางเมตร 3 ห้องนอน 2 ห้องน้ำ ครัวฝรั่ง และต่อเติมหลังบ้านเป็นครัวไทย โดยเธอและสามีเป็นคนออกแบบและซื้อของเองทั้งหมด แม้จะสารภาพว่างานหนักไม่ใช่เล่น แต่พอทุกอย่างเสร็จสมบูรณ์ ก็ทำให้ครอบครัวมีความสุขมากจริง ๆ', 'product_photo814424107.jpg', '<p>แบบบ้านชั้นเดียวสไตล์โมเดิร์น ที่ปรับเปลี่ยนให้เข้ากับอากาศเมืองไทย และกลายเป็นบ้านขนาดกะทัดรัดที่ทั้งสวยและน่าอยู่ของ&nbsp;<a target=_blank  href=\"https://web.facebook.com/phungg.sudarat?_rdc=1&amp;_rdr\" rel=\"nofollow\" >คุณ Phung&#39;g Sudarat</a>&nbsp;ด้านในมีพื้นที่ใช้สอยประมาณ 180 ตารางเมตร 3 ห้องนอน 2 ห้องน้ำ ครัวฝรั่ง และต่อเติมหลังบ้านเป็นครัวไทย โดยเธอและสามีเป็นคนออกแบบและซื้อของเองทั้งหมด แม้จะสารภาพว่างานหนักไม่ใช่เล่น แต่พอทุกอย่างเสร็จสมบูรณ์ ก็ทำให้ครอบครัวมีความสุขมากจริง ๆ&nbsp;</p>', 20, '2021-07-25 13:51:23', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 163, '', '', ''),
(44, 'แบบบ้านชั้นเดียว 3 ห้องนอน 2 ห้องน้ำ ตกแต่งสไตล์โมเดิร์น หน้าบ้านมีระเบียง', 199990, NULL, 'บ้านอาจไม่ใช่แค่บ้านสำหรับ คุณ Kissme Fon เพราะนอกจากเป็นที่พักอาศัยแล้วยังสามารถเปิดร้านขายของเล็ก ๆ ตามความต้องการของคุณแม่ได้ด้วย บ้านตกแต่งสไตล์โมเดิร์น ด้านนอกทาสีน้ำตาล ข้างในปูพื้นด้วยกระเบื้องลายหินอ่อน มีห้องครัวปูนเอาไว้ทำอาหารหนัก และมีห้องนั่งเล่นสำหรับพักผ่อน', 'product_photo498869125.jpg', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; บ้านอาจไม่ใช่แค่บ้านสำหรับ&nbsp;<a target=_blank  href=\"http://www.facebook.com/kissme.fon.1/posts/2006478886032047\" rel=\"nofollow\" >คุณ Kissme Fon</a>&nbsp;เพราะนอกจากเป็นที่พักอาศัยแล้วยังสามารถเปิดร้านขายของเล็ก ๆ ตามความต้องการของคุณแม่ได้ด้วย บ้านตกแต่งสไตล์โมเดิร์น ด้านนอกทาสีน้ำตาล ข้างในปูพื้นด้วยกระเบื้องลายหินอ่อน มีห้องครัวปูนเอาไว้ทำอาหารหนัก และมีห้องนั่งเล่นสำหรับพักผ่อน</p>', 20, '2021-07-25 13:52:06', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 163, '', '', ''),
(45, 'ชื่อสินค้า s', 50000, NULL, 'รายละเอียดเบื้องต้น s', 'product_photo1562482377.jpg', '<p>ads</p>', 0, '2021-08-01 14:42:39', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(46, 'ชื่อสินค้า', 0, NULL, '', 'product_photo943779703.jpg', '', 0, '2021-08-02 14:37:31', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(47, 'ชื่อสินค้า', 0, NULL, '', 'product_photo737965241.jpg', '', 0, '2021-08-02 14:37:53', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(48, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1099590743.jpg', '', 0, '2021-08-02 14:39:05', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(49, 'ชื่อสินค้า', 0, NULL, '', 'product_photo284927311.jpg', '', 0, '2021-08-02 14:39:34', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(50, 'ยางลบ 2B', 0, NULL, '', 'product_photo2144587677.jpg', '', 0, '2021-08-02 14:40:44', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(51, 'ยางลบ', 0, NULL, '', 'product_photo2019280179.jpg', '', 0, '2021-08-02 14:41:02', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(52, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1807540545.jpg', '', 0, '2021-08-02 14:41:26', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(53, 'ชื่อสินค้า', 0, NULL, '', 'product_photo2048239252.jpg', '', 0, '2021-08-02 14:41:50', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(54, 'ชื่อสินค้า', 0, NULL, '', 'product_photo533707916.jpg', '', 0, '2021-08-02 14:42:08', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(55, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1119912994.jpg', '', 0, '2021-08-02 14:42:30', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(56, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1714811381.jpg', '', 0, '2021-08-02 14:42:43', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(57, 'ชื่อสินค้า', 0, NULL, '', 'product_photo2085972448.jpg', '', 0, '2021-08-02 14:42:56', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(58, 'ชื่อสินค้า', 0, NULL, '', 'product_photo749772543.jpg', '', 0, '2021-08-02 14:43:33', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(59, 'ชื่อสินค้า', 0, NULL, '', 'product_photo48571450.jpg', '', 0, '2021-08-02 14:43:59', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(60, 'ชื่อสินค้า', 0, NULL, '', 'product_photo673449416.jpg', '', 0, '2021-08-02 14:44:23', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(61, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1936015698.jpg', '', 0, '2021-08-02 14:44:28', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(62, 'ชื่อสินค้า', 0, NULL, '', 'product_photo376363923.jpg', '', 0, '2021-08-02 14:44:39', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(63, 'ชื่อสินค้า', 0, NULL, '', 'product_photo234846503.jpg', '', 0, '2021-08-02 14:45:08', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(64, 'สี', 0, NULL, '', 'product_photo585813513.jpg', '', 0, '2021-08-02 14:45:27', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(65, 'ชื่อสินค้า', 0, NULL, '', 'product_photo68226288.jpg', '', 0, '2021-08-02 14:45:37', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(66, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1769719041.jpg', '', 0, '2021-08-02 14:45:48', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(67, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1190371162.jpg', '', 0, '2021-08-02 14:45:57', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(68, 'ชื่อสินค้า', 0, NULL, '', 'product_photo205516443.jpg', '', 0, '2021-08-02 14:46:10', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(69, 'ชื่อสินค้า', 0, NULL, '', 'product_photo418697958.jpg', '', 0, '2021-08-02 14:46:22', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(70, 'ชื่อสินค้า', 0, NULL, '', 'product_photo191980478.jpg', '', 0, '2021-08-02 14:46:50', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 171, '', '', ''),
(71, 'ชื่อสินค้า', 0, NULL, '', 'product_photo169291407.jpg', '', 0, '2021-08-02 14:47:14', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(72, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1892903192.jpg', '', 0, '2021-08-02 14:47:41', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 171, '', '', ''),
(73, 'ชื่อสินค้า', 0, NULL, '', 'product_photo576677088.jpg', '', 0, '2021-08-02 14:47:56', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 171, '', '', ''),
(74, 'ชื่อสินค้า', 0, NULL, '', 'product_photo982584618.jpg', '', 0, '2021-08-02 14:48:04', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(75, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1111320636.jpg', '', 0, '2021-08-03 02:03:11', '', 3, NULL, 4, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 170, '', '', ''),
(76, 'ชื่อสินค้า', 0, NULL, '', 'product_photo103300840.jpg', '', 0, '2021-08-02 14:48:45', '', 3, NULL, 20, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 177, '', '', ''),
(77, 'tt', 20, NULL, '', 'product_photo2116984615.jpg', '', 0, '2021-08-29 19:20:51', '', 3, NULL, 19, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(78, 'ชื่อสินค้า', 0, NULL, '', 'product_photo637669245.jpg', '', 0, '2021-08-02 14:50:03', '', 3, NULL, 18, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 177, '', '', ''),
(79, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1019519759.jpg', '', 0, '2021-08-02 14:50:11', '', 3, NULL, 17, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(80, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1235085955.jpg', '', 0, '2021-08-02 14:50:21', '', 3, NULL, 16, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(81, 'ชื่อสินค้า', 0, NULL, '', 'product_photo440644118.jpg', '', 0, '2021-08-03 02:03:26', '', 3, NULL, 2, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(82, 'ชื่อสินค้า', 0, NULL, '', 'product_photo914395943.jpg', '', 0, '2021-08-02 14:50:48', '', 3, NULL, 15, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 170, '', '', ''),
(83, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1240857208.jpg', '', 0, '2021-08-03 02:03:19', '', 3, NULL, 3, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(84, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1634056502.jpg', '', 0, '2021-08-02 14:51:05', '', 3, NULL, 14, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(85, 'ชื่อสินค้า', 0, NULL, '', 'product_photo163376184.jpg', '', 0, '2021-08-02 14:51:23', '', 3, NULL, 13, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 171, '', '', ''),
(86, 'ชื่อสินค้า', 0, NULL, '', 'product_photo217910281.jpg', '', 0, '2021-08-02 14:51:32', '', 3, NULL, 12, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(87, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1707156515.jpg', '', 0, '2021-08-02 14:51:44', '', 3, NULL, 11, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(88, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1086247129.jpg', '', 0, '2021-08-03 02:03:38', '', 3, NULL, 1, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(89, 'ชื่อสินค้า', 0, NULL, '', 'product_photo169356225.jpg', '', 0, '2021-08-02 14:52:09', '', 3, NULL, 10, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(90, 'ชื่อสินค้า', 0, NULL, '', 'product_photo245461030.jpg', '', 0, '2021-08-02 14:52:19', '', 3, NULL, 9, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(91, 'ชื่อสินค้า', 0, NULL, '', 'product_photo889862243.jpg', '', 0, '2021-08-02 14:52:27', '', 3, NULL, 8, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(92, 'ชื่อสินค้า', 0, NULL, '', 'product_photo1986286722.jpg', '', 0, '2021-08-02 14:52:36', '', 3, NULL, 7, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(93, 'ชื่อสินค้า', 500, NULL, 'รายละเอียดเบื้องต้น', 'product_photo8278950.jpg', '', 5, '2021-08-02 19:39:14', '', 3, NULL, 6, NULL, 20, NULL, NULL, ' ', '', '', '', '', 5, 170, '', '', ''),
(94, 'ทดสอบสินค้า', 500, NULL, 'รายละเอียดเบื้องต้น', 'product_photo175782469.jpg', '', 5, '2021-08-03 02:02:44', '', 3, NULL, 5, NULL, 20, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 4, 170, '', '', ''),
(95, 'ทดสอบสินค้า', 500, NULL, 'รายละเอียดเบื้องต้น', 'product_photo1391827762.jpg', '', 50, '2021-08-28 17:29:43', '', 3, NULL, 0, NULL, 100, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 4, 170, '', '', ''),
(96, 'ลวดเย็บกระดาษ (แพ็ค24กล่อง) แม็กซ์ 35-1M', 259, NULL, '', 'product_photo1442501851.jpg', '', 20, '2021-08-28 12:24:00', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(97, 'ลวดเย็บ เบอร์ 3 &quot;MAX&quot; (26/6) ลูกแม็กซ์', 18, NULL, '', 'product_photo1995631758.jpg', '', 23, '2021-08-28 13:54:30', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 171, '', '', ''),
(98, 'กระดาษทำปก 160 แกรม สีฟ้า (แพ็ค50แผ่น) KTV', 100, NULL, '', 'product_photo1943085696.jpg', '', 10, '2021-08-28 16:54:47', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 171, '', '', ''),
(99, 'กระดาษทำปก 160 แกรม สีชมพู (แพ็ค50แผ่น) KTV', 100, NULL, '', 'product_photo1167529623.jpg', '', 8, '2021-08-28 13:37:01', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 171, '', '', ''),
(100, 'หมึกเติม สีดำ Brother BT-D60BK', 120, NULL, '', 'product_photo1444744473.jpg', '', 0, '2021-08-28 17:01:23', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(101, 'หมึกเติม สีน้ำเงิน Brother BT-D60BK', 12, NULL, '', 'product_photo1195493323.jpg', '', 0, '2021-08-28 17:25:05', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(102, 'ทดสอบ', 15, NULL, '', 'product_photo117437340.jpg', '', 0, '2021-08-29 11:44:06', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(103, 'test', 12, NULL, '', 'product_photo648493106.jpg', '', 0, '2021-08-29 12:52:09', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', '');
INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_code`, `product_detail`, `product_photo`, `product_review`, `product_amount`, `product_datetime`, `product_sizetext`, `product_status_id`, `product_search`, `product_sort`, `product_pixel`, `product_weight`, `brand_name`, `catalog_name`, `recommend_name`, `proportion_name`, `product_cost`, `product_wholesale`, `product_note`, `collection_id`, `catalog_id`, `product_name_eng`, `product_detail_eng`, `product_review_eng`) VALUES
(104, 'test', 23, NULL, '', 'product_photo404589669.jpg', '', 0, '2021-08-29 13:08:41', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(105, 'ทดสอบระบบ', 5000, NULL, '', 'product_photo127742025.jpg', '', 0, '2021-09-17 19:54:31', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(106, 'ทดสอบระบบ222', 5000, NULL, '', 'product_photo1017011298.jpg', '', 4, '2021-09-17 19:54:58', '', 3, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(107, 'ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo1025676891.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 20, '2021-11-22 14:12:38', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(108, 'ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo1737214609.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 19, '2021-11-22 14:15:00', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(109, 'ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo1888014154.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 11, '2021-11-22 14:15:08', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(110, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo978458834.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 18, '2021-11-22 14:15:39', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(111, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo924231054.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 20, '2021-11-22 14:15:41', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 0, '', '', ''),
(112, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo172727288.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 20, '2021-11-22 14:15:51', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(113, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo2055039144.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 20, '2021-11-22 14:15:53', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(114, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo895009808.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 14, '2021-11-22 14:15:54', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(115, 'ซีอิ้วดำ 2 รสชาติ หวาน', 95, NULL, 'ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ', 'product_photo1006339918.jpg', '<p><span style=\"font-size:18px\">เปิดตัวน้องใหม่ มาแรง ขายดีสุดๆ ค่ะ <img alt=\"☺️\" src=\"https://www.facebook.com/images/emoji.php/v9/tfb/1/16/263a.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:18px\">ซีอิ้วดำ 2 รสชาติ เค็ม-หวาน</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ทำได้หลายเมนูเช่น ข้าวผัด ผัดซีอิ้ว กะเพรา พะโล้ ไก่อบ หมูหวาน หรือจะใช้จิ้มไก่ต้ม ขาหมูเยอรมัน หมูแดง ก็อร่อยเหมือนกันค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ราคาขวดละ 95 บาท</span></p>\r\n\r\n<p><span style=\"font-size:18px\">ปริมาณ 250 มล.</span></p>\r\n\r\n<p><span style=\"font-size:18px\">*อายุ 1 ปี ไม่ต้องแช่เย็น (ก่อนเปิด)</span></p>\r\n\r\n<p><span style=\"font-size:18px\">สนใจสั่งซื้อ inbox มาได้เลยค่ะ</span></p>\r\n\r\n<p><span style=\"font-size:18px\">รับตัวแทนจำหน่ายทั่วโลกค่ะ</span></p>', 12, '2021-11-22 14:16:01', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(116, 'น้ำจิ้มสุกี้', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo2081347456.jpg', '', 50, '2021-11-28 14:31:59', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(117, 'ซอสพริก', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo293518435.jpg', '', 50, '2021-11-28 14:32:03', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(118, 'น้ำจิ้มย่างเกาหลี', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo378816982.jpg', '', 50, '2021-11-28 14:32:15', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(119, 'น้ำจิ้มแจ่ว', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo2092546093.jpg', '', 50, '2021-11-28 14:32:18', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(120, 'น้ำยำ ซีฟู้ด', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo1739496090.jpg', '', 50, '2021-11-28 14:32:20', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(121, 'ซอสผัดกระเพรา', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo978721382.jpg', '', 50, '2021-11-28 14:32:22', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(122, 'ซอสหอยนางรม', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo937239966.jpg', '', 50, '2021-11-28 14:32:24', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(123, 'น้ำจิ้มข้าวมันไก่', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo585599167.jpg', '', 50, '2021-11-28 14:32:27', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(124, 'ซอสมะเขือเทศ', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo1490845385.jpg', '', 50, '2021-11-28 14:32:30', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(125, 'สลัดครีม', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo1819195681.jpg', '', 50, '2021-11-28 14:32:32', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(126, 'ซอสทำความหนืด', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo2055315409.jpg', '', 50, '2021-11-28 14:32:35', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(127, 'ซีอิ้วดำหวาน', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo1073070103.jpg', '', 50, '2021-11-28 14:32:38', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(128, 'ซีอิ้วดำเค็ม', 95, NULL, 'ไม่ใส่น้ำตาล   ไม่ใส่แป้ง   ไม่ใส่ผงชูรส', 'product_photo617534799.jpg', '', 50, '2021-11-28 14:32:42', '', 3, NULL, 0, NULL, 250, NULL, NULL, ' ', '', '', '', '', 0, 0, '', '', ''),
(129, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1480778159.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:56:56', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(130, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo508839057.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:57:00', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(131, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo450804814.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:57:05', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(132, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1155484298.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:57:09', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(133, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1116309665.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:58:48', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(134, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo759444805.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 17, '2021-11-30 14:58:57', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(135, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo2142846486.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:02', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' สินค้าแนะนำ', '', '', '', '', 0, 182, '', '', ''),
(136, 'ทดสอบชื่อสินค้า', 5000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1099413203.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:09', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(137, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo339131680.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:18', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(138, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1419458301.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:26', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(139, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo56242331.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:32', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(140, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1640121108.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:41', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(141, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1923650295.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:46', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(142, 'ทดสอบชื่อสินค้า', 7000, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo484552391.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 20, '2021-11-30 14:59:51', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', ''),
(143, 'ทดสอบชื่อสินค้า', 0, NULL, 'รายละเอียดเบื้องต้น รายละเอียดเบื้องต้น', 'product_photo1687172172.jpg', '<p>(ทดสอบข้อมูล)ผ้าม่าน Dimout ยอดฮิต หรือ เรียกได้ว่าเป็นผ้าม่านที่นิยมใช้กันมากที่สุด!</p>\r\n\r\n<p>ผ้า&nbsp;Dimout&nbsp;คือ ผ้าทึบแสงที่สามารถกันแสง&nbsp;UV&nbsp;ได้ดี และเป็นที่นิยมในหมู่ผ้าม่านมีสัมผัสนุ่มนวลมีความทิ้งตัวเป็นลอน&nbsp;</p>\r\n\r\n<p>ถ้าอยากรู้ว่าทำไมใครๆ ถึงเลือกใช้ ผ้าม่าน Dimout ต้องตามไปอ่านกันเลยครับ</p>', 18, '2021-12-03 19:07:13', '', 1, NULL, 0, NULL, 0, NULL, NULL, ' ', '', '', '', '', 0, 182, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_picture`
--

CREATE TABLE `product_picture` (
  `product_picture_id` int(11) NOT NULL,
  `product_picture_photo` varchar(400) CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `product_status_id` int(11) NOT NULL,
  `product_status_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`product_status_id`, `product_status_name`) VALUES
(1, 'แสดง'),
(2, 'ซ่อน'),
(3, 'ลบ');

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `recommend_id` int(11) NOT NULL,
  `recommend_name` varchar(255) NOT NULL,
  `recommend_name_eng` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`recommend_id`, `recommend_name`, `recommend_name_eng`) VALUES
(1, 'สินค้าแนะนำ', 'Recommended products');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slides_id` int(11) NOT NULL,
  `slides_photo` varchar(100) DEFAULT NULL,
  `slides_detail` varchar(1000) DEFAULT NULL,
  `slides_topic` varchar(1000) DEFAULT NULL,
  `slides_sort` int(11) DEFAULT NULL,
  `slides_link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slides_id`, `slides_photo`, `slides_detail`, `slides_topic`, `slides_sort`, `slides_link`) VALUES
(40, '19175538732508089.png', '', '', NULL, ''),
(41, '9143638261652084329.png', '', '', NULL, ''),
(42, '8692055461460338076.png', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(300) NOT NULL,
  `social_type` varchar(200) NOT NULL,
  `social_link` varchar(200) DEFAULT NULL,
  `social_photo` varchar(1000) DEFAULT NULL,
  `social_sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `social_name`, `social_type`, `social_link`, `social_photo`, `social_sort`) VALUES
(28, '082-674-5947', 'Tel', '0826745947', '398698896 1201889252.png', 1),
(29, 'กฤษฎา ผ้าม่าน', 'Facebook', 'www.facebook.com/%E0%B8%81%E0%B8%A4%E0%B8%A9%E0%B8%8E%E0%B8%B2-%E0%B8%9C%E0%B9%89%E0%B8%B2%E0%B8%A1%E0%B9%88%E0%B8%B2%E0%B8%99-108356241662476', '398067710 41175904.png', 3),
(30, 'kitha123', 'Line', 'line.me/ti/p/~kitha123', '52284313 480873865.png', 4),
(31, 'kritsadacurtain@gmail.com', 'Email', 'kritsadacurtain@gmail.com', '1527687531 1815107539.png', 5),
(32, '081-989-9837', 'Tel', '0819899837', '412003468 1901334481.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Statistic`
--

CREATE TABLE `Statistic` (
  `StatisticID` int(11) NOT NULL,
  `StatisticDate` date NOT NULL,
  `StatisticTime` time DEFAULT NULL,
  `StatisticIP` varchar(100) DEFAULT NULL,
  `StatisticBrowser` varchar(1000) DEFAULT NULL,
  `StatisticLanguage` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Statistic`
--

INSERT INTO `Statistic` (`StatisticID`, `StatisticDate`, `StatisticTime`, `StatisticIP`, `StatisticBrowser`, `StatisticLanguage`) VALUES
(1, '2021-12-02', '17:44:00', '123.60.83.110 ', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2222.88 Safari/537.36', 'zh-CN, zh; q=0.9, en; q=0.8, ko; q=0.7'),
(2, '2021-12-02', '19:14:56', '95.105.127.6 ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'en-US,en;q=0.9'),
(3, '2021-12-02', '20:12:59', '171.96.220.214 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(4, '2021-12-02', '21:20:50', '124.120.16.1 ', 'Mozilla/5.0 (Linux; Android 10; POCOPHONE F1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(5, '2021-12-02', '22:14:56', '154.16.21.10 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1', 'en-US'),
(6, '2021-12-02', '22:15:27', '208.94.230.232 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1', 'en-US'),
(7, '2021-12-03', '00:03:24', '130.255.166.115 ', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'en-US'),
(8, '2021-12-03', '02:30:29', '23.229.19.227 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'en'),
(9, '2021-12-03', '02:39:37', '171.96.159.156 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(10, '2021-12-03', '02:41:30', '51.68.250.98 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'en-US,en;q=0.5'),
(11, '2021-12-03', '04:54:08', '205.169.39.156 ', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'en-US'),
(12, '2021-12-03', '04:54:17', '205.169.39.156 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'en-US'),
(13, '2021-12-03', '04:58:31', '205.169.39.19 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.71 Safari/537.36', 'en-US,en;q=0.9'),
(14, '2021-12-03', '05:21:35', '66.220.149.4 ', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'en-US,en;q=0.9'),
(15, '2021-12-03', '05:29:52', '154.127.49.243 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 'en-US,en;q=0.5'),
(16, '2021-12-03', '06:30:57', '3.142.83.67 ', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'en-US'),
(17, '2021-12-03', '06:49:34', '40.69.24.70 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 'en-US,en;q=0.5'),
(18, '2021-12-03', '07:22:30', '149.202.180.22 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 'en-US,en;q=0.5'),
(19, '2021-12-03', '08:07:29', '20.62.202.32 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'en-US,en;q=0.5'),
(20, '2021-12-03', '10:46:18', '128.90.62.245 ', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', 'ar-QA,ar;q=0.9,en-US;q=0.8,en;q=0.7'),
(21, '2021-12-03', '10:46:50', '206.189.85.143 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 'en-US,en;q=0.5'),
(22, '2021-12-03', '10:55:51', '20.62.202.32 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'en-US,en;q=0.5'),
(23, '2021-12-03', '11:35:30', '23.229.19.227 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'en'),
(24, '2021-12-03', '11:39:55', '167.172.86.241 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 'en-US,en;q=0.5'),
(25, '2021-12-03', '12:40:36', '178.128.92.15 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'en-US,en;q=0.5'),
(26, '2021-12-03', '12:59:35', '23.229.19.227 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'en'),
(27, '2021-12-03', '14:04:34', '171.96.220.198 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(28, '2021-12-03', '14:44:51', '23.229.19.227 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'en'),
(29, '2021-12-03', '16:11:27', '171.99.152.55 ', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG Build/RKQ1.200826.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.45 Mobile Safari/537.36 [FB_IAB/Orca-Android;FBAV/340.0.0.11.119;]', 'th-TH,th;q=0.9,en-US;q=0.8,en;q=0.7'),
(30, '2021-12-03', '16:11:32', '171.99.152.55 ', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36', 'en-US,en;q=0.9,th;q=0.8'),
(31, '2021-12-03', '16:12:16', '61.19.2.197 ', 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 5 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.99 Mobile Safari/537.36', 'th-TH,th;q=0.9'),
(32, '2021-12-03', '17:18:27', '23.229.19.227 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'en'),
(33, '2021-12-03', '17:19:15', '173.249.22.173 ', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 'en;q=0.8,en-US;q=0.6,en;q=0.4'),
(34, '2021-12-03', '18:49:07', '124.120.21.17 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(35, '2021-12-03', '18:54:57', '49.228.104.151 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9'),
(36, '2021-12-03', '18:58:44', '61.19.1.132 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'th-TH,th;q=0.9'),
(37, '2021-12-03', '18:58:49', '96.30.112.5 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'en-US,en;q=0.9'),
(38, '2021-12-03', '18:59:40', '45.116.219.6 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'de-DE,de;q=0.9'),
(39, '2021-12-03', '19:02:00', '171.99.152.55 ', 'Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36', 'en-US,en;q=0.9,th;q=0.8'),
(40, '2021-12-03', '19:05:11', '27.55.66.219 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_8_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 LightSpeed [FBAN/MessengerLiteForiOS;FBAV/340.0.0.37.119;FBBV/334765001;FBDV/iPhone12,1;FBMD/iPhone;FBSN/iOS;FBSV/14.8.1;FBSS/2;FBCR/;FBID/phone;FBLC/th-Qaau;FBOP/0]', 'th-th'),
(41, '2021-12-03', '19:05:11', '124.120.16.1 ', 'Mozilla/5.0 (Linux; Android 11; vivo 1920 Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/96.0.4664.45 Mobile Safari/537.36 [FB_IAB/Orca-Android;FBAV/340.0.0.11.119;]', 'th-TH,th;q=0.9,en-US;q=0.8,en;q=0.7'),
(42, '2021-12-03', '19:05:42', '124.120.18.62 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th,th-TH;q=0.9,en;q=0.8'),
(43, '2021-12-03', '19:05:43', '61.19.2.199 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'en-US,en;q=0.9'),
(44, '2021-12-03', '19:05:45', '61.19.2.197 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'th-TH,th;q=0.9'),
(45, '2021-12-03', '19:07:52', '1.47.153.213 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_8 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 LightSpeed [FBAN/MessengerLiteForiOS;FBAV/340.0.0.37.119;FBBV/334765001;FBDV/iPhone13,2;FBMD/iPhone;FBSN/iOS;FBSV/14.8;FBSS/3;FBCR/;FBID/phone;FBLC/th-Qaau;FBOP/0]', 'th-th'),
(46, '2021-12-03', '19:10:29', '27.55.66.219 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_8_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 LightSpeed [FBAN/MessengerLiteForiOS;FBAV/340.0.0.37.119;FBBV/334765001;FBDV/iPhone12,1;FBMD/iPhone;FBSN/iOS;FBSV/14.8.1;FBSS/2;FBCR/;FBID/phone;FBLC/th-Qaau;FBOP/0]', 'th-th'),
(47, '2021-12-03', '19:10:44', '27.55.66.219 ', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0', 'th-th'),
(48, '2021-12-03', '19:10:47', '27.55.66.219 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_8 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/96.0.4664.53 Mobile/15E148 Safari/604.1', 'th-th'),
(49, '2021-12-03', '19:10:50', '118.175.45.7 ', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.0 Mobile/15E148 Safari/604.1', 'th-th'),
(50, '2021-12-03', '19:20:41', '51.68.250.98 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'en-US,en;q=0.5'),
(51, '2021-12-03', '19:23:40', '101.108.97.91 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9'),
(52, '2021-12-03', '19:23:44', '61.19.2.196 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'th,en-US;q=0.9,en;q=0.8'),
(53, '2021-12-03', '19:48:44', '124.120.16.1 ', 'Mozilla/5.0 (Linux; Android 10; POCOPHONE F1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8'),
(54, '2021-12-03', '20:28:08', '171.96.221.186 ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'th-TH,th;q=0.9,en;q=0.8');

-- --------------------------------------------------------

--
-- Table structure for table `store_photos`
--

CREATE TABLE `store_photos` (
  `store_photos_id` int(11) NOT NULL,
  `store_photos_img` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_photos`
--

INSERT INTO `store_photos` (`store_photos_id`, `store_photos_img`) VALUES
(5, '1103224084logo.png'),
(6, '1929819242logo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `weight_min` int(11) DEFAULT NULL,
  `weight_max` int(11) DEFAULT NULL,
  `weight_price` int(11) DEFAULT NULL,
  `portage_id` int(11) NOT NULL DEFAULT 17
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`weight_id`, `weight_min`, `weight_max`, `weight_price`, `portage_id`) VALUES
(1, 0, 20, 32, 17),
(23, 1501, 2000, 97, 17),
(22, 1001, 1500, 82, 17),
(21, 501, 1000, 67, 17),
(19, 101, 250, 42, 17),
(20, 251, 500, 52, 17),
(18, 21, 100, 37, 17),
(40, 0, 1000, 20, 20),
(24, 2001, 2500, 122, 17),
(25, 2501, 3000, 137, 17),
(26, 3001, 3500, 157, 17),
(27, 3501, 4000, 177, 17),
(28, 4001, 4500, 197, 17),
(29, 4501, 5000, 217, 17),
(30, 5001, 5500, 242, 17),
(31, 5501, 6000, 267, 17),
(32, 6001, 6500, 292, 17),
(33, 6501, 7000, 317, 17),
(34, 7001, 7500, 342, 17),
(35, 7501, 8000, 367, 17),
(36, 8001, 8500, 397, 17),
(37, 8501, 9000, 427, 17),
(38, 9001, 9500, 457, 17),
(39, 9501, 10000, 487, 17),
(41, 1001, 2000, 35, 20),
(42, 2001, 3000, 50, 20),
(43, 3001, 4000, 65, 20),
(44, 4001, 5000, 80, 20),
(45, 5001, 6000, 95, 20),
(46, 6001, 7000, 110, 20),
(47, 7001, 8000, 125, 20),
(48, 8001, 9000, 140, 20),
(49, 10001, 11000, 170, 20),
(50, 0, 2000, 55, 21),
(51, 2001, 7000, 90, 21),
(52, 7001, 10000, 100, 21),
(53, 10001, 15000, 205, 21),
(54, 15001, 20000, 330, 21),
(55, 20001, 25000, 420, 21),
(56, 25001, 100000, 10000, 21),
(57, 11001, 100000, 10000, 20),
(58, 10001, 100000, 10000, 17),
(59, 0, 1000, 35, 22),
(60, 1001, 2000, 40, 22),
(61, 2001, 3000, 45, 22),
(62, 3001, 4000, 50, 22),
(63, 4001, 5000, 55, 22),
(64, 5001, 6000, 60, 22),
(65, 6001, 7000, 70, 22),
(66, 7001, 8000, 80, 22),
(67, 8001, 9000, 90, 22),
(68, 9001, 10000, 100, 22),
(69, 10001, 11000, 110, 22),
(70, 11001, 12000, 120, 22),
(71, 12001, 13000, 130, 22),
(72, 13001, 14000, 140, 22),
(73, 14001, 15000, 150, 22),
(74, 15001, 16000, 160, 22),
(75, 16001, 17000, 170, 22),
(76, 17001, 18000, 180, 22),
(77, 18001, 19000, 190, 22),
(78, 19001, 20000, 200, 22),
(93, 20001, 25000, 430, 23),
(92, 15001, 20000, 340, 23),
(91, 10001, 15000, 155, 23),
(90, 7001, 10000, 110, 23),
(88, 501, 2000, 60, 23),
(89, 2001, 7000, 100, 23),
(86, 0, 500, 55, 23),
(94, 25001, 100000, 100000, 23),
(95, 0, 1000, 35, 24),
(96, 1001, 5000, 55, 24),
(97, 5001, 10000, 100, 24),
(98, 10001, 15000, 150, 24),
(99, 15001, 20000, 200, 24),
(100, 20001, 100000, 100000, 24),
(116, 0, 10000, 0, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_degree`
--
ALTER TABLE `admin_degree`
  ADD PRIMARY KEY (`admin_degree_id`);

--
-- Indexes for table `admin_remove`
--
ALTER TABLE `admin_remove`
  ADD PRIMARY KEY (`admin_remove_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `ArticlePage` (`article_page`);

--
-- Indexes for table `article_picture`
--
ALTER TABLE `article_picture`
  ADD PRIMARY KEY (`article_picture_id`);

--
-- Indexes for table `billrequest`
--
ALTER TABLE `billrequest`
  ADD PRIMARY KEY (`billrequest_id`);

--
-- Indexes for table `cash_on`
--
ALTER TABLE `cash_on`
  ADD PRIMARY KEY (`cash_on_id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`catalog_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`),
  ADD UNIQUE KEY `catalog_page` (`collection_page`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`DeviceID`);

--
-- Indexes for table `fixed`
--
ALTER TABLE `fixed`
  ADD PRIMARY KEY (`fixed_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `Historylog`
--
ALTER TABLE `Historylog`
  ADD PRIMARY KEY (`HistorylogID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `MemberPhone` (`member_phone`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `Online`
--
ALTER TABLE `Online`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_list_id`);

--
-- Indexes for table `order_list_status`
--
ALTER TABLE `order_list_status`
  ADD PRIMARY KEY (`order_list_status_id`);

--
-- Indexes for table `order_list_who`
--
ALTER TABLE `order_list_who`
  ADD PRIMARY KEY (`order_list_who_id`);

--
-- Indexes for table `or_product`
--
ALTER TABLE `or_product`
  ADD PRIMARY KEY (`or_product_id`);

--
-- Indexes for table `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD PRIMARY KEY (`pagecontent_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `portage`
--
ALTER TABLE `portage`
  ADD PRIMARY KEY (`portage_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_picture`
--
ALTER TABLE `product_picture`
  ADD PRIMARY KEY (`product_picture_id`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`product_status_id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`recommend_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slides_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `Statistic`
--
ALTER TABLE `Statistic`
  ADD PRIMARY KEY (`StatisticID`);

--
-- Indexes for table `store_photos`
--
ALTER TABLE `store_photos`
  ADD PRIMARY KEY (`store_photos_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_degree`
--
ALTER TABLE `admin_degree`
  MODIFY `admin_degree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_remove`
--
ALTER TABLE `admin_remove`
  MODIFY `admin_remove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `article_picture`
--
ALTER TABLE `article_picture`
  MODIFY `article_picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `billrequest`
--
ALTER TABLE `billrequest`
  MODIFY `billrequest_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash_on`
--
ALTER TABLE `cash_on`
  MODIFY `cash_on_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `catalog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Device`
--
ALTER TABLE `Device`
  MODIFY `DeviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fixed`
--
ALTER TABLE `fixed`
  MODIFY `fixed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Historylog`
--
ALTER TABLE `Historylog`
  MODIFY `HistorylogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Online`
--
ALTER TABLE `Online`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_list_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_list_status`
--
ALTER TABLE `order_list_status`
  MODIFY `order_list_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_list_who`
--
ALTER TABLE `order_list_who`
  MODIFY `order_list_who_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `or_product`
--
ALTER TABLE `or_product`
  MODIFY `or_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `pagecontent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `portage`
--
ALTER TABLE `portage`
  MODIFY `portage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `product_picture`
--
ALTER TABLE `product_picture`
  MODIFY `product_picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `product_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `recommend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slides_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Statistic`
--
ALTER TABLE `Statistic`
  MODIFY `StatisticID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `store_photos`
--
ALTER TABLE `store_photos`
  MODIFY `store_photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;