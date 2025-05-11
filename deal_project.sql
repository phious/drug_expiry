/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Create database
DROP DATABASE IF EXISTS `defaultdb`;
CREATE DATABASE `defaultdb`;
USE `defaultdb`;

SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

-- GTID state at the beginning of the backup
SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '13d89f4c-26ec-11f0-8b41-662a4e9763e3:1-60,
691a2bb6-2b4d-11f0-8313-862ccfb0682c:1-29';

-- Table structure for table `admin`
DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Access` int NOT NULL,
  `phone_number` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `admin`
LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES 
(1,'yonatan','amare','admin','admin',1,''),
(2,'Dawit','Jemil','dave','12345678',1,''),
(3,'Naod','Mulubrhan','naod','12345678',2,'');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `activity_log`
DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `admin_id` int NOT NULL,
  `action` varchar(20) NOT NULL,
  `activity_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `activity_log`
LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES 
(1,'added new batch','2025-03-12 19:30:27'),
(1,'added new batch','2025-03-12 19:33:54'),
(1,'added new distributi','2025-03-12 19:50:20'),
(2,'added new distributi','2025-03-12 02:31:29'),
(1,'added new batch','2025-03-12 02:32:27'),
(2,'added new drug','2025-03-12 14:28:26'),
(3,'Updated account','2025-05-11 11:21:40');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `batch`
DROP TABLE IF EXISTS `batch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batch` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `Batch_Name` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `batch`
LOCK TABLES `batch` WRITE;
/*!40000 ALTER TABLE `batch` DISABLE KEYS */;
INSERT INTO `batch` VALUES 
 acompanhar(1,1,'Batch 1','2025-03-10 00:00:00'),
(2,1,'Batch 2','2025-03-19 00:00:00'),
(3,2,'Batch 1','2019-09-10 14:25:50');
/*!40000 ALTER TABLE `batch` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `distribution_center`
DROP TABLE IF EXISTS `distribution_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distribution_center` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Contact_info` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `distribution_center`
LOCK TABLES `distribution_center` WRITE;
/*!40000 ALTER TABLE `distribution_center` DISABLE KEYS */;
INSERT INTO `distribution_center` VALUES 
(1,'Droga Pharmcy','Figa , AddisAbaba',' +251-112-73-45-54'),
(2,'Gishen Pharmacy','Jemo 1 , Addis Ababa ','+251 930 099850');
/*!40000 ALTER TABLE `distribution_center` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `drug_table`
DROP TABLE IF EXISTS `drug_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drug_table` (
  `drug_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `drug_name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `prod_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `qty` int NOT NULL,
  `price` double NOT NULL,
  `status` varchar(100) NOT NULL,
  `evaluation` varchar(50) NOT NULL,
  `comment` text,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `drug_table`
LOCK TABLES `drug_table` WRITE;
/*!40000 ALTER TABLE `drug_table` DISABLE KEYS */;
INSERT INTO `drug_table` VALUES 
(1,1,2,'Paracetamol','For relief of pain, head ache and weakness','2024-02-10','2025-07-17',500,50,'1','refurbished',NULL),
(2,1,1,'Procold','Useful for cold, cough and Cattrh','2024-02-10','2025-07-17',2000,100,'1','refurbished',NULL),
(3,1,2,'Vitamin C','For relief of pain','2024-02-10','2025-07-17',800,500,'1','normal',NULL),
(4,2,1,'panadol','Useful for cold cough and Cattrh','2024-02-10','2025-07-17',2000,500,'1','normal',NULL);
/*!40000 ALTER TABLE `drug_table` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `expiry_table`
DROP TABLE IF EXISTS `expiry_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expiry_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drug_id` int NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `expiry_table`
LOCK TABLES `expiry_table` WRITE;
/*!40000 ALTER TABLE `expiry_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `expiry_table` ENABLE KEYS */;
UNLOCK TABLES;

-- Table structure for table `sales`
DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `sales_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `sales_date` date NOT NULL,
  `dist_center` varchar(100) NOT NULL,
  `drug` varchar(50) NOT NULL,
  `sales_qty` int NOT NULL,
  `sales_price` double NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dumping data for table `sales`
LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-11 17:28:58