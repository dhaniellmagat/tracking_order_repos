-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 09:03 PM
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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_information` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `contact_information`, `address`, `username`, `password`) VALUES
(1, 'Juliana Arla Paguinto', '235252456234', 'jan lnag', 'jasp', 'jasp'),
(2, 'yuna shin', '235234562345', 'tgjterjyytry', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `delivery_address`, `total_amount`) VALUES
(1, 1, '2024-04-20 03:01:43', 'jan lnag', 48);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity_ordered` int(50) NOT NULL,
  `price_at_order_time` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity_ordered`, `price_at_order_time`) VALUES
(1, 1, 1, 1, 25),
(2, 1, 2, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Amount` bigint(200) DEFAULT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_ID`, `name`, `order_id`, `Amount`, `Type`) VALUES
(1, 'Juliana Arla Paguinto', 1, NULL, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(200) NOT NULL,
  `quantity_in_stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `quantity_in_stock`) VALUES
(1, 'wilkins2', 'tubig', 25, 5),
(2, 'cena', 'john', 23, 32);

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
(1, 'TN04204909', 1, 1, 1, NULL, '2024-04-20 03:01:45');

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_postlocations`
--
ALTER TABLE `tbl_postlocations`
  MODIFY `postLocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_trackinginformation`
--
ALTER TABLE `tbl_trackinginformation`
  MODIFY `TrackingID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_trackingstatus`
--
ALTER TABLE `tbl_trackingstatus`
  MODIFY `TrackingStatusID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
