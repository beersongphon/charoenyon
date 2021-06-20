-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 01:32 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_project_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_parts`
--

CREATE TABLE IF NOT EXISTS `auto_parts` (
  `parts_id` int(10) NOT NULL,
  `parts_name` varchar(100) NOT NULL,
  `parts_price` int(7) NOT NULL,
  `company_parts_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `parts_year` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_parts`
--

INSERT INTO `auto_parts` (`parts_id`, `parts_name`, `parts_price`, `company_parts_id`, `model_id`, `parts_year`) VALUES
(3, 'กันชนหน้า', 4500, 5, 10, '1990-1995'),
(4, 'ไฟหน้า', 3000, 5, 31, '2011-2016'),
(11, 'ไฟท้าย', 3200, 6, 18, '2022-2025'),
(13, 'กันชนหลัง', 7000, 2, 28, '2017-2021'),
(16, 'น้ำมันเครื่อง รถยนต์ดีเซล คอมมอนเรล Ptt Dynamic Commonrail 10w-30 ดีเซล 6ลิตร + 1 ลิตร', 660, 5, 46, '2022-2025'),
(17, 'น้ำมันเบรค เชลล์ shell DOT3 0.5 ลิตร รถมอเตอร์ไซค์ และ รถยนต์ทั่วไป', 200, 5, 46, '1990-1995'),
(18, 'น้ำมันเบรค Castrol DOT 4 ขนาด 0.5 ลิตร ', 120, 5, 46, '1990-1995'),
(19, 'ยาง 195/55R15 PILOT SPORT 3  มิชลิน MICHELIN', 3850, 4, 6, '2017-2021'),
(20, 'ยาง 195R14 RANGER R101 THUNDERER', 2400, 5, 31, '2007-2010'),
(21, 'ยาง 205/45R16 CINTURATO P1 FIRELLI', 3590, 5, 34, '2007-2010');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `vin` varchar(17) NOT NULL DEFAULT '',
  `cus_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `gear_id` int(10) NOT NULL,
  `car_registration` varchar(10) NOT NULL,
  `model_year` int(4) NOT NULL,
  `color` varchar(30) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `status_id` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`vin`, `cus_id`, `model_id`, `gear_id`, `car_registration`, `model_year`, `color`, `car_type`, `status_id`) VALUES
