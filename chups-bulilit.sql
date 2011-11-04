-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bulilit
--

CREATE DATABASE IF NOT EXISTS bulilit;
USE bulilit;

--
-- Definition of table `bulilit`.`AtRelToGuard`
--

DROP TABLE IF EXISTS `bulilit`.`AtRelToGuard`;
CREATE TABLE  `bulilit`.`AtRelToGuard` (
  `RelID` int(64) NOT NULL AUTO_INCREMENT,
  `RelKind` varchar(40) NOT NULL,
  PRIMARY KEY (`RelID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`AtRelToGuard`
--

/*!40000 ALTER TABLE `AtRelToGuard` DISABLE KEYS */;
LOCK TABLES `AtRelToGuard` WRITE;
INSERT INTO `bulilit`.`AtRelToGuard` VALUES  (1,'Mother'),
 (2,'Father'),
 (3,'Legal Guardian'),
 (4,'Sister'),
 (5,'Brother');
UNLOCK TABLES;
/*!40000 ALTER TABLE `AtRelToGuard` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`At_Address`
--

DROP TABLE IF EXISTS `bulilit`.`At_Address`;
CREATE TABLE  `bulilit`.`At_Address` (
  `AddressID` int(11) NOT NULL AUTO_INCREMENT,
  `Street` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `Province` varchar(40) NOT NULL,
  `PostalCode` varchar(40) NOT NULL,
  `Barangay` varchar(40) NOT NULL,
  PRIMARY KEY (`AddressID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`At_Address`
--

/*!40000 ALTER TABLE `At_Address` DISABLE KEYS */;
LOCK TABLES `At_Address` WRITE;
INSERT INTO `bulilit`.`At_Address` VALUES  (1,'Rizal','Quezon','PH','NCR','1109','Milagrosa'),
 (2,'Avenida','Manila','PH','NCR','1010','Wakawaka'),
 (3,'gilpuyat','Manila','PH','NCR','1670','Socoro'),
 (4,'Mascardo','QC','PH','NCR','1110','Maria Clara');
UNLOCK TABLES;
/*!40000 ALTER TABLE `At_Address` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Athlete`
--

DROP TABLE IF EXISTS `bulilit`.`Athlete`;
CREATE TABLE  `bulilit`.`Athlete` (
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
  PRIMARY KEY (`MembershipID`),
  KEY `GID` (`GID`),
  KEY `AddressID` (`AddressID`),
  KEY `RelID` (`RelID`),
  CONSTRAINT `Athlete_ibfk_1` FOREIGN KEY (`RelID`) REFERENCES `AtRelToGuard` (`RelID`),
  CONSTRAINT `Athlete_ibfk_2` FOREIGN KEY (`GID`) REFERENCES `Guardian` (`GID`),
  CONSTRAINT `Athlete_ibfk_3` FOREIGN KEY (`AddressID`) REFERENCES `At_Address` (`AddressID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Athlete`
--

/*!40000 ALTER TABLE `Athlete` DISABLE KEYS */;
LOCK TABLES `Athlete` WRITE;
INSERT INTO `bulilit`.`Athlete` VALUES  (1,3,1,3,'Pepe','binghot','2001-10-14','2011-10-14','B','Male','134-4455','Pb@example.com'),
 (2,4,2,1,'Jason','Dagohoy','2001-11-13','2011-10-14','C','Male','222-4455','DJ@example.com'),
 (3,2,4,2,'Jay','Dago','2002-09-13','2011-10-12','M','Male','999-4455','jd@example.com'),
 (4,3,2,1,'Elixir','Amigo','2000-09-13','2011-10-12','M','Male','799-4455','exc@example.com'),
 (5,1,3,3,'Felix','Amiga','2000-08-13','2011-10-12','M','Male','700-4455','fa@example.com');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Athlete` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`AthleteGrades`
--

DROP TABLE IF EXISTS `bulilit`.`AthleteGrades`;
CREATE TABLE  `bulilit`.`AthleteGrades` (
  `AGradeID` int(11) NOT NULL AUTO_INCREMENT,
  `MembershipID` int(11) NOT NULL,
  `GradeID` int(11) NOT NULL,
  `SportID` int(11) NOT NULL,
  PRIMARY KEY (`AGradeID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `GradeID` (`GradeID`),
  KEY `SportID` (`SportID`),
  CONSTRAINT `AthleteGrades_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  CONSTRAINT `AthleteGrades_ibfk_2` FOREIGN KEY (`GradeID`) REFERENCES `Grade` (`GradeID`),
  CONSTRAINT `AthleteGrades_ibfk_3` FOREIGN KEY (`SportID`) REFERENCES `Sport` (`SportID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`AthleteGrades`
--

/*!40000 ALTER TABLE `AthleteGrades` DISABLE KEYS */;
LOCK TABLES `AthleteGrades` WRITE;
INSERT INTO `bulilit`.`AthleteGrades` VALUES  (1,1,1,1),
 (2,5,3,1),
 (3,3,2,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `AthleteGrades` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`AthleteStatus`
--

DROP TABLE IF EXISTS `bulilit`.`AthleteStatus`;
CREATE TABLE  `bulilit`.`AthleteStatus` (
  `MembershipID` int(11) NOT NULL AUTO_INCREMENT,
  `CoachID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  PRIMARY KEY (`MembershipID`),
  UNIQUE KEY `MembershipID` (`MembershipID`),
  KEY `CoachID` (`CoachID`,`StatusID`),
  KEY `StatusID` (`StatusID`),
  CONSTRAINT `AthleteStatus_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  CONSTRAINT `AthleteStatus_ibfk_2` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`),
  CONSTRAINT `AthleteStatus_ibfk_3` FOREIGN KEY (`StatusID`) REFERENCES `Status` (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`AthleteStatus`
--

/*!40000 ALTER TABLE `AthleteStatus` DISABLE KEYS */;
LOCK TABLES `AthleteStatus` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `AthleteStatus` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Coach`
--

DROP TABLE IF EXISTS `bulilit`.`Coach`;
CREATE TABLE  `bulilit`.`Coach` (
  `CoachID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) NOT NULL,
  `SSSNo` varchar(12) NOT NULL,
  PRIMARY KEY (`CoachID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Coach`
--

/*!40000 ALTER TABLE `Coach` DISABLE KEYS */;
LOCK TABLES `Coach` WRITE;
INSERT INTO `bulilit`.`Coach` VALUES  (1,'Norman Black','1234567890'),
 (2,'Benjie Paras2','987654321'),
 (3,'Jaworski','1357908642'),
 (4,'Kobe','1411231'),
 (6,'Jaworski','1357908642'),
 (7,'Jaworski','1357908642'),
 (8,'Benjie Paras2','987654321');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Coach` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`CoachContactDetails`
--

DROP TABLE IF EXISTS `bulilit`.`CoachContactDetails`;
CREATE TABLE  `bulilit`.`CoachContactDetails` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `CoachID` int(11) NOT NULL,
  `Address` varchar(80) DEFAULT NULL,
  `TelNo` varchar(15) DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `CoachID` (`CoachID`),
  CONSTRAINT `CoachContactDetails_ibfk_1` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`CoachContactDetails`
--

/*!40000 ALTER TABLE `CoachContactDetails` DISABLE KEYS */;
LOCK TABLES `CoachContactDetails` WRITE;
INSERT INTO `bulilit`.`CoachContactDetails` VALUES  (2,4,'Cebu City','654-2323','0919-377-5555','c6j@example.com'),
 (3,2,'Naga City','534-2323','0910-377-5000','nj@example.com'),
 (7,6,'Cebu City','554-2323','0919-377-5000','hello@example.com');
UNLOCK TABLES;
/*!40000 ALTER TABLE `CoachContactDetails` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`CompetitionParticipants`
--

DROP TABLE IF EXISTS `bulilit`.`CompetitionParticipants`;
CREATE TABLE  `bulilit`.`CompetitionParticipants` (
  `CompetitionID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `Points` int(11) NOT NULL,
  `RolePosition` varchar(40) NOT NULL,
  KEY `CompetitionID` (`CompetitionID`,`MembershipID`,`CoachID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `CoachID` (`CoachID`),
  CONSTRAINT `CompetitionParticipants_ibfk_1` FOREIGN KEY (`CompetitionID`) REFERENCES `TeamCompetitionHistory` (`CompetitionID`),
  CONSTRAINT `CompetitionParticipants_ibfk_2` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  CONSTRAINT `CompetitionParticipants_ibfk_3` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`CompetitionParticipants`
--

/*!40000 ALTER TABLE `CompetitionParticipants` DISABLE KEYS */;
LOCK TABLES `CompetitionParticipants` WRITE;
INSERT INTO `bulilit`.`CompetitionParticipants` VALUES  (1,3,2,0,'Center'),
 (7,3,2,0,'Center'),
 (8,3,2,0,'Center');
UNLOCK TABLES;
/*!40000 ALTER TABLE `CompetitionParticipants` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Grade`
--

DROP TABLE IF EXISTS `bulilit`.`Grade`;
CREATE TABLE  `bulilit`.`Grade` (
  `GradeID` int(8) NOT NULL AUTO_INCREMENT,
  `Grade` varchar(1) NOT NULL,
  PRIMARY KEY (`GradeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Grade`
--

/*!40000 ALTER TABLE `Grade` DISABLE KEYS */;
LOCK TABLES `Grade` WRITE;
INSERT INTO `bulilit`.`Grade` VALUES  (1,'A'),
 (2,'B'),
 (3,'C');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Grade` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Guardian`
--

DROP TABLE IF EXISTS `bulilit`.`Guardian`;
CREATE TABLE  `bulilit`.`Guardian` (
  `GID` int(11) NOT NULL AUTO_INCREMENT,
  `AddressID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `Surname` varchar(40) NOT NULL,
  `TelNumber` varchar(20) NOT NULL,
  `E-Mail` varchar(40) NOT NULL,
  PRIMARY KEY (`GID`),
  KEY `AddressID` (`AddressID`),
  CONSTRAINT `Guardian_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `At_Address` (`AddressID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Guardian`
--

/*!40000 ALTER TABLE `Guardian` DISABLE KEYS */;
LOCK TABLES `Guardian` WRITE;
INSERT INTO `bulilit`.`Guardian` VALUES  (1,1,'Jose','Binifacio','12345123','jb@example.com'),
 (2,2,'Tonyo','Duhaylungsod','888-7777','td@example.com'),
 (3,3,'Toto','Bulag','444-7777','tb@example.com'),
 (4,4,'Tina','Marina','444-8888','tm@example.com');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Guardian` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Permission`
--

DROP TABLE IF EXISTS `bulilit`.`Permission`;
CREATE TABLE  `bulilit`.`Permission` (
  `PermissionCode` int(11) NOT NULL AUTO_INCREMENT,
  `PermissionKind` varchar(20) NOT NULL,
  PRIMARY KEY (`PermissionCode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Permission`
--

/*!40000 ALTER TABLE `Permission` DISABLE KEYS */;
LOCK TABLES `Permission` WRITE;
INSERT INTO `bulilit`.`Permission` VALUES  (1,'Admin'),
 (2,'Athlete'),
 (3,'Coach'),
 (4,'Guardian'),
 (5,'Club Staff');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Permission` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Practice`
--

DROP TABLE IF EXISTS `bulilit`.`Practice`;
CREATE TABLE  `bulilit`.`Practice` (
  `PracticeID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Venue` varchar(40) NOT NULL,
  PRIMARY KEY (`PracticeID`),
  KEY `TeamID` (`TeamID`),
  CONSTRAINT `Practice_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Practice`
--

/*!40000 ALTER TABLE `Practice` DISABLE KEYS */;
LOCK TABLES `Practice` WRITE;
INSERT INTO `bulilit`.`Practice` VALUES  (1,1,'2012-02-03','04:00:00','Quezon City'),
 (2,1,'2012-01-01','04:00:00','Pasig City'),
 (3,1,'2012-01-01','04:00:00','Quezon City'),
 (4,1,'2011-02-02','07:00:00','asdf'),
 (5,3,'2011-10-04','20:35:59','adfqe'),
 (6,3,'2011-10-19','07:00:00','asdfqwer'),
 (7,3,'2011-10-19','07:00:00','asdfqwer'),
 (18,3,'2011-10-19','07:00:00','asdfqwer');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Practice` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`PracticeDetails`
--

DROP TABLE IF EXISTS `bulilit`.`PracticeDetails`;
CREATE TABLE  `bulilit`.`PracticeDetails` (
  `PracticeID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `RolePosition` varchar(20) NOT NULL,
  `Points` int(11) NOT NULL,
  KEY `PracticeID` (`PracticeID`,`TeamID`,`MembershipID`),
  KEY `TeamID` (`TeamID`),
  KEY `MembershipID` (`MembershipID`),
  CONSTRAINT `PracticeDetails_ibfk_1` FOREIGN KEY (`PracticeID`) REFERENCES `Practice` (`PracticeID`),
  CONSTRAINT `PracticeDetails_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`),
  CONSTRAINT `PracticeDetails_ibfk_3` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`PracticeDetails`
--

/*!40000 ALTER TABLE `PracticeDetails` DISABLE KEYS */;
LOCK TABLES `PracticeDetails` WRITE;
INSERT INTO `bulilit`.`PracticeDetails` VALUES  (1,1,1,'Center',20),
 (5,3,4,'Center',0),
 (6,3,2,'Center',0),
 (7,3,2,'Center',0),
 (18,3,2,'Center',0),
 (18,3,3,'Point Guard',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `PracticeDetails` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Sessions`
--

DROP TABLE IF EXISTS `bulilit`.`Sessions`;
CREATE TABLE  `bulilit`.`Sessions` (
  `SessionID` varchar(32) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TimeStartSess` time NOT NULL,
  PRIMARY KEY (`SessionID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `Sessions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Sessions`
--

/*!40000 ALTER TABLE `Sessions` DISABLE KEYS */;
LOCK TABLES `Sessions` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `Sessions` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Sport`
--

DROP TABLE IF EXISTS `bulilit`.`Sport`;
CREATE TABLE  `bulilit`.`Sport` (
  `SportID` int(11) NOT NULL AUTO_INCREMENT,
  `Sport` varchar(40) NOT NULL,
  PRIMARY KEY (`SportID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Sport`
--

/*!40000 ALTER TABLE `Sport` DISABLE KEYS */;
LOCK TABLES `Sport` WRITE;
INSERT INTO `bulilit`.`Sport` VALUES  (1,'Basketball');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Sport` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Squad`
--

DROP TABLE IF EXISTS `bulilit`.`Squad`;
CREATE TABLE  `bulilit`.`Squad` (
  `SquadID` int(11) NOT NULL AUTO_INCREMENT,
  `SquadKind` varchar(20) NOT NULL,
  PRIMARY KEY (`SquadID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Squad`
--

/*!40000 ALTER TABLE `Squad` DISABLE KEYS */;
LOCK TABLES `Squad` WRITE;
INSERT INTO `bulilit`.`Squad` VALUES  (1,'Training Squad'),
 (2,'Competing Squad');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Squad` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`SquadMemDetails`
--

DROP TABLE IF EXISTS `bulilit`.`SquadMemDetails`;
CREATE TABLE  `bulilit`.`SquadMemDetails` (
  `MembershipID` int(11) NOT NULL,
  `SquadID` int(11) NOT NULL,
  UNIQUE KEY `MembershipID` (`MembershipID`),
  KEY `SquadID` (`SquadID`),
  CONSTRAINT `SquadMemDetails_ibfk_1` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  CONSTRAINT `SquadMemDetails_ibfk_2` FOREIGN KEY (`SquadID`) REFERENCES `Squad` (`SquadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`SquadMemDetails`
--

/*!40000 ALTER TABLE `SquadMemDetails` DISABLE KEYS */;
LOCK TABLES `SquadMemDetails` WRITE;
INSERT INTO `bulilit`.`SquadMemDetails` VALUES  (1,1),
 (3,1),
 (5,1),
 (2,2),
 (4,2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `SquadMemDetails` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Status`
--

DROP TABLE IF EXISTS `bulilit`.`Status`;
CREATE TABLE  `bulilit`.`Status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `StatusKind` varchar(40) NOT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Status`
--

/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
LOCK TABLES `Status` WRITE;
INSERT INTO `bulilit`.`Status` VALUES  (1,'Active'),
 (2,'Injured'),
 (3,'Unavailable'),
 (4,'Suspended'),
 (5,'Blacklisted'),
 (6,'Inactive'),
 (7,'Moved on');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Team`
--

DROP TABLE IF EXISTS `bulilit`.`Team`;
CREATE TABLE  `bulilit`.`Team` (
  `TeamID` int(11) NOT NULL AUTO_INCREMENT,
  `SportID` int(11) NOT NULL,
  `TeamName` varchar(40) NOT NULL,
  PRIMARY KEY (`TeamID`),
  KEY `SportID` (`SportID`),
  CONSTRAINT `Team_ibfk_1` FOREIGN KEY (`SportID`) REFERENCES `Sport` (`SportID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Team`
--

/*!40000 ALTER TABLE `Team` DISABLE KEYS */;
LOCK TABLES `Team` WRITE;
INSERT INTO `bulilit`.`Team` VALUES  (1,1,'Team 1'),
 (3,1,'Team 2'),
 (4,1,'Team 3'),
 (5,1,'Team C'),
 (6,1,'Team A'),
 (7,1,'Team B'),
 (12,1,'train');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Team` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`TeamCoach`
--

DROP TABLE IF EXISTS `bulilit`.`TeamCoach`;
CREATE TABLE  `bulilit`.`TeamCoach` (
  `TeamID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `HeadCoach` varchar(3) NOT NULL,
  KEY `TeamID` (`TeamID`,`CoachID`),
  KEY `CoachID` (`CoachID`),
  CONSTRAINT `TeamCoach_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`),
  CONSTRAINT `TeamCoach_ibfk_2` FOREIGN KEY (`CoachID`) REFERENCES `Coach` (`CoachID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`TeamCoach`
--

/*!40000 ALTER TABLE `TeamCoach` DISABLE KEYS */;
LOCK TABLES `TeamCoach` WRITE;
INSERT INTO `bulilit`.`TeamCoach` VALUES  (1,3,'No'),
 (7,2,'Yes'),
 (1,1,'Yes'),
 (3,3,'Yes'),
 (6,4,'Yes'),
 (4,1,'Yes'),
 (5,4,'No'),
 (5,1,'Yes'),
 (1,4,'1'),
 (1,4,'No'),
 (12,2,'Yes');
UNLOCK TABLES;
/*!40000 ALTER TABLE `TeamCoach` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`TeamCompetitionHistory`
--

DROP TABLE IF EXISTS `bulilit`.`TeamCompetitionHistory`;
CREATE TABLE  `bulilit`.`TeamCompetitionHistory` (
  `CompetitionID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamID` int(11) NOT NULL,
  `CompName` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Venue` varchar(40) NOT NULL,
  PRIMARY KEY (`CompetitionID`),
  KEY `TeamID` (`TeamID`),
  CONSTRAINT `TeamCompetitionHistory_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`TeamCompetitionHistory`
--

/*!40000 ALTER TABLE `TeamCompetitionHistory` DISABLE KEYS */;
LOCK TABLES `TeamCompetitionHistory` WRITE;
INSERT INTO `bulilit`.`TeamCompetitionHistory` VALUES  (1,1,'Hey','2011-11-11','00:21:46','qwer'),
 (4,1,'qew','2011-10-04','00:21:46','qwer'),
 (5,6,'asdf','2011-10-05','02:13:00','asdf'),
 (7,1,'asdfq','2011-10-18','19:12:05','asdfq'),
 (8,1,'asdfq','2011-10-18','19:12:05','asdfq');
UNLOCK TABLES;
/*!40000 ALTER TABLE `TeamCompetitionHistory` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`TeamGrade`
--

DROP TABLE IF EXISTS `bulilit`.`TeamGrade`;
CREATE TABLE  `bulilit`.`TeamGrade` (
  `TeamID` int(11) NOT NULL,
  `Grade` varchar(1) NOT NULL,
  UNIQUE KEY `TeamID` (`TeamID`),
  CONSTRAINT `TeamGrade_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`TeamGrade`
--

/*!40000 ALTER TABLE `TeamGrade` DISABLE KEYS */;
LOCK TABLES `TeamGrade` WRITE;
INSERT INTO `bulilit`.`TeamGrade` VALUES  (1,'A'),
 (3,'C'),
 (5,'A'),
 (6,'B');
UNLOCK TABLES;
/*!40000 ALTER TABLE `TeamGrade` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`TeamMemDetails`
--

DROP TABLE IF EXISTS `bulilit`.`TeamMemDetails`;
CREATE TABLE  `bulilit`.`TeamMemDetails` (
  `TeamID` int(11) NOT NULL,
  `MembershipID` int(11) NOT NULL,
  `SquadID` int(11) NOT NULL,
  `Position` varchar(40) NOT NULL,
  `IsPrimaryPos` varchar(3) NOT NULL,
  KEY `TeamID` (`TeamID`,`MembershipID`,`SquadID`),
  KEY `MembershipID` (`MembershipID`),
  KEY `SquadID` (`SquadID`),
  CONSTRAINT `TeamMemDetails_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`),
  CONSTRAINT `TeamMemDetails_ibfk_2` FOREIGN KEY (`MembershipID`) REFERENCES `Athlete` (`MembershipID`),
  CONSTRAINT `TeamMemDetails_ibfk_3` FOREIGN KEY (`SquadID`) REFERENCES `Squad` (`SquadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`TeamMemDetails`
--

/*!40000 ALTER TABLE `TeamMemDetails` DISABLE KEYS */;
LOCK TABLES `TeamMemDetails` WRITE;
INSERT INTO `bulilit`.`TeamMemDetails` VALUES  (4,4,2,'Forward','Yes'),
 (7,2,2,'Forward','Yes'),
 (1,3,1,'Forward','Yes'),
 (3,3,1,'Guard','No'),
 (1,5,1,'Guard','No'),
 (5,5,1,'Forward','No'),
 (6,5,1,'Center','Yes'),
 (3,1,1,'Center','Yes'),
 (5,1,1,'Guard','No');
UNLOCK TABLES;
/*!40000 ALTER TABLE `TeamMemDetails` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`Users`
--

DROP TABLE IF EXISTS `bulilit`.`Users`;
CREATE TABLE  `bulilit`.`Users` (
  `UserID` int(11) NOT NULL,
  `PermissionCode` int(11) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Name` varchar(40) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `PermissionCode` (`PermissionCode`),
  CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`PermissionCode`) REFERENCES `Permission` (`PermissionCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`Users`
--

/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
LOCK TABLES `Users` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`athlete2`
--

DROP TABLE IF EXISTS `bulilit`.`athlete2`;
CREATE TABLE  `bulilit`.`athlete2` (
  `ath_ID` int(8) NOT NULL AUTO_INCREMENT,
  `ath_lastName` varchar(25) NOT NULL,
  `ath_firstName` varchar(25) NOT NULL,
  `ath_middleName` varchar(25) NOT NULL,
  `ath_gender` varchar(6) NOT NULL,
  `ath_birthDate` date NOT NULL,
  `ath_phoneNumber` varchar(60) NOT NULL,
  `ath_address` varchar(50) NOT NULL,
  `ath_locality` varchar(50) NOT NULL,
  `ath_province` varchar(50) NOT NULL,
  `ath_zipCode` varchar(6) NOT NULL,
  `ath_status` varchar(10) NOT NULL,
  `ath_squad` varchar(25) NOT NULL,
  `ath_sport` varchar(20) NOT NULL,
  UNIQUE KEY `ath_ID` (`ath_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`athlete2`
--

/*!40000 ALTER TABLE `athlete2` DISABLE KEYS */;
LOCK TABLES `athlete2` WRITE;
INSERT INTO `bulilit`.`athlete2` VALUES  (1,'Yanoc','Reyden','Acabal','male','1972-12-02','09996911001','Central Ave Diliman Quezon City','Culiat Quezon City','NCR','1107','active','barakuda','basketball'),
 (2,'ttt','ttt','ttt','ttt','2011-09-03','ttt','ttt','ttt','ttt','123','tt','tt','tt'),
 (3,'Lagarde','Al-Ransted','Estrada','Male','2011-09-03','01236547890','Bulacan','Bulacan','NCR','1107','Active','A','Soccer'),
 (4,'NOVELA','RVENJOEMAR','MAGDAONG','MALE','1991-06-05','09065932781','DF2 222 ','TANDANG SORA','NCR','1107','ACTIVE','A','JACKSTONE');
UNLOCK TABLES;
/*!40000 ALTER TABLE `athlete2` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`tb_guardians`
--

DROP TABLE IF EXISTS `bulilit`.`tb_guardians`;
CREATE TABLE  `bulilit`.`tb_guardians` (
  `g_ID` int(8) NOT NULL AUTO_INCREMENT,
  `g_lname` varchar(25) NOT NULL,
  `g_fname` varchar(25) NOT NULL,
  `g_mname` varchar(25) NOT NULL,
  `g_phone` varchar(60) NOT NULL,
  `g_addr` varchar(75) NOT NULL,
  UNIQUE KEY `g_ID` (`g_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`tb_guardians`
--

/*!40000 ALTER TABLE `tb_guardians` DISABLE KEYS */;
LOCK TABLES `tb_guardians` WRITE;
INSERT INTO `bulilit`.`tb_guardians` VALUES  (1,'Yanoc','Wilson','R','12365478958','Pagadian City');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tb_guardians` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`tb_relationship`
--

DROP TABLE IF EXISTS `bulilit`.`tb_relationship`;
CREATE TABLE  `bulilit`.`tb_relationship` (
  `rel_ID` int(1) NOT NULL AUTO_INCREMENT,
  `rel_relation` varchar(10) NOT NULL,
  `ath_ID` int(8) NOT NULL,
  `g_ID` int(8) NOT NULL,
  UNIQUE KEY `rel_ID` (`rel_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`tb_relationship`
--

/*!40000 ALTER TABLE `tb_relationship` DISABLE KEYS */;
LOCK TABLES `tb_relationship` WRITE;
INSERT INTO `bulilit`.`tb_relationship` VALUES  (1,'Father',1,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `tb_relationship` ENABLE KEYS */;


--
-- Definition of table `bulilit`.`users`
--

DROP TABLE IF EXISTS `bulilit`.`users`;
CREATE TABLE  `bulilit`.`users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulilit`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
LOCK TABLES `users` WRITE;
INSERT INTO `bulilit`.`users` VALUES  ('admin','21232f297a57a5a743894a0e4a801fc3','0e5afa88de64ab75327f7ceb0a6a733a',9,'joanne_v12@yahoo.com',1320411217),
 ('jasmin','75ba7b03351c7133d2edf4ce2a221ac2','2a4af1993055cc457b9399c8aab4ae27',2,'jhazmine_16@yahoo.com',1318865926),
 ('joanne01','f683de281974adc40c2b34652b990915','0',1,'joanne_v12@yahoo.com',1318864680),
 ('michael','3f1a05c0b3923ea93f8b1ed7abe38fdd','2b2594dbaebe26736fe4ab02c6e69cbb',3,'michael.briso@yahoo.com',1318865933),
 ('root123','46f94c8de14fb36680850768ff1b7f2a','79cb0e5399eb67b7de9c387e525c2f09',3,'lopegwapo@gmail.com',1319593336);
UNLOCK TABLES;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
