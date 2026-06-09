<!DOCTYPE html>
<html lang="es">
<head>

	<title>Sistema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">



	<!--añadiendo estilos booststrap css-->
	<link rel="stylesheet" type="text/css" href="estilos/vendor/bootstrap/css/bootstrap.min.css">
    <!--añadiendo estilos font- awesome css-->
    <link href="estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--añadiendo estilo css
	<link href="estilos/css/estilo.css" rel="stylesheet">-->
	<link href="estilos/css/vista.min.css" rel="stylesheet">
	<link href="estilos/css/vista.css" rel="stylesheet">

</head>
<body>
	<!--barra superior logo llamar en sesion por log.php-->
		<?php 
			require_once('encabezadoVisita.php');
			require_once('cuerpoVisita.php');
		?>			
	<footer class="footer text-center bg-dark py-2">
		<?php 
			include_once('pie.php');
		?>
	</footer>

</body>

    <!-- este j query permite el cambio y fa fas diferentes -->
    <script src="estilos/vendor/jquery/jquery.min.js"></script>
    <!-- Script para cambios -->
    <script src="estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- averiguar para que sirve -->
    <script src="estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Script para cambios    -->
	<script src="estilos/js/vista.min.js"></script>
	<script src="estilos/js/corevista.min.js"></script>
	<script src="estilos/js/scriptvista.js"></script>
</html>