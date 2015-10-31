DROP DATABASE `contadores`;
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
-- Table structure for table `archivo_tarea`
--

DROP TABLE IF EXISTS `archivo_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tarea_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivoT_idx` (`usuario_id`),
  KEY `tarea_archivo_idx` (`tarea_id`),
  CONSTRAINT `tarea_archivo` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivoT` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `usuario_id` int(11) DEFAULT NULL,
  `tarea_metadata_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_archivoTM_idx` (`usuario_id`),
  KEY `tareaMetadata_archivo_idx` (`tarea_metadata_id`),
  CONSTRAINT `tareaMetadata_archivo` FOREIGN KEY (`tarea_metadata_id`) REFERENCES `tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_archivoTM` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_cliente_idx` (`usuario_id`),
  CONSTRAINT `usuario_cliente` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `usuario_id` int(11) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `es_jefe` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_contador_idx` (`usuario_id`),
  KEY `area_contador_idx` (`area_id`),
  CONSTRAINT `area_contador` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_E83EF8FABD0F409C` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  CONSTRAINT `usuario_contador` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `tarea_id` int(11) DEFAULT NULL,
  `tipo_estado_id` int(11) DEFAULT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `minutos_trabajados` int(11) DEFAULT '0',
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
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rubro`
--

DROP TABLE IF EXISTS `rubro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_area_rubro_idx` (`area_id`),
  CONSTRAINT `fk_area_rubro` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `tarea_metadata_id` int(11) DEFAULT NULL,
  `estado_actual_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `contador_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tiempo_estimado` int(11) DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metaData_tarea_idx` (`tarea_metadata_id`),
  KEY `cliente_tarea_idx` (`cliente_id`),
  KEY `estado_tarea_idx` (`estado_actual_id`),
  KEY `contador_tarea_idx` (`contador_id`),
  CONSTRAINT `cliente_tarea` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contador_tarea` FOREIGN KEY (`contador_id`) REFERENCES `contador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `estado_tarea` FOREIGN KEY (`estado_actual_id`) REFERENCES `estado_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `metaData_tarea` FOREIGN KEY (`tarea_metadata_id`) REFERENCES `tarea_metadata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tarea_metadata`
--

DROP TABLE IF EXISTS `tarea_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarea_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `esPeriodica` tinyint(1) NOT NULL DEFAULT '0',
  `rubro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rubro_tareaMeta_idx` (`rubro_id`),
  CONSTRAINT `fk_rubro_tareaMeta` FOREIGN KEY (`rubro_id`) REFERENCES `rubro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_estado`
--

DROP TABLE IF EXISTS `tipo_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `es_estado_final` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) DEFAULT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `rol_usuario_idx` (`rol_id`),
  CONSTRAINT `rol_usuario` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-31 16:37:06
