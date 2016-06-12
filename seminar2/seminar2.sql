/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.8-rc : Database - Seminar2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`Seminar2` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci */;

USE `Seminar2`;

/*Table structure for table `Korisnici` */

DROP TABLE IF EXISTS `Korisnici`;

CREATE TABLE `Korisnici` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Prezime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Adresa` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Mjesto` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Poštanski_broj` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Telefon` char(15) COLLATE utf8_croatian_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Korisničko_ime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `Prava_pristupa` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Korisnici` */

insert  into `Korisnici`(`ID`,`Ime`,`Prezime`,`Adresa`,`Mjesto`,`Poštanski_broj`,`Telefon`,`Email`,`Korisničko_ime`,`Lozinka`,`Prava_pristupa`) values (10,'Zrino','Pernar','Vladimira Ruždjaka 33','Zagreb','10000','6110-735','zrino.pernar@gmail.com','zrino','$2y$10$oPjngeDdw3jl.YXp/HJLd.8iOhJZz4VOkFt1v4bprOtuymwYLFZ5S',0),(11,'Ivan','Horvat','Vladimira Nazora 17','Split','10000','5555-444','ivan.horvat@gmail.com','ivan','$2y$10$7huUohwU49x2k95aGIrQgOOyLwWZXMDW1slEpMXR/0s90TXuBvPie',1),(12,'ante','asdf','asdf','asdf','asdf','5','asdf','asdf','$2y$10$5nSU5CRPMjX8UkAOTckkqOWe7XxKyC0GL5s6UD38pXsxTAMiWgTJi',0),(13,'Marko','Pavic','Marice Baric 11','Zagreb','10000','555-1234','marko.pvc@gmail.com','mpavic','$2y$10$Uru4qvCnRi7N1tCEOg7n4uXX3/ryVOAR..yaxbHmOmWOxHH8gONqK',1);

/*Table structure for table `Linije` */

DROP TABLE IF EXISTS `Linije`;

CREATE TABLE `Linije` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_polazista` int(10) unsigned NOT NULL,
  `ID_odredista` int(10) unsigned NOT NULL,
  `Vrijeme_polaska` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Polazište_linija` (`ID_polazista`),
  KEY `Odredište_linija` (`ID_odredista`),
  CONSTRAINT `Odredište_linija` FOREIGN KEY (`ID_odredista`) REFERENCES `Odrediste` (`ID`),
  CONSTRAINT `Polazište_linija` FOREIGN KEY (`ID_polazista`) REFERENCES `Polaziste` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Linije` */

insert  into `Linije`(`ID`,`ID_polazista`,`ID_odredista`,`Vrijeme_polaska`) values (1,1,21,'2016-06-27 16:00:00'),(2,21,8,'2016-06-28 16:00:00'),(3,2,3,'2016-05-25 17:44:15'),(4,2,7,'2016-05-25 18:51:34'),(5,6,8,'2016-06-30 15:45:00'),(6,6,21,'2016-06-29 18:00:00'),(7,5,17,'2016-07-13 16:00:00'),(8,17,4,'2016-05-27 15:59:05'),(9,17,11,'2016-05-27 15:59:43'),(10,9,15,'2016-05-27 16:20:42'),(11,14,13,'2016-05-27 15:59:43'),(12,1,19,'2016-05-27 15:59:43'),(13,1,21,'2016-06-27 22:00:00'),(14,1,21,'2016-06-27 19:15:00');

/*Table structure for table `Odrediste` */

DROP TABLE IF EXISTS `Odrediste`;

CREATE TABLE `Odrediste` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Odrediste` */

insert  into `Odrediste`(`ID`,`Naziv`) values (1,'Supetar'),(2,'Pula'),(3,'Mali Lošinj'),(4,'Makarska'),(5,'Bol'),(6,'Hvar'),(7,'Cres'),(8,'Korčula'),(9,'Brbinj'),(10,'Brestova'),(11,'Biograd'),(12,'Drvenik'),(13,'Drvenik Mali'),(14,'Lopar'),(15,'Olib'),(16,'Orebić'),(17,'Šibenik'),(18,'Stari Grad'),(19,'Trogir'),(20,'Zadar'),(21,'Split');

/*Table structure for table `Polaziste` */

DROP TABLE IF EXISTS `Polaziste`;

CREATE TABLE `Polaziste` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Polaziste` */

