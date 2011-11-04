-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2011 at 05:46 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtables`
-- 
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dbtables` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbtables`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ea9ea04e8cd9269cdc7d3a5ef2021050', 9, 'joanne_v12@yahoo.com', 1318865890),
('jasmin', '75ba7b03351c7133d2edf4ce2a221ac2', '2a4af1993055cc457b9399c8aab4ae27', 2, 'jhazmine_16@yahoo.com', 1318865926),
('joanne01', 'f683de281974adc40c2b34652b990915', '0', 1, 'joanne_v12@yahoo.com', 1318864680),
('michael', '3f1a05c0b3923ea93f8b1ed7abe38fdd', '2b2594dbaebe26736fe4ab02c6e69cbb', 3, 'michael.briso@yahoo.com', 1318865933);
