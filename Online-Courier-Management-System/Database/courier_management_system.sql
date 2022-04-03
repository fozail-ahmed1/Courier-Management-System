-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 10:57 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bran`
--

CREATE TABLE `bran` (
  `branch_id` int(11) NOT NULL,
  `B_Address` varchar(88) DEFAULT NULL,
  `city` varchar(88) DEFAULT NULL,
  `man_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bran`
--

INSERT INTO `bran` (`branch_id`, `B_Address`, `city`, `man_id`) VALUES
(8001, 'Ashok Chowk', 'Solapur', 5001),
(8002, 'Royal Mint', 'Madrid', 5002),
(8003, 'World Street', 'Royal Spain', 5003);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `cou_id` int(11) NOT NULL,
  `type` varchar(88) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`cou_id`, `type`, `weight`, `cus_id`, `branch_id`) VALUES
(5001, 'Premium', 2, 18031040, 8002),
(5002, 'Normal', 1, 18031041, 8002),
(5003, 'Premium', 10, 18031040, 8001);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `Cus_Name` varchar(88) DEFAULT NULL,
  `Address` varchar(88) DEFAULT NULL,
  `Phone_No` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `Cus_Name`, `Address`, `Phone_No`, `user_id`) VALUES
(18031040, 'Sharma', 'Mumbai', '9028376154', 2001),
(18031041, 'Kohli', 'Banglore', '9807674530', 2002);

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `Prod_id` int(11) NOT NULL,
  `Name` varchar(88) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `rec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`Prod_id`, `Name`, `sup_id`, `rec_id`) VALUES
(9001, 'Ashish', 4001, 180310401),
(9002, 'Rahul', 4002, 180310411);

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `man_id` int(11) NOT NULL,
  `name` varchar(88) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`man_id`, `name`, `user_id`) VALUES
(5001, 'Fozail', 1001),
(5002, 'Ananya', 1002),
(5003, 'Nairobi', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `user_id` int(11) NOT NULL,
  `Password` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`user_id`, `Password`) VALUES
(1001, '1111'),
(1002, '2222'),
(1003, '3333'),
(2001, 'Sharma@123'),
(2002, 'Kohli@123');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `rec_id` int(11) NOT NULL,
  `rec_Phone_No` varchar(10) DEFAULT NULL,
  `rec_Address` varchar(88) DEFAULT NULL,
  `rec_Name` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`rec_id`, `rec_Phone_No`, `rec_Address`, `rec_Name`) VALUES
(180310401, '9807675474', 'Delhi', 'Shikhar'),
(180310402, '9087687576', 'Russia', 'Valdamir'),
(180310411, '9283708076', 'Ranchi', 'Mahendra ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(88) DEFAULT NULL,
  `man_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `man_id`) VALUES
(4001, 'Jackie Chan', 5001),
(4002, 'Oslo', 5002),
(4003, 'Jobs', 5003);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `track_id` int(11) NOT NULL,
  `Location` varchar(88) DEFAULT NULL,
  `rec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`track_id`, `Location`, `rec_id`) VALUES
(7001, 'Mumbai', 180310401),
(7002, 'Banglore', 180310411),
(7003, 'Mumbai', 180310402);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bran`
--
ALTER TABLE `bran`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `address` (`B_Address`) USING BTREE,
  ADD KEY `man_id` (`man_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`cou_id`),
  ADD KEY `type` (`type`) USING BTREE,
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `courier_ibfk_1` (`cus_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `user_name` (`user_id`),
  ADD KEY `Address` (`Address`),
  ADD KEY `L_Name` (`Cus_Name`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`Prod_id`),
  ADD KEY `Name` (`Name`) USING BTREE,
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`man_id`),
  ADD KEY `name` (`name`) USING BTREE,
  ADD KEY `user_name` (`user_id`);

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`),
  ADD KEY `sup_name` (`sup_name`) USING BTREE,
  ADD KEY `man_id` (`man_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `Status` (`Location`) USING BTREE,
  ADD KEY `rec_id` (`rec_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bran`
--
ALTER TABLE `bran`
  ADD CONSTRAINT `bran_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `management` (`man_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courier_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `bran` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `portal` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_ibfk_2` FOREIGN KEY (`rec_id`) REFERENCES `receiver` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `user_name` FOREIGN KEY (`user_id`) REFERENCES `portal` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`man_id`) REFERENCES `management` (`man_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `receiver` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