insert  into `Polaziste`(`ID`,`Naziv`) values (1,'Supetar'),(2,'Pula'),(3,'Mali Lošinj'),(4,'Makarska'),(5,'Bol'),(6,'Hvar'),(7,'Cres'),(8,'Korčula'),(9,'Biograd'),(10,'Brbinj'),(11,'Brestova'),(12,'Drvenik Mali'),(13,'Drvenik'),(14,'Lopar'),(15,'Olib'),(16,'Orebić'),(17,'Šibenik'),(18,'Stari Grad'),(19,'Trogir'),(20,'Zadar'),(21,'Split');

/*Table structure for table `Prodajna_mjesta` */

DROP TABLE IF EXISTS `Prodajna_mjesta`;

CREATE TABLE `Prodajna_mjesta` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Naziv_mjesta` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Adresa` varchar(45) COLLATE utf8_croatian_ci DEFAULT NULL,
  `Broj_telefona` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Radno_vrijeme` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Ime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Prodajna_mjesta` */

insert  into `Prodajna_mjesta`(`ID`,`Naziv_mjesta`,`Adresa`,`Broj_telefona`,`Radno_vrijeme`,`Ime`) values (1,'Biograd','Ulica Vladimira Nazora 15','+385 23 38 45 89','08:00-20:00','Agencija Biograd'),(2,'Blato','Krtinje bb','+385 20 85 12 26','08:00-20:00','BLATOTOURS'),(3,'Brbinj','Ulica Ivane Brlić Mažuranić 33','+385 23 37 87 13','08:00-20:00','Agencija Brbinj'),(4,'Hvar','Riva bb','+385 21 74 11 32','08:00-20:00','Agencija Hvar'),(5,'Korčula','Plokata 21.travanj bb','+385 20 71 54 10','08:00-20:00','Agencija Korčula'),(6,'Split','Gat Sv.Duje bb','+385 21 33 83 04','08:00-20:00','Agencija Split');

/*Table structure for table `Upiti` */

DROP TABLE IF EXISTS `Upiti`;

CREATE TABLE `Upiti` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Upit` text COLLATE utf8_croatian_ci NOT NULL,
  `Datum` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Upiti` */

insert  into `Upiti`(`ID`,`Ime`,`Email`,`Upit`,`Datum`) values (1,'Zrino','python_22@net.hr','Lorem Ipsum','2016-05-31 12:42:10');

/*Table structure for table `Vijesti` */

DROP TABLE IF EXISTS `Vijesti`;

CREATE TABLE `Vijesti` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_jezik` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `Naslov` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `Sadržaj` text COLLATE utf8_croatian_ci NOT NULL,
  `Slika` varchar(25) COLLATE utf8_croatian_ci DEFAULT NULL,
  `Sakrij` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

/*Data for the table `Vijesti` */

insert  into `Vijesti`(`ID`,`ID_jezik`,`Naslov`,`Sadržaj`,`Slika`,`Sakrij`) values (11,'hrv','Posebna ponuda','Popusti do 30% na sve linije do 23.06.2016. godine','Sea-HD2.jpg',0),(12,'eng','Special offer','Discounts up to 30% on all lines up to 06.23.2016. years','Sea-HD2.jpg',0),(13,'hrv','Linija Rijeka-Split','Linija Rijeka-Split će biti nedostupna nekoliko dana, počevši s 27.06.2016. godine.','Sea-HD2.jpg',0),(14,'eng','Route Rijeka-Split','The line Rijeka-Split will be unavailable for several days, starting with 27.06.2016. years.','Sea-HD2.jpg',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
