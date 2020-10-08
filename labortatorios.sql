-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: laboratorios
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1

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
-- Table structure for table `detalle_orden`
--

DROP TABLE IF EXISTS `detalle_orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_orden` (
  `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT,
  `examen` varchar(100) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `numero_orden` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_orden`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_orden`
--

LOCK TABLES `detalle_orden` WRITE;
/*!40000 ALTER TABLE `detalle_orden` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen_orina`
--

DROP TABLE IF EXISTS `examen_orina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examen_orina` (
  `id_examen_orina` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(15) DEFAULT NULL,
  `olor` varchar(15) DEFAULT NULL,
  `aspecto` varchar(25) DEFAULT NULL,
  `densidad` varchar(10) DEFAULT NULL,
  `est_leuco` varchar(15) DEFAULT NULL,
  `ph` varchar(6) DEFAULT NULL,
  `proteinas` varchar(20) DEFAULT NULL,
  `glucosa` varchar(20) DEFAULT NULL,
  `cetonas` varchar(20) DEFAULT NULL,
  `urobigilogeno` varchar(20) DEFAULT NULL,
  `bilirrubina` varchar(20) DEFAULT NULL,
  `sangre_oculta` varchar(20) DEFAULT NULL,
  `cilindros` varchar(25) DEFAULT NULL,
  `leucocitos` varchar(25) DEFAULT NULL,
  `hematies` varchar(25) DEFAULT NULL,
  `cel_epiteliales` varchar(50) DEFAULT NULL,
  `filamentos_muco` varchar(50) DEFAULT NULL,
  `bacterias` varchar(25) DEFAULT NULL,
  `cristales` varchar(25) DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_examen_orina`),
  KEY `id_paciente` (`id_paciente`),
  CONSTRAINT `examen_orina_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen_orina`
--

LOCK TABLES `examen_orina` WRITE;
/*!40000 ALTER TABLE `examen_orina` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen_orina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_lab`
--

DROP TABLE IF EXISTS `orden_lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_lab` (
  `id_orden_lab` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_orden` varchar(10) DEFAULT NULL,
  `numero_orden` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_orden_lab`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_lab`
--

LOCK TABLES `orden_lab` WRITE;
/*!40000 ALTER TABLE `orden_lab` DISABLE KEYS */;
INSERT INTO `orden_lab` VALUES (1,'23/07/20','1'),(2,'23/07/20','2'),(3,'23/07/20','3');
/*!40000 ALTER TABLE `orden_lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` varchar(5) DEFAULT NULL,
  `cod_emp` varchar(25) DEFAULT NULL,
  `tipo_paciente` varchar(25) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-26 15:58:49
