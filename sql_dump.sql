-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rexx
CREATE DATABASE IF NOT EXISTS `rexx` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rexx`;

-- Dumping structure for table rexx.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_mail` varchar(50) NOT NULL DEFAULT '',
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `sale_date` datetime NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
