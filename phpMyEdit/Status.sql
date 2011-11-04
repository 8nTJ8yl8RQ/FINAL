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
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `StatusKind` varchar(40) NOT NULL,
  `Description` varchar(477) NOT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`StatusID`, `StatusKind`, `Description`) VALUES
(1, 'Active', '          These are athletes who regularly attend practice, trainings and seminars to improve their skills and team relationship. When a new applicant is accepted, his status is active.'),
(2, 'Injured', '           These are athletes who sustained injuries during practice or while playing in a sports event.     Also included are athletes who are involved in accidents such as vehicular accidents.'),
(3, 'Unavailable', '                              These are athletes who are authorized not to attend training sessions or join any games. Reasons maybe varied such as out-of-town vacation, grounded at home etc. Parents of the athlete write a letter to the coach stating why their son is not allowed to train or play.'),
(4, 'Suspended', '           When an athlete has been offensive or exhibit behavior that is not sportsmanship-like more than three times during practice or in sports events, or, they have violated the rules of the club, the selection committee can suspend a member.     In the ten year history of the club, they have only suspended 3 athletes.'),
(5, 'Blacklisted', '             These are athletes who have been consistently suspended or have done a grave misconduct such as using of drugs, cheating in games etc. The selection committee may opt to blacklist the member. In such a case, the club terminates his membership immediately and he is not allowed to renew his membership. In the ten year history of the club, they have not yet blacklisted a member.'),
(6, 'Inactive', '            The member is considered inactive when (1) missing practice five consecutive times without informing the club, (2) have not paid their renewal fees more than 2 years and have not been seen in the club, and (3) written termination of membership.'),
(7, 'Moved on', '                        When an athlete has reached 14 years old, they are considered graduates. In this case, they are no longer members of the club. However, they can still visit the club and use their facilities at discounted prices. They are also invited to watch tournaments that the club puts up or joins in. Their records are placed in a separate box, which would be helpful for the owners when some of them would want to help suc');
