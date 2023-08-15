-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 06:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broadband`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Acc_id` int(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Cust_id` int(255) NOT NULL,
  `Plan_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Acc_id`, `Status`, `Cust_id`, `Plan_no`) VALUES
(14, '2 months', 21, 1),
(17, '3 months', 25, 5),
(18, '5 months', 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `isp`
--

CREATE TABLE `isp` (
  `Isp_id` int(255) NOT NULL,
  `Name` char(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isp`
--

INSERT INTO `isp` (`Isp_id`, `Name`, `Email`, `Password`) VALUES
(3, 'karthik j', 'karthikj@gmail.com', 'Karthikj@38');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_id` int(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Bill_date` date NOT NULL,
  `Cust_id` int(255) NOT NULL,
  `Isp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_id`, `Amount`, `Bill_date`, `Cust_id`, `Isp_id`) VALUES
(19, 'Rs 1999', '2022-01-19', 21, 3),
(21, 'Rs 1199', '2022-01-31', 25, 3),
(22, 'Rs 799', '2022-01-31', 23, 3);

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `Bill_date` BEFORE INSERT ON `bill` FOR EACH ROW SET NEW.Bill_date=CURRENT_DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` bigint(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_id`, `Name`, `Address`, `Email`, `Phone`, `Password`) VALUES
(21, 'Karthik J', 'mangalore', 'karthikj@gmail.com', 8904904153, 'Karthikj@38'),
(22, 'Uyam', 'mangalore', 'uyam@gmail.com', 9008904153, 'Uyam@38'),
(23, 'Suhas', 'gurupura', 'suhas@gmail.com', 9611534162, 'Suhas@38'),
(25, 'Basith', 'valencia', 'basith@gmail.com', 7894738901, 'Basith@38'),
(27, 'Deeksha', 'mannagudda', 'deeksha@gmail.com', 9008158554, 'Deeksha@38'),
(28, 'fff', 'fff', 'fff@gmail.com', 9880385382, 'Ffffffffffff@38'),
(29, 'Nisha', 'suratkal', 'nisha@gmail.com', 8745362738, 'Nisha@38'),
(30, 'Srinivas', 'kottara', 'srinivas@gmail.com', 7019218351, 'Srinivas@38');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fid` int(255) NOT NULL,
  `Review` text NOT NULL,
  `Feedback_type` varchar(255) NOT NULL,
  `Rating` int(255) NOT NULL,
  `Cust_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fid`, `Review`, `Feedback_type`, `Rating`, `Cust_id`) VALUES
(21, '             very good', 'positive', 5, 25),
(22, '             Satisfactory', 'negative', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `Plan_no` int(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Isp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--
INSERT INTO `plan` (`Plan_no`, `Amount`, `Description`, `Isp_id`) VALUES
(1, 'Rs 399/month', '1GB/day', 3),
(2, 'Rs 499/month', '3GB/day', 3),
(3, 'Rs 699/month', '5GB/day', 3),
(4, 'Rs 1199/month', '6GB/day', 3),
(5, 'Rs 1999/month', '8GB/day', 3),
(6, 'Rs 799/month', '3.5GB/day', 3),
(7, 'Rs 79/month', '500mb/day', 3);

--
-- Triggers `plan`
--
DELIMITER $$
CREATE TRIGGER `Pamount` BEFORE INSERT ON `plan` FOR EACH ROW BEGIN 
 IF NEW.Amount<0 THEN 
   SIGNAL SQLSTATE '45000'
   SET MESSAGE_TEXT ="ERROR:Amount must be a positive number!";
 END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Acc_id`),
  ADD KEY `Cust_id` (`Cust_id`),
  ADD KEY `Plan_no` (`Plan_no`);

--
-- Indexes for table `ISP`
--
ALTER TABLE `isp`
  ADD PRIMARY KEY (`Isp_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_id`),
  ADD KEY `Cust_id` (`Cust_id`),
  ADD KEY `Isp_id` (`Isp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fid`),
  ADD KEY `Cust_id` (`Cust_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`Plan_no`),
  ADD KEY `plan_ibfk_1` (`Isp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Acc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ISP`
--
ALTER TABLE `isp`
  MODIFY `Isp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Bill_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `Plan_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`Plan_no`) REFERENCES `plan` (`Plan_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`Isp_id`) REFERENCES `isp` (`Isp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`Isp_id`) REFERENCES `isp` (`Isp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
