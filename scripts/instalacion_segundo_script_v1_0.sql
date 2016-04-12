USE contadores;

INSERT INTO `rol` (`id`,`nombre`) VALUES (1,'ROLE_ADMIN');
INSERT INTO `rol` (`id`,`nombre`) VALUES (2,'ROLE_JEFE');
INSERT INTO `rol` (`id`,`nombre`) VALUES (3,'ROLE_CONTADOR');
INSERT INTO `rol` (`id`,`nombre`) VALUES (4,'ROLE_CLIENTE');

INSERT INTO `usuario` (`id`,`rol_id`,`mail`,`password`,`entidad_id`,`activo`) VALUES (1,1,'admin@admin.com','$2a$12$3i7nsXPQ7idkW3wV.GKz6eGQgwAXDQ8nuclOcOQgTPy4LhczD5H0S',1,1);

INSERT INTO `tipo_estado` (`id`,`nombre`,`es_estado_final`) VALUES (1,'Ingresado',0);
INSERT INTO `tipo_estado` (`id`,`nombre`,`es_estado_final`) VALUES (2,'Terminado',0);

INSERT INTO `esquema` (`id`,`nombre`) VALUES (1,'Mensual');
INSERT INTO `esquema` (`id`,`nombre`) VALUES (2,'Bimestral');
INSERT INTO `esquema` (`id`,`nombre`) VALUES (3,'Trimestral');
INSERT INTO `esquema` (`id`,`nombre`) VALUES (4,'Cuatrimestral');
INSERT INTO `esquema` (`id`,`nombre`) VALUES (5,'Semestral');

INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (1,'Enero 2016','2016-01-01','2016-01-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (2,'Febrero 2016','2016-02-01','2016-02-28',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (3,'Marzo 2016','2016-03-01','2016-03-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (4,'Abril 2016','2016-04-01','2016-04-30',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (5,'Mayo 2016','2016-05-01','2016-05-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (6,'Junio 2016','2016-06-01','2016-06-30',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (7,'Julio 2016','2016-07-01','2016-07-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (8,'Agosto 2016','2016-08-01','2016-08-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (9,'Septiembre 2016','2016-09-01','2016-09-30',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (10,'Octubre 2016','2016-10-01','2016-10-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (11,'Noviembre 2016','2016-11-01','2016-11-30',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (12,'Diciembre 2016','2016-12-01','2016-12-31',1);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (13,'Enero-Febrero 2016','2016-01-01','2016-02-28',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (14,'Marzo-Abril 2016','2016-03-01','2016-04-30',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (15,'Mayo-Junio 2016','2016-05-01','2016-06-30',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (16,'Julio-Agosto 2016','2016-07-01','2016-08-31',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (17,'Septiembre-Octubre 2016','2016-09-01','2016-10-31',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (18,'Noviembre-Diciembre 2016','2016-11-01','2016-12-31',2);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (19,'Primer Trimestre 2016','2016-01-01','2016-03-31',3);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (20,'Segundo Trimestre 2016','2016-04-01','2016-06-30',3);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (21,'Tercer Trimestre 2016','2016-07-01','2016-09-30',3);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (22,'Cuarto Trimestre 2016','2016-10-01','2016-12-31',3);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (23,'Primer Cuatrimestre 2016','2016-01-01','2016-04-30',4);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (24,'Segundo Cuatrimestre 2016','2016-05-01','2016-08-31',4);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (25,'Tercer Cuatrimestre 2016','2016-09-01','2016-12-31',4);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (26,'Primer Semestre 2016','2016-01-01','2016-06-30',5);
INSERT INTO `periodo` (`id`,`nombre`,`fecha_desde`,`fecha_hasta`,`esquema_id`) VALUES (27,'Segundo Semestre 2016','2016-07-01','2016-12-31',5);

