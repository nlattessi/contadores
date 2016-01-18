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
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `archivo_cliente`
--

LOCK TABLES `archivo_cliente` WRITE;
/*!40000 ALTER TABLE `archivo_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `archivo_metadata`
--

-- LOCK TABLES `archivo_metadata` WRITE;
-- /*!40000 ALTER TABLE `archivo_metadata` DISABLE KEYS */;
-- /*!40000 ALTER TABLE `archivo_metadata` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Dumping data for table `archivo_tarea`
--

LOCK TABLES `archivo_tarea` WRITE;
/*!40000 ALTER TABLE `archivo_tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id`, `nombre`) VALUES (1,'Comercial2'),(2,'Civil'),(3,'Laboral'),(4,'Obra pública'),(5,'Nacional'),(6,'Internacional'),(7,'asdasdasda');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`, `mail`, `CUIT`, `usuario_id`) VALUES (1,'America delsur SA','rivadavia 4118','4234243','dori@america.com','20456456858',3),(2,'Federico Gonzalez Castanon','Hipolito yrigoyen','01166837452','federico.gonzalezc@gmail.com','20333003164',5),(3,'Marcelo','dfsfdsdfs',NULL,'arrd@asdasd.com','121251251212',7),(4,'Arrrrrr','pojpojpo','343435','fefefe@ssffs.com','242424242',7);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contador`
--

LOCK TABLES `contador` WRITE;
/*!40000 ALTER TABLE `contador` DISABLE KEYS */;
INSERT INTO `contador` (`id`, `nombre`, `apellido`, `celular`, `mail`, `usuario_id`, `telefono`, `area_id`, `es_jefe`, `activo`) VALUES (1,'Carlos','Delfino','35235235','rwerwer@ffdsfsdfs',6,'35322525',1,0,1),(2,'americo','segundo','43424','5325252@twtweg.com',8,'5453',1,1,1),(3,'Camaron','Bombay','241241','aasdad@asdasd.com',9,'2412412',3,0,1),(4,'camaron','segundo','53535','asdasda@asdasd.com',9,'3433434',2,1,1),(5,'último','contador','3526236232','fasfasf@sfasfas.com',9,'235235235',4,0,1);
/*!40000 ALTER TABLE `contador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `esquema`
--

LOCK TABLES `esquema` WRITE;
/*!40000 ALTER TABLE `esquema` DISABLE KEYS */;
INSERT INTO `esquema` (`id`, `nombre`) VALUES (1,'Mensual'),(2,'Bimestral'),(3,'Trimestral'),(4,'Cuatrimestral'),(5,'Semestral');
/*!40000 ALTER TABLE `esquema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado_tarea`
--

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` (`id`, `fecha_inicio`, `fecha_fin`, `tarea_id`, `tipo_estado_id`, `contador_id`, `minutos_trabajados`, `fecha_creacion`) VALUES (1,'2015-12-02 19:32:40',NULL,1,1,NULL,0,NULL),(2,'2015-12-03 17:06:32',NULL,4,1,2,0,NULL),(3,'2015-12-03 17:11:04',NULL,5,1,2,0,NULL),(4,'2015-12-03 18:20:44',NULL,6,1,NULL,0,NULL),(5,'2015-12-03 19:27:45',NULL,7,1,NULL,89,NULL),(6,'2015-12-03 19:35:04',NULL,8,1,NULL,893,NULL),(7,'2015-12-03 19:36:27',NULL,9,2,NULL,1234,NULL),(8,'2015-12-03 21:43:10',NULL,10,1,2,NULL,NULL),(9,'2015-12-21 21:40:26',NULL,11,1,3,NULL,NULL),(10,'2015-12-22 16:09:50',NULL,12,1,2,NULL,NULL),(11,'2015-12-22 19:36:11',NULL,13,1,1,NULL,NULL),(12,'2015-12-22 19:37:11',NULL,14,1,1,NULL,NULL),(13,'2015-12-22 19:37:58',NULL,15,1,1,NULL,NULL),(14,'2015-12-28 15:48:04',NULL,16,1,1,NULL,NULL),(15,'2015-12-28 18:29:37',NULL,17,1,1,NULL,NULL);
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `observacion`
--

LOCK TABLES `observacion` WRITE;
/*!40000 ALTER TABLE `observacion` DISABLE KEYS */;
INSERT INTO `observacion` (`id`, `texto`, `usuario_id`, `tarea_id`, `fecha_creacion`) VALUES (1,'terrr',1,9,'0000-00-00'),(2,'ret22',2,9,'0000-00-00'),(3,'Una observacion pensada',2,10,'2015-12-03'),(4,'ddfdfdfd',2,11,'2015-12-21'),(5,'Esta sería uan bservación',8,12,'2015-12-22'),(6,'pero con observacion',8,14,'2015-12-22'),(7,'pero con observacion 22222',8,14,'2015-12-22'),(8,'Observado',6,16,'2015-12-28'),(9,'asdasda',6,17,'2015-12-28');
/*!40000 ALTER TABLE `observacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` (`id`, `nombre`, `fecha_desde`, `fecha_hasta`, `esquema_id`) VALUES (1,'Enero 2016','2016-01-01','2016-01-31',1),(2,'Febrero 2016','2016-02-01','2016-02-28',1),(3,'Marzo 2016','2016-03-01','2016-03-31',1),(4,'Abril 2016','2016-04-01','2016-04-30',1),(5,'Mayo 2016','2016-05-01','2016-05-31',1),(6,'Junio 2016','2016-06-01','2016-06-30',1),(7,'Julio 2016','2016-07-01','2016-07-31',1),(8,'Agosto 2016','2016-08-01','2016-08-31',1),(9,'Septiembre 2016','2016-09-01','2016-09-30',1),(10,'Octubre 2016','2016-10-01','2016-10-31',1),(11,'Noviembre 2016','2016-11-01','2016-11-30',1),(12,'Diciembre 2016','2016-12-01','2016-12-31',1),(13,'Enero-Febrero','2016-01-01','2016-02-28',2),(14,'Marzo-Abril','2016-03-01','2016-04-30',2),(15,'Mayo-Junio','2016-05-01','2016-06-30',2),(16,'Julio-Agosto','2016-07-01','2016-08-31',2),(17,'Septiembre-Octubre','2016-09-01','2016-10-31',2),(18,'Noviembre-Diciembre','2016-11-01','2016-12-31',2);
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`, `nombre`) VALUES (1,'ROLE_ADMIN'),(2,'ROLE_JEFE'),(3,'ROLE_CONTADOR'),(4,'ROLE_CLIENTE');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rubro`
--

LOCK TABLES `rubro` WRITE;
/*!40000 ALTER TABLE `rubro` DISABLE KEYS */;
INSERT INTO `rubro` (`id`, `nombre`, `area_id`) VALUES (1,'Divorcio',2),(2,'Liquidar Sueldos',3),(3,'otro rubro',1),(4,'incluso otro rubro',1),(5,'Despidos',3);
/*!40000 ALTER TABLE `rubro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tarea`
--

LOCK TABLES `tarea` WRITE;
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
INSERT INTO `tarea` (`id`, `fecha_inicio`, `fecha_fin`, `fecha_creacion`, `vencimiento_id`, `vencimiento_interno`, `tarea_metadata_id`, `estado_actual_id`, `cliente_id`, `contador_id`, `nombre`, `tiempo_estimado`, `fecha_baja`) VALUES (1,'2015-10-16','2015-10-17','2015-12-02 19:32:40',NULL,'2015-12-04',1,1,1,1,'Zarazola',NULL,NULL),(3,'2015-10-16','2015-10-16',NULL,NULL,NULL,1,NULL,1,2,NULL,NULL,NULL),(4,NULL,NULL,'2015-12-03 17:06:31',NULL,NULL,1,2,2,2,'Firmar acta Federico Gonzalez Castanon',22,NULL),(5,NULL,NULL,'2015-12-03 17:11:03',NULL,'2015-12-30',1,3,2,2,'Firmar acta Federico Gonzalez Castanon',22,NULL),(6,NULL,NULL,'2015-12-03 18:20:44',NULL,'2015-12-31',1,4,2,NULL,'Firmar acta Federico Gonzalez Castanon',22,NULL),(7,NULL,NULL,'2015-12-03 19:27:45',NULL,NULL,1,5,1,NULL,'Firmar acta America delsur SA',NULL,NULL),(8,NULL,NULL,'2015-12-03 19:35:04',NULL,NULL,1,6,1,NULL,'Firmar acta America delsur SA',NULL,NULL),(9,NULL,NULL,'2015-12-03 19:36:27',NULL,NULL,1,7,1,NULL,'Firmar acta America delsur SA',NULL,NULL),(10,NULL,NULL,'2015-12-03 21:43:10',NULL,'2016-01-05',1,8,2,2,'Firmar acta Federico Gonzalez Castanon',231,NULL),(11,NULL,NULL,'2015-12-21 21:40:25',NULL,'2015-12-22',1,9,1,3,'Firmar acta America delsur SA',23,NULL),(12,NULL,NULL,'2015-12-22 16:09:50',NULL,'2015-12-29',4,10,2,2,'rubro 4 area 1 Federico Gonzalez Castanon',12,NULL),(13,NULL,NULL,'2015-12-22 19:36:11',NULL,'2015-12-24',3,11,2,1,'Rubro 3 area 1 Federico Gonzalez Castanon',12,NULL),(14,NULL,NULL,'2015-12-22 19:37:11',1,'2015-12-24',3,12,2,1,'Rubro 3 area 1 Federico Gonzalez Castanon',12,NULL),(15,NULL,NULL,'2015-12-22 19:37:58',2,'2015-12-24',3,13,2,1,'Rubro 3 area 1 Federico Gonzalez Castanon',12,NULL),(16,NULL,NULL,'2015-12-28 15:48:04',1,'2015-12-29',4,14,3,1,'rubro 4 area 1 Marcelo',NULL,NULL),(17,NULL,NULL,'2015-12-28 18:29:36',NULL,'2015-12-29',4,15,1,1,'rubro 4 area 1 America delsur SA',23,NULL);
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tarea_metadata`
--

LOCK TABLES `tarea_metadata` WRITE;
/*!40000 ALTER TABLE `tarea_metadata` DISABLE KEYS */;
INSERT INTO `tarea_metadata` (`id`, `nombre`, `esPeriodica`, `rubro_id`, `activo`) VALUES (1,'Firmar acta',0,1,1),(2,'Juntar IVA',0,2,1),(3,'Rubro 3 area 1',1,3,1),(4,'rubro 4 area 1',0,4,1);
/*!40000 ALTER TABLE `tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_estado`
--

LOCK TABLES `tipo_estado` WRITE;
/*!40000 ALTER TABLE `tipo_estado` DISABLE KEYS */;
INSERT INTO `tipo_estado` (`id`, `nombre`, `es_estado_final`) VALUES (1,'Ingresado',0),(2,'Terminado',0),(3,'Suspendido',0);
/*!40000 ALTER TABLE `tipo_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `rol_id`, `mail`, `password`, `entidad_id`, `activo`) VALUES (1,1,'admin@admin.com','$2a$12$3i7nsXPQ7idkW3wV.GKz6eGQgwAXDQ8nuclOcOQgTPy4LhczD5H0S',1,1),(2,2,'jefe@jefe.com','$2y$12$cyVX/PzyWQXbMK5nsL7dPushu21l95n6JGX4/qHBj9uNlVX4nalCG',NULL,1),(3,4,'america@america.com','$2y$12$D4XNtdyeuPb76bijL/Y/.u2gJNKezrb2xTitcDGNvykblIEwRvfWS',NULL,1),(5,4,'fede@fede.com','$2y$12$IFshKibu.dH/2S3B3OSUhOIjlR/2YVv5rsNHXX8d5M46u3AZ9dsbq',NULL,1),(6,3,'contador@contador.com','$2y$12$s1DtNRe9mR3/nVuzEdRFouGytUENXh3odDelbuTHA7wZd8O8A.51m',1,1),(7,4,'america2@america.com','$2y$12$UylSCAMa8kvhgJbMwq..f.AVP/OM23usnzoZ7/6nR3jzDVv5Gdi8i',4,1),(8,3,'jc@jc.com','$2y$12$/l1uCCPZrDqQT9uzC5/ufOhzrnnmJELx/c8I5.NyAxms2u4c.ET6m',2,1),(9,3,'camaron@contador.com','$2y$12$CsA6PkqvQBlGk41m2g2JvOr5piSwR0/gUyFAZp5bq1LoiVhY69vUu',5,1),(10,4,'unUserCliente@sarlanga.com','$2y$12$W1/0ZkyrHsxbyD/nGhXOQe8laeXgn8Bx5V92XPspSKmlSBU16QxVS',NULL,1),(11,4,'xvzxvzxvz','$2y$12$ZCiuelV0loyieNkuLhDuUu/llB/N112RRjkWkQFIiN1ccqq56AoxC',NULL,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vencimiento`
--

LOCK TABLES `vencimiento` WRITE;
/*!40000 ALTER TABLE `vencimiento` DISABLE KEYS */;
INSERT INTO `vencimiento` (`id`, `fecha`, `periodo_id`, `cola_cuil`, `tarea_metadata_id`) VALUES (1,'2010-01-01',13,'4',3),(2,'2012-02-03',4,'4',3),(3,'2015-12-18',14,'5',3);
/*!40000 ALTER TABLE `vencimiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-04 22:42:18
