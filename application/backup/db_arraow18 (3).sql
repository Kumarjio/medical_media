-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2017 at 04:35 AM
-- Server version: 5.6.33-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_arraow18`
--

-- --------------------------------------------------------

--
-- Table structure for table `cb_customer`
--

CREATE TABLE IF NOT EXISTS `cb_customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `credit_days` int(11) NOT NULL DEFAULT '0',
  `mob_no1` varchar(11) DEFAULT NULL,
  `landline_no` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `pincode` varchar(205) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cb_customer_master`
--

CREATE TABLE IF NOT EXISTS `cb_customer_master` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `post_dt` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_customer_master`
--

INSERT INTO `cb_customer_master` (`id`, `type_name`, `post_dt`) VALUES
(1, 'regular', '2017-02-10'),
(2, 'special', '2017-02-10'),
(3, 'important', '2017-02-15'),
(4, 'RO CUSTOMER', '2017-02-20'),
(5, 'general', '2017-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `cb_seller`
--

CREATE TABLE IF NOT EXISTS `cb_seller` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `credit_days` int(11) NOT NULL DEFAULT '0',
  `seller_name` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(505) NOT NULL,
  `vendor_location` varchar(255) DEFAULT NULL,
  `tin_no` varchar(255) DEFAULT NULL,
  `cst_no` varchar(255) DEFAULT NULL,
  `service_tax` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cb_storage`
--

CREATE TABLE IF NOT EXISTS `cb_storage` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `storage_name` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('07fa31062829de29a0a7814b698a2c2ebc94298f', '::1', 1503467166, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313530333436363931363b),
('2423de7378c4877f7236d18592d7200ee1487491', '122.164.75.147', 1490780717, ''),
('2035ece8232ba76286c0cbcf27e0f329c1530595', '122.164.75.147', 1490781293, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22416c776172706574223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c4e3b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b),
('d49f33b994a79eeb01edc1c65a86db4000894c08', '122.164.75.147', 1490782419, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22416c776172706574223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c4e3b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b),
('2db9781b60daa380ad1132171628843717dd133f', '122.164.75.147', 1490783694, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22416c776172706574223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c4e3b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b);

-- --------------------------------------------------------

--
-- Table structure for table `cp_admin_login`
--

CREATE TABLE IF NOT EXISTS `cp_admin_login` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `emp_code` varchar(100) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1-active,0-deactive',
  `user_type` int(11) DEFAULT '0' COMMENT '1-admin,2-user',
  `is_delete` tinyint(1) NOT NULL COMMENT '1-delete,0-active',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cp_admin_login`
--

INSERT INTO `cp_admin_login` (`admin_id`, `username`, `password`, `name`, `emp_code`, `email_id`, `phone`, `area_name`, `created_date`, `status`, `user_type`, `is_delete`) VALUES
(1, 'admin', 'admin', 'admin', 'admin11', NULL, '24546', 'Alwarpet', '2017-03-09 01:45:09', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_master`
--

CREATE TABLE IF NOT EXISTS `expenses_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expenses_type` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expenses_master`
--

INSERT INTO `expenses_master` (`id`, `expenses_type`, `date`) VALUES
(1, 'installation charges', '2017-03-15'),
(2, 'delivery charges', '2017-03-15'),
(3, 'auto charges', '2017-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `master_location`
--

CREATE TABLE IF NOT EXISTS `master_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_state_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_state`
--

CREATE TABLE IF NOT EXISTS `master_state` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_state`
--

INSERT INTO `master_state` (`id`, `state`) VALUES
(1, 'ANDHRA PRADESH'),
(2, 'ASSAM'),
(3, 'ARUNACHAL PRADESH'),
(4, 'GUJRAT'),
(5, 'BIHAR'),
(6, 'HARYANA'),
(7, 'HIMACHAL PRADESH'),
(8, 'JAMMU & KASHMIR'),
(9, 'KARNATAKA'),
(10, 'KERALA'),
(11, 'MADHYA PRADESH'),
(12, 'MAHARASHTRA'),
(13, 'MANIPUR'),
(14, 'MEGHALAYA'),
(15, 'MIZORAM'),
(16, 'NAGALAND'),
(17, 'ORISSA'),
(18, 'PUNJAB'),
(19, 'RAJASTHAN'),
(20, 'SIKKIM'),
(21, 'TAMIL NADU'),
(22, 'TRIPURA'),
(23, 'UTTAR PRADESH'),
(24, 'WEST BENGAL'),
(25, 'DELHI'),
(26, 'GOA'),
(27, 'PONDICHERY'),
(28, 'LAKSHDWEEP'),
(29, 'DAMAN & DIU'),
(30, 'DADRA & NAGAR'),
(31, 'CHANDIGARH'),
(32, 'ANDAMAN & NICOBAR'),
(33, 'UTTARANCHAL'),
(34, 'JHARKHAND'),
(35, 'CHATTISGARH');

-- --------------------------------------------------------

--
-- Table structure for table `pro_type`
--

CREATE TABLE IF NOT EXISTS `pro_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `post_dt` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pro_type`
--

INSERT INTO `pro_type` (`id`, `type_name`, `post_dt`) VALUES
(1, 'Laptop', '2017-03-24'),
(2, 'Mobile', '2017-03-24'),
(3, 'Tablets', '2017-03-24'),
(4, 'Software', '2017-03-24'),
(5, 'Accessories', '2017-03-24'),
(6, 'mointor', '2017-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE IF NOT EXISTS `purchase_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `tbl_purchase_req_id` int(11) NOT NULL DEFAULT '0',
  `vendor_date` date NOT NULL DEFAULT '0000-00-00',
  `location` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_invoice` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT '0',
  `tbl_product_id` int(11) DEFAULT '0',
  `p_rate` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `status_req` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`id`, `emp_id`, `tbl_purchase_req_id`, `vendor_date`, `location`, `vendor_name`, `vendor_invoice`, `qty`, `tbl_product_id`, `p_rate`, `created_date`, `status_req`) VALUES
(1, 1, 0, '2015-12-01', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '', 2, 1, 756, '2017-03-24', 0),
(2, 1, 0, '2017-03-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204131036', 10, 2, 460, '2017-03-24', 0),
(3, 1, 0, '2016-11-21', 'Alwarpet', 'RIGHT SYSTEMS &SOLUTIONS', '2575', 1, 3, 2000, '2017-03-24', 0),
(4, 1, 0, '2016-08-08', 'Alwarpet', 'The Fone Line', 'Moto-Acc-63-16/17', 1, 4, 1117, '2017-03-24', 0),
(5, 1, 0, '2016-08-06', 'Alwarpet', 'The Fone Line', 'Moto-Acc-60-16/17', 1, 5, 3064, '2017-03-24', 0),
(6, 1, 0, '2017-03-10', 'Alwarpet', 'PELIKAN OFFICE AUTOMATION PVT LTD', 'MR/29996', 1, 6, 490, '2017-03-24', 0),
(7, 1, 0, '2016-08-08', 'Alwarpet', 'The Fone Line', 'Moto-Acc-60-16/17', 1, 7, 2872, '2017-03-24', 0),
(8, 1, 0, '2016-03-04', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1024864', 1, 8, 9190, '2017-03-24', 0),
(9, 1, 0, '2016-03-22', 'Alwarpet', 'M/S.RX INFOTECH P LIMITED', 'VI-CHN/02095/15-16', 1, 9, 885, '2017-03-24', 0),
(10, 1, 0, '2017-02-24', 'Alwarpet', 'M/S.RX INFOTECH P LIMITED', 'VI-CHN/01449/16-17', 3, 10, 900, '2017-03-24', 0),
(11, 1, 0, '2017-01-30', 'Alwarpet', 'M/S.RX INFOTECH P LIMITED', 'VI-CHN/01194/16-17', 9, 11, 960, '2017-03-24', 0),
(12, 1, 0, '2017-03-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204131036', 2, 12, 1664, '2017-03-24', 0),
(13, 1, 0, '2016-03-22', 'Alwarpet', 'M/S.RX INFOTECH P LIMITED', 'VI-CHN/02095/15-16', 8, 13, 580, '2017-03-24', 0),
(14, 1, 0, '2017-03-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204131036', 16, 14, 595, '2017-03-24', 0),
(15, 1, 0, '2017-03-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204131036', 6, 15, 177, '2017-03-24', 0),
(16, 1, 0, '2016-08-19', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204127180', 9, 16, 590, '2017-03-24', 0),
(17, 1, 0, '2016-07-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204126537', 1, 17, 1999, '2017-03-24', 0),
(18, 1, 0, '2016-12-24', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204129465', 2, 18, 450, '2017-03-24', 0),
(19, 1, 0, '2016-05-26', 'Alwarpet', 'M/S.RX INFOTECH P LIMITED', 'VI-CHN/02125/15-16', 2, 19, 1340, '2017-03-24', 0),
(20, 1, 0, '2015-11-20', 'Alwarpet', 'NEOTERIC INFOMATIQUE LTD', 'PSI/CHE/1516/03242-1', 1, 20, 1260, '2017-03-24', 0),
(21, 1, 0, '2016-07-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204126537', 2, 21, 645, '2017-03-24', 0),
(22, 1, 0, '2016-12-24', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204129465', 12, 22, 480, '2017-03-24', 0),
(23, 1, 0, '2016-07-16', 'Alwarpet', 'COMPUAGE INFOCOM LIMITED', '1204126537', 3, 23, 645, '2017-03-24', 0),
(24, 1, 0, '2016-11-26', 'Alwarpet', 'Ingram Micro India P Ltd', '10-10198811', 1, 24, 37923, '2017-03-24', 0),
(25, 1, 0, '1970-01-01', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', '', 23, 25, 1, '2017-03-24', 0),
(26, 1, 0, '2016-09-07', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'FR', -3, 26, 28664, '2017-03-24', 0),
(27, 1, 0, '2017-03-10', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'MDRTI1617105381', 1, 27, 29990, '2017-03-24', 0),
(28, 1, 0, '2017-03-10', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'MDRTI1617105381', 1, 28, 29990, '2017-03-24', 0),
(29, 1, 0, '2017-03-10', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'MDRTI1617105381', 1, 29, 29990, '2017-03-24', 0),
(30, 1, 0, '2017-02-27', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112221', 1, 30, 22990, '2017-03-24', 0),
(31, 1, 0, '2017-02-23', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112109', 1, 31, 28990, '2017-03-24', 0),
(32, 1, 0, '2017-03-21', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112832', 1, 32, 32490, '2017-03-24', 0),
(33, 1, 0, '2017-02-23', 'Alwarpet', 'Redington (India) Ltd', 'C794756', 1, 33, 40769, '2017-03-24', 0),
(34, 1, 0, '2017-02-25', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'COITI1617106449', 1, 34, 48501, '2017-03-24', 0),
(35, 1, 0, '2016-03-28', 'Alwarpet', 'NEOTERIC INFOMATIQUE LTD', 'PSI/CHE/1516/04963', 1, 35, 49831, '2017-03-24', 0),
(36, 1, 0, '2016-11-15', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617109554', 1, 36, 56135, '2017-03-24', 0),
(37, 1, 0, '2017-01-28', 'Alwarpet', 'Redington (India) Ltd', 'C792803', 1, 37, 57120, '2017-03-24', 0),
(38, 1, 0, '2016-12-28', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617110538', 1, 38, 57120, '2017-03-24', 0),
(39, 1, 0, '2017-02-23', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112109', 1, 39, 69433, '2017-03-24', 0),
(40, 1, 0, '2017-02-10', 'Alwarpet', 'RASHI PERIPHERALS PVT LTD', '4400102591', 1, 40, 58990, '2017-03-24', 0),
(41, 1, 0, '2017-03-15', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112653', 1, 41, 16243, '2017-03-24', 0),
(42, 1, 0, '2016-03-07', 'Alwarpet', 'NEOTERIC INFOMATIQUE LTD', 'PSI/CHE/1516/04730', 1, 42, 48058, '2017-03-24', 0),
(43, 1, 0, '2017-03-15', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112653', 1, 43, 29540, '2017-03-24', 0),
(44, 1, 0, '2017-02-23', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112109', 1, 44, 55643, '2017-03-24', 0),
(45, 1, 0, '2016-08-29', 'Alwarpet', 'The Fone Line', 'LEC-497/16-17', 1, 45, 6500, '2017-03-24', 0),
(46, 1, 0, '2017-09-16', 'Alwarpet', 'The Fone Line', 'LEC-672/16-17', 1, 46, 3839, '2017-03-24', 0),
(47, 1, 0, '2016-12-07', 'Alwarpet', 'The Fone Line', 'LEC-940/16-17', 1, 47, 3839, '2017-03-24', 0),
(48, 1, 0, '2016-12-07', 'Alwarpet', 'The Fone Line', 'LEC-940/16-17', 1, 48, 3839, '2017-03-24', 0),
(49, 1, 0, '2017-02-24', 'Alwarpet', 'The Fone Line', 'LEC-1235/16-17', 1, 49, 6505, '2017-03-24', 0),
(50, 1, 0, '2017-02-24', 'Alwarpet', 'The Fone Line', 'LEC-1235/16-17', 1, 50, 6505, '2017-03-24', 0),
(51, 1, 0, '2017-02-27', 'Alwarpet', 'The Fone Line', 'LEC-1240/16-17', 1, 51, 7240, '2017-03-24', 0),
(52, 1, 0, '2017-02-16', 'Alwarpet', 'The Fone Line', 'LEC-1211/16-17', 1, 52, 7122, '2017-03-24', 0),
(53, 1, 0, '2017-02-27', 'Alwarpet', 'The Fone Line', 'LEC-1240/16-17', 1, 53, 7240, '2017-03-24', 0),
(54, 1, 0, '2017-02-16', 'Alwarpet', 'The Fone Line', 'LEC-1211/16-17', 1, 54, 7122, '2017-03-24', 0),
(55, 1, 0, '2017-02-16', 'Alwarpet', 'The Fone Line', 'LEC-1211/16-17', 1, 55, 7122, '2017-03-24', 0),
(56, 1, 0, '2016-11-23', 'Alwarpet', 'The Fone Line', 'LEC-892/16-17', 1, 56, 3710, '2017-03-24', 0),
(57, 1, 0, '2017-02-27', 'Alwarpet', 'The Fone Line', 'LEC-1240/16-17', 1, 57, 7946, '2017-03-24', 0),
(58, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 58, 7476, '2017-03-24', 0),
(59, 1, 0, '2017-02-16', 'Alwarpet', 'The Fone Line', 'LEC-1211/16-17', 1, 59, 7816, '2017-03-24', 0),
(60, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 60, 7476, '2017-03-24', 0),
(61, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 61, 7476, '2017-03-24', 0),
(62, 1, 0, '2017-02-09', 'Alwarpet', 'The Fone Line', 'LEC-1207/16-17', 1, 62, 7816, '2017-03-24', 0),
(63, 1, 0, '2017-02-16', 'Alwarpet', 'The Fone Line', 'LEC-1212/16-17', 0, 63, 15714, '2017-03-24', 0),
(64, 1, 0, '2017-03-10', 'Alwarpet', 'The Fone Line', 'LEC-1276/16-17', 1, 64, 15999, '2017-03-24', 0),
(65, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 65, 15999, '2017-03-24', 0),
(66, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 66, 15999, '2017-03-24', 0),
(67, 1, 0, '2017-03-21', 'Alwarpet', 'The Fone Line', 'LEC-1306/16-17', 1, 67, 15999, '2017-03-24', 0),
(68, 1, 0, '2017-03-07', 'Alwarpet', 'The Fone Line', 'MOTO-91/16-17', 0, 68, 13713, '2017-03-24', 0),
(69, 1, 0, '2017-03-10', 'Alwarpet', 'The Fone Line', 'MOTO-96/16-17', 1, 69, 23093, '2017-03-24', 0),
(70, 1, 0, '2016-04-20', 'Alwarpet', 'PELIKAN OFFICE AUTOMATION PVT LTD', 'MR/1296', 2, 70, 2596, '2017-03-24', 0),
(71, 1, 0, '2016-07-19', 'Alwarpet', 'MR.VEROSILOVE', '', 1, 71, 332, '2017-03-24', 0),
(72, 1, 0, '2017-01-27', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1025280', 1, 72, 19500, '2017-03-24', 0),
(73, 1, 0, '2017-01-27', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1025280', 1, 73, 4428, '2017-03-24', 0),
(74, 1, 0, '2017-03-06', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1029214', 1, 74, 11800, '2017-03-24', 0),
(75, 1, 0, '2017-03-06', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1029214', 1, 75, 9000, '2017-03-24', 0),
(76, 1, 0, '2017-03-20', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112778', 1, 76, 45850, '2017-03-24', 0),
(77, 1, 0, '2017-06-21', 'Alwarpet', 'IRIS COMPUTERS LTD', 'S201-22-1606-119', 1, 77, 8366, '2017-03-24', 0),
(78, 1, 0, '2017-03-15', 'Alwarpet', 'SAVEX TECHNOLOGIES PVT.LTD', 'CHNTI1617112653', 1, 78, 45850, '2017-03-24', 0),
(79, 1, 0, '2017-03-06', 'Alwarpet', 'INGRAM MICRO INDIA PVT LTD', '10-1029214', 1, 79, 9000, '2017-03-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_duplicate`
--

CREATE TABLE IF NOT EXISTS `purchase_product_duplicate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `tbl_purchase_req_id` int(11) NOT NULL DEFAULT '0',
  `tbl_product_id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `req_qty` int(11) NOT NULL DEFAULT '0',
  `req_emp_id` int(11) NOT NULL DEFAULT '0',
  `req_emp_location` varchar(255) DEFAULT NULL,
  `p_rate` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `status_req` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_product_duplicate`
--

INSERT INTO `purchase_product_duplicate` (`id`, `emp_id`, `tbl_purchase_req_id`, `tbl_product_id`, `location`, `qty`, `req_qty`, `req_emp_id`, `req_emp_location`, `p_rate`, `created_date`, `status_req`) VALUES
(2, 1, 1, 4, 'ambattur', 10, 0, 0, NULL, 285000, '2017-03-22', 0),
(3, 1, 2, 1, 'ambattur', 6, 0, 0, NULL, 285000, '2017-03-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(11) DEFAULT NULL,
  `paid_amt` double NOT NULL DEFAULT '0',
  `customer_code` varchar(200) DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sales_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive',
  PRIMARY KEY (`s_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`s_no`, `sales_id`, `paid_amt`, `customer_code`, `total_amount`, `created_date`, `sales_status`) VALUES
(1, '1', 130, '1', 1130, '2017-03-21 16:37:06', 0),
(2, '2', 0, '1', 37933.15, '2017-03-24 14:22:13', 0),
(3, '3', 0, '3', 5136, '2017-03-24 16:55:17', 0),
(4, '4', 4750, '2', 5200, '2017-03-24 17:11:14', 0),
(5, '5', 0, '3', 5250, '2017-03-24 17:22:36', 0),
(6, '6', 0, '3', 5250, '2017-03-24 17:23:23', 0),
(7, '7', 5350, '3', 5350, '2017-03-24 18:48:13', 0),
(8, '8', 1070, '4', 1070, '2017-03-27 12:15:40', 0),
(9, '9', 117600, '5', 117600, '2017-03-27 13:32:18', 0),
(10, '10', 2000000, '5', 200000, '2017-03-27 20:24:16', 0),
(11, '11', 0, '6', 16585, '2017-03-28 12:40:41', 0),
(12, '12', 18725, '8', 18725, '2017-03-28 16:12:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice_payment` (
  `inoivce_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_invoice_id` varchar(11) DEFAULT NULL,
  `customer_code` varchar(200) DEFAULT NULL,
  `reference_no` varchar(11) DEFAULT NULL,
  `cheque_no` varchar(11) DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `product_amount` double NOT NULL DEFAULT '0',
  `payment_method` varchar(4) DEFAULT NULL,
  `get_amt_date` date NOT NULL DEFAULT '0000-00-00',
  `payment_date` date NOT NULL DEFAULT '0000-00-00',
  `paym_amount` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `sales_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive',
  PRIMARY KEY (`inoivce_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_invoice_payment`
--

INSERT INTO `tbl_invoice_payment` (`inoivce_id`, `tbl_invoice_id`, `customer_code`, `reference_no`, `cheque_no`, `trans_id`, `bank_name`, `product_amount`, `payment_method`, `get_amt_date`, `payment_date`, `paym_amount`, `created_date`, `sales_status`) VALUES
(1, '1', '1', 'wwrewtery', '', '', '', 1130, '3', '2017-03-21', '2017-03-21', 130, '2017-03-21', 0),
(2, '4', '2', '', '', '13131313131313', '', 5200, '4', '2017-03-23', '2017-03-24', 4750, '2017-03-24', 0),
(3, '7', '3', '', '', '', '', 5350, '1', '0000-00-00', '2017-03-24', 5350, '2017-03-24', 0),
(4, '8', '4', '', '', '', '', 1070, '1', '0000-00-00', '2017-03-27', 1070, '2017-03-27', 0),
(5, '9', '5', '', '', '4584641464646', '', 117600, '4', '2017-03-30', '2017-03-27', 117600, '2017-03-27', 0),
(6, '10', '5', '4564646', '', '', '', 200000, '3', '2017-03-29', '2017-03-27', 2000000, '2017-03-27', 0),
(7, '12', '8', '', '', '5886', '', 18725, '4', '2017-03-24', '2017-03-28', 18725, '2017-03-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE IF NOT EXISTS `tbl_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `deignation` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL DEFAULT '0',
  `leads_from` varchar(120) DEFAULT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT '0',
  `assigned_by` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`id`, `name`, `deignation`, `mobile`, `leads_from`, `assigned_to`, `assigned_by`, `created_date`) VALUES
(1, 'ANU', 'XXXX', 2147483647, 'X1', 2, 1, '2017-02-28'),
(2, 'ATHYA', 'YYYY', 877878707, 'YYY', 0, 0, '2017-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_inv`
--

CREATE TABLE IF NOT EXISTS `tbl_po_inv` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `pdate` date NOT NULL DEFAULT '0000-00-00',
  `storage_name` varchar(40) DEFAULT NULL,
  `shortage_qty` int(11) NOT NULL DEFAULT '0',
  `damage_qty` int(11) NOT NULL DEFAULT '0',
  `vinvno` varchar(60) DEFAULT NULL,
  `supplier_date` date NOT NULL DEFAULT '0000-00-00',
  `remarks` varchar(200) DEFAULT NULL,
  `taxamount` double NOT NULL DEFAULT '0',
  `gtotal` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`po_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_po_inv`
--

INSERT INTO `tbl_po_inv` (`po_id`, `emp_id`, `pdate`, `storage_name`, `shortage_qty`, `damage_qty`, `vinvno`, `supplier_date`, `remarks`, `taxamount`, `gtotal`, `created_date`, `status`) VALUES
(1, 1, '2017-03-22', 'ambattur', 0, 0, '35454', '2017-03-22', 'grfh', 35000, 285000, '2017-03-22', 1),
(2, 1, '2017-03-26', 'ambattur', 1, 0, 's121131', '2017-03-27', 'fafsadf', 17500, 142500, '2017-03-26', 1),
(3, 1, '2017-03-26', 'ambattur', 1, 1, 's121131', '2017-03-27', 'fafsadf', 17500, 142500, '2017-03-26', 1),
(4, 1, '2017-03-27', 'AMBATTUR', 1, 0, 's1231312', '2017-03-27', 'stock inward', 17500, 142500, '2017-03-27', 1),
(5, 1, '2017-03-27', 'tertye', 0, 0, 'tgerye', '2017-03-27', 'geryt', 5600, 45600, '2017-03-27', 1),
(6, 1, '2017-03-27', 'tertye', 0, 0, 'tgerye', '2017-03-27', 'geryt', 5600, 45600, '2017-03-27', 1),
(7, 1, '2017-03-27', 'ambattur', 0, 0, 'dgedht', '2017-03-27', 'retrt', 3500, 28500, '2017-03-27', 1),
(8, 1, '2017-03-27', 'nungambakkam', 0, 0, '1234546', '2017-03-27', 'xgfdhg', 7000, 57000, '2017-03-27', 1),
(9, 1, '2017-03-27', '', 0, 0, 'a0012313', '2017-03-30', 'being stock inward', 20790, 169290, '2017-03-27', 1),
(10, 1, '2017-03-27', 'chennai', 0, 0, 's0021', '2017-03-29', 'mobile purchase', 350, 2850, '2017-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_inv_item`
--

CREATE TABLE IF NOT EXISTS `tbl_po_inv_item` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_inv_id` int(60) NOT NULL DEFAULT '0',
  `vname` varchar(255) DEFAULT NULL,
  `tbl_purchase_req_id` int(11) NOT NULL DEFAULT '0',
  `tbl_pro_id` int(11) NOT NULL DEFAULT '0',
  `p_rate` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `ven_credit_days` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_po_inv_item`
--

INSERT INTO `tbl_po_inv_item` (`pi_id`, `po_inv_id`, `vname`, `tbl_purchase_req_id`, `tbl_pro_id`, `p_rate`, `qty`, `total`, `date`, `ven_credit_days`, `status`, `is_delete`) VALUES
(1, 1, 'NEW VENDOR', 1, 4, 10000, 10, 285000, '2017-03-22', 50, 1, 0),
(2, 1, 'NEW VENDOR2', 2, 1, 25000, 6, 285000, '2017-03-22', 45, 1, 0),
(3, 2, 'NEW VENDOR2', 2, 1, 25000, 5, 142500, '2017-03-26', 45, 1, 0),
(4, 3, 'NEW VENDOR2', 2, 1, 25000, 5, 142500, '2017-03-26', 45, 1, 0),
(5, 4, 'NEW VENDOR2', 2, 1, 25000, 5, 142500, '2017-03-27', 45, 1, 0),
(6, 5, 'NEW VENDOR', 1, 4, 10000, 4, 45600, '2017-03-27', 50, 1, 0),
(7, 6, 'NEW VENDOR', 1, 4, 10000, 4, 45600, '2017-03-27', 50, 1, 0),
(8, 7, 'NEW VENDOR2', 2, 1, 25000, 1, 28500, '2017-03-27', 45, 1, 0),
(9, 8, 'NEW VENDOR2', 2, 1, 25000, 2, 57000, '2017-03-27', 45, 1, 0),
(10, 9, 'ABC COMPANY PRIVATE LTD.', 3, 30, 48500, 1, 169290, '2017-03-27', 30, 1, 0),
(11, 9, 'NEW VENDOR', 1, 4, 10000, 10, 169290, '2017-03-27', 50, 1, 0),
(12, 10, 'NEW VENDOR2', 4, 26, 500, 5, 2850, '2017-03-27', 45, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricelist`
--

CREATE TABLE IF NOT EXISTS `tbl_pricelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `po_id` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `storage` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_pricelist`
--

INSERT INTO `tbl_pricelist` (`id`, `type`, `po_id`, `price`, `storage`, `created_date`) VALUES
(1, 1, 1, 100, '1', '2017-03-09'),
(2, 2, 2, 600, '1', '2017-03-09'),
(3, 2, 5, 454, '1', '2017-03-09'),
(4, 1, 6, 456, '1', '2017-03-09'),
(5, 1, 41, 6000, NULL, '2017-03-26'),
(6, 1, 29, 50000, NULL, '2017-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_category` varchar(200) NOT NULL,
  `ime_serial` varchar(255) DEFAULT NULL,
  `i_name` varchar(200) NOT NULL,
  `descr` text NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`i_id`, `i_category`, `ime_serial`, `i_name`, `descr`, `date`, `status`, `is_delete`) VALUES
(1, '5', '', 'M0620', 'M0620 Lenovo Speaker (Black)', '2017-03-24', 0, 0),
(2, '5', '', 'bo300 Wireless Mouse', '1017453 Kb Mice_bo300 Wireless Mouse', '2017-03-24', 0, 0),
(3, '5', '', '4GB Ram', '4GBDDR3/2133MHZ', '2017-03-24', 0, 0),
(4, '5', '', 'Car Charger Flash 25 Vpa Turbo', 'Car Charger Flash 25 Vpa Turbo', '2017-03-24', 0, 0),
(5, '5', '', 'H2770 Wirelessheadset(Moto Silver Secound II)', 'H2770 Wirelessheadset(Moto Silver Secound II)', '2017-03-24', 0, 0),
(6, '5', '', 'HP-INK CARTRIDGE-678 BLACK', 'HP-INK CARTRIDGE-678 BLACK', '2017-03-24', 0, 0),
(7, '5', '', 'Hz850 Whisper Wireless Headsets', 'Hz850 Whisper Wireless Headsets', '2017-03-24', 0, 0),
(8, '5', '', 'IDEACENTRE STRICK 300-01IBY', 'IDEACENTRE STRICK 300-01IBY', '2017-03-24', 0, 0),
(9, '5', '', 'LENOVO 500 EAR HEADPHONE', 'LENOVO 500 EAR HEADPHONE', '2017-03-24', 0, 0),
(10, '5', '', 'Lenovo 65 W Adapter in-Sdc 888015000', 'Lenovo 65 W Adapter in-Sdc 888015000', '2017-03-24', 0, 0),
(11, '5', '', 'LENOVO KB MICE_WIRELESS COMBO-GX3066303', 'LENOVO KB MICE_WIRELESS COMBO-GX3066303', '2017-03-24', 0, 0),
(12, '5', '', 'LENOVO SLIM DVD BURNER DB65(888015471)', 'LENOVO SLIM DVD BURNER DB65(888015471)', '2017-03-24', 0, 0),
(13, '5', '', 'LENOVO WIRED KM COMBO', 'LENOVO WIRED KM COMBO', '2017-03-24', 0, 0),
(14, '5', '', 'M0520', 'M0520-SPEAKER 2.0', '2017-03-24', 0, 0),
(15, '5', '', 'M110', 'M110 OPTICAL MOUSE COLOR', '2017-03-24', 0, 0),
(16, '5', '', 'N50 WIRELESS MOUSE', 'N50 WIRELESS MOUSE', '2017-03-24', 0, 0),
(17, '5', '', 'N700 Wire Less Mouse', 'N700 Wire Less Mouse', '2017-03-24', 0, 0),
(18, '5', '', 'P410', 'P410 HEADSET', '2017-03-24', 0, 0),
(19, '5', '', 'POWER BANK 10000mAh', 'POWER BANK 10000mAh', '2017-03-24', 0, 0),
(20, '5', '', 'POWERBANK PB410 5000MAH', 'POWERBANK PB410 5000MAH', '2017-03-24', 0, 0),
(21, '5', '', 'WIRELESS MOUSE BLUE', 'WIRELESS MOUSE BLUE', '2017-03-24', 0, 0),
(22, '5', '', 'WIRELESS MOUSE N100 BLACK', 'WIRELESS MOUSE N100 BLACK', '2017-03-24', 0, 0),
(23, '5', '', 'WIRELESS MOUSE ORANGE', 'WIRELESS MOUSE ORANGE', '2017-03-24', 0, 0),
(24, '5', 'MP13UJUZ', 'AIO-300-20ISH', 'LENOVO AIO-300-20ISH/1SF0BV003TINNMP13UJUZ/1TB/4GB', '2017-03-24', 0, 0),
(25, '5', '', 'BACK PACK', 'BACK PACK', '2017-03-24', 0, 0),
(26, '1', 'SPF0HCT1T', 'G50-45/80E3023KIH', 'G50-45/80E3023KIH/SPF0HCT1T/AMD-A8/4GB/2GB-WIN10', '2017-03-24', 0, 0),
(27, '1', 'SPF0NR8RA', 'G50-80/80E503G2IH', 'G50-80/80E503G2IH/SPF0NR8RA/I3/4G/1TB', '2017-03-24', 0, 0),
(28, '1', 'SPF0NRAXY', 'G50-80/80E503G2IH', 'G50-80/80E503G2IH/SPF0NRAXY/I3/4GB/1TB', '2017-03-24', 0, 0),
(29, '1', 'SPF0NRCNJ', 'G50-80/80E503G2IH', 'G50-80/80E503G2IH/SPF0NRCNJ/I3/4GB/1TB', '2017-03-24', 0, 0),
(30, '1', 'SPF0NFZ3C', 'IP-110/80T700CJIH', 'IP-110/80T700CJIH/SPF0NFZ3C/PQC/4GB/5OOGB/BLK', '2017-03-24', 0, 0),
(31, '1', 'SPF0L7W0M', 'IP-110/80TJ00BPIH', 'IP-110/80TJ00BPIH/SPF0L7W0M/A8/8GB/2GFX/1TB', '2017-03-24', 0, 0),
(32, '1', 'SMP16RYC2', 'IP110-80UD00PMIH', 'IP110-80UD00PMIH-I3 WIN10/1TB/SMP16RYC2', '2017-03-24', 0, 0),
(33, '1', 'PF0NC4AU', 'IP310-80SM01KEIH', 'IP310-80SM01KEIH/PF0NC4AU/I3/8GB/1TB/WIN10', '2017-03-24', 0, 0),
(34, '1', 'SPF0PABPC', 'IP310-80TV01BHIH', 'IP310-80TV01BHIH/WIN10/4GBRAM/2GB/SPF0PABPC', '2017-03-24', 0, 0),
(35, '1', 'MP1020AQ', 'IP-500/80NT00L5IN', 'IP-500/80NT00L5IN/MP1020AQ/I5/4GB/1TB-WIN10', '2017-03-24', 0, 0),
(36, '1', 'PF0L8GVU', 'IP-510/80SV001PIH', 'IP-510/80SV001PIH/PF0L8GVU/I5/8GB/4GB-NVDIA/GUN MET', '2017-03-24', 0, 0),
(37, '1', 'PF0L8M9T', 'IP-510/80SV001PIH', 'IP-510/80SV001PIH/PF0L8M9T/I5/8GB/4GFX/1TB', '2017-03-24', 0, 0),
(38, '1', 'SPF0L8CJX', 'IP-510/80SV001PIH', 'IP-510/80SV001PIH/SPF0L8CJX/I5/8G/4GFX', '2017-03-24', 0, 0),
(39, '1', 'SPF0KC2YF', 'IP-510/80SV00FEIH', 'IP-510/80SV00FEIH/SPF0KC2YF/I7/8GB/4GFX/2TB/GUN MET', '2017-03-24', 0, 0),
(40, '1', 'PFPN98G', 'E470/20H1A016IG', 'LENOVO E470/20H1A016IG/PFPN98G/I5/8GB/1TB/WIN10 PRO', '2017-03-24', 0, 0),
(41, '1', 'SYE00P52B', 'MIIX-310/80SG00BUIH', 'LENOVO MIIX-310/80SG00BUIH/SYE00P52B/ATOM/32GB', '2017-03-24', 0, 0),
(42, '1', 'R90HKWCV', 'U41-70/80JV007GIN', 'U41-70/80JV007GIN/R90HKWCV/I5/4GB/1TB/WIN8.1', '2017-03-24', 0, 0),
(43, '1', 'SP200U0KN', 'YOGA-310/80U20024IH', 'YOGA-310/80U20024IH/SP200U0KN/PQC/4GB/1TB/11.6''', '2017-03-24', 0, 0),
(44, '1', 'SMP15TYYH', 'YOGA-510/80VB00ODIH', 'YOGA-510/80VB00ODIH/SMP15TYYH/I5/4GB/2GFX/1TB', '2017-03-24', 0, 0),
(45, '2', '869071022005350', 'K3 NOTE MUSIC EDITION-BLACK', 'K3 NOTE MUSIC EDITION-BLACK', '2017-03-24', 0, 0),
(46, '2', '868694027771675', 'Lenovo -A1000-Black', 'Lenovo -A1000-Black', '2017-03-24', 0, 0),
(47, '2', '861724035892051', 'A1000-BLK', 'LENOVO A1000-BLK/IMEI:861724035892051', '2017-03-24', 0, 0),
(48, '2', '862597034451577', 'A1000-BLK', 'LENOVO A1000-BLK/IMEI:862597034451577', '2017-03-24', 0, 0),
(49, '2', '863312032980539', 'A6600', 'LENOVO-A6600/863312032980539', '2017-03-24', 0, 0),
(50, '2', '863312033048476', 'A6600', 'LENOVO-A6600/863312033048476', '2017-03-24', 0, 0),
(51, '2', '863312031064707', 'A6600 PLUS', 'LENOVO-A6600 PLUS/863312031064707', '2017-03-24', 0, 0),
(52, '2', '863312031074227', 'A6600 PLUS', 'LENOVO-A6600 PLUS/863312031074227', '2017-03-24', 0, 0),
(53, '2', '863312031084135', 'A6600 PLUS', 'LENOVO-A6600 PLUS/863312031084135', '2017-03-24', 0, 0),
(54, '2', '863312031086296', 'A6600 PLUS', 'LENOVO-A6600 PLUS/863312031086296', '2017-03-24', 0, 0),
(55, '2', '863312031133460', 'A6600 PLUS', 'LENOVO-A6600 PLUS/863312031133460', '2017-03-24', 0, 0),
(56, '2', '861794031935667', 'A6600 PLUS ', 'LENOVO A6600PLUS DEMO/BLK-IMEI:861794031935667', '2017-03-24', 0, 0),
(57, '2', '862243032252333', 'A7700', 'LENOVO-A7700/862243032252333', '2017-03-24', 0, 0),
(58, '2', '862243032387147', 'A7700', 'LENOVO-A7700/862243032387147', '2017-03-24', 0, 0),
(59, '2', '862243032393749', 'A7700', 'LENOVO-A7700/862243032393749', '2017-03-24', 0, 0),
(60, '2', '862243032395173', 'A7700', 'LENOVO-A7700/862243032395173', '2017-03-24', 0, 0),
(61, '2', '862243032395736', 'A7700', 'LENOVO-A7700/862243032395736', '2017-03-24', 0, 0),
(62, '2', '862243032403852', 'A7700', 'LENOVO-A7700/862243032403852', '2017-03-24', 0, 0),
(63, '2', '867363027989528', 'VIBE P1 TURBO', 'LENOVO-VIBE P1 TURBO/867363027989528', '2017-03-24', 0, 0),
(64, '2', '862168032407399', 'Z2 PLUS', 'LENOVO-Z2 PLUS/862168032407399', '2017-03-24', 0, 0),
(65, '2', '862168032412977', 'Z2 PLUS', 'LENOVO-Z2 PLUS/862168032412977', '2017-03-24', 0, 0),
(66, '2', '862168032425797', 'Z2 PLUS', 'LENOVO-Z2 PLUS/862168032425797', '2017-03-24', 0, 0),
(67, '2', '862168032426951', 'Z2 PLUS', 'LENOVO-Z2 PLUS/862168032426951', '2017-03-24', 0, 0),
(68, '2', '351891084137899', 'MOTO G4 PLUS-BLACK', 'MOTO G4 PLUS-BLACK/351891084137899', '2017-03-24', 0, 0),
(69, '2', '358960061681998', 'MOTO Z PLAY-BLACK', 'MOTO Z PLAY-BLACK/358960061681998', '2017-03-24', 0, 0),
(70, '4', '', 'Office 365 Personal', 'Office 365 Personal', '2017-03-24', 0, 0),
(71, '4', '', 'QUICK HEAL INTERNET SECURITY ESSANTIAL', 'QUICK HEAL INTERNET SECURITY ESSANTIAL', '2017-03-24', 0, 0),
(72, '3', '869980021518231', 'LENOVO PHAB2-690M-CHAMPAGNE GOLD pro', 'LENOVO PHAB2-690M-CHAMPAGNE GOLD pro', '2017-03-24', 0, 0),
(73, '3', 'HA0PE8NJ', 'TAB3-710F', 'LENOVO TAB3-710F', '2017-03-24', 0, 0),
(74, '3', '860998036108631', 'TAB3-850M', 'LENOVO TAB3-850M', '2017-03-24', 0, 0),
(75, '3', '869432027019434', 'TB3-730X', 'LENOVO TB3-730X TAB/869432027019434', '2017-03-24', 0, 0),
(76, '3', '869714020405888', 'YOGABOOK/ZA160015IN', 'LENOVO YOGABOOK/ZA160015IN/HA0RPLE7/IA/4GB/64GB', '2017-03-24', 0, 0),
(77, '3', '865770023528260', 'TAB 2 A7-30 HC', 'TAB 2 A7-30 HC', '2017-03-24', 0, 0),
(78, '3', '869714020409005', 'YOGABOOK/ZA160015IN', 'YOGA BOOK/ZA160015IN/HA0RPSZR/INTEL AQC/4GB/64GB', '2017-03-24', 0, 0),
(79, '3', '869432027027098', 'TAB3-730XTAB', 'LENOVO TAB3-730XTAB/869432027027098', '2017-03-24', 0, 0),
(83, '2', '45646464646', 'SAMSUNG J7', 'SAMSUNG', '2017-03-26', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_req_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `pur_date` date NOT NULL DEFAULT '0000-00-00',
  `pro_type` int(11) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `pur_rate` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_purchase_request`
--

INSERT INTO `tbl_purchase_request` (`id`, `pur_req_id`, `vendor_id`, `pur_date`, `pro_type`, `pro_id`, `pur_rate`, `qty`, `total`, `created_date`) VALUES
(1, 1, 2, '2017-03-22', 1, 4, 10000, 10, 100000, '2017-03-22'),
(2, 2, 1, '2017-03-22', 1, 1, 25000, 6, 150000, '2017-03-22'),
(3, 4, 5, '2017-03-27', 1, 30, 48500, 1, 48500, '2017-03-27'),
(4, 5, 1, '2017-03-27', 1, 26, 500, 5, 2500, '2017-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request_item`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_request_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `pur_date` date NOT NULL DEFAULT '0000-00-00',
  `total` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_purchase_request_item`
--

INSERT INTO `tbl_purchase_request_item` (`id`, `vendor_id`, `pur_date`, `total`, `created_date`) VALUES
(1, 2, '2017-03-22', 112000, '2017-03-22'),
(2, 1, '2017-03-22', 150000, '2017-03-22'),
(3, 5, '2017-03-27', 6500, '2017-03-27'),
(4, 5, '2017-03-27', 48500, '2017-03-27'),
(5, 1, '2017-03-27', 2500, '2017-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` int(11) NOT NULL DEFAULT '0',
  `expenses_type` int(11) DEFAULT '0',
  `bill_no` int(11) NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `remarks` varchar(200) DEFAULT NULL,
  `cst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `service_tax` varchar(255) DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `insurance_amt` double NOT NULL DEFAULT '0',
  `vendor_name` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `sales_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive',
  PRIMARY KEY (`s_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`s_no`, `customer_code`, `expenses_type`, `bill_no`, `total_amount`, `remarks`, `cst`, `pan`, `service_tax`, `tin`, `insurance_amt`, `vendor_name`, `created_date`, `sales_status`) VALUES
(1, 1, 0, 1, 1130, 'sfedgh', '5768', '76989', '687696', '4235346', 0, 'priya', '2017-03-21', 1),
(2, 1, 0, 2, 37933.15, 'dfgwrgr', '5768', '687875', '465476', '543657648', 0, 'cgshs', '2017-03-24', 1),
(3, 3, 0, 3, 5136, 'billing for laptop', '313133', '112222', '313131', '333312313213', 0, 'manoj', '2017-03-24', 1),
(4, 2, 0, 4, 5200, 'tOWARDS sale of mobile', '31131313', '1232131', '313132', '313313131', 0, 'jeyagaran', '2017-03-24', 1),
(5, 3, 0, 5, 5250, 'towards sale of software', '21222', 'a3g2122132', '12313213', '121311313', 0, 'manoj', '2017-03-24', 1),
(6, 3, 0, 6, 5250, 'towards sale of software', '21222', 'a3g2122132', '12313213', '121311313', 0, 'manoj', '2017-03-24', 1),
(7, 3, 0, 7, 5350, 'being mobile solld ', '1313131', '2123213', '2313131', '131313131', 0, 'jeyagaran', '2017-03-24', 1),
(8, 4, 0, 8, 1070, '', '0', '0', '0', '0', 0, 'jai', '2017-03-27', 1),
(9, 5, 0, 9, 117600, 'being sales made', '2222', '22212', '21222', '333333', 0, 'jeyagaran', '2017-03-27', 1),
(10, 5, 0, 10, 200000, '', '6546464', '646', '5464', '4546465', 0, '56464', '2017-03-27', 1),
(11, 6, 0, 11, 16585, 'Moto g4plus', '0', '0', '0', '0', 0, 'manoj', '2017-03-28', 1),
(12, 8, 0, 12, 18725, 'Mobile', '0', '0', '0', '0', 0, 'vignesh', '2017-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_items`
--

CREATE TABLE IF NOT EXISTS `tbl_sales_items` (
  `si_no` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_sales_id` int(11) NOT NULL DEFAULT '0',
  `pro_type` int(11) NOT NULL DEFAULT '0',
  `tbl_product_id` int(11) NOT NULL DEFAULT '0',
  `serial_no` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `sales_price` double NOT NULL DEFAULT '0',
  `tax_amt` int(11) NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `total_value` double NOT NULL DEFAULT '0',
  `instcharges` double NOT NULL DEFAULT '0',
  `delivery` double NOT NULL DEFAULT '0',
  `freight` double NOT NULL DEFAULT '0',
  `serivcetax` double NOT NULL DEFAULT '0',
  `serivcetax_amt` double NOT NULL DEFAULT '0',
  `commissioning` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `si_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive',
  PRIMARY KEY (`si_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_sales_items`
--

INSERT INTO `tbl_sales_items` (`si_no`, `tbl_sales_id`, `pro_type`, `tbl_product_id`, `serial_no`, `quantity`, `sales_price`, `tax_amt`, `discount`, `total_value`, `instcharges`, `delivery`, `freight`, `serivcetax`, `serivcetax_amt`, `commissioning`, `created_date`, `si_status`) VALUES
(1, 1, 1, 1, '67', 1, 1000, 140, 10, 1130, 0, 0, 0, 0, 0, 0, '2017-03-21', 1),
(2, 2, 2, 69, 'rwet454', 1, 35545, 2488, 100, 37933.15, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(3, 3, 2, 49, '863312032980539', 1, 4800, 336, 0, 5136, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(4, 4, 2, 49, '863312032980539', 1, 5000, 350, 150, 5200, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(5, 5, 2, 46, '868694027771675', 1, 5000, 350, 100, 5250, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(6, 6, 2, 46, '868694027771675', 1, 5000, 350, 100, 5250, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(7, 7, 2, 57, '862243032252333', 1, 5000, 350, 0, 5350, 0, 0, 0, 0, 0, 0, '2017-03-24', 1),
(8, 8, 2, 51, '863312031064707', 1, 1000, 70, 0, 1070, 0, 0, 0, 0, 0, 0, '2017-03-27', 1),
(9, 9, 2, 49, '863312032980539', 1, 110000, 7700, 100, 117600, 0, 0, 0, 0, 0, 0, '2017-03-27', 1),
(10, 10, 1, 26, '', 4, 50000, 0, 0, 200000, 0, 0, 0, 0, 0, 0, '2017-03-27', 1),
(11, 11, 2, 68, '351891084137899', 1, 15500, 1085, 0, 16585, 0, 0, 0, 0, 0, 0, '2017-03-28', 1),
(12, 12, 2, 63, '867363027992704', 1, 17500, 1225, 0, 18725, 0, 0, 0, 0, 0, 0, '2017-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statutory`
--

CREATE TABLE IF NOT EXISTS `tbl_statutory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type` int(11) NOT NULL DEFAULT '0',
  `tax_type` int(11) NOT NULL DEFAULT '0',
  `vat` float NOT NULL DEFAULT '0',
  `cst` float NOT NULL DEFAULT '0',
  `service_tax` float NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendorpayment`
--

CREATE TABLE IF NOT EXISTS `tbl_vendorpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `inv_no` varchar(255) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT '0',
  `amt` double NOT NULL DEFAULT '0',
  `payment_method` int(11) NOT NULL DEFAULT '0',
  `reference_no` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `payment_date` date NOT NULL DEFAULT '0000-00-00',
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_vendorpayment`
--

INSERT INTO `tbl_vendorpayment` (`id`, `vendor_id`, `inv_no`, `purchase_id`, `amt`, `payment_method`, `reference_no`, `cheque_no`, `bank_name`, `trans_id`, `payment_date`, `created_date`) VALUES
(1, 1, '35454', 1, 50000, 4, '', '0', '', '6547647', '2017-03-22', '2017-03-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
