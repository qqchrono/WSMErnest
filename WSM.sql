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
  role varchar (10) DEFAULT NULL,
  phone int(11) DEFAULT NULL,
  bankAccount int(20) DEFAULT NULL,
  PRIMARY KEY (customerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for staff
CREATE TABLE IF NOT EXISTS StaffAccount (
  staffID int(50) NOT NULL AUTO_INCREMENT,
  staffName varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  role varchar (10) DEFAULT NULL,
  status bit(1) DEFAULT 0,
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
  waterUsage double(10, 2),
  Date DateTime,
  customerID int(50),
  billStatus bit(1) NOT NULL DEFAULT 0,
  paymentStatus bit(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (waterUsageID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS priceRate (
	priceID int(50) NOT NULL AUTO_INCREMENT,
  Date DateTime,
  price_rate double(10, 2),
  PRIMARY KEY (priceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS SupportTicket (
	supportTicketID int(50) NOT NULL AUTO_INCREMENT,
  customerID int(50),
  staffID int(50) DEFAULT NULL,
  ticketStatus bit(1) DEFAULT 0,
  details varchar(200),
  time_of_issue DateTime,
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

INSERT INTO `StaffAccount` (`staffName`, `email`, `password`, `role`, `status`) VALUES
('Ernest', 'abc@gmail.com', 'password', 'Admin', 0);

INSERT INTO `CustomerAccount` (`customerName`, `email`, `password`, `role`) VALUES
('Bob', 'c@gmail.com', 'password', 'customer');

INSERT INTO `SupportTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`) VALUES
('1', 0, 'asdasdasdasd', now());

INSERT INTO `ComplaintTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
('1', 0, 'test1', now(), now());

INSERT INTO `ComplaintTicket` (`customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
('1', 0, 'test2', now(), now());

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

COMMIT;