-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 03:43 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houses`
--
DROP DATABASE IF EXISTS `houses`;
CREATE DATABASE IF NOT EXISTS `houses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `houses`;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `houseid` bigint(10) NOT NULL AUTO_INCREMENT,
  `housenumber` varchar(255) NOT NULL,
  `houseimage` varchar(255) NOT NULL,
  `housedesciption` text,
  PRIMARY KEY (`houseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `houses`
--

TRUNCATE TABLE `houses`;
-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageid` bigint(10) NOT NULL AUTO_INCREMENT,
  `userid` bigint(10) NOT NULL DEFAULT '0',
  `senddate` bigint(10) NOT NULL DEFAULT '0',
  `message` text,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `message`
--

TRUNCATE TABLE `message`;
-- --------------------------------------------------------

--
-- Table structure for table `myusers`
--

DROP TABLE IF EXISTS `myusers`;
CREATE TABLE IF NOT EXISTS `myusers` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `myusers`
--

TRUNCATE TABLE `myusers`;
--
-- Dumping data for table `myusers`
--

INSERT INTO `myusers` (`id`, `fullname`, `username`, `email`, `password`, `usertype`) VALUES
(1, '', 'jeff', 'jeff@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(2, '', 'mary', 'mary@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(5, '', 'jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tenant');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_house`
--

DROP TABLE IF EXISTS `tenant_house`;
CREATE TABLE IF NOT EXISTS `tenant_house` (
  `tenant_houseid` bigint(10) NOT NULL AUTO_INCREMENT,
  `houseid` bigint(10) NOT NULL DEFAULT '0',
  `userid` bigint(10) NOT NULL DEFAULT '0',
  `checkin` bigint(10) NOT NULL DEFAULT '0',
  `checkout` bigint(10) NOT NULL DEFAULT '0',
  `moredetails` text,
  PRIMARY KEY (`tenant_houseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tenant_house`
--

TRUNCATE TABLE `tenant_house`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
