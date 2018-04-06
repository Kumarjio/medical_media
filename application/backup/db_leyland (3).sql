-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 01:58 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_leyland`
--

-- --------------------------------------------------------

--
-- Table structure for table `cb_customer`
--

CREATE TABLE `cb_customer` (
  `cid` int(11) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `pincode` mediumint(9) NOT NULL,
  `mobile` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_customer`
--

INSERT INTO `cb_customer` (`cid`, `customer_name`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `mobile`, `email`, `created_date`) VALUES
(1, 'MANI', 'CHENNAI', 'CHENNAI', 'TAMILNADU', 'INDIA', 8388607, 20150712, '150', '2017-02-03 02:10:24'),
(2, 'KRISHNAN', 'COMPAAA', 'COMPBBB', 'COMPCC', 'COMPBBBDDD', 240000, 20161007, '456', '2016-10-07 01:51:00'),
(3, 'COMPANY3', 'T.NAGAR', 'CHENNAI', 'TAMILNADU', 'INDIA', 600002, 20161021, '10000', '2016-10-21 10:38:33'),
(4, 'COMPANY-TEST4', 'TEST4', 'TEST4CITY', 'TEST4STATE', 'TESTCN', 600003, 20161021, '0', '2016-10-21 10:47:59'),
(5, 'ASDSD', 'ASD', 'SSS', 'TAMILNADU', 'INDIA', 54546, 0, '0', '2017-02-03 02:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `cb_employee`
--

CREATE TABLE `cb_employee` (
  `cid` int(11) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `pincode` mediumint(9) NOT NULL,
  `joining_date` date NOT NULL,
  `advance` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_employee`
--

INSERT INTO `cb_employee` (`cid`, `customer_name`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `joining_date`, `advance`, `created_date`) VALUES
(1, 'FFFFFFFFF', 'FDDDDDDDDDDDD', 'FDSFDFDS', 'FDSFDSF', 'FDSFDSFDS', 654654, '2015-07-12', 45445, '2016-10-06 11:16:14'),
(2, 'TEST22', 'TRANSBBBB', 'TRANSCCC', 'TRANSDDDS', 'TRANSEEEE', 240000, '2016-10-07', 2000, '2016-10-07 10:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `cb_seller`
--

CREATE TABLE `cb_seller` (
  `cid` int(11) NOT NULL,
  `seller_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `joining_date` date NOT NULL,
  `advance` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_seller`
--

INSERT INTO `cb_seller` (`cid`, `seller_name`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `telephone`, `email`, `joining_date`, `advance`, `created_date`) VALUES
(1, 'SURENDAR', 'SDF', 'SDF', '- - - - - -', 'SDF', '234234', '', '', '0000-00-00', 0, '2016-12-23 06:09:43'),
(2, 'SURENDAR', 'ASDF', 'SDAF', '- - - - - -', 'SDF', '5', '', '', '0000-00-00', 0, '2016-12-15 06:23:07'),
(3, 'ASD', 'ASD', 'ASD', '- - - - - -', 'ASD', 'ASD23', 'ASD', 'asdasd@gmail.com', '0000-00-00', 0, '2016-12-23 06:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `cb_storage`
--

CREATE TABLE `cb_storage` (
  `cid` int(11) NOT NULL,
  `storage_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `Location` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `joining_date` date NOT NULL,
  `advance` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_storage`
--

INSERT INTO `cb_storage` (`cid`, `storage_name`, `area_name`, `city_name`, `state_name`, `Location`, `pincode`, `joining_date`, `advance`, `created_date`) VALUES
(1, 'XXX', 'GUDUVANCHERI', 'CHENNAI', '- - - - - - -', '1', '603202', '0000-00-00', 0, '2017-02-03 02:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `cb_vendor`
--

CREATE TABLE `cb_vendor` (
  `cid` int(11) NOT NULL,
  `vendor_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `pincode` mediumint(9) NOT NULL,
  `joining_date` date NOT NULL,
  `advance` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_vendor`
--

INSERT INTO `cb_vendor` (`cid`, `vendor_name`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `joining_date`, `advance`, `created_date`) VALUES
(6, 'DFD', 'ASD', 'ASD', 'ASD', 'ASD', 123213, '0000-00-00', 0, '2016-11-25 06:02:22'),
(7, 'DFD', '', '', '', '', 0, '0000-00-00', 0, '2016-11-08 11:02:54'),
(8, 'DFD', '', '', '', '', 0, '0000-00-00', 0, '2016-11-08 11:03:02'),
(9, 'ASDDDD', '', '', '', '', 0, '0000-00-00', 0, '2016-11-08 11:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('dbc432756ee82bb72319db21a54cf594c220287c', '171.60.221.15', 1487573287, ''),
('359db6aad9d8377f70ad6a4da79c65c9032a3194', '171.60.221.15', 1487573312, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b),
('60826df7d881fa2506622d4caa88060c320c19a4', '171.60.221.15', 1487571536, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b),
('1bd99ae8881716cc843eceadf5d6242fb177e24b', '::1', 1487595443, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b),
('9cb01018f101051a8aa36811aa2ae4bb77197522', '::1', 1487585404, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b),
('bc301485d9f769c4d8fb06915ab96fd8c690b750', '::1', 1487654561, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b),
('215daa5bce1b144135fbee0963dfe5c7f31a8442', '::1', 1487681608, 0x757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2241646d696e223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224c45594c414e44223b);

-- --------------------------------------------------------

--
-- Table structure for table `cp_admin_login`
--

CREATE TABLE `cp_admin_login` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1-active,0-deactive',
  `user_type` tinyint(1) DEFAULT NULL COMMENT '1-admin,2-user',
  `is_delete` tinyint(1) NOT NULL COMMENT '1-delete,0-active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_admin_login`
--

INSERT INTO `cp_admin_login` (`admin_id`, `username`, `password`, `name`, `email_id`, `created_date`, `status`, `user_type`, `is_delete`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin@saiss.co.in', '2015-06-08 14:03:54', 1, 1, 0),
(3, 'KARTHIK', '123456', 'KARTHIKDIVLU', 'KARTHIK@SAISS.CO.IN', NULL, 1, 2, 0),
(5, 'KAJAMYDEEN', '123456', 'KAJA MYDEEN', 'KAJAMYDEEN@SAISS.CO.IN', NULL, 1, 2, 0),
(10, 'TESTING', 'TESTING', 'TESTING', 'MANI@SAISS.CO.IN', NULL, 1, 2, 1),
(11, 'BALA', 'BALABALA', 'BALAKRISHNAN', 'BALA.RAMTECHNOLOGY@GMAIL.COM', NULL, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `finished_goods_warehouse`
--

CREATE TABLE `finished_goods_warehouse` (
  `id` int(11) NOT NULL,
  `part_no` varchar(120) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finished_goods_warehouse`
--

INSERT INTO `finished_goods_warehouse` (`id`, `part_no`, `qty`, `created_date`) VALUES
(1, '24-POSH180/', 5, '2017-02-21'),
(2, '454#ff5465', 65, '2017-02-21'),
(3, '5656', 6, '2017-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_warehouse`
--

CREATE TABLE `inspection_warehouse` (
  `id` int(11) NOT NULL,
  `part_no` varchar(120) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_warehouse`
--

INSERT INTO `inspection_warehouse` (`id`, `part_no`, `qty`, `created_date`) VALUES
(1, '4354rtg', 45, '2017-02-21'),
(2, '435fggfg', 44, '2017-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `product_selling_price`
--

CREATE TABLE `product_selling_price` (
  `id` int(11) NOT NULL,
  `part_no` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `cost_inr` double NOT NULL DEFAULT '0',
  `inr_rates` double NOT NULL DEFAULT '0',
  `post_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_selling_price`
--

INSERT INTO `product_selling_price` (`id`, `part_no`, `price`, `cost_inr`, `inr_rates`, `post_dt`) VALUES
(1, '24-POSH180/', 12, 85, 1020, '2017-02-20'),
(2, '24-POSH45/6', 232, 85, 19720, '2017-02-20'),
(3, '24-POSH90', 23, 85, 1955, '2017-02-20'),
(4, '64-POSH', 23, 85, 1955, '2017-02-20'),
(5, '8054611', 2323, 85, 197455, '2017-02-20'),
(6, '8054612', 2323, 85, 197455, '2017-02-20'),
(7, '8054620', 2323, 85, 197455, '2017-02-20'),
(8, '8059967', 2323, 85, 197455, '2017-02-20'),
(9, '8061996', 25, 85, 2125, '2017-02-20'),
(10, '8062495', 345, 85, 29325, '2017-02-20'),
(11, '8062499', 678, 85, 57630, '2017-02-20'),
(12, '8063009', 8, 85, 680, '2017-02-20'),
(13, '8063016', 2323, 85, 197455, '2017-02-20'),
(14, '8063035', 2323, 85, 197455, '2017-02-20'),
(15, '8063210', 2323, 85, 197455, '2017-02-20'),
(16, '8063212', 2323, 85, 197455, '2017-02-20'),
(17, '8064138', 2323, 85, 197455, '2017-02-20'),
(18, '8064389', 345, 85, 29325, '2017-02-20'),
(19, '8064534', 213, 85, 18105, '2017-02-20'),
(20, '8067856', 345, 85, 29325, '2017-02-20'),
(21, '8067861', 654, 85, 55590, '2017-02-20'),
(22, '8067862', 234, 85, 19890, '2017-02-20'),
(23, 'M37-POSH90/', 1, 85, 46410, '2017-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_warehouse`
--

CREATE TABLE `rejection_warehouse` (
  `id` int(11) NOT NULL,
  `part_no` varchar(120) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejection_warehouse`
--

INSERT INTO `rejection_warehouse` (`id`, `part_no`, `qty`, `created_date`) VALUES
(1, '454rtt', 56, '2017-02-21'),
(2, '234', 56, '2017-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessories`
--

CREATE TABLE `tbl_accessories` (
  `acc_id` int(11) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `part_no` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `product_rate` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accessories`
--

INSERT INTO `tbl_accessories` (`acc_id`, `pro_name`, `part_no`, `description`, `qty`, `product_rate`, `created_date`) VALUES
(1, 'YYYY', 'Y1', 'DFDSF', 12, 100, '2017-02-03'),
(2, 'YY3', 'GEG44', 'FRRE', 12, 100, '2017-02-03'),
(3, '65465', 'TERY5', 'GRGD', 15, 500, '2017-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `c_id` int(11) NOT NULL,
  `c_code` varchar(200) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `dl_numbers` varchar(200) NOT NULL,
  `dl_numbers_one` varchar(200) NOT NULL,
  `vat_tin_no` varchar(200) NOT NULL,
  `credit_days` varchar(200) NOT NULL,
  `cst_no` varchar(200) NOT NULL,
  `headquarters_code` varchar(200) NOT NULL,
  `area_code` varchar(200) NOT NULL,
  `salesman` varchar(200) NOT NULL,
  `vat_cat` varchar(200) NOT NULL,
  `phoneno1` varchar(20) NOT NULL,
  `phoneno2` varchar(20) NOT NULL,
  `emailid1` varchar(200) NOT NULL,
  `emailid2` varchar(200) NOT NULL,
  `to_add` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `credit_limit` varchar(200) NOT NULL,
  `allow_bills` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `customer_status` tinyint(1) NOT NULL COMMENT '1-active,0-deactive',
  `is_delete` tinyint(1) NOT NULL COMMENT '1-delete,0-active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`c_id`, `c_code`, `c_name`, `address1`, `address2`, `dl_numbers`, `dl_numbers_one`, `vat_tin_no`, `credit_days`, `cst_no`, `headquarters_code`, `area_code`, `salesman`, `vat_cat`, `phoneno1`, `phoneno2`, `emailid1`, `emailid2`, `to_add`, `discount`, `credit_limit`, `allow_bills`, `created_date`, `customer_status`, `is_delete`) VALUES
(1, '12345', 'KAJA MYDEEN', 'ADDRESS1 100FT ROAD, COIMBATORE', 'ADDRESS2 100FT ROAD, COIMBATORE', 'DLNO11', '456', 'VATTIIN11', '10', 'CSTNO11', '1', '1', '1', '', '042259788552', '9788552401', 'kajamydeen@saiss.co.in', 'kajamydeen@saiss.co.in', '123', '12', '12000', '50', '2015-07-02 04:15:00', 1, 0),
(2, '12345DA', 'KAJA MYDEEN', 'DAD', 'DASDADADS', 'DLNO11', 'ADSD', 'VATTIIN11', '10', 'CSTNO11', '2', '2', '6', '', '9788888888', '978888888', '8888@gg', 'sSds@dfsf', '87', '12', '12000', '50', '2015-06-23 06:16:58', 1, 0),
(4, '123', 'KARTHIK', '123', '123', '123', '456', '123', '7', '123', '2', '2', '', '', '9042466586', '8012492415', 'karthik@saiss.co.in', 'karthikbecs90@gmail.com', '123', '123', '123', '123', '2015-06-23 06:16:41', 1, 0),
(5, '123123', 'KARTHIKDIVLU', 'COVAI 1', 'COVAI 2', '123', '456', '123', '7', '123', '2', '2', '', '', '9876543210', '8012492415', 'karthiks@saiss.co.in', 'karthikbecs90s@gmail.com', '123', '2', '123', '123', '2015-06-25 10:47:54', 1, 0),
(6, '123123QWE', 'KARTHIKDIVLU', 'COVAI 1', 'COVAI 2', '123', '456', '123', '7', '123', '2', '2', '', '', '9876543210', '8012492415', 'karthiks@saiss.co.in', 'karthikbecs90s@gmail.com', '123', '2', '123', '123', '2015-06-25 10:49:06', 1, 0),
(7, '123123QWEAS', 'KARTHIKDIVLU', 'COVAI 1', 'COVAI 2', '123', '456', '123', '7', '123', '2', '2', '', '', '9876543210', '8012492415', 'karthiks@saiss.co.in', 'karthikbecs90s@gmail.com', '123', '2', '123', '123', '2015-06-25 11:06:44', 1, 0),
(8, 'DASDA', 'DASDASD', 'ASDASDAS', 'ASDA DSA ASD', 'SASDASD', 'ASDASD', 'ASDASDAS', 'asdasda', 'DASDASD', '2', '2', '', '', '9788552401', '9788552401', 'sadasd@dfdfdf', 'sadasd@sdsdsd', '5', '12', 'asdasd', 'asdasdas', '2015-07-11 10:31:10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `id` int(11) NOT NULL,
  `po_no` int(11) NOT NULL DEFAULT '0',
  `po_date` date NOT NULL DEFAULT '0000-00-00',
  `part_no` varchar(11) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `cost` double NOT NULL DEFAULT '0',
  `cost_inr` double(10,0) NOT NULL DEFAULT '0',
  `inr_rate` double(10,0) NOT NULL DEFAULT '0',
  `expected_date` date NOT NULL DEFAULT '0000-00-00',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`id`, `po_no`, `po_date`, `part_no`, `description`, `qty`, `cost`, `cost_inr`, `inr_rate`, `expected_date`, `created_date`) VALUES
(1, 1234, '2017-02-20', '24-POSH180/', '38MM 180 90MM LEGS POSH', 6, 2.75, 85, 234, '2017-01-23', '2017-02-20'),
(2, 1234, '2017-02-20', '24-POSH45/6', '38MM POSH 45?', 6, 2.87, 85, 244, '2017-01-23', '2017-02-20'),
(3, 1234, '2017-02-20', '24-POSH90', '38MM 90 102MM LEGS POSH', 36, 2.15, 85, 183, '2017-01-23', '2017-02-20'),
(4, 1234, '2017-02-20', '64-POSH', '102X1000 POSH', 2, 22, 85, 1870, '2017-01-23', '2017-02-20'),
(5, 1234, '2017-02-20', '8054611', 'REDUCING 90? 70/50MM ? 157/125M', 6, 4.5, 85, 382, '2017-01-23', '2017-02-20'),
(6, 1234, '2017-02-20', '8054612', '70MM 90 ELBOW 185MM LEGS', 6, 6.07, 85, 516, '2017-01-23', '2017-02-20'),
(7, 1234, '2017-02-20', '8054620', '70MM/64MM REDUCER X 87MM LONG', 6, 1.93, 85, 164, '2017-01-23', '2017-02-20'),
(8, 1234, '2017-02-20', '8059967', 'REDUCING 125? 102/90MM? WITH 12', 6, 5.83, 85, 496, '2017-01-23', '2017-02-20'),
(9, 1234, '2017-02-20', '8061996', '2 BEND HOSE 30MM?', 6, 2.85, 85, 242, '2017-01-23', '2017-02-20'),
(10, 1234, '2017-02-20', '8062495', 'REDUCING 90? 70/64MM? WITH 255/1', 6, 6.23, 85, 530, '2017-01-23', '2017-02-20'),
(11, 1234, '2017-02-20', '8062499', '159? 70MM ? WITH 190/100MM LEGS', 6, 4.97, 85, 422, '2017-01-23', '2017-02-20'),
(12, 1234, '2017-02-20', '8063009', 'SHAPED HOSE 25.4MM ?', 6, 2.55, 85, 217, '2017-01-23', '2017-02-20'),
(13, 1234, '2017-02-20', '8063016', '155? WITH 95MM LEGS', 6, 1.95, 85, 166, '2017-01-23', '2017-02-20'),
(14, 1234, '2017-02-20', '8063035', 'REDUCING 111? 70/50MM WITH 25MM', 6, 7.17, 85, 609, '2017-01-23', '2017-02-20'),
(15, 1234, '2017-02-20', '8063210', '110? 70MM? WITH 136/120MM LEGS', 6, 4.54, 85, 386, '2017-01-23', '2017-02-20'),
(16, 1234, '2017-02-20', '8063212', '102/90MM 90 REDUCER WITH 210/125', 6, 8.11, 85, 689, '2017-01-23', '2017-02-20'),
(17, 1234, '2017-02-20', '8064138', 'S SHAPED HOSE 70MM ?', 6, 6.2, 85, 527, '2017-01-23', '2017-02-20'),
(18, 1234, '2017-02-20', '8064389', 'REDUCING 90? 32/30MM? WITH 137/2', 6, 3.91, 85, 332, '2017-01-23', '2017-02-20'),
(19, 1234, '2017-02-20', '8064534', '258MM? X 150MM LONG WIH CUTOU', 6, 15, 85, 1275, '2017-01-23', '2017-02-20'),
(20, 1234, '2017-02-20', '8067856', '9MM X 1.3 MTRS POSH', 12, 3.62, 85, 308, '2017-01-23', '2017-02-20'),
(21, 1234, '2017-02-20', '8067861', 'SILICONE REDUCER 16/9MM? 1500M', 6, 6.51, 85, 553, '2017-01-23', '2017-02-20'),
(22, 1234, '2017-02-20', '8067862', 'SILICONE REDUCER 16/9MM? 530MM', 6, 2.8, 85, 238, '2017-01-23', '2017-02-20'),
(23, 1234, '2017-02-20', 'M37-POSH90/', '37MM 90 WITH 200MM LEGS POSH', 6, 3.56, 85, 303, '2017-01-23', '2017-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(200) NOT NULL,
  `part_no` varchar(30) DEFAULT NULL,
  `prate` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `descr` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`i_id`, `i_name`, `part_no`, `prate`, `qty`, `descr`, `date`, `status`, `is_delete`) VALUES
(1, 'xxxx', 'x113', 10000, 155, 'xxxxx', '2017-02-15', 0, 0),
(2, 'DD', 'DFR', 0, 45, 'SGR', '2017-02-03', 1, 0),
(3, 'SF', 'GTGRE6356', 5000, 15, 'RYT', '2017-02-03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trimming_warehouse`
--

CREATE TABLE `trimming_warehouse` (
  `id` int(11) NOT NULL,
  `part_no` varchar(120) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimming_warehouse`
--

INSERT INTO `trimming_warehouse` (`id`, `part_no`, `qty`, `created_date`) VALUES
(1, '454#ff', 40, '2017-02-21'),
(2, '4566', 6, '2017-02-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cb_customer`
--
ALTER TABLE `cb_customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cb_employee`
--
ALTER TABLE `cb_employee`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cb_seller`
--
ALTER TABLE `cb_seller`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cb_storage`
--
ALTER TABLE `cb_storage`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cb_vendor`
--
ALTER TABLE `cb_vendor`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ci_session`
--
ALTER TABLE `ci_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `cp_admin_login`
--
ALTER TABLE `cp_admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `finished_goods_warehouse`
--
ALTER TABLE `finished_goods_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_warehouse`
--
ALTER TABLE `inspection_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_selling_price`
--
ALTER TABLE `product_selling_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_warehouse`
--
ALTER TABLE `rejection_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accessories`
--
ALTER TABLE `tbl_accessories`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `trimming_warehouse`
--
ALTER TABLE `trimming_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cb_customer`
--
ALTER TABLE `cb_customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cb_employee`
--
ALTER TABLE `cb_employee`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cb_seller`
--
ALTER TABLE `cb_seller`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cb_storage`
--
ALTER TABLE `cb_storage`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cb_vendor`
--
ALTER TABLE `cb_vendor`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cp_admin_login`
--
ALTER TABLE `cp_admin_login`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `finished_goods_warehouse`
--
ALTER TABLE `finished_goods_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inspection_warehouse`
--
ALTER TABLE `inspection_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_selling_price`
--
ALTER TABLE `product_selling_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `rejection_warehouse`
--
ALTER TABLE `rejection_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_accessories`
--
ALTER TABLE `tbl_accessories`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trimming_warehouse`
--
ALTER TABLE `trimming_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
