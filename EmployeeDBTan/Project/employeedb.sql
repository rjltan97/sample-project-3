-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2017 at 09:29 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `FNAME` varchar(15) NOT NULL,
  `MINIT` char(1) DEFAULT NULL,
  `LNAME` varchar(15) NOT NULL,
  `SSN` char(9) NOT NULL,
  `BDATE` date DEFAULT NULL,
  `ADDRESS` varchar(30) DEFAULT NULL,
  `GENDER` char(1) DEFAULT NULL,
  `SALARY` decimal(10,2) DEFAULT NULL,
  `SUPERSSN` char(9) DEFAULT NULL,
  `DNO` int(11) NOT NULL,
  UNIQUE KEY `SSN` (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`FNAME`, `MINIT`, `LNAME`, `SSN`, `BDATE`, `ADDRESS`, `GENDER`, `SALARY`, `SUPERSSN`, `DNO`) VALUES
('Jan Mervin L', 'L', 'Borlagdatan', '1000', '1997-10-12', 'QC', 'M', 50000.00, '1000000', 2),
('Mel John', 'O', 'Ugaddan', '10000', '1997-08-17', 'QC', 'M', 35000.00, '10000000', 2),
('Carlo', 'V', 'Ponce', '11000000', '1998-01-03', 'QC', 'M', 35000.00, '11000000', 2),
('Tristan Viel', 'O', 'Antazo', '12000', '1997-04-17', 'QC', 'M', 30000.00, '12000000', 2),
('Mark Darell', 'C', 'Octubre', '13000', '1997-07-14', 'Tatalon QC', 'M', 5000.00, '13000000', 2),
('Jeraldo', 'C', 'San Jose', '14000', '1997-07-22', 'Montalban Rizal', 'M', 40000.00, '14000000', 2),
('Alvin', 'S', 'Tabas', '15000', '1996-10-27', 'QC', 'M', 5000.00, '15000000', 2),
('Stanley', 'C', 'Ejeka', '16000', '1995-04-25', 'QC', 'M', 900000.00, '16000000', 2),
('Gospel', 'I', 'Kunat', '17000', '1996-10-01', 'QC', 'M', 45000.00, '17000000', 2),
('Andrew', 'A', 'Ihekoronye', '18000', '1996-10-01', 'QC', 'M', 700000.00, '18000000', 2),
('Emmanuel', 'B', 'Bernalla', '19000', '1992-08-26', 'S Rizal', 'M', 50000.00, '19000000', 2),
('Andreu Vinzent', 'F', 'Robles', '2000', '1996-03-16', 'Marikina City', 'M', 50000.00, '2000000', 2),
('Renz', 'D', 'Blasquillo', '20000', '1995-10-23', 'Kings Point', 'M', 30000.00, '20000000', 2),
('Jethro', 'D', 'Estrada', '21000', '1993-10-16', 'San Juan City', 'M', 60000.00, '21000000', 2),
('Trishia', 'C', 'Lopez', '3000', '1998-02-19', 'Quezon City', 'F', 75000.00, '3000000', 1),
('Andrea', 'A', 'Velayo', '4000', '1997-10-15', 'Cainta', 'F', 80000.00, '4000000', 1),
('Kathleen', 'R', 'Leyba', '5000', '1998-06-16', 'Quezon City', 'F', 50000.00, '5000000', 1),
('Carl Dranreb', 'R', 'Marquez', '6000', '1997-10-29', '5 Umbel', 'M', 50000.00, '7000000', 2),
('Robin Joshua', 'L', 'Tan', '7000', '1997-07-25', 'QC', 'M', 500.00, '7000000', 2),
('Aubrey Ivan', 'S', 'Apungan', '8000', '1997-12-17', 'QC', 'M', 750000.50, '8000000', 2),
('Vanessa Marie', 'B', 'Verba', '9000', '1997-07-27', 'Antipolo City', 'F', 500000.00, '9000000', 1),
('Haru', NULL, 'Miya', '111111', '0000-00-00', NULL, NULL, 9.00, NULL, 0),
('asd', NULL, 'asd', '123', '0000-00-00', NULL, NULL, 1.00, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` varchar(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  UNIQUE KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES
('2014300285', 'ROBIN', 'TAN', 'HARU', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
