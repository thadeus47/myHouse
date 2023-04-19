-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 01:10 PM
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
CREATE DATABASE IF NOT EXISTS `houses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `houses`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
('cus_Ej2UMsrPQU1h2P', 'jeff', 'th', 'jeff@gmail.com', '2019-03-19 08:17:45'),
('cus_Ej2UXuZw5rRwJm', 'jeff', 'th', 'jeff@gmail.com', '2019-03-19 08:17:47'),
('cus_Ej3jjHj7mqUv0j', 'jeff', 'kanyi', 'jeff@gmail.com', '2019-03-19 09:34:33'),
('cus_Ej3jOGDio2cKrH', 'jeff', 'kanyi', 'jeff@gmail.com', '2019-03-19 09:34:34'),
('cus_Ej3jW9d3HIxqjl', 'jeff', 'kanyi', 'jeff@gmail.com', '2019-03-19 09:34:37'),
('cus_Ej7E12SL0Oc3s2', 'brain', 'kanyi', 'dv@gmail.com', '2019-03-19 13:11:18'),
('cus_Ej7EHZhFaGM809', 'brain', 'kanyi', 'dv@gmail.com', '2019-03-19 13:11:18'),
('cus_Ej948FpORwEx3V', 'eric', 'House No: 67', 'eric@gmail.com', '2019-03-19 15:05:06'),
('cus_Ej94TXcdhk9YwU', 'eric', 'House No: 67', 'eric@gmail.com', '2019-03-19 15:05:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`houseid`, `housenumber`, `houseimage`, `housedesciption`) VALUES
(1, '1', 'to.png', 'hfkjyyjsaszhvjuse5w5qwertyuioasdfghjkzxcvbnhjk'),
(19, '67', 'ti.jpg', 'hjk'),
(20, '67', 'ti.jpg', 'hjk'),
(21, '67', 'ti.jpg', 'hjk'),
(22, '67', 'tk.jpg', 'thr');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myusers`
--

INSERT INTO `myusers` (`id`, `fullname`, `username`, `email`, `password`, `usertype`) VALUES
(1, '', 'jeffrey', 'jeff@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin'),
(2, '', 'mary', 'mary@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(5, '', 'jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tenant'),
(8, '', 'eric', 'eric@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tenant'),
(9, '', 'brian', 'brian@gmail.com', '202cb962ac59075b964b07152d234b70', 'Owner');

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
  `paymentstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`tenant_houseid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_house`
--

INSERT INTO `tenant_house` (`tenant_houseid`, `houseid`, `userid`, `checkin`, `checkout`, `moredetails`, `paymentstatus`) VALUES
(3, 34, 5, 1552580715, 0, 'hjkhjkjkh', 0),
(4, 67, 8, 1552748814, 0, 'qwertyuiopasdfghjklzxcvbnm', 0),
(5, 1, 8, 1552994219, 0, 'latest tenent', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product`, `amount`, `currency`, `status`, `created_at`) VALUES
('ch_1EFaPqKYKuqrBb6h5f2ovyZJ', 'cus_Ej2UMsrPQU1h2P', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 08:17:45'),
('ch_1EFaPsKYKuqrBb6hTgLa8tAs', 'cus_Ej2UXuZw5rRwJm', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 08:17:47'),
('ch_1EFbcBKYKuqrBb6hHVTVcCmp', 'cus_Ej3jjHj7mqUv0j', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 09:34:34'),
('ch_1EFbcCKYKuqrBb6hL0BB2WFo', 'cus_Ej3jOGDio2cKrH', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 09:34:34'),
('ch_1EFbcEKYKuqrBb6hEEuW27v9', 'cus_Ej3jW9d3HIxqjl', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 09:34:37'),
('ch_1EFezvKYKuqrBb6hFFLkUt6w', 'cus_Ej7E12SL0Oc3s2', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 13:11:18'),
('ch_1EFezvKYKuqrBb6hQwQbQKjJ', 'cus_Ej7EHZhFaGM809', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 13:11:18'),
('ch_1EFgm3KYKuqrBb6hYywW1UNA', 'cus_Ej94TXcdhk9YwU', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 15:05:06'),
('ch_1EFgm4KYKuqrBb6hZ47RN7QD', 'cus_Ej948FpORwEx3V', 'MyHouse Payment', '5000', 'usd', 'succeeded', '2019-03-19 15:05:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
