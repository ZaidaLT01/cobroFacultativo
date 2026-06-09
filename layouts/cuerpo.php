<div id="cuerpo">
	<div class="container">
<?php 
	/**
	* Archivo que redirecciona al contenido que se va incrustar dentro de la header y el footer
	**/
//clientes
$mod="";

if (empty($usuario)) {
	require_once('layouts/cuerpoVisita.php');# code...
	//////////////////// 
	/////////////////
	///cuerpo visita
}
if(!empty($usuario)){
	//Inicio
	if ($_GET['mod']=='inicio') {
			require_once('modulos/home.php');
		}

	//Empleados
	if ($_GET['mod']=='empleados') {
		require_once('modulos/Empleado/empleados.php');
	} if ($_GET['mod']=='guardarE') {
		require_once('modulos/Empleado/guardar.php');
	}

	if ($_GET['mod']=='cargos') {
		require_once('modulos/Cargo/cargos.php');
	} if ($_GET['mod']=='guardarCa') {
		require_once('modulos/Cargo/guardar.php');
	}

	if ($_GET['mod']=='turnos') {
		require_once('modulos/Turno/turnos.php');
	} if ($_GET['mod']=='guardarTu') {
		require_once('modulos/Turno/guardar.php');
	}
 	//Clientes
	if ($_GET['mod']=='clientes') {
		require_once('modulos/Cliente/clientes.php');
	} if ($_GET['mod']=='guardarCli') {
		require_once('modulos/Cliente/guardar.php');
	}
	//Snack
	if ($_GET['mod']=='categoriaP') {
		require_once('modulos/CategoriaP/CategoriaP.php');
	}if ($_GET['mod']=='guardarCat') {
		require_once('modulos/CategoriaP/guardar.php');
	}
	if ($_GET['mod']=='proveedores') {
		require_once('modulos/Proveedor/proveedores.php');
	}if ($_GET['mod']=='guardarPrv') {
		require_once('modulos/Proveedor/guardar.php');
	}
	if ($_GET['mod']=='productos') {
		require_once('modulos/Productos/productos.php');
	}if ($_GET['mod']=='guardarProd') {
		require_once('modulos/Productos/guardar.php');
	}
	//---
	if ($_GET['mod']=='Scompras'){
		require_once('modulos/Compra/compra.php');
	}if ($_GET['mod']=='guardarSC') {
		require_once('modulos/Compra/adcompra.php');
	}if ($_GET['mod']=='guardarCom') {
		require_once('modulos/Compra/guardar2.php');
	}
	if ($_GET['mod']=='Sventas'){
		require_once('modulos/Ventas/venta.php');
	}if ($_GET['mod']=='guardarSV') {
		require_once('modulos/Ventas/adventa.php');
	}if ($_GET['mod']=='guardarVen') {
		require_once('modulos/Ventas/guardar2.php');
	}
	
	//Cafeteria
	if ($_GET['mod']=='categoriaCf'){
		require_once('modulos/CategoriaPC/categoriaPC.php');
	}if ($_GET['mod']=='guardarCCF') {
		require_once('modulos/CategoriaPC/guardar.php');
	}
	if ($_GET['mod']=='productosCf') {
		require_once('modulos/Cafeteria/cafeteria.php');
	}if ($_GET['mod']=='guardarPCf') {
		require_once('modulos/Cafeteria/guardar.php');
	}
	if ($_GET['mod']=='Cventas'){
		require_once('modulos/Ventas/venta.php');
	}if ($_GET['mod']=='procv') {
		require_once('modulos/Ventas/procesar_venta.php');
	}

	//Reservas

	if ($_GET['mod']=='ambientes'){
		require_once('modulos/Ambientes/ambientes.php');
	}if ($_GET['mod']=='guardarAmb') {
		require_once('modulos/Ambientes/guardar.php');
	}
	if ($_GET['mod']=='elementosDep'){
		require_once('modulos/ElementosDep/deportivos.php');
	}if ($_GET['mod']=='guardarVC') {
		require_once('modulos/ElementosDep/guardar.php');
	}
	if ($_GET['mod']=='reservas'){
		require_once('modulos/Reserva/reserva.php');
	}if ($_GET['mod']=='guardarAmb') {
		require_once('modulos/Reserva/guardar.php');
	}

	//Reportes

	if ($_GET['mod']=='reporte') {
		require_once('pdf/reportes.php');
	}
}
 ?>
	</div>
</div>