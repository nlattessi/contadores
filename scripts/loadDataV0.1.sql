/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;


LOCK TABLES `archivo_sub_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `archivo_sub_tarea_metadata` DISABLE KEYS */;
INSERT INTO `archivo_sub_tarea_metadata` VALUES (1,'archivo de subtaremetadata','dfsdfsdfsd',2,2);
/*!40000 ALTER TABLE `archivo_sub_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `archivo_tarea` WRITE;
/*!40000 ALTER TABLE `archivo_tarea` DISABLE KEYS */;
INSERT INTO `archivo_tarea` VALUES (1,'archivo de tarea','enElMismolugar',1,1);
/*!40000 ALTER TABLE `archivo_tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `archivo_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `archivo_tarea_metadata` DISABLE KEYS */;
INSERT INTO `archivo_tarea_metadata` VALUES (1,'archivo de tarea metadara','sdsdasda',3,1);
/*!40000 ALTER TABLE `archivo_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Impuestos Empresas'),(2,'Impuestos personales'),(3,'Monotributo');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Algo S.A.','rivadavia 4118','156654342','este es el mail','30-12345345-7',4),(2,'america del sur','Rivadavia 4118','4015 2326','america@asdas.com','30-12345345-7',4);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `contador` WRITE;
/*!40000 ALTER TABLE `contador` DISABLE KEYS */;
INSERT INTO `contador` VALUES (1,'Federico','Gonzalez Castanon',NULL,NULL,3,'01166837452');
/*!40000 ALTER TABLE `contador` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `estado_sub_tarea` WRITE;
/*!40000 ALTER TABLE `estado_sub_tarea` DISABLE KEYS */;
INSERT INTO `estado_sub_tarea` VALUES (1,'0000-00-00 00:00:00',NULL,1,1,1,0),(2,'2017-04-14 00:00:00','2017-04-14 00:00:00',1,1,1,0),(3,'2010-01-01 00:00:00',NULL,2,1,NULL,0);
/*!40000 ALTER TABLE `estado_sub_tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `estado_tarea` WRITE;
/*!40000 ALTER TABLE `estado_tarea` DISABLE KEYS */;
INSERT INTO `estado_tarea` VALUES (1,'2010-01-01 00:00:00',NULL,1,1,NULL,0);
/*!40000 ALTER TABLE `estado_tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES (1,'Liquidacion IVA'),(2,'Ingresos Brutos');
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `impuesto_cuil` WRITE;
/*!40000 ALTER TABLE `impuesto_cuil` DISABLE KEYS */;
INSERT INTO `impuesto_cuil` VALUES (1,1,1,'Enero','2010-01-01'),(2,2,1,'Enero','2010-01-11');
/*!40000 ALTER TABLE `impuesto_cuil` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `sub_tarea` WRITE;
/*!40000 ALTER TABLE `sub_tarea` DISABLE KEYS */;
INSERT INTO `sub_tarea` VALUES (1,'2017-04-14 00:00:00','2017-04-14 00:00:00','2017-04-14 00:00:00',1,1,0,1,'Recolectar VENTAS'),(2,NULL,NULL,'0000-00-00 00:00:00',1,1,0,1,'ventas mayo'),(3,NULL,NULL,'2015-06-27 12:40:08',1,1,0,1,'unNombrepiola'),(4,NULL,NULL,'0000-00-00 00:00:00',1,1,0,1,'federrrerererere'),(5,NULL,NULL,'2010-01-01 00:00:00',1,2,0,1,'ESTE ES EL NOMBRE DE LA SUBTAREA');
/*!40000 ALTER TABLE `sub_tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `sub_tarea_metadata` WRITE;
/*!40000 ALTER TABLE `sub_tarea_metadata` DISABLE KEYS */;
INSERT INTO `sub_tarea_metadata` VALUES (1,'Recolectar ventas',4,1),(2,'Llenar excel Ventas',1,1),(3,'Llenar formulario',2,1);
/*!40000 ALTER TABLE `sub_tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `tarea` WRITE;
/*!40000 ALTER TABLE `tarea` DISABLE KEYS */;
INSERT INTO `tarea` VALUES (1,'2012-01-04','2016-02-07',NULL,'2017-04-14','2013-05-14',1,NULL,2,1,'IVA MAYO Ameria');
/*!40000 ALTER TABLE `tarea` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `tarea_metadata` WRITE;
/*!40000 ALTER TABLE `tarea_metadata` DISABLE KEYS */;
INSERT INTO `tarea_metadata` VALUES (1,'Liquidar IVA',FALSE,1,NULL),(2,'Liquidar IVA 2015',FALSE,1,1);
/*!40000 ALTER TABLE `tarea_metadata` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `tipo_estado` WRITE;
/*!40000 ALTER TABLE `tipo_estado` DISABLE KEYS */;
INSERT INTO `tipo_estado` VALUES (1,'Nueva'),(2,'En curso'),(3,'Terminada');
/*!40000 ALTER TABLE `tipo_estado` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,2,'jefe@jefe.com','$2a$12$NXPQ3A5.opFvR7vBDWki2O.7D/O4u8NMQbCynKzICT3skSOfBj5sm',1,TRUE),(3,3,'contador@contador.com','$2a$12$AI1VzNf1viLVZTEPQ/vRgeY72OawYeob8mDpWoBDM5RguzVUkXw8i',1,TRUE),(4,4,'cliente@cliente.com','$2a$12$yUQKRrM1TI57hdtWGEbrI.SotbKellNh6zEnxnQ8WoiJs2NFbMFxS',1,TRUE);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
