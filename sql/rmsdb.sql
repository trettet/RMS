-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 09:55 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11
CREATE DATABASE RMSDB;
USE RMSDB;

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
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `desk_person_id` int(11) NOT NULL,
  PRIMARY KEY (`building_id`),
  KEY `buildingsToUsersFK` (`desk_person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `contact_no` char(15) NOT NULL,
  `rent_started` date NOT NULL,
  `payment_terms` enum('MONTHLY','BIANNUALLY','QUARTERLY') NOT NULL,
  `contact_period` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_business`
--

CREATE TABLE IF NOT EXISTS `customer_business` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(50) NOT NULL,
  `date_established` date DEFAULT NULL,
  `type` enum('SOLE PROPRIETORSHIP','COOPERATIVE','CORPORATION','PARTNERSHIP','OTHERS') NOT NULL,
  `business_size` enum('NANO-ENTERPRISE','MICRO','SMALL','MEDIUM-SIZED') NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `customer_businessTocustomersFK` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_individual`
--

CREATE TABLE IF NOT EXISTS `customer_individual` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(15) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `customer_individualTocustomersFK` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `electricity` decimal(10,2) NOT NULL,
  `water` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rental_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_no`),
  KEY `invoicesToCustomers` (`customer_id`),
  KEY `invoicesToRental_spaces` (`rental_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `receipt_no` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  PRIMARY KEY (`receipt_no`),
  KEY `receiptsToInvoices` (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rental_spaces`
--

CREATE TABLE IF NOT EXISTS `rental_spaces` (
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_cost` decimal(10,2) NOT NULL,
  `floor` int(11) NOT NULL,
  `area_size` decimal(10,2) DEFAULT NULL,
  `rental_type` enum('COMERCIAL','PERSONAL','STUDIO') NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`rental_id`),
  KEY `rental_spaceToBuildings` (`building_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `desk_person_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` char(64) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(15) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `salt` char(24) NOT NULL,
  PRIMARY KEY (`desk_person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`desk_person_id`, `username`, `password`, `lname`, `fname`, `mname`, `address`, `contact_no`, `salt`) VALUES
(1, 'admin', '81047da812978a25c421a0b592033a644949817f2e6fba24fbdb5c2bb4a5f60e', 'Administrator', 'Administrator', NULL, 'n/a', '912345678912', ')pN#Z+,p8~Trg$XxKp2siX?A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildingsToUsersFK` FOREIGN KEY (`desk_person_id`) REFERENCES `users` (`desk_person_id`);

--
-- Constraints for table `customer_business`
--
ALTER TABLE `customer_business`
  ADD CONSTRAINT `customer_businessTocustomersFK` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `customer_individual`
--
ALTER TABLE `customer_individual`
  ADD CONSTRAINT `customer_individualTocustomersFK` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoicesToCustomers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `invoicesToRental_spaces` FOREIGN KEY (`rental_id`) REFERENCES `rental_spaces` (`rental_id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receiptsToInvoices` FOREIGN KEY (`invoice_no`) REFERENCES `invoices` (`invoice_no`);

--
-- Constraints for table `rental_spaces`
--
ALTER TABLE `rental_spaces`
  ADD CONSTRAINT `rental_spaceToBuildings` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;