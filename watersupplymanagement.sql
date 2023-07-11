-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watersupplymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `BankAccountID` int(50) NOT NULL,
  `AccountNumber` varchar(200) DEFAULT NULL,
  `Balance` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE `chemicals` (
  `chemicalID` int(50) NOT NULL,
  `chemicalSKU` int(10) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `chemicalName` varchar(100) DEFAULT NULL,
  `chemicalDescription` varchar(100) DEFAULT NULL,
  `chemicalClass` varchar(10) DEFAULT NULL,
  `useTime` int(5) DEFAULT NULL,
  `quantity` int(50) NOT NULL,
  `minimumQty` int(3) NOT NULL,
  `chemicalPrice` float(10,2) NOT NULL,
  `expiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`chemicalID`, `chemicalSKU`, `companyUEN`, `chemicalName`, `chemicalDescription`, `chemicalClass`, `useTime`, `quantity`, `minimumQty`, `chemicalPrice`, `expiryDate`) VALUES
(1, 987546, 111111, 'Chlorine', NULL, NULL, 4, 10, 5, 0.00, '2026-07-02'),
(2, 987545, 111111, 'Chloramine', NULL, NULL, 3, 15, 5, 0.00, '2026-10-02'),
(3, 987544, 111111, 'Chlorine Dioxide', NULL, NULL, 8, 10, 5, 0.00, '2026-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `companyUEN` int(50) NOT NULL,
  `companyName` varchar(20) DEFAULT NULL,
  `companyAddress` varchar(100) DEFAULT NULL,
  `companyPhoneNumber` varchar(100) DEFAULT NULL,
  `companyAccountStatus` bit(1) DEFAULT b'0',
  `companyPaymentStatus` bit(1) DEFAULT b'0',
  `companySubscriptionType` bit(3) DEFAULT NULL,
  `companyTrialStatus` bit(1) DEFAULT b'0',
  `companyExpiryDate` datetime DEFAULT NULL,
  `maxTickets` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`, `maxTickets`) VALUES
