CREATE DATABASE  IF NOT EXISTS `FantasticBeasts_proizvodi` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `FantasticBeasts_proizvodi`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: FantasticBeasts_proizvodi
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Proizvodi`
--

DROP TABLE IF EXISTS `Proizvodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proizvodi` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) DEFAULT NULL,
  `Tip životinja` int(11) DEFAULT NULL,
  `Tip proizvoda` int(11) DEFAULT NULL,
  `Opis` varchar(45) DEFAULT NULL,
  `Cijena` float DEFAULT NULL,
  PRIMARY KEY (`PID`),
  KEY `fk_Proizvodi_1_idx` (`Tip proizvoda`),
  KEY `fk_životinje_idx` (`Tip životinja`),
  CONSTRAINT `fk_proizvod` FOREIGN KEY (`Tip proizvoda`) REFERENCES `Tip proizvoda` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_životinje` FOREIGN KEY (`Tip životinja`) REFERENCES `Tip životinja` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proizvodi`
--

LOCK TABLES `Proizvodi` WRITE;
/*!40000 ALTER TABLE `Proizvodi` DISABLE KEYS */;
INSERT INTO `Proizvodi` VALUES (1,'Whiskas',2,1,'Dehidrirana hrana',20),(2,'Belcando',1,1,'Hrana u konzervi',25),(3,'Carnilove',1,1,'Hrana u konzervi',30),(4,'Chappi',1,1,'Hrana u vrećici',25),(5,'Krletka',4,3,'Krletka za ptice',100),(6,'Brit Animals',3,1,'Hrana za zamorce',25),(7,'Kavez',3,3,'Kavez za glodavce',80),(8,'Transporter',2,3,'Transporter za mačke',120),(9,'Dajana',5,1,'Hrana za ribice',30),(10,'Akvarij',5,3,'Pravokutni akvarij',150);
/*!40000 ALTER TABLE `Proizvodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tip životinja`
--

DROP TABLE IF EXISTS `Tip životinja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tip životinja` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tip životinja`
--

LOCK TABLES `Tip životinja` WRITE;
/*!40000 ALTER TABLE `Tip životinja` DISABLE KEYS */;
INSERT INTO `Tip životinja` VALUES (1,'Pas'),(2,'Mačka'),(3,'Glodavci'),(4,'Ptice'),(5,'Ribice'),(6,'Gmazovi'),(7,'Ostalo');
/*!40000 ALTER TABLE `Tip životinja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tip proizvoda`
--

DROP TABLE IF EXISTS `Tip proizvoda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tip proizvoda` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Tip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tip proizvoda`
--

LOCK TABLES `Tip proizvoda` WRITE;
/*!40000 ALTER TABLE `Tip proizvoda` DISABLE KEYS */;
INSERT INTO `Tip proizvoda` VALUES (1,'Hrana'),(2,'Poslastice'),(3,'Oprema'),(4,'Higijena'),(5,'Ostalo');
/*!40000 ALTER TABLE `Tip proizvoda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-05 20:03:33
