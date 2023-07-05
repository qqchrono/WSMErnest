SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

# Database: `watersupplymanagement`

CREATE DATABASE IF NOT EXISTS `watersupplymanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `watersupplymanagement`;

#Table structure for customers
CREATE TABLE IF NOT EXISTS CustomerAccount (
  customerID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  customerName varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL, 
  address varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  phoneNumber int(8) DEFAULT NULL,
  bankAccount varchar(20) DEFAULT NULL,
  customerPlanType varchar(20) DEFAULT NULL,
  PRIMARY KEY (customerID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for Companies
CREATE TABLE IF NOT EXISTS CompanyDetails (
  companyUEN int(50) NOT NULL,
  companyName varchar(20) DEFAULT NULL,
  companyAddress varchar(100) DEFAULT NULL,
  companyPhoneNumber varchar(100) DEFAULT NULL,
  companyAccountStatus bit(1) DEFAULT 0, #Active or not
  companyPaymentStatus bit(1) DEFAULT 0, #Paid for the sub or not
  companySubscriptionType bit(3) DEFAULT NULL, #How long are they subbed for
  companyTrialStatus bit(1) DEFAULT 0, #Have they applied for free trial already
  companyExpiryDate DATETIME DEFAULT NULL,
  PRIMARY KEY (companyUEN)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for staff
CREATE TABLE IF NOT EXISTS StaffAccount (
  staffID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  username varchar(20) DEFAULT NULL,
  staffName varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  password varchar(100) NOT NULL,
  role varchar (15) DEFAULT NULL,
  imageName varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (staffID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for chemicals
CREATE TABLE IF NOT EXISTS Chemicals (
  chemicalID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  chemicalName varchar(100) DEFAULT NULL,
  useTime int(5) DEFAULT NULL,
  quantity int(50) NOT NULL,
  expiryDate DATE DEFAULT NULL,
  PRIMARY KEY (chemicalID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#Table structure for equipment
CREATE TABLE IF NOT EXISTS Equipments (
  equipmentID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  equipmentName varchar(100) DEFAULT NULL,
  quantity int(50) NOT NULL,
  technicalParameters varchar(100) DEFAULT NULL,
  installationDate DATE DEFAULT NULL,
  expiryDate DATE DEFAULT NULL,
  warrantyDate DATE DEFAULT NULL,
  PRIMARY KEY (equipmentID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS WaterUsageBill (
  waterUsageID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  waterUsage float(10,2),
  billAmount float(10,2) DEFAULT NULL,
  billDate Date,
  dueDate Date DEFAULT NULL,
  customerID int(50),
  billStatus bit(1) NOT NULL DEFAULT 0,
  paymentStatus bit(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (waterUsageID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS priceRate (
	priceID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
  priceDate Date,
  waterPriceRate double(10, 2),
  offPeakwaterPriceRate double(10, 2),
  peakWaterPriceRate double(10, 2),
  PRIMARY KEY (priceID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS SupportTicket (
	supportTicketID int(50) NOT NULL AUTO_INCREMENT,
  companyUEN int(50) NOT NULL,
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
  companyUEN int(50) NOT NULL,
  customerID int(50),
  staffID int(50) DEFAULT NULL,
  ticketStatus bit(1) DEFAULT 0,
  details varchar(200),
  time_of_issue DateTime,
  time_of_resolution DateTime,
  PRIMARY KEY (complaintTicketID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(000000, 'Hydrogrid', 'Woodlands', '00001111', 1, 1, 1, 0, '2023-12-01');

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(111111, 'Water Company A', 'Woodlands', '11112222', 1, 1, 1, 0, '2023-12-01');

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(222222, 'Water Company B', 'Admiralty', '22223333', 1, 1, 1, 0, '2023-12-01');

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(333333, 'Water Company C', 'Khatib', '33334444', 1, 1, 1, 0, '2023-12-01');

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(444444, 'Water Company D', 'Yio Chu Kang', '44445555', 1, 1, 1, 0, '2023-12-01');

INSERT INTO `CompanyDetails` (`companyUEN`, `companyName`, `companyAddress`, `companyPhoneNumber`, `companyAccountStatus`
, `companyPaymentStatus`, `companySubscriptionType`, `companyTrialStatus`, `companyExpiryDate`) VALUES
(555555, 'Water Company E', 'Bishan', '55556666', 1, 1, 1, 0, '2023-12-01');


#YYYY-MM-DD
INSERT INTO `Equipments` (`companyUEN`, `equipmentName`, `quantity`, `technicalParameters`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
(111111, 'Pipe', 5, '2" threaded brass pipe and fittings', now(), '2023-10-02', '2026-07-02');

INSERT INTO `Equipments` (`companyUEN`, `equipmentName`, `quantity`, `technicalParameters`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
(111111, 'Valve', 10, '2" Pressure relief valve', now(), '2023-10-02', '2026-07-02'); 

INSERT INTO `Equipments` (`companyUEN`, `equipmentName`, `quantity`, `technicalParameters`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
(111111, 'Pump', 25, '6"x"12" end pump vault w/ solid walls', now(), '2023-10-02', '2026-07-02'); 

INSERT INTO `Equipments` (`companyUEN`, `equipmentName`, `quantity`, `technicalParameters`, `installationDate`, `expiryDate`, `warrantyDate`) VALUES
(111111, 'Spool', 13, '6" FL x PE SPOOL', now(), '2023-10-02', '2026-07-02'); 


INSERT INTO `Chemicals` (`companyUEN`, `chemicalName`, `useTime`, `quantity`, `expiryDate`) VALUES
(111111, 'Chlorine', '4', '10', '2026-07-02');

INSERT INTO `Chemicals` (`companyUEN`, `chemicalName`, `useTime`, `quantity`, `expiryDate`) VALUES
(111111, 'Chloramine', '3', '15', '2026-10-2');

INSERT INTO `Chemicals` (`companyUEN`, `chemicalName`, `useTime`, `quantity`, `expiryDate`) VALUES
(111111, 'Chlorine Dioxide', '8', '10', '2026-06-02');


INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(000000 ,'superadmin', 'superadmin', 'superadmin@gmail.com', 'password', 'Super Admin');


INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(111111, 'admin1', 'John', 'john@gmail.com', 'password', 'Admin');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(222222, 'admin2', 'Megan', 'megan@gmail.com', 'password', 'Admin');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(333333, 'admin3', 'Robin', 'robin@gmail.com', 'password', 'Admin');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(444444, 'admin4', 'Candice', 'candice@gmail.com', 'password', 'Admin');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(555555, 'admin5', 'Steve', 'steve@gmail.com', 'password', 'Admin');


INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(111111 ,'staff1', 'Tom', 'tom@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(111111 ,'staff2', 'Billy', 'billy@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(222222 ,'staff3', 'Perry', 'perry@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(222222 ,'staff4', 'Jenny', 'jenny@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(333333 ,'staff5', 'George', 'george@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(444444 ,'staff6', 'Alicia', 'alicia@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(555555 ,'staff7', 'Joshua', 'joshua@gmail.com', 'password', 'Staff');

INSERT INTO `StaffAccount` (`companyUEN`, `username`, `staffName`, `email`, `password`, `role`) VALUES
(555555 ,'staff8', 'Timmy', 'timmy@gmail.com', 'password', 'Staff');


INSERT INTO `CustomerAccount` (`companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
(111111, 'Bob', 'bob@gmail.com', 'ang mo kio','password', 12345678, '12312312312312312312');

