CREATE TABLE categorias (
  id_cat INT(3) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(20) NULL,
  foto VARCHAR(50) NULL,
  PRIMARY KEY(id_cat)
);

CREATE TABLE categoriaP (
  id_categoria INT(3) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(40) NULL,
  PRIMARY KEY(id_categoria)
);

CREATE TABLE detalle_s (
  id_detalle INT(4) NOT NULL AUTO_INCREMENT,
  costo DECIMAL(10,2) NULL,
  incluye VARCHAR(30) NULL,
  fecha_c DATE NULL,
  PRIMARY KEY(id_detalle)
);

CREATE TABLE horas (
  id_horas INT(11) NOT NULL AUTO_INCREMENT,
  t_i TIME NULL,
  t_f TIME NULL,
  PRIMARY KEY(id_horas)
);

CREATE TABLE proveedor (
  id_proveedor INT(10) NOT NULL AUTO_INCREMENT,
  empresa VARCHAR(50) NULL,
  contacto VARCHAR(50) NULL,
  mail VARCHAR(50) NULL,
  telefono INT(20) NULL,
  direccion VARCHAR(60) NULL,
  logo VARCHAR(50) NULL,
  PRIMARY KEY(id_proveedor)
);

CREATE TABLE turno (
  id_turno INT(2) NOT NULL AUTO_INCREMENT,
  turno VARCHAR(10) NULL,
  ingreso TIME NULL,
  salida TIME NULL,
  PRIMARY KEY(id_turno)
);

CREATE TABLE ambientes (
  id_ambientes INT(3) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(20) NULL,
  m_alto DECIMAL(12,2) NULL,
  m_ancho DECIMAL(12,2) NULL,
  color VARCHAR(20) NULL,
  estado VARCHAR(20) NULL,
  descripcion VARCHAR(80) NULL,
  PRIMARY KEY(id_ambientes)
);

CREATE TABLE cargo (
  id_cargo INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  cargo VARCHAR(30) NULL,
  PRIMARY KEY(id_cargo)
);

CREATE TABLE tipo_usuario (
  id_tipo INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(30) NULL,
  nivel INT(2) NULL,
  PRIMARY KEY(id_tipo)
);

