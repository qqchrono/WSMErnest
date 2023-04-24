SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

# Database: `watersupplymanagement`

CREATE DATABASE IF NOT EXISTS `watersupplymanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `watersupplymanagement`;

#Table structure for users
CREATE TABLE IF NOT EXISTS userAccount (
  userID int(5) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  role varchar (50) DEFAULT NULL,
  password varchar(50) NOT NULL,
  PRIMARY KEY (userID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `userAccount` (`name`, `role`, `password`) VALUES
('Ernest', 'Admin', 'password');

ALTER TABLE userAccount 
  AUTO_INCREMENT=1;

COMMIT;

/*
-- Table structure for table `admin user`

CREATE TABLE `userAccount` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `phone` int(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `role` varchar (50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (userID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'food items'

CREATE TABLE `foodItem` (
  `foodID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (foodID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'cart'

CREATE TABLE `cart`(
  `cartID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(5,2) DEFAULT NULL,
  `quantity` int(50) NULL,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cartID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'actualcart'

CREATE TABLE `actualcart`(
  `cartID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(5,2) DEFAULT NULL,
  `quantity` int(50) NULL,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (cartID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'order'

CREATE TABLE `order`(
  `orderID` int(5) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(50) DEFAULT NULL,
  `cusNum` varchar(50) DEFAULT NULL,
  `cardNum` int(50) DEFAULT NULL,
  `cvv` int(50) DEFAULT NULL,
  `expiryDate` varchar(50) DEFAULT NULL,
  `total_product`  varchar(500) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'uncompleted',
  `date` DATE DEFAULT CURRENT_DATE,
  `startTime` TIME NOT NULL,
  `endTime` TIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (orderID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'restaurant staff'

CREATE TABLE `stafforder` (
  `staffOrderID` int(5) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(50) DEFAULT NULL,
  `cusNum` int(5) NOT NULL,
  `total_product` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_price` float(5,2) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (staffOrderID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for 'coupons'

CREATE TABLE `coupons` (
  `couponCode` varchar(5) NOT NULL,
  `couponDescription` varchar(50) NOT NULL,
  `discountAmount` int(2) NOT NULL,
  PRIMARY KEY (couponCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin user`
--

INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('admin', 'dylan', 11111111, 'admin@email.com', 'Admin', 'admin', 'admin', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('staff', 'edmund', 22222222, 'admin@email.com', 'Staff', 'admin', 'staff', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('manager', 'ernest', 33333333, 'admin@email.com', 'Manager', 'admin', 'manager', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('manager', 'raziq', 44444444, 'admin@email.com', 'manager', 'admin', 'manager', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('owner', 'kings', 55555555, 'admin@email.com', 'Owner', 'admin', 'owner', 'Active');
INSERT INTO `userAccount` (`name`, `surname`, `phone`, `email`, `type`, `role`, `password`,`status`) VALUES
('staff', 'zihao', 66666666, 'admin@email.com', 'Staff', 'admin', 'staff', 'Active');

--
-- 100 Dumping data for table 'order'
--

INSERT INTO `order` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`, `date`, `startTime`, `endTime`) VALUES
('james', '1', 'salad', '1', '6', 'completed', '2022-05-22', '03:23:43', '03:50:55');

--
-- 100 Dumping data for table 'stafforder'
--

INSERT INTO `stafforder` (`cusName`, `cusNum`, `total_product`, `quantity`, `total_price`, `status`) VALUES
('james', '1', 'salad', '1', '6', 'Uncomplete');

--
-- 100 Dumping data for table `foodItem`
--

INSERT INTO `foodItem` (`foodID`, `name`, `price`, `type`, `imageName`, `status`) VALUES
('1', 'Garlic Bread', '6.00', 'Appetizer', 'garlicBread.jpeg', '1');

--
-- 100 Dumping data for table `coupons`
--

INSERT INTO `coupons` (`couponCode`, `couponDescription`, `discountAmount`) VALUES
('AD3', '3 dollars off', '3');


-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `userAccount` 
  AUTO_INCREMENT=1;

ALTER TABLE `foodItem`
  AUTO_INCREMENT=1;

ALTER TABLE `cart`
  AUTO_INCREMENT=1;

ALTER TABLE `order`
  AUTO_INCREMENT=1;

ALTER TABLE `staffOrder`
  AUTO_INCREMENT=1;


COMMIT;

*/