(0, 'Hydrogrid', 'Woodlands', '00001111', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL),
(111111, 'Water Company A', 'Woodlands', '11112222', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL),
(222222, 'Water Company B', 'Admiralty', '22223333', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL),
(333333, 'Water Company C', 'Khatib', '33334444', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL),
(444444, 'Water Company D', 'Yio Chu Kang', '44445555', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL),
(555555, 'Water Company E', 'Bishan', '55556666', b'1', b'1', b'001', b'0', '2023-12-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintticket`
--

CREATE TABLE `complaintticket` (
  `complaintTicketID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `customerID` int(50) DEFAULT NULL,
  `staffID` int(50) DEFAULT NULL,
  `ticketStatus` bit(1) NOT NULL DEFAULT b'0',
  `details` varchar(200) DEFAULT NULL,
  `time_of_issue` datetime NOT NULL DEFAULT current_timestamp(),
  `time_of_resolution` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaintticket`
--

INSERT INTO `complaintticket` (`complaintTicketID`, `companyUEN`, `customerID`, `staffID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
(1, 111111, 1, NULL, b'0', 'Water from tap dirty', '2023-07-11 12:48:46', '2023-07-11 12:48:46'),
(2, 111111, 1, NULL, b'0', 'No water supply', '2023-07-11 12:48:46', '2023-07-11 12:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `customeraccount`
--

CREATE TABLE `customeraccount` (
  `customerID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `customerName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `phoneNumber` int(8) DEFAULT NULL,
  `bankAccount` varchar(20) DEFAULT NULL,
  `customerPlanType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customeraccount`
--

INSERT INTO `customeraccount` (`customerID`, `companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`, `customerPlanType`) VALUES
(1, 111111, 'Bob', 'bob@gmail.com', 'ang mo kio', 'password', 12345678, '12312312312312312312', NULL),
(2, 222222, 'Tom', 'tom@gmail.com', 'bishan', 'password', 87654321, '12312312312312312312', NULL),
(3, 333333, 'Karen', 'karen@gmail.com', 'Pasir Ris', 'password', 78994521, '12312312312312312312', NULL),
(4, 444444, 'Clive', 'clive@gmail.com', 'Tampines', 'password', 21346527, '12312312312312312312', NULL),
(5, 555555, 'Torgal', 'torgal@gmail.com', 'Clementi', 'password', 74185296, '12312312312312312312', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipmentID` int(50) NOT NULL,
  `equipmentSKU` int(10) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `equipmentName` varchar(100) DEFAULT NULL,
  `quantity` int(50) NOT NULL,
  `minimumQty` int(3) NOT NULL,
  `equipmentPrice` float(10,2) NOT NULL,
  `technicalParameters` varchar(100) DEFAULT NULL,
  `installationDate` date DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `warrantyDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipmentID`, `equipmentSKU`, `companyUEN`, `equipmentName`, `quantity`, `minimumQty`, `equipmentPrice`, `technicalParameters`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
(1, 123456, 111111, 'Pipe', 6, 5, 0.00, '2\" threaded brass pipe and fittings', '2023-07-11', '2023-10-02', '2026-07-02'),
(2, 123233, 111111, 'Valve', 10, 5, 0.00, '2\" Pressure relief valve', '2023-07-11', '2023-10-02', '2026-07-02'),
(3, 122234, 111111, 'Pump', 25, 5, 0.00, '6\"x\"12\" end pump vault w/ solid walls', '2023-07-11', '2023-10-02', '2026-07-02'),
(4, 222333, 111111, 'Spool', 13, 5, 0.00, '6\" FL x PE SPOOL', '2023-07-11', '2023-10-02', '2026-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(50) NOT NULL,
  `companyUEN` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `notificationType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricerate`
--

CREATE TABLE `pricerate` (
  `priceID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `priceDate` date DEFAULT NULL,
  `waterPriceRate` double(10,2) DEFAULT NULL,
  `offPeakwaterPriceRate` double(10,2) DEFAULT NULL,
  `peakWaterPriceRate` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricerate`
--

INSERT INTO `pricerate` (`priceID`, `companyUEN`, `priceDate`, `waterPriceRate`, `offPeakwaterPriceRate`, `peakWaterPriceRate`) VALUES
(1, 0, '2023-07-11', 0.50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffaccount`
--

CREATE TABLE `staffaccount` (
  `staffID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `staffName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) DEFAULT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffaccount`
--

INSERT INTO `staffaccount` (`staffID`, `companyUEN`, `username`, `staffName`, `email`, `password`, `role`, `imageName`) VALUES
(1, 0, 'superadmin', 'superadmin', 'superadmin@gmail.com', 'password', 'Super Admin', NULL),
(2, 111111, 'admin1', 'John', 'john@gmail.com', 'password', 'Admin', NULL),
(3, 222222, 'admin2', 'Megan', 'megan@gmail.com', 'password', 'Admin', NULL),
(4, 333333, 'admin3', 'Robin', 'robin@gmail.com', 'password', 'Admin', NULL),
(5, 444444, 'admin4', 'Candice', 'candice@gmail.com', 'password', 'Admin', NULL),
(6, 555555, 'admin5', 'Steve', 'steve@gmail.com', 'password', 'Admin', NULL),
(7, 111111, 'staff1', 'Tom', 'tom@gmail.com', 'password', 'Staff', NULL),
(8, 111111, 'staff2', 'Billy', 'billy@gmail.com', 'password', 'Staff', NULL),
(9, 222222, 'staff3', 'Perry', 'perry@gmail.com', 'password', 'Staff', NULL),
(10, 222222, 'staff4', 'Jenny', 'jenny@gmail.com', 'password', 'Staff', NULL),
(11, 333333, 'staff5', 'George', 'george@gmail.com', 'password', 'Staff', NULL),
(12, 444444, 'staff6', 'Alicia', 'alicia@gmail.com', 'password', 'Staff', NULL),
(13, 555555, 'staff7', 'Joshua', 'joshua@gmail.com', 'password', 'Staff', NULL),
(14, 555555, 'staff8', 'Timmy', 'timmy@gmail.com', 'password', 'Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supportticket`
--

CREATE TABLE `supportticket` (
  `supportTicketID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `customerID` int(50) DEFAULT NULL,
  `staffID` int(50) DEFAULT NULL,
  `ticketStatus` bit(1) NOT NULL DEFAULT b'0',
  `details` varchar(200) DEFAULT NULL,
  `time_of_issue` datetime NOT NULL DEFAULT current_timestamp(),
  `time_of_resolution` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supportticket`
--

INSERT INTO `supportticket` (`supportTicketID`, `companyUEN`, `customerID`, `staffID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
(1, 111111, 1, NULL, b'0', 'Change in address', '2023-07-11 12:48:46', '2023-07-11 12:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `waterusagebill`
--

CREATE TABLE `waterusagebill` (
  `waterUsageID` int(50) NOT NULL,
  `companyUEN` int(50) NOT NULL,
  `waterUsage` float(10,2) DEFAULT NULL,
  `billAmount` float(10,2) DEFAULT NULL,
  `billDate` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `customerID` int(50) DEFAULT NULL,
  `billStatus` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waterusagebill`
--

INSERT INTO `waterusagebill` (`waterUsageID`, `companyUEN`, `waterUsage`, `billAmount`, `billDate`, `dueDate`, `customerID`, `billStatus`) VALUES
(1, 0, 10.50, NULL, '2023-07-11', '2023-07-11', 1, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`BankAccountID`);

--
-- Indexes for table `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`chemicalID`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`companyUEN`);

--
-- Indexes for table `complaintticket`
--
ALTER TABLE `complaintticket`
  ADD PRIMARY KEY (`complaintTicketID`);

--
-- Indexes for table `customeraccount`
--
ALTER TABLE `customeraccount`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `pricerate`
--
ALTER TABLE `pricerate`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `supportticket`
--
ALTER TABLE `supportticket`
  ADD PRIMARY KEY (`supportTicketID`);

--
-- Indexes for table `waterusagebill`
--
ALTER TABLE `waterusagebill`
  ADD PRIMARY KEY (`waterUsageID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankaccount`
--
ALTER TABLE `bankaccount`
  MODIFY `BankAccountID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `chemicalID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaintticket`
--
ALTER TABLE `complaintticket`
  MODIFY `complaintTicketID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customeraccount`
--
ALTER TABLE `customeraccount`
  MODIFY `customerID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipmentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricerate`
--
ALTER TABLE `pricerate`
  MODIFY `priceID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffaccount`
--
ALTER TABLE `staffaccount`
  MODIFY `staffID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supportticket`
--
ALTER TABLE `supportticket`
  MODIFY `supportTicketID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waterusagebill`
--
ALTER TABLE `waterusagebill`
  MODIFY `waterUsageID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `waterusagebill`
--
ALTER TABLE `waterusagebill`
  ADD CONSTRAINT `waterusagebill_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customeraccount` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
