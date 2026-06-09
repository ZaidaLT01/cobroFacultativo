# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2018-10-24 15:00:16
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "ambientes"
#

CREATE TABLE `ambientes` (
  `id_ambientes` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `m_alto` decimal(12,2) DEFAULT NULL,
  `m_ancho` decimal(12,2) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_ambientes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "ambientes"
#


#
# Structure for table "cargo"
#

CREATE TABLE `cargo` (
  `id_cargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "cargo"
#

INSERT INTO `cargo` VALUES (2,'cine'),(3,'alquiler de cancha'),(4,'cocina');

#
# Structure for table "categoriap"
#

CREATE TABLE `categoriap` (
  `id_categoria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "categoriap"
#

INSERT INTO `categoriap` VALUES (1,'Galletas'),(2,'Gaseosas'),(3,'Dulces'),(4,'Helados'),(5,'Frituras'),(6,'Masitas'),(7,'otros');

#
# Structure for table "categorias"
#

CREATE TABLE `categorias` (
  `id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (1,'Bebidas Frias','ejemplo11.jpg'),(2,'Bebidas Calientes','ejemplo9.jpg'),(3,'Refrigerios','ejemplo13.jpg');

#
# Structure for table "cafeteria_prod"
#

CREATE TABLE `cafeteria_prod` (
  `id_cafeteria` int(10) NOT NULL AUTO_INCREMENT,
  `categorias_id_cat` int(3) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `costo_deter` decimal(4,2) DEFAULT NULL,
  `costo_compra` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_cafeteria`),
  KEY `cafeteria_prod_FKIndex1` (`categorias_id_cat`),
  CONSTRAINT `cafeteria_prod_ibfk_1` FOREIGN KEY (`categorias_id_cat`) REFERENCES `categorias` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cafeteria_prod"
#


#
# Structure for table "detalle_s"
#

CREATE TABLE `detalle_s` (
  `id_detalle` int(4) NOT NULL AUTO_INCREMENT,
  `costo` decimal(10,2) DEFAULT NULL,
  `incluye` varchar(30) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalle_s"
#


#
# Structure for table "horas"
#

CREATE TABLE `horas` (
  `id_horas` int(11) NOT NULL AUTO_INCREMENT,
  `t_i` time DEFAULT NULL,
  `t_f` time DEFAULT NULL,
  PRIMARY KEY (`id_horas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "horas"
#


#
# Structure for table "horario"
#

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horas_id_horas` int(11) NOT NULL,
  `dias` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `horario_FKIndex1` (`horas_id_horas`),
  CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`horas_id_horas`) REFERENCES `horas` (`id_horas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "horario"
#


#
# Structure for table "proveedor"
#

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "proveedor"
#

INSERT INTO `proveedor` VALUES (1,'Embol','embol@embol.com bolivia','embol@hotmail.com',235270895,'av.los andes','embol.jpg'),(2,'pil','pil.com.bo','pil@hotmail.com',3454543,'av.pacajes','pil.jpg'),(3,'delizia','deliczia.com.bo','delizia@delizia.com',3454543,'av. 16 Noviembre','delizia.jpg'),(4,'arcor','arcor.com.bo','arcor@gmail.com',756565,'av. 46 Noviembre','arcor.jpg'),(5,'mabel','mabel.com.bo','mabel@gmail.com',3454543,'av. 46 Noviembre','mabel.png'),(6,'otro','otro','otro@delizia.com',3454543,'av. 46 Noviembre','Costa.gif');

#
# Structure for table "producto"
#

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `categoriaP_id_categoria` int(3) NOT NULL,
  `proveedor_id_proveedor` int(10) NOT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `costo_compra` decimal(8,2) DEFAULT NULL,
  `costo_venta` decimal(8,2) DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  `fecha_v` date DEFAULT NULL,
  `fecha_i` date DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `producto_FKIndex1` (`proveedor_id_proveedor`),
  KEY `producto_FKIndex2` (`categoriaP_id_categoria`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`proveedor_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`categoriaP_id_categoria`) REFERENCES `categoriap` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "producto"
#

INSERT INTO `producto` VALUES (1,1,5,'wafer','ninguna',1.00,1.50,29,'2020-10-18','2018-10-18'),(2,1,6,'cremosita','ninguna',0.35,0.50,18,'2020-10-18','2018-10-18'),(3,1,5,'galletas de Agua','',1.50,2.00,30,'2020-10-18','2018-10-18');

#
# Structure for table "retos_espera"
#

CREATE TABLE `retos_espera` (
  `id_reto` int(11) NOT NULL AUTO_INCREMENT,
  `horario_id_horario` int(11) NOT NULL,
  `fecha_r` date DEFAULT NULL,
  `id_equipo_retador` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_reto`),
  KEY `retos_espera_FKIndex1` (`horario_id_horario`),
  CONSTRAINT `retos_espera_ibfk_1` FOREIGN KEY (`horario_id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "retos_espera"
#


#
# Structure for table "servicios"
#

CREATE TABLE `servicios` (
  `id_servicios` int(3) NOT NULL AUTO_INCREMENT,
  `detalle_s_id_detalle` int(4) NOT NULL,
  `nombre_s` varchar(20) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_servicios`),
  KEY `servicios_FKIndex1` (`detalle_s_id_detalle`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`detalle_s_id_detalle`) REFERENCES `detalle_s` (`id_detalle`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "servicios"
#


#
# Structure for table "servicio_ambiente"
#

CREATE TABLE `servicio_ambiente` (
  `servicios_id_servicios` int(3) NOT NULL,
  `ambientes_id_ambientes` int(3) NOT NULL,
  PRIMARY KEY (`servicios_id_servicios`,`ambientes_id_ambientes`),
  KEY `servicios_has_ambientes_FKIndex1` (`servicios_id_servicios`),
  KEY `servicios_has_ambientes_FKIndex2` (`ambientes_id_ambientes`),
  CONSTRAINT `servicio_ambiente_ibfk_1` FOREIGN KEY (`servicios_id_servicios`) REFERENCES `servicios` (`id_servicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servicio_ambiente_ibfk_2` FOREIGN KEY (`ambientes_id_ambientes`) REFERENCES `ambientes` (`id_ambientes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "servicio_ambiente"
#


#
# Structure for table "tipo_usuario"
#

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `nivel` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tipo_usuario"
#

INSERT INTO `tipo_usuario` VALUES (1,'Administrador',1),(2,'Empleado',2),(3,'Cliente',3);

#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id_tipo` int(11) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `pasword` varchar(50) DEFAULT NULL,
  `rz` varchar(15) DEFAULT NULL,
  `nit_ci` bigint(13) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `contraseña` char(32) DEFAULT NULL,
  `sumapuntos` int(8) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cliente_FKIndex1` (`tipo_usuario_id_tipo`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,3,'cliente','4983a0ab83ed86e0e7213c8783940193','casado',23455666,12344566,'activo',NULL,0);

#
# Structure for table "equipo"
#

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `ce` varchar(30) DEFAULT NULL,
  `experiencia` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `tel1` int(8) DEFAULT NULL,
  `tel2` int(8) DEFAULT NULL,
  `n_integrantes` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `equipo_FKIndex1` (`cliente_id_cliente`),
  CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "equipo"
#


#
# Structure for table "administrador"
#

CREATE TABLE `administrador` (
  `id_administrador` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id_tipo` int(11) NOT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `pasword` varchar(50) DEFAULT NULL,
  `ap_paterno` varchar(30) DEFAULT NULL,
  `ap_materno` varchar(30) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `genero` char(2) DEFAULT NULL,
  `movil_trabajo` int(20) unsigned DEFAULT NULL,
  `movil_personal` int(20) unsigned DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `contraseña` char(32) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `administrador_FKIndex1` (`tipo_usuario_id_tipo`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "administrador"
#

INSERT INTO `administrador` VALUES (1,1,'Principal','admin','21232f297a57a5a743894a0e4a801fc3','luque','mendoza','juan carlos','79877876','M',6756756,86786786,'activo','admin');

#
# Structure for table "puntos_sis"
#

CREATE TABLE `puntos_sis` (
  `id_puntos_sis` int(9) NOT NULL AUTO_INCREMENT,
  `administrador_id_administrador` int(10) NOT NULL,
  `r_inferior` int(3) DEFAULT NULL,
  `r_superior` int(3) DEFAULT NULL,
  `tiempo_e` time DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  PRIMARY KEY (`id_puntos_sis`),
  KEY `puntos_sis_FKIndex1` (`administrador_id_administrador`),
  CONSTRAINT `puntos_sis_ibfk_1` FOREIGN KEY (`administrador_id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "puntos_sis"
#


#
# Structure for table "promociones"
#

CREATE TABLE `promociones` (
  `id_promociones` int(8) NOT NULL AUTO_INCREMENT,
  `administrador_id_administrador` int(10) NOT NULL,
  `r_inf` int(3) DEFAULT NULL,
  `r_sup` int(3) DEFAULT NULL,
  `tiempo` time DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_promociones`),
  KEY `promociones_FKIndex1` (`administrador_id_administrador`),
  CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`administrador_id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "promociones"
#


#
# Structure for table "turno"
#

CREATE TABLE `turno` (
  `id_turno` int(2) NOT NULL AUTO_INCREMENT,
  `turno` varchar(10) DEFAULT NULL,
  `ingreso` time DEFAULT NULL,
  `salida` time DEFAULT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "turno"
#

INSERT INTO `turno` VALUES (1,'Diurno','07:30:00','13:30:00'),(2,'Nocturno','14:30:00','20:00:00'),(3,'Cambio','13:30:00','14:30:00'),(4,'salida','20:00:00','22:30:00');

#
# Structure for table "empleado"
#

CREATE TABLE `empleado` (
  `id_empleado` int(10) NOT NULL AUTO_INCREMENT,
  `turno_id_turno` int(2) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `pasword` varchar(50) DEFAULT NULL,
  `tipo_usuario_id_tipo` int(11) NOT NULL,
  `cargo_id_cargo` int(10) unsigned NOT NULL,
  `ap_paterno` varchar(30) DEFAULT NULL,
  `ap_materno` varchar(30) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` int(20) unsigned DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` char(2) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `sueldo` decimal(8,2) DEFAULT NULL,
  `intereses` varchar(120) DEFAULT NULL,
  `observacion` varchar(120) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `contraseña` char(32) DEFAULT NULL,
  `rz` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `empleado_FKIndex1` (`cargo_id_cargo`),
  KEY `empleado_FKIndex2` (`tipo_usuario_id_tipo`),
  KEY `empleado_FKIndex3` (`turno_id_turno`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`cargo_id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`turno_id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "empleado"
#

INSERT INTO `empleado` VALUES (4,1,'zaida','088ef99bff55c67dc863f83980a66a9b',2,2,'luque','tito','jhazmin zaida','14677888','av. pascue',17678687,'0000-00-00','F','2018-10-15',50.00,'','','activo',NULL,'casado');

#
# Structure for table "resultados"
#

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id_empleado` int(10) NOT NULL,
  `equipo_id_equipo` int(11) NOT NULL,
  `set_ganado` int(2) DEFAULT NULL,
  `set_perdidos` int(2) DEFAULT NULL,
  `partido_ganado` int(2) DEFAULT NULL,
  `partido_perdido` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_resultado`),
  KEY `resultados_FKIndex1` (`equipo_id_equipo`),
  KEY `resultados_FKIndex2` (`empleado_id_empleado`),
  CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`equipo_id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "resultados"
#


#
# Structure for table "reserva"
#

CREATE TABLE `reserva` (
  `id_reserva` bigint(20) NOT NULL AUTO_INCREMENT,
  `empleado_id_empleado` int(10) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `servicios_id_servicios` int(3) NOT NULL,
  `fecha` date DEFAULT NULL,
  `t_inicio` time DEFAULT NULL,
  `t_final` time DEFAULT NULL,
  `adelanto` decimal(5,2) DEFAULT NULL,
  `total` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `reserva_FKIndex1` (`servicios_id_servicios`),
  KEY `reserva_FKIndex2` (`cliente_id_cliente`),
  KEY `reserva_FKIndex3` (`empleado_id_empleado`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`servicios_id_servicios`) REFERENCES `servicios` (`id_servicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "reserva"
#


#
# Structure for table "compra"
#

CREATE TABLE `compra` (
  `id_compra` int(10) NOT NULL AUTO_INCREMENT,
  `empleado_id_empleado` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `id_empleado_mod` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `compra_FKIndex1` (`empleado_id_empleado`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "compra"
#


#
# Structure for table "detalle_compra"
#

CREATE TABLE `detalle_compra` (
  `compra_id_compra` int(10) NOT NULL,
  `producto_id_producto` int(10) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`compra_id_compra`,`producto_id_producto`),
  KEY `compra_has_producto_FKIndex1` (`compra_id_compra`),
  KEY `compra_has_producto_FKIndex2` (`producto_id_producto`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`compra_id_compra`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalle_compra"
#


#
# Structure for table "venta"
#

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL AUTO_INCREMENT,
  `cliente_id_cliente` int(11) NOT NULL,
  `empleado_id_empleado` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `id_empleado_mod` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `venta_FKIndex1` (`empleado_id_empleado`),
  KEY `venta_FKIndex2` (`cliente_id_cliente`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "venta"
#


#
# Structure for table "detalle_venta"
#

CREATE TABLE `detalle_venta` (
  `venta_id_venta` int(10) NOT NULL,
  `producto_id_producto` int(10) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`venta_id_venta`,`producto_id_producto`),
  KEY `venta_has_producto_FKIndex1` (`venta_id_venta`),
  KEY `venta_has_producto_FKIndex2` (`producto_id_producto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalle_venta"
#


#
# Structure for table "detalle_caf"
#

CREATE TABLE `detalle_caf` (
  `id_Cafeteria_detalle` int(10) NOT NULL,
  `venta_id_venta` int(10) NOT NULL,
  `cantidad` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_Cafeteria_detalle`,`venta_id_venta`),
  KEY `cafeteria_prod_has_venta_FKIndex1` (`id_Cafeteria_detalle`),
  KEY `cafeteria_prod_has_venta_FKIndex2` (`venta_id_venta`),
  CONSTRAINT `detalle_caf_ibfk_1` FOREIGN KEY (`id_Cafeteria_detalle`) REFERENCES `cafeteria_prod` (`id_cafeteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_caf_ibfk_2` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalle_caf"
#


#
# Structure for table "vs"
#

CREATE TABLE `vs` (
  `id_vs` int(11) NOT NULL AUTO_INCREMENT,
  `retos_espera_id_reto` int(11) NOT NULL,
  `id_equipo_contrincante` int(11) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_vs`),
  KEY `vs_FKIndex1` (`retos_espera_id_reto`),
  CONSTRAINT `vs_ibfk_1` FOREIGN KEY (`retos_espera_id_reto`) REFERENCES `retos_espera` (`id_reto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "vs"
#

