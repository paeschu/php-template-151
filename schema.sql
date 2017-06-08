-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `discussIt` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `discussIt`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `CategorieID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(1020) NOT NULL,
  PRIMARY KEY (`CategorieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Comment` varchar(2040) NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(255) NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `ProducerID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(1020) NOT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `ProducerID` (`ProducerID`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`ProducerID`) REFERENCES `producer` (`ProducerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `items_categories`;
CREATE TABLE `items_categories` (
  `ItemID` int(11) NOT NULL,
  `CategorieID` int(11) NOT NULL,
  KEY `ItemID` (`ItemID`),
  KEY `CategorieID` (`CategorieID`),
  CONSTRAINT `items_categories_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`),
  CONSTRAINT `items_categories_ibfk_2` FOREIGN KEY (`CategorieID`) REFERENCES `categories` (`CategorieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `items_images`;
CREATE TABLE `items_images` (
  `ItemID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  KEY `ItemID` (`ItemID`),
  KEY `ImageID` (`ImageID`),
  CONSTRAINT `items_images_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`),
  CONSTRAINT `items_images_ibfk_2` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(1020) NOT NULL,
  PRIMARY KEY (`PostID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `posts_items`;
CREATE TABLE `posts_items` (
  `PostID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  KEY `PostID` (`PostID`),
  KEY `ItemID` (`ItemID`),
  CONSTRAINT `posts_items_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`),
  CONSTRAINT `posts_items_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `producer`;
CREATE TABLE `producer` (
  `ProducerID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(1020) NOT NULL,
  PRIMARY KEY (`ProducerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `producer_images`;
CREATE TABLE `producer_images` (
  `ProducerID` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  KEY `ProducerID` (`ProducerID`),
  KEY `ImageID` (`ImageID`),
  CONSTRAINT `producer_images_ibfk_1` FOREIGN KEY (`ProducerID`) REFERENCES `producer` (`ProducerID`),
  CONSTRAINT `producer_images_ibfk_2` FOREIGN KEY (`ImageID`) REFERENCES `images` (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `subComment`;
CREATE TABLE `subComment` (
  `CommentID` int(11) NOT NULL,
  `SubCommentID` int(11) NOT NULL,
  KEY `CommentID` (`CommentID`),
  KEY `SubCommentID` (`SubCommentID`),
  CONSTRAINT `subComment_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`CommentID`),
  CONSTRAINT `subComment_ibfk_2` FOREIGN KEY (`SubCommentID`) REFERENCES `comments` (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Firstname`, `Lastname`, `Password`) VALUES
(2,	'Paeschu',	'kunz.pas@gmail.com',	'Pascal',	'Kunz',	'Passw0rd!'),
(3,	'Boss',	'boss@byom.de',	'Yan',	'Tsarov',	'Penis');

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `VoteID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `UpVotes` int(11) NOT NULL,
  `DownVotes` int(11) NOT NULL,
  KEY `UserID` (`UserID`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2017-06-08 08:34:35
