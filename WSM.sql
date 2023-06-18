SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

# Database: `watersupplymanagement`

CREATE DATABASE IF NOT EXISTS `watersupplymanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `watersupplymanagement`;

#Table structure for customers
CREATE TABLE IF NOT EXISTS CustomerAccount (
  customerID int(50) NOT NULL AUTO_INCREMENT,
  customerName varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL, 
  address varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  phoneNumber int(8) DEFAULT NULL,
  bankAccount varchar(20) DEFAULT NULL,
  PRIMARY KEY (customerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for staff
CREATE TABLE IF NOT EXISTS StaffAccount (
  staffID int(50) NOT NULL AUTO_INCREMENT,
  username varchar(20) DEFAULT NULL,
  staffName varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  role varchar (10) DEFAULT NULL,
  imageName varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (staffID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for chemicals
CREATE TABLE IF NOT EXISTS Chemicals (
  chemicalID int(50) NOT NULL AUTO_INCREMENT,
  chemicalName varchar(100) DEFAULT NULL,
  useTime int(5) DEFAULT NULL,
  quantity int(50) NOT NULL,
  expiryDate DATE DEFAULT NULL,
  PRIMARY KEY (chemicalID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for equipment
CREATE TABLE IF NOT EXISTS Equipments (
  equipmentID int(50) NOT NULL AUTO_INCREMENT,
  equipmentName varchar(100) DEFAULT NULL,
  quantity int(50) NOT NULL,
  installationDate DATE DEFAULT NULL,
  expiryDate DATE DEFAULT NULL,
  warrantyDate DATE DEFAULT NULL,
  PRIMARY KEY (equipmentID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS WaterUsageBill (
  waterUsageID int(50) NOT NULL AUTO_INCREMENT,
  waterUsage float(10,2),
  billDate Date,
  dueDate Date,
  customerID int(50),
  billStatus bit(1) NOT NULL DEFAULT 0,
  paymentStatus bit(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (waterUsageID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS priceRate (
	priceID int(50) NOT NULL AUTO_INCREMENT,
  priceDate Date,
  waterPriceRate double(10, 2),
  PRIMARY KEY (priceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS SupportTicket (
	supportTicketID int(50) NOT NULL AUTO_INCREMENT,
  customerID int(50),
  staffID int(50) DEFAULT NULL,
  ticketStatus bit(1) DEFAULT 0,
  details varchar(200),
  time_of_issue DateTime,
  time_of_resolution DateTime,
  PRIMARY KEY (supportTicketID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS ComplaintTicket (
	complaintTicketID int(50) NOT NULL AUTO_INCREMENT,
  customerID int(50),
  staffID int(50) DEFAULT NULL,
  ticketStatus bit(1) DEFAULT 0,
  details varchar(200),
  time_of_issue DateTime,
  time_of_resolution DateTime,
  PRIMARY KEY (complaintTicketID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#YYYY-MM-DD
INSERT INTO `Equipments` (`equipmentName`, `quantity`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
('Equipment1', '2', now(),  now(), 2024-05-21); 

INSERT INTO `Chemicals` (`chemicalName`, `useTime`, `quantity`, `expiryDate`) VALUES
('Chemical1', '123', '3', now());

INSERT INTO `StaffAccount` (`username`, `staffName`, `email`, `password`, `role`) VALUES
('asd', 'Ernest', 'abc@gmail.com', 'password', 'Admin');

INSERT INTO `StaffAccount` (`username`, `staffName`, `email`, `password`, `role`) VALUES
('staff', 'Ernest', 'abc@gmail.com', 'password', 'Staff');

INSERT INTO `CustomerAccount` (`customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
('Bob', 'c@gmail.com', 'ang mo kio','password', 12345678, '12312312312312312312');

INSERT INTO `SupportTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
('1', 0, 'asdasdasdasd', now(), now());

INSERT INTO `ComplaintTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
('1', 0, 'test1', now(), now());

INSERT INTO `ComplaintTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
('1', 0, 'test2', now(), now());

INSERT INTO `priceRate` (`priceDate`, `waterPriceRate`) VALUES
(now(), 0.5);

ALTER TABLE CustomerAccount 
  AUTO_INCREMENT=1;

ALTER TABLE StaffAccount 
  AUTO_INCREMENT=1;

ALTER TABLE Chemicals 
  AUTO_INCREMENT=1;

ALTER TABLE Equipments 
  AUTO_INCREMENT=1;

ALTER TABLE WaterUsageBill 
  AUTO_INCREMENT=1;

ALTER TABLE priceRate 
  AUTO_INCREMENT=1;

ALTER TABLE SupportTicket 
  AUTO_INCREMENT=1;

ALTER TABLE ComplaintTicket 
  AUTO_INCREMENT=1;

ALTER TABLE `supportticket` CHANGE `time_of_issue` `time_of_issue` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `complaintticket` CHANGE `time_of_issue` `time_of_issue` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `supportticket` CHANGE `ticketStatus` `ticketStatus` BIT(1) NOT NULL DEFAULT b'0';

ALTER TABLE `complaintticket` CHANGE `ticketStatus` `ticketStatus` BIT(1) NOT NULL DEFAULT b'0';

ALTER TABLE `waterusagebill` ADD FOREIGN KEY (`customerID`) REFERENCES `customeraccount`(`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;