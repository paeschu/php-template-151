-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `discussItLite` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `discussItLite`;

DROP TABLE IF EXISTS `activation`;
CREATE TABLE `activation` (
  `ActivationID` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`ActivationID`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `activation_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Title` varchar(48) NOT NULL,
  `Description` varchar(440) NOT NULL,
  `DateTime` datetime NOT NULL,
  `ItemOneName` varchar(48) NOT NULL,
  `ItemTwoName` varchar(48) NOT NULL,
  `ItemOneVote` int(11) NOT NULL,
  `ItemTwoVote` int(11) NOT NULL,
  PRIMARY KEY (`PostID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`PostID`, `UserID`, `Title`, `Description`, `DateTime`, `ItemOneName`, `ItemTwoName`, `ItemOneVote`, `ItemTwoVote`) VALUES
(1,	1,	'Hi',	'Hallo mein name ist Pascal',	'2017-06-21 18:37:26',	'Du',	'Er',	0,	0);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(16) NOT NULL,
  `Email` varchar(72) NOT NULL,
  `Firstname` varchar(24) NOT NULL,
  `Lastname` varchar(24) NOT NULL,
  `Password` varchar(24) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Firstname`, `Lastname`, `Password`) VALUES
(1,	'Paeschu',	'kunz.pas@gmail.com',	'Pascal',	'Kunz',	'Passw0rd!');

-- 2017-06-22 08:56:26
