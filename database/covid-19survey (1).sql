-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 04:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid-19survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `USER_ID` tinyint(4) NOT NULL,
  `Q_ID` tinyint(4) DEFAULT NULL,
  `answer` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`USER_ID`, `Q_ID`, `answer`) VALUES
(51, 4, 'this is a third choice'),
(51, 5, 'other choice'),
(51, 6, 'this is a second choice'),
(52, 4, 'this is a first choice'),
(52, 5, 'other choice '),
(52, 6, 'this is a second choice'),
(52, 7, 'other choice'),
(52, 8, 'this is a first choice'),
(52, 9, 'this is a second choice'),
(52, 10, 'this is a first choice'),
(53, 4, 'sdfsdf sdfsdsf '),
(53, 5, 'this is a first choice'),
(53, 6, 'sfsdfsd sdfsd'),
(53, 7, 'sddfsf'),
(53, 8, 'this is a first choice'),
(53, 9, 'this is a second choice'),
(53, 10, 'this is a first choice'),
(54, 4, 'this is a third choice'),
(54, 5, 'this is a first choice'),
(54, 6, 'this is a second choice');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `Q_ID` tinyint(4) DEFAULT NULL,
  `choice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`Q_ID`, `choice`) VALUES
(4, 'this is a first choice'),
(4, 'this is a second choice'),
(4, 'this is a third choice'),
(5, 'this is a first choice'),
(6, 'this is a first choice'),
(6, 'this is a second choice'),
(8, 'this is a first choice'),
(8, 'this is a second choice'),
(8, 'this is a second choice'),
(8, 'this is a third choice'),
(8, 'this is a fourth choice'),
(10, 'this is a first choice'),
(9, 'this is a second choice');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `USER_ID` tinyint(11) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` tinyint(4) DEFAULT NULL CHECK (`age` > 0),
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(20) NOT NULL,
  `isInfected` enum('yes','no','recovered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`USER_ID`, `fullName`, `email`, `age`, `gender`, `address`, `isInfected`) VALUES
(51, 'Suman Dhakal ', 'dhakalsumn739@gmail.com', 23, 'male', 'belbari-2,morang', 'no'),
(52, 'Suman Dhakal', 'dhakalsuman739@gmail.com', 23, 'male', 'belbari-2,morang', 'recovered'),
(53, 'Suman Dhakal', 'dhakalsumaan739@gmail.com', 23, 'male', 'belbari-2,morang', 'recovered'),
(54, 'Suman Dhakal ', 'Dhakalsumnn739@gmail.com', 23, 'male', 'belbari-2,morang', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `questionsets`
--

CREATE TABLE `questionsets` (
  `Q_ID` tinyint(4) NOT NULL,
  `question` varchar(70) NOT NULL,
  `forInfected` enum('yes','no','recovered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionsets`
--

INSERT INTO `questionsets` (`Q_ID`, `question`, `forInfected`) VALUES
(4, 'This is a dummy question for all', 'no'),
(5, 'This is a dummy question for all', 'no'),
(6, 'This is a dummy question for all', 'no'),
(7, 'This is a dummy question for infected one', 'yes'),
(8, 'This is a dummy question for infected one', 'yes'),
(9, 'This is a dummy question for recovered one', 'recovered'),
(10, 'This is a dummy question for recovered one', 'recovered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `Q_ID` (`Q_ID`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD KEY `Q_ID` (`Q_ID`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `questionsets`
--
ALTER TABLE `questionsets`
  ADD PRIMARY KEY (`Q_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `USER_ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personaldetails`
--
ALTER TABLE `personaldetails`
  MODIFY `USER_ID` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `questionsets`
--
ALTER TABLE `questionsets`
  MODIFY `Q_ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `personaldetails` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`Q_ID`) REFERENCES `questionsets` (`Q_ID`) ON DELETE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`Q_ID`) REFERENCES `questionsets` (`Q_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
