-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2026 a las 02:42:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bus_umsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `modelo` varchar(80) DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ;

--
-- Volcado de datos para la tabla `bus`
--

INSERT INTO `bus` (`id_bus`, `placa`, `modelo`, `capacidad`, `activo`) VALUES
(1, '2345-BUS', 'Mercedes-Benz OF 1721', 45, 1),
(2, '6789-FAC', 'Volvo B270F', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `facultad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `facultad`) VALUES
(1, 'Ingeniería de Sistemas', 'Facultad de Ingeniería'),
(2, 'Ingeniería Civil', 'Facultad de Ingeniería'),
(3, 'Ingeniería Industrial', 'Facultad de Ingeniería'),
(4, 'Ingeniería Electrónica', 'Facultad de Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id_conductor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `licencia` varchar(30) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id_conductor`, `id_usuario`, `licencia`, `activo`) VALUES
(1, 3, 'LP-PRO-0042', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `id_credencial` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_credencial` varchar(20) NOT NULL COMMENT 'QR, NFC, BIOMETRICO',
  `codigo` varchar(100) NOT NULL,
  `fecha_emision` date NOT NULL DEFAULT curdate(),
  `fecha_vencimiento` date DEFAULT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_dispositivo` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL COMMENT 'LECTOR_QR, TERMINAL_PAGO',
  `modelo` varchar(80) DEFAULT NULL,
  `numero_serie` varchar(60) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `ultima_sincronizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id_dispositivo`, `id_bus`, `tipo`, `modelo`, `numero_serie`, `activo`, `ultima_sincronizacion`) VALUES
