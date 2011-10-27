-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2011 at 05:49 PM
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
-- Table structure for table `Athlete`
--

CREATE TABLE IF NOT EXISTS `Athlete` (
  `MembershipID` int(11) NOT NULL AUTO_INCREMENT,
  `GID` int(11) NOT NULL,
  `AddressID` int(11) NOT NULL,
  `RelID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `Surname` varchar(40) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `PaymentDate` date NOT NULL,
  `MiddleInitial` varchar(40) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `TelNumber` varchar(15) NOT NULL,
  `E-mail` varchar(40) NOT NULL,
  `SportID` int(11) NOT NULL,
  PRIMARY KEY (`MembershipID`),
  KEY `GID` (`GID`),
  KEY `AddressID` (`AddressID`),
  KEY `RelID` (`RelID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Athlete`
--

INSERT INTO `Athlete` (`MembershipID`, `GID`, `AddressID`, `RelID`, `FirstName`, `Surname`, `DateOfBirth`, `PaymentDate`, `MiddleInitial`, `Gender`, `TelNumber`, `E-mail`, `SportID`) VALUES
(1, 3, 1, 3, 'Pepe', 'binghot', '2001-10-14', '2011-10-14', 'B', 'Male', '134-4455', 'Pb@example.com', 0),
(2, 4, 2, 1, 'Jason', 'Dagohoy', '2001-11-13', '2011-10-14', 'C', 'Male', '222-4455', 'DJ@example.com', 0),
(3, 2, 4, 2, 'Jay', 'Dago', '2002-09-13', '2011-10-12', 'M', 'Male', '999-4455', 'jd@example.com', 0),
(4, 3, 2, 1, 'Elixir', 'Amigo', '2000-09-13', '2011-10-12', 'M', 'Male', '799-4455', 'exc@example.com', 0),
(5, 1, 3, 3, 'Felix', 'Amiga', '2000-08-13', '2011-10-12', 'M', 'Male', '700-4455', 'fa@example.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `AthleteGrades`
--

CREATE TABLE IF NOT EXISTS `AthleteGrades` (
  `AGradeID` int(11) NOT NULL AUTO_INCREMENT,
  `MembershipID` int(11) NOT NULL,
  `GradeID` int(11) NOT NULL,
  `SportID` int(11) NOT NULL,
  PRIMARY KEY (`AGradeID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `GradeID` (`GradeID`),
  KEY `SportID` (`SportID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `AthleteGrades`
--

INSERT INTO `AthleteGrades` (`AGradeID`, `MembershipID`, `GradeID`, `SportID`) VALUES
(1, 1, 1, 2),
(2, 5, 3, 1),
(3, 3, 2, 1),
(4, 4, 4, 1),
(5, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `AthleteStatus`
--

CREATE TABLE IF NOT EXISTS `AthleteStatus` (
  `MembershipID` int(11) NOT NULL AUTO_INCREMENT,
  `CoachID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`MembershipID`),
  UNIQUE KEY `MembershipID` (`MembershipID`),
  KEY `CoachID` (`CoachID`,`StatusID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `AthleteStatus`
--


-- --------------------------------------------------------

--
-- Table structure for table `AtRelToGuard`
--

CREATE TABLE IF NOT EXISTS `AtRelToGuard` (
  `RelID` int(64) NOT NULL AUTO_INCREMENT,
  `RelKind` varchar(40) NOT NULL,
  PRIMARY KEY (`RelID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `AtRelToGuard`
--

INSERT INTO `AtRelToGuard` (`RelID`, `RelKind`) VALUES
(1, 'Mother'),
(2, 'Father'),
(3, 'Legal Guardian'),
(4, 'Sister'),
(5, 'Brother');

-- --------------------------------------------------------

--
-- Table structure for table `At_Address`
--

CREATE TABLE IF NOT EXISTS `At_Address` (
  `AddressID` int(11) NOT NULL AUTO_INCREMENT,
  `Street` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `Province` varchar(40) NOT NULL,
  `PostalCode` varchar(40) NOT NULL,
  `Barangay` varchar(40) NOT NULL,
  PRIMARY KEY (`AddressID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `At_Address`
--

INSERT INTO `At_Address` (`AddressID`, `Street`, `City`, `Country`, `Province`, `PostalCode`, `Barangay`) VALUES
(1, 'Rizal', 'Quezon', 'PH', 'NCR', '1109', 'Milagrosa'),
(2, 'Avenida', 'Manila', 'PH', 'NCR', '1010', 'Wakawaka'),
(3, 'gilpuyat', 'Manila', 'PH', 'NCR', '1670', 'Socoro'),
(4, 'Mascardo', 'QC', 'PH', 'NCR', '1110', 'Maria Clara');

-- --------------------------------------------------------

--
-- Table structure for table `Coach`
--

CREATE TABLE IF NOT EXISTS `Coach` (
  `CoachID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) NOT NULL,
  `SSSNo` varchar(12) NOT NULL,
  PRIMARY KEY (`CoachID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Coach`
--

INSERT INTO `Coach` (`CoachID`, `Name`, `SSSNo`) VALUES
(1, 'Norman Black', '1234567890'),
(2, 'Benjie Paras', '0987654321'),
(3, 'Jaworski', '1357908642'),
(4, 'Shaq', '121234345656');

-- --------------------------------------------------------

--
-- Table structure for table `CoachContactDetails`
--

CREATE TABLE IF NOT EXISTS `CoachContactDetails` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `CoachID` int(11) NOT NULL,
  `Address` varchar(80) DEFAULT NULL,
  `TelNo` varchar(15) DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `E-mail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `CoachID` (`CoachID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `CoachContactDetails`
--

INSERT INTO `CoachContactDetails` (`ContactID`, `CoachID`, `Address`, `TelNo`, `MobileNo`, `E-mail`) VALUES
(1, 1, 'Quezon City', '434-2323', '0918-377-5000', 'jj@example.com'),
(2, 4, 'Cebu City', '654-2323', '0919-377-5555', 'c6j@example.com'),
(3, 2, 'Naga City', '534-2323', '0910-377-5000', 'nj@example.com'),
(4, 3, 'Cebu City', '554-2323', '0919-377-5000', 'cj@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `CompetitionParticipants`
--

CREATE TABLE IF NOT EXISTS `CompetitionParticipants` (
  `CompetitionID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  `RolePosition` varchar(40) NOT NULL,
  KEY `CompetitionID` (`CompetitionID`,`MembershipID`,`CoachID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `CoachID` (`CoachID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CompetitionParticipants`
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

-- --------------------------------------------------------

--
-- Table structure for table `Guardian`
--

CREATE TABLE IF NOT EXISTS `Guardian` (
  `GID` int(11) NOT NULL AUTO_INCREMENT,
  `AddressID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `Surname` varchar(40) NOT NULL,
  `TelNumber` varchar(20) NOT NULL,
  `E-Mail` varchar(40) NOT NULL,
  PRIMARY KEY (`GID`),
  KEY `AddressID` (`AddressID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Guardian`
--

INSERT INTO `Guardian` (`GID`, `AddressID`, `FirstName`, `Surname`, `TelNumber`, `E-Mail`) VALUES
(1, 1, 'Jose', 'Binifacio', '12345123', 'jb@example.com'),
(2, 2, 'Tonyo', 'Duhaylungsod', '888-7777', 'td@example.com'),
(3, 3, 'Toto', 'Bulag', '444-7777', 'tb@example.com'),
(4, 4, 'Tina', 'Marina', '444-8888', 'tm@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `PermissionCode` int(11) NOT NULL AUTO_INCREMENT,
  `PermissionKind` varchar(20) NOT NULL,
  PRIMARY KEY (`PermissionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Permission`
--

INSERT INTO `Permission` (`PermissionCode`, `PermissionKind`) VALUES
(1, 'Admin'),
(2, 'Athlete'),
(3, 'Coach'),
(4, 'Guardian'),
(5, 'Club Staff');

-- --------------------------------------------------------

--
-- Table structure for table `Practice`
--

CREATE TABLE IF NOT EXISTS `Practice` (
  `PracticeID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Venue` varchar(40) NOT NULL,
  PRIMARY KEY (`PracticeID`),
  KEY `TeamID` (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Practice`
--


-- --------------------------------------------------------

--
-- Table structure for table `PracticeDetails`
--

CREATE TABLE IF NOT EXISTS `PracticeDetails` (
  `PracticeID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `RolePosition` varchar(20) NOT NULL,
  `Points` int(11) NOT NULL,
  KEY `PracticeID` (`PracticeID`,`TeamID`,`MembershipID`),
  KEY `TeamID` (`TeamID`),
  KEY `MembershipID` (`MembershipID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PracticeDetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `Sessions`
--

CREATE TABLE IF NOT EXISTS `Sessions` (
  `SessionID` varchar(32) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TimeStartSess` time NOT NULL,
  PRIMARY KEY (`SessionID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `Sport`
--

CREATE TABLE IF NOT EXISTS `Sport` (
  `SportID` int(11) NOT NULL AUTO_INCREMENT,
  `Sport` varchar(40) NOT NULL,
  PRIMARY KEY (`SportID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Sport`
--

INSERT INTO `Sport` (`SportID`, `Sport`) VALUES
(1, 'Basketball'),
(2, 'Volleyball');

-- --------------------------------------------------------

--
-- Table structure for table `Squad`
--

CREATE TABLE IF NOT EXISTS `Squad` (
  `SquadID` int(11) NOT NULL AUTO_INCREMENT,
  `SquadKind` varchar(20) NOT NULL,
  PRIMARY KEY (`SquadID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Squad`
--

INSERT INTO `Squad` (`SquadID`, `SquadKind`) VALUES
(1, 'Training Squad'),
(2, 'Competing Squad');

-- --------------------------------------------------------

--
-- Table structure for table `SquadMemDetails`
--

CREATE TABLE IF NOT EXISTS `SquadMemDetails` (
  `MembershipID` int(11) NOT NULL,
  `SquadID` int(11) NOT NULL,
  UNIQUE KEY `MembershipID` (`MembershipID`),
  KEY `SquadID` (`SquadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SquadMemDetails`
--

INSERT INTO `SquadMemDetails` (`MembershipID`, `SquadID`) VALUES
(1, 1),
(3, 1),
(5, 1),
(2, 2),
(4, 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `TeamID` int(11) NOT NULL AUTO_INCREMENT,
  `SportID` int(11) NOT NULL,
  `TeamName` varchar(40) NOT NULL,
  PRIMARY KEY (`TeamID`),
  KEY `SportID` (`SportID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`TeamID`, `SportID`, `TeamName`) VALUES
(1, 1, 'Team 1'),
(3, 1, 'Team 2'),
(4, 1, 'Team 3'),
(5, 1, 'Team C'),
(6, 1, 'Team A'),
(7, 1, 'Team B');

-- --------------------------------------------------------

--
-- Table structure for table `TeamCoach`
--

CREATE TABLE IF NOT EXISTS `TeamCoach` (
  `TeamID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `HeadCoach` varchar(3) NOT NULL,
  KEY `TeamID` (`TeamID`,`CoachID`),
  KEY `CoachID` (`CoachID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeamCoach`
--

INSERT INTO `TeamCoach` (`TeamID`, `CoachID`, `HeadCoach`) VALUES
(1, 3, 'No'),
(7, 2, 'Yes'),
(1, 1, 'Yes'),
(3, 3, 'Yes'),
(6, 4, 'Yes'),
(4, 1, 'Yes'),
(5, 4, 'No'),
(5, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `TeamCompetitionHistory`
--

CREATE TABLE IF NOT EXISTS `TeamCompetitionHistory` (
  `CompetitionID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamID` int(11) NOT NULL,
  `CompName` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Venue` varchar(40) NOT NULL,
  PRIMARY KEY (`CompetitionID`),
  KEY `TeamID` (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `TeamCompetitionHistory`
--


-- --------------------------------------------------------

--
-- Table structure for table `TeamGrade`
--

CREATE TABLE IF NOT EXISTS `TeamGrade` (
  `TeamID` int(11) NOT NULL,
  `Grade` varchar(1) NOT NULL,
  UNIQUE KEY `TeamID` (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeamGrade`
--

INSERT INTO `TeamGrade` (`TeamID`, `Grade`) VALUES
(1, 'A'),
(3, 'C'),
(5, 'A'),
(6, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `TeamMemDetails`
--

CREATE TABLE IF NOT EXISTS `TeamMemDetails` (
  `TeamID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `SquadID` int(11) NOT NULL,
  `Position` varchar(40) NOT NULL,
  `IsPrimaryPos` varchar(3) NOT NULL,
  KEY `TeamID` (`TeamID`,`MembershipID`,`SquadID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `SquadID` (`SquadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeamMemDetails`
--

INSERT INTO `TeamMemDetails` (`TeamID`, `MembershipID`, `SquadID`, `Position`, `IsPrimaryPos`) VALUES
(4, 4, 2, 'Forward', 'Yes'),
(7, 2, 2, 'Forward', 'Yes'),
(3, 3, 1, 'Guard', 'No'),
(5, 5, 1, 'Forward', 'No'),
(6, 5, 1, 'Center', 'Yes'),
(3, 1, 1, 'Center', 'Yes'),
(5, 1, 1, 'Guard', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `PermissionCode` int(11) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Name` varchar(40) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `PermissionCode` (`PermissionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `PermissionCode`, `Password`, `Username`, `Name`) VALUES
(1, 1, 'admin', 'admin', 'Al-Ransted E. Lagarde'),
(2, 5, 'club', 'club', 'Club Staff');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Athlete`
--
ALTER TABLE `Athlete`
  ADD CONSTRAINT `Athlete_ibfk_1` FOREIGN KEY (`RelID`) REFERENCES `AtRelToGuard` (`RelID`),
  ADD CONSTRAINT `Athlete_ibfk_2` FOREIGN KEY (`GID`) REFERENCES `Guardian` (`GID`),
  ADD CONSTRAINT `Athlete_ibfk_3` FOREIGN KEY (`AddressID`) REFERENCES `At_Address` (`AddressID`);

--
-- Constraints for table `AthleteGrades`
--
ALTER TABLE `AthleteGrades`
  ADD CONSTRAINT `AthleteGrades_ibfk_3` FOREIGN KEY (`SportID`) REFERENCES `Sport` (`SportID`),
  ADD CONSTRAINT `AthleteGrades_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  ADD CONSTRAINT `AthleteGrades_ibfk_2` FOREIGN KEY (`GradeID`) REFERENCES `Grade` (`GradeID`);

--
-- Constraints for table `AthleteStatus`
--
ALTER TABLE `AthleteStatus`
  ADD CONSTRAINT `AthleteStatus_ibfk_3` FOREIGN KEY (`StatusID`) REFERENCES `Status` (`StatusID`),
  ADD CONSTRAINT `AthleteStatus_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  ADD CONSTRAINT `AthleteStatus_ibfk_2` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`);

--
-- Constraints for table `CoachContactDetails`
--
ALTER TABLE `CoachContactDetails`
  ADD CONSTRAINT `CoachContactDetails_ibfk_1` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`);

--
-- Constraints for table `CompetitionParticipants`
--
ALTER TABLE `CompetitionParticipants`
  ADD CONSTRAINT `CompetitionParticipants_ibfk_3` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`),
  ADD CONSTRAINT `CompetitionParticipants_ibfk_1` FOREIGN KEY (`CompetitionID`) REFERENCES `TeamCompetitionHistory` (`CompetitionID`),
  ADD CONSTRAINT `CompetitionParticipants_ibfk_2` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`);

--
-- Constraints for table `Guardian`
--
ALTER TABLE `Guardian`
  ADD CONSTRAINT `Guardian_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `At_Address` (`AddressID`);

--
-- Constraints for table `Practice`
--
ALTER TABLE `Practice`
  ADD CONSTRAINT `Practice_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`);

--
-- Constraints for table `PracticeDetails`
--
ALTER TABLE `PracticeDetails`
  ADD CONSTRAINT `PracticeDetails_ibfk_3` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  ADD CONSTRAINT `PracticeDetails_ibfk_1` FOREIGN KEY (`PracticeID`) REFERENCES `Practice` (`PracticeID`),
  ADD CONSTRAINT `PracticeDetails_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`);

--
-- Constraints for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD CONSTRAINT `Sessions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`);

--
-- Constraints for table `SquadMemDetails`
--
ALTER TABLE `SquadMemDetails`
  ADD CONSTRAINT `SquadMemDetails_ibfk_2` FOREIGN KEY (`SquadID`) REFERENCES `Squad` (`SquadID`),
  ADD CONSTRAINT `SquadMemDetails_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`);

--
-- Constraints for table `Team`
--
ALTER TABLE `Team`
  ADD CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`SportID`) REFERENCES `Sport` (`SportID`);

--
-- Constraints for table `TeamCoach`
--
ALTER TABLE `TeamCoach`
  ADD CONSTRAINT `TeamCoach_ibfk_2` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`),
  ADD CONSTRAINT `TeamCoach_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`);

--
-- Constraints for table `TeamCompetitionHistory`
--
ALTER TABLE `TeamCompetitionHistory`
  ADD CONSTRAINT `TeamCompetitionHistory_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`);

--
-- Constraints for table `TeamGrade`
--
ALTER TABLE `TeamGrade`
  ADD CONSTRAINT `TeamGrade_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`);

--
-- Constraints for table `TeamMemDetails`
--
ALTER TABLE `TeamMemDetails`
  ADD CONSTRAINT `TeamMemDetails_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`),
  ADD CONSTRAINT `TeamMemDetails_ibfk_2` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  ADD CONSTRAINT `TeamMemDetails_ibfk_3` FOREIGN KEY (`SquadID`) REFERENCES `Squad` (`SquadID`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`PermissionCode`) REFERENCES `Permission` (`PermissionCode`);
