CREATE DATABASE IF NOT EXISTS `forge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `forge`;

CREATE TABLE `projects` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `plastic` varchar(10) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `payment` int,
  `machine` varchar(50) NOT NULL,
  `forClass` BOOLEAN,
  `startTime` DATETIME NOT NULL,
  `eta` DATETIME NOT NULL,
  `endTime` DATETIME,
  `success` BOOLEAN,
  `timesFailed` int,
  `plasticBrand` varchar(255),
  `userID` int NOT NULL,
  PRIMARY KEY (`pid`)
);

CREATE TABLE `hardware` (
  `mid` int  NOT NULL,
  `inUse` BOOLEAN,
  `status` BOOLEAN,
  `machineName` varchar(50) NOT NULL,
  PRIMARY KEY (`machineName`)
);

CREATE TABLE `users` (
  `rcsID` varchar(255) NOT NULL,
  `rin` int NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`rin`)
);

CREATE TABLE `volunteers` (
  `vID` int NOT NULL AUTO_INCREMENT,
  `rin` int NOT NULL,
  `dayOfWeek` int NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  PRIMARY KEY (`vID`)
);

CREATE TABLE `sessions` (
  `sessionID` varchar(1000) NOT NULL,
  `userID` int NOT NULL,
  `experation` DATETIME,
  PRIMARY KEY (`sessionID`(191))
);

  ALTER TABLE `projects` ADD CONSTRAINT `fk_machine` FOREIGN KEY (`machine`) REFERENCES `hardware`(`machineName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  ALTER TABLE `projects` ADD CONSTRAINT `fk_userID`  FOREIGN KEY (`userID`) REFERENCES `users`(`rin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  ALTER TABLE `sessions` ADD CONSTRAINT `fk_userID2` FOREIGN KEY (`userID`) REFERENCES `users`(`rin`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  ALTER TABLE `volunteers` ADD CONSTRAINT `fk_userID3` FOREIGN KEY (`rin`) REFERENCES `users`(`rin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