INSERT INTO `CustomerAccount` (`companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
(222222, 'Tom', 'tom@gmail.com', 'bishan','password', 87654321, '12312312312312312312');

INSERT INTO `CustomerAccount` (`companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
(333333, 'Karen', 'karen@gmail.com', 'Pasir Ris','password', 78994521, '12312312312312312312');

INSERT INTO `CustomerAccount` (`companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
(444444, 'Clive', 'clive@gmail.com', 'Tampines','password', 21346527, '12312312312312312312');

INSERT INTO `CustomerAccount` (`companyUEN`, `customerName`, `email`, `address`, `password`, `phoneNumber`, `bankAccount`) VALUES
(555555, 'Torgal', 'torgal@gmail.com', 'Clementi','password', 74185296, '12312312312312312312');


INSERT INTO `SupportTicket` (`companyUEN`, `customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
(111111, '1', 0, 'Change in address', now(), now());

INSERT INTO `ComplaintTicket` (`companyUEN`, `customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
(111111, '1', 0, 'Water from tap dirty', now(), now());

INSERT INTO `ComplaintTicket` (`companyUEN`, `customerID`, `ticketStatus`, `details`, `time_of_issue`, `time_of_resolution`) VALUES
(111111, '1', 0, 'No water supply', now(), now());

INSERT INTO `priceRate` (`priceDate`, `waterPriceRate`) VALUES
(now(), 0.5);

INSERT INTO `WaterUsageBill` (`waterUsage`, `billDate`, `dueDate`, `customerID`) VALUES
(10.5, now(), now(), '1');

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