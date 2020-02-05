-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2020 at 10:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventschedule`
--

CREATE TABLE `eventschedule` (
  `eventID` int(11) NOT NULL,
  `facultyID` int(8) NOT NULL,
  `eventTitle` varchar(100) NOT NULL,
  `fromDate` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `toDate` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventschedule`
--

INSERT INTO `eventschedule` (`eventID`, `facultyID`, `eventTitle`, `fromDate`, `toDate`, `created`, `status`) VALUES
(1, 1, 'This is a special events about web development', '2018-02-12 00:00:00', '2018-02-16 00:00:00', '2018-02-10 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(10) UNSIGNED NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `faddress` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deparment` varchar(50) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `lastName`, `firstName`, `middleName`, `position`, `gender`, `birthday`, `faddress`, `email`, `deparment`, `specialty`, `userName`, `password`) VALUES
(1, 'hahah', 'trer', 'gdfg', 'instructor', 'male', '2020-03-04', 'hgbhjgbj', 'www.emil@gmail.com', 'cs', 'prog', 'emil', '1234'),
(2, 'bustinera', 'emil', 'sibulo', 'dean', 'female', '2020-02-04', 'hghbjhg', 'busti@gmail.com', 'cs', 'ssfg', 'hahahaahhaa', '1234'),
(3, 'new', 'trer', 'gdfg', 'instructor', 'male', '2020-02-04', 'fsgdfhh', 'www.new@gmail.com', 'cea', 'gdfg', 'new', '1234'),
(4, 'newnew', 'newnew', 'newnew', 'instructor', 'male', '2020-03-04', 'eewretrt', 'bust@gmail.com', 'cs', 'prog', 'ababa', '1234'),
(5, 'kakaka', 'kakaka', 'kakaka', 'instructor', 'male', '2020-01-28', 'sdsdsf', 'gago@gmail.com', 'cs', 'dfdsf', 'jajaja', '1234'),
(6, 'taba', 'taba', 'tab', 'student', 'male', '2020-02-10', 'taba', 'aba@gmail.com', 'cs', 'taba', 'taba', '1234'),
(7, 'n', 'n', 'n', 'student', 'male', '2020-02-20', 'jytgyjh', 'hahahahaha@gmail.com', 'cs', 'student', 'ja', '1234'),
(8, 'rustia', 'mark', 'H', 'student', 'male', '2020-03-05', 'ahahaha', 'rustia@gmail.com', 'cs', 'ffg', 'mark', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(8) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `faddress` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventschedule`
--
ALTER TABLE `eventschedule`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventschedule`
--
ALTER TABLE `eventschedule`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
