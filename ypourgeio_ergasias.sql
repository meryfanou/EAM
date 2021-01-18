-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 02:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ypourgeio_ergasias`
--

CREATE DATABASE `ypourgeio_ergasias`;
Use `ypourgeio_ergasias`;

-- --------------------------------------------------------

--
-- Table structure for table `Enterprises`
--

CREATE TABLE `Enterprises` (
  `enterpriseID` int(11) NOT NULL,
  `name` text NOT NULL,
  `AFM` text NOT NULL,
  `address` text NOT NULL,
  `PC` int(11) NOT NULL,
  `municipality` text NOT NULL,
  `duringCovid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Enterprises`
--

INSERT INTO `Enterprises` (`enterpriseID`, `name`, `AFM`, `address`, `PC`, `municipality`, `duringCovid`) VALUES
(1, 'MyMarket', '294068392', 'Λ. Πεντέλης 142', 15234, 'Χαλάνδρι', 'Σε λειτουργεία');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `AFM` text NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `address` text NOT NULL,
  `PC` int(11) NOT NULL,
  `municipality` text NOT NULL,
  `birthDate` date NOT NULL,
  `email` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `userType` text NOT NULL,
  `profession` text NOT NULL,
  `AME` text DEFAULT NULL,
  `enterpriseID` int(11) DEFAULT NULL,
  `cellphoneNumber` text DEFAULT NULL,
  `enterpriseNumber` text DEFAULT NULL,
  `insuranceFund` text DEFAULT NULL,
  `onLeave` text DEFAULT NULL,
  `onLeaveFrom` date DEFAULT NULL,
  `onLeaveTo` date DEFAULT NULL,
  `duringCovid` text DEFAULT NULL,
  `children` set('Ναι','Όχι') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `username`, `password`, `AFM`, `firstName`, `lastName`, `address`, `PC`, `municipality`, `birthDate`, `email`, `phoneNumber`, `userType`, `profession`, `AME`, `enterpriseID`, `cellphoneNumber`, `enterpriseNumber`, `insuranceFund`, `onLeave`, `onLeaveFrom`, `onLeaveTo`, `duringCovid`, `children`) VALUES
(1, 'konstantinos', 'Aa123456', '123456789', 'Κωνσταντίνος', 'Θεοδώρου', 'Γεωργίου Λαμπράκη 13', 15121, 'Μαρούσι', '1976-01-07', 'kostas_theod@gmail.com', '2103948206', 'Εργοδότης', 'Διευθυντής καταστήματος Supermarket', '2940238495', 1, '6918204728', '2103929485', 'Τ.Ε.Α.Υ.Ε.Τ. (Ταμείο Επαγγελματικής Ασφάλισης Υπαλλήλων Εμπορίου Τροφίμων)', NULL, NULL, NULL, NULL, ''),
(2, 'maria_lytra', 'Aa123456', '987654321', 'Μαρία', 'Λύτρα', 'Γιασεμιών 17', 15125, 'Χαλάνδρι', '1983-07-25', 'maria_lytra@yahoo.gr', '2103916482', 'Εργαζόμενος', 'Υπάλληλος σε κατάστημα Supermarket', NULL, 1, '6930283948', '', 'Τ.Ε.Α.Υ.Ε.Τ. (Ταμείο Επαγγελματικής Ασφάλισης Υπαλλήλων Εμπορίου Τροφίμων)', 'Σε άδεια ειδικού σκοπού', '2020-12-15', '2021-01-24', 'Σε αναστολή από 2020-12-17', 'Ναι');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Enterprises`
--
ALTER TABLE `Enterprises`
  ADD PRIMARY KEY (`enterpriseID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
