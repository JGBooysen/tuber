-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2018 at 09:18 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuber`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getClasses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getClasses` ()  READS SQL DATA
Select * From subjectclass$$

DROP PROCEDURE IF EXISTS `getParentContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getParentContact` (IN `parentIDIn` INT)  READS SQL DATA
SELECT * from contact C
inner join parentcontact PC
on C.contactID=PC.contactID
where PC.parentID=parentIDIn$$

DROP PROCEDURE IF EXISTS `getParentEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getParentEmail` (IN `parentIDIn` INT)  READS SQL DATA
Select * from email E
inner join parentemail PE
on E.emailID=PE.emailID
where PE.parentID=parentIDIn$$

DROP PROCEDURE IF EXISTS `getSchoolContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getSchoolContact` (IN `schoolIDIn` INT)  READS SQL DATA
SELECT * from contact C
inner join schoolcontact SC
on C.contactID=SC.contactID
where SC.schoolID=schoolIDIn$$

DROP PROCEDURE IF EXISTS `getSchoolEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getSchoolEmail` (IN `schoolIDIn` INT)  READS SQL DATA
Select * from email E
inner join schoolemail SE
on E.emailID=SE.emailID
where SE.schoolID=schoolIDIn$$

DROP PROCEDURE IF EXISTS `getStudentParent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentParent` (IN `parentIDIn` INT)  READS SQL DATA
Select * from student S
inner join studentparent SP on S.studentID=SP.studentID
where SP.parentID=parentIDIn$$

DROP PROCEDURE IF EXISTS `getStudentSpecificClass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentSpecificClass` (IN `tutorClassIDIn` INT)  READS SQL DATA
Select * From student S
INNER JOIN studentclass SC on SC.studentID=S.studentID
where SC.tutorClassID=tutorClassIDIntutorClassIDIn$$

DROP PROCEDURE IF EXISTS `getTutorContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorContact` (IN `tutorIDIn` INT)  READS SQL DATA
SELECT * from contact C
inner join tutorcontact TC
on C.contactID=TC.contactID
where TC.tutorID=tutorIDIn$$

DROP PROCEDURE IF EXISTS `getTutorEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorEmail` (IN `tutorIDIn` INT)  READS SQL DATA
Select * from email E
inner join tutoremail TE
on E.emailID=TE.EmailID
where TE.tutorID=tutorIDIn$$

DROP PROCEDURE IF EXISTS `getTutorSpecificClass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorSpecificClass` (IN `classNameIn` VARCHAR(60))  READS SQL DATA
Select * From tutor T
inner join tutorClass TC on T.IDTutor=TC.tutorID
where (TC.classID=(Select classID from subjectclass SC where SC.className = classNameIn))$$

DROP PROCEDURE IF EXISTS `insertClass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertClass` (IN `name` VARCHAR(60), IN `description` VARCHAR(150))  Insert into subjectClass(className,classDescription)values(name,description)$$

DROP PROCEDURE IF EXISTS `insertContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertContact` (IN `contactNumber` VARCHAR(20))  Insert into Contact(contactNumber)values(contactNumber)$$

DROP PROCEDURE IF EXISTS `insertEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmail` (IN `email` VARCHAR(80))  Insert into Email(emailAddress) values(email)$$

DROP PROCEDURE IF EXISTS `insertParent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertParent` (IN `username` VARCHAR(60), IN `passwordIn` VARCHAR(50), IN `parentName` VARCHAR(60), IN `parentSurname` VARCHAR(60), IN `streetName` VARCHAR(80), IN `city` VARCHAR(60), IN `houseNumber` VARCHAR(10), IN `nationalID` VARCHAR(20))  Insert into Parent(username,passwordField,parentName,parentSurname,streetName,city,houseNumber,nationalID) values(username,passwordIn,parentName,parentSurname,streetName,city,houseNumber,nationalID)$$

DROP PROCEDURE IF EXISTS `insertParentContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertParentContact` (IN `parentIDIn` INT)  Insert into ParentContact(contactID,parentID)  values((Select contactID from Contact order by contactID desc limit 1 OFFSET 0),parentIDIn)$$

DROP PROCEDURE IF EXISTS `insertParentEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertParentEmail` (IN `parentIDIn` INT)  Insert into ParentEmail (parentID,emailID) values(parentIDIn,(Select emailID from Email order by emailID desc LIMIT 1 OFFSET 0))$$

