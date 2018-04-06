-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 05:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arraow18`
--

-- --------------------------------------------------------

--
-- Table structure for table `cb_customer`
--

CREATE TABLE `cb_customer` (
  `cid` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `credit_days` int(11) NOT NULL DEFAULT '0',
  `mob_no1` varchar(11) DEFAULT NULL,
  `landline_no` int(11) NOT NULL DEFAULT '0',
  `email_id` varchar(255) DEFAULT NULL,
  `area_name` varchar(25) DEFAULT NULL,
  `city_name` varchar(25) DEFAULT NULL,
  `state_name` varchar(25) DEFAULT NULL,
  `country_name` varchar(25) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_customer`
--

INSERT INTO `cb_customer` (`cid`, `customer_name`, `credit_days`, `mob_no1`, `landline_no`, `email_id`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `location`, `created_date`) VALUES
(1, 'Anuradha', 14, '2147483647', 0, 'anu@gmail.com', 'kodambakkam', 'chennai', 'tamilnadu', 'india', '600002', 'Chennai', '2017-03-14'),
(2, 'athya', 14, '2147483647', 47657890, 'athya@gmail.com', 'T.NAGAR', 'CHENNAI', 'TAMILNADU', 'INDIA', '603207', 'ambattur', '2017-03-23'),
(3, 'saran', 10, '2147483647', 3456656, '0', 'TAMBARAM', 'CHENNAI', 'TAMILNADU', 'INDIA', '600003', 'ambattur', '2017-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `cb_customer_master`
--

CREATE TABLE `cb_customer_master` (
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

CREATE TABLE `cb_seller` (
  `cid` int(11) NOT NULL,
  `credit_days` int(11) NOT NULL DEFAULT '0',
  `seller_name` varchar(25) NOT NULL,
  `area_name` varchar(25) NOT NULL,
  `city_name` varchar(25) NOT NULL,
  `state_name` varchar(25) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vendor_location` varchar(255) DEFAULT NULL,
  `tin_no` varchar(255) DEFAULT NULL,
  `cst_no` varchar(255) DEFAULT NULL,
  `service_tax` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cb_seller`
--

INSERT INTO `cb_seller` (`cid`, `credit_days`, `seller_name`, `area_name`, `city_name`, `state_name`, `country_name`, `pincode`, `telephone`, `email`, `vendor_location`, `tin_no`, `cst_no`, `service_tax`, `created_date`) VALUES
(1, 45, 'NEW VENDOR2', 'FGR', 'TANJAVUR', 'TAMILNADU', 'INDIA', '234234', '657647', 'ddd4@ddd.com', 'Nungambakkam', '', '35436547', 10, '2017-03-22'),
(2, 50, 'NEW VENDOR', 'GUDUVANCHERI', 'CHENNAI', 'TAMILNADU', 'INDIA', '603202', '6765878', 'ddd@ddd.com', 'Ambattur', '', '', 0, '2017-03-22'),
(3, 30, 'NEW VENDOR3', 'TRICHY', 'TRICHY', 'TAMILNADU', 'INDIA', '603202', '5764786', 'asdasd@gmail.com', 'Nungambakkam', '', '', 0, '2017-03-22'),
(4, 20, 'NEW VENDOR4', 'T.NAGAR', 'CHENNAI', 'TAMILNADU', 'INDIA', '603202', '54674767', 'XX@GMAIL.COM', 'TTK - Alwarpet', '', '', 0, '2017-03-22');

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
(1, 'XXXF', 'GUDUVANCHERI', 'CHENNAI', '- - - - - - -', 'TTK - Alwarpet', '603201', '0000-00-00', 0, '2017-03-22 01:53:09');

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
('0a3672a6c6b5e9a7679d5ee5aea37ae74bf84936', '::1', 1490173468, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137333136373b),
('4a36002269003c33a35e6881b577175af32767cc', '::1', 1490173795, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137333437313b),
('c598764f49340f0e99917cb02485f9060875df0b', '::1', 1490174545, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137333739373b),
('49d037bfd3a05932964e234a59859ea1eb19417a', '::1', 1490175237, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22616d626174747572223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c733a32343a2276616973686e6176696d6f6c696e40676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b),
('5c620fc8f3067025ab4243f0cd49ebe4efc42f9f', '::1', 1490243550, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22616d626174747572223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c733a32343a2276616973686e6176696d6f6c696e40676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b),
('429c06dc4638c86c06b991bcb1207a809c274477', '::1', 1490330885, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a383a22616d626174747572223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a353a2261646d696e223b6d61696c69647c733a32343a2276616973686e6176696d6f6c696e40676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b),
('8ced826085184003ca5f16ff7ad88f1b4abc44e9', '::1', 1490173165, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137323836363b),
('1925680bb0c9ea1145d4275e40d8f4c1d3aefb94', '::1', 1490172567, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137323536373b),
('07fa31062829de29a0a7814b698a2c2ebc94298f', '::1', 1503467166, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313530333436363931363b),
('dbed24b0c11e1c0fbef731099b6096c2bb9cdce4', '::1', 1490172851, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137323235353b),
('87ac4b4390043901ce6fc8d8dd92ca009b8caf95', '::1', 1490172251, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137313931363b),
('dbeaf59f25e5d2b8ef8dd0878e9816fd527df516', '::1', 1490171909, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303137313437393b),
('3de324546eda7813117b85224f84232d0c5b2235', '::1', 1490161382, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303130333932353b),
('57e38f99a0b165fe7a4eb5ce26ac9b4952e44cc8', '::1', 1490171476, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136383135313b),
('77015a89331b7690598d0e7512fd0ee0fd4466ae', '::1', 1490168134, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136373631303b),
('746a0268e8a7559f37731811002520fb516402c4', '::1', 1490161873, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136313336313b),
('2479f643d83a05eab73b195512cd2c5184b6a248', '::1', 1490167602, 0x757365725f69647c733a313a2231223b6c6f636174696f6e7c733a373a224368656e6e6169223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a2261646d696e223b6e616d657c733a373a224b41525448494b223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136313338343b),
('91455d713db86eea3decac41ee1bf6c3fbb9cc35', '::1', 1490162659, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136313837353b),
('a15355b54ad39740386501667420c453d06c4670', '::1', 1490164338, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136323636313b),
('91abb97c03f87e34d8d4c490a69f02b69ebcbbc4', '::1', 1490164639, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136343334303b),
('0fcf4e6aff62a8ec55bc46f751822c3cc0a2c0a7', '::1', 1490165234, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b5f5f63695f6c6173745f726567656e65726174657c693a313439303136343634343b),
('23305e6d75fb889fa23d7174dc2b42046be80750', '::1', 1490175290, 0x757365725f69647c733a313a2232223b6c6f636174696f6e7c733a393a2262616e67616c6f7265223b757365725f747970657c733a313a2235223b757365725f6e616d657c733a353a226e616e6479223b6e616d657c733a383a224e414e4448494e49223b6d61696c69647c733a33333a2276616973686e6176692e72616d746563686e6f6c6f677940676d61696c2e636f6d223b6c6f67696e757365727c623a313b636f6d70616e795f6e616d657c733a373a224172726f773138223b);

-- --------------------------------------------------------

--
-- Table structure for table `cp_admin_login`
--

CREATE TABLE `cp_admin_login` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `emp_code` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT '0',
  `email_id` varchar(255) DEFAULT NULL,
  `leads_id` int(11) NOT NULL DEFAULT '0',
  `area_name` varchar(255) DEFAULT NULL,
  `status_leads` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1-active,0-deactive',
  `remarks` varchar(255) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT NULL COMMENT '1-admin,2-user',
  `is_delete` tinyint(1) NOT NULL COMMENT '1-delete,0-active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_admin_login`
--

INSERT INTO `cp_admin_login` (`admin_id`, `username`, `password`, `name`, `emp_code`, `phone`, `email_id`, `leads_id`, `area_name`, `status_leads`, `created_date`, `status`, `remarks`, `user_type`, `is_delete`) VALUES
(1, 'admin', 'admin', 'admin', 'admin11', 24546, 'vaishnavimolin@gmail.com', 0, 'ambattur', 0, '2017-03-09 01:45:09', 1, NULL, 5, 0),
(2, 'nandy', 'nan123', 'NANDHINI', 'nandhini12', 5454556, 'vaishnavi.ramtechnology@gmail.com', 1, 'TTK - Alwarpet', 1, '2017-03-09 01:55:22', 1, 'sfwergerg', 5, 0),
(3, 'athya1', 'athya123', 'ATHYA', 'athya3', 5656767, NULL, 0, 'Nungambakkam', 0, '2017-03-09 01:55:33', 1, NULL, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_master`
--

CREATE TABLE `expenses_master` (
  `id` int(11) NOT NULL,
  `expenses_type` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_master`
--

INSERT INTO `expenses_master` (`id`, `expenses_type`, `date`) VALUES
(1, 'installation charges', '2017-03-15'),
(2, 'delivery charges', '2017-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `master_location`
--

CREATE TABLE `master_location` (
  `id` int(11) NOT NULL,
  `master_state_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_location`
--

INSERT INTO `master_location` (`id`, `master_state_id`, `location_name`, `date`) VALUES
(1, 21, 'TTK - Alwarpet', '2017-03-22 07:52:40'),
(2, 21, 'Nungambakkam', '2017-03-22 07:52:56'),
(3, 21, 'Ambattur', '2017-03-22 07:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `master_state`
--

CREATE TABLE `master_state` (
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
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `id` int(11) NOT NULL,
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
  `status_req` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`id`, `emp_id`, `tbl_purchase_req_id`, `tbl_product_id`, `location`, `qty`, `req_qty`, `req_emp_id`, `req_emp_location`, `p_rate`, `created_date`, `status_req`) VALUES
(2, 1, 1, 4, 'ambattur', 10, 0, 0, NULL, 285000, '2017-03-22', 0),
(3, 1, 2, 1, 'ambattur', 6, 0, 0, NULL, 285000, '2017-03-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `s_no` int(11) NOT NULL,
  `sales_id` varchar(11) DEFAULT NULL,
  `paid_amt` double NOT NULL DEFAULT '0',
  `customer_code` varchar(200) DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sales_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`s_no`, `sales_id`, `paid_amt`, `customer_code`, `total_amount`, `created_date`, `sales_status`) VALUES
(1, '1', 130, '1', 1130, '2017-03-21 16:37:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_payment`
--

CREATE TABLE `tbl_invoice_payment` (
  `inoivce_id` int(11) NOT NULL,
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
  `sales_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_payment`
--

INSERT INTO `tbl_invoice_payment` (`inoivce_id`, `tbl_invoice_id`, `customer_code`, `reference_no`, `cheque_no`, `trans_id`, `bank_name`, `product_amount`, `payment_method`, `get_amt_date`, `payment_date`, `paym_amount`, `created_date`, `sales_status`) VALUES
(1, '1', '1', 'wwrewtery', '', '', '', 1130, '3', '2017-03-21', '2017-03-21', 130, '2017-03-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deignation` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL DEFAULT '0',
  `leads_from` varchar(120) DEFAULT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT '0',
  `assigned_by` int(11) NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_po_inv` (
  `po_id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_inv`
--

INSERT INTO `tbl_po_inv` (`po_id`, `emp_id`, `pdate`, `storage_name`, `shortage_qty`, `damage_qty`, `vinvno`, `supplier_date`, `remarks`, `taxamount`, `gtotal`, `created_date`, `status`) VALUES
(1, 1, '2017-03-22', 'ambattur', 0, 0, '35454', '2017-03-22', 'grfh', 35000, 285000, '2017-03-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_inv_item`
--

CREATE TABLE `tbl_po_inv_item` (
  `pi_id` int(11) NOT NULL,
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
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_inv_item`
--

INSERT INTO `tbl_po_inv_item` (`pi_id`, `po_inv_id`, `vname`, `tbl_purchase_req_id`, `tbl_pro_id`, `p_rate`, `qty`, `total`, `date`, `ven_credit_days`, `status`, `is_delete`) VALUES
(1, 1, 'NEW VENDOR', 1, 4, 10000, 10, 285000, '2017-03-22', 50, 1, 0),
(2, 1, 'NEW VENDOR2', 2, 1, 25000, 6, 285000, '2017-03-22', 45, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricelist`
--

CREATE TABLE `tbl_pricelist` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `po_id` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `storage` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pricelist`
--

INSERT INTO `tbl_pricelist` (`id`, `type`, `po_id`, `price`, `storage`, `created_date`) VALUES
(1, 1, 1, 100, '1', '2017-03-09'),
(2, 2, 2, 600, '1', '2017-03-09'),
(3, 2, 5, 454, '1', '2017-03-09'),
(4, 1, 6, 456, '1', '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `i_id` int(11) NOT NULL,
  `i_category` varchar(200) NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `i_name` varchar(200) NOT NULL,
  `i_code` varchar(200) NOT NULL,
  `descr` text NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`i_id`, `i_category`, `ime`, `serial`, `i_name`, `i_code`, `descr`, `date`, `status`, `is_delete`) VALUES
(1, '1', NULL, NULL, 'XXXX', 'XX1', 'DDFWGW', '2017-02-04', 1, 0),
(2, '2', NULL, NULL, 'YYYY', 'YYY2', 'FHTFGJHT', '2017-02-06', 1, 0),
(3, '2', NULL, NULL, 'DLSV0', 'DLS3', 'FGG', '2017-02-06', 1, 0),
(4, '1', NULL, NULL, 'XYZ', 'XYZ4', 'FDFEDF', '2017-02-07', 1, 0),
(5, '2', NULL, NULL, 'HHTHTT', 'HHT5', 'FRERY', '2017-02-08', 1, 0),
(6, '1', NULL, NULL, 'HHHHH', 'HHH6', 'GGH', '2017-02-09', 1, 0),
(7, '2', NULL, NULL, 'YARDLY', 'YAR7', 'FEFWEF', '2017-03-06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request`
--

CREATE TABLE `tbl_purchase_request` (
  `id` int(11) NOT NULL,
  `pur_req_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `pur_date` date NOT NULL DEFAULT '0000-00-00',
  `pro_type` int(11) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `pur_rate` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_request`
--

INSERT INTO `tbl_purchase_request` (`id`, `pur_req_id`, `vendor_id`, `pur_date`, `pro_type`, `pro_id`, `pur_rate`, `qty`, `total`, `created_date`) VALUES
(1, 1, 2, '2017-03-22', 1, 4, 10000, 10, 100000, '2017-03-22'),
(2, 2, 1, '2017-03-22', 1, 1, 25000, 6, 150000, '2017-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request_item`
--

CREATE TABLE `tbl_purchase_request_item` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `pur_date` date NOT NULL DEFAULT '0000-00-00',
  `total` double NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_request_item`
--

INSERT INTO `tbl_purchase_request_item` (`id`, `vendor_id`, `pur_date`, `total`, `created_date`) VALUES
(1, 2, '2017-03-22', 112000, '2017-03-22'),
(2, 1, '2017-03-22', 150000, '2017-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `s_no` int(11) NOT NULL,
  `customer_code` int(11) NOT NULL DEFAULT '0',
  `expenses_type` int(11) DEFAULT '0',
  `bill_no` int(11) NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `remarks` varchar(200) DEFAULT NULL,
  `cst` int(11) DEFAULT '0',
  `pan` int(11) NOT NULL DEFAULT '0',
  `service_tax` int(11) NOT NULL DEFAULT '0',
  `tin` int(11) NOT NULL DEFAULT '0',
  `insurance_amt` double NOT NULL DEFAULT '0',
  `vendor_name` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT '0000-00-00',
  `sales_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`s_no`, `customer_code`, `expenses_type`, `bill_no`, `total_amount`, `remarks`, `cst`, `pan`, `service_tax`, `tin`, `insurance_amt`, `vendor_name`, `created_date`, `sales_status`) VALUES
(1, 1, 0, 1, 1130, 'sfedgh', 5768, 76989, 687696, 4235346, 0, 'priya', '2017-03-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_items`
--

CREATE TABLE `tbl_sales_items` (
  `si_no` int(11) NOT NULL,
  `tbl_sales_id` int(11) NOT NULL DEFAULT '0',
  `pro_type` int(11) NOT NULL DEFAULT '0',
  `tbl_product_id` int(11) NOT NULL DEFAULT '0',
  `serial_no` varchar(255) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `ime_no` varchar(255) DEFAULT NULL,
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
  `si_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-active,0-deactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_items`
--

INSERT INTO `tbl_sales_items` (`si_no`, `tbl_sales_id`, `pro_type`, `tbl_product_id`, `serial_no`, `model`, `ime_no`, `quantity`, `sales_price`, `tax_amt`, `discount`, `total_value`, `instcharges`, `delivery`, `freight`, `serivcetax`, `serivcetax_amt`, `commissioning`, `created_date`, `si_status`) VALUES
(1, 1, 1, 1, '67', '242354', '56768', 1, 1000, 140, 10, 1130, 0, 0, 0, 0, 0, 0, '2017-03-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statutory`
--

CREATE TABLE `tbl_statutory` (
  `id` int(11) NOT NULL,
  `product_type` int(11) NOT NULL DEFAULT '0',
  `tax_type` int(11) NOT NULL DEFAULT '0',
  `vat` float NOT NULL DEFAULT '0',
  `cst` float NOT NULL DEFAULT '0',
  `service_tax` float NOT NULL DEFAULT '0',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_statutory`
--

INSERT INTO `tbl_statutory` (`id`, `product_type`, `tax_type`, `vat`, `cst`, `service_tax`, `created_date`) VALUES
(1, 1, 0, 14, 12.36, 7.6, '2017-03-16'),
(2, 2, 0, 7, 12.36, 4.7, '2017-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendorpayment`
--

CREATE TABLE `tbl_vendorpayment` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `inv_no` varchar(255) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT '0',
  `amt` double NOT NULL DEFAULT '0',
  `payment_method` int(11) NOT NULL DEFAULT '0',
  `reference_no` varchar(255) DEFAULT NULL,
  `cheque_no` int(11) NOT NULL DEFAULT '0',
  `bank_name` varchar(255) DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `payment_date` date NOT NULL DEFAULT '0000-00-00',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendorpayment`
--

INSERT INTO `tbl_vendorpayment` (`id`, `vendor_id`, `inv_no`, `purchase_id`, `amt`, `payment_method`, `reference_no`, `cheque_no`, `bank_name`, `trans_id`, `payment_date`, `created_date`) VALUES
(1, 0, '35454', 1, 50000, 4, '', 0, '', '6547647', '2017-03-22', '2017-03-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cb_customer`
--
ALTER TABLE `cb_customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cb_customer_master`
--
ALTER TABLE `cb_customer_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `expenses_master`
--
ALTER TABLE `expenses_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_location`
--
ALTER TABLE `master_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  ADD PRIMARY KEY (`inoivce_id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_po_inv`
--
ALTER TABLE `tbl_po_inv`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tbl_po_inv_item`
--
ALTER TABLE `tbl_po_inv_item`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `tbl_pricelist`
--
ALTER TABLE `tbl_pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_request_item`
--
ALTER TABLE `tbl_purchase_request_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  ADD PRIMARY KEY (`si_no`);

--
-- Indexes for table `tbl_statutory`
--
ALTER TABLE `tbl_statutory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendorpayment`
--
ALTER TABLE `tbl_vendorpayment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cb_customer`
--
ALTER TABLE `cb_customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cb_customer_master`
--
ALTER TABLE `cb_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cb_seller`
--
ALTER TABLE `cb_seller`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cb_storage`
--
ALTER TABLE `cb_storage`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cp_admin_login`
--
ALTER TABLE `cp_admin_login`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses_master`
--
ALTER TABLE `expenses_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_location`
--
ALTER TABLE `master_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_invoice_payment`
--
ALTER TABLE `tbl_invoice_payment`
  MODIFY `inoivce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_po_inv`
--
ALTER TABLE `tbl_po_inv`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_po_inv_item`
--
ALTER TABLE `tbl_po_inv_item`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pricelist`
--
ALTER TABLE `tbl_pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_purchase_request_item`
--
ALTER TABLE `tbl_purchase_request_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sales_items`
--
ALTER TABLE `tbl_sales_items`
  MODIFY `si_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_statutory`
--
ALTER TABLE `tbl_statutory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_vendorpayment`
--
ALTER TABLE `tbl_vendorpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
