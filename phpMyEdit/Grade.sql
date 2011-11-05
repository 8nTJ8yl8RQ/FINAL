-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2011 at 05:51 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bulilit`
--

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE IF NOT EXISTS `Grade` (
  `GradeID` int(8) NOT NULL AUTO_INCREMENT,
  `Grade` varchar(1) NOT NULL,
  `Description` varchar(277) NOT NULL,
  `SquadID` int(11) NOT NULL,
  PRIMARY KEY (`GradeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Grade`
--

INSERT INTO `Grade` (`GradeID`, `Grade`, `Description`, `SquadID`) VALUES
(1, 'A', 'Level of expertise is high. They are considered the number one team. Excellent athletes are placed here. The teamwork among the athletes is good.', 2),
(2, 'B', 'Level of expertise is also high but they need to work on their teamwork.', 2),
(3, 'C', 'Level of expertise is above average.', 1),
(4, 'D', 'Level of expertise is average.', 1),
(5, 'E', 'Most of the athletes needs to be trained.', 1);
