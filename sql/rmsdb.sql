-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 09:01 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(25) DEFAULT NULL,
  `phone_no` char(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(25) DEFAULT NULL,
  `phone_no` char(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_business`
--

CREATE TABLE IF NOT EXISTS `customer_business` (
  `business_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_individual`
--

CREATE TABLE IF NOT EXISTS `customer_individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(16) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mInit` char(1) DEFAULT NULL,
  `position` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `desk_users`
--

CREATE TABLE IF NOT EXISTS `desk_users` (
  `desk_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(16) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mInit` char(1) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_no` char(11) DEFAULT NULL,
  `access_lvl` int(11) DEFAULT NULL,
  PRIMARY KEY (`desk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `due_date` date DEFAULT NULL,
  `due_amount` float DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `receipt_no` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  PRIMARY KEY (`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rental_spaces`
--

CREATE TABLE IF NOT EXISTS `rental_spaces` (
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_cost` float DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `area_size` float DEFAULT NULL,
  `rental_type` enum('A','B','C') DEFAULT NULL,
  PRIMARY KEY (`rental_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
