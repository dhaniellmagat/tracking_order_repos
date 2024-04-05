-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 09:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`OrderID`, `CustomerID`, `OrderDate`) VALUES
(1, 2, '2024-04-06 00:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postlocations`
--

CREATE TABLE `tbl_postlocations` (
  `postLocationID` int(11) NOT NULL,
  `PostName` varchar(200) NOT NULL,
  `PostAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_postlocations`
--

INSERT INTO `tbl_postlocations` (`postLocationID`, `PostName`, `PostAddress`) VALUES
(1, 'Main Branch', 'Arayat Pampanga'),
(2, 'Branch 1', 'Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trackinginformation`
--

CREATE TABLE `tbl_trackinginformation` (
  `TrackingID` int(100) NOT NULL,
  `TrackingNumber` varchar(10) NOT NULL,
  `OrderID` int(100) NOT NULL,
  `TrackingStatusID` int(100) NOT NULL,
  `PostLocationID` int(100) NOT NULL,
  `DestinationPostID` int(11) DEFAULT NULL,
  `InitialDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trackinginformation`
--

INSERT INTO `tbl_trackinginformation` (`TrackingID`, `TrackingNumber`, `OrderID`, `TrackingStatusID`, `PostLocationID`, `DestinationPostID`, `InitialDate`) VALUES
(1, 'TN04030001', 1, 6, 1, 2, '2024-04-01 18:58:26'),
(2, 'TN04030002', 2, 5, 1, 2, '2024-04-03 18:58:29'),
(3, 'TN04030003', 3, 2, 1, 2, '2024-04-05 12:40:44'),
(4, 'TN04052686', 4, 2, 1, 2, '2024-04-05 18:10:59'),
(5, 'TN04052225', 1, 2, 1, 2, '2024-04-06 01:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trackingstatus`
--

CREATE TABLE `tbl_trackingstatus` (
  `TrackingStatusID` int(100) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trackingstatus`
--

INSERT INTO `tbl_trackingstatus` (`TrackingStatusID`, `Status`) VALUES
(1, 'PENDING'),
(2, 'CONFIRMED'),
(3, 'IN TRANSIT'),
(4, 'OUT FOR DELIVERY'),
(5, 'DELIVERED'),
(6, 'RETURNED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tbl_postlocations`
--
ALTER TABLE `tbl_postlocations`
  ADD PRIMARY KEY (`postLocationID`);

--
-- Indexes for table `tbl_trackinginformation`
--
ALTER TABLE `tbl_trackinginformation`
  ADD PRIMARY KEY (`TrackingID`);

--
-- Indexes for table `tbl_trackingstatus`
--
ALTER TABLE `tbl_trackingstatus`
  ADD PRIMARY KEY (`TrackingStatusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_postlocations`
--
ALTER TABLE `tbl_postlocations`
  MODIFY `postLocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_trackinginformation`
--
ALTER TABLE `tbl_trackinginformation`
  MODIFY `TrackingID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_trackingstatus`
--
ALTER TABLE `tbl_trackingstatus`
  MODIFY `TrackingStatusID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
