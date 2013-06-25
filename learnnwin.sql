/*
SQLyog Community Edition- MySQL GUI v7.01 
MySQL - 5.1.49-1ubuntu8 : Database - learnnwin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`learnnwin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `learnnwin`;

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `is_active` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `group` */

insert  into `group`(`id`,`name`,`time`,`userId`,`is_active`) values (1,'test',60,1,'1'),(2,'123',60,1,'1'),(3,'hareesh',60,2,'1');

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `choice1` text,
  `choice2` text,
  `choice3` text,
  `choice4` text,
  `answer` char(1) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `isActive` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `question` */

insert  into `question`(`id`,`question`,`choice1`,`choice2`,`choice3`,`choice4`,`answer`,`userId`,`isActive`) values (1,' 6+3 = 183, 5+4=201, 4+2=32 then 7+4 = ?','283','303','86','83','A',1,'1'),(5,'Capital of south sudan ?','Akra','Bilma','Juba','Bomako','C',1,'1'),(6,'The place of next olimpics.','Brazil','China','Uk','Tokiyo','A',1,'1'),(7,'When was the Reserve Bank of India established in India?','21 may 1935','1 April 1935','1 Dec 1936','13 April 1934','B',1,'1'),(8,'Chandigarh is the capital of','Rajasthan',' Punjab','Haryana','Haryana and Punjab','D',2,'1'),(9,'The â€œHarry Potterâ€ written by','Stephen Moss	','ames Hadley Chase','J.K. Rowling','John Grisham','C',2,'1'),(10,'How many languages are printed on an Indian currency note?','15','13','16','14','A',2,'1'),(11,'The King of Chemicals is ?','Boric acid','Sulfuric acid','aluminium trichloride.','Sodium carbonate','B',2,'1'),(12,'How many languages in India have been conferred classical statuses so far?','3','4','6','5','D',2,'1'),(14,'When the first Under-17 Football World Cup event is scheduled in India?','2014','2015','2016','2017','D',2,'1'),(15,'Which state won the Junior Menâ€™s National Hockey title 2013?','Maharashtra','Bangal','Punjab','Hariyana','C',2,'1'),(16,'Which Indian state launched countryâ€™s first seaplane service?','Goa','Kerala','Tamilnadu','Karnataka','B',2,'1'),(17,'BD in computer terminology stands for:','Bit Data','Binary Digit','Blue-ray','All of the above','C',2,'1'),(18,'Which of the following is the fastest memory?','Cache','RAM','ROM','Registers','D',2,'1'),(19,'The first programming language used for scientific operation is','FORTRAN','Pascal','COBOL','BASIC','A',2,'1'),(20,'How many districts in Kerala have no coastline?','4','2','3','5','D',2,'1'),(21,'The country with 3 capitals','Bolivia','South Africa','Greenland','Guinea','B',2,'1'),(22,'Indiaâ€™s first Rubber Dam is situated in','kerela','maharastra','andra pradesh','arunachal pradesh.','C',2,'1'),(23,'The Secretary-General of UN is appointed by the:','Security Council','Trusteeship Council','General Assembly','World Bank','C',2,'1'),(24,'Who invented Radar','Henrey Backquerel','Max Planck','Robert Watson Watt','Humphrey Davy','C',2,'1'),(25,'Canary Islands belongs to','Norway','Spain','New Zealand','Portugal','B',2,'1'),(26,'Titan is the largest natural satellite of planet ','Mercury','Venus','Saturn','Neptune','C',2,'1'),(27,'Which of the following planets rotates clock wise','Pluto','Jupiter','Venus','Mercury','C',2,'1');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstName` varchar(512) DEFAULT NULL,
  `lastName` varchar(512) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `isActive` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`,`firstName`,`lastName`,`score`,`isActive`) values (1,'abhilash.neo@gmail.com','76aca14e6d05ddd7681b4ea782415cb0','abhi','ks',19,'1'),(2,'hareesh@xminds.in','5a18310e375b0771c43c21d887b294eb','Hareesh','vm',0,'1'),(3,'gokulmgce@gmail.com','e10adc3949ba59abbe56e057f20f883e','gokul','bs',0,'1');

/*Table structure for table `userGroupMap` */

DROP TABLE IF EXISTS `userGroupMap`;

CREATE TABLE `userGroupMap` (
  `userId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`userId`,`groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `userGroupMap` */

insert  into `userGroupMap`(`userId`,`groupId`) values (1,1),(1,2),(2,3);

/*Table structure for table `userQuestionMap` */

DROP TABLE IF EXISTS `userQuestionMap`;

CREATE TABLE `userQuestionMap` (
  `userId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `status` char(1) DEFAULT 'S',
  PRIMARY KEY (`userId`,`questionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `userQuestionMap` */

insert  into `userQuestionMap`(`userId`,`questionId`,`status`) values (1,27,'F'),(1,26,'S'),(1,25,'F'),(1,24,'F'),(1,23,'S'),(1,22,'S'),(1,21,'S'),(1,20,'S'),(1,19,'S'),(1,18,'F'),(1,17,'S'),(1,16,'S'),(1,15,'S'),(1,14,'S'),(1,12,'S'),(1,11,'S'),(1,10,'S'),(1,9,'S'),(1,8,'S'),(1,7,'S'),(1,6,'S'),(1,5,'S'),(1,1,'S');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
