-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2011 at 12:29 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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
-- Table structure for table `athlete`
--

CREATE TABLE IF NOT EXISTS `athlete` (
  `ath_id` int(11) NOT NULL AUTO_INCREMENT,
  `ath_last_name` char(25) NOT NULL,
  `ath_first_name` char(25) NOT NULL,
  `ath_middle_name` char(25) NOT NULL,
  `ath_address` varchar(75) NOT NULL,
  `ath_locality` varchar(25) NOT NULL,
  `ath_province` varchar(25) NOT NULL,
  `ath_zip_code` int(4) NOT NULL,
  `ath_status_id` int(8) NOT NULL,
  `ath_guardian_id` int(4) NOT NULL,
  `ath_user_id` int(4) NOT NULL,
  `ath_team_id` int(4) NOT NULL,
  `ath_squad_id` int(4) NOT NULL,
  `ath_gameid` int(11) NOT NULL,
  PRIMARY KEY (`ath_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`ath_id`, `ath_last_name`, `ath_first_name`, `ath_middle_name`, `ath_address`, `ath_locality`, `ath_province`, `ath_zip_code`, `ath_status_id`, `ath_guardian_id`, `ath_user_id`, `ath_team_id`, `ath_squad_id`, `ath_gameid`) VALUES
(1, 'Yanoc', 'Reyden', 'Acabal', 'Central Avenue, Diliman', 'Quezon City', 'Metro Manila', 1107, 0, 0, 0, 0, 0, 0),
(2, 'Lagarde', 'Al-Ransted', 'Estrada', '', '', '', 0, 0, 0, 0, 0, 0, 0);