('A1245R69874126234', 3, 16, 1, '3-กญ-1842', 2010, 'ขาว', 'เก๋งสองตอน', 2),
('APIXOCD4896216478', 16, 6, 1, '1-ทส-9645', 2017, 'ขาว', 'รถยนต์สี่ประตู', 1),
('AXC53124AF89647H', 13, 46, 1, '5-ธญ-7846', 2012, 'ขาวมุก', 'กระบะ(มีหลังคา)', 1),
('DKX123456A849624G', 10, 46, 2, '7-ธย-4536', 2010, 'ดำ', 'กระบะ(มีหลังคา)', 1),
('DKX42548962145246', 16, 10, 1, '1-ปญ-7846', 2010, 'ขาว', 'รถยนต์สี่ประตู', 1),
('MU4962D46872XC647', 12, 48, 1, '8-ฌญ-8594', 2016, 'ขาว', 'กระบะ(ไม่มีหลังคา)', 3),
('MX125634892612458', 7, 32, 1, '1-มช-7894', 2000, 'ขาว', 'เก๋งสองตอน', 4),
('PAKD489C6421A4758', 14, 48, 1, '5-ปช-4513', 2016, 'ขาวมุก', 'Van', 1),
('PD489G612Q4632879', 11, 51, 1, '4-ฮย-6432', 2018, 'ดำ', 'กระบะ(ไม่มีหลังคา)', 1),
('PK9S6123A46789142', 6, 16, 1, '6-วญ-7782', 2017, 'ดำ', 'รถยนต์สี่ประตู', 1),
('RB1245D678X912Z64', 15, 16, 1, '1-กพ-9999', 2020, 'ดำ', 'เก๋งสองตอน', 2),
('WA56D8946D214C32', 5, 6, 1, '5-วญ-8841', 2010, 'ดำ', 'เก๋งสองตอน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_brand`
--

CREATE TABLE IF NOT EXISTS `car_brand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_brand`
--

INSERT INTO `car_brand` (`brand_id`, `brand_name`) VALUES
(2, 'Mitsubishi'),
(3, 'Mazda'),
(5, 'Suzuki'),
(6, 'Nissan'),
(7, 'TOYOTA'),
(8, 'Hyundai'),
(9, 'Isuzu'),
(10, 'Honda'),
(11, 'Chevrolet');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `model_id` int(10) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `brand_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`model_id`, `model_name`, `brand_id`) VALUES
(2, 'Triton', 2),
(3, 'Pajero Sport', 2),
(4, 'Lancer', 2),
(5, 'Dada', 2),
(6, 'Civic', 10),
(7, 'Cr-v ', 10),
(8, ' ACCORD', 10),
(9, 'CITY', 10),
(10, 'Jazz', 10),
(11, 'HR-V', 10),
(12, 'BRIO', 10),
(13, 'MX5', 3),
(14, '2', 3),
(15, '3', 3),
(16, 'Rx8', 3),
(17, 'CX-5', 3),
(18, 'claz', 5),
(19, 'Ertiga', 5),
(20, 'swift', 5),
(21, 'CELERIO', 5),
(22, 'JUKE', 6),
(23, 'TEANA', 6),
(24, 'MARCH', 6),
(25, 'ALMERA', 6),
(26, 'CUBE', 6),
(27, 'NAVARA', 6),
(28, 'VIOS', 7),
(29, 'SIENTA', 7),
(30, 'FORTUNER', 7),
(31, 'CAMRY', 7),
(32, 'YARIS', 7),
(33, 'ALTIS', 7),
(34, 'Accent', 8),
(35, 'Elantra', 8),
(36, 'Excel', 8),
(37, 'Grand Starex', 8),
(38, 'H-1', 8),
(39, 'IONIQ', 8),
(40, 'KONA', 8),
(41, 'Sonata', 8),
(42, 'Sprint', 8),
(43, 'Tiburon', 8),
(44, 'Tucson', 8),
(45, 'Veloster', 8),
(46, 'D-MAX', 9),
(47, 'MU-X', 9),
(48, 'MU-7', 9),
(49, 'V-Cross', 9),
(50, 'Spark Ex', 9),
(51, 'Adventure', 9),
(52, 'Adventure Master', 9),
(53, 'Aska', 9),
(54, 'Buddy', 9),
(55, 'Cab 4', 9),
(56, 'Cameo', 9),
(57, 'Dragon Eye', 9),
(58, 'Dragon Power', 9),
(59, 'Faster', 9),
(60, 'Gemini', 9),
(61, 'Geo Storm', 9),
(62, 'Grand Adventure', 9),
(63, 'Heno', 9),
(64, 'Hi-Lander', 9),
(65, 'Captiva', 11),
(66, 'Trailblazer', 11),
(67, 'Colorado', 11),
(68, 'Cruze', 11),
(69, 'Aveo', 11),
(70, 'Allroader', 11),
(71, 'Astro', 11),
(72, 'Camaro', 11),
(73, 'Chevy Van', 11),
(74, 'Corvette', 11),
(75, 'Express', 11),
(76, 'Impala', 11),
(77, 'Lumina', 11),
(78, 'Optra', 11),
(79, 'S10', 11),
(80, 'Savana', 11),
(81, 'Sonic', 11),
(82, 'Spin', 11),
(83, 'Zafira', 11);

-- --------------------------------------------------------

--
-- Table structure for table `car_painting`
--

CREATE TABLE IF NOT EXISTS `car_painting` (
  `painting_id` int(10) NOT NULL,
  `pt_detail` varchar(100) NOT NULL,
  `pt_part` varchar(50) NOT NULL,
  `paint_price` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_painting`
--

INSERT INTO `car_painting` (`painting_id`, `pt_detail`, `pt_part`, `paint_price`) VALUES
(13, 'ประตู', 'ซ้ายหน้า', 1000),
(14, 'ฝากระโปรง', 'หน้า', 2000),
(15, 'ฝากระโปรง', 'หลัง', 2500),
(16, 'ประตู', 'ซ้ายหลัง', 2000),
(17, 'กันชน', 'หน้า', 4000),
(18, 'หลังคา', 'บน', 3000),
(19, 'โปร่งบังโครน', 'หน้า', 300),
(20, 'ฝากระโปรง', 'ท้าย', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `car_repir`
--

CREATE TABLE IF NOT EXISTS `car_repir` (
  `repair_id` int(10) NOT NULL,
  `vin` varchar(17) NOT NULL,
  `date_repir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_repir`
--

INSERT INTO `car_repir` (`repair_id`, `vin`, `date_repir`) VALUES
(1, 'A1245R69874126234', '2021-05-20 11:59:00'),
(2, 'RB1245D678X912Z64', '2021-05-20 12:04:58'),
(3, 'WA56D8946D214C32', '2021-05-20 15:52:39'),
(5, 'APIXOCD4896216478', '2021-05-20 16:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `company_parts`
--

CREATE TABLE IF NOT EXISTS `company_parts` (
  `company_parts_id` int(10) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_parts`
--

INSERT INTO `company_parts` (`company_parts_id`, `company_name`) VALUES
(1, '-'),
(2, 'บริษัท Toyota สระบุรีจำกัด'),
(4, 'บริษัท สระบุรี ฮอนด้าคาร์ส์ จำกัด'),
(5, 'บริษัท วรจักร์ยนต์ จำกัด'),
(6, 'บริษัท เฮงพรไพศาลสระบุรี จำกัด'),
(7, 'หจก.ปัญจบวรอะไหล่ (สระบุรีอะไหล่)');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `tel` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `firstname`, `lastname`, `address`, `tel`) VALUES
(3, 'อาลี', 'นนทรี', '47/121 ตำบล เสาธิงหิน อำเภอ บางใหญ่ จังหวัด นนทบุรี', '0924732084'),
(5, 'วรัญญา', 'สัมมาสูงเนิน', '56/3 อำเภอ เฉลิมพระเกียรต์ ตำบล บ้านแก้ง จังหวัด สระบุรี ', '0849462571'),
(6, 'ดารอวิด', 'นนทรี', '59/326 อ.บางใหญ่ ต.เสาธงหิน จ.นนบุรี', '0816432144'),
(7, 'เชอรี่', 'มารีโคล', '97 กรุงเทพฯ พระนคร บางพลี 10540', '0864913246'),
(8, 'วิทยา', 'มณีเทศ', 'จังหวัด สระบุรี อำเภอ เฉลิมพระเกีรยติ์', '0849462164'),
(9, 'สมพงษ์', 'วังวน', 'อำเภอ บางใหญ่ จังหวัด นนทบุรี', '0866194846'),
(10, 'สุรินทร์', 'สมุทรเนตร', '59/12 จังหวัดกรุงเทพ ฯ อำเภอ พระนคร', '0946215487'),
(11, 'จักรกฤษ', 'รัดดากลม', '58/1 ม.7 ถนน รัตนาธิเบศขาออก อำเภอบางใหญ่ จังหวัด นนทบุรี 11140', '0649123462'),
(12, 'พฤษา', 'กิจนโรจน์', '89/1 ต.เสาธงหิน อ.บางใหญ่ จังหวัด นนทบุรี', '0826498726'),
(13, 'ธนัญญา', 'เกษมราช', '89/64 อ.บางกรวย ต.บางกราย จ.กรุงเทพฯ', '0946326497'),
(14, 'วัลพล', 'นนทรี', '48/12 อำเภอ บางใหญ่ จังหวัด นนบุรี', '0948264912'),
(15, 'นายตั้งใจ', 'ทำโปรเจ็ค', '58/91 เขต พระนคร จังหวัด กรุงเทพ 11110', '0834621548'),
(16, 'นายทดสอบ', 'ตั้งใจทำ', '49/32 จังหวัดนนบุรี อำเภอ บางใหญ่ ตำบลเสาธงหิน 11140', '0836412594');

-- --------------------------------------------------------

--
-- Table structure for table `gear`
--

CREATE TABLE IF NOT EXISTS `gear` (
  `gear_id` int(10) NOT NULL,
  `gear_detail` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gear`
--

INSERT INTO `gear` (`gear_id`, `gear_detail`) VALUES
(1, 'Auto'),
(2, 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `img_parts`
--

CREATE TABLE IF NOT EXISTS `img_parts` (
  `img_parts_id` int(10) NOT NULL,
  `Img` varchar(150) NOT NULL,
  `parts_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_parts`
--

INSERT INTO `img_parts` (`img_parts_id`, `Img`, `parts_id`) VALUES
(59, '111.jpg', 3),
(60, '1.jpg', 3),
(61, '2.jpg', 4),
(62, '2-1.jpg', 4),
(63, '03.jpg', 11),
(64, '033.jpg', 11),
(66, '06.jpg', 13),
(67, '0666.jpg', 13),
(75, '1631037668aed069844fd27be1f4acaca18ac5141d.jpg', 16),
(77, '16228083401361025697-81JPG-o.jpg', 18),
(78, '1626875331i0.jpg', 17),
(82, '163057961079aae0e4ff887e3e05aa9118bd9b0f40.jpg', 20),
(83, '1624126570f48c646971530deaf8e5c4189ec95f1c.jpg', 21),
(85, '1624587861cjfuqxjam08eu0hqmlzw76z8g-auto-tyres-pilot-sport-3-persp.full.png', 19);

-- --------------------------------------------------------

--
-- Table structure for table `img_repair`
--

CREATE TABLE IF NOT EXISTS `img_repair` (
  `Img_repair_id` int(10) NOT NULL,
  `repair_id` int(10) NOT NULL,
  `Img_detail` varchar(50) NOT NULL,
  `type_img` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_repair`
--

INSERT INTO `img_repair` (`Img_repair_id`, `repair_id`, `Img_detail`, `type_img`) VALUES
(65, 5, '1626504095001.jpg', 0),
(66, 5, '1631202268002.png', 0),
(67, 5, '163112110111.jpg', 1),
(68, 5, '1626718337222.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_review`
--

CREATE TABLE IF NOT EXISTS `img_review` (
  `img_review_id` int(10) NOT NULL,
  `Img_review` varchar(150) NOT NULL,
  `review_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_review`
--

INSERT INTO `img_review` (`img_review_id`, `Img_review`, `review_id`) VALUES
(3, '162515037511.jpg', 1),
(4, '1621686331222.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `insurance_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insurance_id`, `name`) VALUES
(1, 'ไม่มีประกัน'),
(2, 'บริษัท มิตรแท้ประกันภัย จำกัด (มหาชน)'),
(3, 'บริษัท สินมั่นคงประกันภัย จำกัด (มหาชน)'),
(4, 'บมจ. ประกันภัยไทยวิวัฒน์'),
(5, 'บริษัท ทิพยประกันภัย จำกัด (มหาชน)'),
(6, 'บริษัท ซมโปะ ประกันภัย จำกัด (มหาชน)'),
(7, 'บริษัท กรุงเทพประกันภัย จำกัด');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_type`
--

CREATE TABLE IF NOT EXISTS `insurance_type` (
  `Isr_type_id` int(10) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance_type`
--

INSERT INTO `insurance_type` (`Isr_type_id`, `type`) VALUES
(1, '-'),
(2, 'ประกันชั้น1'),
(3, 'ประกันชั้น2'),
(4, 'ประกันชั้น3'),
(5, 'ประกันชั้น1+'),
(6, 'ประกันชั้น2+'),
(7, 'ประกันชั้น3+');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_painting`
--

CREATE TABLE IF NOT EXISTS `invoice_painting` (
  `Iv_paint_id` int(10) NOT NULL,
  `Insurance_id` int(10) NOT NULL,
  `Isr_type_id` int(10) NOT NULL,
  `wage` int(10) NOT NULL,
  `Iv_total` int(8) NOT NULL,
  `date_parts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `repair_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_painting`
--

INSERT INTO `invoice_painting` (`Iv_paint_id`, `Insurance_id`, `Isr_type_id`, `wage`, `Iv_total`, `date_parts`, `repair_id`) VALUES
(1, 2, 2, 500, 6500, '2021-05-20 11:59:00', 1),
(2, 2, 2, 1000, 4000, '2021-05-20 12:04:58', 2),
(3, 2, 2, 500, 5000, '2021-05-20 15:52:39', 3),
(5, 5, 2, 500, 2300, '2021-05-20 16:35:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_parts`
--

CREATE TABLE IF NOT EXISTS `invoice_parts` (
  `Iv_parts_id` int(10) NOT NULL,
  `Insurance_id` int(10) NOT NULL,
  `Isr_type_id` int(10) NOT NULL,
  `wage` int(8) NOT NULL,
  `Iv_total` int(10) NOT NULL,
  `date_parts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `repair_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_parts`
--

INSERT INTO `invoice_parts` (`Iv_parts_id`, `Insurance_id`, `Isr_type_id`, `wage`, `Iv_total`, `date_parts`, `repair_id`) VALUES
(1, 2, 2, 500, 5160, '2021-05-20 11:59:00', 1),
(2, 2, 2, 500, 10700, '2021-05-20 12:04:58', 2),
(3, 2, 2, 1000, 4500, '2021-05-20 15:52:39', 3),
(5, 5, 2, 500, 16060, '2021-05-20 16:35:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `list_painting`
--

CREATE TABLE IF NOT EXISTS `list_painting` (
  `list_paint_id` int(10) NOT NULL,
  `painting_id` int(10) NOT NULL,
  `amount` int(2) NOT NULL,
  `total_paint` int(8) NOT NULL,
  `Iv_paint_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_painting`
--

INSERT INTO `list_painting` (`list_paint_id`, `painting_id`, `amount`, `total_paint`, `Iv_paint_id`) VALUES
(12, 15, 1, 2500, 1),
(13, 17, 1, 4000, 1),
(14, 16, 1, 2000, 2),
(15, 14, 1, 2000, 2),
(16, 14, 1, 2000, 3),
(17, 20, 1, 3000, 3),
(20, 19, 1, 300, 5),
(21, 14, 1, 2000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `list_parts`
--

CREATE TABLE IF NOT EXISTS `list_parts` (
  `list_parts_id` int(10) NOT NULL,
  `parts_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `total_part` int(8) NOT NULL,
  `Iv_parts_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_parts`
--

INSERT INTO `list_parts` (`list_parts_id`, `parts_id`, `amount`, `total_part`, `Iv_parts_id`) VALUES
(12, 16, 1, 660, 1),
(13, 3, 1, 4500, 1),
(14, 3, 1, 4500, 2),
(15, 11, 1, 3200, 2),
(16, 4, 1, 3000, 2),
(17, 3, 1, 4500, 3),
(21, 19, 4, 15400, 5),
(22, 16, 1, 660, 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(10) NOT NULL,
  `repair_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `repair_id`, `user_id`) VALUES
(1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(10) NOT NULL,
  `status_detail` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_detail`) VALUES
(1, 'นำรถเข้าอู่ซ่อม'),
(2, 'ดำเนินการซ่อม'),
(3, 'ตรวจสอบรถยนต์'),
(4, 'รับรถยนต์เรียบร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `type_parts`
--

CREATE TABLE IF NOT EXISTS `type_parts` (
  `type_parts_id` int(10) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `company_parts_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_parts`
--

INSERT INTO `type_parts` (`type_parts_id`, `type_name`, `company_parts_id`) VALUES
(1, 'แท้', 2),
(2, 'แท้', 4),
(3, 'เทียบ', 5),
(4, 'แท้เทียบ', 6),
(5, 'เทียม', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user`, `pass`) VALUES
(1, 'admin', '1234'),
(2, 'test', '1234'),
(3, 'waranya', '123456'),
(4, 'arlee', '023771681');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_parts`
--
ALTER TABLE `auto_parts`
  ADD PRIMARY KEY (`parts_id`), ADD KEY `company_parts_id` (`company_parts_id`,`model_id`), ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`vin`), ADD KEY `cus_id` (`cus_id`), ADD KEY `model_id` (`model_id`), ADD KEY `gear_id` (`gear_id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`model_id`), ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `car_painting`
--
ALTER TABLE `car_painting`
  ADD PRIMARY KEY (`painting_id`);

--
-- Indexes for table `car_repir`
--
ALTER TABLE `car_repir`
  ADD PRIMARY KEY (`repair_id`), ADD KEY `vin` (`vin`);

--
-- Indexes for table `company_parts`
--
ALTER TABLE `company_parts`
  ADD PRIMARY KEY (`company_parts_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `gear`
--
ALTER TABLE `gear`
  ADD PRIMARY KEY (`gear_id`);

--
-- Indexes for table `img_parts`
--
ALTER TABLE `img_parts`
  ADD PRIMARY KEY (`img_parts_id`), ADD KEY `parts_id` (`parts_id`);

--
-- Indexes for table `img_repair`
--
ALTER TABLE `img_repair`
  ADD PRIMARY KEY (`Img_repair_id`), ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `img_review`
--
ALTER TABLE `img_review`
  ADD PRIMARY KEY (`img_review_id`), ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `insurance_type`
--
ALTER TABLE `insurance_type`
  ADD PRIMARY KEY (`Isr_type_id`);

--
-- Indexes for table `invoice_painting`
--
ALTER TABLE `invoice_painting`
  ADD PRIMARY KEY (`Iv_paint_id`), ADD KEY `Insurance_id` (`Insurance_id`,`Isr_type_id`,`repair_id`), ADD KEY `Isr_type_id` (`Isr_type_id`), ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `invoice_parts`
--
ALTER TABLE `invoice_parts`
  ADD PRIMARY KEY (`Iv_parts_id`), ADD KEY `Insurance_id` (`Insurance_id`,`Isr_type_id`,`repair_id`), ADD KEY `Isr_type_id` (`Isr_type_id`), ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `list_painting`
--
ALTER TABLE `list_painting`
  ADD PRIMARY KEY (`list_paint_id`), ADD KEY `painting_id` (`painting_id`,`Iv_paint_id`), ADD KEY `Iv_paint_id` (`Iv_paint_id`);

--
-- Indexes for table `list_parts`
--
ALTER TABLE `list_parts`
  ADD PRIMARY KEY (`list_parts_id`), ADD KEY `parts_id` (`parts_id`,`Iv_parts_id`), ADD KEY `Iv_parts_id` (`Iv_parts_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`), ADD KEY `repair_id` (`repair_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type_parts`
--
ALTER TABLE `type_parts`
  ADD PRIMARY KEY (`type_parts_id`), ADD KEY `company_parts_id` (`company_parts_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_parts`
--
ALTER TABLE `auto_parts`
  MODIFY `parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `model_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `car_painting`
--
ALTER TABLE `car_painting`
  MODIFY `painting_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `car_repir`
--
ALTER TABLE `car_repir`
  MODIFY `repair_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company_parts`
--
ALTER TABLE `company_parts`
  MODIFY `company_parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `gear`
--
ALTER TABLE `gear`
  MODIFY `gear_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `img_parts`
--
ALTER TABLE `img_parts`
  MODIFY `img_parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `img_repair`
--
ALTER TABLE `img_repair`
  MODIFY `Img_repair_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `img_review`
--
ALTER TABLE `img_review`
  MODIFY `img_review_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `insurance_type`
--
ALTER TABLE `insurance_type`
  MODIFY `Isr_type_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice_painting`
--
ALTER TABLE `invoice_painting`
  MODIFY `Iv_paint_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoice_parts`
--
ALTER TABLE `invoice_parts`
  MODIFY `Iv_parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `list_painting`
--
ALTER TABLE `list_painting`
  MODIFY `list_paint_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `list_parts`
--
ALTER TABLE `list_parts`
  MODIFY `list_parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_parts`
--
ALTER TABLE `type_parts`
  MODIFY `type_parts_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto_parts`
--
ALTER TABLE `auto_parts`
ADD CONSTRAINT `auto_parts_ibfk_1` FOREIGN KEY (`company_parts_id`) REFERENCES `company_parts` (`company_parts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `auto_parts_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `car_model` (`model_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `car_model` (`model_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`gear_id`) REFERENCES `gear` (`gear_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `car_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `car_model`
--
ALTER TABLE `car_model`
ADD CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `car_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `car_repir`
--
ALTER TABLE `car_repir`
ADD CONSTRAINT `car_repir_ibfk_1` FOREIGN KEY (`vin`) REFERENCES `car` (`vin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_parts`
--
ALTER TABLE `img_parts`
ADD CONSTRAINT `img_parts_ibfk_1` FOREIGN KEY (`parts_id`) REFERENCES `auto_parts` (`parts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_repair`
--
ALTER TABLE `img_repair`
ADD CONSTRAINT `img_repair_ibfk_1` FOREIGN KEY (`repair_id`) REFERENCES `car_repir` (`repair_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img_review`
--
ALTER TABLE `img_review`
ADD CONSTRAINT `img_review_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_painting`
--
ALTER TABLE `invoice_painting`
ADD CONSTRAINT `invoice_painting_ibfk_1` FOREIGN KEY (`Insurance_id`) REFERENCES `insurance` (`insurance_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoice_painting_ibfk_2` FOREIGN KEY (`Isr_type_id`) REFERENCES `insurance_type` (`Isr_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoice_painting_ibfk_3` FOREIGN KEY (`repair_id`) REFERENCES `car_repir` (`repair_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_parts`
--
ALTER TABLE `invoice_parts`
ADD CONSTRAINT `invoice_parts_ibfk_1` FOREIGN KEY (`Insurance_id`) REFERENCES `insurance` (`insurance_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoice_parts_ibfk_2` FOREIGN KEY (`Isr_type_id`) REFERENCES `insurance_type` (`Isr_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `invoice_parts_ibfk_3` FOREIGN KEY (`repair_id`) REFERENCES `car_repir` (`repair_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list_painting`
--
ALTER TABLE `list_painting`
ADD CONSTRAINT `list_painting_ibfk_1` FOREIGN KEY (`painting_id`) REFERENCES `car_painting` (`painting_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `list_painting_ibfk_2` FOREIGN KEY (`Iv_paint_id`) REFERENCES `invoice_painting` (`Iv_paint_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list_parts`
--
ALTER TABLE `list_parts`
ADD CONSTRAINT `list_parts_ibfk_1` FOREIGN KEY (`parts_id`) REFERENCES `auto_parts` (`parts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `list_parts_ibfk_2` FOREIGN KEY (`Iv_parts_id`) REFERENCES `invoice_parts` (`Iv_parts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`repair_id`) REFERENCES `car_repir` (`repair_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `type_parts`
--
ALTER TABLE `type_parts`
ADD CONSTRAINT `type_parts_ibfk_1` FOREIGN KEY (`company_parts_id`) REFERENCES `company_parts` (`company_parts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
