-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: notebookdb
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `notebook_entries`
--

DROP TABLE IF EXISTS `notebook_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notebook_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notebook_entries`
--

LOCK TABLES `notebook_entries` WRITE;
/*!40000 ALTER TABLE `notebook_entries` DISABLE KEYS */;
INSERT INTO `notebook_entries` VALUES (1,'Jane Smith','Star Corporation','11-22-33-44','jane.smith@example.com','1983-05-18','uploads/janephoto.png'),(2,'Jack Snow','News Company','+79225003255','jack.snow@example.com','1994-06-08','uploads/jackphoto.png'),(3,'John Doe','Doe','123-456-78-90','doe@example.com',NULL,NULL),(4,'Elena Meew','Greatest','123-336-55-90','mew@example.com','1955-02-01',NULL),(5,'Stella Chou','Home','222-336-55-22','chou@example.com','1967-08-04',NULL),(6,'Sam Rider','Music Ink','300-50-50','Rider@example.com','1987-03-02','uploads/placeholder.png'),(7,'Cory Too',NULL,'300-200-100','tootoo@example.com',NULL,NULL),(8,'Lily Lane','Corp Corporation','221-30-400','myemail@example.com','1993-10-23','uploads/placeholder.png'),(9,'Molly Dark','Dark Forces','505-666-000','darkmo@example.com','1996-12-31','uploads/placeholder.png'),(11,'Tom Stone','Green House','8(921)445-22-34','workmail@example.com','2000-04-23','uploads/placeholder.png'),(12,'Tony Lee','Lee Corp','100-500-400','lee@example.com','2002-02-22','uploads/placeholder.png'),(14,'Alice Johnson','Johnson Inc','100-500-430','alice@example.com','1990-12-30','uploads/placeholder.png'),(15,'Jaylon Macejkovic','Corp','501-604-966','jm@example.com','1994-11-30','uploads/placeholder.png'),(16,'Clementina Schinner','Orange','200-100-400','orange@example.com','1967-03-30','uploads/placeholder.png'),(17,'Hallie Littel','Little Company','200-123-123','hallie@example.com','1985-10-10','uploads/placeholder.png'),(18,'Justine Marks','Space','123-300-200','justm@example.com','1989-03-03','uploads/placeholder.png'),(19,'Prof. Rashad Mraz','Schneider, Wiza and Beer','346-262-0702','oreinger@hotmail.com','1998-10-02','uploads/placeholder.png'),(20,'Ora Wuckert','McCullough-Blanda','+17327663996','breitenberg@bartoletti.info','1999-04-22','uploads/placeholder.png'),(21,'Adan Millet','Mraz-Oberbrunner','(972) 315-5088','adam28@sipes.com','1999-12-21','uploads/placeholder.png'),(22,'Lacy Turcotte','Olson, Torphy and Mante','200-300-399','lacy@email.com','1984-10-14','uploads/placeholder.png'),(23,'Jeff Blick','JB','300-700-46-50','jbmail@email.com','1976-03-13','uploads/placeholder.png'),(24,'Louie Ferr','Ink Lou','700-46-50','loul@email.com','1979-03-11','uploads/placeholder.png'),(25,'Robert Brown','Brown Co','100-500-403','robert@example.com','1982-03-03','uploads/placeholder.png'),(26,'Sandy Bark','','200-300-66','sa@example.com','1988-02-01','uploads/placeholder.png'),(30,'Robert Brown','Brown Co','100-500-403','robert@example.com','1982-03-03','uploads/placeholder.png'),(31,'Rob Br','Co','100-500-403','robert@example.com','1981-03-01','uploads/placeholder.png'),(32,'test','Company','100-500-403','test@example.com','1984-03-04','uploads/placeholder.png'),(33,'test','Company','100-500-403','test@example.com','1984-03-04','uploads/placeholder.png'),(34,'test','Company','100-500-403','test@example.com','1984-03-04','uploads/placeholder.png');
/*!40000 ALTER TABLE `notebook_entries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-04  6:21:43
