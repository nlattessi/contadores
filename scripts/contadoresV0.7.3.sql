CREATE DATABASE  IF NOT EXISTS `contadores` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `contadores`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: contadores
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `archivo_sub_tarea`
--

DROP TABLE IF EXISTS `archivo_sub_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_sub_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `sub_tarea_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivo_idx` (`usuario_id`),
  KEY `subTarea_archivo_idx` (`sub_tarea_id`),
  CONSTRAINT `subTarea_archivo` FOREIGN KEY (`sub_tarea_id`) REFERENCES `sub_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivo` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_sub_tarea`
--

LOCK TABLES `archivo_sub_tarea` WRITE;
/*!40000 ALTER TABLE `archivo_sub_tarea` DISABLE KEYS */;
INSERT INTO `archivo_sub_tarea` VALUES (1,'UnArchivo piola','donde estara',1,1);
/*!40000 ALTER TABLE `archivo_sub_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo_sub_tarea_metadata`
--

DROP TABLE IF EXISTS `archivo_sub_tarea_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_sub_tarea_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `sub_tarea_metadata_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivoSTM_idx` (`usuario_id`),
  KEY `subTareaMetadata_archivo_idx` (`sub_tarea_metadata_id`),
  CONSTRAINT `subTareaMetadata_archivo` FOREIGN KEY (`sub_tarea_metadata_id`) REFERENCES `sub_tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivoSTM` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_sub_tarea_metadata`
--

LOCK TABLES `archivo_sub_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `archivo_sub_tarea_metadata` DISABLE KEYS */;
INSERT INTO `archivo_sub_tarea_metadata` VALUES (1,'archivo de subtaremetadata','dfsdfsdfsd',2,2);
/*!40000 ALTER TABLE `archivo_sub_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo_tarea`
--

DROP TABLE IF EXISTS `archivo_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tarea_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivoT_idx` (`usuario_id`),
  KEY `tarea_archivo_idx` (`tarea_id`),
  CONSTRAINT `tarea_archivo` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivoT` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_tarea`
--

LOCK TABLES `archivo_tarea` WRITE;
/*!40000 ALTER TABLE `archivo_tarea` DISABLE KEYS */;
INSERT INTO `archivo_tarea` VALUES (1,'archivo de tare','enElMismolugar',1,1);
/*!40000 ALTER TABLE `archivo_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo_tarea_metadata`
--

DROP TABLE IF EXISTS `archivo_tarea_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_tarea_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tarea_metadata_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivoTM_idx` (`usuario_id`),
  KEY `tareaMetadata_archivo_idx` (`tarea_metadata_id`),
  CONSTRAINT `tareaMetadata_archivo` FOREIGN KEY (`tarea_metadata_id`) REFERENCES `tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivoTM` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_tarea_metadata`
--

LOCK TABLES `archivo_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `archivo_tarea_metadata` DISABLE KEYS */;
INSERT INTO `archivo_tarea_metadata` VALUES (1,'archivo de tarea metadara','sdsdasda',3,1);
/*!40000 ALTER TABLE `archivo_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Impuestos Empresas'),(2,'Impuestos personales'),(3,'Monotributo');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `CUIT` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_cliente_idx` (`usuario_id`),
  CONSTRAINT `usuario_cliente` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Algo S.A.','rivadavia 4118','156654342','este es el mail','30-12345345-7',3),(2,'america del sur','Rivadavia 4118','4015 2326','america@asdas.com','30-12345345-7',3);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contador`
--

DROP TABLE IF EXISTS `contador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_contador_idx` (`usuario_id`),
  CONSTRAINT `usuario_contador` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contador`
--

LOCK TABLES `contador` WRITE;
/*!40000 ALTER TABLE `contador` DISABLE KEYS */;
INSERT INTO `contador` VALUES (1,'Federico','Gonzalez Castanon',NULL,NULL,1,'01166837452');
/*!40000 ALTER TABLE `contador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_sub_tarea`
--

DROP TABLE IF EXISTS `estado_sub_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_sub_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `sub_tarea_id` int(11) NOT NULL,
  `tipo_estado_id` int(11) NOT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `horas_trabajadas` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tipoEstado_estado_idx` (`tipo_estado_id`),
  KEY `estado_subTarea_idx` (`sub_tarea_id`),
  KEY `contador_estado_tarea_idx` (`contador_id`),
  CONSTRAINT `contador_estado_tarea` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `estado_subTarea` FOREIGN KEY (`sub_tarea_id`) REFERENCES `sub_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipoEstado_estado` FOREIGN KEY (`tipo_estado_id`) REFERENCES `tipo_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_sub_tarea`
--

LOCK TABLES `estado_sub_tarea` WRITE;
/*!40000 ALTER TABLE `estado_sub_tarea` DISABLE KEYS */;
INSERT INTO `estado_sub_tarea` VALUES (1,'0000-00-00 00:00:00',NULL,1,1,1,0),(2,'2017-04-14 00:00:00','2017-04-14 00:00:00',1,1,1,0),(3,'2010-01-01 00:00:00',NULL,2,1,NULL,0);
/*!40000 ALTER TABLE `estado_sub_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_tarea`
--

DROP TABLE IF EXISTS `estado_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `tarea_id` int(11) NOT NULL,
  `tipo_estado_id` int(11) NOT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `indice_completado` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tarea_estadoTarea_idx` (`tarea_id`),
  KEY `tipoEstado_estadoTarea_idx` (`tipo_estado_id`),
  KEY `usuario_estadoTarea_idx` (`contador_id`),
  CONSTRAINT `tarea_estadoTarea` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipoEstado_estadoTarea` FOREIGN KEY (`tipo_estado_id`) REFERENCES `tipo_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_estadoTarea` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_tarea`
--

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` VALUES (1,'2010-01-01 00:00:00',NULL,1,1,NULL,0);
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto`
--

DROP TABLE IF EXISTS `impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES (1,'Liquidacion IVA'),(2,'Ingresos Brutos');
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto_cuil`
--

DROP TABLE IF EXISTS `impuesto_cuil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuesto_cuil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuil` int(1) NOT NULL,
  `impuesto_id` int(11) NOT NULL,
  `mes` varchar(12) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `impuestos_cuil_idx` (`impuesto_id`),
  CONSTRAINT `impuestos_cuil` FOREIGN KEY (`impuesto_id`) REFERENCES `impuesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto_cuil`
--

LOCK TABLES `impuesto_cuil` WRITE;
/*!40000 ALTER TABLE `impuesto_cuil` DISABLE KEYS */;
INSERT INTO `impuesto_cuil` VALUES (1,1,1,'Enero','2010-01-01'),(2,2,1,'Enero','2010-01-11');
/*!40000 ALTER TABLE `impuesto_cuil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ROLE_ADMIN'),(2,'ROLE_CONTADOR'),(3,'ROLE_CLIENTE'),(4, 'ROLE_DIRECTIVO');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_tarea`
--

DROP TABLE IF EXISTS `sub_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `sub_tarea_metadata_id` int(11) NOT NULL,
  `estado_actual_id` int(11) DEFAULT NULL,
  `tiempo_empleado` int(11) DEFAULT '0',
  `tarea_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metadata_subTarea_idx` (`sub_tarea_metadata_id`),
  KEY `tarea_subTarea_idx` (`tarea_id`),
  KEY `estado_subTarea_idx` (`estado_actual_id`),
  CONSTRAINT `fk_estado_subtarea` FOREIGN KEY (`estado_actual_id`) REFERENCES `estado_sub_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `metadata_subTarea` FOREIGN KEY (`sub_tarea_metadata_id`) REFERENCES `sub_tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tarea_subTarea` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_tarea`
--

LOCK TABLES `sub_tarea` WRITE;
/*!40000 ALTER TABLE `sub_tarea` DISABLE KEYS */;
INSERT INTO `sub_tarea` VALUES (1,'2017-04-14 00:00:00','2017-04-14 00:00:00','2017-04-14 00:00:00',1,1,0,1,'Recolectar VENTAS'),(2,NULL,NULL,'0000-00-00 00:00:00',1,1,0,1,'ventas mayo'),(3,NULL,NULL,'2015-06-27 12:40:08',1,1,0,1,'unNombrepiola'),(4,NULL,NULL,'0000-00-00 00:00:00',1,1,0,1,'federrrerererere'),(5,NULL,NULL,'2010-01-01 00:00:00',1,2,0,1,'ESTE ES EL NOMBRE DE LA SUBTAREA');
/*!40000 ALTER TABLE `sub_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_tarea_metadata`
--

DROP TABLE IF EXISTS `sub_tarea_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_tarea_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `tiempo_estimado` int(11) DEFAULT '0',
  `tarea_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tarea_sub_tarea_idx` (`tarea_id`),
  CONSTRAINT `tarea_subTareaMetaData` FOREIGN KEY (`tarea_id`) REFERENCES `tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_tarea_metadata`
--

LOCK TABLES `sub_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `sub_tarea_metadata` DISABLE KEYS */;
INSERT INTO `sub_tarea_metadata` VALUES (1,'Recolectar ventas',4,1),(2,'Llenar excel Ventas',1,1),(3,'Llenar formulario',2,1);
/*!40000 ALTER TABLE `sub_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarea`
--

DROP TABLE IF EXISTS `tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `vencimiento_fiscal` date DEFAULT NULL,
  `vencimiento_interno` date DEFAULT NULL,
  `tarea_metadata_id` int(11) NOT NULL,
  `estado_actual_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metaData_tarea_idx` (`tarea_metadata_id`),
  KEY `cliente_tarea_idx` (`cliente_id`),
  KEY `estado_tarea_idx` (`estado_actual_id`),
  KEY `contador_tarea_idx` (`contador_id`),
  CONSTRAINT `contador_tarea` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cliente_tarea` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `estado_tarea` FOREIGN KEY (`estado_actual_id`) REFERENCES `estado_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `metaData_tarea` FOREIGN KEY (`tarea_metadata_id`) REFERENCES `tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarea`
--

LOCK TABLES `tarea` WRITE;
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
INSERT INTO `tarea` VALUES (1,'2012-01-04','2016-02-07',NULL,'2017-04-14','2013-05-14',1,NULL,2,1,'IVA MAYO Ameria');
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarea_metadata`
--

DROP TABLE IF EXISTS `tarea_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarea_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `esPeriodica` boolean NOT NULL DEFAULT FALSE,
  `area_id` int(11) NOT NULL,
  `impuesto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `area_tareaMetadata_idx` (`area_id`),
  KEY `impuesto_tarea_idx` (`impuesto_id`),
  CONSTRAINT `impuesto_tarea` FOREIGN KEY (`impuesto_id`) REFERENCES `impuesto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `area_tareaMetadata` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarea_metadata`
--

LOCK TABLES `tarea_metadata` WRITE;
/*!40000 ALTER TABLE `tarea_metadata` DISABLE KEYS */;
INSERT INTO `tarea_metadata` VALUES (1,'Liquidar IVA',FALSE,1,NULL),(2,'Liquidar IVA 2015',FALSE,1,1);
/*!40000 ALTER TABLE `tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_estado`
--

DROP TABLE IF EXISTS `tipo_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_estado`
--

LOCK TABLES `tipo_estado` WRITE;
/*!40000 ALTER TABLE `tipo_estado` DISABLE KEYS */;
INSERT INTO `tipo_estado` VALUES (1,'Nueva'),(2,'En curso'),(3,'Terminada');
/*!40000 ALTER TABLE `tipo_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `activo` boolean NOT NULL DEFAULT TRUE,
  PRIMARY KEY (`id`),
  KEY `rol_usuario_idx` (`rol_id`),
  CONSTRAINT `rol_usuario` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,2,'contador@contador.com','contador',1,TRUE),(2,1,'admin@admin.com','admin',1,TRUE),(3,3,'cliente@cliente.com','cliente',1,TRUE),(4,4,'directivo@directivo.com','directivo',NULL,TRUE);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

ALTER TABLE tarea_metadata CHANGE area_id area_id INT DEFAULT NULL;
ALTER TABLE tarea CHANGE cliente_id cliente_id INT DEFAULT NULL, CHANGE tarea_metadata_id tarea_metadata_id INT DEFAULT NULL;
ALTER TABLE archivo_tarea CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE contador CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE estado_sub_tarea CHANGE sub_tarea_id sub_tarea_id INT DEFAULT NULL, CHANGE tipo_estado_id tipo_estado_id INT DEFAULT NULL;
ALTER TABLE impuesto_cuil CHANGE impuesto_id impuesto_id INT DEFAULT NULL;
ALTER TABLE cliente CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE estado_tarea CHANGE tarea_id tarea_id INT DEFAULT NULL, CHANGE tipo_estado_id tipo_estado_id INT DEFAULT NULL;
ALTER TABLE archivo_tarea_metadata CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE usuario CHANGE rol_id rol_id INT DEFAULT NULL, CHANGE activo activo TINYINT(1) DEFAULT '1';
ALTER TABLE sub_tarea CHANGE sub_tarea_metadata_id sub_tarea_metadata_id INT DEFAULT NULL, CHANGE tarea_id tarea_id INT DEFAULT NULL, CHANGE fecha_creacion fecha_creacion DATETIME DEFAULT NULL;
ALTER TABLE archivo_sub_tarea_metadata CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE archivo_sub_tarea CHANGE usuario_id usuario_id INT DEFAULT NULL;
ALTER TABLE sub_tarea_metadata CHANGE tarea_id tarea_id INT DEFAULT NULL;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-27 13:03:46
