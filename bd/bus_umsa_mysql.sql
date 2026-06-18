-- ============================================================
--  SISTEMA INTEGRAL DE CONTROL DE PASAJES Y ACCESO
--  Bus Facultativo — Facultad de Ingeniería, U.M.S.A.
--  Base de datos MySQL / phpMyAdmin
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-04:00";

CREATE DATABASE IF NOT EXISTS `bus_umsa`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `bus_umsa`;

-- ─────────────────────────────────────────
--  1. TIPO_USUARIO
-- ─────────────────────────────────────────
CREATE TABLE `tipo_usuario` (
    `id_tipo_usuario` INT          NOT NULL AUTO_INCREMENT,
    `nombre`          VARCHAR(50)  NOT NULL,
    `descripcion`     TEXT,
    PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  2. CARRERA
-- ─────────────────────────────────────────
CREATE TABLE `carrera` (
    `id_carrera` INT          NOT NULL AUTO_INCREMENT,
    `nombre`     VARCHAR(100) NOT NULL,
    `facultad`   VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  3. USUARIO
-- ─────────────────────────────────────────
CREATE TABLE `usuario` (
    `id_usuario`      INT           NOT NULL AUTO_INCREMENT,
    `ci`              VARCHAR(15)   NOT NULL,
    `nombre`          VARCHAR(100)  NOT NULL,
    `apellido`        VARCHAR(100)  NOT NULL,
    `email`           VARCHAR(150)  NOT NULL,
    `telefono`        VARCHAR(20)   DEFAULT NULL,
    `foto_url`        TEXT          DEFAULT NULL,
    `id_tipo_usuario` INT           NOT NULL,
    `id_carrera`      INT           DEFAULT NULL,
    `activo`          TINYINT(1)    NOT NULL DEFAULT 1,
    `fecha_registro`  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_usuario`),
    UNIQUE KEY `uq_usuario_ci`    (`ci`),
    UNIQUE KEY `uq_usuario_email` (`email`),
    KEY `idx_usuario_tipo`    (`id_tipo_usuario`),
    KEY `idx_usuario_carrera` (`id_carrera`),
    CONSTRAINT `fk_usuario_tipo`    FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
    CONSTRAINT `fk_usuario_carrera` FOREIGN KEY (`id_carrera`)      REFERENCES `carrera`      (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  4. CREDENCIAL
-- ─────────────────────────────────────────
CREATE TABLE `credencial` (
    `id_credencial`     INT          NOT NULL AUTO_INCREMENT,
    `id_usuario`        INT          NOT NULL,
    `tipo_credencial`   VARCHAR(20)  NOT NULL COMMENT 'QR, NFC, BIOMETRICO',
    `codigo`            VARCHAR(100) NOT NULL,
    `fecha_emision`     DATE         NOT NULL DEFAULT (CURRENT_DATE),
    `fecha_vencimiento` DATE         DEFAULT NULL,
    `activa`            TINYINT(1)   NOT NULL DEFAULT 1,
    PRIMARY KEY (`id_credencial`),
    UNIQUE KEY `uq_credencial_codigo` (`codigo`),
    KEY `idx_credencial_usuario` (`id_usuario`),
    CONSTRAINT `fk_credencial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  5. TIPO_PASAJE
-- ─────────────────────────────────────────
CREATE TABLE `tipo_pasaje` (
    `id_tipo_pasaje` INT            NOT NULL AUTO_INCREMENT,
    `nombre`         VARCHAR(50)    NOT NULL,
    `descripcion`    TEXT           DEFAULT NULL,
    `precio`         DECIMAL(8,2)   NOT NULL,
    `vigencia_horas` INT            NOT NULL,
    PRIMARY KEY (`id_tipo_pasaje`),
    CONSTRAINT `chk_precio`         CHECK (`precio` >= 0),
    CONSTRAINT `chk_vigencia_horas` CHECK (`vigencia_horas` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  6. BUS
-- ─────────────────────────────────────────
CREATE TABLE `bus` (
    `id_bus`    INT         NOT NULL AUTO_INCREMENT,
    `placa`     VARCHAR(15) NOT NULL,
    `modelo`    VARCHAR(80) DEFAULT NULL,
    `capacidad` INT         NOT NULL,
    `activo`    TINYINT(1)  NOT NULL DEFAULT 1,
    PRIMARY KEY (`id_bus`),
    UNIQUE KEY `uq_bus_placa` (`placa`),
    CONSTRAINT `chk_bus_capacidad` CHECK (`capacidad` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  7. RUTA
-- ─────────────────────────────────────────
CREATE TABLE `ruta` (
    `id_ruta`     INT          NOT NULL AUTO_INCREMENT,
    `nombre`      VARCHAR(100) NOT NULL,
    `origen`      VARCHAR(100) NOT NULL,
    `destino`     VARCHAR(100) NOT NULL,
    `descripcion` TEXT         DEFAULT NULL,
    PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  8. CONDUCTOR  (relación 1:1 con USUARIO)
-- ─────────────────────────────────────────
CREATE TABLE `conductor` (
    `id_conductor` INT         NOT NULL AUTO_INCREMENT,
    `id_usuario`   INT         NOT NULL,
    `licencia`     VARCHAR(30) NOT NULL,
    `activo`       TINYINT(1)  NOT NULL DEFAULT 1,
    PRIMARY KEY (`id_conductor`),
    UNIQUE KEY `uq_conductor_usuario` (`id_usuario`),
    CONSTRAINT `fk_conductor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  9. DISPOSITIVO
-- ─────────────────────────────────────────
CREATE TABLE `dispositivo` (
    `id_dispositivo`        INT         NOT NULL AUTO_INCREMENT,
    `id_bus`                INT         NOT NULL,
    `tipo`                  VARCHAR(30) NOT NULL COMMENT 'LECTOR_QR, TERMINAL_PAGO',
    `modelo`                VARCHAR(80) DEFAULT NULL,
    `numero_serie`          VARCHAR(60) NOT NULL,
    `activo`                TINYINT(1)  NOT NULL DEFAULT 1,
    `ultima_sincronizacion` DATETIME    DEFAULT NULL,
    PRIMARY KEY (`id_dispositivo`),
    UNIQUE KEY `uq_dispositivo_serie` (`numero_serie`),
    KEY `idx_dispositivo_bus` (`id_bus`),
    CONSTRAINT `fk_dispositivo_bus` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  10. TRANSACCION
-- ─────────────────────────────────────────
CREATE TABLE `transaccion` (
    `id_transaccion`  INT           NOT NULL AUTO_INCREMENT,
    `id_usuario`      INT           NOT NULL,
    `monto`           DECIMAL(8,2)  NOT NULL,
    `metodo_pago`     VARCHAR(30)   NOT NULL COMMENT 'QR, EFECTIVO, TARJETA',
    `referencia_pago` VARCHAR(100)  DEFAULT NULL,
    `fecha_hora`      DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `estado`          VARCHAR(20)   NOT NULL DEFAULT 'PENDIENTE' COMMENT 'COMPLETADO, FALLIDO, REVERTIDO',
    `id_dispositivo`  INT           DEFAULT NULL,
    PRIMARY KEY (`id_transaccion`),
    KEY `idx_transaccion_usuario`     (`id_usuario`),
    KEY `idx_transaccion_dispositivo` (`id_dispositivo`),
    KEY `idx_transaccion_fecha`       (`fecha_hora`),
    CONSTRAINT `fk_transaccion_usuario`     FOREIGN KEY (`id_usuario`)     REFERENCES `usuario`     (`id_usuario`),
    CONSTRAINT `fk_transaccion_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`),
    CONSTRAINT `chk_transaccion_monto`      CHECK (`monto` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  11. PASAJE
-- ─────────────────────────────────────────
CREATE TABLE `pasaje` (
    `id_pasaje`         INT           NOT NULL AUTO_INCREMENT,
    `id_usuario`        INT           NOT NULL,
    `id_tipo_pasaje`    INT           NOT NULL,
    `codigo_qr`         TEXT          NOT NULL,
    `fecha_emision`     DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `fecha_vencimiento` DATETIME      DEFAULT NULL,
    `monto_pagado`      DECIMAL(8,2)  NOT NULL,
    `usado`             TINYINT(1)    NOT NULL DEFAULT 0,
    `id_transaccion`    INT           DEFAULT NULL,
    PRIMARY KEY (`id_pasaje`),
    UNIQUE KEY `uq_pasaje_transaccion` (`id_transaccion`),
    KEY `idx_pasaje_usuario`  (`id_usuario`),
    KEY `idx_pasaje_tipo`     (`id_tipo_pasaje`),
    CONSTRAINT `fk_pasaje_usuario`      FOREIGN KEY (`id_usuario`)     REFERENCES `usuario`     (`id_usuario`),
    CONSTRAINT `fk_pasaje_tipo`         FOREIGN KEY (`id_tipo_pasaje`) REFERENCES `tipo_pasaje` (`id_tipo_pasaje`),
    CONSTRAINT `fk_pasaje_transaccion`  FOREIGN KEY (`id_transaccion`) REFERENCES `transaccion` (`id_transaccion`),
    CONSTRAINT `chk_pasaje_monto`       CHECK (`monto_pagado` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  12. VIAJE
-- ─────────────────────────────────────────
CREATE TABLE `viaje` (
    `id_viaje`            INT         NOT NULL AUTO_INCREMENT,
    `id_bus`              INT         NOT NULL,
    `id_ruta`             INT         NOT NULL,
    `id_conductor`        INT         NOT NULL,
    `fecha_hora_salida`   DATETIME    NOT NULL,
    `fecha_hora_llegada`  DATETIME    DEFAULT NULL,
    `estado`              VARCHAR(20) NOT NULL DEFAULT 'PROGRAMADO' COMMENT 'EN_CURSO, FINALIZADO, CANCELADO',
    `pasajeros_count`     INT         NOT NULL DEFAULT 0,
    PRIMARY KEY (`id_viaje`),
    KEY `idx_viaje_bus`       (`id_bus`),
    KEY `idx_viaje_ruta`      (`id_ruta`),
    KEY `idx_viaje_conductor` (`id_conductor`),
    KEY `idx_viaje_salida`    (`fecha_hora_salida`),
    CONSTRAINT `fk_viaje_bus`       FOREIGN KEY (`id_bus`)       REFERENCES `bus`       (`id_bus`),
    CONSTRAINT `fk_viaje_ruta`      FOREIGN KEY (`id_ruta`)      REFERENCES `ruta`      (`id_ruta`),
    CONSTRAINT `fk_viaje_conductor` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`),
    CONSTRAINT `chk_viaje_pasajeros` CHECK (`pasajeros_count` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  13. REGISTRO_ACCESO
-- ─────────────────────────────────────────
CREATE TABLE `registro_acceso` (
    `id_acceso`      INT         NOT NULL AUTO_INCREMENT,
    `id_usuario`     INT         NOT NULL,
    `id_viaje`       INT         DEFAULT NULL,
    `id_pasaje`      INT         DEFAULT NULL,
    `id_credencial`  INT         DEFAULT NULL,
    `id_dispositivo` INT         DEFAULT NULL,
    `fecha_hora`     DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `tipo_evento`    VARCHAR(20) NOT NULL COMMENT 'ABORDAJE, BAJADA, INTENTO',
    `resultado`      VARCHAR(20) NOT NULL COMMENT 'APROBADO, RECHAZADO',
    `motivo_rechazo` TEXT        DEFAULT NULL,
    PRIMARY KEY (`id_acceso`),
    KEY `idx_acceso_usuario`     (`id_usuario`),
    KEY `idx_acceso_viaje`       (`id_viaje`),
    KEY `idx_acceso_pasaje`      (`id_pasaje`),
    KEY `idx_acceso_credencial`  (`id_credencial`),
    KEY `idx_acceso_dispositivo` (`id_dispositivo`),
    KEY `idx_acceso_fecha`       (`fecha_hora`),
    CONSTRAINT `fk_acceso_usuario`     FOREIGN KEY (`id_usuario`)     REFERENCES `usuario`     (`id_usuario`),
    CONSTRAINT `fk_acceso_viaje`       FOREIGN KEY (`id_viaje`)       REFERENCES `viaje`       (`id_viaje`),
    CONSTRAINT `fk_acceso_pasaje`      FOREIGN KEY (`id_pasaje`)      REFERENCES `pasaje`      (`id_pasaje`),
    CONSTRAINT `fk_acceso_credencial`  FOREIGN KEY (`id_credencial`)  REFERENCES `credencial`  (`id_credencial`),
    CONSTRAINT `fk_acceso_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  14. SALDO_USUARIO  (1:1 con USUARIO)
-- ─────────────────────────────────────────
CREATE TABLE `saldo_usuario` (
    `id_saldo`             INT           NOT NULL AUTO_INCREMENT,
    `id_usuario`           INT           NOT NULL,
    `saldo_actual`         DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `ultima_actualizacion` DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_saldo`),
    UNIQUE KEY `uq_saldo_usuario` (`id_usuario`),
    CONSTRAINT `fk_saldo_usuario`  FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
    CONSTRAINT `chk_saldo_positivo` CHECK (`saldo_actual` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────
--  15. REPORTE
-- ─────────────────────────────────────────
CREATE TABLE `reporte` (
    `id_reporte`       INT         NOT NULL AUTO_INCREMENT,
    `id_usuario_gen`   INT         NOT NULL,
    `tipo_reporte`     VARCHAR(50) NOT NULL,
    `fecha_generacion` DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `periodo_inicio`   DATE        DEFAULT NULL,
    `periodo_fin`      DATE        DEFAULT NULL,
    `datos_json`       JSON        DEFAULT NULL,
    PRIMARY KEY (`id_reporte`),
    KEY `idx_reporte_usuario` (`id_usuario_gen`),
    CONSTRAINT `fk_reporte_usuario` FOREIGN KEY (`id_usuario_gen`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
--  DATOS DE EJEMPLO (seed)
-- ============================================================

INSERT INTO `tipo_usuario` (`nombre`, `descripcion`) VALUES
    ('Estudiante',     'Alumno regular de la UMSA'),
    ('Docente',        'Docente de la facultad'),
    ('Administrativo', 'Personal administrativo'),
    ('Visitante',      'Usuario externo con acceso temporal');

INSERT INTO `carrera` (`nombre`, `facultad`) VALUES
    ('Ingeniería de Sistemas',  'Facultad de Ingeniería'),
    ('Ingeniería Civil',        'Facultad de Ingeniería'),
    ('Ingeniería Industrial',   'Facultad de Ingeniería'),
    ('Ingeniería Electrónica',  'Facultad de Ingeniería');

INSERT INTO `tipo_pasaje` (`nombre`, `descripcion`, `precio`, `vigencia_horas`) VALUES
    ('Sencillo', 'Viaje de ida simple',           1.50,   4),
    ('Diario',   'Acceso ilimitado en el día',    5.00,  24),
    ('Semanal',  'Acceso ilimitado por 7 días',  20.00, 168),
    ('Mensual',  'Acceso ilimitado por 30 días', 60.00, 720);

INSERT INTO `bus` (`placa`, `modelo`, `capacidad`, `activo`) VALUES
    ('2345-BUS', 'Mercedes-Benz OF 1721', 45, 1),
    ('6789-FAC', 'Volvo B270F',           50, 1);

INSERT INTO `ruta` (`nombre`, `origen`, `destino`, `descripcion`) VALUES
    ('Ruta Principal', 'Campus UMSA', 'Centro',      'Ruta principal facultad-centro'),
    ('Ruta Alterna',   'Campus UMSA', 'Miraflores',  'Ruta alterna por zona norte');

INSERT INTO `usuario` (`ci`, `nombre`, `apellido`, `email`, `telefono`, `id_tipo_usuario`, `id_carrera`, `activo`) VALUES
    ('1234567', 'Juan',   'Mamani', 'juan.mamani@umsa.bo',  '71234567', 1, 1, 1),
    ('7654321', 'María',  'Quispe', 'maria.quispe@umsa.bo', '79876543', 1, 2, 1),
    ('9999999', 'Carlos', 'Flores', 'c.flores@umsa.bo',     '76543210', 2, NULL, 1);

INSERT INTO `conductor` (`id_usuario`, `licencia`, `activo`) VALUES
    (3, 'LP-PRO-0042', 1);

INSERT INTO `dispositivo` (`id_bus`, `tipo`, `modelo`, `numero_serie`, `activo`) VALUES
    (1, 'LECTOR_QR',     'Zebra DS2208',   'ZB-001-2024', 1),
    (1, 'TERMINAL_PAGO', 'Verifone VX520', 'VF-001-2024', 1),
    (2, 'LECTOR_QR',     'Zebra DS2208',   'ZB-002-2024', 1);

INSERT INTO `saldo_usuario` (`id_usuario`, `saldo_actual`) VALUES
    (1, 25.00),
    (2, 10.50),
    (3,  0.00);

-- ============================================================
--  VISTAS ÚTILES
-- ============================================================

-- Pasajes vigentes y no usados
CREATE OR REPLACE VIEW `v_pasajes_vigentes` AS
SELECT
    p.id_pasaje,
    u.ci,
    CONCAT(u.nombre, ' ', u.apellido) AS pasajero,
    tp.nombre                          AS tipo_pasaje,
    p.codigo_qr,
    p.fecha_emision,
    p.fecha_vencimiento,
    p.monto_pagado,
    p.usado
FROM pasaje p
JOIN usuario     u  ON u.id_usuario     = p.id_usuario
JOIN tipo_pasaje tp ON tp.id_tipo_pasaje = p.id_tipo_pasaje
WHERE p.usado = 0
  AND (p.fecha_vencimiento IS NULL OR p.fecha_vencimiento > NOW());

-- Accesos del día
CREATE OR REPLACE VIEW `v_accesos_hoy` AS
SELECT
    ra.id_acceso,
    ra.fecha_hora,
    u.ci,
    CONCAT(u.nombre, ' ', u.apellido) AS pasajero,
    ra.tipo_evento,
    ra.resultado,
    r.nombre                           AS ruta,
    b.placa
FROM registro_acceso ra
JOIN usuario u ON u.id_usuario = ra.id_usuario
LEFT JOIN viaje v ON v.id_viaje = ra.id_viaje
LEFT JOIN ruta  r ON r.id_ruta  = v.id_ruta
LEFT JOIN bus   b ON b.id_bus   = v.id_bus
WHERE DATE(ra.fecha_hora) = CURDATE()
ORDER BY ra.fecha_hora DESC;

-- Recaudación diaria por método de pago
CREATE OR REPLACE VIEW `v_recaudacion_diaria` AS
SELECT
    DATE(fecha_hora)  AS fecha,
    metodo_pago,
    COUNT(*)          AS cantidad_transacciones,
    SUM(monto)        AS total_recaudado
FROM transaccion
WHERE estado = 'COMPLETADO'
GROUP BY DATE(fecha_hora), metodo_pago
ORDER BY fecha DESC;
