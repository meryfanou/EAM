-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2021 at 11:32 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `Enterprises`
--

CREATE TABLE `Enterprises` (
  `enterpriseID` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `duringCovid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Enterprises`
--

INSERT INTO `Enterprises` (`enterpriseID`, `name`, `address`, `duringCovid`) VALUES
(1, 'MyMarket', 'Λ. Πεντέλης 142 Χαλάνδρι Αττική Ελλάδα', 'Σε λειτουργεία');

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
  `birthDate` date NOT NULL,
  `email` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `userType` text NOT NULL,
  `profession` text NOT NULL,
  `enterpriseID` int(11) NOT NULL,
  `cellphoneNumber` text DEFAULT NULL,
  `enterpriseNumber` text DEFAULT NULL,
  `insuranceFund` text DEFAULT NULL,
  `onLeave` text DEFAULT NULL,
  `duringCovid` text DEFAULT NULL,
  `children` set('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `username`, `password`, `AFM`, `firstName`, `lastName`, `address`, `birthDate`, `email`, `phoneNumber`, `userType`, `profession`, `enterpriseID`, `cellphoneNumber`, `enterpriseNumber`, `insuranceFund`, `onLeave`, `duringCovid`, `children`) VALUES
(1, 'kostantinos', 'Aa123456', '123456789', 'Κωνσταντίνος', 'Θεοδώρου', 'Γεωργίου Λαμπράκη 13 Μαρούσι Αττική Ελλάδα', '1976-01-07', 'kostas_theod@gmail.com', '2103948206', 'Εργοδότης', 'Διευθυντής καταστήματος Supermarket', 1, '6918204728', '2103929485', 'Τ.Ε.Α.Υ.Ε.Τ. (Ταμείο Επαγγελματικής Ασφάλισης Υπαλλήλων Εμπορίου Τροφίμων))', NULL, NULL, 'no'),
(2, 'maria_lytra', 'Aa123456', '987654321', 'Μαρία', 'Λύτρα', 'Γιασεμιών 17 Χαλάνδρι Αττική Ελλάδα', '1983-07-25', 'maria_lytra@yahoo.gr', '2103916482', 'Εργαζόμενος', 'Υπάλληλος σε κατάστημα Supermarket', 1, '6930283948', '', 'Τ.Ε.Α.Υ.Ε.Τ. (Ταμείο Επαγγελματικής Ασφάλισης Υπαλλήλων Εμπορίου Τροφίμων)', NULL, NULL, 'yes');

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