DROP PROCEDURE IF EXISTS `insertSchool`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSchool` (IN `schoolName` VARCHAR(80), IN `streetName` VARCHAR(80), IN `city` VARCHAR(60), IN `houseNum` VARCHAR(10))  Insert into School(schoolName,streetName,city,houseNumber) values(schoolName,streetName,city,houseNum)$$

DROP PROCEDURE IF EXISTS `insertSchoolContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSchoolContact` (IN `schoolIDIn` INT)  Insert into  SchoolContact(contactID,schoolID) values((Select contactID from Contact order by contactID desc limit 1 OFFSET 0),schoolIDIn)$$

DROP PROCEDURE IF EXISTS `insertSchoolEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSchoolEmail` (IN `schoolIDIn` INT)  Insert into SchoolEmail(schoolID,emailID)values(schoolIDIIn,(Select emailID from Email order by emailID desc LIMIT 1 OFFSET 0))$$

DROP PROCEDURE IF EXISTS `insertStudent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudent` (IN `studentName` VARCHAR(60), IN `surname` VARCHAR(60), IN `grade` VARCHAR(3))  Insert into Student(studentName,studentSurname,grade)values (studentName,surname,grade)$$

DROP PROCEDURE IF EXISTS `insertStudentClass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentClass` (IN `tutorCLassIDIn` INT, IN `studentIDIn` INT)  Insert into StudentClass(tutorClassID,studentID)values (tutorCLassIDIn,studentIDIn)$$

DROP PROCEDURE IF EXISTS `insertStudentParent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentParent` (IN `parentid` INT)  Insert into StudentParent(studentID,parentID) values((select  studentID from Student order by studentID desc LIMIT 1 OFFSET 0),parentID)$$

DROP PROCEDURE IF EXISTS `insertTutor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTutor` (IN `usernameIn` VARCHAR(60), IN `passwordIn` VARCHAR(50), IN `tutorNameIn` VARCHAR(60), IN `tutorSurnameIn` VARCHAR(60), IN `salaryIn` REAL, IN `streetNameIn` VARCHAR(80), IN `houseNumIn` VARCHAR(10), IN `cityIn` VARCHAR(60))  Insert into tutor(tutorName,surname,username,passwordField,salary,streetName,houseNum,city)values(tutorNameIn,tutorSurnameIn,usernameIn,passwordIn,salaryIn,streetNameIn,houseNumIn,cityIn)$$

DROP PROCEDURE IF EXISTS `insertTutorClass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTutorClass` (IN `classIDIn` INT, IN `tutorIDIn` INT, IN `classDateIn` DATE, IN `durationIn` TIME)  Insert into TutorCLass(classID,tutorID,classDate,duration)values(classIDIn,tutorIDIn,classDateIn,durationIn)$$

DROP PROCEDURE IF EXISTS `insertTutorContact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTutorContact` (IN `tutorIDIN` INT)  Insert into tutorcontact(tutorcontact.tutorID,tutorcontact.contactID)VALUES(tutorIDIn,(Select contact.contactID from contact ORDER by contact.contactID Desc LIMIT 1 OFFSET 0) )$$

DROP PROCEDURE IF EXISTS `insertTutorEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTutorEmail` (IN `tutorIDIn` INT)  Insert into tutoremail(tutoremail.tutorID,tutoremail.EmailID) VALUES (tutorIDIn,(SELECT email.emailID from email ORDER by email.emailID DESC LIMIT 1 OFFSET 0))$$

DROP PROCEDURE IF EXISTS `linkSchoolTutor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `linkSchoolTutor` (IN `tutorid` INT, IN `schoolID` INT)  Insert into TutorSchool(tutorID,schoolID)values(tutorid,schoolID)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `contactNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `contactNumber`) VALUES
(2, '0812229922'),
(3, '0821232525');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `emailID` int(11) NOT NULL AUTO_INCREMENT,
  `emailAddress` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`emailID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailID`, `emailAddress`) VALUES
(1, 'email@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `parentID` int(11) NOT NULL AUTO_INCREMENT,
  `nationalID` varchar(20) NOT NULL,
  `parentName` varchar(60) NOT NULL,
  `parentSurname` varchar(60) NOT NULL,
  `streetName` varchar(80) NOT NULL,
  `city` varchar(60) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `accountBalance` double NOT NULL DEFAULT '0',
  `username` varchar(60) NOT NULL,
  `passwordField` varchar(50) NOT NULL,
  PRIMARY KEY (`parentID`),
  UNIQUE KEY `nationalID` (`nationalID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `nationalID`, `parentName`, `parentSurname`, `streetName`, `city`, `houseNumber`, `accountBalance`, `username`, `passwordField`) VALUES
