# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2018-08-31 01:11:18
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cargo"
#

CREATE TABLE `cargo` (
  `id_cargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "cargo"
#

INSERT INTO `cargo` VALUES (1,'Administrador'),(2,'Caja'),(3,'Cocina');

#
# Structure for table "categoriap"
#

CREATE TABLE `categoriap` (
  `id_categoria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "categoriap"
#

INSERT INTO `categoriap` VALUES (1,'BEBIDAS CALIENTES'),(2,'BEBIDAS FRIAS'),(3,'HELADOS'),(4,'KIOSCO'),(5,'REFRIGERIOS');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "proveedor"
#

INSERT INTO `proveedor` VALUES (1,'Embol','embol@embol.com bolivia','embol@embol.com',235270895,'calle embol','embol.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "producto"
#

INSERT INTO `producto` VALUES (1,2,1,'Coca Cola 290 ml','Personal',1.00,2.00,72,NULL,NULL),(2,2,1,'Fanta','Retornable',2.00,3.00,60,NULL,NULL),(3,2,1,'Chisitos','Dulces',2.30,2.00,34,NULL,NULL),(4,1,1,'m','descripcion',4.00,3.00,34,NULL,NULL);

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

INSERT INTO `tipo_usuario` VALUES (1,'ADMINISTRADOR',1),(2,'OPERADOR',2),(3,'CLIENTE',3);

#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario_id_tipo` int(11) NOT NULL,
  `usuario` varchar(35) DEFAULT NULL,
  `pasword` varchar(50) DEFAULT NULL,
  `rz` int(10) unsigned DEFAULT NULL,
  `nit_ci` varchar(25) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `token` char(32) DEFAULT NULL,
  `sumapuntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cliente_FKIndex1` (`tipo_usuario_id_tipo`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,3,'cliente','4983a0ab83ed86e0e7213c8783940193',123456,'123456',NULL,NULL,'4983a0ab83ed86e0e7213c8783940193',NULL);

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
  `token` char(32) DEFAULT NULL,
  `rz` varchar(255) DEFAULT NULL,
  `sumapuntos` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `administrador_FKIndex1` (`tipo_usuario_id_tipo`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "administrador"
#

INSERT INTO `administrador` VALUES (1,1,'admin','admin','21232f297a57a5a743894a0e4a801fc3','Luque','Tito','Zaida','8324146','F',73065432,60547890,'ACTIVO','21232f297a57a5a743894a0e4a801fc3',NULL,600);

#
# Structure for table "turno"
#

CREATE TABLE `turno` (
  `id_turno` int(2) NOT NULL AUTO_INCREMENT,
  `turno` varchar(10) DEFAULT NULL,
  `ingreso` time DEFAULT NULL,
  `salida` time DEFAULT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "turno"
#

INSERT INTO `turno` VALUES (1,'tc',NULL,NULL);

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
  `token` char(32) DEFAULT NULL,
  `rz` varchar(255) DEFAULT NULL,
  `sumapuntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `empleado_FKIndex1` (`cargo_id_cargo`),
  KEY `empleado_FKIndex2` (`tipo_usuario_id_tipo`),
  KEY `empleado_FKIndex3` (`turno_id_turno`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`cargo_id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`tipo_usuario_id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`turno_id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "empleado"
#

INSERT INTO `empleado` VALUES (1,1,'empleado','088ef99bff55c67dc863f83980a66a9b',2,1,'operador','operador','operador','',NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  `costoU_variable` decimal(8,2) DEFAULT NULL,
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
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
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
  `venta_id_venta` int(11) NOT NULL,
  `producto_id_producto` int(10) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costoU_variable` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`venta_id_venta`,`producto_id_producto`),
  KEY `venta_has_producto_FKIndex1` (`venta_id_venta`),
  KEY `venta_has_producto_FKIndex2` (`producto_id_producto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalle_venta"
#