CREATE TABLE servicios (
  id_servicios INT(3) NOT NULL AUTO_INCREMENT,
  detalle_s_id_detalle INT(4) NOT NULL,
  nombre_s VARCHAR(20) NULL,
  tipo VARCHAR(20) NULL,
  PRIMARY KEY(id_servicios),
  INDEX servicios_FKIndex1(detalle_s_id_detalle),
  FOREIGN KEY(detalle_s_id_detalle)
    REFERENCES detalle_s(id_detalle)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE horario (
  id_horario INT(11) NOT NULL AUTO_INCREMENT,
  horas_id_horas INT(11) NOT NULL,
  dias VARCHAR(20) NULL,
  PRIMARY KEY(id_horario),
  INDEX horario_FKIndex1(horas_id_horas),
  FOREIGN KEY(horas_id_horas)
    REFERENCES horas(id_horas)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE cafeteria_prod (
  id_cafeteria INT(10) NOT NULL AUTO_INCREMENT,
  categorias_id_cat INT(3) NOT NULL,
  nombre VARCHAR(20) NULL,
  costo_deter DECIMAL(4,2) NULL,
  costo_compra DECIMAL(4,2) NULL,
  PRIMARY KEY(id_cafeteria),
  INDEX cafeteria_prod_FKIndex1(categorias_id_cat),
  FOREIGN KEY(categorias_id_cat)
    REFERENCES categorias(id_cat)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE cliente (
  id_cliente INT(11) NOT NULL AUTO_INCREMENT,
  tipo_usuario_id_tipo INT(11) NOT NULL,
  usuario VARCHAR(35) NULL,
  pasword VARCHAR(50) NULL,
  rz INTEGER UNSIGNED NULL,
  nit_ci VARCHAR(25) NULL,
  telefono INT(20) NULL,
  estado VARCHAR(15) NULL,
  contraseña CHAR(32) NULL,
  sumapuntos INT(8) NULL,
  PRIMARY KEY(id_cliente),
  INDEX cliente_FKIndex1(tipo_usuario_id_tipo),
  FOREIGN KEY(tipo_usuario_id_tipo)
    REFERENCES tipo_usuario(id_tipo)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE administrador (
  id_administrador INT(10) NOT NULL AUTO_INCREMENT,
  tipo_usuario_id_tipo INT(11) NOT NULL,
  tipo VARCHAR(60) NULL,
  usuario VARCHAR(35) NULL,
  pasword VARCHAR(50) NULL,
  ap_paterno VARCHAR(30) NULL,
  ap_materno VARCHAR(30) NULL,
  nombres VARCHAR(50) NULL,
  ci VARCHAR(20) NULL,
  genero CHAR(2) NULL,
  movil_trabajo INT(20) UNSIGNED NULL,
  movil_personal INT(20) UNSIGNED NULL,
  estado VARCHAR(15) NULL,
  contraseña CHAR(32) NULL,
  PRIMARY KEY(id_administrador),
  INDEX administrador_FKIndex1(tipo_usuario_id_tipo),
  FOREIGN KEY(tipo_usuario_id_tipo)
    REFERENCES tipo_usuario(id_tipo)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE equipo (
  id_equipo INT(11) NOT NULL AUTO_INCREMENT,
  cliente_id_cliente INT(11) NOT NULL,
  nombre VARCHAR(30) NULL,
  ce VARCHAR(30) NULL,
  experiencia VARCHAR(30) NULL,
  logo VARCHAR(50) NULL,
  tel1 INT(8) NULL,
  tel2 INT(8) NULL,
  n_integrantes INT(2) NULL,
  PRIMARY KEY(id_equipo),
  INDEX equipo_FKIndex1(cliente_id_cliente),
  FOREIGN KEY(cliente_id_cliente)
    REFERENCES cliente(id_cliente)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE servicio_ambiente (
  servicios_id_servicios INT(3) NOT NULL,
  ambientes_id_ambientes INT(3) NOT NULL,
  PRIMARY KEY(servicios_id_servicios, ambientes_id_ambientes),
  INDEX servicios_has_ambientes_FKIndex1(servicios_id_servicios),
  INDEX servicios_has_ambientes_FKIndex2(ambientes_id_ambientes),
  FOREIGN KEY(servicios_id_servicios)
    REFERENCES servicios(id_servicios)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(ambientes_id_ambientes)
    REFERENCES ambientes(id_ambientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE producto (
  id_producto INT(10) NOT NULL AUTO_INCREMENT,
  categoriaP_id_categoria INT(3) NOT NULL,
  proveedor_id_proveedor INT(10) NOT NULL,
  nombre VARCHAR(70) NULL,
  descripcion VARCHAR(100) NULL,
  costo_compra DECIMAL(8,2) NULL,
  costo_venta DECIMAL(8,2) NULL,
  stock INT(15) NULL,
  fecha_v DATE NULL,
  fecha_i DATE NULL,
  PRIMARY KEY(id_producto),
  INDEX producto_FKIndex1(proveedor_id_proveedor),
  INDEX producto_FKIndex2(categoriaP_id_categoria),
  FOREIGN KEY(proveedor_id_proveedor)
    REFERENCES proveedor(id_proveedor)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(categoriaP_id_categoria)
    REFERENCES categoriaP(id_categoria)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE empleado (
  id_empleado INT(10) NOT NULL AUTO_INCREMENT,
  turno_id_turno INT(2) NOT NULL,
  usuario VARCHAR(35) NULL,
  pasword VARCHAR(50) NULL,
  tipo_usuario_id_tipo INT(11) NOT NULL,
  cargo_id_cargo INT(10) UNSIGNED NOT NULL,
  ap_paterno VARCHAR(30) NULL,
  ap_materno VARCHAR(30) NULL,
  nombres VARCHAR(50) NULL,
  ci VARCHAR(20) NOT NULL,
  direccion VARCHAR(60) NULL,
  telefono INT(20) UNSIGNED NULL,
  fecha_nacimiento DATE NULL,
  genero CHAR(2) NULL,
  fecha_ingreso DATE NOT NULL,
  sueldo DECIMAL(8,2) NULL,
  intereses VARCHAR(120) NULL,
  observacion VARCHAR(120) NULL,
  estado VARCHAR(15) NULL,
  contraseña CHAR(32) NULL,
  rz VARCHAR(40) NULL,
  PRIMARY KEY(id_empleado),
  INDEX empleado_FKIndex1(cargo_id_cargo),
  INDEX empleado_FKIndex2(tipo_usuario_id_tipo),
  INDEX empleado_FKIndex3(turno_id_turno),
  FOREIGN KEY(cargo_id_cargo)
    REFERENCES cargo(id_cargo)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(tipo_usuario_id_tipo)
    REFERENCES tipo_usuario(id_tipo)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(turno_id_turno)
    REFERENCES turno(id_turno)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE reserva (
  id_reserva BIGINT NOT NULL AUTO_INCREMENT,
  empleado_id_empleado INT(10) NOT NULL,
  cliente_id_cliente INT(11) NOT NULL,
  servicios_id_servicios INT(3) NOT NULL,
  fecha DATE NULL,
  t_inicio TIME NULL,
  t_final TIME NULL,
  adelanto DECIMAL(5,2) NULL,
  total DECIMAL(5,2) NULL,
  PRIMARY KEY(id_reserva),
  INDEX reserva_FKIndex1(servicios_id_servicios),
  INDEX reserva_FKIndex2(cliente_id_cliente),
  INDEX reserva_FKIndex3(empleado_id_empleado),
  FOREIGN KEY(servicios_id_servicios)
    REFERENCES servicios(id_servicios)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(cliente_id_cliente)
    REFERENCES cliente(id_cliente)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(empleado_id_empleado)
    REFERENCES empleado(id_empleado)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE promociones (
  id_promociones INT(8) NOT NULL AUTO_INCREMENT,
  administrador_id_administrador INT(10) NOT NULL,
  r_inf INT(3) NULL,
  r_sup INT(3) NULL,
  tiempo TIME NULL,
  descripcion VARCHAR(100) NULL,
  PRIMARY KEY(id_promociones),
  INDEX promociones_FKIndex1(administrador_id_administrador),
  FOREIGN KEY(administrador_id_administrador)
    REFERENCES administrador(id_administrador)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE retos_espera (
  id_reto INT(11) NOT NULL AUTO_INCREMENT,
  horario_id_horario INT(11) NOT NULL,
  fecha_r DATE NULL,
  id_equipo_retador INT(11) NULL,
  estado VARCHAR(20) NULL,
  PRIMARY KEY(id_reto),
  INDEX retos_espera_FKIndex1(horario_id_horario),
  FOREIGN KEY(horario_id_horario)
    REFERENCES horario(id_horario)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE puntos_sis (
  id_puntos_sis INT(9) NOT NULL AUTO_INCREMENT,
  administrador_id_administrador INT(10) NOT NULL,
  r_inferior INT(3) NULL,
  r_superior INT(3) NULL,
  tiempo_e TIME NULL,
  descripcion VARCHAR(100) NULL,
  fecha_c DATE NULL,
  PRIMARY KEY(id_puntos_sis),
  INDEX puntos_sis_FKIndex1(administrador_id_administrador),
  FOREIGN KEY(administrador_id_administrador)
    REFERENCES administrador(id_administrador)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE compra (
  id_compra INT(10) NOT NULL AUTO_INCREMENT,
  empleado_id_empleado INT(10) NOT NULL,
  fecha DATE NULL,
  fecha_mod DATETIME NULL,
  id_empleado_mod INT(10) NULL,
  PRIMARY KEY(id_compra),
  INDEX compra_FKIndex1(empleado_id_empleado),
  FOREIGN KEY(empleado_id_empleado)
    REFERENCES empleado(id_empleado)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE venta (
  id_venta INT(10) NOT NULL AUTO_INCREMENT,
  cliente_id_cliente INT(11) NOT NULL,
  empleado_id_empleado INT(10) NOT NULL,
  fecha DATE NULL,
  fecha_mod DATETIME NULL,
  id_empleado_mod INT(10) NULL,
  PRIMARY KEY(id_venta),
  INDEX venta_FKIndex1(empleado_id_empleado),
  INDEX venta_FKIndex2(cliente_id_cliente),
  FOREIGN KEY(empleado_id_empleado)
    REFERENCES empleado(id_empleado)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(cliente_id_cliente)
    REFERENCES cliente(id_cliente)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE cafeteria_prod_has_venta (
  cafeteria_prod_id_cafeteria INT(10) NOT NULL,
  venta_id_venta INT(10) NOT NULL,
  cantidad INT(4) NULL,
  PRIMARY KEY(cafeteria_prod_id_cafeteria, venta_id_venta),
  INDEX cafeteria_prod_has_venta_FKIndex1(cafeteria_prod_id_cafeteria),
  INDEX cafeteria_prod_has_venta_FKIndex2(venta_id_venta),
  FOREIGN KEY(cafeteria_prod_id_cafeteria)
    REFERENCES cafeteria_prod(id_cafeteria)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(venta_id_venta)
    REFERENCES venta(id_venta)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE detalle_venta (
  venta_id_venta INT(10) NOT NULL,
  producto_id_producto INT(10) NOT NULL,
  cantidad INT(11) NULL,
  descuento DECIMAL(8,2) NULL,
  PRIMARY KEY(venta_id_venta, producto_id_producto),
  INDEX venta_has_producto_FKIndex1(venta_id_venta),
  INDEX venta_has_producto_FKIndex2(producto_id_producto),
  FOREIGN KEY(venta_id_venta)
    REFERENCES venta(id_venta)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(producto_id_producto)
    REFERENCES producto(id_producto)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE detalle_compra (
  compra_id_compra INT(10) NOT NULL,
  producto_id_producto INT(10) NOT NULL,
  cantidad INT(11) NULL,
  descuento DECIMAL(8,2) NULL,
  PRIMARY KEY(compra_id_compra, producto_id_producto),
  INDEX compra_has_producto_FKIndex1(compra_id_compra),
  INDEX compra_has_producto_FKIndex2(producto_id_producto),
  FOREIGN KEY(compra_id_compra)
    REFERENCES compra(id_compra)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(producto_id_producto)
    REFERENCES producto(id_producto)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE resultados (
  id_resultado INT(11) NOT NULL AUTO_INCREMENT,
  empleado_id_empleado INT(10) NOT NULL,
  equipo_id_equipo INT(11) NOT NULL,
  set_ganado INT(2) NULL,
  set_perdidos INT(2) NULL,
  partido_ganado INT(2) NULL,
  partido_perdido INT(2) NULL,
  PRIMARY KEY(id_resultado),
  INDEX resultados_FKIndex1(equipo_id_equipo),
  INDEX resultados_FKIndex2(empleado_id_empleado),
  FOREIGN KEY(equipo_id_equipo)
    REFERENCES equipo(id_equipo)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(empleado_id_empleado)
    REFERENCES empleado(id_empleado)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE vs (
  id_vs INT(11) NOT NULL AUTO_INCREMENT,
  retos_espera_id_reto INT(11) NOT NULL,
  id_equipo_contrincante INT(11) NULL,
  estado VARCHAR(30) NULL,
  PRIMARY KEY(id_vs),
  INDEX vs_FKIndex1(retos_espera_id_reto),
  FOREIGN KEY(retos_espera_id_reto)
    REFERENCES retos_espera(id_reto)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);


