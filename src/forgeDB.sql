CREATE TABLE `projects` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `plastic` varchar(10) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `payment` int,
  `machine` varchar(255) NOT NULL,
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
  `machineName` varchar(255) NOT NULL,
  PRIMARY KEY (`machineName`)
);

CREATE TABLE `users` (
  `rcsID` varchar(255) NOT NULL,
  `rin` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`rin`)
);

  ALTER TABLE `projects` ADD CONSTRAINT `fk_machine` FOREIGN KEY (`machine`) REFERENCES `hardware`(`machineName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  ALTER TABLE `projects` ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`userID`) REFERENCES `users`(`rin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