(1, 1, 'LECTOR_QR', 'Zebra DS2208', 'ZB-001-2024', 1, NULL),
(2, 1, 'TERMINAL_PAGO', 'Verifone VX520', 'VF-001-2024', 1, NULL),
(3, 2, 'LECTOR_QR', 'Zebra DS2208', 'ZB-002-2024', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasaje`
--

CREATE TABLE `pasaje` (
  `id_pasaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_pasaje` int(11) NOT NULL,
  `codigo_qr` text NOT NULL,
  `fecha_emision` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_vencimiento` datetime DEFAULT NULL,
  `monto_pagado` decimal(8,2) NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT 0,
  `id_transaccion` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_acceso`
--

CREATE TABLE `registro_acceso` (
  `id_acceso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_viaje` int(11) DEFAULT NULL,
  `id_pasaje` int(11) DEFAULT NULL,
  `id_credencial` int(11) DEFAULT NULL,
  `id_dispositivo` int(11) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo_evento` varchar(20) NOT NULL COMMENT 'ABORDAJE, BAJADA, INTENTO',
  `resultado` varchar(20) NOT NULL COMMENT 'APROBADO, RECHAZADO',
  `motivo_rechazo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL,
  `id_usuario_gen` int(11) NOT NULL,
  `tipo_reporte` varchar(50) NOT NULL,
  `fecha_generacion` datetime NOT NULL DEFAULT current_timestamp(),
  `periodo_inicio` date DEFAULT NULL,
  `periodo_fin` date DEFAULT NULL,
  `datos_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`datos_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `nombre`, `origen`, `destino`, `descripcion`) VALUES
(1, 'Ruta Principal', 'Campus UMSA', 'Centro', 'Ruta principal facultad-centro'),
(2, 'Ruta Alterna', 'Campus UMSA', 'Miraflores', 'Ruta alterna por zona norte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo_usuario`
--

CREATE TABLE `saldo_usuario` (
  `id_saldo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `saldo_actual` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ultima_actualizacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ;

--
-- Volcado de datos para la tabla `saldo_usuario`
--

INSERT INTO `saldo_usuario` (`id_saldo`, `id_usuario`, `saldo_actual`, `ultima_actualizacion`) VALUES
(1, 1, 25.00, '2026-06-13 20:39:44'),
(2, 2, 10.50, '2026-06-13 20:39:44'),
(3, 3, 0.00, '2026-06-13 20:39:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pasaje`
--

CREATE TABLE `tipo_pasaje` (
  `id_tipo_pasaje` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(8,2) NOT NULL,
  `vigencia_horas` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `tipo_pasaje`
--

INSERT INTO `tipo_pasaje` (`id_tipo_pasaje`, `nombre`, `descripcion`, `precio`, `vigencia_horas`) VALUES
(1, 'Sencillo', 'Viaje de ida simple', 1.50, 4),
(2, 'Diario', 'Acceso ilimitado en el día', 5.00, 24),
(3, 'Semanal', 'Acceso ilimitado por 7 días', 20.00, 168),
(4, 'Mensual', 'Acceso ilimitado por 30 días', 60.00, 720);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`, `descripcion`) VALUES
(1, 'Estudiante', 'Alumno regular de la UMSA'),
(2, 'Docente', 'Docente de la facultad'),
(3, 'Administrativo', 'Personal administrativo'),
(4, 'Visitante', 'Usuario externo con acceso temporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id_transaccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `metodo_pago` varchar(30) NOT NULL COMMENT 'QR, EFECTIVO, TARJETA',
  `referencia_pago` varchar(100) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(20) NOT NULL DEFAULT 'PENDIENTE' COMMENT 'COMPLETADO, FALLIDO, REVERTIDO',
  `id_dispositivo` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `foto_url` text DEFAULT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `ci`, `nombre`, `apellido`, `email`, `telefono`, `foto_url`, `id_tipo_usuario`, `id_carrera`, `activo`, `fecha_registro`) VALUES
(1, '1234567', 'Juan', 'Mamani', 'juan.mamani@umsa.bo', '71234567', NULL, 1, 1, 1, '2026-06-13 20:39:44'),
(2, '7654321', 'María', 'Quispe', 'maria.quispe@umsa.bo', '79876543', NULL, 1, 2, 1, '2026-06-13 20:39:44'),
(3, '9999999', 'Carlos', 'Flores', 'c.flores@umsa.bo', '76543210', NULL, 2, NULL, 1, '2026-06-13 20:39:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `fecha_hora_salida` datetime NOT NULL,
  `fecha_hora_llegada` datetime DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'PROGRAMADO' COMMENT 'EN_CURSO, FINALIZADO, CANCELADO',
  `pasajeros_count` int(11) NOT NULL DEFAULT 0
) ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_accesos_hoy`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_accesos_hoy` (
`id_acceso` int(11)
,`fecha_hora` datetime
,`ci` varchar(15)
,`pasajero` varchar(201)
,`tipo_evento` varchar(20)
,`resultado` varchar(20)
,`ruta` varchar(100)
,`placa` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_pasajes_vigentes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_pasajes_vigentes` (
`id_pasaje` int(11)
,`ci` varchar(15)
,`pasajero` varchar(201)
,`tipo_pasaje` varchar(50)
,`codigo_qr` text
,`fecha_emision` datetime
,`fecha_vencimiento` datetime
,`monto_pagado` decimal(8,2)
,`usado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_recaudacion_diaria`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_recaudacion_diaria` (
`fecha` date
,`metodo_pago` varchar(30)
,`cantidad_transacciones` bigint(21)
,`total_recaudado` decimal(30,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_accesos_hoy`
--
DROP TABLE IF EXISTS `v_accesos_hoy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_accesos_hoy`  AS SELECT `ra`.`id_acceso` AS `id_acceso`, `ra`.`fecha_hora` AS `fecha_hora`, `u`.`ci` AS `ci`, concat(`u`.`nombre`,' ',`u`.`apellido`) AS `pasajero`, `ra`.`tipo_evento` AS `tipo_evento`, `ra`.`resultado` AS `resultado`, `r`.`nombre` AS `ruta`, `b`.`placa` AS `placa` FROM ((((`registro_acceso` `ra` join `usuario` `u` on(`u`.`id_usuario` = `ra`.`id_usuario`)) left join `viaje` `v` on(`v`.`id_viaje` = `ra`.`id_viaje`)) left join `ruta` `r` on(`r`.`id_ruta` = `v`.`id_ruta`)) left join `bus` `b` on(`b`.`id_bus` = `v`.`id_bus`)) WHERE cast(`ra`.`fecha_hora` as date) = curdate() ORDER BY `ra`.`fecha_hora` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_pasajes_vigentes`
--
DROP TABLE IF EXISTS `v_pasajes_vigentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pasajes_vigentes`  AS SELECT `p`.`id_pasaje` AS `id_pasaje`, `u`.`ci` AS `ci`, concat(`u`.`nombre`,' ',`u`.`apellido`) AS `pasajero`, `tp`.`nombre` AS `tipo_pasaje`, `p`.`codigo_qr` AS `codigo_qr`, `p`.`fecha_emision` AS `fecha_emision`, `p`.`fecha_vencimiento` AS `fecha_vencimiento`, `p`.`monto_pagado` AS `monto_pagado`, `p`.`usado` AS `usado` FROM ((`pasaje` `p` join `usuario` `u` on(`u`.`id_usuario` = `p`.`id_usuario`)) join `tipo_pasaje` `tp` on(`tp`.`id_tipo_pasaje` = `p`.`id_tipo_pasaje`)) WHERE `p`.`usado` = 0 AND (`p`.`fecha_vencimiento` is null OR `p`.`fecha_vencimiento` > current_timestamp()) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_recaudacion_diaria`
--
DROP TABLE IF EXISTS `v_recaudacion_diaria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_recaudacion_diaria`  AS SELECT cast(`transaccion`.`fecha_hora` as date) AS `fecha`, `transaccion`.`metodo_pago` AS `metodo_pago`, count(0) AS `cantidad_transacciones`, sum(`transaccion`.`monto`) AS `total_recaudado` FROM `transaccion` WHERE `transaccion`.`estado` = 'COMPLETADO' GROUP BY cast(`transaccion`.`fecha_hora` as date), `transaccion`.`metodo_pago` ORDER BY cast(`transaccion`.`fecha_hora` as date) DESC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD UNIQUE KEY `uq_bus_placa` (`placa`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id_conductor`),
  ADD UNIQUE KEY `uq_conductor_usuario` (`id_usuario`);

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`id_credencial`),
  ADD UNIQUE KEY `uq_credencial_codigo` (`codigo`),
  ADD KEY `idx_credencial_usuario` (`id_usuario`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD UNIQUE KEY `uq_dispositivo_serie` (`numero_serie`),
  ADD KEY `idx_dispositivo_bus` (`id_bus`);

--
-- Indices de la tabla `pasaje`
--
ALTER TABLE `pasaje`
  ADD PRIMARY KEY (`id_pasaje`),
  ADD UNIQUE KEY `uq_pasaje_transaccion` (`id_transaccion`),
  ADD KEY `idx_pasaje_usuario` (`id_usuario`),
  ADD KEY `idx_pasaje_tipo` (`id_tipo_pasaje`);

--
-- Indices de la tabla `registro_acceso`
--
ALTER TABLE `registro_acceso`
  ADD PRIMARY KEY (`id_acceso`),
  ADD KEY `idx_acceso_usuario` (`id_usuario`),
  ADD KEY `idx_acceso_viaje` (`id_viaje`),
  ADD KEY `idx_acceso_pasaje` (`id_pasaje`),
  ADD KEY `idx_acceso_credencial` (`id_credencial`),
  ADD KEY `idx_acceso_dispositivo` (`id_dispositivo`),
  ADD KEY `idx_acceso_fecha` (`fecha_hora`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `idx_reporte_usuario` (`id_usuario_gen`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  ADD PRIMARY KEY (`id_saldo`),
  ADD UNIQUE KEY `uq_saldo_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipo_pasaje`
--
ALTER TABLE `tipo_pasaje`
  ADD PRIMARY KEY (`id_tipo_pasaje`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `idx_transaccion_usuario` (`id_usuario`),
  ADD KEY `idx_transaccion_dispositivo` (`id_dispositivo`),
  ADD KEY `idx_transaccion_fecha` (`fecha_hora`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uq_usuario_ci` (`ci`),
  ADD UNIQUE KEY `uq_usuario_email` (`email`),
  ADD KEY `idx_usuario_tipo` (`id_tipo_usuario`),
  ADD KEY `idx_usuario_carrera` (`id_carrera`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `idx_viaje_bus` (`id_bus`),
  ADD KEY `idx_viaje_ruta` (`id_ruta`),
  ADD KEY `idx_viaje_conductor` (`id_conductor`),
  ADD KEY `idx_viaje_salida` (`fecha_hora_salida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `id_credencial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pasaje`
--
ALTER TABLE `pasaje`
  MODIFY `id_pasaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_acceso`
--
ALTER TABLE `registro_acceso`
  MODIFY `id_acceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_pasaje`
--
ALTER TABLE `tipo_pasaje`
  MODIFY `id_tipo_pasaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `fk_conductor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD CONSTRAINT `fk_credencial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `fk_dispositivo_bus` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`);

--
-- Filtros para la tabla `pasaje`
--
ALTER TABLE `pasaje`
  ADD CONSTRAINT `fk_pasaje_tipo` FOREIGN KEY (`id_tipo_pasaje`) REFERENCES `tipo_pasaje` (`id_tipo_pasaje`),
  ADD CONSTRAINT `fk_pasaje_transaccion` FOREIGN KEY (`id_transaccion`) REFERENCES `transaccion` (`id_transaccion`),
  ADD CONSTRAINT `fk_pasaje_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `registro_acceso`
--
ALTER TABLE `registro_acceso`
  ADD CONSTRAINT `fk_acceso_credencial` FOREIGN KEY (`id_credencial`) REFERENCES `credencial` (`id_credencial`),
  ADD CONSTRAINT `fk_acceso_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`),
  ADD CONSTRAINT `fk_acceso_pasaje` FOREIGN KEY (`id_pasaje`) REFERENCES `pasaje` (`id_pasaje`),
  ADD CONSTRAINT `fk_acceso_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_acceso_viaje` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_reporte_usuario` FOREIGN KEY (`id_usuario_gen`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  ADD CONSTRAINT `fk_saldo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `fk_transaccion_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`),
  ADD CONSTRAINT `fk_transaccion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`),
  ADD CONSTRAINT `fk_usuario_tipo` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `fk_viaje_bus` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`),
  ADD CONSTRAINT `fk_viaje_conductor` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`),
  ADD CONSTRAINT `fk_viaje_ruta` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
