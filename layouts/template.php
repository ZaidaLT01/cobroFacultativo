<?php
error_reporting(E_ALL);
require_once('motor/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<title>Sistema</title>
	<!--archivos de informacion avergiguar-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">

	<!--añadiendo estilos booststrap css-->
	<link rel="stylesheet" type="text/css" href="estilos/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilos/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css">
    <!--añadiendo estilos font- awesome css-->
    <link href="estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--añadiendo estilo css-->
	<link href="estilos/css/agency.min.css" rel="stylesheet">

</head>
<body >
	<?php require_once('motor/conexion.php');?>
			<?php 
			require_once('encabezado.php');
			require_once('menu.php');
			?>				
	<footer class="footer text-center bg-dark py-2">
	<?php 
	include_once('pie.php');
	?>
	</footer>

</body>
	<!--El orden del script es importante este scrip coloca fa fas principales
	<script src="layouts/estilos/vendor/bootstrap/js/all.js"></script>-->
    <!-- este j query permite el cambio y fa fas diferentes -->
    <script src="estilos/vendor/jquery/jquery.min.js"></script>
    <!-- Script para cambios -->
    <script src="estilos/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Script para cambios -->
    <script src="estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- averiguar para que sirve -->
    <script src="estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Script para cambios
    <script src="estilos/js/agency.min.js"></script>	-->
    <!-- Script para cambios-->
    <script src="estilos/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
	<!-- Script para cambios-->
    <script src="estilos/js/sb-admin-2.min.js"></script>



</html>