(1, '9709025023083', 'Stephan', 'Schroder', 'Dikbas Avenue', 'Pretoria', '80', 0, 'user', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `parentcontact`
--

DROP TABLE IF EXISTS `parentcontact`;
CREATE TABLE IF NOT EXISTS `parentcontact` (
  `parentContactID` int(11) NOT NULL AUTO_INCREMENT,
  `contactID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`parentContactID`),
  KEY `contactID` (`contactID`),
  KEY `parentID` (`parentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentcontact`
--

INSERT INTO `parentcontact` (`parentContactID`, `contactID`, `parentID`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parentemail`
--

DROP TABLE IF EXISTS `parentemail`;
CREATE TABLE IF NOT EXISTS `parentemail` (
  `parentEmailID` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) DEFAULT NULL,
  `emailID` int(11) DEFAULT NULL,
  PRIMARY KEY (`parentEmailID`),
  KEY `emailID` (`emailID`),
  KEY `parentID` (`parentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentemail`
--

INSERT INTO `parentemail` (`parentEmailID`, `parentID`, `emailID`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `schoolID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(80) DEFAULT NULL,
  `streetName` varchar(80) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `houseNumber` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `schoolName`, `streetName`, `city`, `houseNumber`) VALUES
(1, 'Waterkloof Hoërskool', 'weti', 'weti', '10');

-- --------------------------------------------------------

--
-- Table structure for table `schoolcontact`
--

DROP TABLE IF EXISTS `schoolcontact`;
CREATE TABLE IF NOT EXISTS `schoolcontact` (
  `schoolContactID` int(11) NOT NULL AUTO_INCREMENT,
  `contactID` int(11) DEFAULT NULL,
  `schoolID` int(11) DEFAULT NULL,
  PRIMARY KEY (`schoolContactID`),
  KEY `contactID` (`contactID`),
  KEY `schoolID` (`schoolID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolcontact`
--

INSERT INTO `schoolcontact` (`schoolContactID`, `contactID`, `schoolID`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolemail`
--

DROP TABLE IF EXISTS `schoolemail`;
CREATE TABLE IF NOT EXISTS `schoolemail` (
  `schoolEmailID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolID` int(11) DEFAULT NULL,
  `emailID` int(11) DEFAULT NULL,
  PRIMARY KEY (`schoolEmailID`),
  KEY `emailID` (`emailID`),
  KEY `schoolID` (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(60) NOT NULL,
  `studentSurname` varchar(60) NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

DROP TABLE IF EXISTS `studentclass`;
CREATE TABLE IF NOT EXISTS `studentclass` (
  `studentClassID` int(11) NOT NULL AUTO_INCREMENT,
  `tutorClassID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentClassID`),
  KEY `studentID` (`studentID`),
  KEY `tutorClassID` (`tutorClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentparent`
--

DROP TABLE IF EXISTS `studentparent`;
CREATE TABLE IF NOT EXISTS `studentparent` (
  `studentParentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentParentID`),
  KEY `parentID` (`parentID`),
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectclass`
--

DROP TABLE IF EXISTS `subjectclass`;
CREATE TABLE IF NOT EXISTS `subjectclass` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `classDescription` varchar(150) NOT NULL,
  `className` varchar(60) NOT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectclass`
--

INSERT INTO `subjectclass` (`classID`, `classDescription`, `className`) VALUES
(1, 'Numbers,Calculus', 'Math'),
(2, 'Taal', 'Afrikaans'),
(3, 'Einstein', 'Science'),
(4, 'Language', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `IDTutor` int(11) NOT NULL AUTO_INCREMENT,
  `tutorName` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `passwordField` varchar(50) NOT NULL,
  `salary` double NOT NULL,
  `streetName` varchar(80) NOT NULL,
  `houseNum` varchar(10) NOT NULL,
  `city` varchar(60) NOT NULL,
  PRIMARY KEY (`IDTutor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`IDTutor`, `tutorName`, `surname`, `username`, `passwordField`, `salary`, `streetName`, `houseNum`, `city`) VALUES
(2, 'Stephan', 'Schroder', 'user', 'password', 10000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tutorclass`
--

DROP TABLE IF EXISTS `tutorclass`;
CREATE TABLE IF NOT EXISTS `tutorclass` (
  `tutorClassID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) DEFAULT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `classDate` date NOT NULL,
  PRIMARY KEY (`tutorClassID`),
  KEY `classID` (`classID`),
  KEY `tutorID` (`tutorID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorclass`
--

INSERT INTO `tutorclass` (`tutorClassID`, `classID`, `tutorID`, `duration`, `classDate`) VALUES
(2, 1, 2, '01:00:00', '2018-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `tutorcontact`
--

DROP TABLE IF EXISTS `tutorcontact`;
CREATE TABLE IF NOT EXISTS `tutorcontact` (
  `tutorContactID` int(11) NOT NULL AUTO_INCREMENT,
  `contactID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  PRIMARY KEY (`tutorContactID`),
  KEY `contactID` (`contactID`),
  KEY `tutorID` (`tutorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutoremail`
--

DROP TABLE IF EXISTS `tutoremail`;
CREATE TABLE IF NOT EXISTS `tutoremail` (
  `tutorEmailID` int(11) NOT NULL AUTO_INCREMENT,
  `tutorID` int(11) NOT NULL,
  `EmailID` int(11) NOT NULL,
  PRIMARY KEY (`tutorEmailID`),
  KEY `EmailID` (`EmailID`),
  KEY `tutorID` (`tutorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorschool`
--

DROP TABLE IF EXISTS `tutorschool`;
CREATE TABLE IF NOT EXISTS `tutorschool` (
  `tutorSchoolID` int(11) NOT NULL AUTO_INCREMENT,
  `tutorID` int(11) DEFAULT NULL,
  `schoolID` int(11) DEFAULT NULL,
  PRIMARY KEY (`tutorSchoolID`),
  KEY `schoolID` (`schoolID`),
  KEY `tutorID` (`tutorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parentcontact`
--
ALTER TABLE `parentcontact`
  ADD CONSTRAINT `parentcontact_ibfk_1` FOREIGN KEY (`contactID`) REFERENCES `contact` (`contactID`),
  ADD CONSTRAINT `parentcontact_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`);

--
-- Constraints for table `parentemail`
--
ALTER TABLE `parentemail`
  ADD CONSTRAINT `parentemail_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `email` (`emailID`),
  ADD CONSTRAINT `parentemail_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`);

--
-- Constraints for table `schoolcontact`
--
ALTER TABLE `schoolcontact`
  ADD CONSTRAINT `schoolcontact_ibfk_1` FOREIGN KEY (`contactID`) REFERENCES `contact` (`contactID`),
  ADD CONSTRAINT `schoolcontact_ibfk_2` FOREIGN KEY (`schoolID`) REFERENCES `school` (`schoolID`);

--
-- Constraints for table `schoolemail`
--
ALTER TABLE `schoolemail`
  ADD CONSTRAINT `schoolemail_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `email` (`emailID`),
  ADD CONSTRAINT `schoolemail_ibfk_2` FOREIGN KEY (`schoolID`) REFERENCES `school` (`schoolID`);

--
-- Constraints for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`tutorClassID`) REFERENCES `tutorclass` (`tutorClassID`);

--
-- Constraints for table `studentparent`
--
ALTER TABLE `studentparent`
  ADD CONSTRAINT `studentparent_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`),
  ADD CONSTRAINT `studentparent_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `tutorclass`
--
ALTER TABLE `tutorclass`
  ADD CONSTRAINT `tutorclass_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `subjectclass` (`classID`),
  ADD CONSTRAINT `tutorclass_ibfk_2` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`IDTutor`);

--
-- Constraints for table `tutorcontact`
--
ALTER TABLE `tutorcontact`
  ADD CONSTRAINT `tutorcontact_ibfk_1` FOREIGN KEY (`contactID`) REFERENCES `contact` (`contactID`),
  ADD CONSTRAINT `tutorcontact_ibfk_2` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`IDTutor`);

--
-- Constraints for table `tutoremail`
--
ALTER TABLE `tutoremail`
  ADD CONSTRAINT `tutoremail_ibfk_1` FOREIGN KEY (`EmailID`) REFERENCES `email` (`emailID`),
  ADD CONSTRAINT `tutoremail_ibfk_2` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`IDTutor`);

--
-- Constraints for table `tutorschool`
--
ALTER TABLE `tutorschool`
  ADD CONSTRAINT `tutorschool_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `school` (`schoolID`),
  ADD CONSTRAINT `tutorschool_ibfk_2` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`IDTutor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
