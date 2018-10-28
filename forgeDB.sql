CREATE DATABASE IF NOT EXISTS `forge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `forge`;

CREATE TABLE `projects` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `plastic` varchar(10),
  `amount` varchar(50),
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
  `userInit` varchar(10),
  PRIMARY KEY (`pid`)
);

CREATE TABLE `hardware` (
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

CREATE TABLE `plastics` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `price` float(11) NOT NULL,
  PRIMARY KEY (`pID`)
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
  
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Laser Cutter");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Vinyl Cutter");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"3D Scanner");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Makerbot Z18");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"TAZ 5");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"TAZ Mini");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Makerbot Mini");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Form 1+");
  INSERT INTO `hardware`(`inUse`, `status`, `machineName`) VALUES (0,1,"Sewing Machine");
  
  
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (1,"PLA",0.07);
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (2,"ABS",0.06);
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (3,"Nylon",0.1);
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (4,"Flexy",0.09);
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (5,"nGen",0.055);
  INSERT INTO `plastics`(`pID`, `type`, `price`) VALUES (6,"Resin",0.2);

